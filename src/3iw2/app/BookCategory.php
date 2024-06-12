<?php

namespace DesignPatterns\IW2;

class BookCategory implements BookComponentInterface
{
    /**
     * @var BookComponentInterface[]
     */
    protected $children = [];

    protected ?BookSortingStrategy $sortingStrategy = null;

    public function __construct(protected string $title)
    {
    }

    public function addChild(BookComponentInterface $component): self
    {
        $this->children[] = $component;
        return $this;
    }

    public function display($depth = 0): void
    {
        $offset = implode("", array_fill(0, $depth, "\t"));
        echo $offset . $this->title . PHP_EOL;
        $depth++;

        if ($this->sortingStrategy != null) {
            $this->sortingStrategy->sort($this->children);
        }
        foreach ($this->children as $child) {
            if ($child instanceof BookCategory && $this->sortingStrategy != null) {
                $child->setSortingStrategy($this->sortingStrategy);
            }
            $child->display($depth);
        }
    }

    public function searchByTitle(string $title): ?BookComponentInterface
    {
        foreach ($this->children as $child) {
            $book = $child->searchByTitle($title);
            if ($book instanceof BookInterface) {
                return $book;
            }
        }
        return null;
    }

    public function setSortingStrategy(BookSortingStrategy $sortingStrategy)
    {
        $this->sortingStrategy = $sortingStrategy;
        return $this;
    }
}
