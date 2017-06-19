<?php
  session_start();
 ?>

<link href="../style/includeStyle/navSt.css" rel="stylesheet">

<div class="side">
  <center><div id="logo">
    <a href="http://yapeone.com/main/index.php?lang=<?php echo $_SESSION['lang']; ?>"><img src="../images/yape_logo.png" width="65px" height="65px" style="margin-left: 30px;"/></a>
  </div></center>

	<?php
  if($_SESSION['id'] == ''){
    //Boutton se connecter
    ?>
    <center><button id="myBtn" class="buttonSignUp" onclick="showSignUp()">Sign Up</button></center><br/>
    <center><button id="myBtn" class="buttonSignIn" onclick="showSignIn()">Sign In</button></center>
    <?php
	}else{
		//Photo et nom
		?>
		<div id="profilPic">
	    <p style="display:inline-block;" class="inProfil2"></p>
	    <a href="../perso/myFeed.php?id=<?php echo $_SESSION['id']; ?>"><img style="display:inline-block;" class="inProfil" width="50px" height="50px" src="<?php echo $_SESSION['profil']; ?>"></a>

	    <div class="dropdown" style="display:inline-block;" class="inProfil">
	      <button class="dropbtn"><?php echo $_SESSION['fname']; ?></button>
	      <div class="dropdown-content">
	        <a href="params.php">Parametres</a>
	        <a href="../actions/disconnet.php">Déconnecter</a>
	      </div>
	    </div>

	  </div>
		<?php
	}
   ?>



  <form id="searchForm" action="actions/search.php" autocomplete="off" method="post">
      <input id="s" name="search" placeholder="Search..." autocomplete="off" onkeyup="ontouch(this.value)"/>
  </form>

  <br/><br/><br/>

  <div id="hints_float2">
  </div>

  <div>
	  <ul class="menu-vertical">
	    <li class="mv-item"><a href="main.php">Actualités<img width="20px" height="20px" src="../images/act.svg" style="float: right;margin-bottom:4px;"></a></li>
	    <li class="mv-item"><a href="myFeed.php">Mon activité<img width="20px" height="20px" src="../images/news.svg" style="float: right;margin-bottom:4px;"></a></li>
	    <li class="mv-item"><a href="recommendations.php">Recommendations<img width="20px" height="20px" src="../images/book.svg" style="float: right;margin-bottom:4px;"></a></li>
	  </ul>
	</div>

</div>

<script>
	//Script de connexion et d'inscription
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
