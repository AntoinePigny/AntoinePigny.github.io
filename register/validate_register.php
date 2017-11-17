<?php
  require_once '../validate_general.php';
/**
* Verifie la validité du formulaire register
* @return array | void
*/
function validateRegister()
//A reexaminer entierement (pour comprehension)
{
  $errors = [];
  $error = validateRequired($_POST['firstname']);
  if ($error) {
    $errors['firstname'] = $error;
  }
  $error = validateRequired($_POST['lastname']);
  if ($error) {
    $errors['lastname'] = $error;
  }
  $error = validateEmail($_POST['email']);
  if ($error) {
    $errors['email'] = $error;
  }
  $error = validatePassword($_POST['password']);
  if ($error) {
    $errors['password'] = $error;
  }
  $error = validateIdentical($_POST['password'], $_POST['repassword']);
  if ($error) {
    $errors['repassword'] = $error;
  }


  return $errors;
}



/**
*Vérifie la validité d'une chaine de caractères
* @var $email email à valider
* @return string | void
*/
function validateEmail($email)
{
  $errors = array();
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return "Email invalide";
  }
}


/**
*Vérifie la validité d'une chaine de caractères
* @var $password Password à valider
* @return array | void
*/
function validatePassword($password)
{
  $errors = array();
    #verifie si length < 5 et renvoie une erreur si true
  if (strlen($password) < 5)
    $errors['invalidLength'] = "Mot de passe inférieur à 5 caractères";
    #verifie via regex si le pwd ne contient pas de chiffres
  if (!preg_match('/[[:digit:]]/', $password))
    $errors['invalidDigit'] = "Mot de passe ne comprend pas de chiffre";
    #verifie via regex si le pwd ne contient pas de caractères alphabet
  if (!preg_match('/[a-zA-Z]/', $password))
    $errors['invalidAlpha'] = "Mot de passe ne comprend pas de lettres";
    #on verifie si pwd transfo en lower est = pwd et on envoie une erreur si oui
  if (strtolower($password) == $password)
    $errors['invalidUpper'] = "Mot de passe ne comprend pas de majuscules";
    #on remplace les carac spéciaux de l'array specialAllow par _ et on compare au pwd de base, si ==  => erreur
  $specialAllow = ["&", "@", "#", "[", "]", "*", "%"];
  if (str_replace($specialAllow, "_", $password) == $password)
    $errors['invalidSpecial'] = "Mot de passe ne comprend pas de caractère spécial comme " . join($specialAllow);

  if (!empty($errors)) {
    return $errors;
  }
}
/**
*Vérifie la validité d'une chaine de caractères
* @var $str1 string à comparer
* @var $str2 string à comparer
* @return string | void
*/
function validateIdentical($str1, $str2)
{
  if ($str1 !== $str2) {
    return "Non identique...";
  }
}
