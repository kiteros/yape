<!DOCTYPE html>

<html>

	<head>
		<link rel="shortcut icon" href="../images/yape_logo.png"/>
    <script src="parsley.min.js"></script>
    <link rel="stylesheet" href="../style/sign.css" />

  </head>

  <body>
	<?php
		if(isset($_GET['er'])){
			switch($_GET['er']){
				case 'codeinit':
					echo '<center><div style="width: 50%; color: red;"><p>You can\'t write code in the fields...</p></div></center>';
					break;
			}
		}
	 ?>
	</center><form action="../actions/signup.php?lang=<?php echo $_GET['lang']; ?>" method="post" id="form2" data-parsley-validate="">
      <ul class="formshape" id="form-style-1">
				<center><li><img src="../images/liberatur_logo.PNG" width="100px" width="100px"><span id="yape_title">Liberatur - SignUp</span></li></center>
				<br/>
				<li><input type="text" name="fname" class="field-divided" placeholder="First name" autofocus/>&nbsp;<input type="text" name="lname" class="field-divided" placeholder="Last name" /></li>
        <li>
            <input type="text" name="email" class="field-long" placeholder="Nom ou adresse Email" data-parsley-trigger="change" required="" />
        </li>

        <li>
            <input type="password" name="password1" class="field-long" placeholder="Password" required=""/>
        </li>
				<li>
            <input type="password" name="password2" class="field-long" placeholder="Type password again" required=""/>
        </li>
				<li>
          <div>
                <a class="loginBtn loginBtn--facebook" href="../1353/fbconfig.php">Signup with Facebook</a>
							<label><input name="keeplog" type="checkbox" value="k">Keep me Logged in</label></div>
        </li>
        <li>
            <p><input type="submit" value="S'inscrire" /><a href="signin.php" id="creerCompte">Se connecter</a></p>
        </li>

    </ul>
    </form></center>

    <script type="text/javascript">
      $('#form2').parsley();
    </script>
  </body>
