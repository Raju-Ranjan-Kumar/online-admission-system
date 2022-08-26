<?php
    session_start();
    $con = mysqli_connect("localhost","root","","college_project");
  
    //if the user only click on pay now button
    if(isset($_POST['amt']) && isset($_POST['userid'])){
        $id = $_POST['userid'];
        $amt = $_POST['amt'];
        $added_on = date('y-m-d h:i:s');

        $qry = "INSERT INTO `payment`(`Id`, `Amount, `Payment_Status`, `Added_On`) VALUES ('$id','$amt','inActive','$added_on')";

        mysqli_query($con,$qry);
    }

    //if the user payment successful
    if(isset($_POST['payment_id']) && isset($_POST['userid'])){
        $payment_id = $_POST['payment_id'];

        $qry1 = "UPDATE `payment` SET `Payment_Status`='Complete', `Payment_Id`='$payment_id' WHERE Id='".$_POST['userid']."'";

        mysqli_query($con,$qry1);
    }
?>