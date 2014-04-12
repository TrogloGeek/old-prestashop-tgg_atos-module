{capture name=path}{l s='Card payment' mod='tgg_atos'}{/capture}
{include file=$tpl_dir|cat:'breadcrumb.tpl'}

<h2>{l s='Payment' mod='tgg_atos'}</h2>

{assign var='current_step' value='payment'}
{include file=$tpl_dir|cat:'order-steps.tpl'}


<h3>
	{l s='Card payment' mod='tgg_atos'}
	{if $splitted}
		{capture assign='split_msg'}{l s='in %u times' mod='tgg_atos'}{/capture}
		{$split_msg|sprintf:$splitted}
	{/if}
</h3>
<p>
	<img src="{$module_template_dir}images/atos.gif" alt="{l s='Card payment' mod='tgg_atos'}" style="float:left; margin: 0px 10px 5px 0px;" />
	{l s='You have chosen to pay by card' mod='tgg_atos'}{if $splitted} {$split_msg|sprintf:$splitted}{/if}.<br />
    {l s='You will be redirected to a secure bank server where your card informations will be asked.' mod='tgg_atos'}<br />
	{l s='At any moment you can hit the cancel button in order to come back to our payment methods choice from bank server' mod='tgg_atos'}<br />
	{l s='The total amount of your order is' mod='tgg_atos'}
	<span id="amount" class="price">{displayPrice price=$amount currency=$payment_currency.id_currency}</span>
	{if $payment_fees}
		<br />
		<span class="payment_fees">{l s='Including payment fees:' mod='tgg_atos'} {$payment_fees}</span>
	{/if}
</p>

{if $atos_form}
    <p style="margin-top:20px;">
        <strong>{l s='Click on one of the payment meanings logos below to proceed on a secure bank server.' mod='tgg_atos'}</strong>
    </p>
    
    {$atos_form}
{else}
    <div class="error">
        <strong>{l s='Sorry, no more CB payments can be processed today, bank server should be available again at midnight.' mod='tgg_atos'}</strong>
    </div>
{/if}

<p class="cart_navigation">
	<a href="{$base_dir_ssl}order.php?step=3" class="button_large">{l s='Other payment methods' mod='tgg_atos'}</a>
</p>
