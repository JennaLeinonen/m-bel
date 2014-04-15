<?php 
session_start();
require_once('yhteydet/dbyhteys.php');
require_once('yhteydet/funktiot.php');
require_once('yhteydet/dbFunctions.php');


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

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>mÖbel</title>
	<link rel="shortcut icon" href="img/minilogo.png">
    <link rel="stylesheet" href="css/foundation.css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
  
  
    
<!-- Navigation -->
	   
	   <?php
	   include_once('top-bar.php');
	   //Navi on kaikilla sama joten helpotettiin tietojen päivitystä tekemällä navi
	   //omaan tiedostoonsa ja kutsumalla se sitten tähän pää filuun
	   //tehään myös footeriin
	   ?>
 
 
 
<!-- End Top Bar -->
  
  
  
  <div class="row">    
    
    <!-- Main Content Section -->
    <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->
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
	<!----
	<img src="thumbs/<?php //tähän tuotteen kuva tulee vielä koodata kuvan muutokset
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
		//SyÃ¶tetÃ¤Ã¤n haku MySQL-tapaan  
		$sql='SELECT tuoteperhehinta FROM tuoteperhe WHERE tuoteperheid=\'S001\'';  
		$STH = $DBH->query($sql);  


		//Haetaan muuttujalle $row ja tulostetaan  
		$STH->setFetchMode(PDO::FETCH_ASSOC);  
		while($row = $STH->fetch()) {  

		//Tulostetaan data lausekkeiden sisÃ¤lle ja muutetaan pÃ¤ivÃ¤yksen muotoa  

		echo $row['tuoteperhehinta'] .' €</br>';  

		}
?>  

	</p>
      <ul class="side-nav">
	  
<?php  
		//SyÃ¶tetÃ¤Ã¤n haku MySQL-tapaan  
		$sql='SELECT tuoteperhekuvaus FROM tuoteperhe WHERE tuoteperheid=\'S001\'';  
		$STH = $DBH->query($sql);  


		//Haetaan muuttujalle $row ja tulostetaan  
		$STH->setFetchMode(PDO::FETCH_ASSOC);  
		while($row = $STH->fetch()) {  

		//Tulostetaan data lausekkeiden sisÃ¤lle ja muutetaan pÃ¤ivÃ¤yksen muotoa  

		echo '<p>'.$row['tuoteperhekuvaus'] .'</p> </br>';  

		}
?>  

	 <form action="ostoskoritoiminnallisuus.php" method="get">
<?php  //VÄRIFORMI------------------------------------------------------------------------------------------------------------
		 

		$sql='SELECT * FROM tuote WHERE tuoteperheid=\'S001\'';  
		$STH = $DBH->query($sql);  


		//Haetaan muuttujalle $row ja tulostetaan  
		$STH->setFetchMode(PDO::FETCH_ASSOC);  
		while($row = $STH->fetch()) {  

		 
		//tulostaa niin monta radio-inputteja kuin värivaihtoehtoja on tietokannasta, voi valita vain yhden
		echo '<input type="radio" action="add" name="tuoteid" value="'.$row['tuoteid'] .'">'.$row['tuotenimi'] .'</br>';  

		}
?>  
	
			
     
      </ul>
      
	  <button class="lisaa-ostoskoriin">Lisää ostoskoriin</button>
	  
	  	</form>
	  <!--
      <p><img src="http://placehold.it/320x240&text=Ad" /></p>
        -->
    </div>
    
  </div>
    
  
	<!-- Footer -->
  
    <?php
	   include_once('footer.php');
	   
	   ?>
	   
	<!-- end Footer -->
  
      <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
	<script type="text/javascript">
	$(document).ready(function() {
	$('#3Dmalli').load("http://users.metropolia.fi/~jennalei/IO2014/verkkokauppa1.4/Verkkokauppa1.4/3D/ruukkunen2.xhtml");
	});
	</script>
    </body>
</html>
