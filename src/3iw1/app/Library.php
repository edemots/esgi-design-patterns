<?php

namespace DesignPatterns\IW1;

class Library implements LibraryInterface
{
    public function readBook(BookInterface|BookComponent $book, int $age): BookInterface|BookComponent
    {
        return $book;
    }
}
