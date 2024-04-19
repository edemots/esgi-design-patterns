<?php

namespace DesignPatterns\IW2;

use Error;

class PegiProxy implements LibraryInterface
{
    public function __construct(protected LibraryInterface $library)
    {
    }

    public function readBook(int $age, BookInterface $book): BookInterface
    {
        if ($age < $book->getPegi()) {
            throw new Error("Vous êtes trop jeune pour lire ce livre.");
        }

        return $this->library->readBook($age, $book);
    }
}
