<?php
/**
 * Package      Templates
 * Subpackage   System
 * File         cally.php
 *
 * Licence      Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright    Copyright (C) 2005 - 2014 Frédéric Vandebeuque. All rights reserved.
 * Contrib      Frédéric V. (fred.vdb@newebtime.com)
 *              Eighke (eighke@multi-site.net)
 *
 * Version      2014-02-13 - Eighke
 */
if (!session_id()) exit();
?>
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
	<span style="width:100px"><a class="button" href="cally.php?join=<?php echo $item->id; ?>" data-load="cache"><?php echo ILang::_('Join'); ?></a></span>
</div>
<?php endforeach; ?>
<?php endif; ?>