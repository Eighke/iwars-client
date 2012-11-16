<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			login.php
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
					<div class="main">
						<h1><?php echo ILang::_('Connection'); ?></h1>
						<?php $this->renderMsgs(); ?>
						<form id="loginForm" name="loginForm" method="post" action="login.php">
							<div id="step-lang" class="step">
								<div class="fields">
									<div class="label">
										<label for="field-login"><?php echo ILang::_('Login'); ?></label>
									</div>
									<div class="field">
										<input type="text" name="login" id="field-login" class="required" />
									</div>
								</div>
								<div class="fields">
									<div class="label">
										<label for="field-pwd"><?php echo ILang::_('Password'); ?></label>
									</div>
									<div class="field">
										<input type="password" name="pwd" id="field-pwd" class="required" />
									</div>
								</div>
							</div>
							<div id="navigation">
								<hr />
								<input class="navigation_button" id="next" value="<?php echo ILang::_('Submit'); ?>" type="submit" />
							</div>
						</form>
						<div id="data"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Middle -->
	    <script type="text/javascript">
	
			$(function(){
				$("#loginForm").formwizard({
					textSubmit: '<?php echo ILang::_('Submit'); ?>',
					textNext: '<?php echo ILang::_('Submit'); ?>',
				 	historyEnabled : true,
				 	validationEnabled: true,
				 	focusFirstInput : true,
				 }
				);
	  		});
		</script>
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