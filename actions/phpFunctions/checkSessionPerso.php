<?php

  //Fonction découpage de string
  function after ($this, $inthat)
  {
      if (!is_bool(strpos($inthat, $this)))
      return substr($inthat, strpos($inthat,$this)+strlen($this));
  };

  $isPersonal = false;
  $isPersonalStr = "t";
  //Si c'est une visite et pas un compte personnel
  if(isset($_GET['id'])){
    $isPersonal = false;
    $isPersonalStr = "f";
    $id = $_GET['id'];
    include('../include/bdd.php');
    //On récupère les infos de la personne
    $SearchUser = $bdd->prepare('SELECT * FROM yape_users WHERE id = :id');
    $SearchUser->execute(array(
  		'id' => $id
  	));

    $donnesUser = $SearchUser->fetch();
    $email = $donnesUser['email'];
    $thumb = $donnesUser['local_profil'];
    $fName = $donnesUser['fname'];
    $lName = $donnesUser['lname'];

    if($thumb == '../images/user.png'){
      $bigPic = $thumb;
    }else{
      $bigPic = '../images/bigPic/' . after('../images/thumbnails/', $donnesUser['local_profil']);
    }


  }else{
    $isPersonal = true;
    $id = $_SESSION['id'];
    $email = $_SESSION['email'];
    $thumb = $_SESSION['profil'];
    $bigPic = $_SESSION['bigPic'];
    $fName = $_SESSION['fname'];
    $lName = $_SESSION['lname'];
  }

  if($id == $_SESSION['id']){
    $isPersonal = true;
    $isPersonalStr = "t";

  }
 ?>
