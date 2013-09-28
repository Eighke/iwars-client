<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			move.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-02-20 - Eighke
 */
if (!session_id()) exit();
?>
<h1><?php echo ILang::_('Units'); ?></h1>
<?php $this->renderMsgs(); ?>
<form action="move.php" method="post">
	<div id="units" class="block">
		<?php if ($units = $this->getData('units')) : ?>
		<?php foreach($units as $id => $nb) : ?>
		<div class="fields">
			<div class="label">
				<label for="field-R1"><?php echo ILang::unit($id, 'name'); ?> (<span><?php echo $nb; ?></span>)</label>
			</div>
			<div class="field">
				<a href="#" onClick="IWMove.select(<?php echo $id; ?>, <?php echo $nb; ?>)"><?php echo ILang::_('All'); ?></a> <input type="text" name="unit[<?php echo $id; ?>]" id="unit_<?php echo $id; ?>" value="<?php echo (int) $this->getData('post')->unit[$id]; ?>" size="6" />
			</div>
		</div>
		<?php endforeach; ?>
		<div class="clr"></div>
		<div class="center">&raquo; <a href="#" onClick="IWMove.allselect()"><?php echo ILang::_('SelectAll'); ?></a> &laquo;</div>
		<?php else : ?>
		<div><?php echo ILang::_('NoUnit'); ?></div>
		<?php endif; ?>
	</div>
	<h2><?php echo ILang::_('Move'); ?></h2>
	<div class="block">
		<div class="left" style="width:270px;">
			<span class="left" style="width:60px;"><?php echo ILang::_('Action:'); ?></span><span><select name="action">
				<option value="Attack"<?php echo ( $this->getData('action') == "Attack" ? ' selected="selected"' : '' ); ?>><?php echo ILang::_('Attack'); ?></option>
				<option value="Base"<?php echo ( $this->getData('action') == "Base" ? ' selected="selected"' : '' ); ?>><?php echo ILang::_('Base'); ?></option>
				<option value="Port"<?php echo ( $this->getData('action') == "Port" ? ' selected="selected"' : '' ); ?>><?php echo ILang::_('Port'); ?></option>
				<option value="Spy"<?php echo ( $this->getData('action') == "Spy" ? ' selected="selected"' : '' ); ?>><?php echo ILang::_('Spy'); ?></option>
				<option value="Colon"<?php echo ( $this->getData('action') == "Colon" ? ' selected="selected"' : '' ); ?>><?php echo ILang::_('Colon'); ?></option>
			</select></span>
		</div>
		<div>G : <input name="x" type="text" size="2" maxlength="2" value="<?php echo $this->getData('X'); ?>" /> / S : <input name="y" type="text" size="2" maxlength="2" value="<?php echo $this->getData('Y'); ?>" /> / P : <input name="z" type="text" size="3" maxlength="3" value="<?php echo $this->getData('Z'); ?>" /></div>
		<br />
	</div>
	<div id="resources">
		<h2><?php echo ILang::_('Resources'); ?></h2>
		<div class="block">
			<div class="fields">
				<div class="label">
					<label for="field-R1"><?php echo ILang::_('Titanium:'); ?></label>
				</div>
				<div class="field">
					<input type="text" name="M" id="field-R1" value="<?php echo $this->getData('R1'); ?>" class="required" />
				</div>
			</div>
			<div class="fields">
				<div class="label">
					<label for="field-R2"><?php echo ILang::_('Silicon:'); ?></label>
				</div>
				<div class="field">
					<input type="text" name="P" id="field-R2" value="<?php echo $this->getData('R2'); ?>" class="required" />
				</div>
			</div>
			<div class="fields">
				<div class="label">
					<label for="field-R4"><?php echo ILang::_('Water:'); ?></label>
				</div>
				<div class="field">
					<input type="text" name="R4" id="field-R4" value="<?php echo $this->getData('R4'); ?>" class="required" />
				</div>
			</div>
			<div class="fields">
				<div class="label">
					<label for="field-R3"><?php echo ILang::_('Hydrogen:'); ?></label>
				</div>
				<div class="field">
					<input type="text" name="H" id="field-R3" value="<?php echo $this->getData('R3'); ?>" class="required" />
				</div>
			</div>
		</div>
	</div>
	<?php if ($overview = $this->getData('overview')) : ?>
	<h2><?php echo ILang::_('Overview'); ?></h2>
	<div class="content">
		<div>
			<span class="left" style="width:270px;"><?php echo ILang::_('Player:'); ?></span><span><?php echo $overview->user; ?></span><br />
			<span class="left" style="width:270px;"><?php echo ILang::_('Capacity:'); ?></span><span><?php echo $overview->maxCap; ?></span><br />
			<span class="left" style="width:270px;"><?php echo ILang::_('Distance:'); ?></span><span><?php echo $overview->dist; ?></span><br />
			<span class="left" style="width:270px;"><?php echo ILang::_('Consumption:'); ?></span><span><?php echo $overview->conso; ?></span><br />
			<span class="left" style="width:270px;"><?php echo ILang::_('Duration:'); ?></span><span><?php echo $overview->time; ?></span>
		</div>
	</div><br />
	<?php endif; ?>
	<div style="text-align:center;">
		<input type="submit" name="vis" value="<?php echo ILang::_('Overview'); ?>" /> <input type="submit" name="act" value="<?php echo ILang::_('Launch'); ?>" />
	</div>
</form>
<script type="text/javascript" src="<?php echo PATH_SCRIPTS; ?>js/move.js"></script>