<?php 
	$strSearch = "";
	if (isset($_GET["strSearch"])) {
		$strSearch = $_GET["strSearch"];
		if ($strSearch == "") {
			header("Location:index.php");
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
			<div class = "distance">
				<div class="caption">
					<h3><b><i class='far fa-check-square'></i> New Product</b></h3>
				</div>
				<div class="homeproduct">
					<?php
						$offsetCurrent = 0;
						if (isset($_GET["offset"])) {
							$offsetCurrent = $_GET["offset"];
						}  
						require_once "DBMySql/DataProvider.php";
						$sql = "select p.idProduct, p.nameProduct, p.price, p.imageName, p.idCategory".
								" from product p join category c on p.idCategory = c.idCategory".
								" join producer pc on p.idProducer = pc.idProducer".
								" where pc.nameProducer = '".$strSearch."' or c.nameCategory = '".$strSearch."' or p.nameProduct = '".$strSearch."' or p.price = '".$strSearch."'".
								" order by dateCreated desc".
								" limit 15 offset ".$offsetCurrent;
						$countInDBSQL = "select count(*) as 'count'".
						" from product p join category c on p.idCategory = c.idCategory".
						" join producer pc on p.idProducer = pc.idProducer".
						" where pc.nameProducer = '".$strSearch."' or c.nameCategory = '".$strSearch."' or p.nameProduct = '".$strSearch."' or p.price = '".$strSearch."'";

						$rs = DataProvider::excuteQuery($countInDBSQL);
						$row = mysqli_fetch_array($rs);
						$count = $row["count"];
						DataProvider::close();
						if ($count > 0) {
							$rs = DataProvider::excuteQuery($sql);
							while ($row = mysqli_fetch_array($rs)) {
								echo '<div class ="product">';
								echo '<a href="#">';
								echo '<img src="plugins/images/products/'.$row["imageName"].'">';  
								echo '<h5>'.$row["nameProduct"].'</h5>'; 
								echo '<strong>'.$row["price"].'₫</strong>'; 
								echo '</a>';
								echo '<a href = "#" class="btn btn-info" style = "margin-left:5px;"><b>Mua Hàng</b></a>';
								echo '<div style = "margin-top:10px;padding-left:50px;padding-right:50px;" class="btn btn-danger addToCart">';
								echo '<input type = "hidden" name = "'.$row["idProduct"].'" value = "'.$row["idCategory"].'">';
								echo '<span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart';
								echo '</div>';
								echo '</div>';		
							}
							DataProvider::close();	
						} else {
							echo '<h3 style = "color:red;">Product not found following on demand</h3>';
						}										
					?>		
				</div>
				<nav class="numbering">
                            <div class="fixPagination paging-top">
                                <a href=<?php echo '"search.php?strSearch='.$strSearch.'&offset=0"'?>> &laquo;</a>
                                <a href=<?php if($offsetCurrent <= 0) { echo '"search.php?strSearch='.$strSearch.'&offset=0"';} else { echo '"search.php?'.$strSearch.'&offset='.($offsetCurrent - 15).'"'; } ?>><</a>
                                <?php
                                if ($count / 15 < 5) { //Xuất tối đa page khi page nhỏ hơn 5
                                    for ($i = 0 ;$i < $count/15 ; $i++) {
                                        $active = "";
                                        if ($offsetCurrent == ($i*15)) {
                                            $active = 'class = "active"';
                                        }
                                        echo '<a '.$active.' href="search.php?strSearch='.$strSearch.'&offset='.($i*15).'">'.($i + 1).'</a>';
                                    }
                                } else {
                                    if ($offsetCurrent / 15 < 5) {
                                        for ($i = 0 ;$i < 5 ; $i++) {
                                            $active = "";
                                            if ($offsetCurrent == ($i*15)) {
                                                $active = 'class = "active"';
                                            }
                                            echo '<a '.$active.' href="search.php?strSearch='.$strSearch.'&offset='.($i*15).'">'.($i + 1).'</a>';
                                        }
                                    } else {
                                        if ($offsetCurrent / 15 < $count/15 - 3) {
                                            $page = $offsetCurrent / 15;
                                            for ($i = $page - 2; $i <= $page + 2 ; $i++) {
                                                $active = "";
                                                if ($offsetCurrent == ($i*15)) {
                                                    $active = 'class = "active"';
                                                }
                                                echo '<a '.$active.' href="search.php?strSearch='.$strSearch.'&offset='.($i*15).'">'.($i + 1).'</a>';
                                            }
                                        } else {
                                            
                                            $page = (int)($count/15) - 2;
                                            for ($i = $page; $i <= $page + 2 ; $i++) {
                                                $active = "";
                                                if ($offsetCurrent == ($i*15)) {
                                                    $active = 'class = "active"';
                                                }
                                                echo '<a '.$active.' href="search.php?strSearch='.$strSearch.'&offset='.($i*15).'">'.($i + 1).'</a>';
                                            }
                                        }
                                    }
                                }
                                
                            ?>
                            <a href=<?php 
										if ($count <= 15) {
											echo '"search.php?strSearch='.$strSearch.'&offset=0"';
										} else {
											if ($offsetCurrent >= ($count - ($count % 15))) {
												echo '"search.php?strSearch='.$strSearch.'&offset='.($count - ($count % 15)).'"';
											} else {
												echo  '"search.php?strSearch='.$strSearch.'&offset='.($offsetCurrent + 15).'"';
											}
										}
								?>>></a>

                            <a href=<?php if ($count > 15 - 1 ) { echo '"search.php?strSearch='.$strSearch.'&offset='.($count - ($count % 15)).'"';} else { echo '"search.php?strSearch='.$strSearch.'&offset=0"';}?>>&raquo;</a>
                            </div>
                        </nav>
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
	$(".addToCart").click(function(){
		var idProduct = this.firstChild.name;
		var idCategory = this.firstChild.value;
		var url = "UserLogined/PageHandler/CartHandler.php?idProduct="+idProduct+"&idCategory="+idCategory;
				
		$.get(url, function(data, status){
			$(".mountInCart")[0].innerHTML = data;
			console.log($(".mountInCart")[0]);
		})
	});
</script>
</html>