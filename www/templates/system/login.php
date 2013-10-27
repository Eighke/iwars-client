<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			login.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-10-19 - Eighke
 */
?>
<h1><?php echo ILang::_('Connection'); ?></h1>
<?php $this->renderMsgs(); ?>
<form id="loginForm" name="loginForm" method="post" action="login.php" role="form">
	<div id="step-lang" class="step">
		<div class="col-xs-12 col-sm-6">
			<div class="form-group">
				<div class="input-group">
					<label for="field-login" class="input-group-addon"><span class="glyphicon glyphicon-user"></span></label>
					<input type="text" name="MLogin" id="field-login" class="form-control" placeholder="<?php echo ILang::_('Login'); ?>" required />
					<span class="tip input-group-addon" data-toggle="tooltip" content="<?php echo ILang::_('tipLogin'); ?>">
						<i class="glyphicon glyphicon-question-sign"></i>
					</span>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<label for="field-pwd" class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></label>
					<input type="password" name="MPassword" id="field-pwd" class="form-control" placeholder="<?php echo ILang::_('Password'); ?>" required minlength="4" />
					<span class="tip input-group-addon" data-toggle="tooltip" content="<?php echo ILang::_('tipPassword'); ?>">
						<i class="glyphicon glyphicon-question-sign"></i>
					</span>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-4 pull-right">
			<ul class="list-unstyled">
				<li>Password lost ?</li>
				<li>Login lost ?</li>
				<li class="divider"></li>
				<li><a href="inscription.php">No account yet?</a></li>
			</ul>
		</div>
	</div>
	<div id="navigation">
		<hr />
		<input class="navigation_button" id="next" value="<?php echo ILang::_('Submit'); ?>" type="submit" />
	</div>
</form>
<div id="data"></div>

<script type="text/javascript">
	var submit	= <?php echo ILang::_('Submit'); ?>;
	var next	= <?php echo ILang::_('Submit'); ?>;
</script>