<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			p_town.php
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
<h1><?php echo ILang::_('Planet'); ?></h1>
<?php $this->renderMsgs(); ?>
<div class="contenant center">
	<div class="bg_1">
		<?php echo $this->getData('town')->name; ?> : <?php echo $this->getData('town')->loc['X']; ?>:<?php echo $this->getData('town')->loc['Y']; ?>:<?php echo $this->getData('town')->loc['Z']; ?> (<?php echo $this->getData('town')->points; ?> <?php echo ILang::_('points'); ?>)
	</div><br />
	<div>
		<a href="move.php?coords=<?php echo $this->getData('town')->loc['X']; ?>:<?php echo $this->getData('town')->loc['Y']; ?>:<?php echo $this->getData('town')->loc['Z']; ?>"><b><?php echo ILang::_('SendFleet'); ?></b></a>
	</div>
</div>
<h2><?php echo ILang::_('Player'); ?></h2>
<div class="contenant center">
	<div><strong><?php echo ILang::_('Player'); ?></strong> <span><a href="player.php?id=<?php echo $this->getData('town')->userId; ?>"><?php echo $this->getData('town')->userName; ?></a></span></div>
	<div><a href="m_msg.php?id=<?php echo $this->getData('town')->userId; ?>"><b><?php echo ILang::_('Contact'); ?></b></a></div>
</div>