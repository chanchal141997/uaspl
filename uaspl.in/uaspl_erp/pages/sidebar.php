<?php

// Include database connection file
include_once('db.php');


?>



<aside class="left-sidebar" data-sidebarbg="skin5">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav" class="pt-4">
        <?php if ($_SESSION['ROLE'] == 'Society') { ?>


          <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="society_dashboard.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Society-Dashboard</span></a>
          </li>
          <!-- <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="upload_invoice.php" aria-expanded="false"><i class="mdi mdi-auto-upload"></i><span class="hide-menu">Upload Documents</span></a>
          </li> -->
          <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="society_profile.php" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Profile</span></a>
          </li>
        <?php } ?>
        <?php if ($_SESSION['ROLE'] == 'Admin') { ?>
         
          <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../s_register.php" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Society Registration</span></a>
          </li>
		   <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="./new_society.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">New Society</span></a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="./society_details.php" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Society List</span></a>
          </li>
		   <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="upload_doc.php" aria-expanded="false"><i class="mdi mdi-pencil"></i><span class="hide-menu">Upload Documents</span></a>
          </li>
		  
          <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="./dis_doc.php" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Docs Details</span></a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="./new_user.php" aria-expanded="false"><i class="mdi mdi-account-plus"></i><span class="hide-menu">User Set Up</span></a>
          </li>
		  <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="./s_login_data.php" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Society Login Data</span></a>
          </li>
		  <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="./resume_data.php" aria-expanded="false"><i class="mdi mdi-pencil"></i><span class="hide-menu">Resume Data</span></a>
          </li>
		   <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="upload_OngoingP.php" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M9 7h4a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-2v4H9V7m2 2v2h2V9h-2m1-7a10 10 0 0 1 10 10a10 10 0 0 1-10 10A10 10 0 0 1 2 12A10 10 0 0 1 12 2m0 2a8 8 0 0 0-8 8a8 8 0 0 0 8 8a8 8 0 0 0 8-8a8 8 0 0 0-8-8Z"/></svg><span class="hide-menu">Upload Ongoing Projects</span></a>
          </li>
		  <?php } ?>
        <?php if (($_SESSION['ROLE'] == 'Emp')  || ($_SESSION['ROLE'] == 'accountant') ){ ?>
          <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="emp_dashboard.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Emp-Dashboard</span></a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="upload_doc.php" aria-expanded="false"><i class="mdi mdi-pencil"></i><span class="hide-menu">Upload Documents</span></a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dis_doc.php" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Documents Details</span></a>
          </li>
		  
        <?php } ?>
        <li class="sidebar-item p-2 ">
          <a href="logout.php" class="
                    btn btn-cyan
                    d-flex
                    align-items-center
                    text-white
                  " aria-expanded="false"><i class="mdi mdi-cloud-download font-20 me-2"></i><span class="hide-menu">Logout</span></a>
        </li>
      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>