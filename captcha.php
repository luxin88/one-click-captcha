<?php
session_start();
header("Content-type:image/png");

//$img = imagecreate(200, 100);

$img = imagecreatefrompng('./images/captcha.png');
$black = imagecolorallocate($img,0x00,0x00,0x00);


//srand((double)microtime()*1000000);
$big_r = rand(40,60);
$_SESSION['r'] = $big_r;

//srand((double)microtime()*1000000);
$big_center_x = rand($big_r, 200-$big_r);
$_SESSION['x'] = $big_center_x;

//srand((double)microtime()*1000000);
$big_center_y = rand($big_r, 100-$big_r);
$_SESSION['y'] = $big_center_y;

//srand((double)microtime()*1000000);
$qty = rand(6, 8);

$small_r = 0;
$small_center_x = 0;
$small_center_y = 0;


for ($i=$qty;$i>0;$i--){
	//srand((double)microtime()*1000000);
	$small_r = rand(10,$big_r - 20);
	
	//srand((double)microtime()*1000000);
	$small_center_x = rand($small_r, 200-$small_r);
	//srand((double)microtime()*1000000);
	$small_center_y = rand($small_r, 100-$small_r);
	
	imagearc($img, $small_center_x, $small_center_y, $small_r, $small_r, 0, 360, $black);
}

imagearc($img, $big_center_x, $big_center_y, $big_r, $big_r, 0, 360, $black);
imagepng($img);
imagedestroy($img);