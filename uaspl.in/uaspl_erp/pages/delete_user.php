<?php
session_start(); ?>

<?php include './header.php'; ?>
<?php include './sidebar.php'; ?>
<?php include './db.php';




// Check if the ID is provided

    $id = $_GET['id'];
    
    // Perform the delete query
    $sql = "DELETE FROM admin WHERE id = $id";
    
    if ($connection->query($sql) === TRUE) {
        echo "<script> alert('User Deleted successfully.....');
                window.location.href='new_user.php' 
                </script>";
    } else {
        echo "Error deleting record: " . $connection->error;
    }

?>