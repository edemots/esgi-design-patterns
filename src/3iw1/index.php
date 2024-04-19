<?php

use DesignPatterns\IW1\Librarian;

require_once "./vendor/autoload.php";

$book = Librarian::getBook("Harry Potter", 24, true);
echo $book->getDetails();
