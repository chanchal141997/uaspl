<?php include './uaspl_erp/pages/db.php' ?>

<?php
session_start();
if (isset($_SESSION['ID'])) {
  header("Location:pages/dashboard.php");
  exit();
}

// Include database connectivity


if (isset($_POST['submit'])) {
  $errorMsg = "";
  $role = $_POST['role'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  //   $password = $con->real_escape_string(md5($_POST['password']));


  if (!empty($username) || !empty($password)) {
    $query  = "SELECT * FROM admin WHERE username = '$username' && role='$role' && password='$password'";
    $result = $connection->query($query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $_SESSION['ID'] = $row['id'];
      $_SESSION['ROLE'] = $row['role'];
      $_SESSION['society_id'] = $row['society_id'];
    $_SESSION['email']=$row['email'];
    $_SESSION['name']=$row['name'];
      header("Location:./uaspl_erp/pages/dashboard.php");
      die();
    } else {
      //$errorMsg = "No user found on this username";
      echo "<script>
                    alert('No user found on this username');
                    window.location.href='index.php'
                </script>";
    }
  } else {
   // $errorMsg = "Username and Password is required";
   
    echo "<script>
    alert('Username and Password is required');
    window.location.href='index.php'
</script>";
    

  }
}
?>

<?php
$query = "Select * from ongoing_project where id=1";
$sql = mysqli_query($connection, $query);                                                                  
?>


<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <title>URBAN ANALYSIS AND SOLUTIONS CONSULTANCY SERVICES </title>
    <!-- Stylesheets -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/revolution-slider.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  
    <!-- <link rel="icon" href="images/favicon.ico" type="image/x-icon"> -->
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link href="css/responsive.css" rel="stylesheet">
    <!-- <link href="./uaspl_erp/dist/css/style.min.css" rel="stylesheet" /> -->
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
    <style>
        #download {
            border-radius: none;
            border: none;
            color: #CD925C;
        }

        #download:hover {
            background: none;
            color: none;
        }

        #download button{
            position: relative;
            border: none;
            background-color: #CD925C !important;
            padding: 15px 14px;
            display: block;
            line-height: 16px;
            font-family: 'Montserrat', sans-serif;
            border-radius: 2px;
			color:#fff;
        }


        .bg-gray {
            background-color: gray;
        }

        .btn-info {
            background-color: #CD925C;
            border: #CD925C;
        }

        .btn-info:hover {
            background-color: gray;
        }

        form>.form-input:hover {
            box-shadow: 1px solid #CD925C;
        }
		.social-icon{
		margin-top:8px;
		}
	    </style>
</head>

<body>

    <div class="page-wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader"></div> -->

        <!-- Main Header-->
        <header class="main-header">
            <!-- Header Top -->
            <div class="header-top">
                <div class="auto-container" style="max-width:1350px;">
                    <div class="row clearfix">

                        <!--Top Left-->
                        <div class="top-right pull-left">
                            <div class="social-icon">
                               
                                <a href="#"><span class="fa fa-twitter"></span></a>
                                <a href="https://www.instagram.com/urbannanalysisandsolutions/?hl=en"><span class="fa fa-instagram"></span></a>
                                <a href="#"><span class="fa fa-linkedin"></span></a>
                                <a id="download" href="./images/OFFICE PROFILE FINAL (4).pdf" target="_blank"><button class="btn btn-primary" type="button">&nbsp; <span class="fa fa-download"></span> OUR PROFILE </button></a>
								
                            </div>

                            <ul>
								
								<li><?php
if ($sql->num_rows > 0) {
    while ($row = $sql->fetch_assoc()) {
        $filename=$row['doc'];
        $file= './uaspl_erp/Uaspl_erp/' . $filename;
?>

									<a id="download" href="<?php echo $file?>" target="_blank"><button class="btn btn-                                      primary" type="button">Ongoing Projects  </button></a>
								<?php }
                                        } ?>
								</li>
                                <li><span class="fa fa-envelope-o"></span>info@uaspl.in</li>
                                <li><span class="fa fa-phone"></span>+9122 40136470 /022 49695194</li>
                                <li><span class="fa fa-clock-o"></span>Mon - Fri : 9:00 - 7:00</li>
								
                            </ul>

                        </div>

                        <!--Top Right-->

                    </div>

                </div>
            </div><!-- Header Top End -->


            <!-- Main Box -->
            <div class="main-box">
                <div class="auto-container " style="max-width:1350px;">
                    <div class="outer-container clearfix">
                        <!--Logo Box-->
                        <div class="logo-box">
                            <div class="logo"><a href="index.html"><img src="images/logo_26.png" alt=""width="70%"></a></div>
                        </div>

                        <!--Nav Outer-->
                        <div class="nav-outer clearfix">
                            <!-- Main Menu -->
                            <nav class="main-menu">
                                <div class="navbar-header">
                                    <!-- Toggle Button -->
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <li class=""><a href="index.php">Home</a></li>
                                        <li class="dropdown"><a href="#">About Us</a>
                                            <ul>
                                                <li><a href="about.php">About Us</a></li>
                                                <li><a href="team.php">Our Team</a></li>
                                                <li><a href="associate.php">Our Associate</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown"><a h ref="#">Services</a>
                                            <ul>
                                                <li><a href="project.php">Planning and designing</a></li>
                                                <li><a href="society.php">Society Procedures </a></li>
                                                <li><a href="struct.php"> Structural services</a></li>
                                                <li><a href="legal.php">Legal Services </a></li>


                                                <li><a href="govt.php">Govt. liasioning & Approvals </a></li>
                                                <li><a href="transaction.php">Transaction Advisor</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="client.php">Our clients</a></li>
                                        <li><a href="career.php">carrer</a></li>
                                        <li><a href="know.php">Knowledge</a></li>
                                        <li><a href="contact.php">Contact</a></li>


                                        <li class="current" data-toggle="modal" data-target="#exampleModal"><a href="#">login</a></li>
                                    </ul>
                                </div>
                            </nav><!-- Main Menu End-->

                        </div><!--Nav Outer End-->

                        <!-- Hidden Nav Toggler -->
                        <div class="nav-toggler">
                            <button class="hidden-bar-opener"><span class="icon fa fa-bars"></span></button>
                        </div><!-- / Hidden Nav Toggler -->
                    </div>
                </div>
            </div>

        </header>
        <!--End Main Header -->


        <!-- Hidden Navigation Bar -->
        <section class="hidden-bar right-align">

            <div class="hidden-bar-closer">
                <button class="btn"><i class="fa fa-close"></i></button>
            </div>

            <!-- Hidden Bar Wrapper -->
            <div class="hidden-bar-wrapper">

                <!-- .logo -->
                <div class="logo text-center">
                    <a href="index.php"><img src="images/logo_26.png" alt=""></a>
                </div><!-- /.logo -->

                <!-- .Side-menu -->
                <div class="side-menu">
                    <!-- .navigation -->
                    <ul class="navigation">
                        <li class=""><a href="index.php">Home</a></li>
                        <li class="dropdown"><a href="about.php">About Us</a>
                            <ul>

                                <li><a href="team.php">Our Team</a></li>
                                <li><a href="associate.php">Our Associate</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a h ref="#">Services</a>
                            <ul>
                                <li><a href="project.php">Planning and designing</a></li>
                                <li><a href="society.php">Society Procedures </a></li>
                                <li><a href="struct.php"> Structural services</a></li>
                                <li><a href="legal.php">Legal Services </a></li>


                                <li><a href="govt.php">Govt. liasioning & Approvals </a></li>
                                <li><a href="transaction.php">Transaction Advisor</a></li>
                            </ul>
                        </li>
                        <li><a href="client.php">Our clients</a></li>
                        <li><a href="career.php">carrer</a></li>
 <li><a href="know.php">Knowledge</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div><!-- /.Side-menu -->

                <div class="social-icons">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>

            </div><!-- / Hidden Bar Wrapper -->
        </section>
        <!-- / Hidden Bar -->




        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: #CD925C;">URBAN ANALYSIS AND SOLUTIONS PVT. LTD. </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" class="form-horizontal mt-3" id="loginform" action="#">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <select class="select2 form-select shadow-none form-control form-control-lg form-input" name="role">
                                        <option class="form-control">Select</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Emp">Employees</option>
                                        <option value="Society">Society</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" name="username" class="form-control form-control-lg form-input" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required="" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-input form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required="" />

                                </div>
                            </div>





                    </div>


                    <div class="modal-footer">

                        <button type="submit" name="submit" class="btn btn-info btn-lg text-white">
                            Login
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>