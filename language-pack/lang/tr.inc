<?php
/*
 Cyrocom Wikepage 2005.4 Turkish Language File
 by Sefer Bora LISESIVDIN
*/
$encoding = "windows-1254";
$data_dir = "data/tr";
$page_default = "Ana_sayfa";
$page_admin = "Yönetim";
$lang['searchpage'] = "Sayfa ismi ile arama";
$lang['orsearchcontent'] = "yada içerikte arama yap";
$lang['search'] = "Ara";
$lang['searchingpage'] = "Aranan sayfa:";
$lang['searchingcontent'] = "Sayfalarda aranan terim:";
$lang['oldadminpass'] ="Þifrenizi giriniz";
$lang['adminpass'] = "Yeni þifre";
$lang['password'] = "Þifre";
$lang['changepass'] = "Þifre deðiþtir";
$lang['othersett'] = "Diðer ayarlar";
$lang['setpass'] = "Þifre oluþtur";
$lang['againadminpass'] = "Bir daha yeni þifre (kontrol amaçlý)";
$lang['passless'] = "Þifresiz sayfa düzenleme";
$lang['delfile'] = "Sayfa sil (sormadan ve geridönüþümsüz!)";
$lang['delpage'] = "Dosya sil (sormadan ve geridönüþümsüz!)";
$lang['change'] = "Deðiþtir";
$lang['abbrev_findpage'] = "sayfabul";
$lang['abbrev_admin'] = "yönetim";
$lang['abbrev_allpages'] = "tümsayfalar";
$lang['abbrev_recentchanges'] = "sondeðiþiklikler";
$lang['filenotfound'] = " : dosya bulunamadý!";
$lang['sorrypagelocked'] = "Üzgünüm, sayfa kilitli!";
$lang['cantwriteinpage'] = "Hata: $name içine yazýlamýyor ( $data_perm haklarýna sahip ve $data_owner:$data_group tarafýndan sahiplenilmiþ) !";
$lang['passmodeerror'] = "Hata: Þifreli yazma modundasýnýz ve girdiðiniz þifre hatalý";
$lang['returnhomepage'] = "Ana Sayfaya Dön";
$lang['passsuccess'] = "Þifreniz baþarýyla oluþturuldu.";
$lang['twononemptypassmustequal'] = "Baþlangýç için mutlaka þifre girmelisiniz ve her iki sifre alanýda ayný olmak zorundadýr.";
$lang['oldpasswrong'] = "Eski Þifrenizi yanlýþ girdiniz.";
$lang['processesok'] = "Ýþlemleriniz yapýldý";
$lang['filloldpass'] = "Eski þifre bolumunu doldurunuz!";
$lang['twopassmustequal'] = "Her iki þifre alanýda ayný olmak zorundadýr.";
$lang['uploadexists'] = "- Dosya zaten var";
$lang['uploadempty'] = "- Dosya boyutu sýfýr.<br>";
$lang['uploadbig'] = "- Dosya boyutu çok büyük.<br>";
$lang['uploadnotallowed'] = "- Dosya türü kabul edilmiyor.<br>";
$lang['uploaderror'] = "Dosya yüklenirken hata oluþtu:<br>";
$lang['uploadsuccess'] = "Baþarýlý! Dosya yüklendi.";
$lang['uploadlimit'] = "Hata! Dosya boyutu sunucu tarafýndan verilen izini geçiyor. Bir daha deneyin.";
$lang['edit'] = "Düzenle ";
$lang['recent'] = "Deðiþiklikler";
$lang['advsearch'] = "Geliþmiþ Arama ";
$lang['all'] = "Tüm Sayfalar";
$lang['admin'] = "Yönetim ";
$lang['index'] = "Ýndeks ";
$lang['lastupdate'] = "Son güncelleme: ";
$lang['editing'] = "düzenleniyor ";
$lang['pass'] = "Þifrenizi giriniz: ";
$lang['mainmenu'] = "Ana Menü ";
$lang['pagecontents'] = "Sayfa Ýçeriði ";
$lang['navi'] = "Navigasyon";
$lang['ok'] = "Tamam";
$lang['clickoktoedit'] = "Sayfayý düzenlemek için Tamam tuþuna basýnýz";
$lang['backtopage'] = "Önceki sayfaya dön";
$lang['copyleft'] = "<p>Bu wiki sitesinde yayýnlanan tüm içeriðin kopyalanmasý, daðýtýlmasý veya deðiþtirilmesi 
üzerinde GNU-FDL Sürüm 1.1 yada <a href=\"http://www.fsf.org/\">FSF</a> tarafýndan çýkarýlan daha sonraki lisans 
haklarý geçerlidir. Kabul etmiyorsanýz lütfen içerik eklemeyiniz.
 <small>PHP wiki site/kiþisel site motoru: <a href=\"http://www.wikepage.org\">Wikepage!</a> tarafýndan güçlendirilmiþtir.</small><br/><p></p>";
$lang['writingrules'] = "<ul id=\"footer\" style=\"text-align: left;\"> <small><small>
                        <li>Satýr öncesi bir * iþareti maddeleme yapar</li>
                        <li>Linkler: [Link_türü], [http://siteismi.com|týklayýn] yada [http://siteismi.com|resim.gif] yada URL girin
                        <li>Bir yada daha fazla ! iþareti baþlýk yapar</li>
                        <li>** iþaret arasýna yazýlanlar <b> koyu </b>olur</li>
                        <li>__ iþareti arasýna yazýlanlar <u>altý çizgili</u> olur</li>
                        <li>'' iþareti arasýna yazýlanlar <i>yatýk</i> olur</li>
                        <li>:: :: iþareti <span style=\"box\">kutu</span> içene konulmasýna yarar</li>
                        <li> Bir satýr baþýna boþlukla baþlamanýz önbiçemli olmasýna yarar</li>
                        <li>Tablo oluþturmak için her satýrda ||||sütun1||sütun22|||| stilini uygulayýn </li>
						<li>Renklendirme için ##renk## yazý buraya ## stilini uygulayýn. Girilen renk deðeri direkt font tag'ýnda yazýldýðýndan ingilizce karþýlýðýný kullanýn.
						Renkler <font color=\"Black\">Black</font>,<font color=\"Silver\"> Silver</font>, <font color=\"Gray\">Gray</font>, 
						<font color=\"Maroon\">Maroon</font>, <font color=\"Red\">Red</font>, <font color=\"Purple\">Purple</font>, 
						<font color=\"Fuchsia\">Fuchsia</font>, <font color=\"Green\">Green</font>, <font color=\"Lime\">Lime</font>, 
						<font color=\"Olive\">Olive</font>, <font color=\"Yellow\">Yellow</font>, <font color=\"Navy\">Navy</font>, 
						<font color=\"Blue\">Blue</font>, <font color=\"Teal\">Teal</font>, <font color=\"Aqua\">Aqua</font> 
						ve <font color=\"White\">White</font>. Yada RGB kodlarýný kullanabilirsiniz: <font color=\"#FF9900\">#FF9900</font> yada <a href=\"http://www.yourhtmlsource.com/stylesheets/namedcolours.html\" target=\"_blank\">dahasýna bakýn</a>.</li></small></small>
                      </ul>";


?>