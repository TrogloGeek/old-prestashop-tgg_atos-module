<!-- 2TPAYMENT -->
<label for="field_bool_2tpayment"{if in_array('bool_2tpayment', $highlights.23TIMES)} class="highlighted"{/if}>{l s='2 times payment:' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
	<label class="t">
	    <input type="checkbox" name="bool_2tpayment" id="field_bool_2tpayment" value="1"{if $bool_2tpayment} checked="checked"{/if} />
	    {l s='Allow' mod='tgg_atos'}
    </label>
    <br />
    <br />
    <!-- MIN AMOUNT -->
	<label class="t">
		{l s='Minimum cart amount to use this payment method:' mod='tgg_atos'}
		<input type="text" name="int_2tpayment_minamount" id="field_int_2tpayment_minamount" value="{$int_2tpayment_minamount|escape:'html':'UTF-8'}" style="width: 60px;" />
		<span class="hint">{l s='Integer value accorded to the fallback currency.' mod='tgg_atos'}</span>
	</label>    
    <br />
    <br />
    <label class="t">
    	{l s='Spacing between transactions (days, max 30):' mod='tgg_atos'}
    	<input type="text" name="int_2tpayment_spacing" id="field_int_2tpayment_spacing" value="{$int_2tpayment_spacing|intval}" size="2" />
    </label>
    <br />
    <br />
    <label class="t">
    	{l s='Days before first transactions:' mod='tgg_atos'}
    	<input type="text" name="int_2tpayment_delay" id="field_int_2tpayment_delay" value="{$int_2tpayment_delay|intval}" size="2" />
    </label>
    <br />
    <br />
    <!-- ORDER STATE -->
	<label class="t">{l s='Order state on payment success:' mod='tgg_atos'}
		<select name="int_2tpayment_os" id="field_int_2tpayment_os">
			<option value=""></option>
		{foreach from=$order_states item='order_state'}
			<option value="{$order_state.id_order_state|escape:'htmlall':'UTF-8'}"{if $int_2tpayment_os == $order_state.id_order_state} selected="selected"{/if}>{$order_state.name|escape:'htmlall':'UTF-8'}</option>
		{/foreach}
		</select>
	</label>
    <br />
    <br />
	<!-- FIRST PAYMENT -->
	<label class="t">
		{l s='First payment amount:' mod='tgg_atos'}
	</label>
	<div>
		<input type="text" name="float_2tpayment_fp_fxd" id="field_float_2tpayment_fp_fxd" value="{$float_2tpayment_fp_fxd|floatval|escape:'html':'UTF-8'}" style="width: 60px;" /> {$default_currency.sign|escape:'html':'UTF-8'}
		+
		<input type="text" name="float_2tpayment_fp_pct" id="field_float_2tpayment_fp_pct" value="{$float_2tpayment_fp_pct|floatval|escape:'html':'UTF-8'}" style="width: 60px;" /> % {l s='of order total' mod='tgg_atos'}
		<span class="hint">{l s='Fixed value accorded to the fallback currency.' mod='tgg_atos'}</span>
	</div>
    <br />
    <br />
	<!-- PAYMENT FEES -->
	<label class="t">
		{l s='Apply payment fees:' mod='tgg_atos'}
	</label>
	<div>
		<input type="text" name="float_2tpayment_fees" id="field_float_2tpayment_fees" value="{$float_2tpayment_fees|escape:'html':'UTF-8'}" style="width: 60px;" /> {$default_currency.sign|escape:'html':'UTF-8'}
		+
		<input type="text" name="float_2tpayment_fees_p" id="field_float_2tpayment_fees_p" value="{$float_2tpayment_fees_p|escape:'html':'UTF-8'}" style="width: 60px;" /> % {l s='of order total' mod='tgg_atos'}
		<span class="hint">{l s='Fees value accorded to the fallback currency.' mod='tgg_atos'}</span>
	</div>
    <br />
    <br />
</div>
<!-- 3TPAYMENT -->
<label for="field_bool_3tpayment"{if in_array('bool_3tpayment', $highlights.23TIMES)} class="highlighted"{/if}>{l s='3 times payment:' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
	<label class="t" for="field_bool_3tpayment">
	    <input type="checkbox" name="bool_3tpayment" id="field_bool_3tpayment" value="1"{if $bool_3tpayment} checked="checked"{/if} />
	    {l s='Allow' mod='tgg_atos'}
    </label>
    <br />
    <br />
    <!-- MIN AMOUNT -->
	<label class="t">
		{l s='Minimum cart amount to use this payment method:' mod='tgg_atos'}
		<input type="text" name="int_3tpayment_minamount" id="field_int_3tpayment_minamount" value="{$int_3tpayment_minamount|escape:'html':'UTF-8'}" style="width: 60px;" />
		<span class="hint">{l s='Integer value accorded to the fallback currency.' mod='tgg_atos'}</span>
	</label>    
    <br />
    <br />
    <label class="t">
    	{l s='Spacing between transactions (days, max 30):' mod='tgg_atos'}
    	<input type="text" name="int_3tpayment_spacing" id="field_int_3tpayment_spacing" value="{$int_3tpayment_spacing|intval}" size="2" />
    </label>
    <br />
    <br />
    <label class="t">
    	{l s='Days before first transactions:' mod='tgg_atos'}
    	<input type="text" name="int_3tpayment_delay" id="field_int_3tpayment_delay" value="{$int_3tpayment_delay|intval}" size="2" />
    </label>
    <br />
    <br />
    <!-- ORDER STATE -->
	<label class="t">{l s='Order state on payment success:' mod='tgg_atos'}
		<select name="int_3tpayment_os" id="field_int_3tpayment_os">
			<option value=""></option>
		{foreach from=$order_states item='order_state'}
			<option value="{$order_state.id_order_state|escape:'htmlall':'UTF-8'}"{if $int_3tpayment_os == $order_state.id_order_state} selected="selected"{/if}>{$order_state.name|escape:'htmlall':'UTF-8'}</option>
		{/foreach}
		</select>
	</label>
    <br />
    <br />
	<!-- FIRST PAYMENT -->
	<label class="t">
		{l s='First payment amount:' mod='tgg_atos'}
	</label>
	<div>
		<input type="text" name="float_3tpayment_fp_fxd" id="field_float_3tpayment_fp_fxd" value="{$float_3tpayment_fp_fxd|floatval|escape:'html':'UTF-8'}" style="width: 60px;" /> {$default_currency.sign|escape:'html':'UTF-8'}
		+
		<input type="text" name="float_3tpayment_fp_pct" id="field_float_3tpayment_fp_pct" value="{$float_3tpayment_fp_pct|floatval|escape:'html':'UTF-8'}" style="width: 60px;" /> % {l s='of order total' mod='tgg_atos'}
		<span class="hint">{l s='Fixed value accorded to the fallback currency.' mod='tgg_atos'}</span>
	</div>
    <br />
    <br />
	<!-- PAYMENT FEES -->
	<label class="t" for="float_3tpayment_fees">
		{l s='Apply payment fees:' mod='tgg_atos'}
	</label>
	<div>
		<input type="text" name="float_3tpayment_fees" id="field_float_3tpayment_fees" value="{$float_3tpayment_fees|escape:'html':'UTF-8'}" style="width: 60px;" /> {$default_currency.sign|escape:'html':'UTF-8'}
		+
		<input type="text" name="float_3tpayment_fees_p" id="field_float_3tpayment_fees_p" value="{$float_3tpayment_fees_p|escape:'html':'UTF-8'}" style="width: 60px;" /> % {l s='of order total' mod='tgg_atos'}
		<span class="hint">{l s='Fees value accorded to the fallback currency.' mod='tgg_atos'}</span>
	</div>
    <br />
    <br />
</div>
