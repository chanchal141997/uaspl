<?php include './db.php'; ?>
<?php
if (isset($_POST['upload'])) {

    $society_id = $_GET['society_id'];
    $s_name = $_POST['s_name'];
    $s_r_no = $_POST['s_r_no'];
    $c_no = $_POST['c_no'];
    $comment = $_POST['comment'];
    $files = $_FILES['files'];

    $fileData = []; // Array to store file information

    $fileCount = count($files['name']);

    for ($i = 0; $i < $fileCount; $i++) {
        $fileName = $files['name'][$i];
        $tmpName = $files['tmp_name'][$i];
        $fileSize = $files['size'][$i];
        
        // Upload the file to a directory
        $uploadPath = "../doc/" . $fileName;
        move_uploaded_file($tmpName, $uploadPath);
        
        // Store file information in the array
        $fileData[] = [
            'filename' => $fileName,
            'filesize' => $fileSize
        ];
    }

    // Convert the file information array to JSON
    $fileDataJson = json_encode($fileData);

    // Insert the JSON data into the database
    $sql = "INSERT INTO `doc_details`(`society_id`, `s_name`, `s_r_no`, `c_no`, `Doc1`) VALUES ('$society_id','$s_name',' $s_r_no',' $c_no','$fileDataJson')";
    if ($connection->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }         
    echo "Files uploaded and data stored successfully.";
}

$connection->close();
?>