<?php

use DesignPatterns\IW2\BookBuilder;
use DesignPatterns\IW2\BookFactory;
use DesignPatterns\IW2\EnglishBookFactory;
use DesignPatterns\IW2\FrenchBookFactory;

require_once "./vendor/autoload.php";

// $enBookFactory = new EnglishBookFactory();
// $frBookFactory = new FrenchBookFactory();
// $fictionBook = $enBookFactory->createFictionBook("The Lord of the Rings", "J.R.R Tolkien");
// $historyBook = $frBookFactory->createHistoryBook("Un livre d'histoire", "Un auteur");

$book = (new BookBuilder())
    ->fictional()
    ->french()
    ->title("Le Seigneur des Anneaux")
    ->author("J.R.R Tolkien")
    ->isbn("1234567890")
    ->publishedAt("1998")
    ->build();

echo $book->getDetails();
