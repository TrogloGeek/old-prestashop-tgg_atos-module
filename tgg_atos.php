<?php

/**
 * Atos/SIPS connector for Prestashop
 * @license GNU/GPL version 3
 * @author Damien VERON (TrogloGeek)
 * @website prestashop.blog.capillotracteur.fr 
 *
 */
class tgg_atos extends PaymentModule
{

    const RESPONSE_MODE_POST = 0;
    const RESPONSE_MODE_GET = 1;
    const FEES_TOTAL = 0;
    const FEES_FIXED = 1;
    const FEES_PERCENT = 2;

    private $payment_ok = false;
    private $_confVars = array(
        'BASIC' => array(
            'BANK',
            'DEMO',
            'MERCHANT_ID',
            'OS_PAYMENT_SUCCESS',
            'FALLBACK_CURRENCY',
            'INT_MINAMOUNT',
            'ISO_LANG',
            'INT_CAPTURE_DAY',
            'CAPTURE_MODE',
            'BOOL_RESPONSE_LOG_TXT',
            'BOOL_RESPONSE_LOG_CSV',
            'LOG_PATH',
            'BOOL_FORCE_RETURN',
            'FLOAT_PAYMENT_FEES',
            'FLOAT_PAYMENT_FEES_P',
            'BOOL_ORDER_MESSAGE',
            'BOOL_CHECK_VERSION',
            'OS_PAYMENT_CANCELLED',
            'OS_PAYMENT_FAILED'
        ),
        'GRAPHIC' => array(
            'CARD_IMG_PATH',
            'LOGO_NAME'
        ),
        'ADVANCED' => array(
            'PAYMENT_MEANS',
            'TID_TZ',
            'INT_MIN_TID',
            'BOOL_BINARIES_IN_PATH',
            'BIN_PATH',
            'PARAM_PATH',
            'RETURN_PROTOCOL',
            'RETURN_DOMAIN',
            'RETURN_PROTOCOL_AUTO',
            'RETURN_DOMAIN_AUTO',
            'BOOL_DEBUG_MODE',
            'BOOL_ADVANCED_CONTROLS',
            'ADVANCED_CONTROLS',
            'ERRORS_MAILTO',
            'ERRORS_SHOWTOIP'
        ),
        '23TIMES' => array(
            'BOOL_2TPAYMENT',
            'INT_2TPAYMENT_MINAMOUNT',
            'INT_2TPAYMENT_SPACING',
            'INT_2TPAYMENT_DELAY',
            'INT_2TPAYMENT_OS',
            'FLOAT_2TPAYMENT_FEES',
            'FLOAT_2TPAYMENT_FEES_P',
            'FLOAT_2TPAYMENT_FP_FXD',
            'FLOAT_2TPAYMENT_FP_PCT',
            'BOOL_3TPAYMENT',
            'INT_3TPAYMENT_MINAMOUNT',
            'INT_3TPAYMENT_SPACING',
            'INT_3TPAYMENT_DELAY',
            'INT_3TPAYMENT_OS',
            'FLOAT_3TPAYMENT_FEES',
            'FLOAT_3TPAYMENT_FEES_P',
            'FLOAT_3TPAYMENT_FP_FXD',
            'FLOAT_3TPAYMENT_FP_PCT'
        )
    );
    private $_newConfVars = array(
        '1.2.7' => array(
            'BOOL_ORDER_MESSAGE',
            'BOOL_CHECK_VERSION',
            'OS_PAYMENT_CANCELLED',
            'OS_PAYMENT_FAILED',
            'FLOAT_2TPAYMENT_FP_FXD',
            'FLOAT_2TPAYMENT_FP_PCT',
            'FLOAT_3TPAYMENT_FP_FXD',
            'FLOAT_3TPAYMENT_FP_PCT'
        ),
        '2.2.0' => array(
            'TID_TZ'
        )
    );
    private $_banks = array(
        'cyberplus' => 'CyberPlus - Banque Populaire',
        'etransactions' => 'E-Transactions - Crédit Agricole',
        'elysnet' => 'ElysNet - CCF/HSBC',
        'mercanet' => 'Mercanet - BNP',
        'scelliusnet' => 'ScelliusNet - La Banque Postale',
        'sherlocks' => 'Sherlocks - LCL',
        'sogenactif' => 'Sogenactif - Société Générale',
        'webaffaires' => 'WebAffaires - Crédit du Nord',
        'citelis' => 'Citélis',
        'smc' => 'Société Marseillaise de Crédit'
    );
    private $_demoCertificates = array(
        'cyberplus' => '038862749811111',
        'etransactions' => '013044876511111',
        'elysnet' => '014102450311111',
        'mercanet' => '082584341411111',
        'scelliusnet' => '014141675911111',
        'sherlocks' => '014295303911111',
        'sogenactif' => '014213245611111',
        'webaffaires' => '014022286611111',
        'citelis' => '029800266211111',
        'smc' => '011223344551111'
    );
    private $_currencies = array(
        'EUR' => array('978', 2),
        'USD' => array('840', 2),
        'CHF' => array('756', 2),
        'GBP' => array('826', 2),
        'CAD' => array('124', 2),
        'JPY' => array('392', 0),
        'MXN' => array('484', 2),
        'TRY' => array('949', 2),
        'AUD' => array('036', 2),
        'NZD' => array('554', 2),
        'NOK' => array('578', 2),
        'BRL' => array('986', 2),
        'ARS' => array('032', 2),
        'KHR' => array('116', 2),
        'TWD' => array('901', 2),
        'SEK' => array('752', 2),
        'DKK' => array('208', 2),
        'KRW' => array('410', 0),
        'SGD' => array('702', 2),
        'XPF' => array('953', 0),
        'XOF' => array('952', 0)
    );
    private $_responseFields = array(
        'merchant_id',
        'merchant_country',
        'amount',
        'transaction_id',
        'payment_means',
        'transmission_date',
        'payment_time',
        'payment_date',
        'response_code',
        'payment_certificate',
        'authorisation_id',
        'currency_code',
        'card_number',
        'cvv_flag',
        'cvv_response_code',
        'bank_response_code',
        'complementary_code',
        'complementary_info',
        'return_context',
        'caddie',
        'receipt_complement',
        'merchant_language',
        'language',
        'customer_id',
        'order_id',
        'customer_email',
        'customer_ip_address',
        'capture_day',
        'capture_mode',
        'data'
    );
    private $_responseFieldsLoggedInOrder = array(
        'amount',
        'merchant_id',
        'transaction_id',
        'transmission_date',
        'payment_time',
        'payment_date',
        'response_code',
        'payment_certificate',
        'authorisation_id',
        'currency_code',
        'cvv_flag',
        'cvv_response_code',
        'bank_response_code',
        'complementary_code',
        'complementary_info',
        'return_context',
        'receipt_complement',
        'merchant_language',
        'language',
        'customer_email',
        'customer_ip_address',
        'capture_day',
        'capture_mode',
        'data'
    );
    private $_hasTransacIDAvailableCached = null;

    public function __construct()
    {
        $this->name = 'tgg_atos';
        $this->tab = self::PsVersionCompare('1.4', '<') ? 'Payment' : 'payments_gateways';
        if (self::PsVersionCompare('1.4', '>=')) {
            $this->need_instance = 1;
        }
        if (self::PsVersionCompare('1.5', '>=')) {
            if (!defined('_USER_ID_LANG_')) {
                define('_USER_ID_LANG_', Context::getContext()->language->id);
            }
        }
        $this->version = '2.2.1';
        $this->currencies_mode = 'checkbox';
        parent::__construct();
        $this->displayName = $this->l('SIPS/ATOS');
        $this->description = $this->l('SIPS/ATOS payment module by TrogloGeek', 'tgg_atos');
        $this->confirmUninstall = $this->l('If you uninstall this module, all configuration related to ATOS payment will be deleted, including any production certificate file you could have uploaded. Only logfiles are left in place for security reasons. If you intended only to stop using ATOS for a while and use it again later you should consider disabling this module instead of uninstalling it. Uninstall it anyway ?');
        $this->_autoCheck();
    }

    public static function PsVersionCompare($version, $operator = '>=')
    {
        return version_compare(_PS_VERSION_, $version, $operator);
    }

    public static function redirect($to = '', $code = 302)
    {
        $baseUri = _MODULE_DIR_ . basename(dirname(__FILE__)) . '/front-ctrl/';
        if (self::PsVersionCompare('1.5', '<')) {
            return Tools::redirect($baseUri . $to);
        }
        header('Location: ' . $baseUri . $to, TRUE, $code);
        exit;
    }

    public static function redirectToShop($to = '', $code = 302)
    {
        if (!empty($to) || self::PsVersionCompare('1.5', '<')) {
            return Tools::redirect($to);
        }
        header('Location: ' . __PS_BASE_URI__, TRUE, $code);
        exit;
    }

    /**
     * Checks if module installation generated errors log, if yes displays warning message in PS module administration 
     */
    protected function _autoCheck()
    {
        $this->warning = '';
        if (!Module::isInstalled($this->name)) {
            return;
        }
        if (version_compare($this->version, $this->_get('VERSION'), '>')) {
            $this->_postUpdate();
        }
        /* @var $cookie Cookie */
        global $cookie;
        if ($cookie->isLoggedBack()) {
            $installLogFile = $this->_getModPath() . 'log/install.log';
            if (file_exists($installLogFile)) {
                $this->warning = sprintf(
                        $this->l('Errors occured during installation, see %s, delete, move or rename the file to stop seeing this message.'), $installLogFile
                );
            } elseif (!$this->_get('TID_TZ')) {
                $this->warning = $this->l('No timezone configured');
            } elseif (!$this->_get('ERRORS_MAILTO')) {
                $this->warning = $this->l('No address has been configured to receive Tgg_Atos disfonctionnement alert. Contact address of your shop will be used until another one is specified.');
            } elseif ($this->_get('BOOL_CHECK_VERSION')) {
                if (is_array($current_version = $this->_check_new_version())) {
                    list ($version, $url) = $current_version;
                    $this->warning = sprintf($this->l('New version %s avalaible at %s'), $version, $url);
                } elseif (!$current_version) {
                    $this->warning = $this->l('New version check failure, you should check manually');
                }
            }
        }
    }

    protected function _check_new_version()
    {
        try {
            $context = stream_context_create(array('http' => array('header' => 'Connection: close', 'timeout' => 3)));
            $current_version = @file_get_contents('http://www.capillotracteur.fr/tgg_atos/current_version.txt', false, $context);
            if (!$current_version) {
                return false;
            }
            $current_version = explode('|', $current_version);
            if (count($current_version) > 1) {
                if (version_compare($this->version, $current_version[0], '<')) {
                    return $current_version;
                }
                return true;
            }
        } catch (Exception $e) {
            
        }
        return false;
    }

    /**
     * Install hook override
     * @return boolean Success state
     */
    public function install()
    {
        $errors = array();
        $installed = false;
        try {
            if (!$installed = parent::install()) {
                $errors[] = $this->l('Standard module installation (parent::install()) failed');
            }
            if (!$this->_installTable()) {
                $errors[] = $this->l('Unable to create needed database table');
                $DB = Db::getInstance();
                if ($DB->getMsgError()) {
                    $errors[] = sprintf('Db error: %s', $DB->getMsgError());
                }
            }
            if (!$this->_setDefaults()) {
                $errors[] = $this->l('Unable to register module variables');
            }
            if (!$this->_writeConf()) {
                $errors[] = $this->l('Unable to write configuration file on disk, check permissions on param dir');
            }
            if (!$this->registerHook('payment')) {
                $errors[] = $this->l('Hook registration: Registration as a payment choice in final order step failed ($this->registerHook("payment"))');
            }
            if (!$this->registerHook('paymentReturn')) {
                $errors[] = $this->l('Hook registration: Registration to hook needed to display payment confirmation page failed ($this->registerHook("paymentReturn"))');
            }
            $bankReturnHook = new Hook();
            $bankReturnHook->name = 'tggAtosBankReturn';
            if (!$bankReturnHook->add()) {
                $errors[] = $this->l('Hook declaration: internal hook "tggAtosBankReturn" declaration failed');
            }
            $orderConfirmHook = new Hook();
            $orderConfirmHook->name = 'tggAtosOrderConfirm';
            if (!$orderConfirmHook->add()) {
                $errors[] = $this->l('Hook declaration: internal hook "tggAtosOrderConfirm" declaration failed');
            }
        } catch (Exception $e) {
            /* @var $e Exception */
            $errors[] = $e->getMessage() . "\n" . $e->getTraceAsString();
        }
        $this->_logInstall($errors);
        $this->_autoCheck();
        $this->_set('VERSION', $this->version);
        return $installed;
    }

    /**
     * Module table installation
     * @return bool success
     */
    protected function _installTable()
    {
        return Db::getInstance()->Execute('
            CREATE TABLE `' . _DB_PREFIX_ . $this->name . '_transactions_today` (
                `date`  date NOT NULL,
                `atos_transaction_id`  mediumint(9) UNSIGNED NOT NULL AUTO_INCREMENT,
                PRIMARY KEY (`date`, `atos_transaction_id`)
            )
            ENGINE = MyISAM
            AUTO_INCREMENT=1
        ;');
    }

    /**
     * Uninstall hook override
     * @return boolean Success state
     */
    public function uninstall()
    {
        try {
            $bankReturnHook = new Hook(Hook::get('tggAtosBankReturn'));
            $bankReturnHook->delete();
        } catch (Exception $e) {
            
        }
        try {
            $orderConfirmHook = new Hook(Hook::get('tggAtosOrderConfirm'));
            $orderConfirmHook->delete();
        } catch (Exception $e) {
            
        }
        //pathfile, parmcom & certif
        $path = $this->_getPath('PARAM');
        if (is_dir($path)) {
            if (file_exists($path . 'pathfile')) {
                unlink($path . 'pathfile');
            }
            @chdir($path);
            $prefix = 'parmcom.';
            $prefix_length = strlen($prefix);
            $files = glob($prefix . '*');
            foreach ($files as $file) {
                $file = substr($file, $prefix_length);
                if (preg_match('/^[0-9]+$/', $file))
                    unlink($path . $prefix . $file);
            }
            $certif_ids = $this->_getMerchantIdList();
            foreach ($certif_ids as $id) {
                @unlink($path . 'certif.fr.' . $id);
            }
        }
        //transaction_id table
        Db::getInstance()->Execute('DROP TABLE IF EXISTS `' . _DB_PREFIX_ . $this->name . '_transactions_today`;');
        //Config vars
        foreach ($this->_confVars as $s) {
            foreach ($s as $k) {
                $this->_unset($k);
            }
        }
        return parent::uninstall();
    }

    /**
     * Admin configuration Hook, allow to make a config page for the module
     * @global Smarty $smarty Uses template processing
     * @return string|html
     */
    public function getContent()
    {
        global $smarty;
        $validation_string = '';
        $errors = array();
        $highlights = array('BASIC' => array(), 'GRAPHIC' => array(), 'ADVANCED' => array(), '23TIMES' => array());
        $actions = array(
            'updateBasic' => 0,
            'updateGraphic' => 1,
            'updateAdvanced' => 2,
            'update23Times' => 3,
            'restoreDefault' => 0,
            'renameCertif' => 0,
            'makeTheme' => 1,
            null => 0
        );
        $pos_select = 0;
        foreach ($actions as $action => $pos) {
            $pos_select = $pos;
            if (is_null($action)) {
                break;
            }
            if (Tools::isSubmit($action)) {
                $actionMethod = '_admin_' . $action;
                $validation_string = $this->$actionMethod($errors);
                break;
            }
        }
        $this->_autoCheck();
        if (is_file($this->_getPath('PARAM') . 'CERTIF~1')) {
            return $this->display(__FILE__, 'admin-tpl/' . $this->name . '-back-ask-merchant-id.tpl');
        }
        //BASIC checks
        if (($this->_get('BOOL_RESPONSE_LOG_TXT') || $this->_get('BOOL_RESPONSE_LOG_CSV')) && !is_dir($this->_getPath('LOG'))) {
            $errors[] = $this->l('Logfiles path points to a non existing dir or the dir hasn\'t enough rights');
            $highlights['BASIC'][] = 'log_path';
        }
        if (!Currency::getIdByIsoCode($this->_get('FALLBACK_CURRENCY'))) {
            $errors[] = $this->l('Fallback currency isn\'t set or doesn\'t exist anymore');
            $highlights['BASIC'][] = 'fallback_currency';
        }
        if (!$this->_get('DEMO') && (!$this->_get('MERCHANT_ID'))) {
            $errors[] = $this->l('Merchant id is required in production mode');
            $highlights['BASIC'][] = 'merchant_id';
        }
        $capture_day = intval($this->_get('INT_CAPTURE_DAY'));
        if (($capture_day < 0) || (strlen((string) $capture_day) > 2)) {
            $this->_set('INT_CAPTURE_DAY', 0);
            $errors[] = $this->l('specified CAPTURE_DAY was invalid, must be a natural integer < 100');
            $highlights['BASIC'][] = 'int_capture_day';
        }

        //GRAPHIC checks
        if (!strlen($this->_getPath('CARD_IMG'))) {
            $errors[] = $this->l('Cards logos URL is needed');
            $highlights['GRAPHIC'][] = 'card_img_path';
        }
        if (strlen($this->_get('LOGO_NAME')) == 0) {
            $errors[] = $this->l('Merchant logo filename is required');
            $highlights['GRAPHIC'][] = 'logo_name';
        }
        //ADVANCED checks
        if (!$this->_get('BOOL_BINARIES_IN_PATH')) {
            if (!is_dir($this->_getPath('BIN'))) {
                $errors[] = $this->l('Binaries path points to a non existing dir or the dir hasn\'t enough rights');
                $highlights['ADVANCED'][] = 'bin_path';
            } elseif (!$this->_checkBinariesPath()) {
                $errors[] = $this->l('Binaries not found');
                $highlights['ADVANCED'][] = 'bin_path';
            }
        }
        if (!is_dir($param_path = $this->_getPath('PARAM'))) {
            $errors[] = $this->l('Parameters files path points to a non existing dir or the dir hasn\'t enough rights');
            $highlights['ADVANCED'][] = 'param_path';
        }
        if (strlen($param_path) > 54) {
            $errors[] = $this->l('Parameters files path is too long, 54 characters max');
            $highlights['ADVANCED'][] = 'param_path';
        }
        if (!$this->_get('TID_TZ')) {
            $errors[] = $this->l('A timezone has to be set');
            $highlights['ADVANCED'][] = 'tid_tz';
        }
        $min_tid = intval($this->_get('INT_MIN_TID'));
        if (($min_tid < 1) || ($min_tid > 999999)) {
            $this->_set('INT_MIN_TID', 1);
            $errors[] = $this->l('Minimum transaction ID you specified was invalid, must be an integer between 1 and 999999.');
            $highlights['ADVANCED'][] = 'int_min_tid';
        }

        foreach ($this->_confVars as $s) {
            foreach ($s as $k) {
                $smarty->assign(strtolower($k), $this->_get($k));
            }
        }
        $smarty->assign(array(
            'browsing_through' => empty($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['REMOTE_ADDR'] : $_SERVER['HTTP_X_FORWARDED_FOR'] . ':' . $_SERVER['REMOTE_ADDR'],
            'pos_select' => $pos_select,
            'banks' => $this->_banks,
            'errors' => $errors,
            'merchant_ids' => $this->_getMerchantIdList(),
            'currencies' => $this->_getCurrencies(),
            'default_currency' => $this->_getFallBackCurrency(),
            'order_states' => OrderState::getOrderStates(_USER_ID_LANG_),
            'validation_string' => $validation_string,
            'module_version' => $this->version,
            'tpl_path' => $this->_getModPath() . 'admin-tpl/',
            'highlights' => $highlights,
            'warning' => $this->warning,
            'capture_modes' => array(
                'AUTHOR_CAPTURE',
                'VALIDATION'
            )
        ));
        return $this->display(__FILE__, 'admin-tpl/' . $this->name . '-back-admin.tpl');
    }

    /**
     * Hook for displaying ATOS as a payment module 
     * @global Smarty $smarty Uses templates processing
     * @param array $params
     * @return string|html HTML to display
     */
    public function hookPayment($params)
    {
        /* @var $smarty Smarty */
        global $smarty;
        /* @var $cart Cart */
        $cart = $params['cart'];
        $payment_currency = null;
        $smarty->assign(array(
            'controller' => _MODULE_DIR_ . $this->name . '/' . 'front-ctrl/payment-redirect.php',
            'bank' => $this->_get('BANK'),
            'willSwitchCurrency' => $this->_willSwitchCurrency($cart),
            'canProcess' => $this->canProcess($cart),
            'fees' => $this->getCartFeesStr($cart, $payment_currency),
            'total' => Tools::displayPrice($cart->getOrderTotal() + $this->getCartFees($cart, $payment_currency), $payment_currency),
            'canProcess2t' => $this->canProcess($cart, 2),
            'canProcess3t' => $this->canProcess($cart, 3),
            '2t_allowed' => $this->_get('BOOL_2TPAYMENT'),
            '2t_fees' => $this->getCartFeesStr($cart, $payment_currency, 2),
            '2t_total' => Tools::displayPrice($cart->getOrderTotal() + $this->getCartFees($cart, $payment_currency, 2), $payment_currency),
            '3t_allowed' => $this->_get('BOOL_3TPAYMENT'),
            '3t_fees' => $this->getCartFeesStr($cart, $payment_currency, 3),
            '3t_total' => Tools::displayPrice($cart->getOrderTotal() + $this->getCartFees($cart, $payment_currency, 3), $payment_currency)
        ));
        return $this->display(__FILE__, 'tpl/' . $this->name . '-front-hookpayment.tpl');
    }

    /**
     * Hook for displaying things on payment return page
     * @return string|html HTML to display
     */
    public function hookPaymentReturn()
    {
        return $this->display(__FILE__, 'tpl/' . $this->name . '-front-order-confirmation.tpl');
    }

    /**
     * Generate a payment form, will initiate a transaction in an ATOS way of speaking
     * @global Cart $cart Gets amount informations, alters currency to fit module configuration if required
     * @global Cookie $cookie Alters currency to fit module configuration if required
     * @param float &$amount Amount to be paid
     * @param array &$payment_currency Will be setted with array_assoc representation of the Currency that will be used 
     * @param false|2|3 &$splitted FALSE if one time payment, else: number of transactions (2 or 3) 
     * @return html|boolean Payment form generated by ATOS API
     */
    public function getPaymentForm(&$amount, &$payment_currency, &$splitted = FALSE)
    {
        global $cart;
        global $cookie;
        //check currency and convert price
        $payment_currency = $this->_getCurrencyToUse($cart);

        if ($payment_currency['id_currency'] != $cart->id_currency) {
            $cookie->id_currency = $payment_currency['id_currency'];
            $cart->id_currency = $payment_currency['id_currency'];
            $cart->update();
            //Currency updated, refresh to avoid bugs
            Tools::redirectLink($_SERVER['REQUEST_URI']);
        }

        $amount = $this->_round($cart->getOrderTotal(true), _PS_PRICE_DISPLAY_PRECISION_);
        $amount += $this->getCartFees($cart, $payment_currency, $splitted ? $splitted : 1);
        $atos_amount = (string) round($amount * pow(10, intval($payment_currency['nb_decimals'])));
        $atos_amount = str_repeat("0", max(0, 3 - strlen($atos_amount))) . $atos_amount;

        $Customer = new Customer($cart->id_customer);
        $Lang = new Language(_USER_ID_LANG_);
        $cmd = $this->_getPath('BIN') . 'request';
        $return_base_url = $this->_getReturnBaseURL();
        $params = array(
            'amount' => $atos_amount,
            'automatic_response_url' => $this->_getReturnBaseURL(TRUE) . 'front-ctrl/payment-autoresponse.php',
            'cancel_return_url' => $return_base_url . 'front-ctrl/payment-return.php',
            'capture_day' => $this->_get('INT_CAPTURE_DAY'),
            'capture_mode' => $this->_get('CAPTURE_MODE'),
            'currency_code' => $payment_currency['atos_code'],
            'customer_id' => $Customer->id,
            'customer_email' => $Customer->email,
            'customer_ip_address' => substr($_SERVER['REMOTE_ADDR'], 0, 19),
            'language' => ($this->_get('ISO_LANG') ? $this->_get('ISO_LANG') : $Lang->iso_code),
            'merchant_id' => $this->_getMerchantId(),
            'normal_return_url' => $return_base_url . 'front-ctrl/payment-return.php',
            'order_id' => $cart->id,
            'transaction_id' => $this->_generateTransactionID()
        );
        if (($splitted = intval($splitted)) && (($namespace = $splitted . 'TPAYMENT') && $this->_get('BOOL_' . $namespace))) {
            $params = array_merge($params, array(
                'capture_mode' => 'PAYMENT_N', //let ATOS know that we want a splitted payment
                'capture_day' => $this->_get('INT_' . $namespace . '_DELAY'),
                'data' => implode(';', array(
                    'NB_PAYMENT=' . $splitted,
                    'PERIOD=' . $this->_get('INT_' . $namespace . '_SPACING'),
                    'INITIAL_AMOUNT=' . round($this->_defaultCurrencyConvert($this->_getFloat($namespace . '_FP_FXD'), $payment_currency) * pow(10, intval($payment_currency['nb_decimals'])) + $atos_amount * $this->_getFloat($namespace . '_FP_PCT') / 100)
                ))
            ));
        } else {
            $splitted = FALSE;
        }
        if ($this->_get('BOOL_FORCE_RETURN')) {
            if (isset($params['data'])) {
                $params['data'] .= ';NO_RESPONSE_PAGE';
            } else {
                $params['data'] = 'NO_RESPONSE_PAGE';
            }
        }
        //Adding advanced cards controls
        if ($this->_get('BOOL_ADVANCED_CONTROLS')) {
            if (($cbcontrols = $this->_get('ADVANCED_CONTROLS')) != '') {
                if (isset($params['data'])) {
                    $params['data'] .= ';<CONTROLS>'.$cbcontrols.'</CONTROLS>';
                } else {
                    $params['data'] = '<CONTROLS>'.$cbcontrols.'</CONTROLS>';
                }
            }
            unset($cbcontrols);
        }
        $this->_requestParamsXmlOverride($params, $splitted);
        $output = $this->_call('request', $params);
        if (is_array($output)) {
            return $output[0];
        }
        return FALSE;
    }

    /**
     * wrapper for ATOS API response unencryption
     * @param string $data DATA returned by bank server
     * @return boolean|StdClass Hashmap object representation of unencrypted DATA.
     */
    public function decryptResponse($data)
    {
        $output = $this->_call('response', array('message' => $data));
        if (!is_array($output)) {
            return FALSE;
        }
        $response = array();
        foreach ($output as $k => $v) {
            $response[$this->_responseFields[$k]] = $v;
        }
        return (object) $response;
    }

    /**
     * Process the unencrypted bank response, Prestashop logics about order creation and logs goes here
     * @global Cookie $cookie Alters currency if needed to correspond to the one used by bank
     * @param stdClass $Response Response hashmap
     * @param Customer $Customer Will be set with the Customer who holds the order
     * @param Order $Order Will be set with the Order that has been validated
     * @param Currency $Currency Will be set with the Currency hat has been used by paiement
     * @param float $amount Will be set to effective paiement amount
     * @param Cart $cart Will be set to the cart being turned into Order
     * @return boolean Return true if the order has been created (even if created by a former call) 
     */
    public function processResponse($Response, &$Customer, &$Order, &$Currency, &$amount, &$cart)
    {
        global $cookie;
        $Order = null;
        $Response->caller_ip_address = $_SERVER['REMOTE_ADDR'];
        $this->_logResponse($Response);
        $cart = new Cart($Response->order_id);
        if (!Validate::isLoadedObject($cart)) {
            return $this->_invalid_response($this->l('Cart ID returned in id_order field does not exist'), $Response);
        }
        if (!empty($Response->customer_id)) {
            $Customer = new Customer($Response->customer_id);
            if ($cart->id_customer != $Customer->id) {
                return $this->_invalid_response($this->l('Cart which ID has been returned in field id_order does not belong to Customer which ID has been returned in field id_customer'), $Response);
            }
        } else {
            $Customer = new Customer($cart->id_customer);
        }
        if (!Validate::isLoadedObject($Customer)) {
            return $this->_invalid_response($this->l('Customer ID returned in id_customer field does not exist'), $Response);
        }
        $currency_used = NULL;
        foreach ($this->_currencies as $k => $v) {
            if ($v[0] == $Response->currency_code) {
                $currency_used = $k;
                break;
            }
        }
        if (is_null($currency_used)) {
            return $this->_invalid_response($this->l('Unknown currency_code'), $Response);
        }
        $Currency = new Currency(Currency::getIdByIsoCode($currency_used));
        $amount = $Response->amount / pow(10, $this->_currencies[$currency_used][1]);
        if (!Validate::isLoadedObject($Currency)) {
            return $this->_invalid_response($this->l('ISO Currency Code ') . $currency_used . $this->l(' isn\'t implemented in Prestashop, can\'t process order.'), $Response);
        }
        Module::hookExec('tggAtosBankReturn', array('Response' => $Response, 'Cart' => $cart, 'Customer' => $Customer));
        if (($Response->response_code === '00')) {
            $this->payment_ok = true;
        } else {
            if (
                    !(($Response->response_code === '17') && ($order_state = $this->_get('OS_PAYMENT_CANCELLED'))) &&
                    !($order_state = $this->_get('OS_PAYMENT_CANCELLED'))
            ) {
                return FALSE;
            }
        }
        //Which order state to apply ?
        if ($Response->capture_mode == 'PAYMENT_N') {
            $data = explode(';', $Response->data);
            $Data = new stdClass();
            foreach ($data as $field) {
                $field = explode('=', $field);
                $Data->{$field[0]} = $field[1];
            }
            if (!$order_state) {
                $order_state = $this->_get('INT_' . $Data->NB_PAYMENT . 'TPAYMENT_OS');
            }
            $payment_n = $Data->NB_PAYMENT;
            /* We have to reserve transaction_id for automated transactions */
            $timezone = new DateTimeZone($this->_get('TID_TZ'));
            $paymentDate = DateTime::createFromFormat('Ymd', $Response->payment_date, $timezone);
            $period = new DateInterval(sprintf('P%uD', intval($Data->PERIOD)));
            $DB = Db::getInstance();
            for ($pn = 1; $pn < $payment_n; $pn++) {
                $paymentDate->add($period);
                $DB->Execute('INSERT IGNORE INTO `' . _DB_PREFIX_ . $this->name . '_transactions_today` SET date = \'' . $paymentDate->format('Y-m-d') . '\', atos_transaction_id = ' . intval($Response->transaction_id));
            }
        } else {
            if (!$order_state) {
                $order_state = $this->_get('OS_PAYMENT_SUCCESS');
            }
            $payment_n = false;
        }
        $payment_currency = null;
        if (!$cart->OrderExists()) {
            if ($cart->id_currency != $Currency->id) {
                $cart->id_currency = $Currency->id;
                $cookie->id_currency = $Currency->id;
                $cart->update();
            }
            if ($this->validateOrder(
                            $cart->id, $order_state, ($amount - $this->getCartFees($cart, $payment_currency, $payment_n ? $payment_n : 1)), $this->displayName, $this->_makeOrderMessage($Response), array(), ($cart->id_currency != $Currency->id) ? $Currency->id : NULL, FALSE, $Customer->secure_key
                    )) {
                $Order = new Order($this->currentOrder);
                if ($this->payment_ok) {
                    Module::hookExec('tggAtosOrderConfirm', array('Response' => $Response, 'Cart' => $cart, 'Customer' => $Customer, 'Order' => $Order));
                } else if (
                        (is_callable(array($cart, 'duplicate'))) &&
                        is_array($duplication_result = $cart->duplicate()) &&
                        ($duplication_result['success'])
                ) {
                    $cart = $duplication_result['cart'];
                    $cookie->id_cart = $cart->id;
                }
            } else {
                return FALSE;
            }
        }
        if (!$Order) {
            $Order = new Order(Order::getOrderByCartId($cart->id));
        }
        return $this->payment_ok;
    }

    /**
     * Check if module graphical ressources are exported to ps theme dir  
     * @return boolean
     */
    public function isThemeExportedDir()
    {
        return is_dir(_PS_THEME_DIR_ . 'modules/' . $this->name . '/tpl/');
    }

    /**
     * Returns module graphical ressources container fs path 
     * @return string filesystem path
     */
    public function getThemePath()
    {
        if ($this->isThemeExportedDir()) {
            return _PS_THEME_DIR_ . 'modules/' . $this->name . '/';
        } else {
            return _PS_MODULE_DIR_ . $this->name . '/';
        }
    }

    /**
     * Returns module graphical ressources container uri
     * @return string uri
     */
    public function getThemeUri()
    {
        if ($this->isThemeExportedDir()) {
            return _THEME_DIR_ . 'modules/' . $this->name . '/';
        } else {
            return _MODULE_DIR_ . $this->name . '/';
        }
    }

    protected function _adminUpdateFromPost($section)
    {
        $localeconf = localeconv();
        foreach ($this->_confVars[$section] as $k) {
            if (strpos($k, 'BOOL_') === 0) {
                if (Tools::getIsset(strtolower($k)) && Tools::getValue(strtolower($k))) {
                    $this->_set($k, 1);
                } else {
                    $this->_set($k, 0);
                }
            } elseif (strpos($k, 'INT_') === 0) {
                if (Tools::getIsset(strtolower($k))) {
                    $this->_set($k, intval(Tools::getValue(strtolower($k))));
                } else {
                    $this->_set($k, 0);
                }
            } elseif (strpos($k, 'FLOAT_') === 0) {
                if (Tools::getIsset(strtolower($k))) {
                    $this->_set($k, floatval(preg_replace('/[.,]/', $localeconf['decimal_point'], Tools::getValue(strtolower($k)))));
                } else {
                    $this->_set($k, 0);
                }
            } else {
                if (Tools::getIsset(strtolower($k))) {
                    $this->_set($k, Tools::getValue(strtolower($k)));
                }
            }
        }
    }

    protected function _admin_updateBasic(&$errors)
    {
        $this->_adminUpdateFromPost('BASIC');
        if (is_uploaded_file($_FILES['new_certificate']['tmp_name'])) {
            if (!$this->_uploadCertificate()) {
                $errors[] = $this->l('Unable to write certificate file, check permitions on param dir');
            }
        }
        if (!$this->_writeConf()) {
            $errors[] = $this->l('Unable to write configuration file, check permitions on param dir');
        }
        return $this->l('Basic configuration updated');
    }

    protected function _admin_updateGraphic(&$errors)
    {
        $this->_adminUpdateFromPost('GRAPHIC');
        if (!$this->_writeConf()) {
            $errors[] = $this->l('Unable to write configuration file, check permitions on param dir');
        }
        return $this->l('Graphic configuration updated');
    }

    protected function _admin_updateAdvanced(&$errors)
    {
        $this->_adminUpdateFromPost('ADVANCED');
        if (!$this->_writeConf()) {
            $errors[] = $this->l('Unable to write configuration file, check permitions on param dir');
        }
        return $this->l('Advanced configuration updated');
    }

    protected function _admin_update23Times(&$errors)
    {
        $this->_adminUpdateFromPost('23TIMES');
        return $this->l('2/3 times payment configuration updated');
    }

    protected function _admin_restoreDefault(&$errors)
    {
        $this->_setDefaults();
        if (!$this->_writeConf()) {
            $errors[] = $this->l('Unable to write configuration file, check permitions on param dir');
        }
        return $this->l('Default configuration loaded');
    }

    protected function _admin_renameCertif(&$errors)
    {
        $merchant_id = trim(Tools::getValue('merchant_id'));
        if (preg_match('/^[0-9]{15}$/', $merchant_id)) {
            rename($this->_getPath('PARAM') . 'CERTIF~1', $this->_getPath('PARAM') . 'certif.fr.' . $merchant_id);
            $this->_set('MERCHANT_ID', $merchant_id);
            $this->_writeConf();
            return $this->l('Certificate file renamed');
        } else {
            $errors[] = 'Merchant ID was invalid, must be a 15 digits number';
        }
    }

    protected function _admin_makeTheme(&$errors)
    {
        try {
            chdir($this->_getModPath());
            umask(0);
            $theme_path = _PS_THEME_DIR_ . 'modules/' . $this->name . '/';
            if (!is_dir($theme_path)) {
                mkdir($theme_path, 0775, TRUE);
            }
            $mod_path = $this->_getModPath();
            exec('cp -R ' . $mod_path . 'images ' . $theme_path);
            exec('cp -R ' . $mod_path . 'tpl ' . $theme_path);
            $lang_files = glob('??.php');
            foreach ($lang_files as $lang_file) {
                if ($Fo = fopen($lang_file, 'r')) {
                    if ($Fd = fopen($theme_path . $lang_file, 'w')) {
                        while ($line = fgets($Fo)) {
                            $line = str_replace('<{' . $this->name . '}prestashop>', '<{' . $this->name . '}' . strtolower(_THEME_NAME_) . '>', $line);
                            fputs($Fd, $line);
                        }
                        fclose($Fd);
                        return $this->l('Theme dir created.') . '<br />' . $theme_path;
                    } else {
                        throw new Exception('Unable to open (write) lang file ' . $theme_path . $lang_file);
                    }
                    fclose($Fo);
                } else {
                    throw new Exception('Unable to open (read) lang file ' . $this->_getModPath() . $lang_file);
                }
            }
        } catch (Exception $e) {
            try {
                if ($Fo) {
                    fclose($Fo);
                }
                if ($Fd) {
                    fclose($Fd);
                }
            } catch (Exception $e2) {
                
            }
            $errors[] = $e->getMessage();
        }
    }

    protected function _hasTransacIDAvailable()
    {
        if (is_null($this->_hasTransacIDAvailableCached)) {
            $this->_hasTransacIDAvailableCached = (Db::getInstance()->getValue('SELECT MAX(`atos_transaction_id`) FROM ' . _DB_PREFIX_ . $this->name . '_transactions_today` WHERE date = \'' . date('Y-m-d') . '\'') < 999999);
        }
        return $this->_hasTransacIDAvailableCached;
    }

    protected function _canGenerateTransacID()
    {
        
    }

    /**
     * Get minimum amount to process a cart with this payment method, according 
     * @param array $payment_currency
     * @param FALSE|int $payment_n
     * @return boolean|int
     */
    protected function _getMinAmount($payment_currency, $payment_n = FALSE)
    {
        $minAmount = $this->_getInt(($payment_n ? $payment_n . 'TPAYMENT_' : '') . 'MINAMOUNT');
        if (!$minAmount) {
            return FALSE;
        }
        $default_currency = $this->_getFallBackCurrency();
        if ($default_currency['id_currency'] == $payment_currency['id_currency']) {
            return $this->_round($minAmount, 0);
        }
        return $this->_round($minAmount / $default_currency['conversion_rate'] * $payment_currency['conversion_rate'], 0);
    }

    /**
     * Returns TRUE if payment can be processed for this cart, error message otherwise
     * @param 	Cart	$cart
     * @return	bool|string	Error message
     */
    public function canProcess($cart, $payment_n = FALSE)
    {
        if ($payment_n && !$this->_get('BOOL_' . $payment_n . 'TPAYMENT')) {
            return FALSE;
        }
        if (!$this->_hasTransacIDAvailable()) {
            return $this->l('Payment by card is unavailable until tomorrow, we apologize for the inconvenience.');
        }
        $payment_currency = $this->_getCurrencyToUse($cart);
        if ($min_amount = $this->_getMinAmount($payment_currency, $payment_n)) {
            $amount = $this->_round($cart->getOrderTotal(true), _PS_PRICE_DISPLAY_PRECISION_);
            if ($cart->id_currency != $payment_currency['id_currency']) {
                $cart_currency = new Currency($cart->id_currency);
                $amount *= $payment_currency['conversion_rate'] / $cart_currency->conversion_rate;
            }
            $amount = $this->_round($amount, _PS_PRICE_DISPLAY_PRECISION_);
            if ($min_amount > $amount) {
                return sprintf($this->l('This payment method requieres a minimum cart amount of %s to be used, we apologize for the inconvenience.'), Tools::displayPrice($min_amount, $payment_currency));
            }
        }
        return TRUE;
    }

    protected function _defaultCurrencyConvert($amount, &$payment_currency)
    {
        $default_currency = $this->_getFallBackCurrency();
        if ($default_currency['conversion_rate'] == $payment_currency['conversion_rate']) {
            return $amount;
        } else {
            return $this->_round($amount / $default_currency['conversion_rate'] * $payment_currency['conversion_rate'], min(_PS_PRICE_DISPLAY_PRECISION_, $payment_currency['nb_decimals']));
        }
    }

    public function getFees($amount, &$payment_currency, $payment_n = 1, $type = self::FEES_TOTAL)
    {
        global $cart;
        $prefix = ($payment_n == 1) ? '' : $payment_n . 'T';
        switch ($type) {
            case self::FEES_TOTAL:
                return $this->getFees($amount, $payment_currency, $payment_n, self::FEES_FIXED) + $this->getFees($amount, $payment_currency, $payment_n, self::FEES_PERCENT);
                break;

            case self::FEES_FIXED:
                if (empty($payment_currency)) {
                    $payment_currency = $this->_getCurrencyToUse($cart);
                }
                $fees = $this->_getFloat($prefix . 'PAYMENT_FEES');
                return $this->_defaultCurrencyConvert($fees, $payment_currency);
                break;

            case self::FEES_PERCENT:
                $fees = $this->_getFloat($prefix . 'PAYMENT_FEES_P');
                return $this->_round($fees / 100 * $amount, min(_PS_PRICE_DISPLAY_PRECISION_, $payment_currency['nb_decimals']));
                break;

            default:
                throw new Exception('tgg_atos->getFees($amount, &$payment_currency,  $payment_n = 1, $type = self::FEES_TOTAL): invalid type');
                break;
        }
    }

    public function getCartFees($_cart, &$payment_currency, $payment_n = 1, $type = self::FEES_TOTAL)
    {
        global $cart;
        if (empty($_cart)) {
            $_cart = $cart;
        }
        return $this->getFees($_cart->getOrderTotal(), $payment_currency, $payment_n, $type);
    }

    public function getCartFeesStr($cart, &$payment_currency, $payment_n = 1, $type = self::FEES_TOTAL)
    {
        if ($type == self::FEES_TOTAL) {
            $fixed = $this->getCartFeesStr($cart, $payment_currency, $payment_n, $type = self::FEES_FIXED);
            $percent = $this->getCartFeesStr($cart, $payment_currency, $payment_n, $type = self::FEES_PERCENT);
            if (!empty($fixed) && !empty($percent)) {
                return Tools::displayPrice($this->getCartFees($cart, $payment_currency, $payment_n), $payment_currency) . '&nbsp;=&nbsp;' . $fixed . '&nbsp;+&nbsp;' . $percent . '.';
            } else {
                return $fixed . $percent;
            }
        }
        $fees = $this->getCartFees($cart, $payment_currency, $payment_n, $type);
        if (!$fees) {
            return '';
        }
        if ($type == self::FEES_PERCENT) {
            $prefix = ($payment_n == 1) ? '' : $payment_n . 'T';
            return sprintf($this->l('%s (%s%% of your order total amount)'), Tools::displayPrice($fees, $payment_currency), $this->_getFloat($prefix . 'PAYMENT_FEES_P'));
        } else {
            return sprintf($this->l('fixed fees: %s'), Tools::displayPrice($fees, $payment_currency));
        }
    }

    protected function _get($varname)
    {
        return Configuration::get(strtoupper($this->name) . '_' . $varname);
    }

    protected function _getInt($varname)
    {
        return intval($this->_get('INT_' . $varname));
    }

    protected function _getFloat($varname)
    {
        return floatval($this->_get('FLOAT_' . $varname));
    }

    protected function _getInstallLogFile()
    {
        return $this->_getModPath() . 'log/install.log';
    }

    protected function _getModPath($withTrailingSlash = TRUE)
    {
        return _PS_MODULE_DIR_ . $this->name . ($withTrailingSlash ? '/' : '');
    }

    protected function _getPath($varname)
    {
        $path = $this->_get($varname . '_PATH');
        if ($path[strlen($path) - 1] != '/') {
            $path .= '/';
        }
        return $path;
    }

    protected function _getMerchantId()
    {
        if ($this->_get('DEMO')) {
            return $this->_demoCertificates[$this->_get('BANK')];
        } else {
            return $this->_get('MERCHANT_ID');
        }
    }

    protected function _getMerchantIdList()
    {
        $prefix = 'certif.fr.';
        $prefix_length = strlen($prefix);
        $path = $this->_getPath('PARAM');
        if (!is_dir($path)) {
            return FALSE;
        }
        chdir($path);
        $files = glob($prefix . str_repeat('?', 15));
        $codes = array();
        foreach ($files as $file) {
            $code = substr($file, $prefix_length);
            if (preg_match('/^[0-9]{15}$/', $code)) {
                if (!in_array($code, $this->_demoCertificates)) {
                    $codes[] = $code;
                }
            }
        }
        return $codes;
    }

    /**
     * Returns an array of enabled currencies (allowed and declared in static atos array $this->_currencies)
     * @return array	Currency db rows expended with 'atos_code' and 'nb_decimals' keys
     */
    protected function _getCurrencies()
    {
        $currencies = $this->getCurrency();
        foreach ($currencies as $k => $currency) {
            if (!array_key_exists($currency['iso_code'], $this->_currencies)) {
                unset($currencies[$k]);
            } else {
                $currencies[$k]['atos_code'] = $this->_currencies[$currency['iso_code']][0];
                $currencies[$k]['nb_decimals'] = $this->_currencies[$currency['iso_code']][1];
            }
        }
        return $currencies;
    }

    /**
     * Returns db row of fallback currency expended with 'atos_code' and 'nb_decimals' keys
     * @return array	Currency db row expended with 'atos_code' and 'nb_decimals' keys
     */
    protected function _getFallBackCurrency()
    {
        $currency = Currency::getCurrency(Currency::getIdByIsoCode($this->_get('FALLBACK_CURRENCY')));
        $currency['atos_code'] = $this->_currencies[$currency['iso_code']][0];
        $currency['nb_decimals'] = $this->_currencies[$currency['iso_code']][1];
        return $currency;
    }

    /**
     * Get the currency that will be used with this cart
     * @param	$cart	Cart
     * @return array	Currency db row expended with 'atos_code' and 'nb_decimals' keys
     */
    protected function _getCurrencyToUse($cart)
    {
        $currencies = $this->_getCurrencies();
        $payment_currency = NULL;
        foreach ($currencies as $currency) {
            if ($currency['id_currency'] == $cart->id_currency) {
                $payment_currency = $currency;
                break;
            }
        }
        if (is_null($payment_currency)) {
            $payment_currency = $this->_getFallBackCurrency();
        }
        return $payment_currency;
    }

    protected function _getReturnProtocolAuto()
    {
        if (($protocol = $this->_get('RETURN_PROTOCOL_AUTO')) == 'auto') {
            $protocol = (Configuration::get('PS_SSL_ENABLED') OR ( isset($_SERVER['HTTPS']) AND strtolower($_SERVER['HTTPS']) == 'on')) ? 'https://' : 'http://';
        }
        return $protocol;
    }

    protected function _getReturnDomainAuto()
    {
        if (!$domain = $this->_get('RETURN_DOMAIN_AUTO')) {
            $domain = $_SERVER['HTTP_HOST'];
        }
        return $domain;
    }

    protected function _getReturnProtocol()
    {
        if (($protocol = $this->_get('RETURN_PROTOCOL')) == 'auto') {
            $protocol = (Configuration::get('PS_SSL_ENABLED') OR ( isset($_SERVER['HTTPS']) AND strtolower($_SERVER['HTTPS']) == 'on')) ? 'https://' : 'http://';
        }
        return $protocol;
    }

    protected function _getReturnDomain()
    {
        if (!$domain = $this->_get('RETURN_DOMAIN')) {
            $domain = $_SERVER['HTTP_HOST'];
        }
        return $domain;
    }

    protected function _getReturnBaseURL($auto = FALSE)
    {
        if ($auto) {
            return $this->_getReturnProtocolAuto() . $this->_getReturnDomainAuto() . _MODULE_DIR_ . $this->name . '/';
        } else {
            return $this->_getReturnProtocol() . $this->_getReturnDomain() . _MODULE_DIR_ . $this->name . '/';
        }
    }

    protected function _set($varname, $value)
    {
        return Configuration::updateValue(strtoupper($this->name) . '_' . $varname, $value);
    }

    protected function _setDefaults($toUpdate = null)
    {
        $path = str_replace('\\', '/', dirname(__FILE__));
        if ($path[strlen($path) - 1] != '/') {
            $path .= '/';
        }
        $defaults = array(
            'DEMO' => '1',
            'BANK' => 'cyberplus',
            'MERCHANT_ID' => '',
            'LOGO_NAME' => 'merchant.gif',
            'OS_PAYMENT_SUCCESS' => _PS_OS_PAYMENT_,
            'FALLBACK_CURRENCY' => 'EUR',
            'INT_MINAMOUNT' => 0,
            'FLOAT_PAYMENT_FEES' => 0,
            'FLOAT_PAYMENT_FEES_P' => 0,
            'ISO_LANG' => '',
            'PAYMENT_MEANS' => 'CB,3,VISA,3,MASTERCARD,3',
            'TID_TZ' => 'UTC',
            'INT_MIN_TID' => 1,
            'INT_CAPTURE_DAY' => 0,
            'CAPTURE_MODE' => 'AUTHOR_CAPTURE',
            'BIN_PATH' => $path . 'bin/',
            'PARAM_PATH' => $path . 'param/',
            'LOG_PATH' => $path . 'log/',
            'CARD_IMG_PATH' => _MODULE_DIR_ . $this->name . '/card_logo/',
            'RETURN_PROTOCOL' => 'auto',
            'RETURN_DOMAIN' => '',
            'RETURN_PROTOCOL_AUTO' => 'auto',
            'RETURN_DOMAIN_AUTO' => '',
            'BOOL_RESPONSE_LOG_TXT' => 1,
            'BOOL_RESPONSE_LOG_CSV' => 0,
            'BOOL_BINARIES_IN_PATH' => 0,
            'ERRORS_MAILTO' => 'PS_SHOP_EMAIL',
            'ERRORS_DEVIP' => '',
            'BOOL_2TPAYMENT' => 0,
            'INT_2TPAYMENT_MINAMOUNT' => 0,
            'INT_2TPAYMENT_SPACING' => 30,
            'INT_2TPAYMENT_DELAY' => 0,
            'INT_2TPAYMENT_OS' => _PS_OS_PAYMENT_,
            'FLOAT_2TPAYMENT_FEES' => 0,
            'FLOAT_2TPAYMENT_FEES_P' => 0,
            'BOOL_3TPAYMENT' => 0,
            'INT_3TPAYMENT_MINAMOUNT' => 0,
            'INT_3TPAYMENT_SPACING' => 30,
            'INT_3TPAYMENT_DELAY' => 0,
            'INT_3TPAYMENT_OS' => _PS_OS_PAYMENT_,
            'FLOAT_3TPAYMENT_FEES' => 0,
            'FLOAT_3TPAYMENT_FEES_P' => 0,
            'BOOL_DEBUG_MODE' => 0,
            'BOOL_FORCE_RETURN' => 0,
            'BOOL_ADVANCED_CONTROLS' => 0,
            'ADVANCED_CONTROLS' => '',
            'BOOL_ORDER_MESSAGE' => 1,
            'BOOL_CHECK_VERSION' => 1,
            'OS_PAYMENT_CANCELLED' => 0,
            'OS_PAYMENT_FAILED' => 0,
            'FLOAT_2TPAYMENT_FP_FXD' => 0,
            'FLOAT_2TPAYMENT_FP_PCT' => 50,
            'FLOAT_3TPAYMENT_FP_FXD' => 0,
            'FLOAT_3TPAYMENT_FP_PCT' => 33.4
        );
        if (is_array($toUpdate)) {
            $defaultsToUpdate = array();
            foreach ($toUpdate as $var) {
                $defaultsToUpdate[$var] = $defaults[$var];
            }
            $defaults = $defaultsToUpdate;
        }
        $retval = TRUE;
        foreach ($defaults as $k => $v) {
            $retval = $this->_set($k, $v) && $retval;
        }
        return $retval;
    }

    protected function _postUpdate()
    {
        $config = $this->_get('VERSION');
        if (!$config) {
            $config = '0';
        }
        $toUpdate = array();
        foreach ($this->_newConfVars as $version => $vars) {
            if (version_compare($this->version, $config, '>')) {
                $toUpdate = array_merge($toUpdate, $vars);
            }
        }
        if ($this->_setDefaults($toUpdate)) {
            $this->_set('VERSION', $this->version);
        }
    }

    protected function _unset($varname)
    {
        return Configuration::deleteByName(strtoupper($this->name) . '_' . $varname);
    }

    protected function _uploadCertificate()
    {
        try {
            $path = $this->_getPath('PARAM');
            if (!is_dir($path)) {
                return FALSE;
            }
            $F = $_FILES['new_certificate'];
            if (preg_match('/^certif\.fr\.([0-9]+)$/', $F['name'], $pattern_result)) {
                $name = $F['name'];
                $this->_set('MERCHANT_ID', $pattern_result[1]);
                $this->_writeConf();
            } else {
                $name = 'CERTIF~1';
            }
            return move_uploaded_file($F['tmp_name'], $path . $name);
        } catch (Exception $e) {
            return FALSE;
        }
    }

    protected function _writeConf()
    {
        $param_path = $this->_getPath('PARAM');
        if (!is_dir($param_path)) {
            return FALSE;
        }
        $merchant_id = $this->_getMerchantId();
        if ($merchant_id === FALSE || !strlen($merchant_id)) {
            return TRUE;
        }
        try {
            //Ecriture du pathfile
            if (!$F = @fopen($param_path . 'pathfile', 'w')) {
                return FALSE;
            }
            fwrite($F, 'DEBUG!' . ($this->_get('BOOL_DEBUG_MODE') ? 'YES' : 'NO') . '!' . "\n");
            fwrite($F, 'D_LOGO!' . $this->_getPath('CARD_IMG') . '!' . "\n");
            fwrite($F, 'F_CERTIFICATE!' . $param_path . 'certif!' . "\n");
            fwrite($F, 'F_PARAM!' . $param_path . 'parmcom!' . "\n");
            fwrite($F, 'F_DEFAULT!' . $param_path . 'parmcom.' . $this->_get('BANK') . '!');
            fclose($F);
            //Ecriture du parmcom
            if (!$F = @fopen($param_path . 'parmcom.' . $this->_getMerchantId(), 'w')) {
                return FALSE;
            }
            fwrite($F, 'LOGO!' . $this->_get('LOGO_NAME') . '!' . "\n");
            fwrite($F, 'MERCHANT_COUNTRY!fr!' . "\n");
            fwrite($F, 'PAYMENT_MEANS!' . $this->_get('PAYMENT_MEANS') . '!' . "\n");
            fclose($F);
            return TRUE;
        } catch (Exception $e) {
            return FALSE;
        }
    }

    protected function _checkBinariesPath()
    {
        $path = $this->_getPath('BIN');
        return (is_file($path . 'response') && is_file($path . 'request')) || (is_file($path . 'response.exe') && is_file($path . 'request.exe'));
    }

    /* Retourne un ID de transaction unique sur la journée */

    protected function _generateTransactionID()
    {
        $error = '';
        $tid = false;
        try {
            $timezone = new DateTimeZone($this->_get('TID_TZ'));
            $DB = Db::getInstance();
            $today = new DateTime('now', $timezone);
            //Nettoyage des ID des jours précédents
            $DB->Execute('DELETE FROM `' . _DB_PREFIX_ . $this->name . '_transactions_today` WHERE date < \'' . $today->format('Y-m-d') . '\'');
            //Réservation d'un ID sur la journée
            $DB->Execute('INSERT INTO `' . _DB_PREFIX_ . $this->name . '_transactions_today` SET date = \'' . $today->format('Y-m-d') . '\'');
            $min_tid = intval($this->_get('INT_MIN_TID'));
            $tid = intval($DB->Insert_ID());
            if ($tid < $min_tid) {
                $DB->Execute('INSERT INTO `' . _DB_PREFIX_ . $this->name . '_transactions_today` SET date = \'' . $today->format('Y-m-d') . '\', atos_transaction_id = ' . intval($min_tid));
                $tid = intval($DB->Insert_ID());
                if (!$tid) {
                    $DB->Execute('INSERT INTO `' . _DB_PREFIX_ . $this->name . '_transactions_today` SET date = \'' . $today->format('Y-m-d') . '\'');
                    $tid = intval($DB->Insert_ID());
                }
            }
        } catch (Exception $e) {
            $error = $e->getMessage() . "\n" . $e->getTraceAsString();
        }
        if (!$tid || $error) {
            $this->_debug_error(
                    $this->l('Unable to generate Transaction ID'), 'error', array('{error}' => sprintf(
                        $this->l('Transaction ID generation resulted with a failure, check the existance of the DB table %s. A misconfiguration of DB user privileges is often the cause of the failure to create this table while installing. Uninstall module, check DB user privileges (CREATE TABLE statement on the DB is needed) and the reinstall.%s%s'), _DB_PREFIX_ . $this->name . '_transactions_today', "\n\n", $error
                ))
            );
        }
        return $tid;
    }

    protected function _call($exename, $params)
    {
        $cmd = ($this->_get('BOOL_BINARIES_IN_PATH') ? '' : $this->_getPath('BIN')) . $exename;
        if (empty($params['pathfile'])) {
            $params['pathfile'] = $this->_getPath('PARAM') . 'pathfile';
        }
        foreach ($params as $k => $v) {
            $cmd .= ' "' . $k . '=' . $v . '"';
        }
        $cmd .= ' 2>&1';
        $longoutput = null;
        $status = null;
        $output = trim(exec($cmd, $longoutput, $status));
        if ($this->_get('BOOL_DEBUG_MODE') && $this->_ipmask_proxyaware_check()) {
            if ($status == 0) {
                list ($atos_return_code, $atos_error, $atos_result) = explode('!', substr($output, 1, -1));
                $this->_debug_output(compact('cmd', 'status', 'atos_return_code', 'atos_message', 'atos_result'), true);
            } else {
                $system_result = implode("\n", $longoutput);
                $this->_debug_output(compact('cmd', 'status', 'system_result'), true);
            }
        }
        if ($status == 0) {
            $output = explode('!', trim($output, '!'));
            if ($output[0] == '0') {
                return array_slice($output, 2);
            } else {
                $this->_debug_error($this->l('ATOS Error returned when calling') . ' ' . $exename, 'binary-returned-error', array('{error}' => $output[1], '{exename}' => $exename));
            }
        } else {
            $this->_debug_error($this->l('SYSTEM Error returned when calling') . ' ' . $exename, 'binary-returned-error', array('{error}' => '(' . $status . '): ' . implode("\n", $longoutput), '{exename}' => $exename));
        }
        return FALSE;
    }

    protected function _debug_error($title, $tplname, $vars)
    {
        if ($this->_get('ERRORS_MAILTO')) {
            $mailto_addrs = explode(';', $this->_get('ERRORS_MAILTO'));
        } else {
            $mailto_addrs = array('PS_SHOP_EMAIL');
        }
        if (isset($vars['{error}']) && !isset($vars['{error_html}'])) {
            $vars['{error_html}'] = nl2br($vars['{error}']);
        }
        foreach ($mailto_addrs as $mailto) {
            $mailto = str_replace('PS_SHOP_EMAIL', Configuration::get('PS_SHOP_EMAIL'), trim($mailto));
            if (!empty($mailto)) {
                Mail::Send(Language::getIdByIso('fr'), $tplname, '[' . $this->name . '] ' . $title, $vars, $mailto, $this->l('Administrator') . ' - ' . Configuration::get('PS_SHOP_NAME'), NULL, NULL, NULL, NULL, rtrim(dirname(__FILE__), '/\\') . '/mails/');
            }
        }
        if ($this->_ipmask_proxyaware_check() && ($text = file_get_contents(sprintf('%s/mails/fr/%s.txt', rtrim(dirname(__FILE__), '/\\'), $tplname)))) {
            foreach ($vars as $key => $val) {
                $text = str_replace($key, $val, $text);
            }
            $msg = sprintf('<h2>Tgg_Atos: %s</h2><pre>%s</pre></div>', $title, $text
            );
            $this->_debug_output($msg, false);
        }
    }

    protected function _invalid_response($error, $Response)
    {
        $response_txt = '';
        $Response = (array) $Response;
        foreach ($Response as $k => $v) {
            $response_txt .= $k . ': ' . $v . "\n";
        }
        $response_html = nl2br($response_txt);
        $this->_debug_error($this->l('Invalid response'), 'invalid-response', array(
            '{error}' => $error,
            '{response_txt}' => $response_txt,
            '{response_html}' => $response_html
        ));
        return FALSE;
    }

    protected function _makeOrderMessage($Response)
    {
        if (!$this->_get('BOOL_ORDER_MESSAGE')) {
            return '';
        }
        $retval = $Response->payment_means . "\n"
                . str_replace('.', ' #### #### ##', $Response->card_number) . "\n";
        foreach ($this->_responseFieldsLoggedInOrder as $k) {
            if (isset($Response->$k)) {
                $retval .= sprintf('%s: %s%s', $k, $Response->$k, "\n");
            }
        }
        return $retval;
    }

    protected function _logResponse($Response)
    {
        try {
            $response = (array) $Response;
            if ($this->_get('BOOL_RESPONSE_LOG_TXT')) {
                if ($F = fopen($this->_getPath('LOG') . 'response-' . date('Y-m-d') . '.txt', 'a')) {
                    fwrite($F, '-----------------------------------' . "\n");
                    foreach ($response as $k => $v) {
                        fwrite($F, $k . ': ' . $v . "\n");
                    }
                }
                fclose($F);
            }
            $F = NULL;
            if ($this->_get('BOOL_RESPONSE_LOG_CSV')) {
                $fname = $this->_getPath('LOG') . 'response-' . date('Y-m-d') . '.csv';
                if ($F = fopen($fname, 'a')) {
                    fputcsv($F, array_keys($response), ';', '"');
                    fputcsv($F, $response, ';', '"');
                }
                fclose($F);
            }
        } catch (Exception $e) {
            return FALSE;
        }
    }

    /**
     * Log install errors
     * @param array $messages
     * @return boolean success
     */
    protected function _logInstall(&$messages)
    {
        try {
            if (!count($messages)) {
                return;
            }
            try {
                $this->disable();
            } catch (Exception $e) {
                
            }
            $this->_debug_error(
                    $this->l('Installation malfunction'), 'error', array(
                '{error}' => sprintf(
                        $this->l('While installing, the following errors were rapported :%sModule Tgg_Atos may not be fully functionnal, uninstall, take care of reported problems and then install again'), "\n\n" . implode("\n", $messages) . "\n\n"
                )
                    )
            );
            if ($F = fopen($this->_getInstallLogFile(), 'a')) {
                foreach ($messages as $line) {
                    fwrite($F, sprintf('%s: %s%s', date('Y-m-d H:i:s'), $line, PHP_EOL));
                }
                fclose($F);
            }
        } catch (Exception $e) {
            return FALSE;
        }
        return true;
    }

    /**
     * PS < 1.3 compatibility wrapper for Tools::ps_round (calls PHP core round function if unavailable in running PS API) 
     * @param float $number Number to be rounded
     * @param int $decimals Number of decimals to keep
     * @return int Rounded number
     */
    protected function _round($number, $decimals)
    {
        if (is_callable(array('Tools', 'ps_round'))) {
            return Tools::ps_round($number, $decimals);
        } else {
            return round($number, $decimals);
        }
    }

    /**
     * Check if the payment method will need to switch from cart currency
     * @param Cart $cart
     * @return FALSE|array	FALSE or the overloaded currency db row to be used
     */
    protected function _willSwitchCurrency($cart)
    {
        $payment_currency = $this->_getCurrencyToUse($cart);
        if ($cart->id_currency == $payment_currency['id_currency']) {
            return FALSE;
        }
        return $payment_currency;
    }

    /**
     * PS < 1.4 compatibility wrapper for language file rewriting when making a customizable module theme 
     * @param string $line
     * @return string
     */
    protected function _updateLngKey($line)
    {
        $new_key = '<{' . $this->name . '}' . _THEME_NAME_ . '>';
        //If PS version 1.4 or upper, strtolower the key
        if (self::PsVersionCompare('1.4', '>=')) {
            $new_key = Tools::strtolower($new_key);
        }
        return str_replace('<{' . $this->name . '}prestashop>', $new_key, $line);
    }

    protected function _requestParamsXmlOverride(&$params, $payment_n)
    {
        $xmlfile = $this->_getPath('PARAM') . 'params.xml';
        if (!file_exists($xmlfile)) {
            return;
        }
        try {
            if ($XML = @new SimpleXMLElement($xmlfile, LIBXML_NOCDATA, true)) {
                $this->_processOverrideTree($XML, $params, $payment_n);
                $mid_key = sprintf('merchant_id_%s', $params['merchant_id']);
                if (isset($XML->{$mid_key})) {
                    $this->_processOverrideTree($XML->{$mid_key}, $params, $payment_n);
                }
            } else {
                $this->_debug_error($this->l('Error reading XML params'), 'error', array('{error}' => 'Unable to open or parse file ' . $xmlfile));
            }
        } catch (Exception $e) {
            $this->_debug_error($this->l('Error reading XML params'), 'error', array('{error}' => (string) $e));
        }
    }

    protected function _processOverrideTree($tree, &$params, $payment_n)
    {
        if (isset($tree->default)) {
            $this->_processOverrideNode($tree->default, $params);
        }
        if ($payment_n) {
            if (isset($tree->payment_n)) {
                if (isset($tree->payment_n->default)) {
                    $this->_processOverrideNode($tree->payment_n->default, $params);
                }
                $n_key = sprintf('payment_n%u', $payment_n);
                if (isset($tree->payment_n->{$n_key})) {
                    $this->_processOverrideNode($tree->payment_n->{$n_key}, $params);
                }
            }
        } else {
            if (isset($tree->single)) {
                $this->_processOverrideNode($tree->single, $params);
            }
        }
    }

    protected function _processOverrideNode($node, &$params)
    {
        foreach ($node->children() as $param) {
            $params[$param->getName()] = (string) $param;
        }
    }

    protected function _ipmask_proxyaware_check()
    {
        $showtoip = explode(';', $this->_get('ERRORS_SHOWTOIP'));
        $passed = false;
        foreach ($showtoip as $mask) {
            if (empty($mask)) {
                continue;
            }
            $mask = explode(':', $mask);
            switch (count($mask)) {
                case 1:
                    $passed = $this->_ipmask_compare($_SERVER['REMOTE_ADDR'], $mask[0]);
                    break;
                case 2:
                    if (empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                        continue;
                    }
                    $passed = $this->_ipmask_compare($_SERVER['REMOTE_ADDR'], $mask[0]) && $this->_ipmask_compare($_SERVER['HTTP_X_FORWARDED_FOR'], $mask[1]);
                default:
            }
            if ($passed) {
                break;
            }
        }
        return $passed;
    }

    protected function _ipmask_compare($ip, $mask)
    {
        return ($mask == '*') || ($ip == $mask);
    }

    protected function _debug_output($obj, $var_dump)
    {
        $ob = ob_get_clean();
        echo '<pre style="padding: 2em; border: 2px solid red; width: 95%; margin: 1em auto; overflow: scroll; text-align: left;"><span style="font-weight: bold; font-size: normal;">TGG_ATOS DEBUG OUTPUT</span>' . PHP_EOL;
        if ($var_dump) {
            var_dump($obj);
        } else {
            echo $obj;
        }
        echo '</pre>';
        ob_start();
        echo $ob;
    }

    public function fetchClientReturnData()
    {
        return isset($_POST['DATA']) ? $_POST['DATA'] : ( isset($_GET['DATA']) ? $_GET['DATA'] : null );
    }

    public function revertAtosCurrency($atos_code)
    {
        foreach ($this->_getCurrencies() as $currency) {
            if ($_currency['atos_code'] == $atos_code) {
                return $currency;
            }
        }
        return null;
    }

}
