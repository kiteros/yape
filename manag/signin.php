<?php

if(isset($_COOKIE['login_name']) AND isset($_COOKIE['login_pass'])){
  //login
  session_start();
  $_SESSION['login_name'] = $_COOKIE['login_name'];
  $_SESSION['login_pass'] = $_COOKIE['login_pass'];
  header("Location: ../actions/autosignin.php?lang=" . $_GET['lang']);

}

?>

<!DOCTYPE html>

<html>

	<head>
		<link rel="shortcut icon" href="../images/yape_logo.png"/>
    <script src="../js/parsley.min.js"></script>
    <link rel="stylesheet" href="../style/sign.css" />

  </head>

  <body>
	</center><form action="../actions/signin.php?lang=<?php echo $_GET['lang']; ?>" method="post" id="form2" data-parsley-validate="">
      <ul class="formshape" id="form-style-1">
				<center><li><img src="../images/liberatur_logo.PNG" width="100px" width="100px"><span id="yape_title">Liberatur - Login</span></li></center>
				<br/>
        <li>

            <input type="text" name="email" class="field-long" placeholder="Adresse Email" data-parsley-trigger="change" required="" autofocus/>
        </li>

        <li>

            <input type="password" name="password" class="field-long" placeholder="Password" required=""/>
        </li>
        <li>
          <div>
                <a class="loginBtn loginBtn--facebook" href="../1353_log/fbconfig.php">Login with Facebook</a>
                <label><input name="keeplog" type="checkbox" value="k">Keep me Logged in</label></div>
        </li>
        <li>
            <p><input type="submit" value="Se connecter" /><a href="signup.php" id="creerCompte">Creer un compte</a></p>
        </li>
    </ul>
    </form></center>

    <script type="text/javascript">
      $('#form2').parsley();
    </script>
  </body>
