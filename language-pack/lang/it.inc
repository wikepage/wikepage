<?php
/*
 Wikepage 2007-2 Italian Language File
 by Giacomo MARGARITO
*/
$encoding = "utf-8";
$data_dir = "data/it";
$page_default = "Indice";
$page_admin = "Amministrazione";
$lang['searchpage'] = "Cerca il titolo della pagina";
$lang['orsearchcontent'] = "o il suo contenuto";
$lang['search'] = "Cerca";
$lang['searchingpage'] = "Ricerca dei titoli della pagina in corso";
$lang['searchingcontent'] = "Ricerca dei contenuti in corso ";
$lang['oldadminpass'] ="Password attuale";
$lang['adminpass'] = "Nuova Password";
$lang['password'] = "Password";
$lang['changepass'] = "Modifica la Password";
$lang['othersett'] = "Altre impostazioni";
$lang['setpass'] = "Nuova Password";
$lang['againadminpass'] = "Nuova Password (per conferma) ";
$lang['passless'] = "Consenti la modifica della pagina senza password";
$lang['delfile'] = "Elimina file (attenzione: non verra' chiesta la conferma!)";
$lang['delpage'] = "Elimina pagina (attenzione: non verra' chiesta la conferma!)";
$lang['change'] = "Modifica";
$lang['abbrev_findpage'] = "trovapagina";
$lang['abbrev_admin'] = "amministrazione";
$lang['abbrev_allpages'] = "tuttelepagine";
$lang['abbrev_recentchanges'] = "ultimemodifiche";
$lang['filenotfound'] = " file non trovato!";
$lang['sorrypagelocked'] = "Spiacente, la pagina e' bloccata!";
$lang['cantwriteinpage'] = "Errore: impossibile scrivere su $name (ha dei permessi $data_perm dal proprietario del gruppo $data_owner:$data_group ) !";
$lang['passmodeerror'] = "Errore: La password non e' corretta - il sito e' in modalita' personale, e i contenuti possono essere modificati solo con la password corretta.";
$lang['returnhomepage'] = "Ritorna alla home page";
$lang['passsuccess'] = "La vostra password e' stata modificata con successo.";
$lang['twononemptypassmustequal'] = "La nuova password deve essere ridigitata nel campo di conferma.";
$lang['oldpasswrong'] = "Password non corretta.";
$lang['processesok'] = "L'operazione e' stata completata con successo.";
$lang['filloldpass'] = "Inserite la password attuale.";
$lang['twopassmustequal'] = "Entrambi i campi della nuova password devono coincidere!";
$lang['uploadnote'] = "Selezionate il file da caricare:";
$lang['uploadexists'] = "- Il file esiste gia'";
$lang['uploadempty'] = "- Il file e' vuoto.<br />";
$lang['uploadbig'] = "- il file e' troppo grande.<br />";
$lang['uploadnotallowed'] = "- Tipo di file non consentito.<br />";
$lang['uploaderror'] = "Errore durante il caricamento del file:<br />";
$lang['uploadsuccess'] = "Perfetto! Il file e' stato caricato.";
$lang['uploadlimit'] = "Errore! Le dimensioni del file potrebbero eccedere il limite di caricamento del server. Riprovate.";
$lang['edit'] = "Modifica ";
$lang['recent'] = "Modifiche recenti";
$lang['advsearch'] = "Ricerca avanzata ";
$lang['all'] = "Tutte le pagine";
$lang['admin'] = "Amministrazione ";
$lang['index'] = "Indice ";
$lang['page_recent'] = "Ultime_modifiche";
$lang['page_advsearch'] = "Cerca";
$lang['page_all'] = "Tutte_le_pagine";
$lang['page_admin'] = "Amministrazione";
$lang['page_index'] = "Indice";
$lang['lastupdate'] = "Ultimo aggiornamento: ";
$lang['editing'] = "modifica in corso ";
$lang['pass'] = "Inserite la password: ";
$lang['submit'] = "Invia";
$lang['mainmenu'] = "Menu Principale ";
$lang['pagecontents'] = "Contenuti della pagina ";
$lang['navi'] = "Navigazione";
$lang['blog_out']="visualizza_il_blog";
$lang['blog_archive']="archivio_del_blog";
$lang['blog_subject']="Titolo:";
$lang['blog_page']="Messaggio:";
$lang['blog_input_page']="Articolo_del_Blog";
$lang['activate_TOC']="Attiva la tabella dei contenuti";
$lang['TOC']="<div id=\"TOC\"><input type =\"button\" value =\"Tabella dei Contenuti\" onclick =\"toggleTOC()\"></div>";
$lang['nonews']="Nessuna notizia trovata";
$lang['xmlerror']="Errore XML";
$lang['atline']="alla riga";
$lang['couldnotxml']="impossibile aprire l'input XML";
$lang['couldnotversioninfo']="Il sistema non può connettersi ad internet. Non potete importare gli RSS e non potete controllare le informazioni sulla versione.";
$lang['newversion']="E' disponibile una nuova versione di Wikepage. Aggiornatela.";
$lang['next']="Avanti";
$lang['prev']="Precedente";
$lang['noimage']="Nessuna Immagine...";
$lang['copyleft'] = "<p>Avete il permesso di copiare, distribuire e/o modificare questo documento sotto i termini della
 GNU Free Documentation License, Versione 1.1 o qualunque versione piu' recente pubblicata dalla <a href=\"http://www.fsf.org/\">
 Free Software Foundation</a>. Se non siete d'accordo non aggiungete i contenuti. <br />
 <small>Creato con un motore ibrido senza database in php che fa da wiki-blog-lettore rss: <a href=\"http://www.wikepage.org/\">Wikepage</a></small></p>";
$lang['writingrules'] = "<ul id=\"footer\" style=\"text-align: left;\"> <small>
						<li>Un * prima di una riga aggiunge un punto elenco davanti ad essa </li>
						<li>Collegamenti: [Tipo_di_collegamento], [http://collegamentoesterno.it|clicca] o [http://collegamentoesterno.it|immagine.gif] o digitate un URL. Per un aiuto leggete l'Area Protetta</li>
						<li>Uno o piu' ! crea una testata </li>
						<li>** per il grassetto** </li>
						<li>__ per sottolineare__ </li>
						<li>'' per il corsivo'' </li>
						<li>::crea una cornice attorno al testo:: </li>
						<li> Uno spazio all'inizio di una riga la rende preformattata </li>
						<li>Nelle tabelle per ogni riga usate ||||colonna1||colonna2|||| </li>
						<li>Per colorare usate lo stile ##colore## testo scritto ## . Cosi' inserirete i colori nei tag dei font. I colori sono <font color=\"Black\">Nero</font>,<font color=\"Silver\"> Grigio argento</font>, <font color=\"Gray\">Grigio</font>, 
						<font color=\"Maroon\">Marrone</font>, <font color=\"Red\">Rosso</font>, <font color=\"Purple\">Viola</font>, 
						<font color=\"Fuchsia\">Fucsia</font>, <font color=\"Green\">Verde</font>, <font color=\"Lime\">Verde Lime</font>, 
						<font color=\"Olive\">Verde Oliva</font>, <font color=\"Yellow\">Giallo</font>, <font color=\"Navy\">Blu Oltremare</font>, 
						<font color=\"Blue\">Blu</font>, <font color=\"Teal\">Celestino</font>, <font color=\"Aqua\">Celeste</font> 
						e ovviamente <font color=\"Black\">White</font>. Potete usare anch i codici RGB come <font color=\"#FF9900\">#FF9900</font> o ad esempio <a href=\"http://www.yourhtmlsource.com/stylesheets/namedcolours.html\" target=\"_blank\">potete provare ancora</a></li></small>
                      </ul>";

 ?>
