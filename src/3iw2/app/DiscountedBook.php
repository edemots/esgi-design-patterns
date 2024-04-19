<?php

namespace DesignPatterns\IW2;

use Error;
use NumberFormatter;

class DiscountedBook implements BookInterface
{
    const DISCOUNT = 0.1;

    public function __construct(protected BookInterface $book)
    {
    }

    public function getPrice(): float
    {
        return $this->book->getPrice() * (1 - self::DISCOUNT);
    }

    public function getPegi(): int
    {
        return $this->book->getPegi();
    }

    public function getDetails($depth = 0): string
    {
        $offset = implode("", array_fill(0, $depth, "\t"));
        $formatter = NumberFormatter::create($this->book->lang, NumberFormatter::CURRENCY);

        return match ($this->book->lang) {
            "fr_FR" => $offset . "• {$this->book->title} ({$this->book->isbn})" . PHP_EOL . $offset . "écrit par {$this->book->authorName} en {$this->book->publishedAt}. A partir de {$formatter->format($this->getPrice())} (\e[9m{$formatter->format($this->book->getPrice())}\e[0m)",
            "en_GB" => $offset . "• {$this->book->title} ({$this->book->isbn})" . PHP_EOL . $offset . "written by {$this->book->authorName} in {$this->book->publishedAt}. Starting at {$formatter->format($this->getPrice())} (\e[9m{$formatter->format($this->book->getPrice())}\e[0m)",
            default => throw new Error("La langue n'est pas prise en charge."),
        }
            . PHP_EOL;
    }

    public function display($depth = 0): void
    {
        echo $this->getDetails($depth);
    }

    public function searchByTitle(string $title): ?BookComponentInterface
    {
        return $this->book->searchByTitle($title);
    }
}
