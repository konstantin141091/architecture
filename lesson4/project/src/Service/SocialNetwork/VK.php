<?php

use Contract\SocialLinksInterface;
use Contract\SocialNetworkInterface;

class VK implements SocialNetworkInterface
{
    private $message;
    private $title;
    private $socialLink;
    public function __construct(
        SocialLinksInterface $socialLink,
        string $title,
        string $message
    ) {
        $this->socialLink = $socialLink;
        $this->title = $title;
        $this->message = $message;
    }

    public function send(): void
    {
        echo "Посылаем письмо с заголовком '$this->title' по адресу "
            . "'{$this->socialLink->getVK()()}' с сообщением "
            . "'$this->message'.\n";
    }
}
