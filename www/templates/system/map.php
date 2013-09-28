<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			map.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-02-20 - Eighke
 */
if (!session_id()) exit();
?>
<h1><?php echo ILang::_('Map'); ?></h1>
<?php $this->renderMsgs(); ?>
<div class="content" style="margin-left:3px; width:544px;">
	<form action="map.php" method="get">
		<div class="center">
			G: <input type="text" name="x" size="5" value="<?php echo $this->getData('X'); ?>" /> S:<input type="text" name="y" size="5" value="<?php echo $this->getData('Y'); ?>" />
			<input type="submit" value="&raquo; Go &laquo;" />
		</div>
	</form>
	<div style="text-align:center;">
		<a href="?x=<?php echo $this->getData('X')-1; ?>&y=<?php echo $this->getData('Y'); ?>"><img src="<?php echo SKIN; ?>imgs/map_w.png" alt="Ouest"/></a>
		<a href="?x=<?php echo $this->getData('X'); ?>&y=<?php echo $this->getData('Y')-1; ?>"><img src="<?php echo SKIN; ?>imgs/map_n.png" alt="Nord"/></a>
		<a href="?x=<?php echo $this->getData('X'); ?>&y=<?php echo $this->getData('Y')+1; ?>"><img src="<?php echo SKIN; ?>imgs/map_s.png" alt="Sud"/></a>
		<a href="?x=<?php echo $this->getData('X')+1; ?>&y=<?php echo $this->getData('Y'); ?>"><img src="<?php echo SKIN; ?>imgs/map_e.png" alt="Est"/></a>
	</div>
	<div>
		<div id="map" style="position:relative;">
		<?php //TODO: Faire un benk pour optimisation ?>
		<?php $map = $this->getData('map'); $grid = $this->getData('grid');
			for($i = 1; $i <= 17; $i++) : $line = $map[$i]; ?>
			<?php for($j = 1; $j <= 15; $j++) :
					$case = $line[$j];
					$x = $i;
					?>
				<?php if ($line[$j]) : ?>
				<div style="position:absolute; top:<?php echo ($j-1)*32; ?>px; left:<?php echo ($x-1)*32; ?>px;" class="tip gd_<?php if ($case['usrId'] == $usr->id) { echo 'self'; } else if ($case['allyId'] == $ally->id) { echo 'ally'; } else { echo 'other'; } ?>" title="<?php echo $this->getData('X').':'.$this->getData('Y').':'.$case['z']; ?> - <?php echo $case['buildPoints']; ?> pts::<?php echo $case['usrName']; ?> (<?php echo $case['userPoints']; ?> pts)"><a href="p_town.php?id=<?php echo $case['twnId']; ?>"><img src="<?php echo SKIN.'imgs/'.$case['twnImg']; ?>.png" alt="" /></a></div>
				<?php else : ?>
				<div style="position:absolute; top:<?php echo ($j-1)*32; ?>px; left:<?php echo ($x-1)*32; ?>px;" class="tip <?php if ($grid[$x][$j]) { echo 'gd2_'. $grid[$x][$j]; } ?>" title="<?php echo $this->getData('X').':'.$this->getData('Y').':'.($x+($j-1)*17); ?>"><a><img src="<?php echo SKIN; ?>imgs/mempty.gif" alt="" /></a></div>
				<?php endif; ?>
			
			<?php endfor; ?>
		<?php endfor; ?>
		</div>
	</div>
	<div class="clr"></div>
</div>