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
foreach ($stacknb as &$value) {
    echo $stack[$value] . '<br/>';
}

 ?>
