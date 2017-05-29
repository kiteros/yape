<style>
#s{
	/* The search text box. */

	border:1px solid #bbbecc;
  border-radius: 5px;
	color:#888888;
	background:url("../images/searchicon2.png") no-repeat;
	float:left;
  margin-left: 25px;
  margin-top: 30px;
	font-family:Arial,Helvetica,sans-serif;
	font-size:15px;
	height:36px;
	padding:0 0 0 35px;
	width:200px;
}

</style>
<div class="side">
  <div id="logo">
    <a href="http://yapeone.com/"><img src="../images/yape_logo.png" width="65px" height="65px" style="margin-left: 30px;"/></a>
  </div>
  <div id="profilPic">
    <p style="display:inline-block;" class="inProfil2"></p>
    <a class="fancybox" href="#inline1"><img style="display:inline-block;" class="inProfil" width="50px" height="50px" src="<?php echo $_SESSION['profil']; ?>"></a>

    <div class="dropdown" style="display:inline-block;" class="inProfil">
      <button class="dropbtn"><?php echo $_SESSION['fname']; ?></button>
      <div class="dropdown-content">
        <a href="params.php">Parametres</a>
        <a href="../actions/disconnet.php">Déconnecter</a>
      </div>
    </div>

  </div>

  <form id="searchForm" action="actions/search.php" autocomplete="off" method="post">
      <input id="s" name="search" placeholder="Search..." autocomplete="off" onkeyup="ontouch(this.value)"/>
  </form>
  <br/><br/><br/>
  <div id="hints_float2">
     </div>

     <?php
         if($_SESSION['id'] == ''){
         //Boutton se connecter
         ?>
         <div class="connect">
           <button id="myBtn" class="buttonSignUp" onclick="showSignUp()">Sign Up</button>
           <form action="actions/signin.php" method="post">
             <input type="submit" value="Sign in" class="buttonSignIn"/>
           </form>
         </div>
         <?php
       }
        ?>
  <div>
  <ul class="menu-vertical">
    <li class="mv-item"><a href="main.php">Actualités</a></li>
    <li class="mv-item"><a href="myFeed.php">Mon activité</a></li>
    <li class="mv-item"><a href="recommendations.php">Recommendations</a></li>
  </ul>
</div>
</div>
