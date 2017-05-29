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
    $email = $donnesUser['email'];
    $thumb = $donnesUser['local_profil'];
    if($thumb == '../images/user.png'){
      $bigPic = $thumb;
    }else{
      $bigPic = '../images/bigPic/' . after('../images/thumbnails/', $donnesUser['local_profil']);
    }


  }else{
    $id = $_SESSION['id'];
    $email = $_SESSION['email'];
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
       <script src="../js/parsley.min.js"></script>
<link rel="stylesheet" href="../main/css/style.css" />
       <link rel="stylesheet" href="../main/css/searchBar.css" />
       <link href="../main/css/bootstrap.min.css" rel="stylesheet" type="text/css">
       <link href="../main/color/default.css" rel="stylesheet" type="text/css">
       <link rel="stylesheet" href="../style/sign.css" />
	    <title>Yape - My page</title>
	</head>

  <?php
  include('../include/headerPerso.php');
   ?>

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
        <div>
          <br/><br/>


        <center><form action="../params/changeInfo.php" method="post" id="form2" data-parsley-validate="">
            <ul class="formshape" id="form-style-2">

              <li>
                  <label>Nom complet</label><input type="text" name="fname" class="field-divided" value="<?php echo $_SESSION['fname'];?>" autofocus/>&nbsp;&nbsp;&nbsp;<input type="text" name="lname" class="field-divided" value="<?php echo $_SESSION['lname']; ?>" />
              </li>

              <li>
                  <input type="hidden" name="idp" value="<?php echo $_SESSION['id']; ?>"/>
                  <label>Adresse email</label><input type="text" name="email" class="field-long" value="<?php echo $_SESSION['email'];?>" required=""/>
              </li>

              <li>
                  <p><input type="submit" value="Mettre à jour"/></p>
              </li>
          </ul>
          </form></center>
          <center><a href="../params/changePass.php" id="changepass">Changer le mot de passe</a></center>

          <script type="text/javascript">
            $('#form2').parsley();
          </script>
        </div>
        <br/><br/>

    </div>
    <a href="#0" class="cd-top">Top</a>
    <script src="../js/main.js"></script>
  </body>

</html>
