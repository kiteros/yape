<?php

header('Access-Control-Allow-Origin: *');
if(isset($_COOKIE['login_name']) AND isset($_COOKIE['login_pass'])){
  //login
  session_start();
  $_SESSION['login_name'] = $_COOKIE['login_name'];
  $_SESSION['login_pass'] = $_COOKIE['login_pass'];
  header("Location: actions/autosignin.php");

}

?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script>
$.getJSON('http://api.wipmania.com/jsonp?callback=?', function (data) {
  var contryCode = data.address.country_code;
  switch(contryCode){
    case 'FR':
      contryCode='FR';
      break;
    case 'EN':
      contryCode='EN';
      break;
    default:
      contryCode='EN';
      break;
  }
  window.location.replace('main/index.php?lang=' + contryCode);
});
</script>
