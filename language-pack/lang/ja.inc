<?php
/*
 Wikepage 2016-6 Japanese Language File
 by kozakana
*/
$encoding = "utf-8";
$data_dir = "data/ja";
$page_default = "インデックス";
$page_admin = "管理者";
$lang['searchpage'] = "検索ページのタイトル";
$lang['orsearchcontent'] = "または検索ページの内容";
$lang['search'] = "検索";
$lang['searchingpage'] = "ページのタイトルを検索";
$lang['searchingcontent'] = "検索中 ";
$lang['oldadminpass'] ="現在のパスワード";
$lang['adminpass'] = "新しいパスワード";
$lang['password'] = "パスワード";
$lang['changepass'] = "パスワードを変更";
$lang['othersett'] = "その他の設定";
$lang['setpass'] = "新しいパスワード";
$lang['againadminpass'] = "新しいパスワード (確認の為にもう一度入力) ";
$lang['passless'] = "パスワードを入力せずにページを編集することを許可する";
$lang['delfile'] = "ファイルを削除 (警告: 二度確認はしません。)";
$lang['delpage'] = "ページを削除 (警告: 二度確認はしません。)";
$lang['change'] = "変更";
$lang['abbrev_findpage'] = "findpage";
$lang['abbrev_admin'] = "管理者";
$lang['abbrev_allpages'] = "全てのページ";
$lang['abbrev_recentchanges'] = "最近の変更";
$lang['filenotfound'] = " ファイルが見つかりません!";
$lang['sorrypagelocked'] = "ページはロックされています!";
$lang['cantwriteinpage'] = "エラー: 右記に書き込むことが出来ませんでした $name (この操作には $data_perm パーミッションが必要です $data_owner:$data_group による。) !";
$lang['passmodeerror'] = "エラー: パスワードが間違っています - サイトはパーソナルモードで、内容は正しいパスワードを入力すると変更できます。";
$lang['returnhomepage'] = "ホーム ページに戻る";
$lang['passsuccess'] = "あなたのパスワードは正常に変更されました。";
$lang['twononemptypassmustequal'] = "新しいパスワードは確認欄に再度入力しなければなりません。";
$lang['oldpasswrong'] = "パスワードが間違っています。";
$lang['processesok'] = "オペレーションは正常に終了しました。";
$lang['filloldpass'] = "現在のパスワードを入力してください。";
$lang['twopassmustequal'] = "それぞれのパスワード入力欄に入力された文字列を合致させてください!";
$lang['uploadnote'] = "アップロードするファイルを選択:";
$lang['uploadexists'] = "- ファイルが既に存在します";
$lang['uploadempty'] = "- ファイルが空です。<br />";
$lang['uploadbig'] = "- ファイルが大きすぎます。<br />";
$lang['uploadnotallowed'] = "- 許可されていない種類のファイルです。<br />";
$lang['uploaderror'] = "アップロード中にエラーが発生しました:<br />";
$lang['uploadsuccess'] = "成功! ファイルはアップロードされました。";
$lang['uploadlimit'] = "エラー!ファイルの大きさがサーバーの限界を超えています。再度お試しください。";
$lang['edit'] = "編集 ";
$lang['recent'] = "最近の変更";
$lang['advsearch'] = "高度な検索 ";
$lang['all'] = "全てのページ";
$lang['admin'] = "管理者権限 ";
$lang['index'] = "インデックス ";
$lang['page_recent'] = "最近の変更";
$lang['page_advsearch'] = "検索";
$lang['page_all'] = "全てのページ";
$lang['page_admin'] = "管理者";
$lang['page_index'] = "インデックス";
$lang['lastupdate'] = "最終更新: ";
$lang['editing'] = "編集中 ";
$lang['pass'] = "パスワードを入力: ";
$lang['submit'] = "送信";
$lang['mainmenu'] = "メインメニュー ";
$lang['pagecontents'] = "ページの内容 ";
$lang['navi'] = "ナビゲーション";
$lang['blog_out']="ブログ ビュー";
$lang['blog_archive']="ブログの投稿";
$lang['blog_subject']="題名:";
$lang['blog_page']="内容:";
$lang['blog_input_page']="ブログ エントリー";
$lang['activate_TOC']="Activate Table of Contents";
$lang['TOC']="<div id=\"TOC\"><input type =\"button\" value =\"Table of Contents\" onclick =\"toggleTOC()\"></div>";
$lang['nonews']="ニュースは見つかりませんでした";
$lang['xmlerror']="XML エラー";
$lang['atline']="行";
$lang['couldnotxml']="XML インプットを開けません";
$lang['couldnotversioninfo']="システムはインターネットに接続できませんでした。RSSをインポートしたりバージョンを管理することはできません。";
$lang['newversion']="Wikepageの新しいバージョンがあります。アップグレードしてください。";
$lang['next']="次へ";
$lang['prev']="前へ";
$lang['noimage']="画像はありません...";
$lang['copyleft'] = "<p>Permission is granted to copy, distribute and/or modify this document under the terms of the
 GNU Free Documentation License, Version 1.1 or any later version published by the <a href=\"http://www.fsf.org/\">
 Free Software Foundation</a>. If you don't agree please don't add content. <br />
 <small>Powered by databaseless php wiki-blog-rss reader hybrid engine: <a href=\"http://www.wikepage.org/\">Wikepage</a></small></p>";
$lang['writingrules'] = "<ul id=\"footer\" style=\"text-align: left;\"> <small>
						<li>One * before a line puts bullets in front of it </li>
						<li>Links: [Link_type], [http://externallink.com|click] or [http://externallink.com|image.gif] or type URL. For more read Sandbox</li>
						<li>One or more ! make it a headline </li>
						<li>** to embolden** </li>
						<li>__ to underline__ </li>
						<li>'' to italicize'' </li>
						<li>::places a box around text:: </li>
						<li> Space at the beginning of a line makes it preformatted </li>
						<li>For tables for every row use ||||column1||column2|||| </li>
						<li>For coloring use ##color## written text ## styling. Entered colors used in font tag. Colors are <font color=\"Black\">Black</font>,<font color=\"Silver\"> Silver</font>, <font color=\"Gray\">Gray</font>, 
						<font color=\"Maroon\">Maroon</font>, <font color=\"Red\">Red</font>, <font color=\"Purple\">Purple</font>, 
						<font color=\"Fuchsia\">Fuchsia</font>, <font color=\"Green\">Green</font>, <font color=\"Lime\">Lime</font>, 
						<font color=\"Olive\">Olive</font>, <font color=\"Yellow\">Yellow</font>, <font color=\"Navy\">Navy</font>, 
						<font color=\"Blue\">Blue</font>, <font color=\"Teal\">Teal</font>, <font color=\"Aqua\">Aqua</font> 
						and <font color=\"Black\">White</font> of course. Or use RGB codes like <font color=\"#FF9900\">#FF9900</font> or <a href=\"http://www.yourhtmlsource.com/stylesheets/namedcolours.html\" target=\"_blank\">try more</a></li></small>
                      </ul>";

 ?>
