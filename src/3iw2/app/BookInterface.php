<?php

namespace DesignPatterns\IW2;

interface BookInterface extends BookComponentInterface
{
    public function getPrice(): float;
    public function getPegi(): int;
    public function getDetails($depth = 0): string;
}
