<?php

namespace DesignPatterns\IW2;

class Library implements LibraryInterface
{
    public function readBook(int $age, BookInterface $book): BookInterface
    {
        return $book;
    }
}
