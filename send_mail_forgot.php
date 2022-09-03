<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Recover password</title>
</head>
<body>
    <?php
        include('db_con.php');
        error_reporting(0);

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
                $mail->Password   = 'Raju@6202975094';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;

                $mail->setFrom('babansingh121484@gmail.com', 'Raju Ranjan Kumar');
                $mail->addAddress($email);
                $mail->addReplyTo('babansingh121484@gmail.com', 'Controller');

                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body    = $message;

                $mail->send();
                    return true;
            }catch(Exception $e) {
                    return false;
            }
        }

        if(isset($_POST['submit'])){
            $email = $_POST['email'];

            $token = bin2hex(random_bytes(15));
            $query = "SELECT * FROM register WHERE Email='$email'";
            $res = mysqli_query($con,$query);
            $num = mysqli_num_rows($res);

            if($num){
                $userdata = mysqli_fetch_assoc($res);
                $name = $userdata['Name'];
                $token = $userdata['Token'];

                send_mail($email,'Password Reset',"Hii, $name. Click here to forgot your password http://localhost/php_file/college_project/forgot_password.php?Token=$token");

                echo "<script> alert('Please check your email to forgot password!')</script>";
            }else{
                echo "<script> alert('No email found!')</script>";
            }
        }
    ?>
    <div class="signup-form">
        <form action="" method="post">
            <h2>Recover your passwword</h2>
            <div class="or-seperator"><b>or</b></div>
            <div class="form-group">
                <input type="email" class="form-control input-lg" name="email" placeholder="Email Address" required="required">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success btn-lg btn-block signup-btn">Send Mail</button>
            </div>
            <div class="text-center">If you don't want to forgot your password? <a href="login.php">Login here</a></div>
        </form>
    </div>
</body>
</html>