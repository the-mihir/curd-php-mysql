<?php 

include 'dbcoon.php';

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $handle = $_POST['handle'];

    if($first_name == "" || $last_name == "" || $handle == ""){
        header("Location: index.php? message=empty");
    } else {
        $query = "INSERT INTO `user_handle`(`first_name`, `last_name`, `handle`) VALUES ('$first_name', '$last_name', '$handle')";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            header("Location: index.php? message=success");
        }
    }
}