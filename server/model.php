<?php

define("HOST", "localhost");
define("DBNAME", "bleuzen1");
define("DBLOGIN", "bleuzen1");
define("DBPWD", "bleuzen1");


function getAllMovies($age){
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "SELECT Movie.id, Movie.name, Movie.image, Category.name AS category_name FROM Movie, Category WHERE Movie.id_category = Category.id AND Movie.min_age <= :age";   
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':age', $age);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function getCategory(){
$cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
$sql ="SELECT *FROM Category";
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

function addProfile($nom, $age_restriction){

    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
  
    $sql = "INSERT INTO Profile (nom, age_restriction)
            VALUES (:nom, :age_restriction)";
 
    $stmt = $cnx->prepare($sql);

    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':age_restriction', $age_restriction);
  
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

    function readCategory(){

    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql ="SELECT id, name from Category";
    $stmt = $cnx->prepare($sql);
    $stmt->execute();
    return  $stmt->fetchAll(PDO::FETCH_OBJ);
    
    }



function getAllProfile(){
$cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
$sql ="SELECT *FROM Profile";
$stmt = $cnx->prepare($sql);
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_OBJ);
}
   