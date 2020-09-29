<?php


class RegisterRoutes implements IRegister
{
    private $containerBuilder;
    private $routeCollection;

    public function __construct($containerBuilder, $routeCollection) {
        $this->containerBuilder = $containerBuilder;
        $this->routeCollection = $routeCollection;
    }

    public function kernelRegister()
    {
        $this->routeCollection = require __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'routing.php';
        $this->containerBuilder->set('route_collection', $this->routeCollection);
    }
}
