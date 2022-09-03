<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- bootstarp5 css $ js -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- boxicons css $ js -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
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
                <a href="#" class="btn btn-primary1 btn-lg"><i class='bx bxl-facebook'></i> Facebook</a>
                <a href="#" class="btn btn-info btn-lg"><i class='bx bxl-twitter'></i> Twitter</a>
                <a href="#" class="btn btn-danger btn-lg"><i class='bx bxl-google'></i> Google</a>
            </div>
            <div class="or-seperator"><b>or</b></div>
            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping"><i class='bx bxs-user'></i></span>
                <input type="text" class="form-control" name="username" placeholder="Username" required="required">
            </div>
            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping"><i class='bx bxs-envelope'></i></span>
                <input type="email" class="form-control" name="email" placeholder="Email Address" required="required">
            </div>
            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping"><i class='bx bxs-phone'></i></span>
                <input type="number" class="form-control" name="phone" placeholder="Phone" required="required">
            </div>
            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping"><i class='bx bx-id-card'></i></span>
                <input type="number" class="form-control" name="aadhar" placeholder="Aadhar" required="required">
            </div>
            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping"><i class='bx bx-lock-alt'></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="input-group flex-nowrap mb-4">
                <span class="input-group-text" id="addon-wrapping"><i class='bx bxs-lock-alt'></i></span>
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
            </div>
            <div class="d-grid gap-2 col-12 mx-auto pb-2">
                <button class="btn btn-success signup-btn" type="submit" name="submit">Create Account</button>
            </div>
        </form>
        <div class="text-center">Already have an account? <a href="login.php"><b>Login here</b></a></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>