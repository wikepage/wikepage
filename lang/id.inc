<?php
/*
 Wikepage 2007-2 Berkas Bahasa Indonesia
 oleh Wuri NUGRAHADI
*/
$encoding = "utf-8";
$data_dir = "data/id";
$page_default = "Halaman_depan";
$page_admin = "Admin";
$lang['searchpage'] = "Cari judul halaman";
$lang['orsearchcontent'] = "atau cari isi halaman";
$lang['search'] = "Cari";
$lang['searchingpage'] = "Mencari judul halaman";
$lang['searchingcontent'] = "Mencari isi";
$lang['oldadminpass'] ="Kata sandi yang berlaku";
$lang['adminpass'] = "Kata sandi baru";
$lang['password'] = "Kata sandi";
$lang['changepass'] = "Ubah kata sandi";
$lang['othersett'] = "Pengaturan lain";
$lang['setpass'] = "Kata sandi baru";
$lang['againadminpass'] = "Kata sandi baru (ulangi untuk menegaskan) ";
$lang['passless'] = "Ijinkan mengubah halaman tanpa kata sandi";
$lang['delfile'] = "Menghapus berkas (peringatan: langsung dihapus tanpa bertanya ulang!)";
$lang['delpage'] = "Mengahapus halaman (peringatan: langsung dihapus tanpa bertanya ulang!)";
$lang['change'] = "Ubah";
$lang['abbrev_findpage'] = "temukanhalaman";
$lang['abbrev_admin'] = "admin";
$lang['abbrev_allpages'] = "seluruhhalaman";
$lang['abbrev_recentchanges'] = "perubahanterbaru";
$lang['filenotfound'] = " berkas tidak ditemukan!";
$lang['sorrypagelocked'] = "Maaf, halaman terkunci!";
$lang['cantwriteinpage'] = "Kesalahan: tidak dapat menulis $name (ijin $data_perm oleh $data_owner:$data_group .) !";
$lang['passmodeerror'] = "Kesalahan: Kata sandi salah - situs dalam mode personal, dan isi hanya dapat diubah dengan memasukan kata sandi yang benar.";
$lang['returnhomepage'] = "Kembali ke halaman utama";
$lang['passsuccess'] = "Kata sandi telah berhasil diubah.";
$lang['twononemptypassmustequal'] = "Kata sandi baru harus diketik lagi dalam ruas penegasan.";
$lang['oldpasswrong'] = "Kata sandi salah.";
$lang['processesok'] = "Aksi terakhir telah berhasil dilaksanakan.";
$lang['filloldpass'] = "Silahkan masukan kata sandi yang berlaku.";
$lang['twopassmustequal'] = "Kedua ruas kata sandi harus cocok!";
$lang['uploadnote'] = "Pilih berkas yang akan diunggah:";
$lang['uploadexists'] = "- Berkas sudah ada.";
$lang['uploadempty'] = "- Berkas kosong.<br />";
$lang['uploadbig'] = "- Berkas terlalu besar.<br />";
$lang['uploadnotallowed'] = "- Tipe berkas tidak diijinkan.<br />";
$lang['uploaderror'] = "Terjadi kesalahan dalam mengunggah berkas:<br />";
$lang['uploadsuccess'] = "Berhasil! Berkas telah diunggah.";
$lang['uploadlimit'] = "Kesalahan! Ukuran berkas mungkin dibatasi oleh server. Coba lagi.";
$lang['edit'] = "Ubah ";
$lang['recent'] = "Perubahan Terbaru";
$lang['advsearch'] = "Pencarian ";
$lang['all'] = "Seluruh Halaman";
$lang['admin'] = "Administrasi ";
$lang['index'] = "Index ";
$lang['page_recent'] = "Perubahan_terbaru";
$lang['page_advsearch'] = "Cari";
$lang['page_all'] = "Seluruh_halaman";
$lang['page_admin'] = "Admin";
$lang['page_index'] = "Halaman_depan";
$lang['lastupdate'] = "Pembaruan terakhir: ";
$lang['editing'] = "pengubahan ";
$lang['pass'] = "Masukan kata sandi: ";
$lang['submit'] = "Kirim";
$lang['mainmenu'] = "Menu Utama ";
$lang['pagecontents'] = "Isi Halaman ";
$lang['navi'] = "Navigasi";
$lang['blog_out']="lihat_blog";
$lang['blog_archive']="arsip_blog";
$lang['blog_subject']="Judul:";
$lang['blog_page']="Isi:";
$lang['blog_input_page']="Masukan_Baru_Blog";
$lang['activate_TOC']="Aktifkan Daftar Isi";
$lang['TOC']="<div id=\"TOC\"><input type =\"button\" value =\"Daftar Isi\" onclick =\"toggleTOC()\"></div>";
$lang['nonews']="Berita tidak ditemukan";
$lang['xmlerror']="Kesalahan pada XML";
$lang['atline']="pada baris";
$lang['couldnotxml']="tidak dapat membuka masukan XML";
$lang['couldnotversioninfo']="Sistem tidak terhubung internet. Anda tidak dapat mengimpor RSS dan tidak dapat mengakses info versi terbaru.";
$lang['newversion']="Ada Wikepage versi terbaru. Silahkan memperbaharui versi.";
$lang['next']="Lanjut";
$lang['prev']="Kembali";
$lang['noimage']="Tidak ada gambar...";
$lang['copyleft'] = "<p>Ijin memperbolehkan untuk menyalin, mendistribusikan dan/atau mengubah dokumen ini di bawah persyaratan dari
 GNU Free Documentation License, Versi 1.1 atau versi diatasnya dipublikasikan oleh <a href=\"http://www.fsf.org/\">
 Free Software Foundation</a>. Jika anda tidak setuju, silahkan untuk tidak menambahkan isi.<br />
 <small>Didukung oleh mesin tanpa basisdata php wiki-blog-rss reader hybrid : <a href=\"http://www.wikepage.org/\">Wikepage</a></small></p>";
$lang['writingrules'] = "<ul id=\"footer\" style=\"text-align: left;\"> <small>
						<li>Satu * (tanda bintang) sebelum baris kalimat, akan menambahkan bulet didepan kalimat tersebut.</li>
						<li>Pranala: [Jenis_pranala], [http://pranalaluar.com|klik] atau [http://pranalaluar.com|gambar.gif] atau ketikan URL. Untuk lebih jelas baca BakPasir</li>
						<li>Satu atau lebih ! (tanda seru), membuatnya menjadi Kepala Paragraf </li>
						<li>** menebalkan** </li>
						<li>__ menggarisbawahi__ </li>
						<li>'' memiringkan'' </li>
						<li>::meletakan teks dalam kotak:: </li>
						<li> Spasi di awal baris, membuatnya praformat </li>
						<li>Menggambar tabel untuk setiap baris gunakan ||||column1||column2|||| </li>
						<li>Untuk mewarnai gunakan ##Warna## tulisan yang diwarnai ## . Warna yang tersedia antara lain <font color=\"Black\">Black</font>,<font color=\"Silver\"> Silver</font>, <font color=\"Gray\">Gray</font>, 
						<font color=\"Maroon\">Maroon</font>, <font color=\"Red\">Red</font>, <font color=\"Purple\">Purple</font>, 
						<font color=\"Fuchsia\">Fuchsia</font>, <font color=\"Green\">Green</font>, <font color=\"Lime\">Lime</font>, 
						<font color=\"Olive\">Olive</font>, <font color=\"Yellow\">Yellow</font>, <font color=\"Navy\">Navy</font>, 
						<font color=\"Blue\">Blue</font>, <font color=\"Teal\">Teal</font>, <font color=\"Aqua\">Aqua</font> 
						dan juga <font color=\"Black\">White</font> . Atau gunakan kode RGB seperti <font color=\"#FF9900\">#FF9900</font> atau <a href=\"http://www.yourhtmlsource.com/stylesheets/namedcolours.html\" target=\"_blank\">coba lainnya</a></li></small>
                      </ul>";

 ?>
