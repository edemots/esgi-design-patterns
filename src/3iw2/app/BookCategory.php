<?php

namespace DesignPatterns\IW2;

class BookCategory implements BookComponentInterface
{
    /**
     * @var BookComponentInterface[]
     */
    protected $children = [];

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
        foreach ($this->children as $child) {
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
}
