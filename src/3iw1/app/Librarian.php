<?php

namespace DesignPatterns\IW1;

abstract class Librarian
{
    protected static ?BookComponent $booksByCategory = null;

    public static function getBooksByCategory()
    {
        if (self::$booksByCategory == null) {
            $book1 = (new BookBuilder())
                ->fiction()
                ->title("Le seigneur des anneaux")
                ->writtenBy('J.R.R. Tolkien')
                ->description("Trouver l'anneau")
                ->isbn("1234567890")
                ->lang('fr_FR')
                ->publishedAt('12/09/2000')
                ->price(12.00)
                ->pegi18()
                ->build();

            $book2 = (new BookBuilder())
                ->fiction()
                ->title("Harry Potter")
                ->writtenBy('J.K. Rowling')
                ->description("Histoire de sorcier")
                ->isbn("0987654321")
                ->lang('fr_FR')
                ->publishedAt('01/01/1999')
                ->price(15.00)
                ->pegi7()
                ->build();

            $book3 = (new BookBuilder())
                ->fiction()
                ->title("Mort sur le Nil")
                ->writtenBy('Agatha Christie')
                ->description("Policier")
                ->isbn("2468013579")
                ->lang('fr_FR')
                ->publishedAt('10/10/2010')
                ->price(9.00)
                ->pegi18()
                ->build();

            $root = new BookCategory('Librairie');
            $root->addChild(
                (new BookCategory("Romans Fantastiques"))
                    ->addChild($book1)
                    ->addChild($book2)
            );
            $root->addChild(
                (new BookCategory("Romans Policiers"))
                    ->addChild($book3)
            );

            self::$booksByCategory = $root;
        }
        return self::$booksByCategory;
    }

    public static function getBook(string $title, int $age, bool $wantsEBook = false)
    {
        $book = self::getBooksByCategory()->searchByTitle($title);

        $library = new Library();
        $pegiProxy = new PegiProxy($library);

        $book = $pegiProxy->readBook($book, $age);

        if ($age < 25) {
            $book = new DiscountedBook($book);
        }

        if ($wantsEBook) {
            $adapter = new EBookAdapter($book);
            // Appeler une API externe
            echo "Appel d'un service externe";
            return $book;
        }

        return $book;
    }
}
