<?php
session_start();
if(!isset($_SESSION["admin"]))
{
    $_SESSION["admin"] = false;
} 
require_once 'php/session.php';

if(isset($_GET["activateHoediMode"]))
{
    $_SESSION["admin"] = true;
}
if(isset($_GET["deactivateHoediMode"]))
{
    $_SESSION["admin"] = false;
}

if(isset($_GET["logOut"]))
{
    unset($_SESSION["log"]);
    $_SESSION["admin"] = false;
    header('Location: index.php');
}



function logInForm(){

    echo "<hr>NOT LOGGED IN<hr><input type='password' id='pass' />";
    echo'  <button type="button" class="btn btn-primary" onclick="logIn()">
                LogIn
            </button><hr>';
}

?>



<?php
    require_once("php/tools.php");
    require_once("php/name.class.php");
?>

<?php
require_once "php/database.php";
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8"/>

    <link href="bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <link href="css/main.css" rel="stylesheet">

    <script type="text/javascript" src="js/jquery/jquery-3.6.0.min.js"></script>

    <script type="text/javascript" src="js/name.js"></script>
    <script type="text/javascript" src="js/tools.js"></script>

</head>

<body>

    <?php $filename = basename($_SERVER["SCRIPT_FILENAME"], '.php'); ?>

    <nav class="navbar navbar-expand-lg navbar-dark <?php if($_SESSION["admin"]){ echo "bg-danger";} else {echo "bg-primary";}?>">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php if ($filename == "index") {
                                            echo "active";
                                        } ?>" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link <?php if ($filename == "auswertung") {
                                        echo "active";
                                    } ?>" href="auswertung.php">Auswertung</a>
                </li>
                <?php
                if($_SESSION["admin"])
                {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?deactivateHoediMode">Logg Out H&Ouml;DI</a>
                    </li>
                    <?php
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?logOut">Logg Out</a>
                </li>
            </ul>
        </div>
    </nav>
