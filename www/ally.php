<?php
/**
 * Package		~
 * Subpackage	~
 * File			ally.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-01-26 - Eighke
 */
session_start();

require 'inc/define.php';
require PATH_INCS.'header.inc.php';

$page->render();

require PATH_INCS.'footer.inc.php';
?>