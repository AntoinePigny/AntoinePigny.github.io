<?php
 //Ouvre une connexion à un serveur MySQL
 $host='127.0.0.1'; $user='root'; $passwd="0000"; $dbname="dwm8";
 $link = mysqli_connect($host, $user, $passwd, $dbname);

//Information renseignée par l'utilisateur POST
$where = 'gmail';

//Création de la query
$query = "SELECT * FROM `users`
          WHERE `email` LIKE ?";

//Crée une requete préparée
$stmt = mysqli_prepare($link, $query);

//liaison des marqueurs avec les variables
mysqli_stmt_bind_param($stmt, 's', "%$where%"); //Le %...% indique que ce qui se trouve au milieu doit se trouver AU COEUR d'une string

//Exécution de la requete
$result = mysqli_stmt_execute($stmt);

//Association des variables de résultats
mysqli_stmt_bind_result($stmt, $id, $email); //Pour bind les results, il faut spécifier toutes les colonnes renseignés dans la bdd car on a utilisé un * dans le SELECT

//Lecture des valeurs
while(mysqli_stmt_fetch($stmt) == true) {
  echo "#" . $id . "email : " . $email . "<br>";
}
