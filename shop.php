<?php include('partials-front/header.php'); ?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang chủ</a></span></p>
            <h1 class="mb-0 bread">Sản Phẩm</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-8 col-lg-10 order-md-last">
    				<div class="row">
					<?php
						if(isset($_GET['id'])){
							$category_id = $_GET['id'];

							$sql2 = "SELECT * FROM tbl_products WHERE category_id = $category_id";

							$res2 = mysqli_query($conn, $sql2);

							$count2 = mysqli_num_rows($res2);

							$limit = 8;

							$page = ceil($count2/$limit); 

							$current_page = (isset($_GET['page']) ? $_GET['page']:1); 

							$start = ($current_page - 1) * $limit;

							$sql4 = "SELECT * FROM tbl_products WHERE category_id = $category_id LIMIT $start,$limit";


							$res4 = mysqli_query($conn, $sql4); 
	
							$count4 = mysqli_num_rows($res4);
	
							if($count4>0){
								while($row2=mysqli_fetch_assoc($res4)){
									$id = $row2['id']; 
									$title = $row2['title'];
									$price = $row2['price']; 
									$image_name = $row2['image_name'];
									?>
										<div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
											<div class="product d-flex flex-column">
													<?php
														if($image_name == ""){
															echo "<div class='error'>Lỗi ảnh</div>";
														}else{
															?>
																<a href="#" class="img-prod"><img class="img-fluid" src="<?php echo SITEURL; ?>img/product/<?php echo $image_name; ?>" alt="Colorlib Template">
																	<div class="overlay"></div>
																</a>
															<?php
														}
													?>
	
												<div class="text py-3 pb-4 px-3">
													<div class="d-flex">
													</div>
													<h3><a href=""><?php echo $title; ?></a></h3>
													<div class="pricing">
														<p class="price"><span><?php echo number_format($price); ?> VND</span></p>
													</div>
													<p class="bottom-area d-flex px-3">
														<a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
														<a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
													</p>
												</div>
											</div>
										</div>
									<?php
								}
							}
						}else{
							$sql3 = "SELECT * FROM tbl_products";

							$res3 = mysqli_query($conn, $sql3); 
	
							$count3 = mysqli_num_rows($res3);
	
							$limit = 8;

							$page = ceil($count3/$limit); 

							$current_page = (isset($_GET['page']) ? $_GET['page']:1); 

							$start = ($current_page - 1) * $limit;

							$sql4 = "SELECT * FROM tbl_products LIMIT $start,$limit";

							$res4 = mysqli_query($conn, $sql4); 

							$count4 = mysqli_num_rows($res4);
							if($count4>0){
								while($row3=mysqli_fetch_assoc($res4)){
									$id = $row3['id']; 
									$title = $row3['title'];
									$price = $row3['price']; 
									$image_name = $row3['image_name'];
									?>
										<div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
											<div class="product d-flex flex-column">
													<?php
														if($image_name == ""){
															echo "<div class='error'>Lỗi ảnh</div>";
														}else{
															?>
																<a href="product-single.php?id=<?php echo $id; ?>" class="img-prod"><img class="img-fluid" src="<?php echo SITEURL; ?>img/product/<?php echo $image_name; ?>" alt="Colorlib Template">
																	<div class="overlay"></div>
																</a>
															<?php
														}
													?>
	
												<div class="text py-3 pb-4 px-3">
													<div class="d-flex">
													</div>
													<h3><a href=""><?php echo $title; ?></a></h3>
													<div class="pricing">
														<p class="price"><span><?php echo number_format($price); ?> VND</span></p>
													</div>
													<p class="bottom-area d-flex px-3">
														<a href="cart-action.php?id=<?php echo $id; ?>" class="add-to-cart text-center py-2 mr-1"><span>Thêm vào giỏ <i class="ion-ios-add ml-1"></i></span></a>
														<a href="product-single.php?id=<?php echo $id; ?>" class="buy-now text-center py-2">Mua ngay<span><i class="ion-ios-cart ml-1"></i></span></a>
													</p>
												</div>
											</div>
										</div>
									<?php
								}
							}


						}
					?>
					<?php

					?>

		    		</div>
		    		<div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
		              <ul>
						<?php
							if($current_page - 1> 0){
								?>
		                			<li><a href="shop.php?<?php if(isset($_GET['id'])){
										?>
											id=<?php echo $category_id; ?>&
										<?php
									}?>page=<?php echo $current_page - 1; ?>">&lt;</a></li>
								<?php
							}
						?>

						<?php
							for($i = 1; $i<=$page; $i++){
								?>
		                			<li <?php echo ($current_page == $i)? 'active':'' ?> ><a href="shop.php?<?php if(isset($_GET['id'])){
										?>
											id=<?php echo $category_id; ?>&
										<?php
									}?>page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
								<?php
							}
						?>

						<?php
							if($current_page + 1 <= $page){
								?>
									<li><a href="shop.php?<?php if(isset($_GET['id'])){
										?>
											id=<?php echo $category_id; ?>&
										<?php
									}?>page=<?php echo $current_page + 1; ?>">&gt;</a></li>
								<?php
							}
						?>
		              </ul>
		            </div>
		          </div>
		        </div>
		    	</div>

		    	<div class="col-md-4 col-lg-2">
		    		<div class="sidebar">
							<div class="sidebar-box-2">
								<h2 class="heading">Danh mục sản phẩm</h2>
								<div class="fancy-collapse-panel">
                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				  	<a href="shop.php">Tất cả</a><br>
					 <?php
						$sql = "SELECT * FROM tbl_category"; 

						$res = mysqli_query($conn, $sql); 

						$count = mysqli_num_rows($res);

						if($count>0){
							while($row=mysqli_fetch_assoc($res)){
								$id = $row['id'];
								$title = $row['title']; 

								?>
					 				<a href="shop.php?id=<?php echo $id; ?>"><?php echo $title; ?></a><br>
								<?php
							}
						}
					 ?>
					

                  </div>
               </div>
							</div>
							<div class="sidebar-box-2">
								<form method="POST" class="colorlib-form-2" action="<?php echo SITEURL; ?>search.php">
									<div class="row">
										<div class="col-md-12">
										<div class="form-group">
											<label for="guests">Tìm sản phẩm:</label>
											<input type="text" class="form-control" name="search">
										</div>
										<div class="form-group">
											<input type="submit" value="Tìm" name="submit" class="btn btn-primary py-3 px-5">
										</div>
										</div>
									</div>
								</form>

								<?php

								?>
							</div>
						</div>
    			</div>
    		</div>
    	</div>
    </section>
		
		<section class="ftco-gallery">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-8 heading-section text-center mb-4 ftco-animate">
            <h2 class="mb-4">Theo dõi chúng tôi qua Instagram</h2>
            <!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p> -->
          </div>
    		</div>
    	</div>
    	<div class="container-fluid px-0">
    		<div class="row no-gutters">
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-1.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-1.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-2.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-2.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-3.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-3.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-4.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-4.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-5.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-5.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-6.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-6.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
        </div>
    	</div>
    </section>

	<?php include('partials-front/footer.php'); ?>