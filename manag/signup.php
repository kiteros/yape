<!DOCTYPE html>

<html>

	<head>
		<link rel="shortcut icon" href="../images/yape_logo.png"/>
    <script src="parsley.min.js"></script>
    <link rel="stylesheet" href="../style/sign.css" />

  </head>

  <body>
	</center><form action="../actions/signup.php" method="post" id="form2" data-parsley-validate="">
      <ul class="form-style-1">
				<center><li><img src="../images/yape_logo.png" width="100px" width="100px"><span id="yape_title">Yape - SignUp</span></li></center>
				<br/>
				<li><input type="text" name="fname" class="field-divided" placeholder="First name" />&nbsp;<input type="text" name="lname" class="field-divided" placeholder="Last name" /></li>
        <li>
            <input type="text" name="email" class="field-long" placeholder="Nom ou adresse Email" data-parsley-trigger="change" required="" autofocus/>
        </li>

        <li>
            <input type="password" name="password1" class="field-long" placeholder="Password" required=""/>
        </li>
				<li>
            <input type="password" name="password2" class="field-long" placeholder="Type password again" required=""/>
        </li>
				<li>
            <label><input name="keeplog" type="checkbox" value="k">Keep me Logged in</label>
        </li>
        <li>
            <input type="submit" value="Se connecter" />
        </li>

    </ul>
    </form></center>

    <script type="text/javascript">
      $('#form2').parsley();
    </script>
  </body>
