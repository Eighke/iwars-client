<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			def.php
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
						<h1><?php echo ILang::_('Defense'); ?></h1>
						<?php $this->renderMsgs(); ?>
						<div class="one_two">
							<div class="contenant">
								<div style="margin: 10px 10px 5px 10px;">
									<span class="left" style="margin:0 5px 0 0; border:1px solid #0a131a;"><img src="<?php echo SKIN; ?>unit/u<?php echo $this->getData('unit')->id; ?>k10.jpg" alt="" /></span>
									<span><b><?php echo ILang::unit($this->getData('unit')->id, 'name'); ?></b> - <i><?php echo $this->getData('unit')->points; ?> <?php echo ILang::_('points'); ?></i></span>
								</div>
								<div>
									<?php if ($this->getData('unit')->ress[1]) : ?><span class="left line" style="margin-left:10px; width:85px;"><?php echo ILang::_('Titanium'); ?></span><span><?php echo $this->getData('unit')->ress[1]; ?></span><br /><?php endif; ?>
									<?php if ($this->getData('unit')->ress[2]) : ?><span class="left line" style="margin-left:10px; width:85px;"><?php echo ILang::_('Silicon'); ?></span><span><?php echo $this->getData('unit')->ress[2]; ?></span><br /><?php endif; ?>
									<?php if ($this->getData('unit')->ress[3]) : ?><span class="left line" style="margin-left:10px; width:85px;"><?php echo ILang::_('Hydrogen'); ?></span><span><?php echo $this->getData('unit')->ress[3]; ?></span><br /><?php endif; ?>
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
									<span class="left" style="width: 70px;"><?php echo $this->getData('unit')->dmgs; ?></span>
									<span><?php echo $this->getData('unitEvolve')->dmgs; ?></span>
								</div>
								<div class="bg2">
									<span class="left" style="width: 150px;"><?php echo ILang::_('Life'); ?></span>
									<span class="left" style="width: 70px;"><?php echo $this->getData('unit')->life; ?></span>
									<span><?php echo $this->getData('unitEvolve')->life; ?></span>
								</div>
								<div class="bg1">
									<span class="left" style="width: 150px;"><?php echo ILang::_('Speed']); ?></span>
									<span class="left" style="width: 70px;"><?php echo $this->getData('unit')->speed; ?></span>
									<span><?php echo $this->getData('unitEvolve')->speed; ?></span>
								</div>
								<div class="bg2">
									<span class="left" style="width: 150px;"><?php echo ILang::_('Capacity'); ?></span>
									<span class="left" style="width: 70px;"><?php echo $this->getData('unit')->cap; ?></span>
									<span><?php echo $this->getData('unitEvolve')->cap; ?></span>
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
						<div>
							<!-- TODO -->
						</div>
						<div class="clr"></div>
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