<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    <?php include("aside.php") ?>

                
              

                
                <div class="container my-4">
                    <h3 class="text-primary">Add Products</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class ="from-control">
            <label for=""  class="form-label">Product Name</label>
            <input type="text" name= "pname" id ="" class="form-control" placeholder="">

        </div>
        <div class ="from-control">
            <label for=""  class="form-label">Product Price</label>
            <input type="text" name= "pprice" id ="" class="form-control" placeholder="">

        </div>
        <div class ="from-control">
            <label for=""  class="form-label">Product Quantity</label>
            <input type="text" name= "pqty" id ="" class="form-control" placeholder="">

        </div>
        <div class="dropdown my-4">
<select name="cat" id=""> Choose Category
<option value="">Select category</option>
   <?php
$q=mysqli_query($con,"SELECT * FROM `categories`");
while($cat=mysqli_fetch_array($q)){
    ?>
<option value="<?php echo $cat[0] ?>"> <?php echo $cat[1] ?> </option>
  
   <?php
 }
 ?>
 </select>
  </div>
        <div class ="from-control">
            <label for=""  class="form-label">Image</label>
            <input type="file" name= "pimage" id ="" class="form-control" placeholder="">

        </div>
       
  <input type="submit" value="Add Product" name="add" class="btn btn-primary my-4">
</div>

        
    </form>
</div>
</div> 
            </div>
            <?php
if(isset($_POST['add'])){
   $name=$_POST['pname'];
   $price=$_POST['pprice'];
   $qty=$_POST['pqty'];
   $category=$_POST['cat'];
   $image=$_FILES['pimage']['name'];
   $ptmpname=$_FILES['pimage']['tmp_name'];
   $destination="img/".$image;
   $extension=pathinfo($image,PATHINFO_EXTENSION);
   
   if($extension=='png'|| $extension=='jpg' || $extension== 'jpeg' || $extension=='jfif'){

    if(move_uploaded_file($ptmpname,$destination)){
        $q=mysqli_query($con, "INSERT INTO `products`(`name`, `price`, `quantity`, `cat_id`, `image`) VALUES ('$name','$price','$qty','$category','$image')");
        echo "<script>alert('category inserted')</script>";
    }
    else{
        echo "<script>alert('error')</script>";
    }
}
    else{
        echo "<script>alert('This file is not an image')</script>";
 
    }
;

}
?>
          
</div>       
<?php
include("footer.php")
?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
