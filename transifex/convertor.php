<?php
/**
 * Package		Convertor
 * Subpackage	~
 * File			convertor.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2013 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-10-20 - Eighke
 */
require '_items.php';
require '_pages.php';

define('PATH_CONVERT', '../datas/lang/');

$langs = ['English', 'French', 'Italian', 'Polish', 'Thai'];

foreach ($langs as $lang) {
	if (!file_exists($lang)) {
		echo 'Skipping '. $lang . '<br />';
		continue;
	}

	$entries = scandir($lang);

	foreach ($entries as $entry) {
		if ($entry != "." && $entry != "..") {

			list($type, $file) = explode('.', $entry);

			if ($type == 'builds')
				convert_items($lang, $entry, $type, $file);
			elseif ($type == 'researchs')
				convert_items($lang, $entry, $type, $file);
			elseif ($type == 'units')
				convert_items($lang, $entry, $type, $file);
			elseif ($type == 'page')
				convert_page($lang, $entry, $type, $file);
		}
	}
}
?>