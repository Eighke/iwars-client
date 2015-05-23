<?php
/**
 * Package      Templates
 * Subpackage   System
 * File         index.php
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
	<div class="<?php echo $action->class; ?> tip pleft" data-toggle="tooltip" content="<?php echo ILang::_($action->type); ?>::Units: <?php echo $action->unit; ?>&lt;br /&gt;<?php if (isset($action->ress)) : ?>&lt;b&gt;T:&lt;/b&gt; <?php echo $action->ress[0]; ?>&lt;br /&gt; &lt;b&gt;S:&lt;/b&gt; <?php echo $action->ress[1]; ?>&lt;br /&gt; &lt;b&gt;E:&lt;/b&gt; <?php echo $action->ress[3]; ?>&lt;br /&gt; &lt;b&gt;H:&lt;/b&gt; <?php echo $action->ress[2]; ?><?php endif; ?>">
		<span class="left">
			<span class="countdown" time="<?php echo time()+$action->uTime; ?>"><?php echo $action->wait; ?></span>
			| <?php echo $action->msg; ?></span>
		<?php if ($action->cancel) : ?>
		<span class="right button"><a href="index.php?task=cancel&id=<?php echo $action->id; ?>" data-load="cache"><?php echo ILang::_('Cancel'); ?></a></span>
		<?php endif; ?>
		<span class="clr">&nbsp;</span>
	</div>
	<?php endforeach; ?>
</div>
<?php endif; ?>
<h2><?php echo ILang::_('OtherFleets'); ?></h2>
<?php if($actions = $this->getData('other')) : ?>
<div class="moves">
	<?php foreach($actions as $action) : ?>
	<div class="<?php echo $action->class; ?> tip pleft" data-toggle="tooltip" content="<?php echo ILang::_($action->type); ?>::Units: <?php echo $action->unit; ?>&lt;br /&gt;<?php if (isset($action->ress)) : ?>&lt;b&gt;T:&lt;/b&gt; <?php echo $action->ress[0]; ?>&lt;br /&gt; &lt;b&gt;S:&lt;/b&gt; <?php echo $action->ress[1]; ?>&lt;br /&gt; &lt;b&gt;E:&lt;/b&gt; <?php echo $action->ress[3]; ?>&lt;br /&gt; &lt;b&gt;H:&lt;/b&gt; <?php echo $action->ress[2]; ?><?php endif; ?>">
		<span class="left">
			<span class="countdown" time="<?php echo time()+$action->uTime; ?>"><?php echo $action->wait; ?></span>
			| <?php echo $action->msg; ?></span>
		<?php if ($action->cancel) : ?>
		<span class="right button"><a href="index.php?task=cancel&id=<?php echo $action->id; ?>" data-load="cache"><?php echo ILang::_('Cancel'); ?></a></span>
		<?php endif; ?>
		<span class="clr">&nbsp;</span>
	</div>
	<?php endforeach; ?>
</div>
<?php endif; ?>
<div class="clr"></div>