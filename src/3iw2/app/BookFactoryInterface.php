<?php

namespace DesignPatterns\IW2;

interface BookFactoryInterface
{
    public function createFictionBook(
        string $title,
        string $authorName,
        string $isbn,
        string $publishedDate,
    ): BookInterface;

    public function createHistoryBook(
        string $title,
        string $authorName,
        string $isbn,
        string $publishedDate,
    ): BookInterface;
}
