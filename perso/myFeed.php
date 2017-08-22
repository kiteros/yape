<?php

  session_start();
  //Check if it is a visit or a personal account
  include('../actions/phpFunctions/checkSessionPerso.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Liberatur Perso</title>
    <?php
     include('../include/metadata.php');
     ?>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/myFeedCss.css" />
    <link rel="stylesheet" href="../style/returnIcon.css" />

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Liberatur</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['fname']; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> News</a>
                    </li>
                    <li>
                        <a href="charts.php"><i class="fa fa-fw fa-bar-chart-o"></i> WorldWide</a>
                    </li>
                    <li>
                        <a href="tables.php"><i class="fa fa-fw fa-table"></i> Recommendations</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>


        <div id="page-wrapper">

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
          <div class="row" id="feed">

          </div>

          <?php
        }else{
          echo "<br/><br/><br/><br/><br/><br/><br/><center>Compte inexistant</center>";
        }
           ?>
      </div>
      <a href="#0" class="cd-top">Top</a>
      <script src="../js/main.js"></script>

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



        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


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

                  var myOBJson = JSON.parse(this.responseText);
                  dep = myOBJson.size;

                  lastId += dep;

                  for(var x = 0; x < dep; x++){

                    var addLike_href = myOBJson.post[x].book_id;
                    var date_text_ = myOBJson.post[x].date;
                    var img_link = myOBJson.post[x].idImage;
                    var nb_likes = myOBJson.post[x].nb_like;
                    var nb_comm = myOBJson.post[x].nb_comment;
                    var titre = myOBJson.post[x].title;
                    var auteur = myOBJson.post[x].auteur;
                    var nb_pages = myOBJson.post[x].pages;
                    var showBookLink = myOBJson.post[x].id;

                    var personal_ = '<?php echo $isPersonalStr; ?>';

                    if(personal_ == 't'){

                      //Compte personel
                      //Affiche du titre et de l'auteur
                      $('#feed').append('<div class="col-lg-4" style="height:750px;"><div class="panel panel-default"><div class="panel-heading">'
                      + '<h3 class="panel-title">'
                      + '</h3></div><div class="panel-body">'
                      + '<center><a href="showBook?id=' + showBookLink + '"><img style="max-width:300px; max-height:400px" class="bookImage" src="' + img_link + '"/></a></center>'
                      + '<p> ' + nb_pages + ' pages</p>'
                      + '<p> ' + date_text_ + '</p>'
                      + '</div></div></div>');

                    }else{

                      //Compte externe -> Autoriser les likes
                      //Affiche du titre et de l'auteur
                      $('#feed').append('<div class="col-lg-4" style="height:750px;"><div class="panel panel-default"><div class="panel-heading">'
                      + '<h3 class="panel-title">'
                      + '</h3></div><div class="panel-body">'
                      + '<center><h3>' + titre +'<h3/>'
                      + '<h4>' + auteur +'<h4/><a href="showBook?id=' + showBookLink + '"><img style="max-width:300px; max-height:400px" class="bookImage" src="' + img_link + '"/></a></center>'
                      + '<p> ' + nb_pages + ' pages</p>'
                      + '<p> ' + date_text_ + '</p>'
                      + '</div></div></div>');

                    }
                  }
                }

                if(dep < 6){
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
</body>


</html>
