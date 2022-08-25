<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forgot password</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {background:#dfe7e9; font-family:'Roboto', sans-serif;}
        .form-control {font-size:16px;transition: all 0.4s; box-shadow:none;}
        .form-control:focus {border-color:#5cb85c;}
        .form-control, .btn {border-radius:50px; outline:none !important;}
        .signup-form {width:480px; margin:0 auto; padding:30px 0;}
        .signup-form form {border-radius:5px; margin-bottom:20px; background:#fff; box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3); padding:40px;}
        .signup-form a {color:#5cb85c;}
        .signup-form h2{text-align:center; font-size:34px; margin:10px 0 15px;}
        .signup-form .hint-text {color:#999; text-align:center; margin-bottom:20px;}
        .signup-form .form-group {margin-bottom:20px;}
        .signup-form .btn {font-size:18px; line-height:26px; font-weight:bold; text-align:center;}
        .signup-btn{text-align:center; border-color:#5cb85c; transition:all 0.4s;}
        .signup-btn:hover{background:#5cb85c; opacity:0.8;}
        .or-seperator {margin:50px 0 15px; text-align:center; border-top:1px solid #e0e0e0;}
        .or-seperator b{padding:0 10px; width:40px; height:40px; font-size:16px; text-align:center; line-height:40px; background:#fff; display:inline-block;
            border:1px solid #e0e0e0; border-radius:50%; position:relative; top:-22px; z-index:1;}
    </style>
</head>
<body>
    <?php
        include('db_con.php');
        error_reporting(0);

        if(isset($_POST['submit'])){
            if(isset($_GET['Token'])){
                $token = $_GET['Token'];

                $new_password = $_POST['password'];
                $con_password = $_POST['confirm_password'];

                $pass = password_hash($new_password,PASSWORD_DEFAULT);
                $con_pas = password_hash($con_password,PASSWORD_DEFAULT);

                if($new_password === $con_password){
                    $update = "UPDATE register SET Password='$pass' WHERE Token='$token'";
                    $query = mysqli_query($con,$update);

                    if($query){
                        echo "<script> alert('You have sucessfully reset your password!')</script>";
                        header('location:login.php');
                    }else{
                        echo "<script> alert('Something went wrong, please try again?')</script>";
                        header('location:forgot_password.php');
                    }  
                }else{
                    echo "<script> alert('Password and Confirm Password is not match!')</script>";
                }
            }else{
                echo "<script> alert('Token not found!')</script>";
            }
        }
    ?>
    <div class="signup-form">
        <form action="" method="post">
            <h2>Forgot Your passwword</h2>
            <div class="or-seperator"><b>or</b></div>
            <div class="form-group">
                <input type="password" class="form-control input-lg" name="password" placeholder="New Password" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control input-lg" name="confirm_password" placeholder="Confirm Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success btn-lg btn-block signup-btn">Forgot Password</button>
            </div>
        </form>
        <div class="text-center">If you don't want to forgot your password? <a href="login.php">Login here</a></div>
    </div>
</body>
</html>