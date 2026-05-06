<?php

// Activer le rapport d'erreurs PHP
error_reporting(E_ALL);

// Forcer l'affichage des erreurs à l'écran
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require("controller.php");


if (isset($_REQUEST['todo'])) {


  header('Content-Type: application/json');


  $todo = $_REQUEST['todo'];


  switch ($todo) {

    case 'addMovie':
      $data = addMovieController();
      break;

    case 'addProfile':
      $data = addProfileController();
      break;

    case 'updateProfile':
      $data = updateProfileController();
      break;

    case 'readMovies':
      $data = readMovieController();
      break;

    case 'readMoviesDetail':
      $data = readMovieDetailController();
      break;

    case 'readCategory':
      $data = readCategoryController();
      break;

    case 'readProfile':
      $data = readProfileController();
      break;

    case 'addFavoris':
      $data = addFavorisController();
      break;

    case 'readFavoris':
      $data = readFavorisController();
      break;

    case 'deleteFavoris':
      $data = deleteFavorisController();
      break;

    case 'readFeatured':
      $data = readFeaturedController();
     break;
     
     case 'readAllStats':
     $data = readAllStatsController();
     break;
     
     case 'readSearch':
      $data = readSearchController();
      break;

    default:
      echo json_encode('[error] Unknown todo value');
      http_response_code(400);
      exit();
  }

  if ($data === false) {
    echo json_encode('[error] Controller returns false');
    http_response_code(500);
    exit();
  }

  echo json_encode($data);
  http_response_code(200);
  exit();
}

http_response_code(404);
