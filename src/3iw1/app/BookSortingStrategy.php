<?php

namespace DesignPatterns\IW1;

interface BookSortingStrategy
{
    public function sort(array &$array): void;
}
