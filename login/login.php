<?php
    $captcha = "";
    $account = "";
	if (isset($_GET["status"])) {
        if ($_GET["status"] == "captcha") {
            $captcha = "captcha is invalid";
        } else if ($_GET["status"] == "account") {
            $account = "username or password is incorrect";
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
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" scr="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
	<script type="text/javascript" src="js/slider.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = 'stylesheet' href = "../UserLogined/css/style.css">
</head>
<body>
	<div id="container">
			<div id="top">
				<div class="menu_top">	
					<ul style="padding-right: 50px ">
						<li>
							<a href="#"title="Help"><span class="glyphicon glyphicon-wrench"></span> Help</a>
						</li>
						<?php
							session_start();
							if (isset($_SESSION["user"])) {
								$username = $_SESSION["user"]["username"];
								echo '<li style = "margin-top:20px;">';
								echo '<div class="dropdown">';
								echo '<button class="dropbtn">'.$username.'</button>';
								echo '<div class="dropdown-content">';
								echo '<a href="#" style = "color:black;">My Account</a>';
								echo '<a href="#" style = "color:black;">My Orders</a>';
								echo '<a href="login/LogoutHandler.php" style = "color:black;">Log out</a>';
								echo '</div>';
								echo '</li>';
								if (isset($_SESSION["user"]["type"]) && strtolower($_SESSION["user"]["type"]) == "admin") {
									echo '<li>';
									echo '<a href = "#">Admin</a>';
									echo '</li>';
								}
							} else {
								echo '<li><a href="login.php" title="Login"> <span class="glyphicon glyphicon-lock"></span> Login</a></li>';
								echo '<li><a href="createAccount.php" title="Create account"><i class="fas fa-address-card" style="font-size:20px"></i> Create account</a></li>';
					
							}
						?>
					</ul>
				</div>
				
			</div>
			<div id="banner">
				<h1 style="display:inline;">SALE MANAGER</h1>
				<div style="display:inline;margin-left:120px;">
					<form action="#" style = "display:inline">
						<input type="test"  placeholder="Vui lòng nhập sản phẩm...." >
						<button type="submit"><i class="fa fa-search"></i></button>
					</form>
				</div>				
			</div>
			<div id="menu">
				<div style = "display:inline-block" class = "menu-frame">
					<a href = "../index.php"><span class="glyphicon glyphicon-home"></span>Trang Chủ</a>
				</div>
				<div class="dropdown menu-frame">
    				<a href = "#" class="dropdown-toggle" data-toggle="dropdown">Điện Thoại
    				<span class="caret"></span></a>
    				<ul class="dropdown-menu">
						<li><a href="#">Xiaomi</a></li>
						<li><a href="#">Iphone</a></li>
						<li><a href="#">SAMSUNG</a></li>
    				</ul>
 				</div>
				 <div class="dropdown menu-frame">
    				<a href = "#" class="dropdown-toggle" data-toggle="dropdown">Linh Kiện Điện Thoại
    				<span class="caret"></span></a>
    				<ul class="dropdown-menu">
						<li><a href="#">aaaaa</a></li>
						<li><a href="#">bbbbb</a></li>
						<li><a href="#">ccccc</a></li>
    				</ul>
 				</div>
				<div class="dropdown menu-frame">
    				<a href = "#" class="dropdown-toggle" data-toggle="dropdown">Lap Top
    				<span class="caret"></span></a>
    				<ul class="dropdown-menu">
						<li><a href="#">aaaaaa</a></li>
						<li><a href="#">bbbbbb</a></li>
						<li><a href="#">cccccc</a></li>
    				</ul>
				 </div>
				 <div class="dropdown menu-frame">
    				<a href = "#" class="dropdown-toggle" data-toggle="dropdown">Máy Tính Bảng
    				<span class="caret"></span></a>
    				<ul class="dropdown-menu">
						<li><a href="#">aaaaaaaaaaaaaaaa></li>
						<li><a href="#">bbbbbbbbbbbbbbbb</a></li>
						<li><a href="#">cccccccccccccccc</a></li>
    				</ul>
				 </div>
				 <div class="dropdown menu-frame">
    				<a href = "#" class="dropdown-toggle" data-toggle="dropdown">Nhà Sản Xuất
    				<span class="caret"></span></a>
    				<ul class="dropdown-menu">
						<li><a href="#">aaaaaaaaaaaaaaaa></li>
						<li><a href="#">bbbbbbbbbbbbbbbb</a></li>
						<li><a href="#">cccccccccccccccc</a></li>
    				</ul>
				 </div>
			</div>
        </div><br><br>
        <div class="col-3 rounded border shadow p-3 mb-5 bg-white " id="col-Login" >
            <p class = "title"><strong>LOGIN</strong></p>
            <form class="login-form"  method="POST" action = "LoginHandler.php">
                <div class="form-group" id="errorLogin" >
                    <label style = "color:red;"><?=$account?></lable>
                </div>
                <div class="form-group">
                    <label >Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>    
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control"  id="password" name="password"  placeholder="Password" required>
                </div>
                <div class = "form-group">
                    <label>CaptCha</label><br>
                    <label id = "error-captcha" style = "color:red;"><?=$captcha?></label>
                    <input type = "text" class="form-control"  id ="captcha" name ="captcha" required>
                </div>
                <div id = "div-captcha">
                    <img id = "image-captcha" src = "captcha_code.php">
                    <button type="button" class="btn btn-default btn-sm" onclick = "refreshCaptcha()">
                        <span class="glyphicon glyphicon-refresh"></span> Refresh
                    </button>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary float-right" id = "submit">Submit</button>                              
                </div>
            </form>
        </div>
    </div>
    
	<br><br>
	<div id="footer">
		<div class="w3_footer_grids">
			<div class="col-md-3 w3_footer_grid">
                <h3>Information</h3>
               <ul class="address">
                    <li><i class="glyphicon glyphicon-user" aria-hidden="true"></i>Lê Nguyễn Quang Đại Lộc</li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
                    <li><i class="glyphicon glyphicon-user" aria-hidden="true"></i>Tăng Khánh Nguyên</li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
                </ul><s></s>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Contact</h3>
                <ul class="address">
                    <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>227 Nguyễn Văn Cừ Quận 3 TP.HCM</li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">lnqdloc@gmail.com</a></li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">Tangkhannguyen@gmail.com</a></li>
                </ul>
            </div>
		</div><br>
	</div>
	<div>
		<p>
			Công Ty Trách Nhiệm Hữu Hạn 2 Thành Viên | Design By <a href="https://www.facebook.com/profile.php?id=100003983416679">Hiệp Sĩ Mù</a>
		</p>
    </div>
    <script>

        function refreshCaptcha() {
            var imageCaptchaEle = document.getElementById("image-captcha");
            imageCaptchaEle.src = "captcha_code.php";
        }
    </script>
	
</body>
</html>