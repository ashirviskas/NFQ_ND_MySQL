<?php

/**
 * Created by PhpStorm.
 * User: matas
 * Date: 16.11.15
 * Time: 18.28
 */
class BooksRepository
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getById($id){

        $res = $this->connection->query('SELECT `b`.*, 
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
    public function getAll()
    {

        $sql = "SELECT *  FROM Books";
        $result = $this->connection->query($sql);
        $list = array();
        while ($row = $result->fetch_assoc() )
        {
            $book = new Book();

            $book->setYear($row['year']);
            $book->setName($row['title']);
            $book->setBookId($row['bookId']);
            $book->setGenre($row['genre']);
            $book->setAuthors($row['author']);
            $list->push($book);

        }
        return $list;
    }
    public function getBooksWithAuthors()
    {

        $result = $this->connection->query('select b.*, 
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