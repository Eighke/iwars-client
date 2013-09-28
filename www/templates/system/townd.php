<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			townd.php
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
<h1><?php echo ILang::_('Confirmation'); ?></h1>
<?php $this->renderMsgs(); ?>
<form action="./townd.php" method="POST">
	<div class="content">
		<?php echo ILang::_('AreYouSure?'); ?><br /><?php echo ILang::_('WeNeedPassword'); ?>
	</div>
	<div class="fields">
		<div class="label">
			<label for="field-crtPwd"><?php echo ILang::_('crtPasword'); ?></label>
		</div>
		<div class="field">
			<input type="password" name="crtPwd" id="field-crtPwd" class="required" />
		</div>
	</div>
	<div id="navigation">
		<hr />
		<input type="hidden" name="id" value="<?php echo $this->getData('id'); ?>" />
		<input class="navigation_button" id="next" value="<?php echo ILang::_('Submit'); ?>" name="delTwn" type="submit" />
	</div>
	
</form>