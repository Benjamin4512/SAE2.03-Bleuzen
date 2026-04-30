<?php


require("model.php");

function readMovieController(){

    if (isset($_REQUEST['age'])) {
        $valueage = $_REQUEST['age'];
    } else {
        $valueage = 0; 
    }
    $movies = getAllMovies($valueage);
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
  $age_restriction = $_REQUEST['age_restriction'];
  
  $ok = addProfile($nom, $age_restriction);

  if ($ok!=0){
    return "Le profil $nom à été ajouté avec succès!";
  }
  else{
    return false;
  }
}

function updateProfileController(){
  
    $id = $_REQUEST['id']; 
    $nom = $_REQUEST['nom'];
    $age_restriction = $_REQUEST['age_restriction'];
    
 
    $ok = updateProfile($id, $nom, $age_restriction);

    if ($ok){
        return "Le profil $nom a été modifié avec succès !";
    }
    return false;
}



function readMovieDetailController(){
  $id = $_REQUEST ['id'];
  $movie = readMovieDetail($id);

  if ($movie != false){
  return $movie;

  }
  
}


function readProfileController(){

  return getAllProfile();
}

