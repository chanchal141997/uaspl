<?php
session_start(); ?>


<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>
<?php
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
  echo $email;
}
?>
 
<?php
$display_sql = "select * from society";
$query3 = mysqli_query($connection, $display_sql);
$society = mysqli_num_rows($query3);
?>

<?php 
                                $query = "SELECT * FROM `society` ";
                                $res = mysqli_query($connection, $query);
                                ?>

<div class="page-wrapper">
  <div class="container-fluid">
 <?php if ($_SESSION['ROLE'] == 'Admin') { ?>
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
             

            </div>
          </div>
        </div>
      </div>
    </div>	<?php } ?>
	  
   <?php if ($_SESSION['ROLE'] == 'Admin') { ?>
   
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
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
                                        <th>delete</th>
                                    
                                </thead>

                                <tbody>
                                    <?php

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
                  
            </div>
        </div>
	<?php } ?>

	  <?php if ($_SESSION['ROLE'] == 'Society') {
	  echo '<script>window.location.href="./society_dashboard.php";</script>';
}
	  ?>
	  
	 
	  
	  
	  
  </div>
</div>





<?php include 'footer.php'; ?> <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../dist/js/jquery.ui.touch-punch-improved.js"></script>
<script src="../dist/js/jquery-ui.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="../assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="../dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="../dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="../dist/js/custom.min.js"></script>
<!-- this page js -->
<script src="../assets/libs/moment/min/moment.min.js"></script>
<script src="../assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="../dist/js/pages/calendar/cal-init.js"></script>