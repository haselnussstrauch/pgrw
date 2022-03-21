<?php
session_start();
require_once 'session.php';

require_once 'database.php';
require_once 'name.class.php';

if(isset($_GET["action"]))
{
    if($_GET["action"]=="get_details_table")
    {
        if(isset($_GET["id"]))
        {
            $name = new Name($dbh);
            echo $name->GetNameDetailsTable($_GET["id"]);
        }
        else
        {
            echo "id not set";
        }
    }
    else if($_GET["action"]=="add")
    {
        if(isset($_GET["name"]))
        {
            $name = new Name($dbh);
            echo json_encode($name->Add($_GET["name"]));
        }
        else
        {
            echo "id not set";
        }
    }
    else if($_GET["action"]=="rename")
    {
        if(isset($_GET["name"]) && isset($_GET["id"]))
        {
            $name = new Name($dbh);
            echo json_encode($name->Rename($_GET["name"],$_GET["id"]));
        }
        else
        {
            echo "id not set";
        }
    }
    else if($_GET["action"]=="get_select")
    {
        if(isset($_GET["id"]))
        {
            $nameListe = new NameListe($dbh);
            echo $nameListe->GetNamenListe_Select($_GET["id"]);
        }
        else
        {
            echo "id not set";
        }
    }
    else if($_GET["action"]=="add_stimme")
    {
        if(isset($_GET["id"]))
        {
            $name = new Name($dbh);
            echo json_encode($name->AddStimme($_GET["id"]));
        }
        else
        {
            echo "id not set";
        }
    }
    else if($_GET["action"]=="del_stimme")
    {
        if(isset($_GET["id"]))
        {
            $name = new Name($dbh);
            echo json_encode($name->DelStimme($_GET["id"]));
        }
        else
        {
            echo "id not set";
        }
    }


    
}
?>
