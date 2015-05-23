<?php
/**
 * Package      Templates
 * Subpackage   System
 * File         options.php
 *
 * Licence      Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright    Copyright (C) 2005 - 2014 Frédéric Vandebeuque. All rights reserved.
 * Contrib      Frédéric V. (fred.vdb@newebtime.com)
 *              Eighke (eighke@multi-site.net)
 *
 * Version      2014-02-13 - Eighke
 */
if (!session_id()) exit();
?>
<h1><?php echo ILang::_('User'); ?></h1>
<?php $this->renderMsgs(); ?>
<form action="./options.php" method="post" class="form-horizontal">
	<div class="block">
		<div class="form-group">
			<label for="field-pseudo" class="col-xs-4 control-label"><?php echo ILang::_('Pseudo'); ?></label>
			<div class="col-xs-4">
				<input type="text" name="pseudo" id="field-pseudo" value="<?php echo $this->user->name; ?>" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label for="field-email" class="col-xs-4 control-label"><?php echo ILang::_('Email'); ?></label>
			<div class="col-xs-4">
				<input type="text" name="email" id="field-email" value="<?php echo $this->user->email; ?>" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label for="field-newPwd" class="col-xs-4 control-label"><?php echo ILang::_('NewPassword'); ?></label>
			<div class="col-xs-4">
				<input type="password" name="newPwd" id="field-newPwd" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label for="field-confPwd" class="col-xs-4 control-label"><?php echo ILang::_('NewPasswordConf'); ?></label>
			<div class="col-xs-4">
				<input type="password" name="confPwd" id="field-confPwd" class="form-control" />
			</div>
		</div>
		<p class="alert alert-warning text-center"><i class="glyphicon glyphicon-info-sign"></i> <strong><?php echo ILang::_('WeNeedPassword'); ?></strong></p>
		<div class="form-group">
			<label for="field-oldPwd" class="col-xs-4 control-label"><?php echo ILang::_('crtPasword'); ?></label>
			<div class="col-xs-4">
				<input type="password" name="oldPwd" id="field-oldPwd" class="form-control" />
			</div>
			<input type="submit" name="act_usr" value="<?php echo ILang::_('Save'); ?>" class="col-xs-4" />
		</div>
		<hr />
	</div>
	<h2><?php echo ILang::_('General'); ?></h2>
	<div class="block">
		<div class="form-group">
			<label for="field-lang" class="col-xs-4 control-label"><?php echo ILang::_('Language'); ?></label>
			<div class="col-xs-4">
				<select name="lang" id="field-lang" class="form-control" >
					<option value="English"<?php echo ( $this->user->lang == "English" ? ' selected="selected"' : '' ); ?>>English</option>
					<option value="French"<?php echo ( $this->user->lang == "French" ? ' selected="selected"' : '' ); ?>>Français</option>
					<option value="Italian"<?php echo ( $this->user->lang == "Italian" ? ' selected="selected"' : '' ); ?>>Italiano</option>
					<option value="Polish"<?php echo ( $this->user->lang == "Polish" ? ' selected="selected"' : '' ); ?>>Polski</option>
					<option value="Thai"<?php echo ( $this->user->lang == "Thai" ? ' selected="selected"' : '' ); ?>>ไทย</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="field-country" class="col-xs-4 control-label"><?php echo ILang::_('Country'); ?></label>
			<div class="col-xs-4">
				<select name="country" id="field-country" class="form-control">
					<option value="aq"<?php echo ( $this->user->country == "aq" ? ' selected="selected"' : '' ); ?>>Antarctica</option>
					<option value="be"<?php echo ( $this->user->country == "be" ? ' selected="selected"' : '' ); ?>>Belgique</option>
					<option value="ca"<?php echo ( $this->user->country == "ca" ? ' selected="selected"' : '' ); ?>>Canada</option>
					<option value="es"<?php echo ( $this->user->country == "es" ? ' selected="selected"' : '' ); ?>>España</option>
					<option value="fr"<?php echo ( $this->user->country == "fr" ? ' selected="selected"' : '' ); ?>>France</option>
					<option value="it"<?php echo ( $this->user->country == "it" ? ' selected="selected"' : '' ); ?>>Italia</option>
					<option value="pl"<?php echo ( $this->user->country == "pl" ? ' selected="selected"' : '' ); ?>>Polska</option>
					<option value="ch"<?php echo ( $this->user->country == "ch" ? ' selected="selected"' : '' ); ?>>Suisse</option>
					<option value="gb"<?php echo ( $this->user->country == "gb" ? ' selected="selected"' : '' ); ?>>United Kingdom</option>
					<option value="us"<?php echo ( $this->user->country == "us" ? ' selected="selected"' : '' ); ?>>USA</option>
					<option value="th"<?php echo ( $this->user->country == "th" ? ' selected="selected"' : '' ); ?>>ไทย</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="field-tmpl" class="col-xs-4 control-label"><?php echo ILang::_('Template'); ?></label>
			<div class="col-xs-4">
				<select name="tmpl" id="field-tmpl" class="form-control">
					<option value="light"<?php echo ( $this->user->tmpl == "light" ? ' selected="selected"' : '' ); ?>>Simple</option>
					<option value="iwars"<?php echo ( $this->user->tmpl == "iwars" ? ' selected="selected"' : '' ); ?>>Normale</option>
					<option value="space4k"<?php echo ( $this->user->tmpl == "space4k" ? ' selected="selected"' : '' ); ?>>Space4K</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="field-skin" class="col-xs-4 control-label"><?php echo ILang::_('Skin'); ?></label>
			<div class="col-xs-4">
				<select name="skin" id="field-skin" class="form-control">
					<optgroup label="Official">
						<option value="iwarsv2"<?php echo ( $this->user->skin == "iwarsv2" ? ' selected="selected"' : '' ); ?>>Classique</option>
						<option value="space4k"<?php echo ( $this->user->skin == "space4k" ? ' selected="selected"' : '' ); ?>>Space4K</option>
					</optgroup>
					<optgroup label="Old">
						<option value="googled"<?php echo ( $this->user->skin == "googled" ? ' selected="selected"' : '' ); ?>>Googled</option>
						<option value="light"<?php echo ( $this->user->skin == "light" ? ' selected="selected"' : '' ); ?>>Épurer</option>
						<option value="iwars"<?php echo ( $this->user->skin == "iwars" ? ' selected="selected"' : '' ); ?>>Classique (V1)</option>
					</optgroup>
				</select>
			</div>
			<input type="submit" name="act_gen" value="<?php echo ILang::_('Save'); ?>" class="col-xs-4" />
		</div>
		<hr />
	</div>
	<h2><?php echo ILang::_('Options'); ?></h2>
	<div class="block">
		<div class="form-group">
			<label for="field-slog" class="col-xs-4 control-label"><?php echo ILang::_('SaveLogin'); ?></label>
			<div class="col-xs-4">
				<input type="checkbox" name="opt_slog" id="field-slog" <?php echo $this->getData('options')->saveName == 1 ? 'checked="checked"' : '';?> class="" />
			</div>
		</div>
		<div class="form-group">
			<label for="field-menu" class="col-xs-4 control-label"><?php echo ILang::_('DefaultMenu'); ?></label>
			<div class="col-xs-4">
				<select name="opt_menu" id="field-menu" class="form-control">
					<option value="2"<?php echo $this->getData('options')->startMenu == 2 ? ' selected="selected"' : ''; ?>><?php echo ILang::_('Global'); ?></option>
					<option value="3"<?php echo $this->getData('options')->startMenu == 3 ? ' selected="selected"' : ''; ?>><?php echo ILang::_('Alliance'); ?></option>
				</select>
			</div>
			<input type="submit" name="act_opt" value="<?php echo ILang::_('Save'); ?>" class="col-xs-4" />
		</div>
		<hr />
	</div>
	<h2><?php echo ILang::_('Messages'); ?></h2>
	<div class="block">
		<div class="form-group">
			<label for="field-msgPlayer" class="col-xs-4 control-label"><?php echo ILang::_('PlayerMsg'); ?></label>
			<div class="col-xs-4">
				<select name="msg[player]" id="field-msgPlayer" class="form-control">
					<option value="0" <?php echo $this->getData('options')->msgPlayer == 0 ? 'selected="selected"' : ''; ?>><?php echo ILang::_('ToInbox'); ?></option>
					<?php if($folders = $this->getData('folders')) foreach($folders as $folder) : ?>
					<option value="<?php echo $folder->id; ?>" <?php echo $this->getData('options')->msgPlayer == $folder->id ? 'selected="selected"' : ''; ?>><?php echo ILang::_('MoveTo'); ?> <?php echo $folder->name; ?></option>
					<?php endforeach; ?>
					<option value="-1" <?php echo $this->getData('options')->msgPlayer == -1 ? 'selected="selected"' : ''; ?>><?php echo ILang::_('Delete'); ?></option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="field-msgFight" class="col-xs-4 control-label"><?php echo ILang::_('FightMsg'); ?></label>
			<div class="col-xs-4">
				<select name="msg[fight]" id="field-msgFight" class="form-control">
					<option value="0" <?php echo $this->getData('options')->msgFight == 0 ? 'selected="selected"' : ''; ?>><?php echo ILang::_('ToInbox'); ?></option>
					<option value="-1" <?php echo $this->getData('options')->msgFight == -1 ? 'selected="selected"' : ''; ?>><?php echo ILang::_('Delete'); ?></option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="field-msgConst" class="col-xs-4 control-label"><?php echo ILang::_('BuildMsg'); ?></label>
			<div class="col-xs-4">
				<select name="msg[const]" id="field-msgConst" class="form-control">
					<option value="0" <?php echo $this->getData('options')->msgConst == 0 ? 'selected="selected"' : ''; ?>><?php echo ILang::_('ToInbox'); ?></option>
					<option value="-1" <?php echo $this->getData('options')->msgConst == -1 ? 'selected="selected"' : ''; ?>><?php echo ILang::_('Delete'); ?></option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="field-msgMove" class="col-xs-4 control-label"><?php echo ILang::_('MoveMsg'); ?></label>
			<div class="col-xs-4">
				<select name="msg[move]" id="field-msgMove" class="form-control">
					<option value="0" <?php echo $this->getData('options')->msgMove == 0 ? 'selected="selected"' : ''; ?>><?php echo ILang::_('ToInbox'); ?></option>
					<option value="-1" <?php echo $this->getData('options')->msgMove == -1 ? 'selected="selected"' : ''; ?>><?php echo ILang::_('Delete'); ?></option>
				</select>
			</div>
			<input type="submit" name="act_msg" value="<?php echo ILang::_('Save'); ?>" class="col-xs-4" />
		</div>
		<hr />
	</div>
	<h2><?php echo ILang::_('VacancyMode'); ?></h2>
	<div class="block">
		<p class="alert alert-info text-center"><i class="glyphicon glyphicon-info-sign"></i> <strong><?php echo ILang::_('ActivateVMInfo'); ?></strong></p>
		<div class="form-group">
			<label for="field-vm" class="col-xs-4 control-label"><?php echo ILang::_('ActivateVM'); ?></label>
			<div class="col-xs-4">
				<input type="checkbox" name="vm_en" id="field-vm" />
			</div>
			<input type="submit" name="act_vm" value="<?php echo ILang::_('Save'); ?>" class="col-xs-4" />
		</div>
	</div>
	<hr class="clr" />
</form>