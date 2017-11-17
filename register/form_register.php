<?php
  require_once 'validate_register.php';
  require_once '/db.php';
  if (isset($_POST['submit'])) {
    $errors = validateRegister();
    if (count($errors) == 0) {
      /** On pourrait socker tout le POST dans une variable et unset les champs indesirables
      * $data = $_POST;
      * unset($_data['submit']);
      * unset($_data['repassword']);
       */
      $data['firstname'] = strtolower($_POST['firstname']);
      $data['lastname'] = strtolower($_POST['lastname']);
      $data['password'] = saltThis($_POST['password']);
      $data['email'] = strtolower($_POST['email']);

      $result = insertUser($data);
      if ($result != false) {
        header("refresh:5;url=connexion.php");
        echo "Bienvenue, la redirection automatique se déclenchera dans 5 secondes.";
      }
    }
  }

?>

<form class="" method="post">
  <label for="firstname">Prenom</label>
  <input id="firstname" type="text" name="firstname" value="<?= (isset($_POST['firstname']))? $_POST['firstname']: '' ?>">
  <br>
  <?php
    if (isset($errors['firstname'])) {
      echo $errors['firstname'] . "<br>";
    }
   ?>
  <label for="lastname">Nom</label>
  <input id="lastname" type="text" name="lastname" value="<?= (isset($_POST['lastname']))? $_POST['lastname']: '' ?>">
  <br>
  <?php
    if (isset($errors['lastname'])) {
      echo $errors['lastname'] . "<br>";
    }
   ?>
  <label for="email">email</label>
  <!--Attention : balise ouvrante pour echo en php -->
  <input id="email" type="text" name="email" value="<?= (isset($_POST['email']))? $_POST['email']: '' ?>">
  <br>
  <?php if (isset($errors['email'])) { echo $errors['email'] . "<br>"; } ?>
  <label for="password">Password</label>
  <input id="password" type="password" name="password">
  <br>
  <?php
    if (isset($errors['password'])) {
      echo "<ul>";
        foreach ($errors['password'] as $value) {
          echo "<li>$value</li>";
        }
      echo "</ul>";
    }
   ?>
  <label for="repassword">Re-Password</label>
  <input id="repassword" type="password" name="repassword">
  <br>
  <?php
    if (isset($errors['repassword'])) {
      echo $errors['repassword'] . "<br>";
    }
   ?>
  <input name="submit" type="submit">
</form>
