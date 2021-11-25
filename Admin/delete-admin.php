<?php
    // include constants.php 
    include('../config/constants.php'); 

    // 1. Lấy id của admin bị xoá
    $id = $_GET['id']; 

    // 2. tạo câu truy vấn để thực hiện xoá admin 
    $sql = "DELETE FROM tbl_admin WHERE id = $id";

    // thực thi truy vấn
    $res = mysqli_query($conn, $sql); 

    // kiểm tra câu truy vấn có được thực hiện thành công hay không 
    if($res == TRUE){
        // thực thi thành công và xoá admin 
        // echo "Admin deleted";

        // tạo session hiển thị thông báo 
        $_SESSION['add'] = "<p class='text-success'>Admin Deleted Successfully</p>";
        // chuyến hướng đến trang manage
        echo("<script>location.href = '".SITEURL."admin/manage-admin.php';</script>");
    }else{
        // thực thi không thành công
        // echo "Not admin";
        // tạo session hiển thị thông báo 
        $_SESSION['add'] = "<p class='text-danger'>Failed To Deleted Admin</p>";
        // chuyến hướng đến trang manage
        echo("<script>location.href = '".SITEURL."admin/manage-admin.php';</script>");
    }
    // 3. chuyển hướng đến trang manage với thông báo
?>