<?php
/**
 * Package      Scripts
 * Subpackage   ~
 * File         m_folder.php
 *
 * Licence      Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright    Copyright (C) 2005 - 2014 Frédéric Vandebeuque. All rights reserved.
 * Contrib      Frédéric Vandebeuque (fred.vdb@newebtime.com)
 *              Eighke (eighke@multi-site.net)
 */
if (!session_id()) { exit(); }

/* [Task] */
/**
 * Add			Add a new folder
 * Delete		Detele an existant folder
 */
try {
	require_once PATH_LIBS.'IWars/msg.php';

	if ($this->task == 'add') {

		$result = IWMsg::addFolder($_POST['name'], $this->user->id);
		$this->setMsg('valid', $result);
	} elseif ($this->task == 'delete') {
		/* TODO */
	}
} catch (Exception $e) {
	$this->setMsg('warning', ILang::_($e->getMessage()));
}
/* [/Task] */
?>