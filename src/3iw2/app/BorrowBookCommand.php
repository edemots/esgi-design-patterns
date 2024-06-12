<?php

namespace DesignPatterns\IW2;

class BorrowBookCommand implements LibraryCommand
{
    protected Book $book;

    public function setBook(Book $book): self
    {
        $this->book = $book;
        return $this;
    }

    public function execute(): void
    {
        $this->book->makeUnavailable();
        echo "Vous empruntez {$this->book->getDetails()}";
    }
}
