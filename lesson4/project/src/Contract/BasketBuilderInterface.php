<?php


namespace Contract;


use Service\Order\Basket;

interface BasketBuilderInterface
{
    public function setCard($card) :self ;
    public function getCard() :self ;
    public function setDiscount($discount) :self ;
    public function getDiscount() :self ;
    public function setEmail($email) :self ;
    public function getEmail() :self ;
    public function setUser($user) :self ;
    public function getUser() :self ;
    public function build() : Basket;
}
