{if stripos($smarty.server.SERVER_SOFTWARE, 'win') === FALSE}
<div style="clear: both; text-align: center; padding: 1.5em 0;">
	<input type="submit" name="makeTheme" class="button" value="{l s='Create theme dir (will overwrite if existing)' mod='tgg_atos'}" />
</div>
{/if}
<!-- LOGO NAME -->
<label for="field_logo_name"{if in_array('logo_name', $highlights.GRAPHIC)} class="highlighted"{/if}>{l s='Merchant logo name:' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
    <input type="text" name="logo_name" id="field_logo_name" value="{$logo_name|escape:'htmlall':'UTF-8'}" />
</div>
<!-- CARD LOGOS PATH -->
<label for="field_card_img_path"{if in_array('card_img_path', $highlights.GRAPHIC)} class="highlighted"{/if}>{l s='Cards logos path:' mod='tgg_atos'}&nbsp;</label>
<div class="margin-form">
	<input type="text" name="card_img_path" id="field_card_img_path" value="{$card_img_path|escape:'html':'UTF-8'}" style="width: 550px;" />
</div>
