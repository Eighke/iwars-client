<?php
/**
 * Package      Templates
 * Subpackage   System
 * File         motices.php
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
<h1><?php echo ILang::_('Messaging'); ?></h1>
<?php $this->renderMsgs(); ?>
<div class="center">
	<?php foreach($this->getData('types') as $key => $type) : ?>
	<a href="./notices.php?f=<?php echo $key; ?>" class="btn btn-<?php echo $this->getData('filter') != $key ? 'primary' : 'default' ?>" data-load="cache"><?php echo ILang::_($type->name); ?> <i class="badge"><?php echo (int) $type->newMsg; ?></i></a>
	<?php endforeach; ?> <a href="./notices.php?f=all" class="btn btn-primary" data-load="cache"><?php echo ILang::_('All'); ?></a>
</div>
<hr />

<div>
	<h2><?php echo ILang::_('Messages'); ?></h2>
	<form action="notices.php" method="POST">
		<div class="block">
			<a href="./notices.php?act=allread"  class="btn btn-default" data-load="cache"><i class="glyphicon glyphicon-check"></i> <?php echo ILang::_('MarkAllRead'); ?></a>
			<div class="pull-right form-inline">
				<div class="form-group">
					<select name="action" class="form-control">
						<option value="delete"><?php echo ILang::_('Delete'); ?></option>
					</select>
				</div>
				<div class="form-group">
					<input type="submit" value="<?php echo ILang::_('Send'); ?>" class="form-control" />
				</div>
			</div>
		</div>
		<?php if ($msgs = $this->getData('msgs')) : ?>
		<div class="notices f_checkbox">
			<div>
				<label class="reverse">
					<input type="checkbox" id="reverse" />
					<strong><?php echo ILang::_('InvertSelect'); ?></strong>
				</label>
			</div>
			<?php foreach($msgs as $msg) : ?>
			<div class="notice">
				<label><input type="checkbox" name="msg[<?php echo $msg->id; ?>]" /></label>
				<span class="msg-title">
					<?php if ($msg->archived == 'Y') : ?> [A] <?php endif; ?><a class="<?php echo $msg->new == 'Y' ? 'read_N' : FALSE?>" href="notices.php?id=<?php echo $msg->id; ?>"><?php echo ftext($msg->title); ?></a>
					<div class="pull-right button"><a href="notices.php?task=delete&id=<?php echo $msg->id; ?>" title="<?php echo ILang::_('Delete'); ?>" class="glyphicon glyphicon-trash"> </a></div>
					<div class="date"><?php echo date('d M y - H:i:s', $msg->date); ?></div>
				</span>
				<?php if ($this->getData('msg')->id == $msg->id) : ?>
				<div class="msg-body">
					<?php echo ftext($this->getData('msg')->text); ?>
				</div>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
			<div class="clr"></div>
		</div><br />
		<?php if ($this->user->premium == 1) : ?>
		<div class="text-center">
			<ul class="pagination">
				<?php if ($this->getData('page') != 1) : ?>
				<li><a href="notices.php?page=1" data-load="cache">&laquo;&laquo;</a></li>
				<li><a href="notices.php?page=<?php echo ($this->getData('page') - 1); ?>" data-load="cache">&laquo;</a></li>
				<li><a href="notices.php?page=<?php echo ($this->getData('page') - 1); ?>" data-load="cache"><?php echo ($this->getData('page') - 1); ?></a></li>
				<?php endif; ?>
				<li class="active"><a><?php echo $this->getData('page'); ?></a></li>
				<?php if ($this->getData('page') != $this->getData('pageMax')) : ?>
				<li><a href="notices.php?page=<?php echo ($this->getData('page') + 1); ?>" data-load="cache"><?php echo ($this->getData('page') + 1); ?></a></li>
				<li><a href="notices.php?page=<?php echo ($this->getData('page') + 1); ?>" data-load="cache">&raquo;</a></li>
				<li><a href="notices.php?page=<?php echo $this->getData('pageMax'); ?>" data-load="cache">&raquo;&raquo;</a></li>
				<?php endif; ?>
			</ul>
		</div>
		<?php endif; ?>
		<?php else : ?>
		<?php echo ILang::_('NoMsg'); ?>
		<?php endif; ?>
	</form>
	<div class="clr"></div>
</div>