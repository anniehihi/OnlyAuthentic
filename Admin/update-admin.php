<?php include('./partials/header.php'); ?>

            <div class="page-heading">
                <h1 class="page-title">Update Admin</h1>
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
                        $id = $_GET['id']; 

                        // 2. tạo câu truy vấn 
                        $sql = "SELECT * FROM tbl_admin WHERE id=$id"; 

                        // thực thi truy vấn
                        $res = mysqli_query($conn, $sql);

                        // kiểm tra xem truy vấn có thực hiện hay không
                        if($res == TRUE){
                            // kiểm tra xem có dữ liệu hay không 
                            $count = mysqli_num_rows($res); 

                            // kiểm tra xem admin có dữ liệu không 
                            if($count==1){
                                // lấy thông tin chi tiết
                                $row = mysqli_fetch_assoc($res); 

                                $full_name = $row['full_name']; 
                                $username = $row['username'];
                            }else{
                                // chuyển hướng đến tran manage
                                echo("<script>location.href = '".SITEURL."admin/manage-admin.php';</script>");
                            }
                        }
                    ?>

                        <form class="form-horizontal" action="" method="POST">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Full Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="full_name" value="<?php echo $full_name; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="username" value=<?php echo $username; ?>>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <input class="btn btn-info" type="submit" name="submit" value="Add Admin"></input>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


<?php include('./partials/footer.php') ?>

