<?php
  session_start() ;
  $_SESSION['id'] = '';
  $_SESSION['name'] = '';
  $_SESSION['profil'] = '';
  $_SESSION['bigPic'] = '';
  echo $_COOKIE['login_name'];
  setcookie("login_name", "", time() - 3600, "/");
  setcookie("login_pass", "", time() - 3600, "/");
  session_destroy();

  header('Location: ../index.php');
 ?>
