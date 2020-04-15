<?php
    // Check of er een emailadres is ingevuld.
    if (empty($_POST["email"])) {
        echo("Er is geen email ingevuld");
    } else {
        // Maak contact met de database.
        include("./connectDB.php");
        include("./functions.php");

        // Email array schoonmaken.
        $email = sanitize($_POST["email"]);

        // Select query voor het ingevulde emailadres.
        $sql = "SELECT * FROM `Register` WHERE `Email` = '{$email}'";

        // Query afvuren op database.
        $result = mysqli_query($conn, $sql);

        // Tellen hoeveel record er zijn in de database.
        if (mysqli_num_rows($result)) {
            echo("Dit email is al in gebruik");
        } else {
            $t = time();
            $date = date("d-m-Y", $t);
            $time = date("H:i:s", $t);

            $mut = microtime();

            $cut = explode(" ", $mut);

            $password = $cut[1] * $cut[0];
            $password = "geheim";
            $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO `Register` (`ID`, `Email`, `Password`, `Userrole`) VALUES (NULL, '{$email}', '{$password_hash}', 'Customer')";

        if (mysqli_query($conn, $sql)) {
            $id = mysqli_insert_id($conn);
            $to = $email;
            $subject = "Activatiemail Dyscalculator";
            $message = '<!doctype html>
            <html lang="en">
            <head>
                <style>
                    h1 {
                        color: #e59649;
                    }

                    p, h3 {
                        color: gray;
                    }
                    
                    a {
                        font-weight: bold;
                    }
                </style>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <title>Document</title>
            </head>
            <body>
            <h3>'. $date . ' - ' . $time .'</h3>
            <h1>Beste gebruiker,</h1>
            <p>U heeft zich onlangs geregistreerd op de site http://www.dyscalculator.org. 
            Voor het voltooien van het registratieproces moet u op de onderstaand link 
            klikken.</p>
            
            <p>Klik <a href="http://www.dyscalculator.org/index.php?content=activation&id=' . $id . '&pwh=' . $password_hash . '">hier</a> om uw account te activeren.</p>

            <p>Bedankt voor het registreren</p>
            <p>Met vriendeijke groet,</p>
            <p>Jasper Gräber</p>

            </body>';

            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html;charset=UTF-8\r\n";
            $headers .= "From: admin@dyscalculator.nl\r\n";
        
            mail($to, $subject, $message, $headers);

            echo("U bent succesvol geregistreerd!");
        } else {
            echo("Registratie error.");
        }
    }
    }
?>