<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			towns.php
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
						<h1><?php echo ILang::_('Planets'); ?></h1>
						<?php $this->renderMsgs(); ?>
						<div>
							<div class="bg3">
								<div style="float:left; width:110px;"><b><?php echo ILang::_('Coordinates'); ?></b></div>
								<div style="float:left; width:230px;"><b><?php echo ILang::_('Building'); ?></b></div>
								<div style="float:left; width:120px;"><b><?php echo ILang::_('Action'); ?></b></div>
								<div style="float:left; width:50px;"><b><?php echo ILang::_('Points'); ?></b></div>
								<div class="clr"></div>
							</div>
							<?php foreach($this->getData('towns') as $town) : ?>
							<div class="bg<?php echo ($j = $j == 2 ? 1 : 2); ?>">
								<div style="float:left; width:110px;">
									<a href="#"><?php echo $town->X; ?>:<?php echo $town->Y; ?>:<?php echo $town->Z; ?></a><br />
									(<span><?php echo $town->name; ?></span>)
								</div>
								<div style="float:left; width:230px;">
									<?php if ($town->buildName) : ?><?php echo $town->buildName; ?><br /><?php echo ILang::_('Time:'); ?> <?php echo $town->buildTime; ?><?php endif; ?>&nbsp;
								</div>
								<div style="float:left; width:120px;">
									<a href="#"><?php echo ILang::_('Rename'); ?></a><br />
									<a href="townd.php?id=<?php echo $town->id; ?>"><?php echo ILang::_('Delete'); ?></a>
								</div>
								<div style="float:left; width:50px;"><?php echo $town->points; ?></div>
								<div class="clr"></div>
							</div>
							<?php endforeach; ?>
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