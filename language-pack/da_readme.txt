Wikisite/Personal/Blog Site Builder
WIKEPAGE Version 2006.2 Opus 9 (Code: Maxwell-Boltzmann)
-----------------------------------------------------------------------------------------
Wikepage er en wiki-standard, nem at anvende og lille wiki software udsprunget fra Tipiwiki2
(http://tipiwiki.sourceforge.net/). Wikepage indeholder nogle sikkerheds features som Tipiwiki ikke
har, såsom kodeordsbeskyttet struktur, og 4 vigtige sikkerhedsniveauer, tabel
support, upload support, multisprog og multihjemmeside support ... osv. ...

Wikepage har to tilstande:

-Wiki tilstand: Sider og Blogindlæg kan ændres uden at indtaste kodeord.
-Personlig tilstand: Sider og Blogindlæg kan kun ændres med kodeord.

*INSTALLATION:
-Åbn index.php med notesblok eller et andet teksprogram og udskift hjemmeside-informationen, sprog
 og andre indstillinger til din side.
-Upload alle filerne til din server med en FTP-klient.
-Chmod filerne til 777, (mindst til 755, men nogle gange virker det ikke) i data og
 også filerne i underfolderne til data-folderen.
-Vær sikker på, at PHP ikke er i safe_mode. I safe_mode kan wikepage ikke oprette sider.
-Hvis du vil tilføje et andet sprog til din side, så download fra http://www.wikepage.org/
 og udpak til rod-folderen i wikepage. Derefter kan du skifte standard-sprog
 variabel i kildekoden på index.php. Ønsker du en multisprogs side kan
 du nemt ændre sprog med disse link-typer [index.php?lng=en|English]
 [index.php?lng=tr|Turkce].
-Besøg vores hjemmeside. Du vil automatisk blive sendt til administrationssiden. Du SKAL oprette et kodeord.
-Din side arbejder nu i Wiki tilstand!
-Du kan skifte tilstand fra administrationssiden ved at indtaste dit kodeord.
-I wiki tilstand skal du indtastekodeord "hver gang" for at redigere en side.
-Hvis du vil benytte Blog, kan du oprette indlæg fra administrationssiden eller
 [index.php?Blog_Entry|Opret nyt  link].
- Du kan se din blog ved at tilføje "<blog_view>" til dine sider.

Du finder mere information på din oprettede side.

*LICENS
Wikepage er open source software licenseret via GNU/GPL. For yderligere information:
[ www.gnu.org/copyleft/gpl.html ]

*TILFØJELSE
-Hvis du chmod'er folderne true, vil wikepage arbejde 90%.
-Opret fil, upload og slet support vil muligvis ikke fungere med safe_mode=on

