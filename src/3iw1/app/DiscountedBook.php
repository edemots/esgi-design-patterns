<?php

namespace DesignPatterns\IW1;

class DiscountedBook implements BookInterface, BookComponent
{
    public function __construct(
        protected BookInterface|BookComponent $book
    ) {
    }

    public function searchByTitle(string $title): ?BookComponent
    {
        return $this->book->searchByTitle($title);
    }

    public function getDetails(int $depth = 0): string
    {
        $tabulations = implode('', array_fill(0, $depth, "\t")) . "  ";
        return match ($this->book->lang) {
            "fr_FR" => "{$this->book->title} ({$this->book->isbn})" . PHP_EOL .
                $tabulations . $this->book->description . PHP_EOL .
                $tabulations . "écrit par {$this->book->author}" . PHP_EOL .
                $tabulations . "publié le {$this->book->publishedAt}" . PHP_EOL .
                $tabulations . "au prix de {$this->getPrice()}€ ({$this->book->price}€)",
            'en_EN' => $this->book->title . PHP_EOL .
                $tabulations . $this->book->description . PHP_EOL .
                $tabulations . "written by {$this->book->author}" . PHP_EOL .
                $tabulations . "published the {$this->book->publishedAt}" . PHP_EOL .
                $tabulations . "for {$this->getPrice()}£ ({$this->book->price}£)",
        };
    }

    public function getPrice(): float
    {
        return $this->book->getPrice() * 0.9;
    }

    public function displayHierarchy(int $depth = 0): void
    {
        echo implode('', array_fill(0, $depth, "\t")) . "• " . $this->getDetails($depth) . PHP_EOL;
    }

    public function getPegi(): int
    {
        return $this->book->getPegi();
    }

    public function getTitle(): string
    {
        return $this->book->getTitle();
    }
}
