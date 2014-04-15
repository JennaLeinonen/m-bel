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
    <script src="../js/vendor/modernizr.js"></script>
  </head>
  <body>
     
 
    <!-- Navigation -->
	<?php
	   include_once('../top-bar-furt.php');
	   
	   ?>
     

  <!-- End Top Bar -->

  <div class="row">
    <div class="large-12 columns">
 
    <!-- End Navigation -->
 
      <div class="row">
 
  <!-- Side Bar MUUUTETAAN Sivuvalikoksi -->
 
        <div class="large-4 small-12 columns">
 
          <img src="http://placehold.it/500x500&text=Logo">
 
          <!-- <div class="hide-for-small panel">  positetaankun ei haluta piilottaa-->
            <div class="panel">
			
			<h3>Tuotteet</h3>
            <h5 class="subheader">
			
			<ul class="side-nav">
  <li class="active"><a href="../sohvat">Sohvat</a></li>
  <li><a href="#">Tuolit</a></li>

  <li><a href="#">Pöydät</a></li>
  <li><a href="#">Piensisustus</a></li>
</ul>
            </h5>
			</div>
         <!-- </div>-->
 
         
 
        </div>
 
    <!-- End Side Bar -->
 
 
    <!-- Thumbnails -->
 
        <div class="large-8 columns">
          <div class="row">
			<?php  //tuotteen panelit
			$sql='SELECT * FROM tuoteperhe WHERE tuoteryhmaid=\'S112\' ';  
			$STH = $DBH->query($sql);  
			$STH->setFetchMode(PDO::FETCH_ASSOC); while($row = $STH->fetch()) {  ?>
			
			<a href="<?php echo  $row['tuoteperheid']; ?>.php">
            <div class="large-4 small-6 columns">
              <img src="../thumbs/<?php echo  $row['tuoteperheid']; ?>.jpg">
 
              <div class="panel">
                <h5><?php echo  $row['tuoteperhenimi']; ?></h5>
                <h6 class="subheader"><?php echo  $row['tuoteperhehinta']; ?> €</h6>
              </div>
            </div>
			</a>
			
			<!--
 
            <div class="large-4 small-6 columns">
              <img src="http://placehold.it/500x500&text=Thumbnail">
 
              <div class="panel">
                <h5>Item Name</h5>
                <h6 class="subheader">$000.00</h6>
              </div>
            </div>
 
            <div class="large-4 small-6 columns">
              <img src="http://placehold.it/500x500&text=Thumbnail">
 
              <div class="panel">
                <h5>Item Name</h5>
                <h6 class="subheader">$000.00</h6>
              </div>
            </div>
 
            <div class="large-4 small-6 columns">
              <img src="http://placehold.it/500x500&text=Thumbnail">
 
              <div class="panel">
                <h5>Item Name</h5>
                <h6 class="subheader">$000.00</h6>
              </div>
            </div>
 
            <div class="large-4 small-6 columns">
              <img src="http://placehold.it/500x500&text=Thumbnail">
 
              <div class="panel">
                <h5>Item Name</h5>
                <h6 class="subheader">$000.00</h6>
              </div>
            </div>-->
			
			<?php }?> 
          </div>
 
    <!-- End Thumbnails -->
 
 
    <!-- Managed By -->
         
 
    <!-- End Managed By -->
 
          </div>
        </div>
      </div>
 
 
    <!-- Footer -->
 
    <?php
	   include_once('../footer.php');
	   
	   ?>
    <!-- End Footer -->
 
    </div>
  </div>
    
  
   <script src="../js/vendor/jquery.js"></script>
    <script src="../js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  
    </body>
</html>
