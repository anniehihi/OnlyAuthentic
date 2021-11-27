<?php
    include('../config/constants.php');

    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        // echo  "oke";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != "")
        {
            $path = "../img/category/".$image_name;
            $remove = unlink($path);

            if($remove == false)
            {
                // tạo sesion lưu thông báo 
                $_SESSION['remove'] = "<p class='text-success'>Failed to Remove Category</p>";
                // chuyến hướng đến trang manage
                echo("<script>location.href = '".SITEURL."admin/manage-cateogry.php';</script>");
                die();
            }
        }
        $sql = "DELETE FROM tbl_category WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if($res == true)
        {
            // tạo sesion lưu thông báo 
            $_SESSION['delete'] = "<p class='text-success'>Category Delete successfully</p>";
            // chuyến hướng đến trang manage
            echo("<script>location.href = '".SITEURL."admin/manage-category.php';</script>");
        }
        else
        {
            // tạo sesion lưu thông báo 
            $_SESSION['delete'] = "<p class='text-success'>Failed to Delete Category</p>";
            // chuyến hướng đến trang manage
            echo("<script>location.href = '".SITEURL."admin/manage-category.php';</script>");
        }
    }
    else
    {
        // chuyến hướng đến trang manage
        echo("<script>location.href = '".SITEURL."admin/manage-category.php';</script>");
    }
?>