<?php
  if(isset($_GET['book'])){
    $likBook = $_GET['book'];
    $html = file_get_contents($likBook);
    $obj = json_decode($html, true);
    echo '<br/><br/><center><h2>' . $obj['volumeInfo']['title'] . '</h2></center><br/>';
    echo '<center><img src="' .  $obj['volumeInfo']['imageLinks']['thumbnail'] . '" /></center><br/>';
    echo '<center><p>Nombre de pages : ' . $obj['volumeInfo']['pageCount'] . '</p></center><br/>';
    include('../include/bdd.php');

    $numberRead = $bdd->prepare('SELECT * FROM yape_books WHERE book_id = :id');
    $numberRead->execute(array(
      'id' => $likBook
    ));
    $nbRead = $numberRead->rowCount();
    echo '<center><p>Read ' . $nbRead . ' times</p></center>';
    echo '<center><a href="../index.php">Back</a></center>';
  }
 ?>
