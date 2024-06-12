<?php

namespace DesignPatterns\IW2;

interface BookSortingStrategy
{
    public function sort(array &$children): void;
}
