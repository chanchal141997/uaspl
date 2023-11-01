<?php include './db.php'; ?>

<?php
if (isset($_POST['approve'])) {
    $society_id = $_GET['society_id'];
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
   
    $status = 1;
    $role = "Society";
 
    $query = "INSERT INTO `society`(`society_id`, `s_name`, `s_address`, `s_r_no`, `chairman_name`, `sec_name`, `manager_name`, `c_no`, `email`, `username`, `password`)
 VALUES('$society_id','$s_name','$s_address','$s_r_no','$chairman_name','$sec_name','$manager_name','$c_no','$email','$username','$password')";
    $sql = mysqli_query($connection, $query);

    // email sent to vendor
    if ($sql) {
        $message = "<div>
         <h3><b>Approved successfully!!</b></h3>
         <h4>Hello !your Society registration has been successfully Done. Now You can Login.<br> society Name: $s_name,<br>  Email: $email <br> username:$username,<br>  password:$password ;</h4>
        </div>";

        include_once("reset_pass/SMTP/class.phpmailer.php");
        include_once("reset_pass/SMTP/class.smtp.php");
        // $email_1 = "vasant@asmoloobhoy.com";
        $email = $email;
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
        $mail->AddAddress($email);
        $mail->Subject = "Login Details!!";
        $mail->isHTML(TRUE);
        $mail->Body = $message;
        if ($mail->send()) {
            $msg = "We have e-mailed!";
        }
    }

    //end code

    //data send to admin for login
    if ($sql) {
        echo '<script> alert("Society approved successfully.....")</script>';

        $query1 = "INSERT INTO `admin`(`name`, `username`, `password`, `role`, `email`,`society_id`) 
        Values('$s_name','$username','$password','$role','$email','$society_id')";
        $sql1 = mysqli_query($connection, $query1);
        if ($sql1) {
            echo '<script> alert("User ID & password Is created! Now Society User Can login")
                window.location.href="society_details.php";
                </script>';
        } else {
            echo "Not Created!!";
        }
    } else {
        echo '<script> alert("Not Approved???" ) </script>';
    }



    // $id = $_GET['id'];
    $query2 = "UPDATE `society_register` set status=1 where society_id='$society_id'";
    $sql2 = mysqli_query($connection, $query2);
} else {
    echo "Server Error!!!";
}
?>
<?php
$society_id = $_GET['society_id'];
$query = "SELECT * FROM `society_register` where society_id='$society_id'";
$sql = mysqli_query($connection, $query);
if ($sql->num_rows > 0) {

    while ($row = $sql->fetch_assoc()) {
?>

        <!DOCTYPE html>
        <html dir="ltr">

        <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <!-- Tell the browser to be responsive to screen width -->
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <meta name="keywords" content="" />
            <meta name="description" content="" />
            <meta name="robots" content="noindex,nofollow" />
            <title>VMS</title>
            <!-- Favicon icon -->
            <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png" />
            <!-- Custom CSS -->
            <link href="../dist/css/style.min.css" rel="stylesheet" />

        </head>

        <body>
            <div class="main-wrapper">
                <div class=" w-100 d-flex no-block justify-content-center align-items-center bg-dark ">

                    <div class="container-fluid" style="width: 60vw; align-items:center; margin-top:50px">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <form class="form-horizontal" method="POST" action="#">
                                        <div class="card-body">
                                            <h4 class="card-title">New Society Registration Details</h4>
                                                                                       
                                                   
                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 text-end control-label col-form-label">Society Name </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="fname" name="s_name" value="<?php echo $row['s_name']; ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="lname" class="col-sm-3 text-end control-label col-form-label">Society Address </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="lname" name="s_address" value="<?php echo $row['s_address']; ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="lname" class="col-sm-3 text-end control-label col-form-label">Society Registration No</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="lname" name="s_r_no" value="<?php echo $row['s_r_no']; ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="lname" class="col-sm-3 text-end control-label col-form-label">Chairman Name </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="lname" name="chairman_name" value="<?php echo $row['chairman_name']; ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="lname" class="col-sm-3 text-end control-label col-form-label">Secretary Name </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="lname" name="sec_name" value="<?php echo $row['sec_name']; ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="lname" class="col-sm-3 text-end control-label col-form-label">Society manager Name </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="lname" name="manager_name" value="<?php echo $row['manager_name']; ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="lname" class="col-sm-3 text-end control-label col-form-label">Contact No.</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="lname" name="c_no" value="<?php echo $row['c_no']; ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="lname" class="col-sm-3 text-end control-label col-form-label">Email ID </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="lname" name="email" value="<?php echo $row['email']; ?>" />
                                                        </div>
                                                    </div>
                                                                                                   
                                                    <input type="text" class="form-control" name="username" style="display:none" value="<?php echo $row['username']; ?>" />
                                                    <input type="text" class="form-control" name="password" style="display:none" value="<?php echo $row['password']; ?>" />


                                        </div>
                                        <div class="border-top">
                                            <div class="card-body">
                                                <input type="submit" name="approve" class="btn btn-info" value="Approve">


                                                <a href="society_details.php" class="btn btn-danger" value="Cancel">Cancel</a>

                                            </div>
                                        </div>
                                    </form>
                            <?php }
                    } ?>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <script src="../assets/libs/jquery/dist/jquery.min.js"></script>

            <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

            <script>
                $("input[type='radio']").change(function() {

                    if ($(this).val() == "YES") {
                        $("#answer").show();
                    } else {
                        $("#answer").hide();
                    }

                });
            </script>
        </body>

        </html>