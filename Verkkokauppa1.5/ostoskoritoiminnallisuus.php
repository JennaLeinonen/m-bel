<?php 
	session_start(); 
	require_once('yhteydet/dbyhteys.php');
	require_once('yhteydet/funktiot.php');
	require_once('yhteydet/dbFunctions.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<?php


//OSTOSKORIN OPERAATIOT----------------------------------------------------------------------------------------------------------------------------------------------------
$product_id = $_GET['id']; //the product id from the URL 
$action = $_GET['action']; //the action from the URL 

//if there is an product_id and that product_id doesn't exist display an error message
if($product_id && !productExists($product_id)) {
    die("Error. Product Doesn't Exist");
}

switch($action) { //decide what to do 

    case "add":
        $_SESSION['cart'][$product_id]++; //add one to the quantity of the product with id $product_id 
    break;

    case "remove":
        $_SESSION['cart'][$product_id]--; //remove one from the quantity of the product with id $product_id 
        if($_SESSION['cart'][$product_id] == 0) unset($_SESSION['cart'][$product_id]); //if the quantity is zero, remove it completely (using the 'unset' function) - otherwise is will show zero, then -1, -2 etc when the user keeps removing items. 
    break;

    case "empty":
        unset($_SESSION['cart']); //unset the whole cart, i.e. empty the cart. 
    break;

}

?>

</html>