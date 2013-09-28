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
 * Version		2013-02-18 - Eighke
 */
if (!session_id()) exit();
?>

<h1><?php echo ILang::_('Administration'); ?></h1>
<?php $this->renderMsgs(); ?>
<h2><?php echo ILang::_('Logo'); ?></h2>
<div class="block center">
	<form action="./aally.php" enctype="multipart/form-data" method="POST">
		<div>
			<?php if (file_exists( $this->alliance->getLogo() )) : ?>
			<div class="center">
				<img src="<?php echo $this->alliance->getLogo(); ?>" />
			</div><br />
			<?php else : ?>
			<div class="center"><?php echo ILang::_('NoLogo'); ?></div><br />
			<?php endif; ?>
			<span class="op-field"><?php echo ILang::_('AlowedFiles'); ?></span>
			<span class="op-field"><input type="file" size="15" name="logo" /></span>
			<span><input type="submit" name="act_logo" value="Upload" /></span>
		</div>
	</form>
</div>
<form action="./aally.php" method="POST">
<h2><?php echo ILang::_('Link'); ?></h2>
<div class="block">
	<div class="fields">
		<div class="label">
			<label for="field-link"><?php echo ILang::_('Website'); ?></label>
			<div><?php echo ILang::_('InsertAllianceLink'); ?></div>
		</div>
		<div class="field">
			<input type="text" name="link" id="field-link" value="<?php echo $this->alliance->link; ?>">
			<input type="submit" name="act_link" value="<?php echo ILang::_('Save'); ?>" class="right">
		</div>
	</div>
	<div class="clr"></div>
</div>
<hr />
<h2><?php echo ILang::_('AllyDesc'); ?></h2>
<div class="block center">
	<h3><strong><?php echo ILang::_('PublicDescription'); ?></strong></h3>
	<div class="block">
		<div><textarea name="desc" id="desc"><?php echo $this->alliance->desc; ?></textarea></div>
		<div>
			<strong>BBCode:</strong> [b] [i] [u] [s] [color] [size] [left] [right] [center] [justify]<br />
			<span><?php echo ILang::_('Character'); ?> : <span id="desc_counter">20000</span></span>
		</div>
	</div>
	<h3><strong><?php echo ILang::_('PrivateDescription'); ?></strong></h3>
	<div class="block">
		<div><textarea name="pdesc" id="pdesc"><?php echo $this->alliance->pDesc; ?></textarea></div>
		<div>
			<strong>BBCode:</strong> [b] [i] [u] [s] [color] [size] [left] [right] [center] [justify]<br />
			<span><?php echo ILang::_('Character'); ?> : <span id="pdesc_counter">20000</span></span>
		</div>
	</div>
	<div>
		<span><input type="submit" name="act_desc" value="<?php echo ILang::_('Save'); ?>" /></span>
	</div>
</div>
<hr />
<h2><?php echo ILang::_('ChangeLeader'); ?></h2>
<div class="block">
	<div class="fields">
		<div class="label">
			<label for="field-usr"><?php echo ILang::_('NewLeader'); ?></label>
		</div>
		<div class="field">
			<select name="usr" id="field-usr">
				<?php foreach($this->getData('members') as $member) : ?>
				<option value="<?php echo $member->id; ?>"<?php echo ( $this->user->id == $member->id ? ' selected="selected"' : '' ); ?>><?php echo $member->name; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class="fields">
		<div class="label">
			<label for="field-chnPwd"><?php echo ILang::_('Password'); ?></label>
			<div><?php echo ILang::_('WeNeedPassword'); ?></div>
		</div>
		<div class="field">
			<input type="password" name="chnPwd"  id="field-chnPwd" />
			<input type="submit" name="act_chn" value="<?php echo ILang::_('Save'); ?>" />
		</div>
	</div>
	<div class="clr"></div>
</div>
<hr />
<h2><?php echo ILang::_('DeleteAlly'); ?></h2>
<div class="block">
	<div class="fields">
		<div class="label">
			<label for="field-del"><?php echo ILang::_('DelAlly'); ?></label>
		</div>
		<div class="field">
			<select name="del" id="field-del">
				<option value="0" selected="selected"><?php echo ILang::_('No'); ?></option>
				<option value="1"><?php echo ILang::_('Yes'); ?></option>
			</select>
		</div>
	</div>
	<div class="fields">
		<div class="label">
			<label for="field-delPwd"><?php echo ILang::_('Password'); ?></label>
			<div><?php echo ILang::_('WeNeedPassword'); ?></div>
			<div class="bold"><?php echo ILang::_('ActionWarn'); ?></div>
		</div>
		<div class="field">
			<input type="password" name="delPwd" id="field-delPwd" />
			<input type="submit" name="act_del" value="<?php echo ILang::_('Save'); ?>" />
		</div>
	</div>
	<div class="clr"></div>
</div>
</form>
<div class="clr"></div>

<script type="text/javascript">
	 $("#desc").charCount();
	 $("#pdesc").charCount();
</script>