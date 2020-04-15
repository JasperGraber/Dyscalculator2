<?php
    // Een functie maken op een array schoon te maken.
    function sanitize($raw_data)
    {
        global $conn;
        $data = htmlspecialchars($raw_data);
        $data = mysqli_real_escape_string($conn, $data);
        return $data;
    }
?>