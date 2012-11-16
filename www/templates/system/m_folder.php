<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			m_folder.php
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
						<h1><?php echo ILang::_('NewFolder'); ?></h1>
						<?php $this->renderMsgs(); ?>
						<div class="center">
							<?php if (!$step1) : ?>
							<form action="m_folder.php" method="POST">
							<div class="center"><?php echo ILang::_('EnterName:'); ?> <input type="text" name="name" /> |
								<input type="submit" value="<?php echo ILang::_('Create'); ?>" name="step1" />
							</div>
							</form>
							<?php else : ?>
							<?php echo ILang::_('FolderCreated'); ?> ~ [ <a href="./msg.php"><?php echo ILang::_('Back'); ?></a> ]
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