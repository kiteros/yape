<?php
  if(isset($_POST['from'])){

    include('../include/bdd.php');
    session_start();
    $from = $_POST['from'];
    $idToadd = $_POST['toadd'];

    //AVANT D'insérer, vérifier qu'il n'existe pas déja.
    $checkFriend = $bdd->prepare('SELECT * FROM yape_friend WHERE from_id = :fro AND to_id = :to');
    $checkFriend->execute(array(
  		'fro' => $from,
      'to' => $idToadd
  	));
    $nbCheck = $checkFriend->rowCount();

    if($nbCheck == 0){

      $addFriend = $bdd->prepare('INSERT INTO yape_friend (id, from_id, to_id) VALUES (NULL, :from, :to)');
      $addFriend->execute(array(
    		'from' => $from,
        'to' => $idToadd
    	));

      $getFollow = $bdd->prepare('SELECT * FROM yape_users WHERE id =:id');
      $getFollow->execute(array(
    		'id' => $from
    	));

      $datafollow = $getFollow->fetch();
      $following = 1 + $datafollow['following'];

      $changeFollowing = $bdd->prepare('UPDATE yape_users SET following = :follow WHERE id = :id');
      $changeFollowing->execute(array(
        'follow' => $following,
        'id' => $from
      ));

      //------------------------------------------------------------------------------------

      $getFollower = $bdd->prepare('SELECT * FROM yape_users WHERE id =:id');
      $getFollower->execute(array(
    		'id' => $idToadd
    	));

      $datafollower = $getFollower->fetch();
      $followerer = 1 + $datafollower['follower'];

      $changeFollower = $bdd->prepare('UPDATE yape_users SET follower = :follower WHERE id = :id');
      $changeFollower->execute(array(
        'follower' => $followerer,
        'id' => $idToadd
      ));

    }




    //Ajouter cet ami
    header('Location: ../perso/myFeed.php?id=' . $_POST['toadd']);
  }else{
    //On demade a l'user de se connecter
    header('Location: ../perso/myFeed.php?error=notconnected&id=' . $_POST['toadd']);
  }
 ?>
