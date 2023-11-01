<?php
session_start(); ?>

<?php include './db.php'; ?>
<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>


<?php
$display_sql = "select * from society";
$query3 = mysqli_query($connection, $display_sql);
$society = mysqli_num_rows($query3);
?>
<div class="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-3">
                                <div class="bg-dark p-10 text-white text-center">
                                    <i class="mdi mdi-account fs-3 mb-1 font-16"></i>
                                    <h5 class="mb-0 mt-1"><?php echo $society; ?></h5>
                                    <small class="font-light">No. of Society </small>
                                </div>
                            </div>
                            <!-- <div class="col-3">
                            <div class="bg-dark p-10 text-white text-center">
                                <i class="mdi mdi-plus fs-3 font-16"></i>
                                <h5 class="mb-0 mt-1">  </h5>
                                <small class="font-light">No. of Invoices</small>
                            </div>
                        </div>
                        <div class="col-3" >
                            <div class="bg-dark p-10 text-white text-center">
                                <i class="mdi mdi-table fs-3 mb-1 font-16"></i>
                                <h5 class="mb-0 mt-1"></h5>
                                <small class="font-light">No. of IGRN</small>
                            </div>
                        </div> -->
                            <!-- <div class="col-3">
                            <div class="bg-dark p-10 text-white text-center">
                                <i class="mdi mdi-web fs-3 mb-1 font-16"></i>
                                <h5 class="mb-0 mt-1"></h5>
                                <small class="font-light">No. of Documents Details</small>
                            </div>
                        </div> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>