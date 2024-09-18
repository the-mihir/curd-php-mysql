<?php 
include 'dbcoon.php'; 

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Prepare the DELETE query
    $query = "DELETE FROM user_handle WHERE id = '$user_id'";
    $result = mysqli_query($connection, $query);

    // If the deletion was successful, redirect to the index page
    if ($result) {
        header("Location: index.php");
        exit();
    } else { 
        // Handle any errors
        echo "Error deleting data: " . mysqli_error($connection);
    }
}

include 'header.php'; // Load the header after processing the deletion
include 'footer.php'; // Load the footer
?>
