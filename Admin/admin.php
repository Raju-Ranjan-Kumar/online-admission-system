<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <title>Dashboard</title>
    </head>
    <body>
        <?php include('header.php'); ?>
        <?php include('../db_con.php'); ?>

        <section>
            <div class="containar">
                <?php include('sidebar.php'); ?>
                <div class="admin-home">
                    <?php
                        //Total application count.
                        function totalStudent($con){
                            $totalq = "SELECT count(*) AS totalStudent FROM registration";
                            $result = mysqli_query($con,$totalq);
                            $data = $result->fetch_object();
                            return $data->totalStudent;
                        }

                        //Wating application count.
                        function waiting($con){
                            $totalq = "SELECT count(*) AS wating FROM registration WHERE isApproved = 0";
                            $result = mysqli_query($con,$totalq);
                            $data = $result->fetch_object();
                            return $data->wating;
                        }

                        //Approved application count.
                        function approved($con){
                            $totalq = "SELECT count(*) AS approved FROM registration WHERE isApproved = 1";
                            $result = mysqli_query($con,$totalq);
                            $data = $result->fetch_object();
                            return $data->approved;
                        }

                        //Reject application count.
                        function reject($con){
                            $totalq = "SELECT count(*) AS reject FROM registration WHERE isApproved = -1";
                            $result = mysqli_query($con,$totalq);
                            $data = $result->fetch_object();
                            return $data->reject;
                        }
                    ?>

                    <div class="admin-info">
                        <div  class="card">
                            <div class="data">
                                <h1 id="data-count"> <?php echo totalStudent($con); ?> </h1>
                                <i id="card-icon" class='bx bxs-user-plus'></i>
                            </div>
                            <p class="user-info">Total Application</p>
                        </div>

                        <div  class="card">
                            <div class="data">
                                <h1 id="data-count" ><?php echo approved($con);  ?></h1>
                                <i style="color:green; font-size:38px;" class='bx bxs-user-check'></i>
                            </div>
                            <p class="user-info"> Approved Application </p>
                        </div>

                        <div  class="card">
                            <div class="data">
                                <h1 id="data-count"><?php echo waiting($con); ?></h1>
                                <i style="color:yellow; font-size:38px;" class='bx bxs-user-minus'></i>
                            </div>
                            <p class="user-info">Wating Application</p>
                        </div>

                        <div  class="card">
                            <div class="data">
                                <h1 id="data-count"><?php echo reject($con); ?></h1>
                                <i style="color:red; font-size:38px;" class='bx bxs-user-x'></i>
                            </div>
                            <p class="user-info">Reject Application</p>
                        </div>

                        <div  class="card">
                            <div class="data">
                                <h1 id="data-count" >0</h1> 
                                <i id="card-icon" class='bx bxs-user-detail'></i>
                            </div>
                            <p class="user-info">User Deatils</p>
                        </div>

                        <div  class="card">
                            <div class="data">
                                <h1 id="data-count">0</h1>
                                <i id="card-icon" class='bx bxs-user-voice'></i>
                            </div>
                            <p class="user-info">User Action</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include('footer.php'); ?>
    </body>
</html>
