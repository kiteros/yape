<?php
//Search people and things
$html = file_get_contents('https://www.googleapis.com/books/v1/volumes?q='.$_GET['search']);
$obj = json_decode($html, true);
 ?>


<html>
  <head>
    <title>Books API Example</title>
  </head>
  <body>
    <div id="content"></div>
    <?php
      $x = 0;
      $limit = 8;
      while($x < count($obj['items'])){
        echo $obj['items'][$x]['volumeInfo']['title'] . " de " . $obj['items'][$x]['volumeInfo']['authors'][0] . "<br/>";
        $x++;
      }
     ?>
  </body>
</html>
