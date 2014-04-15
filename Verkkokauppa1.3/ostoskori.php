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
    <div class="small-2 columns"> 
	
		<h1>Ostoskori</h1>
 </div>
    <!-- Content Slider -->
 
     
 
    <!-- End Content Slider -->
 
    <!-- Mobile Header -->
 
      <div class="row">
        <div class="large-12 columns show-for-small">
 
          <img src="http://placehold.it/1200x700&text=Mobile Header">
 
        </div>
      </div><br>
 
    <!-- End Mobile Header -->
 
 
      
            <!-- Shows -->
           
            <!-- End Shows -->
 
 
            <!-- Image -->
 
            <div class="small-10 columns">
             <table>
  <thead>
    <tr>
      <th width="200">Table Header</th>
      <th>Table Header</th>
      <th width="150">Table Header</th>
      <th width="150">Table Header</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Content Goes Here</td>
      <td>This is longer content Donec id elit non mi porta gravida at eget metus.</td>
      <td>Content Goes Here</td>
      <td>Content Goes Here</td>
    </tr>
    <tr>
      <td>Content Goes Here</td>
      <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
      <td>Content Goes Here</td>
      <td>Content Goes Here</td>
    </tr>
    <tr>
      <td>Content Goes Here</td>
      <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
      <td>Content Goes Here</td>
      <td>Content Goes Here</td>
    </tr>
  </tbody>
</table>
            </div>
 
            <!-- End Image -->
 
 
            <!-- ostaminen -->
 
           
			 <div id="kirjautunut">
			 
			 <button id="kassalle"> Kassalle
			 
			 </button>
			 
			 </div>
			 
			 
			 <!--
			 <div id="vierailija">
			 
			 <button id="kirjaudu-kassalle">
			 </button>
			 
			 </div>
			 -->
            
 
            <!-- End ostaminen-->
 
          
        </div>
      </div>
 
    <!-- End Content -->
 
 
    <!-- Footer -->
 
    <?php
	   include_once('footer.php');
	   
	   ?>
<!-- End Footer -->
    
    
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
	
	 
  </body>
</html>
