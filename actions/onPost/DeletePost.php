<?php
session_start();
include('../../include/bdd.php');
$idPost = $_GET['idpost'];
$pagefrom = $_GET['pfrom'];

$delP = $bdd->prepare('DELETE from yape_books WHERE id = :fro');
$delP->execute(array(
  'fro' => $idPost
));

if($pagefrom == 1){
  header('Location: ../../perso/main.php');
}else if($pagefrom == 0){
  header('Location: ../../perso/myFeed.php');
}


 ?>
