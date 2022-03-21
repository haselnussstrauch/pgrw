<?php
include "header.php";
?>


<?php
if(!isset($_SESSION["log"]))
{
    logInForm();
}
else
{
?>


<?php
                        $nameListe = new NameListe($dbh);
                        echo $nameListe->GetNamenListe_Full();
                    ?>


<?php
}
include "footer.php";
?>