<?php
/**
 * Package      Templates
 * Subpackage   System
 * File         m_folder.php
 *
 * Licence      Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright    Copyright (C) 2005 - 2014 Frédéric Vandebeuque. All rights reserved.
 * Contrib      Frédéric V. (fred.vdb@newebtime.com)
 *              Eighke (eighke@multi-site.net)
 */
if (!session_id()) exit();
?>
<h1><?php echo ILang::_('NewFolder'); ?></h1>
<?php $this->renderMsgs(); ?>
<form action="m_folder.php" method="POST" id="formMakeFolder" class="form-horizontal">
	<div class="form-group">
		<label for="field-name" class="col-xs-4 control-label"><?php echo ILang::_('EnterName:'); ?></label>
		<div class="center col-xs-6 input-group">
			<input type="text" name="name" id="field-name" class="form-control" />
			<input type="hidden" name="task" value="add" />
			<span class="input-group-btn">
				<button type="submit" class="btn btn-default"><?php echo ILang::_('Create'); ?></button>
			</span>
		</div>
	</div>
</form>