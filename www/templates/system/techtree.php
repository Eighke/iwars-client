<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			techtree.php
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
						<h1><?php echo ILang::_('TechsTree'); ?></h1>
						<?php $this->renderMsgs(); ?>
						<div>[<a href="?tree=builds"><?php echo ILang::_('Buildings'); ?></a>] [<a href="?tree=researchs"><?php echo ILang::_('Researchs'); ?></a>] [<a href="?tree=units"><?php echo ILang::_('Units'); ?></a>]</div>
						<div class="div_content">
							<?php foreach ($this->getData('items') as $item) : ?>
							<div>
								<h2><?php echo $item->name; ?></h2>
								<?php if ($item->cnd['B']) : ?>
								<div><strong><?php echo ILang::_('Buildings'); ?></strong>
									<?php foreach ($item->cnd['B'] as $id => $level) : ?>
									<div><?php echo ILang::build($id, 'name'); ?> (<?php echo $level; ?>)</div>
									<?php endforeach; ?>
								</div>
								<?php endif; ?>
				
								<?php if ($item['cnd']['T']) : ?>
								<div><strong><?php echo ILang::_('Researchs'); ?></strong>
									<?php foreach ($item->cnd['T'] as $id => $level) : ?>
									<div class="<?php echo $this->user->getTech($id) < $level ? 'cwrn' : 'cvld'; ?>"><?php echo ILang::research($id, 'name'); ?> (<?php echo $level; ?>)</div>
									<?php endforeach; ?>
								</div>
								<?php endif; ?>
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