<?php
/*
 Wikepage 2007-2 Spanish Language File
 by Hector Fiel
*/
$encoding = "utf-8";
$data_dir = "data/es";
$page_default = "Indice";
$page_admin = "Admin";
$lang['searchpage'] = "Buscar título de página";
$lang['orsearchcontent'] = "o buscar contenido de página";
$lang['search'] = "Busqueda";
$lang['searchingpage'] = "Buscando en títulos de páginas";
$lang['searchingcontent'] = "Buscando en contenido";
$lang['oldadminpass'] ="Contraseña actual";
$lang['adminpass'] = "Nueva contraseña";
$lang['password'] = "Contraseña";
$lang['changepass'] = "Cambiar contraseña";
$lang['othersett'] = "Otras opciones";
$lang['setpass'] = "Nueva contraseña";
$lang['againadminpass'] = "Nueva contraseña (repite para confirmar) ";
$lang['passless'] = "Permitir editar páginas sin contraseña";
$lang['delfile'] = "Borrar archivo (advertencia: ¡no pide confirmación!)";
$lang['delpage'] = "Borrar página (advertencia: ¡no pide confirmación!)";
$lang['change'] = "Cambiar";
$lang['abbrev_findpage'] = "findpage";
$lang['abbrev_admin'] = "admin";
$lang['abbrev_allpages'] = "allpages";
$lang['abbrev_recentchanges'] = "recentchanges";
$lang['filenotfound'] = "¡Archivo no encontrado!";
$lang['sorrypagelocked'] = "Lo siento, la página está bloqueada!";
$lang['cantwriteinpage'] = "¡Error: no puedo escribir en $name (tiene permisos $data_perm por $data_owner:$data_group owner:group.)!";
$lang['passmodeerror'] = "Error: Contraseña incorrecta - El sitio se encuentra en modo personal, y los cambios al contenido sólo pueden hacerse con la contraseña correcta.";
$lang['returnhomepage'] = "Volver a la página inicial";
$lang['passsuccess'] = "Su contraseña ha sido cambiada correctamente.";
$lang['twononemptypassmustequal'] = "La nueva contraseña tiene que ser escrita también en la casilla de confirmación.";
$lang['oldpasswrong'] = "Contraseña incorrecta.";
$lang['processesok'] = "La operación se completó satisfactoriamente.";
$lang['filloldpass'] = "Por favor introduzca su contraseña actual.";
$lang['twopassmustequal'] = "¡Ambas casillas de contraseña tienen que coincidir!";
$lang['uploadnote'] = "Seleccione el archivo a subir:";
$lang['uploadexists'] = "- El archivo ya existe";
$lang['uploadempty'] = "- El archivo está vacío<br />";
$lang['uploadbig'] = "- El archivo es demasiado grande.<br />";
$lang['uploadnotallowed'] = "- Tipo de archivo no permitido.<br />";
$lang['uploaderror'] = "Error al intentar subir el archivo:<br />";
$lang['uploadsuccess'] = "¡Correcto! El archivo ha sido subido.";
$lang['uploadlimit'] = "¡Error! El tamaño del archivo puede exceder el límite de subida del servidor. Inténtelo de nuevo.";
$lang['edit'] = "Editar ";
$lang['recent'] = "Cambios Recientes";
$lang['advsearch'] = "Búsqueda Avanzada";
$lang['all'] = "Todas las Páginas";
$lang['admin'] = "Administración ";
$lang['index'] = "Índice ";
$lang['page_recent'] = "Cambios_recientes";
$lang['page_advsearch'] = "Busqueda";
$lang['page_all'] = "Todas_las_paginas";
$lang['page_admin'] = "Admin";
$lang['page_index'] = "Indice";
$lang['lastupdate'] = "Última actualización: ";
$lang['editing'] = "editando ";
$lang['pass'] = "Introduzca la contraseña: ";
$lang['submit'] = "Enviar";
$lang['mainmenu'] = "Menú Principal";
$lang['pagecontents'] = "Contenido de la Página ";
$lang['navi'] = "Navegación";
$lang['blog_out']="blog_view";
$lang['blog_archive']="archivo_del_blog";
$lang['blog_subject']="Asunto:";
$lang['blog_page']="Cuerpo:";
$lang['blog_input_page']="Blog_Entry";
$lang['activate_TOC']="Activar Tabla de Contenido";
$lang['TOC']="<div id=\"TOC\"><input type =\"button\" value =\"Tabla de Contenido\" onclick =\"toggleTOC()\"></div>";
$lang['nonews']="No se han encontrado Noticias";
$lang['xmlerror']="Error XML";
$lang['atline']="en la línea";
$lang['couldnotxml']="No se pudo abrir la entrada XML";
$lang['couldnotversioninfo']="El sistema no se pudo conectar a internet. o podrá importar RSS y no se dispone de información de control de versión.";
$lang['newversion']="Hay disponible una nueva verisón de Wikepage. Por favor, actualice.";
$lang['next']="Siguiente";
$lang['prev']="Previo";
$lang['noimage']="No Hay Imagen...";
$lang['copyleft'] = "<p>Permiso para copiar, distribuir y/o modificar este documento bajo los términos de la Licencia de Documentación Libre GNU, Versión 1.1 o cualquier otra versión posterior publicada por la <a href=\"http://www.fsf.org/\">
 Free Software Foundation</a>. Si no está de acuerdo, por favor no añada contenido. <br />
 <small>Powered by databaseless php wiki-blog-rss reader hybrid engine: <a href=\"http://www.wikepage.org/\">Wikepage</a></small></p>";
$lang['writingrules'] = "<ul id=\"footer\" style=\"text-align: left;\"> <small>
						<li>Un * antes de una línea pone una viñeta delante </li>
						<li>Enlaces: [Link_type], [http://enlace_externo.com|texto] or [http://enlac_externo.com|imagen.gif] o escriba la URL. Para más información vea el Sandbox</li>
						<li>Una o más ! convierten la línea en un título </li>
						<li>** para negrita** </li>
						<li>__ para subrayar__ </li>
						<li>'' para cursiva'' </li>
						<li>::coloca una caja alrededor del texto:: </li>
						<li> Un espacio al comienzo de la línea la preformatea </li>
						<li>Para tablas, para cada fila usa: ||||columna1||columna2|||| </li>
						<li>Para colorear, usa ##color## texto a colorear ##. Los colores introducidos son usados en el tag de la fuente. Los colores son son <font color=\"Black\">Negro(Black)</font>,<font color=\"Silver\"> Plateado (Silver)</font>, <font color=\"Gray\">Gris (Gray)</font>, 
						<font color=\"Maroon\">Marrón (Maroon)</font>, <font color=\"Red\">Rojo (Red)</font>, <font color=\"Purple\">Violeta (Purple)</font>, 
						<font color=\"Fuchsia\">Fucsia (Fuchsia)</font>, <font color=\"Green\">Verde (Green)</font>, <font color=\"Lime\">Lima (Lime)</font>, 
						<font color=\"Olive\">Olivo (Olive)</font>, <font color=\"Yellow\">Amarillo (Yellow)</font>, <font color=\"Navy\">Azul Marino (Navy)</font>, 
						<font color=\"Blue\">Azul (Blue)</font>, <font color=\"Teal\">Azul verdoso (Teal)</font>, <font color=\"Aqua\">Celeste (Aqua)</font> 
						y por supuesto <font color=\"Black\">Blaco (White)</font>. O use los códigos RGB como <font color=\"#FF9900\">#FF9900</font> o <a href=\"http://www.yourhtmlsource.com/stylesheets/namedcolours.html\" target=\"_blank\">pruebe otros</a></li></small>
                      </ul>";

 ?>
