<?php
session_start();
include('../../include/bdd.php');
$up = $bdd->prepare('SELECT * FROM yape_books WHERE user_id_from = :id');
$up->execute(array(
  'id' => $_SESSION['id']
));

$x = 0;
$counter = 0;
$stack = array();
$stack3 = array();
$stack4 = array();
$stacknb = array();
while($data = $up->fetch()){

  if($x < 10){

   $html = file_get_contents($data['book_id']);
   $obj = json_decode($html, true);
   $cat = explode(" ",explode("/", $obj['volumeInfo']['categories'][0])[0])[0];

   if($cat != ''){

     $html2 = file_get_contents('https://www.googleapis.com/books/v1/volumes?q=subject:' . $cat);
     $obj2 = json_decode($html2, true);
     $max = 10;
     for ($i = 0;$i < $max; $i++) {
        array_push($stack, $obj2['items'][$i]['volumeInfo']['title']);
        array_push($stack4, $obj2['items'][$i]['selfLink']);
        array_push($stack3, $obj2['items'][$i]['volumeInfo']['imageLinks']['thumbnail']);
        //echo $obj2['items'][$i]['volumeInfo']['title'] . '<br/>';
        $counter++;
     }

   }
   $x++;
 }else{
   break;
 }

}
$j = 0;
while($j < 10) {

   $nb = rand(0, $counter);
   if(!in_array($nb, $stacknb)){
       array_push($stacknb, $nb);
       $j++;
   }
}
$nbx = 0;
foreach ($stacknb as &$value) {
  $json->book[$nbx]->title = $stack[$value];
  $json->book[$nbx]->image = $stack3[$value];
  $json->book[$nbx]->link = $stack4[$value];
  $nbx++;
}
echo(json_encode($json));

 ?>
