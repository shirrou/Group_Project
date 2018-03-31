<?php
require_once('database.php');
$item_id = filter_input(INPUT_POST, 'item_id', FILTER_VALIDATE_INT);
$item_cat_id = filter_input(INPUT_POST, 'item_cat_id', FILTER_VALIDATE_INT);
$memory_id = filter_input(INPUT_POST, 'memory_id', FILTER_VALIDATE_INT);
$color_id = filter_input(INPUT_POST, 'color_id', FILTER_VALIDATE_INT);
$item_det_id = filter_input(INPUT_POST, 'item_det_id', FILTER_VALIDATE_INT);
$basket_item_id = filter_input(INPUT_POST, 'basket_item_id', FILTER_VALIDATE_INT);
$user_id = 1;

// Delete the offer from the database
if ($item_id != false && $item_cat_id != false && $memory_id != false && $color_id != false && $item_det_id != false && $user_id!=false && $basket_item_id != false) {
$query = 'DELETE FROM basket
WHERE userID = 1
AND itemID = :item_id
AND itemCatID = :item_cat_id
AND memoryID = :memory_id
AND colorID = :color_id
AND basketItemID = :basket_item_id
AND itemDetID = :item_det_id';
$statement = $db->prepare($query);
$statement->bindValue(':item_id', $item_id);
$statement->bindValue(':item_cat_id', $item_cat_id);
$statement->bindValue(':memory_id', $memory_id);
$statement->bindValue(':color_id', $color_id);
$statement->bindValue(':basket_item_id', $basket_item_id);
$statement->bindValue(':item_det_id', $item_det_id);
$success = $statement->execute();
$statement->closeCursor();    
}
// Display the Offer List page
include('cart.php');

?>