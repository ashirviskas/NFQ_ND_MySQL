<?php

/**
 * Created by PhpStorm.
 * User: matas
 * Date: 16.11.15
 * Time: 18.28
 */
class BooksRepository
{

    public function GetById($id)
    {
            $mysqli = new mysqli("127.0.0.1", "root", "just", "NFQ", 3306);
            if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            echo $mysqli->host_info . "\n";

            $sql = "SELECT * FROM Books WHERE bookId=$id";
            $ressult = $mysqli->query($sql);
            $result = $ressult ->fetch_assoc();
            $book = new Book();
            //var_dump($result);

            $book->setYear($result['year']);
            $book->setName($result['title']);
            $book->setBookId($result['bookId']);
            $book->setGenre($result['genre']);

        return $book;

    }
    public function getAll()
    {
        $mysqli = new mysqli("127.0.0.1", "root", "just", "NFQ", 3306);
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        echo $mysqli->host_info . "\n";

        $sql = "SELECT bookId, title, year FROM Books";
        $result = $mysqli->query($sql);
        $list = array();
        foreach($result as $row)
        {
            $book = new Book();

            $book->setYear($row['year']);
            $book->setName($row['title']);
            $book->setBookId($row['bookId']);
            $book->setGenre($row['genre']);
            $list->push($book);

        }
        return $list;
    }

}