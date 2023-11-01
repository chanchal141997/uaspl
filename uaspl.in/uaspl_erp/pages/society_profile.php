<?php
session_start();
// if(isset($_SESSION['email'])) {
//     $email = $_SESSION['email'];
// echo $email;
// }
?>

<?php include './header.php'; ?>
<?php include './sidebar.php'; ?>
<?php include './db.php';

// if (isset($_SESSION['email'])) {
//     $email = $_SESSION['email'];



//     $query = "Select * from `vendor` where email=$email";
//     $sql = mysqli_query($connection, $query);
// }
?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Society Profile </h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Vender Details
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
                        <h5 class="card-title">Society Details</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <th>Society Name</th>
                                        <th>Society Address</th>
                                        <th>Society S.R NO</th>
                                        <th>Chairman</th>
                                        <th>Secretary </th>
                                        <th>manager</th>
                                        <th>contact no</th>
                                        <th>Email</th>
                                        <!-- <th>EDIT</th> -->
                                    </tr>
                                </thead>

                                <tbody><?php
                                        if (isset($_SESSION['email']) and ($_SESSION['society_id'])) {
                                            $email = $_SESSION['email'];
                                            $id = $_SESSION['society_id'];
                                            $query = "SELECT * FROM `society` WHERE society_id=$id";
                                            $sql = mysqli_query($connection, $query);
                                            //echo $email;
                                            if (!empty($sql) && $sql->num_rows > 0) {
                                                while ($row = $sql->fetch_assoc()) {
                                        ?>

                                                <tr>
                                                    
                                                    <td><?php echo $row['s_name']; ?></td>
                                                    <td><?php echo $row['s_address']; ?></td>
                                                    <td><?php echo $row['s_r_no']; ?></td>
                                                    <td><?php echo $row['chairman_name']; ?></td>
                                                    <td><?php echo $row['sec_name']; ?></td>
                                                    <td><?php echo $row['manager_name']; ?></td>
                                                    <td><?php echo $row['c_no']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    
                                                    <!-- <td>
                                                        <a class="btn btn-info" href="edit_s_profile.php?society_id=<?php echo $row['society_id']; ?>" class="text-white"> Edit </a>
                                                    </td> -->
                                                </tr>
                                    <?php }
                                            }
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