<?php

namespace DesignPatterns\IW2;

use Error;

abstract class Librarian
{
    protected static $booksByCategories;

    public static function getBooksByCategories()
    {
        if (!isset(self::$booksByCategories)) {
            $lotr = (new BookBuilder())
                ->fictional()
                ->british()
                ->title("Le Seigneur des Anneaux")
                ->author("J.R.R Tolkien")
                ->isbn("1234567890")
                ->publishedAt("1998")
                ->price(14.99)
                ->pegi7()
                ->build();
            $legendaires = (new BookBuilder())
                ->fictional()
                ->british()
                ->title("The Legendaries")
                ->author("Patrick Sobral")
                ->isbn("2345678765")
                ->publishedAt("2001")
                ->price(17.99)
                ->pegi7()
                ->build();

            $mortSurLeNil = (new BookBuilder())
                ->fictional()
                ->french()
                ->title("Mort sur le Nil")
                ->author("Agatha Christie")
                ->isbn("0987654321")
                ->publishedAt("2002")
                ->price(9.99)
                ->pegi13()
                ->build();

            $root = new BookCategory("Bibliothèque");
            $fictionCategory = new BookCategory("Fiction");
            $fictionFantasticCategory = new BookCategory("Fantastique");
            $fictionThrillerCategory = new BookCategory("Thriller");
            $root->addChild(
                $fictionCategory
                    ->addChild(
                        $fictionFantasticCategory->addChild($lotr)->addChild($legendaires)
                    )
                    ->addChild(
                        $fictionThrillerCategory->addChild($mortSurLeNil)
                    )
            );
            self::$booksByCategories = $root;
        }
        return self::$booksByCategories;
    }

    public static function getBook(string $bookTitle, int $age, bool $wantsEBook = false)
    {
        $book = self::getBooksByCategories()->searchByTitle($bookTitle);
        if (!$book) {
            throw new Error("Le livre {$bookTitle} n'est pas disponible.");
        }

        $baseLibrary = new Library();
        $pegiProxy = new PegiProxy($baseLibrary);
        $book = $pegiProxy->readBook($age, $book);

        if ($wantsEBook) {
            $eBookAdapter = new EBookAdapter($book);
            // Envoi vers une API d'EBook
            echo "Vous empruntez {$book->getDetails()} au format EBook.";
            return;
        }

        if ($age <= 25) {
            $book = new DiscountedBook($book);
        }
        return $book;
    }
}
