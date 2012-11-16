<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			inscription.php
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
					<!-- Main -->
					<div class="main">
						<h1><?php echo ILang::_('Inscription'); ?></h1>
						<?php $this->renderMsgs(); ?>
						<form id="inscriptionForm" method="post" action="inscription.php" class="bbq">
							<div id="step-lang" class="step">
								<h2><?php echo ILang::_('Step1'); ?></h2>
								<div class="content">
									<?php echo ILang::_('ChooseLanguage'); ?>
								</div>
								<div class="fields">
									<div class="label">
										<label for="field-lang"><?php echo ILang::_('Language'); ?></label>
										<div><?php echo ILang::_('InfoLanguage'); ?></div>
									</div>
									<div class="field">
										<select id="field-lang" name="lang" class="required">
											<option value="English"<?php echo ( $this->user->lang == "English" ? ' selected="selected"' : '' );?>>English</option>
											<option value="French"<?php echo ( $this->user->lang == "French" ? ' selected="selected"' : '' );?>>Français</option>
											<option value="Italian"<?php echo ( $this->user->lang == "Italian" ? ' selected="selected"' : '' );?>>Italiano</option>
											<option value="Polish"<?php echo ( $this->user->lang == "Polish" ? ' selected="selected"' : '' );?>>Polska</option>
										</select>
									</div>
								</div>
							</div>
							<div id="step-login" class="step">
								<h2><?php echo ILang::_('Step2'); ?></h2>
								<div class="content">
									<?php echo ILang::_('InfoLogin'); ?>
								</div>
								<div class="fields">
									<div class="label">
										<label for="field-login"><?php echo ILang::_('Login'); ?></label>
									</div>
									<div class="field">
										<input type="text" id="field-login" name="login" class="required" />
									</div>
								</div>
								<div class="fields">
									<div class="label">
										<label for="field-pseudo"><?php echo ILang::_('Nickname'); ?></label>
										<div><?php echo ILang::_('InfoNickname'); ?></div>
									</div>
									<div class="field">
										<input type="text" id="field-pseudo" name="pseudo" class="required" />
									</div>
								</div>
								<div class="fields">
									<div class="label">
										<label for="field-pwd"><?php echo ILang::_('Password'); ?></label>
										<div><?php echo ILang::_('InfoPassword'); ?></div>
									</div>
									<div class="field">
										<input type="password" id="field-pwd" name="pwd" class="required" />
									</div>
								</div>
								<div class="fields">
									<div class="label">
										<label for="field-pwd2"><?php echo ILang::_('Confirmation'); ?></label>
										<div><?php echo ILang::_('InfoConfirm'); ?></div>
									</div>
									<div class="field">
										<input type="password" id="field-pwd2" name="pwd2" class="required" />
									</div>
								</div>
							</div>
							<div id="step-email" class="step">
								<h2><?php echo ILang::_('Step3'); ?> (<?php echo ILang::_('Optional'); ?>)</h2>
								<div class="content">
									<span class="italic bold"><?php echo ILang::_('Optional'); ?></span> - <?php echo ILang::_('RecordEmail'); ?>
								</div>
								<div class="fields">
									<div class="label">
										<label for="field-email"><?php echo ILang::_('Email'); ?></label>
										<div><?php echo ILang::_('InfoEmail'); ?></div>
									</div>
									<div class="field">
										<input type="text" id="field-email" name="email" value="<?php echo $this->user->email; ?>" class="email" />
									</div>
								</div>
								<div class="clr">
									<hr  />
								</div>
								<div class="content">
									<p class="bold center warning">	<?php echo ILang::_('EmailWarning'); ?></p>
									<?php echo ILang::_('EmailWarningExtra'); ?>
								</div>
							</div>
							<div id="step-graphs" class="step">
								<h2><?php echo ILang::_('Step4'); ?></h2>
								<div class="content">
									<?php echo ILang::_('ChooseGraphs'); ?>
								</div>
								<div class="fields">
									<div class="label">
										<label for="field-skin"><?php echo ILang::_('Skin'); ?></label>
										<div><?php echo ILang::_('InfoTheme'); ?></div>
									</div>
									<div class="field">
										<select id="field-skin" name="skin" class="required">
											<optgroup label="Official">
												<option value="googled"<?php echo ( $this->user->skin == "googled" ? ' selected="selected"' : '' ); ?>>Googled</option>
												<option value="iwarsv2"<?php echo ( $this->user->skin == "iwarsv2" ? ' selected="selected"' : '' ); ?>>Classique (INC)</option>
												<option value="space4k"<?php echo ( $this->user->skin == "space4k" ? ' selected="selected"' : '' ); ?>>Space4K</option>
											</optgroup>
											<optgroup label="Old">
												<option value="iwars"<?php echo ( $this->user->skin == "iwars" ? ' selected="selected"' : '' ); ?>>Classique (v1)</option>
												<option value="light"<?php echo ( $this->user->skin == "light" ? ' selected="selected"' : '' ); ?>>Light</option>
											</optgroup>
										</select>
									</div>
								</div>
								<div class="fields">
									<div class="label">
										<label for="field-tmpl"><?php echo ILang::_('Template'); ?></label>
										<div><?php echo ILang::_('InfoInterface'); ?></div>
									</div>
									<div class="field">
										<select id="field-tmpl" name="tmpl" class="required">
											<option value="light"<?php echo ( $this->user->tmpl == "light" ? ' selected="selected"' : '' ); ?>>Simple</option>
											<option value="iwars"<?php echo ( $this->user->tmpl == "iwars" ? ' selected="selected"' : '' ); ?>">Normale</option>
											<option value="space4k"<?php echo ( $this->user->tmpl == "space4k" ? ' selected="selected"' : '' ); ?>>Space4K</option>
										</select>
									</div>
								</div>
								<hr class="clr" />
								<div>
									<div id="screen-googled">ScreenShoot Googled</div>
									<div id="screen-iwars">ScreenShoot Classique</div>
									<div id="screen-space4k">ScreenShoot Space4k</div>
								</div>
							</div>
							<div id="navigation">
								<hr />
								<input class="navigation_button" id="back" value="<?php echo ILang::_('Back'); ?>" type="reset" />
								<input class="navigation_button" id="next" value="<?php echo ILang::_('Next'); ?>" type="submit" />
							</div>
						</form>
						<div id="data"></div>
					</div>
					<!-- /Main -->
				</div>
			</div>
		</div>
		<!-- /Middle -->
	    <script type="text/javascript">
	
			$.validator.addMethod("nickname", function(name, element) {
				return this.optional(element) || !name.match(/[^A-Z0-9'_.\-áàâäéèêëíìîïóòôúùûü]/i);
			}, "Please specify a valid username");
	
			$.validator.addMethod('remoteNickname', function(name, element) {
	
					var result = $.ajax({
							async: false,
							type: 'POST',
							url: "scripts/inscription/valid.php",
							data: { type: "nickname", value: name },
							success: function(data) {
								var temp = '';
								result = data.result;
								length = result.length;
								for(i=0; i<length; i++) {
									temp += String.fromCharCode(result[i].charCodeAt(0)-i*2+<?php echo crypt_key; ?>);
								}
								
								datareturn = temp[i-1];
							},
							dataType: 'json'
						});
	
					if (datareturn == 1)
						return true;
					else
						return false;
	
			} , "This nickname has already been registered");
	
			$.validator.addMethod('remoteLogin', function(name, element) {
	
				var result = $.ajax({
					async: false,
					type: 'POST',
					url: "scripts/inscription/valid.php",
					data: { type: "login", value: name },
					success: function(data) {
						var temp = '';
						result = data.result;
						length = result.length;
						for(i=0; i<length; i++) {
							temp += String.fromCharCode(result[i].charCodeAt(0)-i*2+<?php echo crypt_key; ?>);
						}
						
						datareturn = temp[i-1];
					},
					dataType: 'json'
				});
	
			if (datareturn == 1)
				return true;
			else
				return false;
	
			} , "This login has already been registered");
	
			function hideOrToggle(id) {
				$("#screen-googled,#screen-iwars,#screen-space4k").hide();
				if(id !== undefined && id !== ""){
					$("#screen-" + id).fadeIn(1000);
				} else {
					$("#screen-iwars").fadeIn(1000);
				}
			}
	
			$("#field-skin").change(function(){
				hideOrToggle($(this).val());
			})
	
			$(function(){
				hideOrToggle();
			
				$("#inscriptionForm").formwizard({
					textSubmit: '<?php echo ILang::_('Submit'); ?>',
					textNext: '<?php echo ILang::_('Next'); ?>',
					textBack: '<?php echo ILang::_('Back'); ?>',

				 	historyEnabled : true,
				 	validationEnabled: true,
				 	focusFirstInput : true,

				 	validationOptions :{
				 		rules: {
				 			login: {
								required: true,
								remoteLogin: true
							},
				 			pseudo: {
								required: true,
								nickname: true,
								remoteNickname: true
							},
							pwd: {
								required: true,
								minlength: 4
							},
							pwd2: {
								required: true,
								minlength: 4,
								equalTo: "#field-pwd"
							}
						},
						messages: {
							pseudo: {
								required: "Please provide a nickname",
								nickname: "Must only contain alphanumeric and .-_ characters",
							},
							pwd: {
								required: "Please provide a password",
								minlength: "Your password must be at least 4 characters long"
							},
							pwd2: {
								required: "Please confirm the password",
								minlength: "Your password must be at least 4 characters long",
								equalTo: "Please enter the same password as above"
							}
						}
				 	}
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