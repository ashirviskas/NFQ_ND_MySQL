<?php
include 'Book.php';
?>


<?php
$book = Book::load($_GET['id']);
echo $book->getName() . "     " . $book->getAuthors();
?>
