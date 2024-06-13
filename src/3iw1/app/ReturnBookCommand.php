<?php

namespace DesignPatterns\IW1;

class ReturnBookCommand implements LibraryCommand
{
    protected BookInterface $book;

    public function setBook(BookInterface $book): self
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
