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

	    <title>Yape - My page</title>
	</head>

  <?php
  include('../include/headerPerso.php');
   ?>

   <script>
   function showSignIn(){
     location.replace("manag/signup.php");
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
           <script>
           $('#feed').append('<div id="loading"><center><img width="30px" height="30px" src="../images/Loading_icon.gif" /></center></div>');
           var xmlhttp = new XMLHttpRequest();
           xmlhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
               $('#loading').remove();
               var myOBJson = JSON.parse(this.responseText);
               for(var i = 0; i < 10; i++){

                 if(myOBJson.book[i].image != null && myOBJson.book[i].title != null){
                   $('#feed').append('<center><a href="../../perso/addBook.php?stay=ok&link=' + myOBJson.book[i].link + '" style="text-decoration: none;color:#82331d;"><div><img src="' + myOBJson.book[i].image + '"><p>' + myOBJson.book[i].title + '</p></div></a></center><br/><br/>');
                 }


               }
             }
           };
           xmlhttp.open("GET", "../actions/recomend/recommandBooks.php", true);
           xmlhttp.send();

           </script>
        </div>
    </div>
    <a href="#0" class="cd-top">Top</a>
    <script src="../js/main.js"></script>
  </body>

    <?php
		include('include/footer.php');
    ?>
</html>
