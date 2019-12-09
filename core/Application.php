<?php
namespace core;
use core\routing\Router;
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
        if ($response instanceof SymfonyResponse) {
            $response->send();
        } else {
            echo (string) $response;
        }
    }

    public function hello()
    {
        return 'Hello';
    }
}