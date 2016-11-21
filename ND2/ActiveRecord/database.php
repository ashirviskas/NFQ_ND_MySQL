<?php

/**
 * Created by PhpStorm.
 * User: matas
 * Date: 16.11.21
 * Time: 20.06
 */

class database
{
    private $connection;

    public function __construct()
    {
        $this->connection = new mysqli("127.0.0.1", "root", "just", "NFQ", 3306);
        if ($this->connection->connect_errno) {
            echo "Failed to connect to MySQL: (" . $this->connection->connect_errno . ") " . $this->connection->connect_error;
        }
        echo $this->connection->host_info . "\n";
    }

    public function getAllBooks()
    {
        return $this->connection->query('SELECT * FROM Books');
    }

    public function getById($id)
    {
        return $this->connection->query('SELECT * FROM Books WHERE Books.bookId=' . $id);
    }

    public function getBooksWithAuthors()
    {
        $result = $this->connection->query('select b.*, 
group_concat(DISTINCT a.name ORDER BY a.name DESC SEPARATOR \', \') 
from Books b 
inner join authors_books ab on b.bookId = ab.bookId 
inner join Authors a on ab.authorId = a.authorId 
group by b.BookId;');
        //$books=$result ->fetch_assoc();

        $list = array();
        while ($row = $result->fetch_assoc()) {
            $book = new Book();
            //echo $row['bookId'];
            //echo $row["group_concat(DISTINCT a.name ORDER BY a.name DESC SEPARATOR ', ')"];
            $book->setYear($row['year']);
            $book->setName($row['title']);
            $book->setBookId($row['bookId']);
            $book->setGenre($row['genre']);
            $book->setAuthors($row['group_concat(DISTINCT a.name ORDER BY a.name DESC SEPARATOR \', \')']);

            $list[]=$book;

        }
        return $list;
    }
}
