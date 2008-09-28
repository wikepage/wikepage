<?php
/*
 Cyrocom Wikepage 2006-2 - spolszczenie
 (wykona³ Tomasz Milewski)
*/
$encoding = "iso-8859-2";
$data_dir = "data/pl";
$page_default = "Indeks";
$page_admin = "Administracja";
$lang['searchpage'] = "Znajd¼ stronê";
$lang['orsearchcontent'] = "lub szukaj tekstu ";
$lang['search'] = "Wyszukiwanie";
$lang['searchingpage'] = "Szukanie strony: ";
$lang['searchingcontent'] = "Szukanie tekstu: ";
$lang['oldadminpass'] ="Wpisz dotychczasowe has³o ";
$lang['adminpass'] = "Nowe has³o";
$lang['password'] = "Has³o";
$lang['changepass'] = "Zmiana has³a";
$lang['othersett'] = "Inne opcje";
$lang['setpass'] = "Zak³adanie has³a";
$lang['againadminpass'] = "Jeszcze raz to samo has³o (dla pewno¶ci) ";
$lang['passless'] = "Redagowanie stron bez podawania has³a";
$lang['delfile'] = "Skasuj plik (bez potwierdzania, bezpowrotnie!)";
$lang['delpage'] = "Skasuj stronê (bez potwierdzania, bezpowrotnie!)";
$lang['change'] = "Wykonaj";
$lang['abbrev_findpage'] = "szukajstron";
$lang['abbrev_admin'] = "admin";
$lang['abbrev_allpages'] = "wszystkiestrony";
$lang['abbrev_recentchanges'] = "ostatniezmiany";
$lang['filenotfound'] = " - nie znaleziono pliku!";
$lang['sorrypagelocked'] = "Strona jest teraz zablokowana!";
$lang['cantwriteinpage'] = "B³±d zapisu do pliku $name (prawa $data_perm w³a¶ciciela $data_owner i grupy $data_group)!";
$lang['passmodeerror'] = "B³±d: Witryna w trybie strony osobistej. Zmian tre¶ci mo¿na dokonywaæ wy³±cznie po wprowadzeniu poprawnego has³a.";
$lang['returnhomepage'] = "Powrót na stronê g³ówn±";
$lang['passsuccess'] = "Has³o zosta³o za³o¿one.";
$lang['twononemptypassmustequal'] = "Nale¿y wprowadziæ to samo has³o w pierwszym i drugim polu.";
$lang['oldpasswrong'] = "Obecne has³o podano b³êdnie.";
$lang['processesok'] = "Wykonano.";
$lang['filloldpass'] = "Proszê wprowadziæ obecne has³o!";
$lang['twopassmustequal'] = "Zawarto¶æ obu pól z has³ami musi byæ identyczna.";
$lang['uploadexists'] = "- Plik ju¿ istnieje";
$lang['uploadempty'] = "- Plik jest pusty.<br />";
$lang['uploadbig'] = "- Zbyt du¿y rozmiar pliku.<br />";
$lang['uploadnotallowed'] = "- Niedozwolony typ pliku.<br />";
$lang['uploaderror'] = "B³±d wysy³ania pliku: <br />";
$lang['uploadsuccess'] = "Operacja wykonana - plik wys³any.";
$lang['uploadlimit'] = "Wyst±pi³ b³±d - byæ mo¿e przekroczono dopuszczaln± wielko¶æ pliku. Spróbuj ponownie.";
$lang['edit'] = "Edycja ";
$lang['recent'] = "Ostatnie zmiany";
$lang['advsearch'] = "Zaawansowane wyszukiwanie ";
$lang['all'] = "Wszystkie strony";
$lang['admin'] = "Administracja ";
$lang['index'] = "Indeks ";
$lang['page_recent'] = "Ostatnie_zmiany";
$lang['page_advsearch'] = "Wyszukiwanie";
$lang['page_all'] = "Wszystkie_strony";
$lang['page_admin'] = "Administracja";
$lang['page_index'] = "Indeks";
$lang['lastupdate'] = "Ostatnio zmieniano: ";
$lang['editing'] = "- redagowanie ";
$lang['pass'] = "Wpisz has³o: ";
$lang['mainmenu'] = "G³ówne menu ";
$lang['pagecontents'] = "Tre¶æ strony ";
$lang['navi'] = "Nawigacja";
$lang['blogsubject']="Temat";
$lang['blogpage']="Tre¶æ";
$lang['blog_out']="zobacz_blog";
$lang['blog_input_page']="Pisz_Blog";
$lang['copyleft'] = "Udziela siê zezwolenia na kopiowanie, rozpowszechnianie i/lub modyfikacjê niniejszego dokumentu na zasadach okre¶lonych licencj± GNU Free Documentation License w&nbsp;wersji 1.1 lub pó¼niejszej, opublikowan± przez <a href=\"http://www.fsf.org/\">
 Free Software Foundation</a>. Niespe³niaj±cych jej warunków prosi siê o&nbsp;rezygnacjê z&nbsp;modyfikowania tre¶ci.<br />
 <small>Strona u¿ywa opartego na PHP (bez MySQL) systemu do budowy witryn i Wiki: <a href=\"http://www.cyrocom.com/\">Wikepage</a></small><br />";
$lang['writingrules'] = "<ul id=\"footer\" style=\"text-align: left; font-size: small; \">
		<li>Gwiazdk± - * - na pocz±tku linii oznaczamy pozycjê listy</li>
		<li>Odno¶niki: [W_nawiasach_kwadratowych], [http://zewnetrzny.odnosnik.com|Taki], [http://zewnetrzny.pl|obrazek.gif] albo sam adres URL</li>
		<li>Jeden lub wiêcej wykrzykników - ! - wykorzystuje siê do pisania nag³ówków </li>
		<li>** - pogrubienie </li>
		<li>__ - podkre¶lenie </li>
		<li>'' - kursywa </li>
		<li>:: :: - tekst w ramce </li>
		<li> Spacja na pocz±tku linii pozwala wpisywaæ tekst sformatowany</li>
		<li> Styl wiersza tabeli wygl±da tak: ||||kolumna1||kolumna2|||| </li>
		<li>Do kolorowania u¿ywa siê stylu: ##kolor## kolorowany tekst ##. Wprowadzone kolory u¿ywane s± w znaczniku 'font'. Dostêpne s± kolory: <font color=\"Black\">Black</font>, <font color=\"Silver\">Silver</font>, <font color=\"Gray\">Gray</font>, 
		<font color=\"Maroon\">Maroon</font>, <font color=\"Red\">Red</font>, <font color=\"Purple\">Purple</font>, 
		<font color=\"Fuchsia\">Fuchsia</font>, <font color=\"Green\">Green</font>, <font color=\"Lime\">Lime</font>, 
		<font color=\"Olive\">Olive</font>, <font color=\"Yellow\">Yellow</font>, <font color=\"Navy\">Navy</font>, 
		<font color=\"Blue\">Blue</font>, <font color=\"Teal\">Teal</font>, <font color=\"Aqua\">Aqua</font> 
		i <font color=\"White\">White</font> (bia³y), rzecz jasna. Mo¿na korzystaæ z kodów RGB, jak np. <font color=\"#FF9900\">#FF9900</font>, inne warto¶ci kodów s± <a href=\"http://www.yourhtmlsource.com/stylesheets/namedcolours.html\" target=\"_blank\">dostêpne w Sieci</a>.</li>
                      </ul>";

 ?>