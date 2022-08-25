<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <!-- this script is use for razorpay payment gatway integration -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <title>Payment</title>
    <style>
        body{background-color:aliceblue;}
    </style>
</head>
<body>
    <?php
        include('../db_con.php');
        session_start();
        if($_SESSION['EMAIL']){
            $email = $_SESSION['EMAIL'];
            $query = "SELECT * FROM register WHERE Email='$email'";
            $result = mysqli_query($con,$query);
            $row = mysqli_fetch_assoc($result);
            $id = $row['Id'];
        }
    ?>
    <div class="container ">
        <h5 class="text-center mt-5 mb-3">Complete Your Payment</h5>
        <form class="col-lg-2 m-auto">
            <div class="mb-3">
                <input type="text" class="form-control" id="userid" name="userid" value="<?php echo $row['Id'];?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="amt" name="gtotalVal" value="100">
            </div>
            <div class="mb-3">
                <input type="button" class="btn btn-primary form-control" id="btn" name="btn" value="Pay Now" onclick="pay_now()">
            </div>
        </form>
    </div>
    <script>
        function pay_now(){
            var amt = jQuery('#amt').val();
            var userid = jQuery('#userid').val();

            jQuery.ajax({
                type:'post',
                url:'payment_process.php',
                data:"&amt="+amt+"&userid="+userid,
                success:function(result){
                    var options = {
                        "key": "rzp_test_0OEAcUbxNMSwai",
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "Swami Vivekananda Subharti University",
                        "description": "Pay only INR 100 for registration fee",
                        "image": "../images/su-logo.jpg",
                        "handler": function (response) {
                            jQuery.ajax({
                                type:'post',
                                url:'payment_process.php',
                                data:"payment_id="+response.razorpay_payment_id,
                                success:function(result){
                                    window.location.href="../dashboard.php";
                                }
                            });
                        }
                    };
                    var pay = new Razorpay(options);
                    pay.open();
                }
            });
        }
    </script>
</body>
</html>