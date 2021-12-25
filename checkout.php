<?php include('partials-front/header.php'); ?>
<?php 
	$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : []; 

	// echo '<pre>'; 
	// print_r($cart);
	
?>	

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang chủ</a></p>
            <h1 class="mb-0 bread">Thanh toán</h1>
          </div>
        </div>
      </div>
    </div>
	<?php
		if(isset($_SESSION['id'])){
			$user_id = $_SESSION['id'];
		}
		
		if(isset($_POST['submit'])){
			if(isset($_SESSION['user'])){
				$user_id; 
				$status = 'Chờ xác nhận';			
				$first_name = $_POST['first_name']; 
				$last_name = $_POST['last_name'];
				$address = $_POST['address']; 
				$city = $_POST['city'];
				$distric = $_POST['distric'];
				$ward = $_POST['ward'];
				$contact = $_POST['contact'];
				$order_date = date("Y-m-d h:i:sa"); 
				?>
					<?php $price_total = 0 ?>
					<?php foreach ($cart as $key => $value): 
						$price_total += ($value['price'] * $value['qty']);
					?>
					<?php endforeach ?>
				<?php
	
				$sql = "INSERT INTO tbl_order SET
					user_id = '$user_id', 
					status = '$status',
					first_name ='$first_name', 
					last_name = '$last_name',
					address = '$address', 
					city = '$city', 
					district = '$distric', 
					ward = '$ward',
					contact = '$contact',
					total = '$price_total',
					order_date = '$order_date'
				";
	
				$res = mysqli_query($conn, $sql);
	
				if($res==TRUE){
					// $id = mysqli_insert_id($conn);
					?>
						<?php
							$sql2 = "SELECT * FROM tbl_order"; 
							$res2 = mysqli_query($conn, $sql2); 
							if($res2 == TRUE){
								$rows2 = mysqli_num_rows($res2);
								while($rows2 = mysqli_fetch_assoc($res2)){
									$order_id = $rows2['order_id'];
								}
							}
						?>
					<?php
					foreach($cart as $value){
						mysqli_query($conn, "INSERT INTO tbl_order_detail(order_id, product_id, product_name, image_name, qty, price) VALUES ('$order_id','$value[id]','$value[title]', '$value[image_name]', '$value[qty]', '$value[price]')");
					}
					unset($_SESSION['cart']);
					echo("<script>location.href = '".SITEURL."index.php';</script>");
				}
			}else{
				echo '<script>alert("Bạn cần đăng nhập để mua hàng!")</script>';				
			}
			
		}
	?>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-10 ftco-animate">
			  
						<form action="" class="billing-form" method = "POST">
							<?php
								if(isset($_GET['id'])){
									$id_user = $_GET['id'];
								}
							?>
							<?php
								if(isset($_SESSION['user'])){
									?>
										<p class="mb-4 billing-heading">Xin chào <?php echo $_SESSION['user'];  ?></p>
										<?php 
											$sql3 = "SELECT * FROM tbl_address_user WHERE user_id = $id_user"; 

											$res3 = mysqli_query($conn, $sql3); 

											$count3 = mysqli_num_rows($res3); 

											if($count3 > 0){
												$row3 = mysqli_fetch_assoc($res3); 	

												$first_name = $row3['first_name'];
												$last_name = $row3['last_name']; 
												$address = $row3['address']; 
												$city = $row3['city']; 
												$distric = $row3['distric']; 
												$ward = $row3['ward']; 
												$contact = $row3['contact']; 
												$email = $row3['email'];
											}
											
										?>
									<?php
								}else{
									?>
										<a href="login.php?action=checkout" class="mb-4 billing-heading">Đăng nhập</a>
									<?php
								}
							?>

							<br><br>
							<h3 class="mb-4 billing-heading">Chi tiết hoá đơn</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Họ</label>
	                  <input type="text" class="form-control" name="first_name" 
					  value="<?php
							if(isset($_SESSION['user'])){
								echo $first_name; 
							}
						?>">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Tên</label>
	                  <input type="text" class="form-control"  name="last_name" 					  
					  value="<?php
							if(isset($_SESSION['user'])){
								echo $last_name; 
							}
						?>" >
	                </div>
                </div>
                <div class="w-100"></div>
		            <!-- <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">Quốc gia</label>
		            		<div class="select-wrap">
		                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                  <select name="" id="" class="form-control">
		                  	<option value="">France</option>
		                    <option value="">Italy</option>
		                    <option value="">Philippines</option>
		                    <option value="">South Korea</option>
		                    <option value="">Hongkong</option>
		                    <option value="">Japan</option>
							<option value="">Việt Nam</option>
		                  </select>
		                </div>
		            	</div>
		            </div> -->
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">Địa chỉ</label>
	                  <input type="text" class="form-control" name="address" value="<?php if(isset($_SESSION['user'])){echo $address; }?>">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">Tỉnh/Thành Phố</label>
	                  <input type="text" class="form-control" name="city" value="<?php if(isset($_SESSION['user'])){echo $city; }?>">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">Quận/Huyện</label>
	                  <input type="text" class="form-control" name="distric" 					  
					  value="<?php
							if(isset($_SESSION['user'])){
								echo $distric; 
							}
						?>">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="postcodezip">Phường/Xã</label>
	                  <input type="text" class="form-control" name="ward" 					  
					  value="<?php
							if(isset($_SESSION['user'])){
								echo $ward; 
							}
						?>">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Số điện thoại</label>
	                  <input type="text" class="form-control" name="contact" 					  
					  value="<?php
							if(isset($_SESSION['user'])){
								echo $contact; 
							}
						?>">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Email</label>
	                  <input type="text" class="form-control" name="email" 					  
					  value="<?php
							if(isset($_SESSION['user'])){
								echo $email; 
							}
						?>">
	                </div>
                </div>
                <div class="w-100"></div>
                <!-- <div class="col-md-12">
                	<div class="form-group mt-4">
										<div class="radio">
										  <label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>
										  <label><input type="radio" name="optradio"> Ship to different address</label>
										</div>
									</div>
                </div> -->
	            </div>




	          <div class="row mt-5 pt-3 d-flex">
	          	<div class="col-md-6 d-flex">
	          		<div class="cart-detail cart-total bg-light p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Tổng giỏ hàng</h3>
						  	<?php $total_price = 0; ?>
						  	<?php foreach ($cart as $key => $value): 
								$total_price += ($value['price'] * $value['qty']);
						 	?>
							<?php endforeach ?>
	          			<p class="d-flex">
		    						<span>Tạm tính</span>
		    						<span><?php echo number_format($total_price); ?> VND</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Phí giao hàng</span>
		    						<span>Miễn phí</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Giảm giá</span>
		    						<span>10%</span>
		    					</p>
		    					<hr>
								<?php
									$total = $total_price * 0.9;
								?>
		    					<p class="d-flex total-price">
		    						<span>Tổng</span>
		    						<span><?php echo number_format($total); ?> VND</span>
		    					</p><br><br>
								<p><a href="cart.php"class="btn btn-primary py-3 px-4">Xem lại giỏ hàng</a></p>
								</div>
	          	</div>
	          	<div class="col-md-6">
	          		<div class="cart-detail bg-light p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Phương thức thanh toán</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2">Thanh toán trực tiếp khi giao hàng</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2">Chuyển khoản qua thẻ quốc thế và nội địa</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2">Thanh toán bằng ví MoMo</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="checkbox">
											   <label><input type="checkbox" value="" class="mr-2">Tôi đã đọc và chấp nhận các điều khoản và điều kiện</label>
											</div>
										</div>
									</div>
									<p><input type="submit" name="submit" value="Đặt hàng" class="btn btn-primary py-3 px-4"></input></p>
								</div>
								</form><!-- END -->
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->
		

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
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Shop</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Journal</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
	                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
	                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
	                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">FAQs</a></li>
	                <li><a href="#" class="py-2 d-block">Contact</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
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