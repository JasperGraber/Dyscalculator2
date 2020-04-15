<?php
$alert = (isset($_GET["alert"]))? $_GET["alert"]: "default";
$id = (isset($_GET["id"]))? $_GET["id"]: "default";
$pwh = (isset($_GET["pwh"]))? $_GET["pwh"]: "default";

switch($alert) {
    case 'no-email': 
        echo '<div class="alert alert-info w-50 mx-auto mt-5 text-center" role="alert"> vul je emailadres in! </div>';
        header("Refresh: 3; url=./index.php?content=register");
    break;
    case 'emailexists':
        echo '<div class="alert alert-danger w-50 mx-auto mt-5 text-center" role="alert"> Het door u ingevulde e-mailadres bestaat al in de database. </div>';
        header("Refresh: 3; url=./index.php?content=register");
    break;
    case 'register-success':
        echo '<div class="alert alert-success w-50 mx-auto mt-5 text-center" role="alert"> uw e-mailadres is geregistreerd, u ontvangt een activatiemail </div>';
        header("Refresh: 3; url=./index.php?content=register");
    break;
    case 'register-error':
        echo '<div class="alert alert-danger w-50 mx-auto mt-5 text-center" role="alert"> Het registratie process is afgebroken, probeer het opnieuw </div>';
        header("Refresh: 3; url=./index.php?content=register");
    break;
    case 'hacker-alert':
        echo '<div class="alert alert-danger w-50 mx-auto mt-5 text-center" role="alert"> U heeft geen rechten op deze pagina</div>';
        header("Refresh: 3; url=./index.php?content=home");
    break;
    case 'password-empty':
        echo '<div class="alert alert-warning w-50 mx-auto mt-5 text-center" role="alert"> U heeft een van beide wachtwoordvelden niet ingevuld, probeer het opnieuw.</div>';
        header("Refresh: 3; url=./index.php?content=activation&id=$id&pwh=$pwh");
    break;
    case 'nomatch-password':
        echo '<div class="alert alert-warning w-50 mx-auto mt-5 text-center" role="alert"> Uw ingevulde wachtwoorden zijn niet gelijk, probeer het opnieuw.</div>';
        header("Refresh: 3; url=./index.php?content=activation&id=$id&pwh=$pwh");
    break;
    case 'no-id-pwh-match':
        echo '<div class="alert alert-warning w-50 mx-auto mt-5 text-center" role="alert"> U bent niet geregistreerd in de database, u wordt doorgestuurd naar de registratiepagina.</div>';
        header("Refresh: 3; url=./index.php?content=register");
    break;
    case 'update-success':
        echo '<div class="alert alert-success w-50 mx-auto mt-5 text-center" role="alert"> U bent succesvol geregistreerd, u wordt doorgestuurd naar de loginpagina.</div>';
        header("Refresh: 3; url=./index.php?content=login");
    break;
    case 'update-error':
        echo '<div class="alert alert-danger w-50 mx-auto mt-5 text-center" role="alert"> Het registratieproces is niet gelukt, kies een nieuw wachtwoord.</div>';
        header("Refresh: 3; url=./index.php?content=activation&id=$id&pwh=$pwh");
    break;
    default:
    header("Location: ./index.php?content=home");
break;
}
?>