<?php
session_start();
include("../include/bdd.php");
$link = $_POST['link'];
$title = $_POST['title'];
$auteur = $_POST['auteur'];
$pages = $_POST['pages'];
$AddBook = $bdd->prepare('INSERT INTO yape_books (id, user_id_from, book_id, image_id, date_, nb_like, nb_comment, des, title, auteur, pages) VALUES (NULL, :id, :link, :imgId, NOW(), 0, 0, :des, :title, :auteur, :pages)');
$AddBook->execute(array(
  'id' => $_SESSION['id'],
  'link' => $link,
  'imgId' => $_POST['image'],
  'des' => $_POST['avis'],
  'title' => $title,
  'auteur' => $auteur,
  'pages' => $pages
));

header("Location: ../perso/main.php");

 ?>
