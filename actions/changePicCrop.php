<?php
session_start();
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

//L'image croppée
header("Content-type: image/png");
$image = base64_decode(str_replace(' ', '+', str_replace("data:image/png;base64,", "", $_POST['image'])));


file_put_contents('../images/thumbnails/' . $_POST['name'], $image);
file_put_contents('../images/base.txt', $_POST['image']);
make_thumb('../images/thumbnails/' . $_POST['name'], '../images/thumbnails/' . $_POST['name'], 100);
file_put_contents('../images/bigPic/' . $_POST['name'], $image);

echo 'sucess';

 ?>
