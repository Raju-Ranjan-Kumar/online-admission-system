<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>otp varification</title>
    <style>
        *{padding:0; margin:0;}
        body {background:#eee;}
        .container{height:100vh; display:flex; justify-content:center; align-items:center; text-align:center;}
        .card {width:350px; padding:10px; border-radius:20px; background:#fff; border:none; height:400px; position:relative;}
        .heading{font-size:25px; padding:25px; text-transform:uppercase;}
        .mobile-text {color:#989696b8; font-size:20px;}
        .take-input{padding-top:45px;}
        .control {height:32px; width:200px; border-radius:7px;}
        .sub-btn{height:35px; width:100px; margin-top:35px; background-color:green; color:white; font-weight:bold; border-radius:12px;}
        .resend{padding-top:30px}
        .cursor{cursor:pointer; font-weight:bold; font-size:20px; color:red;}
    </style>
</head>
<body>
    <?php
        include('db_con.php');
        error_reporting(0);
        session_start();
        $verify = $_SESSION['EMAIL'];
        if($verify){  
            
        }else{
            header('location:login.php');
        }

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        use PHPMailer\PHPMailer\SMTP;

        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        function send_mail($email,$subject,$message){
            $mail = new PHPMailer(true);
            try {
                $mail->SMTPDebug = SMTP::DEBUG_OFF;                         
                $mail->isSMTP();                                           
                $mail->Host       = 'smtp.gmail.com';                      
                $mail->SMTPAuth   = true;                                  
                $mail->Username   = 'babansingh121484@gmail.com';           
                $mail->Password   = '6202975094';                          
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
                $mail->Port       = 465;                                    

                $mail->setFrom('babansingh121484@gmail.com', 'Raju Ranjan Kumar');   
                $mail->addAddress($email);                                         
                $mail->addReplyTo('babansingh121484@gmail.com', 'Controller');       

                $mail->isHTML(true);                                          
                $mail->Subject = $subject;
                $mail->Body   = $message;

                $mail->send();
                    return true;
            }catch(Exception $e) {
                return false;
            }
        }

        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $v_otp = $_POST['ve_otp'];

            $query = "SELECT * FROM register WHERE Email='$email' AND Otp='$v_otp'";
            $res = mysqli_query($con,$query);
            if(mysqli_num_rows($res)>0){
                mysqli_query($con,"UPDATE register SET Otp='' WHERE Email='$email'");
               
                echo "<script> alert('Registration Successful..!') </script>";
                send_mail($email,'Registration','Your registration process is sucessfull..!');

                echo '<script type="text/javascript"> location.replace("SeeYourData.php"); </script>';
            }else{
                echo "not_exist..!";
            }
        }
    ?>

    <div class="container">
        <form action="" method="post">
            <div class="card">
                <h5 class="heading">Otp Verification</h5>
                <span class="mobile-text">Enter the otp we just send on your <b class="">Email</b></span>
                <div class="take-input">
                    <input type="email" class="control" name="email" placeholder="Your email"><br><br>
                    <input type="number" class="control" name="ve_otp" placeholder="Enter otp">
                </div>
                <div class="">
                    <button type="submit" name="submit" class="sub-btn">Submit</button>
                </div>
                <div class="resend">
                    <span class="mobile-text">Don't receive the code?</span>
                    <span class="cursor">Resend</span>
                </div>
            </div>
        </form>
    </div>
</body>
</html>