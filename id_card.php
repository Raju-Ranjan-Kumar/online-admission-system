<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Id card</title>
    <style>
        .container{width:35%; background-color:aliceblue; margin:auto; border-radius:10px;}
        .heading{width:100%; background-size:cover; border-radius:5px;}
        .container2{display:flex; padding-left:20px;}
        .takeing-arg{width:65%; padding:17px 0px;}
        input{height:26px; border:none; outline:none; border-radius:10px;}
        .image{width:35%; padding-top:18px; padding-right:9px !important;}
        .photo{height:150px; width:140px;}
        .location{width:100%; background-color:cornflowerblue; border-bottom-left-radius:10px; border-bottom-right-radius:10px; line-height:6vh; text-align:center;}
        .sign{width:140px; padding-left:7px;}
    </style>
</head>
<body>
    <?php
        session_start();
        include('db_con.php');
        $verify = $_SESSION['EMAIL'];
        if(isset($verify)){
                
        }else{
            header('location:login.php');
        }
        
        $query = "SELECT * FROM registration WHERE Email='$verify'";
        
        $result=mysqli_query($con,$query);
        $row=mysqli_fetch_assoc($result);
    ?>

    <div class="container">
        <div>
            <img class="heading " src="images/clg-logo.jpg" alt="college logo">
        </div>
        <div class="container2">
            <div class="takeing-arg">
               <b>Id:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="number" name="id" value="<?php echo $row['Id'];?>"><br><br>
               <b>Name:</b> &nbsp; <input type="text" name="name" value="<?php echo $row['Name'];?>"><br><br>
               <b>F-Name:</b> &nbsp; <input type="text" name="f_name" value="<?php echo $row['Father_Name'];?>"><br><br>
               <b>Course:</b> <input type="text" name="course" value="<?php echo $row['Course'];?>"><br><br>
               <b>DOB:</b> &nbsp;&nbsp;&nbsp;&nbsp; <input type="date" name="dob" value="<?php echo $row['DOB'];?>"><br><br>
               <b>Gender:</b> <input type="text" name="gender" value="<?php echo $row['Gender'];?>"><br><br>
               <b>Address:</b> <input type="text" name="address" value="<?php echo $row['Address'];?>">
            </div>
            <div class="image">
                <?php echo "<img height=115px; weidth=115px; src='".$row['Image']."'>"?><br><br>
                <input type="text" placeholder="Your signature" class="sign">
            </div>
        </div>
        <div class="location">
            <p>Subhartipuram, NH-58, Delhi-Haridwar Bypass Road,Meerut-250005</p>
        </div>
    </div>
</body>
</html>