<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			ress.php
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
									<span style="width:25%;display:inline-block;"><?php echo $this->getData('prod')->r1->factMax; ?><br /><?php echo $this->getData('prod')->r1->factMax/10; ?></span>
								</div>
								<div class="bg1" style="height: 30px;">
									<span class="left" style="width:25%"><?php echo ILang::_('Silicon'); ?></span>
									<span class="left" style="width:25%"><?php echo $this->getData('prod')->r2->factCoef; ?></span>
									<span class="left" style="width:25%"><?php echo $this->getData('prod')->r2->factQtt; ?><br /><?php echo $this->getData('prod')->r2->stock; ?>%</span>
									<span style="width:25%;display:inline-block;"><?php echo $this->getData('prod')->r2->factMax; ?><br /><?php echo $this->getData('prod')->r2->factMax/10; ?></span>
								</div>
								<div class="bg2" style="height: 30px;">
									<span class="left" style="width:25%"><?php echo ILang::_('Water'); ?></span>
									<span class="left" style="width:25%"><?php echo $this->getData('prod')->r4->factCoef; ?></span>
									<span class="left" style="width:25%"><?php echo $this->getData('prod')->r4->factQtt; ?><br /><?php echo $this->getData('prod')->r4->stock; ?>%</span>
									<span style="width:25%;display:inline-block;"><?php echo $this->getData('prod')->r4->factMax; ?><br /><?php echo $this->getData('prod')->r4->factMax/10; ?></span>
								</div>
								<div class="bg1" style="height: 30px;">
									<span class="left" style="width:25%"><?php echo ILang::_('Hydrogen'); ?></span>
									<span class="left" style="width:25%"><?php echo $this->getData('prod')->r3->factCoef; ?></span>
									<span class="left" style="width:25%"><?php echo $this->getData('prod')->r3->factQtt; ?><br /><?php echo $this->getData('prod')->r3->stock; ?>%</span>
									<span style="width:25%;display:inline-block;"><?php echo $this->getData('prod')->r3->factMax; ?><br /><?php echo $this->getData('prod')->r3->factMax/10; ?></span>
								</div>
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