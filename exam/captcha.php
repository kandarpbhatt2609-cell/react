<?php
session_start();

// Generate random string
$captcha_str = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZ23456789"), 0, 6);
$_SESSION['captcha_code'] = $captcha_str;

// Create image
$img = imagecreatetruecolor(120, 40);
$bg = imagecolorallocate($img, 255, 255, 255);
$fg = imagecolorallocate($img, 0, 0, 0);

imagefilledrectangle($img, 0, 0, 120, 40, $bg);
imagestring($img, 5, 20, 10, $captcha_str, $fg);

// Add noise
for($i=0; $i<30; $i++){
    $noiseColor = imagecolorallocate($img, rand(150,255), rand(150,255), rand(150,255));
    imagesetpixel($img, rand(0,120), rand(0,40), $noiseColor);
}

// Output image
header("Content-type: image/png");
imagepng($img);
imagedestroy($img);
?>
