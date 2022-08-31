<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="HandheldFriendly" content="true" />
    <!-- Jotform css-->
    <link rel="canonical" href="https://form.jotform.com/220822118029448" />
    <link type="text/css" rel="stylesheet" href="https://cdn01.jotfor.ms/themes/CSS/5e6b428acc8c4e222d1beb91.css?themeRevisionID=5eb3b4ae85bd2e1e2966db96"/>
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
    <title>Student View Details</title>
    <style>
        .form-all{border-radius:20px; margin: 20px auto;}
        .header-large .form-header {text-align:center; text-decoration-line: underline;}
        div.header-large {margin:2 -12px; padding:1.5em 55px;}
        .form-line {padding: 5px 10px; margin: 2px 3px;}
        @media print{
            .form-section{display:inline!important}
            .form-pagebreak{display:none!important}
            .form-section-closed{height:auto!important}
            .page-section{position:initial!important}
        }
    </style>
</head>
<body>
    <?php include('header.php'); ?>
    <section>
        <div class="containar">
            <div class="admin-home">
                <?php
                    // Get user details base on id.
                    $id = $_GET['id'];
                    $query = "SELECT * FROM registration WHERE Id='$id'";
                    $result = mysqli_query($con,$query);
                    $row = mysqli_fetch_assoc($result);
                    
                    // Approvrd the applicication based on id.
                    if(isset($_POST['approve'])){
                        $userid = $_GET['id'];
                        $q = "UPDATE registration SET isApproved=1 WHERE Id='$userid'";
                        $res = mysqli_query($con,$q);
                        if($res){
                            header('location:approved.php'); 
                        }
                        else{
                            alert("Something went wrong. Please try again");
                        }
                    }
                    // Reject the applicication based on id.
                    if(isset($_POST['reject'])){
                        $userid = $_GET['id'];
                        $q = "UPDATE registration SET isApproved=-1 WHERE Id='$userid'";
                        $res = mysqli_query($con,$q);
                        if($res){
                            header('location:reject.php'); 
                        }
                        else{
                            alert("Something went wrong. Please try again");
                        }
                    }
                ?>
                <form class="jotform-form" action="" method="post" name="" id="220822118029448" accept-charset="utf-8">
                    <div role="main" class="form-all">
                        <ul class="form-section page-section">
                            <li id="cid_1" class="form-input-wide" data-type="control_head">
                                <div class="form-header-group  header-large">
                                    <h1 id="header_1" class="form-header" data-component="header"> Student Details </h1>
                                </div>
                            </li>
                            <li class="form-line form-line-column form-col-2" data-type="control_phone" id="id_27">
                                <label class="form-label form-label-top" id="label_27" for="input_27_full"> Student Image </label>
                                <div id="cid_27" class="form-input-wide" data-layout="half">
                                    <img height=100px; weidth=100px; alt="image" src='../<?php echo $row['Image'] ?>' >
                                </div>
                            </li>
                            <li class="form-line form-line-column form-col-1" data-type="control_fullname" id="id_4">
                                <label class="form-label form-label-top" id="label_4" for="input_6"> Student Name </label>
                                <div id="cid_4" class="form-input-wide" data-layout="half">
                                    <input type="text" id="name" name="name" class="form-textbox validate[Name]" style="width:310px" size="310" value="<?php echo $row['Name'];?>" aria-labelledby="label_4 sublabel_4_first" />
                                </div>
                            </li>
                            <li class="form-line form-line-column form-col-1" data-type="control_fullname" id="id_6">
                                <label class="form-label form-label-top" id="label_6" for="input_6"> Student father Name </label>
                                <div id="cid_6" class="form-input-wide" data-layout="half">
                                    <input type="text" id="father" name="father" class="form-textbox validate[Name]" style="width:310px" size="310" value="<?php echo $row['Father_Name'];?>" aria-labelledby="label_4 sublabel_4_first" />
                                </div>
                            </li>
                            <li class="form-line form-line-column form-col-1" data-type="control_email" id="id_6">
                                <label class="form-label form-label-top" id="label_6" for="input_6"> Student E-mail </label>
                                <div id="cid_6" class="form-input-wide" data-layout="half">
                                    <input type="email" id="email" name="email" class="form-textbox validate[Email]" style="width:310px" size="310" value="<?php echo $row['Email'];?>" aria-labelledby="label_6 sublabel_input_6" />
                                </div>
                            </li>
                            <li class="form-line form-line-column form-col-1" data-type="control_gender" id="id_6">
                                <label class="form-label form-label-top" id="label_6" for="input_6"> Gender </label>
                                <div id="cid_6" class="form-input-wide" data-layout="half">
                                    <input type="text" id="gender" name="gender" class="form-textbox validate[Gender]" style="width:310px" size="310" value="<?php echo $row['Gender'];?>" aria-labelledby="label_6 sublabel_input_6" />
                                </div>
                            </li>
                            <li class="form-line form-line-column form-col-1" data-type="control_course" id="id_6">
                                <label class="form-label form-label-top" id="label_6" for="input_6"> Course </label>
                                <div id="cid_6" class="form-input-wide" data-layout="half">
                                    <input type="text" id="course" name="course" class="form-textbox validate[Course]" style="width:310px" size="310" value="<?php echo $row['Course'];?>" aria-labelledby="label_6 sublabel_input_6" />
                                </div>
                            </li>
                            <li class="form-line" data-type="control_address" id="id_23">
                                <label class="form-label form-label-top form-label-auto" id="label_23" for="input_23_addr_line1"> Address </label>
                                <div id="cid_23" class="form-input-wide" data-layout="full">
                                    <input type="text" id="address" name="address" class="form-textbox form-address-line" value="<?php echo $row['Address'];?>" data-component="address_line_1"/>
                                </div>
                            </li>
                            <li class="form-line form-line-column form-col-2" data-type="control_phone" id="id_27">
                                <label class="form-label form-label-top" id="label_27" for="input_27_full"> Aadhar Card </label>
                                <div id="cid_27" class="form-input-wide" data-layout="half">
                                    <img height=100px; weidth=100px; alt="image" src='../<?php echo $row["Aadhar"] ?>' >
                                </div>
                            </li>
                            <li class="form-line form-line-column form-col-2" data-type="control_pan" id="id_27">
                                <label class="form-label form-label-top" id="label_27" for="input_27_full"> Pan Card </label>
                                <div id="cid_27" class="form-input-wide" data-layout="half">
                                    <img height=100px; weidth=100px; alt="image" src='../<?php echo $row['Pan_Card'] ?>' >
                                </div>
                            </li>
                            <li class="form-line form-line-column form-col-2" id="id_27">
                                <label class="form-label form-label-top" id="label_27" for="input_27_full"> 10th marksheet </label>
                                <div id="cid_27" class="form-input-wide" data-layout="half">
                                    <img height=100px; weidth=100px; alt="image" src='../<?php echo $row['Tenth_Marksheet'] ?>' >
                                </div>
                            </li>
                            <li class="form-line form-line-column form-col-2" id="id_27">
                                <label class="form-label form-label-top" id="label_27" for="input_27_full"> 12th marksheet </label>
                                <div id="cid_27" class="form-input-wide" data-layout="half">
                                    <img height=100px; weidth=100px; alt="image" src='../<?php echo $row['Twelve_Marksheet'] ?>' >
                                </div>
                            </li>
                            <li class="form-line form-line-column form-col-1" data-type="control_button" id="id_20">
                                <div id="cid_20" class="form-input-wide" data-layout="full">
                                    <div data-align="left" class="form-buttons-wrapper form-buttons-left   jsTest-button-wrapperField">
                                        <button id="input_20" type="submit" class="form-submit-button submit-button jf-form-buttons jsTest-submitField" data-component="button" name="approve"> Approve </button>
                                    </div>
                                </div>
                            </li>
                            <li class="form-line form-line-column form-col-2" data-type="control_button" id="id_19">
                                <div id="cid_19" class="form-input-wide" data-layout="full">
                                    <div data-align="right" class="form-buttons-wrapper form-buttons-right   jsTest-button-wrapperField">
                                        <button id="input_19" type="submit" class="form-submit-button submit-button jf-form-buttons jsTest-submitField" name="reject" data-component="button"> Reject </button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>