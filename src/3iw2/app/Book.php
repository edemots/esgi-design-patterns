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
        protected string $title,
        protected string $authorName,
        protected string $lang,
        protected string $isbn,
        protected string $publishedAt,
        protected float $price,
    ) {
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getDetails(): string
    {
        $formatter = NumberFormatter::create($this->lang, NumberFormatter::CURRENCY);

        return match ($this->lang) {
            "fr_FR" => "{$this->title} ({$this->isbn})" . PHP_EOL . "écrit par {$this->authorName} en {$this->publishedAt}. A partir de {$formatter->format($this->price)}",
            "en_GB" => "{$this->title} ({$this->isbn})" . PHP_EOL . "written by {$this->authorName} in {$this->publishedAt}. Starting at {$formatter->format($this->price)}",
            default => throw new Error("La langue n'est pas prise en charge."),
        }
            . PHP_EOL;
    }
}
