<!-- BANK -->
<label for="field_bank"{if in_array('bank', $highlights.BASIC)} class="highlighted"{/if}>{l s='Bank server to use:' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
    <select name="bank" id="field_bank">
        {foreach from=$banks item='banktitle' key='bankname'}
            <option value="{$bankname}"{if $bank == $bankname} selected="selected"{/if}>{$banktitle|escape:'html':'UTF-8'}</option>
        {/foreach}
    </select>
</div>
<!-- MODE -->
<label for="field_demo">{l s='Mode:' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
    <select name="demo" id="field_demo" onchange="if ($(this).val() == '1') {ldelim}
        $('#production_conf:visible').hide('fast'){rdelim} else {ldelim}
        $('#production_conf:hidden').show('fast'){rdelim}">
        <option value="1"{if $demo} selected="selected"{/if}>{l s='Demo/Test' mod='tgg_atos'}</option>
        <option value="0"{if !$demo} selected="selected"{/if}>{l s='Production or pre-production' mod='tgg_atos'}</option>
    </select>
</div>
<!-- PRODUCTION PANEL -->
<div id="production_conf"{if $demo} style="display: none"{/if}>
    <!-- MERCHANT ID -->
    <label for="field_merchant_id"{if in_array('merchant_id', $highlights.BASIC)} class="highlighted"{/if}>{l s='Merchant id to use:' mod='tgg_atos'}&nbsp;</label>
    <div class="margin-form">
        {if count($merchant_ids)}
            <select name="merchant_id" id="field_merchant_id">
                {foreach from=$merchant_ids item='mid'}
                    <option value="{$mid|escape:'htmlall':'UTF-8'}"{if $mid == $merchant_id} selected="selected"{/if}>{$mid|escape:'htmlall':'UTF-8'}</option>
                {/foreach}
            </select>
        {else}
            <span style="position: relative; top: 0.2em">{l s='No production certificate found' mod='tgg_atos'}</span>
        {/if}
    </div>
    <!-- CERTIFICATE UPLOAD -->
    <label for="field_new_certificate">{l s='Upload a certificate:' mod='tgg_atos'}&nbsp;</label>
    <div class="margin-form">
        <input type="file" name="new_certificate" id="field_new_certificate" />
    </div>
</div>
<!-- FALLBACK CURRENCY -->
<label for="field_fallback_currency"{if in_array('fallback_currency', $highlights.BASIC)} class="highlighted"{/if}>{l s='Fallback currency:' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
    <select name="fallback_currency" id="field_fallback_currency">
        <option value=""></option>
        {foreach from=$currencies item='currency'}
            <option value="{$currency.iso_code|escape:'htmlall':'UTF-8'}"{if $fallback_currency == $currency.iso_code} selected="selected"{/if}>{$currency.name|escape:'htmlall':'UTF-8'}&nbsp;{$currency.sign|escape:'htmlall':'UTF-8'}</option>
        {/foreach}
    </select>
</div>
<!-- MIN AMOUNT -->
<label for="field_int_minamount"{if in_array('int_minamount', $highlights.BASIC)} class="highlighted"{/if}>{l s='Minimum cart amount to use this payment method:' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
    <input type="text" name="int_minamount" id="field_int_minamount" value="{$int_minamount|escape:'html':'UTF-8'}" style="width: 60px;" />
    <span class="hint">{l s='Integer value accorded to the fallback currency.' mod='tgg_atos'}</span>
</div>
<!-- PAYMENT FEES -->
<label for="field_float_payment_fees"{if in_array('float_payment_fees', $highlights.BASIC)} class="highlighted"{/if}>{l s='Apply payment fees:' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
    <input type="text" name="float_payment_fees" id="field_float_payment_fees" value="{$float_payment_fees|escape:'html':'UTF-8'}" style="width: 60px;" /> {$default_currency.sign|escape:'html':'UTF-8'}
    +
    <input type="text" name="float_payment_fees_p" id="field_float_payment_fees_p" value="{$float_payment_fees_p|escape:'html':'UTF-8'}" style="width: 60px;" /> % {l s='of order total' mod='tgg_atos'}
    <span class="hint">{l s='Fees value accorded to the fallback currency.' mod='tgg_atos'}</span>
</div>
<!-- ORDER STATE -->
<label for="field_os_payment_success"{if in_array('os_payment_success', $highlights.BASIC)} class="highlighted"{/if}>{l s='Order state on payment success:' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
    <select name="os_payment_success" id="field_os_payment_success">
        <option value=""></option>
        {foreach from=$order_states item='order_state'}
            <option value="{$order_state.id_order_state|escape:'htmlall':'UTF-8'}"{if $os_payment_success == $order_state.id_order_state} selected="selected"{/if}>{$order_state.name|escape:'htmlall':'UTF-8'}</option>
        {/foreach}
    </select>
</div>
<label for="field_os_payment_cancelled"{if in_array('os_payment_cancelled', $highlights.BASIC)} class="highlighted"{/if}>{l s='Order state on payment cancellation:' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
    <select name="os_payment_cancelled" id="field_os_payment_cancelled">
        <option value="0"{if !$os_payment_cancelled} selected="selected"{/if}>{l s='No order creation on payment cancellation' mod='tgg_atos'}</option>
        {foreach from=$order_states item='order_state'}
            <option value="{$order_state.id_order_state|escape:'htmlall':'UTF-8'}"{if $os_payment_cancelled == $order_state.id_order_state} selected="selected"{/if}>{$order_state.name|escape:'htmlall':'UTF-8'}</option>
        {/foreach}
    </select>
</div>
<label for="field_os_payment_failed"{if in_array('os_payment_failed', $highlights.BASIC)} class="highlighted"{/if}>{l s='Order state on payment failure:' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
    <select name="os_payment_failed" id="field_os_payment_failed">
        <option value="0"{if !$os_payment_failed} selected="selected"{/if}>{l s='No order creation on payment failure' mod='tgg_atos'}</option>
        {foreach from=$order_states item='order_state'}
            <option value="{$order_state.id_order_state|escape:'htmlall':'UTF-8'}"{if $os_payment_failed == $order_state.id_order_state} selected="selected"{/if}>{$order_state.name|escape:'htmlall':'UTF-8'}</option>
        {/foreach}
    </select>
</div>
<label for="field_capture_mode"{if in_array('capture_mode', $highlights.BASIC)} class="highlighted"{/if}>{l s='Capture mode:' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
    <select name="capture_mode" id="field_capture_mode">
        {foreach from=$capture_modes item='option_capture'}
            <option value="{$option_capture}"{if $capture_mode == $option_capture} selected="selected"{/if}>{$option_capture}</option>
        {/foreach}
    </select>
    <span class="hint">{l s='has influence over interpretation of the option Capture day, cf ATOS documentation section deferred capture' mod='tgg_atos'}</span>
</div>
<label for="field_int_capture_day"{if in_array('int_capture_day', $highlights.BASIC)} class="highlighted"{/if}>{l s='Capture day:' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
    <select name="int_capture_day" id="field_int_capture_day">
        {section name='capture_days' loop=100}
            <option value="{$smarty.section.capture_days.index}"{if $int_capture_day == $smarty.section.capture_days.index} selected="selected"{/if}>{$smarty.section.capture_days.index}</option>
        {/section}
    </select>
    <span class="hint">{l s='Interpretation of this option depends upon Capture mode, cf ATOS documentation section deferred capture' mod='tgg_atos'}</span>
</div>
<!-- LOGS -->
<label>{l s='Log responses' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form clearfix">
    <br />
    <label class="t"><input type="checkbox" name="bool_response_log_txt" value="1"{if $bool_response_log_txt} checked="checked"{/if} />&nbsp;{l s='TXT format' mod='tgg_atos'}</label>
    <br />
    <br />
    <label class="t"><input type="checkbox" name="bool_response_log_csv" value="1"{if $bool_response_log_csv} checked="checked"{/if} />&nbsp;{l s='CSV format' mod='tgg_atos'}&nbsp;(PHP 5 >= 5.1.0)</label>
</div>
<!-- LOGS_PATH -->
<label for="field_log_path"{if in_array('log_path', $highlights.BASIC)} class="highlighted"{/if}>{l s='Logfiles path:' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
    <input type="text" name="log_path" id="field_log_path" value="{$log_path|escape:'html':'UTF-8'}" style="width: 550px;" />
</div>
<!-- LANG -->
<label for="field_iso_lang"{if in_array('iso_lang', $highlights.BASIC)} class="highlighted"{/if}>{l s='ISO code of the language to be utilized on bank server:' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
    <input type="text" name="iso_lang" id="field_iso_lang" value="{$iso_lang|escape:'htmlall':'UTF-8'}" size="2" />
    <span class="hint">{l s='Leave blank to use the same language as the one used by the visitor. Your bank server must accept each language that is activated. Consult your bank to know what language code are available on server.' mod='tgg_atos'}</span>
</div>
<!-- FORCE RETURN -->
<label {if in_array('bool_force_return', $highlights.BASIC)} class="highlighted"{/if}><strong>{l s='Force client return:' mod='tgg_atos'}</strong>&nbsp;</label>
<div class="margin-form">
    <label class="t"><input type="checkbox" name="bool_force_return" id="field_bool_force_return" value="1"{if $bool_force_return} checked="checked"{/if} />&nbsp;{l s='Force client return (skip transaction result page on bank server)' mod='tgg_atos'}</label><br />
    <p><em>{l s='This allows a better order tracking (with Google Analytics for exemple). This method requires long GET var values to not be filtered by your server.' mod='tgg_atos'}</em></p>
</div>
<!-- ORDER LOG MESSAGE -->
<label {if in_array('bool_order_message', $highlights.BASIC)} class="highlighted"{/if}><strong>{l s='Add log message to orders:' mod='tgg_atos'}</strong>&nbsp;</label>
<div class="margin-form">
    <label class="t"><input type="checkbox" name="bool_order_message" id="field_bool_order_message" value="1"{if $bool_order_message} checked="checked"{/if} />&nbsp;{l s='logs fields configured in $_responseFieldsLoggedInOrder' mod='tgg_atos'}</label><br />
    <p><em>{l s='This should not be disabled.' mod='tgg_atos'}</em></p>
</div>
<!-- VERSION CHECK -->
<label {if in_array('bool_check_version', $highlights.BASIC)} class="highlighted"{/if}><strong>{l s='Check module version:' mod='tgg_atos'}</strong>&nbsp;</label>
<div class="margin-form">
    <label class="t"><input type="checkbox" name="bool_check_version" id="field_bool_check_version" value="1"{if $bool_check_version} checked="checked"{/if} />&nbsp;{l s='displays an alert on module backend page when a newer version is released' mod='tgg_atos'}</label><br />
    <p><em>{l s='Disable if it slows too much module backend page or if installed on a server with no (or restricted) access to the Internet. Uses fopen URL wrapper.' mod='tgg_atos'}</em></p>
</div>
