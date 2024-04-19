<?php

namespace DesignPatterns\IW1;

use Error;

class BookBuilder
{
    protected string $type;
    protected string $title;
    protected string $description;
    protected string $author;
    protected string $lang;
    protected string $isbn;
    protected string $publishedAt;
    protected float $price;
    protected int $pegi;

    public function fiction(): self
    {
        $this->type = "fiction";

        return $this;
    }

    public function history(): self
    {
        $this->type = "history";

        return $this;
    }

    public function title(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function description(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function writtenBy(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function lang(string $lang): self
    {
        $this->lang = $lang;

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

    public function price(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function pegi3(): self
    {
        $this->pegi = 3;

        return $this;
    }

    public function pegi7(): self
    {
        $this->pegi = 7;

        return $this;
    }

    public function pegi18(): self
    {
        $this->pegi = 18;

        return $this;
    }

    public function build(): BookInterface|BookComponent
    {
        $factory = match ($this->lang) {
            'fr_FR' => new FrenchBookFactory(),
            'en_EN' => new EnglishBookFactory(),
            default => throw new Error("Cette langue n'est pas encore supportée."),
        };
        return match ($this->type) {
            "fiction" => $factory->createFictionBook(
                $this->title,
                $this->description,
                $this->author,
                $this->isbn,
                $this->publishedAt,
                $this->price,
                $this->pegi,
            ),
            "history" => $factory->createHistoryBook(
                $this->title,
                $this->description,
                $this->author,
                $this->isbn,
                $this->publishedAt,
                $this->price,
                $this->pegi,
            ),
            default => throw new Error("Ce type de livre n'est pas supporté"),
        };
    }
}
