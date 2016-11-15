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

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
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
    public function load($id)
    {
        $mysqli = new mysqli("127.0.0.1", "root", "just", "NFQ", 3306);
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        echo $mysqli->host_info . "\n";
        $BookID = $_GET['id'];
        $sql = "SELECT * FROM Books WHERE bookId=$BookID";
        $ressult = $mysqli->query($sql);
        $result = $ressult ->fetch_assoc();

        //var_dump($result);

        $this->year=$result['year'];
        $this->name=$result['title'];
        $this->bookId=$result['bookId'];
        $this->genre=$result['genre'];
    }


}