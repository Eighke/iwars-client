<?php
/**
 * Package		Convertor
 * Subpackage	Items
 * File			_messages.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2013 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-10-20 - Eighke
 */
function convert_messages($lang, $entry, $type, $file) {

	$json = json_decode( file_get_contents($lang.'/'.$entry) );

	$items = array();

	foreach ($json as $key => $value) {

		list(, $id, $sid, $field) = explode('_', $key);
		
		$items[$id][$sid][$field] = $value;
	}

	ksort($items);

	$gArray = '<?php'."\r";
	$gArray .= '$lmsgs = ['."\r";

	foreach ($items as $id => $item) {

		$gArray .= '	'. $id .'	=> ['."\r";

		ksort($item);

		foreach ($item as $sid => $sub) {
			$gArray .= '		'. $sid .'	=> (object) ['."\r";
			$gArray .= "			'title' => '". str_replace("'", "\\'", $sub['title']) ."',"."\r";
			$gArray .= "			'body' => '". str_replace("'", "\\'", $sub['body']) ."'"."\r";
			$gArray .= '		],'."\r";
		}

		$gArray .= '	],'."\r";
	}

	$gArray .= '];'."\r";
	$gArray .= '?>';

	if ( false === file_put_contents(PATH_CONVERT.$lang.'/msgs/global.php', $gArray) )
		echo 'Error';
}
?>