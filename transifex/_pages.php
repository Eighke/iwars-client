<?php
/**
 * Package		Convertor
 * Subpackage	Pages
 * File			_pages.php
 *
 * Licence		Mozilla Public License, v. 2.0; see http://mozilla.org/MPL/2.0/
 * Copyright	Copyright (C) 2013 - 2013 Frédéric Vandebeuque. All rights reserved.
 * Contrib		Frédéric V. (fred.vdb@newebtime.com)
 * 				Eighke (eighke@multi-site.net)
 *
 * Version		2013-10-20 - Eighke
 */
function convert_page($lang, $entry, $type, $file) {

	$json = json_decode( file_get_contents($lang.'/'.$entry) );

	$array = '<?php'."\r";
	$array .= '$lang += ';
	$array .= var_export((array) $json, true);
	$array .= ';'."\r";
	$array .= '?>';
	
	if ( false === file_put_contents(PATH_CONVERT.$lang.'/pages/'.$file.'.php', $array) )
		echo 'Error';
}
?>