<?php
include 'Book.php';
include 'BooksRepository.php';

$connection = new mysqli("127.0.0.1", "root", "just", "NFQ", 3306);
if ($connection->connect_errno) {
    echo "Failed to connect to MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error;
}
echo $connection->host_info . "\n";

$booksRepository=new BooksRepository($connection);

$books=$booksRepository->getBooksWithAuthors();
foreach ( $books as $book)
{
    echo "Name ".$book->getName()." Authors: ".$book->getAuthors()."<br>";
}



?>
