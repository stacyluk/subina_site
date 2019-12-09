<?php
namespace core;
use core\routing\Router;
use core\http\Request;
use core\http\Response;
use Laravel\Lumen\Http\Request as LumenRequest;
use Laravel\Lumen\Routing\Pipeline;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class Application
{
    protected $basePath;
    public $router;
    public function __construct($basePath = null)
    {
        $this->basePath = $basePath;
        $this->router = new Router($this);
    }

    /**
     * Run the application and send the response.
     *
     * @param  SymfonyRequest|null  $request
     * @return void
     */
    public function run($request = null)
    {
        $response = $this->dispatch($request);
        echo (string) $response;
    }

    /**
     * Dispatch the incoming request.
     *
     * @param  SymfonyRequest|null  $request
     * @return Response
     */
    public function dispatch($request = null)
    {
        [$method, $pathInfo] = $this->parseIncomingRequest($request);

        try {
            $this->boot();

            return $this->sendThroughPipeline($this->middleware, function ($request) use ($method, $pathInfo) {
                $this->instance(Request::class, $request);

                if (isset($this->router->getRoutes()[$method.$pathInfo])) {
                    return $this->handleFoundRoute([true, $this->router->getRoutes()[$method.$pathInfo]['action'], []]);
                }

                return $this->handleDispatcherResponse(
                    $this->createDispatcher()->dispatch($method, $pathInfo)
                );
            });
        } catch (Throwable $e) {
            return $this->prepareResponse($this->sendExceptionToHandler($e));
        }
    }

    /**
     * Parse the incoming request and return the method and path info.
     *
     * @param  \Symfony\Component\HttpFoundation\Request|null  $request
     * @return array
     */
    protected function parseIncomingRequest($request)
    {
        if (! $request) {
            $request = LumenRequest::capture();
        }

        $this->instance(\Illuminate\Http\Request::class, $this->prepareRequest($request));

        return [$request->getMethod(), '/'.trim($request->getPathInfo(), '/')];
    }

    /**
     * Send the request through the pipeline with the given callback.
     *
     * @param  array  $middleware
     * @param  \Closure  $then
     * @return mixed
     */
    protected function sendThroughPipeline(array $middleware, Closure $then)
    {
        if (count($middleware) > 0 && ! $this->shouldSkipMiddleware()) {
            return (new Pipeline($this))
                ->send($this->make('request'))
                ->through($middleware)
                ->then($then);
        }

        return $then($this->make('request'));
    }

    public function hello()
    {
        return 'Hello';
    }
}