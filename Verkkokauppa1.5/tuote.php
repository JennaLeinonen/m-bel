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
    
    <!-- Main Content Section -->
    <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->
    <div class="large-9 push-3 columns">
      
      <h3>Tuotteen nimi <small> koodaa tähänkin hinta</small></h3>
      
      
 
		<?php 
    //current URL of the Page. cart_update.php redirects back to this URL 
    $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); 
	$ostosulr = "ostoskori.php";
     
    $results = $mysqli->query("SELECT * FROM tuote ORDER BY id ASC"); 
    if ($results) {  
     
        //fetch results set as object and output HTML 
        while($obj = $results->fetch_object()) 
        { 
            echo '<div class="product">';  
            echo '<form method="post" action="cart_update.php">'; 
            echo '<div class="product-thumb"><img src="images/'.$obj->kuvaurl.'"></div>';    
			echo '<div class="product-id"><img src="images/'.$obj->tuoteid.'"></div>'; 
            echo '<div class="product-content"><h3>'.$obj->tuotenimi.'</h3>'; 
            echo '<div class="product-desc">'.$obj->tuoteperheid.'</div>'; 
            echo '<div class="product-info">'; 
            echo 'Price '.$obj->hinta.' | '; 
            echo 'Qty <input type="text" name="product_qty" value="1" size="3" />'; 
            echo '<button class="add_to_cart">Add To Cart</button>'; 
            echo '</div></div>'; 
            echo '<input type="hidden" name="product_code" value="'.$obj->tuoteid.'" />'; 
            echo '<input type="hidden" name="type" value="add" />'; 
            echo '<input type="hidden" name="return_url" value="'.$ostosurl.'" />'; 
            echo '</form>'; 
            echo '</div>'; 
        } 
     
    } 
    ?> 
 
	<img src="tulip.jpg"></img>
    </div>
    
    
    <!-- Nav Sidebar -->
    <!-- This is source ordered to be pulled to the left on larger screens -->
    <div class="large-3 pull-9 columns">
        
		<br>
		<br>
		<h4>Värivalinta</h4>
		
		<p>Hinta: koodaa hinta tahän</p>
      <ul class="side-nav">
        <li><a href="#">Section 1</a></li>
        <li><a href="#">Section 2</a></li>
        <li><a href="#">Section 3</a></li>
        <li><a href="#">Section 4</a></li>
        <li><a href="#">Section 5</a></li>
        <li><a href="#">Section 6</a></li>
      </ul>
      
	  <button class="lisaa-ostoskoriin">Lisää ostoskoriin</button>
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
    </body>
</html>
