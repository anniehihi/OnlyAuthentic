<?php include('./partials/header.php'); ?>

            <div class="page-heading">
                <h1 class="page-title">Update Staff</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                </ol>
            </div>

            <div class="col-md-6">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Staff</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">


                    <?php
                    if(isset($_GET['id'])){
                        // 1.lấy id của category được update 
                        $id = $_GET['id']; 

                        // 2. tạo câu truy vấn 
                        $sql = "SELECT * FROM tbl_staff WHERE id=$id"; 

                        // thực thi truy vấn
                        $res = mysqli_query($conn, $sql);

                        // kiểm tra xem có dữ liệu hay không 
                        $count = mysqli_num_rows($res); 

                            // kiểm tra xem category có dữ liệu không 
                            if($count==1){
                                // lấy thông tin chi tiết
                                $row = mysqli_fetch_assoc($res); 

                                $first_name = $row['first_name'];
                                $last_name = $row['last_name']; 
                                $age = $row['age']; 
                                $address = $row['address']; 
                                $email = $row['email'];
                                $contact = $row['contact'];
                                $current_image = $row['image_name'];
                            }else{
                                $_SESSION['no-category-found'] = "<p class='text-success'>Staff Not Found</p>";
                                // chuyển hướng đến tran manage
                                echo("<script>location.href = '".SITEURL."admin/manage-staff.php';</script>");
                            }
                        }else{
                            echo("<script>location.href = '".SITEURL."admin/manage-staff.php';</script>");
                        }                    
                    ?>

                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">First Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="first_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Last Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="last_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Age</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" name="age">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Address</label>
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
                                <label class="col-sm-2 col-form-label">Contact</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" name="contact">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Current Image</label>
                                <div class="col-sm-10">
                                    <?php
                                        if($current_image != ""){
                                            ?>
                                            <img src = "<?php echo SITEURL; ?>/img/staff/<?php echo $current_image; ?>" width="200px">
                                            <?php
                                        }else{
                                            echo "<p class='text-success'>Staff Not Found</p>";
                                        }
                                    ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">New Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="image">
                                </div>
                            </div>
                            

                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <input  type="hidden" name="current_image" value="<?php echo $current_image; ?>"></input>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input class="btn btn-info" type="submit" name="submit" value="Update Staff"></input>
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
                  $age = $_POST['age'];
                  $address = $_POST['address'];
                  $email = $_POST['email'];
                  $contact = $_POST['contact'];
                  $current_image = $_POST['current_image'];

                        if(isset($_FILES['image']['name'])){
                            $image_name = $_FILES['image']['name'];
        
                            if($image_name != ""){
                                $ext = end(explode('.', $image_name));
        
                                $image_name = "Shoe_Staff_".rand(000, 999).'.'.$ext;
        
                                $source_path = $_FILES['image']['tmp_name'];
        
                                $destination_path = "../img/staff/".$image_name;
        
                                $upload = move_uploaded_file($source_path, $destination_path);
        
                                if($upload == false){
                                    // tạo sesion lưu thông báo 
                                    $_SESSION['upload'] = "<p class='text-success'>Failed to Upload Image</p>";
                                    // chuyến hướng đến trang manage
                                    echo("<script>location.href = '".SITEURL."admin/manage-staff.php';</script>");
                                    die();
                                }
        
                                if($current_image !=""){
                                    $remove_path = "../img/staff/".$current_image;
                                    $remove = unlink($remove_path);
                                    if($remove == false){
                                        // tạo sesion lưu thông báo 
                                        $_SESSION['failed-remove'] = "<p class='text-success'>Failed to Remove Current Image</p>";
                                        // chuyến hướng đến trang manage
                                        echo("<script>location.href = '".SITEURL."admin/manage-staff.php';</script>");
                                        die();
                                    }
                                }
                        }
                        else
                        {
                            $image_name = $current_image;
                        }        

                        // tạo câu truy vấn để update 
                    $sql2 = "UPDATE tbl_staff SET
                    first_name = '$first_name',
                    last_name = '$last_name',
                    age = '$age',
                    address = '$address',
                    email = '$email',
                    contact = '$contact',
                    image_name='$image_name'   
                    WHERE id=$id
                        ";

                        // thực thi câu truy vấn 
                        $res2 = mysqli_query($conn, $sql2); 

                        // kiểm tra xem câu truy vấn có thực thi đúng hay không 
                        if($res == TRUE){
                            // thực hiện đúng và update admin 
                            $_SESSION['update'] = "<p class='text-success'>Staff Update Successfully</p>";
                            // chuyến hướng đến trang manage
                            echo("<script>location.href = '".SITEURL."admin/manage-staff.php';</script>");
                        }else{
                            // thực hiện sai 
                            $_SESSION['update'] = "<p class='text-success'>Failed To Update Staff</p>";
                            // chuyến hướng đến trang manage
                            echo("<script>location.href = '".SITEURL."admin/manage-staff.php';</script>");
                        }
                    }
                }
                ?>
            </div>
<?php include('./partials/footer.php') ?>

