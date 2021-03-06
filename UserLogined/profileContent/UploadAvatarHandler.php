<?php 
    if (isset($_FILES["FileUploadAvatar"]) && $_FILES["FileUploadAvatar"]["tmp_name"] != null) {

        $target_dir = "../imagesUser/";
        $image = basename($_FILES["FileUploadAvatar"]["name"]);
        $target_file = $target_dir . $image;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["FileUploadAvatar"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["FileUploadAvatar"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        } else {
            if (move_uploaded_file($_FILES["FileUploadAvatar"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["FileUploadAvatar"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        if (isset($_POST["idUser"])) {
            $sql = "update user set imageName = '".$image."' where idUser=".$_POST["idUser"];
            require "../../DBMySql/DataProvider.php";
            DataProvider::excuteQuery($sql);
            DataProvider::close();
        }
    }
    header("Location:../masterPersonal.php?idUser=".$_POST["idUser"]);
?>