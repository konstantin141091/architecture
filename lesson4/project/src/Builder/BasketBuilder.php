<?php


namespace Builder;


use Contract\BasketBuilderInterface;
use Service\Order\Basket;

class BasketBuilder implements BasketBuilderInterface
{
    private $card;
    private $discount;
    private $email;
    private $user;
    public function getCard(): BasketBuilderInterface
    {
        return $this->card;
    }
    public function getDiscount(): BasketBuilderInterface
    {
        return $this->discount;
    }
    public function getEmail(): BasketBuilderInterface
    {
        return $this->email;
    }
    public function getUser(): BasketBuilderInterface
    {
        return $this->user;
    }

    public function setCard($card): BasketBuilderInterface
    {
        $this->card = $card;
        return $this;
    }
    public function setDiscount($discount): BasketBuilderInterface
    {
        $this->discount = $discount;
        return $this;
    }

    public function setEmail($email): BasketBuilderInterface
    {
        $this->email = $email;
        return $this;
    }
    public function setUser($user): BasketBuilderInterface
    {
        $this->user = $user;
        return $this;
    }

    public function build(): Basket
    {
        return new Basket($this);
    }
}
