<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			defs.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-06-15 - Eighke
 */
if (!session_id()) exit();
?>
<h1><?php echo ILang::_('Defenses'); ?></h1>
<?php $this->renderMsgs(); ?>
<?php if ($this->getData('center')) : ?>
<form action="defs.php?task=build" method="post">
	<?php $units = $this->getData('defs'); ?>
	<?php foreach($units['UD'] as $item) : $j++; ?>
	<div class="one_two div_content">
		<div style="margin-<?php echo ++$j%2 == 0 ? 'right' : 'left' ; ?>:5px;">
			<span class="item" style="float:left; width:230px; margin:0 0 2px 0;">
				<b><a class="nolink" href="def.php?id=<?php echo $item->id; ?>"><?php echo ILang::unit($item->id, 'name'); ?></a></b> (<?php echo ILang::_('Total'); ?> <?php echo ILang::number($this->town->getUnit($item->id)); ?>)<br />
				<i><?php echo ILang::unit($item->id, 'desc'); ?></i> <br />
				<span class="line"><?php echo $item->ress[1] ? ILang::_('T').': '.ILang::number($item->ress[1]).' &nbsp;' : FALSE; ?> <?php echo $item->ress[2] ? ILang::_('S').': '. ILang::number($item->ress[2]) .' &nbsp;' : FALSE; ?> <?php echo $item->ress[3] ? ILang::_('H').': '. ILang::number($item->ress[3]) : FALSE; ?></span><br />
				<span class="end"><?php echo ILang::_('Time'); ?>: <?php echo IWUnit::getFormatTime($item->time/($this->getData('center')*$this->conf['time_coef'])); ?></span>
			</span>
			<span class="item-input">
				<input type="text" name="def[<?php echo $item->id; ?>]" size="6" /><br /><?php echo ILang::_('Max'); ?></span>
			<div class="clr"></div>
		</div>
	</div>
	<?php endforeach; ?>
	<div class="clr"></div>
	<div class="center">
		<input type="submit" name="defp" value="<?php echo ILang::_('BuildNow'); ?>" /><br />
		<select name="n" size="3">
			<?php if ($items = $this->getData('works')) : ?>
			<?php foreach($items['UD'] as $item) : ?>
			<option><?php echo $item ?></option>
			<?php endforeach; ?>
			<?php else : ?>
			<option><?php echo ILang::_('Usine3Empty'); ?></option>
			<?php endif; ?>
		</select>
	</div>
</form>
<?php endif; ?>