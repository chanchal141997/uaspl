<?php
session_start(); ?>

<?php include './db.php'; ?>
<?php
$id = $_GET['society_id'];


$sql = "SELECT * FROM `doc_details` WHERE society_id ='$id' "; // Replace with the appropriate query
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fileDataJson = $row['Doc1'];
    
    // Decode the JSON data
    $fileData = json_decode($fileDataJson, true);

    if (is_array($fileData)) {
        echo "<h2>Uploaded Files</h2>";
        echo "<ul>";
        foreach ($fileData as $file) {
            echo "<li><a href='../doc/" . $file['filename'] . "'>" . $file['filename'] . "</a> (Size: " . $file['filesize'] . " bytes)</li>";
        }
        echo "</ul>";
    } else {
        echo "No files uploaded yet.";
    }
} 
$connection->close();
?>
