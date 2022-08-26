<?php
   include('../db_con.php');
   session_start();
  
    //if the user only click on pay now button
    if(isset($_POST['amt']) && isset($_POST['userid'])){
        $id = $_POST['userid'];
        $amt = $_POST['amt'];
        $added_on = date('y-m-d h:i:s');

        $qry = "INSERT INTO `payment`(`Id`, `Amount`, `Payment_Status`, `Added_On`) VALUES ('$id','$amt','Pending','$added_on')";
        mysqli_query($con,$qry);

        $_SESSION['UID'] = mysqli_insert_id($con);
    }

    //if the user payment successful
    if(isset($_POST['payment_id']) && isset($_SESSION['UID'])){
        $payment_id = $_POST['payment_id'];
        $qry1 = "UPDATE `payment` SET `Payment_Status`='Complete', `Payment_Id`='$payment_id' WHERE Id='".$_SESSION['UID']."'";

        mysqli_query($con,$qry1);
    }
?>