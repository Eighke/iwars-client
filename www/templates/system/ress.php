<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			ress.php
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
<h1><?php echo ILang::_('Resources'); ?></h1>
<?php $this->renderMsgs(); ?>
<div class="block">
		<div class="bg3">
			<span class="left" style="width:25%">&nbsp;</span>
			<span class="left" style="width:25%"><?php echo ILang::_('Production'); ?></span>
			<span class="left" style="width:25%"><?php echo ILang::_('Stock'); ?> / (%)</span>
			<span style="width:25%;display:inline-block;"><?php echo ILang::_('Max'); ?> / <?php echo ILang::_('Protect'); ?></span>
		</div>
		<div class="bg2" style="height: 30px;">
			<span class="left" style="width:25%"><?php echo ILang::_('Titanium'); ?></span>
			<span class="left" style="width:25%"><?php echo $this->getData('prod')->r1->factCoef; ?></span>
			<span class="left" style="width:25%;"><?php echo $this->getData('prod')->r1->factQtt; ?><br /><?php echo $this->getData('prod')->r1->stock; ?>%</span>
			<span style="width:25%;display:inline-block;"><?php echo $this->getData('prod')->r1->factMax; ?><br /><?php echo $this->getData('prod')->r1->factProtect; ?></span>
		</div>
		<div class="bg1" style="height: 30px;">
			<span class="left" style="width:25%"><?php echo ILang::_('Silicon'); ?></span>
			<span class="left" style="width:25%"><?php echo $this->getData('prod')->r2->factCoef; ?></span>
			<span class="left" style="width:25%"><?php echo $this->getData('prod')->r2->factQtt; ?><br /><?php echo $this->getData('prod')->r2->stock; ?>%</span>
			<span style="width:25%;display:inline-block;"><?php echo $this->getData('prod')->r2->factMax; ?><br /><?php echo $this->getData('prod')->r2->factProtect; ?></span>
		</div>
		<div class="bg2" style="height: 30px;">
			<span class="left" style="width:25%"><?php echo ILang::_('Water'); ?></span>
			<span class="left" style="width:25%"><?php echo $this->getData('prod')->r4->factCoef; ?></span>
			<span class="left" style="width:25%"><?php echo $this->getData('prod')->r4->factQtt; ?><br /><?php echo $this->getData('prod')->r4->stock; ?>%</span>
			<span style="width:25%;display:inline-block;"><?php echo $this->getData('prod')->r4->factMax; ?><br /><?php echo $this->getData('prod')->r4->factProtect; ?></span>
		</div>
		<div class="bg1" style="height: 30px;">
			<span class="left" style="width:25%"><?php echo ILang::_('Hydrogen'); ?></span>
			<span class="left" style="width:25%"><?php echo $this->getData('prod')->r3->factCoef; ?></span>
			<span class="left" style="width:25%"><?php echo $this->getData('prod')->r3->factQtt; ?><br /><?php echo $this->getData('prod')->r3->stock; ?>%</span>
			<span style="width:25%;display:inline-block;"><?php echo $this->getData('prod')->r3->factMax; ?><br /><?php echo $this->getData('prod')->r3->factProtect; ?></span>
		</div>
</div>
<div class="clr"></div>