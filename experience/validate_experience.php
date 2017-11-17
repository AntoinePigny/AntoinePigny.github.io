<?php
  require_once '../validate_general.php';

  function validateExperience()
  {
    $errors = [];
    $error = validateRequired($_POST['title']);
    if ($error) {
      $errors['title'] = $error;
    }
    $error = validateRequired($_POST['description']);
    if ($error) {
      $errors['description'] = $error;
    }
    $error = validateDate($_POST['date_begin'], $_POST['date_end']);
    if($error) {
      $errors['date'] = $error;
    }
    return $errors;
  }


  function validateDate($str1, $str2) {
   if(empty($str1) && !empty($str2)){
     return "Vous avez une date de fin mais pas de date de début.";
   }
   if(empty($str1)){
     return "Veuillez entrer une date de début.";
   }
   if(!empty($str2)){
     $str1 = str_replace('-', '', $str1);
     $str2 = str_replace('-', '', $str2);
     if ($str2 < $str1) {
       return "Votre date de fin est antérieure à votre date de début";
     }
   }
  }
