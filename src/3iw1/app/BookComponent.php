<?php

namespace DesignPatterns\IW1;

interface BookComponent
{
    public function displayHierarchy(int $depth = 0): void;

    public function searchByTitle(string $title): ?BookComponent;
}
