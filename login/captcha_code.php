<?php 
    session_start(); // khởi tạo session
    $ranStr = md5(microtime());  // lấy chuỗi rồi mã hóa md5
    $ranStr = substr($ranStr, 0, 6); // cắt chuổi lấy 6 ký tự
    $_SESSION["cap_code"] = $ranStr;
    $newImage = imagecreatefromjpeg("bg_captcha.jpg");
    $textColor = imagecolorallocate($newImage, 0, 0, 0);
    imagestring($newImage, 5, 5, 5, $ranStr, $textColor);
    header("Content-type: image/jpg");
    imagejpeg($newImage);
?>