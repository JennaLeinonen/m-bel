<?php
session_start();
require_once('yhteydet/dbyhteys.php');
require_once('yhteydet/funktiot.php');
require_once('yhteydet/dbFunctions.php'); 
 ?>
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
          <a href="tuotteet.php">Tuotteet</a>
          <ul class="dropdown">
            <li><a href="sohvat/index.php">Sohvat</a></li>
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
            <li><a href="yhteystiedot.php">Yhteystiedot</a></li>
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
<li><a href="rekisteroidy.php">Etkö ole rekisteröitynyt vielä?</a></li>

  </div>

  </li>

            <li class="divider"></li>
        
          </ul>
          <?php
		  endif;
		  ?>
	  <li><a href="ostoskori.php">Ostoskori (koodii)</a></li>
		
         
          </ul>
        </li>
	  
</li>
  </nav>