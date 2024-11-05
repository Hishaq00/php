<?php
include('connection.php');
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

                
                <div class="container-fluid">    
                <div class="container my-4">
        <h1 class="text-info"> Update</h1>
        <?php
        if(isset($_GET['id'])){
$up=$_GET['id'];
$query=mysqli_query($con,"SELECT * FROM `categories` WHERE id=$up");
$col=mysqli_fetch_array($query);
        }
        ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class ="from-control">
            <label for=""  class="form-label">category name</label>
            <input type="text" name= "cname" id ="" class="form-control" placeholder=""  VALUE="<?php echo $col[1]?>" >

        </div>

        <div class ="from-control">
            <label for=""  class="form-label">category description</label>
            <input type="text" name= "cdescip" id ="" class="form-control" placeholder=""  VALUE="<?php echo $col[2]?>" >

        </div>

        <div class ="from-control">
            <label for=""  class="form-label">image</label>
            <input type="file" name= "cimage" id ="" class="form-control" placeholder=""  VALUE="<?php echo $col[3]?>" >

        </div>

        <input type="submit" value="update" name="update" class="btn btn-primary my-4">
    </form>
</div>
            </div>
</div>
<?php
if(isset($_POST['update'])){
   $name=$_POST['cname'];
   $description=$_POST['cdescip'];
   $image=$_FILES['cimage']['name'];
   $cattmpname=$_FILES['cimage']['tmp_name'];
   $destination="img/".$image;
   $extension=pathinfo($image,PATHINFO_EXTENSION);
   
   if($extension=='png'|| $extension=='jpg' || $extension== 'jpeg' || $extension=='jfif'){

    if(move_uploaded_file($cattmpname,$destination)){
        $update=mysqli_query($con, "UPDATE `categories` SET `category_name`='$name',`description`='$description',`image`='$image' WHERE  id=$up");
        if($update){
            echo "<script>alert('data updated');
               location.assign('viewcat.php');
            </script>";
        }
        else{
            echo "<script>alert('data does not updated')</script>";
    
        }
    }
    }
}
    ?>


?>








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
<?php
if(isset($_POST['add'])){
   $name=$_POST['cname'];
   $description=$_POST['cdescip'];
   $image=$_FILES['cimage']['name'];
   $cattmpname=$_FILES['cimage']['tmp_name'];
   $destination="img/".$image;
   $extension=pathinfo($image,PATHINFO_EXTENSION);
   
   if($extension=='png'|| $extension=='jpg' || $extension== 'jpeg' || $extension=='jfif'){

    if(move_uploaded_file($cattmpname,$destination)){
        $query=mysqli_query($con, "INSERT INTO `categories`(`name`, `description`, `image`) VALUES ('$name','$description','$image')");
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