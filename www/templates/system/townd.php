<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			townd.php
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
						<h1><?php echo ILang::_('Confirmation'); ?></h1>
						<?php $this->renderMsgs(); ?>
						<form action="./townd.php" method="POST">
							<div class="content">
								<?php echo ILang::_('AreYouSure?'); ?><br /><?php echo ILang::_('WeNeedPassword'); ?>
							</div>
							<div class="fields">
								<div class="label">
									<label for="field-crtPwd"><?php echo ILang::_('crtPasword'); ?></label>
								</div>
								<div class="field">
									<input type="password" name="crtPwd" id="field-crtPwd" class="required" />
								</div>
							</div>
							<div id="navigation">
								<hr />
								<input class="navigation_button" id="next" value="<?php echo ILang::_('Submit'); ?>" name="delTwn" type="submit" />
							</div>
							
						</form>
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