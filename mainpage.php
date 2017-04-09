<?php
  session_start();
 //Check the cookie

 if(isset($_COOKIE['login_name']) AND isset($_COOKIE['login_pass'])){
	 //login
   echo 'done';
   $_SESSION['login_name'] = $_COOKIE['login_name'];
   $_SESSION['login_pass'] = $_COOKIE['login_pass'];
	 header("Location: actions/signin.php");

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
  <script type="text/javascript" src="js/jquery.onepage-scroll.js"></script>
  <link href='js/onepage-scroll.css' rel='stylesheet' type='text/css'>
  <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no">


  <style>


    .wrapper {
    	height: 100% !important;
    	height: 100%;
    	margin: 0 auto;
    	overflow: hidden;
    }


    .main {
      float: left;
      width: 100%;
      margin: 0 auto;
    }


    .reload.bell {
      font-size: 12px;
      padding: 20px;
      width: 45px;
      text-align: center;
      height: 47px;
      border-radius: 50px;
      -webkit-border-radius: 50px;
      -moz-border-radius: 50px;
    }

    .reload.bell #notification {
      font-size: 25px;
      line-height: 140%;
    }

    .reload, .btn{
      display: inline-block;
      border: 4px solid #A2261E;
      border-radius: 5px;
      -moz-border-radius: 5px;
      -webkit-border-radius: 5px;
      background: #CC3126;
      display: inline-block;
      line-height: 100%;
      padding: 0.7em;
      text-decoration: none;
      color: #fff;
      width: 100px;
      line-height: 140%;
      font-size: 17px;
      font-family: open sans;
      font-weight: bold;
    }
    .reload:hover{
      background: #444;
    }
    .btn {
      width: 200px;
      color: rgb(255, 255, 255);
      border: 4px solid rgb(0, 0, 0);
      background: rgba(3, 3, 3, 0.75);
    }
    .clear {
      width: auto;
    }
    .btn:hover, .btn:hover {
      background: #444;
    }
    .btns {
      width: 410px;
      margin: 50px auto;
    }
    .credit {
      text-align: center;
      color: rgba(0,0,0,0.5);
      padding: 10px;
      width: 410px;
      clear: both;
    }
    .credit a {
      color: rgba(0,0,0,0.85);
      text-decoration: none;
      font-weight: bold;
      text-align: center;
    }

    .back {
      position: absolute;
      top: 0;
      left: 0;
      text-align: center;
      display: block;
      padding: 7px;
      width: 100%;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      background: rgba(255, 255, 255, 0.25);
      font-weight: bold;
      font-size: 13px;
      color: #000;
      -webkit-transition: all 500ms ease-in-out;
      -moz-transition: all 500ms ease-in-out;
      -o-transition: all 500ms ease-in-out;
      transition: all 500ms ease-in-out;
    }
    .back:hover {
      color: black;
      background: rgba(255, 255, 255, 0.5);
    }

    .main section .page_container {
      position: relative;
      top: 25%;
      margin: 0 auto 0;
      max-width: 950px;
      z-index: 3;
    }
    .main section  {
      overflow: hidden;
    }

    .main section > img {
      position: absolute;
      max-width: 100%;
      z-index: 1;
    }

    .main section.page1{
      background-image: url('images/book.jpg');
      background-size: cover;
    }

    .main section .page_container .btns {
      clear: both;
      float: left;
      text-align: center;
      width: 435px;
    }
    .main section .page_container .btns a{
      text-align: center;
    }
    .main section.page2 {
      background: rgb(255,255,255) ;
    }
    header{
      background:rgb(255, 255, 255);
    }
    .main section.page2 > img {
      position: absolute;
      top: -300px;
      left: 50%;
      margin-left: -1095px;
    }
    .main section.page2 .page_container {
      margin-top: 240px;
      overflow: hidden;
    }

    .viewing-page-2 .back{
      background: rgba(0, 0, 0, 0.25);
      color: #FFF;
      }
    .main section.page3 {
      background:url(tilted-phone.png) no-repeat 156px -150px ;
    }
    .main section.page3 .page_container {
      overflow: hidden;
      width: 500px;
      right: -285px;
    }
    .main section.page3 h1 {
      text-align: left;
      padding: 0;
      margin-bottom: 0;
      font-size: 70px;
      letter-spacing: -1px;
      color: black;
    }

    body.disabled-onepage-scroll .onepage-wrapper  section {
      min-height: 100%;
      height: auto;
    }

    body.disabled-onepage-scroll .main section .page_container, body.disabled-onepage-scroll .main section.page3 .page_container  {
      padding: 20px;
      margin-top: 150px;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }

    body.disabled-onepage-scroll  section .page_container h1{
      text-align: center;
      font-size: 50px;
    }
    body.disabled-onepage-scroll section .page_container h2, body.disabled-onepage-scroll section .page_container .credit, body.disabled-onepage-scroll section .page_container .btns{
      text-align: center;
      width: 100%;
    }

    body.disabled-onepage-scroll .main section.page1 > img {
      position: absolute;
      width: 80%;
      left: 10%;
    }

    body.disabled-onepage-scroll .main section > img {
      position: relative;
      max-width: 80%;
      bottom: 0;
    }
    body.disabled-onepage-scroll code {
      width: 95%;
      margin: 0 auto 25px;
      float: none;
      overflow: hidden;
    }

    body.disabled-onepage-scroll .main section.page3 .page_container {
      width: 90%;
      margin-left: auto;
      margin-right: auto;
      right: 0;
    }

    header{
      background:rgb(255, 255, 255);
    }
	</style>



	<script>
	  $(document).ready(function(){
      $(".main").onepage_scroll({
        sectionContainer: "section",
        responsiveFallback: 600,
        loop: true
      });
		});

	</script>
</head>
<body>
  <div class="wrapper">
	  <div class="main">

      <section class="page1">
        <header id="headpublic">
      	  <div id="logo">
      	    <a href=""><img src="images/yape_logo.png" width="65px" height="65px" style="margin-left: 30px;"/></a>
      	  </div>

      	  <div id="searchBar">

      	    <form action="actions/search.php">
      	      <input type="text" name="search" placeholder="Search anything..." class="smallSearch" autocomplete="off" onkeyup="ontouch(this.value)" />

      				<div id="hints_float">
                <div style="display: inline-block;" id="loading2"></div>
      				</div>
      	    </form>
      	  </div>

          <?php
          if(!isset($_SESSION['id'])){
           ?>
      	  <div class="connect">
      	    <button id="myBtn" class="buttonSignUp" onclick="showSignUp()">Sign Up</button>
      	    <button id="myBtn" class="buttonSignIn" onclick="showSignIn()">Sign In</button>
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

      </section>

      <script>

    	var isLoading = false;
    	function ontouch(str){
    		if(!isLoading){

    			$('#hints_float').empty();
          $('#hints_float').append('<div style=\"display: inline-block;\" id=\"loading2\"></div>');
    			isLoading = true;
    			$('#loading2').append('<center id="loading"><div><img width="30px" height="30px" src="../images/Loading_icon.gif" /></div></center>');

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
    									li2.href = "actions/showBookAndPeople.php?book=" + res[3 * x + 1];
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

    	<script>
    		function showSignUp(){
    			/*vex.dialog.open({
    			    message: 'Enter your username and password:',
    			    input: [
    			        '<input name="username" type="text" placeholder="Username" required />',
    			        '<input name="password" type="password" placeholder="Password" required />',
    							'<input name="password2" type="password" placeholder="Type password again" required />',
    							'<label><input name="keeplog" type="checkbox"  value="k">Keep me Logged in</label>'
    			    ].join(''),
    			    buttons: [
    			        $.extend({}, vex.dialog.buttons.YES, { text: 'Sign up' }),
    			        $.extend({}, vex.dialog.buttons.NO, { text: 'Back' })
    			    ],
    			    callback: function (data) {
    			        if (!data) {
    			            console.log('Cancelled')
    			        } else {
    								if(data.password == data.password2){
    									window.location.replace("actions/signup.php?name=" + data.username + "&password=" + data.password + "&keeplog="  + data.keeplog);
    								}else{
    									vex.dialog.alert('Passwords are differents')
    								}

    			        }
    			    }
    			})*/
          location.replace("manag/signup.php");
    		}

    		function showSignIn(error){
    			/*vex.dialog.open({
    			    message: 'Enter your username and password to connect:',
    			    input: [
    			        '<input name="username" type="text" placeholder="Username" required />',
    			        '<input name="password" type="password" placeholder="Password" required />',
    							'<label><input type="checkbox" name="keeplog" value="k">Keep me Logged in</label>'
    			    ].join(''),
    			    buttons: [
    			        $.extend({}, vex.dialog.buttons.YES, { text: 'Sign in' }),
    			        $.extend({}, vex.dialog.buttons.NO, { text: 'Back' })
    			    ],
    			    callback: function (data) {
    			        if (!data) {
    			            console.log('Cancelled')
    			        } else {
    								if(data.keeplog == 'k'){
    									window.location.replace("actions/signin.php?name=" + data.username + "&password=" + data.password + "&keeplog=" + data.keeplog);
    								}else{
                      window.location.replace("actions/signin.php?name=" + data.username + "&password=" + data.password);
                    }

    			        }
    			    }
    			})*/
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

	    <section class="page2">
        <div class="content_">
    			<br/>

    			<center><h2><?php echo $string[$_GET['lang']]['index']['p1']; ?></h2></center><br/>
    			<center><p style="text-align:justify; width : 60%"><?php echo $string[$_GET['lang']]['index']['p2']; ?></p></center><br/>
    				<?php
    					include('include/bdd.php');

    					$select = $bdd->prepare('SELECT * FROM yape_bookday WHERE id = :id');
    					$select->execute(array(
    						'id' => 1
    					));
    					$dataDay = $select->fetch();
    					$bookLink2 = $dataDay['book_id'];
    					echo '<center><br/><br/><h2>Livre du jour</h2></center>';
    					echo '<br/><br/>';
              $html2 = file_get_contents($bookLink2);
              $obj2 = json_decode($html2, true);
              echo '<center><h2>' . $obj2['volumeInfo']['title'] . '</h2></center><br/>';
              echo '<center><img width="250px" src="' .  $obj2['volumeInfo']['imageLinks']['medium'] . '" /></center><br/>';
              echo '<center><p>Nombre de pages : ' . $obj2['volumeInfo']['pageCount'] . '</p></center><br/><br/>';

    				 ?>
        <div>
      </section>

	    <section class="page3">
        <div class="content_" style="margin-top : 10%;">
    			<br/><center><h3>Rejoignez les</h3></center>
          <?php
    				include("include/bdd.php");
    				$GETnb = $bdd->prepare('SELECT * FROM yape_nbUsers WHERE id = 1');
    			  $GETnb->execute(array());

    			  $dataNb = $GETnb->fetch();
    			  $CurrentNb = $dataNb['number_'];

    				echo '<br/><center><h2 class="bigNumber">' . $CurrentNb . '</h2></center><center><h3> personnes inscrites </h3></center><br/><br/>';
    			?>

        <div>
      </section>
    </div>
  </div>
</body>
</html>
