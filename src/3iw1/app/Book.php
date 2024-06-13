<?php

namespace DesignPatterns\IW1;

abstract class Book implements BookInterface, BookComponent
{
    public function __construct(
        public string $title,
        public string $description,
        public string $author,
        public string $lang,
        public string $isbn,
        public string $publishedAt,
        public float $price,
        public int $pegi,
        protected bool $available = true,
    ) {
    }

    public function getDetails(int $depth = 0): string
    {
        $tabulations = implode('', array_fill(0, $depth, "\t")) . "  ";
        return match ($this->lang) {
            "fr_FR" => "{$this->title} ({$this->isbn})" . PHP_EOL .
                $tabulations . $this->description . PHP_EOL .
                $tabulations . "écrit par {$this->author}" . PHP_EOL .
                $tabulations . "publié le {$this->publishedAt}" . PHP_EOL .
                $tabulations . "au prix de {$this->price} €",
            'en_EN' => $this->title . PHP_EOL .
                $tabulations . $this->description . PHP_EOL .
                $tabulations . "written by {$this->author}" . PHP_EOL .
                $tabulations . "published the {$this->publishedAt}" . PHP_EOL .
                $tabulations . "for {$this->price} £",
        }
        . PHP_EOL;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getPegi(): int
    {
        return $this->pegi;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function makeAvailable(): void
    {
        $this->available = true;
    }

    public function makeUnavailable(): void
    {
        $this->available = false;
    }

    public function isAvailable(): bool
    {
        return $this->available;
    }

    public function displayHierarchy(int $depth = 0): void
    {
        echo implode('', array_fill(0, $depth, "\t")) . "• " . $this->getDetails($depth) . PHP_EOL;
    }

    public function searchByTitle(string $title): ?BookComponent
    {
        if ($this->getTitle() === $title) {
            return $this;
        }
        return null;
    }
}
