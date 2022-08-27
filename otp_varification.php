<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstarp 5.2.0 CSS $ JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <title>Otp varification</title>
    <style>
        
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

    <div class="container mt-5">
        <form action="" method="post">
            <div class="card">
                <h5 class="heading">Otp Verification</h5>
                <span class="mobile-text">Enter the otp we just send on your <b class="text-primary">Email</b></span><br>

                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">@</span>
                    <input type="email" name="email" class="form-control" placeholder="Useremail" aria-label="Useremail" aria-describedby="addon-wrapping">
                </div><br>

                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">$</span>
                    <input type="text" name="ve_otp" class="form-control" placeholder="Enter otp" aria-describedby="addon-wrapping">
                </div><br>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                <div class="resend">
                    <span class="mobile-text">Don't receive the code?</span>
                    <span class="cursor">Resend</span>
                </div>
            </div>
        </form>
    </div>
</body>
</html>