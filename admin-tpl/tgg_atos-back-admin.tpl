{literal}
<style type="text/css">
	#content label {
		width: 300px;
		clear: left;
		padding-top: 0.6em;
	}
	#content label.highlighted {color: #F00;}
	#content div.margin-form {
		padding-left: 320px;
		padding-top: 0.6em;
	}
	#content input[type='text'][disabled] {
		background-color: #CCC;
		border-color: #999;
	}
	#tab-pane-tgg_atos {width: 100%;}
</style>

<script type="text/javascript">
<!--
	var pos_select = {/literal}{$pos_select}{literal};
	function loadTab(id) {}

	if (helpboxes)
	{
	    $(function()
	    {
	        if ($('select'))
	        {
	            $('select').focus(function() { $(this).parent().find('.hint:first').css('display', 'block'); });
	            $('select').blur(function() { $(this).parent().find('.hint:first').css('display', 'none'); });
	        }
	    });
	}
	{/literal}
//-->
</script>


<script src="../js/tabpane.js" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" href="../css/tabpane.css">
<h2>{l s='Atos by TrogloGeek' mod='tgg_atos'} ({$module_version})</h2>

{if $validation_string}
	<div class="conf confirm">
		<h3>{$validation_string}</h3>
	</div>
{/if}

{if count($errors)}
	<div class="alert error" style="width: auto;">
    	<h3>{l s='There are some errors' mod='tgg_atos'}</h3>
        <ol>
        {foreach from=$errors item='error'}
        	<li class="bullet">{$error}</li>
        {/foreach}
        </ol>
    </div>
{/if}
{if $warning}
	<div class="warn" style="width: auto;">
		<h3>{l s='Warning' mod='tgg_atos'}</h3>
		<p>{$warning}</p>
	</div>
{/if}

<a href="http://prestashop.blog.capillotracteur.fr/category/modules/tgg-atos-sips-prestashop-module-gratuit/" target="_blank">
	<img src="../img/admin/world.gif" width="16" height="16" />
	{l s='Module\'s website' mod='tgg_atos'}
</a>
-
<a href="{$module_dir}doc-atos-sips-prestashop.odt" target="_blank" title="{l s='Read module documentation in Open Office format' mod='tgg_atos'}">
	<img src="{$module_dir}odt.gif" width="16" height="16" alt="{l s='ODT format (Open Office)' mod='tgg_atos'}" />
	{l s='Documentation (french version only)' mod='tgg_atos'}
</a>
-
<a href="{$module_dir}doc-atos-sips-prestashop.pdf" target="_blank" title="{l s='Read module documentation in PDF (Adobe Reader) format' mod='tgg_atos'}">
	<img src="../img/admin/pdf.gif" width="16" height="16" alt="{l s='PDF format (Adobe)' mod='tgg_atos'}" />
	{l s='Documentation (french version only)' mod='tgg_atos'}
</a>

<br /><br />

<form action="{$smarty.server.REQUEST_URI}" enctype="multipart/form-data" method="post">
	<input type="hidden" name="tabs" id="tabs" value="0">
	<div class="tab-pane" id="tab-pane-tgg_atos">
		<div class="tab-page">
			<h4 class="tab">{l s='Basic' mod='tgg_atos'}{if count($highlights.BASIC)} ({$highlights.BASIC|@count}){/if}</h2>
			{include file=$tpl_path|cat:'tgg_atos-back-admin-basic.tpl'}
			<div style="clear: both; text-align: center;">
				<input type="submit" name="updateBasic" class="button" />
			</div>
		</div>
		<div class="tab-page">
			<h4 class="tab">{l s='Graphic' mod='tgg_atos'}{if count($highlights.GRAPHIC)} ({$highlights.GRAPHIC|@count}){/if}</h2>
			{include file=$tpl_path|cat:'tgg_atos-back-admin-graphic.tpl'}
			<div style="clear: both; text-align: center;">
				<input type="submit" name="updateGraphic" class="button" />
			</div>
		</div>
		<div class="tab-page">
			<h4 class="tab">{l s='Advanced' mod='tgg_atos'}{if count($highlights.ADVANCED)} ({$highlights.ADVANCED|@count}){/if}</h2>
			{include file=$tpl_path|cat:'tgg_atos-back-admin-advanced.tpl'}
			<div style="clear: both; text-align: center;">
				<input type="submit" name="updateAdvanced" class="button" />
			</div>
		</div>
		<div class="tab-page">
			<h4 class="tab">{l s='2/3 times payment' mod='tgg_atos'}{if count($highlights.23TIMES)} ({$highlights.23TIMES|@count}){/if}</h2>
			{include file=$tpl_path|cat:'tgg_atos-back-admin-23times.tpl'}
			<div style="clear: both; text-align: center;">
				<input type="submit" name="update23Times" class="button" />
			</div>
		</div>
	</div>
	<div style="clear: both; text-align: center; padding-top: 1.5em;">
		<input type="submit" name="restoreDefault" class="button" value="{l s='Restore default configuration' mod='tgg_atos'}" />
	</div>
</form>
