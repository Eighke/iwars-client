<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			_msgs.php
 *
 * Licence		GNU General Public License version 3; see http://www.gnu.org/licenses/lgpl-3.0.en.html
 * Copyright	Copyright (C) 2005 - 2012 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric Vandebeuque (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2012-11-16 - Eighke
 */
if (!session_id()) exit();

//$this->haveMsgs('error'/'info'/'valid'/'warning')
?>
<!-- #Message -->
<div id="messages">
	<?php if ($this->haveMsgs('error')) : ?><div class="msg error"><?php echo $this->getMsgs('error'); ?></div><?php endif; ?>
	<?php if ($this->haveMsgs('info')) : ?><div class="msg info"><?php echo $this->getMsgs('info'); ?></div><?php endif; ?>
	<?php if ($this->haveMsgs('valid')) : ?><div class="msg valid"><?php echo $this->getMsgs('valid'); ?></div><?php endif; ?>
	<?php if ($this->haveMsgs('warning')) : ?><div class="msg warning"><?php echo $this->getMsgs('warning'); ?></div><?php endif; ?>
</div>
<!-- /#Message -->