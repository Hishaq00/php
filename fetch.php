<?php
include("connection.php")
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
    <table class="table">
<thead>
    <tr></tr>
    </thead>
    <tbody>
        <?php
        $query=mysqli_query($con,"SELECT * FROM `user`");
        while($col=mysqli_fetch_array($query)){
            ?>
        
   <tr>
<td scope="row"><?php echo $col['0'] ?></td>
    <td><?php echo $col['1'] ?></td>
    <td><?php echo $col['2'] ?></td>
    <td><?php echo $col['3'] ?></td>
    <td>
        <a href="?id=<?php echo $col['0'] ?>">DELETE</a>
<a href="update.php?id=<?php echo $col['0'] ?>">UPDATE</a>
</td>
    </tr>
    <?php } ?>
    </tbody>
    </table>
</body>
</html>
<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $del=mysqli_query($con,"DELETE FROM `user` WHERE id=$id");
    if($del){
        echo "<script>alert('data deleted');
        location.assign('fetch.php') </script>";
       
    }
}
?>


