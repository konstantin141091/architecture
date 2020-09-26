<?php
 use Service\Order\Basket;

class BasketManager
{
    private $basket;

    public function __construct(Basket $basket)
    {
        $this->basket = $basket;
    }

    public function checkout() {
        $this->basket->checkout();
    }
}
