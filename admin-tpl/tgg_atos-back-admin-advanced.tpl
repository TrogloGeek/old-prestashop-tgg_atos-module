<!-- ERRORS DISPLAY -->
<label for="field_errors_mailto"{if in_array('errors_mailto', $highlights.ADVANCED)} class="highlighted"{/if}>{l s='E-Mail addresses to send error reports from front-office:' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
    <input type="text" name="errors_mailto" id="field_errors_mailto" value="{$errors_mailto|escape:'htmlall':'UTF-8'}" style="width: 550px;" />
    <span class="hint">{l s='Semi-colon separated list, use PS_SHOP_EMAIL to refer to Prestashop administrator e-mail.' mod='tgg_atos'}</span>
</div>
<label for="field_errors_showtoip"{if in_array('errors_showtoip', $highlights.ADVANCED)} class="highlighted"{/if}>{l s='IP allowed to see run-time errors in front-office (will break http redirections if any after error):' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
    <input type="text" name="errors_showtoip" id="field_errors_showtoip" value="{$errors_showtoip|escape:'htmlall':'UTF-8'}" style="width: 550px;" />
    <br />
    {l s='Your current browsing configuration syntax string is:' mod='tgg_atos'}
    <a href="#" onclick="var f = $('#field_errors_showtoip');
            f.val(f.val() ? f.val() + '; ' + $(this).text() : $(this).text());
            return false;" title="{l s='Click to add' mod='tgg_atos'}">{$browsing_through}</a>
    <br />
    <span class="hint">{l s='Semi-colon separated list, a special syntax is allowed when using proxies : a.a.a.a:b.b.b.b stands for b.b.b.b (HTTP_X_FORWARDED_FOR header) is allowed through proxy a.a.a.a, a.a.a.a:* stands for any IP using proxy a.a.a.a (HTTP_X_FORWARDED_FOR header being on or not) and a.a.a.a himself (actually, do exactly the same as a.a.a.a in a more explicit way), *:b.b.b.b stands for b.b.b.b using ANY proxy (which is the way Prestashop developpement IP works, which is DANGEROUS), *:* allows any IP trough any proxy (which is stupid and dangerous).' mod='tgg_atos'}</span>
    <br />
    <!-- ATOS DEBUG MODE -->
    <label class="t clearfix" style="width: 500px; line-height: 1.4em; text-align: left;"><input type="checkbox" name="bool_debug_mode" style="vertical-align: text-bottom;" value="1" {if $bool_debug_mode} checked="checked"{/if}/>&nbsp;&nbsp;{l s='Enable debug mode (shows information about ATOS API call parameters and shell command used on front page) for any IP above' mod='tgg_atos'}</label>
</div>
<!-- BIN PATH -->
<label for="field_bin_path"{if in_array('bin_path', $highlights.ADVANCED)} class="highlighted"{/if}>{l s='Binaries path (cgi-bin):' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
    <input type="text" name="bin_path" id="field_bin_path" value="{$bin_path|escape:'html':'UTF-8'}" style="width: 550px;" {if $bool_binaries_in_path}disabled="disabled" {/if}/>
    <br />
    <br />
    <label class="t clearfix" style="width: 500px; line-height: 1.4em; text-align: left;"><input type="checkbox" name="bool_binaries_in_path" style="vertical-align: text-bottom;" onclick="{literal}if ($(this).attr('checked')) {
                $('#field_bin_path').attr('disabled', 'disabled');
            } else {
                $('#field_bin_path').removeAttr('disabled');
            }{/literal}" value="1" {if $bool_binaries_in_path} checked="checked"{/if}/>&nbsp;&nbsp;{l s='My webserver holds them in his binaries path' mod='tgg_atos'}</label>
</div>
<!-- PARAMS PATH -->
<label for="field_param_path"{if in_array('param_path', $highlights.ADVANCED)} class="highlighted"{/if}>{l s='Parameter files path:' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
    <input type="text" name="param_path" id="field_param_path" value="{$param_path|escape:'html':'UTF-8'}" style="width: 550px;" />
    <span class="hint">{l s='54 characters maximum' mod='tgg_atos'}</span>
</div>
<!-- RETURN PROTOCOL -->
<label for="field_return_protocol"{if in_array('return_protocol', $highlights.ADVANCED)} class="highlighted"{/if}>{l s='Protocol to be used for user bank returns:' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
    <select name="return_protocol" id="field_return_protocol">
        <option value="auto"{if $return_protocol == 'auto'} selected="selected"{/if}>auto</option>
        <option value="http://"{if $return_protocol == 'http://'} selected="selected"{/if}>http://</option>
        <option value="https://"{if $return_protocol == 'https://'} selected="selected"{/if}>https://</option>
    </select>
</div>
<!-- RETURN DOMAIN -->
<label for="field_return_domain"{if in_array('return_domain', $highlights.ADVANCED)} class="highlighted"{/if}>{l s='Domain to be used for user bank returns:' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
    <input type="text" name="return_domain" id="field_return_domain" value="{$return_domain|escape:'htmlall':'UTF-8'}" style="width: 200px;" />
    <span class="hint">{l s='Leave blank to use the same domain as the one used by the visitor.' mod='tgg_atos'}</span>
</div>
<!-- RETURN PROTOCOL -->
<label for="field_return_protocol_auto"{if in_array('return_protocol_auto', $highlights.ADVANCED)} class="highlighted"{/if}>{l s='Protocol to be used for automatic bank returns:' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
    <select name="return_protocol_auto" id="field_return_protocol_auto">
        <option value="auto"{if $return_protocol_auto == 'auto'} selected="selected"{/if}>auto</option>
        <option value="http://"{if $return_protocol_auto == 'http://'} selected="selected"{/if}>http://</option>
        <option value="https://"{if $return_protocol_auto == 'https://'} selected="selected"{/if}>https://</option>
    </select>
</div>
<!-- RETURN DOMAIN -->
<label for="field_return_domain_auto"{if in_array('return_domain_auto', $highlights.ADVANCED)} class="highlighted"{/if}>{l s='Domain to be used for user automatic returns:' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
    <input type="text" name="return_domain_auto" id="field_return_domain_auto" value="{$return_domain_auto|escape:'htmlall':'UTF-8'}" style="width: 200px;" />
    <span class="hint">{l s='Leave blank to use the same domain as the one used by the visitor.' mod='tgg_atos'}</span>
</div>
<!-- TRANSACTION ID TIMEZONE -->
<label for="field_tid_tz"{if in_array('tid_tz', $highlights.ADVANCED)} class="highlighted"{/if}>{l s='transaction IDs timezone:' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
    <select name="tid_tz" id="field_tid_tz">
        <option></option>
    {foreach DateTimeZone::listIdentifiers() as $tz}
        <option {if $tid_tz == $tz}selected="selected"{/if}>{$tz|escape:'html':'UTF-8'}</option>
    {/foreach}
    </select>
    <span class="hint">{l s='Ask your SIPS support to know which timezone you have to use.' mod='tgg_atos'}</span>
</div>
<!-- MINIMUM TRANSACTION ID -->
<label for="field_int_min_tid"{if in_array('int_min_tid', $highlights.ADVANCED)} class="highlighted"{/if}>{l s='Start transaction IDs at:' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
    <input type="text" name="int_min_tid" id="field_int_min_tid" value="{$int_min_tid|escape:'html':'UTF-8'}" style="width: 60px;" />
    <span class="hint">{l s='Maximum ID autorized by Atos is 999999, keep in mind that higher is the minimum ID you choose, lesser you will be able to offer payments by Atos a day. Must be at least 1.' mod='tgg_atos'}</span>
</div>
<!-- PAYMENT MEANS -->
<label for="field_payment_means">{l s='Payment means accepted:' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
    <input type="text" name="payment_means" id="field_payment_means" value="{$payment_means|escape:'htmlall':'UTF-8'}" style="width: 200px;" />
    <span class="hint">{l s='See documentation given by your bank' mod='tgg_atos'}</span>
</div>
<!-- ADVANCED CONTROLS -->
<label for="field_advanced_controls"{if in_array('advanced_controls', $highlights.ADVANCED)} class="highlighted"{/if}>{l s='Advanced controls:' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
        <input type="text" name="advanced_controls" id="field_advanced_controls" value="{$advanced_controls|escape:'html':'UTF-8'}"  style="width: 500px;" {if !$bool_advanced_controls}disabled="disabled" {/if}{if $bool_advanced_controls}required="required" {/if}/>
        <br />
        <br />
        <label class="t clearfix" style="width: 500px; line-height: 1.4em; text-align: left;"><input type="checkbox" name="bool_advanced_controls" style="vertical-align: text-bottom;" onclick="{literal}if (!$(this).attr('checked')) {$('#field_advanced_controls').attr('disabled', 'disabled');} else {$('#field_advanced_controls').removeAttr('disabled');}{/literal}" value="1" {if $bool_advanced_controls} checked="checked"{/if}/>&nbsp;&nbsp;{l s='Enable advanced controls for the ATOS API calls' mod='tgg_atos'}</label>
        <span class="hint">{l s='See user guide for advanced controls against fraud provided by your bank' mod='tgg_atos'}</span>
</div>
