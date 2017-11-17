<?php
session_start();
  require_once '../validate_general.php';
  require_once 'validate_profile.php';
  require_once '../db.php';
  if (isset($_POST['submit'])) {
    $errors = validateProfile();
    if (count($errors) == 0) {

    //Process the image that is uploaded by the user
// Morceau de code stackOverflow, pour l'upload d'images.
//     $target_dir = "uploads/";
//     $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
//     $uploadOk = 1;
//     $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
//
//     if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
//         echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
//     } else {
//         echo "Sorry, there was an error uploading your file.";
//     }
//
//     $image=basename( $_FILES["imageUpload"]["name"],".jpg"); // used to store the filename in a variable
//
//     //storind the data in your database
//     $query= "INSERT INTO items VALUES ('$id','$title','$description','$price','$value','$contact','$image')";
//     mysql_query($query);
//
//     require('heading.php');
//     echo "Your add has been submited, you will be redirected to your account page in 3 seconds....";
//     header( "Refresh:3; url=account.php", true, 303);
// }

      $data['avatar'] = strtolower($_POST['avatar']);
      $data['check_license'] = ($_POST['check_license']);
      $data['check_car'] = ($_POST['check_car']);
      $data['bio'] = strtolower($_POST['bio']);
      $result = insertExperience($data);
      if ($result != false) {

      }
    }
  }

 ?>


<form class="" action="" method="post">
  <h2>Profil</h2>
    <label for="avatar">Intitulé :</label>
    <input type="text" name="avatar" id="avatar" value="<?= (isset($_POST['avatar']))? $_POST['avatar']: '' ?>">
    <br>
    <?php
      if (isset($errors['avatar'])) {
        echo $errors['avatar'] . "<br>";
      }
     ?>
    <label for="check_license">Date de début :</label>
    <input type="checkbox" name="check_license" id="check_license" value="<?= (isset($_POST['check_license']))? $_POST['check_license']: '' ?>">
    <br>
    <label for="check_car">Date de fin :</label>
    <input type="checkbox" name="check_car" id="check_car" value="<?= (isset($_POST['check_car']))? $_POST['check_car']: '' ?>">
    <br>
    <?php
      if (isset($errors['date'])) {
        echo $errors['date'] . "<br>";
      }
     ?>
    <label for="bio">Description :</label>
    <input type="text" name="bio" id="bio" value="<?= (isset($_POST['bio']))? $_POST['bio']: '' ?>">
    <br>
    <?php
      if (isset($errors['bio'])) {
        echo $errors['bio'] . "<br>";
      }
     ?>
    <input type="submit" name="submit" value="Valider">
</form>
