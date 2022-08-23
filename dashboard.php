<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Dashboard</title>
    <style>
        *{padding:0; margin:0; text-decoration:none; list-style:none;}
        body{font-family:Verdana, Geneva, Tahoma, sans-serif; overflow-x:hidden; line-height:1.5 !important; }
        .logo{height:60px; width:60px; border-radius:10%;}
        .px-5 {padding-right:2rem !important; padding-left:2rem !important;}
        .nav-fix{position:fixed; width:100%;}
        .navbar-brand {margin-left:2rem; font-family:sans-serif; font-size:1.3rem; font-weight:bold; text-transform:uppercase;}
        .dropdown-menu{margin-left:-29px; background-color:aliceblue;}
        .container-fluid{padding-right:0px !important;}
        @media(max-width:992px){
            .dropdown-menu{margin-left:0px; background-color:aliceblue; width:fit-content;}
        }
        .clg-img{width:100%; background-image:url(images/subharti.jpg); background-size:cover; background-attachment:fixed;}
        .heading{width:100%; height:190px; padding-top:78px;}
        @media(max-width:695px){
            .heading{display:none;}
        }
        @media(max-width:505px){
            .navbar-brand{font-size:x-small;}
        }
        .notify{background-color:aliceblue;}
        .founder{background-color:#fff;}
        .updte{padding-top:13px; padding:0px 22px; color:#1b9bff; font-style:italic;}
        .navbar-collapse ul li a:hover{background:#1b9bff; border-radius:8px; color:white !important;}
        .container2{width:100%; padding-top:580px; background-image:url(images/science.jpg); background-size:cover; background-attachment:fixed;}
        .slide-container{position:relative; width:100%;}
        .slide img{width:100%; height:80vh;}
        .arrow{cursor:pointer; position:absolute; top:45%; background-color:aliceblue; color:black; padding:8px 14px; border-radius:50%; font-size:24px; font-weight:bold;}
        .prev{left:10px;}
        .next{right:10px;}
        .slide{display:none;}
        .vision{background-color:darkslateblue;}
        .management{background-color:#fff; padding:60px;}
        .mang-head{font-size:35px; font-weight:bold; text-transform:uppercase; color:cornflowerblue; letter-spacing:0.13em; padding-bottom:32px;}
        .images{height:250px; width:280px; padding:20px;}
        .foter{border-top:1px solid darkslateblue; line-height:30px;}
        .s-icon{font-size:28px; padding-right:15px;}
        .social-head{font-size:15px;}
    </style>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['EMAIL'])){
            
        }else{
            header('location:login.php');
        }
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-5 nav-fix">
        <div class="container-fluid">
          <div><img src="images/su-logo.jpg" alt="logo" class="logo img-fluid"></div>
          <a class="navbar-brand" href="dashboard.php">Keral verma faculty of science</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
           <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto text-light">
                    <li class="nav-item"> <a class="nav-link active" aria-current="page" href="SeeYourData.php">Status</a> </li>
                    <li class="nav-item"> <a class="nav-link active" href="id_card.php">Profile</a> </li>
                    <li class="nav-item"> <a class="nav-link active" href="registration.php">Registration</a> </li>
                    <li class="nav-item"> <a class="nav-link active" href="#about">About-Us</a> </li>
                    <li class="nav-item"> <a class="nav-link active" href="logout.php">Logout</a> </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active text" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Courses </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="registration.php">BCA</a></li>
                            <li><a class="dropdown-item" href="registration.php">MCA</a></li>
                            <li><a class="dropdown-item" href="registration.php">B.Sc</a></li>
                            <li><a class="dropdown-item" href="registration.php">BSc.Cs</a></li>
                            <li><a class="dropdown-item" href="registration.php">M.sc</a></li>
                            <li><a class="dropdown-item" href="registration.php">MA</a></li>
                            <li><a class="dropdown-item" href="registration.php">BA</a></li>
                            <li><a class="dropdown-item" href="registration.php">B.Com</a></li>
                            <li><a class="dropdown-item" href="registration.php">M.Com</a></li>
                        </ul>
                    </li>
                </ul>
           </div>
        </div>
    </nav>
    <div class="container2 img-fluid">
        <div class="slide-container">
            <div class="slide"> <img src="images/confrence2.jpg" alt=""> </div>
            <div class="slide"> <img src="images/read.jpg" alt=""> </div>
            <div class="slide"> <img src="images/image-s.jpg" alt=""> </div>
            <div class="slide"> <img src="images/coding.jpg" alt=""> </div>
            <div class="slide"> <img src="images/fos.jpg" alt=""> </div>
            <span class="arrow prev" onclick="controller(-1)"> &lt; </span>
            <span class="arrow next" onclick="controller(1)"> &gt; </span>
        </div>
        <div class="row">
            <div class="col-sm-4 p-3 text-dark text-center notify">
                <h2>UPDATE SECTION</h2>
                <div class="updte">
                    <marquee direction="up">
                        <p>
                            Html is use to create a web pages content <br><br> Css is use to show the web pages style, means desining part <br><br>
                            Javascript is use to show the perform work our web pages <br><br> C language is use to understand the logic of programing language <br><br>
                            C++ is super set of c language <br><br> Java is 99% object oriented programing language <br><br>
                            Javascript is use to show the perform work our web pages <br><br> C language is use to understand the logic of programing language <br><br>
                            C++ is super set of c language <br><br> Java is 99% object oriented programing language
                        </p>
                    </marquee>
                </div>
            </div>
            <div class="col-sm-8 p-3 text-dark text-center founder" id="about">
                <h2>ABOUT COLLEGE</h2>
                <p><b>Our College:-</b><br>Keral Verma Subharti College of Science was established in 2013 with a vision to impart quality education in the field of basic sciences. Initially, the journey began with the undergraduate course B.Sc.
                    (PCM) and later in the year 2014 B.Sc. CBZ, PSM and B.Sc. (Hons.) in Physics, Chemistry, Mathematics and Zoology and Postgraduate courses M.Sc. in Physics, Chemistry, Mathematics and Biotechnology were introduced.
                    The college was renamed as Keral Verma Faculty of Science in the name of a famous Indian revolutionaries from Kerala. In 2015, the Department of Biotechnology and the Department of Computer Application was also included.
                    The Department of Botany was established in 2016. Presently the college has 7 well established fully furnished departments moving ahead with a strong team of highly qualified and well-experienced faculty members.
                    Students enrolled in various disciplines achieve their respective academic goals under the expert supervision of subject teachers. Students are also encouraged to participate in various seminars, conferences, workshops,
                    educational and industrial visits. Regular extracurricular activities are organized to groom the students in various academic areas. In addition to U.G. & P.G. courses, the departments also offer M. Phil & PhD courses in various disciplines.
                </p><br>
                <p><b>Our Department:-</b><br>The Department of Computer Application, is a constituent department of Keral Verma Subharti College of Science offering BCA, B.Sc. (Computer Science) MCA and PGDCA programs. The MCA is AICTE approved program. All the programs running in
                    the department are based on advance and appropriate curriculum. After passing out the degree program from the Department of Computer Application, most of the students have been selected in Government jobs and Private IT sectors with good salary package.
                    The course curriculum is revised after every three years to meet the requirement of IT Sector. The Department of Computer Application has spacious class rooms with state of the art laboratories. The class room teaching in this department is usually done on
                    LCD Projectors with the aid of latest software. The Department produces graduates and post graduates for the linkage of the Industries. Different Development Programs such as Conferences, Workshops, Guest Lectures, and Technical Talks have been organized in
                    the Department for the benefit of students and to enhance technical skills and awareness. The students are enabling to keep themselves pace with the rapid changes in the field of Computer Application. The highly qualified and dedicated faculty members of
                    the department educate the students and trained them with practical knowledge in the field of IT & Computer Science. They are also involved for the upgradation of their technical and professional skills by attending Faculty Development Programs.
                    The Department of Computer Application is being headed by Dr. Shashiraj Teotia, who has vast experience of academics in Swami Vivekanand Subharti University. Dr. Shashiraj Teotia has been leading the department since 19-05-2007 till date. He his having Ph.d
                    Degree in Computer Science & Engineering, with a specialization in Wireless Networks. He has more than 30 Research Publications in various Journals of National and International repute. He is Life time member of different societies such as IAENG
                    (International Association of Engineers) and IJMRA (International Journal of Multidisciplinary Research Academy).
                </p><br>
            </div>
        </div>
        <div class="col-sm-12 p-3 text-light text-center vision">
            <h1>Our vision</h1>
            <p>To impart quality education through Time-Tested Traditions blended with latest innovations to transform Youth into Human Resource that is responsive to Societal, Environmental and Cultural Responsibilities.</p>
            <h1>Our mission</h1>
            <p>To create state-of-art infrastructure and engage dynamic and dedicated faculty for inculcating scholarly pursuits and human values in the young minds to imbibe good qualities helping students to emerge as assets to the nation.</p>
            <h1>Our College</h1>
            <p>Keral Verma Subharti College of Science Meerut is a centre of excellence where we strive to impart best knowledge and cognition to encourage innovation among our students. Our aim is to nurture young talent and help them acquire
                adaptability in various fields of science. In the institution, students are exposed to the modern innovative methods of analysis and are trained in advanced skills under the able guidance of experienced faculty members having academic as well as industrial exposure.
                With our optimum facilities and well established infrastructure, we are able to convey best knowledge and advanced trainings to our students. We also encourage our students to acquire higher values, for self reliance and discipline. We inculcate in our students
                the values of Shiksha (Education) Sewa (Service) and Sanskar (Human Values).
            </p>
        </div>
        <div class="row management">
            <h1 class="mang-head text-center">Head of College</h1>
            <div class="col-sm-4 p-3 text-dark text-center text-uppercase">
                <img src="images/DR_MAHAVIR_SINGH_DEAN.jpg" alt="Dean image" class="images"> <br><label style="color:cornflowerblue;">DEAN<br><br>Prof. (Dr.) Mahavir Singh<br><br>Ph.D., Chemistry</label>
            </div>
            <div class="col-sm-4 p-3 text-dark text-center text-uppercase">
                <img src="images/hod.jfif" alt="hod img" class="images"> <br><label style="color:cornflowerblue;">Associate Professor & H.O.D<br><br>Shashiraj Teotia<br><br>MCA, M.Tech, Ph.D. (CS&E)</label>
            </div>
            <div class="col-sm-4 p-3 text-dark text-center text-uppercase">
                <img src="images/chancellor.webp" alt="cordinator img" class="images"> <br><label style="color:cornflowerblue;">Assistant Professor & Cordinator<br><br>Mr. Ankur Chaudhary<br><br>M.Tech.(CSE), Ph.D.</label>
            </div>
        </div>
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
    </div>
    <script>
        let flag=0;
        function controller(x){
            flag = flag + x;
            slideshow(flag);
        }
        slideshow(flag);
        function slideshow(num){
            let slides = document.getElementsByClassName('slide');
            if(num == slides.length){
                flag = 0;
                num = 0;
            }
            if(num < 0){
                flag = slides.length-1;
                num = slides.length-1;
            }
            for(let a of slides){
                a.style.display = "none";
            }
            slides[num].style.display = "block";
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>