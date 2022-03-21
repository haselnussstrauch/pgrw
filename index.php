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

<div class="container-fluid" id="uebersicht">
    <div class="row">

        <div class="col-4 personen-browser">

            <form>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        suche
                    </span>
                    <input type="text" class="form-control" id="filter_name" oninput="filter('filter_name','select_name')">
                </div>

                <button type="button" class="btn btn-success" onclick="addName()">
                    neuer Name
                </button>

                <br>

                <div id="herstellerAuswahlSelect">
                    <!--
                    <?php
                        $nameListe = new NameListe($dbh);
                        echo $nameListe->GetNamenListe_Select();
                    ?>
                    -->
                    </select>
                </div>
            </form>
        </div>
        <div class="col-8 nameDetails">
            <div id="name_details"></div>
        </div>

    </div>

</div>

<script>reloadSelect(0);</script>

<?php
}
include "footer.php";
?>