<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			options.php
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
					<!-- #Main -->
					<div class="main">
						<h1><?php echo ILang::_('User'); ?></h1>
						<?php $this->renderMsgs(); ?>
						<form action="./options.php" method="POST">
							<div class="block">
								<div class="fields">
									<div class="label">
										<label for="field-pseudo"><?php echo ILang::_('Pseudo'); ?></label>
									</div>
									<div class="field">
										<input type="text" name="pseudo" id="field-pseudo" />
									</div>
								</div>
								<div class="fields">
									<div class="label">
										<label for="field-email"><?php echo ILang::_('Email'); ?></label>
									</div>
									<div class="field">
										<input type="text" name="email" id="field-email" />
									</div>
								</div>
								<div class="fields">
									<div class="label">
										<label for="field-newPwd"><?php echo ILang::_('NewPassword'); ?></label>
									</div>
									<div class="field">
										<input type="text" name="newPwd" id="field-newPwd" />
									</div>
								</div>
								<div class="fields">
									<div class="label">
										<label for="field-confPwd"><?php echo ILang::_('NewPasswordConf'); ?></label>
									</div>
									<div class="field">
										<input type="text" name="confPwd" id="field-confPwd" />
									</div>
								</div>
								<div class="fields">
									<div class="label">
										<label for="field-oldPwd"><?php echo ILang::_('crtPasword'); ?></label>
										<div><?php echo ILang::_('WeNeedPassword'); ?></div>
									</div>
									<div class="field">
										<input type="text" name="oldPwd" id="field-oldPwd" />
										<input type="submit" name="act_usr" value="<?php echo ILang::_('Save'); ?>" class="right" />
									</div>
								</div>
								<hr class="clr" />
								<hr />
							</div>
							<h2><?php echo ILang::_('General'); ?></h2>
							<div class="block">
								<div class="fields">
									<div class="label">
										<label for="field-lang"><?php echo ILang::_('Language'); ?></label>
									</div>
									<div class="field">
										<select name="lang" id="field-lang">
											<option value="English"<?php echo ( $this->user->lang == "English" ? ' selected="selected"' : '' ); ?>>English</option>
											<option value="French"<?php echo ( $this->user->lang == "French" ? ' selected="selected"' : '' ); ?>>Français</option>
											<option value="Italian"<?php echo ( $this->user->lang == "Italian" ? ' selected="selected"' : '' ); ?>>Italiano</option>
											<option value="Polish"<?php echo ( $this->user->lang == "Polish" ? ' selected="selected"' : '' ); ?>>Polski</option>
											<option value="Thai"<?php echo ( $this->user->lang == "Thai" ? ' selected="selected"' : '' ); ?>>ไทย</option>
										</select>
									</div>
								</div>
								<div class="fields">
									<div class="label">
										<label for="field-country"><?php echo ILang::_('Country'); ?></label>
									</div>
									<div class="field">
										<select name="country" id="field-country">
											<option value="aq"<?php echo ( $this->user->country == "aq" ? ' selected="selected"' : '' ); ?>>Antarctica</option>
											<option value="be"<?php echo ( $this->user->country == "be" ? ' selected="selected"' : '' ); ?>>Belgique</option>
											<option value="ca"<?php echo ( $this->user->country == "ca" ? ' selected="selected"' : '' ); ?>>Canada</option>
											<option value="es"<?php echo ( $this->user->country == "es" ? ' selected="selected"' : '' ); ?>>España</option>
											<option value="fr"<?php echo ( $this->user->country == "fr" ? ' selected="selected"' : '' ); ?>>France</option>
											<option value="it"<?php echo ( $this->user->country == "it" ? ' selected="selected"' : '' ); ?>>Italia</option>
											<option value="pl"<?php echo ( $this->user->country == "pl" ? ' selected="selected"' : '' ); ?>>Polska</option>
											<option value="ch"<?php echo ( $this->user->country == "ch" ? ' selected="selected"' : '' ); ?>>Suisse</option>
											<option value="gb"<?php echo ( $this->user->country == "gb" ? ' selected="selected"' : '' ); ?>>United Kingdom</option>
											<option value="us"<?php echo ( $this->user->country == "us" ? ' selected="selected"' : '' ); ?>>USA</option>
											<option value="th"<?php echo ( $this->user->country == "th" ? ' selected="selected"' : '' ); ?>>ไทย</option>
										</select>
									</div>
								</div>
								<div class="fields">
									<div class="label">
										<label for="field-tmpl"><?php echo ILang::_('Template'); ?></label>
									</div>
									<div class="field">
										<select name="tmpl" id="field-tmpl">
											<option value="light"<?php echo ( $this->user->tmpl == "light" ? ' selected="selected"' : '' ); ?>>Simple</option>
											<option value="iwars"<?php echo ( $this->user->tmpl == "iwars" ? ' selected="selected"' : '' ); ?>>Normale</option>
											<option value="space4k"<?php echo ( $this->user->tmpl == "space4k" ? ' selected="selected"' : '' ); ?>>Space4K</option>
										</select>
									</div>
								</div>
								<div class="fields">
									<div class="label">
										<label for="field-skin"><?php echo ILang::_('Skin'); ?></label>
									</div>
									<div class="field">
										<select name="skin" id="field-skin">
											<optgroup label="Official">
												<option value="googled"<?php echo ( $this->user->skin == "googled" ? ' selected="selected"' : '' ); ?>>Googled</option>
												<option value="iwars"<?php echo ( $this->user->skin == "iwars" ? ' selected="selected"' : '' ); ?>>Classique</option>
												<option value="iwarsv2"<?php echo ( $this->user->skin == "iwarsv2" ? ' selected="selected"' : '' ); ?>>Classique v2</option>
												<option value="space4k"<?php echo ( $this->user->skin == "space4k" ? ' selected="selected"' : '' ); ?>>Space4K</option>
											</optgroup>
											<optgroup label="Old">
												<option value="light"<?php echo ( $this->user->skin == "light" ? ' selected="selected"' : '' ); ?>>Épurer</option>
											</optgroup>
										</select>
										<input type="submit" name="act_gen" value="<?php echo ILang::_('Save'); ?>" class="right" />
									</div>
								</div>
								<hr class="clr" />
								<hr />
							</div>
							<h2><?php echo ILang::_('Options'); ?></h2>
							<div class="block">
								<div class="fields">
									<div class="label">
										<label for="field-slog"><?php echo ILang::_('SaveLogin'); ?></label>
									</div>
									<div class="field">
										<input type="checkbox" name="opt_slog" <?php echo $this->getData('options')->saveName == 1 ? 'checked="checked"' : '';?> id="field-slog" />
									</div>
								</div>
								<div class="fields">
									<div class="label">
										<label for="field-menu"><?php echo ILang::_('DefaultMenu'); ?></label>
									</div>
									<div class="field">
										<select name="opt_menu" id="field-menu">
											<option value="2"<?php echo $this->getData('options')->startMenu == 2 ? ' selected="selected"' : ''; ?>><?php echo ILang::_('Global'); ?></option>
											<option value="3"<?php echo $this->getData('options')->startMenu == 3 ? ' selected="selected"' : ''; ?>><?php echo ILang::_('Alliance'); ?></option>
										</select>
										<input type="submit" name="act_opt" value="<?php echo ILang::_('Save'); ?>" class="right" />
									</div>
								</div>
								<hr class="clr" />
								<hr />
							</div>
							<h2><?php echo ILang::_('Messages'); ?></h2>
							<div class="block">
								<div class="fields">
									<div class="label">
										<label for="field-msgPlayer"><?php echo ILang::_('PlayerMsg'); ?></label>
									</div>
									<div class="field">
										<select name="msg[player]" id="field-msgPlayer">
											<option value="0" <?php echo $this->getData('options')->msgPlayer == 0 ? 'selected="selected"' : ''; ?>><?php echo ILang::_('ToInbox'); ?></option>
											<?php if($folders = $this->getData('options')->folders) foreach($folders as $folder) : ?>
											<option value="<?php echo $folder->id; ?>" <?php echo $this->getData('options')->msgPlayer == $folder->id ? 'selected="selected"' : ''; ?>><?php echo ILang::_('MoveTo'); ?> <?php echo $folder->name; ?></option>
											<?php endforeach; ?>
											<option value="-1" <?php echo $this->getData('options')->msgPlayer == -1 ? 'selected="selected"' : ''; ?>><?php echo ILang::_('Delete'); ?></option>
										</select>
									</div>
								</div>
								<div class="fields">
									<div class="label">
										<label for="field-msgFight"><?php echo ILang::_('FightMsg'); ?></label>
									</div>
									<div class="field">
										<select name="msg[fight]" id="field-msgFight">
											<option value="0" <?php echo $this->getData('options')->msgFight == 0 ? 'selected="selected"' : ''; ?>><?php echo ILang::_('ToInbox'); ?></option>
											<?php if($folders = $this->getData('options')->folders) foreach($folders as $folder) : ?>
											<option value="<?php echo $folder->id; ?>" <?php echo $this->getData('options')->msgFight == $folder->id ? 'selected="selected"' : ''; ?>><?php echo ILang::_('MoveTo'); ?> <?php echo $folder->name; ?></option>
											<?php endforeach; ?>
											<option value="-1" <?php echo $this->getData('options')->msgFight == -1 ? 'selected="selected"' : ''; ?>><?php echo ILang::_('Delete'); ?></option>
										</select>
									</div>
								</div>
								<div class="fields">
									<div class="label">
										<label for="field-msgConst"><?php echo ILang::_('BuildMsg'); ?></label>
									</div>
									<div class="field">
										<select name="msg[const]" id="field-msgConst">
											<option value="0" <?php echo $this->getData('options')->msgConst == 0 ? 'selected="selected"' : ''; ?>><?php echo ILang::_('ToInbox'); ?></option>
											<option value="-1" <?php echo $this->getData('options')->msgConst == -1 ? 'selected="selected"' : ''; ?>><?php echo ILang::_('Delete'); ?></option>
										</select>
									</div>
								</div>
								<div class="fields">
									<div class="label">
										<label for="field-msgMove"><?php echo ILang::_('MoveMsg'); ?></label>
									</div>
									<div class="field">
										<select name="msg[move]" id="field-msgMove">
											<option value="0" <?php echo $this->getData('options')->msgMove == 0 ? 'selected="selected"' : ''; ?>><?php echo ILang::_('ToInbox'); ?></option>
											<option value="-1" <?php echo $this->getData('options')->msgMove == -1 ? 'selected="selected"' : ''; ?>><?php echo ILang::_('Delete'); ?></option>
										</select>
										<input type="submit" name="act_msg" value="<?php echo ILang::_('Save'); ?>" class="right" />
									</div>
								</div>
								<hr class="clr" />
								<hr />
							</div>
							<h2><?php echo ILang::_('VacancyMode'); ?></h2>
							<div class="block">
								<div class="fields">
									<div class="label">
										<label for="field-vm"><?php echo ILang::_('ActivateVM'); ?></label>
										<div><?php echo ILang::_('ActivateVMInfo'); ?></div>
									</div>
									<div class="field">
										<input type="checkbox" name="vm_en" id="field-vm" />
										<input type="submit" name="act_vm" value="<?php echo ILang::_('Save'); ?>" class="right" />
									</div>
								</div>
								<hr class="clr" />
							</div>
							<hr class="clr" />
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