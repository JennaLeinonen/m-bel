

function LoadTopBar(){ document.getElementById('navi').appendChild(


    <ul class="title-area">
      <!-- Title Area -->
      <li class="name">
        <h1>
          <a href="#">
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


    </section>
  ');}