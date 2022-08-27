<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <style>
        .alert-danger {color:white; background-color:blue; border-color:#f5c6cb;}
        .table td, .table th { padding: .60rem; vertical-align:top; border-top:1px solid #dee2e6;}
        @media(min-width:1200px){.container{max-width:1295px;}}
    </style>
    <title>Print Data</title>
</head>
<body>
    <div class="container">
        <h1 style="text-align:center;">Your Record</h1><hr>
        <div class="my-3">
            <a class="btn btn-success" href="dashboard.php" role="button">Dashboard</a>
            <a class="btn btn-danger" href="logout.php" role="button" style="float:right;">Logout</a>
        </div>
        <div class="text-center">
            <div class="alert alert-danger" role="alert"> <strong>See your Record</strong> </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Father Name</th>
                    <th>Email</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Course</th>
                    <th>Aadhar</th>
                    <th>Pan Card</th>
                    <th>10th Marksheet</th>
                    <th>12th Marksheet</th>
                    <th>Address</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <?php
                session_start();
                include('db_con.php');
                $email = $_SESSION['EMAIL'];
                if(isset($email)){
                
                }else{
                    header('location:login.php');
                }
                $query="select * from registration WHERE  Email='$email'";
                
                $result=mysqli_query($con,$query);
                $row=mysqli_fetch_assoc($result);
            ?>
            <tbody>
                <tr>
                    <td> <?php echo $row['Id'];?></td>
                    <td> <?php echo $row['Name'];?></td>
                    <td> <?php echo $row['Father_Name'];?></td>
                    <td> <?php echo $row['Email'];?></td>
                    <td> <?php echo $row['DOB'];?></td>
                    <td> <?php echo $row['Gender'];?></td>
                    <td> <?php echo $row['Course'];?></td>
                    <td> <?php echo "<img height=60px; weidth=60px; src='".$row['Aadhar']."'>"?></td>
                    <td> <?php echo "<img height=60px; weidth=60px; src='".$row['Pan_Card']."'>"?></td>
                    <td> <?php echo "<img height=60px; weidth=60px; src='".$row['Tenth_Marksheet']."'>"?></td>
                    <td> <?php echo "<img height=60px; weidth=60px; src='".$row['Twelve_Marksheet']."'>"?></td>
                    <td> <?php echo $row['Address'];?></td>
                    <td class="text-center"> <a href='edit.php?id=<?php echo $row['Id'];?>'>Update</a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
</body>
</html>