<?php
/**
 * Package      Templates
 * Subpackage   System
 * File         reports.php
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
<h1><?php echo ILang::_('Reports'); ?></h1>
<?php $this->renderMsgs(); ?>
<div class="block btn-group">
	<a href="./reports.php?f=publish" class="btn btn-<?php echo $this->getData('filter') == 'publish' ? 'default' : 'primary'; ?>" data-load="cache"><?php echo ILang::_('Published'); ?></a>
	<a href="./reports.php?f=arch" class="btn btn-<?php echo $this->getData('filter') == 'arch' ? 'default' : 'primary'; ?>" data-load="cache"><?php echo ILang::_('Archived'); ?></a>
	<a href="./reports.php?f=all" class="btn btn-<?php echo $this->getData('filter') == 'all' ? 'default' : 'primary'; ?>" data-load="cache"><?php echo ILang::_('All'); ?></a>
</div>

<div>
	<form action="reports.php" method="POST">
		<?php if ($msgs = $this->getData('list')) : ?>
		<div class="notices f_checkbox">
			<?php foreach($msgs as $msg) : ?>
			<div class="item">
				<span class="msg-title">
					<a href="report.php?id=<?php echo $msg->id; ?>" data-load="cache"><?php echo $msg->archived == 0 ? ILang::_('UnarchReport') : $msg->title; ?></a>
					<div class="right button">
						<?php if ($msg->archived == 1) : ?>
							<?php if ($msg->published == 1) : ?>
						<a href="reports.php?task=unpublish&id=<?php echo $msg->id; ?>" class="glyphicon glyphicon-lock text-success" data-toggle="publish" data-type="unpublish" title="<?php echo ILang::_('Unpublish'); ?>"> </a>
							<?php else : ?>
						<a href="reports.php?task=publish&id=<?php echo $msg->id; ?>" class="glyphicon glyphicon-lock text-warning action-publish" data-toggle="publish" data-type="publish"  title="<?php echo ILang::_('Publish'); ?>"> </a>
							<?php endif; ?>
						<a href="reports.php?task=unarch&id=<?php echo $msg->id; ?>" class="glyphicon glyphicon-floppy-remove text-danger" title="<?php echo ILang::_('Unarchive'); ?>" data-load="cache"> </a>
						<?php else : ?>
						<a href="reports.php?task=arch&id=<?php echo $msg->id; ?>" class="glyphicon glyphicon-floppy-disk text-success" title="<?php echo ILang::_('Archive'); ?>" data-load="cache"> </a>
						<?php endif; ?>
						<a data-target="#myModal" role="button" data-toggle="modal" href="report.php?id=<?php echo $msg->id; ?>&format=modal" class="glyphicon glyphicon-eye-open" title="<?php echo ILang::_('View'); ?>"> </a>
					</div>
					<div class="date"><?php echo date('d M y - H:i:s', $msg->date); ?></div>
				</span>
			</div>
			<?php endforeach; ?>
			<div class="clr"></div>
		</div><br />
		<?php if ($this->user->premium == 1) : ?>
		<div class="center button">
			<?php if ($this->page != 1) : ?>
			<a href="reports.php?page=1" data-load="cache"><<</a> <a href="reports.php?page=<?php echo ($this->page - 1); ?>" data-load="cache"><</a>
			<?php endif; ?>
			<?php if ($this->page == 1) : ?>
				1
				<?php if ($this->getData('pageMax') > 1) : ?>
				<a href="reports.php?page=2" data-load="cache">2</a>
				<?php endif; ?>
				<?php if ($this->getData('pageMax') > 2) : ?>
				<a href="reports.php?page=3" data-load="cache">3</a>
				<?php endif; ?>
			<?php elseif ($this->page != $this->getData('pageMax')) : ?>
			<a href="reports.php?page=<?php echo ($this->page - 1); ?>" data-load="cache"><?php echo ($this->getData('page') - 1); ?></a> <?php echo $this->page; ?> <a href="reports.php?page=<?php echo ($this->page + 1); ?>" data-load="cache"><?php echo ($this->page + 1); ?></a>
			<?php else : ?>
				<a href="reports.php?page=<?php echo ($this->getData('pageMax') - 2); ?>" data-load="cache">
				<?php if ($this->getData('pageMax') > 2) : ?>
					<?php echo ($this->getData('pageMax') - 2); ?></a>
				<?php endif; ?>
				<a href="reports.php?page=<?php echo ($this->getData('pageMax') - 1); ?>" data-load="cache"><?php echo ($this->getData('pageMax') - 1); ?></a> <?php echo $this->getData('pageMax'); ?>
			<?php endif; ?>
			<?php if ($this->page != $this->getData('pageMax')) : ?>
			<a href="reports.php?page=<?php echo ($this->page + 1); ?>" data-load="cache">></a> <a href="reports.php?page=<?php echo $this->getData('pageMax'); ?>" data-load="cache">>></a>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<?php else : ?>
		<?php echo ILang::_('NoReport'); ?>
		<?php endif; ?>
	</form>
	<div class="clr"></div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>