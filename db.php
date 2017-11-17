<?php

function connect()
{
  $link = mysqli_connect('localhost', 'root', '0000', 'dwm8', 3306);
  mysqli_set_charset($link, 'utf8');
  return $link;
}

function checkLogin($email, $password)
{
  $email = clean($email);
  $password = saltThis($password);
  $link = connect();
  $result = mysqli_query($link,
  "SELECT `id` FROM `users` WHERE `email` = '$email' AND `password` = '$password' LIMIT 1;");
     if (!$result) {
       var_dump('Aucun résultat');
     } else {
       $fetch = mysqli_fetch_row($result);
       return $fetch;
     }
}
#On peut securiser davantage un pw en y ajoutant un rain de sel (SALT), (une chaine de caractères définie qui se concatène au pwd)
function saltThis($var)
{
  $salt = 'ZidaneIlluminati';
  return md5($var . $salt);
}

function clean($var)
{
  #return filter_var($var, "full_special_chars");
  return htmlspecialchars($var);
}


//ici le "array" specifie le type de variable que doit etre $data
//les brackets sont une forme d'ecriture de variables (l'ensemble entre brackets constitue la variable désignée par $)
function insertUser(array $data)
{
  $link = connect();
  $sql = "INSERT INTO `users` (`id`, `email`, `password`)
    VALUES (NULL, '${data['email']}', '${data['password']}');";

  $result = mysqli_query($link, $sql);
  return $result;
}

function insertExperience(array $data)
{
  $link = connect();
  $user_id = $_SESSION['user'][0];
  $sql = "INSERT INTO `Experiences` (`id`, `user_id`, `date_begin`, `date_end`, `title`, `description`)
    VALUES (NULL, '$user_id', '${data['date_begin']}', '${data['date_end']}', '${data['title']}', '${data['description']}');";

  $result = mysqli_query($link, $sql);
  return $result;
}
