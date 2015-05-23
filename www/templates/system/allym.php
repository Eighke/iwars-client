<?php
/**
 * Package      Templates
 * Subpackage   System
 * File         allym.php
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
				<td><a href="./player.php?id=<?php echo $request->usrId; ?>" data-load="cache"><?php echo $request->usrName; ?></a></td>
				<td><?php echo $request->allyGroup; ?></td>
				<td><?php echo ILang::number($request->totalPoints); ?></td>
				<td class="text-right">
					<?php if ($this->user->getACL('requests.manage')) : ?><a href="allym.php?accept=<?php echo $request->usrId; ?>" class="btn btn-sm btn-success glyphicon glyphicon-ok" title="<?php echo ILang::_('Accept'); ?>" data-load="cache"></a>
					<a href="allym.php?reject=<?php echo $request->usrId; ?>" class="btn btn-sm btn-danger glyphicon glyphicon-remove" title="<?php echo ILang::_('Reject'); ?>" data-load="cache"></a><?php else : ?>&nbsp;<?php endif; ?></td>
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
					<th><a href="allym.php?by=name" data-load="cache"><?php echo ILang::_('Name'); ?></a></th>
					<th><a href="allym.php?by=rank" data-load="cache"><?php echo ILang::_('Rank'); ?></a></th>
					<th><a href="allym.php?by=dev" data-load="cache"><?php echo ILang::_('Development'); ?></a></th>
					<th><a href="allym.php?by=fight" data-load="cache"><?php echo ILang::_('Fight'); ?></a></th>
					<th></th>
				</tr>
			</thead>
			<?php if ($members = $this->getData('members')) : ?>
			<tbody>
				<?php foreach($members as $member) : ?>
				<tr<?php if ($this->user->getACL('view.onlinecolor')) : ?> class="<?php echo $member->class; ?>"<?php endif; ?><?php if ($this->user->getACL('view.onlinetime')) : ?> data-toggle="tooltip" content="Last Online::<?php echo date('d M y - H:i:s', $member->last_online); ?>"<?php endif; ?>>
					<td><a href="./player.php?id=<?php echo $member->id; ?>" data-load="cache"><?php echo $member->name; ?></a></td>
					<td><?php echo $member->groupName; ?></td>
					<td><?php echo ILang::number($member->devPoints); ?></td>
					<td><?php echo ILang::number($member->unitPoints); ?></td>
					<td class="text-right">
						<?php if ($this->user->getACL('member.promote')) : ?><a href="allym.php?promote=<?php echo $member->id; ?>" class="btn btn-sm btn-default glyphicon glyphicon-chevron-up" title="<?php echo ILang::_('Promote'); ?>" data-load="cache"></a>
						<a href="allym.php?demote=<?php echo $member->id; ?>" class="btn btn-sm btn-default glyphicon glyphicon-chevron-down" title="<?php echo ILang::_('Demote'); ?>" data-load="cache"></a><?php endif; ?>
						<?php if ($this->user->getACL('member.eject') && $member->id != $this->user->id) : ?><a href="allym.php?eject=<?php echo $member->id; ?>" class="btn btn-sm btn-danger glyphicon glyphicon-minus" title="<?php echo ILang::_('Eject'); ?>" data-load="cache"></a><?php endif; ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			<?php endif; ?>
		</table>
	</div>
</div>