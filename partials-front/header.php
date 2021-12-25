<?php
    include('config/constants.php');
?>

<?php 
	$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : []; 

	// echo '<pre>'; 
	// print_r($cart);
	// $_SESSION['user'];
?>	
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Minishop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  
  <body class="goto-here">
    <div class="py-1 bg-black">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                        <span class="text">0399999999</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                        <span class="text">minishop@gmail.com</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                        <span class="text">Thời gian làm việc từ 3-5 ngày &amp; đổi trả miễn phí</span>
                    </div>
                </div>
            </div>
        </div>
      </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">Minishop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="index.php" class="nav-link">Trang chủ</a></li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Danh mục</a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="shop.php">Sản phẩm</a>
            <!-- <a class="dropdown-item" href="product-single.php">Single Product</a> -->
            <a class="dropdown-item" href="cart.php">Giỏ hàng</a>
            <a class="dropdown-item" href="checkout.php">Thanh toán</a>
          </div>
        </li>
          <li class="nav-item"><a href="about.php" class="nav-link">Giới thiệu</a></li>
          <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">Liên hệ</a></li>
          <li class="nav-item">
            <?php 
              if(isset($_SESSION['user'])) {
                ?>
                  <a class="nav-link"><?php echo $_SESSION['user']?></a>
                <?php
              }else{
                ?>
                  <a href="login.php" class="nav-link">Đăng nhập</a>
                <?php
              }
            
            ?>
            
          </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tài khoản</a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="shop.php">Quản lý tài khoản</a>
              <?php
              	if(isset($_SESSION['id'])){
                  $user_id = $_SESSION['id'];
                }
              ?>
              <a class="dropdown-item" href="address.php?id=<?php if(isset($_SESSION['user'])){
						echo $user_id;
					}  ?>">Thêm địa chỉ</a>
            <!-- <a class="dropdown-item" href="product-single.php">Single Product</a> -->
            <a class="dropdown-item" href="logout.php">Đăng xuất</a>
          </div>
        </li>
          <?php
            $count = count($cart); 
            // var_dump($count); 
            // die();
          ?>
          <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[<?php echo $count; ?>]</a></li>

        </ul>
      </div>
    </div>
  </nav>
<!-- END nav -->