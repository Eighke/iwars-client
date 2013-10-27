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
<form id="inscriptionForm" method="post" action="inscription.php" class="bbq">
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
					<option value="English"<?php echo ( $this->user->lang == "English" ? ' selected="selected"' : '' );?>>English</option>
					<option value="French"<?php echo ( $this->user->lang == "French" ? ' selected="selected"' : '' );?>>Français</option>
					<option value="Italian"<?php echo ( $this->user->lang == "Italian" ? ' selected="selected"' : '' );?>>Italiano</option>
					<option value="Polish"<?php echo ( $this->user->lang == "Polish" ? ' selected="selected"' : '' );?>>Polska</option>
				</select>
			</div>
		</div>
	</div>
	<div id="step-login" class="step">
		<h2><?php echo ILang::_('Step2'); ?></h2>
		<div class="content">
			<?php echo ILang::_('InfoLogin'); ?>
		</div>
		<div class="fields">
			<div class="label">
				<label for="field-login"><?php echo ILang::_('Login'); ?></label>
			</div>
			<div class="field">
				<input type="text" id="field-login" name="login" class="required" />
			</div>
		</div>
		<div class="fields">
			<div class="label">
				<label for="field-pseudo"><?php echo ILang::_('Nickname'); ?></label>
				<div><?php echo ILang::_('InfoNickname'); ?></div>
			</div>
			<div class="field">
				<input type="text" id="field-pseudo" name="pseudo" class="required" />
			</div>
		</div>
		<div class="fields">
			<div class="label">
				<label for="field-pwd"><?php echo ILang::_('Password'); ?></label>
				<div><?php echo ILang::_('InfoPassword'); ?></div>
			</div>
			<div class="field">
				<input type="password" id="field-pwd" name="pwd" class="required" />
			</div>
		</div>
		<div class="fields">
			<div class="label">
				<label for="field-pwd2"><?php echo ILang::_('Confirmation'); ?></label>
				<div><?php echo ILang::_('InfoConfirm'); ?></div>
			</div>
			<div class="field">
				<input type="password" id="field-pwd2" name="pwd2" class="required" />
			</div>
		</div>
	</div>
	<div id="step-email" class="step">
		<h2><?php echo ILang::_('Step3'); ?> (<?=ILang::_('Optional'); ?>)</h2>
		<div class="content">
			<span class="italic bold"><?=ILang::_('Optional'); ?></span> - <?php echo ILang::_('RecordEmail'); ?>
		</div>
		<div class="fields">
			<div class="label">
				<label for="field-email"><?=ILang::_('Email'); ?></label>
				<div><?php echo ILang::_('InfoEmail'); ?></div>
			</div>
			<div class="field">
				<input type="text" id="field-email" name="email" value="<?=$this->user->email?>" class="email" />
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
				<label for="field-skin"><?=ILang::_('Skin'); ?></label>
				<div><?php echo ILang::_('InfoTheme'); ?></div>
			</div>
			<div class="field">
				<select id="field-skin" name="skin" class="required">
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
			</div>
		</div>
		<div class="fields">
			<div class="label">
				<label for="field-tmpl"><?=ILang::_('Template'); ?></label>
				<div><?php echo ILang::_('InfoInterface'); ?></div>
			</div>
			<div class="field">
				<select id="field-tmpl" name="tmpl" class="required">
					<option value="light"<?=( $this->user->tmpl == "light" ? ' selected="selected"' : '' );?>>Simple</option>
					<option value="iwars"<?=( $this->user->tmpl == "iwars" ? ' selected="selected"' : '' );?>">Normale</option>
					<option value="space4k"<?=( $this->user->tmpl == "space4k" ? ' selected="selected"' : '' );?>>Space4K</option>
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

	var xDfe = <?php echo crypt_key; ?>;
	var submit = <?php echo ILang::_('Submit'); ?>;
	var next = <?php echo ILang::_('Next'); ?>;
	var back = <?php echo ILang::_('Back'); ?>;
</script>