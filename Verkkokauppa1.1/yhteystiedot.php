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
 
  <nav class="top-bar" data-topbar>
    <ul class="title-area">
      <!-- Title Area -->
      <li class="name">
        <h1>
          <a href="#">
           mÖbel
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
          <a href="#">Tuotteet</a>
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
            <li><a href="#">Yhteystiedot</a></li>
            <li><a href="#">Työpaikat</a></li>
            <li class="divider"></li>
         
          </ul>
        </li>
		
		

	
      <li><a href="#">FAQ</a></li>
   
      </ul>
	 
	   <ul class="right">
	    <li><a href="#">Kirjaudu</a></li>
	  <li><a href="#">Ostoskori (9)</a></li>
		
         
          </ul>
        </li>
	  
</li>


    </section>
  </nav>
   



  
 
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
 
  <footer class="row">
    <div class="large-12 columns">
      <hr />
      <div class="row">
        <div class="large-6 columns">
          <p>© Copyright no one at all. Go to town.</p>
        </div>
        <div class="large-6 columns">
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
