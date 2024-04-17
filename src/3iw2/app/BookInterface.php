<?php

namespace DesignPatterns\IW2;

interface BookInterface
{
    public function getPrice(): float;
    public function getDetails(): string;
}
