<?php

namespace DesignPatterns\IW1;

use Error;

abstract class BookFactory implements BookFactoryInterface
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
    ): BookInterface {
        return match ($type) {
            "fiction" => new FictionBook(
                $title,
                $description,
                $author,
                $lang,
                $isbn,
                $publishedAt,
                $price,
                $pegi,
            ),
            "history" => new HistoryBook(
                $title,
                $description,
                $author,
                $lang,
                $isbn,
                $publishedAt,
                $price,
                $pegi,
            ),
            default => throw new Error("Type de livre non géré."),
        };
    }
}
