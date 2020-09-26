<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;

class RegisterConfigs implements IRegister
{
    protected $containerBuilder;

    public function __construct(ContainerBuilder $containerBuilder)
    {
        $this->containerBuilder = $containerBuilder;
    }

    public function kernelRegister()
    {
        try {
            $fileLocator = new FileLocator(__DIR__ . DIRECTORY_SEPARATOR . 'config');
            $loader = new PhpFileLoader($this->containerBuilder, $fileLocator);
            $loader->load('parameters.php');
        } catch (\Throwable $e) {
            die('Cannot read the config file. File: ' . __FILE__ . '. Line: ' . __LINE__);
        }
    }

}
