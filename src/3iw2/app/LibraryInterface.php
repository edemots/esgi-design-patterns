<?php

namespace DesignPatterns\IW2;

interface LibraryInterface
{
    public function readBook(int $age, BookInterface $book): BookInterface;
}
