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
 * Version		2013-10-31 - Eighke
 */
if (!session_id()) exit();
?>
<h1><?php echo ILang::_('Resources'); ?></h1>
<?php $this->renderMsgs(); ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>&nbsp;</th>
			<th><?php echo ILang::_('Production'); ?></th>
			<th><?php echo ILang::_('Stock'); ?></th>
			<th><?php echo ILang::_('Max'); ?> / <?php echo ILang::_('Protect'); ?></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?php echo ILang::_('Titanium'); ?></td>
			<td><?php echo ILang::number($this->getData('prod')->r1->factCoef); ?></td>
			<td><?php echo ILang::number($this->getData('prod')->r1->factQtt); ?> <span class="badge<?php echo $this->getData('prod')->r1->stock <= 10 ? ' alert-success' : ($this->getData('prod')->r1->stock == 100 ? ' alert-danger' : ($this->getData('prod')->r1->stock >= 80 ? ' alert-warning' : NULL)); ?>"><?php echo $this->getData('prod')->r1->stock; ?>%</span></td>
			<td><?php echo ILang::number($this->getData('prod')->r1->factMax); ?><br /><span><?php echo ILang::number($this->getData('prod')->r1->factProtect); ?></td>
		</tr>
		<tr>
			<td><?php echo ILang::_('Silicon'); ?></td>
			<td><?php echo ILang::number($this->getData('prod')->r2->factCoef); ?></td>
			<td><?php echo ILang::number($this->getData('prod')->r2->factQtt); ?> <span class="badge<?php echo $this->getData('prod')->r2->stock <= 10 ? ' alert-success' : ($this->getData('prod')->r2->stock == 100 ? ' alert-danger' : ($this->getData('prod')->r2->stock >= 80 ? ' alert-warning' : NULL)); ?>"><?php echo $this->getData('prod')->r2->stock; ?>%</span></td>
			<td><?php echo ILang::number($this->getData('prod')->r2->factMax); ?><br /><?php echo ILang::number($this->getData('prod')->r2->factProtect); ?></td>
		</tr>
		<tr>
			<td><?php echo ILang::_('Water'); ?></td>
			<td><?php echo ILang::number($this->getData('prod')->r4->factCoef); ?></td>
			<td><?php echo ILang::number($this->getData('prod')->r4->factQtt); ?> <span class="badge<?php echo $this->getData('prod')->r4->stock <= 10 ? ' alert-success' : ($this->getData('prod')->r4->stock == 100 ? ' alert-danger' : ($this->getData('prod')->r4->stock >= 80 ? ' alert-warning' : NULL)); ?>"><?php echo $this->getData('prod')->r4->stock; ?>%</span></td>
			<td><?php echo ILang::number($this->getData('prod')->r4->factMax); ?><br /><?php echo ILang::number($this->getData('prod')->r4->factProtect); ?></td>
		</tr>
		<tr>
			<td><?php echo ILang::_('Hydrogen'); ?></td>
			<td><?php echo ILang::number($this->getData('prod')->r3->factCoef); ?></td>
			<td><?php echo ILang::number($this->getData('prod')->r3->factQtt); ?> <span class="badge<?php echo $this->getData('prod')->r3->stock <= 10 ? ' alert-success' : ($this->getData('prod')->r3->stock == 100 ? ' alert-danger' : ($this->getData('prod')->r3->stock >= 80 ? ' alert-warning' : NULL)); ?>"><?php echo $this->getData('prod')->r3->stock; ?>%</span></td>
			<td><?php echo ILang::number($this->getData('prod')->r3->factMax); ?><br /><?php echo ILang::number($this->getData('prod')->r3->factProtect); ?></td>
		</tr>
	</tbody>
</table>