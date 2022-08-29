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

                    <div class="row row-cols-1 row-cols-md-3 g-4 mt-1">
                        <div class="col">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between">
                                    <h5 class="align-self-center mb-0 fs card-title fw-bold"> <?php echo totalStudent($con); ?> </h5>
                                    <i id="card-icon" class='bx bxs-user-plus i-size'></i>
                                </div>
                                <p class="card-text text-center p-3 fw-bold"> Total Application </p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between">
                                    <h5 class="align-self-center mb-0 fs card-title fw-bold"> <?php echo approved($con);  ?> </h5>
                                    <i style="color:green; font-size:38px; padding-right:12px;" class='bx bxs-user-check'></i>
                                </div>
                                <p class="card-text text-center p-3 fw-bold"> Approved Application </p>
                            </div> 
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between">
                                    <h5 class="align-self-center mb-0 fs card-title fw-bold"> <?php echo waiting($con); ?> </h5>
                                    <i style="color:yellow; font-size:38px; padding-right:12px;" class='bx bxs-user-minus'></i>
                                </div>
                                <p class="card-text text-center p-3 fw-bold"> Waitingl Application </p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between">
                                    <h5 class="align-self-center mb-0 fs card-title fw-bold"> <?php echo reject($con); ?> </h5>
                                    <i style="color:red; font-size:38px; padding-right:12px;" class='bx bxs-user-x'></i>
                                </div>
                                <p class="card-text text-center p-3 fw-bold"> Reject Application </p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between">
                                    <h5 class="align-self-center mb-0 fs card-title fw-bold"> 0 </h5>
                                    <i id="card-icon" class='bx bxs-user-detail i-size'></i>
                                </div>
                                <p class="card-text text-center p-3 fw-bold"> User Details </p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between">
                                    <h5 class="align-self-center mb-0 fs card-title fw-bold"> 0 </h5>
                                    <i id="card-icon" class='bx bxs-user-voice i-size'></i>
                                </div>
                                <p class="card-text text-center p-3 fw-bold"> User Action </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include('footer.php'); ?>
    </body>
</html>
