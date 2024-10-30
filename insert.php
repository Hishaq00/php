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
        <div class="form-group">
            <label for="username">UserName:</label>
            <input type="text" class="form-control" name="uname">
        </div>
        <div class="form-group">
            <label for="username">Email:</label>
            <input type="text" class="form-control" name="uemail">
        </div>
        <div class="form-group">
            <label for="username">Password:</label>
            <input type="text" class="form-control" name="upass">
        </div>
        <button class="btn btn-info" name="addbtn">Submit</button>
    </form>
</body>
</html>
<?php
if(isset($_POST['addbtn'])){
    $name=$_POST['uname'];
    $email=$_POST['uemail'];
    $pass=$_POST['upass'];
    $query=mysqli_query($con,"INSERT INTO `user`( `name`, `email`, `password`) VALUES ('$name','$email','$pass')");
    if($query){
        echo '<script>alert("data inserted")</script>';
    }
    else{
        echo '<script>alert("data does not inserted")</script>';
    }
}
?>
