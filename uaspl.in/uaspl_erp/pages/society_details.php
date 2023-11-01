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

 $record = mysqli_num_rows(mysqli_query($connection, "select * from society"));
 $pagi = ceil($record / $per_page);

 $sql = "select * from society limit $start,$per_page";
 $res = mysqli_query($connection, $sql);
 $first_page = 1;
 $next_page = $current_page + 1;
 $previous_page = $current_page - 1;


?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Society List </h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                              Society Details
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
                                    <tr>
                                    <th>Sr No:</th>
                                        <th>Society Name</th>
                                        <th>Society Address</th>
                                        <th>Society S.R NO</th>
                                        <th>Chairman</th>
                                        <th>Secretary </th>
                                        <th>manager</th>
                                        <th>contact no</th>
                                        <th>Email</th>
                                        <!-- <th>EDIT</th> -->
										<th>Delete</th>
                                        
                                    </tr>
                                </thead>

                                <tbody><?php

                                        if ($res->num_rows > 0) {
                                            while ($row = $res->fetch_assoc()) {
                                        ?>

                                            <tr>
                                            <td> <?php echo $row['society_id']; ?></td>
                                                <td><a href="s_doc.php?society_id=<?php echo $row['society_id']; ?>" ><?php echo $row['s_name']; ?></a></td>
                                                <td><?php echo $row['s_address']; ?></td>
                                                <td><?php echo $row['s_r_no']; ?></td>
                                                <td><?php echo $row['chairman_name']; ?></td>
                                                <td><?php echo $row['sec_name']; ?></td>
                                                <td><?php echo $row['manager_name']; ?></td>
                                                <td><?php echo $row['c_no']; ?></td>
                                                <td><?php echo $row['email']; ?></td> 
                                               <td><a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" href="delete_society.php?society_id=<?php echo $row['society_id']; ?>" class="text-white">Delete</a></td>
                                            </tr>
                                    <?php }
                                        } ?>



                            </table>

                        </div>
                    </div>
                   
                    <div class="d-flex justify-content-end align-items-end flex-wrap gap-1">

                        <a class="btn btn-info" href="society_details.php?start=<?php echo $first_page; ?>">First</a>
                        <a class="btn btn-info" href="society_details.php?start=<?php echo $previous_page; ?>"><< Prev</a>
                        <a class="btn btn-info" href="society_details.php?start=<?php echo $next_page; ?>">Next >></a>
                         <a class="btn btn-info" href="society_details.php?start=<?php echo $pagi; ?>">Last</a>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>