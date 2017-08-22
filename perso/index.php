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
    <link rel="stylesheet" href="../style/returnIcon.css" />

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">
    <link href="css/searchBar.css" rel="stylesheet">

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
                <a class="navbar-brand" href="../../">Liberatur</a>
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
                            <a href="myFeed.php?id=<?php echo $_SESSION['id']; ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="../params/changeInfo.php"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../actions/disconnet.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
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
                    <li>
                      <section class="main">
                    	 <form class="search" method="post" action="index.html" >
                    		 <input type="text" name="search" placeholder="Search..." autocomplete="off" onkeyup="ontouch(this.value)"/>

                      		 <ul class="results" id="res">

                      		 </ul>
                           
                    	 </form>
                    </section>
                    </li>
                </ul>
            </div>


            <!-- /.navbar-collapse -->
            <div class="container">

        </nav>


        <div id="page-wrapper">

          <div class="row" id="feed">

          </div>
            <!-- /.container-fluid -->
            <a href="#0" class="cd-top">Top</a>
            <script src="../js/main.js"></script>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



</body>

<script src="../include/searchBarJS.js"></script>

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
  image.src = "../images/add_green.svg";
}

function changeLike2(image){
  image.src = "../images/add.svg";
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

        var textToreplace = '<div style="float: right;" id="' + 'div' + likeId1 + '"><p class="nbLike" id="' + likeId1 + '">' + likeId2
        + '<img src="../images/add_green.svg" onclick="removeLike(' + showBookLink + ', this)" width="25px" height="25px" >'
        + '</p></div>';

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

        var textToreplace = '<div style="float: right;" id="' + 'div' + likeId3 + '"><p class="nbLike" id="' + likeId3 + '">' + likeId4
        + '<img src="../images/add.svg" onclick="addLike(' + linkRef + ', this)" onmouseleave="changeLike2(this)" onmouseenter="changeLike(this)" width="25px" height="25px" >'
        + '</p></div>';

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

          var myOBJson = JSON.parse(this.responseText);
          dep = myOBJson.size;

          lastId += dep;

          for(var x = 0; x < dep; x++){

            var buttonLikeHrf = myOBJson.post[x].book_id;
            var date_text_ = myOBJson.post[x].date;
            var img_link = myOBJson.post[x].idImage;
            var nb_Like = myOBJson.post[x].nb_like;
            var nb_comm = myOBJson.post[x].nb_comment;
            var titre = myOBJson.post[x].title;
            var auteur = myOBJson.post[x].auteur;
            var nb_pages = myOBJson.post[x].pages;
            var showBookLink = myOBJson.post[x].id;
            var nameLecteur = myOBJson.post[x].nameReader;
            var isLiked = myOBJson.post[x].likedBy;
            var profilThumb = myOBJson.post[x].local_profil;
            var readerId = myOBJson.post[x].id;

            if(isLiked == 'true'){
              //Print book infos
              //Afficher liked
              $('#feed').append('<div class="col-lg-4" style="height:750px;"><div class="panel panel-default"><div class="panel-heading">'
              + '<h3 class="panel-title"><a href="myFeed?id=' + readerId
              + '"><img width="30px" height="30px" style="display : inline-block;" src="' + profilThumb + '"> ' + nameLecteur + '</a></h3></div><div class="panel-body">'
              + '<center><h3>' + titre +'<h3/>'
              + '<h4>' + auteur +'<h4/><a href="showBook?id=' + showBookLink + '"><img style="max-width:300px; max-height:400px" class="bookImage" src="' + img_link + '"/></a></center>'
              + '<p> ' + nb_pages + ' pages</p>'
              + '<p> ' + date_text_ + '</p>'
              + '<div style="float: right;" id="' + 'div' + showBookLink + '"><p class="nbLike" id="' + showBookLink + '">' + nb_Like
              + '<img src="../images/add_green.svg" onclick="removeLike(' + showBookLink + ', this)" width="25px" height="25px" >'
              + '</p></div></div>'
              + '</div>');

            }else{
              //Print book infos
              //Afficher no liked
              $('#feed').append('<div class="col-lg-4" style="height:750px;"><div class="panel panel-default"><div class="panel-heading">'
              + '<h3 class="panel-title"><a href="myFeed?id=' + readerId
              + '"><img width="30px" height="30px" style="display : inline-block;" src="' + profilThumb + '"> ' + nameLecteur + '</a></h3></div><div class="panel-body">'
              + '<center><h3>' + titre +'<h3/>'
              + '<h4>' + auteur +'<h4/><a href="showBook?id=' + showBookLink + '"><img style="max-width:300px; max-height:400px" class="bookImage" src="' + img_link + '"/></a></center>'
              + '<p> ' + nb_pages + ' pages</p>'
              + '<p> ' + date_text_ + '</p>'
              + '<div style="float: right;" id="' + 'div' + showBookLink + '"><p class="nbLike" id="' + showBookLink + '">' + nb_Like
              + '<img src="../images/add.svg" onclick="addLike(' + showBookLink + ', this)" onmouseleave="changeLike2(this)" onmouseenter="changeLike(this)" width="25px" height="25px" >'
              + '</p></div></div>'
              + '</div>');

            }

          }
        }

        if(dep < 6){

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
