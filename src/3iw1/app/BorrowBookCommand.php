<?php

namespace DesignPatterns\IW1;

class BorrowBookCommand implements LibraryCommand
{
    protected BookInterface $book;

    public function setBook(BookInterface $book): self
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
