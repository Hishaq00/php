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

    <div class="container-fluid">
    <table class="table ">
    <thead class="table-info">
        <th>id</th>
        <th>name</th>
        <th>prise</th>
        <th>Qty</th>
        <th>cat_id</th>
        <th>image</th>
        <th>Delete</th>
        <th>Update</th>
    </thead>
    <tbody>
    <?php
    $query=mysqli_query($con," SELECT * FROM `products`");
    while($col=mysqli_fetch_array($query)){
    ?>
    <tr>
        <td scope="row"><?php echo $col['0']; ?></td>
        <td><?php echo $col['1']; ?></td>
        <td><?php echo $col['2']; ?></td>
        <td><?php echo $col['3']; ?></td>
        <td><?php echo $col['4']; ?></td>
       
        <td><img src="img/<?php echo $col['5']; ?>" alt="<?php echo $col['1']; ?>" style="width: 100px; height: auto;"></td>
        <td>
            <a href="?id=<?php echo $col[0]; ?>" class="btn btn-danger">DELETE</a>
        </td>
        <td>            <a href="pro_update.php?id=<?php echo $col[0]; ?>" class="btn btn-info">UPDATE</a>
        </td>
    </tr>
    <?php
    }
    ?>
</tbody>

  </table>
</div>
</div>
<?php
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $del=mysqli_query($con,"DELETE FROM `products` WHERE id=$id");
  if($del){
    echo "<script>alert('data deleted');
    location.assign('viewcat.php');
    </script>";
  }
}
?>



    <?php
include("footer.php")
?>



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
