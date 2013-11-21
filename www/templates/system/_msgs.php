<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			_msgs.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-10-26 - Eighke
 */
if (!session_id()) exit();
?>
<!-- #Message -->
<div id="messages">
	<?php if ($this->haveMsgs('error')) : ?><div class="alert alert-danger"><?php echo $this->getMsgs('error'); ?></div><?php endif; ?>
	<?php if ($this->haveMsgs('info')) : ?><div class="alert alert-info"><?php echo $this->getMsgs('info'); ?></div><?php endif; ?>
<?php if ($this->haveMsgs('valid')) : ?>
	<div class="alert alert-success alert-dismissable fade in">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<?php echo $this->getMsgs('valid'); ?></div>
<?php endif; ?>
	<?php if ($this->haveMsgs('warning')) : ?><div class="alert alert-warning"><?php echo $this->getMsgs('warning'); ?></div><?php endif; ?>
</div>
<!-- /#Message -->