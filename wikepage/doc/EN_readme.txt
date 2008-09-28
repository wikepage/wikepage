Cyrocom Wiki & Homepage Software
-----------------------------------------------------------------------------------------

 л  л  л ллл л  л лллл лллл лллл лллл лллл
 л  л  л  л  л л  л    л  л л  л л    л   
 л  л  л  л  лл   ллл  лллл лллл л лл ллл 
 л  л  л  л  л л  л    л    л  л л  л л   
  лл лл  ллл л  л лллл л    л  л лллл лллл  Version 2005.1 (Code: Stranski-Krastanov)

-----------------------------------------------------------------------------------------
Wiki is a kind of knowledge sharing formation. Wikepage is a wiki-standart, easy
to use and small wiki software derived from Tipiwiki2 (http://tipiwiki.sourceforge.net/).
Wikepage has some security features that Tipiwiki does not have, like password protected
structure, and 2 two patched important security flaw. And extra features of course...

Wikepage has two modes:

-Wiki Mode: Pages can change without entering password.
-Personal Mode: Pages can change only with entering password. 


*INSTALL:
-Open index.php file with notepad-like pogram and change the site information, language
 and option for your site.
-Put the files in your hosting directory with using a FTP client.
-Make Chmod 777, the files in data and the files in the subfolders of data folder.
-Be sure that your PHP don't work in safe_mode. In safe_mode wikepage can't make pages.
-If you want to change design, change the "show.html","edit.html" and "wikepage.css"
 files under "lang/en/" directory.
-Visit your site. Go to "Administration area" with using "Admin" link and change your
 password.
-Your site is working now in Wiki mode!
-You can change mode in Administration area with entering your password.
-In wiki mode you must enter password to change a page. 

You can found more documentation in your installed site.

*LICENCE
Wiksis is a open software licenced with GNU/GPL. For more information:
[ www.gnu.org/copyleft/gpl.html ]

*IN ADDITION
-If you chmod the folders truly, wikepage 90% works.
-Some hosting firms uses safe_mode in their PHP config. At this condition
 wikepage can't create new files under data folder.
- In Administration area there are 3 password field. Last two of them must
 be used if and only if you want to change your password.
