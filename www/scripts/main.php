<?php
/**
 * Package		Scripts
 * Subpackage	~
 * File			main.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-06-22 - Eighke
 */
if (!session_id()) { exit(); }

/* GET / POST */
/**
 * $offset		int		The displayed work offset
 * $task		cmd		Task
 */
$offset	= $_GET['all'] ? FALSE : '20';
$task	= $_REQUEST['task'];

/* [Task] */
/**
 * Upload		Upload a new town image
 * Cancel		Cancel an action
 */
if ($task == 'upload') {

	try {
		$result = $this->town->uploadLogo();
		$this->setMsg('valid', ILang::_($result));
	} catch (Exception $e) {
		$this->setMsg('warning', ILang::_($e->getMessage()));
	}
} elseif ($task == 'cancel') {

	try {
		$id		= (int) $_GET['id'];
		$result	= $this->user->cancelAction($id);

		$this->setMsg('valid', ILang::_($result));
	} catch (Exception $e) {
		$this->setMsg('warning', ILang::_($e->getMessage()));
	}
}
/* [/Task] */

/**
 * Informations
 * - Planet productions
 * - Works in progress in the planet
 * - Building in progress in the account
 * - Actions in progress in the account
 * - Account informations
 **/
$prods		=& $this->town->getProds();
$cWorks		=& $this->town->getCurrentWorks();
$builds		=& $this->user->getWorks('Buildings', $offset);
$actions	=& $this->user->getActions(null, 10);
$empire		=& $this->user->getEmpireInfos();

/**
 * Init town informations
 */
$this->town->initInfos();
$this->town->initPoints();
$this->town->initUnits('NW');

/**
 * Bind datas
 */
$this->setData('prod',		$prods);
$this->setData('builds',	$builds);
$this->setData('cWorks',	$cWorks);
$this->setData('actions',	$actions);
$this->setData('empire',	$empire);

/**
 * Load languages if needed
 */
if ($this->town->unit)
	ILang::load('units');
if ($builds)
	ILang::load('builds');
?>