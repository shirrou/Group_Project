<!doctype html>
<?php
require_once('database.php');
// Get all categoryType
$queryAllcategorytype = 'SELECT * FROM itemcategory ORDER BY itemCatID';
$statement2 = $db->prepare($queryAllcategorytype);
$statement2->execute();
$categorytype = $statement2->fetchAll();
$statement2->closeCursor();
// Get categoryType ID
if (!isset($itemCategoryID)) {$itemCategoryID = filter_input(INPUT_GET, 'itemCategoryID', FILTER_VALIDATE_INT);
if ($itemCategoryID == NULL || $itemCategoryID == FALSE) {$itemCategoryID = 1;}}
$offerID = filter_input(INPUT_GET, 'offerID');
// Get name for selected categoryType
$queryCategoryType = 'SELECT * FROM itemcategory WHERE itemCatID = :itemCategoryID';
$statement1 = $db->prepare($queryCategoryType);
$statement1->bindValue(':itemCategoryID', $itemCategoryID);
$statement1->execute();
$categoryType = $statement1->fetch();
$categoryType_name = $categoryType['itemCatName'];
$statement1->closeCursor();
?>
<html>
<ul>
<?php foreach ($categorytype as $categoryType) : ?>
<li><a href="#">
<?php echo $categoryType['itemCatName']; ?></a></li>
<?php endforeach; ?>

</ul>

</body>
</html>