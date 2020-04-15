<?php
include("./connectDB.php");
include("./functions.php");

$id = sanitize($_POST["id"]);
$pwh = sanitize($_POST["pwh"]);
$password = sanitize($_POST["password"]);
$passwordCheck = sanitize($_POST["passwordCheck"]);

if (empty($_POST["password"]) ||  empty($_POST["passwordCheck"])) {
    header("Location: ./index.php?content=message&alert=password-empty&id=$id&pwh=$pwh");
} elseif (strcmp($password, $passwordCheck)) {
    header("Location: ./index.php?content=message&alert=nomatch-password&id=$id&pwh=$pwh");
} else {
                $sql = "SELECT * FROM `register` WHERE `id` = $id and `password` = '$pwh'";

                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result)) {
                    // 1. maak een pwh voor nieuw wachtwoord.
                    $password_hash = password_hash($password, PASSWORD_BCRYPT);

                    // 2. update het record.
                    $sql = "UPDATE  `register` 
                            SET     `password` = '$password_hash' 
                            WHERE   `id` = $id
                            AND     `password` = '$pwh'";

                                                        if (mysqli_query($conn, $sql)) {
                                                            // succes.
                                                            header("Location: ./index.php?content=message&alert=update-success");
                                                        } else {
                                                            // error.
                                                            header("Location: ./index.php?content=message&alert=update-error&id=$id&pwh=$pwh");
                                                        }

                    // 3. feedback naar gebruiker.


    } else {
        // foutmelding
        header("Location: ./index.php?content=message&alert=no-id-pwh-match");
    }
}