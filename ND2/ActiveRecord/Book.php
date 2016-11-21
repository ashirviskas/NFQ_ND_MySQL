<?php

/**
 * Created by PhpStorm.
 * User: matas
 * Date: 16.11.15
 * Time: 17.49
 */
class Book
{
    private $name;
    private $year;
    private $genre;
    private $bookId;
    private $authors;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    /**
     * @param mixed $authors
     * @return Book
     */
    public function setAuthors($authors)
    {
        $this->authors = $authors;
        return $this;
    }

    /**
     * @param mixed $name
     * @return Book
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBookId()
    {
        return $this->bookId;
    }

    /**
     * @param mixed $bookId
     */
    public function setBookId($bookId)
    {
        $this->bookId = $bookId;
    }


    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     * @return Book
     */
    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     * @return Book
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
        return $this;
    }
    public function load($id){
        $connection = new mysqli("127.0.0.1", "root", "just", "NFQ", 3306);
        if ($connection->connect_errno) {
            echo "Failed to connect to MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error;
        }
        echo $connection->host_info . "\n";
        $res = $connection->query('SELECT `b`.*, 
group_concat(DISTINCT a.name ORDER BY a.name DESC SEPARATOR \', \') as author
from Books b 
inner join authors_books ab on b.bookId = ab.bookId 
inner join Authors a on ab.authorId = a.authorId 
        WHERE `b`.`bookId`='. $id .'
        GROUP BY `b`.`BookId`;');
        $row = $res->fetch_assoc();
        $book = new Book();
        $book->setBookId($row['bookId']);
        $book->setName($row['title']);
        $book->setGenre($row['genreId']);
        $book->setYear($row['year']);
        $book->setAuthors($row['author']);
        return $book;
    }

    public function getBooksWithAuthors()
    {
        $connection = new mysqli("127.0.0.1", "root", "just", "NFQ", 3306);
        if ($connection->connect_errno) {
            echo "Failed to connect to MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error;
        }
        echo $connection->host_info . "\n";
        $result = $connection->query('select b.*, 
group_concat(DISTINCT a.name ORDER BY a.name DESC SEPARATOR \', \') as author
from Books b 
inner join authors_books ab on b.bookId = ab.bookId 
inner join Authors a on ab.authorId = a.authorId 
group by b.BookId;');


        $list = array();
        while ($row = $result->fetch_assoc()) {
            $book = new Book();
            //echo $row['bookId'];
            //echo $row["group_concat(DISTINCT a.name ORDER BY a.name DESC SEPARATOR ', ')"];
            $book->setYear($row['year']);
            $book->setName($row['title']);
            $book->setBookId($row['bookId']);
            $book->setGenre($row['genre']);
            $book->setAuthors($row['author']);

            $list[]=$book;

        }
        return $list;
    }
}