<?php

use DesignPatterns\IW1\AuthorSortingStrategy;
use DesignPatterns\IW1\BorrowBookCommand;
use DesignPatterns\IW1\Librarian;
use DesignPatterns\IW1\PriceSortingStrategy;
use DesignPatterns\IW1\ReturnBookCommand;
use DesignPatterns\IW1\TitleSortingStrategy;

require_once "./vendor/autoload.php";

// $book = Librarian::getBook("Harry Potter", 24, true);
// echo $book->getDetails();

// if ($book->isAvailable()) {
//     $command = new BorrowBookCommand();
// } else {
//     $command = new ReturnBookCommand();
// }
// $command->setBook($book)->execute();


// if ($book->isAvailable()) {
//     $command = new BorrowBookCommand();
// } else {
//     $command = new ReturnBookCommand();
// }
// $command->setBook($book)->execute();

Librarian::getBooksByCategory()
    ->setSortingStrategy(new PriceSortingStrategy('desc'))
    ->displayHierarchy();
