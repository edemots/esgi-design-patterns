<?php

namespace DesignPatterns\IW2;

use Error;

class BookBuilder
{
    protected string $type;
    protected string $lang;
    protected string $title;
    protected string $authorName;
    protected string $isbn;
    protected string $publishedAt;

    public function fictional(): self
    {
        $this->type = "fiction";
        return $this;
    }

    public function historical(): self
    {
        $this->type = "history";
        return $this;
    }

    public function french(): self
    {
        $this->lang = "fr_FR";
        return $this;
    }

    public function british(): self
    {
        $this->lang = "en_GB";
        return $this;
    }

    public function title(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function author(string $authorName): self
    {
        $this->authorName = $authorName;
        return $this;
    }

    public function isbn(string $isbn): self
    {
        $this->isbn = $isbn;
        return $this;
    }

    public function publishedAt(string $publishedAt): self
    {
        $this->publishedAt = $publishedAt;
        return $this;
    }

    public function build(): BookInterface
    {
        $factory = match ($this->lang) {
            "fr_FR" => new FrenchBookFactory(),
            "en_GB" => new EnglishBookFactory(),
            default => throw new Error("Langue non prise en charge.")
        };
        $method = match ($this->type) {
            "fiction" => 'createFictionBook',
            "history" => 'createHistoryBook',
            default => throw new Error("Type non pris en charge.")
        };
        $book = $factory->{$method}(
            $this->title,
            $this->authorName,
            $this->isbn,
            $this->publishedAt
        );

        return $book;
    }
}
