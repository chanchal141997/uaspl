<?php
session_start(); ?>
<?php include './header.php'; ?>
<?php include './sidebar.php'; ?>
<?php include './db.php'; ?>
<?php
$society_id = $_GET['society_id'];
$sql = "select * from society where society_id='$society_id'";
$res = mysqli_query($connection, $sql);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
?>
        <?php
        if (isset($_POST['upload'])) {
            $society_id = $_GET['society_id'];
            $s_name = $_POST['s_name'];
            $s_r_no = $_POST['s_r_no'];
            $c_no = $_POST['c_no'];

            $files = $_FILES['files'];

            $fileData = []; // Array to store file information
        
            $fileCount = count($files['name']);
        
            for ($i = 0; $i < $fileCount; $i++) {
                $fileID=$i;
                $fileName = $files['name'][$i];
                $tmpName = $files['tmp_name'][$i];
                $fileSize = $files['size'][$i];
                
                // Upload the file to a directory
                $uploadPath = "../doc/" . $fileName;
                move_uploaded_file($tmpName, $uploadPath);
                
                // Store file information in the array
                $fileData[] = [
                    'fileID' => $i,
                    'filename' => $fileName,
                    'filesize' => $fileSize
                ];
            }
        
            // Convert the file information array to JSON
            $fileDataJson = json_encode($fileData);
        
            // Insert the JSON data into the database
            $sql = "INSERT INTO `doc_details`(`society_id`, `s_name`, `s_r_no`, `c_no`, `Doc1`) VALUES ('$society_id','$s_name',' $s_r_no',' $c_no','$fileDataJson')";
            echo '<script> alert("Doc Added successfully.....")</script>';
            if ($connection->query($sql) === FALSE) {
                echo "Error: " . $sql . "<br>" . $connection->error;
            }         
            echo "Files uploaded and data stored successfully.";
        }
        
        $connection->close();
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
                                            <label for="lname" class="col-sm-3 text-end control-label col-form-label">Attach Doc<span class="text-danger">*</span></label>
                                            <div class="col-sm-8" id="fileInputs">
                                                <!-- Initial file input field -->
                                                <input type="file" name="files[]">
                                                <button type="button" id="addFileInput">Add Another File</button>
                                            </div>
                                            
      

                                        </div>

                                            <!--  <div class="form-group row">
                                            <label for="lname" class="col-sm-4 text-end control-label col-form-label">Attach Doc<span class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" id="lname" name="Doc1" required />
                                            </div>
                                        </div>
                                       <div class="form-group row">
                                            <label for="lname" class="col-sm-4 text-end control-label col-form-label">Attach Doc<span class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" id="lname" name="Doc2" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-4 text-end control-label col-form-label">Attached Doc <span class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" id="lname" name="Doc3" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-4 text-end control-label col-form-label">Attach Doc </label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" id="lname" name="Doc4" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-4 text-end control-label col-form-label">Attech doc</label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" id="lname" name="Doc5" />
                                            </div>
                                        </div> -->
                                            <!-- <div class="form-group row">
                                                <label for="lname" class="col-sm-4 text-end control-label col-form-label">Comments</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="lname" name="comment" maxlength="200" />
                                                </div>
                                            </div> -->





                                        </div>
                                        <div class="border-top">
                                            <div class="card-body">
                                                <input type="submit" name="upload" class="btn btn-info" value="Upload">

                                                <a href="society_details.php" class="btn btn-danger" value="Cancel">Cancel</a>

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

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#addFileInput').click(function() {
                    $('#fileInputs').append('<input type="file" name="files[]">');
                });
            });
        </script>













        <?php include 'footer.php'; ?>