<?php

namespace DesignPatterns\IW2;

class TitleSortingStrategy implements BookSortingStrategy
{
    protected BookCategory $bookCategory;

    public function __construct(protected string $direction = 'asc')
    {
    }

    public function sort(array &$children): void
    {
        usort($children, function (BookComponentInterface $childA, BookComponentInterface $childB) {
            if ($childA instanceof BookCategory || $childB instanceof BookCategory) {
                return 0;
            }
            $result = $childA->title <=> $childB->title;
            if ($this->direction === 'asc') {
                return $result;
            }
            return -$result;
        });
    }
}
