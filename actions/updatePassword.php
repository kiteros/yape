<?php

session_start();
include('../include/bdd.php');
$oldpass = sha1($_POST['oldpass']);
$newpass1 = $_POST['newpass1'];
$newpass2 = $_POST['newpass2'];
$id_perso = $_POST['idp'];

if($newpass1 == $newpass2){

  $sel = $bdd->prepare('SELECT * from yape_users WHERE id = :idp');
  $sel->execute(array(
    'idp' => $id_perso
  ));
  $dataSel = $sel->fetch();
  echo $id_perso;
  echo $dataSel['password'] . "<br/>";
  echo $oldpass;
  if($dataSel['password'] == $oldpass){
    $up = $bdd->prepare('UPDATE yape_users SET password = :newpa WHERE id = :idp');
    $up->execute(array(
      'newpa' => sha1($newpass1),
      'idp' => $id_perso
    ));

    header('Location: ../perso/params.php');
  }else{
    header('Location: ../perso/params.php?error=notrightold');
  }


}else{
  header('Location: ../perso/params.php?error=notsame');
}



 ?>
