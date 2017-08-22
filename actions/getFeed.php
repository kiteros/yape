<?php
session_start();
include("../include/bdd.php");
$min = $_GET['min'];
$id = $_GET['id'];

//User id From in Friend
//Get the friends of the person first
$getFriend = $bdd->prepare('SELECT * FROM yape_friend WHERE from_id = :myId ORDER BY id');
$getFriend->execute(array(
  'myId' => $id
));
$str = '(' . $id;
while($dataFriend = $getFriend->fetch()){
  $str .= ',' . $dataFriend['to_id'];
}
$str .= ')';

$increm = $min + 6;
$selectFeed = $bdd->prepare('SELECT * FROM yape_books WHERE user_id_from IN ' . $str . '  ORDER BY id DESC LIMIT ' . $min . ', ' . $increm . '');
$selectFeed->execute(array(

));

$StringReturn = '';
$taille = $selectFeed->rowCount();
$y = 0;

while($data = $selectFeed->fetch()){

  $json->post[$y]->book_id = $data['book_id'];
  $json->post[$y]->date = $data['date_'];
  $json->post[$y]->idImage = $data['image_id'];
  $json->post[$y]->nb_like = $data['nb_like'];
  $json->post[$y]->nb_comment = $data['nb_comment'];
  $json->post[$y]->title = $data['title'];
  $json->post[$y]->auteur = $data['auteur'];
  $json->post[$y]->pages = $data['pages'];
  $json->post[$y]->id = $data['id'];

  $StringReturn .= $data['book_id'] . 'SEP' . $data['date_'] . 'SEP' . $data['image_id'] . 'SEP' . $data['nb_like'] . 'SEP' . $data['nb_comment'] . 'SEP';
  $StringReturn .= $data['title'] . 'SEP' . $data['auteur'] . 'SEP' . $data['id'] . 'SEP' . $data['pages'] . 'SEP';
  $selectLecteur = $bdd->prepare('SELECT * FROM yape_users WHERE id = :myId');
  $selectLecteur->execute(array(
    'myId' => $data['user_id_from']
  ));
  $dataLecteur = $selectLecteur->fetch();
  $nameLecteur = $dataLecteur['fname'];

  $isLiked = $bdd->prepare('SELECT * FROM yape_likecomment WHERE book_id = :id');
  $isLiked->execute(array(
    'id' => $data['book_id']
  ));

  $isLikedBy = 'false';
  if($isLiked->rowCount() > 0){
    while($dataLike = $isLiked->fetch()){
      //echo $dataLike['by_id'];
      if($dataLike['by_id'] == $_SESSION['id']){
        $isLikedBy = 'true';
        break;
      }
    }
  }
  $StringReturn .= $nameLecteur . 'SEP' . $isLikedBy . 'SEP' . $dataLecteur['local_profil'] . 'SEP' . $dataLecteur['id'] . 'SEP';
  $json->post[$y]->nameReader = $nameLecteur;
  $json->post[$y]->likedBy = $isLikedBy;
  $json->post[$y]->local_profil = $dataLecteur['local_profil'];
  $json->post[$y]->idReader = $dataLecteur['id'];
  $y++;
}

if($taille > 0){
  $json->size = $taille;
  echo json_encode($json);
}else{
  echo 'end';
}


 ?>
