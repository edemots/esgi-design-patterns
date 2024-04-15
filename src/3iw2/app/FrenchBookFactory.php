<?php

namespace DesignPatterns\IW2;

class FrenchBookFactory extends BookFactory
{
    public function createFictionBook(
        string $title,
        string $authorName,
        string $isbn,
        string $publishedDate,
    ): BookInterface {
        return $this->createBook("fiction", "fr_FR", $title, $authorName, $isbn, $publishedDate);
    }

    public function createHistoryBook(
        string $title,
        string $authorName,
        string $isbn,
        string $publishedDate,
    ): BookInterface {
        return $this->createBook("history", "fr_FR", $title, $authorName, $isbn, $publishedDate);
    }
}
