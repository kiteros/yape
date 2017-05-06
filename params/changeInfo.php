<?php
include('../include/bdd.php');
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$emain = $_POST['email'];
$id_perso = $_POST['idp'];

$up = $bdd->prepare('UPDATE yape_users SET email = :newMail, fname = :newF, lname = :newL WHERE id = :thisid');
$up->execute(array(
  'id' => $id_perso,
  'thisid' => 3
));

 ?>
