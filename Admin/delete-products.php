<?php
    include('../config/constants.php');

    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        // echo  "oke";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != "")
        {
            $path = "../img/product/".$image_name;
            $remove = unlink($path);

            if($remove == false)
            {
                // tạo sesion lưu thông báo 
                $_SESSION['remove'] = "<p class='text-success'>Failed to Remove Products</p>";
                // chuyến hướng đến trang manage
                echo("<script>location.href = '".SITEURL."admin/manage-products.php';</script>");
                die();
            }
        }
        $sql = "DELETE FROM tbl_products WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if($res == true)
        {
            // tạo sesion lưu thông báo 
            $_SESSION['delete'] = "<p class='text-success'>Products Delete successfully</p>";
            // chuyến hướng đến trang manage
            echo("<script>location.href = '".SITEURL."admin/manage-products.php';</script>");
        }
        else
        {
            // tạo sesion lưu thông báo 
            $_SESSION['delete'] = "<p class='text-success'>Failed to Delete Products</p>";
            // chuyến hướng đến trang manage
            echo("<script>location.href = '".SITEURL."admin/manage-products.php';</script>");
        }
    }
    else
    {
        // chuyến hướng đến trang manage
        echo("<script>location.href = '".SITEURL."admin/manage-products.php';</script>");
    }
?>