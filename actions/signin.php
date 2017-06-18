<?php
session_start();
function after ($this, $inthat)
{
    if (!is_bool(strpos($inthat, $this)))
    return substr($inthat, strpos($inthat,$this)+strlen($this));
};

include("../include/bdd.php");
if((isset($_POST['email']) AND isset($_POST['password'])) OR (isset($_SESSION['login_name']) AND isset($_SESSION['login_pass']))){
  if(isset($_GET['connectType'])){

  }else{

    if(isset($_POST['email']) AND !isset($_SESSION['login_pass'])){
      $email = $_POST['email'];
      $password = sha1($_POST['password']);
    }else{
      $email = $_SESSION['login_name'];
      $password = $_SESSION['login_pass'];
    }

    $SearchUser = $bdd->prepare('SELECT * FROM yape_users WHERE email = :name AND password = :pass');
    $SearchUser->execute(array(
  		'name' => $email,
      'pass' => $password
  	));

    $data = $SearchUser->fetch();
    $rowC = $SearchUser->rowCount();
    if($rowC > 0){
      //l'utilisateur existe
      //On crée la session et redirect vers le main
      session_start();
      $_SESSION['email'] = $email;
      $_SESSION['id'] = $data['id'];
      $_SESSION['profil'] = $data['local_profil'];
      $_SESSION['bigPic'] = '../images/bigPic/' . after('../images/thumbnails/', $data['local_profil']);
      $_SESSION['fname'] = $data['fname'];
      $_SESSION['lname'] = $data['lname'];
      $_SESSION['lang'] = $_GET['lang'];
      //Créer le cookie
      if(isset($_POST['keeplog'])){
        if($_POST['keeplog'] == "k"){
          setcookie("login_name", $email, time() + 365*24*3600, "/");
          setcookie("login_pass", $password, time() + 365*24*3600, "/");
        }

      }


      header('Location: ../perso/main.php');
      exit();
    }else{
      header('Location: ../index.php?error=notinbdd');
      exit();
    }
  }



}else{
  echo 'error';
}


?>
