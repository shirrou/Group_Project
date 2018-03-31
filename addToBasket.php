<?php
// Get the item data
$user_id = 1;
$item_id = filter_input(INPUT_POST, 'item_id');
$item_cat_id = filter_input(INPUT_POST, 'item_cat_id');
$memory_id = filter_input(INPUT_POST, 'memory_id');
$color_id = filter_input(INPUT_POST, 'color_id');
$item_qty_basket = filter_input(INPUT_POST, 'item_qty_basket');
$item_det_id = filter_input(INPUT_POST, 'item_det_id');
$item_price = filter_input(INPUT_POST, 'item_price');
// Validate inputs
if ($item_id == null || $item_id == false || $item_cat_id == null || $item_cat_id == false || $memory_id == null|| $memory_id == false || $color_id == null || $color_id == false || $item_qty_basket == null || $item_qty_basket == false || $item_det_id == null||$item_det_id == false|| $item_price == null || $item_price == false ) {
$error = "Invalid product data. Check all fields and try again.";
include('error.php'); 
} else {
require_once('database.php');
	// Add the offer detail to the database  
$queryInsert = 'INSERT INTO basket
(userID, itemID, itemCatID, memoryID, colorID, itemBasketQTY, itemDetID, itemBasketPrice)
VALUES(1, :item_id, :item_cat_id, :memory_id, :color_id, :item_qty_basket, :item_det_id, :item_price)';
$statement = $db->prepare($queryInsert);
$statement->bindValue(':item_id', $item_id);
$statement->bindValue(':item_cat_id', $item_cat_id);
$statement->bindValue(':memory_id', $memory_id);
$statement->bindValue(':color_id', $color_id);
$statement->bindValue(':item_qty_basket', $item_qty_basket);
$statement->bindValue(':item_det_id', $item_det_id);
$statement->bindValue(':item_price', $item_price);
$statement->execute();
$statement->closeCursor();
	// Display the Offer List page
include('index.php');
}
?>