<?php

  session_start();
  //Check if it is a visit or a personal account
  include('../actions/phpFunctions/checkSessionPerso.php');

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
              if($fName != '' AND $lName != ''){



              echo '<br/><h2>' . $fName . " " . $lName . '</h2><br/>';
              ?>

                <div id="leftContainer">
                  <div id="leftPart">
                    <div id="leftPart2">
                      <a class="fancybox" href="#inline1" class="darken" onmouseenter="showText()" onmouseleave="hideText()" >
                        <img width="150px" height="150px" src="<?php echo $bigPic; ?>" class="img-circle"/>
                        <p visibility="hidden" id="changepix" class="nothovered"></p>
                      </a>
                    </div>
                    <script>
                    function showText(){
                      $('#changepix').append('<img src="../images/edit.svg" width="15px" height="15px" id="submit" style="display: inline-block;"/>Change picture');
                    }

                    function hideText(){
                      $('#changepix').empty();
                    }
                    </script>
                    <div id="rightPart">
                      <p>Following : <?php echo $following; ?></p>
                      <p>Follower : <?php echo $followerer; ?></p>
                    </div>
                    <br/><br/>
                      <div id="ch" class="change">
                        <p style="display: inline-block;"><?php
                        $getBio = $bdd->prepare('SELECT * FROM yape_users WHERE id = :id');
                        $getBio->execute(array(
                          'id' => $id
                        ));
                        $dataBio = $getBio->fetch();
                        echo '" ' . $dataBio['bio'] . ' "';
                       ?>
                     </p>
                     <?php
                     if($isPersonal){
                      ?>
                       <img src="../images/edit.svg" width="15px" height="15px" id="submit" style="display: inline-block;"/>
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
                       <?php
                     }
                        ?>
                     </div>
                     <?php

                     if(!$isPersonal){

                    ?>

                    <form id="formFriend" action="../actions/addFriend.php" method="post" style="display: inline-block; vertical-align:top;">
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
                         if($nbResult2 > 0){
                           ?>
                           <center><input type="submit" value="Suivi" onclick="dounfollow(<?php echo $_GET['id']; ?>)" onmouseover="changeUnfollow(this)" onmouseleave="changefollow(this)" class="buttonDeleteFriend"/></center>
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


                function changeUnfollow(inp){
                  inp.value = "Désabonner";
                  element = document.getElementById("formFriend");
                  var id = <?php echo $_GET['id']; ?>;
                  element.action = "../actions/unFollow.php?id=" + id;
                }

                function changefollow(inp){
                  inp.value = "Suivi";
                }

                </script>
          </div>
        </div>
        <br/><hr/><br/>

        <div id="feed">

        </div>
        <?php
      }else{
        echo "<br/><br/><br/><br/><br/><br/><br/><center>Compte inexistant</center>";
      }
         ?>
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
              label: "<?php echo $string[$_SESSION['lang']]['myfeed']['pagegraph']; ?>",
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
    var nbDecX = 9;
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
                return;

              }else{

                dep = parseInt(this.responseText.split("DEP")[0]);
                var res = this.responseText.split("DEP")[1].split("SEP");
                var element = document.getElementById("feed");

                lastId += dep;

                for(var x = 0; x < dep; x++){

                  var addLike_href = res[nbDecX * x];
                  var date_text_ = res[nbDecX * x + 1];
                  var img_link = res[nbDecX * x + 2];
                  var nb_likes = res[nbDecX * x + 3];
                  var nb_comm = res[nbDecX * x + 4];
                  var titre = res[nbDecX * x + 5];
                  var auteur = res[nbDecX * x + 6];
                  var nb_pages = res[nbDecX * x + 7];
                  var showBookHref = res[nbDecX * x + 8];

                  var personal_ = '<?php echo $isPersonalStr; ?>';

                  if(personal_ == 't'){

                    //Compte personel
                    //Affiche du titre et de l'auteur
                    $('#feed').append('<div class="sectionb">'
                    + '<div class="topCont">'
                    + '<div width="25px" height="25px" class="dropdown" style="display:inline-block; float: right;" class="infeed"><div style="float:right;"><button width="25px" height="25px" class="dropbtn2"></button><div class="dropdown-content">'
                    + '<a href="../actions/onPost/DeletePost.php?idpost=' + showBookHref + '&pfrom=0">Delete</a><a href="../actions/onPost/editPost.php">Edit</a><a href="../actions/onPost/editPost.php">Signal</a>'
                    + '</div></div></div></div>'
                    + '<center>' + titre + '</center>'
                    + '<center>Par ' + auteur + '</center>'
                    + '<center><a href="showBook?id=' + showBookHref + '"><img class="bookImage" src="' + img_link + '"/></a></center>'
                    + '<p>'+ nb_pages + ' pages</p><br/>'
                    + '<div class="buttonLike2" id="' + 'div' + showBookHref + '"><p class="nbLike" id="' + showBookHref + '">' + nb_likes
                    + '</p><img class="buttonLike" src="../images/like.png"></div>'
                    + '<p>' + date_text_ + '</p></div>');

                    $('#feed').append('<hr/><br/>');

                  }else{

                    //Compte externe -> Autoriser les likes
                    //Affiche du titre et de l'auteur
                    $('#feed').append('<div class="sectionb">'
                    + '<div class="topCont">'
                    + '<div width="25px" height="25px" class="dropdown" style="display:inline-block; float: right;" class="infeed"><div style="float:right;"><div class="dropdown-content">'
                    + '<a href="../actions/onPost/DeletePost.php?idpost=' + showBookHref + '&pfrom=0">Delete</a><a href="../actions/onPost/editPost.php">Edit</a><a href="../actions/onPost/editPost.php">Signal</a>'
                    + '</div></div></div></div>'
                    + '<center>' + titre + '</center>'
                    + '<center>Par ' + auteur + '</center>'
                    + '<center><a href="showBook?id=' + showBookHref + '"><img class="bookImage" src="' + img_link + '"/></a></center>'
                    + '<p>'+ nb_pages + ' pages</p><br/>'
                    + '<div class="buttonLike2" id="' + 'div' + showBookHref + '"><p class="nbLike" id="' + showBookHref + '">' + nb_likes
                    + '</p><img class="buttonLike" onclick="addLike(' + showBookHref + ', this)" onmouseleave="changeLike2(this)" onmouseenter="changeLike(this)"  src="../images/like.png"></div>'
                    + '<p>' + date_text_ + '</p></div>');

                    $('#feed').append('<hr/><br/>');

                  }



                }
              }

              if(dep < 5){
                //Il n'y a plus rien à afficher
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


  </script>

    <?php
		include('include/footer.php');
    ?>
</html>
