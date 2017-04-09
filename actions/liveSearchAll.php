<?php
$query = str_replace(" ", "+", $_GET['q']);
$html = file_get_contents('https://www.googleapis.com/books/v1/volumes?q='.$query);
$obj = json_decode($html, true);
//output the response
include('../include/bdd.php');
function getMaxCara($str){
  $nbCarac = strlen($str);
  if($nbCarac > 25){
    return substr($str, 0, 25) . "...";
  }else{
    return $str;
  }
}

$x = 0;
$max = count($obj['items']);
$json = "";
while($x < $max){

  $json .= getMaxCara($obj['items'][$x]['volumeInfo']['title']) . " de " . $obj['items'][$x]['volumeInfo']['authors'][0] . "SEP" . $obj['items'][$x]['selfLink'] . "SEP";
  $json .= $obj['items'][$x]['volumeInfo']['imageLinks']['smallThumbnail'] . "SEP";

  $x++;
}

$json.= "DEP";
$getPeople = $bdd->prepare("SELECT * FROM yape_users WHERE fname LIKE '%" . $_GET['q'] . "%'");
$getPeople->execute(array(
));

while($data = $getPeople->fetch()){
  $json .= $data['fname'] . 'SEP' . $data['id'] . 'SEP';
}

echo $json . 'SEP XEP' . $getPeople->rowCount();


?>
