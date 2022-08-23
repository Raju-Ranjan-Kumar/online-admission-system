<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>All Applications</title>
        <!-- Font Awesome icons (free version)-->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet"/>
    </head>
<body>
    <?php 
        session_start();
        include('../db_con.php');
        include('header.php'); 
    ?>
    <section>
        <div class="containar">
            <?php include('sidebar.php'); ?>

            <div class="admin-home">
                <div class="container">
                    <h1 style="text-align:center;"class="heading1">All Applications</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Father_Name</th>
                                <th>Email</th>
                                <th>DOB</th>
                                <th>Gender</th>
                                <th>Course</th>
                                <th>Address</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(!isset($_SESSION['EMAIL']))
                                header('location:login.php');
                                
                                //Total Applications which is approved $ not approved $ reject
                                $query = "SELECT * FROM registration WHERE isApproved=0 || isApproved=1 || isApproved=-1";
                                $result = mysqli_query($con,$query);
                                while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td> <?php echo $row['Id'];?></td>
                                <td> <?php echo $row['Name'];?></td>
                                <td> <?php echo $row['Father_Name'];?></td>
                                <td> <?php echo $row['Email'];?></td>
                                <td> <?php echo $row['DOB'];?></td>
                                <td> <?php echo $row['Gender'];?></td>
                                <td> <?php echo $row['Course'];?></td>
                                <td> <?php echo $row['Address'];?></td>
                                <?php if($row['isApproved']==1){ ?>
                                    <td> <a href='view.php?id=<?php echo $row['Id'];?>'><i class='bx bxs-happy'></i></a></td>
                                <?php }elseif($row['isApproved']==-1){?>
                                    <td> <a href='view.php?id=<?php echo $row['Id'];?>'><i class='bx bxs-angry'></i></a></td>
                                <?php }else{ ?>
                                    <td> <a href='view.php?id=<?php echo $row['Id'];?>'><i class='bx bxs-sad'></i></a></td>
                                <?php }
                                ?>
                            </tr>
                            <?php
                               }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>
</html>