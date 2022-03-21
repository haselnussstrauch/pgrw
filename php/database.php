<?php
    include 'config.php';
?>

<?php

try {
   $dbh = new PDO('mysql:host='.$CONFIG_DB_HOST.';dbname='.$CONFIG_DB_DATABASE, $CONFIG_DB_USER, $CONFIG_DB_PASS);
   /*
   foreach ($dbh->query('SELECT * from projekt') as $row) {
      print_r($row);
   }
   */
} catch (PDOException $e) {
   print "Error!: " . $e->getMessage() . "<br/>";
   die();
}


?>