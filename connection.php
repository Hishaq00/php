<?php
$con=mysqli_connect("localhost","root","","project");
if(mysqli_connect_error()){
    echo "<script>alert('connection failed')</script>";
}else{
    // echo "<script>alert('connection build successfully')</script>";
}
?>
