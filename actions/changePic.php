<?php
session_start();
$ds = DIRECTORY_SEPARATOR;  //1

$storeFolder = '../images/profil';   //2
include('../include/bdd.php');

function make_thumb($src, $dest, $desired_width) {

	/* read the source image */
	$source_image = imagecreatefromjpeg($src);
	$width = imagesx($source_image);
	$height = imagesy($source_image);

	/* find the "desired height" of this thumbnail, relative to the desired width  */
	$desired_height = floor($height * ($desired_width / $width));

	/* create a new, "virtual" image */
	$virtual_image = imagecreatetruecolor($desired_width, $desired_height);

	/* copy source image at a resized size */
	imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

	/* create the physical thumbnail image to its destination */
	imagejpeg($virtual_image, $dest);
}

function toPNG($src, $dest){
	$source_image = imagecreatefromjpeg($src);
	imagejpeg($source_image, $dest);
}

if(!function_exists("create_square_image")){
	function create_square_image($original_file, $destination_file=NULL, $square_size = 96){

		if(isset($destination_file) and $destination_file!=NULL){
			if(!is_writable($destination_file)){
				echo '<p style="color:#FF0000">Oops, the destination path is not writable. Make that file or its parent folder wirtable.</p>';
			}
		}

		// get width and height of original image
		$imagedata = getimagesize($original_file);
		$original_width = $imagedata[0];
		$original_height = $imagedata[1];

		if($original_width > $original_height){
			$new_height = $square_size;
			$new_width = $new_height*($original_width/$original_height);
		}
		if($original_height > $original_width){
			$new_width = $square_size;
			$new_height = $new_width*($original_height/$original_width);
		}
		if($original_height == $original_width){
			$new_width = $square_size;
			$new_height = $square_size;
		}

		$new_width = round($new_width);
		$new_height = round($new_height);

		// load the image
		if(substr_count(strtolower($original_file), ".jpg") or substr_count(strtolower($original_file), ".jpeg")){
			$original_image = imagecreatefromjpeg($original_file);
		}
		if(substr_count(strtolower($original_file), ".gif")){
			$original_image = imagecreatefromgif($original_file);
		}
		if(substr_count(strtolower($original_file), ".png")){
			$original_image = imagecreatefrompng($original_file);
		}

		$smaller_image = imagecreatetruecolor($new_width, $new_height);
		$square_image = imagecreatetruecolor($square_size, $square_size);

		imagecopyresampled($smaller_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);

		if($new_width>$new_height){
			$difference = $new_width-$new_height;
			$half_difference =  round($difference/2);
			imagecopyresampled($square_image, $smaller_image, 0-$half_difference+1, 0, 0, 0, $square_size+$difference, $square_size, $new_width, $new_height);
		}
		if($new_height>$new_width){
			$difference = $new_height-$new_width;
			$half_difference =  round($difference/2);
			imagecopyresampled($square_image, $smaller_image, 0, 0-$half_difference+1, 0, 0, $square_size, $square_size+$difference, $new_width, $new_height);
		}
		if($new_height == $new_width){
			imagecopyresampled($square_image, $smaller_image, 0, 0, 0, 0, $square_size, $square_size, $new_width, $new_height);
		}


		// if no destination file was given then display a png
		if(!$destination_file){
			imagepng($square_image,NULL,9);
		}

		// save the smaller image FILE if destination file given
		if(substr_count(strtolower($destination_file), ".jpg")){
			imagejpeg($square_image,$destination_file,100);
		}
		if(substr_count(strtolower($destination_file), ".gif")){
			imagegif($square_image,$destination_file);
		}
		if(substr_count(strtolower($destination_file), ".png")){
			imagepng($square_image,$destination_file,9);
		}

		imagedestroy($original_image);
		imagedestroy($smaller_image);
		imagedestroy($square_image);

	}
}

function replace_extension($filename, $new_extension) {
    return preg_replace('/\..+$/', '.' . $new_extension, $filename);
}

if (!empty($_FILES)) {



              //3
    $tempFile = $_FILES['file']['tmp_name'];
    $targetPath = dirname( __FILE__ ) . $ds . $storeFolder . $ds;  //4
    $extension_upload = strtolower(  substr(  strrchr($_FILES['phot']['name'], '.')  ,1)  );
    $targetFile =  $targetPath. substr($_FILES['file']['name'], 0, -3) . 'png';  //5
    $changeFile = $bdd->prepare('UPDATE yape_users SET local_profil = :loc WHERE id = :id');
    $changeFile->execute(array(
      'loc' => '../images/thumbnails/' . substr($_FILES['file']['name'], 0, -3) . 'png',
      'id' => $_SESSION['id']
    ));
    $_SESSION['profil'] =  '../images/thumbnails/' . replace_extension($_FILES['file']['name'], 'png');
		$_SESSION['bigPic'] =  '../images/bigPic/' . replace_extension($_FILES['file']['name'], 'png');

    move_uploaded_file($tempFile,$targetFile); //6
		make_thumb($targetFile, '../images/profil2/' . replace_extension($_FILES['file']['name'], 'png'), 500);
    //make_thumb($targetFile, '../images/thumbnails/' . substr($_FILES['file']['name'], 0, -3) . 'png', 100);
		//toPNG($targetFile, '../images/bigPic/' . substr($_FILES['file']['name'], 0, -3) . 'png');

}else{
	echo 'file empty';
}
?>
