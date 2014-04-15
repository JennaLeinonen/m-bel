<?php 
session_start();
require_once('../yhteydet/dbyhteys.php');
require_once('../yhteydet/funktiot.php');
require_once('../yhteydet/dbFunctions.php');


// jos kirjautumistiedot on lähetetty, tarkistetaan sähköposti ja salasana
if( !empty($_POST['email']) && !empty($_POST['pwd']) ){
// jos oikein, vaihdetaan login loggediksi
	if(check_user($_POST['email'],$_POST['pwd'], $DBH)){
		$_SESSION['logged'] = 'forSure';	
	}else{
	// muuten annetaan virhelause
		echo '<script>alert("Käyttäjätunnus tai salasana virheellinen");</script>';		
	}
}

// jos klikataan logout, tuhotaan sessio ja uudelleenohjataan
if($_GET['action'] == 'logout'){
	session_destroy();
	redirect($_SERVER['PHP_SELF']);
	
	// vaihtoehtoisesti:
	// unset($_SESSION['logged']);
}

?>

<!--HTML alkaa ------------------------------------------------------------------------------------------------------------------>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>mÖbel</title>
	<link rel="shortcut icon" href="../img/minilogo.png">
    <link rel="stylesheet" href="../css/foundation.css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../js/vendor/modernizr.js"></script>
  </head>
  <body>
  
  
    
<!-- Top Bar ---------------------------------------------------------------------------------------------------------------------->
	   
	   <?php
	   include_once('../top-bar-furt.php');
	   //haetar furt tob baria koska siinä koodaukset paremmin.
	   ?>
 
 
 
<!-- End Top Bar ----------------------------------->
  
  
  
<!-- PÄÄSISÄLTÖ järjestyksessä: -----------------------------------------------------------------------------------------------------------------
	*Otsikko
		-tuotteperheen nimi
		-hinta
	*3D malli
	*sidebar
		-hinta
		-kuvaus
		-form
		-osta-nappi
-->
  
  <div class="row">    
    <div class="large-9 push-3 columns">
      
	  
	  
		<h3>
			<?php  //tuotteen nimi
			$sql='SELECT tuoteperhenimi FROM tuoteperhe WHERE tuoteperheid=\'S001\'';  
			$STH = $DBH->query($sql);  
			$STH->setFetchMode(PDO::FETCH_ASSOC);  
			while($row = $STH->fetch()) { 
				echo $row['tuoteperhenimi'];  
			}?> 	
		
		<small> 
			<?php //tähän tuotteen pieneenfonttiin hinta
			$sql='SELECT tuoteperhehinta FROM tuoteperhe WHERE tuoteperheid=\'S001\'';  
			$STH = $DBH->query($sql);  
			$STH->setFetchMode(PDO::FETCH_ASSOC);  
			while($row = $STH->fetch()) {  
				echo $row['tuoteperhehinta'] .' €</br>';  
			}?>
		</small></h3>
      
  
		<div id="3Dmalli"></div>
							<!---- HAISTELU ET JOS EI 3D TUOETA NIIN KUVA TILALLE!
							<img src="thumbs/ PHP //tähän tuotteen kuva tulee vielä koodata kuvan muutokset
									$sql='SELECT kuvaurl FROM tuote WHERE tuoteperheid=\'S001\' AND tuoteid=\'S101\'';  
									$STH = $DBH->query($sql);  
									$STH->setFetchMode(PDO::FETCH_ASSOC);  
									while($row = $STH->fetch()) {  
										echo $row['kuvaurl'];  
									}?>"></img>
							---->
    </div>
    
    
    <!-- Nav Sidebar -->
    <!-- This is source ordered to be pulled to the left on larger screens -->
    <div class="large-3 pull-9 columns">
        
		<br>
		<br>
		<h4>Värivalinta</h4> 
		
		<p>Hinta: <?php  
			$sql='SELECT tuoteperhehinta FROM tuoteperhe WHERE tuoteperheid=\'S001\'';  
			$STH = $DBH->query($sql);  
			$STH->setFetchMode(PDO::FETCH_ASSOC);  
			while($row = $STH->fetch()) {  
				echo $row['tuoteperhehinta'] .' €</br>';  
			}?>  

		</p>
		
		
      <ul class="side-nav">
	  
		<?php //tuoteperheenkuvaus
		$sql='SELECT tuoteperhekuvaus FROM tuoteperhe WHERE tuoteperheid=\'S001\'';  
		$STH = $DBH->query($sql);  
		$STH->setFetchMode(PDO::FETCH_ASSOC);  
		while($row = $STH->fetch()) {  
			echo '<p>'.$row['tuoteperhekuvaus'] .'</p> </br>';  
		}?>  

		
		
		
	<!-- ostosformi ------------------------------------------------------------------------------------->
		
			<form action="../ostoskoritoiminnallisuus.php" method="get">
					<?php  
					$sql='SELECT * FROM tuote WHERE tuoteperheid=\'S001\'';  
					$STH = $DBH->query($sql);  
					
					//Haetaan muuttujalle $row ja tulostetaan  
					$STH->setFetchMode(PDO::FETCH_ASSOC);  
					while($row = $STH->fetch()) {  

						//tulostaa niin monta radio-inputteja kuin värivaihtoehtoja on tietokannasta, voi valita vain yhden
						echo '<input type="radio" action="add" name="tuoteid" value="'.$row['tuoteid'] .'">'.$row['tuotenimi'] .'</br>';  
					}?>  
			
						<button class="lisaa-ostoskoriin">Lisää ostoskoriin</button>
		  
			</form>
		</ul>
      
	  
    </div>
    
  </div>
  
  
<!-- END PÄÄSISÄLTÖ ---------------------------------------------------------------------------------------------------------------------------------------->
    
  
<!-- Footer ------------------------------------------------------------------------------------------------------>
  
    <?php
	   include_once('../footer.php');
	   
	   ?>
	   
<!-- end Footer -------------------------------------------------------------------------------------------------->
 

<!-- loppuscriptit --->


 
    <script src="../js/vendor/jquery.js"></script>
    <script src="../js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
	
	<!-- 3Dmallin lataus-->
	<script type="text/javascript">
	$(document).ready(function() {
	$('#3Dmalli').load("../3D/S001.xhtml");
	});
	</script>
	
	
    </body>
</html>
