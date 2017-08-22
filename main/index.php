<?php
  session_start();
 //Check the cookie

 function after ($this, $inthat)
 {
     if (!is_bool(strpos($inthat, $this)))
     return substr($inthat, strpos($inthat,$this)+strlen($this));
 };


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
          <h1>LIBERATUR</h1>
        </a>
      </div>

      <?php
        if(isset($_SESSION['id'])){
          ?>
          <div class="collapse navbar-collapse navbar-right navbar-main-collapse" style="margin-right=50px;">
            <a href="../perso/myFeed.php?id=<?php echo $_SESSION['id']; ?>"><img style="display:inline-block;" class="inProfil" width="50px" height="50px" src="<?php echo $_SESSION['profil']; ?>"></a>
          </div>
          <?php
        }else{
       ?>
      <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a onclick="showSignIn()"><?php echo $string[$_GET['lang']]['index']['signin']; ?></a></li>
          <li><a onclick="showSignUp()"><?php echo $string[$_GET['lang']]['index']['signup']; ?></a></li>
        </ul>
      </div>
      <?php
      }
       ?>
    </div>
  </nav>

  <script>

    function showSignUp(){
      location.replace("https://www.yapeone.com/manag/signup.php?lang=<?php echo $_GET['lang']; ?>");
    }

    function showSignIn(error){
      location.replace("https://www.yapeone.com/manag/signin.php?lang=<?php echo $_GET['lang']; ?>");
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
  		<h2><?php echo $string[$_GET['lang']]['index']['readsmt']; ?></h2>
      <center><div id="wrap">
        <form action="../actions/search.php" autocomplete="off">
          <input id="search" name="search" type="text" placeholder="<?php echo $string[$_GET['lang']]['index']['placeholder']; ?>" autocomplete="off" onkeyup="ontouch(this.value)" >
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

	<!-- Section: services -->
    <section id="service" class="home-section text-center bg-gray">

		<div class="heading-about">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2><?php echo $string[$_GET['lang']]['index']['what']; ?></h2>
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
						<h5><?php echo $string[$_GET['lang']]['index']['q1']; ?></h5>
						<p><?php echo $string[$_GET['lang']]['index']['q1-1']; ?></p>
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
						<h5><?php echo $string[$_GET['lang']]['index']['q2']; ?></h5>
						<p><?php echo $string[$_GET['lang']]['index']['q2-1']; ?></p>
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
						<h5><?php echo $string[$_GET['lang']]['index']['q3']; ?></h5>
						<p><?php echo $string[$_GET['lang']]['index']['q3-1']; ?></p>
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
						<h5><?php echo $string[$_GET['lang']]['index']['q4']; ?></h5>
						<p><?php echo $string[$_GET['lang']]['index']['q4-1']; ?></p>
					</div>
                </div>
				</div>
            </div>
        </div>
		</div>
	</section>
	<!-- /Section: services -->


  	<!-- Section: about -->
    <section id="about" class="home-section text-center">
  		<div class="heading-about">
  			<div class="container">
  			  <div class="row">
  				  <div class="col-lg-8 col-lg-offset-2">
  					  <div class="wow bounceInDown" data-wow-delay="0.4s">
    					  <div class="section-heading">
    					    <h2><?php echo $string[$_GET['lang']]['index']['dayReader']; ?></h2>
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
                    if($donnesUser['local_profil'] == '../images/user.png'){
                      $bigPic = $donnesUser['local_profil'];
                    }else{
                      $bigPic = '../images/bigPic/' . after('../images/thumbnails/', $donnesUser['local_profil']);
                    }
                    $name_ = $donnesUser['fname'];

                    ?>
                  <h5><?php echo $name_; ?></h5>
                  <p class="subtitle"><?php echo $string[$_GET['lang']]['index']['b1']; ?></p>
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
                    if($donnesUser['local_profil'] == '../images/user.png'){
                      $bigPic = $donnesUser['local_profil'];
                    }else{
                      $bigPic = '../images/bigPic/' . after('../images/thumbnails/', $donnesUser['local_profil']);
                    }
                    $name_ = $donnesUser['fname'];

                    ?>
                  <h5><?php echo $name_; ?></h5>
                  <p class="subtitle"><?php echo $string[$_GET['lang']]['index']['b2']; ?></p>
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
                  if($donnesUser['local_profil'] == '../images/user.png'){
                    $bigPic = $donnesUser['local_profil'];
                  }else{
                    $bigPic = '../images/bigPic/' . after('../images/thumbnails/', $donnesUser['local_profil']);
                  }
                  $name_ = $donnesUser['fname'];

                  ?>
                  <h5><?php echo $name_; ?></h5>
                  <p class="subtitle"><?php echo $string[$_GET['lang']]['index']['b3']; ?></p>
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
                  if($donnesUser['local_profil'] == '../images/user.png'){
                    $bigPic = $donnesUser['local_profil'];
                  }else{
                    $bigPic = '../images/bigPic/' . after('../images/thumbnails/', $donnesUser['local_profil']);
                  }

                  $name_ = $donnesUser['fname'];

                  ?>
                  <h5><?php echo $name_; ?></h5>
                  <p class="subtitle"><?php echo $string[$_GET['lang']]['index']['b4']; ?></p>
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

    <!-- Section: about -->
    <section id="about2" class="home-section text-center">
  		<div class="heading-about">
  			<div class="container">
  			  <div class="row">
  				  <div class="col-lg-8 col-lg-offset-2">
  					  <div class="wow bounceInDown" data-wow-delay="0.4s">
    					  <div class="section-heading">
    					    <h2>REJOIGNEZ NOUS</h2>
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
            <div class="slogan">
              <?php
                include("../include/bdd.php");
                $GETnb = $bdd->prepare('SELECT * FROM yape_nbUsers WHERE id = 1');
                $GETnb->execute(array());

                $dataNb = $GETnb->fetch();
                $CurrentNb = $dataNb['number_'];
               ?>
              <h1><span style="color : orange;"><?php echo $CurrentNb; ?></span></h1>
              <h3>lecteurs inscrits</h3>
            </div>
          </div>
        </div>
    </section>
  	<!-- /Section: about -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="wow shake" data-wow-delay="0.4s">

					</div>
					</div>
					<p>&copy;Copyright 2017 - Jules Eschbach</p>
				</div>
			</div>
		</div>
	</footer>

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/wow.min.js"></script>
  <script src="js/custom.js"></script>

</body>

</html>
<script src="../js/persoJS/loadingMainPage.js"></script>
