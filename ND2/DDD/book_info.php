

<?php
include 'Book.php';
include 'BooksRepository.php';

$connection = new mysqli("127.0.0.1", "root", "just", "NFQ", 3306);
if ($connection->connect_errno) {
    echo "Failed to connect to MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error;
}
echo $connection->host_info . "\n";
$book = new Book();
$booksRepository = new BooksRepository($connection);



$book = $booksRepository->getById($_GET['id']);
echo $book->getName();
echo "<a href ='../page.php'> Grįžti atgal </a>";

?>

