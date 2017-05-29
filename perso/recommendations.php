<?php
  session_start();

  //Fonction découpage de string
  function after ($this, $inthat)
  {
      if (!is_bool(strpos($inthat, $this)))
      return substr($inthat, strpos($inthat,$this)+strlen($this));
  };

  //Si c'est une visite et pas un compte personnel
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    include('../include/bdd.php');
    //On récupère les infos de la personne
    $SearchUser = $bdd->prepare('SELECT * FROM yape_users WHERE id = :id');
    $SearchUser->execute(array(
  		'id' => $id
  	));

    $donnesUser = $SearchUser->fetch();
    $name = $donnesUser['name'];
    $thumb = $donnesUser['local_profil'];
    if($thumb == '../images/user.png'){
      $bigPic = $thumb;
    }else{
      $bigPic = '../images/bigPic/' . after('../images/thumbnails/', $donnesUser['local_profil']);
    }


  }else{
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
    $thumb = $_SESSION['profil'];
    $bigPic = $_SESSION['bigPic'];
  }

  ?>

<!DOCTYPE html>

<html>

	<head>

	    <meta charset="utf-8" />
      <?php
			include('../include/metadata.php');
			 ?>
       <link rel="stylesheet" href="../style/style.css" />
       <link rel="stylesheet" href="../style/stylePerso.css" />
<link rel="stylesheet" href="../main/css/style.css" />
       <link rel="stylesheet" href="../main/css/searchBar.css" />
       <link href="../main/css/bootstrap.min.css" rel="stylesheet" type="text/css">
       <link href="../main/color/default.css" rel="stylesheet" type="text/css">
	    <title>Yape - My page</title>
	</head>

  <?php
  include('../include/headerPerso.php');
   ?>

   <script>

   function showSignIn(){
     vex.dialog.open({
         message: 'Enter your username and password to connect:',
         input: [
             '<input name="username" type="text" placeholder="Username" required />',
             '<input name="password" type="password" placeholder="Password" required />'
         ].join(''),
         buttons: [
             $.extend({}, vex.dialog.buttons.YES, { text: 'Sign in' }),
             $.extend({}, vex.dialog.buttons.NO, { text: 'Back' })
         ],
         callback: function (data) {
             if (!data) {
                 console.log('Cancelled')
             } else {

               window.location.replace("../actions/signin.php?name=" + data.username + "&password=" + data.password + "&connectType=notconnected");
             }
         }
     })
   }
    </script>

	<body>
    <div class="content">
      <?php
      include('../include/nav.php');
       ?>
    <?php
      include("../include/bdd.php");
      //On parse tout les livres lus par moi
      if(isset($_GET['error'])){
        if($_GET['error'] == 'notconnected'){
          echo '<script>showSignIn();</script>';
        }
      }

     ?>

        <!-- content -->
        <br/><br/>
        <div id="feed">

        </div>
    </div>
    <a href="#0" class="cd-top">Top</a>
    <script src="../js/main.js"></script>
  </body>

    <?php
		include('include/footer.php');
    ?>
</html>
