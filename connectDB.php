<?php
    // Verbinding maken met de database.
    define("SERVERNAME", "localhost:3308");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DATABASENAME", "dyscalculator");

    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASENAME);
?>