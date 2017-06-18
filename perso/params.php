<?php
  session_start();

  ?>

<!DOCTYPE html>

<html>

	<head>

	    <meta charset="utf-8" />
      <script src="../js/parsley.min.js"></script>
      <link rel="stylesheet" href="../style/sign.css" />
      <link rel="stylesheet" href="../style/style.css" />
      <link rel="stylesheet" href="../style/stylePerso.css" />
	    <title>Yape - My page</title>
	</head>

	<body>

    <div class="content">
      <?php
      include('../include/nav.php');
       ?>
        <!-- content -->
        <div>
          <br/><br/>


        <center><form action="../params/changeInfo.php" method="post" id="form2" data-parsley-validate="">
            <ul class="formshape" id="form-style-2">

              <li>
                  <input type="text" name="fname" class="field-divided" value="<?php echo $_SESSION['fname'];?>" autofocus/>&nbsp;&nbsp;<input type="text" name="lname" class="field-divided" value="<?php echo $_SESSION['lname']; ?>" />
              </li>

              <li>
                  <input type="hidden" name="idp" value="<?php echo $_SESSION['id']; ?>"/>
                  <label>Adresse email</label><input type="text" name="email" class="field-long" value="<?php echo $_SESSION['email'];?>" required=""/>
              </li>

              <li>
                  <p><input type="submit" value="Mettre à jour"/></p>
              </li>
          </ul>
          </form></center>
          <center><a style="text-decoration:none;color:red;" href="../params/changePass.php" id="changepass">Changer le mot de passe</a></center>

          <script type="text/javascript">
            $('#form2').parsley();
          </script>
        </div>
        <br/><br/>

    </div>
  </body>

</html>
