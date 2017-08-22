<?php
session_start();
function stripAccents($stripAccents){
  return strtr($stripAccents,'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ','aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
}
include("../include/bdd.php");

if(isset($_POST['fname']) OR isset($_POST['email']) OR isset($_SESSION['FBID'])){
  if($_POST['password1'] != $_POST['password2']){
    header('Location: ../manag/signup.php?er=passnotsame');
    exit();
  }else{
    if(isset($_GET['c']) AND $_GET['c'] == 'fb'){

      $password = $_SESSION['FBID'];
      $fname_ = explode(" ", $_SESSION['FULLNAME'])[0];
      $lname_ = explode(" ", $_SESSION['FULLNAME'])[1];
      $email = $fname_;
      $img = $_SESSION['pic'];
      //echo $img;
    }else{
      $email = $_POST['email'];
      $password = sha1($_POST['password1']);
      $fname_ = stripAccents($_POST['fname']);
      $lname_ = stripAccents($_POST['lname']);
      $img = '../images/user.png';
    }


    //Check no code (eviter que Kilian fasse de la merde)

    if (preg_match("#[<>\(\)\[\]\{\}=\\\/]#", $fname_) or preg_match("#[<>\(\)\[\]\{\}=\\\/]#", $email) or preg_match("#[<>\(\)\[\]\{\}=\\\/]#", $lname_))
    {

    	header('Location: ../manag/signup.php?er=codeinit');

    }else{
      $addUser = $bdd->prepare('INSERT INTO yape_users (id, email, password, date_, local_profil,bio, fname, lname) VALUES (NULL, :name, :pass, NOW(), :img, :mdt, :fn, :l)');
      $addUser->execute(array(
    		'name' => $email,
        'pass' => $password,
        'img' => $img,
        'mdt' => 'Hey! I am using Yape!',
        'fn' => $fname_,
        'l' => $lname_
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
      $_SESSION['lang'] = $_GET['lang'];

      if($_POST['keeplog'] == "k"){
        setcookie('login_name', $email, time() + 365*24*3600, null, null, false, true);
        setcookie('login_pass', $password, time() + 365*24*3600, null, null, false, true);
      }



      header('Location: ../perso/');

    }



  }

}else{
  echo 'error';
}


?>
