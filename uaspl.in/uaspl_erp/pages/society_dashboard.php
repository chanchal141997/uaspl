<?php
session_start(); ?><?php
                    if (isset($_SESSION['email']) and ($_SESSION['society_id'])) {
                        $society_id = $_SESSION['society_id'];


                    ?>
<?php include './header.php'; ?>
<?php include './sidebar.php'; ?>
<?php include './db.php';




?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">  Society Documents Details</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Society Documents Details
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>




    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">HELLO !! <?php
                                                        $vendor_id = $_SESSION['society_id'];
                                                        $query = "SELECT * FROM `admin` WHERE society_id= $society_id";
                                                        $sql = mysqli_query($connection, $query);
                                                        if ($sql->num_rows > 0) {
                                                            while ($row = $sql->fetch_assoc()) {
                                                                echo $row['username'];
                                                            }
                                                        }
                                                        ?>

                        </h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <?php
                                $society_id = $_SESSION['society_id'];
                                $query = "SELECT * FROM `doc_details` WHERE society_id= $society_id";
                                $sql = mysqli_query($connection, $query);
                                ?>
                                <thead>

                                    <th>Society Name</th>

                                    <th>Society S.R NO</th>
                                    <th>Contact No</th>
                                    <th colspan="3">Documents</th>

                                    </tr>
                                </thead>

                                <tbody style=" overflow: hidden;">
                                    <?php
                                    if ($sql->num_rows > 0) {
                                        while ($row = $sql->fetch_assoc()) {
                                    ?>

                                            <tr>

                                                <td><?php echo $row['s_name']; ?></td>
                                                <td> <?php echo $row['s_r_no']; ?></td>
                                                <td><?php echo $row['c_no']; ?></td>
                                                <td><?php

                                                    $fileDataJson = $row['Doc1'];

                                                    // Decode the JSON data
                                                    $fileData = json_decode($fileDataJson, true);

                                                    if (is_array($fileData)) {

                                                        echo "<ul>";
                                                        foreach ($fileData as $file) {
                                                            echo "<li><a href='../doc/" . $file['filename'] . "'>" . $file['filename'] . "</a> (Size: " . $file['filesize'] . " bytes)</li>  
        ";
                                                        }
                                                        echo "</ul>";
                                                    } else {
                                                        echo "No files uploaded yet.";
                                                    } ?>
                                                </td>

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
<?php } ?>
<?php include 'footer.php'; ?>