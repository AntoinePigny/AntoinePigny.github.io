<?php
 //Ouvre une connexion à un serveur MySQL
 $host='127.0.0.1'; $user='root'; $passwd="0000"; $dbname="dwm8";
 $link = mysqli_connect($host, $user, $passwd, $dbname);

// Information renseignée par l'utilisateur recupéré en GET
$id = '25';

// Création de la query
$query= "SELECT `id`, `email`
         FROM `users`
         WHERE `id` = '$id'
         LIMIT 1";

//Envoi de la query à MySQL
$result = mysqli_query($link, $query);

//Récupération des résultats
$array = mysqli_fetch_assoc($result);

echo "#" . $array['id'] . "Users : " . $array['email'] . "<br>";

//Création de query avec des marqueurs remplacés plus tard
$query = "UPDATE `users`
          SET `email` = ?
          WHERE `id` = ?";

//Crée une requete préparée
$stmt = mysqli_prepare($link, $query);

//liaison des marqueurs avec les variables
mysqli_stmt_bind_param($stmt, 'si', $email, $id);

//Exécution de la requete
$result = mysqli_stmt_execute($stmt);


if ($result = true) {
  echo "Mise à jour réussie";
}
