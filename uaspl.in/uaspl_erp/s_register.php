<?php include('./pages/db.php'); ?>
<?php
if (isset($_POST['submit'])) {
  $s_name = $_POST['s_name'];
  $s_address = $_POST['s_address'];
  $s_r_no= $_POST['s_r_no'];
  $chairman_name = $_POST['chairman_name'];
  $sec_name = $_POST['sec_name'];
  $manager_name = $_POST['manager_name'];
  $c_no = $_POST['c_no'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $c_password = $_POST['c_password'];
  $status = 0;

  $query = "INSERT INTO `society_register`(`status`, `s_name`, `s_address`, `s_r_no`, `chairman_name`, `sec_name`, `manager_name`, `c_no`, `email`, `username`, `password`, `c_password`)
 VALUES('$status','$s_name','$s_address','$s_r_no','$chairman_name','$sec_name','$manager_name','$c_no','$email','$username','$password','$c_password')";
  $sql = mysqli_query($connection, $query);
  
  // email send to admin start
  if ($sql) {
    $message = "<div>
     <h3><b>Hello!</b></h3>
     <h4>A new vendor has registered.<br> Society Name: $s_name,<br>  Email: $email,<br> Contact no: $c_no<br>  ;</h4>
    </div>";
  
    include_once("pages/reset_pass/SMTP/class.phpmailer.php");
    include_once("pages/reset_pass/SMTP/class.smtp.php");
     //$email_1 = "vasant@asmoloobhoy.com";
   $email_1 = "webadmin@technoriya.com";
    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->Username = "web.technoriya@gmail.com";
    $mail->Password = "egpgpapyzaitbxtp";
    $mail->setFrom('web.technoriya@gmail.com', 'web Team');
    $mail->FromName = "SMS";
    $mail->AddAddress($email_1);
    $mail->Subject = "New society Request!!";
    $mail->isHTML(TRUE);
    $mail->Body = $message;
    if ($mail->send()) {
      $msg = "We have e-mailed!";
    }
  }

//end of mail send code

  if ($sql) {
    echo '<script> alert("Registration done successfully.....After Approval you can login it!!");
    window.location.href="index.php";
    </script>';
    } else {
    echo '<script> alert("Registration Not done.....")</script>';
  }
  
}

else {
  // echo "Server Error";
}


?>





<!DOCTYPE html>
<html dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
  <meta name="description" content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
  <meta name="robots" content="noindex,nofollow" />
  <title>UASPL SMS</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png" />
  <!-- Custom CSS -->
  <link href="dist/css/style.min.css" rel="stylesheet" />

</head>

<body>
  <div class="main-wrapper">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <div class="
         w-100
          d-flex
          no-block
          justify-content-center
          align-items-center
          bg-dark
        ">

      <!-- <div class="text-center pt-3 pb-3">
              <span class="db"
                ><img src="assets/images/logo-1.png" alt="logo"
              /></span>
            </div> -->
      <!-- Form -->

      <div class="container-fluid" style="width: 60vw; align-items:center; margin-top:50px">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <form class="form-horizontal" method="POST" action="#">
                <div class="card-body">
                  <h4 class="card-title">Society Registration Form</h4>
                  <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">Society Name <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="fname" name="s_name" placeholder="Company Name Here" required />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-3 text-end control-label col-form-label">Society Address <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="" name="s_address" placeholder="Company Address Here" required />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-3 text-end control-label col-form-label">Society Registration No </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="" name="s_r_no" placeholder="Society Registration No. Here"  />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-3 text-end control-label col-form-label">Chairman Name </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="" name="chairman_name" placeholder="Chairman Name Here"  />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-3 text-end control-label col-form-label">Secretary Name </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="" name="sec_name" placeholder="Secretary Name Here" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-3 text-end control-label col-form-label">Society manager Name </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="" name="manager_name" placeholder="Contact Person Name Here"  />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-3 text-end control-label col-form-label">Contact No. <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="" name="c_no" placeholder="Contact No. Here" required />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-3 text-end control-label col-form-label">Email ID<span class="text-danger">*</span> </label>
                    <div class="col-sm-9"><span id="check_email"></span>
                      <input type="text" class="form-control" id="email" name="email" onInput="checkEmail()" placeholder="Email ID Here" required />
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="" class="col-sm-3 text-end control-label col-form-label">Username <span class="text-danger">*</span></label>
                    <div class="col-sm-9"><span id="check-username"></span>
                      <input type="text" class="form-control" id="username" name="username" onInput="checkUsername()" placeholder="Username Here" required />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-3 text-end control-label col-form-label">Password <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password Here" required />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="email1" class="col-sm-3 text-end control-label col-form-label">Confirmed Password <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="confirm_password" name="c_password" placeholder="Confirmed Password Here" required /><span id='message'></span>
                    </div>
                  </div>
                </div>
                <div class="border-top">
                  <div class="card-body">
                    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                    <a href="index.php" class="btn btn-danger" value="Cancel">Cancel</a>
                  </div>
                </div>
              </form>
            </div>

          </div>

        </div>
      </div>
    </div>

  </div>
  <!-- ============================================================== -->
  <!-- All Required js -->
  <!-- ============================================================== -->
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- ============================================================== -->
  <!-- This page plugin js -->
  <!-- ============================================================== -->
  <script>
    $(".preloader").fadeOut();
  </script>
  <script>
    $('#password, #confirm_password').on('keyup', function() {
      if ($('#password').val() == $('#confirm_password').val()) {
        $('#message').html('Matching').css('color', 'white');
      } else
        $('#message').html('Not Matching').css('color', 'red');
    });


    $("input[type='radio']").change(function() {

      if ($(this).val() == "YES") {
        $("#answer").show();
        $("#answer1").show();
        $("input").attr("required", "true");
      } else {
        $("#answer").hide();
        $("#answer1").hide();
      }

    });
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    function checkUsername() {

      jQuery.ajax({
        url: "check_availability.php",
        data: 'username=' + $("#username").val(),
        type: "POST",
        success: function(data) {
          $("#check-username").html(data);
        },
        error: function() {}
      });
    }

    function checkEmail() {

      jQuery.ajax({
        url: "check_availability.php",
        data: 'email=' + $("#email").val(),
        type: "POST",
        success: function(data) {
          $("#check_email").html(data);
        },
        error: function() {}
      });
    }
    //check pan no
    function checkPan() {

      jQuery.ajax({
        url: "check_availability.php",
        data: 'pan=' + $("#pan").val(),
        type: "POST",
        success: function(data) {
          $("#check_pan").html(data);
        },
        error: function() {}
      });
    }

    function checkGst() {

      jQuery.ajax({
        url: "check_availability.php",
        data: 'gst=' + $("#gst").val(),
        type: "POST",
        success: function(data) {
          $("#check_gst").html(data);
        },
        error: function() {}
      });
    }
  </script>
</body>

</html>