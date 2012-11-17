<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			index.php
 *
 * Licence		GNU General Public License version 3; see http://www.gnu.org/licenses/lgpl-3.0.en.html
 * Copyright	Copyright (C) 2005 - 2012 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric Vandebeuque (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2012-11-18 - Eighke
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
					<!-- Main -->
					<div class="main">
						<h1><?php echo ILang::_('CommandCenter'); ?></h1>
						<?php $this->renderMsgs(); ?>
						<div class="content">
							<?php echo ILang::_('MoveNumber:'); ?> <?php echo $this->getData('control')->total; ?><br />
							<?php echo ILang::_('Attack'); ?>: <?php echo $this->getData('control')->attack; ?>, <?php echo ILang::_('Base'); ?>: <?php echo $this->getData('control')->base; ?>, <?php echo ILang::_('Back'); ?>: <?php echo $this->getData('control')->back; ?><br />
						</div>
						<h2><?php echo ILang::_('YourFleets'); ?></h2>
						<?php if($actions = $this->getData('self')) : ?>
						<div class="moves">
							<?php foreach($actions as $action) : ?>
							<div class="<?php echo $action->class; ?>">
								<span class="left"><?php echo $action->wait; ?> | <?php echo $action->msg[0]; ?> <?php echo $action->X1; ?>:<?php echo $action->Y1; ?>:<?php echo $action->Z1; ?> <?php echo $action->msg[1]; ?> <?php echo $action->X2; ?>:<?php echo $action->Y2; ?>:<?php echo $action->Z2; ?> <?php echo ILang::_('WithOrder'); ?> <?php echo $action->type; ?></span> <?php if ($action->cancel) : ?><span class="right">[ <a href="?cancel=<?php echo $action->id; ?>"><?php echo ILang::_('Cancel'); ?></a> ]</span> <?php endif; ?>
								<span class=spacer>&nbsp;</span>
							</div>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>
						<h2><?php echo ILang::_('OtherFleets'); ?></h2>
						<?php if($actions = $this->getData('other')) : ?>
						<div class="moves">
							<?php foreach($actions as $action) : ?>
							<div class="<?php echo $action->class; ?>">
								<?php echo $action->wait; ?> | <?php echo $action->msg[0]; ?> <?php echo $action->X1; ?>:<?php echo $action->Y1; ?>:<?php echo $action->Z1; ?> <?php echo $action->msg[1]; ?> <?php echo $action->X2; ?>:<?php echo $action->Y2; ?>:<?php echo $action->Z2; ?> <?php echo ILang::_('WithOrder'); ?> <?php echo $action->type; ?> <?php if ($action->cancel) : ?><span class="right">[ <a href="?cancel=<?php echo $action->id; ?>"><?php echo ILang::_('Cancel'); ?></a> ]</span> <?php endif; ?>
							</div>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>
						<div class="clr"></div>
					</div>
					<!-- /Main -->
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