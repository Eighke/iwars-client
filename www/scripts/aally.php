<?php
/**
 * Package      Scripts
 * Subpackage   ~
 * File         aally.php
 *
 * Licence      Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright    Copyright (C) 2005 - 2014 Frédéric Vandebeuque. All rights reserved.
 * Contrib      Frédéric Vandebeuque (fred.vdb@newebtime.com)
 *              Eighke (eighke@multi-site.net)
 */
if (!session_id()) { exit(); }

//TODO : User the ACL instead of just isLeader
if ($this->alliance->isLeader($this->user->id)) {

	/**
	 * [Tasks]
	 * 
	 * Desc			Change the alliance descriptions
	 * Link			Change the alliance website URL
	 * Logo			Upload a new alliance logo
	 * Leader		Change the leader of the alliance
	 * Destroy		Destroy the alliance
	 */
	try {
		if ('desc' == $this->task) {
	
			$result = $this->alliance->setDescription($_POST['desc'], $_POST['pdesc']);
		}
		elseif ('link' == $this->task) {

			$result = $this->alliance->setLink($_POST['link']);
		}
		elseif ('logo' == $this->task) {

			$result = $this->alliance->uploadLogo();
		}
		elseif ('leader' == $this->task
				|| 'destroy' == $this->task) {

			// TODO: Add the verifPwd inside the user class or auth class!
			require_once( PATH_LIBS.'share.inc.php' );

			// TODO: SESSION de password warning, Arrivé a 5 : Log + Warnig admin.
			if (!VerifPwd( $this->user->id, $_POST['password']))
				throw new Exception('InvalidPwd');

			if ($this->task == 'destroy') {

				if ($this->conf['game']->lockMember == 0 && $_POST['del'] == 1)
					$return = $this->alliance->delete();
			}
			elseif($this->task == 'leader') {

				$return = $this->alliance->setLeader($_POST['usr']);
			}
		}

		if (isset($result))
			$this->setMsg('valid', $result);
	}
	catch (Exception $e) {
		$this->setMsg('warning', ILang::_($e->getMessage()));
	}

	$this->alliance->initInfos();
	$members = $this->alliance->getMembers();
	$this->setData('members', $members);
} else {

	$this->setMsg('warning', ILang::_('NotLeader'));
}
?>