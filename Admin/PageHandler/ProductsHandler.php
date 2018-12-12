<?php
    //kiem tra xem insert có thành công hay không
    $status = "success";

    $image = null;
    $nameProduct = null;
    $idCategory = null;
    $idProducer = null;
    $description = null;
    $price = null;
    $quantity = null;
    $dateCreated = null;

    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["tmp_name"] != null) {

        $target_dir = "../../plugins/images/products/";
        $image = basename($_FILES["fileToUpload"]["name"]);
        $target_file = $target_dir . $image;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
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
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
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
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    if (isset($_POST["nameProduct"])){
        $nameProduct = $_POST["nameProduct"];
    }

    if (isset($_POST["idCategory"])) {
        $idCategory = $_POST["idCategory"];
    }

    if (isset($_POST["idProducer"])) {
        $idProducer = $_POST["idProducer"];
    }

    if (isset($_POST["description"])) {
        $description = $_POST["description"];
    }

    if (isset($_POST["price"])) {
        $price = $_POST["price"];
    }

    if (isset($_POST["quantity"])) {
        $quantity = $_POST["quantity"];
    }

    if (isset($_POST["dateCreated"])) {
        $dateCreated = $_POST["dateCreated"];
    }

    require_once "../../DBMySQl/DataProvider.php";

    if (isset($_POST["idProduct"]) && !empty($_POST["idProduct"])) {
        $sql = "update product set ";
        if (!empty($image)) {
            $sql = $sql."imageName = '".$image."',";
        }

        $sql = $sql."nameProduct ='".$nameProduct."', description = '".$description."',".
            "price = '".$price."', dateCreated = '".$dateCreated."',".
            "quantity = '".$quantity."',".
            "idCategory = '".$idCategory."', idProducer = '".$idProducer."'".
        " where idProduct = ".$_POST["idProduct"];
        DataProvider::excuteQuery($sql);
        DataProvider::close();
        header("Location: ../NewProducts.php?status=".$status);
       
    } else {
        $sql = "insert into product(nameProduct, description, price, dateCreated, imageName, quantity, idCategory, idProducer)".
        "values ('".$nameProduct."','".$description."',$price,'".$dateCreated."','".$image."',".$quantity.",".$idCategory.",".$idProducer.")";
        DataProvider::excuteQuery($sql);
        DataProvider::close();
        header("Location: ../NewProductForm.php?status=".$status);
    }

?>
