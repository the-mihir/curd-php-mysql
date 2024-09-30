<?php include 'header.php';?>
<?php include 'dbcoon.php';?>



<!-- Index Table code start -->
    <div class="w-75 mx-auto d-flex justify-content-between py-2">
        <h2 class="text-uppercase">All Users Handle</h2>
        <div>
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#input_data" data-bs-whatever="@mdo">
                Add <span><i class="fa-solid fa-plus"></i></span>
            </button>
            <form action="insert.php" method="post">
                <div class="modal fade" id="input_data" tabindex="-1" aria-labelledby="inputDataLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="inputDataLabel">Add User Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3 form-group">
                                    <label for="first_name" class="form-label mt-1">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" required>

                                    <label for="last_name" class="form-label mt-1">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" required>

                                    <label for="handle" class="form-label mt-1">Handle</label>
                                    <input type="text" class="form-control" id="handle" name="handle" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-dark" name="submit" value="Submit">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

       
    </div>

    <div class="d-flex justify-content-center w-75 mx-auto min-h-100 mt-4">
        <table class="table table-striped table-bordered shadow">
            <thead class="table-dark text-center">
                <tr class="table-secondary">
                <th scope="col">Id</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Handle</th> 
                <th scope="col">Update</th> 
                <th scope="col">Delete</th> 
                </tr>
            </thead>
            <tbody>

            <?php
                $query = "SELECT * from `user_handle`";
                $result = mysqli_query($connection, $query);

                if (!$result) {
                    die("Query Failed" . mysqli_error($connection));
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $fname = $row['first_name'];
                        $lname = $row['last_name'];
                        $handle = $row['handle'];
                        echo "<tr>
                                        <th scope='row'>$id</th>
                                        <td>$fname</td>
                                        <td>$lname</td>
                                        <td> <i class='fa-brands fa-twitter border p-2 rounded-circle'></i> <span>/</span> $handle</td>
                                        <td class='text-center'><a href='update.php?id=$id' class='btn btn-dark'    >Update</a></td>
                                        <td class='text-center'><a href='delete.php?id=$id' class='btn btn-danger'>Delete</a></td>
                                       
                                        </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>


<!-- Index Table code End -->

<?php include 'footer.php';?>
