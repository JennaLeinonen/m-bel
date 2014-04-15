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
  <style>
      #map_canvas {
        width: 500px;
        height: 400px;
      }
    </style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>mÖbel</title>
    <link rel="stylesheet" href="css/foundation.css" />
	<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script> <!---tästä googlemaps toiminto--->
    <script src="js/vendor/modernizr.js"></script>
	
 </head>
  <body>
       
	
	   
	   <!-- Navigation -->
 
   <?php
	   include_once('top-bar.php');
	   
	   ?>
 
 
  <!-- End Top Bar -->
 
 
  <!-- Main Page Content and Sidebar -->
 
  <div class="row">
 
    <!-- Contact Details -->
	

	
    <div class="large-9 columns">
 
     <h2 class="subheader">Yhteystiedot</h4>
	 <div id="yhteystiedotkuva">
              <img src="yhteystiedot.jpg" alt="yhteystiedot">
	</div>
	    
      <!---lomake, jolla saa lähetettyä viestiä yrityksen meiliin--->
	              <h4 class="subheader">Ota yhteyttä</h4>
				  <p>
					  Lorem ipsum dolor sit amet, consectetur adipisicing elit, 
					  sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
					  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi 
					  ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit 
					  in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint 
				  </p>
				<form name="emaillähetys" action="./yhteystiedot.php" method="post">
                       Nimi: <input type="text" name="nimi"><br/>
					   Puhelin: <input type="text" name="puhelin"><br/>
					   Email: <input type="text" name="email"><br/>
					   <textarea name="viesti" rows="6" cols="50">Viestisi</textarea></br>					 
					   <input name="Submit" type="submit" value="Lähetä" class="button [tiny small large]">
                </form> 
				 
				 <!---haetaan lomakkeen toiminnat erillisestä tiedostosta--->
				 <?php include_once("mail.php"); ?> 
	
	<!---lomake päättyy--->
      <div class="section-container tabs" data-section>
		<p>
			<!--- googlen kartan upotus sivulle --->
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1984.6916672589564!2d24.939913999999998!3d60.169283099999994!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46920bcc8a473621%3A0xf4e160b2be5e74cf!2sMannerheimintie+5!5e0!3m2!1sfi!2sfi!4v1394629705017" width="720" height="450" frameborder="0" style="border:0"></iframe>
		</p>
   
      </div>
    </div>
 
    <!-- End Contact Details -->
 
 
    <!-- Sidebar -->
 
 
   <!---<div class="large-3 columns">

    </div>--->
    <!-- End Sidebar -->
  </div>
 
  <!-- End Main Content and Sidebar -->
 
 
  <!-- Footer -->
 
	<?php
	   include_once('footer.php');
	   
	   ?>
 
  <!-- End Footer -->
 
 
 
  <!-- Map Modal -->
 
  <div class="reveal-modal" id="mapModal">
    <h4>Where We Are</h4>
    <p><img src="http://placehold.it/800x600" /></p>
 
    <!-- Any anchor with this class will close the modal. This also inherits certain styles, which can be overriden. -->
    <a href="#" class="close-reveal-modal">×</a>
  </div>
    
	
	  
    
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
