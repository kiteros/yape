<?php
  session_start();

  include('../include/phpFunction.php');
  include('../include/bdd.php');

  //Check if it is a visit
  $id = $_GET['id'];

  if(isset($id)){

    //This is a Visit
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

    //This is personal account
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
	    <title>Yape - My page</title>
	</head>

  <?php
  include('../include/headerPerso.php');
  ?>

  <script>

    function showSignIn(error){
      location.replace("../manag/signin.php");
    }

  </script>

	<body>
    <div class="content">
      <?php
      include('../include/nav.php');

      //If error, show signin button
      if(isset($_GET['error'])){
        if($_GET['error'] == 'notconnected'){
          echo '<script>showSignIn();</script>';
        }
      }

     ?>

      <br/><br/>
      <div id="feed">
        <!-- content and feed -->
      </div>

    </div>

    <a href="#0" class="cd-top">Top</a>
    <script src="../js/main.js"></script>

  </body>

  <script>

  var offset = 300;
  var offset_opacity = 1200;
  var nbDecX = 13;
  var scroll_top_duration = 700;
  var isEnd = false;
  var lastId = 0;

  $(window).scroll(function(){
    if($(window).scrollTop() == $(document).height() - $(window).height()){
      if(!isEnd){
        AddMoreContent();
      }
    }
  });

  function changeLike(image){
    image.src = "../images/like_hover.png";
  }

  function changeLike2(image){
    image.src = "../images/like.png";
  }

  function addLike(linkRef, image){
    //We add a like

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          //Like added
          changeLike(image);

          var likeId1 = this.responseText.split('SPLIT')[0];
          var likeId2 = this.responseText.split('SPLIT')[1];

          var textToreplace = '<div class="buttonLike2" id="' + 'div' + likeId1
          + '"><p class="nbLike" id="' + likeId1 + '">' + likeId2
          + '</p><img class="buttonLike" onclick="removeLike(' + linkRef + ', this)" src="../images/like_hover.png"></div>';

          $('#div' + likeId1).replaceWith(textToreplace);

        }
    };
    xmlhttp.open("GET", "../actions/addLike.php?book=" + linkRef, true);
    xmlhttp.send();
  }

  function removeLike(linkRef, image){
    //We remove a like

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          //Like removed
          changeLike2(image);

          var likeId3 = this.responseText.split('SPLIT')[0];
          var likeId4 = this.responseText.split('SPLIT')[1];

          var textToreplace = '<div class="buttonLike2" id="' + 'div' + likeId3
          + '"><p class="nbLike" id="' + likeId3 + '">' + likeId4
          + '</p><img class="buttonLike" onclick="addLike(' + linkRef
          + ', this)" onmouseleave="changeLike2(this)" onmouseenter="changeLike(this)" src="../images/like_hover.png"></div>';

          $('#div' + likeId3).replaceWith(textToreplace);

        }
    };
    xmlhttp.open("GET", "../actions/removeLike.php?book=" + linkRef, true);
    xmlhttp.send();
  }

  var isLoading = false;
  AddMoreContent();

  function AddMoreContent(){

    //On fetch the Ajax

    if(!isLoading){

      $('#feed').append('<center id="loading"><br/><div><img width="30px" height="30px" src="../images/Loading_icon.gif" /></div><br/><br/></center>');

      //Active the loading icon
      isLoading = true;

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {

        if(this.readyState == 4 && this.status == 200) {

          //Remove loading icon
          $("#loading").remove();
          isLoading = false;

          if(this.responseText.toString() === 'end'){

            isEnd = true;
            $('#feed').append('<br/><br/><center><p>Fin de votre activité</p></center></br></br>');
            return;

          }else{

            var dep = parseInt(this.responseText.split("DEP")[0]);
            var res = this.responseText.split("DEP")[1].split("SEP");
            var element = document.getElementById("feed");
            var sectionD = document.createElement("div");
            lastId += dep;

            for(var x = 0; x < dep; x++){

              var buttonLikeHrf = res[nbDecX * x];
              var date_text_ = res[nbDecX * x + 1];
              var img_link = res[nbDecX * x + 2];
              var nb_Like = res[nbDecX * x + 3];
              var nb_comm = res[nbDecX * x + 4];
              var titre = res[nbDecX * x + 5];
              var auteur = res[nbDecX * x + 6];
              var showBookLink = res[nbDecX * x + 7];
              var nb_pages = res[nbDecX * x + 8];
              var nameLecteur = res[nbDecX * x + 9];
              var isLiked = res[nbDecX * x + 10];
              var profilThumb = res[nbDecX * x + 11];
              var readerId = res[nbDecX * x + 12];

              if(isLiked == 'true'){
                //Print book infos
                $('#feed').append('<div class="sectionb">'
                + '<div class="topCont"><a href="myFeed?id=' + readerId
                + '"><img width="50px" height="50px" style="display : inline-block;" src="' + profilThumb + '"></a><p class="nameLecteur" >' + nameLecteur + ' a lu </p>'
                + '<div width="25px" height="25px" class="dropdown" style="display:inline-block; float: right;" class="infeed"><div style="float:right;"><button width="25px" height="25px" class="dropbtn2"></button><div class="dropdown-content">'
                + '<a href="params.php">Parametres</a><a href="../actions/disconnet.php">Déconnecter</a>'
                + '</div></div></div></div>'
                + '<center>' + titre + '</center>'
                + '<center>Par ' + auteur + '</center>'
                + '<center><a href="showBook?id=' + showBookLink + '"><img class="bookImage" src="' + img_link + '"/></a></center>'
                + '<p>'+ nb_pages + ' pages</p>'
                + '<div class="buttonLike2" id="' + 'div' + showBookLink + '"><p class="nbLike" id="' + showBookLink + '">' + nb_Like
                + '</p><img class="buttonLike" onclick="removeLike(' + showBookLink + ', this)" src="../images/like_hover.png"></div>'
                + '<p>' + date_text_ + '</p></div>');

              }else{
                //Print book infos
                $('#feed').append('<div class="sectionb">'
                + '<div class="topCont"><a href="myFeed?id=' + readerId
                + '"><img width="50px" height="50px" style="display : inline-block;" src="' + profilThumb + '"></a><p class="nameLecteur" >' + nameLecteur + ' a lu </p>'
                + '<div width="25px" height="25px"  class="dropdown" style="display:inline-block; float: right;" class="infeed"><div style="float:right;"><button width="25px" height="25px" class="dropbtn2"></button><div class="dropdown-content">'
                + '<a href="params.php">Parametres</a><a href="../actions/disconnet.php">Déconnecter</a>'
                + '</div></div></div></div>'
                + '<center>' + titre + '</center>'
                + '<center>Par ' + auteur + '</center>'
                + '<center><a href="showBook?id=' + showBookLink + '"><img class="bookImage" src="' + img_link + '"/></a></center>'
                + '<p>'+ nb_pages + ' pages</p>'
                + '<div class="buttonLike2" id="' + 'div' + showBookLink + '"><p class="nbLike" id="' + showBookLink + '">' + nb_Like
                + '</p><img class="buttonLike" onclick="addLike(' + showBookLink + ', this)" onmouseleave="changeLike2(this)" onmouseenter="changeLike(this)"  src="../images/like.png"></div>'
                + '<p>' + date_text_ + '</p></div>');

              }

              $('#feed').append('<br/>');

            }
          }

          if(dep < 5){

            $('#feed').append('<br/><br/><center><p>Fin de votre activité</p></center></br></br>');
            isEnd = true;
            return;

          }
        }
      }
    };

    id = <?php echo $id; ?>;
    xmlhttp.open("GET", "../actions/getFeed.php?min=" + lastId + "&id=" + id, true);
    xmlhttp.send();
  }

  function httpGet(theUrl)
  {

    xmlhttp=new XMLHttpRequest();

    xmlhttp.onreadystatechange=function()
    {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
        return xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET", theUrl, false );
    xmlhttp.send();
  }

  </script>

</html>
