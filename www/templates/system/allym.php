<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			allym.php
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
<h1><?php echo ILang::_('Ally'); ?></h1>
<?php $this->renderMsgs(); ?>
<?php if ($requests = $this->getData('requests')) : ?>
<h2><?php echo ILang::_('Request'); ?></h2>
<div class="block">
	<div class="bg3">
		<span class="left" style="width:140px"><?php echo ILang::_('Name'); ?></span>
		<span class="left" style="width:110px"><?php echo ILang::_('Rank'); ?></span>
		<span style="width:110px"><?php echo ILang::_('Points'); ?></span>
	</div>
	<?php foreach($requests as $request) : ?>
	<div class="bg<?php echo $request->class; ?>">
		<span class="left" style="width:140px"><a href="./player.php?id=<?php echo $request->usrId; ?>"><?php echo $request->usrName; ?></a></span>
		<span class="left" style="width:110px"><?php echo $request->allyGroup; ?></span>
		<span class="left" style="width:110px"><?php echo $request->totalPoints; ?></span>
		<span><?php if ($this->user->getACL('requests')) : ?><a href="?accept=<?php echo $request->usrId; ?>"><?php echo ILang::_('Accept'); ?></a> | <a href="?reject=<?php echo $request->usrId; ?>"><?php echo ILang::_('Reject'); ?></a><?php else : ?>&nbsp;<?php endif; ?></span>
	</div>
	<?php endforeach; ?>
</div>
<?php endif; ?>
<h2><?php echo ILang::_('Members'); ?></h2>
<div>
	<div class="bg3">
		<span class="left" style="width:140px"><?php echo ILang::_('Name'); ?></span>
		<span class="left" style="width:110px"><?php echo ILang::_('Rank'); ?></span>
		<span class="left" style="width:110px"><?php echo ILang::_('Development'); ?></span>
		<span style="width:110px"><?php echo ILang::_('Fight'); ?></span>
	</div>
	<?php if ($members = $this->getData('members')) : ?>
	<?php foreach($members as $member) : ?>
	<div class="<?php echo $member->class; ?>">
		<span class="left" style="width:140px"><a href="./player.php?id=<?php echo $member->id; ?>"><?php echo $member->name; ?></a></span>
		<span class="left" style="width:110px"><?php echo $member->groupName; ?></span>
		<span class="left" style="width:110px"><?php echo $member->devPoints; ?></span>
		<span class="left" style="width:110px"><?php echo $member->unitPoints; ?></span>
		<span>
			<?php if ($this->user->getACL('promote')) : ?><a href="?promote=<?php echo $member->id; ?>" class="i-up"><span>Promote</span></a> <a href="?demote=<?php echo $member->id; ?>" class="i-down"><span>Demote</span></a> | <?php endif; ?>
			<?php if ($this->user->getACL('eject') && $member->id != $this->user->id) : ?><a href="?eject=<?php echo $member->id; ?>" class="i-cancel"><span><?php echo ILang::_('Eject'); ?></span></a><?php else : ?>&nbsp;<?php endif; ?>
		</span>
	</div>
	<?php endforeach; ?>
	<?php endif; ?>
</div>