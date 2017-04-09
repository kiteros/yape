<?php

include('../include/bdd.php');
$changeDes = $bdd->prepare('UPDATE yape_users SET bio = :bio WHERE id = :id');
$changeDes->execute(array(
  'bio' => $_POST['des'],
  'id' => $_POST['id']
));
echo 'ok';

 ?>
