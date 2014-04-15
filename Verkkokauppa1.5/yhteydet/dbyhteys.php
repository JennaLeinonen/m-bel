<?php
//Määritetään hostin osoite, tietokannan nimi, käyttäjänimi sekä salasana
$host='mysql.metropolia.fi'; //voi myös laittaa 'localhost'
$dbname='marikaas';
$user='marikaas';
$pass='marikaas';


//Yritetään tehdä uusi dbh-objekti, jos ei onnistu, tulostetaan virheraportti käyttäjlle ja adminille luodaan virheloki
try {
 $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
 $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
 $DBH->query("SET NAMES utf8;");
}
catch(PDOException $e) {
 echo "Could not connect to database.";
 file_put_contents('../../loki/PDOErrors.txt', $e->getMessage(), FILE_APPEND);
}

$mysqli = new mysqli($host, $dbname, $pass, $dbname);
?>