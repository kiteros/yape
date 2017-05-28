<?php

header('Access-Control-Allow-Origin: *');

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
