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
 * Version		2013-10-27 - Eighke
 */
if (!session_id()) exit();
?>
<h1><?php echo ILang::_('Ally'); ?></h1>
<?php $this->renderMsgs(); ?>
<?php if ($requests = $this->getData('requests')) : ?>
<h2><?php echo ILang::_('Request'); ?></h2>
<div class="block">
	<table class="table table-striped">
		<thead class="bg3">
			<tr>
				<th><?php echo ILang::_('Name'); ?></th>
				<th><?php echo ILang::_('Rank'); ?></th>
				<th><?php echo ILang::_('Points'); ?></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($requests as $request) : ?>
			<tr>
				<td><a href="./player.php?id=<?php echo $request->usrId; ?>"><?php echo $request->usrName; ?></a></td>
				<td><?php echo $request->allyGroup; ?></td>
				<td><?php echo $request->totalPoints; ?></td>
				<td class="text-right">
					<?php if ($this->user->getACL('requests')) : ?><a href="?accept=<?php echo $request->usrId; ?>" class="btn btn-sm btn-success glyphicon glyphicon-ok" title="<?php echo ILang::_('Accept'); ?>"></a>
					<a href="?reject=<?php echo $request->usrId; ?>" class="btn btn-sm btn-danger glyphicon glyphicon-remove" title="<?php echo ILang::_('Reject'); ?>"></a><?php else : ?>&nbsp;<?php endif; ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<?php endif; ?>
<h2><?php echo ILang::_('Members'); ?></h2>
<div>
	<div class="table-responsive">
		<table class="table">
			<thead class="bg3">
				<tr>
					<th><?php echo ILang::_('Name'); ?></th>
					<th><?php echo ILang::_('Rank'); ?></th>
					<th><?php echo ILang::_('Development'); ?></th>
					<th><?php echo ILang::_('Fight'); ?></th>
					<th></th>
				</tr>
			</thead>
			<?php if ($members = $this->getData('members')) : ?>
			<tbody>
				<?php foreach($members as $member) : ?>
				<tr class="<?php echo $member->class; ?>">
					<td><a href="./player.php?id=<?php echo $member->id; ?>"><?php echo $member->name; ?></a></td>
					<td><?php echo $member->groupName; ?></td>
					<td><?php echo $member->devPoints; ?></td>
					<td><?php echo $member->unitPoints; ?></td>
					<td class="text-right">
						<?php if ($this->user->getACL('promote')) : ?><a href="?promote=<?php echo $member->id; ?>" class="btn btn-sm btn-default glyphicon glyphicon-chevron-up" title="<?php echo ILang::_('Promote'); ?>"></a>
						<a href="?demote=<?php echo $member->id; ?>" class="btn btn-sm btn-default glyphicon glyphicon-chevron-down" title="<?php echo ILang::_('Demote'); ?>"></a><?php endif; ?>
						<?php if ($this->user->getACL('eject') && $member->id != $this->user->id) : ?><a href="?eject=<?php echo $member->id; ?>" class="btn btn-sm btn-danger glyphicon glyphicon-minus" title="<?php echo ILang::_('Eject'); ?>"></a><?php endif; ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			<?php endif; ?>
		</table>
	</div>
</div>