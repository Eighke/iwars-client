<?php
/**
 * Package      ~
 * Subpackage   ~
 * File         defs.php
 *
 * Licence      Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright    Copyright (C) 2005 - 2014 Frédéric Vandebeuque. All rights reserved.
 * Contrib      Frédéric Vandebeuque (fred.vdb@newebtime.com)
 *              Eighke (eighke@multi-site.net)
 */
session_start();

require 'inc/define.php';
require PATH_INCS.'header.inc.php';

$page->render();

require PATH_INCS.'footer.inc.php';
?>