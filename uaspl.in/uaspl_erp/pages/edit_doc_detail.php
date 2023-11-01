<?php
session_start(); ?>
<?php include './header.php'; ?>
<?php include './sidebar.php'; ?>
<?php include './db.php'; ?>
<?php
$id = $_GET['society_id'];

$display_sql = "select  * from `doc_details` where society_id='$id'";
$query = mysqli_query($connection, $display_sql);


if ($query->num_rows > 0) {

    while ($row = $query->fetch_assoc()) {
?>

<?php
if (isset($_POST['upload'])) {
    $society_id=$_GET['society_id'];
    $s_name = $_POST['s_name'];
     $s_r_no= $_POST['s_r_no'];
     $c_no = $_POST['c_no'];
   
    $comment = $_POST['comment'];

    $Doc1 = $_FILES['Doc1'];
    $Doc2 = $_FILES['Doc2'];
    $Doc3 = $_FILES['Doc3'];
    $Doc4 = $_FILES['Doc4'];
    $Doc5 = $_FILES['Doc5'];


    $filename = $Doc1['name'];
    $filerrror = $Doc1['error'];
    $filetmp = $Doc1['tmp_name'];
    $fileext = explode('.', $filename);
    $filecheck = strtolower(end($fileext));
    $fileextstored = array('png', 'pdf', 'jpeg');

    $filename1 = $Doc2['name'];
    $filerrror1 = $Doc2['error'];
    $filetmp1 = $Doc2['tmp_name'];
    $fileext1 = explode('.', $filename1);
    $filecheck1 = strtolower(end($fileext1));
    $fileextstored1 = array('png', 'pdf', 'jpeg');

    $filename2 = $Doc3['name'];
    $filerrror2 = $Doc3['error'];
    $filetmp2 = $Doc3['tmp_name'];
    $fileext2 = explode('.', $filename1);
    $filecheck2 = strtolower(end($fileext1));
    $fileextstored2 = array('png', 'pdf', 'jpeg');

    $filename3 = $Doc4['name'];
    $filerrror3 = $Doc4['error'];
    $filetmp3 = $Doc4['tmp_name'];
    $fileext3 = explode('.', $filename1);
    $filecheck3 = strtolower(end($fileext1));
    $fileextstored3 = array('png', 'pdf', 'jpeg');

    $filename4 = $Doc5['name'];
    $filerrror4 = $Doc5['error'];
    $filetmp4 = $Doc5['tmp_name'];
    $fileext4 = explode('.', $filename1);
    $filecheck4 = strtolower(end($fileext1));
    $fileextstored4 = array('png', 'pdf', 'jpeg');


   
        $destinationfile = '../doc/' . $filename;
        $destinationfile1 = '../doc/' . $filename1;
        $destinationfile2 = '../doc/' . $filename2;
        $destinationfile3 = '../doc/' . $filename3;
        $destinationfile4 = '../doc/' . $filename4;

        move_uploaded_file($filetmp, $destinationfile);
        move_uploaded_file($filetmp1, $destinationfile1);
        move_uploaded_file($filetmp2, $destinationfile2);
        move_uploaded_file($filetmp3, $destinationfile3);
        move_uploaded_file($filetmp4, $destinationfile4);
      
        $q = " update `doc_details` set s_name ='$s_name', s_r_no='$s_r_no', c_no='$c_no', Doc1='$destinationfile', Doc2='$destinationfile1' ,Doc3='$destinationfile2',
        Doc4='$destinationfile3',Doc5='$destinationfile4' where society_id= '$society_id' ";

                $query = mysqli_query($connection, $q);
                if ($query) {
                    echo "<script>
                alert('Doc Details Updated succussfully!!');
                window.location.href='dis_doc.php'
            </script>";
                }else{
                    echo "<script> alert('Doc Details Not Updated succussfully!!')     </script>";
                }
            }
            
     

        ?>
       

        <div class="main-wrapper">
            <div class=" w-100 d-flex no-block justify-content-center align-items-center  ">

                <div class="container-fluid" style="width: 60vw; align-items:center; margin-top:50px">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <form class="form-horizontal" enctype='multipart/form-data' action='#' method='post'>
                                    <div class="card-body">
                                        <h4 class="card-title"> Upload Documents</h4>
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-3 text-end control-label col-form-label">Society Name <span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="fname" name="s_name" value="<?php echo $row['s_name']; ?>" required />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 text-end control-label col-form-label">Society Registration No <span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="" name="s_r_no" value="<?php echo $row['s_r_no'] ?>" required />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 text-end control-label col-form-label">Contact No. <span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="" name="c_no" value="<?php echo $row['c_no'] ?>" required />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-4 text-end control-label col-form-label">Attach Doc <span class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" id="lname" name="Doc1" name="<?php echo $row['Doc1'] ?>" /><?php echo $row['Doc1'] ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-4 text-end control-label col-form-label">Attach Doc<span class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" id="lname" name="Doc2" name="<?php echo $row['Doc2'] ?>" /><?php echo $row['Doc2'] ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-4 text-end control-label col-form-label">Attached Doc <span class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" id="lname" name="Doc3" name="<?php echo $row['Doc3'] ?>" /><?php echo $row['Doc3'] ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-4 text-end control-label col-form-label">Attach Doc </label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" id="lname" name="Doc4" name="<?php echo $row['Doc4'] ?>" /><?php echo $row['Doc4'] ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-4 text-end control-label col-form-label">Attech doc</label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" id="lname" name="Doc5" name="<?php echo $row['Doc5'] ?>" /><?php echo $row['Doc5'] ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-4 text-end control-label col-form-label">Comments</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="lname" name="comment" maxlength="200" />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="border-top">
                                        <div class="card-body">
                                            <input type="submit" name="upload" class="btn btn-info" value="Upload">

                                            <a href="dis_doc.php" class="btn btn-danger" value="Cancel">Cancel</a>

                                        </div>
                                    </div>
                                </form>
                        <?php }
                } ?>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>








        <?php include 'footer.php'; ?>