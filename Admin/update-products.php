<?php include('./partials/header.php'); ?>
            <div class="page-heading">
                <h1 class="page-title">Update Products</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                </ol>
            </div>

            <div class="col-md-6">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">PRODUCTS</div>
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
                            $sql = "SELECT * FROM tbl_products WHERE id=$id"; 

                            // thực thi truy vấn
                            $res = mysqli_query($conn, $sql);

                            // kiểm tra xem có dữ liệu hay không 

                            // kiểm tra xem category có dữ liệu không 
                            // lấy thông tin chi tiết
                            $row = mysqli_fetch_assoc($res); 

                            $title = $row['title']; 
                            $description = $row['description'];
                            $price = $row['price']; 
                            $current_image = $row['image_name']; 
                            $current_category = $row['category_id'];
                            $featured = $row['featured']; 
                            $active = $row['active']; 
                        
                        }else{
                            echo("<script>location.href = '".SITEURL."admin/manage-products.php';</script>");
                        }                    
                    ?>

                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="title" value="<?php echo $title; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Desctiption</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" ><?php echo $description; ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" name="price" value="<?php echo $price; ?>">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Current Image</label>
                                <div class="col-sm-10">
                                    <?php
                                        if($current_image != ""){
                                            ?>
                                            <img src = "<?php echo SITEURL; ?>/img/product/<?php echo $current_image; ?>" width="200px">
                                            <?php
                                        }else{
                                            echo "<p class='text-success'>Products Not Found</p>";
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
                                <label class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="category">
                                    <?php
                                        // tạo câu truy vấn
                                        $sql2 = "SELECT * FROM tbl_category WHERE active='Yes'";

                                        // thực thi câu truy vấn
                                        $res2 = mysqli_query($conn, $sql2);
        
                                        // kiểm tra xem có dữ liệu hay không 
                                        $count2 = mysqli_num_rows($res2);
        
                                        if($count2>0)
                                        {
                                            while($row2=mysqli_fetch_assoc($res2))
                                            {
                                                $category_id = $row2['id'];
                                                $category_title = $row2['title'];
                                                ?>
                                                    <option <?php if($current_category==$category_id){echo "selected";} ?>  value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                            <option value="0">No Category Found</option>
                                            <?php
                                        }
                                    ?>
                                    <!-- <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option> -->
                                </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Featured</label>
                                <div class="col-sm-10 ml-sm-auto">
                                    <label class="ui-radio ui-radio-gray">
                                        <input <?php if($featured=="Yes"){echo "checked";} ?>  type="radio" name="featured" value="Yes">
                                        <span class="input-span"></span>Yes
                                    </label>

                                    <label class="ui-radio ui-radio-gray">
                                        <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No">
                                        <span class="input-span"></span>No
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Active</label>
                                <div class="col-sm-10 ml-sm-auto">
                                    <label class="ui-radio ui-radio-gray">
                                        <input <?php if($active=="Yes"){echo "checked";} ?>  type="radio" name="active" value="Yes">
                                        <span class="input-span"></span>Yes
                                    </label>

                                    <label class="ui-radio ui-radio-gray">
                                        <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No">
                                        <span class="input-span"></span>No
                                    </label>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input  type="hidden" name="current_image" value="<?php echo $current_image; ?>"></input>
                                    <input class="btn btn-info" type="submit" name="submit" value="Update Products"></input>
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
                        $title = $_POST['title']; 
                        $description = $_POST['description'];
                        $price = $_POST['price'];
                        $current_image = $_POST['current_image'];
                        $category = $_POST['category'];
                        $featured = $_POST['featured']; 
                        $active = $_POST['active'];

                        if(isset($_FILES['image']['name'])){
                            $image_name = $_FILES['image']['name'];
        
                            if($image_name != ""){
                                $ex = explode('.', $image_name);
                                $ext = end($ex);
        
                                $image_name = "Product_Name_".rand(0000, 9999).'.'.$ext;
        
                                $source_path = $_FILES['image']['tmp_name'];
        
                                $destination_path = "../img/product/".$image_name;
        
                                $upload = move_uploaded_file($source_path, $destination_path);
        
                                if($upload == false){
                                    // tạo sesion lưu thông báo 
                                    $_SESSION['upload'] = "<p class='text-success'>Failed to Upload Image</p>";
                                    // chuyến hướng đến trang manage
                                    echo("<script>location.href = '".SITEURL."admin/manage-products.php';</script>");
                                    die();
                                }
        
                                if($current_image !=""){
                                    $remove_path = "../img/product/".$current_image;
                                    $remove = unlink($remove_path);
                                    if($remove == false){
                                        // tạo sesion lưu thông báo 
                                        $_SESSION['failed-remove'] = "<p class='text-success'>Failed to Remove Current Image</p>";
                                        // chuyến hướng đến trang manage
                                        echo("<script>location.href = '".SITEURL."admin/manage-products.php';</script>");
                                        die();
                                    }
                                }
                        }
                        else
                        {
                            $image_name = $current_image;
                        }        

                        // tạo câu truy vấn để update 
                        $sql3 = "UPDATE tbl_products SET
                            title = '$title',
                            description = '$description',
                            price = '$price',
                            image_name = '$image_name',
                            category_id = '$category',
                            featured = '$featured', 
                            active = '$active'
                            WHERE id=$id
                        ";

                        // thực thi câu truy vấn 
                        $res3 = mysqli_query($conn, $sql3); 

                        // kiểm tra xem câu truy vấn có thực thi đúng hay không 
                        if($res3 == TRUE){
                            // thực hiện đúng và update admin 
                            $_SESSION['update'] = "<p class='text-success'>Products Update Successfully</p>";
                            // chuyến hướng đến trang manage
                            echo("<script>location.href = '".SITEURL."admin/manage-products.php';</script>");
                        }else{
                            // thực hiện sai 
                            $_SESSION['update'] = "<p class='text-success'>Failed To Update Products</p>";
                            // chuyến hướng đến trang manage
                            echo("<script>location.href = '".SITEURL."admin/manage-products.php';</script>");
                        }
                    }
                }
                ?>
            </div>
<?php include('./partials/footer.php') ?>

