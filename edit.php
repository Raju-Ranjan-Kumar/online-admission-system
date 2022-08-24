<!DOCTYPE html>
<html class="supernova">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta property="og:description" content="Please click the link to complete this form." >
    <link rel="canonical" href="https://form.jotform.com/220822118029448" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1" />
    <meta name="HandheldFriendly" content="true" />
    <style type="text/css">@media print{.form-section{display:inline!important}.form-pagebreak{display:none!important}.form-section-closed{height:auto!important}.page-section{position:initial!important}}</style>
    <link type="text/css" rel="stylesheet" href="https://cdn01.jotfor.ms/themes/CSS/5e6b428acc8c4e222d1beb91.css?themeRevisionID=5eb3b4ae85bd2e1e2966db96"/>
    <title>Update Record</title>
    <style>
        .form-all{border-radius:22px;}
        .header-large .form-header {text-align:center; text-decoration-line: underline;}
    </style>
  </head>
<body>
    <?php
      session_start();
      include('db_con.php');
      if(isset($_SESSION['EMAIL'])){
              
      }else{
        header('location:login.php');
      }
      $id = $_GET['id'];
      $query = "SELECT * FROM registration WHERE Id='$id'";
      
      $result=mysqli_query($con,$query);
      $row=mysqli_fetch_assoc($result);
    ?>

    <?php
      if(isset($_POST['submit'])){
        $id=$_GET['id'];
        $name=$_POST['name'];
        $f_name=$_POST['father'];
        $email=$_POST['email'];
        $dob=$_POST['dob'];
        $gender=$_POST['gender'];
        $course=$_POST['course'];
        $adhar=$_POST['aadhar'];
        $pan=$_POST['pan'];
        $tenth=$_POST['tenth'];
        $twelve=$_POST['twelve'];
        $address=$_POST['address'];
    
        $changes = "UPDATE registration SET  Name='$name', Father_Name='$f_name', Email='$email', DOB='$dob', Gender='$gender', Course='$course', Aadhar='$adhar', Pan_card='$pan', Tenth_marksheet='$tenth', Twelve_marksheet='$twelve', Address='$address' WHERE Id='$id'";
        $update = mysqli_query($con,$changes);
        if ($update) {
          echo "<script> alert('Record updated sucessfully..!')</script> ";
          echo '<script type="text/javascript"> location.replace("SeeYourData.php"); </script>';
        }else{
          echo "<script> alert('Record not updated..!')</script> ";
        }
      } 
    ?>
    <form class="jotform-form" action="" method="post" name="" id="220822118029448" accept-charset="utf-8">
      <div role="main" class="form-all">
        <ul class="form-section page-section">
          <li id="cid_1" class="form-input-wide" data-type="control_head">
            <div class="form-header-group  header-large">
              <h1 id="header_1" class="form-header" data-component="header"> Update your record </h1>
            </div>
          </li>
          <li class="form-line form-line-column" data-type="control_fullname" id="id_4">
            <label class="form-label form-label-top form-label-extended form-label-auto" id="label_4" for="first_4"> Student Name </label>
            <div id="cid_4" class="form-input-wide" data-layout="half">
              <input type="text" id="name" name="name" class="form-textbox" autoComplete="section-input_4 given-name" size="10" value="<?php echo $row['Name'];?>" placeholder="Your Name" data-component="first" aria-labelledby="label_4 sublabel_4_first" />
            </div>
          </li>
          <li class="form-line form-line-column" data-type="control_fullname" id="id_4">
            <label class="form-label form-label-top form-label-extended form-label-auto" id="label_4" for="first_4"> Student father Name </label>
            <div id="cid_4" class="form-input-wide" data-layout="half">
              <input type="text" id="father" name="father" class="form-textbox" autoComplete="section-input_4 given-name" size="10" value="<?php echo $row['Father_Name'];?>" placeholder="Your father Name" data-component="first" aria-labelledby="label_4 sublabel_4_first" />
            </div>
          </li>
          <li class="form-line form-line-column form-col-1" data-type="control_email" id="id_6">
            <label class="form-label form-label-top" id="label_6" for="input_6"> Student E-mail </label>
            <div id="cid_6" class="form-input-wide" data-layout="half">
              <input type="email" id="email" name="email" class="form-textbox validate[Email]" style="width:310px" size="310" value="<?php echo $row['Email'];?>" placeholder="ex: myname@example.com" data-component="email" aria-labelledby="label_6 sublabel_input_6" />
            </div>
          </li>
          <li class="form-line form-line-column form-col-2" data-type="control_date" id="id_24">
            <label class="form-label form-label-top" id="label_24" for="input_24_full"> Birth Date </label>
            <div id="cid_24" class="form-input-wide" data-layout="half">
                <input type="date" id="dob" name="dob" data-type="mask-number" class="mask-phone-number form-textbox validate[Fill Mask]" value="<?php echo $row['DOB'];?>" style="width:310px" data-masked="true" aria-labelledby="label_24" />
            </div>
          </li>
          <li class="form-line form-line-column form-col-2" data-type="control_dropdown" id="id_3">
            <label class="form-label form-label-top" id="label_3" for="input_3"> Gender </label>
            <div id="cid_3" class="form-input-wide" data-layout="half">
              <input type="text" id="gender" name="gender" data-type="mask-number" class="mask-phone-number form-textbox validate[Fill Mask]" value="<?php echo $row['Gender'];?>" style="width:310px" data-masked="true" aria-labelledby="label_24" />
            </div>
          </li>
          <li class="form-line form-line-column form-col-2" data-type="control_course" id="id_3">
            <label class="form-label form-label-top" id="label_3" for="input_3"> Course </label>
            <div id="cid_3" class="form-input-wide" data-layout="half">
              <input type="text" id="course" name="course" class="mask-phone-number form-textbox validate[Fill Mask]" value="<?php echo $row['Course'];?>" style="width:310px" data-masked="true" aria-labelledby="label_24" />
            </div>
          </li>
          <li class="form-line form-line-column form-col-2" data-type="control_phone" id="id_27">
            <label class="form-label form-label-top" id="label_27" for="input_27_full"> Aadhar Card </label>
            <div id="cid_27" class="form-input-wide" data-layout="half">
              <input type="file" id="aadhar" name="aadhar" data-type="mask-number" class="mask-phone-number form-textbox validate[Fill Mask]" autoComplete="section-input_27 tel-national" style="width:310px" data-masked="true" data-component="phone" aria-labelledby="label_27" />
            </div>
          </li>
          <li class="form-line form-line-column form-col-2" data-type="control_pan" id="id_27">
            <label class="form-label form-label-top" id="label_27" for="input_27_full"> Pan Card </label>
            <div id="cid_27" class="form-input-wide" data-layout="half">
              <input type="file" id="pan" name="pan" class="mask-phone-number form-textbox validate[Fill Mask]" autoComplete="section-input_27 tel-national" style="width:310px" data-masked="true" data-component="phone" aria-labelledby="label_27" />
            </div>
          </li>
          <li class="form-line form-line-column form-col-2" id="id_27">
            <label class="form-label form-label-top" id="label_27" for="input_27_full"> 10th marksheet </label>
            <div id="cid_27" class="form-input-wide" data-layout="half">
              <input type="file" id="tenth" name="tenth" class="mask-phone-number form-textbox validate[Fill Mask]" autoComplete="section-input_27 tel-national" style="width:310px" data-masked="true" aria-labelledby="label_27" />
            </div>
          </li>
          <li class="form-line form-line-column form-col-2" id="id_27">
            <label class="form-label form-label-top" id="label_27" for="input_27_full"> 12th marksheet </label>
            <div id="cid_27" class="form-input-wide" data-layout="half">
              <input type="file" id="twelve" name="twelve" class="mask-phone-number form-textbox validate[Fill Mask]" autoComplete="section-input_27 tel-national" style="width:310px" data-masked="true" data-component="phone" aria-labelledby="label_27" />
            </div>
          </li>
          <li class="form-line" data-type="control_address" id="id_23">
            <label class="form-label form-label-top form-label-auto" id="label_23" for="input_23_addr_line1"> Address </label>
            <div id="cid_23" class="form-input-wide" data-layout="full">
                <input type="text" id="address" name="address" class="form-textbox form-address-line"autoComplete="section-input_23 address-line1" value="<?php echo $row['Address'];?>" data-component="address_line_1" aria-labelledby="label_23 sublabel_23_addr_line1" required="" />
            </div>
          </li>
          <li class="form-line form-line-column form-col-1" data-type="control_button" id="id_20">
            <div id="cid_20" class="form-input-wide" data-layout="full">
              <div data-align="left" class="form-buttons-wrapper form-buttons-left   jsTest-button-wrapperField">
                <button id="input_20" type="submit" class="form-submit-button submit-button jf-form-buttons jsTest-submitField" data-component="button" name="submit"> Update Data </button>
              </div>
            </div>
          </li>
          <li class="form-line form-line-column form-col-2" data-type="control_button" id="id_19">
            <div id="cid_19" class="form-input-wide" data-layout="full">
              <div data-align="right" class="form-buttons-wrapper form-buttons-right   jsTest-button-wrapperField">
                <button id="input_19" type="submit" class="form-submit-button submit-button jf-form-buttons jsTest-submitField" data-component="button"> Clear Fields </button>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </form>
  </body>
</html>