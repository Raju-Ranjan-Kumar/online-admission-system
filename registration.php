<!DOCTYPE html>
<html class="supernova">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta property="og:description" content="Please click the link to complete this form." >
    <meta name="HandheldFriendly" content="true" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1"/>
    <link rel="canonical" href="https://form.jotform.com/220822118029448" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link type="text/css" rel="stylesheet" href="https://cdn01.jotfor.ms/themes/CSS/5e6b428acc8c4e222d1beb91.css?themeRevisionID=5eb3b4ae85bd2e1e2966db96"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>Registration Form</title>
  </head>
<body>
    <?php
      include('db_con.php');
      session_start();
      if(isset($_SESSION['EMAIL'])){
          
      }else{
        header('location:login.php');
      }
    ?>
    <?php
        error_reporting(0);
        if(isset($_POST['submit'])){
            $img = $_FILES['u-image'];
            $name = $_POST['name'];
            $f_name = $_POST['father'];
            $email = $_POST['email'];
            $dob = $_POST['dob'];
            $gender = $_POST['gender'];
            $course = $_POST['course'];
            $adhar = $_FILES['aadhar'];
            $pan = $_FILES['pan'];
            $tenth = $_FILES['tenth'];
            $twelve = $_FILES['twelve'];
            $address = $_POST['address'];
            
            if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM registration WHERE Email='$email'"))>0){
                echo "<script> alert('This email is already register..!')</script>";
            }else{
                $target_dir = "images/";
                $target_file1 = $target_dir . basename($adhar["name"]);
                $target_file2 = $target_dir . basename($pan["name"]);
                $target_file3 = $target_dir . basename($tenth["name"]);
                $target_file4 = $target_dir . basename($twelve["name"]);
                $target_file5 = $target_dir . basename($img["name"]);

                $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
                $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
                $imageFileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));
                $imageFileType4 = strtolower(pathinfo($target_file4,PATHINFO_EXTENSION));
                $imageFileType5 = strtolower(pathinfo($target_file5,PATHINFO_EXTENSION));

                $check1 = getimagesize($adhar["tmp_name"]);
                $check2 = getimagesize($pan["tmp_name"]);
                $check3 = getimagesize($tenth["tmp_name"]);
                $check4 = getimagesize($twelve["tmp_name"]);
                $check5 = getimagesize($img["tmp_name"]);

                if($check1 !== false || $check2 !== false || $check3 !== false || $check4 !== false || $check5 !== false) {
                    move_uploaded_file($adhar["tmp_name"], $target_file1);
                    move_uploaded_file($pan["tmp_name"], $target_file2);
                    move_uploaded_file($tenth["tmp_name"], $target_file3);
                    move_uploaded_file($twelve["tmp_name"], $target_file4);
                    move_uploaded_file($img["tmp_name"], $target_file5);

                    if($_SESSION['EMAIL']){
                      $email = $_SESSION['EMAIL'];
                      $query = "SELECT * FROM register WHERE Email='$email'";
                      $result = mysqli_query($con,$query);
                      $row = mysqli_fetch_assoc($result);
                      $id = $row['Id'];

                      $sql = "INSERT INTO registration(Id,Name,Father_Name,Email,DOB,Gender,Course,Aadhar,Pan_Card,Tenth_Marksheet,Twelve_Marksheet,Address,Image)  VALUES ('$id', '$name','$f_name','$email','$dob','$gender','$course','$target_file1','$target_file2','$target_file3','$target_file4','$address','$target_file5')";
                      $query = mysqli_query($con,$sql);
                      header('location:Payment/razorpay.php');
                    }
                }else{
                  die("This is not an image..!");
                }
            }
        }
    ?>  
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <div class="container-fluid">
          <img src="images/su-logo.jpg" alt="logo" class="img-control logo img-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
              <ul class="navbar-nav me-auto">
                  <li class="nav-item"> <a class="nav-link" href="dashboard.php">Dashboard</a> </li>
                  <li class="nav-item"> <a class="nav-link" href="SeeYourData.php">User-status</a> </li>
                  <li class="nav-item"> <a class="nav-link" href="id_card.php">Profile</a> </li>
                  <li class="nav-item"> <a class="nav-link" href="logout.php">Logout</a> </li>
              </ul>
              <form class="d-flex">
                  <input class="form-control me-2" type="text" placeholder="Search">
                  <button class="btn btn-primary" type="button">Search</button>
              </form>
          </div>
      </div>
    </nav>
  <form class="jotform-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="" id="220822118029448" enctype="multipart/form-data" onsubmit="return validate()">
    <div role="main" class="form-all">
      <ul class="form-section page-section">
        <li id="cid_1" class="form-input-wide" data-type="control_head">
          <div class="form-header-group  header1">
            <div class="header-text httal htvam">
              <h1 id="header_1" class="reg-heading" data-component="header"> Registration form </h1>
              <div id="subHeader_1" class="form-subHeader"> Fill out the form carefully</div>
            </div>
          </div>
        </li>
        <li class="form-line form-line-column form-col-2" id="id_27">
          <label class="form-label form-label-top" id="label_27" for="input_27_full"> Student Image </label>
          <div id="cid_27" class="form-input-wide" data-layout="half">
            <span class="form-sub-label-container" style="vertical-align:top">
              <input type="file" id="u-image" name="u-image" class="form-textbox validate[Fill Mask]" style="width:310px" data-masked="true" required="required"/>
              <span id="image" class="error"></span>
              <label class="form-sub-label is-empty" for="input_27_full" id="sublabel_27_masked" style="min-height:13px" aria-hidden="false">  </label>
            </span>
          </div>
        </li>
        <li class="form-line form-line-column form-col-2" data-type="control_fullname" id="id_4">
          <label class="form-label form-label-top form-label-extended form-label-auto" id="label_4" for="first_4"> Student Name </label>
          <div id="cid_4" class="form-input-wide" data-layout="half">
            <input type="text" id="name" name="name" class="form-textbox" size="10" placeholder="Your Name" required="required"/>
            <span id="u_name" class="error"></span>
          </div>
        </li>
        <li class="form-line" data-type="control_fullname" id="id_4">
          <label class="form-label form-label-top form-label-extended form-label-auto" id="label_4" for="first_4"> Student father Name </label>
          <div id="cid_4" class="form-input-wide" data-layout="full">
            <input type="text" id="father" name="father" class="form-textbox" size="10" placeholder="Your father Name" required="required"/>
            <span id="father_name" class="error"></span>
          </div>
        </li>
        <li class="form-line form-line-column form-col-1" data-type="control_email" id="id_6">
          <label class="form-label form-label-top" id="label_6" for="input_6"> Student E-mail </label>
          <div id="cid_6" class="form-input-wide" data-layout="half">
            <input type="email" id="email" name="email" class="form-textbox validate[Email]" style="width:310px" size="310" placeholder="ex: myname@example.com" required="required"/>
            <span id="u_email" class="error"></span>
          </div>
        </li>
        <li class="form-line form-line-column form-col-2" data-type="control_date" id="id_27">
          <label class="form-label form-label-top" id="label_27" for="input_27_full"> Birth Date </label>
          <div id="cid_27" class="form-input-wide" data-layout="half">
            <span class="form-sub-label-container" style="vertical-align:top">
              <input type="date" id="dob" name="dob" data-type="mask-number" class="mask-phone-number form-textbox validate[Fill Mask]" style="width:310px" data-masked="true" required="required"/>
              <span id="u_dob" class="error"></span>
              <label class="form-sub-label is-empty" for="input_27_full" id="sublabel_27_masked" style="min-height:13px" aria-hidden="false">  </label>
            </span>
          </div>
        </li>
        <li class="form-line form-line-column form-col-2" data-type="control_dropdown" id="id_3">
          <label class="form-label form-label-top" id="label_3" for="input_3"> Gender </label>
          <div id="cid_3" class="form-input-wide" data-layout="half">
            <select class="form-dropdown" id="gender" name="gender" style="width:310px" data-component="dropdown" required="required">
              <option value="">Select Gender</option>
              <option value="Male"> Male </option>
              <option value="Female"> Female </option>
              <option value="N/A"> N/A </option>
            </select>  <span id="u_gender" class="error"></span>
          </div>
        </li>
        <li class="form-line form-line-column form-col-2" data-type="control_dropdown" id="id_3">
          <label class="form-label form-label-top" id="label_3" for="input_3"> Course </label>
          <div id="cid_3" class="form-input-wide" data-layout="half">
            <select class="form-dropdown" id="course" name="course" style="width:310px" data-component="dropdown" required="required">
              <option value="">Select Course</option>
              <option value="BCA"> BCA </option>
              <option value="MCA"> MCA </option>
              <option value="BBA"> BBA </option>
              <option value="MBA"> MBA </option>
              <option value="B.Sc"> B.Sc </option>
              <option value="B.Sc"> BSc.Cs </option>
              <option value="M.Sc"> M.Sc </option>
              <option value="BA"> BA </option>
              <option value="MA"> MA </option>
              <option value="B.Com"> B.Com </option>
              <option value="M.Com"> M.Com </option>
              <option value="B.tech"> B.tech</option>
            </select>  <span id="u_course" class="error"></span>
          </div>
        </li>
        <li class="form-line form-line-column form-col-2" data-type="control_phone" id="id_27">
          <label class="form-label form-label-top" id="label_27" for="input_27_full"> Aadhar Card </label>
          <div id="cid_27" class="form-input-wide" data-layout="half">
            <span class="form-sub-label-container" style="vertical-align:top">
              <input type="file" id="aadhar" name="aadhar" data-type="mask-number" class="mask-phone-number form-textbox validate[Fill Mask]" style="width:310px" required="required"/>
              <span id="u_ad" class="error"></span>
              <label class="form-sub-label is-empty" for="input_27_full" id="sublabel_27_masked" style="min-height:13px" aria-hidden="false">  </label>
            </span>
          </div>
        </li>
        <li class="form-line form-line-column form-col-2" data-type="control_pan" id="id_27">
          <label class="form-label form-label-top" id="label_27" for="input_27_full"> Pan Card </label>
          <div id="cid_27" class="form-input-wide" data-layout="half">
            <span class="form-sub-label-container" style="vertical-align:top">
              <input type="file" id="pan" name="pan" class="mask-phone-number form-textbox validate[Fill Mask]" style="width:310px" required="required"/>
              <span id="u_pan" class="error"></span>
              <label class="form-sub-label is-empty" for="input_27_full" id="sublabel_27_masked" style="min-height:13px" aria-hidden="false"> </label>
            </span>
          </div>
        </li>
        <li class="form-line form-line-column form-col-2" id="id_27">
          <label class="form-label form-label-top" id="label_27" for="input_27_full"> 10th marksheet </label>
          <div id="cid_27" class="form-input-wide" data-layout="half">
            <span class="form-sub-label-container" style="vertical-align:top">
              <input type="file" id="tenth" name="tenth" class="mask-phone-number form-textbox validate[Fill Mask]" style="width:310px" required="required"/>
              <span id="u_tenth" class="error"></span>
              <label class="form-sub-label is-empty" for="input_27_full" id="sublabel_27_masked" style="min-height:13px" aria-hidden="false">  </label>
            </span>
          </div>
        </li>
        <li class="form-line form-line-column form-col-2" id="id_27">
          <label class="form-label form-label-top" id="label_27" for="input_27_full"> 12th marksheet </label>
          <div id="cid_27" class="form-input-wide" data-layout="half">
            <span class="form-sub-label-container" style="vertical-align:top">
              <input type="file" id="twelve" name="twelve" class="mask-phone-number form-textbox validate[Fill Mask]" style="width:310px" required="required"/>
              <span id="u_twelve" class="error"></span>
              <label class="form-sub-label is-empty" for="input_27_full" id="sublabel_27_masked" style="min-height:13px" aria-hidden="false">  </label>
            </span>
          </div>
        </li>
        <li class="form-line mb-2" data-type="control_address" id="id_23">
          <label class="form-label form-label-top form-label-auto" id="label_23" for="input_23_addr_line1"> Address </label>
          <div id="cid_23" class="form-input-wide" data-layout="full">
            <input type="text" id="address" name="address" class="form-textbox form-address-line" required="required"/>
            <span id="u_addr" class="error"></span>
          </div>
        </li>
        <li class="form-line form-line-column form-col-1" data-type="control_button" id="id_20">
          <div id="cid_20" class="form-input-wide" data-layout="full">
            <div data-align="left" class="form-buttons-wrapper form-buttons-left jsTest-button-wrapperField">
              <button id="input_20" type="submit" class="form-submit-button submit-button jf-form-buttons jsTest-submitField" name="submit"> Submit Data </button>
            </div>
          </div>
        </li>
        <li class="form-line form-line-column form-col-2" data-type="control_button" id="id_19">
          <div id="cid_19" class="form-input-wide" data-layout="full">
            <div data-align="right" class="form-buttons-wrapper form-buttons-right jsTest-button-wrapperField">
              <button id="input_19" type="submit" class="form-submit-button submit-button jf-form-buttons jsTest-submitField"> Clear Fields </button>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </form>
  <footer class="text-center text-lg-start bg-light text-muted foter">
      <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
          <div class="me-5 d-none d-lg-block social-head">
              <span>© 2022 by Techno boy Raju created by <a href="">Raju Ranjan</a></span>
          </div>
          <div>
              <a href="https://www.facebook.com/subhartiuni/"><i class='bx bxl-facebook-circle s-icon'></i></a>
              <a href="https://www.linkedin.com/school/subhartiuni/?originalSubdomain=in"><i class='bx bxl-linkedin s-icon'></i></a>
              <a href="https://www.instagram.com/subhartiuni.official/?hl=en"><i class='bx bxl-instagram s-icon'></i></a>
              <a href="https://twitter.com/subhartiofficia?lang=en"><i class='bx bxl-twitter s-icon'></i></a>
          </div>
      </section>
  </footer>
    <script>
        function validate(){
            let img = document.getElementById("u-image");
            let name = document.getElementById("name");
            let fname = document.getElementById("father");
            let email = document.getElementById("email");
            let dob = document.getElementById("dob");
            let gender = document.getElementById("gender");
            let course = document.getElementById("course");
            let aadhar = document.getElementById("aadhar");
            let pan = document.getElementById("pan");
            let tenth = document.getElementById("tenth");
            let twelve = document.getElementById("twelve");
            let add = document.getElementById("address");
            let flag=1;
            
            //image
            if(img.value==""){
              document.getElementById("image").innerHTML="*Please upload your image!";
              flag= 0;
            }else{
              document.getElementById("image").innerHTML="";
              flag=1;
            }
            //Name section
            if(name.value==""){
              document.getElementById("u_name").innerHTML="*Please enter your Name!";
              flag= 0;
            }else if (name.value.length<3) {
              document.getElementById("u_name").innerHTML="*Student Name is required minimum 3 charactor";
              flag=0;
            }else{
              document.getElementById("u_name").innerHTML="";
              flag=1;
            }
            //Father Name section
            if(fname.value==""){
              document.getElementById("father_name").innerHTML="*Please enter your father Name!";
              flag= 0;
            }else if (fname.value.length<3) {
              document.getElementById("father_name").innerHTML="*Father Name is required minimum 3 charactor";
              flag=0;
            }else{
              document.getElementById("father_name").innerHTML="";
              flag=1;
            }
            //Email section
            let mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            if(email.value==""){
              document.getElementById("u_email").innerHTML="*Please enter your email Address!";
            }else if(email.value.match(mailformat)){
              return true;
            }else{
              document.getElementById("u_email").innerHTML="*Invalid email address Position!";
            }
            //dob section
            if(dob.value==""){
              document.getElementById("u_dob").innerHTML="*Please enter your DOB!";
              flag= 0;
            }else{
              document.getElementById("u_dob").innerHTML="";
              flag=1;
            }
            //Gender section
            if(gender.value==""){
              document.getElementById("u_gender").innerHTML="*Please select your Gender!";
              flag=0;
            }else{
              document.getElementById("u_gender").innerHTML="";
              flag=1;
            }
            //Course section
            if(course.value==""){
              document.getElementById("u_course").innerHTML="*Please select your Course!";
              flag= 0;
            }else{
              document.getElementById("u_course").innerHTML="";
              flag=1;
            }
            //Aadhar section
            if(aadhar.value==""){
              document.getElementById("u_ad").innerHTML="*Please upload your aadhar card!";
              flag=0;
            }else{
              document.getElementById("u_ad").innerHTML="";
              flag=1;
            }
            //Pin section
            if(pan.value==""){
              document.getElementById("u_pan").innerHTML="*Please upload your pan card!";
              flag=0;
            }else{
              document.getElementById("u_pan").innerHTML="";
              flag=1;
            }
            //10th marksheet section
            if(tenth.value==""){
              document.getElementById("u_tenth").innerHTML="*Please upload your 10th marksheet!";
              flag=0;
            }else{
              document.getElementById("u_tenth").innerHTML="";
              flag=1;
            }
            //12th marksheet section
            if(twelve.value==""){
              document.getElementById("u_twelve").innerHTML="*Please upload your 12th marksheet!";
              flag=0;
            }else{
              document.getElementById("u_twelve").innerHTML="";
              flag=1;
            }
            //Address section
            if(add.value==""){
              document.getElementById("u_addr").innerHTML="*Please enter your Address!";
              flag=0;
            }else{
              document.getElementById("u_addr").innerHTML="";
              flag=1;
            }

            if(flag) { return true;}
            else{ return false;}
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
  </body>
</html>