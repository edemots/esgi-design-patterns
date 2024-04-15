<?php

namespace DesignPatterns\IW2;

use Error;

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
    ) {
    }

    public function getDetails(): string
    {
        return match ($this->lang) {
            "fr_FR" => "{$this->title} ({$this->isbn})" . PHP_EOL . "écrit par {$this->authorName} en {$this->publishedAt}",
            "en_GB" => "{$this->title} ({$this->isbn})" . PHP_EOL . "written by {$this->authorName} in {$this->publishedAt}",
            default => throw new Error("La langue n'est pas prise en charge."),
        }
            . PHP_EOL;
    }
}
