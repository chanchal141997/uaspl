<?php
session_start(); ?>
<?php include './header.php'; ?>
<?php include './sidebar.php'; ?>
<?php include './db.php';
$query = "Select * from society_register where status=0 ";
$sql = mysqli_query($connection, $query);

?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">New Society List </h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                New Society Details
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
                        <!-- <h5 class="card-title">New Vendor DataBase</h5> -->
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
                                       
                                        <!-- <th>MSME </th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if ($sql->num_rows > 0) {

                                        while ($row = $sql->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td> <?php echo $row['society_id']; ?></td>
                                                <td><?php echo $row['s_name']; ?></td>
                                                <td><?php echo $row['s_address']; ?></td>
                                                <td><?php echo $row['s_r_no']; ?></td>
                                                <td><?php echo $row['chairman_name']; ?></td>
                                                <td><?php echo $row['sec_name']; ?></td>
                                                <td><?php echo $row['manager_name']; ?></td>
                                                <td><?php echo $row['c_no']; ?></td>
                                                <td><?php echo $row['email']; ?></td> 
                                                <td>
                                                    <a class="btn btn-info btn-sm" href="approve.php?society_id=<?php echo $row['society_id']; ?>" class="text-white"> Approve</a>
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
<?php include 'footer.php'; ?>