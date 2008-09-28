Wikisite/Personal/Blog Gerador de Site
WIKEPAGE Version 2007.1 Opus 12 (Code: Aharanov - Bohm)
-----------------------------------------------------------------------------------------
Wikepage é um wiki padrão, fácil de usar e pequeno, derivado do Tipiwiki2
(http://tipiwiki.sourceforge.net/). O Wikepage tem algumas funcionalidades de seguranca 
que o Tipiwiki não tem, como estrutura protegida por senha, 4 alterações importantes de 
segurança, suporte a tabelas, suporte a carregamento de arquivos, multilinguas, suporte
a múltiplos sites etc...

Wikepage tem dois modos:

-Modo Wiki: As Páginas e Blogs podem ser alteradas sem estar autenticação.
-Modo Pessoal: As Páginas e Blogs podem ser alteradas somente com autenticação.

*INSTALAÇÃO:
-Abra o arquivo index.php com um editor de textos e altere as informações do site, língua
 e outras opções para o seu site.
-Coloque todos os arquivos na pasta do servidor utilizando um cliente de FTP.
-De permissão 777 (ja que as vezes 755 não funciona), para os arquivos e subpastas da
 pasta "data".
-Certifique-se de que o PHP não esta em "safe_mode". No "safe_mode" o  wikepage não pode
 criar páginas.
-Se você quiser adicionar uma nova língua no site, baixe em http://www.wikepage.org/
 descompacte-a na pasta raiz do wikepage. Então você poderá alterar a variável da 
 língua padrão no arquivo index.php. E se você quiser criar um site multi-lingual,
 você pode facilmente alterar a língua no seu site criando links como 
 [index.php?lng=en|English] ou [index.php?lng=tr|Turkce].
-Visite seu site. Você será automaticamente redirecionado para a página de administração.
 Você DEVERÁ alterar a senha. 
-Seu site esta utilizando o modo Wiki agora!
-Você poderá alterar o modo na Área de administração, entrando com a sua senha.
-No modo wiki, você deverá entrar com a senha "sempre" que alterar uma página.
-Se você quiser utilizar o Blog, você pode enviar as notícias da página de
 Administração ou pelo link [index.php?Blog_Entry|Novo link]
-Você pode ver seu blog entrando com "<blog_view>" em qualquer lugar da sua página.

Você poderá encontrar maiores informações no seu site.

*LICENÇA
Wikepage é um programa aberto licenciado pela GNU/GPL. Maiores informações:
[ www.gnu.org/copyleft/gpl.html ]

*ADICIONAIS
-Se você realmente alterar as permissões das pastas (chmod), o wikepage funcionará 90%.
-Suporte a criação, carregamento e remoção podem não funcionar com o safe_mode=on.

