<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			m_folder.php
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
<h1><?php echo ILang::_('NewFolder'); ?></h1>
<?php $this->renderMsgs(); ?>
<div class="center">
	<form action="m_folder.php" method="POST">
	<div class="center"><?php echo ILang::_('EnterName:'); ?> <input type="text" name="name" /> |
		<input type="submit" value="<?php echo ILang::_('Create'); ?>" name="step1" />
	</div>
	</form>
</div>