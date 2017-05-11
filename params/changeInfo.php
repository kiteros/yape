<?php
session_start();
include('../include/bdd.php');
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$id_perso = $_POST['idp'];

$up = $bdd->prepare('UPDATE yape_users SET email = :newMail, fname = :newF, lname = :newL WHERE id = :idp');
$up->execute(array(
  'newMail' => $email,
  'newF' => $fname,
  'newL' => $lname,
  'idp' => $id_perso
));

$_SESSION['email'] = $email;
$_SESSION['fname'] = $fname;
$_SESSION['lname'] = $lname;

header('Location: ../perso/params.php');

 ?>
