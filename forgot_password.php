<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Forgot password</title>
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
            <h2>Forgot Your passwword</h2><br>
            <div class="form-group">
                <input type="password" class="form-control input-lg" name="password" placeholder="New Password" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control input-lg" name="confirm_password" placeholder="Confirm Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="form-control btn btn-success btn-lg btn-block signup-btn">Forgot Password</button>
            </div>
            <div class="text-center">If you don't want to forgot your password? <a href="login.php">Login here</a></div>
        </form>
    </div>
</body>
</html>