<?php
include 'dbcoon.php';
include 'header.php';

// Get the user ID from the URL
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch user data based on the ID
    $query = "SELECT * FROM user_handle WHERE id = '$user_id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $handle = $row['handle'];
    } else {
        echo "Error fetching data: " . mysqli_error($connection);
    }
}

// Update the user data when the form is submitted
if (isset($_POST['update'])) {
    $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
    $handle = mysqli_real_escape_string($connection, $_POST['handle']);

    // Update query
    $query = "UPDATE user_handle SET first_name = '$first_name', last_name = '$last_name', handle = '$handle' WHERE id = '$user_id'";
    $update_result = mysqli_query($connection, $query);

    if ($update_result) {
        echo "Data updated successfully!";
        header("Location: index.php"); // Redirect to the table page after updating
        exit();
    } else {
        echo "Error updating data: " . mysqli_error($connection);
    }
}
?>

<h2 class="text-Capitalize text-center">Updating Data</h2>
<div class="container">
    <div class=" d-flex justify-content-between p-2">
        <form action="" method="post" class="w-75 border shadow p-3 mx-auto">
            <div class="mb-3 form-group p-3">
                <label for="first_name" class="form-label mt-1">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $first_name; ?>" required>

                <label for="last_name" class="form-label mt-1">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $last_name; ?>" required>

                <label for="handle" class="form-label mt-1">Handle</label>
                <input type="text" class="form-control" id="handle" name="handle" value="<?php echo $handle; ?>" required>
            </div>
            <button type="submit" class="btn btn-dark w-100" name="update">Update</button>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>
