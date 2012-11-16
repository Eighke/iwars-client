<?php
/**
 * Package		Templates
 * Subpackage	System
 * File		mally.php
 *
 * Licence		GNU General Public License version 3; see http://www.gnu.org/licenses/lgpl-3.0.en.html
 * Copyright	Copyright (C) 2005 - 2012 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric Vandebeuque (fred.vdb@newebtime.com)
 * 			Eighke (eighke@multi-site.net)
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
						<h1><?php echo ILang::_('AllianceCreation'); ?></h1>
						<?php $this->renderMsgs(); ?>
						<div class="contenant">
							<?php if (!$this->getData('nodpl')) : ?>
							<p><?php echo ILang::_('WarnLeaveAlly'); ?></p>
							<?php if (!$this->getData['submit'] && !$this->haveMsgs('error')) : ?>
							<form action="mally.php" method="post">
								<?php echo ILang::_('Name:'); ?> <input type="text" name="ally_name" /> (<?php echo ILang::_('MaxChar', 100); ?>) |
								<?php echo ILang::_('Tag:'); ?> <input type="text" name="ally_tag" size="5" /> (<?php echo ILang::_('MaxChar', 5); ?>)<br />
								<input type="submit" value="Go" name="mk_ally" />
							</form>
							<?php else : ?>
							<p><?php echo ILang::_('CreationDone'); ?></p>
							<?php endif; ?>
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