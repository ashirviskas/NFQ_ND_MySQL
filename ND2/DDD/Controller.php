<?php
include 'Book.php';
include 'BooksRepository.php';
/**
 * Created by PhpStorm.
 * User: matas
 * Date: 16.11.15
 * Time: 18.31
 */
$book = new Book();
$BookID = $_GET['id'];
$controller = new Controller();
$book = $controller->getByID($BookID);
echo $book->getName();


class Controller
{

    public function  getByID($id){
        $repository = new BooksRepository();
        return $repository->GetById($id);
    }
}