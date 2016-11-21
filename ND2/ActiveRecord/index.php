

<?php
include 'Book.php';
include 'database.php';

$database = new database();
echo "<table>";
echo "<th>Book Title</th><th>Authors</th>";
foreach ($database->getBooksWithAuthors() as $book)
{
    echo "<tr>";
    echo "<td>" .$book->getName() . "</td>";
    echo "<td>" .$book->getAuthors() . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "<a href ='../page.php'> Grįžti atgal </a>";

?>

