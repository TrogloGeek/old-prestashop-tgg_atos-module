<p class="bold">
	{l s='Your payment has been validated and your order recorded.' mod='tgg_atos'}<br />
    <br />
	{l s='We will process your order as soon as possible.' mod='tgg_atos'}
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
