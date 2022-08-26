<?php
  date_default_timezone_set('Asia/Kolkata');
  $servername="localhost";
  $username="root";
  $password="";
  $database="college_project";
  $con=mysqli_connect($servername,$username,$password,$database);

  // if($con){
  //   echo "Connection was successful <br>";
  // }else{
  //   die("Sorry we faild to connect because:". mysqli_connect_error());
  // }
?>