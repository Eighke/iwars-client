<?php
/**
 * Package      Templates
 * Subpackage   System
 * File         msg.php
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
	<div class="button">
		<a href="./m_msg.php" data-load="cache"><?php echo ILang::_('WriteMsg'); ?></a>
		<a href="./m_folder.php" data-load="cache" data-type="stored"><?php echo ILang::_('CreateFolder'); ?></a> |
		<a href="./msgs.php?a=1" data-load="cache"><?php echo ILang::_('Archives'); ?></a>
	</div><br />
	<?php echo ILang::_('Folder:'); ?>
	<div class="button">
	<?php if ($folders = $this->getData('folders')) : ?>
	<?php foreach($folders as $folder) : ?>
	<?php if($this->getData('filter') != $folder->id) : ?><a href="./msgs.php?f=<?php echo $folder->id; ?>" data-load="cache"><?php echo $folder->name; ?></a><?php else : ?><?php echo $folder->name; ?><?php endif; ?> (<?php echo $folder->newMsg; ?>)
	<?php endforeach; ?>
	<?php else : ?>
	<?php echo ILang::_('NoFolder'); ?>
	<?php endif; ?>| <a href="./msgs.php?f=all" data-load="cache"><?php echo ILang::_('Reception'); ?></a>
	</div>
</div><br />

<h2><?php echo ILang::_('Messages'); ?></h2>
<form action="msg.php" method="POST">
	<div id="msgDesc" class="div_content">
		<?php if ($this->getData('msg')) : ?>
		<div id="msg">
			<div><?php echo ILang::_('From:'); ?> <span id="msg_name" style="font-weight: bold;"><?php echo empty($this->getData('msg')->usrName) ? 'AutoMessage' : qftext($this->getData('msg')->usrName); ?></span> le <span id="msg_date"><?php echo fdate($this->getData('msg')->date, 1); ?></span> - <span><a<?php if ($this->getData('msg')->usrName) : ?> href="m_msg.php?id=<?php echo $this->getData('msg')->usrId; ?>"<?php endif; ?> data-load="cache"><?php echo ILang::_('Reply'); ?></a></span></div>
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
	<div class="clr"></div>
</form>