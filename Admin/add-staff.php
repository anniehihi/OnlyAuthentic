<?php include('./partials/header.php'); ?>

 <?php   
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
           
                if(isset($_SESSION['upload'])){
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
            ?> 

            <div class="page-heading">
                <h1 class="page-title">Thêm nhân viên</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                </ol>
            </div>

            <div class="col-md-6">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title"></div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                        </div>
                    </div>

                    <div class="ibox-body">
                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Họ</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="first_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tên</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="last_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tuổi</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" name="age">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Địa chỉ</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="address">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Số điện thoại</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" name="contact">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ảnh</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="image">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                     <input class="btn btn-info" type="submit" name="submit" value="Thêm"></input>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include('./partials/footer.php') ?>

 <?php 
            if(isset($_POST['submit'])){

                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $age = $_POST['age'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $contact = $_POST['contact'];

                if(isset($_FILES['image']['name'])){
                    $image_name = $_FILES['image']['name'];

                    if($image_name != ""){
                        

                        $ext = end(explode('.', $image_name));

                        $image_name = "Staff".rand(000, 999).'.'.$ext;

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../img/staff/".$image_name;

                        $upload = move_uploaded_file($source_path, $destination_path);

                        if($upload == false){
                            // tạo sesion lưu thông báo 
                            $_SESSION['upload'] = "<p class='text-success'>Lỗi tải ảnh lên</p>";
                            // chuyến hướng đến trang manage
                            echo("<script>location.href = '".SITEURL."admin/add-staff.php';</script>");
                            die();
                        }
                    }
                }
                else{
                    $image_name = "";
                }             

                // print_r($_FILES['image']);

                // die();

                $sql = "INSERT INTO tbl_staff SET
                    first_name = '$first_name',
                    last_name = '$last_name',
                    age = '$age',
                    address = '$address',
                    email = '$email',
                    contact = '$contact',
                    image_name='$image_name'
                ";

                $res = mysqli_query($conn, $sql);

                if($res==true){
                    // tạo sesion lưu thông báo 
                    $_SESSION['add'] = "<p class='text-success'>Thêm nhân viên thành công</p>";
                    // chuyến hướng đến trang manage
                    echo("<script>location.href = '".SITEURL."admin/manage-staff.php';</script>");
                }else{
                    // tạo sesion lưu thông báo 
                    $_SESSION['add'] = "<p class='text-success'>Lỗi thêm nhân viên</p>";
                    // chuyến hướng đến trang manage
                    echo("<script>location.href = '".SITEURL."admin/manage-staff.php';</script>");
                }
            }
        ?>

       