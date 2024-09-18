<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', 'admin');
define('DB', 'curd_oparation');


$connection = mysqli_connect(HOST, USER, PASS, DB);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "<h4 class='text-center fs-3 fw-normal'>Getting Data From Database</h4>";
}

?>