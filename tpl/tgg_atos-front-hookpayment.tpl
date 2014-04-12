{if $willSwitchCurrency}
	{capture name="willSwitchCurrency"}{l s='This payment method will use a different currency to proceed with payment. %s will be used.' mod='tgg_atos'}{/capture}
{/if}
<p class="payment_module">
{if $canProcess === TRUE}
    <a href="{$controller}" title="{l s='Pay with a card' mod='tgg_atos'}">
{else}
    <a href="#" onclick="alert($(this).text());">
{/if}
    	<img src="{$module_template_dir}images/bank_logo/{$bank}.gif" alt="{l s='Pay with a card' mod='tgg_atos'}" />
    	{l s='Pay with a card' mod='tgg_atos'}
    {if $willSwitchCurrency}
    	<br />
    	<br />
    	{$smarty.capture.willSwitchCurrency|sprintf:$willSwitchCurrency.name}
    {/if}
    {if $canProcess !== TRUE}
    	<br />
    	<br />
    	{$canProcess}
    {/if}
    {if $fees}
    	<br />
    	<br />
    	{l s='This payment method is subject to payment fees. If used your order amount will be increased by:' mod='tgg_atos'}<br />
    	{$fees}<br />
    	<strong>
    		{l s='Total amount to be paid:' mod='tgg_atos'}
    		{$total}
    	</strong>
    {/if}
    </a>
</p>
{if $2t_allowed}
	<p class="payment_module">
	{if $canProcess2t === TRUE}
    	<a href="{$controller}?splitted=2" title="{l s='Pay with a card in 2 times' mod='tgg_atos'}">
    {else}
    	<a href="#" onclick="alert($(this).text());">
    {/if}
   		<img src="{$module_template_dir}images/bank_logo/{$bank}.gif" alt="{l s='Pay with a card in 2 times' mod='tgg_atos'}" />
   		{l s='Pay with a card in 2 times' mod='tgg_atos'}
    {if $willSwitchCurrency}
    	<br />
    	<br />
    	{$smarty.capture.willSwitchCurrency|sprintf:$willSwitchCurrency.name}
    {/if}
    {if $canProcess2t !== TRUE}
    	<br />
    	<br />
    	{$canProcess2t}
    {/if}
    {if $2t_fees}
    	<br />
    	<br />
    	{l s='This payment method is subject to payment fees. If used your order amount will be increased by:' mod='tgg_atos'}<br />
    	{$2t_fees}<br />
    	<strong>
    		{l s='Total amount to be paid:' mod='tgg_atos'}
    		{$2t_total}
    	</strong>
    {/if}
    	</a>
	</p>
{/if}
{if $3t_allowed}
	<p class="payment_module">
	{if $canProcess3t === TRUE}
    	<a href="{$controller}?splitted=3" title="{l s='Pay with a card in 3 times' mod='tgg_atos'}">
    {else}
    	<a href="#" onclick="alert($(this).text());">
    {/if}
    	<img src="{$module_template_dir}images/bank_logo/{$bank}.gif" alt="{l s='Pay with a card in 3 times' mod='tgg_atos'}" />
   		{l s='Pay with a card in 3 times' mod='tgg_atos'}
    {if $willSwitchCurrency}
    	<br />
    	<br />
    	{$smarty.capture.willSwitchCurrency|sprintf:$willSwitchCurrency.name}
    {/if}
    {if $canProcess3t !== TRUE}
    	<br />
    	<br />
    	{$canProcess3t}
    {/if}
    {if $3t_fees}
    	<br />
    	<br />
    	{l s='This payment method is subject to payment fees. If used your order amount will be increased by:' mod='tgg_atos'}<br />
    	{$3t_fees}<br />
    	<strong>
    		{l s='Total amount to be paid:' mod='tgg_atos'}
    		{$3t_total}
    	</strong>
    {/if}
    	</a>
	</p>
{/if}