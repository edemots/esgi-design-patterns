<?php

use DesignPatterns\IW2\AuthorSortingStrategy;
use DesignPatterns\IW2\BorrowBookCommand;
use DesignPatterns\IW2\Librarian;
use DesignPatterns\IW2\PriceSortingStrategy;
use DesignPatterns\IW2\ReturnBookCommand;
use DesignPatterns\IW2\TitleSortingStrategy;

require_once "./vendor/autoload.php";

Librarian::getBooksByCategories()
    ->setSortingStrategy(new PriceSortingStrategy('desc'))
    ->display();

// $book = Librarian::getBook("mOrt Sur le Nil", age: 37);
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
