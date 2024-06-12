<?php

namespace DesignPatterns\IW2;

class ReturnBookCommand implements LibraryCommand
{
    protected Book $book;

    public function setBook(Book $book): self
    {
        $this->book = $book;
        return $this;
    }

    public function execute(): void
    {
        $this->book->makeAvailable();
        echo "Vous retournez {$this->book->getDetails()}";
    }
}
