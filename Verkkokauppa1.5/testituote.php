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
    <!----<link rel="stylesheet" href="css/foundation.css" /> --->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
  
  
		<?php
   
 echo 'mina';
 
 
//SyÃ¶tetÃ¤Ã¤n haku MySQL-tapaan  
$sql='SELECT * FROM tuote';  
$STH = $DBH->query($sql);  


//Haetaan muuttujalle $row ja tulostetaan  
$STH->setFetchMode(PDO::FETCH_ASSOC);  
while($row = $STH->fetch()) {  

//Tulostetaan data lausekkeiden sisÃ¤lle ja muutetaan pÃ¤ivÃ¤yksen muotoa  

echo $row['tuotenimi'] . "</br>";  

}  

?>  


<!--	
    if ($results) {  
     
        //fetch results set as object and output HTML 
        while($obj = $results->fetch_object()) 
        { 
		
		
			echo 'mina';
			}
			} 

	?>

            echo '<div class="product-thumb"><img src="thumbs/'.$obj->kuvaurl.'"></div>';    
			echo '<div class="product-id"><h2>'.$obj->tuoteid.'</h2></div>'; 
            echo '<div class="product-content"><h3>'.$obj->tuotenimi.'</h3>'; 
            echo '<div class="product-desc">'.$obj->tuoteperheid.'</div>'; 
            echo '<div class="product-info">'; 
            echo 'Price '.$obj->hinta.' | '; 
            echo 'Qty <input type="text" name="product_qty" value="1" size="3" />'; 
            echo '<button class="add_to_cart">Add To Cart</button>'; 
            echo '</div></div>'; 
            echo '<input type="hidden" name="product_code" value="'.$obj->tuoteid.'" />'; 
            echo '<input type="hidden" name="type" value="add" />'; 
       
            echo '</form>'; 
            echo '</div>'; 
        } 
     
    } 
    ?> -->
 
  
  

		<script>
  document.write('<script src=' +
  ('__proto__' in {} ? '../../js/vendor/zepto' : '../../js/vendor/jquery') +
  '.js><\/script>')
  </script>
      <script src="js/vendor/jquery.js"></script>
	  <script src="/js/vendor/fastclick.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
    </body>
</html>
