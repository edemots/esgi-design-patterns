<?php

require_once "./vendor/autoload.php";

use DesignPatterns\TP2\Library;
use DesignPatterns\TP2\BookBuilder;
use DesignPatterns\TP2\BookCategory;
use DesignPatterns\TP2\DiscountedBook;
use DesignPatterns\TP2\Librarian;
use DesignPatterns\TP2\PegiProxy;

/*
$frBookFactory = new FrenchBookFactory();
$enBookFactory = new EnglishBookFactory();

$frFictionBook = $frBookFactory->createFictionBook("Le seigneur des anneaux", "J.R Tolkien");
$enFictionBook = $enBookFactory->createFictionBook("The Lord Of The Ring", "J.R Tolkien");
$frHistoryBook = $frBookFactory->createHistoryBook("Sapiens", "Un nom compliqué");
$enHistoryBook = $enBookFactory->createHistoryBook("Sapiens", "A complicated name");
*/

try {
    $book = Librarian::getBook("Harry Potter et la coupe de feu", 7, true);
    echo "Here is {$book->getDetails()}";
} catch (Throwable $th) {
    echo $th->getMessage();
}
