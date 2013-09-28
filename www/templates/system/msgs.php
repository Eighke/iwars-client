<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			msgs.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-02-20 - Eighke
 */
if (!session_id()) exit();
?>
<h1><?php echo ILang::_('Messaging'); ?></h1>
<?php $this->renderMsgs(); ?>
<div class="center">
	<div class="button">
		<a href="./m_msg.php"><?php echo ILang::_('WriteMsg'); ?></a>
		<a href="./m_folder.php"><?php echo ILang::_('CreateFolder'); ?></a> |
		<a href="./msgs.php?a=1"><?php echo ILang::_('Archives'); ?></a>
	</div><br />
	<?php echo ILang::_('Folder:'); ?>
	<?php if ($folders = $this->getData('folders')) : ?>
	<?php foreach($folders as $folder) : ?>
	[ <?php if($this->getData('filter') != $folder->id) : ?><a href="./msgs.php?f=<?php echo $folder->id; ?>"><?php echo $folder->name; ?></a><?php else : ?><?php echo $folder->name; ?><?php endif; ?> (<?php echo $folder->newMsg; ?>) ]
	<?php endforeach; ?>
	<?php else : ?>
	<?php echo ILang::_('NoFolder'); ?>
	<?php endif; ?>| [ <a href="./msgs.php?f=all"><?php echo ILang::_('Reception'); ?></a> ]
</div><br />

<h2><?php echo ILang::_('Messages'); ?></h2>
<form action="msgs.php" method="POST">
	<div id="msgDesc" class="div_content one_two">
		<?php if ($this->getData('msg')) : ?>
		<div id="msg">
			<div><?php echo ILang::_('From:'); ?> <span id="msg_name" style="font-weight: bold;"><?php echo empty($this->getData('msg')->usrName) ? 'AutoMessage' : qftext($this->getData('msg')->usrName); ?></span> le <span id="msg_date"><?php echo fdate($this->getData('msg')->date, 1); ?></span> - <span><a<?php if ($this->getData('msg')->usrName) : ?> href="m_msg.php?id=<?php echo $this->getData('msg')->usrId; ?>"<?php endif; ?>><?php echo ILang::_('Reply'); ?></a></span></div>
			<div><?php echo ILang::_('Title:'); ?> <span id="msg_title" style="font-weight: bold;"><?php echo qftext($this->getData('msg')->title); ?></span></div><br />
			<div id="msg_text"><?php echo ftext($this->getData('msg')->text); ?></div><br />
			<div class="center">
				<input type="hidden" value="<?php echo $this->getData('msg')->id; ?>" name="id" />
				<input type="submit" value="<?php echo ILang::_('Archive'); ?>" name="arch" />
				<input type="submit" value="<?php echo ILang::_('Delete'); ?>" name="del" />
			</div>
		</div>
		<?php else : ?>
		<div id="nomsg" class="center"><?php echo ILang::_('NoMsgSelect'); ?></div>
		<?php endif; ?>
	</div>
	<div id="msgList" class="left_aside one_two">
		<div>
			<?php if ($msgs = $this->getData('msgs')) : ?>
			<div class="f_checkbox">
				<div>
					<label class="reverse"><input type="checkbox" class="checkbox" onClick="FancyForm.reverse()" /><?php echo ILang::_('InvertSelect'); ?></label>
				</div>
				<?php foreach($msgs as $msg) : ?>
				<div>
					<label><input type="checkbox" name="msg[<?php echo $msg->id; ?>]" /></label>
					<span><?php if ($msg->archived == 'Y') : ?> [A] <?php endif; ?><a onClick="IWMsg.view(<?php echo $msg->id; ?>);" class="read_<?php echo $msg->read; ?>" href="?info=<?php echo $msg->id; ?>"><?php echo ftext($msg->title); ?></a></span>
				</div>
				<?php endforeach; ?>
				<div class="clr"></div>
			</div><br />
			<div>
				<select name="action">
					<option value="delete"><?php echo ILang::_('Delete'); ?></option>
					<?php if ($folders) : ?>
					<?php foreach($folders as $folder) : ?>
					<option value="move[<?php echo $folder->id; ?>]"><?php echo ILang::_('MoveTo:'); ?> <?php echo $folder->name; ?></option>
					<?php endforeach; ?>
					<?php endif; ?>
				</select> |
				<input type="submit" value="<?php echo ILang::_('Send'); ?>" />
			</div><br />
			<?php if ($this->user->premium == 1) : ?>
			<div class="center">
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
			<?php echo ILang::_('NoMsg'); ?>
			<?php endif; ?>
		</div>
	</div>
	<div class="clr"></div>
</form>

<script type="text/javascript" src="<?php echo PATH_SCRIPTS; ?>js/moocheck.js"></script>
<script type="text/javascript" src="<?php echo PATH_SCRIPTS; ?>js/msg.js"></script>