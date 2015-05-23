<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			_render.raw.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2005 - 2014 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2014-02-12 - Eighke
 */
if (!session_id()) exit();

ob_start();
?>
<div>
<?php $this->renderBody(); ?>
</div>
<?php
$html = ob_get_contents();
ob_end_clean();

$md5 = md5($html);

$data = (object) [
		'html' => $html,
		'md5' => $md5,
		'ressources' => $this->resources
];

echo json_encode($data);
?>