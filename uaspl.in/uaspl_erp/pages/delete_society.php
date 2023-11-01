<?php
session_start(); ?>

<?php include './header.php'; ?>
<?php include './sidebar.php'; ?>
<?php include './db.php';




// Check if the ID is provided

    $society_id = $_GET['society_id'];
    
    // Perform the delete query
    $sql = "DELETE FROM society WHERE society_id = $society_id";
    $sql1 = "Delete from admin where society_id= $society_id ";
    
    if ($connection->query($sql) === TRUE) {
        echo "<script> alert('Society Details Deleted successfully.....');
                window.location.href='society_details.php' 
                </script>";
    } else {
        echo "Error deleting record: " . $connection->error;
    }

?>