<?php include('partials-front/header.php'); ?>
<?php
	if(isset($_SESSION['add'])){
		echo $_SESSION['add'];
		unset($_SESSION['add']);
	}
?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang chủ</a></span></p>
            <h1 class="mb-0 bread">Chi tiết sản phẩm</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">					
				<?php
					if(isset($_GET['id'])){
						$id = $_GET['id']; 

						$sql = "SELECT * FROM tbl_products WHERE id = $id"; 

						$res = mysqli_query($conn, $sql); 

						$count = mysqli_num_rows($res); 


						if($count  == 1){
							$row = mysqli_fetch_assoc($res); 
							// var_dump($row);
							$title = $row['title']; 
							$price = $row['price']; 
							$description = $row['description']; 
							$image_name = $row['image_name'];
						}else{
							// chuyến hướng đến trang sản phẩm
							echo("<script>location.href = '".SITEURL."shop.php';</script>");
						}
					}else{
						// chuyến hướng đến trang sản phẩm
						echo("<script>location.href = '".SITEURL."shop.php';</script>");
					}
				?>
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="<?php echo SITEURL; ?>img/product/<?php echo $image_name; ?>" class="image-popup prod-img-bg">
						<?php  
						if($image_name == ""){
							echo "<p class='text-danger'>Image not Available</p>";
						}else{
							?>
								<img src="<?php echo SITEURL; ?>img/product/<?php echo $image_name; ?>" class="img-fluid" alt="Colorlib Template">
							<?php
						}
						?>
					</a>
    			</div>					
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
					<form action="cart-action.php" method="GET">

						<h3><?php echo $title; ?></h3>
						<div class="rating d-flex">
								<p class="text-left mr-4">
									<a href="#" class="mr-2">5.0</a>
									<a href="#"><span class="ion-ios-star-outline"></span></a>
									<a href="#"><span class="ion-ios-star-outline"></span></a>
									<a href="#"><span class="ion-ios-star-outline"></span></a>
									<a href="#"><span class="ion-ios-star-outline"></span></a>
									<a href="#"><span class="ion-ios-star-outline"></span></a>
								</p>
								<p class="text-left mr-4">
									<a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Đánh giá</span></a>
								</p>
								<p class="text-left">
									<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Đã bán</span></a>
								</p>
							</div>
						<p class="price"><span><?php echo number_format($price); ?> VND</span></p>
						<p><?php echo $description; ?></p>
							</p>
							<div class="row mt-4">
								<div class="col-md-6">
									<div class="form-group d-flex">
						<div class="select-wrap">
						<div class="icon"><span class="ion-ios-arrow-down"></span></div>
						<select name="" id="" class="form-control">
							<option value="">Small</option>
							<option value="">Medium</option>
							<option value="">Large</option>
							<option value="">Extra Large</option>
						</select>
						</div>
						</div>
								</div>
								<div class="w-100"></div>
								<div class="input-group col-md-6 d-flex mb-3">
						<span class="input-group-btn mr-2">
							<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
						<i class="ion-ios-remove"></i>
							</button>
							</span>
						<input type="text" id="quantity" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<span class="input-group-btn ml-2">
							<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
							<i class="ion-ios-add"></i>
						</button>
						</span>

	          	</div>

	          	<div class="w-100"></div>
	          	<div class="col-md-12">
	          		<p style="color: #000;">Sản phẩm còn: 80</p>
	          	</div>
          	</div>
			  <p>
					<input type="submit" value="Thêm vào giỏ hàng" class="btn btn-primary py-3 px-5"></input>
				</p>
			</div>
    		</div>
			</form>



    		<div class="row mt-5">
          <div class="col-md-12 nav-link-wrap">
            <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Miêu tả</a>

              <a class="nav-link ftco-animate mr-lg-1" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Nhà sản xuất</a>

              <a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Đánh giá</a>

            </div>
          </div>
          <div class="col-md-12 tab-wrap">
            
            <div class="tab-content bg-light" id="v-pills-tabContent">

              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
              	<div class="p-4">
	              	<h3 class="mb-4"><?php echo $title; ?></h3>
	              	<p><?php echo $description; ?></p>
              	</div>
              </div>

              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-day-2-tab">
              	<div class="p-4">
	              	<h3 class="mb-4">Sản xuất bởi Adidas</h3>
	              	<p>Adidas là tập đoàn đa quốc gia đến từ nước Đức, chuyên sản xuất các mặt hàng giầy dép, quần áo, phụ kiện. Tiền thân của hãng là công ty Gebruder Dassler Schuhfabrik được ra đời vào năm 1924 bởi hai anh em nhà Dassler là Adi Dassler và Rudolf.</p>
              	</div>
              </div>
              <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
              	<div class="row p-4">
						   		<div class="col-md-7">
									   <?php
											$sql2 = "SELECT * FROM tbl_reviews where product_id = $id"; 

											$res2 = mysqli_query($conn, $sql2); 

											$count2 = mysqli_num_rows($res2); 

											if($count2>0){
												while($row2 = mysqli_fetch_assoc($res2)){
													$username = $row2['username']; 
													$review = $row2['content'];
													?>
														<div class="review">
															<div class="desc">
																<h4>
																	<span class="text-left"><?php echo $username;?></span>
																</h4>
																<p><?php echo $review; ?></p>
															</div>
														</div>
													<?php
												}
											}
									   ?>
						   		</div>
						   		<div class="col-md-4">
						   			<div class="rating-wrap">
							   			<h3 class="mb-4">Viết đánh giá</h3>
										<form action="" method="post">
										   	<div class="form-group row">
												<div class="col-sm-10">
													<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content" ></textarea>
												</div>
											</div>
											<div class="col-sm-10 ml-sm-auto">
												<input class="btn btn-info" type="submit" name="submit" value="Xác nhận"></input>
											</div>
										</form>
										<?php
											if(isset($_POST['submit'])){
												if(isset($_SESSION['user'])){
													$user = $_SESSION['user']; 
													$content = $_POST['content']; 
													
	
													$sql2 = "INSERT INTO tbl_reviews SET
														username = '$user', 
														content = '$content', 
														product_id = '$id'
													";
	
													$res2 = mysqli_query($conn, $sql2); 
	
													if($res2 == TRUE){
														// tạo sesion lưu thông báo 
														$_SESSION['add'] = "<p class='text-success'>Viết đánh giá thành công</p>";
													}else{
														// tạo sesion lưu thông báo 
														$_SESSION['add'] = "<p class='text-success'>Lỗi viết đánh giá</p>";
													}
												}else{											
													echo '<script>alert("Bạn cần đăng nhập để đánh giá sản phẩm này!")</script>';
												}
											}
										?>
							   		</div>
						   		</div>
						   	</div>
              </div>
            </div>
          </div>
        </div>
    	</div>
    </section>
		

    <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Minishop</h2>
              <p>Những bước chân không mỏi.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Đanh mục</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Sản phẩm</a></li>
                <li><a href="#" class="py-2 d-block">Giới thiệu</a></li>
                <li><a href="#" class="py-2 d-block">Tạp chí</a></li>
                <li><a href="#" class="py-2 d-block">Liên hệ</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Trợ giúp</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Thông tin giao hàng</a></li>
	                <li><a href="#" class="py-2 d-block">Trả hàng &amp; Trao đổi</a></li>
	                <li><a href="#" class="py-2 d-block">Điều khoản &amp; Điều kiện</a></li>
	                <li><a href="#" class="py-2 d-block">Chính sách bảo mật</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">FAQs</a></li>
	                <li><a href="#" class="py-2 d-block">Liên hệ</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Giải đáp mọi câu hỏi?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">235 Hoàng Quốc Việt, Hà Nội</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">0399999999
</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">minishop@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
  </body>
</html>