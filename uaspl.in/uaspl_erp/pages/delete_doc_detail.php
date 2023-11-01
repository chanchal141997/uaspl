<?php
session_start(); ?>

<?php include './header.php'; ?>
<?php include './sidebar.php'; ?>
<?php include './db.php';


// Check if the ID is provided

    $id = $_GET['doc_id'];
    
    // Perform the delete query
    $sql = "DELETE FROM doc_details WHERE doc_id = $id";
    
    if ($connection->query($sql) === TRUE) {
        echo "<script> alert('society Doc Deleted successfully.....');
                window.location.href='dis_doc.php' 
                </script>";
    } else {
        echo "Error deleting record: " . $connection->error;
    }

?>