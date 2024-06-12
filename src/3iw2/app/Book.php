<?php

namespace DesignPatterns\IW2;

use Error;
use NumberFormatter;

abstract class Book implements BookInterface
{
    // protected string $title;

    // protected string $authorName;

    // public function __construct(
    //     string $title,
    //     string $authorName
    // ) {
    //     $this->title = $title;
    //     $this->authorName = $authorName;
    // }
    public function __construct(
        public string $title,
        public string $authorName,
        public string $lang,
        public string $isbn,
        public string $publishedAt,
        protected float $price,
        protected int $pegi,
        protected bool $available = true,
    ) {
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getPegi(): int
    {
        return $this->pegi;
    }

    public function makeAvailable()
    {
        $this->available = true;
    }

    public function makeUnavailable()
    {
        $this->available = false;
    }

    public function isAvailable(): bool
    {
        return $this->available;
    }

    public function getDetails($depth = 0): string
    {
        $offset = implode("", array_fill(0, $depth, "\t"));
        $formatter = NumberFormatter::create($this->lang, NumberFormatter::CURRENCY);

        return match ($this->lang) {
            "fr_FR" => $offset . "• {$this->title} ({$this->isbn})" . PHP_EOL . $offset . "écrit par {$this->authorName} en {$this->publishedAt}. A partir de {$formatter->format($this->price)}",
            "en_GB" => $offset . "• {$this->title} ({$this->isbn})" . PHP_EOL . $offset . "written by {$this->authorName} in {$this->publishedAt}. Starting at {$formatter->format($this->price)}",
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
        if (strtolower($this->title) === strtolower($title)) {
            return $this;
        }
        return null;
    }
}
