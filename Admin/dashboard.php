<div>
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
            <div class="card card-1">
                <div class="card-body d-flex justify-content-between">
                    <h5 class="align-self-center mb-0 fs card-title fw-bold"> <?php echo totalStudent($con); ?> </h5>
                    <i id="card-icon" class='bx bxs-user-plus i-size'></i>
                </div>
                <p class="card-text text-center p-3 fw-bold"> Total Application </p>
            </div>
        </div>
        <div class="col">
            <div class="card card-2">
                <div class="card-body d-flex justify-content-between">
                    <h5 class="align-self-center mb-0 fs card-title fw-bold"> <?php echo approved($con);  ?> </h5>
                    <i style="color:green; font-size:38px; padding-right:12px;" class='bx bxs-user-check'></i>
                </div>
                <p class="card-text text-center p-3 fw-bold"> Approved Application </p>
            </div> 
        </div>
        <div class="col">
            <div class="card card-3">
                <div class="card-body d-flex justify-content-between">
                    <h5 class="align-self-center mb-0 fs card-title fw-bold"> <?php echo waiting($con); ?> </h5>
                    <i style="color:yellow; font-size:38px; padding-right:12px;" class='bx bxs-user-minus'></i>
                </div>
                <p class="card-text text-center p-3 fw-bold"> Waitingl Application </p>
            </div>
        </div>
        <div class="col">
            <div class="card card-4">
                <div class="card-body d-flex justify-content-between">
                    <h5 class="align-self-center mb-0 fs card-title fw-bold"> <?php echo reject($con); ?> </h5>
                    <i style="color:red; font-size:38px; padding-right:12px;" class='bx bxs-user-x'></i>
                </div>
                <p class="card-text text-center p-3 fw-bold"> Reject Application </p>
            </div>
        </div>
        <div class="col">
            <div class="card card-5">
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