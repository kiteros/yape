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
        <style>

        .button_ {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

        .comDiv{
          width: 350px;
        }

        .comme_nt{
          display : inline-block;
          float: left;
          text-align: left;
        }
        </style>
        <?php
          if(isset($_GET['id'])){
            include('../include/bdd.php');
            $Searchb = $bdd->prepare('SELECT * FROM yape_books WHERE id = :id');
            $Searchb->execute(array(
          		'id' => $_GET['id']
          	));
            $datab = $Searchb->fetch();
            $bookLink = $datab['book_id'];
            $html = file_get_contents($bookLink);
            $obj = json_decode($html, true);
            echo '<center><h2>' . $obj['volumeInfo']['title'] . '</h2></center><br/>';
            echo '<center><h2>' . $datab['auteur'] . '</h2></center><br/>';

            if(isset($obj['volumeInfo']['imageLinks']['medium'])){
              echo '<center><img width = "500px" src="' .  $obj['volumeInfo']['imageLinks']['medium'] . '" /></center><br/>';
            }else{
              echo '<center><img width = "500px" src="' .  $obj['volumeInfo']['imageLinks']['thumbnail'] . '" /></center><br/>';
            }
            echo '<center><p>Nombre de pages : ' . $obj['volumeInfo']['pageCount'] . '</p></center><br/>';

            if($datab['des'] != ''){
              echo '<center><p>"' . $datab['des'] . '"</p></center>';
            }

            echo '<br/>';
            $bbo = $_GET['id'];
            //Tout les commentaires
            $Searchbn = $bdd->prepare('SELECT * FROM yape_likecomment WHERE book_id = :id');
            $Searchbn->execute(array(
          		'id' => $bbo
          	));

            while($datacom = $Searchbn->fetch()){
              $byidp = $bdd->prepare('SELECT * FROM yape_users WHERE id = :id');
              $byidp->execute(array(
            		'id' => $datacom['by_id']
            	));
              $byiddata = $byidp->fetch();

              if(strlen($datacom['comment']) > 0){
              ?>
              <center>
                <div class="comDiv">
                  <hr>
                  <br/>
                  <a href="myFeed.php?id=<?php echo $byiddata['id']; ?>"><img class="comme_nt" width="35px" height="35px" src="<?php echo $byiddata['local_profil']; ?>"></a>
                  <h3><?php echo $byiddata['fname']; ?></h3>

                  <p><?php echo $datacom['comment']; ?></p>
                  <br/>

                </div>
              </center>
              <?php
            }
            }

            ?>

            <center><form action="../actions/addComment.php" method="post">
              <textarea name="com" rows="5" cols="100"></textarea><br/>
              <input type="hidden" name="booklink" value="<?php echo $bbo; ?>" class="button_"/><br/>
              <input type="submit" value="Comment" class="button_"/>
            </form></center><br/>

            <?php
          }

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
