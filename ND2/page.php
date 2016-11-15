<?php
$mysqli = new mysqli("127.0.0.1", "root", "just", "NFQ", 3306);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";

$sql = "SELECT bookId, title, year FROM Books";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<a href='./book.php/?id={$row['bookId']}'>". 
"<br> bookId: ". $row['bookId']. " - title: ". $row['title']. " " . $row['year'] . "<br></a>";
     }
} else {
     echo "0 results";
}

$mysqli->close();


?>
