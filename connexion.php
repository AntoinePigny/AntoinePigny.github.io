<?php
require_once './db.php';
session_start();
if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
  require_once './admin.php';
} else {
  require_once './formLogin.php';
}

//http://php.net/manual/fr/mysqli.construct.php
