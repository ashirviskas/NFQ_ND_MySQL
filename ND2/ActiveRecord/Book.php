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
}