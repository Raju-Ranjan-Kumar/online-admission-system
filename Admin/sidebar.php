<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 nav-home">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li>
                <a href="admin.php" data-bs-toggle="collapse" class="nav-link nav-color px-0 align-middle mt-2">
                    <i class='bx bxs-dashboard'></i> <span class="ms-1 d-none d-sm-inline fw-bold">Dashboard</span> 
                </a>
                <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="#" class="nav-link nav-color px-0"> <i class='bx bx-bar-chart-alt'></i> <span class="d-none d-sm-inline">Graph</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="all_student.php" class="nav-link nav-color px-0 align-middle">
                    <i class='bx bxs-user-plus'> </i> <span class="ms-1 d-none d-sm-inline">All Applications</span>
                </a>
            </li>
            <li>
                <a href="reject.php" class="nav-link nav-color px-0 align-middle">
                    <i class='bx bxs-user-x'> </i> <span class="ms-1 d-none d-sm-inline">Reject Applications</span>
                </a>
            </li>
            <li>
                <a href="waiting.php" class="nav-link nav-color px-0 align-middle">
                    <i class='bx bxs-user-minus'> </i> <span class="ms-1 d-none d-sm-inline">Waiting Applications</span> 
                </a>
            </li>
            <li>
                <a href="approved.php" class="nav-link nav-color px-0 align-middle">
                    <i class='bx bxs-user-check'> </i> <span class="ms-1 d-none d-sm-inline">Approved Applications</span> 
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown pb-4">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../images/su-logo.jpg" alt="Your image" width="35" height="35" class="rounded-circle">
                <span class="d-none d-sm-inline mx-1 ms-3">Account</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="#">New Application...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
        </div>
    </div>
</div>