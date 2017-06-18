<link rel="shortcut icon" href="../images/yape_logo.png"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="../complete/awesomplete.js" async></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script src="../js/modernizr.js"></script>
<link href="../style/dropzone.css" type="text/css" rel="stylesheet" />
<script src="../js/dropzone.js"></script>
<script src="../js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../style/sweetalert.css">
<link href="//cdn.rawgit.com/noelboss/featherlight/1.7.0/release/featherlight.min.css" type="text/css" rel="stylesheet" />
<script src="//code.jquery.com/jquery-latest.js"></script>
<script src="//cdn.rawgit.com/noelboss/featherlight/1.7.0/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" src="../js/fancyapps-fancyBox-c00852a/lib/jquery.mousewheel.pack.js?v=3.1.3"></script>

<script type="text/javascript" src="../js/fancyapps-fancyBox-c00852a/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="../js/fancyapps-fancyBox-c00852a/source/jquery.fancybox.css?v=2.1.5" media="screen" />

<link rel="stylesheet" type="text/css" href="../js/fancyapps-fancyBox-c00852a/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
<script type="text/javascript" src="../js/fancyapps-fancyBox-c00852a/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

<link rel="stylesheet" type="text/css" href="../js/fancyapps-fancyBox-c00852a/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
<script type="text/javascript" src="../js/fancyapps-fancyBox-c00852a/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<script type="text/javascript" src="../js/fancyapps-fancyBox-c00852a/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<script src="../js/Chart.js"></script>

<link rel="stylesheet" href="../js/croppie.css" />
<script src="../js/croppie.js"></script>

<?php
if($id == '' and !isset($_GET['stay'])){
	header('Location: ../manag/signin.php');
}
include('allStrings.php');
?>
