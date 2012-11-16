<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			p_town.php
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
						<h1><?php echo ILang::_('Planet'); ?></h1>
						<?php $this->renderMsgs(); ?>
						<div class="contenant center">
							<div class="bg_1">
								<?php echo $this->getData('town')->name; ?> : <?php echo $this->getData('town')->X; ?>:<?php echo $this->getData('town')->Y; ?>:<?php echo $this->getData('town')->Z; ?> (<?php echo $this->getData('town')->points; ?> <?php echo ILang::_('points'); ?>)
							</div><br />
							<div>
								<a href="move.php?coords=<?php echo $this->getData('town')->X; ?>:<?php echo $this->getData('town')->Y; ?>:<?php echo $this->getData('town')->Z; ?>"><b><?php echo ILang::_('SendFleet'); ?></b></a>
							</div>
						</div>
						<h2><?php echo ILang::_('Player'); ?></h2>
						<div class="contenant center">
							<div><strong><?php echo ILang::_('Player'); ?></strong> <span><a href="player.php?id=<?php echo $this->getData('town')->userId; ?>"><?php echo $this->getData('town')->userName; ?></a></span></div>
							<div><a href="m_msg.php?id=<?php echo $this->getData('town')->userId; ?>"><b><?php echo ILang::_('Contact'); ?></b></a></div>
						</div>
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