<?php
session_start();
require_once 'session.php';

require_once 'config.php';
require_once 'database.php';
require_once 'name.class.php';

if(isset($_GET["pass"]))
{
    if($_GET["pass"] == $CONFIG_USER_PASS)
    {
        $_SESSION["log"] = true;
        echo "OK";
    }
    else if($_GET["pass"] == $CONFIG_ADMIN_PASS)
    {
        $_SESSION["log"] = true;
        $_SESSION["admin"] = true;
        echo "OK";
    }
    else
    {
        unset($_SESSION["log"]);
        $_SESSION["admin"] = false;
    }
}
else
{
    unset($_SESSION["log"]);
    $_SESSION["admin"] = false;
}

?>