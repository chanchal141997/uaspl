<?php
session_start(); ?>
<?php include './header.php'; ?>
<?php include './sidebar.php'; ?>

<?php include './db.php';

 $per_page = 10;
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

 $record = mysqli_num_rows(mysqli_query($connection, "select * from admin where role='Society'"));
 $pagi = ceil($record / $per_page);

 $sql = "select * from admin where role='Society' limit $start,$per_page";
 $res = mysqli_query($connection, $sql);
 $first_page = 1;
 $next_page = $current_page + 1;
 $previous_page = $current_page - 1;


?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Society Login Data </h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                              Society Login Details
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
                                    <th>Society Id </th>
                                        <th>Society Name</th>
                                        <th>Email</th>
                                        <th>Society UserName</th>
                                        <th>Society Password</th>
                                      
                                        <th>Change Password </th>
                                       
                                      
                                        
                                    </tr>
                                </thead>

                                <tbody><?php

                                        if ($res->num_rows > 0) {
                                            while ($row = $res->fetch_assoc()) {
                                        ?>

                                            <tr>
                                            <td><?php echo $row['society_id']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php echo $row['password']; ?></td>
                                                
                                                <td><a class="btn btn-info" href="edit_s_password.php?id=<?php echo $row['id']; ?>"  onclick="return confirm('Are you sure you want to Edit the Password?');" class="text-white">Edit Password</a></td>
                                               
                                               
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