<?php

namespace DesignPatterns\IW1;

interface BookFactoryInterface
{
    public function createBook(
        string $type,
        string $title,
        string $description,
        string $author,
        string $lang,
        string $isbn,
        string $publishedAt,
        float $price,
        int $pegi,
    ): BookInterface;

    public function createFictionBook(
        string $title,
        string $description,
        string $author,
        string $isbn,
        string $publishedAt,
        float $price,
        int $pegi,
    ): FictionBook;

    public function createHistoryBook(
        string $title,
        string $description,
        string $author,
        string $isbn,
        string $publishedAt,
        float $price,
        int $pegi,
    ): HistoryBook;
}
