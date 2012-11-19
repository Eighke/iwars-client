<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			units.php
 *
 * Licence		GNU General Public License version 3; see http://www.gnu.org/licenses/lgpl-3.0.en.html
 * Copyright	Copyright (C) 2005 - 2012 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric Vandebeuque (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2012-11-16 - Eighke
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
						<h1><?php echo ILang::_('Production'); ?></h1>
						<?php $this->renderMsgs(); ?>
						<?php if ($this->town->haveBuilding(18)) : ?>
						<form action="units.php" method="post">
							<?php foreach($this->getData('troop') as $item) : ?>
							<div class="one_two div_content">
								<div style="margin-<?php echo ++$j%2 == 1 ? 'right' : 'left' ; ?>:5px;">
									<span class="item">
										<b><a class="nolink" href="unit.php?id=<?php echo $item->id; ?>"><?php echo ILang::unit($item->id, 'name'); ?></a></b> (<?php echo ILang::_('Total'); ?>: <?php echo ILang::number($this->town->getUnit($item->id)); ?>)<br />
										<i><?php echo ILang::unit($item->id, 'desc'); ?></i> <br />
										<span class="line"><?php echo $item->ress[1] ? ILang::_('T').': '.ILang::number($item->ress[1]).' &nbsp;' : FALSE; ?> <?php echo $item->ress[2] ? ILang::_('S').': '. ILang::number($item->ress[2]) .' &nbsp;' : FALSE; ?> <?php echo $item->ress[3] ? ILang::_('H').': '. ILang::number($item->ress[3]) : FALSE; ?></span><br />
										<span class="end"><?php echo ILang::_('Time'); ?>: <?php echo IWUnit::getFormatTime($item->buildTime); ?></span>
									</span>
									<span class="item-input">
										<input type="text" name="troop[<?php echo $item->id; ?>]" size="6" /><br />Max</span>
									<div class="clr"></div>
								</div>
							</div>
							<?php endforeach; ?>
							<div class="clr"></div>
							<div class="center">
								<input type="submit" name="brks" value="<?php echo ILang::_('BuildNow'); ?>" /><br />
								<select name="n" size="3">
									<?php if ($items = $this->getData('worksFactory')) : ?>
									<?php foreach($items as $item) : ?>
									<option><?php echo $item ?></option>
									<?php endforeach; ?>
									<?php else : ?>
									<option><?php echo ILang::_('Usine1Empty'); ?></option>
									<?php endif; ?>
								</select>
							</div>
						</form>

						<h2><?php echo ILang::_('Ships'); ?></h2>
						<?php if($this->town->haveBuilding(20)) : ?>
						<form action="units.php" method="post">
							<?php foreach($this->getData('workshop') as $item) : ?>
							<div class="one_two div_content">
								<div style="margin-<?php echo ++$k%2 == 1 ? 'right' : 'left' ; ?>:5px;">
									<span class="item">
										<b><a class="nolink" href="unit.php?id=<?php echo $item->id; ?>"><?php echo ILang::unit($item->id, 'name'); ?></a></b> (<?php echo ILang::_('Total')?>: <?php echo $this->town->getUnit($item->id); ?>)<br />
										<i><?php echo ILang::unit($item->id, 'desc'); ?></i> <br />
										<span class="line"><?php echo $item->ress[1] ? 'T: '.ILang::number($item->ress[1]).' &nbsp;' : FALSE ?> <?php echo $item->ress[2] ? 'S: '. ILang::number($item->ress[2]) .' &nbsp;' : FALSE; ?> <?php echo $item->ress[3] ? 'H: '. ILang::number($item->ress[3]) : FALSE; ?></span><br />
										<span class="end"><?php echo ILang::_('Time'); ?>: <?php echo IWUnit::getFormatTime($item->buildTime); ?></span>
									</span>
									<span class="item-input">
										<input type="text" name="unit[<?php echo $item->id; ?>]" size="6" /><br />Max</span>
									<div class="clr"></div>
								</div>
							</div>
							<?php endforeach; ?>
							<div class="clr"></div>
							<div class="center">
								<input type="submit" name="fact" value="<?php echo ILang::_('BuildNow'); ?>" /><br />
								<select name="n" size="3">
									<?php if ($items = $this->getData('worksWorkshop')) : ?>
									<?php foreach($items as $item) : ?>
									<option><?php echo $item ?></option>
									<?php endforeach; ?>
									<?php else : ?>
									<option><?php echo ILang::_('Usine1Empty'); ?></option>
									<?php endif; ?>
								</select>
							</div>
						</form>
						<?php else : ?>
						<div class="err"><?php echo ILang::_('NoWorkshop'); ?></div>
						<?php endif; ?>
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