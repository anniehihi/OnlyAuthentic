<?php include('./partials/header.php'); ?>

            <div class="page-heading">
                <h1 class="page-title">Cập nhật trạng thái đơn hàng</h1>
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

                                $sql = "SELECT * FROM tbl_order WHERE order_id = $id"; 

                                $res = mysqli_query($conn, $sql); 

                                $count = mysqli_num_rows($res); 

                                if($count == 1){
                                    $row = mysqli_fetch_assoc($res); 

                                    $status = $row['status']; 
                                }else{
                                    echo("<script>location.href = '".SITEURL."admin/update-status.php';</script>");
                                }
                            }else{
                                echo("<script>location.href = '".SITEURL."admin/update-status.php';</script>");
                            }
                        ?>
                        <form class="form-horizontal" action="" method="POST">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Trạng thái</label>
                                <div class="col-sm-10">
                                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="status">
                                        <option <?php if($status=='Chờ xác nhận'){echo "Đã chọn";} ?> value="Chờ xác nhận">Chờ xác nhận</option>
                                        <option <?php if($status=="Xác nhận"){echo "Đã chọn";} ?> value="Xác nhận">Xác nhận</option>
                                        <option <?php if($status=='Đang giao hàng'){echo "Đã chọn";} ?> value="Đang giao hàng">Đang giao hàng</option>
                                        <option <?php if($status=='Đã giao hàng'){echo "Đã chọn";} ?> value="Đã giao hàng">Đã giao hàng</option>
                                        <option <?php if($status=='Đã huỷ'){echo "Đã chọn";} ?> value="Đã huỷ">Đã huỷ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input class="btn btn-info" type="submit" name="submit" value="Xác nhận"></input>
                                </div>
                            </div>
                        </form>

                        <?php
                            if(isset($_POST['submit'])){
                                $id = $_POST['id']; 
                                $status = $_POST['status'];

                                $sql2 = "UPDATE tbl_order SET 
                                    status = '$status' 
                                    WHERE order_id = $id
                                ";

                                $res2 = mysqli_query($conn, $sql2); 

                                if($res2 == TRUE){
                                    // tạo sesion lưu thông báo 
                                    $_SESSION['update-stt'] = "<p class='text-success'>Cập nhật trạng thái thành công</p>";
                                    // chuyến hướng đến trang manage
                                    echo("<script>location.href = '".SITEURL."admin/manage-order.php';</script>");
                                    die();
                                }else{
                                    // tạo sesion lưu thông báo 
                                    $_SESSION['update-stt'] = "<p class='text-success'>Lỗi cập nhật trạng thái</p>";
                                    // chuyến hướng đến trang manage
                                    echo("<script>location.href = '".SITEURL."admin/manage-order.php';</script>");
                                    die();                                   
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
<?php include('./partials/footer.php') ?>

