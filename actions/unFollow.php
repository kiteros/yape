<?php
session_start();
include('../include/bdd.php');
$from = $_SESSION['id'];
$to = $_GET['id'];

$delF = $bdd->prepare('DELETE from yape_friend WHERE from_id = :fro AND to_id = :to');
$delF->execute(array(
  'fro' => $from,
  'to' => $to
));

$getFollow = $bdd->prepare('SELECT * FROM yape_users WHERE id =:id');
$getFollow->execute(array(
  'id' => $from
));

$datafollow = $getFollow->fetch();
$following = $datafollow['following'] - 1;

$changeFollowing = $bdd->prepare('UPDATE yape_users SET following = :follow WHERE id = :id');
$changeFollowing->execute(array(
  'follow' => $following,
  'id' => $from
));

$getFollow2 = $bdd->prepare('SELECT * FROM yape_users WHERE id =:id');
$getFollow2->execute(array(
  'id' => $to
));

$datafollow2 = $getFollow2->fetch();
$following2 = $datafollow2['follower'] - 1;

$changeFollowing2 = $bdd->prepare('UPDATE yape_users SET follower = :follow WHERE id = :id');
$changeFollowing2->execute(array(
  'follow' => $following2,
  'id' => $to
));

header('Location: ../perso/myFeed.php?id=' . $to);
 ?>
