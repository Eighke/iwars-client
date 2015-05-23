<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			unit.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-02-18 - Eighke
 */
if (!session_id()) exit();
?>
<h1><?php echo ILang::_('Unit'); ?></h1>
<?php $this->renderMsgs(); ?>
<div class="one_two">
	<div class="contenant">
		<div style="margin: 10px 10px 5px 10px;">
			<span class="left" style="margin:0 5px 0 0; border:1px solid #0a131a;"><img src="<?php echo SKIN; ?>unit/u<?php echo $this->getData('unit')->id; ?>k10.jpg" alt="" /></span>
			<span><b><?php echo ILang::unit($this->getData('unit')->id, 'name'); ?></b> - <i><?php echo ILang::number($this->getData('unit')->points); ?> <?php echo ILang::_('points'); ?></i></span>
		</div>
		<div>
			<?php if ($this->getData('unit')->ress[1]) : ?><span class="left line" style="margin-left:10px; width:85px;"><?php echo ILang::_('Titanium'); ?></span><span><?php echo ILang::number($this->getData('unit')->ress[1]); ?></span><br /><?php endif; ?>
			<?php if ($this->getData('unit')->ress[2]) : ?><span class="left line" style="margin-left:10px; width:85px;"><?php echo ILang::_('Silicon'); ?></span><span><?php echo ILang::number($this->getData('unit')->ress[2]); ?></span><br /><?php endif; ?>
			<?php if ($this->getData('unit')->ress[3]) : ?><span class="left line" style="margin-left:10px; width:85px;"><?php echo ILang::_('Hydrogen'); ?></span><span><?php echo ILang::number($this->getData('unit')->ress[3]); ?></span><br /><?php endif; ?>
			<span class="left end" style="margin-left:10px; width:85px;"><?php echo ILang::_('Time'); ?></span><span><?php echo IWUnit::getFormatTime($this->getData('unit')->time); ?></span><br />
			<span>&nbsp;</span>
		</div>
	</div>
</div>
<div class="one_two">
	<h2><?php echo ILang::_('Specifications'); ?></h2>
	<div class="contenant">
		<div class="bg3">
			<span class="left" style="width: 150px;">#</span>
			<strong class="left" style="width: 70px;"><?php echo ILang::_('Basics'); ?></strong>
			<strong><?php echo ILang::_('Current'); ?></strong>
		</div>
		<div class="bg1">
			<span class="left" style="width: 150px;"><?php echo ILang::_('Damages'); ?></span>
			<span class="left" style="width: 70px;"><?php echo ILang::number($this->getData('unit')->dmgs); ?></span>
			<span><?php echo ILang::number($this->getData('unitEvolve')->dmgs); ?></span>
		</div>
		<div class="bg2">
			<span class="left" style="width: 150px;"><?php echo ILang::_('Life'); ?></span>
			<span class="left" style="width: 70px;"><?php echo ILang::number($this->getData('unit')->life); ?></span>
			<span><?php echo ILang::number($this->getData('unitEvolve')->life); ?></span>
		</div>
		<div class="bg1">
			<span class="left" style="width: 150px;"><?php echo ILang::_('Speed'); ?></span>
			<span class="left" style="width: 70px;"><?php echo ILang::number($this->getData('unit')->speed); ?></span>
			<span><?php echo ILang::number($this->getData('unitEvolve')->speed); ?></span>
		</div>
		<div class="bg2">
			<span class="left" style="width: 150px;"><?php echo ILang::_('Capacity'); ?></span>
			<span class="left" style="width: 70px;"><?php echo ILang::number($this->getData('unit')->cap); ?></span>
			<span><?php echo ILang::number($this->getData('unitEvolve')->cap); ?></span>
		</div>
		<div class="bg1">
			<span class="left" style="width: 150px;"><?php echo ILang::_('Consumption'); ?></span>
			<span class="left" style="width: 70px;"><?php echo $this->getData('unit')->cons; ?></span>
			<span><?php echo $this->getData('unitEvolve')->cons; ?></span>
		</div>
	</div>
</div>
<div class="clr"></div>
<div class="content">
	<span><i><?php echo ILang::unit($this->getData('unit')->id, 'desc'); ?></i><br />&nbsp;</span>
</div>
<h2><?php echo ILang::_('Technologies'); ?></h2>
<div class="one_three div_content">
	<h3><?php echo ILang::_('Attack'); ?></h3>
	<div>
		<?php if ($speeds = $this->getData('technos')->Attack) : ?>
		<?php foreach ($speeds as $speed) : ?>
		<div><?php echo ILang::research($speed, 'name'); ?></div>
		<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>
<div class="one_three div_content">
	<h3><?php echo ILang::_('Defence'); ?></h3>
	<div>
		<?php if ($speeds = $this->getData('technos')->Defence) : ?>
		<?php foreach ($speeds as $speed) : ?>
		<div><?php echo ILang::research($speed, 'name'); ?></div>
		<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>
<div class="one_three div_content">
	<h3><?php echo ILang::_('Speed'); ?></h3>
	<div>
		<?php if ($speeds = $this->getData('technos')->Speed) : ?>
		<?php foreach ($speeds as $speed) : ?>
		<div><?php echo ILang::research($speed, 'name'); ?></div>
		<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>
<div class="clr"></div>