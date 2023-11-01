<?php
session_start(); ?>

<?php include './header.php'; ?>
<?php include './sidebar.php'; ?>
<?php include './db.php';


$per_page = 5;
$start = 0;
$current_page = 1;
if (isset($_GET['start'])) {
    $start = $_GET['start'];
    if ($start <= 0) {
        $start = 0;
        $current_page = 1;
    } else {
        $current_page = $start;
        $start--;
        $start = $start * $per_page;
    }
}

$record = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `doc_details`"));
$pagi = ceil($record / $per_page);

$sql = "select * from `doc_details` limit $start,$per_page";
$res = mysqli_query($connection, $sql);
$first_page = 1;
$next_page = $current_page + 1;
$previous_page = $current_page - 1;


?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Society Documents</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Doc Details
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

                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <th>Society ID</th>
                                    <th>Society Name</th>

                                    <th>Society S.R NO</th>
                                    <th>Contact No</th>
                                    <th colspan="5">Documents</th>

                                  
                                </thead>

                                <tbody>
                                    <?php

                                    if ($res->num_rows > 0) {
                                        while ($row = $res->fetch_assoc()) {
                                    ?>

                                            <tr>
                                                <td><?php echo $row['society_id']; ?></td>
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
                                                            echo "<li><a href='../doc/" . $file['filename'] . "'>" . $file['filename'] . "</a> (Size: " . $file['filesize'] . " bytes)
															  <a href='delete_doc.php?fileID=".$file['fileID']."&id=".$row['doc_id']."'><span class='mdi mdi-delete'> </span> </a>
															</li>  
                                                            "; 
                                                            
                                                        }
                                                        echo "</ul>";
                                                    } else {
                                                        echo "No files uploaded yet.";
                                                    } ?>
                                                </td>

                                                <td> <a class="btn btn-danger" href="delete_doc_detail.php?doc_id=<?php echo $row['doc_id']; ?>" class="text-white" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>

                                            </tr>
                                    <?php }
                                    } ?>



                            </table>

                        </div>
                    </div>
                    <div class="d-flex justify-content-end align-items-end flex-wrap gap-1">

                        <a class="btn btn-info" href="update_payment.php?start=<?php echo $first_page; ?>">First</a>
                        <a class="btn btn-info" href="update_payment.php?start=<?php echo $previous_page; ?>">
                            << Prev</a>
                                <a class="btn btn-info" href="update_payment.php?start=<?php echo $next_page; ?>">Next >></a>
                                <a class="btn btn-info" href="update_payment.php?start=<?php echo $pagi; ?>">Last</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>