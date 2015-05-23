<?php
/**
 * Package      Templates
 * Subpackage   System
 * File         towns.php
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
<h1><?php echo ILang::_('Planets'); ?></h1>
<?php $this->renderMsgs(); ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th><?php echo ILang::_('Coordinates'); ?></th>
			<th><?php echo ILang::_('Building'); ?></th>
			<th><?php echo ILang::_('Action'); ?></th>
			<th><?php echo ILang::_('Points'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->getData('towns') as $town) : ?>
		<tr>
			<td>
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
			</td>
			<td><?php if ($town->buildId) : ?><?php echo ILang::build($town->buildId, 'name'); ?><br /><?php echo ILang::_('Time:'); ?> <?php echo $town->buildTime; ?><?php endif; ?>&nbsp;</td>
			<td>
				<a href="towns.php?task=rename&id=<?php echo $town->id; ?>" class="btn btn-sm btn-default glyphicon glyphicon-edit" title="<?php echo ILang::_('Rename'); ?>" data-load="cache"></a>
				<a href="townd.php?id=<?php echo $town->id; ?>" class="btn btn-sm btn-danger glyphicon glyphicon-remove" title="<?php echo ILang::_('Delete'); ?>" data-load="cache"></a>
			</td>
			<td><?php echo $town->points; ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>