<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Id card</title>
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

    <div class="container1">
        <div>
            <img class="clg-heading" src="images/clg-logo.jpg" alt="college logo">
        </div>
        <div class="container2">
            <div class="takeing-arg">
               <b>Id:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="inpt" type="number" name="id" value="<?php echo $row['Id'];?>"><br><br>
               <b>Name:</b> &nbsp; <input class="inpt" type="text" name="name" value="<?php echo $row['Name'];?>"><br><br>
               <b>F-Name:</b> &nbsp;  <input class="inpt" type="text" name="f_name" value="<?php echo $row['Father_Name'];?>"><br><br>
               <b>Course:</b>  <input class="inpt" type="text" name="course" value="<?php echo $row['Course'];?>"><br><br>
               <b>DOB:</b> &nbsp;&nbsp;&nbsp;&nbsp;  <input class="inpt" type="date" name="dob" value="<?php echo $row['DOB'];?>"><br><br>
               <b>Gender:</b>  <input class="inpt" type="text" name="gender" value="<?php echo $row['Gender'];?>"><br><br>
               <b>Address:</b>  <input class="inpt" type="text" name="address" value="<?php echo $row['Address'];?>">
            </div>
            <div class="image">
                <?php echo "<img height=115px; weidth=115px; src='".$row['Image']."'>"?><br><br>
                 <input class="inpt" type="text" placeholder="Your signature" class="sign">
            </div>
        </div>
        <div class="location">
            <p>Subhartipuram, NH-58, Delhi-Haridwar Bypass Road,Meerut-250005</p>
        </div>
    </div>
</body>
</html>