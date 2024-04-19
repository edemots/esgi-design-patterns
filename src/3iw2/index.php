<?php

use DesignPatterns\IW2\Librarian;

require_once "./vendor/autoload.php";

$book = Librarian::getBook("mOrt Sur le Nil", age: 37);
echo $book->getDetails();
