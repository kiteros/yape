<?php
session_start();
include('../include/bdd.php');
$link = $_GET['book'];
$SearchB = $bdd->prepare('SELECT * FROM yape_books WHERE id = :id');
$SearchB->execute(array(
  'id' => $link
));
$data = $SearchB->fetch();
$nbLike = $data['nb_like'] - 1;
$chageLike = $bdd->prepare('UPDATE yape_books SET nb_like = :book WHERE id = :id');
$chageLike->execute(array(
  'book' => $nbLike,
  'id' => $data['id']
));

$removeLike = $bdd->prepare("DELETE FROM yape_likecomment WHERE book_id = :bookid");
$removeLike->execute(array(
  'bookid' => $link

));

echo $data['id'] . 'SPLIT' . $nbLike;
 ?>
