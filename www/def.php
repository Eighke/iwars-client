<?php
/**
 * Package		~
 * Subpackage	~
 * File			def.php
 *
 * Licence		GNU General Public License version 3; see http://www.gnu.org/licenses/lgpl-3.0.en.html
 * Copyright	Copyright (C) 2005 - 2012 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric Vandebeuque (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2012-11-19 - Eighke
 */
session_start();

require 'inc/define.php';
require PATH_INCS.'header.inc.php';

$page->render();

require PATH_INCS.'footer.inc.php';
?>