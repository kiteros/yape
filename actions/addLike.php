<?php
session_start();
include('../include/bdd.php');
$link = $_GET['book'];
$SearchB = $bdd->prepare('SELECT * FROM yape_books WHERE id = :id');
$SearchB->execute(array(
  'id' => $link
));
$data = $SearchB->fetch();
$nbLike = $data['nb_like'] + 1;
$chageLike = $bdd->prepare('UPDATE yape_books SET nb_like = :book WHERE id = :id');
$chageLike->execute(array(
  'book' => $nbLike,
  'id' => $data['id']
));

$insertLike = $bdd->prepare("INSERT INTO yape_likecomment (id, book_id, type, by_id, comment) VALUES (NULL, :b, :lik, :session, :comm)");
$insertLike->execute(array(
  'b' => $link,
  'lik' => 'like',
  'session' => $_SESSION['id'],
  'comm' => ''

));

echo $data['id'] . 'SPLIT' . $nbLike;
 ?>
