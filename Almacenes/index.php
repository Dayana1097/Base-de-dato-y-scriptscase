<?php
include_once('Almacenes_session.php');
session_start();
if (!function_exists("sc_check_mobile"))
{
    include_once("../_lib/lib/php/nm_check_mobile.php");
}
$_SESSION['scriptcase']['device_mobile'] = sc_check_mobile();
if (!isset($_SESSION['scriptcase']['display_mobile']))
{
    $_SESSION['scriptcase']['display_mobile'] = true;
}
if ($_SESSION['scriptcase']['device_mobile'])
{
    if ($_SESSION['scriptcase']['display_mobile'] && isset($_POST['_sc_force_mobile']) && 'out' == $_POST['_sc_force_mobile'])
    {
        $_SESSION['scriptcase']['display_mobile'] = false;
    }
    elseif (!$_SESSION['scriptcase']['display_mobile'] && isset($_POST['_sc_force_mobile']) && 'in' == $_POST['_sc_force_mobile'])
    {
        $_SESSION['scriptcase']['display_mobile'] = true;
    }
}
    $_SESSION['scriptcase']['Almacenes']['glo_nm_path_prod']      = "/scriptcase/prod";
    $_SESSION['scriptcase']['Almacenes']['glo_nm_perfil']         = "";
    $_SESSION['scriptcase']['Almacenes']['glo_nm_conexao']        = "";
    $_SESSION['scriptcase']['Almacenes']['glo_nm_path_imag_temp'] = "/scriptcase/tmp";
    $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo']      = "S";
    //check publication with the prod
    $str_path_apl_url  = $_SERVER['PHP_SELF'];
    $str_path_apl_url  = str_replace("\\", '/', $str_path_apl_url);
    $str_path_apl_url  = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
    $str_path_apl_url  = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
    //check prod
    if(empty($_SESSION['scriptcase']['Almacenes']['glo_nm_path_prod']))
    {
            /*check prod*/$_SESSION['scriptcase']['Almacenes']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
    }
    //check tmp
    if(empty($_SESSION['scriptcase']['Almacenes']['glo_nm_path_imag_temp']))
    {
            /*check tmp*/$_SESSION['scriptcase']['Almacenes']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
    }
    //end check publication with the prod

ob_start();

class Almacenes_class
{
  var $Db;

 function sc_Include($path, $tp, $name)
 {
     if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
     {
         include_once($path);
     }
 } // sc_Include

 function Almacenes_menu()
 {
    global $Almacenes_menuData, $nm_data_fixa;
     if (isset($_POST["nmgp_idioma"]))  
     { 
         $Temp_lang = explode(";" , $_POST["nmgp_idioma"]);  
         if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))  
          { 
             $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
         } 
         if (isset($Temp_lang[1]) && !empty($Temp_lang[1])) 
         { 
             $_SESSION['scriptcase']['str_conf_reg'] = $Temp_lang[1];
         } 
     } 
   
     if (isset($_POST["nmgp_schema"]))  
     { 
         $_SESSION['scriptcase']['str_schema_all'] = $_POST["nmgp_schema"] . "/" . $_POST["nmgp_schema"];
     } 
   
           $nm_versao_sc  = "" ; 
           $_SESSION['scriptcase']['Almacenes']['contr_erro'] = 'off';
           $Campos_Mens_erro = "";
           $sc_site_ssl   = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? true : false;
           $NM_dir_atual = getcwd();
           if (empty($NM_dir_atual))
           {
               $str_path_sys          = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
               $str_path_sys          = str_replace("\\", '/', $str_path_sys);
           }
           else
           {
               $sc_nm_arquivo         = explode("/", $_SERVER['PHP_SELF']);
               $str_path_sys          = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
           }
      //check publication with the prod
      $str_path_apl_url = $_SERVER['PHP_SELF'];
      $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
      $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
      $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
      //check prod
      if(empty($_SESSION['scriptcase']['Almacenes']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['scriptcase']['Almacenes']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
      }
$this->sc_charset['UTF-8'] = 'utf-8';
$this->sc_charset['ISO-2022-JP'] = 'iso-2022-jp';
$this->sc_charset['ISO-2022-KR'] = 'iso-2022-kr';
$this->sc_charset['ISO-8859-1'] = 'iso-8859-1';
$this->sc_charset['ISO-8859-2'] = 'iso-8859-2';
$this->sc_charset['ISO-8859-3'] = 'iso-8859-3';
$this->sc_charset['ISO-8859-4'] = 'iso-8859-4';
$this->sc_charset['ISO-8859-5'] = 'iso-8859-5';
$this->sc_charset['ISO-8859-6'] = 'iso-8859-6';
$this->sc_charset['ISO-8859-7'] = 'iso-8859-7';
$this->sc_charset['ISO-8859-8'] = 'iso-8859-8';
$this->sc_charset['ISO-8859-8-I'] = 'iso-8859-8-i';
$this->sc_charset['ISO-8859-9'] = 'iso-8859-9';
$this->sc_charset['ISO-8859-10'] = 'iso-8859-10';
$this->sc_charset['ISO-8859-13'] = 'iso-8859-13';
$this->sc_charset['ISO-8859-14'] = 'iso-8859-14';
$this->sc_charset['ISO-8859-15'] = 'iso-8859-15';
$this->sc_charset['WINDOWS-1250'] = 'windows-1250';
$this->sc_charset['WINDOWS-1251'] = 'windows-1251';
$this->sc_charset['WINDOWS-1252'] = 'windows-1252';
$this->sc_charset['TIS-620'] = 'tis-620';
$this->sc_charset['WINDOWS-1253'] = 'windows-1253';
$this->sc_charset['WINDOWS-1254'] = 'windows-1254';
$this->sc_charset['WINDOWS-1255'] = 'windows-1255';
$this->sc_charset['WINDOWS-1256'] = 'windows-1256';
$this->sc_charset['WINDOWS-1257'] = 'windows-1257';
$this->sc_charset['KOI8-R'] = 'koi8-r';
$this->sc_charset['BIG-5'] = 'big5';
$this->sc_charset['EUC-CN'] = 'EUC-CN';
$this->sc_charset['GB18030'] = 'GB18030';
$this->sc_charset['GB2312'] = 'gb2312';
$this->sc_charset['EUC-JP'] = 'euc-jp';
$this->sc_charset['SJIS'] = 'shift-jis';
$this->sc_charset['EUC-KR'] = 'euc-kr';
$_SESSION['scriptcase']['charset_entities']['UTF-8'] = 'UTF-8';
$_SESSION['scriptcase']['charset_entities']['ISO-8859-1'] = 'ISO-8859-1';
$_SESSION['scriptcase']['charset_entities']['ISO-8859-5'] = 'ISO-8859-5';
$_SESSION['scriptcase']['charset_entities']['ISO-8859-15'] = 'ISO-8859-15';
$_SESSION['scriptcase']['charset_entities']['WINDOWS-1251'] = 'cp1251';
$_SESSION['scriptcase']['charset_entities']['WINDOWS-1252'] = 'cp1252';
$_SESSION['scriptcase']['charset_entities']['BIG-5'] = 'BIG5';
$_SESSION['scriptcase']['charset_entities']['EUC-CN'] = 'GB2312';
$_SESSION['scriptcase']['charset_entities']['GB2312'] = 'GB2312';
$_SESSION['scriptcase']['charset_entities']['SJIS'] = 'Shift_JIS';
$_SESSION['scriptcase']['charset_entities']['EUC-JP'] = 'EUC-JP';
$_SESSION['scriptcase']['charset_entities']['KOI8-R'] = 'KOI8-R';
$str_path_web   = $_SERVER['PHP_SELF'];
$str_path_web   = str_replace("\\", '/', $str_path_web);
$str_path_web   = str_replace('//', '/', $str_path_web);
$str_root       = substr($str_path_sys, 0, -1 * strlen($str_path_web));
$path_link      = substr($str_path_web, 0, strrpos($str_path_web, '/'));
$path_link      = substr($path_link, 0, strrpos($path_link, '/')) . '/';
$path_btn       = $str_root . $path_link . "_lib/buttons/";
$path_imag_cab  = $path_link . "_lib/img";
$this->force_mobile = false;
$this->path_botoes    = '../_lib/img';
$this->path_imag_apl  = $str_root . $path_link . "_lib/img";
$path_help      = $path_link . "_lib/webhelp/";
$path_libs      = $str_root . $_SESSION['scriptcase']['Almacenes']['glo_nm_path_prod'] . "/lib/php";
$path_third     = $str_root . $_SESSION['scriptcase']['Almacenes']['glo_nm_path_prod'] . "/third";
$path_adodb     = $str_root . $_SESSION['scriptcase']['Almacenes']['glo_nm_path_prod'] . "/third/adodb";
$path_apls      = $str_root . substr($path_link, 0, strrpos($path_link, '/'));
$path_img_old   = $str_root . $path_link . "Almacenes/img";
$this->path_css = $str_root . $path_link . "_lib/css/";
$_SESSION['scriptcase']['dir_temp'] = $str_root . $_SESSION['scriptcase']['Almacenes']['glo_nm_path_imag_temp'];
$this->url_css = "../_lib/css/";
$path_lib_php   = $str_root . $path_link . "_lib/lib/php";
$menu_mobile_hide          = 'N';
$menu_mobile_inicial_state = 'escondido';
$menu_mobile_hide_onclick  = 'S';
$menutree_mobile_float     = 'S';
$menu_mobile_hide_icon     = 'N';
$menu_mobile_hide_icon_menu_position     = 'right';
$mobile_menu_mobile_hide          = 'S';
$mobile_menu_mobile_inicial_state = 'aberto';
$mobile_menu_mobile_hide_onclick  = 'S';
$mobile_menutree_mobile_float     = 'N';
$mobile_menu_mobile_hide_icon     = 'N';
$mobile_menu_mobile_hide_icon_menu_position     = 'right';

$this->sc_Include($path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
 if(function_exists('set_php_timezone')) set_php_timezone('Almacenes');
if (isset($_SESSION['scriptcase']['user_logout']))
{
    foreach ($_SESSION['scriptcase']['user_logout'] as $ind => $parms)
    {
        if (isset($_SESSION[$parms['V']]) && $_SESSION[$parms['V']] == $parms['U'])
        {
            unset($_SESSION['scriptcase']['user_logout'][$ind]);
            $nm_apl_dest = $parms['R'];
            $dir = explode("/", $nm_apl_dest);
            if (count($dir) == 1)
            {
                $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
                $nm_apl_dest = $path_link . SC_dir_app_name($nm_apl_dest) . "/";
            }
?>
            <html>
            <body>
            <form name="FRedirect" method="POST" action="<?php echo $nm_apl_dest; ?>" target="<?php echo $parms['T']; ?>">
            </form>
            <script>
             document.FRedirect.submit();
            </script>
            </body>
            </html>
<?php
            exit;
        }
    }
}
if (!defined("SC_ERROR_HANDLER"))
{
    define("SC_ERROR_HANDLER", 1);
    include_once(dirname(__FILE__) . "/Almacenes_erro.php");
}
include_once(dirname(__FILE__) . "/Almacenes_erro.class.php"); 
$this->Erro = new Almacenes_erro();
$str_path = substr($_SESSION['scriptcase']['Almacenes']['glo_nm_path_prod'], 0, strrpos($_SESSION['scriptcase']['Almacenes']['glo_nm_path_prod'], '/') + 1);
if (!is_file($str_root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
{
    unset($_SESSION['scriptcase']['nm_sc_retorno']);
    unset($_SESSION['scriptcase']['Almacenes']['glo_nm_conexao']);
}

/* Path definitions */
$Almacenes_menuData         = array();
$Almacenes_menuData['path'] = array();
$Almacenes_menuData['url']  = array();
$NM_dir_atual = getcwd();
if (empty($NM_dir_atual))
{
    $Almacenes_menuData['path']['sys'] = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
    $Almacenes_menuData['path']['sys'] = str_replace("\\", '/', $str_path_sys);
    $Almacenes_menuData['path']['sys'] = str_replace('//', '/', $str_path_sys);
}
else
{
    $sc_nm_arquivo                                   = explode("/", $_SERVER['PHP_SELF']);
    $Almacenes_menuData['path']['sys'] = str_replace("\\", "/", str_replace("\\\\", "\\", getcwd())) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
}
$Almacenes_menuData['url']['web']   = $_SERVER['PHP_SELF'];
$Almacenes_menuData['url']['web']   = str_replace("\\", '/', $Almacenes_menuData['url']['web']);
$Almacenes_menuData['path']['root'] = substr($Almacenes_menuData['path']['sys'],  0, -1 * strlen($Almacenes_menuData['url']['web']));
$Almacenes_menuData['path']['app']  = substr($Almacenes_menuData['path']['sys'],  0, strrpos($Almacenes_menuData['path']['sys'],  '/'));
$Almacenes_menuData['path']['link'] = substr($Almacenes_menuData['path']['app'],  0, strrpos($Almacenes_menuData['path']['app'],  '/'));
$Almacenes_menuData['path']['link'] = substr($Almacenes_menuData['path']['link'], 0, strrpos($Almacenes_menuData['path']['link'], '/')) . '/';
$Almacenes_menuData['path']['app'] .= '/';
$Almacenes_menuData['url']['app']   = substr($Almacenes_menuData['url']['web'],  0, strrpos($Almacenes_menuData['url']['web'],  '/'));
$Almacenes_menuData['url']['link']  = substr($Almacenes_menuData['url']['app'],  0, strrpos($Almacenes_menuData['url']['app'],  '/'));
if ($_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] == "S")
{
    $Almacenes_menuData['url']['link']  = substr($Almacenes_menuData['url']['link'], 0, strrpos($Almacenes_menuData['url']['link'], '/'));
}
$Almacenes_menuData['url']['link']  .= '/';
$Almacenes_menuData['url']['app']   .= '/';

$nm_img_fun_menu = ""; 
if (!isset($_SESSION['scriptcase']['str_lang']) || empty($_SESSION['scriptcase']['str_lang']))
{
    $_SESSION['scriptcase']['str_lang'] = "es";
}
if (!isset($_SESSION['scriptcase']['str_conf_reg']) || empty($_SESSION['scriptcase']['str_conf_reg']))
{
    $_SESSION['scriptcase']['str_conf_reg'] = "es_ni";
}
$this->str_lang        = $_SESSION['scriptcase']['str_lang'];
$this->str_conf_reg    = $_SESSION['scriptcase']['str_conf_reg'];
if (isset($_SESSION['scriptcase']['Almacenes']['session_timeout']['lang'])) {
    $this->str_lang = $_SESSION['scriptcase']['Almacenes']['session_timeout']['lang'];
}
elseif (!isset($_SESSION['scriptcase']['Almacenes']['actual_lang']) || $_SESSION['scriptcase']['Almacenes']['actual_lang'] != $this->str_lang) {
    $_SESSION['scriptcase']['Almacenes']['actual_lang'] = $this->str_lang;
    setcookie('sc_actual_lang_Almacen',$this->str_lang,'0','/');
}
if (!function_exists("NM_is_utf8"))
{
   include_once("../_lib/lib/php/nm_utf8.php");
}
if (!function_exists("SC_dir_app_ini"))
{
    include_once("../_lib/lib/php/nm_ctrl_app_name.php");
}
SC_dir_app_ini('Almacen');
if ($_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] == "S")
{
    $path_apls     = substr($path_apls, 0, strrpos($path_apls, '/'));
}
$path_apls     .= "/";
$this->str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_SweetAmour/Sc9_SweetAmour";
include("../_lib/lang/". $this->str_lang .".lang.php");
include("../_lib/css/" . $this->str_schema_all . "_menutab.php");
include("../_lib/css/" . $this->str_schema_all . "_menuH.php");
if(isset($pagina_schemamenu) && !empty($pagina_schemamenu) && is_file("../_lib/menuicons/". $pagina_schemamenu .".php"))
{
    include("../_lib/menuicons/". $pagina_schemamenu .".php");
}
$this->img_sep_toolbar = trim($str_toolbar_separator);
include("../_lib/lang/config_region.php");
include("../_lib/lang/lang_config_region.php");
$this->regionalDefault();
$Str_btn_menu = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
$Str_btn_css  = trim($str_button) . "/" . trim($str_button) . ".css";
$this->css_menutab_active_close_icon    = trim($css_menutab_active_close_icon);
$this->css_menutab_inactive_close_icon  = trim($css_menutab_inactive_close_icon);
$this->breadcrumbline_separator  = trim($breadcrumbline_separator);
include($path_btn . $Str_btn_menu);
if (!function_exists("nmButtonOutput"))
{
   include_once("../_lib/lib/php/nm_gp_config_btn.php");
}
asort($this->Nm_lang_conf_region);
$this->sc_Include($path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
$this->sc_Include($path_lib_php . "/nm_functions.php", "", "") ; 
$this->sc_Include($path_lib_php . "/nm_api.php", "", "") ; 
$this->nm_data = new nm_data("es");
include_once("Almacenes_toolbar.php");

$this->tab_grupo[0] = "Almacen/";
if ($_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] != "S")
{
    $this->tab_grupo[0] = "";
}

     $_SESSION['scriptcase']['menu_atual'] = "Almacenes";
     $_SESSION['scriptcase']['menu_apls']['Almacenes'] = array();
     if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
     {
         foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
         {
             if (isset($_SESSION['scriptcase']['Almacenes']['glo_nm_conexao']) && $_SESSION['scriptcase']['Almacenes']['glo_nm_conexao'] == $NM_con_orig)
             {
/*NM*/           $_SESSION['scriptcase']['Almacenes']['glo_nm_conexao'] = $NM_con_dest;
             }
             if (isset($_SESSION['scriptcase']['Almacenes']['glo_nm_perfil']) && $_SESSION['scriptcase']['Almacenes']['glo_nm_perfil'] == $NM_con_orig)
             {
/*NM*/           $_SESSION['scriptcase']['Almacenes']['glo_nm_perfil'] = $NM_con_dest;
             }
             if (isset($_SESSION['scriptcase']['Almacenes']['glo_con_' . $NM_con_orig]))
             {
                 $_SESSION['scriptcase']['Almacenes']['glo_con_' . $NM_con_orig] = $NM_con_dest;
             }
         }
     }
$_SESSION['scriptcase']['charset'] = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "UTF-8";
ini_set('default_charset', $_SESSION['scriptcase']['charset']);
$_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
foreach ($this->Nm_conf_reg[$this->str_conf_reg] as $ind => $dados)
{
    if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
    {
        $this->Nm_conf_reg[$this->str_conf_reg][$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
    }
}
foreach ($this->Nm_lang as $ind => $dados)
{
    if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($ind))
    {
        $ind = sc_convert_encoding($ind, $_SESSION['scriptcase']['charset'], "UTF-8");
        $this->Nm_lang[$ind] = $dados;
    }
    if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
    {
        $this->Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
    }
}
if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
{
    $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
}
if (isset($_SESSION['scriptcase']['Almacenes']['session_timeout']['redir'])) {
    $SS_cod_html  = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
';
    $SS_cod_html .= "<HTML>\r\n";
    $SS_cod_html .= " <HEAD>\r\n";
    $SS_cod_html .= "  <TITLE></TITLE>\r\n";
    $SS_cod_html .= "   <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\"/>\r\n";
    if ($_SESSION['scriptcase']['proc_mobile']) {
        $SS_cod_html .= "   <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\"/>\r\n";
    }
    $SS_cod_html .= "   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n";
    $SS_cod_html .= "    <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n";
    if ($_SESSION['scriptcase']['Almacenes']['session_timeout']['redir_tp'] == "R") {
        $SS_cod_html .= "  </HEAD>\r\n";
        $SS_cod_html .= "   <body>\r\n";
    }
    else {
        $SS_cod_html .= "    <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n";
        $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_menuH.css\"/>\r\n";
        $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_menuH" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\"/>\r\n";
        $SS_cod_html .= "  </HEAD>\r\n";
        $SS_cod_html .= "   <body class=\"scMenuHPage\">\r\n";
        $SS_cod_html .= "    <table align=\"center\"><tr><td style=\"padding: 0\"><div>\r\n";
        $SS_cod_html .= "    <table class=\"scMenuHTable\" width='100%' cellspacing=0 cellpadding=0><tr class=\"scMenuHHeader\"><td class=\"scMenuHHeaderFont\" style=\"padding: 15px 30px; text-align: center\">\r\n";
        $SS_cod_html .= $this->Nm_lang['lang_errm_expired_session'] . "\r\n";
        $SS_cod_html .= "     <form name=\"Fsession_redir\" method=\"post\"\r\n";
        $SS_cod_html .= "           target=\"_self\">\r\n";
        $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['Almacenes']['session_timeout']['redir'] . "');\">\r\n";
        $SS_cod_html .= "     </form>\r\n";
        $SS_cod_html .= "    </td></tr></table>\r\n";
        $SS_cod_html .= "    </div></td></tr></table>\r\n";
    }
    $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
    if ($_SESSION['scriptcase']['Almacenes']['session_timeout']['redir_tp'] == "R") {
        $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['Almacenes']['session_timeout']['redir'] . "');\r\n";
    }
    $SS_cod_html .= "      function sc_session_redir(url_redir)\r\n";
    $SS_cod_html .= "      {\r\n";
    $SS_cod_html .= "         if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')\r\n";
    $SS_cod_html .= "         {\r\n";
    $SS_cod_html .= "            window.parent.sc_session_redir(url_redir);\r\n";
    $SS_cod_html .= "         }\r\n";
    $SS_cod_html .= "         else\r\n";
    $SS_cod_html .= "         {\r\n";
    $SS_cod_html .= "             if (window.opener && typeof window.opener.sc_session_redir === 'function')\r\n";
    $SS_cod_html .= "             {\r\n";
    $SS_cod_html .= "                 window.close();\r\n";
    $SS_cod_html .= "                 window.opener.sc_session_redir(url_redir);\r\n";
    $SS_cod_html .= "             }\r\n";
    $SS_cod_html .= "             else\r\n";
    $SS_cod_html .= "             {\r\n";
    $SS_cod_html .= "                 window.location = url_redir;\r\n";
    $SS_cod_html .= "             }\r\n";
    $SS_cod_html .= "         }\r\n";
    $SS_cod_html .= "      }\r\n";
    $SS_cod_html .= "    </script>\r\n";
    $SS_cod_html .= " </body>\r\n";
    $SS_cod_html .= "</HTML>\r\n";
    unset($_SESSION['scriptcase']['Almacenes']['session_timeout']);
    unset($_SESSION['sc_session']);
}
if (isset($SS_cod_html))
{
    echo $SS_cod_html;
    exit;
}
$_SESSION['scriptcase']['erro']['str_schema'] = $this->str_schema_all . "_error.css";
$_SESSION['scriptcase']['erro']['str_schema_dir'] = $this->str_schema_all . "_error" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
$_SESSION['scriptcase']['erro']['str_lang']   = $this->str_lang;
if (is_dir($path_img_old))
{
    $Res_dir_img = @opendir($path_img_old);
    if ($Res_dir_img)
    {
        while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
        {
           $Str_arquivo = "/" . $Str_arquivo;
           if (@is_file($path_img_old . $Str_arquivo) && '.' != $Str_arquivo && '..' != $path_img_old . $Str_arquivo)
           {
               @unlink($path_img_old . $Str_arquivo);
           }
        }
    }
    @closedir($Res_dir_img);
    rmdir($path_img_old);
}
//
if (isset($_GET) && !empty($_GET))
{
    foreach ($_GET as $nmgp_var => $nmgp_val)
    {
        if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
        {
            $nmgp_var = substr($nmgp_var, 11);
            $nmgp_val = $_SESSION[$nmgp_val];
        }
        if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
        {
            $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
            $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
        }
         $$nmgp_var = $nmgp_val;
    }
}
if (isset($_POST) && !empty($_POST))
{
    foreach ($_POST as $nmgp_var => $nmgp_val)
    {
        if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
        {
            $nmgp_var = substr($nmgp_var, 11);
            $nmgp_val = $_SESSION[$nmgp_val];
        }
        if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
        {
            $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
            $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
        }
         $$nmgp_var = $nmgp_val;
    }
}
if (isset($script_case_init))
{
    $_SESSION['sc_session'][1]['Almacenes']['init'] = $script_case_init;
}
else
if (!isset($_SESSION['sc_session'][1]['Almacenes']['init']))
{
    $_SESSION['sc_session'][1]['Almacenes']['init'] = "";
}
$script_case_init = $_SESSION['sc_session'][1]['Almacenes']['init'];
if (isset($nmgp_parms) && !empty($nmgp_parms)) 
{ 
    $nmgp_parms = NM_decode_input($nmgp_parms);
    $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
    $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
    $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
    $todo  = explode("?@?", $todox);
    $ix = 0;
    while (!empty($todo[$ix]))
    {
       $cadapar = explode("?#?", $todo[$ix]);
       if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
       {
           $cadapar[0] = substr($cadapar[0], 11);
           $cadapar[1] = $_SESSION[$cadapar[1]];
       }
        if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
       $Tmp_par   = $cadapar[0];;
       $$Tmp_par = $cadapar[1];
       $_SESSION[$cadapar[0]] = $cadapar[1];
       $ix++;
     }
} 
if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['Almacenes']['session_timeout']['redir']))
{
    unset($_SESSION['sc_session']['SC_parm_violation']);
    echo "<html>";
    echo "<body>";
    echo "<table align=\"center\" width=\"50%\" border=1 height=\"50px\">";
    echo "<tr>";
    echo "   <td align=\"center\">";
    echo "       <b><font size=4>" . $this->Nm_lang['lang_errm_ajax_data'] . "</font>";
    echo "   </b></td>";
    echo " </tr>";
    echo "</table>";
    echo "</body>";
    echo "</html>";
    exit;
}
$nm_url_saida = "";
if (isset($nmgp_url_saida))
{
    $nm_url_saida = $nmgp_url_saida;
    if (isset($script_case_init))
    {
        $nm_url_saida .= "?script_case_init=" . NM_encode_input($script_case_init) . "&script_case_session=" . session_id();
    }
}
if (isset($_POST["nmgp_idioma"]) || isset($_POST["nmgp_schema"]))  
{ 
    $nm_url_saida = $_SESSION['scriptcase']['sc_saida_Almacenes'];
}
elseif (!empty($nm_url_saida))
{
    $_SESSION['scriptcase']['sc_url_saida'][$script_case_init]  = $nm_url_saida;
    $_SESSION['scriptcase']['sc_saida_Almacenes'] = $nm_url_saida;
}
else
{
    $_SESSION['scriptcase']['sc_saida_Almacenes'] = (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : "javascript:window.close()";
}
$this->sc_Include($path_libs . "/nm_ini_lib.php", "F", "nm_dir_normaliza") ; 
/* Dados do menu em sessao */
$_SESSION['nm_menu'] = array('prod' => $str_root . $_SESSION['scriptcase']['Almacenes']['glo_nm_path_prod'] . '/third/COOLjsMenu/',
                              'url' => $_SESSION['scriptcase']['Almacenes']['glo_nm_path_prod'] . '/third/COOLjsMenu/');

if ((isset($nmgp_outra_jan) && $nmgp_outra_jan == "true") || (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'Almacenes'))
{
    $_SESSION['sc_session'][1]['Almacenes']['sc_outra_jan'] = true;
     unset($_SESSION['scriptcase']['sc_outra_jan']);
    $_SESSION['scriptcase']['sc_saida_Almacenes'] = "javascript:window.close()";
}
/* Menu configuration variables */
$Almacenes_menuData['iframe'] = TRUE;

if (!isset($_SESSION['scriptcase']['sc_apl_seg']))
{
    $_SESSION['scriptcase']['sc_apl_seg'] = array();
}
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_cajas") . "/form_cajas_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_cajas']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_cajas'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_cajas'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_cajas") . "/grid_cajas_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_cajas']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_cajas'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_cajas'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_almacenes") . "/form_almacenes_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_almacenes']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_almacenes'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_almacenes'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_almacenes") . "/form_almacenes_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_almacenes']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_almacenes'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_almacenes'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_articulos") . "/form_articulos_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_articulos']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_articulos'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_articulos'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_fabricantes") . "/form_fabricantes_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_fabricantes']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_fabricantes'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_fabricantes'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_articulos") . "/grid_articulos_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_articulos']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_articulos'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_articulos'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_fabricantes") . "/grid_fabricantes_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_fabricantes']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_fabricantes'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_fabricantes'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_asignado_a") . "/form_asignado_a_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_asignado_a']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_asignado_a'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_asignado_a'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_cientificos") . "/form_cientificos_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_cientificos']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_cientificos'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_cientificos'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_proyecto") . "/form_proyecto_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_proyecto']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_proyecto'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_proyecto'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_asignado_a") . "/grid_asignado_a_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_asignado_a']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_asignado_a'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_asignado_a'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_cientificos") . "/grid_cientificos_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_cientificos']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_cientificos'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_cientificos'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_proyecto") . "/grid_proyecto_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_proyecto']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_proyecto'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_proyecto'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_peliculas") . "/form_peliculas_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_peliculas']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_peliculas'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_peliculas'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_salas") . "/form_salas_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_salas']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_salas'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_salas'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_peliculas") . "/grid_peliculas_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_peliculas']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_peliculas'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_peliculas'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_salas") . "/grid_salas_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_salas']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_salas'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_salas'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_cajeros") . "/form_cajeros_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_cajeros']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_cajeros'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_cajeros'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_maquinas_registradoras") . "/form_maquinas_registradoras_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_maquinas_registradoras']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_maquinas_registradoras'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_maquinas_registradoras'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_productos") . "/form_productos_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_productos']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_productos'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_productos'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_venta") . "/form_venta_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_venta']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_venta'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_venta'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_cajeros") . "/grid_cajeros_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_cajeros']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_cajeros'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_cajeros'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_maquinas_registradoras") . "/grid_maquinas_registradoras_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_maquinas_registradoras']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_maquinas_registradoras'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_maquinas_registradoras'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_productos") . "/grid_productos_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_productos']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_productos'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_productos'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_venta") . "/grid_venta_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_venta']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_venta'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_venta'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_piezas") . "/form_piezas_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_piezas']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_piezas'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_piezas'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_proveedores") . "/form_proveedores_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_proveedores']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_proveedores'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_proveedores'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_suministra") . "/form_suministra_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_suministra']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_suministra'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_suministra'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_piezas") . "/grid_piezas_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_piezas']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_piezas'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_piezas'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_proveedores") . "/grid_proveedores_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_proveedores']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_proveedores'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_proveedores'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_suministra") . "/grid_suministra_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_suministra']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_suministra'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_suministra'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_departamentos") . "/form_departamentos_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_departamentos']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_departamentos'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_departamentos'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_empleados") . "/form_empleados_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_empleados']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_empleados'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_empleados'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_departamentos") . "/grid_departamentos_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_departamentos']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_departamentos'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_departamentos'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_empleados") . "/grid_empleados_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_empleados']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_empleados'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_empleados'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_equipos") . "/form_equipos_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_equipos']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_equipos'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_equipos'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_facultad") . "/form_facultad_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_facultad']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_facultad'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_facultad'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_investigadores") . "/form_investigadores_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_investigadores']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_investigadores'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_investigadores'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("form_reserva") . "/form_reserva_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_reserva']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['form_reserva'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['form_reserva'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_equipos") . "/grid_equipos_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_equipos']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_equipos'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_equipos'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_facultad") . "/grid_facultad_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_facultad']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_facultad'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_facultad'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_investigadores") . "/grid_investigadores_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_investigadores']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_investigadores'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_investigadores'] = "on";
} 
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("grid_reserva") . "/grid_reserva_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reserva']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['grid_reserva'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['grid_reserva'] = "on";
} 
/* Menu items */

$sOutputBuffer = ob_get_contents();
ob_end_clean();

 $nm_var_lab[0] = "Almacen";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[0]))
{
    $nm_var_lab[0] = sc_convert_encoding($nm_var_lab[0], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[1] = "Agregar Caja";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[1]))
{
    $nm_var_lab[1] = sc_convert_encoding($nm_var_lab[1], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[2] = "Buscar Caja";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[2]))
{
    $nm_var_lab[2] = sc_convert_encoding($nm_var_lab[2], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[3] = "Agregar almacen";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[3]))
{
    $nm_var_lab[3] = sc_convert_encoding($nm_var_lab[3], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[4] = "Buscar almacenes";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[4]))
{
    $nm_var_lab[4] = sc_convert_encoding($nm_var_lab[4], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[5] = "Fabrica";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[5]))
{
    $nm_var_lab[5] = sc_convert_encoding($nm_var_lab[5], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[6] = "Agregar articulos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[6]))
{
    $nm_var_lab[6] = sc_convert_encoding($nm_var_lab[6], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[7] = "Agregar fabricantes";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[7]))
{
    $nm_var_lab[7] = sc_convert_encoding($nm_var_lab[7], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[8] = "Buscar articulos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[8]))
{
    $nm_var_lab[8] = sc_convert_encoding($nm_var_lab[8], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[9] = "Buscar fabricantes";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[9]))
{
    $nm_var_lab[9] = sc_convert_encoding($nm_var_lab[9], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[10] = "Cientificos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[10]))
{
    $nm_var_lab[10] = sc_convert_encoding($nm_var_lab[10], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[11] = "Agregar asignado_a";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[11]))
{
    $nm_var_lab[11] = sc_convert_encoding($nm_var_lab[11], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[12] = "Agregar cientificos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[12]))
{
    $nm_var_lab[12] = sc_convert_encoding($nm_var_lab[12], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[13] = "Agregar proyecto";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[13]))
{
    $nm_var_lab[13] = sc_convert_encoding($nm_var_lab[13], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[14] = "Buscar asignado_a";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[14]))
{
    $nm_var_lab[14] = sc_convert_encoding($nm_var_lab[14], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[15] = "Buscar cientificos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[15]))
{
    $nm_var_lab[15] = sc_convert_encoding($nm_var_lab[15], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[16] = "Buscar proyecto";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[16]))
{
    $nm_var_lab[16] = sc_convert_encoding($nm_var_lab[16], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[17] = "Peliculas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[17]))
{
    $nm_var_lab[17] = sc_convert_encoding($nm_var_lab[17], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[18] = "Agregar peliculas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[18]))
{
    $nm_var_lab[18] = sc_convert_encoding($nm_var_lab[18], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[19] = "Agregar salas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[19]))
{
    $nm_var_lab[19] = sc_convert_encoding($nm_var_lab[19], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[20] = "Buscar peliculas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[20]))
{
    $nm_var_lab[20] = sc_convert_encoding($nm_var_lab[20], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[21] = "Buscar salas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[21]))
{
    $nm_var_lab[21] = sc_convert_encoding($nm_var_lab[21], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[22] = "Grandes Almacenes";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[22]))
{
    $nm_var_lab[22] = sc_convert_encoding($nm_var_lab[22], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[23] = "Agregar cajeros";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[23]))
{
    $nm_var_lab[23] = sc_convert_encoding($nm_var_lab[23], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[24] = "Agregar maquinas_registradoras";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[24]))
{
    $nm_var_lab[24] = sc_convert_encoding($nm_var_lab[24], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[25] = "Agregar productos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[25]))
{
    $nm_var_lab[25] = sc_convert_encoding($nm_var_lab[25], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[26] = "Agregar venta";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[26]))
{
    $nm_var_lab[26] = sc_convert_encoding($nm_var_lab[26], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[27] = "Buscar cajeros";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[27]))
{
    $nm_var_lab[27] = sc_convert_encoding($nm_var_lab[27], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[28] = "Buscar maquinas_registradoras";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[28]))
{
    $nm_var_lab[28] = sc_convert_encoding($nm_var_lab[28], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[29] = "Buscar productos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[29]))
{
    $nm_var_lab[29] = sc_convert_encoding($nm_var_lab[29], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[30] = "Buscar venta";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[30]))
{
    $nm_var_lab[30] = sc_convert_encoding($nm_var_lab[30], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[31] = "Piezas y Proveedor";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[31]))
{
    $nm_var_lab[31] = sc_convert_encoding($nm_var_lab[31], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[32] = "Agregar piezas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[32]))
{
    $nm_var_lab[32] = sc_convert_encoding($nm_var_lab[32], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[33] = "agregar proveedores";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[33]))
{
    $nm_var_lab[33] = sc_convert_encoding($nm_var_lab[33], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[34] = "agregar suministra";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[34]))
{
    $nm_var_lab[34] = sc_convert_encoding($nm_var_lab[34], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[35] = "Buscar piezas";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[35]))
{
    $nm_var_lab[35] = sc_convert_encoding($nm_var_lab[35], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[36] = "Buscar proveedores";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[36]))
{
    $nm_var_lab[36] = sc_convert_encoding($nm_var_lab[36], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[37] = "Buscar suministra";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[37]))
{
    $nm_var_lab[37] = sc_convert_encoding($nm_var_lab[37], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[38] = "Empleados";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[38]))
{
    $nm_var_lab[38] = sc_convert_encoding($nm_var_lab[38], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[39] = "Agregar departamentos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[39]))
{
    $nm_var_lab[39] = sc_convert_encoding($nm_var_lab[39], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[40] = "Agregar empleados";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[40]))
{
    $nm_var_lab[40] = sc_convert_encoding($nm_var_lab[40], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[41] = "Buscar departamentos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[41]))
{
    $nm_var_lab[41] = sc_convert_encoding($nm_var_lab[41], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[42] = "Buscar empleados";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[42]))
{
    $nm_var_lab[42] = sc_convert_encoding($nm_var_lab[42], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[43] = "Investigadores";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[43]))
{
    $nm_var_lab[43] = sc_convert_encoding($nm_var_lab[43], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[44] = "Agregar equipos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[44]))
{
    $nm_var_lab[44] = sc_convert_encoding($nm_var_lab[44], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[45] = "Agregar facultad";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[45]))
{
    $nm_var_lab[45] = sc_convert_encoding($nm_var_lab[45], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[46] = "Agregar investigadores";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[46]))
{
    $nm_var_lab[46] = sc_convert_encoding($nm_var_lab[46], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[47] = "Agregar reserva";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[47]))
{
    $nm_var_lab[47] = sc_convert_encoding($nm_var_lab[47], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[48] = "Buscar equipos";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[48]))
{
    $nm_var_lab[48] = sc_convert_encoding($nm_var_lab[48], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[49] = "Buscar facultad";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[49]))
{
    $nm_var_lab[49] = sc_convert_encoding($nm_var_lab[49], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[50] = "Buscar investigadores";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[50]))
{
    $nm_var_lab[50] = sc_convert_encoding($nm_var_lab[50], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[51] = "Buscar reserva";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[51]))
{
    $nm_var_lab[51] = sc_convert_encoding($nm_var_lab[51], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[0] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[0]))
{
    $nm_var_hint[0] = sc_convert_encoding($nm_var_hint[0], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[1] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[1]))
{
    $nm_var_hint[1] = sc_convert_encoding($nm_var_hint[1], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[2] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[2]))
{
    $nm_var_hint[2] = sc_convert_encoding($nm_var_hint[2], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[3] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[3]))
{
    $nm_var_hint[3] = sc_convert_encoding($nm_var_hint[3], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[4] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[4]))
{
    $nm_var_hint[4] = sc_convert_encoding($nm_var_hint[4], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[5] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[5]))
{
    $nm_var_hint[5] = sc_convert_encoding($nm_var_hint[5], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[6] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[6]))
{
    $nm_var_hint[6] = sc_convert_encoding($nm_var_hint[6], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[7] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[7]))
{
    $nm_var_hint[7] = sc_convert_encoding($nm_var_hint[7], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[8] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[8]))
{
    $nm_var_hint[8] = sc_convert_encoding($nm_var_hint[8], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[9] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[9]))
{
    $nm_var_hint[9] = sc_convert_encoding($nm_var_hint[9], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[10] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[10]))
{
    $nm_var_hint[10] = sc_convert_encoding($nm_var_hint[10], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[11] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[11]))
{
    $nm_var_hint[11] = sc_convert_encoding($nm_var_hint[11], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[12] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[12]))
{
    $nm_var_hint[12] = sc_convert_encoding($nm_var_hint[12], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[13] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[13]))
{
    $nm_var_hint[13] = sc_convert_encoding($nm_var_hint[13], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[14] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[14]))
{
    $nm_var_hint[14] = sc_convert_encoding($nm_var_hint[14], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[15] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[15]))
{
    $nm_var_hint[15] = sc_convert_encoding($nm_var_hint[15], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[16] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[16]))
{
    $nm_var_hint[16] = sc_convert_encoding($nm_var_hint[16], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[17] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[17]))
{
    $nm_var_hint[17] = sc_convert_encoding($nm_var_hint[17], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[18] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[18]))
{
    $nm_var_hint[18] = sc_convert_encoding($nm_var_hint[18], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[19] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[19]))
{
    $nm_var_hint[19] = sc_convert_encoding($nm_var_hint[19], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[20] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[20]))
{
    $nm_var_hint[20] = sc_convert_encoding($nm_var_hint[20], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[21] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[21]))
{
    $nm_var_hint[21] = sc_convert_encoding($nm_var_hint[21], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[22] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[22]))
{
    $nm_var_hint[22] = sc_convert_encoding($nm_var_hint[22], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[23] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[23]))
{
    $nm_var_hint[23] = sc_convert_encoding($nm_var_hint[23], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[24] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[24]))
{
    $nm_var_hint[24] = sc_convert_encoding($nm_var_hint[24], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[25] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[25]))
{
    $nm_var_hint[25] = sc_convert_encoding($nm_var_hint[25], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[26] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[26]))
{
    $nm_var_hint[26] = sc_convert_encoding($nm_var_hint[26], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[27] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[27]))
{
    $nm_var_hint[27] = sc_convert_encoding($nm_var_hint[27], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[28] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[28]))
{
    $nm_var_hint[28] = sc_convert_encoding($nm_var_hint[28], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[29] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[29]))
{
    $nm_var_hint[29] = sc_convert_encoding($nm_var_hint[29], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[30] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[30]))
{
    $nm_var_hint[30] = sc_convert_encoding($nm_var_hint[30], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[31] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[31]))
{
    $nm_var_hint[31] = sc_convert_encoding($nm_var_hint[31], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[32] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[32]))
{
    $nm_var_hint[32] = sc_convert_encoding($nm_var_hint[32], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[33] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[33]))
{
    $nm_var_hint[33] = sc_convert_encoding($nm_var_hint[33], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[34] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[34]))
{
    $nm_var_hint[34] = sc_convert_encoding($nm_var_hint[34], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[35] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[35]))
{
    $nm_var_hint[35] = sc_convert_encoding($nm_var_hint[35], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[36] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[36]))
{
    $nm_var_hint[36] = sc_convert_encoding($nm_var_hint[36], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[37] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[37]))
{
    $nm_var_hint[37] = sc_convert_encoding($nm_var_hint[37], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[38] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[38]))
{
    $nm_var_hint[38] = sc_convert_encoding($nm_var_hint[38], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[39] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[39]))
{
    $nm_var_hint[39] = sc_convert_encoding($nm_var_hint[39], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[40] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[40]))
{
    $nm_var_hint[40] = sc_convert_encoding($nm_var_hint[40], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[41] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[41]))
{
    $nm_var_hint[41] = sc_convert_encoding($nm_var_hint[41], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[42] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[42]))
{
    $nm_var_hint[42] = sc_convert_encoding($nm_var_hint[42], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[43] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[43]))
{
    $nm_var_hint[43] = sc_convert_encoding($nm_var_hint[43], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[44] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[44]))
{
    $nm_var_hint[44] = sc_convert_encoding($nm_var_hint[44], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[45] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[45]))
{
    $nm_var_hint[45] = sc_convert_encoding($nm_var_hint[45], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[46] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[46]))
{
    $nm_var_hint[46] = sc_convert_encoding($nm_var_hint[46], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[47] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[47]))
{
    $nm_var_hint[47] = sc_convert_encoding($nm_var_hint[47], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[48] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[48]))
{
    $nm_var_hint[48] = sc_convert_encoding($nm_var_hint[48], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[49] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[49]))
{
    $nm_var_hint[49] = sc_convert_encoding($nm_var_hint[49], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[50] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[50]))
{
    $nm_var_hint[50] = sc_convert_encoding($nm_var_hint[50], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[51] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[51]))
{
    $nm_var_hint[51] = sc_convert_encoding($nm_var_hint[51], $_SESSION['scriptcase']['charset'], "UTF-8");
}
$saida_apl = $_SESSION['scriptcase']['sc_saida_Almacenes'];
$Almacenes_menuData['data'] .= "item_9|.|" . $nm_var_lab[0] . "||" . $nm_var_hint[0] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_cajas']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_cajas']) == "on")
{
    $Almacenes_menuData['data'] .= "item_1|..|" . $nm_var_lab[1] . "|Almacenes_form_php.php?sc_item_menu=item_1&sc_apl_menu=form_cajas&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[1] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_1|..|" . $nm_var_lab[1] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_cajas']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_cajas']) == "on")
{
    $Almacenes_menuData['data'] .= "item_2|..|" . $nm_var_lab[2] . "|Almacenes_form_php.php?sc_item_menu=item_2&sc_apl_menu=grid_cajas&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[2] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_2|..|" . $nm_var_lab[2] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_almacenes']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_almacenes']) == "on")
{
    $Almacenes_menuData['data'] .= "item_5|..|" . $nm_var_lab[3] . "|Almacenes_form_php.php?sc_item_menu=item_5&sc_apl_menu=form_almacenes&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[3] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_5|..|" . $nm_var_lab[3] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_almacenes']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_almacenes']) == "on")
{
    $Almacenes_menuData['data'] .= "item_10|..|" . $nm_var_lab[4] . "|Almacenes_form_php.php?sc_item_menu=item_10&sc_apl_menu=form_almacenes&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[4] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_10|..|" . $nm_var_lab[4] . "||||_self|disabled\n";
}
$Almacenes_menuData['data'] .= "item_11|.|" . $nm_var_lab[5] . "||" . $nm_var_hint[5] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_articulos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_articulos']) == "on")
{
    $Almacenes_menuData['data'] .= "item_13|..|" . $nm_var_lab[6] . "|Almacenes_form_php.php?sc_item_menu=item_13&sc_apl_menu=form_articulos&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[6] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_13|..|" . $nm_var_lab[6] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_fabricantes']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_fabricantes']) == "on")
{
    $Almacenes_menuData['data'] .= "item_14|..|" . $nm_var_lab[7] . "|Almacenes_form_php.php?sc_item_menu=item_14&sc_apl_menu=form_fabricantes&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[7] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_14|..|" . $nm_var_lab[7] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_articulos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_articulos']) == "on")
{
    $Almacenes_menuData['data'] .= "item_15|..|" . $nm_var_lab[8] . "|Almacenes_form_php.php?sc_item_menu=item_15&sc_apl_menu=grid_articulos&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[8] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_15|..|" . $nm_var_lab[8] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_fabricantes']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_fabricantes']) == "on")
{
    $Almacenes_menuData['data'] .= "item_16|..|" . $nm_var_lab[9] . "|Almacenes_form_php.php?sc_item_menu=item_16&sc_apl_menu=grid_fabricantes&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[9] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_16|..|" . $nm_var_lab[9] . "||||_self|disabled\n";
}
$Almacenes_menuData['data'] .= "item_17|.|" . $nm_var_lab[10] . "||" . $nm_var_hint[10] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_asignado_a']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_asignado_a']) == "on")
{
    $Almacenes_menuData['data'] .= "item_18|..|" . $nm_var_lab[11] . "|Almacenes_form_php.php?sc_item_menu=item_18&sc_apl_menu=form_asignado_a&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[11] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_18|..|" . $nm_var_lab[11] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_cientificos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_cientificos']) == "on")
{
    $Almacenes_menuData['data'] .= "item_19|..|" . $nm_var_lab[12] . "|Almacenes_form_php.php?sc_item_menu=item_19&sc_apl_menu=form_cientificos&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[12] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_19|..|" . $nm_var_lab[12] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_proyecto']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_proyecto']) == "on")
{
    $Almacenes_menuData['data'] .= "item_20|..|" . $nm_var_lab[13] . "|Almacenes_form_php.php?sc_item_menu=item_20&sc_apl_menu=form_proyecto&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[13] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_20|..|" . $nm_var_lab[13] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_asignado_a']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_asignado_a']) == "on")
{
    $Almacenes_menuData['data'] .= "item_21|..|" . $nm_var_lab[14] . "|Almacenes_form_php.php?sc_item_menu=item_21&sc_apl_menu=grid_asignado_a&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[14] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_21|..|" . $nm_var_lab[14] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_cientificos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_cientificos']) == "on")
{
    $Almacenes_menuData['data'] .= "item_22|..|" . $nm_var_lab[15] . "|Almacenes_form_php.php?sc_item_menu=item_22&sc_apl_menu=grid_cientificos&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[15] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_22|..|" . $nm_var_lab[15] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_proyecto']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_proyecto']) == "on")
{
    $Almacenes_menuData['data'] .= "item_23|..|" . $nm_var_lab[16] . "|Almacenes_form_php.php?sc_item_menu=item_23&sc_apl_menu=grid_proyecto&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[16] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_23|..|" . $nm_var_lab[16] . "||||_self|disabled\n";
}
$Almacenes_menuData['data'] .= "item_24|.|" . $nm_var_lab[17] . "||" . $nm_var_hint[17] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_peliculas']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_peliculas']) == "on")
{
    $Almacenes_menuData['data'] .= "item_25|..|" . $nm_var_lab[18] . "|Almacenes_form_php.php?sc_item_menu=item_25&sc_apl_menu=form_peliculas&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[18] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_25|..|" . $nm_var_lab[18] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_salas']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_salas']) == "on")
{
    $Almacenes_menuData['data'] .= "item_26|..|" . $nm_var_lab[19] . "|Almacenes_form_php.php?sc_item_menu=item_26&sc_apl_menu=form_salas&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[19] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_26|..|" . $nm_var_lab[19] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_peliculas']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_peliculas']) == "on")
{
    $Almacenes_menuData['data'] .= "item_27|..|" . $nm_var_lab[20] . "|Almacenes_form_php.php?sc_item_menu=item_27&sc_apl_menu=grid_peliculas&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[20] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_27|..|" . $nm_var_lab[20] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_salas']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_salas']) == "on")
{
    $Almacenes_menuData['data'] .= "item_28|..|" . $nm_var_lab[21] . "|Almacenes_form_php.php?sc_item_menu=item_28&sc_apl_menu=grid_salas&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[21] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_28|..|" . $nm_var_lab[21] . "||||_self|disabled\n";
}
$Almacenes_menuData['data'] .= "item_29|.|" . $nm_var_lab[22] . "||" . $nm_var_hint[22] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_cajeros']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_cajeros']) == "on")
{
    $Almacenes_menuData['data'] .= "item_30|..|" . $nm_var_lab[23] . "|Almacenes_form_php.php?sc_item_menu=item_30&sc_apl_menu=form_cajeros&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[23] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_30|..|" . $nm_var_lab[23] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_maquinas_registradoras']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_maquinas_registradoras']) == "on")
{
    $Almacenes_menuData['data'] .= "item_31|..|" . $nm_var_lab[24] . "|Almacenes_form_php.php?sc_item_menu=item_31&sc_apl_menu=form_maquinas_registradoras&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[24] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_31|..|" . $nm_var_lab[24] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_productos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_productos']) == "on")
{
    $Almacenes_menuData['data'] .= "item_32|..|" . $nm_var_lab[25] . "|Almacenes_form_php.php?sc_item_menu=item_32&sc_apl_menu=form_productos&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[25] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_32|..|" . $nm_var_lab[25] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_venta']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_venta']) == "on")
{
    $Almacenes_menuData['data'] .= "item_33|..|" . $nm_var_lab[26] . "|Almacenes_form_php.php?sc_item_menu=item_33&sc_apl_menu=form_venta&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[26] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_33|..|" . $nm_var_lab[26] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_cajeros']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_cajeros']) == "on")
{
    $Almacenes_menuData['data'] .= "item_34|..|" . $nm_var_lab[27] . "|Almacenes_form_php.php?sc_item_menu=item_34&sc_apl_menu=grid_cajeros&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[27] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_34|..|" . $nm_var_lab[27] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_maquinas_registradoras']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_maquinas_registradoras']) == "on")
{
    $Almacenes_menuData['data'] .= "item_35|..|" . $nm_var_lab[28] . "|Almacenes_form_php.php?sc_item_menu=item_35&sc_apl_menu=grid_maquinas_registradoras&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[28] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_35|..|" . $nm_var_lab[28] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_productos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_productos']) == "on")
{
    $Almacenes_menuData['data'] .= "item_36|..|" . $nm_var_lab[29] . "|Almacenes_form_php.php?sc_item_menu=item_36&sc_apl_menu=grid_productos&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[29] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_36|..|" . $nm_var_lab[29] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_venta']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_venta']) == "on")
{
    $Almacenes_menuData['data'] .= "item_37|..|" . $nm_var_lab[30] . "|Almacenes_form_php.php?sc_item_menu=item_37&sc_apl_menu=grid_venta&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[30] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_37|..|" . $nm_var_lab[30] . "||||_self|disabled\n";
}
$Almacenes_menuData['data'] .= "item_38|.|" . $nm_var_lab[31] . "||" . $nm_var_hint[31] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_piezas']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_piezas']) == "on")
{
    $Almacenes_menuData['data'] .= "item_39|..|" . $nm_var_lab[32] . "|Almacenes_form_php.php?sc_item_menu=item_39&sc_apl_menu=form_piezas&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[32] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_39|..|" . $nm_var_lab[32] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_proveedores']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_proveedores']) == "on")
{
    $Almacenes_menuData['data'] .= "item_40|..|" . $nm_var_lab[33] . "|Almacenes_form_php.php?sc_item_menu=item_40&sc_apl_menu=form_proveedores&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[33] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_40|..|" . $nm_var_lab[33] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_suministra']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_suministra']) == "on")
{
    $Almacenes_menuData['data'] .= "item_41|..|" . $nm_var_lab[34] . "|Almacenes_form_php.php?sc_item_menu=item_41&sc_apl_menu=form_suministra&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[34] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_41|..|" . $nm_var_lab[34] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_piezas']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_piezas']) == "on")
{
    $Almacenes_menuData['data'] .= "item_42|..|" . $nm_var_lab[35] . "|Almacenes_form_php.php?sc_item_menu=item_42&sc_apl_menu=grid_piezas&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[35] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_42|..|" . $nm_var_lab[35] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_proveedores']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_proveedores']) == "on")
{
    $Almacenes_menuData['data'] .= "item_43|..|" . $nm_var_lab[36] . "|Almacenes_form_php.php?sc_item_menu=item_43&sc_apl_menu=grid_proveedores&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[36] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_43|..|" . $nm_var_lab[36] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_suministra']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_suministra']) == "on")
{
    $Almacenes_menuData['data'] .= "item_44|..|" . $nm_var_lab[37] . "|Almacenes_form_php.php?sc_item_menu=item_44&sc_apl_menu=grid_suministra&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[37] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_44|..|" . $nm_var_lab[37] . "||||_self|disabled\n";
}
$Almacenes_menuData['data'] .= "item_45|.|" . $nm_var_lab[38] . "||" . $nm_var_hint[38] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_departamentos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_departamentos']) == "on")
{
    $Almacenes_menuData['data'] .= "item_46|..|" . $nm_var_lab[39] . "|Almacenes_form_php.php?sc_item_menu=item_46&sc_apl_menu=form_departamentos&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[39] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_46|..|" . $nm_var_lab[39] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_empleados']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_empleados']) == "on")
{
    $Almacenes_menuData['data'] .= "item_47|..|" . $nm_var_lab[40] . "|Almacenes_form_php.php?sc_item_menu=item_47&sc_apl_menu=form_empleados&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[40] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_47|..|" . $nm_var_lab[40] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_departamentos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_departamentos']) == "on")
{
    $Almacenes_menuData['data'] .= "item_48|..|" . $nm_var_lab[41] . "|Almacenes_form_php.php?sc_item_menu=item_48&sc_apl_menu=grid_departamentos&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[41] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_48|..|" . $nm_var_lab[41] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_empleados']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_empleados']) == "on")
{
    $Almacenes_menuData['data'] .= "item_49|..|" . $nm_var_lab[42] . "|Almacenes_form_php.php?sc_item_menu=item_49&sc_apl_menu=grid_empleados&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[42] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_49|..|" . $nm_var_lab[42] . "||||_self|disabled\n";
}
$Almacenes_menuData['data'] .= "item_50|.|" . $nm_var_lab[43] . "||" . $nm_var_hint[43] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_equipos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_equipos']) == "on")
{
    $Almacenes_menuData['data'] .= "item_51|..|" . $nm_var_lab[44] . "|Almacenes_form_php.php?sc_item_menu=item_51&sc_apl_menu=form_equipos&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[44] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_51|..|" . $nm_var_lab[44] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_facultad']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_facultad']) == "on")
{
    $Almacenes_menuData['data'] .= "item_52|..|" . $nm_var_lab[45] . "|Almacenes_form_php.php?sc_item_menu=item_52&sc_apl_menu=form_facultad&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[45] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_52|..|" . $nm_var_lab[45] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_investigadores']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_investigadores']) == "on")
{
    $Almacenes_menuData['data'] .= "item_53|..|" . $nm_var_lab[46] . "|Almacenes_form_php.php?sc_item_menu=item_53&sc_apl_menu=form_investigadores&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[46] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_53|..|" . $nm_var_lab[46] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['form_reserva']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_reserva']) == "on")
{
    $Almacenes_menuData['data'] .= "item_54|..|" . $nm_var_lab[47] . "|Almacenes_form_php.php?sc_item_menu=item_54&sc_apl_menu=form_reserva&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[47] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_54|..|" . $nm_var_lab[47] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_equipos']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_equipos']) == "on")
{
    $Almacenes_menuData['data'] .= "item_55|..|" . $nm_var_lab[48] . "|Almacenes_form_php.php?sc_item_menu=item_55&sc_apl_menu=grid_equipos&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[48] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_55|..|" . $nm_var_lab[48] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_facultad']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_facultad']) == "on")
{
    $Almacenes_menuData['data'] .= "item_56|..|" . $nm_var_lab[49] . "|Almacenes_form_php.php?sc_item_menu=item_56&sc_apl_menu=grid_facultad&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[49] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_56|..|" . $nm_var_lab[49] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_investigadores']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_investigadores']) == "on")
{
    $Almacenes_menuData['data'] .= "item_57|..|" . $nm_var_lab[50] . "|Almacenes_form_php.php?sc_item_menu=item_57&sc_apl_menu=grid_investigadores&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[50] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_57|..|" . $nm_var_lab[50] . "||||_self|disabled\n";
}
if (isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reserva']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_reserva']) == "on")
{
    $Almacenes_menuData['data'] .= "item_58|..|" . $nm_var_lab[51] . "|Almacenes_form_php.php?sc_item_menu=item_58&sc_apl_menu=grid_reserva&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[51] . "||" . $this->Almacenes_target('_self') . "|" . "\n";
}
else
{
    $Almacenes_menuData['data'] .= "item_58|..|" . $nm_var_lab[51] . "||||_self|disabled\n";
}

$Almacenes_menuData['data'] = array();
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$Almacenes_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[0] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[0] . "",
    'id'       => "item_9",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_9",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_1&sc_apl_menu=form_cajas&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_cajas']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_cajas']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[1] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[1] . "",
        'id'       => "item_1",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_1",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_2&sc_apl_menu=grid_cajas&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_cajas']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_cajas']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[2] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[2] . "",
        'id'       => "item_2",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_2",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_5&sc_apl_menu=form_almacenes&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_almacenes']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_almacenes']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[3] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[3] . "",
        'id'       => "item_5",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_5",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_10&sc_apl_menu=form_almacenes&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_almacenes']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_almacenes']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[4] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[4] . "",
        'id'       => "item_10",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_10",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$Almacenes_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[5] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[5] . "",
    'id'       => "item_11",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_11",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_13&sc_apl_menu=form_articulos&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_articulos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_articulos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[6] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[6] . "",
        'id'       => "item_13",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_13",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_14&sc_apl_menu=form_fabricantes&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_fabricantes']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_fabricantes']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[7] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[7] . "",
        'id'       => "item_14",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_14",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_15&sc_apl_menu=grid_articulos&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_articulos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_articulos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[8] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[8] . "",
        'id'       => "item_15",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_15",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_16&sc_apl_menu=grid_fabricantes&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_fabricantes']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_fabricantes']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[9] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[9] . "",
        'id'       => "item_16",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_16",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$Almacenes_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[10] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[10] . "",
    'id'       => "item_17",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_17",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_18&sc_apl_menu=form_asignado_a&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_asignado_a']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_asignado_a']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[11] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[11] . "",
        'id'       => "item_18",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_18",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_19&sc_apl_menu=form_cientificos&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_cientificos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_cientificos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[12] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[12] . "",
        'id'       => "item_19",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_19",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_20&sc_apl_menu=form_proyecto&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_proyecto']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_proyecto']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[13] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[13] . "",
        'id'       => "item_20",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_20",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_21&sc_apl_menu=grid_asignado_a&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_asignado_a']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_asignado_a']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[14] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[14] . "",
        'id'       => "item_21",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_21",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_22&sc_apl_menu=grid_cientificos&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_cientificos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_cientificos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[15] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[15] . "",
        'id'       => "item_22",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_22",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_23&sc_apl_menu=grid_proyecto&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_proyecto']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_proyecto']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[16] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[16] . "",
        'id'       => "item_23",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_23",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$Almacenes_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[17] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[17] . "",
    'id'       => "item_24",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_24",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_25&sc_apl_menu=form_peliculas&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_peliculas']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_peliculas']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[18] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[18] . "",
        'id'       => "item_25",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_25",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_26&sc_apl_menu=form_salas&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_salas']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_salas']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[19] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[19] . "",
        'id'       => "item_26",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_26",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_27&sc_apl_menu=grid_peliculas&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_peliculas']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_peliculas']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[20] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[20] . "",
        'id'       => "item_27",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_27",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_28&sc_apl_menu=grid_salas&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_salas']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_salas']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[21] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[21] . "",
        'id'       => "item_28",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_28",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$Almacenes_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[22] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[22] . "",
    'id'       => "item_29",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_29",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_30&sc_apl_menu=form_cajeros&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_cajeros']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_cajeros']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[23] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[23] . "",
        'id'       => "item_30",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_30",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_31&sc_apl_menu=form_maquinas_registradoras&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_maquinas_registradoras']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_maquinas_registradoras']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[24] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[24] . "",
        'id'       => "item_31",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_31",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_32&sc_apl_menu=form_productos&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_productos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_productos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[25] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[25] . "",
        'id'       => "item_32",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_32",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_33&sc_apl_menu=form_venta&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_venta']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_venta']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[26] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[26] . "",
        'id'       => "item_33",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_33",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_34&sc_apl_menu=grid_cajeros&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_cajeros']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_cajeros']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[27] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[27] . "",
        'id'       => "item_34",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_34",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_35&sc_apl_menu=grid_maquinas_registradoras&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_maquinas_registradoras']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_maquinas_registradoras']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[28] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[28] . "",
        'id'       => "item_35",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_35",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_36&sc_apl_menu=grid_productos&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_productos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_productos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[29] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[29] . "",
        'id'       => "item_36",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_36",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_37&sc_apl_menu=grid_venta&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_venta']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_venta']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[30] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[30] . "",
        'id'       => "item_37",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_37",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$Almacenes_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[31] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[31] . "",
    'id'       => "item_38",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_38",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_39&sc_apl_menu=form_piezas&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_piezas']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_piezas']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[32] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[32] . "",
        'id'       => "item_39",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_39",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_40&sc_apl_menu=form_proveedores&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_proveedores']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_proveedores']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[33] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[33] . "",
        'id'       => "item_40",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_40",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_41&sc_apl_menu=form_suministra&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_suministra']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_suministra']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[34] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[34] . "",
        'id'       => "item_41",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_41",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_42&sc_apl_menu=grid_piezas&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_piezas']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_piezas']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[35] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[35] . "",
        'id'       => "item_42",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_42",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_43&sc_apl_menu=grid_proveedores&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_proveedores']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_proveedores']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[36] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[36] . "",
        'id'       => "item_43",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_43",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_44&sc_apl_menu=grid_suministra&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_suministra']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_suministra']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[37] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[37] . "",
        'id'       => "item_44",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_44",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$Almacenes_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[38] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[38] . "",
    'id'       => "item_45",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_45",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_46&sc_apl_menu=form_departamentos&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_departamentos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_departamentos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[39] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[39] . "",
        'id'       => "item_46",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_46",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_47&sc_apl_menu=form_empleados&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_empleados']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_empleados']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[40] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[40] . "",
        'id'       => "item_47",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_47",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_48&sc_apl_menu=grid_departamentos&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_departamentos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_departamentos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[41] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[41] . "",
        'id'       => "item_48",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_48",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_49&sc_apl_menu=grid_empleados&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_empleados']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_empleados']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[42] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[42] . "",
        'id'       => "item_49",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_49",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$Almacenes_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[43] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[43] . "",
    'id'       => "item_50",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_50",
    'disabled' => $str_disabled,
    'display'     => "text_img",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-cog",
    'icon_color'     => "",
    'icon_color_hover'     => "",
    'icon_color_disabled'     => "",
);
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_51&sc_apl_menu=form_equipos&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_equipos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_equipos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[44] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[44] . "",
        'id'       => "item_51",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_51",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_52&sc_apl_menu=form_facultad&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_facultad']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_facultad']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[45] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[45] . "",
        'id'       => "item_52",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_52",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_53&sc_apl_menu=form_investigadores&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_investigadores']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_investigadores']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[46] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[46] . "",
        'id'       => "item_53",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_53",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_54&sc_apl_menu=form_reserva&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['form_reserva']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['form_reserva']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['form']['active']))
    {
        $icon_aba = $arr_menuicons['form']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['form']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['form']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[47] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[47] . "",
        'id'       => "item_54",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_54",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_55&sc_apl_menu=grid_equipos&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_equipos']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_equipos']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[48] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[48] . "",
        'id'       => "item_55",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_55",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_56&sc_apl_menu=grid_facultad&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_facultad']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_facultad']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[49] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[49] . "",
        'id'       => "item_56",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_56",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_57&sc_apl_menu=grid_investigadores&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_investigadores']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_investigadores']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[50] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[50] . "",
        'id'       => "item_57",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_57",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "Almacenes_form_php.php?sc_item_menu=item_58&sc_apl_menu=grid_reserva&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grid_reserva']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['grid_reserva']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $Almacenes_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[51] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[51] . "",
        'id'       => "item_58",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->Almacenes_target('_self') . "\"",
        'sc_id'    => "item_58",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );

if (isset($_SESSION['scriptcase']['sc_def_menu']['Almacenes']))
{
    $arr_menu_usu = $this->nm_arr_menu_recursiv($_SESSION['scriptcase']['sc_def_menu']['Almacenes']);
    $this->nm_gera_menus($str_menu_usu, $arr_menu_usu, 1, 'Almacenes');
    $Almacenes_menuData['data'] = $str_menu_usu;
}
if (is_file("Almacenes_help.txt"))
{
    $Arq_WebHelp = file("Almacenes_help.txt"); 
    if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
    {
        $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
        $Tmp = explode(";", $Arq_WebHelp[0]); 
        foreach ($Tmp as $Cada_help)
        {
            $Tmp1 = explode(":", $Cada_help); 
            if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "menu" && is_file($str_root . $path_help . $Tmp1[1]))
            {
                $str_disabled = "N";
                $str_link = "" . $path_help . $Tmp1[1] . "";
                $str_icon = "";
                $icon_aba = "";
                $icon_aba_inactive = "";
                if(empty($icon_aba) && isset($arr_menuicons['']['active']))
                {
                    $icon_aba = $arr_menuicons['']['active'];
                }
                if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
                {
                    $icon_aba_inactive = $arr_menuicons['']['inactive'];
                }
                $Almacenes_menuData['data'][] = array(
                    'label'    => "" . $this->Nm_lang['lang_btns_help_hint'] . "",
                    'level'    => "0",
                    'link'     => $str_link,
                    'hint'     => "" . $this->Nm_lang['lang_btns_help_hint'] . "",
                    'id'       => "item_Help",
                    'icon'     => $str_icon,
                    'icon_aba' => $icon_aba,
                    'icon_aba_inactive' => $icon_aba_inactive,
                    'target'   => "" . $this->Almacenes_target('_blank') . "",
                    'sc_id'    => "item_Help",
                    'disabled' => $str_disabled,
                    'display'     => "text",
                    'display_position'=> "",
                    'icon_fa'     => "",
                    'icon_color'     => "",
                    'icon_color_hover'     => "",
                    'icon_color_disabled'     => "",
                );
            }
        }
    }
}

if (isset($_SESSION['scriptcase']['sc_menu_del']['Almacenes']) && !empty($_SESSION['scriptcase']['sc_menu_del']['Almacenes']))
{
    $nivel = 0;
    $exclui_menu = false;
    foreach ($Almacenes_menuData['data'] as $i_menu => $cada_menu)
    {
       if (in_array($cada_menu['id'], $_SESSION['scriptcase']['sc_menu_del']['Almacenes']))
       {
          $nivel = $cada_menu['level'];
          $exclui_menu = true;
          unset($Almacenes_menuData['data'][$i_menu]);
       }
       elseif ( empty($cada_menu) || ($exclui_menu && $nivel < $cada_menu['level']))
       {
          unset($Almacenes_menuData['data'][$i_menu]);
       }
       else
       {
          $exclui_menu = false;
       }
    }
    $Temp_menu = array();
    foreach ($Almacenes_menuData['data'] as $i_menu => $cada_menu)
    {
        $Temp_menu[] = $cada_menu;
    }
    $Almacenes_menuData['data'] = $Temp_menu;
}

if (isset($_SESSION['scriptcase']['sc_menu_disable']['Almacenes']) && !empty($_SESSION['scriptcase']['sc_menu_disable']['Almacenes']))
{
    $disable_menu = false;
    foreach ($Almacenes_menuData['data'] as $i_menu => $cada_menu)
    {
       if (in_array($cada_menu['id'], $_SESSION['scriptcase']['sc_menu_disable']['Almacenes']))
       {
          $nivel = $cada_menu['level'];
          $disable_menu = true;
          $Almacenes_menuData['data'][$i_menu]['disabled'] = 'Y';
       }
       elseif (!empty($cada_menu) && $disable_menu && $nivel < $cada_menu['level'])
       { 
          $Almacenes_menuData['data'][$i_menu]['disabled'] = 'Y';
       }
       elseif (!empty($cada_menu))
       {
          $disable_menu = false;
       }
    }
}

/* HTML header */
if ($Almacenes_menuData['iframe'])
{
    $Almacenes_menuData['height'] = '100%';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?> style="height: 100%">
<head>
 <title>Almacenes</title>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <?php
 if ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
 {
  ?>
   <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
  <?php
 }
 ?>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
 <?php 
 if(isset($str_google_fonts) && !empty($str_google_fonts)) 
 { 
     ?> 
     <link rel="stylesheet" type="text/css" href="<?php echo $str_google_fonts ?>" /> 
     <?php 
 } 
 ?> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_btngrp.css<?php if (@is_file($this->path_css . $this->str_schema_all . '_btngrp.css')) { echo '?scp=' . md5($this->path_css . $this->str_schema_all . '_btngrp.css'); } ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menutab.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menutab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menuH<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menuH.css<?php if (@is_file($this->path_css . $this->str_schema_all . '_menuH.css')) { echo '?scp=' . md5($this->path_css . $this->str_schema_all . '_menuH.css'); } ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $Str_btn_css ?>" /> 
 <link rel="stylesheet" href="<?php echo $_SESSION['scriptcase']['Almacenes']['glo_nm_path_prod']; ?>/third/font-awesome/css/all.min.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="../_lib/css/_menuTheme/scriptcase_Scriptcase_ScriptCase4_Cherry_hor_<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir']; ?>.css<?php if (@is_file($this->path_css . '_menuTheme/' . "scriptcase_Scriptcase_ScriptCase4_Cherry" . '_' . hor . '.css')) { echo '?scp=' . md5($this->path_css . '_menuTheme/' . "scriptcase_Scriptcase_ScriptCase4_Cherry" . '_' . hor . '.css'); } ?>" />
<style>
   .scTabText {
   }    <?php
        if(isset($_SESSION['scriptcase']['sc_def_menu']) && !empty($_SESSION['scriptcase']['sc_def_menu']))
        {
            foreach($_SESSION['scriptcase']['sc_def_menu'] as $arr_menus)
            {
              foreach($arr_menus as $id => $arr_item)
              {
                  if(isset($arr_item['icon_color']) && !empty($arr_item['icon_color']))
                  {
                      echo "   #" . $id . " .icon_fa{ color: ". $arr_item['icon_color'] ."  !important}
";
                      if(isset($menu_parms1['icons_inherit_style']) && $menu_parms1['icons_inherit_style'] == 'S')
                      {
                          echo "   #aba_td_" . $id . " i{ color:". $arr_item['icon_color'] ."  !important}
";
                      }
                  }
                  if(isset($arr_item['icon_color_hover']) && !empty($arr_item['icon_color_hover']))
                  {
                      echo "   #" . $id . ":hover .icon_fa{ color: ". $arr_item['icon_color_hover'] ."  !important}
";
                      if(isset($menu_parms1['icons_inherit_style']) && $menu_parms1['icons_inherit_style'] == 'S')
                      {
                          echo "   #aba_td_" . $id . ":hover i{ color:". $arr_item['icon_color_hover'] ."  !important}
";
                      }
                  }
                  if(isset($arr_item['icon_color_disabled']) && !empty($arr_item['icon_color_disabled']))
                  {
                      echo "   #" . $id . ".scdisabledmain .icon_fa{ color: ". $arr_item['icon_color_disabled'] ."  !important}
";
                      echo "   #" . $id . ".scdisabledsub .icon_fa{ color: ". $arr_item['icon_color_disabled'] ."  !important}
";
                      if(isset($menu_parms1['icons_inherit_style']) && $menu_parms1['icons_inherit_style'] == 'S')
                      {
                          echo "   #aba_td_" . $id . ".scTabInactive i{ color:". $arr_item['icon_color_disabled'] ."  !important}
";
                      }
                  }
              }
            }
        }
    ?>
</style>
<script type="text/javascript">
 var is_menu_vertical = false;
 function sc_session_redir(url_redir)
 {
     if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
     {
         window.parent.sc_session_redir(url_redir);
     }
     else
     {
         if (window.opener && typeof window.opener.sc_session_redir === 'function')
         {
             window.close();
             window.opener.sc_session_redir(url_redir);
         }
         else
         {
             window.location = url_redir;
         }
     }
 }
</script>
</head>
<body style="height: 100%" scroll="no" class='scMenuHPage'>
<?php

if ('' != $sOutputBuffer)
{
    echo $sOutputBuffer;
}

    $NM_scr_iframe = (isset($_POST['hid_scr_iframe'])) ? $_POST['hid_scr_iframe'] : "";   
}
else
{
    $Almacenes_menuData['height'] = '30px';
}

/* JS files */
?>
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['Almacenes']['glo_nm_path_prod']; ?>/third/jquery/js/jquery.js"></script>
<script  type="text/javascript" src="<?php echo $_SESSION['scriptcase']['Almacenes']['glo_nm_path_prod']; ?>/third/jquery_plugin/contextmenu/jquery.contextmenu.js"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['scriptcase']['Almacenes']['glo_nm_path_prod']; ?>/third/jquery_plugin/contextmenu/contextmenu.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_contextmenu.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_contextmenu.css<?php if (@is_file($this->path_css . $this->str_schema_all . '_contextmenu.css')) { echo '?scp=' . md5($this->path_css . $this->str_schema_all . '_contextmenu.css'); } ?>" /> 
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['Almacenes']['glo_nm_path_prod']; ?>/third/sweetalert/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['Almacenes']['glo_nm_path_prod']; ?>/third/sweetalert/polyfill.min.js"></script>
<link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_sweetalert.css" />
<?php
$confirmButtonClass = '';
$cancelButtonClass  = '';
$confirmButtonText  = $this->Nm_lang['lang_btns_cfrm'];
$cancelButtonText   = $this->Nm_lang['lang_btns_cncl'];
$confirmButtonFA    = '';
$cancelButtonFA     = '';
$confirmButtonFAPos = '';
$cancelButtonFAPos  = '';
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['style']) && '' != $this->arr_buttons['bsweetalert_ok']['style']) {
    $confirmButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_ok']['style'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['style']) && '' != $this->arr_buttons['bsweetalert_cancel']['style']) {
    $cancelButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_cancel']['style'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['value']) && '' != $this->arr_buttons['bsweetalert_ok']['value']) {
    $confirmButtonText = $this->arr_buttons['bsweetalert_ok']['value'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['value']) && '' != $this->arr_buttons['bsweetalert_cancel']['value']) {
    $cancelButtonText = $this->arr_buttons['bsweetalert_cancel']['value'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) {
    $confirmButtonFA = $this->arr_buttons['bsweetalert_ok']['fontawesomeicon'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) {
    $cancelButtonFA = $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_ok']['display_position']) {
    $confirmButtonFAPos = 'text_right';
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_cancel']['display_position']) {
    $cancelButtonFAPos = 'text_right';
}
?>
<script type="text/javascript">
  var scSweetAlertConfirmButton = "<?php echo $confirmButtonClass ?>";
  var scSweetAlertCancelButton = "<?php echo $cancelButtonClass ?>";
  var scSweetAlertConfirmButtonText = "<?php echo $confirmButtonText ?>";
  var scSweetAlertCancelButtonText = "<?php echo $cancelButtonText ?>";
  var scSweetAlertConfirmButtonFA = "<?php echo $confirmButtonFA ?>";
  var scSweetAlertCancelButtonFA = "<?php echo $cancelButtonFA ?>";
  var scSweetAlertConfirmButtonFAPos = "<?php echo $confirmButtonFAPos ?>";
  var scSweetAlertCancelButtonFAPos = "<?php echo $cancelButtonFAPos ?>";
</script>
<script type="text/javascript" src="Almacenes_message.js"></script>
<script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
<script type="text/javascript">
$(function() {
<?php
if (count($this->nm_mens_alert)) {
   if (isset($this->Ini->nm_mens_alert) && !empty($this->Ini->nm_mens_alert))
   {
       if (isset($this->nm_mens_alert) && !empty($this->nm_mens_alert))
       {
           $this->nm_mens_alert   = array_merge($this->Ini->nm_mens_alert, $this->nm_mens_alert);
           $this->nm_params_alert = array_merge($this->Ini->nm_params_alert, $this->nm_params_alert);
       }
       else
       {
           $this->nm_mens_alert   = $this->Ini->nm_mens_alert;
           $this->nm_params_alert = $this->Ini->nm_params_alert;
       }
   }
   if (isset($this->nm_mens_alert) && !empty($this->nm_mens_alert))
   {
       foreach ($this->nm_mens_alert as $i_alert => $mensagem)
       {
           $alertParams = array();
           if (isset($this->nm_params_alert[$i_alert]))
           {
               foreach ($this->nm_params_alert[$i_alert] as $paramName => $paramValue)
               {
                   if (in_array($paramName, array('title', 'timer', 'confirmButtonText', 'confirmButtonFA', 'confirmButtonFAPos', 'cancelButtonText', 'cancelButtonFA', 'cancelButtonFAPos', 'footer', 'width', 'padding')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif (in_array($paramName, array('showConfirmButton', 'showCancelButton', 'toast')) && in_array($paramValue, array(true, false)))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('position' == $paramName && in_array($paramValue, array('top', 'top-start', 'top-end', 'center', 'center-start', 'center-end', 'bottom', 'bottom-start', 'bottom-end')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('type' == $paramName && in_array($paramValue, array('warning', 'error', 'success', 'info', 'question')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('background' == $paramName)
                   {
                       $image_param = $paramValue;
                       preg_match_all('/url\(([\s])?(["|\'])?(.*?)(["|\'])?([\s])?\)/i', $paramValue, $matches, PREG_PATTERN_ORDER);
                       if (isset($matches[3])) {
                           foreach ($matches[3] as $match) {
                               if ('http:' != substr($match, 0, 5) && 'https:' != substr($match, 0, 6) && '/' != substr($match, 0, 1)) {
                                   $image_param = str_replace($match, "{$this->Ini->path_img_global}/{$match}", $image_param);
                               }
                           }
                       }
                       $paramValue = $image_param;
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
               }
           }
           $jsonParams = json_encode($alertParams);
?>
       scJs_alert('<?php echo $mensagem ?>', <?php echo $jsonParams ?>);
<?php
       }
   }
}
?>
});
</script>
<?php
$_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                  $this->Nm_lang['lang_mnth_janu'],
                                  $this->Nm_lang['lang_mnth_febr'],
                                  $this->Nm_lang['lang_mnth_marc'],
                                  $this->Nm_lang['lang_mnth_apri'],
                                  $this->Nm_lang['lang_mnth_mayy'],
                                  $this->Nm_lang['lang_mnth_june'],
                                  $this->Nm_lang['lang_mnth_july'],
                                  $this->Nm_lang['lang_mnth_augu'],
                                  $this->Nm_lang['lang_mnth_sept'],
                                  $this->Nm_lang['lang_mnth_octo'],
                                  $this->Nm_lang['lang_mnth_nove'],
                                  $this->Nm_lang['lang_mnth_dece']);
$_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                  $this->Nm_lang['lang_shrt_mnth_janu'],
                                  $this->Nm_lang['lang_shrt_mnth_febr'],
                                  $this->Nm_lang['lang_shrt_mnth_marc'],
                                  $this->Nm_lang['lang_shrt_mnth_apri'],
                                  $this->Nm_lang['lang_shrt_mnth_mayy'],
                                  $this->Nm_lang['lang_shrt_mnth_june'],
                                  $this->Nm_lang['lang_shrt_mnth_july'],
                                  $this->Nm_lang['lang_shrt_mnth_augu'],
                                  $this->Nm_lang['lang_shrt_mnth_sept'],
                                  $this->Nm_lang['lang_shrt_mnth_octo'],
                                  $this->Nm_lang['lang_shrt_mnth_nove'],
                                  $this->Nm_lang['lang_shrt_mnth_dece']);
$_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                  $this->Nm_lang['lang_days_sund'],
                                  $this->Nm_lang['lang_days_mond'],
                                  $this->Nm_lang['lang_days_tued'],
                                  $this->Nm_lang['lang_days_wend'],
                                  $this->Nm_lang['lang_days_thud'],
                                  $this->Nm_lang['lang_days_frid'],
                                  $this->Nm_lang['lang_days_satd']);
$_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                  $this->Nm_lang['lang_shrt_days_sund'],
                                  $this->Nm_lang['lang_shrt_days_mond'],
                                  $this->Nm_lang['lang_shrt_days_tued'],
                                  $this->Nm_lang['lang_shrt_days_wend'],
                                  $this->Nm_lang['lang_shrt_days_thud'],
                                  $this->Nm_lang['lang_shrt_days_frid'],
                                  $this->Nm_lang['lang_shrt_days_satd']);
$Str_date = strtolower($_SESSION['scriptcase']['reg_conf']['date_format']);
$Lim   = strlen($Str_date);
$Ult   = "";
$Arr_D = array();
for ($I = 0; $I < $Lim; $I++)
{
    $Char = substr($Str_date, $I, 1);
    if ($Char != $Ult)
    {
        $Arr_D[] = $Char;
    }
    $Ult = $Char;
}
$Prim = true;
$Str  = "";
foreach ($Arr_D as $Cada_d)
{
    $Str .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
    $Str .= $Cada_d;
    $Prim = false;
}
$Str = str_replace("a", "Y", $Str);
$Str = str_replace("y", "Y", $Str);
$nm_data_fixa = date($Str); 
?>
<?php
$larg_table = "100%";
$col_span   = "";
$strAlign = 'align=\'left\'';
?>
<?php
$str_bmenu = nmButtonOutput($this->arr_buttons, "bmenu", "showMenu();", "showMenu();", "bmenu", "", "" . $this->Nm_lang['lang_btns_menu'] . "", "position:absolute; top:0px; left:0px; z-index:9999;", "absmiddle", "", "0px", $this->path_botoes, "", "" . $this->Nm_lang['lang_btns_menu_hint'] . "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
    $menu_mobile_hide          = $mobile_menu_mobile_hide;
    $menu_mobile_inicial_state = $mobile_menu_mobile_inicial_state;
    $menu_mobile_hide_onclick  = $mobile_menu_mobile_hide_onclick;
    $menutree_mobile_float     = $mobile_menutree_mobile_float;
    $menu_mobile_hide_icon     = $mobile_menu_mobile_hide_icon;
    $menu_mobile_hide_icon_menu_position     = $mobile_menu_mobile_hide_icon_menu_position;
}
if($menu_mobile_hide == 'S')
{
    if($menu_mobile_inicial_state =='escondido')
    {
            $str_menu_display="hide";
            $str_btn_display="show";
    }
    else
    {
        $str_menu_display="show";
        $str_btn_display="hide";
    }
    if($menu_mobile_hide_icon != 'S')
    {
        $str_btn_display="show";
    }
?>
<script>
    $( document ).ready(function() {
        $('#bmenu').<?php echo $str_btn_display; ?>();
        $('#idMenuCell').<?php echo $str_menu_display; ?>();
        $('#id_toolbar').<?php echo $str_menu_display; ?>();
        if($('#bmenu').length)
        {
            if($('.scMenuHHeader').length)
            {
                  $(".scMenuHHeader").css("padding-left", $('#bmenu').outerWidth());
            }
            else if($('.scMenuToolbar').length)
            {
                  $(".scMenuToolbar").css("padding-left", $('#bmenu').outerWidth());
            }
        }
        <?php
                if($menutree_mobile_float == 'S')
                {
                ?>
                    str_html_menu    = $('#idMenuCell').html();
                    str_html_toolbar = '';
                    if($('#idMenuToolbar').length)
                    {
                      str_html_toolbar = $('#idMenuToolbar').html();
                    }
                    $('#idMenuCell').remove()
                    $('#id_toolbar').remove()
                    $( 'body' ).prepend( "<div id='idMenuCell' style='position:absolute; top:0px; left:0px;z-index:9999;display:<?php echo (($menu_mobile_inicial_state =='escondido')?'none':''); ?>'>"+ str_html_menu + "<div>" + str_html_toolbar +"</div></div>" );
                    <?php
                    if($menu_mobile_hide_icon != 'S')
                    {
                        if($menu_mobile_hide_icon_menu_position == 'right')
                        {
                        ?>
                          $('#idMenuCell').css('left', $('#bmenu').outerWidth());
                        <?php
                        }
                        else
                        {
                          ?>
                          $('#idMenuCell').css('top', $('#bmenu').outerHeight());
                          <?php
                        }
                    }
                }
                elseif($menu_mobile_hide_icon == 'S')
                {
                ?>
                  $("#idDivMenu").css("padding-left", $('#bmenu').outerWidth());
                <?php
                }
                ?>
    });
    function showMenu()
    {
      <?php
      if($menu_mobile_hide_icon == 'S')
      {
      ?>
                $('#bmenu').hide();
      <?php
      }
      ?>
            $('#idMenuCell').fadeToggle();
            $('#id_toolbar').fadeToggle();
      <?php
      if($menutree_mobile_float != 'S')
      {
      ?>
  setTimeout(function(){ scToggleOverflow(); }, 600);
      <?php
      }
      ?>
    }
    function HideMenu()
    {
      <?php
      if($menu_mobile_hide_icon == 'S')
      {
      ?>
                $('#bmenu').show();
      <?php
      }
      ?>
            $('#idMenuCell').fadeToggle();
            $('#id_toolbar').fadeToggle();
      <?php
      if($menutree_mobile_float != 'S')
      {
      ?>
  setTimeout(function(){ scToggleOverflow(); }, 600);
      <?php
      }
      ?>
    }
</script>
<?php
echo $str_bmenu;
}
?>
<script>
                        $( document ).ready(function() {
                                        $.contextMenu({
                                                        selector:'#contrl_abas > li',
                                                        leftButton: true,
                                                        callback: function(key, options)
                                                        {
                                                                                                        switch(key)
                                                                                                        {
                                                                                                                        case 'close':
                                                                                                                                        contextMenuCloseTab($(this).attr('id'));
                                                                                                                        break;

                                                                                                                        case 'closeall':
                                                                                                                                        contextMenuCloseAllTabs();
                                                                                                                        break;

                                                                                                                        case 'closeothers':
                                                                                                                                        contextMenuCloseOthersTabs($(this).attr('id'));
                                                                                                                        break;

                                                                                                                        case 'closeright':
                                                                                                                                        contextMenuCloseRight($(this).attr('id'));
                                                                                                                        break;

                                                                                                                        case 'closeleft':
                                                                                                                                        contextMenuCloseLeft($(this).attr('id'));
                                                                                                                        break;
                                                                                                        }
                                                                                        },
                                                        items: {
                                                                                                        "close": {name: '<?php echo str_replace("'", "\'", $this->Nm_lang['lang_othr_contextmenu_close']); ?>'},
                                                                                                        "closeall": {name: '<?php echo str_replace("'", "\'", $this->Nm_lang['lang_othr_contextmenu_closeall']); ?>'},
                                                                                                        "closeothers" : {name: '<?php echo str_replace("'", "\'", $this->Nm_lang['lang_othr_contextmenu_closeothers']); ?>'},
                                                                                                        "closeright" : {name: '<?php echo str_replace("'", "\'", $this->Nm_lang['lang_othr_contextmenu_closeright']); ?>'},
                                                                                                        "closeleft" : {name: '<?php echo str_replace("'", "\'", $this->Nm_lang['lang_othr_contextmenu_closeleft']); ?>'},
                                                                                        }
                                        });
                        });

                        function contextMenuCloseAllTabs()
                        {
                                        $( "#contrl_abas li" ).each(function( index ) {
                                                        contextMenuCloseTab($( this ).attr('id'));
                                        });
                        }

                        function contextMenuCloseTab(str_id)
                        {
                                        if(str_id.indexOf('aba_td_') >= 0)
                                        {
                                                        str_id = str_id.substr(7);
                                        }
                                        del_aba_td( str_id );
                        }

                        function contextMenuCloseRight(str_id)
                        {
                                        bol_start_del = false;
                                        $( "#contrl_abas li" ).each(function( index ) {

                                                        if(bol_start_del)
                                                        {
                                                                        contextMenuCloseTab($( this ).attr('id'));
                                                        }

                                                        if(str_id == $( this ).attr('id'))
                                                        {
                                                                        bol_start_del = true;
                                                        }
                                        });
                        }


                        function contextMenuCloseLeft(str_id)
                        {
                                        $( "#contrl_abas li" ).each(function( index ) {

                                                        if(str_id == $( this ).attr('id'))
                                                        {
                                                                         return false;
                                                        }
                                                        else
                                                        {
                                                                        contextMenuCloseTab($( this ).attr('id'));
                                                        }
                                        });
                        }

                        function contextMenuCloseOthersTabs(str_id)
                        {
                                        $( "#contrl_abas li" ).each(function( index ) {
                                                        if(str_id != $( this ).attr('id'))
                                                        {
                                                                        contextMenuCloseTab($( this ).attr('id'));
                                                        }
                                        });
                        }

function expandMenu()
{
    $('#idMenuHeader').hide();
    $('#idMenuLine').hide();
    $('#id_toolbar').hide();
    $('#id_expand').hide();
    $('#id_collapse').show();
}

function collapseMenu()
{
    $('#idMenuHeader').show();
    $('#idMenuLine').show();
    $('#id_toolbar').show();
    $('#id_expand').show();
    $('#id_collapse').hide();
}
Iframe_atual = "Almacenes_iframe";
function writeFastMenu(arr_link)
{
  return false;
}
function clearFastMenu(arr_link)
{
  return false;
}
Tab_iframes         = new Array();
Tab_labels          = new Array();
Tab_hints           = new Array();
Tab_icons           = new Array();
Tab_icons_inactive  = new Array();
Tab_abas            = new Array();
Tab_refresh         = new Array();
Tab_icon_fa         = new Array();
Tab_icon_fa_inactive= new Array();
Tab_display         = new Array();
Tab_display_position= new Array();
var scScrollInterval = divOverflow = false;
Tab_ico_def        = new Array();
Tab_ico_ina_def    = new Array();
<?php
 foreach ($arr_menuicons as $tp => $icon)
 {
    echo "Tab_ico_def['$tp']     = '" . $icon['active'] . "';\r\n";
    echo "Tab_ico_ina_def['$tp'] = '" . $icon['inactive'] . "';\r\n";
 }
?>
Aba_atual    = "";
<?php
 $seq = 0;
 foreach ($Almacenes_menuData['data'] as $ind => $dados_menu)
 {
     if ($dados_menu['link'] != "#")
     {
         if(empty($dados_menu['hint']))
         {
             $dados_menu['hint'] = $dados_menu['label'];
         }
         echo "Tab_iframes[" . $seq . "] = \"" . $dados_menu['id'] . "\";\r\n";
         echo "Tab_labels['" . $dados_menu['id'] . "'] = \"" . str_replace('"', '\"', $dados_menu['label']) . "\";\r\n";
         echo "Tab_hints['" . $dados_menu['id'] . "'] = \"" . str_replace('"', '\"', $dados_menu['hint']) . "\";\r\n";
         echo "Tab_abas['" . $dados_menu['id'] . "']   = \"none\";\r\n";
         echo "Tab_refresh['" . $dados_menu['id'] . "']   = \"\";\r\n";
         echo "Tab_icons['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_aba'] . "\";\r\n";
         echo "Tab_icons_inactive['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_aba_inactive'] . "\";\r\n";
         echo "Tab_icon_fa['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_fa'] . "\";\r\n";
         echo "Tab_icon_fa_inactive['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_fa'] . "\";\r\n";
         echo "Tab_display['" . $dados_menu['id'] . "'] = \"" . $dados_menu['display'] . "\";\r\n";
         echo "Tab_display_position['" . $dados_menu['id'] . "'] = \"" . $dados_menu['display_position'] . "\";\r\n";
         $seq++;
     }
 }
?>
Qtd_apls = <?php echo $seq ?>;
function createIframe(str_id, str_label, str_hint, str_img_on, str_img_off, str_link, tp_apl)
{
    apl_exist = false;
    Tab_icons[str_id] = str_img_on;
    Tab_icons_inactive[str_id] = str_img_off;
    Tab_refresh[str_id] = "";
    if (tp_apl == null || tp_apl == '')
    {
        tp_apl = 'others';
    }
    if (Tab_icons[str_id] == '')
    {
        Tab_icons[str_id] = Tab_ico_def[tp_apl];
    }
    if (Tab_icons_inactive[str_id] == '')
    {
        Tab_icons_inactive[str_id] = Tab_ico_ina_def[tp_apl];
    }
    for (i = 0; i < Qtd_apls; i++)
    {
        if (Tab_iframes[i] == str_id) {
            apl_exist = true;
        }
    }
    if (apl_exist)
    {
        if (Tab_abas[str_id] != 'show') {
            createAba(str_id);
        }
        var iframe = document.getElementById('iframe_' + str_id);
        iframe.src = str_link;
        mudaIframe(str_id);
        return;
    }
    var iframe = document.createElement('iframe');
    iframe.style.display = 'none';
    iframe.id = 'iframe_' + str_id;
    iframe.name = 'Almacenes_' + str_id + '_iframe';
    iframe.src = str_link;
    $('#Iframe_control').append(iframe);
    $('#iframe_' + str_id).addClass( 'scMenuIframe');
    Tab_iframes[Qtd_apls] = str_id;
    Tab_labels[str_id] = str_label;
    Tab_hints[str_id] = str_hint;
    Tab_abas[str_id]   = 'none';
    Qtd_apls++;
    createAba(str_id);
    mudaIframe(str_id);
}
function createAba(str_id)
{
    var tmp = "";
    var html_icon = "";
        html_icon = "<div style='display:inline-block;'>";
        str_icon = Tab_icons[str_id];
        if(str_icon=='')
        {
            str_icon = 'scriptcase__NM__ico__NM__sc_menu_others_e.png';
        }
        if(str_icon != '')
        {
            html_icon += "<img id='aba_td_" + str_id + "_icon_active' src='<?php echo $this->path_botoes; ?>/"+ str_icon +"' align='absmiddle' class='scTabIcon'>";
        }
        str_icon = Tab_icons_inactive[str_id];
        if(str_icon=='')
        {
            str_icon = 'scriptcase__NM__ico__NM__sc_menu_others_d.png';
        }
        if(str_icon != '')
        {
            html_icon += "<img id='aba_td_" + str_id + "_icon_inactive' src='<?php echo $this->path_botoes; ?>/"+ str_icon +"' align='absmiddle' class='scTabIcon' style='display:none;'>";
        }
        html_icon += "</div>";
    if(Tab_display[ str_id ] == 'text_fontawesomeicon' || Tab_display[ str_id ] == 'only_fontawesomeicon')
    {
        html_icon = "<i id='aba_td_" + str_id + "_icon_active' class='"+ Tab_icon_fa[str_id] +"' style='vertical-align:middle;padding: 0px 4px; display:none;'></i>";
        html_icon += "<i id='aba_td_" + str_id + "_icon_inactive' class='"+ Tab_icon_fa_inactive[str_id] +"' style='vertical-align:middle;padding: 0px 4px;'></i>";
    }
    tmp  = "<li onclick=\"mudaIframe('" + str_id + "');\" id='aba_td_" + str_id + "' style='cursor:pointer' class='lslide scTabActive' title=\"" + Tab_hints[str_id] + "\">";
    if(Tab_display_position[ str_id ] != 'img_right')
    {
        tmp += html_icon;
    }
    var home_style="";
    if(str_id === 'Almacenes'){ home_style=";padding-left:4px;min-height:14px;"; }
    tmp += "<div id='aba_td_txt_" + str_id + "' style='display:inline-block;cursor:pointer"+home_style+"' class='scTabText' >";
    tmp += Tab_labels[str_id];
    if(Tab_display_position[ str_id ] == 'img_right')
    {
        tmp += html_icon;
    }
    tmp += "</div>";
    tmp += "<div id='aba_td_3_" + str_id + "' style='display:none;'>...</div>";
    tmp += "<div style='display:inline-block;'>";
    tmp += "    <img id='aba_td_img_" + str_id + "' src='<?php echo $this->path_botoes . "/" . $this->css_menutab_active_close_icon; ?>' onclick=\"event.stopPropagation(); del_aba_td('" + str_id + "'); \" align='absmiddle' class='scTabCloseIcon' style='cursor:pointer; z-index:9999;'>";
    tmp += "</div>";
    tmp += "</li>";
    $('#contrl_abas').append(tmp);
    Tab_abas[str_id] = 'show';
}
function mudaIframe(str_id)
{
    $('#iframe_Almacenes').hide();
    if (str_id == "")
    {
        $('#iframe_Almacenes').show();
        $('#iframe_' + Aba_atual).prop('src', '');
        $('#links_abas').hide();
    }
    else
    {
        $('#aba_td_' + Aba_atual).removeClass( 'scTabActive' );
        $('#aba_td_' + Aba_atual).addClass( 'scTabInactive' );
        $('#aba_td_' + Aba_atual+'_icon_active').hide();
        $('#aba_td_' + Aba_atual+'_icon_inactive').show();
        $('#aba_td_img_' + Aba_atual).prop( 'src', '<?php echo $this->path_botoes . "/" . $this->css_menutab_inactive_close_icon; ?>' );
    }
    for (i = 0; i < Tab_iframes.length; i++) 
    {
        if (Tab_iframes[i] == str_id) 
        {
            $('#iframe_' + Tab_iframes[i]).show();
            Aba_atual    = str_id;
            $('#aba_td_' + Aba_atual).removeClass( 'scTabInactive' );
            $('#aba_td_' + Aba_atual).addClass( 'scTabActive' );
            $('#aba_td_' + Aba_atual+'_icon_active').show();
            $('#aba_td_' + Aba_atual+'_icon_inactive').hide();
            $('#aba_td_img_' + Aba_atual).prop( 'src', '<?php echo $this->path_botoes . "/" . $this->css_menutab_active_close_icon; ?>' );
            Iframe_atual = "Almacenes_" + Tab_iframes[i] + '_iframe';
            $('#iframe_' + Tab_iframes[i]).contents().find('body').css('width', '');
            $('#iframe_' + Tab_iframes[i])[0].contentWindow.focus();
        } else {
            $('#iframe_' + Tab_iframes[i]).hide();
        }
    }
    if (Tab_refresh[str_id] == 'S' && typeof document.getElementById('iframe_' + str_id).contentWindow.nm_move === 'function')
    {
        Tab_refresh[str_id] = '';
        document.getElementById('iframe_' + str_id).contentWindow.nm_move('igual');
    }
}
function del_aba_td(str_id)
{
    $('#aba_td_' + str_id).remove();
    Tab_abas[str_id] = 'none';
    $('#iframe_' + str_id).prop('src', '');
    if (Aba_atual == str_id)
    {
        str_id = "";
        for (i = 0; i < Tab_iframes.length; i++) 
        {
            if (Tab_abas[Tab_iframes[i]] == 'show' && Tab_refresh[Tab_iframes[i]] == 'S')
            {
                str_id = Tab_iframes[i];
            }
        }
        if (str_id == "")
        {
            for (i = 0; i < Tab_iframes.length; i++) 
            {
                if (Tab_abas[Tab_iframes[i]] == 'show')
                {
                    str_id = Tab_iframes[i];
                }
            }
        }
        mudaIframe(str_id);
    }
  scToggleOverflow();
}
$( document ).ready(function() { scToggleOverflow() });
function scToggleOverflow() {
  var width_offset = 0;
  if (is_menu_vertical === true) { width_offset = $('#idDivMenu').parent()[0].offsetWidth + 2; };
  $('.scTabLine').css('width', ($('#main_menu_table')[0].offsetWidth - width_offset) + 'px');
  var hasOverflow, scrollElement;
  scrollElement = $('#div_contrl_abas')[0];
  if (scrollElement.offsetHeight < scrollElement.scrollHeight || scrollElement.offsetWidth < scrollElement.scrollWidth) {
      hasOverflow = true;
  } else {
      hasOverflow = false;
  }
  if (divOverflow === hasOverflow){ return false; }
  if (hasOverflow === true) {
      $('.scTabScroll').show();
      $('#div_contrl_abas').toggleClass('div-overflow');
  } else {
      $('.scTabScroll').hide();
      $('#div_contrl_abas').toggleClass('div-overflow');
  }
  divOverflow = hasOverflow;
}
function scTabScroll(axis) {
  if (axis == 'stop') {
      clearInterval(scScrollInterval);
      return;
  }
  if (axis == 'left') {
      scScrollInterval = setInterval("$('#div_contrl_abas').scrollLeft($('#div_contrl_abas').scrollLeft() - 3)", 2);
  } else {
      scScrollInterval = setInterval("$('#div_contrl_abas').scrollLeft($('#div_contrl_abas').scrollLeft() + 3)", 2);
  }
}
function openMenuItem(str_id)
{
    str_target_sv = "";
    if (str_id != "iframe_Almacenes")
    {
        str_target_sv = str_id + "_iframe";
        str_id        = str_id.replace("Almacenes_","");
    }
    str_link   = $('#' + str_id).attr('item-href');
    str_target = $('#' + str_id).attr('item-target');
    if (str_target == "Almacenes_iframe" && str_link != '' && str_link != '#' && str_link != 'javascript:')
    {
        str_target = (str_target_sv != "") ? str_target_sv : str_target;
        mudaIframe(str_id);
        if (str_id != "Almacenes")
        {
            $('#links_abas').css('display','');
        }
        if (str_id != "Almacenes" && Tab_abas[str_id] != 'show')
        {
            createAba(str_id);
      scToggleOverflow();
        }
    }
    //test link type
    if (str_link != '' && str_link != '#' && str_link != 'javascript:')
    {
        if (str_link.substring(0, 11) == 'javascript:')
        {
            eval(str_link.substring(11));
        }
        else if (str_link != '#' && str_target != '_parent')
        {
            window.open(str_link, str_target);
        }
        else if (str_link != '#' && str_target == '_parent')
        {
            document.location = str_link;
        }
        <?php
        if ($menu_mobile_hide == 'S' && $menu_mobile_hide_onclick == 'S')
        {
        ?>
            HideMenu();
        <?php
        }
        ?>
    }
    $('#iframe_Almacenes')[0].contentWindow.focus();
}
</script>
<?php
$fixMainMenuPosition = ($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])) ? '' : '; position: absolute';
?>
<table id="main_menu_table" <?php echo $strAlign; ?> style="border-collapse: collapse; border-width: 0px; height:100%; width: <?php echo $larg_table; ?><?php echo $fixMainMenuPosition; ?>" cellpadding=0 cellspacing=0>
  <tr class="scMenuHTableCssAlt" id='idMenuLine'>
      <td <?php echo $strAlign; ?> valign="top" class="scMenuLine" style="width:100%; height:30;padding: 0px;" id='idMenuCell'>
<div id="scScrollFix" style="height: 1px"></div>
<script type="text/javascript">
function fnScrollFix() {
 var txt = document.getElementById("scScrollFix").innerHTML;
 if ("&nbsp;" == txt) { txt = "&nbsp;&nbsp;"; } else { txt = "&nbsp;"; }
 document.getElementById("scScrollFix").innerHTML = txt;
 setTimeout("fnScrollFix()", 500);
}
setTimeout("fnScrollFix()", 500);
</script>
<div id="idDivMenu">
<table style='width:100%'><tr><?php
echo $this->Almacenes_escreveMenu($Almacenes_menuData['data'], $path_imag_cab, $strAlign);
?></tr></table>
</div>
<?php
/* Iframe control */
if ($Almacenes_menuData['iframe'])
{
?>
    </td>
  </tr>
<?php echo $this->nm_show_toolbarmenu('', $saida_apl, $Almacenes_menuData, $path_imag_cab); ?><?php echo $this->nm_gera_degrade(1, $bg_line_degrade, $path_imag_cab); ?>  <tr>
        <td id="links_abas" style="display: none;">
          <div class='scTabLine'>
            <div class='scTabScroll left' style='float:left;display:none;' onmousedown='scTabScroll("left");' onmouseup='scTabScroll("stop");' onmouseout='scTabScroll("stop");'></div>
            <div class='scTabScroll right' style='float:right;display:none;'onmousedown='scTabScroll("right");' onmouseup='scTabScroll("stop");' onmouseout='scTabScroll("stop");'></div>
            <div id='div_contrl_abas' class='scTabCtrl' style='overflow:hidden;white-space: nowrap;'>
              <ul id='contrl_abas' style='margin:0px; padding:0px;'></ul>
            </div>
          </div>
        </td>
        </tr><tr>
    <td style="border-width: 1px; height: 100%; padding: 0px;vertical-align:top;text-align:center;">
    <div id="Iframe_control" style='width:100%; height:100%; margin:0px; padding:0px;'>
      <iframe id="iframe_Almacenes" name="Almacenes_iframe" frameborder="0" class="scMenuIframe" style="width: 100%; height: 100%;"  src="<?php echo ($NM_scr_iframe != "" ? $NM_scr_iframe : "Almacenes_pag_ini.php"); ?>"></iframe>
<?php
 foreach ($Almacenes_menuData['data'] as $ind => $dados_menu)
 {
     if ($dados_menu['link'] != "#")
     {
         echo "      <iframe id=\"iframe_" . $dados_menu['id'] . "\" name= \"Almacenes_" . $dados_menu['id'] . "_iframe\" frameborder=\"0\" class=\"scMenuIframe\" style=\"display: none;width: 100%; height: 100%;\" src=\"\"></iframe>
";
     }
 }
}
?></div></td>
  </tr>
</table>
</body>
</html>
<?php


}

/* Target control */
function Almacenes_escreveMenu($arr_menu, $path_imag_cab = '', $strAlign = '')
{
    global $nm_data_fixa;
    $last      = '';
    $itemClass = ' topfirst';
    $subSize   = 2;
    $subCount  = array();
    $tabSpace  = 1;
    $intMult   = 2;
    $aMenuItemList = array();
    foreach ($arr_menu as $ind => $resto)
    {
        $aMenuItemList[] = $resto;
    }
?>
<td <?php echo $strAlign; ?>>
  <div class='mainmenu menu--horizontal'>
      <div class='menu__toggle'>
          <span></span>
          <span></span>
          <span></span>
      </div>
      <div class='menu__container'>
        <ul id="css3menu1" class="topmenu menu__list" style="">
        <?php
            for ($i = 0; $i < sizeof($aMenuItemList); $i++) {
                if (0 == $aMenuItemList[$i]['level']) {
                    $last = $aMenuItemList[$i]['id'];
                }
            }
            for ($i = 0; $i < sizeof($aMenuItemList); $i++) {
                if ($last == $aMenuItemList[$i]['id']) {
                    $itemClass = ' toplast';
                }
                $htmlClass = '';
                $hasChildrens = false;
                if ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] < $aMenuItemList[$i + 1]['level']) {
                    $hasChildrens = true;
                }
                if (0 == $aMenuItemList[$i]['level']) {
                    $htmlClass = 'topmenu' . $itemClass;
                    if ($hasChildrens) {
                        $htmlClass .= ' toproot';
                    }
                }
                else
                {
                    $htmlClass .= ' menu__item--withsubmenu';
                }
                ?>
                <li class='menu__item <?php echo $htmlClass; ?>'>
                <?php
                if ('' != $aMenuItemList[$i]['icon'] && file_exists($this->path_imag_apl . "/" . $aMenuItemList[$i]['icon'])) {
                    $iconHtml = '../_lib/img/' . $aMenuItemList[$i]['icon'];
                }
                else {
                    $iconHtml = '';
                }
                $sDisabledClass = '';
                if ('Y' == $aMenuItemList[$i]['disabled']) {
                    $aMenuItemList[$i]['link']   = '#';
                    $aMenuItemList[$i]['target'] = '';
                    $sDisabledClass               = 0 == $aMenuItemList[$i]['level'] ? ' scdisabledmain' : ' scdisabledsub';
                }
                if (empty($aMenuItemList[$i]['link'])) {
                    $aMenuItemList[$i]['link']   = '#';
                }
                $str_item = "<i class='menu__icon fas'></i>";
                if ($hasChildrens) {
                    $str_item .= "<span>";
                }
                if($aMenuItemList[$i]['display'] == 'only_img' && $iconHtml != '')
                {
                    $str_item .= '<img src=' . $iconHtml . ' border="0" />';
                }
                elseif($aMenuItemList[$i]['display'] == 'text_img' || empty($aMenuItemList[$i]['display']))
                {
                    $str_image = '';
                    $str_image_right = '';
                    if($iconHtml != '')
                    {
                        $str_image = '<img src="' . $iconHtml . '" border="0" />';
                        $str_image_right = '<img src="' . $iconHtml . '" border="0" style="margin-left: 10px; margin-right: 0px;" />';
                    }
                    if($aMenuItemList[$i]['display_position'] != 'img_right')
                    {
                        $str_item .= $str_image . $aMenuItemList[$i]['label'];
                    }
                    else
                    {
                        $str_item .= $aMenuItemList[$i]['label'] . $str_image_right;
                    }
                }
                elseif($aMenuItemList[$i]['display'] == 'only_fontawesomeicon')
                {
                    $str_item .= "<i class='icon_fa menu__icon ". $aMenuItemList[$i]['icon_fa'] ."'></i>";
                }
                elseif($aMenuItemList[$i]['display'] == 'text_fontawesomeicon')
                {
                    if($aMenuItemList[$i]['display_position'] != 'img_right')
                    {
                        $str_item .= "<i class='icon_fa ". $aMenuItemList[$i]['icon_fa'] ."'></i> ". $aMenuItemList[$i]['label'] ."";
                    }
                    else
                    {
                        $str_item .= $aMenuItemList[$i]['label'] ." <i class='icon_fa ". $aMenuItemList[$i]['icon_fa'] ."'></i>";
                    }
                }
                else
                {
                    $str_item .= $aMenuItemList[$i]['label'];
                }
                if ($hasChildrens) {
                    $str_item .= "</span>";
                }
                ?>
                    <a href="javascript:" onclick="openMenuItem('Almacenes_<?php echo $aMenuItemList[$i]['id']; ?>');" item-href="<?php echo $aMenuItemList[$i]['link']; ?>" id="<?php echo $aMenuItemList[$i]['id']; ?>" title="<?php echo $aMenuItemList[$i]['hint']; ?>" <?php echo $aMenuItemList[$i]['target']; ?> class='menu__link <?php echo $sDisabledClass; ?>'><?php echo $str_item; ?></a>
                <?php
                if ($hasChildrens) {
                ?>
                    <ul class='menu__submenu' style=''>
                    <?php
                }
                else {
                ?>
                <?php
                }
                if (($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] == $aMenuItemList[$i + 1]['level']) || 
                    ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > $aMenuItemList[$i + 1]['level']) ||
                    (!$aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > 0) ||
                    (!$aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] == 0)) {
                    ?>
                    <?php echo str_repeat(' ', $tabSpace * $intMult); ?></li>
                    <?php
                    if (0 != $subSize && 0 < $aMenuItemList[$i]['level']) {
                        if (!isset($subCount[ $aMenuItemList[$i]['level'] ])) {
                            $subCount[ $aMenuItemList[$i]['level'] ] = 0;
                        }
                        $subCount[ $aMenuItemList[$i]['level'] ]++;
                    }
                    if ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > $aMenuItemList[$i + 1]['level']) {
                        for ($j = 0; $j < $aMenuItemList[$i]['level'] - $aMenuItemList[$i + 1]['level']; $j++) {
                            unset($subCount[ $aMenuItemList[$i]['level'] - $j]);
                            ?>
                            </ul>
                            </li>
                            <?php
                        }
                    }
                    elseif (!$aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > 0) {
                        for ($j = 0; $j < $aMenuItemList[$i]['level']; $j++) {
                            unset($subCount[ $aMenuItemList[$i]['level'] - $j]);
                            ?>
                            </ul>
                            </li>
                            <?php
                        }
                    }
                    if ($subSize == $subCount[ $aMenuItemList[$i]['level'] ]) {
                        $subCount[ $aMenuItemList[$i]['level'] ] = 0;
                    }
                }
                $itemClass = '';
            }
        ?>
        </ul>
      </div>
  </div>
</td>
<?php
}
function Almacenes_target($str_target)
{
    global $Almacenes_menuData;
    if ('_blank' == $str_target)
    {
        return '_blank';
    }
    elseif ('_parent' == $str_target)
    {
        return '_parent';
    }
    elseif ($Almacenes_menuData['iframe'])
    {
        return 'Almacenes_iframe';
    }
    else
    {
        return $str_target;
    }
}

function nm_show_toolbarmenu($col_span, $saida_apl, $Almacenes_menuData, $path_imag_cab)
{
}

   function nm_prot_aspas($str_item)
   {
       return str_replace('"', '\"', $str_item);
   }

   function nm_gera_menus(&$str_line_ret, $arr_menu_usu, $int_level, $nome_aplicacao)
   {
       global $Almacenes_menuData; 
       foreach ($arr_menu_usu as $arr_item)
       {
           $str_line   = array();
           $str_line['label']    = $this->nm_prot_aspas($arr_item['label']);
           $str_line['level']    = $int_level - 1;
           $str_line['link']     = "";
           $nome_apl = $arr_item['link'];
           $pos = strrpos($nome_apl, "/");
           if ($pos !== false)
           {
               $nome_apl = substr($nome_apl, $pos + 1);
           }
           if ('' != $arr_item['link'])
           {
               if ($arr_item['target'] == '_parent')
               {
                    $str_line['link'] = "Almacenes_form_php.php?sc_item_menu=" . $arr_item['id'] . "&sc_apl_menu=" . $nome_apl . "&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . ""; 
               }
               else
               {
                    $str_line['link'] = "Almacenes_form_php.php?sc_item_menu=" . $arr_item['id'] . "&sc_apl_menu=" . $nome_apl . "&sc_apl_link=" . urlencode($Almacenes_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['Almacenes']['glo_nm_usa_grupo'] . ""; 
               }
           }
           elseif ($arr_item['target'] == '_parent')
           {
           }
           $str_line['hint']     = ('' != $arr_item['hint']) ? $this->nm_prot_aspas($arr_item['hint']) : '';
           $str_line['id']       = $arr_item['id'];
           $str_line['icon']     = ('' != $arr_item['icon_on']) ? $arr_item['icon_on'] : '';
           $str_line['icon_aba'] = (isset($arr_item['icon_aba']) && '' != $arr_item['icon_aba']) ? $arr_item['icon_aba'] : '';
           $str_line['icon_aba_inactive'] = (isset($arr_item['icon_aba_inactive']) && '' != $arr_item['icon_aba_inactive']) ? $arr_item['icon_aba_inactive'] : '';
           $str_line['display'] = (isset($arr_item['display'])) ? $arr_item['display'] : 'text_img';
           $str_line['display_position'] = (isset($arr_item['display_position'])) ? $arr_item['display_position'] : 'text_right';
           $str_line['icon_fa'] = (isset($arr_item['icon_fa'])) ? $arr_item['icon_fa'] : '';
           $str_line['icon_color'] = (isset($arr_item['icon_color'])) ? $arr_item['icon_color'] : '';
           $str_line['icon_color_hover'] = (isset($arr_item['icon_color_hover'])) ? $arr_item['icon_color_hover'] : '';
           $str_line['icon_color_disabled'] = (isset($arr_item['icon_color_disabled'])) ? $arr_item['icon_color_disabled'] : '';
           if ('' == $arr_item['link'] && $arr_item['target'] == '_parent')
           {
               $str_line['target'] = '_parent';
           }
           else
           {
                $str_line['target'] = ('' != $arr_item['target'] && '' != $arr_item['link']) ?  $this->Almacenes_target( $arr_item['target']) : "_self"; 
           }
           $str_line['target']   = ' item-target="' . $str_line['target']  . '" ';
           $str_line['sc_id']    = $arr_item['id'];
           $str_line['disabled'] = "N";
           $str_line_ret[] = $str_line;
           if (!empty($arr_item['menu_itens']))
           {
               $this->nm_gera_menus($str_line_ret, $arr_item['menu_itens'], $int_level + 1, $nome_aplicacao);
           }
       }
   }

   function nm_arr_menu_recursiv($arr, $id_pai = '')
   {
         $arr_return = array();
         foreach ($arr as $id_menu => $arr_menu)
         {
             if ($id_pai == $arr_menu['pai']) 
             {
                 $arr_return[] = array('label'      => $arr_menu['label'],
                                        'link'       => $arr_menu['link'],
                                        'target'     => $arr_menu['target'],
                                        'icon_on'    => $arr_menu['icon'],
                                        'icon_aba'   => $arr_menu['icon_aba'],
                                        'icon_aba_inactive'   => $arr_menu['icon_aba_inactive'],
                                        'hint'       => $arr_menu['hint'],
                                        'id'         => $id_menu,
                                        'menu_itens' => $this->nm_arr_menu_recursiv($arr, $id_menu),
                                        'display'      => $arr_menu['display'],
                                        'display_position' => $arr_menu['display_position'],
                                        'icon_fa'      => $arr_menu['icon_fa'],
                                        'icon_color'      => $arr_menu['icon_color'],
                                        'icon_color_hover'      => $arr_menu['icon_color_hover'],
                                        'icon_color_disabled'      => $arr_menu['icon_color_disabled'],
                                        );
             }
         }
         return $arr_return;
   }
   //1 horizontal
   //2 vertical
   function nm_gera_degrade($menu_opc, $bg_line_degrade, $path_imag_cab)
   {
       $str_retorno = "";
       //have bg color degrade
       if(!empty($bg_line_degrade) && count($bg_line_degrade)>0)
       {
           if($menu_opc == 1)
           {
               foreach($bg_line_degrade as $bg_color)
               {
                   if(!empty($bg_color))
                   {
                       $str_retorno .= "<tr style=\"height:1px; padding: 0px;\">\r\n";
                       $str_retorno .= "  <td style=\"height:1px; padding: 0px;\" bgcolor=\"". $bg_color ."\"><img src='". $path_imag_cab ."/transparent.png' border=\"0\" style=\"height:1px;\"></td>\r\n";
                       $str_retorno .= "</tr>\r\n";
                   }
               }
           }
           elseif($menu_opc == 2)
           {
               foreach($bg_line_degrade as $bg_color)
               {
                   if(!empty($bg_color))
                   {
                       $str_retorno .= "<td style=\"width:1px; padding: 0px;\" bgcolor=\"". $bg_color ."\">\r\n";
                       $str_retorno .= "<img src='" . $path_imag_cab . "/transparent.png' border=\"0\" style=\"width:1px;\">\r\n";
                       $str_retorno .= "</td>\r\n";
                   }
               }
           }
       }
       return $str_retorno;
   }
   function Gera_sc_init($apl_menu)
   {
        $_SESSION['scriptcase']['Almacenes']['sc_init'][$apl_menu] = rand(2, 10000);
        $_SESSION['sc_session'][$_SESSION['scriptcase']['Almacenes']['sc_init'][$apl_menu]] = array();
        return  $_SESSION['scriptcase']['Almacenes']['sc_init'][$apl_menu];
   }
   function regionalDefault()
   {
       $_SESSION['scriptcase']['reg_conf']['date_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_format'] : "ddmmyyyy";
       $_SESSION['scriptcase']['reg_conf']['date_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_sep'] : "/";
       $_SESSION['scriptcase']['reg_conf']['date_week_ini'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema'] : "SU";
       $_SESSION['scriptcase']['reg_conf']['time_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_format'] : "hhiiss";
       $_SESSION['scriptcase']['reg_conf']['time_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_sep'] : ":";
       $_SESSION['scriptcase']['reg_conf']['time_pos_ampm'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm'] : "right_without_space";
       $_SESSION['scriptcase']['reg_conf']['time_simb_am']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am'] : "am";
       $_SESSION['scriptcase']['reg_conf']['time_simb_pm']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm'] : "pm";
       $_SESSION['scriptcase']['reg_conf']['simb_neg']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg'] : "-";
       $_SESSION['scriptcase']['reg_conf']['grup_num']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr'] : ".";
       $_SESSION['scriptcase']['reg_conf']['dec_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec'] : ",";
       $_SESSION['scriptcase']['reg_conf']['neg_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg'] : 2;
       $_SESSION['scriptcase']['reg_conf']['monet_simb']    = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo'] : "$";
       $_SESSION['scriptcase']['reg_conf']['monet_f_pos']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'] : 3;
       $_SESSION['scriptcase']['reg_conf']['monet_f_neg']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'] : 13;
       $_SESSION['scriptcase']['reg_conf']['grup_val']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr'] : ".";
       $_SESSION['scriptcase']['reg_conf']['dec_val']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec'] : ",";
       $_SESSION['scriptcase']['reg_conf']['html_dir']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  " DIR='" . $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] . "'" : "";
       $_SESSION['scriptcase']['reg_conf']['css_dir']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "LTR";
       $_SESSION['scriptcase']['reg_conf']['html_dir_only'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "";
       $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit'] : "1";
       $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'] : "1";
   }

}
if (isset($_POST['nmgp_start'])) {$nmgp_start = $_POST['nmgp_start'];} 
if (isset($_GET['nmgp_start']))  {$nmgp_start = $_GET['nmgp_start'];} 
$Sem_Session = (!isset($_SESSION['sc_session'])) ? true : false;
$_SESSION['scriptcase']['sem_session'] = false;
if (!isset($_SERVER['HTTP_REFERER']) || (!isset($nmgp_parms) && !isset($script_case_init) && !isset($script_case_session) && !isset($nmgp_start) ))
{
    $Sem_Session = false;
}
$NM_dir_atual = getcwd();
if (empty($NM_dir_atual)) {
    $str_path_sys  = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
    $str_path_sys  = str_replace("\\", '/', $str_path_sys);
}
else {
    $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
    $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
}
$str_path_web    = $_SERVER['PHP_SELF'];
$str_path_web    = str_replace("\\", '/', $str_path_web);
$str_path_web    = str_replace('//', '/', $str_path_web);
$path_aplicacao  = substr($str_path_web, 0, strrpos($str_path_web, '/'));
$path_aplicacao  = substr($path_aplicacao, 0, strrpos($path_aplicacao, '/'));
$root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
if ($Sem_Session && (!isset($nmgp_start) || $nmgp_start != "SC")) {
    if (isset($_COOKIE['sc_apl_default_Almacen'])) {
        $apl_def = explode(",", $_COOKIE['sc_apl_default_Almacen']);
    }
    elseif (is_file($root . $_SESSION['scriptcase']['Almacenes']['glo_nm_path_imag_temp'] . "/sc_apl_default_Almacen.txt")) {
        $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['Almacenes']['glo_nm_path_imag_temp'] . "/sc_apl_default_Almacen.txt"));
    }
    if (isset($apl_def)) {
        if ($apl_def[0] != "Almacenes") {
            $_SESSION['scriptcase']['sem_session'] = true;
            if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                $_SESSION['scriptcase']['Almacenes']['session_timeout']['redir'] = $apl_def[0];
            }
            else {
                $_SESSION['scriptcase']['Almacenes']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
            }
            $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
            $_SESSION['scriptcase']['Almacenes']['session_timeout']['redir_tp'] = $Redir_tp;
        }
        if (isset($_COOKIE['sc_actual_lang_Almacen'])) {
            $_SESSION['scriptcase']['Almacenes']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_Almacen'];
        }
    }
}
if ((isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "force_lang") || (isset($_GET['nmgp_opcao']) && $_GET['nmgp_opcao'] == "force_lang"))
{
    if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "force_lang")
    {
        $nmgp_opcao  = $_POST['nmgp_opcao'];
        $nmgp_idioma = $_POST['nmgp_idioma'];
    }
    else
    {
        $nmgp_opcao  = $_GET['nmgp_opcao'];
        $nmgp_idioma = $_GET['nmgp_idioma'];
    }
    $Temp_lang = explode(";" , $nmgp_idioma);
    if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))
    {
        $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
    }
    if (isset($Temp_lang[1]) && !empty($Temp_lang[1]))
    {
        $_SESSION['scriptcase']['str_conf_reg'] = $Temp_lang[1];
    }
}
$contr_Almacenes = new Almacenes_class;
$contr_Almacenes->Almacenes_menu();

?>
