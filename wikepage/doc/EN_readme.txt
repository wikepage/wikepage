Cyrocom Wikisite/Personal site Builder
WIKEPAGE Version 2006.1a Opus 7 (Code: Fermi-Dirac)
-----------------------------------------------------------------------------------------
Wiki is a kind of knowledge sharing formation. Wikepage is a wiki-standart, easy
to use and small wiki software derived from Tipiwiki2 (http://tipiwiki.sourceforge.net/).
Wikepage has some security features that Tipiwiki does not have, like password protected
structure, and 4 patched important security flaw, table support, upload support, multilanguage
and multisite support...etc...

Wikepage has two modes:

-Wiki Mode: Pages can change without entering password.
-Personal Mode: Pages can change only with entering password. 

*INSTALL:
-Open index.php file with notepad-like pogram and change the site information, language
 and other options for your site.
-Put all files in your hosting directory with using a FTP client.
-Make Chmod 777, (at least 755 but sometimes it doesn't works) the files in data and
 the files in the subfolders of data folder.
-Be sure that your PHP don't work in safe_mode. In safe_mode wikepage can't make pages.
-If you want to add new language to your site, download from http://www.wikepage.org/
 and then extract it to base folder of wikepage. Then you can change default language variable
 in index.php's source code. And if you want to make a multilanguage site you can easily change
 language in your site by [index.php?lng=en|English] [index.php?lng=tr|Turkce] type links.
-Visit your site. Go to "Administration area" with using "Admin" link and change your
 password.
-Your site is working now in Wiki mode!
-You can change mode in Administration area with entering your password.
-In wiki mode you must enter password "everytime" to change a page. 

You can found more documentation in your installed site.

*LICENCE
Wikepage is a open software licenced with GNU/GPL. For more information:
[ www.gnu.org/copyleft/gpl.html ]

*IN ADDITION
-If you chmod the folders true, wikepage 90% works.
-File create, upload and delete support may not be work with safe_mode=on

