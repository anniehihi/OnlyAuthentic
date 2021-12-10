<?php 
    include('./config/constants.php');
    unset($_SESSION['user']);

    // chuyến hướng đến trang manage
    echo("<script>location.href = '".SITEURL."';</script>");
?>