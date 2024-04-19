<?php

namespace DesignPatterns\IW2;

use Error;

abstract class BookFactory implements BookFactoryInterface
{
    protected function createBook(
        string $type,
        string $lang,
        string $title,
        string $authorName,
        string $isbn,
        string $publishedDate,
        float $price,
        int $pegi,
    ): BookInterface {
        return match ($type) {
            "fiction" => new FictionBook($title, $authorName, $lang, $isbn, $publishedDate, $price, $pegi),
            "history" => new HistoryBook($title, $authorName, $lang, $isbn, $publishedDate, $price, $pegi),
            default => throw new Error("Type de livre inconnu.")
        };
    }
}
