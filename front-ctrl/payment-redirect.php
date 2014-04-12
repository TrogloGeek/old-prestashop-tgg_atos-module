<?php

require_once '../../../config/config.inc.php';
require_once _PS_ROOT_DIR_.'/init.php';
/* @var $cookie Cookie */
if (!$cookie->isLogged(true)) {
    Tools::redirect('authentication.php?back=order.php');
    die();
}
/* @var $cart Cart */
if ($cart->OrderExists()) {
	Tools::redirect('history.php');
	die();
}
require_once '../tgg_atos.php';
$Tgg_Atos = new tgg_atos();
$splitted = Tools::getValue('splitted', FALSE);
if ($Tgg_Atos->canProcess($cart, $splitted) !== TRUE) {
	Tools::redirect('order.php?step=3');
	die();
}
require_once _PS_ROOT_DIR_.'/header.php';
$payment_currency = null;
$atos_form = $Tgg_Atos->getPaymentForm($amount, $payment_currency, $splitted);
$smarty->assign(compact(
	'atos_form',
	'amount',
	'payment_currency',
	'splitted'
));
$smarty->assign('payment_fees', $Tgg_Atos->getCartFeesStr($cart, $payment_currency, $splitted ? $splitted : 1));
$smarty->assign('module_dir', __PS_BASE_URI__.'modules/'.$Tgg_Atos->name.'/');
$smarty->assign('module_template_dir', $Tgg_Atos->getThemeUri());
$smarty->assign('page_name', 'tgg_atos-'.basename(__FILE__, '.php'));
$smarty->display($Tgg_Atos->getThemePath().'tpl/'.$Tgg_Atos->name.'-front-payment-redirect.tpl');
require_once _PS_ROOT_DIR_.'/footer.php';

?>