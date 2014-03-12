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
 
  <nav class="top-bar" ID="navi" data-topbar>
       <ul class="title-area">
      <!-- Title Area -->
      <li class="name">
        <h1>
          <a href="index.php">
            <img src="img/logo.png" alt="mÖbel">
          </a>
        </h1>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li> 
    </ul>
	<!-- muuta media queryssa muuttumaan menuksi aikasemmin-->
	
 
    <section class="top-bar-section">
      <!-- Oikea navi -->
      <ul class="left">
		<li class="has-dropdown">
          <a href="tuotteet.html">Tuotteet</a>
          <ul class="dropdown">
            <li><a href="#">Sohvat</a></li>
            <li><a href="#">Tuolit</a></li>
            <li><a href="#">Pöydät</a></li>
			<li><a href="#">Piensisustus</a></li>
            <li class="divider"></li>
        
          </ul>
        </li>
		
		<li class="has-dropdown">
          <a href="#">Yritys</a>
          <ul class="dropdown">
            <li><a href="#">mÖbelin tarina</a></li>
            <li><a href="yhteystiedot.html">Yhteystiedot</a></li>
            <li><a href="#">Työpaikat</a></li>
            <li class="divider"></li>
         
          </ul>
        </li>
		
		

	
      	<li class="has-dropdown">
          <a href="#">FAQ</a>
          <ul class="dropdown">
            <li><a href="#">Toimitusehdot</a></li>
            <li><a href="#">Maksutavat</a></li>
            <li><a href="#">Laatu & Design</a></li>
            <li class="divider"></li>
         
          </ul>
        </li>
   
      </ul>
	 
	   <ul class="right">
<?php
		  // if logged in, show logout-link, which sends parameter action=logout in the query string
		  if($_SESSION['logged'] == 'forSure'):
		  ?>
		  <li><a href="omattiedot.html">Omat tiedot</a></li>
		  <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=logout">Kirjaudu ulos</a></li>
		  <?php
		  // else show login-link (below)
		  else:
		  ?>
	    <li class="has-dropdown">

                    <a href="#">Kirjaudu</a>

          <ul class="dropdown">
            <li>
			<div class="kirjaus">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="width: 220px">
	<input type="text" name="email" placeholder="sähköposti">
	<input type="password" name="pwd" placeholder="salasana">
	<input type="submit" value="Kirjaudu" name="submit">
</form>
<li><a href="rekisteröidy.html">Etkö ole rekisteröitynyt vielä?</a></li>

  </div>

  </li>

            <li class="divider"></li>
        
          </ul>
          <?php
		  endif;
		  ?>
	  <li><a href="#">Ostoskori (9)</a></li>
		
         
          </ul>
        </li>
	  
</li>
  </nav>
 
  <!-- End Top Bar -->
 
  <div class="row">
    <div class="large-12 columns">
 
    <!-- Content Slider -->
 
      <div class="row">
        <div class="large-12 hide-for-small">
 
          <div id="featured" data-orbit>
              <img src="img/kuva1.jpg" alt="slide image">
              <img src="img/kuva2.jpg" alt="slide image">
              <img src="img/kuva3.jpg" alt="slide image">
            </div>
	<div class="orbit-timer">
    <span></span>
    <div class="orbit-progress"></div>
  </div>
</div>
      </div>
    </div>
 
    <!-- End Content Slider -->
 
    <!-- Mobile Header -->
 
      <div class="row">
        <div class="large-12 columns show-for-small">
 
          <img src="http://placehold.it/1200x700&text=Mobile Header">
 
        </div>
      </div><br>
 
    <!-- End Mobile Header -->
 
 
      <div class="row">
        <div class="large-12 columns">
          <div class="row">
            <!-- Shows -->
            <div class="large-4 small-6 columns">
 
              <h4>Upcoming Shows</h4><hr>
 
              <div class="row">
                <div class="large-1 column">
                  <img src="http://placehold.it/50x50&text=[img]">
                </div>
 
                <div class="large-9 columns">
                  <h5><a href="#">Venue Name</a></h5>
                  <h6 class="subheader show-for-small">Doors at 00:00pm</h6>
                </div>
              </div><hr>
 
              <div class="hide-for-small">
                <div class="row">
                  <div class="large-1 column">
                    <img src="http://placehold.it/50x50&text=[img]">
                  </div>
 
                  <div class="large-9 columns">
                    <h5 class="subheader"><a href="#">Venue Name</a></h5>
                  </div>
                </div><hr>
 
                <div class="row">
                  <div class="large-1 column">
                    <img src="http://placehold.it/50x50&text=[img]">
                  </div>
 
                  <div class="large-9 columns">
                    <h5 class="subheader"><a href="#">Venue Name</a></h5>
                  </div>
                </div><hr>
 
                <div class="row">
                  <div class="large-1 column">
                    <img src="http://placehold.it/50x50&text=[img]">
                  </div>
 
                  <div class="large-9 columns">
                    <h5 class="subheader"><a href="#">Venue Name</a></h5>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Shows -->
 
 
            <!-- Image -->
 
            <div class="large-4 small-6 columns">
              <img src="http://placehold.it/300x465&text=Image">
            </div>
 
            <!-- End Image -->
 
 
            <!-- Feed -->
 
            <div class="large-4 small-12 columns">
 
              <h4>Blog</h4><hr>
              <div class="panel">
                <h5><a href="#">Post Title 1</a></h5>
 
                <h6 class="subheader">
                  Risus ligula, aliquam nec fermentum vitae, sollicitudin eget urna. Suspendisse ultrices ornare tempor...
                </h6>
 
                <h6><a href="#">Read More »</a></h6>
              </div>
 
              <div class="panel hide-for-small">
                <h5><a href="#">Post Title 2 »</a></h5>
              </div>
 
              <div class="panel hide-for-small">
                <h5><a href="#">Post Title 3 »</a></h5>
              </div>
 
              <a href="#" class="right">Go To Blog »</a>
 
            </div>
 
            <!-- End Feed -->
 
          </div>
        </div>
      </div>
 
    <!-- End Content -->
 
 
    <!-- Footer -->
 
      <footer class="row">
        <div class="large-12 columns"><hr>
            <div class="row">
 
              <div class="large-6 columns">
                  <p>© Copyright no one at all. Go to town.</p>
              </div>
 
              <div class="large-6 small-12 columns">
                  <ul class="inline-list right">
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 2</a></li>
                    <li><a href="#">Link 3</a></li>
                    <li><a href="#">Link 4</a></li>
                  </ul>
              </div>
 
            </div>
        </div>
      </footer>
 
    <!-- End Footer -->
 
    </div>
  </div>
 
  <script>
  document.write('<script src=js/vendor/' +
  ('__proto__' in {} ? 'zepto' : 'jquery') +
  '.js><\/script>')
  </script>
  <script src="js/foundation.min.js"></script>
  <script>
    $(document).foundation();
  </script>
<!-- End Footer -->
    
    
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
	
	 
  </body>
</html>
