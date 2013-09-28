<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			_render.ajax.php
 *
 * Licence		GNU Lesser General Public License version 3; see http://www.gnu.org/licenses/lgpl-3.0.en.html
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric Vandebeuque (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-02-18 - Eighke
 */
if (!session_id()) exit();
?>
<div>
<?php $this->renderBody(); ?>
</div>