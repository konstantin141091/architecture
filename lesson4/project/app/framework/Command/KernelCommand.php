<?php


class KernelCommand implements KernelCommandInterface
{
    private $command;

    public function __construct($command)
    {
        $this->command = $command;
    }

    public function execute()
    {
        $this->command->kernelRegister();
    }
}
