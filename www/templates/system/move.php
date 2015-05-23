<?php
/**
 * Package      Templates
 * Subpackage   System
 * File         move.php
 *
 * Licence      Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright    Copyright (C) 2005 - 2014 Frédéric Vandebeuque. All rights reserved.
 * Contrib      Frédéric V. (fred.vdb@newebtime.com)
 *              Eighke (eighke@multi-site.net)
 */
if (!session_id()) exit();
?>
<h1><?php echo ILang::_('Units'); ?></h1>
<?php $this->renderMsgs(); ?>
<form action="move.php" method="post" class="form-horizontal">
	<div id="units" class="block">
		<?php if ($units = $this->getData('units')) : ?>
		<?php foreach($units as $id => $nb) : ?>
		<div class="form-group">
			<label for="unit_<?php echo $id; ?>" class="col-xs-6 col-sm-4 control-label"><?php echo ILang::unit($id, 'name'); ?> <span class="badge"><?php echo $nb; ?></span></label>
			<div class="input-group col-xs-6 col-sm-4">
				<a href="#" class="select input-group-addon" data-id="<?php echo $id; ?>" data-number="<?php echo $nb; ?>" title="<?php echo ILang::_('All'); ?>"><i class="glyphicon glyphicon-chevron-right"></i></a>
				<input type="text" name="unit[<?php echo $id; ?>]" id="unit_<?php echo $id; ?>" value="<?php echo (int) $this->getData('post')->unit[$id]; ?>" class="form-control" />
			</div>
		</div>
		<?php endforeach; ?>
		<div class="clr"></div>
		<div class="center"><a href="#" id="selectAll" class="btn btn-primary"><i class="glyphicon glyphicon-log-in"></i> <?php echo ILang::_('SelectAll'); ?></a></div>
		<?php else : ?>
		<div><?php echo ILang::_('NoUnit'); ?></div>
		<?php endif; ?>
	</div>
	<div class="block">
		<h2><?php echo ILang::_('Move'); ?></h2>
		<div class="col-sm-6">
			<div class="input-group">
				<label for="field-action" class="input-group-addon glyphicon glyphicon-log-in" title="<?php echo ILang::_('Action'); ?>"></label>
				<select name="action" class="form-control" id="field-action">
					<option value="Attack"<?php echo ( $this->getData('action') == "Attack" ? ' selected="selected"' : '' ); ?>><?php echo ILang::_('Attack'); ?></option>
					<option value="Base"<?php echo ( $this->getData('action') == "Base" ? ' selected="selected"' : '' ); ?>><?php echo ILang::_('Base'); ?></option>
					<option value="Port"<?php echo ( $this->getData('action') == "Port" ? ' selected="selected"' : '' ); ?>><?php echo ILang::_('Port'); ?></option>
					<option value="Spy"<?php echo ( $this->getData('action') == "Spy" ? ' selected="selected"' : '' ); ?>><?php echo ILang::_('Spy'); ?></option>
					<option value="Colon"<?php echo ( $this->getData('action') == "Colon" ? ' selected="selected"' : '' ); ?>><?php echo ILang::_('Colon'); ?></option>
				</select>
			</div>
		</div>
		<div class="visible-xs">&nbsp;</div>
		<div class="col-sm-6">
			<div class="col-xs-4">
				<div class="input-group">
					<span class="input-group-addon" title="G">G</span>
					<input type="text" name="x" value="<?php echo (int) $this->getData('X') ?>" class="form-control" />
				</div>
			</div>
			<div class="col-xs-4">
				<div class="input-group">
					<span class="input-group-addon" title="G">S</span>
					<input type="text" name="y" value="<?php echo (int) $this->getData('Y') ?>" class="form-control" />
				</div>
			</div>
			<div class="col-xs-4">
				<div class="input-group">
					<span class="input-group-addon" title="G">P</span>
					<input type="text" name="z" value="<?php echo (int) $this->getData('Z') ?>" class="form-control" />
				</div>
			</div>
		</div>
		<div class="clr"></div>
	</div>
	<div id="resources">
		<h2><?php echo ILang::_('Resources'); ?></h2>
		<div class="form-group">
			<label for="field-R1" class="col-xs-6 col-sm-4 control-label"><?php echo ILang::_('Titanium'); ?></label>
			<div class="col-xs-6 col-sm-4">
				<input type="text" name="M" id="field-R1" value="<?php echo $this->getData('R1'); ?>" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label for="field-R2" class="col-xs-6 col-sm-4 control-label"><?php echo ILang::_('Silicon'); ?></label>
			<div class="col-xs-6 col-sm-4">
				<input type="text" name="P" id="field-R2" value="<?php echo $this->getData('R2'); ?>" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label for="field-R2" class="col-xs-6 col-sm-4 control-label"><?php echo ILang::_('Water'); ?></label>
			<div class="col-xs-6 col-sm-4">
				<input type="text" name="R4" id="field-R4" value="<?php echo $this->getData('R4'); ?>" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label for="field-R2" class="col-xs-6 col-sm-4 control-label"><?php echo ILang::_('Hydrogen'); ?></label>
			<div class="col-xs-6 col-sm-4">
				<input type="text" name="H" id="field-R3" value="<?php echo $this->getData('R3'); ?>" class="form-control" />
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
		<input type="submit" name="vis" value="<?php echo ILang::_('Overview'); ?>" />
		<input type="submit" name="act" value="<?php echo ILang::_('Launch'); ?>" />
	</div>
</form>