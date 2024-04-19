<?php

namespace DesignPatterns\IW1;

use DesignPatterns\IW1EBook\EBookInterface;

class EBookAdapter implements EBookInterface
{
    public function __construct(
        protected BookInterface $book,
    ) {
    }

    public function getOnlinePrice(): int
    {
        return $this->book->getPrice() * 100;
    }
}
