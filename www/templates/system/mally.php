<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			mally.php
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
<h1><?php echo ILang::_('AllianceCreation'); ?></h1>
<?php $this->renderMsgs(); ?>
<div class="contenant">
	<?php if (!$this->getData('nodpl')) : ?>
	<p><?php echo ILang::_('WarnLeaveAlly'); ?></p>
	<?php if (!$this->getData['submit'] && !$this->haveMsgs('warning')) : ?>
	<form action="mally.php" method="post">
		<?php echo ILang::_('Name:'); ?> <input type="text" name="ally_name" /> (<?php echo ILang::_('MaxChar', 100); ?>) |
		<?php echo ILang::_('Tag:'); ?> <input type="text" name="ally_tag" size="5" /> (<?php echo ILang::_('MaxChar', 5); ?>)<br />
		<input type="submit" value="Go" name="mk_ally" />
	</form>
	<?php else : ?>
	<p><?php echo ILang::_('CreationDone'); ?></p>
	<?php endif; ?>
	<?php endif; ?>
</div>