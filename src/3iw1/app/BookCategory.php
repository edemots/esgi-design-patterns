<?php

namespace DesignPatterns\IW1;

use Error;

class BookCategory implements BookComponent
{
    /** @var BookComponent[] */
    protected array $children;

    protected ?BookSortingStrategy $sortingStrategy = null;

    public function __construct(
        protected string $name
    ) {
    }

    public function addChild(BookComponent $bookComponent): self
    {
        $this->children[] = $bookComponent;
        return $this;
    }

    public function setSortingStrategy(BookSortingStrategy $sortingStrategy): self
    {
        $this->sortingStrategy = $sortingStrategy;
        return $this;
    }

    public function searchByTitle(string $title): ?BookComponent
    {
        foreach ($this->children as $child) {
            $book = $child->searchByTitle($title);
            if ($book !== null) {
                return $book;
            }
        }
        throw new Error("Aucun livre trouvé avec le titre {$title}");
    }

    public function displayHierarchy(int $depth = 0): void
    {
        echo implode('', array_fill(0, $depth, "\t")) . $this->name . PHP_EOL;
        if ($this->sortingStrategy != null) {
            $this->sortingStrategy->sort($this->children);
        }
        foreach ($this->children as $child) {
            if ($child instanceof BookCategory && $this->sortingStrategy != null) {
                $child->setSortingStrategy($this->sortingStrategy);
            }
            $child->displayHierarchy($depth + 1);
        }
    }
}
