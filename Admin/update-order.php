<?php include('./partials/header.php'); ?>

            <div class="page-heading">
                <h1 class="page-title">Cập nhật đơn hàng</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                </ol>
            </div>

            <div class="col-md-6">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">ĐƠN HÀNG</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                        </div>
                    </div>

                    <div class="ibox-body">
                    <?php   
                        if(isset($_GET['id'])){
                            $id = $_GET['id']; 

                            $sql = "SELECT * FROM tbl_order WHERE order_id=$id"; 

                            $res = mysqli_query($conn, $sql);

                            if($res == TRUE){
                                // kiểm tra xem có dữ liệu hay không 
                                $count = mysqli_num_rows($res); 
    
                                // kiểm tra xem admin có dữ liệu không 
                                if($count==1){
                                    // lấy thông tin chi tiết
                                    $row = mysqli_fetch_assoc($res); 
    
                                    $first_name = $row['first_name']; 
                                    $last_name = $row['last_name']; 
                                    $address = $row['address']; 
                                    $city = $row['city']; 
                                    $distric = $row['district']; 
                                    $ward = $row['ward']; 
                                    $contact = $row['contact'];
                                }else{
                                    // chuyển hướng đến tran manage
                                    echo("<script>location.href = '".SITEURL."admin/manage-order.php';</script>");
                                }
                            }
                        }

                    ?>
                        <form class="form-horizontal" action="" method="POST">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Họ</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="first_name" value="<?php echo $first_name; ?>">
                                </div>
                                
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tên</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="last_name" value="<?php echo $last_name; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Địa chỉ</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="address" value="<?php echo $address; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tỉnh/Thành Phố</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="city" value="<?php echo $city; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Huyện</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="distric" value="<?php echo $distric; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Xã/Phường</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="ward" value="<?php echo $ward; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Số điện thoại</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="contact" value="<?php echo $contact; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input class="btn btn-info" type="submit" name="submit" value="Xác nhận"></input>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                    // kiểm tra xem có bấm nút add category hay không 
                    if(isset($_POST['submit'])){
                        // echo 'oke';
                        // lấy dữ liệu từ form và update
                        $id = $_POST['id']; 
                        $first_name = $_POST['first_name']; 
                        $last_name = $_POST['last_name']; 
                        $address = $_POST['address']; 
                        $city = $_POST['city'];    
                        $distric = $_POST['distric'];
                        $ward = $_POST['ward']; 
                        $contact = $_POST['contact']; 

                        // tạo câu truy vấn để update 
                        $sql2 = "UPDATE tbl_order SET
                            first_name = '$first_name', 
                            last_name = '$last_name', 
                            address = '$address', 
                            city = '$city', 
                            district = '$distric', 
                            ward = '$ward', 
                            contact = '$contact' 
                            WHERE order_id=$id
                        ";

                        // thực thi câu truy vấn 
                        $res2 = mysqli_query($conn, $sql2); 

                        // kiểm tra xem câu truy vấn có thực thi đúng hay không 
                        if($res == TRUE){
                            // thực hiện đúng và update admin 
                            $_SESSION['update'] = "<p class='text-success'>Cập nhật đơn hàng thành công</p>";
                            // chuyến hướng đến trang manage
                            echo("<script>location.href = '".SITEURL."admin/manage-order.php';</script>");
                        }else{
                            // thực hiện sai 
                            $_SESSION['update'] = "<p class='text-success'>Lỗi cập nhật đơn hàng</p>";
                            // chuyến hướng đến trang manage
                            echo("<script>location.href = '".SITEURL."admin/manage-order.php';</script>");
                        }
                    }
                ?>
            </div>
<?php include('./partials/footer.php') ?>

