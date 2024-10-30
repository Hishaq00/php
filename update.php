<?php
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

    <form action="" method="post">
        <h1>UPDATE</h1>
        <?php
        if(isset($_GET['id'])){
            $up=$_GET['id'];
         $query= mysqli_query($con,"SELECT * FROM `user` WHERE id=$up");
            $col=mysqli_fetch_array($query);
        }
        ?>

        <div class="form-group">
            <label for="username">UserName:</label>
            <input type="text" class="form-control" name="uname" value="<?php echo $col[1] ?>">
        </div>
        <div class="form-group">
            <label for="username">Email:</label>
            <input type="text" class="form-control" name="uemail" value="<?php echo $col[2] ?>">
        </div>
        <div class="form-group">
            <label for="username">Password:</label>
            <input type="text" class="form-control" name="upass" value="<?php echo $col[3] ?>">
        </div>
        <button class="btn btn-info" name="update">Submit</button>
    </form>
</body>
</html>
<?php
if(isset($_POST['update'])){
    $name=$_POST['uname'];
    $email=$_POST['uemail'];
    $pass=$_POST['upass'];
    $update=mysqli_query($con,"UPDATE `user` SET `name`='$name',`email`='$email',`password`='$pass' WHERE id=$up");
    if($query){
        echo '<script>alert("data updated");
        location.assign("fetch.php");
        </script>';
    }
    else{
        echo '<script>alert("data does not updated")</script>';
    }
}
?>
