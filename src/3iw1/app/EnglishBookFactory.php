<?php

namespace DesignPatterns\IW1;

class EnglishBookFactory extends BookFactory
{
    public function createFictionBook(
        string $title,
        string $description,
        string $author,
        string $isbn,
        string $publishedAt,
        float $price,
        int $pegi,
    ): FictionBook {
        return $this->createBook(
            "fiction",
            $title,
            $description,
            $author,
            'en_EN',
            $isbn,
            $publishedAt,
            $price,
            $pegi,
        );
    }

    public function createHistoryBook(
        string $title,
        string $description,
        string $author,
        string $isbn,
        string $publishedAt,
        float $price,
        int $pegi,
    ): HistoryBook {
        return $this->createBook(
            "history",
            $title,
            $description,
            $author,
            'en_EN',
            $isbn,
            $publishedAt,
            $price,
            $pegi,
        );
    }
}
