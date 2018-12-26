<?php
    session_start();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    
    if (isset($_GET["idUser"]) && isset($_SESSION["cart"])) {
        require "../../DBMySql/DataProvider.php";
        $rs = DataProvider::excuteQuery("select count(*) as 'count' from orders");
        $idOrder = null;
        while ($row = mysqli_fetch_array($rs)) {
            $idOrder = $row["count"] + 1;
        }
        DataProvider::close();
        
        $dt = date('Y-m-d H:i:s');
        $status = "delivering";
        
        
        $sqlGetProduct = "select * from product where ";
        $extendSql = "idProduct= -1";
        foreach ($_SESSION["cart"] as $index => $item) { // lấy tất cả id và số lượng sản phẩm đã order chuyển thành query
            $temp = ' or idProduct='.$index;
            $extendSql = $extendSql.$temp;
        }
        $sqlGetProduct = $sqlGetProduct.$extendSql;
        $rs = DataProvider::excuteQuery($sqlGetProduct);
        
        $amount = 0;
        $sqlInsertDetailOrder = "insert into detailorder ";
        $sqlExtendInsertDetailOrder = "values";

        $row = mysqli_fetch_array($rs);
        if ($row) {
            $totalPrice = ($_SESSION["cart"][$row["idProduct"]]*$row["price"]);
            $amount = $amount + $totalPrice;
            $sqlExtendInsertDetailOrder = $sqlExtendInsertDetailOrder.
            "('".$idOrder."','".$row["idProduct"]."','".$_SESSION["cart"][$row["idProduct"]]."','".$row["price"]."','".$totalPrice."')"; 
        }
        while ($row = mysqli_fetch_array($rs)) {
            $totalPrice = ($_SESSION["cart"][$row["idProduct"]]*$row["price"]);
            $amount = $amount + $totalPrice;
            $price = 0;
            if ($row["price"] != "") { $price = $row["price"];}
            $sqlExtendInsertDetailOrder = $sqlExtendInsertDetailOrder.",".
            "('".$idOrder."','".$row["idProduct"]."','".$_SESSION["cart"][$row["idProduct"]]."','".$price."','".$totalPrice."')";
        }
        DataProvider::close();
        $sqlInsertDetailOrder = $sqlInsertDetailOrder.$sqlExtendInsertDetailOrder; 


        $sqlInsertOrder = "insert into orders(idOrder, dateCreated, status, amount, idUser)".
        " values('".$idOrder."','".$dt."','".$status."','".$amount."','".$_GET["idUser"]."')";

        DataProvider::excuteQuery($sqlInsertOrder);
        DataProvider::close();

        DataProvider::excuteQuery($sqlInsertDetailOrder);
        DataProvider::close();

        header("Location:../../Carts.php?status=success");
    }
?>