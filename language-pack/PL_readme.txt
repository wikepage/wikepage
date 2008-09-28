Wikepage - program do tworzenia wiki i stron osobistych opartych na wiki
Wersja 2006.2a Opus 10 (nazwa kodowa: Maxwell-Boltzmann)
-----------------------------------------------------------------------------------------
Wikepage to zgodny ze standardem wiki, ³atwy w u¿yciu, niedu¿y program wywodz±cy siê z 
Tipiwiki2 (http://tipiwiki.sourceforge.net/). Wikepage ma zabezpieczenia, których Tipiwiki
nie mia³o (ochronê has³em i za³atane 4 wa¿ne luki), obs³uguje tabele i wysy³anie plików
na serwer, pozwala zmieniaæ jêzyk interfejsu i umo¿liwia obs³ugê wielu witryn...


Wikepage mo¿e pracowaæ w jednym z dwóch trybów:

- tryb wiki: strony i wpisy w blogu mo¿na tworzyæ bez podawania has³a,
- tryb strony domowej: nale¿y podaæ has³o, by móc zmieniaæ strony i wpisy.

*INSTALACJA:
- Nale¿y otworzyæ plik index.php w edytorze tekstowym (np. w Notatniku) i ustawiæ 
  prawid³owo informacje opisuj±ce witrynê, jêzyk i inne dostêpne opcje;
- Wgraæ wszystkie pliki do odpowiedniego katalogu na serwerze, np. z u¿yciem klienta FTP;
- Programem chmod nadaæ prawa 777 (a przynajmniej 755, ale nie zawsze takie wystarczaj±) 
  plikom w katalogu data i jego podkatalogach.
- Sprawdziæ, czy interpreter PHP nie ma w³±czonego trybu safe_mode. W tym trybie Wikepage 
  nie jest w stanie tworzyæ stron.
- Aby nasza witryna obs³ugiwa³a inny jêzyk, pobraæ odpowiednie pliki ze strony
  http://www.wikepage.org/ i rozpakowaæ je w katalogu, w którym zainstalowali¶my Wikepage. 
  Bêdzie mo¿na wtedy zmieniæ warto¶æ zmiennej okre¶laj±cej domy¶lny jêzyk w pliku
  index.php. Na witrynie wielojêzycznej mo¿liwo¶æ wyboru jêzyka dadz± u¿ytkownikowi 
  odno¶niki postaci np. [index.php?lng=en|English], [index.php?lng=pl|Polski] itp.;
- Odwiedziæ nasz± witrynê. Zostaniemy automatycznie przekierowani na stronê Administracji. 
  MUSIMY za³o¿yæ has³o.
- Witryna ju¿ dzia³a w trybie wiki!
- Tryb dzia³ania witryny zmienia siê na stronie administracyjnej po podaniu has³a.
- Wpisy do bloga dodaje siê ze strony "Administracja" lub z pomoc± strony, 
  na któr± trafimy [index.php?Pisz_Blog|pod tym adresem].
- Zobaczyæ swój blog mo¿na po umieszczeniu s³owa kluczowego "<zobacz_blog>" w tre¶ci 
  strony wiki.

Dok³adniejsz± dokumentacjê znajdziemy na swojej witrynie po jej zainstalowaniu.

*LICENCJA
Wikepage jest otwartym programem na licencji GNU/GPL. Wiêcej informacji udostêpniono
pod adresem: [ www.gnu.org/copyleft/gpl.html ]

*UWAGI
- Je¶li prawa dostêpu do katalogów s± ustawione poprawnie, Wikepage powinno dzia³aæ.
- Tworzenie, wysy³anie i kasowanie plików mo¿e nie funkcjonowaæ przy ustawieniu 
  safe_mode na "on".

