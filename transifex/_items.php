<?php
/**
 * Package		Convertor
 * Subpackage	Items
 * File			_items.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2013 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-10-20 - Eighke
 */
function convert_items($lang, $entry, $type, $file) {

	$json = json_decode( file_get_contents($lang.'/'.$entry) );

	$items = array();

	foreach ($json as $key => $value) {

		list(, $id, $field) = explode('_', $key);
		
		$items[$id][$field] = $value;
	}

	ksort($items);

	$gArray = '<?php'."\r";
	$gArray .= '$l'. $type .' = ['."\r";

	foreach ($items as $id => $item) {

		$array = '<?php'."\r";
		$array .= '$'. substr($type, 0, -1) .'	= (object) ['."\r";
		$array .= "	'name' => '". str_replace("'", "\\'", $item['name']) ."',"."\r";
		$array .= "	'desc' => '". str_replace("'", "\\'", $item['description']) ."'"."\r";
		$array .= '];'."\r";
		$array .= '?>';

		if ( false === file_put_contents(PATH_CONVERT.$lang.'/'.$type.'/infos/'.$id.'.php', $array) )
			echo 'Error';

		$gArray .= '	'. $id .'	=> (object) ['."\r";
		$gArray .= "		'name' => '". str_replace("'", "\\'", $item['name']) ."',"."\r";
		$gArray .= "		'desc' => '". str_replace("'", "\\'", $item['description']) ."'"."\r";
		$gArray .= '	],'."\r";
	}

	$gArray .= '];'."\r";
	$gArray .= '?>';

	if ( false === file_put_contents(PATH_CONVERT.$lang.'/'.$type.'/global.php', $gArray) )
		echo 'Error';
}
?>