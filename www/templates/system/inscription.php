<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			inscription.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-10-26 - Eighke
 */
?>

<h1><?php echo ILang::_('Inscription'); ?></h1>
<?php $this->renderMsgs(); ?>
<form id="inscriptionForm" method="post" action="inscription.php" class="bbq form-horizontal">
	<div id="step-lang" class="step">
		<h2><?php echo ILang::_('Step1'); ?></h2>
		<div class="content">
			<?php echo ILang::_('ChooseLanguage'); ?>
		</div>
		<div class="form-group">
			<label for="field-lang" class="col-xs-4 control-label">
				<?php echo ILang::_('Language'); ?>
				
			</label>
			<div class="col-xs-5">
				<select id="field-lang" name="lang" class="form-control" onChange="window.location='inscription.php?lang='+this.value" required>
					<option value="English"<?php echo ( $this->user->lang == "English" ? ' selected="selected"' : '' ); ?>>English</option>
					<option value="French"<?php echo ( $this->user->lang == "French" ? ' selected="selected"' : '' ); ?>>Français</option>
					<option value="Italian"<?php echo ( $this->user->lang == "Italian" ? ' selected="selected"' : '' ); ?>>Italiano</option>
					<option value="Polish"<?php echo ( $this->user->lang == "Polish" ? ' selected="selected"' : '' ); ?>>Polska</option>
				</select>
				<p class="help-block"><?php echo ILang::_('InfoLanguage'); ?></p>
			</div>
		</div>
	</div>
	<div id="step-login" class="step">
		<h2><?php echo ILang::_('Step2'); ?></h2>
		<div class="content">
			<?php echo ILang::_('InfoLogin'); ?>
		</div>
		<div class="form-group">
			<label for="field-login" class="col-xs-4 control-label"><?php echo ILang::_('Login'); ?></label>
			<div class="col-xs-5">
				<input type="text" id="field-login" name="login" class="form-control" required />
				<p class="help-block"><?php echo ILang::_(' '); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="field-pseudo" class="col-xs-4 control-label"><?php echo ILang::_('Nickname'); ?></label>
			<div class="col-xs-5">
				<input type="text" id="field-pseudo" name="pseudo" class="form-control" required />
				<p class="help-block"><?php echo ILang::_('InfoNickname'); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="field-pwd" class="col-xs-4 control-label"><?php echo ILang::_('Password'); ?></label>
			<div class="col-xs-5">
				<input type="password" id="field-pwd" name="pwd" class="form-control" required />
				<p class="help-block"><?php echo ILang::_('InfoPassword'); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="field-pwd2" class="col-xs-4 control-label"><?php echo ILang::_('Confirmation'); ?></label>
			<div class="col-xs-5">
				<input type="password" id="field-pwd2" name="pwd2" class="form-control" required />
				<p class="help-block"><?php echo ILang::_('InfoConfirm'); ?></p>
			</div>
		</div>
	</div>
	<div id="step-email" class="step">
		<h2><?php echo ILang::_('Step3'); ?> (<?=ILang::_('Optional'); ?>)</h2>
		<div class="content">
			<span class="italic bold"><?=ILang::_('Optional'); ?></span> - <?php echo ILang::_('RecordEmail'); ?>
		</div>
		<div class="form-group">
			<label for="field-email" class="col-xs-4 control-label"><?php echo ILang::_('Email'); ?></label>
			<div class="col-xs-5">
				<input type="text" id="field-email" name="email" class="form-control" />
				<p class="help-block"><?php echo ILang::_('InfoEmail'); ?></p>
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
		<div class="form-group">
			<label for="field-skin" class="col-xs-4 control-label"><?php echo ILang::_('Skin'); ?></label>
			<div class="col-xs-5">
				<select id="field-skin" name="skin" class="form-control" required>
					<optgroup label="Official">
						<option value="iwarsv2"<?=( $this->user->skin == "iwarsv2" ? ' selected="selected"' : '' );?>>Classique</option>
						<option value="space4k"<?=( $this->user->skin == "space4k" ? ' selected="selected"' : '' );?>>Space4K</option>
					</optgroup>
					<optgroup label="Old">
						<option value="googled"<?=( $this->user->skin == "googled" ? ' selected="selected"' : '' );?>>Googled</option>
						<option value="iwars"<?=( $this->user->skin == "iwars" ? ' selected="selected"' : '' );?>>Classique (v1)</option>
						<option value="light"<?=( $this->user->skin == "light" ? ' selected="selected"' : '' );?>>Light</option>
					</optgroup>
				</select>
				<p class="help-block"><?php echo ILang::_('InfoTheme'); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="field-tmpl" class="col-xs-4 control-label"><?php echo ILang::_('Template'); ?></label>
			<div class="col-xs-5">
				<select id="field-tmpl" name="tmpl" class="form-control" required>
					<option value="light"<?=( $this->user->tmpl == "light" ? ' selected="selected"' : '' );?>>Simple</option>
					<option value="iwars"<?=( $this->user->tmpl == "iwars" ? ' selected="selected"' : '' );?>">Normale</option>
					<option value="space4k"<?=( $this->user->tmpl == "space4k" ? ' selected="selected"' : '' );?>>Space4K</option>
				</select>
				<p class="help-block"><?php echo ILang::_('InfoInterface'); ?></p>
			</div>
		</div>
		<hr class="clr" />
		<div>
			<div id="screen-iwarsv2">ScreenShoot Classique</div>
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
	var xDfe = <?php echo crypt_key; ?>;
	var submit = <?php echo ILang::_('Submit'); ?>;
	var next = <?php echo ILang::_('Next'); ?>;
	var back = <?php echo ILang::_('Back'); ?>;
</script>