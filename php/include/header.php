
		<?php
		//Kiem tra bien tim kiem
			if(!isset($t)){
			function postIndex($index, $value="")
			{
				if (!isset($_POST[$index]))	return $value;
				return $_POST[$index];
			}
			$t = postIndex("ts");
			
		}
		//truy xuat sql gio hang

		?>
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="tel:0941690340"><i class="fa fa-phone"></i> (+84) 0941-690-340</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> DH51700666@gmail.com</a></li>
						<li><a href="https://goo.gl/maps/Ur7DcoUpYCm" target="_blank"><i class="fa fa-map-marker"></i> 180 Cao Lỗ</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-dollar"></i> VND</a></li>
						<li><a href="#"><i class="fa fa-user-o"></i> Đăng Nhập</a></li>

					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a align="center" href="index.php" class="logo">
									BinhLe
								</a>
								<a align="center" href="index.php" class="logo">
									LinkGithub: https://github.com/BirussLe/thuchanhweb.git42689b7..3a309f9
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form action="search.php" method="post" enctype="multipart/form-data">
									<input class="input-select" placeholder="Nhập tên sản phẩm cần tìm" name=ts value="<?php echo $t; ?>">
									<button class="search-btn" name="sm">Tìm kiếm</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->

								<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Yêu thích</span>
										<div class="qty">2</div>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Giỏ hàng</span>
										<?php $soluong=0;
										$giagiohang=0;
										$dem=0;
										foreach ($_SESSION['giohang'] as $key => $value) {

										$dem+=$value;
										}
										
										?>
										<div class="qty"><?php echo $dem;?></div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											<!-- product giohang-->
											<?php 
											
											foreach ($_SESSION['giohang'] as $key => $value) {
												$sql ="select * from tbsanpham where id_sanpham='$key' ";
												$data = $o->query($sql);
												$arr = $data->fetchAll();
												$ma = $arr[0]['id_sanpham'];
												$ten = $arr[0]['tensp'];
												$gia = $arr[0]['gia']*(100-$arr[0]['khuyenmai'])/100;
												$sumgia =$gia*$value;
												 ?>
											<div class="product-widget">
												<div class="product-img">
													<img src="img/<?php echo $arr[0]['hinhsp'];?>" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="product.php?id=<?php echo $key;?>"><?php echo $ten; ?></a></h3>
													<h4 class="product-price"><span class="qty"><?php echo $value; ?>x</span><?php  echo dinhdangso($gia);?> VND</h4>
												</div>
												<a href=
													"module/xoa.php?id=<?php echo $ma; ?>"><button class="delete" name="xoa"><i class="fa fa-close"></i></button></a>
											</div>
											<?php 
													$giagiohang+=$sumgia;
													$soluong+=$value;
											 } ?>
											<!-- /product giohang-->
										</div>
										<div class="cart-summary">
											<small>Bạn có <?php echo $soluong;?> sản phẩm trong giỏ hàng</small>
											<h5>Tổng cộng: <?php echo dinhdangso($giagiohang); ?>VND</h5>
										</div>
										<div class="cart-btns">
											<a href="#">Xem giỏ hàng  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>