<?php


require("model.php");

function readMovieController(){
 
    $movies = getAllMovies();
    return $movies;
}

function addMovieController(){
    
  $name = $_REQUEST['name'];
  $director = $_REQUEST['director'];
  $year = $_REQUEST['year'];
  $length = $_REQUEST['length'];
  $description = $_REQUEST['description'];
  $id_category = $_REQUEST['id_category'];
  $image = $_REQUEST['image'];
  $trailer = $_REQUEST['trailer'];
  $min_age = $_REQUEST['min_age'];

  $ok = addMovie($name, $director, $year, $length, $description, $id_category, $image, $trailer, $min_age);

  if ($ok!=0){
    return "Le film $name à été ajouté avec succès!";
  }
  else{
    return false;
  }
}

function readMovieDetailController(){
  $id = $_REQUEST ['id'];
  $movie = readMovieDetail($id);

  if ($movie != false){
  return $movie;

  }
  
}



