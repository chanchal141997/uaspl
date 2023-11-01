<?php
session_start(); ?>
<?php include './header.php'; ?>
<?php include './sidebar.php'; ?>
<?php include './db.php'; ?>

<?php
if (isset($_POST['submit'])) {
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

    $sql = "INSERT INTO `ongoing_project`(`p_name`, `doc`) VALUES ('$p_name','$destinationfile')";
    $query = mysqli_query($connection, $sql);
    if ($query) {
        echo '<script> alert("Project Added successfully.....")</script>';
    } else {
        echo "not inserted";
    }
} else {
    echo "invalid";
}
?>
<?php
$query = "Select * from ongoing_project where id=1";
$sql = mysqli_query($connection, $query);
?>


<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-8 d-flex no-block align-items-center">
                <h4 class="page-title">Ongoing Projects</h4>
                <div class="ms-auto text-end">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->

        <div id="accordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            1) Upload File 
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <form class="form-horizontal" method="post" action="#" enctype='multipart/form-data'>
                            <div class="card-body">
                                <h4 class="card-title">Project Info</h4>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">Project Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="fname" name="p_name" placeholder="Project Name Here" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">File</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" id="fname" name="doc" placeholder=" Name Here" require/>
                                    </div>
                                </div>
                                 
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <input type="submit" name="submit" value="Upload" class="btn btn-primary">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            2) Ongoing Project Details
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        <h5 class="card-title">Project DataBase</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>

                                        <th>Project Name</th>
                                        <th>File</th>
                                       
                                        <th>Edit</th>
                                    </tr>
                                </thead>

                                <tbody><?php

                                        if ($sql->num_rows > 0) {
                                            while ($row = $sql->fetch_assoc()) {
                                        ?>

                                            <tr>
                                                <td><?php echo $row['p_name']; ?></td>
                                                <td><a  href="<?php echo $row['doc']; ?>"><?php echo $row['doc']; ?></a></td>
                                                <td><a class="btn btn-info" href="edit_project.php?id=<?php echo $row['id']; ?>" class="text-white">Edit</a></td>
                                                
                                            </tr>
                                    <?php }
                                        } ?>



                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php include 'footer.php'; ?>