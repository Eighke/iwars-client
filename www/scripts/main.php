<?php
/**
 * Package      Scripts
 * Subpackage   ~
 * File         main.php
 *
 * Licence      Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright    Copyright (C) 2005 - 2014 Frédéric Vandebeuque. All rights reserved.
 * Contrib      Frédéric Vandebeuque (fred.vdb@newebtime.com)
 *              Eighke (eighke@multi-site.net)
 */
if (!session_id()) { exit(); }

/* GET / POST */
/**
 * $offset		int		The displayed work offset
 */
$offset	= $_GET['all'] ? FALSE : '20';

/* [Task] */
/**
 * Upload		Upload a new town image
 * Cancel		Cancel an action
 */
try {
	if ($this->task == 'upload') {

		$result = $this->town->uploadLogo();
	}
	elseif ($this->task == 'cancel') {

		$id = (int) $_GET['id'];
		$result = $this->user->cancelAction($id);
	}

	if (isset($result))
		$this->setMsg('valid', $result);
}
catch (Exception $e) {
	$this->setMsg('warning', ILang::_($e->getMessage()));
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