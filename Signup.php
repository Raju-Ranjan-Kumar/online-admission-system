<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/styles.css">
<title>Signup form</title>

</head>
<body>
    <?php
        include('db_con.php');
        error_reporting(0);

        if(isset($_POST['submit'])){
            $name = $_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $aadhar = $_POST['aadhar'];
            $password = $_POST['password'];
            $con_pass = $_POST['confirm_password'];

            $pass = password_hash($password,PASSWORD_DEFAULT);
            $con_pas = password_hash($con_pass,PASSWORD_DEFAULT);
            $token = bin2hex(random_bytes(15));

            if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM register WHERE Email='$email'"))>0){
                echo "<script> alert('This email is already register..!')</script>";
            }else{
                if($password === $con_pass){
                    $sql = "INSERT INTO register(Name,Email,Phone,Aadhar,Password,Con_password,Token) VALUES('$name','$email','$phone','$aadhar','$pass','$con_pas','$token')";
                    $query = mysqli_query($con,$sql);
                    header('location:login.php');
                }else{
                    echo "<script> alert('password and Confirm Password not match..!')</script>";
                }
            }
        }
    ?>
    <div class="signup-form">
        <form action="" method="post">
            <h2 class="pb-1">Create an Account</h2>
            <p class="hint-text">Sign up with your social media account or email address</p>
            <div class="social-btn text-center">
                <a href="#" class="btn btn-primary1 btn-lg"><i class="fa fa-facebook"></i> Facebook</a>
                <a href="#" class="btn btn-info btn-lg"><i class="fa fa-twitter"></i> Twitter</a>
                <a href="#" class="btn btn-danger btn-lg"><i class="fa fa-google"></i> Google</a>
            </div>
            <div class="or-seperator"><b>or</b></div>
            <div class="form-group">
                <input type="text" class="form-control input-lg" name="username" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="email" class="form-control input-lg" name="email" placeholder="Email Address" required="required">
            </div>
            <div class="form-group">
                <input type="number" class="form-control input-lg" name="phone" placeholder="Phone" required="required">
            </div>
            <div class="form-group">
                <input type="number" class="form-control input-lg" name="aadhar" placeholder="Aadhar" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control input-lg" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control input-lg" name="confirm_password" placeholder="Confirm Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success btn-lg btn-block signup-btn">Create Account</button>
            </div>
        </form>
        <div class="text-center">Already have an account? <a href="login.php">Login here</a></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>