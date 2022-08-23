<!doctype html>
<html lang="en">
<head>
    <title>Login form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        include('db_con.php');
        error_reporting(0);
        session_start();

        if(isset($_POST['signin'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = "SELECT * FROM register WHERE Email='$email'";
            $res = mysqli_query($con, $query);
            if(mysqli_num_rows($res)>0){
                $row = mysqli_fetch_assoc($res);
                $veryfy = password_verify($password,$row['Password']);
                if($veryfy==1){
                    if($email == 'rajuranjansimari110@gmail.com'){
                        if(isset($_POST['rememberme'])){
                            setcookie('emailcookie',$email,time()+86400);
                            setcookie('passwordcookie',$password,time()+86400);
        
                            $_SESSION['EMAIL'] = $email;
                            header('location:dashboard.php');
                        }else{
                            $_SESSION['EMAIL'] = $email;
                            header('location:Admin/admin.php');
                        }
                    }else{
                        if(isset($_POST['rememberme'])){
                            setcookie('emailcookie',$email,time()+86400);
                            setcookie('passwordcookie',$password,time()+86400);

                            $_SESSION['EMAIL'] = $email;
                            header('location:dashboard.php');
                        }else{
                            $_SESSION['EMAIL'] = $email;
                            header('location:dashboard.php');
                        }
                    }     
                }else{
                    echo "<script> alert('please enter correct password..!')</script>";
                }
            }else{
                echo "<script> alert('please enter correct email..!')</script>";
            }
        }
    ?>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-1">
                    <h2 class="heading-section">Login form</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="img" style="background-image: url(images/bg-1.jpg);"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100"> <h3 class="mb-4">Sign In</h3> </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-google"></span></a>
                                    </p>
                                </div>
                            </div>
                            <form action="" class="signin-form" method="post">
                                <div class="form-group mt-3">
                                    <input type="text" name="email" class="form-control" value="<?php if(isset($_COOKIE['emailcookie'])) {echo $_COOKIE['emailcookie'];}?>" required>
                                    <label class="form-control-placeholder" for="email">Email</label>
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" name="password" class="form-control" value="<?php if(isset($_COOKIE['passwordcookie'])) {echo $_COOKIE['passwordcookie'];}?>" required>
                                    <label class="form-control-placeholder" for="password">Password</label>
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3" name="signin">Sign In</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                            <input type="checkbox" name="rememberme"> <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right"> <a href="send_mail_forgot.php">Forgot Password</a> </div>
                                </div>
                            </form>
                            <p class="text-center">Not a member? <a data-toggle="tab" href="signup.php">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>