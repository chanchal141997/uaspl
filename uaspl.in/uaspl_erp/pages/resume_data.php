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
                                $query = "SELECT * FROM `resume` ";
                                $res = mysqli_query($connection, $query);
                                ?>

<div class="page-wrapper">
  <div class="container-fluid">

    
	  
   <?php if ($_SESSION['ROLE'] == 'Admin') { ?>
   
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <th>ID</th>
                                    <th>Candidate Name</th>
                                    <th>Contact No</th>
                                    <th>Email ID</th>
                                   
                                    <th>Resume</th>
									<th> Delete </th>
                                    
                                </thead>

                                <tbody>
                                    <?php

                                    if ($res->num_rows > 0) {
                                        while ($row = $res->fetch_assoc()) {
                                    ?>

                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td> <?php echo $row['no']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td>
                                                    <a  href="<?php echo $row['resume']; ?>" target="_blank"><?php echo $row['resume']; ?></a></td>
                                                <td><a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" href="delete_resume.php?id=<?php echo $row['id']; ?>" class="text-white">Delete</a></td>

                                            </tr>
                                    <?php }
                                    } ?>



                            </table>

                        </div>
                    </div>
                  
            </div>
        </div>
	<?php } ?>

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