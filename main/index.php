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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Yape - the book coach</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" />
    <!-- Squad theme CSS -->
    <link href="css/style.css" rel="stylesheet">
	<link href="color/default.css" rel="stylesheet">
  <link rel="stylesheet" href="css/searchBar.css" />

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<!-- Preloader -->
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

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#intro">Home</a></li>
        <li><a href="#about">About</a></li>
		<li><a href="#service">Service</a></li>
		<li><a href="#contact">Contact</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Example menu</a></li>
            <li><a href="#">Example menu</a></li>
            <li><a href="#">Example menu</a></li>
          </ul>
        </li>
      </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

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
		<div class="page-scroll">
			<a href="#service" class="btn btn-circle">
				<i class="fa fa-angle-double-down animated"></i>
			</a>
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
					<h2>About us</h2>
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
                      <div class="avatar"><img src="<?php echo $bigPic; ?>" alt="" class="img-responsive img-circle" /></div>
                  </div>
                </div>
				</div>
            </div>
			<div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow bounceInUp" data-wow-delay="0.5s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Maura Daniels</h5>
                        <p class="subtitle">Ruby on Rails</p>
                        <div class="avatar"><img src="img/team/2.jpg" alt="" class="img-responsive img-circle" /></div>

                    </div>
                </div>
				</div>
            </div>
			<div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow bounceInUp" data-wow-delay="0.8s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Jack Briane</h5>
                        <p class="subtitle">jQuery Ninja</p>
                        <div class="avatar"><img src="img/team/3.jpg" alt="" class="img-responsive img-circle" /></div>

                    </div>
                </div>
				</div>
            </div>
			<div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow bounceInUp" data-wow-delay="1s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Tom Petterson</h5>
                        <p class="subtitle">Typographer</p>
                        <div class="avatar"><img src="img/team/4.jpg" alt="" class="img-responsive img-circle" /></div>

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
					<h2>Our Services</h2>
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
						<h5>Print</h5>
						<p>Vestibulum tincidunt enim in pharetra malesuada. Duis semper magna metus electram accommodare.</p>
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
						<h5>Web Design</h5>
						<p>Vestibulum tincidunt enim in pharetra malesuada. Duis semper magna metus electram accommodare.</p>
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
						<h5>Photography</h5>
						<p>Vestibulum tincidunt enim in pharetra malesuada. Duis semper magna metus electram accommodare.</p>
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
						<h5>Cloud System</h5>
						<p>Vestibulum tincidunt enim in pharetra malesuada. Duis semper magna metus electram accommodare.</p>
					</div>
                </div>
				</div>
            </div>
        </div>
		</div>
	</section>
	<!-- /Section: services -->




	<!-- Section: contact -->
    <section id="contact" class="home-section text-center">
		<div class="heading-contact">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>Get in touch</h2>
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
        <div class="col-lg-8">
            <div class="boxed-grey">
                <form id="contact-form">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Subject</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="na" selected="">Choose One:</option>
                                <option value="service">General Customer Service</option>
                                <option value="suggestions">Suggestions</option>
                                <option value="product">Product Support</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-skin pull-right" id="btnContactUs">
                            Send Message</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

		<div class="col-lg-4">
			<div class="widget-contact">
				<h5>Main Office</h5>

				<address>
				  <strong>Squas Design, Inc.</strong><br>
				  Tower 795 Folsom Ave, Beautiful Suite 600<br>
				  San Francisco, CA 94107<br>
				  <abbr title="Phone">P:</abbr> (123) 456-7890
				</address>

				<address>
				  <strong>Email</strong><br>
				  <a href="mailto:#">email.name@example.com</a>
				</address>
				<address>
				  <strong>We're on social networks</strong><br>
                       	<ul class="company-social">
                            <li class="social-facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li class="social-twitter"><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li class="social-dribble"><a href="#" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                            <li class="social-google"><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
				</address>

			</div>
		</div>
    </div>

		</div>
	</section>
	<!-- /Section: contact -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="wow shake" data-wow-delay="0.4s">
					<div class="page-scroll marginbot-30">
						<a href="#intro" id="totop" class="btn btn-circle">
							<i class="fa fa-angle-double-up animated"></i>
						</a>
					</div>
					</div>
					<p>&copy;Copyright 2014 - Squad. All rights reserved. <a href="http://bootstraptaste.com/">Bootstrap Themes</a> by BootstrapTaste</p>
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