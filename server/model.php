<?php

define("HOST", "localhost");
define("DBNAME", "SAE203");
define("DBLOGIN", "usersae203");
define("DBPWD", "Limoges1!");


function getAllMovies($valueage){
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "SELECT Movie.id, Movie.name, Movie.image, Category.name AS category_name FROM Movie, Category WHERE Movie.id_category = Category.id AND Movie.min_age <= :age";   
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':age', $valueage);
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
  
    $sql = "INSERT INTO Profile (nom, age_restriction) VALUES (:nom, :age_restriction)";
 
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


  function readCategory($id){
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "SELECT * FROM Category WHERE id = :id"; 
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ); 
}


function getAllProfile(){
$cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
$sql ="SELECT *FROM Profile";
$stmt = $cnx->prepare($sql);
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_OBJ);
}
   


function updateProfile($id, $nom, $age_restriction){
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "UPDATE Profile SET nom = :nom, age_restriction = :age_restriction WHERE id = :id";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':age_restriction', $age_restriction);
    
    return $stmt->execute(); 
}


function addFavoris($id_profile, $id_movie) {
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "INSERT INTO Favoris (id_profile, id_movie) VALUES (:id_profile, :id_movie)";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':id_profile', $id_profile);
    $stmt->bindParam(':id_movie', $id_movie);
    return $stmt->execute();
}




function readFavoris($id_profile) {
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "SELECT Movie.* FROM Movie INNER JOIN Favoris ON Movie.id = Favoris.id_movie WHERE Favoris.id_profile = :id_profile";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':id_profile', $id_profile);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function deleteFavoris($id_profile, $id_movie) {
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "DELETE FROM Favoris WHERE id_profile = :id_profile AND id_movie = :id_movie";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':id_profile', $id_profile);
    $stmt->bindParam(':id_movie', $id_movie);
    return $stmt->execute();
}

function getFeatured($age){
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "SELECT * FROM Movie WHERE featured = 1 AND min_age <= :age";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':age', $age);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}


function getNumberProfile(){
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "SELECT COUNT(*) AS total FROM Profile";
    $stmt = $cnx->prepare($sql);
	$stmt->execute();
	return $stmt->fetch(PDO::FETCH_ASSOC);
}   

function getAvgMovieByProfileInFavoris(){
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "SELECT AVG(favoris_by_profil) as average_by_favoris FROM (SELECT COUNT(*) AS favoris_by_profil FROM Favoris GROUP BY id_profile) AS avg_movie_by_profile_in_favoris";
    $stmt = $cnx->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);

}

function getAllMovie(){
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "SELECT COUNT(*) AS all_movie FROM Movie";
    $stmt = $cnx->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
}

function getMostMovieInFavoris(){
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "SELECT Movie.name, COUNT(id_movie) AS all_fav FROM Favoris JOIN Movie ON Favoris.id_movie = Movie.id GROUP BY id_movie ORDER BY all_fav DESC LIMIT 1"; 
    $stmt = $cnx->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
}


function getCategoryPopular(){
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "SELECT Category.name, COUNT(Favoris.id_movie) AS nb_fav FROM Favoris INNER JOIN Movie ON Favoris.id_movie = Movie.id INNER JOIN Category ON Movie.id_category = Category.id GROUP BY Category.id ORDER BY nb_fav DESC LIMIT 1"; 
    $stmt = $cnx->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
}


function readSearch($search){
     $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
     $sql = "SELECT *FROM Movie WHERE name LIKE '%$search%'";
     $stmt = $cnx->prepare($sql);
     $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}
