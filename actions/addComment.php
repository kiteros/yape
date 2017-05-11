<?php

session_start();
include('../include/bdd.php');
$comtosend = $_POST['com'];
$link = $_POST['booklink'];
$insertCom = $bdd->prepare("INSERT INTO yape_likecomment (id, book_id, type, by_id, comment) VALUES (NULL, :b, :lik, :session, :comm)");
$insertCom->execute(array(
  'b' => $link,
  'lik' => 'com',
  'session' => $_SESSION['id'],
  'comm' => $comtosend
));

header("Location: ../perso/showBook.php?id=" . $link);

 ?>
