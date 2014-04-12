<?php

require_once '../../../config/config.inc.php';
require_once _PS_ROOT_DIR_.'/init.php';

if (!is_array($_POST) || !isset($_POST['DATA']) || !strlen($_POST['DATA']))
	Tools::redirect('');

$response = $_POST['DATA'];

require_once '../tgg_atos.php';
$Tgg_Atos = new tgg_atos();

$Response = $Tgg_Atos->decryptResponse($response, tgg_atos::RESPONSE_MODE_POST);
$Response->origin = 'silent_response';
$Tgg_Atos->processResponse($Response, $Customer, $Order, $Currency, $amount, $cart);
header('HTTP/1.0 204 No Content');

?>