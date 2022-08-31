<?php
    include('../db_con.php');
    session_start();

    if(isset($_SESSION['Admin'])){

    }else{
        header('Location: ../index.html');
    }
?>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <img src="../images/su-logo.jpg" alt="logo" class="img-control img-fluid" id="su-logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"> <a class="nav-link" href="admin.php">Dashboard</a> </li>
                <li class="nav-item"> <a class="nav-link" href="">New Application</a> </li>
                <li class="nav-item"> <a class="nav-link" href="">Settings</a> </li>
                <li class="nav-item"> <a class="nav-link" href="">Profile</a> </li>
                <li class="nav-item"> <a class="nav-link" href="../logout.php">Logout</a> </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="text" placeholder="Search">
                <button class="btn btn-primary" type="button">Search</button>
            </form>
        </div>
    </div>
</nav>