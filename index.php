<?php
/*	Wikepage N "Hertzsprung-Russel" Wiki/Blog Hybrid Engine
	Copyleft (C) 2008 - 2004. Ankara, Turkiye.
	http://www.wikepage.org/
	For latest licence please visit [ www.gnu.org/copyleft/gpl.html ]
	derived from Tipiwiki2 : Copyleft (C) 2003, Andreas Zwinkau, andi@buxach.de, GPL
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
error_reporting(0);
/*
 ++++++++ DON'T MAKE CHANGES BELOW HERE ! ++++++++ 
*/
/* required for XHTML 1.0 Strict compilance */
$opus="14";
ini_set('arg_separator.output','&amp;');
ini_set('url_rewriter.tags', "a=href,area=href,frame=src,input=src,fieldset=");
session_start();
$wiki_get="wiki";
$version_info=explode('.', phpversion());
if ($version_info[0] < 5 ) {
	$servpath=$HTTP_SERVER_VARS['PATH_TRANSLATED'];
}else{
	$servpath=$HTTP_SERVER_VARS['SCRIPT_FILENAME'];
}

$info=pathinfo( $servpath );
$path=$info[ 'dirname' ];

if ($version_info[0] < 4 || ($version_info[0] > 3 && $version_info[1] < 1)) {
	$_POST=$HTTP_POST_VARS;
	$_GET=$HTTP_GET_VARS;
}

if( isset( $_GET["lng"] ) ){
	$pagevars["lang_def"]=$_GET["lng"];
	secure($pagevars["lang_def"]);
	$_SESSION['lang']=$pagevars["lang_def"];
}

if(strlen($_SESSION['lang']) < 5 && strlen($_SESSION['lang']) <> 0){
	$pagevars["lang_def"]=$_SESSION["lang"];
	secure($pagevars["lang_def"]);
}

$langu=$pagevars["lang_def"];

//if lng variable is wrong, take default
if (!file_exists("lang/$lang.inc")){
	$langu=$pagevars["lang_def"];
}

include('data/passwd.php');
include('lang/'.$langu.'.inc');

// some special chars
function htmlchars ($string) {
	return str_replace(array("&","\"","<",">","&laquo;","&raquo;"),
	array("&amp;","&quot;","&lt;","&gt;","&lt;","&gt;"), $string);
}
// little security enchancement
function secure ($string){
	return str_replace(array("..","%2E%2E",".%2E","%2E.",".php",".phtml",".php3",".log","_log"),
	array("","","","","_php","_phtml","_php3","-log-","-log-"), $string);
}

function delpagefile($depa,$defi){
	global $data_dir,$lang;
	if($depa!=""){
		$willdelete="$data_dir/".$depa;
		@unlink(secure($willdelete));
	}
	if($defi!=""){
		$willdelete="data/files/".$defi;
		@unlink(secure($willdelete));
	}
	die($lang['processesok']." <p> <a href=\"index.php\">".$lang['returnhomepage']."</a>");
}

//----
//Created by Global Syndication's RSS Parser
function startElement($parser, $nam, $attrs) {
   	global $rss_channel, $currently_writing, $main;
   	switch($nam) {
   		case "RSS":
   		case "RDF:RDF":
   		case "ITEMS":
   			$currently_writing = "";
   			break;
   		case "CHANNEL":
   			$main = "CHANNEL";
   			break;
   		case "IMAGE":
   			$main = "IMAGE";
   			$rss_channel["IMAGE"] = array();
   			break;
   		case "ITEM":
   			$main = "ITEMS";
   			break;
   		default:
   			$currently_writing = $nam;
   			break;
   	}
}

function endElement($parser, $nam) {
   	global $rss_channel, $currently_writing, $item_counter;
   	$currently_writing = "";
   	if ($nam == "ITEM") {
   		$item_counter++;
   	}
}

function characterData($parser, $rssdata) {
	global $rss_channel, $currently_writing, $main, $item_counter;
	if ($currently_writing != "") {
		switch($main) {
			case "CHANNEL":
				if (isset($rss_channel[$currently_writing])) {
					$rss_channel[$currently_writing] .= $rssdata;
				} else {
					$rss_channel[$currently_writing] = $rssdata;
				}
				break;
			case "IMAGE":
				if (isset($rss_channel[$main][$currently_writing])) {
					$rss_channel[$main][$currently_writing] .= $rssdata;
				} else {
					$rss_channel[$main][$currently_writing] = $rssdata;
				}
				break;
			case "ITEMS":
				if (isset($rss_channel[$main][$item_counter][$currently_writing])) {
					$rss_channel[$main][$item_counter][$currently_writing] .= $rssdata;
				} else {
					$rss_channel[$main][$item_counter][$currently_writing] = $rssdata;
				}
				break;
		}
	}
}
function RSSParse($rssfile, $itemcoun) {
	global $rss_channel, $lang, $currently_writing, $main, $item_counter, $rssdata;
	set_time_limit(300);
	if (isset($rss_channel)) unset($rss_channel);
	$rss_channel = array();
	$currently_writing = "";
	$main = "";
	$rssdata ="";
	$rssfile=str_replace("&amp;", "&", $rssfile);
	$xml_parser = xml_parser_create();
	xml_set_element_handler($xml_parser, "startElement", "endElement");
	xml_set_character_data_handler($xml_parser, "characterData");
	if (!($fr[$rssfile] = fopen($rssfile, "r"))) {
		return($lang['couldnotxml']);
	}
	while ($rssdata = fread($fr[$rssfile], 4096)) {			
		if (!xml_parse($xml_parser, $rssdata, feof($fr[$rssfile]))) {
			return(sprintf($lang['xmlerror']." %s ".$lang['atline']." %d",xml_error_string(xml_get_error_code($xml_parser)),xml_get_current_line_number($xml_parser)));
		}
	}
	fclose($fr[$rssfile]);
	xml_parser_free($xml_parser);
	$news="";
	$itemcoun++;
	if ($itemcoun > count($rss_channel["ITEMS"]) || $itemcoun == "1")$itemcoun=count($rss_channel["ITEMS"]);
	if (isset($rss_channel["ITEMS"])) {
		if (count($rss_channel["ITEMS"]) > 0) {
		for($i = 0;$i < $itemcoun;$i++) {
			if (isset($rss_channel["ITEMS"][$i]["LINK"])) {
				if( strpos($rssfile, "news.google") == FALSE ){
					$news .= "\n <a href=\"".$rss_channel["ITEMS"][$i]["LINK"]."\">".$rss_channel["ITEMS"][$i]["TITLE"]."</a><br />";
				}
			} else {
				if( strpos($rssfile, "news.google") == FALSE ){
					$news .="\n".$rss_channel["ITEMS"][$i]["TITLE"]."<br />";
				}
			}
			$news .=$rss_channel["ITEMS"][$i]["DESCRIPTION"]."\n<p>";
		}
	} else {
		$news .= $lang['nonews'];
	}
	}
	return $news;
}
//----

function findpage() {
	global $wiki_get, $name, $data_dir, $langu;
	require ('lang/'.$langu.'.inc');
	$name=basename($name);
	$content="";
	$formular="<form method=\"get\" action=\"index.php\">\n<input type=\"hidden\" name=\"$wiki_get\" value=\"$name\" /><table id=\"find\">\n<tr>\n<td>".$lang['searchpage']."</td>\n<td><input type=\"text\" name=\"PageName\" /></td>\n</tr><tr>\n<td>".$lang['orsearchcontent']."</td>\n<td><input type=\"text\" name=\"PageContent\" /></td>\n</tr><tr>\n<td colspan=\"2\"><input type=\"submit\" value=\"".$lang['search']."\" /></td>\n</tr>\n</table>\n</form>\n";
	// get all pages in folder
	$handle=opendir("$data_dir");
	while( $newdir=readdir($handle) )
		if(preg_match("/([\w]+)/",$newdir) )
			$allpages[]=$newdir;
// Look at wanted pages
	if( $_GET["PageName"]!="" ) {
		$pagename=$_GET["PageName"];
		$content .= "<h3>".$lang['searchingpage']." $pagename </h3>\n<ul>\n";
		foreach ($allpages as $page)
			if (preg_match("/$pagename/i",$page) )
			$content .= "<li><a href=\"index.php?$wiki_get=$page\">$page</a></li>\n";
		$content .= "</ul>\n";
	}
	// Look at wanted content
	if ( $_GET["PageContent"]!="" ) {
		$pagecontent=$_GET["PageContent"];
		$content .= "<h3>".$lang['searchingcontent']." $pagecontent </h3>\n<ul>\n";
		foreach ($allpages as $page) {
			$current=implode( "", file("$data_dir/$page") );
			if (preg_match("/$pagecontent/i",$current) )
				$content .= "<li><a href=\"index.php?$wiki_get=$page\">$page</a></li>\n";
		}
		$content .= "</ul>\n";
	}
	if( $content=="" )
		$content=$formular;
	return $content;
}

function recentchanges() {
	global $data_dir, $wiki_get, $pagevars;
	$content="";
	$handle=opendir($data_dir);
	$allpages=array();
	while( $newfile=readdir($handle) )
		if(preg_match("/([\w]+)/",$newfile) )
			$allpages[]=$newfile;
	$max_pages=sizeof($allpages) / 3;
	if( $max_pages < 30 )
		$max_pages=30;
	$counter=0;
	$date=gmmktime(12,0,0,date('m'),date('d'));
	$day=0;
	while( $counter < $max_pages && $day < 40 ) {
		$today=array();
		foreach( $allpages as $page ) {
			$filetime=filemtime("$data_dir/$page");
			if( (($filetime + 43199) > $date) && (($filetime - 43200) < $date) )
				$today[]=$page;
		}
		if( sizeof($today) > 0 ) {
			$content .= "<h3>".gmdate("d.m.Y",$date)."</h3>\n<ul>\n";
			foreach( $today as $page )
				$content .= "<li><a href=\"index.php?$wiki_get=$page\">$page</a> (".gmdate("G:i", filemtime("$data_dir/$page")+(3600*$pagevars["timezone"]))." ".$pagevars["timezone_str"].")</li>";
			$content .= "</ul>\n";
		}
		$counter += sizeof($today);
		$date -= 86400;
		$day += 1;
	}
	$content .= "</ul>\n";
	return $content;
}

function allpages() {
	global $data_dir, $wiki_get;
	// list all pages
	$content="<ul>\n";
	$handle=opendir($data_dir);
	while( $newfile=readdir($handle) )
		if(preg_match("/([\w]+)/",$newfile) )
			$allpages[]=$newfile;
	sort($allpages);
	foreach( $allpages as $page )
		$content .= "<li><a href=\"index.php?$wiki_get=$page\">$page</a></li>";
		$content .= "</ul><p>";
	return $content;
}

function yonetim() {
	global $data_dir, $wiki_get, $adminpassword, $passworks, $TOC, $langu, $page_admin, $opus;
		require ('lang/'.$langu.'.inc');
	//admin part
	if($adminpassword){
		if (!$ver = fopen("http://www.wikepage.org/latest.txt", "r")) {
		$content .=$lang['couldnotversioninfo']."<p> ";
	}
		$latest = fread($ver, 4096);
		if ($opus < $latest){
		$content .=$lang['newversion']."<p> ";
			}
		$content .= "</p><form method=\"post\" action=\"index.php\">\n<fieldset style=\"display: none;\">\n<input type=\"hidden\" name=\"wiki\" value=\"".$page_admin."\" />\n</fieldset>\n<table id=\"find\">\n<tr><td colspan=\"2\"><b>".$lang['password']."</b></td></tr><tr>\n<td>".$lang['oldadminpass']."</td>\n<td><input type=\"password\" name=\"password0\" /></td>\n</tr><tr><td colspan=\"2\"><b>".$lang['changepass']."</b></td></tr><tr>\n<td>".$lang['adminpass']."</td>\n<td><input type=\"password\" name=\"password1\" /></td>\n</tr><tr>\n<td>".$lang['againadminpass']."</td>\n<td><input type=\"password\" name=\"password2\" /></td>\n</tr><tr><td colspan=\"2\"><b>".$lang['othersett']."</b></td></tr><tr>\n<td>".$lang['passless']."</td>\n<td><input type=\"checkbox\" name=\"passwrks\" value=\"checkbox\" ";
		if ($passworks=="1"){
			$content .= "checked=\"checked\" /></td>\n</tr>";
			}else{
			$content .= " /></td>\n</tr>";
			}
			$content .= "<tr>\n<td>".$lang['activate_TOC']."</td>\n<td><input type=\"checkbox\" name=\"aTOC\" value=\"checkbox\" ";
		if ($TOC=="1"){
			$content .= "checked=\"checked\" /></td>\n</tr>";
			}else{
			$content .= " /></td>\n</tr>";
			}
			$content .= "<tr>\n<td>".$lang['delpage']."</td>\n<td><input type=\"text\" name=\"delpage\" /></td>\n</tr><tr>\n<td>".$lang['delfile']."</td>\n<td><input type=\"text\" name=\"delfile\" /></td>\n</tr><tr>\n<td colspan=\"2\"><input type=\"submit\" value=\"".$lang['change']."\" /></td>\n</tr>\n</table>\n</form><p>";
		}else{
			$content .= "<form method=\"post\" action=\"index.php\">\n<input type=\"hidden\" name=\"wiki\" value=\"".$page_admin."\" /><table id=\"find\">\n<tr>\n<tr><td colspan=\"2\"><b>".$lang['setpass']."</b></td></tr><td>".$lang['adminpass']."</td>\n<td><input type=\"password\" name=\"password1\" /></td>\n</tr><tr>\n<td>".$lang['againadminpass']."</td>\n<td><input type=\"password\" name=\"password2\" /></td>\n</tr><tr>\n<td colspan=\"2\"><input type=\"submit\" value=\"".$lang['change']."\" /></td>\n</tr>\n</table>\n</form><p>";
		}
return $content;
}

function blogout($archive){
global $data_dir, $wiki_get, $pagevars, $langu;
	require ('lang/'.$langu.'.inc');
	$content="";
	$handle=opendir($data_dir);
	$allpages=array();
	while( $newfile=readdir($handle) )
		if(preg_match("/(Entry-[\w]+)/",$newfile) )
			$allpages[]=$newfile;
	rsort($allpages);
	if( sizeof($allpages) > 0 ) {
		if($archive)
		{
			$archive=array();
			foreach( $allpages as $page )
			{
		    $a=explode("_", "$data_dir/$page");
				$b=explode("-", $a[0]);
				$c=explode("-", $a[1]);
				$d=mktime($c[0],$c[1],$c[2],$b[2], $b[3], $b[1]);
				
				//Add page to array[year][month][timestamp]
				$archive[$b[1]][$b[2]][$d] = $page;
		  }
		  
		  foreach($archive as $year_key => $years)
		  {
		    $content = $content."<H2>".$year_key."</H2>";
		    foreach($years as $month_key => $months)
		    {
		      $content = $content."<H3>".date("F",mktime(0,0,0,$month_key,10,$year_key)+(3600*$timezone))."</H3><ul><ul>";
		      foreach($months as $page_key => $page)
		      {
		        $filem=file("$data_dir/$page");
		        $title = ltrim($filem[0],'!');
				//Allow Images in Title
				$title=preg_replace("/\[([\w\.:\/~@\,\?\%=\+\-;#&]+\.(png|gif|jpg))\]/","<img src=\"data/files/\\1\" class=\"wikiimage\" alt=\"\" />",$title);
		        $content = $content."<li><a href=\"index.php?$wiki_get=$page\">".$title."</a>&nbsp;&nbsp;&nbsp;<small><em>[".gmdate("D, d M Y", $page_key+(3600*$timezone))."]</em></small></li>";
		      }
		      $content = $content."</ul></ul><BR>";
		    }
		  }
		}
		else
		{
			$blogpos=$_GET['blog'];
			if($blogpos <= 0){$blogpos=0;}
			//foreach( $allpages as $page ){
			for($count=$blogpos; $count<=$blogpos+$pagevars["blogmax"]-1; $count++)
			{
				$page=$allpages[$count];
				if($page != "")
				{
					$filem=file("$data_dir/$page");
					$title=ltrim(stripslashes($filem[0]),'!');
					//Allow Images in Title
					$title=preg_replace("/\[([\w\.:\/~@\,\?\%=\+\-;#&]+\.(png|gif|jpg))\]/","<img src=\"data/files/\\1\" class=\"wikiimage\" alt=\"\" />",$title);
					$content .="<a href=\"index.php?$wiki_get=$page\"><h2>".$title."</h2></a>";
					unset($filem[0]);
					$raw=implode("", $filem );
					// filter!
					$raw=filter( trim($raw), blog );
					$a=explode("_", "$data_dir/$page");
					$b=explode("-", $a[0]);
					$c=explode("-", $a[1]);
					$content .="<small><em>".gmdate("D, d M Y - G:i:s", mktime($c[0],$c[1],$c[2],$b[2], $b[3], $b[1])+(3600*$pagevars["timezone"]))." ".$pagevars["timezone_str"]."</em>&nbsp;&nbsp;[<a href=\"index.php?$wiki_get=$page&edit=Yes\"><!--lang_edit--></a>]</small>\n";
					$content .=$raw;
				}
			}
			$content .= "<BR><div align=\"right\">";
			if($blogpos-$pagevars["blogmax"] >= 0)
			{
				$content .= "<a href=\"index.php?blog=".($blogpos-$pagevars["blogmax"])."\">".$lang['prev']."</a>&nbsp;&nbsp;";
			}
			
			$totalpages = floor((sizeof($allpages)/$pagevars["blogmax"]));
			if($totalpages*$pagevars["blogmax"] < sizeof($allpages)){$totalpages++;}
			
			$content .= (($blogpos/$pagevars["blogmax"])+1)." of ".$totalpages;
			
			if($blogpos+$pagevars["blogmax"] < sizeof($allpages))
			{
				$content .= "&nbsp;&nbsp;<a href=\"index.php?blog=".($blogpos+$pagevars["blogmax"])."\">".$lang['next']."</a>";
			}
			$content .= "</div>";
		}
	}
	return $content;
}

// Wiki Style to HTML
function filter($raw, $type = 'wiki') {
	global $wiki_get, $langu;
	require ('lang/'.$langu.'.inc');
	$filtered=stripslashes(htmlchars($raw));
	// php-special
	$filtered="<p>\n".str_replace("\r\n","\n",$filtered)."</p>";
	//variable
	$filtered=preg_replace("/\[(file)\=([\w\.:\/~@\,\?\%=\+\-;#&]+)\|([\w\s]+)\]/i","<a href=\"data/files/\\2\">\\3 <img src=\"data/files/ext.gif\" class=\"wikiimage\" alt=\"\" /></a>", $filtered);
	$filtered=preg_replace("/\[([\w\s]+)\=([\w\s]+)\|([\w\s]+)\]/i","<a href=\"index.php?\\1=\\2\">\\3</a>", $filtered);
	$filtered=preg_replace("/\[([\w\s]+)\=([\w\s]+)\|([\w\.:\/~@\,\?\%=\+\-;#&]+\.(png|gif|jpg))\]/i","<a href=\"index.php?\\1=\\2\" rel=\"nofollow\"><img src=\"data/files/\\3\" class=\"wikiimage\" alt=\"\" /></a>", $filtered);
	//template
	$filtered=preg_replace("/\[([\w\s]+)\|([\w\.:\/~@\,\?\%=\+\-;#&]+\.(htm|html))\]/i","<a href=\"index.php?$wiki_get=\\1&amp;template=\\2\">\\1</a>", $filtered);
	// [ url | link ] outlinks
	$filtered=preg_replace("/\[((http|ftp|https):\/\/[\w\.\:\@\?~\%=\+\-\/]+)\|([\w ]+)\]/i","<a href=\"\\1\" rel=\"nofollow\">\\3 <img src=\"data/files/ext.gif\" class=\"wikiimage\" alt=\"outlink\" /></a>", $filtered);
	$filtered=preg_replace("/\[((http|ftp|https):\/\/[\w\.:\/~@\,\?\%=\+\-;#&]+)\|([\w\:\#\- ]+)\]/i","<a href=\"\\1\" rel=\"nofollow\">\\3 <img src=\"data/files/ext.gif\" class=\"wikiimage\" alt=\"outlink\" /></a>", $filtered);
	$filtered=preg_replace("/\[([\w\.\:\~@\?~\%=\+\-\/]+)\|([\w ]+)\]/i","<a href=\"index.php?$wiki_get=\\1\">\\2</a>", $filtered);
	// linked picture [url|picture]
	$filtered=preg_replace("/\[((http|ftp|https):\/\/[\w\.\:\@\?~\%=\+\-\/]+)\|([\w\.:\/~@\,\?\%=\+\-;#&]+\.(png|gif|jpg))\]/i","<a href=\"\\1\" rel=\"nofollow\"><img src=\"data/files/\\3\" class=\"wikiimage\" alt=\"\" /></a>", $filtered);
	$filtered=preg_replace("/\[([\w\.\:\~@\?~\%=\+\-\/]+)\|([\w\.:\/~@\,\?\%=\+\-;#&]+\.(png|gif|jpg))\]/i","<a href=\"index.php?$wiki_get=\\1\" rel=\"nofollow\"><img src=\"data/files/\\2\" class=\"wikiimage\" alt=\"\" /></a>", $filtered);
	$filtered=preg_replace("/\{([\w\.:\/~@\,\?\%=\+;#&]+\.(png|gif|jpg))\|([\w ]+)\|([\w\.:\/~@\,\?\%=\+;#&]+\.(png|gif|jpg))\}/i","<div id=\"images\"><a href=\"index.php?image=\\4\"><img src=\"data/files/\\1\" class=\"thumb\" alt=\"\" /></a><br />\\3 <a href=\"index.php?image=\\4\"><img src=\"data/files/magnify.gif\"></a></div>",$filtered);
	// pictures [ url ]
	$filtered=preg_replace("/\[((http|ftp|https):\/\/[\w\.\:\@\?~\%=\+\-\/]+\.(png|gif|jpg))\]/","<img src=\"\\1\" class=\"wikiimage\" alt=\"\" />",$filtered);
	$filtered=preg_replace("/\[([\w\.:\/~@\,\?\%=\+\-;#&]+\.(png|gif|jpg))\]/","<img src=\"data/files/\\1\" class=\"wikiimage\" alt=\"\" />",$filtered);
	//Flash video	
	$filtered=preg_replace("/\[([\w\.:\/~@\,\?\%=\+\-;#&]+\.(flv))\]/i","<p id=\"player1\"><a href=\"http://www.macromedia.com/go/getflashplayer\">Get Flash Player</a> to view video.</span></p><script type=\"text/javascript\">var s1 = new SWFObject(\"flvplayer.swf\",\"single\",\"320\",\"260\",\"7\");s1.addParam(\"allowfullscreen\",\"true\");s1.addVariable(\"file\",\"data/files/\\1\");s1.addVariable(\"height\",\"260\");s1.addVariable(\"width\",\"320\");s1.write(\"player1\");</script>", $filtered);
	//Flash object
	$filtered=preg_replace("/\[([\w\.:\/~@\,\?\%=\+\-;#&]+\.(swf))\|([\w ]+)\|([\w ]+)\]/i","<object width=\"\\3\" height=\"\\4\" classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0\"> <param name=\"movie\" value=\"data/files/\\1\" />  <embed src=\"data/files/\\1\" width=\"\\3\" height=\"\\4\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" /></object>", $filtered);
	// Youtube
	$filtered=preg_replace("/\[(youtube)\=([\w\s]+)\]/i","<object width=\"425\" height=\"355\"><param name=\"movie\" value=\"http://www.youtube.com/v/\\1\&rel=1\"></param><param name=\"wmode\" value=\"transparent\"></param><embed src=\"http://www.youtube.com/v/\\1\&rel=1\" type=\"application/x-shockwave-flash\" wmode=\"transparent\" width=\"425\" height=\"355\"></embed></object>",$filtered);
	// plain URLs
	$filtered=preg_replace("/\[((http|ftp|https):\/\/[\w\.\:\@\?~\%=\+\-\/]+)\]/i","<a href=\"\\1\" rel=\"nofollow\">\\1 <img src=\"data/files/ext.gif\" class=\"wikiimage\" alt=\"outlink\" /></a>", $filtered);
	$filtered=preg_replace("/\[((http|ftp|https):\/\/[\w\.:\/~@\,\?\%=\+\-;#&]+)\]/i","<a href=\"\\1\" rel=\"nofollow\">\\1 <img src=\"data/files/ext.gif\" class=\"wikiimage\" alt=\"outlink\" /></a>", $filtered);
	// email
	$filtered=preg_replace("/\[([\w ]+)@([\w\.\w ]+)\]/i","<i>\\1-AT-\\2</i>", $filtered);
	// []'ed words
	$filtered=preg_replace("/\[([\w\s]+)\]/","<a href=\"index.php?$wiki_get=\\1\">\\1</a>", $filtered);
	// Headers <h1><h2><h3>
	if ($type=="blog"){
		$filtered=preg_replace("/\n(!!!)(.+)\n/","\n</p><strong>\\2</strong>\n<p>",$filtered);
		$filtered=preg_replace("/\n(!!)(.+)\n/","\n</p><strong>\\2</strong>\n<p>",$filtered);
		$filtered=preg_replace("/\n(!)(.+)\n/","\n</p><strong>\\2</strong>\n<p>",$filtered);
	}else{
		$filtered=preg_replace("/\n(!!!)(.+)\n/","</p><h3>\\2</h3><p>",$filtered);
		$filtered=preg_replace("/\n(!!)(.+)\n/","</p><h2>\\2</h2><p>",$filtered);
		$filtered=preg_replace("/\n(!)(.+)\n/","</p><h1>\\2</h1><p>",$filtered);
		// html new lines <br />
		$filtered = str_replace("\n","<br />\n",$filtered);
		$filtered=str_replace("\n\n","</p>\n<p>",$filtered);
	}
	// Decorations (bold, italic, underlined, boxed)
	$filtered=preg_replace("/\*\*(.+)\*\*/U","<strong>\\1</strong>", $filtered);
	$filtered=preg_replace("/__(.+)__/U","<span style=\"text-decoration: underline;\">\\1</span>", $filtered);
	$filtered=preg_replace("/\'\'(.+)\'\'/U","<em>\\1</em>", $filtered);
	$filtered=preg_replace("/\:\:(.+)\:\:/U","<span class=\"box\">\\1</span>", $filtered);
	//font color
	$filtered=preg_replace("/\#\#(.+)\#\#/U","<span style=\"color: \\1;\">", $filtered);
	$filtered=preg_replace("/(.+)\#\#/U","\\1</span>", $filtered);
	// horizontal line
	$filtered=preg_replace("/\n---.*\n/","\n<hr class=\"wiki\" />\n",$filtered);
	// lists <ul>
	$filtered=preg_replace("/(?<=[\n>])\* (.+)\n/","<li>\\1</li>",$filtered);
	$filtered=preg_replace("/<li>(.+)\<\/li>/","</p><ul>\\0</ul><br /><p>",$filtered);
	// take out pre and post new lines
	$filtered=preg_replace("/^(\n+)/","",$filtered);
	$filtered=preg_replace("/\n{3,}/","\n\n",$filtered);
	// <pre> blocks
	$filtered=preg_replace("/(?<=\n) (.*)(\n)/","</p><pre>\\1</pre><p>", $filtered);
	$filtered=preg_replace("/<\/pre><p>(\s)*<\/p><pre>/","", $filtered);
	//RSS parsing
	if( strpos($filtered, "{{") !== FALSE ){
		preg_match_all("/\{\{(.+)\|(.+)\}\}/i",$filtered,$a,PREG_PATTERN_ORDER);
		$d=array();
		foreach ($a as $b){ 
			$c = count ($b);
			$d = array_merge($d, $b);
		}
			for ($i=0;$i<$c;$i++){
				$e=preg_split("/\{\{(.+)\|(.+)\}\}/i",$d[$i],-1,PREG_SPLIT_DELIM_CAPTURE);
				$filtered=str_replace($d[$i], RSSParse($e[1],$e[2]), $filtered);
			}				
	}
	// add specials, control first for improper usage
	if( strpos($filtered, "&lt;".$lang['abbrev_findpage']."&gt;") !== FALSE )
		$filtered=str_replace("&lt;".$lang['abbrev_findpage']."&gt;", findpage(), $filtered);
	if( strpos($filtered, "&lt;".$lang['abbrev_admin']."&gt;") !== FALSE )
		$filtered=str_replace("&lt;".$lang['abbrev_admin']."&gt;", yonetim(), $filtered);
	if( strpos($filtered, "&lt;".$lang['abbrev_allpages']."&gt;") !== FALSE )
		$filtered=str_replace("&lt;".$lang['abbrev_allpages']."&gt;", allpages(), $filtered);
	if( strpos($filtered, "&lt;".$lang['abbrev_recentchanges']."&gt;") !== FALSE )
		$filtered=str_replace("&lt;".$lang['abbrev_recentchanges']."&gt;", recentchanges(), $filtered);
	if( strpos($filtered, "&lt;".$lang['blog_out']."&gt;") !== FALSE )
		$filtered=str_replace("&lt;".$lang['blog_out']."&gt;", blogout(), $filtered);
	if( strpos($filtered, "&lt;".$lang['blog_archive']."&gt;") !== FALSE )
		$filtered=str_replace("&lt;".$lang['blog_archive']."&gt;", blogout(true), $filtered);
	//html table
	$filtered=preg_replace("/\|\|\|\|(.+)\|\|\|\|/U","</p>\n<table>\n<tr><td>\\1</td></tr>\n</table><p>", $filtered);
	$filtered=preg_replace("/(.+)\|\|/U","\\1</td><td>", $filtered);
	$filtered=preg_replace("/\n<\/table><p><br \/>(\s)*<\/p>\n<table>/","", $filtered);
	// html beauty
	$filtered=str_replace("</li>","</li>\n",$filtered);
	$filtered=str_replace("ul>","ul>\n",$filtered);
	$filtered=str_replace("<h","\n\n<h", $filtered);
	$filtered=preg_replace("/(<\/h[1-3]>)/","\\1\n", $filtered);
	$filtered=preg_replace("/<p>(\s)*<\/p>/","",$filtered);
	$filtered=preg_replace("/\n\n(\n)+/","\n\n",$filtered);
	return $filtered;
}

// output of program
function output($data, $file) {
	global $lang, $langu, $encoding, $passworks, $TOC, $pagevars;
	require ('lang/'.$langu.'.inc');
	$pagename=basename($file);
	$modified="";
	if( file_exists($file) )
		$modified=gmdate("D, j M Y H:i:s",filemtime($file)+(3600*$pagevars["timezone"]))." ".$pagevars["timezone_str"];
	if($passworks=="0"){
		$buf=$lang['pass']."<input type=\"password\" name=\"mypassword\" />";
	}else{
		$buf="";
	}
	foreach($lang as $lang_key => $lang_value){
		switch($lang_key){
		case "pass":
			$data=str_replace("<!--lang_pass-->", $buf, $data);
		break;
		case "TOC":
			if ($TOC=="1")
				$data=str_replace("<!--lang_TOC-->",$lang['TOC'],$data);
			else
				$data=str_replace("<!--lang_TOC-->","",$data);
		break;
		default:
			$data=str_replace("<!--lang_".$lang_key."-->", $lang_value, $data);
		}
	}
	foreach($pagevars as $page_var => $page_value){
		$data=str_replace("<!--".$page_var."-->", $page_value, $data);
	}
	$data=str_replace("<!--encoding-->",$encoding,$data);
	$data=str_replace("<!--wikiname-->",$pagename,$data);
	$data=str_replace("<!--lastupdate-->",$modified,$data);	
	echo $data;
}
// load page content
function showpage($file) {
	global $pagevars, $wiki_get, $langu;
	// load file
	$raw=implode("", file($file) );
	// load menu
	$raw2=implode("", file('data/'.$langu.'_menu.txt') );
	// filter!
	$image=$_GET['image'];
	secure($image);
	if ($image){
	$raw="[".$image."]";
	}
	$content=filter( $raw ) . $content;
	$menucontent=filter( $raw2 ) . $menucontent;
	// load template
	// Checks Query string for Template variable, and uses specified template or defaults to index.html
	$templatefile=$_GET['template'];
	if($templatefile=="")
		$templatefile="index.html";
	$template=implode( "", file('theme/'.$pagevars["theme"].'/'.$templatefile) );
	$whole=str_replace("<!--wikicontent-->",$content,$template);
	$whole=str_replace("<!--menucontent-->",$menucontent,$whole);
	output( $whole, $file );
}

function editpage($file) {
	global $path,$data_dir, $page_admin, $langu, $pagevars;
	require ('lang/'.$langu.'.inc');
	$already="";
	$mainmenu="";
	$filer="$data_dir/".$lang['blog_input_page'];
	if (substr_count($file, "Entry-")!=0 or $file==$filer ){
		if($file!=$filer)
			if( file_exists( $file ) ) $already=file( "$file" );
	if( file_exists( "newentry.html" ) )
		$template=file("newentry.html");
	else
		echo " (Newentry) ".$lang['filenotfound']."<br />\n";
	$template=implode( "", $template );
	$blogimage=explode("]", ltrim(stripslashes($already[0]),'!'));
	$blogimage=ltrim($blogimage[0],"[");
	$subject=preg_replace("/\[([\w\.:\/~@\,\?\%=\+\-;#&]+\.(png|gif|jpg))\]/","", ltrim(stripslashes($already[0]),'!'));
	$whole=str_replace("<!--subject-->",ltrim($subject),$template);
	$whole=str_replace("<!--submit-->",$lang['submit'],$whole);
	$whole=str_replace("<!--already-->",stripslashes(implode("",array_slice($already,1))),$whole);
	//Get Images in blog image directory
	$handle=opendir("data/files/");
	$images="<option>".$lang['noimage']."</option>";
	while( $newfile=readdir($handle) )
	{
		if(preg_match("/([\w\.:\/~@\,\?\%=\+\-;#&]+\.(png|gif|jpg))/",$newfile) )
		{
			if($newfile == $blogimage)
			{
				$images .= "<option selected>".$newfile."</option>";
			}else{
				$images .= "<option>".$newfile."</option>";
			}
		}
	}
	$whole=str_replace("<!--blog_imagelist-->", $images, $whole);
	}else{
		 if( file_exists( $file ) ) $already=implode( "", file( "$file" ) );
		//load menu file
		$mainmenu=implode("", file('data/'.$langu.'_menu.txt') );
		if( file_exists( "edit.html" ) )
			$template=file("edit.html");
		else
			echo " (Edit) ".$lang['filenotfound']."<br />\n";
		$template=implode( "", $template );
		$whole =str_replace("<!--mainmenu-->",stripslashes($mainmenu),$template);
		$whole=str_replace("<!--submit-->",$lang['submit'],$whole);
		$whole =str_replace("<!--already-->",stripslashes($already),$whole);
	}
	$uploadcode=$lang['uploadnote']."<input type=\"file\" name=\"userfile\" /><input type=\"hidden\" name=\"wiki\" value=\"".$pagename."\" />";
	$whole =str_replace("<!--uploadsystem-->",stripslashes($uploadcode),$whole);
	// locking file
	if( file_exists($file) && !is_writeable($file) )
		$whole=preg_replace("/<form .*<\/form>/s","<h3>".$lang['sorrypagelocked']."</h3>", $whole);
	output($whole, $file );
}

function htmltotxt($string) {
	$search=array ('@<script[^>]*?>.*?</script>@si', // Strip out javascript
	'@<[\/\!]*?[^<>]*?>@si', // Strip out HTML tags
	'@([\r\n])[\s]+@', // Strip out white space
	'@&(quot|#34);@i', // Replace HTML entities
	'@&(amp|#38);@i','@&(lt|#60);@i','@&(gt|#62);@i','@&(nbsp|#160);@i','@&(iexcl|#161);@i','@&(cent|#162);@i','@&(pound|#163);@i','@&(copy|#169);@i','@&#(\d+);@e');
	$replace=array ('','','\1','"','&','<','>',' ',chr(161),chr(162),chr(163),chr(169),'chr(\1)');
	$string=preg_replace($search, $replace, $string);
	return $string;
}

$edit=False;
$name="$data_dir/$page_default";

if (isset($_GET['rss'])){
	$rssname=$_GET['rss'];
	header("Content-type: text/xml");
	echo '<?xml version="1.0" encoding="'.$encoding.'"?>';
?>
<rss version="0.91">
<channel>
<title><?php echo $pagevars["sitename"]; ?></title>
<link><?php echo $pagevars["url"]; ?></link>
<description><?php echo $pagevars["siteheader"]; ?></description>
<language><?php echo $langu; ?></language>
<?php
if ($rssname=="blog" or $rssname=="Blog"){
$content="";
$handle=opendir($data_dir);
$allpages=array();
while( $newfile=readdir($handle) )
	if(preg_match("/(Entry-[\w]+)/",$newfile) )
		$allpages[]=$newfile;
$max_pages=sizeof($allpages);
if( $max_pages > 20 )
	$max_pages=20;
$counter=0;
while( $counter < $max_pages ) {
	$today=array();
	foreach( $allpages as $page ) {
		$filetime=filemtime("$data_dir/$page");
		$today[]=$page;
	}
	$today=array_reverse($today);
	if( sizeof($today) > 0 ) {
		foreach( $today as $page ){
			$filem=file("$data_dir/$page");
			$raw=implode("", $filem );
			// filter!
			$raw=filter( $raw );
			$content .="<item>";
			$content .="<title>".htmlchars(ltrim(stripslashes($filem[0]),'!'))."</title>";
			$content .="<description>".htmlchars(htmltotxt($raw))."</description>";
			$content .="<link>".$pagevars[url]."?".$wiki_get."=".$page."</link>";
			$content .="<pubDate>".gmdate("D, d M Y H:i:s", filemtime("$data_dir/$page"))." +0000</pubDate>";
			$content .="</item>";
		}
	}
	$counter += sizeof($today);
	$date -= 86400;
	$day += 1;
}
$content.="</channel></rss>";
echo $content;
}else{
	$content="";
	$handle=opendir($data_dir);
	$allpages=array();
	while( $newfile=readdir($handle) )
		if(preg_match("/([\w]+)/",$newfile) )
			$allpages[]=$newfile;
	$max_pages=sizeof($allpages) / 3;
	if( $max_pages < 20 )
		$max_pages=20;
	$counter=0;
	$date=mktime(12,0,0,date('m'),date('d'));
	$day=0;
	while( $counter < $max_pages && $day < 40 ) {
		$today=array();
		foreach( $allpages as $page ) {
			$filetime=filemtime("$data_dir/$page");
			if( (($filetime + 43199) > $date) && (($filetime - 43200) < $date) )
				$today[]=$page;
		}
		if( sizeof($today) > 0 ) {
			foreach( $today as $page ){
				$raw=implode("", file("$data_dir/$page") );
				// filter!
				$raw=filter( $raw );
				$content .="<item>";
				$content .="<title>$page</title>";
				$content .="<description>".substr(htmlchars(htmltotxt($raw)), 0, 230)."...</description>";
				$content .="<link>".$pagevars["url"]."?".$wiki_get."=".$page."</link>";
				$content .="<pubDate>".strftime("%a, %d %b %Y ", $date).date("G:i:s", filemtime("$data_dir/$page")+(3600*$pagevars["timezone"]) )." +0000</pubDate>";
				$content .="</item>";
			}
		}
		$counter += sizeof($today);
		$date -= 86400;
		$day += 1;
	}
	$content.="</channel></rss>";
	echo $content;
}
die();
}

if( isset( $_GET[$wiki_get] ) )
	$name="$data_dir/".$_GET[$wiki_get];
if(!$adminpassword){
	$name="$data_dir/".$lang['page_admin'];
}
// little security enchancement
	secure ($name);
if( isset($_POST["content"]) ) {
// password
	if (strlen($_POST["content"])==0){
		editpage($name);
		exit;
	}
	
	if ($_POST['mypassword'] !=""){
	$testpass= crypt($_POST['mypassword'], "CW");
	}else{
		$testpass="0";
	}
	if($testpass==$adminpassword || $passworks=="1"){
		if( !file_exists( $name )){
			$dirname= "$data_dir/".$lang['blog_input_page'];
		if ($name==$dirname){
			//here
			$date=date("Y-m-d_H-i-s");
			$namePath=".$path/$data_dir/Entry-".$date;
			$name="$data_dir/Entry-".$date;
		}else{
			//thanks to M.T.Sandikkaya for path correction
			$namePath=".$path/$name";
		}
		@touch($namePath);
		chmod($name, 0666);
		$already=implode( "", file( "$name" ) );
		}
		if ( $_POST["blogedit"]== "yes"){
			$data=rtrim($_POST["content"])."\n";
			if($_POST["blogimage"] != $lang['noimage'])
				$data2="[".rtrim($_POST["blogimage"])."] ".rtrim($_POST["subject"])."\n";
			else
				$data2=rtrim($_POST["subject"])."\n";
			// join and write
			$handle=fopen("$name",'w');
			$data="!".$data2.$data;
			if( ! fwrite($handle, $data ) ) {
				$data_perm=decoct(fileperms($name)) % 1000;
				$data_owner=(fileowner($name));
				$data_group=(filegroup($name));
				die($lang['cantwriteinpage']);
			}
			fclose($handle);
		}else{
			$data=rtrim($_POST["content"])."\n";
			$data2=rtrim($_POST["menucontent"])."\n";
			// write file first
			$handle=fopen("$name",'w');
			if( ! fwrite($handle, $data ) ) {
				$data_perm=decoct(fileperms($name)) % 1000;
				$data_owner=(fileowner($name));
				$data_group=(filegroup($name));
				die($lang['cantwriteinpage']);
			}
			fclose($handle);
			// then write menu...
			$menufile='data/'.$langu.'_menu.txt';
			$handle=fopen("$menufile",'w');
			if( ! fwrite($handle, $data2 ) ) {
				$data_perm=decoct(fileperms($name)) % 1000;
				$data_owner=(fileowner($name));
				$data_group=(filegroup($name));
				die($lang['cantwriteinpage']);
			}
			fclose($handle);
		}
		//if upload something, then do!
		$pagename=basename($name);
		$filesize=$_FILES['userfile']['size']; // Get file size (in bits)
		$filename=strtolower($_FILES['userfile']['name']); // Get file name; make it all lowercase
		if($filename || !$filename==""){ // File not selected
			if(file_exists("data/files/".$filename) && $pagevars["overwrite"]=="no")
				$error .=$lang['uploadexists'];
			// Check if file size
			if($filesize < 1){ // File is empty
				$error .= $lang['uploadempty'];
			}elseif($filesize > $pagevars["maxlimit"]){ // File is more than maximum
				$error .= $lang['uploadbig'];
			}
			$file_ext=explode(".", $filename); // Split filename at period (name.ext). Use explode since it's faster then preg_split. //060218 Maz
			$last_token=count($file_ext)-1; // Find the last token in the $file_ext array. Filename can contain "." //060218 Maz
			$pagevars["allowed_ext"]=explode(",", $pagevars["allowed_ext"]); // Create array of extensions
			foreach($pagevars["allowed_ext"] as $ext){
				if(strcmp($ext, $file_ext[$last_token])==0) {
					$match="1"; // File is allowed
					break; // abort loop if match is found //060218 Maz
				}
			}
			// File extension not allowed
			if(!$match)
				$error .= $lang['uploadnotallowed'];
			if($error){
				die ($lang['uploaderror']."<br>".$error."<a href=\"index.php?".$wiki_get."=".$pagename."\">".$lang['backtopage']." ".$pagename."</a>"); // Display error messages
			}else{
				if(move_uploaded_file($_FILES['userfile']['tmp_name'], "data/files/".$filename)){ // Upload file
					die ($lang['uploadsuccess']."<a href=\"index.php?".$wiki_get."=".$pagename."\">".$lang['backtopage']." ".$pagename."</a>");
				}else{
					print ($lang['uploadlimit']."<a href=\"index.php?".$wiki_get."=".$pagename."\">".$lang['backtopage']." ".$pagename."</a>"); // Display error
				}
			}
		}
	}else{
		die($lang['passmodeerror']." <p> <a href=\"index.php\">".$lang['returnhomepage']."</a>");
	}
}

if( ! file_exists( "$name" ) )
	$edit=True;
if( $_GET["edit"]=="Yes" )
	$edit=True;
if( $_POST['wiki']==$page_admin ){
	if($_POST['password0']=="" ){
		if( isset($adminpassword) ) die($lang['filloldpass']." <p> <a href=\"index.php\">".$lang['returnhomepage']."</a>");
	//First password change mode.
	if($_POST['password1']!="" && $_POST['password2']!="" ){
		if($_POST['password1']==$_POST['password2']){
			$passworks="1";
			$TOC="1";
			$fp=fopen("data/passwd.php","w+");
			fwrite ($fp, '<?php $adminpassword="'.crypt($_POST['password1'], "CW").'"; $passworks="'.$passworks.'"; $TOC="'.$TOC.'"?>');
			die($lang['passsuccess']." <p> <a href=\"index.php\">".$lang['returnhomepage']."</a>");
		}
		die($lang['twononemptypassmustequal']." <p> <a href=\"index.php\">".$lang['returnhomepage']."</a>");
	}else{
		die($lang['twononemptypassmustequal']." <p> <a href=\"index.php\">".$lang['returnhomepage']."</a>");
	}
	}else{
		if($adminpassword)
			$testpass= crypt($_POST['password0'], "CW");
		if($_POST['passwrks']==""){
			$passworks="0";
		}else{
			$passworks="1";
		}
		if($_POST['aTOC']==""){
			$TOC="0";
		}else{
			$TOC="1";
		}
		if($testpass!=$adminpassword)
			die($lang['oldpasswrong']." <p> <a href=\"index.php\">".$lang['returnhomepage']."</a>");
	if($_POST['password1']!="" && $_POST['password2']!=""){
		if($_POST['password1']==$_POST['password2']){
			$fp=fopen("data/passwd.php","w+");
			fwrite ($fp, '<?php $adminpassword="'.crypt($_POST['password1'], "CW").'"; $passworks="'.$passworks.'"; $TOC="'.$TOC.'"?>');
			delpagefile($_POST['delpage'],$_POST['delfile']);
			fclose($fp);
		}else{
			die(" <p> <a href=\"index.php\">".$lang['returnhomepage']."</a>");
		}
	}else{
		$fp=fopen("data/passwd.php","w+");
		fwrite ($fp, '<?php $adminpassword="'.$adminpassword.'"; $passworks="'.$passworks.'"; $TOC="'.$TOC.'"?>');
		delpagefile($_POST['delpage'],$_POST['delfile']);
		fclose($fp);
	}
	exit;
	}
}
// force reload [ by hybrid-2k (Fabio Pereira) ]
header ("Expires: Mon, 26 Jul 1990 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-Type: text/html; charset=".$encoding);

// edit or show page?
if( $edit ){
	secure($name);
	editpage( $name );
}else{
	showpage( $name );
}
?>
