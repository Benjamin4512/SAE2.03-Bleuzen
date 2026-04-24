<?php

define("HOST", "localhost");
define("DBNAME", "bleuzen1");
define("DBLOGIN", "bleuzen1");
define("DBPWD", "bleuzen1");


function getAllMovies(){
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "select id, name, image from Movie";
    $stmt = $cnx->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function addMovie($name, $director, $year, $length, $description, $id_category, $image, $trailer, $min_age){

    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
  
    $sql = "INSERT INTO Movie (name, year, length, description, director, id_category, image, trailer, min_age)
            VALUES (:name, :year, :length, :description, :director, :id_category, :image, :trailer, :min_age)";
 
    $stmt = $cnx->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':director', $director);
    $stmt->bindParam(':year', $year);
    $stmt->bindParam(':length', $length);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':id_category', $id_category);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':trailer', $trailer);
    $stmt->bindParam(':min_age', $min_age);
  
    $stmt->execute();
   
    $res = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $res; 
}

    function readMovieDetail($id){

    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql ="SELECT Movie.*, Category.name AS category_name FROM Movie INNER JOIN Category ON Movie.id_category = Category.id WHERE Movie.id = :id";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $movie = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $movie;
    }