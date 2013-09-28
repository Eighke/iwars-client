<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			index.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-06-17 - Eighke
 */
if (!session_id()) exit();
?>
<h1><?php echo ILang::_('CommandCenter'); ?></h1>
<?php $this->renderMsgs(); ?>
<div class="content">
	<?php echo ILang::_('MoveNumber:'); ?> <?php echo $this->getData('control')->total; ?><br />
	<?php echo ILang::_('Attack'); ?>: <?php echo $this->getData('control')->Attack; ?>, <?php echo ILang::_('Base'); ?>: <?php echo $this->getData('control')->Base; ?>, <?php echo ILang::_('Port'); ?>: <?php echo $this->getData('control')->Port; ?>, <?php echo ILang::_('Back'); ?>: <?php echo $this->getData('control')->Back; ?><br />
</div>
<h2><?php echo ILang::_('YourFleets'); ?></h2>
<?php if($actions = $this->getData('self')) : ?>
<div class="moves">
	<?php foreach($actions as $action) : ?>
	<div class="<?php echo $action->class; ?>">
		<span class="left"><?php echo $action->wait; ?> | <?php echo $action->msg; ?></span> <?php if ($action->cancel) : ?><span class="right">[ <a href="?cancel=<?php echo $action->id; ?>"><?php echo ILang::_('Cancel'); ?></a> ]</span> <?php endif; ?>
		<span class=spacer>&nbsp;</span>
	</div>
	<?php endforeach; ?>
</div>
<?php endif; ?>
<h2><?php echo ILang::_('OtherFleets'); ?></h2>
<?php if($actions = $this->getData('other')) : ?>
<div class="moves">
	<?php foreach($actions as $action) : ?>
	<div class="<?php echo $action->class; ?>">
		<?php echo $action->wait; ?> | <?php echo $action->msg[0]; ?> <?php echo $action->X1; ?>:<?php echo $action->Y1; ?>:<?php echo $action->Z1; ?> <?php echo $action->msg[1]; ?> <?php echo $action->X2; ?>:<?php echo $action->Y2; ?>:<?php echo $action->Z2; ?> <?php echo ILang::_('WithOrder'); ?> <?php echo $action->type; ?> <?php if ($action->cancel) : ?><span class="right">[ <a href="?cancel=<?php echo $action->id; ?>"><?php echo ILang::_('Cancel'); ?></a> ]</span> <?php endif; ?>
	</div>
	<?php endforeach; ?>
</div>
<?php endif; ?>
<div class="clr"></div>