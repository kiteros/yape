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
			 ?>
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
        <br/><br/>
        <?php
        if(isset($_GET['link'])){
          //Affiche les caractéristiques du livre
					$bookLink = $_GET['link'];
          $html = file_get_contents($bookLink);
          $obj = json_decode($html, true);
          echo '<center><h2>' . $obj['volumeInfo']['title'] . '</h2></center><br/>';
          echo '<center><img src="' .  $obj['volumeInfo']['imageLinks']['thumbnail'] . '" /></center><br/>';
          echo '<center><p>Nombre de pages : ' . $obj['volumeInfo']['pageCount'] . '</p></center><br/>';
          ?>
          <center><form action="../actions/addBookBdd.php" method="post">
						<input type="hidden" name="link" value="<?php echo $bookLink; ?>" />
            <input type="hidden" name="title" value="<?php echo $obj['volumeInfo']['title']; ?>" />
            <input type="hidden" name="auteur" value="<?php echo $obj['volumeInfo']['authors'][0]; ?>" />
            <input type="hidden" name="pages" value="<?php echo $obj['volumeInfo']['pageCount']; ?>" />
            <input type="hidden" name="image" value="<?php
              if(isset($obj['volumeInfo']['imageLinks']['medium'])){
                echo $obj['volumeInfo']['imageLinks']['medium'];
              }else{
                echo $obj['volumeInfo']['imageLinks']['thumbnail'];
              }

            ?>" />
            <textarea name="avis" rows="10" cols="50" placeholder="Votre apréciation"></textarea><br/>
            <input type="submit" value="J'ai lu ce livre" class="buttonSignIn"/>
          </form></center>
          <?php
        }else{
        ?>
    <center><h2>Vous avez lu un nouveau livre? Partagez le avec le monde</h2></center><br/><br/>
    <center><div class="smallSearch"><form action="../actions/search.php" method="post">
      <input type="text" name="search" placeholder="Nom du livre" class="smallSearch" autocomplete="off" onkeyup="ontouch2(this.value)" />
      <div style="display: inline-block;" id="loading2"></div>
    </form></div></center>
		<center><div id="hints">
		</div></center>
    <?php
      }
      //include("../include/bdd.php");
      //On parse tout les livres lus par tout les amis
    ?>

        <!-- content -->
        <script>
        var isLoading = false;
        function ontouch2(str){
          var element = document.getElementById("hints");

          if(!isLoading){

            $('#hints').empty();
            isLoading = true;
            $('#loading2').append('<center id="loading"><div><img width="30px" height="30px" src="../images/Loading_icon.gif" /></div></center>');

          }

          if(str.length == 0) {

            element.innerHTML = "";
            element.style.visibility = 'hidden';
            $("#loading").remove();
            isLoading = false;
            return;

          }else{

                var xmlhttp = new XMLHttpRequest();

                xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                      $("#loading").remove();
                      isLoading = false;
                      document.getElementById("hints").innerHTML = "";
                      document.getElementById("hints").style.visibility = 'visible';
                      var x = 0;
                      var res = this.responseText.split("DEP")[0].split("SEP");
                      $('#hints').append('<h3>Books found for \'' + str+ '\':</h3>');
                      while(x < 4){
                        var imageMini = document.createElement("img");
                        imageMini.scr = res[3 * x + 2];
                        var li2 = document.createElement("a");
                        li2.href = "?link=" + res[3 * x + 1];
                        var br = document.createElement("br");
                        var text2 = document.createTextNode(res[3 * x]);
                        li2.appendChild(text2);
                        li2.appendChild(imageMini);
                        var element2 = document.getElementById("hints");
                        element2.appendChild(li2);
                        element2.appendChild(br);
                        x++;
                      }
                    }
                };
                xmlhttp.open("GET", "../actions/liveSearch.php?q=" + str, true);
                xmlhttp.send();
            }
        }
        </script>

    </div>

  </body>


    <?php
		include('../include/footer.php');
    ?>
</html>
