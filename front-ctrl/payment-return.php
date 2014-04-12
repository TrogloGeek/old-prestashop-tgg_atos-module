<?php

require_once '../../../config/config.inc.php';
require_once _PS_ROOT_DIR_.'/init.php';

require_once '../tgg_atos.php';
$Tgg_Atos = new tgg_atos();

$mode = null;
$response = $Tgg_Atos->fetchClientReturnData($mode);

if (!$response) {
	Tools::redirect('');
	die();
}

$Response = $Tgg_Atos->decryptResponse($response);
/* @var $cookie Cookie */
foreach (array('authorisation_id', 'transaction_id', 'payment_certificate', 'payment_means', 'merchant_id') as $key)
	$cookie->{'tgg_atos_response_'.$key} = $Response->{$key};
$cookie->tgg_atos_response_payment_date = preg_replace('/([0-9]{4})([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2})/', '$3/$2/$1 $4:$5:$6', $Response->payment_date.$Response->payment_time);
$Response->origin = 'client_return';
$payment_ok = $Tgg_Atos->processResponse($Response, $Customer, $Order, $Currency, $amount, $cart, $mode);
$cookie->tgg_atos_response_amount = Tools::displayPrice($amount, $Currency);
if ($payment_ok) {
	Tools::redirect('order-confirmation.php?key='.urlencode($Order->secure_key).'&id_module='.$Tgg_Atos->id.'&id_cart='.$cart->id);
} elseif (Validate::isLoadedObject($cart) && (intval($cart->OrderExists()) > 0)) {
	Tools::redirect('history.php');
} elseif (Validate::isLoadedObject($cart) && ($cart->nbProducts() > 0)) {
	Tools::redirect('modules/'.$Tgg_Atos->name.'/front-ctrl/payment-failure.php');
} else {
	Tools::redirect('');
}

?>