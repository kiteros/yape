<?php
session_start();
 ?>

<!DOCTYPE html>

<html>

	<head>
		<link rel="shortcut icon" href="../images/yape_logo.png"/>
    <script src="../js/parsley.min.js"></script>
    <link rel="stylesheet" href="../style/sign.css" />

  </head>

  <body>
	<center><form action="../actions/updatePassword.php" method="post" id="form2" data-parsley-validate="">
      <ul class="formshape" id="form-style-1">
				<br/>
        <li>

            <input type="password" name="oldpass" class="field-long" placeholder="Type old password" data-parsley-trigger="change" required="" autofocus/>
        </li>
        <br/>
        <li>

            <input type="password" name="newpass1" class="field-long" placeholder="Type new password" data-parsley-trigger="change" required="" autofocus/>
        </li>
        <li>
            <input type="hidden" name="idp" value="<?php echo $_SESSION['id']; ?>"/>
            <input type="password" name="newpass2" class="field-long" placeholder="Type new password again" data-parsley-trigger="change" required="" autofocus/>
        </li>

        <li>
            <p><input type="submit" value="Update password" /></p>
        </li>
    </ul>
    </form></center>

    <script type="text/javascript">
      $('#form2').parsley();
    </script>
  </body>
