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
     /*vex.dialog.open({
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
     })*/
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
        <div>
          <div id="left">
            <?php
              //Afficher les infos personnelles de la personne
              $getFollow = $bdd->prepare('SELECT * FROM yape_users WHERE id =:id');
              $getFollow->execute(array(
            		'id' => $id
            	));
              $datafollow = $getFollow->fetch();
              $following = $datafollow['following'];

              $getFollower = $bdd->prepare('SELECT * FROM yape_users WHERE id =:id');
              $getFollower->execute(array(
            		'id' =>  $id
            	));

              $datafollower = $getFollower->fetch();
              $followerer = $datafollower['follower'];


              echo '<br/><h2>' . $_SESSION['fname'] . " " . $_SESSION['lname'] . '</h2><br/>';
              ?>

                <div id="leftContainer">
                  <div id="leftPart">
                    <div id="leftPart">
                      <img width="150px" height="150px" src="<?php echo $bigPic; ?>" />
                    </div>
                    <div id="rightPart">
                      <p>Following : <?php echo $following; ?></p>
                      <p>Follower : <?php echo $followerer; ?></p>
                    </div>
                    <br/><br/>
                      <div id="ch" class="change">
                        "<p style="display: inline-block;"><?php
                        $getBio = $bdd->prepare('SELECT * FROM yape_users WHERE id = :id');
                        $getBio->execute(array(
                          'id' => $id
                        ));
                        $dataBio = $getBio->fetch();
                        echo $dataBio['bio'];
                       ?>
                     </p>"
                     <?php
                     if($_SESSION['id'] == $id){
                      ?>
                       <img src="../images/edit.svg" width="15px" height="15px" id="submit" style="display: inline-block;"/>
                       <?php
                     }
                        ?>
                     </div>
                     <?php

                     if($_SESSION['id'] != $id){

                    ?>

                    <form action="../actions/addFriend.php" method="post" style="display: inline-block; vertical-align:top;">
                      <input type="hidden" name="toadd" value="<?php echo $id; ?>" />
                      <?php
                         if(isset($_SESSION['id'])){

                           //On vérifie qu'ils ne soient pas déja amis

                           ?>
                           <input type="hidden" name="from" value="<?php echo $_SESSION['id']; ?>" />
                           <?php

                         }
                         //Si ils sont amis:
                         include('../include/bdd.php');
                         $from = $id;
                         $to = $_SESSION['id'];

                         $getF = $bdd->prepare('SELECT * FROM yape_friend WHERE from_id = :id AND to_id = :to');
                         $getF->execute(array(
                           'id' => $from,
                           'to' => $to
                         ));

                         $nbResult = $getF->rowCount();
                         $getF2 = $bdd->prepare('SELECT * FROM yape_friend WHERE to_id = :id AND from_id = :to');
                         $getF2->execute(array(
                           'id' => $from,
                           'to' => $to
                         ));

                         $nbResult2 = $getF2->rowCount();
                         if($nbResult > 0 OR $nbResult2 > 0){
                           ?>
                           <p>Suivi</p>
                           <?php
                         }else{
                           ?>
                           <input type="submit" value="Suivre" class="buttonAddFriend"/>

                           <?php

                         }
                       ?>

                    </form>
                    <?php
                     }
                     //Afficher les charts

                     ?>
                  </div>
                  <div id="booksPorgression">
                    <canvas id="rightPartCanevas" width="400" height="200"></canvas>
                  </div>
                </div>
                <script>

                $('#submit').click(function(e){
                  var html = $('.change p').html();
                  //Changer la bio
                  $('.change').replaceWith('<div id="ch" class="change"><textarea id="change1" row="15" cols="30">'+html +'</textarea><br/><button onclick="changevalider()" class="buttonSignIn" >Valider</button></div>').html().focus();

                });

                function changevalider(){
                  var html2 = document.getElementById("change1").value;
                  var xmlhttp = new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                      location.reload();
                    }
                  };
                  var params = "des=" + html2 + "&id=" + <?php echo $id; ?>;
                  xmlhttp.open("POST", "../actions/changeDes.php", true);
                  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                  xmlhttp.send(params);
                }



                </script>

          </div>

        </div>
        <br/><hr/><br/>

        <div id="feed">

        </div>
    </div>
    <a href="#0" class="cd-top">Top</a>
    <script src="../js/main.js"></script>
  </body>

  <?php

  function js_str($s)
  {
      return '"' . addcslashes($s, "\0..\37\"\\") . '"';
  }

  function js_array($array)
  {
      $temp = array_map('js_str', $array);
      return implode(',', $temp);
  }

  //Récupérer toutes les pages luues
  $getpages = $bdd->prepare('SELECT * FROM yape_books WHERE user_id_from = :id');
  $getpages->execute(array(
    'id' => $id
  ));

  $tabmonth = array();
  while($datapages = $getpages->fetch()){
    $tabmonth[substr($datapages['date_'], 0, -3)] += $datapages['pages'];
  }
  $allDates = array_keys($tabmonth);
  $allData = array_values($tabmonth);

   ?>

  <script>
   var ctx = document.getElementById("rightPartCanevas").getContext("2d");
   var data = {
      labels: ["signup", <?php echo js_array($allDates) ?>],
      datasets: [
          {
              label: "Page Reading Pace",
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)'
              ],
              borderColor: [
                  'rgba(255,99,132,1)'
              ],
              borderWidth: 1,
              data: [0, <?php echo js_array($allData) ?>],
          }
      ]
  };
  new Chart(ctx, {
    type: 'line',
    data: data,
    options: {}
});
   </script>

  <script>

  //browser window scroll (in pixels) after which the "back to top" link is shown
    var offset = 300,
  	//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
  	offset_opacity = 1200,
  	//duration of the top scrolling animation (in ms)
  	scroll_top_duration = 700;
    var isEnd = false;
    var lastId = 0;
    //Des qu'on arriv en bas de page
    $(window).scroll(function(){
      if  ($(window).scrollTop() == $(document).height() - $(window).height()){
          if(!isEnd){
            AddMoreContent();
          }
       }
    });

    /*function changeLike(image){
      image.src = "../images/like_hover.png";
    }

    function changeLike2(image){
      image.src = "../images/like.png";
    }*/
    var isLoading = false;
    AddMoreContent();
    function AddMoreContent(){
      //On fetch en AJAX pour récupere + 10 articles et les ajouter au div
      //Loading_icon
      if(!isLoading){
        $('#feed').append('<center id="loading"><br/><div><img width="30px" height="30px" src="../images/Loading_icon.gif" /></div><br/><br/></center>');
        isLoading = true;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200) {
              $("#loading").remove();
              isLoading = false;
              var dep;
              if(this.responseText.toString() === 'end'){
                isEnd = true;
                $('#feed').append('<br/><br/><center><p>Fin de votre activité</p></center></br></br>');
                //alert('lol');
                return;
              }else{
                dep = parseInt(this.responseText.split("DEP")[0]);
                var res = this.responseText.split("DEP")[1].split("SEP");

                var element = document.getElementById("feed");

                lastId += dep;

                for(var x = 0; x < dep; x++){

                  var titre = res[9 * x + 5];
                  //Affiche du titre et de l'auteur
                  $('#feed').append('<center>' + titre + '</center>');
                  var auteur = res[9 * x + 6];
                  $('#feed').append('<center>Par ' + auteur + '</center>');

                  var date_text_ = res[9 * x + 1];
                  var img_link = res[9 * x + 2];

                  var date_text = document.createTextNode(date_text_);
                  var date = document.createElement("p");
                  var center = document.createElement("center");
                  var seeBook = document.createElement("a");
                  var image = document.createElement("img");

                  seeBook.href = "#";
                  date.appendChild(date_text);
                  image.src = img_link;
                  image.className = "bookImage";
                  seeBook.appendChild(image);
                  center.appendChild(seeBook);
                  element.appendChild(center);
                  //
                  $('#feed').append('<p>'+ res[9 * x + 8] + 'pages</p>');
                  //Ajout du like et comment
                  $('#feed').append('<div class="buttonLike2"><p class="nbLike">' + res[9 * x + 3] + '</p><img class="buttonLike" onmouseleave="changeLike2(this)" onmouseenter="changeLike(this)" onclick="addLike(' + res[9 * x] + ')" src="../images/like.png"></div>');
                  element.appendChild(date);
                  $('#feed').append('<hr/><br/>');

                }
              }


              if(dep < 5){
                $('#feed').append('<br/><br/><center><p>Fin de votre activité</p></center></br></br>');
                return;
              }

            }
        };
      }


      id = <?php echo $id; ?>;
      xmlhttp.open("GET", "../actions/getPersoFeed.php?min=" + lastId + "&id=" + id, true);
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

    /*AddMoreContent();
    function addLike(linkRef, image){
      //on ajoute un like
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //Like est ajouté
            changeLike(image);
          }
      };
      xmlhttp.open("GET", "../actions/addLike.php?book=" + linkRef, true);
      xmlhttp.send();
    }*/


  </script>

    <?php
		include('include/footer.php');
    ?>
</html>
