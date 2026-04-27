<?php


require("model.php");

function readMovieController(){
 
    $movies = getAllMovies();
    $category = [];
    
    foreach ($movies as $mvs){
      $allmovie = $mvs -> category_name;
      if(!isset($category[$allmovie])){
        $category[$allmovie] = [];
      }
      $category[$allmovie][] = $mvs;
    }

    return $category;
}

function readCategoryController(){

  return getCategory();
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

function addProfileController(){
    
  $nom = $_REQUEST['nom'];
  $avatar = $_REQUEST['avatar'];
  $age_restriction = $_REQUEST['age_restriction'];
  
  $ok = addProfile($nom, $avatar, $age_restriction);

  if ($ok!=0){
    return "Le profil $nom à été ajouté avec succès!";
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

function readMovieCategoryController($movies) {
  
    $category = []; 
    foreach($movies as $m) {
    
        $cat = $m->category_name;


        $category[$cat][] = $m;
    }

 
    return $category;
}

