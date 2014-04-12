{capture name=path}{l s='Card payment' mod='tgg_atos'}{/capture}
{include file=$tpl_dir|cat:'breadcrumb.tpl'}

<h2>{l s='Payment' mod='tgg_atos'}</h2>

{assign var='current_step' value='payment'}
{include file=$tpl_dir|cat:'order-steps.tpl'}


<h3>
	{l s='Card payment failure' mod='tgg_atos'}
</h3>
<p>
	<img src="{$module_template_dir}images/atos.gif" alt="{l s='Card payment' mod='tgg_atos'}" style="float:left; margin: 0px 10px 5px 0px;" />
	{l s='The payment is a failure. It means that either your transaction has been refused by your bank or you decided to cancel the payment process.' mod='tgg_atos'}<br />
	{l s='Click the other payment methods button to restart payment process.' mod='tgg_atos'}
</p>
<p class="cart_navigation">
	<a href="{$base_dir_ssl}order.php?step=3" class="button_large">{l s='Other payment methods' mod='tgg_atos'}</a>
</p>
<br /><br />
<div class="table_block">
	<table class="std">
		<thead>
			<tr>
				<th class="first_item">{l s='Payment summary:' mod='tgg_atos'}</th>
				<th class="last_item">&nbsp;</th>
			</tr>
		</thead>
		<caption></caption>
		<tbody>
			<tr class="item">
				<td>{l s='Merchant ID' mod='tgg_atos'}</td>
				<td>{$cookie->tgg_atos_response_merchant_id}</td>
			</tr>
			<tr class="alternate_item">
				<td>{l s='Transaction reference' mod='tgg_atos'}</td>
				<td>{$cookie->tgg_atos_response_transaction_id}</td>
			</tr>
			<tr class="item">
				<td>{l s='Payment means' mod='tgg_atos'}</td>
				<td>{$cookie->tgg_atos_response_payment_means}</td>
			</tr>
			<tr class="alternate_item">
				<td>{l s='Authorisation ID' mod='tgg_atos'}</td>
				<td>{$cookie->tgg_atos_response_authorisation_id}</td>
			</tr>
			<tr class="item">
				<td>{l s='Payment certificate' mod='tgg_atos'}</td>
				<td>{$cookie->tgg_atos_response_payment_certificate}</td>
			</tr>
			<tr class="alternate_item">
				<td>{l s='Payment date' mod='tgg_atos'}</td>
				<td>{$cookie->tgg_atos_response_payment_date}</td>
			</tr>
			<tr class="item">
				<td>{l s='Amount' mod='tgg_atos'}</td>
				<td>{$cookie->tgg_atos_response_amount}</td>
			</tr>
		</tbody>
	</table>
</div>
<p class="cart_navigation">
	<a href="{$base_dir_ssl}order.php?step=3" class="button_large">{l s='Other payment methods' mod='tgg_atos'}</a>
</p>
