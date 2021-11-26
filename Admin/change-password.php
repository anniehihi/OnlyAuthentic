<?php include('./partials/header.php'); ?>

            <div class="page-heading">
                <h1 class="page-title">Change Password</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                </ol>
            </div>

            <div class="col-md-6">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">ADMIN</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">


                    <?php
                        // 1.lấy id của admin được update 
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                        }
                    ?>

                        <form class="form-horizontal" action="" method="POST">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Current Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="current_password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="new_password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="confirm_password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>"></input>
                                    <input class="btn btn-info" type="submit" name="submit" value="Change Password"></input>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                    // kiểm tra xem có bấm nút add admin hay không 
                    if(isset($_POST['submit'])){
                        // echo 'oke';
                        // lấy dữ liệu từ form và update
                        $id = $_POST['id']; 
                        $current_password = md5($_POST['current_password']); 
                        $new_password = md5($_POST['new_password']);
                        $confirm_password = md5($_POST['confirm_password']);

                        // tạo câu truy vấn để update 
                        $sql = "SELECT * FROM tbl_admin WHERE id = $id AND password = '$current_password'";

                        // thực thi câu truy vấn 
                        $res = mysqli_query($conn, $sql); 

                        // kiểm tra xem câu truy vấn có thực thi đúng hay không 
                        if($res == TRUE){
                            
                            // kiểm tra xem có dữ liệu hay không 
                            $count = mysqli_num_rows($res);
                            
                            if($count == 1){
                                // kiểm tra xem mk mới và mk xác nhận có giống nhau hay không 
                                if($new_password == $confirm_password){
                                    // update password 
                                    $sql2 = "UPDATE tbl_admin SET
                                        password = '$new_password'; 
                                        WHERE id = $id
                                    ";

                                    // thực thi truy vấn 
                                    $res2 = mysqli_query($conn, $sql2); 

                                    if($res2 == TRUE){
                                        $_SESSION['change-pwd'] = "<p class='text-success'>Password Change Successfully</p>";
                                        // chuyến hướng đến trang manage
                                        echo("<script>location.href = '".SITEURL."admin/manage-admin.php';</script>");
                                    }else{
                                        $_SESSION['change-pwd'] = "<p class='text-success'>Failed To Change Password</p>";
                                        // chuyến hướng đến trang manage
                                        echo("<script>location.href = '".SITEURL."admin/manage-admin.php';</script>");
                                    }
                                }else{
                                    $_SESSION['pwd-not-match'] = "<p class='text-success'>Password Did Not Match</p>";
                                    // chuyến hướng đến trang manage
                                    echo("<script>location.href = '".SITEURL."admin/manage-admin.php';</script>");
                                }
                            }else{
                                $_SESSION['user-not-found'] = "<p class='text-success'>User Not Found</p>";
                                // chuyến hướng đến trang manage
                                echo("<script>location.href = '".SITEURL."admin/manage-admin.php';</script>");
                            }
                        }
                    }
                ?>
            </div>
<?php include('./partials/footer.php') ?>

