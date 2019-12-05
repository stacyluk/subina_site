<?php


class Application
{
    protected $basePath;
    public function __construct($basePath = null)
    {
        $this->basePath = $basePath;
        $this->routes = new Router($this);
    }
}