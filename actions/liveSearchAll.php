<?php
$query = str_replace(" ", "+", $_GET['q']);
$html = file_get_contents('https://www.googleapis.com/books/v1/volumes?q='.$query);
$obj = json_decode($html, true);
//output the response
include('../include/bdd.php');
function getMaxCara($str){
  return explode(",",$str)[0];
}

$x = 0;
$max = count($obj['items']);
while($x < $max){

  $json->bookResult[$x]->title = $obj['items'][$x]['volumeInfo']['title'];
  $json->bookResult[$x]->author = $obj['items'][$x]['volumeInfo']['authors'][0];
  $json->bookResult[$x]->link = $obj['items'][$x]['selfLink'];
  $json->bookResult[$x]->thumb = $obj['items'][$x]['volumeInfo']['imageLinks']['smallThumbnail'];
  $x++;
}

$getPeople = $bdd->prepare("SELECT * FROM yape_users WHERE fname LIKE '%" . $_GET['q'] . "%'");
$getPeople->execute(array(
));

$x = 0;
while($data = $getPeople->fetch()){
  $json->people[$x]->firstName = $data['fname'];
  $json->people[$x]->id = $data['id'];
  $x++;
}

$json->results = $getPeople->rowCount();

echo json_encode($json);


?>
