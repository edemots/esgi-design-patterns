<?php

namespace DesignPatterns\IW1;

class PriceSortingStrategy implements BookSortingStrategy
{
    public function __construct(protected string $direction = "asc")
    {
    }

    public function sort(array &$array): void
    {
        usort($array, function (BookComponent $itemA, BookComponent $itemB) {
            if ($itemA instanceof BookCategory || $itemB instanceof BookCategory) {
                return 0;
            }
            $result = $itemA->price <=> $itemB->price;
            if ($this->direction == 'asc') {
                return $result;
            }
            return -$result;
        });
    }
}
