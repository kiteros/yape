<?php

include("../include/bdd.php");
if(isset($_POST['fname']) AND isset($_POST['email'])){
  if($_POST['password1'] != $_POST['password2']){
    header('Location: ../index.php');
    exit();
  }else{
    $email = $_POST['email'];
    $password = sha1($_POST['password1']);

    $addUser = $bdd->prepare('INSERT INTO yape_users (id, email, password, date_, local_profil,bio, fname, lname) VALUES (NULL, :name, :pass, NOW(), :img, :mdt, :fn, :l)');
    $addUser->execute(array(
  		'name' => $email,
      'pass' => $password,
      'img' => '../images/user.png',
      'mdt' => 'Hey! I am using Yape!',
      'fn' => $_POST['fname'],
      'l' => $_POST['lname']
  	));

    $SearchUser = $bdd->prepare('SELECT * FROM yape_users WHERE email = :name AND password = :pass');
    $SearchUser->execute(array(
  		'name' => $email,
      'pass' => $password
  	));

    //Ajouter un utilisateur dans la bdd
    $GETnb = $bdd->prepare('SELECT * FROM yape_nbUsers WHERE id = 1');
    $GETnb->execute(array());

    $dataNb = $GETnb->fetch();
    $CurrentNb = $dataNb['number_'];
    $CurrentNb = $CurrentNb + 1;

    $SETnb = $bdd->prepare('UPDATE yape_nbUsers SET number_ = :num WHERE id = 1');
    $SETnb->execute(array(
      'num' => $CurrentNb
    ));

    $data = $SearchUser->fetch();
    $rowC = $SearchUser->rowCount();
    //On crée la session et redirect vers le main
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['fname'] = $_POST['fname'];
    $_SESSION['lname'] = $_POST['lname'];
    $_SESSION['id'] = $data['id'];
    $_SESSION['profil'] = $data['local_profil'];
    $_SESSION['bigPic'] = $data['local_profil'];

    if($_POST['keeplog'] == "k"){
      setcookie('login_name', $email, time() + 365*24*3600, null, null, false, true);
      setcookie('login_pass', $password, time() + 365*24*3600, null, null, false, true);
    }


    //echo $_SESSION['id'];
    header('Location: ../perso/main.php');
  }

}else{
  echo 'error';
}


?>