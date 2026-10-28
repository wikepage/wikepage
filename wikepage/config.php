<?php
/*
	Wikepage - Site configuration
	-----------------------------
	This is the ONLY file you need to edit to configure your site.
	index.php includes this file, so you never have to touch the engine.

	If this file is missing, index.php falls back to built-in defaults,
	so keep a copy when upgrading.
*/

// Sitename?
// ----------------
$pagevars=array(
"sitename" => "Sitename",
"siteheader" => "Slogan here (change these from <b>index.php</b>)",
"url" => "http://www.domain.com/index.php",
// Site Owner
// ----------
"author" => "Wikepage",
// Theme
"theme" => "2008-1",
//Maximum Number of Blog entries per page
"blogmax" => 9,
// Upload config
// ------------------
// Set maximum file limit (in bits) (~1Mb in default)
"maxlimit" => 9999999,
// Set allowed extensions (split using comma)
"allowed_ext" => "jpg,gif,png,jpeg,pdf,doc,xls,ppt,odb,odm,odt,ods,odp",
// Allow file overwrite? yes/no 
"overwrite" => "yes",
// Default Language
"lang_def" => "en",
// Timezone according to Greenwich
"timezone" => +2,
"timezone_str" => "CEST"
);
?>
