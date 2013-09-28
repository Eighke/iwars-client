<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			reports.php
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
<h1><?php echo ILang::_('Reports'); ?></h1>
<?php $this->renderMsgs(); ?>
<div class="center button">
	<a href="./reports.php?f=arch"><?php echo ILang::_('Archived'); ?></a> <a href="./reports.php?f=all"><?php echo ILang::_('All'); ?></a>
</div><br />
<div>
	<form action="reports.php" method="POST">
		<?php if ($msgs = $this->getData('msgs')) : ?>
		<div class="notices f_checkbox">
			<div>

			</div>
			<?php foreach($msgs as $msg) : ?>
			<div>
				<span class="msg-title">
					<a href="reports.php?id=<?php echo $msg->id; ?>"><?php echo $msg->archived == 0 ? ILang::_('UnarchReport') : $msg->title; ?></a>
					<div class="right button">
						<?php if ($msg->archived == 1) : ?>
						<a href="reports.php?task=unarch&id=<?php echo $msg->id; ?>"><?php echo ILang::_('Unarchive'); ?></a>
						<?php else : ?>
						<a href="reports.php?task=arch&id=<?php echo $msg->id; ?>"><?php echo ILang::_('Archive'); ?></a>
						<?php endif; ?>
						<a href="report.php?id=<?php echo $msg->id; ?>"><?php echo ILang::_('View'); ?></a>
					</div>
					<div class="date"><?php echo date('H:i:s - d M y', $msg->date); ?></div>
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
		<div class="center button">
			<?php if ($this->getData('page') != 1) : ?>
			<a href="?page=1"><<</a> <a href="?page=<?php echo ($this->getData('page') - 1); ?>"><</a>
			<?php endif; ?>
			<?php if ($this->getData('page') == 1) : ?>
				1
				<?php if ($this->getData('pageMax') > 1) : ?>
				<a href="?page=2">2</a>
				<?php endif; ?>
				<?php if ($this->getData('pageMax') > 2) : ?>
				<a href="?page=3">3</a>
				<?php endif; ?>
			<?php elseif ($this->getData('page') != $this->getData('pageMax')) : ?>
			<a href="?page=<?php echo ($this->getData('page') - 1); ?>"><?php echo ($this->getData('page') - 1); ?></a> <?php echo $this->getData('page'); ?> <a href="?page=<?php echo ($this->getData('page') + 1); ?>"><?php echo ($this->getData('page') + 1); ?></a>
			<?php else : ?>
				<a href="?page=<?php echo ($this->getData('pageMax') - 2); ?>">
				<?php if ($this->getData('pageMax') > 2) : ?>
					<?php echo ($this->getData('pageMax') - 2); ?></a>
				<?php endif; ?>
				<a href="?page=<?php echo ($this->getData('pageMax') - 1); ?>"><?php echo ($this->getData('pageMax') - 1); ?></a> <?php echo $this->getData('pageMax'); ?>
			<?php endif; ?>
			<?php if ($this->getData('page') != $this->getData('pageMax')) : ?>
			<a href="?page=<?php echo ($this->getData('page') + 1); ?>">></a> <a href="?page=<?php echo $this->getData('pageMax'); ?>">>></a>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<?php else : ?>
		<?php echo ILang::_('NoReport'); ?>
		<?php endif; ?>
	</form>
	<div class="clr"></div>
</div>