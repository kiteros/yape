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
	 header("Location: ../actions/autosignin.php");

 }
 include('../include/allStrings.php');
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Yape - the book coach</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="../images/yape_logo.png"/>
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">
	<link href="color/default.css" rel="stylesheet">
  <link rel="stylesheet" href="css/searchBar.css" />

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

	<div id="preloader">
	  <div id="load"></div>
	</div>

  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
          <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="index.html">
          <h1>YAPE</h1>
        </a>
      </div>

      <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a onclick="showSignIn()">Sign In</a></li>
          <li><a onclick="showSignUp()">Sign Up</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <script>

    function showSignUp(){
      location.replace("../manag/signup.php");
    }

    function showSignIn(error){
      location.replace("../manag/signin.php");
    }

    function showError(){
      vex.dialog.confirm({
        message: 'Erreur : les identifiants sont inconnus',
        callback: function(value) {
          if(value){
            console.log('')
          }else{
            console.log('')
          }
        }
      })
    }
  </script>

	<!-- Section: intro -->
  <section id="intro" class="intro">
    <div class="slogan">
  		<h2>READ SOMETHING LATELY?</h2>
      <center><div id="wrap">
        <form action="actions/search.php" autocomplete="off">
          <input id="search" name="search" type="text" placeholder="Search any book.." autocomplete="off" onkeyup="ontouch(this.value)" >
          <input id="search_submit" value="Rechercher" type="submit">
        </form>
      </div></center>
      <br/>
      <div id="hints_float">
        <div style="display: inline-block;" id="loading2"></div>
        <div style="display: inline-block;" id="back"></div>
      </div>
    </div>
  </section>
	<!-- /Section: intro -->

	<!-- Section: about -->
  <section id="about" class="home-section text-center">
		<div class="heading-about">
			<div class="container">
			  <div class="row">
				  <div class="col-lg-8 col-lg-offset-2">
					  <div class="wow bounceInDown" data-wow-delay="0.4s">
  					  <div class="section-heading">
  					    <h2>Readers of the week</h2>
  					    <i class="fa fa-2x fa-angle-down"></i>
  					  </div>
					  </div>
				  </div>
			  </div>
			</div>
		</div>

		<div class="container">

  		  <div class="row">
  			  <div class="col-lg-2 col-lg-offset-5">
  				  <hr class="marginbot-50">
  			  </div>
  		  </div>

        <div class="row">
          <div class="col-xs-6 col-sm-3 col-md-3">
  				  <div class="wow bounceInUp" data-wow-delay="0.2s">
              <div class="team boxed-grey">
                <div class="inner">
                  <?php
                  include('../include/bdd.php');

                  $select = $bdd->prepare('SELECT * FROM yape_bookday WHERE id = :id');
                  $select->execute(array(
                    'id' => 3
                  ));
                  $dataDay = $select->fetch();
                  $pday = $dataDay['book_id'];

                  //Afficher image
                  $SearchUser2 = $bdd->prepare('SELECT * FROM yape_users WHERE id = :id');
                  $SearchUser2->execute(array(
                    'id' => $pday
                  ));

                  $donnesUser = $SearchUser2->fetch();
                  $bigPic = '../images/bigPic/' . after('images/thumbnails/', $donnesUser['local_profil']);
                  $name_ = $donnesUser['fname'];

                  ?>
                <h5><?php echo $name_; ?></h5>
                <p class="subtitle">Book eater</p>
                <div class="avatar">
                  <img src="<?php echo $bigPic; ?>" alt="" class="img-responsive img-circle" /></div>
                </div>
              </div>
  				  </div>
          </div>

  			  <div class="col-xs-6 col-sm-3 col-md-3">
  				  <div class="wow bounceInUp" data-wow-delay="0.5s">
              <div class="team boxed-grey">
                <div class="inner">
                  <?php
                  include('../include/bdd.php');

                  $select = $bdd->prepare('SELECT * FROM yape_bookday WHERE id = :id');
                  $select->execute(array(
                    'id' => 6
                  ));
                  $dataDay = $select->fetch();
                  $pday = $dataDay['book_id'];

                  //Afficher image
                  $SearchUser2 = $bdd->prepare('SELECT * FROM yape_users WHERE id = :id');
                  $SearchUser2->execute(array(
                    'id' => $pday
                  ));

                  $donnesUser = $SearchUser2->fetch();
                  $bigPic = '../images/bigPic/' . after('images/thumbnails/', $donnesUser['local_profil']);
                  $name_ = $donnesUser['fname'];

                  ?>
                <h5><?php echo $name_; ?></h5>
                <p class="subtitle">Epic nerd</p>
                <div class="avatar">
                  <img src="<?php echo $bigPic; ?>" alt="" class="img-responsive img-circle" />
                </div>
              </div>
            </div>
  				</div>
        </div>

  			<div class="col-xs-6 col-sm-3 col-md-3">
  				<div class="wow bounceInUp" data-wow-delay="0.8s">
            <div class="team boxed-grey">
              <div class="inner">
                <?php
                include('../include/bdd.php');

                $select = $bdd->prepare('SELECT * FROM yape_bookday WHERE id = :id');
                $select->execute(array(
                  'id' => 7
                ));
                $dataDay = $select->fetch();
                $pday = $dataDay['book_id'];

                //Afficher image
                $SearchUser2 = $bdd->prepare('SELECT * FROM yape_users WHERE id = :id');
                $SearchUser2->execute(array(
                  'id' => $pday
                ));

                $donnesUser = $SearchUser2->fetch();
                $bigPic = '../images/bigPic/' . after('images/thumbnails/', $donnesUser['local_profil']);
                $name_ = $donnesUser['fname'];

                ?>
                <h5><?php echo $name_; ?></h5>
                <p class="subtitle">Letter Master</p>
                <div class="avatar">
                  <img src="<?php echo $bigPic; ?>" alt="" class="img-responsive img-circle" />
                </div>
              </div>
            </div>
  			  </div>
        </div>

  			<div class="col-xs-6 col-sm-3 col-md-3">
  				<div class="wow bounceInUp" data-wow-delay="1s">
            <div class="team boxed-grey">
              <div class="inner">
                <?php
                include('../include/bdd.php');

                $select = $bdd->prepare('SELECT * FROM yape_bookday WHERE id = :id');
                $select->execute(array(
                  'id' => 8
                ));
                $dataDay = $select->fetch();
                $pday = $dataDay['book_id'];

                //Afficher image
                $SearchUser2 = $bdd->prepare('SELECT * FROM yape_users WHERE id = :id');
                $SearchUser2->execute(array(
                  'id' => $pday
                ));

                $donnesUser = $SearchUser2->fetch();
                $bigPic = '../images/bigPic/' . after('images/thumbnails/', $donnesUser['local_profil']);
                $name_ = $donnesUser['fname'];

                ?>
                <h5><?php echo $name_; ?></h5>
                <p class="subtitle">Ink drinker</p>
                <div class="avatar">
                  <img src="<?php echo $bigPic; ?>" alt="" class="img-responsive img-circle" />
                </div>
              </div>
            </div>
  				</div>
        </div>
      </div>
  	</div>
  </section>
	<!-- /Section: about -->


	<!-- Section: services -->
    <section id="service" class="home-section text-center bg-gray">

		<div class="heading-about">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>What is the goal?</h2>
					<i class="fa fa-2x fa-angle-down"></i>

					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="container">
		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
				<hr class="marginbot-50">
			</div>
		</div>
        <div class="row">
            <div class="col-sm-3 col-md-3">
				<div class="wow fadeInLeft" data-wow-delay="0.2s">
                <div class="service-box">
					<div class="service-icon">
						<img src="img/icons/service-icon-1.png" alt="" />
					</div>
					<div class="service-desc">
						<h5>Read</h5>
						<p>Access a giant database of books.</p>
					</div>
                </div>
				</div>
            </div>
			<div class="col-sm-3 col-md-3">
				<div class="wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-box">
					<div class="service-icon">
						<img src="img/icons/service-icon-2.png" alt="" />
					</div>
					<div class="service-desc">
						<h5>Remember</h5>
						<p>Store all the books you ever read.</p>
					</div>
                </div>
				</div>
            </div>
			<div class="col-sm-3 col-md-3">
				<div class="wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-box">
					<div class="service-icon">
						<img src="img/icons/service-icon-3.png" alt="" />
					</div>
					<div class="service-desc">
						<h5>Share</h5>
						<p>Show to your friends the books you read, and maybe you will find what you love.</p>
					</div>
                </div>
				</div>
            </div>
			<div class="col-sm-3 col-md-3">
				<div class="wow fadeInRight" data-wow-delay="0.2s">
                <div class="service-box">
					<div class="service-icon">
						<img src="img/icons/service-icon-4.png" alt="" />
					</div>
					<div class="service-desc">
						<h5>Discover</h5>
						<p>Use our most advanced technique to find books you may like.</p>
					</div>
                </div>
				</div>
            </div>
        </div>
		</div>
	</section>
	<!-- /Section: services -->


	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="wow shake" data-wow-delay="0.4s">

					</div>
					</div>
					<p>&copy;Copyright 2017 - Jules Eschbach</p>
                    <!--
                        All links in the footer should remain intact.
                        Licenseing information is available at: http://bootstraptaste.com/license/
                        You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Squadfree
                    -->
				</div>
			</div>
		</div>
	</footer>

    <!-- Core JavaScript Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>

</body>

</html>
<script>
//document.getElementById("hints_float").style.visibility = 'hidden';
var isLoading = false;
function ontouch(str){
  if(!isLoading){

    $('#hints_float').empty();
    $('#hints_float').append('<div style=\"display: inline-block;\" id=\"loading2\"></div><div id="back"></div>');
    isLoading = true;
    $('#loading2').append('<div id="loading"><img width="30px" height="30px" src="img/Loading_icon.gif" /></div><div id="back"></div>');

  }
  var element = document.getElementById("hints_float");
    if (str.length == 0) {

      element.innerHTML = "<div style=\"display: inline-block;\" id=\"loading2\"><div id=\"back\"></div></div>";
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
              document.getElementById("back").innerHTML = "";
              document.getElementById("back").style.visibility = 'visible';
              var x = 0;
              var res = this.responseText.split("DEP")[0].split("SEP");
              var nbPeople = this.responseText.split("XEP")[1];

              $('#back').append('<div class="whiteSeparator">Books</div>');
              while(x < 4){
                var imageMini = document.createElement("img");
                imageMini.scr = res[3 * x + 2];
                var li2 = document.createElement("a");
                li2.href = "../perso/addBook.php?stay=ok&link=" + res[3 * x + 1];
                var br = document.createElement("br");
                var text2 = document.createTextNode(res[3 * x]);
                li2.appendChild(text2);
                li2.appendChild(imageMini);
                var element2 = document.getElementById("back");
                element2.appendChild(li2);
                element2.appendChild(br);
                x++;
              }
              $('#back').append('<div class="whiteSeparator">People</div>');
              var res2 = this.responseText.split("DEP")[1].split("SEP");
              x = 0;

              if(nbPeople >= 4){
                nbPeople = 4;
              }
              while(x < nbPeople){
                var li3 = document.createElement("a");
                li3.href = "../perso/myFeed.php?id=" + res2[2 * x + 1];
                var br = document.createElement("br");
                var text2 = document.createTextNode(res2[2 * x]);
                li3.appendChild(text2);
                var element2 = document.getElementById("back");
                element2.appendChild(li3);
                element2.appendChild(br);
                x++;
              }
            }
        };
        xmlhttp.open("GET", "../actions/liveSearchAll.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
