<?php
require_once('../yhteiset/funktiot.php');
require_once('../yhteiset/dbyhteys.php');
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<style>
p{
font-size:10px;
}
</style>
</head>
<body>
<?php
$suola='bujaka';

if(!empty($_POST['Etunimi'])):
	$data=array();
	$data['Etunimi'] = $_POST['Etunimi'];
	$data['Sukunimi'] = $_POST['Sukunimi'];
	$data['Syntymaaika'] = $_POST['Syntymaaika'];
	$data['Katuosoite'] = $_POST['Katuosoite'];
	$data['Postinumero'] = $_POST['Postinumero'];
	$data['Email'] = $_POST['Email'];
	$data['Puh'] = $_POST['Puh'];
	$data['Tunnus'] = $_POST['Tunnus'];
	$data['Salasana'] = md5($_POST['Salasana'].$suola);
	
	$lauseke1='/^[a-z0-9\+\-_]+(\.[a-z0-9\+\-_]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*\.[a-z]{2,6}$/i'; //sähköposti
	$lauseke2="/^.*(?=.{5,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/"; //salasana-muoto, järjestyksessä: väh 5 merkkiä, yksi nro, pieni kirjain ja iso kirjain
	$lauseke3="/^[0-9]{8,10}$/"; //puhelinnumero
	$lauseke4="/^[0-9]{1,2}\.[0-9]{1,2}\.[0-9]{2,4}/"; //syntymäaika
	$lauseke5="/[0-9]{5}/"; //postinumero
	$lauseke6="/[a-zA-Z0-9\+\-_]{3,15}/"; //Käyttäjätunnus

if(empty($_POST['Etunimi']) or empty($_POST['Sukunimi']) or empty($_POST['Syntymaaika']) or empty($_POST['Katuosoite']) or empty($_POST['Postinumero']) or empty($_POST['Email']) or empty($_POST['Tunnus']) or empty($_POST['Salasana'])){
echo "<h3 style=\"color:red\">Täytä kaikki tähdellä merkityt kentät</h3>";	
} elseif (!preg_match($lauseke4, $data['Syntymaaika'])){	
echo "<h3 style=\"color:red\">Syntymäaika on virheellinen</h3>";
} elseif (!preg_match($lauseke5, $data['Postinumero'])){	
echo "<h3 style=\"color:red\">Postinumero ei kelpaa</h3>";
} elseif (!preg_match($lauseke1, $data['Email'])){	
echo "<h3 style=\"color:red\">Sähköpostiosoite ei kelpaa</h3>";
} elseif (!preg_match($lauseke3, $data['Puh'])){	
echo "<h3 style=\"color:red\">Puhelinnumero on virheellinen</h3>";
} elseif (!preg_match($lauseke6, $data['Tunnus'])){	
echo "<h3 style=\"color:red\">Käyttäjätunnus ei kelpaa</h3><br>- Tunnuksen tulee olla 3-15 merkkiä pitkä";
} elseif (!preg_match($lauseke2, $_POST['Salasana'])){	
echo "<h3 style=\"color:red\">Salasana ei kelpaa</h3> <br>- Salasanan tulee olla väh. 5 merkkiä pitkä <br>- Salasanaan tulee sisältyä isoja ja pieniä kirjaimia sekä väh. yksi numero";

} else {				
try {
	$STH = $DBH->prepare("INSERT INTO MOBEL (Etunimi, Sukunimi, Syntymaaika, Katuosoite, Postinumero, Email, Puh, Tunnus, Salasana) VALUES (:Etunimi, :Sukunimi, :Syntymaaika, :Katuosoite, :Postinumero, :Email, :Puh, :Tunnus, :Salasana);");
	$STH->execute($data);
	echo '<h3>Rekisteröinti onnistui!</h3>';
	}
	catch(PDOException $e) {
	echo "<h3 style=\"color:red\">Käyttäjätunnus on jo olemassa.</h3><br>Tietojen rekisteröinti ei onnistunut.";
	file_put_contents('../loki/PDOErrors.txt', $e->getMessage(), FILE_APPEND);
	}
	}
else :
?>
<form name="myForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<p>Etunimi<span style="color:red">*</span>			<input type="text" name="Etunimi"></p>
	<p>Sukunimi<span style="color:red">*</span> 		<input type="text" name="Sukunimi"></p>
	<p>Syntymäaika<span style="color:red">*</span> 		<input type="text" name="Syntymaaika"></p>
	<p>Katuosoite<span style="color:red">*</span>		<input type="text" name="Katuosoite"></p>
	<p>Postinumero<span style="color:red">*</span> 		<input type="text" name="Postinumero"></p>
	<p>Sähköpostiosoite<span style="color:red">*</span> <input type="text" name="Email"></p>
	<p>Puh.nro										+358<input type="text" name="Puh"></p>
	</br>
	<p>Käyttäjätunnus<span style="color:red">*</span>  (3-15 merkkiä) <input type="text" name="Tunnus"></p>
	<p>Salasana<span style="color:red">*</span> (väh. 5 merkkiä; tulee sisältää numeron ja isoja sekä pieniä kirjaimia) <input type="password" name="Salasana"> </p>
	<input type="submit" value="Tallenna">
</form>
 <?php
 endif;
 ?>
</body>
</html>