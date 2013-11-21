<?php
/**
 * Package		Templates
 * Subpackage	System
 * File			_render.ajax.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-11-03 - Eighke
 */
if (!session_id()) exit();

echo json_encode($this->_datas);
?>