<?php
$db = new PDO('mysql:host=localhost;dbname=Login', "root","");
//$mysqli = new mysqli("localhost", "root", "", "Login", 3306);
if ($db->connect_errno) {
    echo "Échec lors de la connexion à la base de donnée : (" . $db->connect_errno . ") " . $db->connect_error;
}

echo $db->host_info . "\n";

/*if (!$mysqli->query("SELECT * FROM acteur") || 
    !$mysqli->query("INSERT INTO acteur(ident_acteur, NOM) VALUES (1, 'ROBERT')")) {
    echo "Test : (" . $mysqli->errno . ") " . $mysqli->error;
}
*/
?>