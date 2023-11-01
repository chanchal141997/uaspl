<?php
session_start(); ?>


<?php include './db.php';

if (isset($_POST['edit'])) {

    $id = $_GET['id'];
    $p_name = $_POST['p_name'];
    $doc = $_FILES['doc'];


    $filename = $doc['name'];
    $filerrror = $doc['error'];
    $filetmp = $doc['tmp_name'];
    $fileext = explode('.', $filename);
    $filecheck = strtolower(end($fileext));
    $fileextstored = array('png', 'pdf', 'jpeg');
    $destinationfile = '../doc/' . $filename;
    move_uploaded_file($filetmp, $destinationfile);

    $q = "update ongoing_project set p_name='$p_name',doc='$destinationfile' where id=$id ";
    $query = mysqli_query($connection, $q);
    if ($query) {
        echo '<script> alert("Project Details Updated successfully.....")</script>';
        header("Location:./upload_OngoingP.php");
    } else {
        echo '<script> alert(" Not updated .....")</script>';
    }
}

?>
<?php include 'db.php';
$id = $_GET['id'];

$display_sql = "select  * from `ongoing_project` where id='$id'";
$query = mysqli_query($connection, $display_sql);



if ($query->num_rows > 0) {

    while ($row = $query->fetch_assoc()) {
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
                                    <form class="form-horizontal" method="POST" action="#" enctype='multipart/form-data'>
                                        <div class="card-body">
                                            <h4 class="card-title">Edit Project Details</h4>
                                            <div class="form-group row">
                                                <label for="fname" class="col-sm-3 text-end control-label col-form-label">Project Name </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="p_name" value="<?php echo $row['p_name']; ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="lname" class="col-sm-3 text-end control-label col-form-label">Project</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control"  name="doc" value="<?php echo $row['doc']; ?>" /><?php echo $row['doc']; ?>
                                                </div>
                                            </div>
                                           
                                        <div class="border-top">
                                            <div class="card-body">
                                                <input type="submit" name="edit" class="btn btn-info" value="Edit">


                                                <a href="upload_OngoingP.php" class="btn btn-danger" value="Cancel">Cancel</a>

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


           
        </body>

        </html>

        <?php include 'footer.php'; ?>