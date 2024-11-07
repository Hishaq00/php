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

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method='post' onsubmit="return validation()">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="FirstName"
                                            placeholder="First Name" name="fname">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="LastName"
                                            placeholder="Last Name" name="lname">
                                            <span class='text-danger' id="nameerror"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="Email"
                                        placeholder="Email Address" name="uemail">
                                        <span class='text-danger' id="emailerror"></span>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="UserPassword"
                                 placeholder="Password"  name="upass">
                                 <span class='text-danger' id="passworderror"></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="cPassword" placeholder="Repeat Password">
                                            <span class='text-danger' id="cperror"></span>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary btn-user btn-block" name='btnadd' value="submit">
                            
                                <hr>
                                <a href="index.php" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.php" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php
if(isset($_POST['btnadd'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['uemail'];
    $pass=$_POST['upass'];
    
    $query=mysqli_query($con,"INSERT INTO `register`( `full_name`, `last_name`, `email`, `pass`) VALUES ('$fname','$lname','$email','$pass')");
    if($query){
        echo "<script>alert('data inserted');
        location.assign ('login.php')</script>";
        
    }
    else{
        echo "<script>alert('data does not inserted')</script>";

    }

}
?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
<script>
   function validation(){
    var FirstName = document.getElementById('FirstName').value;
    var  LastName= document.getElementById('LastName').value;
    var userEmail = document.getElementById('Email').value;
    var UserPassword = document.getElementById('UserPassword').value;
    var cpass = document.getElementById('cPassword').value;

    var usercheck=/^[A-Za-z ]{3,20}$/;
    var passwordcheck =/^(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z0-9!@#$%^&*^]{8,16}$/;
    var emailcheck = /^[A-Za-z]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/;

    if(usercheck.test(FirstName)){
        document.getElementById("nameerror").innerHTML="";
    }
    else{
        document.getElementById("nameerror").innerHTML="**invalid firstname";
        return  false;
    }
    if(usercheck.test(LastName)){
        document.getElementById("nameerror").innerHTML="";
    }
    else{
        document.getElementById("nameerror").innerHTML="**invalid lastname";
        return  false;
    }
   if(emailcheck.test(userEmail)){
        document.getElementById("emailerror").innerHTML="";
        
    }else{
        document.getElementById("emailerror").innerHTML="**invalid email";
        return  false;
    }
    if(passwordcheck.test(UserPassword)){
        document.getElementById("UserPassword").innerHTML="";
        
    }else{
        document.getElementById("UserPassword").innerHTML="**invalid password";
        return  false;
    }
    if(passwordcheck.match(cpass)){
        document.getElementById("cPassword").innerHTML="";
        
    }else{
        document.getElementById("cPassword").innerHTML="**password does not match";
        return  false;
    }
}
</script>
</html>
