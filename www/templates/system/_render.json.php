<?php
/**
 * Package      Templates
 * Subpackage   System
 * File         _render.json.php
 *
 * Licence      Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright    Copyright (C) 2005 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib      Frédéric V. (fred.vdb@newebtime.com)
 *              Eighke (eighke@multi-site.net)
 *
 * Version      2014-02-10 - Eighke
 */
if (!session_id()) exit();

// TODO, il faudra normaliser tout ça
// Si le MD5 envoyer est le même que le MD% générer, on ne renvoit pas les datas (car déjà a jour)
$data = (object) [
	'datas' => $this->_datas,
	'md5' => md5(json_encode($data)),
	'messages' => $this->_messages,
	'ressources' => $this->resources
];

echo json_encode($data);
?>