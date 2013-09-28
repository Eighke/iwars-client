<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			preinscription.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-06-15 - Eighke
 */
if (!session_id()) exit();
?>
<h1><?php echo ILang::_('Inscription'); ?></h1>
<?php $this->renderMsgs(); ?>
<form id="inscriptionForm" method="post" action="preinscription.php" class="bbq">
	<div id="step-lang" class="step">
		<h2><?php echo ILang::_('Step1'); ?></h2>
		<div class="content">
			<?php echo ILang::_('ChooseLanguage'); ?>
		</div>
		<div class="fields">
			<div class="label">
				<label for="field-lang"><?php echo ILang::_('Language'); ?></label>
				<div><?php echo ILang::_('InfoLanguage'); ?></div>
			</div>
			<div class="field">
				<select id="field-lang" name="lang" class="required">
					<option value="English"<?php echo ( $this->user->lang == "English" ? ' selected="selected"' : '' ); ?>>English</option>
					<option value="French"<?php echo ( $this->user->lang == "French" ? ' selected="selected"' : '' ); ?>>Français</option>
					<option value="Italian"<?php echo ( $this->user->lang == "Italian" ? ' selected="selected"' : '' ); ?>>Italiano</option>
					<option value="Polish"<?php echo ( $this->user->lang == "Polish" ? ' selected="selected"' : '' ); ?>>Polska</option>
				</select>
			</div>
		</div>
	</div>
	<div id="step-email" class="step">
		<h2><?php echo ILang::_('Step3'); ?> (<?php echo ILang::_('Optional'); ?>)</h2>
		<div class="content">
			<span class="italic bold"><?php echo ILang::_('Optional'); ?></span> - <?php echo ILang::_('RecordEmail'); ?>
		</div>
		<div class="fields">
			<div class="label">
				<label for="field-email"><?php echo ILang::_('Email'); ?></label>
				<div><?php echo ILang::_('InfoEmail'); ?></div>
			</div>
			<div class="field">
				<input type="text" id="field-email" name="email" value="<?php echo $this->user->email; ?>" class="email" />
			</div>
		</div>
		<div class="clr">
			<hr  />
		</div>
		<div class="content">
			<p class="bold center warning">	<?php echo ILang::_('EmailWarning'); ?></p>
			<?php echo ILang::_('EmailWarningExtra'); ?>
		</div>
	</div>
	<div id="step-graphs" class="step">
		<h2><?php echo ILang::_('Step4'); ?></h2>
		<div class="content">
			<?php echo ILang::_('ChooseGraphs'); ?>
		</div>
		<div class="fields">
			<div class="label">
				<label for="field-skin"><?php echo ILang::_('Skin'); ?></label>
				<div><?php echo ILang::_('InfoTheme'); ?></div>
			</div>
			<div class="field">
				<select id="field-skin" name="skin" class="required">
					<optgroup label="Official">
						<option value="iwarsv2"<?php echo ( $this->user->skin == "iwarsv2" ? ' selected="selected"' : '' ); ?>>Classique</option>
						<option value="space4k"<?php echo ( $this->user->skin == "space4k" ? ' selected="selected"' : '' ); ?>>Space4K</option>
					</optgroup>
					<optgroup label="Old">
						<option value="googled"<?php echo ( $this->user->skin == "googled" ? ' selected="selected"' : '' ); ?>>Googled</option>
						<option value="iwars"<?php echo ( $this->user->skin == "iwars" ? ' selected="selected"' : '' ); ?>>Classique (v1)</option>
						<option value="light"<?php echo ( $this->user->skin == "light" ? ' selected="selected"' : '' ); ?>>Light</option>
					</optgroup>
				</select>
			</div>
		</div>
		<div class="fields">
			<div class="label">
				<label for="field-tmpl"><?php echo ILang::_('Template'); ?></label>
				<div><?php echo ILang::_('InfoInterface'); ?></div>
			</div>
			<div class="field">
				<select id="field-tmpl" name="tmpl" class="required">
					<option value="light"<?php echo ( $this->user->tmpl == "light" ? ' selected="selected"' : '' ); ?>>Simple</option>
					<option value="iwars"<?php echo ( $this->user->tmpl == "iwars" ? ' selected="selected"' : '' ); ?>">Normale</option>
					<option value="space4k"<?php echo ( $this->user->tmpl == "space4k" ? ' selected="selected"' : '' ); ?>>Space4K</option>
				</select>
			</div>
		</div>
		<hr class="clr" />
		<div>
			<div id="screen-googled">ScreenShoot Googled</div>
			<div id="screen-iwars">ScreenShoot Classique</div>
			<div id="screen-space4k">ScreenShoot Space4k</div>
		</div>
	</div>
	<div id="navigation">
		<hr />
		<input class="navigation_button" id="back" value="<?php echo ILang::_('Back'); ?>" type="reset" />
		<input class="navigation_button" id="next" value="<?php echo ILang::_('Next'); ?>" type="submit" />
	</div>
</form>
<div id="data"></div>

<script type="text/javascript">
	function hideOrToggle(id) {
		$("#screen-googled,#screen-iwars,#screen-space4k").hide();
		if(id !== undefined && id !== ""){
			$("#screen-" + id).fadeIn(1000);
		} else {
			$("#screen-iwars").fadeIn(1000);
		}
	}

	$("#field-skin").change(function(){
		hideOrToggle($(this).val());
	})

	$(function(){
		hideOrToggle();

		$("#inscriptionForm").formwizard({
			textSubmit: '<?php echo ILang::_('Submit'); ?>',
			textNext: '<?php echo ILang::_('Next'); ?>',
			textBack: '<?php echo ILang::_('Back'); ?>',

		 	historyEnabled : true,
		 	validationEnabled: true,
		 	focusFirstInput : true
		 }
		);
	});
</script>