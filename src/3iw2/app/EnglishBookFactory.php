<?php

namespace DesignPatterns\IW2;

class EnglishBookFactory extends BookFactory
{
    public function createFictionBook(
        string $title,
        string $authorName,
        string $isbn,
        string $publishedDate,
        float $price,
        int $pegi,
    ): BookInterface {
        return $this->createBook("fiction", "en_GB", $title, $authorName, $isbn, $publishedDate, $price, $pegi);
    }

    public function createHistoryBook(
        string $title,
        string $authorName,
        string $isbn,
        string $publishedDate,
        float $price,
        int $pegi,
    ): BookInterface {
        return $this->createBook("history", "en_GB", $title, $authorName, $isbn, $publishedDate, $price, $pegi);
    }
}
