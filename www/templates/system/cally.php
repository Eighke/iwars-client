<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			cally.php
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
						<h1><?php echo ILang::_('ChangeAlliance'); ?></h1>
						<?php $this->renderMsgs(); ?>
						<?php if ($items = $this->getData('items')) : ?>
						<div>
							<span class="left" style="width:50px"><?php echo ILang::_('Tag'); ?></span>
							<span style="width:200px"><?php echo ILang::_('Name'); ?></span>
						</div>
						<?php foreach($items as $item) : ?>
						<div class="bg<?php echo ($j = $j == 2 ? 1 : 2); ?>">
							<span class="left" style="width:50px"><?php echo $item->tag; ?></span>
							<span class="left" style="width:200px"><?php echo qftext($item->name); ?></span>
							<span style="width:100px">[ <a href="?join=<?php echo $item->id; ?>"><?php echo ILang::_('Join'); ?></a> ]</span>
						</div>
						<?php endforeach; ?>
						<?php endif; ?>
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