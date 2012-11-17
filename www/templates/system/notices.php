<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			notices.php
 *
 * Licence		GNU General Public License version 3; see http://www.gnu.org/licenses/lgpl-3.0.en.html
 * Copyright	Copyright (C) 2005 - 2012 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric Vandebeuque (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2012-11-17 - Eighke
 */
if (!session_id()) exit();
?>
<!--  Wrapper -->
<div id="wrapper">
	<?php $this->renderMenu(); ?>
	<!-- Main Block -->
	<div id="main">
		<!-- Top -->
		<div class="top">
			<div class="left"></div>
			<div class="center"></div>
			<div class="right"></div>
		</div>
		<!-- /Top -->
		<!-- Middle -->
		<div class="middle">
			<div class="outer">
				<div class="inner">
					<!-- #Main -->
					<div class="main">
						<h1><?php echo ILang::_('Messaging'); ?></h1>
						<?php $this->renderMsgs(); ?>
						<div class="center">
							<?php echo ILang::_('Folder:'); ?>
							<?php foreach($this->getData('types') as $key => $type) : ?>
							[ <?php if($this->getData('filter') != $key) : ?><a href="./notices.php?f=<?php echo $key; ?>"><?php echo ILang::_($type->name); ?></a><?php else: ?><?php echo ILang::_($type->name); ?><?php endif; ?> (<?php echo (int) $type->newMsg; ?>) ]
							<?php endforeach; ?> | [ <a href="./notices.php?f=all"><?php echo ILang::_('All'); ?></a> ]<br />
							Action : [ <a href="./notices.php?act=allread"><?php echo ILang::_('MarkAllRead'); ?></a> ]
						</div><br />
						<h2><?php echo ILang::_('Messages'); ?></h2>
						<div>
							<?php if($data) : ?>
							<form action="notices.php" method="POST">
								<?php if ($msgs = $this->getData('msgs')) : ?>
								<div class="notices f_checkbox">
									<div>
										<label class="reverse">
											<input type="checkbox" onClick="FancyForm.reverse()" />
											<?php echo ILang::_('InvertSelect'); ?>
										</label>
									</div>
									<?php foreach($msgs as $msg) : ?>
									<div>
										<label><input type="checkbox" name="msg[<?php echo $msg->id; ?>]" /></label>
										<span class="msg-title"><?php if ($msg->archived == 'Y') : ?> [A] <?php endif; ?><a onClick="IWMsg.view(<?php echo $msg->id; ?>);" class="<?php echo $msg->new == 'Y' ? 'read_N' : FALSE?>" href="?id=<?php echo $msg->id.$this->getData('query'); ?>"><?php echo ftext($msg->title); ?></a><div class="date"><?php echo date('Y-m-d H:i:s', $msg->date); ?></div></span>
										<?php if ($this->getData('msg')->id == $msg->msg_id) : ?>
										<div class="msg-body">
											<?php echo ftext$this->getData('msg')->text); ?>
										</div>
										<?php endif; ?>
									</div>
									<?php endforeach; ?>
									<div class="clr"></div>
								</div><br />
								<div>
									<select name="action">
										<option value="delete"><?php echo ILang::_('Delete'); ?></option>
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
							</form>
							<div class="clr"></div>
							<?php endif; ?>
						</div>
					</div>
					<!-- /#Main -->
				</div>
			</div>
		</div>
		<!-- /Middle -->
		<!-- Bottom -->
		<div class="bottom">
			<div class="left"></div>
			<div class="center"></div>
			<div class="right"></div>
		</div>
		<!-- /Bottom -->
	</div>
	<!-- /Main Block -->
</div>
<!--  /Wrapper -->