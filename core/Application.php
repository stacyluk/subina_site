<?php

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
    public function run()
    {
        $this->Loader();
    }

    public function Loader(){
        require_once __DIR__.'../autoload.php';
    }

    /**
     * Get the version number of the application.
     *
     * @return string
     */
    public function hello()
    {
        return 'Hello';
    }
}