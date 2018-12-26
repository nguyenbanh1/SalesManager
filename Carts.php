<?php 
	$strSearch = "";
	if (isset($_GET["strSearch"])) {
		$strSearch = $_GET["strSearch"];
		if ($strSearch == "") {
			header("Location:index.php");
		}
	}
	$active = "";
	$activeButton = "";
	if (isset($_GET["status"])) {
		if ($_GET["status"] == "success") {
			$active = 'style = "opacity: 0.5;" onclick = "return false"';
			$activeButton = "false isDisabled";
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" scr="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
	<script type="text/javascript" src="js/slider.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = 'stylesheet' href = "UserLogined/css/style.css">
	<style>
		.isDisabled {
			color: currentColor;
			cursor: not-allowed;
			opacity: 0.5;
			text-decoration: none;
		}
	
	</style>
</head>
<body>
	<div id="container">
		<div id="top">
			<div class="menu_top">	
				<ul style="padding-right: 50px ">
                    <li>
						<?php
							session_start();
							 $count = 0;
							 if (isset($_SESSION["cart"])) {
								 foreach ($_SESSION["cart"] as $index => $item) {
									 $count += $_SESSION["cart"][$index];
								 }
							 } 
						?>
						<a href="UserLogined/Pagehandler/BuyProductHandler.php"><img style = "margin-top:-5px;" height="30px" width="40px" src="img/iconcart.png">
							<span class = "mountInCart" style = "background-color:red;border-radius: 10px;padding-left:5px;padding-right:5px;"><?=$count?></span>
						</a>
					</li>
					<li>
						<a href="#"title="Help"><span class="glyphicon glyphicon-wrench"></span> Help</a>
					</li>
					<?php
						if (!isset($_SESSION)) {
							session_start();
						}
						if (isset($_SESSION["user"])) {
							$username = $_SESSION["user"]["username"];
							echo '<li style = "margin-top:20px;">';
							echo '<div class="dropdown">';
							echo '<button class="dropbtn">'.$username.'</button>';
							echo '<div class="dropdown-content">';
							echo '<a href="UserLogined/masterPersonal.php?idUser='.$_SESSION["user"]["idUser"].'" style = "color:black;">My Account</a>';
							echo '<a href="UserLogined/masterMyOrders.php?idUser='.$_SESSION["user"]["idUser"].'" style = "color:black;">My Orders</a>';
							echo '<a href="login/LogoutHandler.php" style = "color:black;">Log out</a>';
							echo '</div>';
							echo '</li>';
							if (isset($_SESSION["user"]["type"]) && strtolower($_SESSION["user"]["type"]) == "admin") {
								echo '<li>';
								echo '<a href = "Admin/">Admin</a>';
								echo '</li>';
							}
						} else {
							echo '<li><a href="login/login.php" title="Login"> <span class="glyphicon glyphicon-lock"></span> Login</a></li>';
							echo '<li><a href="login/createAccount.php" title="Create account"><i class="fas fa-address-card" style="font-size:20px"></i> Create account</a></li>';
				
						}
					?>
				</ul>
			</div>	
		</div>
		<div id="banner">
			<h1 style="display:inline;">SALE MANAGER</h1>
			<div style="display:inline;margin-left:120px;">
				<form action="search.php" style = "display:inline" method = "GET">
					<input type="text"  placeholder="Vui lòng nhập sản phẩm...." name = "strSearch">
					<button type="submit"><i class="fa fa-search"></i></button>
				</form>
			</div>				
		</div>
		<div id="menu">
			<div style = "display:inline-block" class = "menu-frame">
				<a href = "index.php"><span class="glyphicon glyphicon-home"></span>Trang Chủ</a>
			</div>
			<?php 
				require_once "DBMySql/DataProvider.php";
				$sql = "select * from category";
				$rs = DataProvider::excuteQuery($sql);
				while ($row = mysqli_fetch_array($rs)) {
					$idCategory = $row["idCategory"];
					echo '<div class="dropdown menu-frame">';
					echo '<a href="linkedFromIndex.php?idCategory='.$idCategory.'">'.$row["nameCategory"].'</a>';
					echo '</div>';
				}
				DataProvider::close();
			?>
			<div class="dropdown menu-frame">
				<a href = "#" class="dropdown-toggle" data-toggle="dropdown">Producer
				<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<?php
						$sql = "select * from producer";
						$rs = DataProvider::excuteQuery($sql);
						while ($row = mysqli_fetch_array($rs)) {
							$idProducer = $row["idProducer"];
							echo '<li><a href="linkedFromIndex.php?idProducer='.$idProducer.'">'.$row["nameProducer"].'</a></li>';
						}
						DataProvider::close();
					?>
				</ul>
			</div>
		</div>
		<div id="content">
            <div>
                <form>
                <h4 style = "text-align:center;margin-top:50px;">YOUR SHOPPING CART CONTAINS: <span id = "titleQuantity"><?=$count?></span> PRODUCTS</h4>
                <div style = "width:70%;margin-left:200px;margin-top:50px;">
                    <table class="table table-bordered">
                        <thead>
                            <tr style = "background:orange;">
                                <td style = "text-align:center">STT</td>
                                <td style = "text-align:center">Product Image</td>
                                <td style = "text-align:center">Product Name</td>
                                <td style = "text-align:center">Quality</td>
                                <td style = "text-align:center">Unit Price</td>
                                <td style = "text-align:center">Total Price</td>
                                <td style = "text-align:center">Action</td>
                            </tr>
                        </thead>
						<form>
							<?php
								$sql = "select * from product where ";
								$extendSql = "idProduct= -1";
								$totalPrice = 0;
								if (isset($_SESSION["cart"])) {
									foreach ($_SESSION["cart"] as $index => $item) {
										$_SESSION["cart"][$index];
										$temp = ' or idProduct='.$index;
										$extendSql = $extendSql.$temp;
									}
									$sql = $sql.$extendSql;
									require_once "DBMySQL/DataProvider.php";
									$rs = DataProvider::excuteQuery($sql);
									$stt = 0;
									while ($row = mysqli_fetch_array($rs)) {
										$stt++;
										$quanlity = $_SESSION["cart"][$row["idProduct"]];
										$price = $row["price"] ;
										$totalPrice += ($price*$quanlity);
										echo '<tbody>';
										echo  '<tr>';
										echo '<td style = "vertical-align: middle;text-align:center;">'.$stt.'</td>';
										echo '<td style = "vertical-align: middle;text-align:center;"><a href = "#"><img src = "plugins/images/products/'.$row["imageName"].'" height = "80px;" width= "70px";></a></td>';
										echo '<td style = "vertical-align: middle;text-align:center;">'.$row["nameProduct"].'</td>';
										echo '<td style = "vertical-align: middle;text-align:center;">';
										echo '<button type = "button" style = "height:30px;width:30px;" class = "quantity-minus'.$activeButton.'" value = "'.$row["idProduct"].'">-</button>';
										echo '<button type = "button" style = "height:30px;width:30px;" id = "quantity-'.$row["idProduct"].'">'.$quanlity.'</button>';
										echo '<button type = "button" style = "height:30px;width:30px;" class = "quantity-add'.$activeButton.'" value = "'.$row["idProduct"].'">+</button>';
										echo '</td>';
										echo '<td style = "vertical-align: middle;text-align:center;" class = "price-'.$row["idProduct"].'">'.$row["price"].'đ</td>';
										echo '<td style = "vertical-align: middle;text-align:center;" class = "totalPrice-'.$row["idProduct"].'">'.($row["price"] * $quanlity).'</td>';
										echo '<td style = "vertical-align: middle;text-align:center;">';
										echo '<a '.$active.' href = "UserLogined/PageHandler/RemoveProductHandler.php?idProduct='.$row["idProduct"].'" class="btn btn-default btn-sm">';
										echo '<span class="glyphicon glyphicon-remove-sign"></span> Remove';
										echo '</a>';
										echo '</td>';
										echo '</tr>';
										echo '</tbody>';
									}
								}
							?>
						</form>
					</table>
					<?php
						$idUser = "";
						if (isset($_SESSION["user"]) && isset($_SESSION["user"]["idUser"])) {
							$idUser = $_SESSION["user"]["idUser"];
						}

						if (isset($_GET["status"]) && $_GET["status"] == "success") {
							echo '<div style = "display:block;margin-bottom:10px;" class="btn btn-success">Pill paid with  '.$totalPrice.'đ</div>';
						}
					?>
					
                    <a <?=$active?> href = "UserLogined/PageHandler/PayNowHandler.php?idUser=<?=$idUser?>"><div class="btn btn-primary" style = "width:200px;">Pay Now <span id = "paynow"style = "margin-left:10px;"><?=$totalPrice?></span><span>đ</span></div></a>
					<a href = "UserLogined/PageHandler/RemoveCartHandler.php"style = "float:right;"><div class="btn btn-primary" >Delete All In Cart/ Back to Website</div></a>
                </div>
                </form>
            </div>
		</div>
	</div>
	<div>
		<div id="footer">
			<div class="w3_footer_grids">
				<div class="col-md-3 w3_footer_grid">
					<h3>Information</h3>
				<ul class="address">
						<li><i class="glyphicon glyphicon-user" aria-hidden="true"></i>Lê Nguyễn Quang Đại Lộc</li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
						<li><i class="glyphicon glyphicon-user" aria-hidden="true"></i>Tăng Khánh Nguyên</li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Contact</h3>
					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>227 Nguyễn Văn Cừ Quận 3 TP.HCM</li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">lnqdloc@gmail.com</a></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">Tangkhannguyen@gmail.com</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div style = "background: #2b2a2a;color: #afafaf;text-align:center;margin-top:-20px;">
			Công Ty Trách Nhiệm Hữu Hạn 2 Thành Viên | Design By <a href="https://www.facebook.com/profile.php?id=100003983416679">Hiệp Sĩ Mù</a>
		</div>
	</div>
</body>
<script>
    $(".quantity-minus").click(function(e){

        var id = "#quantity-" + this.value;
        var ele = $(id)[0];
        var quantity = ele.innerHTML - 1;
        if (quantity <= 0) {
            ele.innerHTML = 0;
        } else {
            ele.innerHTML = quantity;
        }
        var url = "UserLogined/PageHandler/CartPageHandler.php?idProduct="+this.value+"&quantity="+ele.innerHTML;
        $.get(url,function(data, status){
        });

        $(".mountInCart")[0].innerHTML = $(".mountInCart")[0].innerHTML - 1;
        $("#titleQuantity")[0].innerHTML = $("#titleQuantity")[0].innerHTML - 1;

        $(".totalPrice-"+this.value)[0].innerHTML = parseInt($(".price-"+this.value)[0].innerHTML) * parseInt(quantity);
        
        $("#paynow")[0].innerHTML = parseInt($("#paynow")[0].innerHTML) - parseInt($(".price-"+this.value)[0].innerHTML);
    });
    $(".quantity-add").click(function(e){

        var id = "#quantity-" + this.value;
        var ele = $(id)[0];
        var quantity = parseInt(ele.innerHTML) + 1;
        ele.innerHTML = quantity;
        var url = "UserLogined/PageHandler/CartPageHandler.php?idProduct="+this.value+"&quantity="+ele.innerHTML;
        $.get(url,function(data, status){
        });

        $(".mountInCart")[0].innerHTML = parseInt($(".mountInCart")[0].innerHTML) + 1;
        $("#titleQuantity")[0].innerHTML = parseInt($("#titleQuantity")[0].innerHTML) + 1;

        $(".totalPrice-"+this.value)[0].innerHTML = parseInt($(".price-"+this.value)[0].innerHTML) * parseInt(quantity); 
        $("#paynow")[0].innerHTML = parseInt($("#paynow")[0].innerHTML) + parseInt($(".price-"+this.value)[0].innerHTML);
    });
</script>
</html>