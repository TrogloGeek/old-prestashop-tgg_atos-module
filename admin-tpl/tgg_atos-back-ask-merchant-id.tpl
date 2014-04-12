<h2>{l s='Atos by TrogloGeek' mod='tgg_atos'}</h2>
<form action="{$smarty.server.REQUEST_URI}" enctype="multipart/form-data" method="post">
	<fieldset>
        <legend>{l s='Configuration' mod='tgg_atos'}</legend>
        {l s='Your certificate file needs to be renamed. Please fill in the mechant id (15 digits) in the field below.' mod='tgg_atos'}<br />
        <br />
        <div class="margin-form">
        	<label for="field_merchant_id">{l s='Merchant id:' mod='tgg_atos'}&nbsp;</label>
            <input type="text" name="merchant_id" id="field_merchant_id" />
		</div>
        <div class="margin-form">
            <input type="submit" name="renameCertif" class="button" />
        </div>
    </fieldset>
</form>