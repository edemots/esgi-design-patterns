<?php

namespace DesignPatterns\IW2;

class AuthorSortingStrategy implements BookSortingStrategy
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
            $result = $childA->authorName <=> $childB->authorName;
            if ($this->direction === 'asc') {
                return $result;
            }
            return -$result;
        });
    }
}
