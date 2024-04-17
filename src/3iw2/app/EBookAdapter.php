<?php

namespace DesignPatterns\IW2;

use DesignPatterns\IW2EBook\EBookInterface;

class EBookAdapter implements EBookInterface
{
    public function __construct(protected BookInterface $book)
    {
    }

    public function getOnlinePrice(): int
    {
        return $this->book->getPrice() * 100;
    }
}
