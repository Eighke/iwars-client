<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			aally.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-10-30 - Eighke
 */
if (!session_id()) exit();
?>

<h1><?php echo ILang::_('Administration'); ?></h1>
<?php $this->renderMsgs(); ?>
<div class="block">
	<h2><?php echo ILang::_('Logo'); ?></h2>
	<form action="./aally.php" enctype="multipart/form-data" method="POST">
		<?php if (file_exists( $this->alliance->getLogo() )) : ?>
		<div class="text-center">
			<img src="<?php echo $this->alliance->getLogo(); ?>" />
		</div><br />
		<?php else : ?>
		<div class="text-center"><?php echo ILang::_('NoLogo'); ?></div><br />
		<?php endif; ?>
		<div class="form-group">
			<label for="field-logo" class="col-xs-4 control-label"> </label>
			<div class="col-xs-4">
				<input type="file" id="field-logo" name="logo" class="form-control" />
				<p class="help-block"><?php echo ILang::_('AlowedFiles'); ?></p>
			</div>
			<input type="submit" name="act_logo" value="<?php echo ILang::_('Upload'); ?>" class="col-xs-4" />
		</div>
		<div class="clr"> </div>
	</form>
</div>

<form action="./aally.php" method="POST" class="form-horizontal">
<div class="block">
	<h2><?php echo ILang::_('Link'); ?></h2>
	<div class="form-group">
		<label for="field-link" class="col-xs-4 control-label"><?php echo ILang::_('Website'); ?></label>
		<div class="col-xs-4">
			<input type="text" id="field-link" name="link" class="form-control" />
			<p class="help-block"><?php echo ILang::_('InsertAllianceLink'); ?></p>
		</div>
		<input type="submit" name="act_link" value="<?php echo ILang::_('Save'); ?>" class="col-xs-4" />
	</div>
	<div class="clr"></div>
</div>
<hr />
<div class="block center">
	<h2><?php echo ILang::_('AllyDesc'); ?></h2>
	<h3><strong><?php echo ILang::_('PublicDescription'); ?></strong></h3>
	<div class="block">
		<div><textarea name="desc" id="desc"><?php echo $this->alliance->desc; ?></textarea></div>
		<div>
			<span><?php echo ILang::_('Character'); ?> : <span id="desc_counter">20000</span></span>
		</div>
	</div>
	<h3><strong><?php echo ILang::_('PrivateDescription'); ?></strong></h3>
	<div class="block">
		<div><textarea name="pdesc" id="pdesc"><?php echo $this->alliance->pDesc; ?></textarea></div>
		<div>
			<span><?php echo ILang::_('Character'); ?> : <span id="pdesc_counter">20000</span></span>
		</div>
	</div>
	<div>
		<span><input type="submit" name="act_desc" value="<?php echo ILang::_('Save'); ?>" class="form-control" /></span>
	</div>
</div>
<hr />
<div class="block">
	<h2><?php echo ILang::_('ChangeLeader'); ?></h2>
	<div class="form-group">
		<label for="field-usr" class="col-xs-4 control-label"><?php echo ILang::_('NewLeader'); ?></label>
		<div class="col-xs-4">
			<select name="usr" id="field-usr" class="form-control">
				<?php foreach($this->getData('members') as $member) : ?>
				<option value="<?php echo $member->id; ?>"<?php echo ( $this->user->id == $member->id ? ' selected="selected"' : '' ); ?>><?php echo $member->name; ?></option>
				<?php endforeach; ?>
			</select>
			<p class="help-block"><?php echo ILang::_('InsertAllianceLink'); ?></p>
		</div>
	</div>
	<p class="alert alert-warning text-center"><i class="glyphicon glyphicon-info-sign"></i> <strong><?php echo ILang::_('WeNeedPassword'); ?></strong></p>
	<div class="form-group">
		<label for="field-chnPwd" class="col-xs-4 control-label"><?php echo ILang::_('Password'); ?></label>
		<div class="col-xs-4">
			<input type="password" id="field-chnPwd" name="chnPwd" class="form-control" />
		</div>
		<input type="submit" name="act_chn" value="<?php echo ILang::_('Save'); ?>" class="col-xs-4" />
	</div>
	<div class="clr"></div>
</div>
<hr />
<div class="block">
	<h2><?php echo ILang::_('DeleteAlly'); ?></h2>
	<div class="form-group">
		<label for="field-del" class="col-xs-4 control-label"><?php echo ILang::_('DelAlly'); ?></label>
		<div class="col-xs-4">
			<select name="del" id="field-del" class="form-control">
				<option value="0" selected="selected"><?php echo ILang::_('No'); ?></option>
				<option value="1"><?php echo ILang::_('Yes'); ?></option>
			</select>
			<p class="help-block"><?php echo ILang::_('InsertAllianceLink'); ?></p>
		</div>
	</div>
	<p class="alert alert-warning text-center"><i class="glyphicon glyphicon-info-sign"></i> <strong><?php echo ILang::_('WeNeedPassword'); ?></strong></p>
	<div class="form-group">
		<label for="field-delPwd" class="col-xs-4 control-label"><?php echo ILang::_('Password'); ?></label>
		<div class="col-xs-4">
			<input type="password" id="field-delPwd" name="delPwd" class="form-control" />
		</div>
		<input type="submit" name="act_del" value="<?php echo ILang::_('Save'); ?>" class="col-xs-4" />
	</div>
	<div class="clr"></div>
</div>
</form>
<div class="clr"></div>