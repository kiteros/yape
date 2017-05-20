<?php
  session_start();
 //Check the cookie

 function after ($this, $inthat)
 {
     if (!is_bool(strpos($inthat, $this)))
     return substr($inthat, strpos($inthat,$this)+strlen($this));
 };

 if(isset($_COOKIE['login_name']) AND isset($_COOKIE['login_pass'])){
	 //login
   echo 'done';
   $_SESSION['login_name'] = $_COOKIE['login_name'];
   $_SESSION['login_pass'] = $_COOKIE['login_pass'];
	 header("Location: actions/autosignin.php");

 }
 include('include/allStrings.php');
 ?>
<!DOCTYPE html>

<html>
<head>
  <link rel="shortcut icon" href="images/yape_logo.png"/>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style/style.css" />
  <title>Yape - The book coach</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="paralax/parallax.min.js"></script>
  <script src="vex-master/dist/js/vex.combined.min.js"></script>
  <script>vex.defaultOptions.className = 'vex-theme-os'</script>
  <link rel="stylesheet" href="vex-master/dist/css/vex.css" />
  <link rel="stylesheet" href="vex-master/dist/css/vex-theme-os.css" />
  <link rel="stylesheet" href="complete/awesomplete.css" />
  <script src="complete/awesomplete.js" async></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
  <script src="../js/modernizr.js"></script>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico:400' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>

  <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no">
  <link href='style/form.css' rel='stylesheet' type='text/css'>

</head>

<style>
@import url(http://fonts.googleapis.com/css?family=Lato:100,300,400,700);
@import url(https://raw.github.com/FortAwesome/Font-Awesome/master/docs/assets/css/font-awesome.min.css);

body {
	background: white;
	font-size: 15px;
}
#wrap {
  margin: 50px 100px;
  display: inline-block;
  position: relative;
  height: 60px;
  float: right;
  padding: 0;
  position: relative;
}

::-webkit-input-placeholder { /* WebKit, Blink, Edge */
    color: white;
}

input[type="text"] {
  height: 60px;
  font-size: 55px;
  display: inline-block;
  font-family: "Lato";
  font-weight: 100;
  border: none;
  outline: none;
  color: white;
  padding: 3px;
  padding-right: 60px;
  width: 0px;
  position: absolute;
  top: 0;
  right: 0;
  background: none;
  z-index: 3;
  cursor: pointer;
  width: 700px;
  z-index: 1;
  border-bottom: 1px solid white;
  cursor: text;
}

input[type="text"]:focus:hover {
  border-bottom: 1px solid white;
}

input[type="text"]:focus {
  width: 700px;
  z-index: 1;
  border-bottom: 1px solid white;
  cursor: text;
}
input[type="submit"] {
  height: 67px;
  width: 63px;
  display: inline-block;
  color:red;
  float: right;
  background: url("images/search2.png") center center no-repeat;
  text-indent: -10000px;
  border: none;
  position: absolute;
  top: 0;
  right: 0;
  z-index: 2;
  cursor: pointer;
  opacity: 0.4;
  cursor: pointer;
  transition: opacity .4s ease;
}

input[type="submit"]:hover {
  opacity: 0.8;
}

</style>

<script>
  function showSignUp(){

    location.replace("manag/signup.php");
  }

  function showSignIn(error){

    location.replace("manag/signin.php");
  }


  function showError(){
    vex.dialog.confirm({
        message: 'Erreur : les identifiants sont inconnus',
        callback: function (value) {
            if (value) {
                console.log('')
            } else {
                console.log('')
            }
        }
    })
  }


</script>

<header id="headpublic">
  <div id="logo">
    <a href=""><img src="images/yape_logo.png" width="65px" height="65px" style="margin-left: 30px;"/></a>
  </div>



  <?php
  if(!isset($_SESSION['id'])){
   ?>
  <div class="connect">
    <button id="myBtn" class="buttonSignUp" onclick="showSignUp()"><?php echo $string[$_GET['lang']]['index']['signup']; ?></button>
    <button id="myBtn" class="buttonSignIn" onclick="showSignIn()"><?php echo $string[$_GET['lang']]['index']['signin']; ?></button>
  </div>
  <?php
}else{
  ?>
  <div id="profilPic">
    <p style="display:inline-block;" class="inProfil2"></p>
    <a href="perso/myFeed.php"><img style="display:inline-block;" class="inProfil" width="50px" height="50px" src="<?php echo $_SESSION['profil']; ?>"></a>

    <div class="dropdown" style="display:inline-block;" class="inProfil">
      <button class="dropbtn"><?php echo $_SESSION['fname']; ?></button>
      <div class="dropdown-content">
        <a href="#">Parametres</a>
        <a href="../actions/disconnet.php">Déconnecter</a>
      </div>
    </div>

  </div>
  <?php
}
   ?>

</header>

<body>

  <div id="manPic">

    <div id="searchBar">
      <div id="wrap">
        <form action="actions/search.php" autocomplete="off">
          <input id="search" name="search" type="text" placeholder="Search any book.." autocomplete="off" onkeyup="ontouch(this.value)" ><input id="search_submit" value="Rechercher" type="submit">
        </form>

      </div>
    </div>
    <div id="hints_float">
      <div style="display: inline-block;" id="loading2"></div>
    </div>

  </div>

  <script>
  document.getElementById("hints_float").style.visibility = 'hidden';
  var isLoading = false;
  function ontouch(str){
    if(!isLoading){

      $('#hints_float').empty();
      $('#hints_float').append('<div style=\"display: inline-block;\" id=\"loading2\"></div>');
      isLoading = true;
      $('#loading2').append('<div id="loading"><img width="30px" height="30px" src="../images/Loading_icon.gif" /></div>');

    }
    var element = document.getElementById("hints_float");
      if (str.length == 0) {

        element.innerHTML = "<div style=\"display: inline-block;\" id=\"loading2\"></div>";
        element.style.visibility = 'hidden';
        $("#loading").remove();
        isLoading = false;
        return;
      } else {

          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $("#loading").remove();
                isLoading = false;
                document.getElementById("hints_float").innerHTML = "";
                document.getElementById("hints_float").style.visibility = 'visible';
                var x = 0;
                var res = this.responseText.split("DEP")[0].split("SEP");
                var nbPeople = this.responseText.split("XEP")[1];

                $('#hints_float').append('<div class="whiteSeparator">Books</div>');
                while(x < 4){
                  var imageMini = document.createElement("img");
                  imageMini.scr = res[3 * x + 2];
                  var li2 = document.createElement("a");
                  li2.href = "perso/addBook.php?stay=ok&link=" + res[3 * x + 1];
                  var br = document.createElement("br");
                  var text2 = document.createTextNode(res[3 * x]);
                  li2.appendChild(text2);
                  li2.appendChild(imageMini);
                  var element2 = document.getElementById("hints_float");
                  element2.appendChild(li2);
                  element2.appendChild(br);
                  x++;
                }
                $('#hints_float').append('<div class="whiteSeparator">People</div>');
                var res2 = this.responseText.split("DEP")[1].split("SEP");
                x = 0;

                if(nbPeople >= 4){
                  nbPeople = 4;
                }
                while(x < nbPeople){
                  var li3 = document.createElement("a");
                  li3.href = "perso/myFeed.php?id=" + res2[2 * x + 1];
                  var br = document.createElement("br");
                  var text2 = document.createTextNode(res2[2 * x]);
                  li3.appendChild(text2);
                  var element2 = document.getElementById("hints_float");
                  element2.appendChild(li3);
                  element2.appendChild(br);
                  x++;
                }
              }
          };
          xmlhttp.open("GET", "actions/liveSearchAll.php?q=" + str, true);
          xmlhttp.send();
      }
  }
  </script>

  <div class="totalPres">
    <br/>
    <h2 class="foo"><?php echo $string[$_GET['lang']]['index']['p1']; ?></h2><br/><br/>
    <img src="images/book_smll.png" id="bookMainPage"/>
    <div class="present">

       <center><p style="text-align: justify; font-size: 2em;"><?php echo $string[$_GET['lang']]['index']['p2']; ?></p></center><br/>

    </div>
  </div>
  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

  <div style="clear:both; display:flex; justify-content: space-around; margin-top: 10%;">
    <div>
      <?php
        include('include/bdd.php');

        $select = $bdd->prepare('SELECT * FROM yape_bookday WHERE id = :id');
        $select->execute(array(
          'id' => 1
        ));
        $dataDay = $select->fetch();
        $bookLink2 = $dataDay['book_id'];
        echo '<center><br/><br/><h2>' . $string[$_GET['lang']]['index']['dayBook'] . '</h2></center>';
        echo '<br/><br/>';
        $html2 = file_get_contents($bookLink2);
        $obj2 = json_decode($html2, true);
        echo '<center><h2>' . $obj2['volumeInfo']['title'] . '</h2></center><br/>';
        echo '<center><img width="250px" src="' .  $obj2['volumeInfo']['imageLinks']['medium'] . '" /></center><br/>';
        echo '<center><p>' . $string[$_GET['lang']]['index']['pageNB'] . ' : ' . $obj2['volumeInfo']['pageCount'] . '</p></center><br/><br/>';

       ?>
    </div>
    <div>
      <?php
        include('include/bdd.php');

        $select = $bdd->prepare('SELECT * FROM yape_bookday WHERE id = :id');
        $select->execute(array(
          'id' => 3
        ));
        $dataDay = $select->fetch();
        $pday = $dataDay['book_id'];
        echo '<center><br/><br/><h2>' . $string[$_GET['lang']]['index']['dayReader'] . '</h2></center>';
        echo '<br/><br/>';

        //Afficher image
        $SearchUser2 = $bdd->prepare('SELECT * FROM yape_users WHERE id = :id');
        $SearchUser2->execute(array(
          'id' => $pday
        ));

        $donnesUser = $SearchUser2->fetch();
        $bigPic = 'images/bigPic/' . after('images/thumbnails/', $donnesUser['local_profil']);
        $name_ = $donnesUser['fname'];

       ?>
       <center><img width="250px" height="250px" src="<?php echo $bigPic; ?>" /></center>
       </br>
       <center><div>
         <p style="font-weight: bold;"> <?php echo $string[$_GET['lang']]['index']['dayReaderCongrat1'] . $name_ . $string[$_GET['lang']]['index']['dayReaderCongrat2']; ?></p>
       </div></center>
    </div>
  </div>

  <div class="content_" style="margin-top : 10%;">
    <br/><center><h3><?php echo $string[$_GET['lang']]['index']['join']; ?></h3></center>
    <?php
      include("include/bdd.php");
      $GETnb = $bdd->prepare('SELECT * FROM yape_nbUsers WHERE id = 1');
      $GETnb->execute(array());

      $dataNb = $GETnb->fetch();
      $CurrentNb = $dataNb['number_'];

      echo '<br/><center><h2 class="bigNumber">' . $CurrentNb . '</h2></center><center><h3> ' . $string[$_GET['lang']]['index']['inscrit'] . ' </h3></center><br/><br/>';
    ?>

  </div>


</body>

<footer class="thefoot">
  <br/><br/>
  <div class="thefoot_">
    <div class="classfoot">
      <p>Copyright</p>
      <p>Jules Eschbach</p>
    </div>
    <div class="classfoot">
      <p>jules@jeschbach.com</p>
    </div>
    <div class="classfoot">
      <p>2.1.0</p>
    </div>
  </div>
  <br/><br/>
</footer>
