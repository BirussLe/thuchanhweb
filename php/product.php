<?php
/*
//Ket noi csdl
$o = new PDO("mysql:host=localhost; dbname=dbsago", "root", "");
//Hien thi tieng viet co dau
$o->query("set names 'utf8' ");
//khoi tao session
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = array();
*/
include "include/connect.php";
//truyvansql
$sql="select * from tbsanpham";
$data = $o->query($sql);
$arrSanpham = $data->fetchAll();
$id=isset($_GET['id'])?$_GET['id']:'';
//echo "id san pham la: $id";
//
function dinhdangso(&$number)
{
	$format_number = number_format($number, 0, '', '.');
	echo $format_number;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>BinhLeShop - Cửa hàng điện thoại chính hãng</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css"/>
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css"/>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>
		<!-- HEADER -->
		<?php
		include "include/header.php"
		?>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<?php include "include/menu.php" ?>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="index.php">TRANG CHỦ</a></li>
							<li><a href="store.php">SẢN PHẨM</a></li>
							<li class="active">CHI TIẾT SẢN PHẨM</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<?php
					foreach ($arrSanpham as $key => $v) {
						# code...
						if($id==$v['id_sanpham']){

							?>
							<!-- Product main img -->
							<div class="col-md-5 col-md-push-2">
								<div id="product-main-img">
									<div class="product-preview">
										<img src="img/<?php echo $v['hinhsp'];?>" alt="">
									</div>
								</div>
							</div>
							<!-- /Product main img -->

							<!-- Product thumb imgs -->
							<div class="col-md-2  col-md-pull-5">
								<div id="product-imgs">
									<div class="product-preview">
										<img src="img/<?php echo $v['hinhsp'];?>" alt="">
									</div>
								</div>
							</div>
							<!-- /Product thumb imgs -->

							<!-- Product details -->
							<div class="col-md-5">
								<div class="product-details">
									<h2 class="product-name"><?php echo $v['tensp'];?></h2>
									<div>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
										</div>
									</div>
									<div>
										<h3 class="product-price"><?php $giamoi=$v['gia']*(100-$v['khuyenmai'])/100;
										echo dinhdangso($giamoi); ?> VND <del class="product-old-price"><?php echo dinhdangso($v['gia']);?></del></h3>
										<span class="product-available">
											<?php 
											if($v['soluong']>0) echo "Còn hàng";
											else
												echo "Hết hàng";
											?></span>
										</div>
										<p><?php echo $v['mota'];?></p>

										<div class="product-options">
								<!--
								<label>
									Size
									<select class="input-select">
										<option value="0">X</option>
									</select>
								</label>
							-->
							<label>
								Color
								<select class="input-select">
									<option value="0">Red</option>
								</select>
							</label>
						</div>
						<form action = "module/updategiohang.php" method="get">
							<div class="add-to-cart">
								<div class="qty-label">
									Qty
									<div class="input-number">
										<input type="number" value="1" name="soluong">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
									<input type="hidden" value="<?php echo $v['id_sanpham'];?>" name="id">
								</div>
								<a><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm giỏ hàng</button></a>
							</div>
						</form>
						<ul class="product-btns">
							<li><a href="#"><i class="fa fa-heart-o"></i> Yêu thích</a></li>
						</ul>

						<ul class="product-links">
							<li>Các sản phẩm khác</li>
							<?php
								foreach ($arrSanpham as $key => $v)
									 { if($v['id_hangdt']==$id ){ 
							 	?>
										<!--thaythe-->
										<li><a href="#"></a><?php echo $v['tensp'];?></li>
							<?php }}?>
						</ul>
					<?php }} ?>	
					<ul class="product-links">
						<li>Share:</li>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-envelope"></i></a></li>
					</ul>

				</div>
			</div>


		</div>
	</div>
	<!-- /tab3  -->
</div>

<!-- FOOTER -->
<?php include "include/footer.php"?>
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
