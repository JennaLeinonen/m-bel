<?php 
if (isset($_POST['Submit']))
{
$testi = array (
nimi=>$_POST['nimi'],
email=>$_POST['email'],
puhelinnumero=>$_POST['puhelin'],
viesti=>$_POST['viesti'],
);
foreach ($testi as $arvo) //taulukku läpi
{
if (empty($arvo)) //jos kaikkia kohtia ei täytetä
{ //paluu
die("Muista täyttää kaikki tarvittavat tiedot! <a 
href=yhteystiedot.php>Takaisin </a><br>");
}
}


// globaaleja muuttujia, kelle viesti lähtee ja mitä sisältää jne
$to = "jenna.h.leinonen@metropolia.fi"; 
$from = "nettisivut"; 
$subject = "Yhteydenotto nettisivujen kautta."; 
$nimi = $_POST['nimi']; 
$puhelinnumero = $_POST['puhelin'];
$email = $_POST['email'];
$viesti = $_POST['viesti'];

//mitä tulee meiliin
$message = "Yhteydenotto nettisivuilta: " . "\n\n".
	   "Nimi: " . $nimi . "\n".
	   "Email: " . $email . "\n".	
	   "Puh: " . $puhelinnumero . "\n".
	   "Viesti: " . "\n".
	   $viesti . "\n\n\n";


//otsikko
$headers = "From: $from"; 

// meilin lähetys ok niin viesti ruutuun
$ok = @mail($to, $subject, $message, $headers); 
if ($ok) {
echo "<p>Yhteydenottonne on lähtenyt sähköpostilla eteenpäin. Kiitos!</p> \n";



?> 
<?
} else {  
echo "Virhe!";
} 
}
?>