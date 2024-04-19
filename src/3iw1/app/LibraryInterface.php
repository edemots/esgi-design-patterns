<?php

namespace DesignPatterns\IW1;

interface LibraryInterface
{
    public function readBook(BookInterface|BookComponent $book, int $age): BookInterface|BookComponent;
}
