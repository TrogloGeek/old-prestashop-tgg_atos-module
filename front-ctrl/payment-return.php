<?php

require_once '../../../config/config.inc.php';
require_once _PS_ROOT_DIR_.'/init.php';

require_once '../tgg_atos.php';
$Tgg_Atos = new tgg_atos();

$response = $Tgg_Atos->fetchClientReturnData();

if (!$response) {
	tgg_atos::redirectToShop();
	exit;
}

$Response = $Tgg_Atos->decryptResponse($response);
/* @var $cookie Cookie */
foreach (array('authorisation_id', 'transaction_id', 'payment_certificate', 'payment_means', 'merchant_id') as $key)
	$cookie->{'tgg_atos_response_'.$key} = $Response->{$key};
$cookie->tgg_atos_response_payment_date = preg_replace('/([0-9]{4})([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2})/', '$3/$2/$1 $4:$5:$6', $Response->payment_date.$Response->payment_time);
$Response->origin = 'client_return';
$payment_ok = $Tgg_Atos->processResponse($Response, $Customer, $Order, $Currency, $amount, $cart);
/* @var $Customer Customer */
/* @var $Order Order */
/* @var $Currency Currency */
$cookie->tgg_atos_response_amount = Tools::displayPrice($amount, $Currency);
if ($payment_ok) {
	$order_confirm_flag = 'tgg_atos_order_'.$Order->id.'_confirmed';
	$display_order_confirm = !isset($cookie->{$order_confirm_flag}) && (strtotime($Order->date_add) > strtotime('- 3 hours'));
	$cookie->{$order_confirm_flag} = TRUE;
	if ($display_order_confirm)
		tgg_atos::redirectToShop('order-confirmation.php?key='.urlencode($Order->secure_key).'&id_module='.$Tgg_Atos->id.'&id_cart='.$cart->id);
	else
		tgg_atos::redirectToShop('history.php');
} elseif (Validate::isLoadedObject($cart) && (intval($cart->OrderExists()) > 0)) {
	tgg_atos::redirectToShop('history.php');
} elseif (Validate::isLoadedObject($cart) && ($cart->nbProducts() > 0)) {
	tgg_atos::redirect('payment-failure.php');
} else {
	tgg_atos::redirectToShop();
}

?>