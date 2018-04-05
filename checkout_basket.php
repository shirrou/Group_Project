<?php
// Get the item data
$user_id = 1;
$card_number = filter_input(INPUT_POST, 'card_number');
$card_exp_month = filter_input(INPUT_POST, 'card_exp_month');
$card_exp_year = filter_input(INPUT_POST, 'card_exp_year');
$card_ccv = filter_input(INPUT_POST, 'card_ccv');
// Validate inputs
if ($card_number == null || $card_number == false || $card_exp_month == null || $card_exp_month == false || $card_exp_year == null|| $card_exp_year == false || $card_ccv == null || $card_ccv == false ) {
$error= "Card Details not valid";
include('denied-payment.php'); 
} else {
require_once('database.php');
    // check if object exists by id
	$querycheck= 'SELECT count(*) 
	FROM paymentDetail
	where cardNumber =:card_number
	AND expireDateMonth =:card_exp_month
	AND expireDateYear =:card_exp_year
	AND ccv =:card_ccv';
    $stm = $db->prepare($querycheck);
    $stm->bindParam(':card_number', $card_number);
    $stm->bindParam(':card_exp_month', $card_exp_month);
    $stm->bindParam(':card_exp_year', $card_exp_year);
    $stm->bindParam(':card_ccv', $card_ccv);
    $stm->execute();
    $res = $stm->fetchColumn();
    if ($res > 0) {
        include ('successful-payment.php');
}
	else {
		include ('denied-payment.php');
	}
}


?>