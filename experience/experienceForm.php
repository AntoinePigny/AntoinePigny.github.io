<?php
session_start();
  require_once '../validate_general.php';
  require_once 'validate_experience.php';
  require_once '../db.php';
  if (isset($_POST['submit'])) {
    $errors = validateExperience();
    if (count($errors) == 0) {
      $data['title'] = strtolower($_POST['title']);
      $data['date_begin'] = ($_POST['date_begin']);
      $data['date_end'] = ($_POST['date_end']);
      $data['description'] = strtolower($_POST['description']);
      $result = insertExperience($data);
      if ($result != false) {

      }
    }
  }

 ?>


<form class="" action="" method="post">
  <h2>Ajouter une expérience</h2>
    <label for="title">Intitulé :</label>
    <input type="text" name="title" id="title" value="<?= (isset($_POST['title']))? $_POST['title']: '' ?>">
    <br>
    <?php
      if (isset($errors['title'])) {
        echo $errors['title'] . "<br>";
      }
     ?>
    <label for="date_begin">Date de début :</label>
    <input type="date" name="date_begin" id="date_begin" value="<?= (isset($_POST['date_begin']))? $_POST['date_begin']: '' ?>">
    <br>
    <label for="date_end">Date de fin :</label>
    <input type="date" name="date_end" id="date_end" value="<?= (isset($_POST['date_end']))? $_POST['date_end']: '' ?>">
    <br>
    <?php
      if (isset($errors['date'])) {
        echo $errors['date'] . "<br>";
      }
     ?>
    <label for="description">Description :</label>
    <input type="text" name="description" id="description" value="<?= (isset($_POST['description']))? $_POST['description']: '' ?>">
    <br>
    <?php
      if (isset($errors['description'])) {
        echo $errors['description'] . "<br>";
      }
     ?>
    <input type="submit" name="submit" value="Valider">
</form>
