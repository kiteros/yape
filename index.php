<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script>
$.getJSON('http://api.wipmania.com/jsonp?callback=?', function (data) {
  var contryCode = data.address.country_code;
  window.location.replace('mainpage.php?lang=' + contryCode);
});
</script>
