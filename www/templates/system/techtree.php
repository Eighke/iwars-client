<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			techtree.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-02-18 - Eighke
 */
if (!session_id()) exit();

$method = $this->getData('method');
?>
<h1><?php echo ILang::_('TechsTree'); ?></h1>
<?php $this->renderMsgs(); ?>
<div class="block button center">
	<a href="?tree=builds" rel="page"><?php echo ILang::_('Buildings'); ?></a>
	<a href="?tree=researchs" rel="page"><?php echo ILang::_('Researchs'); ?></a>
	<a href="?tree=units" rel="page"><?php echo ILang::_('Units'); ?></a></div>
<div class="div_content">
	<?php foreach ($this->getData('items') as $item) : ?>
	<div>
		<h2><?php echo ILang::$method($item->id, 'name'); ?></h2>
		<?php if ($item->cnd['B']) : ?>
		<div><strong><?php echo ILang::_('Buildings'); ?></strong>
			<?php foreach ($item->cnd['B'] as $id => $level) : ?>
			<div><?php echo ILang::build($id, 'name'); ?> (<?php echo $level; ?>)</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

		<?php if ($item->cnd['T']) : ?>
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