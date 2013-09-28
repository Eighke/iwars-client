<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			towns.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-02-05 - Eighke
 */
if (!session_id()) exit();
?>
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
			<a href="?CCity=<?php echo $town->id; ?>"><?php echo $town->X; ?>:<?php echo $town->Y; ?>:<?php echo $town->Z; ?></a><br />
			<?php if ($this->getData('id') == $town->id && $this->getData('task') == 'rename') : ?>
			<form action="towns.php" method="post">
				<input type="text" name="name" value="<?php echo $town->name; ?>" /><input type="submit" name="submit" />
				<input type="hidden" name="id" value="<?php echo $town->id; ?>" />
				<input type="hidden" name="task" value="save" />
			</form>
			<?php else: ?>
			(<span><?php echo $town->name; ?></span>)
			<?php endif; ?>
		</div>
		<div style="float:left; width:230px;">
			<?php if ($town->buildId) : ?><?php echo ILang::build($town->buildId, 'name'); ?><br /><?php echo ILang::_('Time:'); ?> <?php echo $town->buildTime; ?><?php endif; ?>&nbsp;
		</div>
		<div style="float:left; width:120px;">
			<a href="towns.php?task=rename&id=<?php echo $town->id; ?>"><?php echo ILang::_('Rename'); ?></a><br />
			<a href="townd.php?id=<?php echo $town->id; ?>"><?php echo ILang::_('Delete'); ?></a>
		</div>
		<div style="float:left; width:50px;"><?php echo $town->points; ?></div>
		<div class="clr"></div>
	</div>
	<?php endforeach; ?>
</div>
<div class="clr"></div>