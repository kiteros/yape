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



  <script>
  var profilThumb = '<?php echo $_SESSION['profil']; ?>';
  var offset = 300,
  offset_opacity = 1200,

  scroll_top_duration = 700;
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
    //on ajoute un like

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          //Like est ajouté
          changeLike(image);
          //$('#' + this.responseText.split('SPLIT')[0]).replaceWith('<p class="nbLike" id="' + this.responseText.split('SPLIT')[0] + '">' + this.responseText.split('SPLIT')[1] + '</p>');
          //On fige le like
          var textToreplace = '<div class="buttonLike2" id="' + 'div' + this.responseText.split('SPLIT')[0] + '"><p class="nbLike" id="' + this.responseText.split('SPLIT')[0] + '">' + this.responseText.split('SPLIT')[1];
          textToreplace += '</p><img class="buttonLike" onclick="removeLike(\'' + linkRef + '\', this)" src="../images/like_hover.png"></div>';
          $('#div' + this.responseText.split('SPLIT')[0]).replaceWith(textToreplace);
        }
    };
    xmlhttp.open("GET", "../actions/addLike.php?book=" + linkRef, true);
    xmlhttp.send();
  }

  function removeLike(linkRef, image){
    //on ajoute un like

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          //Like est ajouté
          changeLike2(image);
          //$('#' + this.responseText.split('SPLIT')[0]).replaceWith('<p class="nbLike" id="' + this.responseText.split('SPLIT')[0] + '">' + this.responseText.split('SPLIT')[1] + '</p>');
          //On fige le like
          var textToreplace = '<div class="buttonLike2" id="' + 'div' + this.responseText.split('SPLIT')[0] + '"><p class="nbLike" id="' + this.responseText.split('SPLIT')[0] + '">' + this.responseText.split('SPLIT')[1];
          textToreplace += '</p><img class="buttonLike" onclick="addLike(\'' + linkRef + '\', this)" onmouseleave="changeLike2(this)" onmouseenter="changeLike(this)" src="../images/like_hover.png"></div>';
          $('#div' + this.responseText.split('SPLIT')[0]).replaceWith(textToreplace);
        }
    };
    xmlhttp.open("GET", "../actions/removeLike.php?book=" + linkRef, true);
    xmlhttp.send();
  }

  var isLoading = false;
  AddMoreContent();
  function AddMoreContent(){
    //On fetch en AJAX pour récupere + 5 articles et les ajouter au div
    if(!isLoading){
      $('#feed').append('<center id="loading"><br/><div><img width="30px" height="30px" src="../images/Loading_icon.gif" /></div><br/><br/></center>');
      isLoading = true;
      var xmlhttp = new XMLHttpRequest();
      //On ajoute l'icone de chargement
      xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {

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
            lastId += dep;
            for(var x = 0; x < dep; x++){

              var titre = res[11 * x + 5];
              var nameLecteur = res[11 * x + 9];
              //Affiche du titre et de l'auteur
              $('#feed').append('<div class="topCont"><img width="50px" height="50px" style="display : inline-block;" src="' + profilThumb + '"><p class="nameLecteur" >' + nameLecteur + ' a lu </p></div>');
              $('#feed').append('<center>' + titre + '</center>');
              var auteur = res[11 * x + 6];
              $('#feed').append('<center>Par ' + auteur + '</center>');

              var date_text_ = res[11 * x + 1];
              var img_link = res[11 * x + 2];

              var date_text = document.createTextNode(date_text_);
              var date = document.createElement("p");
              var center = document.createElement("center");
              var image = document.createElement("img");

              date.appendChild(date_text);
              image.src = img_link;
              image.className = "bookImage";
              center.appendChild(image);
              element.appendChild(center);

              var isLiked = res[11 * x + 10];
              if(isLiked == 'true'){
                var textToreplace2 = '<div class="buttonLike2" id="' + 'div' + res[11 * x + 7] + '"><p class="nbLike" id="' + res[11 * x + 7] + '">' + res[11 * x + 3];
                textToreplace2 += '</p><img class="buttonLike" onclick="removeLike(\'' + res[11 * x] + '\', this)" src="../images/like_hover.png"></div>';
                $('#feed').append(textToreplace2);
              }else{
                $('#feed').append('<div class="buttonLike2" id="' + 'div' + res[11 * x + 7] + '"><p class="nbLike" id="' + res[11 * x + 7] + '">' + res[11 * x + 3] + '</p><img class="buttonLike" onclick="addLike(\'' + res[11 * x] + '\', this)" onmouseleave="changeLike2(this)" onmouseenter="changeLike(this)"  src="../images/like.png"></div>');
              }

              $('#feed').append('<p>'+ res[11 * x + 8] + 'pages</p>');
              //Ajout du like et comment

              element.appendChild(date);
              $('#feed').append('<hr/><br/>');

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

    <?php
		include('include/footer.php');
    ?>
</html>
