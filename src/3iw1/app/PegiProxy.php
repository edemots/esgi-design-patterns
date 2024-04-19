<?php

namespace DesignPatterns\IW1;

use Error;

class PegiProxy implements LibraryInterface
{
    public function __construct(protected LibraryInterface $library)
    {
    }

    public function readBook(BookInterface|BookComponent $book, int $age): BookInterface|BookComponent
    {
        if ($age >= $book->getPegi()) {
            $book = $this->library->readBook($book, $age);
            echo "Vous avez l'âge nécessaire" . PHP_EOL;
            return $book;
        }
        throw new Error("Vous n'avez pas l'âge requis pour emprunter ce livre.");
    }
}
