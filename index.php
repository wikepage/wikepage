<?php
/*		Cyrocom-WIKEPAGE 2006.1a Opus 7 "Fermi-Dirac" Wiki/Personal Site Engine
		Copyleft (C) 2006, 2005, 2004. Ankara, Turkey.
        http://www.wikepage.org/
		For latest licence please visit [ www.gnu.org/copyleft/gpl.html ]

		Tipiwiki2 : Copyleft (C) 2003, Andreas Zwinkau, andi@buxach.de, GPL
*/

// Logo or Sitename?
// ----------------
// Put // for deactivate logo and remove // infront of $sitename 
// and $siteheader for activate sitename on page.
//$logo="logo.gif";
$sitename="My Site";
$siteheader="Your site's slogan here.";

// Site Owner
// ----------
$author="CyrocomWikepage";

// Banner Information
// ------------------
$bannerwriting="ADVERTISEMENT";
//Use http:// for external links.. 
$bannerlink="http://www.wikepage.org/";
// Remove // before $bannerimage for activate banner.
$bannerimage="wikebanner.gif";

// Theme
$theme="2006-1";

// Upload config
// ------------------
// Set maximum file limit (in bits)
$maxlimit = 1000000; 
// Set allowed extensions (split using comma)
$allowed_ext = "jpg,gif,png,jpeg,pdf,doc,xls,ppt,odb,odm,odt,ods,odp";
// Allow file overwrite? yes/no 
$overwrite = "no"; 

error_reporting(1);

// Default Language
$lang_def="en";

// Timezone according to Greenwich
$timezone = -6;

/*
 ++++++++ DON'T MAKE CHANGES BELOW HERE ! (unless you're a developer) ++++++++ 
*/
session_start();

$wiki_get = "wiki";
$bannerimage = "data/files/".$bannerimage;

if ($version_info[0] < 5 ) {
$servpath = $HTTP_SERVER_VARS['PATH_TRANSLATED'];

}else{
	$servpath = $HTTP_SERVER_VARS['SCRIPT_FILENAME'];
}

$info = pathinfo( $servpath );
$path = $info[ 'dirname' ];

if ($version_info[0] < 4 || ($version_info[0] > 3 && $version_info[1] < 1)) {
        $_POST = $HTTP_POST_VARS;
        $_GET = $HTTP_GET_VARS;
}

if( isset( $_GET["lng"] ) ){
	$lang_def=$_GET["lng"];
	$_SESSION['lang'] = $lang_def;
}

if(strlen($_SESSION['lang']) < 5 && strlen($_SESSION['lang']) <> 0){
	$lang_def = $_SESSION["lang"];
}

$langu=$lang_def;

//if lng variable is wrong, take default
@ $fp = fopen("lang/$lang.inc","a", 1);
if (!$fp){
	 $langu=$lang_def;
}
fclose($fp);
               
include('data/passwd.php');
include('lang/'.$langu.'.inc');
$version_info = explode('.', phpversion());


// some special chars
function htmlchars ($string) {
$string= str_replace("&", "&amp;", $string);
$string= str_replace("\"", "&quot;", $string);
$string= str_replace("<", "&lt;", $string);
$string= str_replace(">", "&gt;", $string);
return $string;
}

// little security enchancement
function secure ($string){
$string = str_replace("..","",$string);
$string = str_replace("%2E%2E","",$string);
$string = str_replace(".%2E","",$string);
$string = str_replace("%2E.","",$string);
$string = str_replace(".php","_php",$string);
$string = str_replace(".phtml","_phtml",$string);
$string = str_replace(".php3","_php3",$string);
return $string;
}

function delpagefile($depa,$defi){
	global $data_dir,$lang;
	if($depa != ""){
		$willdelete="$data_dir/".$depa;
		@unlink(secure($willdelete));
	}
		
	if($defi != ""){
		$willdelete="data/files/".$defi;
		@unlink(secure($willdelete));
	}
	die($lang['processesok']." <p> <a href=\"index.php\">".$lang['returnhomepage']."</a>");
}

function findpage() {
        global $wiki_get, $name, $data_dir, $langu;
        require ('lang/'.$langu.'.inc');
        $name = basename($name);
        $content = "";
        $formular = "<form method=\"get\" action=\"index.php\">\n<input type=\"hidden\" name=\"$wiki_get\" value=\"$name\" /><table id=\"find\">\n<tr>\n<td>".$lang['searchpage']."</td>\n<td><input type=\"text\" name=\"PageName\" /></td>\n</tr><tr>\n<td>".$lang['orsearchcontent']."</td>\n<td><input type=\"text\" name=\"PageContent\" /></td>\n</tr><tr>\n<td colspan=\"2\"><input type=\"submit\" value=\"".$lang['search']."\" /></td>\n</tr>\n</table>\n</form>\n";
        // get all pages in folder
        $handle = opendir("$data_dir");
        while( $newdir = readdir($handle) )
                if(preg_match("/([\w]+)/",$newdir) )
                        $allpages[] = $newdir;
        // Look at wanted pages
        if( $_GET["PageName"] != "" ) {
                $pagename = $_GET["PageName"];
                $content .= "<h3>".$lang['searchingpage']." $pagename </h3>\n<ul>\n";
                foreach ($allpages as $page)
                        if (preg_match("/$pagename/i",$page) )
                                $content .= "<li><a href=\"index.php?$wiki_get=$page\">$page</a></li>\n";
                        $content .= "</ul>\n";
        }
        // Look at wanted content
        if ( $_GET["PageContent"] != "" ) {
                $pagecontent = $_GET["PageContent"];
                $content .= "<h3>".$lang['searchingcontent']." $pagecontent </h3>\n<ul>\n";
                foreach ($allpages as $page) {
                        $current = implode( "", file("$data_dir/$page") );
                        if (preg_match("/$pagecontent/i",$current) )
                                $content .= "<li><a href=\"index.php?$wiki_get=$page\">$page</a></li>\n";
                }
                $content .= "</ul>\n";
        }
        if( $content == "" )
                $content = $formular;
        return $content;
}

function recentchanges() {
        global $data_dir, $timezone, $wiki_get;
        $content = "";
        $handle = opendir($data_dir);
        $allpages = array();
        while( $newfile = readdir($handle) )
                if(preg_match("/([\w]+)/",$newfile) )
                        $allpages[] = $newfile;
        $max_pages = sizeof($allpages) / 3;
        if( $max_pages < 30 )
                $max_pages = 30;
        $counter = 0;
        $date = mktime(12,0,0,date('m'),date('d'));
        $day = 0;
        while( $counter < $max_pages && $day < 40 ) {
                $today = array();
                foreach( $allpages as $page ) {
                        $filetime = filemtime("$data_dir/$page");
                        if( (($filetime + 43199) > $date) && (($filetime - 43200) < $date) )
                                $today[] = $page;
                }
                if( sizeof($today) > 0 ) {
                        $content .= "<h3>".date("d.m.Y",$date)."</h3>\n<ul>\n";
                        foreach( $today as $page )
                                $content .= "<li><a href=\"index.php?$wiki_get=$page\">$page</a> (".date("G:i", filemtime("$data_dir/$page")+(3600*$timezone) ).")</li>";
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
        $content = "<ul>\n";
        $handle = opendir($data_dir);
        while( $newfile = readdir($handle) )
                if(preg_match("/([\w]+)/",$newfile) )
                        $allpages[] = $newfile;
        sort($allpages);
        foreach( $allpages as $page )
                $content .= "<li><a href=\"index.php?$wiki_get=$page\">$page</a></li>\n";
        $content .= "</ul>\n";
        return $content;
}

function yonetim() {
        global $data_dir, $wiki_get, $adminpassword, $passworks, $langu, $page_admin;
		require ('lang/'.$langu.'.inc');
        // admin part     
	    if($adminpassword){
			$content .= "<form method=\"post\" action=\"index.php\">\n<input type=\"hidden\" name=\"wiki\" value=\"".$page_admin."\" /><table id=\"find\">\n<tr><td colspan=\"2\"><b>".$lang['password']."</b></td></tr><tr>\n<td>".$lang['oldadminpass']."</td>\n<td><input type=\"password\" name=\"password0\" /></td>\n</tr><tr><td colspan=\"2\"><b>".$lang['changepass']."</b></td></tr><tr>\n<td>".$lang['adminpass']."</td>\n<td><input type=\"password\" name=\"password1\" /></td>\n</tr><tr>\n<td>".$lang['againadminpass']."</td>\n<td><input type=\"password\" name=\"password2\" /></td>\n</tr><tr><td colspan=\"2\"><b>".$lang['othersett']."</b></td></tr><tr>\n<td>".$lang['passless']."</td>\n<td><input type=\"checkbox\" name=\"passwrks\" value=\"checkbox\" ";
			if ($passworks == "1"){
			$content .= "checked></td>\n</tr>";
			}else{
			$content .= "></td>\n</tr>";
			}
		
			$content .= "<tr>\n<td>".$lang['delpage']."</td>\n<td><input type=\"text\" name=\"delpage\" /></td>\n</tr><tr>\n<td>".$lang['delfile']."</td>\n<td><input type=\"text\" name=\"delfile\" /></td>\n</tr><tr>\n<td colspan=\"2\"><input type=\"submit\" value=\"".$lang['change']."\" /></td>\n</tr>\n</table>\n</form>\n";
		}else{
			$content .= "<form method=\"post\" action=\"index.php\">\n<input type=\"hidden\" name=\"wiki\" value=\"".$page_admin."\" /><table id=\"find\">\n<tr>\n<tr><td colspan=\"2\"><b>".$lang['setpass']."</b></td></tr><td>".$lang['adminpass']."</td>\n<td><input type=\"password\" name=\"password1\" /></td>\n</tr><tr>\n<td>".$lang['againadminpass']."</td>\n<td><input type=\"password\" name=\"password2\" /></td>\n</tr><tr>\n<td colspan=\"2\"><input type=\"submit\" value=\"".$lang['change']."\" /></td>\n</tr>\n</table>\n</form>\n";
		}
		
        
return $content;
}

// Wiki Style to HTML
function filter($raw) {
        global $wiki_get, $langu;
        require ('lang/'.$langu.'.inc');
        $filtered = stripslashes(htmlchars("\n\n".$raw));
        // php-special
        $filtered = str_replace("\r\n","\n",$filtered);	
        // [ url | link ] outlinks
        $filtered = preg_replace("/\[((http|ftp|https|mailto):\/\/[\w\.\:\@\?~\%=\+\-\/]+)\|([\w ]+)\]/i","<a href=\"\\1\" rel=\"nofollow\">\\3 <img src=\"data/files/ext.gif\" border=\"0\" class=\"wikiimage\" /></a>", $filtered);
        $filtered = preg_replace("/\[([\w\.\:\~@\?~\%=\+\-\/]+)\|([\w ]+)\]/i","<a href=\"\\1\">\\2</a>", $filtered);
        // linked picture [ url | [picture] ]  
        $filtered = preg_replace("/\[((http|ftp|https|mailto):\/\/[\w\.\:\@\?~\%=\+\-\/]+)\|([\w\.:\/~@\,\?\%=\+\-;#&]+\.(png|gif|jpg))\]/i","<a href=\"\\1\" rel=\"nofollow\"><img src=\"data/files/\\3\" border=\"0\" class=\"wikiimage\" /></a>", $filtered);
        $filtered = preg_replace("/\[([\w\.\:\~@\?~\%=\+\-\/]+)\|([\w\.:\/~@\,\?\%=\+\-;#&]+\.(png|gif|jpg))\]/i","<a href=\"\\1\" rel=\"nofollow\"><img src=\"data/files/\\2\" border=\"0\" class=\"wikiimage\" /></a>", $filtered);
  		// pictures [ url ]
        $filtered = preg_replace("/\[([\w\.:\/~@\,\?\%=\+\-;#&]+\.(png|gif|jpg))\]/","<img src=\"data/files/\\1\" border=\"0\" class=\"wikiimage\" />",$filtered);
        // plain URLs
        $filtered = preg_replace("/\[((http|ftp|https|mailto):\/\/[\w\.:\/~@\,\?\%=\+\-;#&]+)\|([\w\:\#\- ]+)\]/i","<a href=\"\\1\">\\3</a>", $filtered);
        // []'ed words
        $filtered = preg_replace("/\[([\w]+)\]/","<a href=\"index.php?$wiki_get=\\1\">\\1</a>", $filtered);
        // Headers <h1><h2><h3>
        $filtered = preg_replace("/\n(!!!)(.+)\n/","</p>\n<h3>\\2</h3>\n<p>",$filtered);
        $filtered = preg_replace("/\n(!!)(.+)\n/","</p>\n<h2>\\2</h2>\n<p>",$filtered);
        $filtered = preg_replace("/\n(!)(.+)\n/","</p>\n<h1>\\2</h1>\n<p>",$filtered);
        // Decorations (bold, italic, underlined, boxed)
        $filtered = preg_replace("/\*\*(.+)\*\*/U","<strong>\\1</strong>", $filtered);
        $filtered = preg_replace("/__(.+)__/U","<u>\\1</u>", $filtered);
        $filtered = preg_replace("/\'\'(.+)\'\'/U","<em>\\1</em>", $filtered);
        $filtered = preg_replace("/\:\:(.+)\:\:/U","<span class=\"box\">\\1</span>", $filtered);
        // horizontal line
        $filtered = preg_replace("/\n---.*\n/","\n<hr class=\"wiki\"/>\n",$filtered);
        // lists <ul>
        $filtered = preg_replace("/(?<=[\n>])\* (.+)\n/","<li>\\1</li>",$filtered);
        $filtered = preg_replace("/<li>(.+)\<\/li>/","</p><ul>\\0</ul><p>",$filtered);
        // take out pre and post new lines
        $filtered = preg_replace("/^(\n+)/","",$filtered);
        $filtered = preg_replace("/\n{3,}/","\n\n",$filtered);
        // <pre> blocks
        $filtered = preg_replace("/(?<=\n) (.*)(\n)/","<pre>\\1</pre>", $filtered);
        // html new lines <br />
        $filtered = str_replace("\n","<br />\n",$filtered);
        $filtered = str_replace("</pre><pre>","\n", $filtered);
        // add specials, control first for improper usage
        if( strpos($filtered, "&lt;".$lang['abbrev_findpage']."&gt;") !== FALSE )
                $filtered = str_replace("&lt;".$lang['abbrev_findpage']."&gt;", findpage(), $filtered);
        if( strpos($filtered, "&lt;".$lang['abbrev_admin']."&gt;") !== FALSE )
                $filtered = str_replace("&lt;".$lang['abbrev_admin']."&gt;", yonetim(), $filtered);
        if( strpos($filtered, "&lt;".$lang['abbrev_allpages']."&gt;") !== FALSE )
                $filtered = str_replace("&lt;".$lang['abbrev_allpages']."&gt;", allpages(), $filtered);
        if( strpos($filtered, "&lt;".$lang['abbrev_recentchanges']."&gt;") !== FALSE )
                $filtered = str_replace("&lt;".$lang['abbrev_recentchanges']."&gt;", recentchanges(), $filtered);
       	//html table
       	$filtered = preg_replace("/\|\|\|\|(.+)\|\|\|\|/U","<table><tr><td>\\1</td></tr></table>", $filtered);
       	$filtered = preg_replace("/(.+)\|\|/U","\\1</td><td>", $filtered);
       	$filtered = preg_replace("/<\/table><br \/>\n<table>/","", $filtered);
       	//font color
       	$filtered = preg_replace("/\#\#(.+)\#\#/U","<font color=\\1>", $filtered);
       	$filtered = preg_replace("/(.+)\#\#/U","\\1</font>", $filtered);
       	// html beauty
       	$filtered = str_replace("</li>","</li>\n",$filtered);
       	$filtered = str_replace("ul>","ul>\n",$filtered);
       	$filtered = str_replace("<br />\n<h","\n<h", $filtered);
       	$filtered = preg_replace("/(<\/h[1-3]>)<br \/>\n/","\\1\n", $filtered);
       	$filtered = str_replace("<p></p>","",$filtered);


       	return $filtered;
}

// output of program
function output($data, $file) {
	global $sitename, $siteheader, $bannerwriting, $bannerimage, $lang, $langu, $encoding, $author, $logo, $theme, $passworks;	
	require ('lang/'.$langu.'.inc');
        $pagename = basename($file);
        $modified = "";
        if( file_exists($file) ) {
                $modified = date("H:i:s d/m/Y",filemtime($file));
        }
        $data = str_replace("<!--lang_edit-->",$lang['edit'],$data);
        $data = str_replace("<!--theme-->",$theme,$data);
        $data = str_replace("<!--lang_recent-->",$lang['recent'],$data);
        $data = str_replace("<!--lang_advsearch-->",$lang['advsearch'],$data);
        $data = str_replace("<!--lang_all-->",$lang['all'],$data);
        $data = str_replace("<!--lang_admin-->",$lang['admin'],$data);
        $data = str_replace("<!--lang_index-->",$lang['index'],$data);
        $data = str_replace("<!--lang_lastupdate-->",$lang['lastupdate'],$data);
        $data = str_replace("<!--lang_editing-->",$lang['editing'],$data);
        if($passworks == "0"){
	        $buf=$lang['pass']."<input type=\"password\" name=\"mypassword\">";
        }else{
	        $buf="";
        }
        $data = str_replace("<!--lang_pass-->",$buf,$data);
        $data = str_replace("<!--lang_mainmenu-->",$lang['mainmenu'],$data);
        $data = str_replace("<!--lang_pagecontents-->",$lang['pagecontents'],$data);
        $data = str_replace("<!--lang_search-->",$lang['search'],$data);
        $data = str_replace("<!--lang_navi-->",$lang['navi'],$data);
        $data = str_replace("<!--copyleft-->",$lang['copyleft'],$data);
        $data = str_replace("<!--encoding-->",$encoding,$data);
        $data = str_replace("<!--author-->",$author,$data);
        $data = str_replace("<!--wikiname-->",$pagename,$data);
        $data = str_replace("<!--sitename-->",$sitename,$data);
        $data = str_replace("<!--siteheader-->",$siteheader,$data);
        $data = str_replace("<!--bannerwriting-->",$bannerwriting,$data);
        $data = str_replace("<!--bannerimage-->",$bannerimage,$data);
        $data = str_replace("<!--lastupdate-->",$modified,$data);
        $data = str_replace("<!--logo-->",$logo,$data);
        $data = str_replace("<!--writingrules-->",$lang['writingrules'],$data);
        echo $data;
}
// load page content
function showpage($file) {
        global $theme, $wiki_get, $langu;
        $content = "";
        $menucontent ="";
        // load file
        $raw = implode("", file($file) );
        // load menu
        $raw2 = implode("", file('data/'.$langu.'_menu.txt') );
        // filter!
        $content = filter( $raw ) . $content;
        $menucontent = filter( $raw2 ) . $menucontent;
        // load template
        $template = implode( "", file('theme/'.$theme.'/index.html') );
        $whole = str_replace("<!--wikicontent-->",$content,$template);
        $whole = str_replace("<!--menucontent-->",$menucontent,$whole);
        output( $whole, $file );
}
// if edit clicked..
function editpage($file) {
        global $path, $page_admin, $langu, $lang, $encoding, $wiki_get;
		$pagename = basename($file);
        $template = "<html><head><title>Edit ".$pagename."?</title><meta http-equiv=\"Content-Type\" content=\"text/html; charset=".$encoding."\"></head><body><p>".$lang['clickoktoedit']." \"".$pagename."\"</p><form name=\"form1\" method=\"post\" action=\"\"><input type=\"submit\" name=\"Edit2\" value=\"OK\">  <input type=\"button\" value=\"".$lang['backtopage']."\" onClick=\"javascript: history.go(-1)\"><input type=\"hidden\" name=\"editpagename\" value=\"".$pagename."\"></form></body></html>";
        output($template, $file );
}

function editpage2($file) {
        global $path, $page_admin, $langu, $lang;
        $already = "";
        $mainmenu = "";
        if( file_exists( $file ) )
            $already = implode( "", file( "$file" ) );
        if( !file_exists( $file ) ){
	        //thanks to M.T.Sandikkaya for path correction
            $namePath = ".$path/$file";
            @touch($namePath);
            chmod($file, 0666);
            $already = implode( "", file( "$file" ) );
        }
        //load menu file
        $mainmenu = implode("", file('data/'.$langu.'_menu.txt') );
        if( file_exists( "edit.html" ) )
                $template = file("edit.html");
        else
                echo " (Edit) ".$lang['filenotfound']."<br />\n";
        $template = implode( "", $template );
        $uploadcode = "Select file for upload:<input type=\"file\" name=\"userfile\"><input type=\"hidden\" name=\"wiki\" value=\"".$pagename."\">";
        $whole =str_replace("<!--uploadsystem-->",stripslashes($uploadcode),$template);
        $whole =str_replace("<!--already-->",stripslashes($already),$whole);
        $whole =str_replace("<!--mainmenu-->",stripslashes($mainmenu),$whole);
        // locking file
        if( !is_writeable($file) )
                //note s modify!
                $whole = preg_replace("/<form .*<\/form>/s","<h3>".$lang['sorrypagelocked']."</h3>", $whole);
        output($whole, $file );
}

function banner() {
		global $bannerlink;
		$fp = fopen("data/bannercount.txt","r+");
		$count = fread($fp, filesize("data/bannercount.txt"));
		$count++;
        fclose($fp);
        $fp = fopen("data/bannercount.txt", "w+");
        fputs($fp, $count);
        fclose($fp);
        echo "<html><head><meta http-equiv=\"refresh\" content=\"0;URL=".$bannerlink.">";
        exit;
}

$edit = False;
$name = "$data_dir/$page_default";


if( isset( $_GET[$wiki_get] ) )
        $name = "$data_dir/".$_GET[$wiki_get];
// little security enchancement
        $name = str_replace("..","",$name);
        $name = str_replace("%2E%2E","",$name);
        $name = str_replace(".%2E","",$name);
        $name = str_replace("%2E.","",$name);
        $name = str_replace(".php","_php",$name);
        $name = str_replace(".phtml","_phtml",$name);
        $name = str_replace(".php3","_php3",$name);
if( isset($_POST["content"]) ) {
// password
	if ($_POST['mypassword'] !=""){
	$testpass= crypt($_POST['mypassword'], "CW");
	}else{
		$testpass="0";
	}
	if($testpass == $adminpassword || $passworks=="1"){
        $data = rtrim($_POST["content"])."\n";
        $data2 = rtrim($_POST["menucontent"])."\n";
        // write file first
        $handle = fopen("$name",'w');
        if( ! fwrite($handle, $data ) ) {
                $data_perm = decoct(fileperms($name)) % 1000;
                $data_owner = (fileowner($name));
                $data_group = (filegroup($name));
                die($lang['cantwriteinpage']);
        }
        fclose($handle);
        // then write menu...
         $menufile = 'data/'.$langu.'_menu.txt';
         $handle = fopen("$menufile",'w');
        if( ! fwrite($handle, $data2 ) ) {
                $data_perm = decoct(fileperms($name)) % 1000;
                $data_owner = (fileowner($name));
                $data_group = (filegroup($name));
                die($lang['cantwriteinpage']);
        }
        fclose($handle);
        
        //if upload something, then do!
		$pagename = basename($name);
        $filesize = $_FILES['userfile']['size']; // Get file size (in bits)
		$filename = strtolower($_FILES['userfile']['name']); // Get file name; make it all lowercase
		if($filename || !$filename==""){ // File not selected
		
		if(file_exists("data/files/".$filename) && $overwrite=="no"){ // Check if file exists
			$error .=$lang['uploadexists'];
		}

		// Check if file size
		if($filesize < 1){ // File is empty
   			$error .= $lang['uploadempty'];
		}elseif($filesize > $maxlimit){ // File is more than maximum
   			$error .= $lang['uploadbig'];
		}

		$file_ext = preg_split("/./",$filename); // Split filename at period (name.ext)
		$allowed_ext = preg_split("/,/",$allowed_ext); // Create array of extensions
		foreach($allowed_ext as $ext){
   		if($ext==$file_ext[1]) $match = "1"; // File is allowed
		}

		// File extension not allowed
		if(!$match){
   		$error .= $lang['uploadnotallowed'];
		}

		if($error){
	    	die ($lang['uploaderror']."<br>".$error."<a href=\"index.php?".$wiki_get."=".$pagename."\">".$lang['backtopage']." ".$pagename."</a>"); // Display error messages
		}else{
   		if(move_uploaded_file($_FILES['userfile']['tmp_name'], $folder.$filename)){ // Upload file
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
        $edit = True;
if( $_GET["edit"] == "Yes" )
        $edit = True;
if( $_GET["banner"] == "Yes" ) banner();
    if( $_POST['wiki'] == $page_admin ){
	if($_POST['password0'] == "" ){
	if( isset($adminpassword) ) die($lang['filloldpass']." <p> <a href=\"index.php\">".$lang['returnhomepage']."</a>");
	//First password change mode.
		if($_POST['password1'] != "" && $_POST['password2'] != "" ){
		if($_POST['password1'] == $_POST['password2']){
		$passworks="1";
		$fp = fopen("data/passwd.php","w+");
           	fwrite ($fp, '<? $adminpassword = "'.crypt($_POST['password1'], "CW").'"; $passworks="'.$passworks.'";?>');
           	die($lang['passsuccess']." <p> <a href=\"index.php\">".$lang['returnhomepage']."</a>");
		}
		die($lang['twononemptypassmustequal']." <p> <a href=\"index.php\">".$lang['returnhomepage']."</a>");
	}else{
	die($lang['twononemptypassmustequal']." <p> <a href=\"index.php\">".$lang['returnhomepage']."</a>");
	}
	}else{
	
		if($adminpassword)
		$testpass= crypt($_POST['password0'], "CW");
		if($_POST['passwrks'] == ""){
			$passworks = "0";
		}else{
			$passworks = "1";
		}
		if($testpass != $adminpassword)
		die($lang['oldpasswrong']." <p> <a href=\"index.php\">".$lang['returnhomepage']."</a>");
		
	if($_POST['password1'] != "" && $_POST['password2'] != ""){
		if($_POST['password1'] == $_POST['password2']){
           	$fp = fopen("data/passwd.php","w+");
           	fwrite ($fp, '<? $adminpassword = "'.crypt($_POST['password1'], "CW").'"; $passworks="'.$passworks.'";?>');
           	delpagefile($_POST['delpage'],$_POST['delfile']);
        }else{
           die(" <p> <a href=\"index.php\">".$lang['returnhomepage']."</a>");
		}
		
		}else{
			$fp = fopen("data/passwd.php","w+");
           	fwrite ($fp, '<? $adminpassword = "'.$adminpassword.'"; $passworks="'.$passworks.'";?>');           	
			delpagefile($_POST['delpage'],$_POST['delfile']);
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
	if($_POST['Edit2']== "OK"){
		$name=$_POST['editpagename'];
		$name = "$data_dir/".$_GET[$wiki_get];
		secure($name);
		editpage2( $name );
	}else{
	editpage( $name );
	}
}else{
    showpage( $name );
}
?>