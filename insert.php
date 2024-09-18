<?php

include 'connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set and not empty
    $first_name = isset($_POST['first_name']) && !empty($_POST['first_name']) ? mysqli_real_escape_string($conn, $_POST['first_name']) : null;
    $last_name = isset($_POST['last_name']) && !empty($_POST['last_name']) ? mysqli_real_escape_string($conn, $_POST['last_name']) : null;
    $handle = isset($_POST['handle']) && !empty($_POST['handle']) ? mysqli_real_escape_string($conn, $_POST['handle']) : null;

    if ($first_name && $last_name && $handle) {
        // Proceed with database insertion
        $sql = "INSERT INTO users (first_name, last_name, handle) VALUES ('$first_name', '$last_name', '$handle')";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "All fields are required.";
    }
}
header("Location: index.php");