<?php

class NameListe {

    private $dbh;
    private $liste;
    private $loaded;

    function __construct($database) {
        $this->dbh = $database;
        $this->liste = array();
        $this->loaded = false;
    }

    private function loadNamen()
    {
        if(!$this->loaded)
        {
            foreach ($this->dbh->query('SELECT * from person') as $row) {
                array_push($this->liste, $row);
             }

             $this->loaded = true;
        }
    }

    function GetNamenListe()
    {
        $this->loadNamen();
        
        return $this->liste;
    }

    function GetNamenListe_Select($id=0)
    {
        $this->loadNamen();

        $output = '<select class="form-select" id="select_name" onchange="nameAuswahlChanged(this.value)" size="20">';

        foreach($this->liste as $name)
        {
            $output.="<option value='".$name["id"]."' ";
            
            if($name["id"] == $id)
            {
                $output.= "selected ";
            }

            $output .=">".$name["name"]."</option>";
        }

        if($id != 0)
        {
            $output.="<script>nameAuswahlChanged(".$id.");</script>";
        }

        $output .= '</select>';

        return $output;
    }

    function GetNamenListe_Full()
    {
        $output = "<table style='border: 1px solid #000;'>";

        foreach($this->dbh->query('SELECT *,COUNT(*) AS anzahl FROM person AS p JOIN stimme AS s ON p.id=s.person_id GROUP BY p.id ORDER BY anzahl DESC') as $name)
        {
            $output.= "<tr><td style='border: 1px solid #000;padding:10px;'>".$name["name"]."</td><td style='border: 1px solid #000;padding:10px;'>".$name["anzahl"]." Stimmen</td></tr>";
        }

        $output .= "</table>";

        $output .= "<textarea>";
        foreach($this->dbh->query('SELECT *,COUNT(*) AS anzahl FROM person AS p JOIN stimme AS s ON p.id=s.person_id GROUP BY p.id ORDER BY anzahl DESC') as $name)
        {
            $output.= $name["name"].";".$name["anzahl"].";\n";
        }
        $output .= "</textarea>";

        return $output;
    }
}

class Name {

    private $dbh;
    private $details;
    private $loadedId=-1;

    function __construct($database) {
        $this->dbh = $database;
        $this->details = array();
    }

    private function loadName($id)
    {
        if(!$this->loadedId != $id)
        {
            foreach ($this->dbh->query('SELECT * from person WHERE id='.$id) as $row) {
                array_push($this->details, $row);
             }

             $this->loadedId = $this->details[0]["id"];
        }
    }

    function GetNameDetailsTable($id)
    {
        $this->loadName($id);
        $output = "";

        $output.= "<h2>".$this->details[0]["name"]."</h2>";

        if($_SESSION["admin"]){
            $output.='<hr><input type="text" id="neuerName" value="'.$this->details[0]["name"].'"/>';
            $output.='  <button type="button" class="btn btn-primary" onclick="rename('.$id.')">
                        Umbenennen
                    </button><hr>';
        }

        $output.='  <button type="button" class="btn btn-success" onclick="addStimme('.$id.')">
                        neue Stimme
                    </button>';

               
        $anzahl = 0;

        foreach ($this->dbh->query('SELECT COUNT(*) AS anzahl FROM stimme WHERE person_id ='.$id) as $row) {
            $anzahl = $row['anzahl'];
        }

        $output.= "<h3>".$anzahl." Stimmen</h3>";

        $output.="<table>";
        
        foreach ($this->dbh->query('SELECT * from stimme WHERE person_id = '.$id.' ORDER BY timestamp DESC') as $row) {
            $output.="<tr><td>".$row['timestamp']."</td>";
            
            if($_SESSION["admin"]){
                $output.="<td><button type=\"button\" class=\"btn btn-danger\" onclick=\"delStimme(".$row['id'].")\">LÖSCHEN!</button></td>";
            }

            $output.="</tr>";
        }

        $output.="</table>";

        return $output;
    }

    function Add($name)
    {
        $this->dbh->query('INSERT IGNORE INTO person (name) VALUES("'.$name.'")');

        foreach ($this->dbh->query('SELECT * from person ORDER BY id DESC LIMIT 1') as $row) {
            $this->loadName($row['id']);
        }

        //$this->dbh->query('INSERT INTO stimme (person_id) VALUES('.$this->details[0]["id"].')');

        $output = "";

        $output.= $this->GetNameDetailsTable($this->details[0]["id"]);

        $return["html"] = $output;
        $return["id"] = $this->details[0]["id"];

        return $return;
    }

    function Rename($name,$id)
    {
        $this->dbh->query('UPDATE person SET name="'.$name.'" WHERE id='.$id);

        //$this->dbh->query('INSERT INTO stimme (person_id) VALUES('.$this->details[0]["id"].')');

        $output = "";

        $output.= $this->GetNameDetailsTable($id);

        $return["html"] = $output;
        $return["id"] = $id;

        return $return;
    }
    function AddStimme($id)
    {
        $this->dbh->query('INSERT INTO stimme (person_id) VALUES('.$id.')');

        $output = "";

        $output.= $this->GetNameDetailsTable($id);

        $return["html"] = $output;
        $return["id"] = $id;

        return $return;
    }

    function DelStimme($id)
    {
        $person_id = 0;

        foreach ($this->dbh->query('SELECT person_id FROM stimme WHERE id ='.$id) as $row) {
             $person_id = $row['person_id'];
        }

        $this->dbh->query('DELETE FROM stimme WHERE id='.$id);

        $output = "";

        $output.= $this->GetNameDetailsTable($person_id);

        $return["html"] = $output;
        $return["id"] = $person_id;

        return $return;
    }
}

?>