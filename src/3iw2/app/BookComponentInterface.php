<?php

namespace DesignPatterns\IW2;

interface BookComponentInterface
{
    public function display($depth = 0): void;
    public function searchByTitle(string $title): ?BookComponentInterface;
}
