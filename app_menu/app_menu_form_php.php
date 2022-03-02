<?php
include_once('app_menu_session.php');
session_start();
   $_SESSION['scriptcase']['app_menu']['glo_nm_path_prod']      = "/scriptcase/prod";
   $_SESSION['scriptcase']['app_menu']['glo_nm_path_imag_temp'] = "/scriptcase/tmp";
   //check publication with the prod
   $str_path_apl_url  = $_SERVER['PHP_SELF'];
   $str_path_apl_url  = str_replace("\\", '/', $str_path_apl_url);
   $str_path_apl_url  = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
   $str_path_apl_url  = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
   //check prod
   if(empty($_SESSION['scriptcase']['app_menu']['glo_nm_path_prod']))
   {
           /*check prod*/$_SESSION['scriptcase']['app_menu']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
   }
   //check tmp
   if(empty($_SESSION['scriptcase']['app_menu']['glo_nm_path_imag_temp']))
   {
           /*check tmp*/$_SESSION['scriptcase']['app_menu']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
   }
   //end check publication with the prod
class app_menu_form_php
{
      var $sc_script_name;
      var $nm_location;
   function sc_Include($path, $tp, $name)
   {
       if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
       {
           include_once($path);
       }
   } // sc_Include

   function init()
   {
      $Campos_Mens_erro = "";
      $_SESSION['scriptcase']['app_menu']['contr_erro'] = 'off';
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
      if(!isset($_SESSION['scriptcase']['app_menu']['glo_nm_path_prod']) || empty($_SESSION['scriptcase']['app_menu']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['scriptcase']['app_menu']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
      }
      $str_path_web  = $_SERVER['PHP_SELF'];
      $str_path_web  = str_replace("\\", '/', $str_path_web);
      $str_path_web  = str_replace('//', '/', $str_path_web);
      $str_root      = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $path_link     = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $path_link     = substr($path_link, 0, strrpos($path_link, '/')) . '/';
      $this->nm_location  = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $this->nm_location  = substr($_SERVER['PHP_SELF'], 0, $this->nm_location + 1) ;  
      $this->nm_location .= "index.php"; 
      $this->menu_sc_init = 1;
      $path_imag_cab = $path_link . "_lib/img";
      $path_imag_apl = $str_root . $path_link . "_lib/img";
      $path_libs     = $str_root . $_SESSION['scriptcase']['app_menu']['glo_nm_path_prod'] . "/lib/php";
      $path_third    = $str_root . $_SESSION['scriptcase']['app_menu']['glo_nm_path_prod'] . "/third";
      $path_adodb    = $str_root . $_SESSION['scriptcase']['app_menu']['glo_nm_path_prod'] . "/third/adodb";
      $_SESSION['scriptcase']['dir_temp'] = $str_root . $_SESSION['scriptcase']['app_menu']['glo_nm_path_imag_temp'];
      $this->path_css = $str_root . $path_link . "_lib/css/";
      $path_lib_php   = $str_root . $path_link . "_lib/lib/php";
      $this->str_lang      = (isset($_SESSION['scriptcase']['str_lang']) && !empty($_SESSION['scriptcase']['str_lang'])) ? $_SESSION['scriptcase']['str_lang'] : "pt_br";
      $this->str_conf_reg  = (isset($_SESSION['scriptcase']['str_conf_reg']) && !empty($_SESSION['scriptcase']['str_conf_reg'])) ? $_SESSION['scriptcase']['str_conf_reg'] : "pt_br";
      if (isset($_SESSION['scriptcase']['app_menu']['session_timeout']['lang'])) {
          $this->str_lang = $_SESSION['scriptcase']['app_menu']['session_timeout']['lang'];
      }
      elseif (!isset($_SESSION['scriptcase']['app_menu']['actual_lang']) || $_SESSION['scriptcase']['app_menu']['actual_lang'] != $this->str_lang) {
          $_SESSION['scriptcase']['app_menu']['actual_lang'] = $this->str_lang;
          setcookie('sc_actual_lang_Controller',$this->str_lang,'0','/');
      }
      $this->str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_Lemon/Sc9_Lemon";
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
      if (!function_exists("NM_is_utf8"))
      {
          include_once("../_lib/lib/php/nm_utf8.php");
      }
      if (!function_exists("SC_dir_app_ini"))
      {
          include_once("../_lib/lib/php/nm_ctrl_app_name.php");
      }
      SC_dir_app_ini('Controller');
      if (!defined("SC_ERROR_HANDLER"))
      {
          define("SC_ERROR_HANDLER", 1);
          include_once(dirname(__FILE__) . "/app_menu_erro.php");
      }
      if (isset($_GET['sc_apl_menu']))
      {
          $_SESSION['scriptcase']['sc_usa_grupo']     = $_GET['sc_usa_grupo'];
          $_SESSION['scriptcase']['sc_item_menu']     = $_GET['sc_item_menu'];
          $_SESSION['scriptcase']['sc_apl_menu']      = $_GET['sc_apl_menu'];
          $_SESSION['scriptcase']['sc_apl_menu_link'] = $_SESSION['scriptcase']['app_menu']['sc_apl_link'];
          $_SESSION['scriptcase']['sc_ult_apl_menu']  = array();
      }
      $this->sc_menu_item   = $_SESSION['scriptcase']['sc_item_menu'];
      $this->sc_script_name = $_SESSION['scriptcase']['sc_apl_menu'];
      include("../_lib/lang/". $this->str_lang .".lang.php");
      include("../_lib/css/" . $this->str_schema_all . "_menuH.php");
      include("../_lib/lang/config_region.php");
      include("../_lib/lang/lang_config_region.php");
      $this->sc_Include($path_lib_php . "/nm_functions.php", "", "") ; 
      $this->sc_Include($path_lib_php . "/nm_api.php", "", "") ; 
      $this->sc_Include($path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->nm_data = new nm_data("pt_br");
      asort($this->Nm_lang_conf_region);
      $_SESSION['scriptcase']['charset'] = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "ISO-8859-1";
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
      $this->regionalDefault();
      if (isset($_SESSION['scriptcase']['app_menu']['session_timeout']['redir'])) {
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
          if ($_SESSION['scriptcase']['app_menu']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body>\r\n";
          }
          else {
              $SS_cod_html .= "    <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__img__NM__ct_other_gauge.png\">\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_menuH.css\"/>\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_menuH" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\"/>\r\n";
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body class=\"scMenuHPage\">\r\n";
              $SS_cod_html .= "    <table align=\"center\"><tr><td style=\"padding: 0\"><div>\r\n";
              $SS_cod_html .= "    <table class=\"scMenuHTable\" width='100%' cellspacing=0 cellpadding=0><tr class=\"scMenuHHeader\"><td class=\"scMenuHHeaderFont\" style=\"padding: 15px 30px; text-align: center\">\r\n";
              $SS_cod_html .= $this->Nm_lang['lang_errm_expired_session'] . "\r\n";
              $SS_cod_html .= "     <form name=\"Fsession_redir\" method=\"post\"\r\n";
              $SS_cod_html .= "           target=\"_self\">\r\n";
              $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['app_menu']['session_timeout']['redir'] . "');\">\r\n";
              $SS_cod_html .= "     </form>\r\n";
              $SS_cod_html .= "    </td></tr></table>\r\n";
              $SS_cod_html .= "    </div></td></tr></table>\r\n";
          }
          $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
          if ($_SESSION['scriptcase']['app_menu']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['app_menu']['session_timeout']['redir'] . "');\r\n";
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
          unset($_SESSION['scriptcase']['app_menu']['session_timeout']);
          unset($_SESSION['sc_session']);
      }
      if (isset($SS_cod_html))
      {
          echo $SS_cod_html;
          exit;
      }
      if (is_file($path_lib_php . "/nm_functions.php"))  
      {  
          $this->sc_Include($path_lib_php . "/nm_functions.php", "", "") ; 
      }  
      if (is_file($path_lib_php . "/nm_api.php"))  
      {  
          $this->sc_Include($path_lib_php . "/nm_api.php", "", "") ; 
      }  
      if (is_file($path_lib_php . "/nm_data.class.php"))  
      {
          $this->sc_Include($path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
          $this->nm_data = new nm_data("pt_br");
      }
$this->sc_Include($path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
include_once($path_adodb . "/adodb.inc.php"); 
$this->sc_Include($path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
 if(function_exists('set_php_timezone')) set_php_timezone('app_menu'); 
perfil_lib($path_libs);
if (!isset($_SESSION['sc_session'][1]['SC_Check_Perfil']))
{
    if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($path_libs, $_SESSION['scriptcase']['app_menu']['glo_nm_path_prod']);
    $_SESSION['sc_session'][1]['SC_Check_Perfil'] = true;
}
$nm_falta_var    = ""; 
$nm_falta_var_db = ""; 
if (isset($_SESSION['scriptcase']['app_menu']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['app_menu']['glo_nm_conexao']))
{
    db_conect_devel($_SESSION['scriptcase']['app_menu']['glo_nm_conexao'], $str_root . $_SESSION['scriptcase']['app_menu']['glo_nm_path_prod'], 'Controller', 2); 
}
if (isset($_SESSION['scriptcase']['app_menu']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['app_menu']['glo_nm_perfil']))
{
   $_SESSION['scriptcase']['glo_perfil'] = $_SESSION['scriptcase']['app_menu']['glo_nm_perfil'];
}
if (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
{
    $_SESSION['scriptcase']['glo_senha_protect'] = "";
    carrega_perfil($_SESSION['scriptcase']['glo_perfil'], $path_libs, "");
    if (empty($_SESSION['scriptcase']['glo_senha_protect']))
    {
        $nm_falta_var .= "Perfil=" . $_SESSION['scriptcase']['glo_perfil'] . "; ";
    }
}
if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
{
    $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
    if (strlen($SC_temp) == 2)
    {
       $_SESSION['scriptcase']['app_menu']['SC_sep_date']  = substr($SC_temp, 0, 1); 
       $_SESSION['scriptcase']['app_menu']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
   }
   else
    {
       $_SESSION['scriptcase']['app_menu']['SC_sep_date']  = $SC_temp; 
       $_SESSION['scriptcase']['app_menu']['SC_sep_date1'] = $SC_temp; 
   }
}
if (!isset($_SESSION['scriptcase']['glo_tpbanco']))
{
    $nm_falta_var_db .= "glo_tpbanco; ";
}
else
{
    $nm_tpbanco = $_SESSION['scriptcase']['glo_tpbanco']; 
}
if (!isset($_SESSION['scriptcase']['glo_servidor']))
{
    $nm_falta_var_db .= "glo_servidor; ";
}
else
{
    $nm_servidor = $_SESSION['scriptcase']['glo_servidor']; 
}
if (!isset($_SESSION['scriptcase']['glo_banco']))
{
    $nm_falta_var_db .= "glo_banco; ";
}
else
{
    $nm_banco = $_SESSION['scriptcase']['glo_banco']; 
}
if (!isset($_SESSION['scriptcase']['glo_usuario']))
{
    $nm_falta_var_db .= "glo_usuario; ";
}
else
{
    $nm_usuario = $_SESSION['scriptcase']['glo_usuario']; 
}
if (!isset($_SESSION['scriptcase']['glo_senha']))
{
    $nm_falta_var_db .= "glo_senha; ";
}
else
{
    $nm_senha = $_SESSION['scriptcase']['glo_senha']; 
}
$nm_con_db2 = array();
$nm_database_encoding = "";
if (isset($_SESSION['scriptcase']['glo_database_encoding']))
{
    $nm_database_encoding = $_SESSION['scriptcase']['glo_database_encoding']; 
}
$nm_arr_db_extra_args = array();
if (isset($_SESSION['scriptcase']['glo_use_ssl']))
{
    $nm_arr_db_extra_args['use_ssl'] = $_SESSION['scriptcase']['glo_use_ssl']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_key']))
{
    $nm_arr_db_extra_args['mysql_ssl_key'] = $_SESSION['scriptcase']['glo_mysql_ssl_key']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cert']))
{
    $nm_arr_db_extra_args['mysql_ssl_cert'] = $_SESSION['scriptcase']['glo_mysql_ssl_cert']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_capath']))
{
    $nm_arr_db_extra_args['mysql_ssl_capath'] = $_SESSION['scriptcase']['glo_mysql_ssl_capath']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_ca']))
{
    $nm_arr_db_extra_args['mysql_ssl_ca'] = $_SESSION['scriptcase']['glo_mysql_ssl_ca']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cipher']))
{
    $nm_arr_db_extra_args['mysql_ssl_cipher'] = $_SESSION['scriptcase']['glo_mysql_ssl_cipher']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_autocommit']))
{
    $nm_con_db2['db2_autocommit'] = $_SESSION['scriptcase']['glo_db2_autocommit']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_lib']))
{
    $nm_con_db2['db2_i5_lib'] = $_SESSION['scriptcase']['glo_db2_i5_lib']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_naming']))
{
    $nm_con_db2['db2_i5_naming'] = $_SESSION['scriptcase']['glo_db2_i5_naming']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_commit']))
{
    $nm_con_db2['db2_i5_commit'] = $_SESSION['scriptcase']['glo_db2_i5_commit']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_query_optimize']))
{
    $nm_con_db2['db2_i5_query_optimize'] = $_SESSION['scriptcase']['glo_db2_i5_query_optimize']; 
}
if (isset($_SESSION['scriptcase']['oracle_type']))
{
    $nm_arr_db_extra_args['oracle_type'] = $_SESSION['scriptcase']['oracle_type']; 
}
$nm_con_persistente = "";
$nm_con_use_schema  = "";
if (isset($_SESSION['scriptcase']['glo_use_persistent']))
{
    $nm_con_persistente = $_SESSION['scriptcase']['glo_use_persistent']; 
}
if (isset($_SESSION['scriptcase']['glo_use_schema']))
{
    $nm_con_use_schema = $_SESSION['scriptcase']['glo_use_schema']; 
}
if (!empty($nm_falta_var) || !empty($nm_falta_var_db))
{
    if (empty($nm_falta_var_db))
    {
        echo "<table width=\"80%\"  border=\"1\" height=\"117\">";
        echo "<tr>";
        echo "   <td class=\"css_menu_sel\">";
        echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_glob'] . "</font>";
        echo "  " . $nm_falta_var;
        echo "   </b></td>";
        echo " </tr>";
        echo "</table>";
    }
    else
    {
        echo "<table width=\"80%\"  border=\"1\" height=\"117\">";
        echo "<tr>";
        echo "   <td class=\"css_menu_sel\">";
        echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_data'] . "</font>";
        echo "   </b></td>";
        echo " </tr>";
        echo "</table>";
    }
    if (isset($_SESSION['scriptcase']['nm_ret_exec']) && '' != $_SESSION['scriptcase']['nm_ret_exec'])
    { 
        if (isset($_SESSION['sc_session'][1]['app_menu']['sc_outra_jan']) && $_SESSION['sc_session'][1]['app_menu']['sc_outra_jan'])
        {
            echo "<a href='javascript:window.close()'><img border='0' src='" . $path_imag_cab . "/scriptcase__NM__exit.gif' title='" . $this->Nm_lang['lang_btns_menu_rtrn_hint'] . "' align=absmiddle></a> \n" ; 
        } 
        else 
        { 
            echo "<a href='" . $_SESSION['scriptcase']['nm_ret_exec'] . "><img border='0' src='" . $path_imag_cab . "/scriptcase__NM__exit.gif' title='" . $this->Nm_lang['lang_btns_menu_rtrn_hint'] . "' align=absmiddle></a> \n" ; 
        } 
    } 
    exit ;
} 
if (isset($_SESSION['scriptcase']['glo_db_master_usr']) && !empty($_SESSION['scriptcase']['glo_db_master_usr']))
{
    $nm_usuario = $_SESSION['scriptcase']['glo_db_master_usr']; 
}
if (isset($_SESSION['scriptcase']['glo_db_master_pass']) && !empty($_SESSION['scriptcase']['glo_db_master_pass']))
{
    $nm_senha = $_SESSION['scriptcase']['glo_db_master_pass']; 
}
if (isset($_SESSION['scriptcase']['glo_db_master_cript']) && !empty($_SESSION['scriptcase']['glo_db_master_cript']))
{
    $_SESSION['scriptcase']['glo_senha_protect'] = $_SESSION['scriptcase']['glo_db_master_cript']; 
}
$sc_tem_trans_banco = false;
$this->nm_bases_access    = array("access", "ado_access", "ace_access");
$this->nm_bases_db2       = array("db2", "db2_odbc", "odbc_db2", "odbc_db2v6", "pdo_db2_odbc", "pdo_ibm");
$this->nm_bases_ibase     = array("ibase", "firebird", "pdo_firebird", "borland_ibase");
$this->nm_bases_informix  = array("informix", "informix72", "pdo_informix");
$this->nm_bases_mssql     = array("mssql", "ado_mssql", "adooledb_mssql", "odbc_mssql", "mssqlnative", "pdo_sqlsrv", "pdo_dblib", "azure_mssql", "azure_ado_mssql", "azure_adooledb_mssql", "azure_odbc_mssql", "azure_mssqlnative", "azure_pdo_sqlsrv", "azure_pdo_dblib", "googlecloud_mssql", "googlecloud_ado_mssql", "googlecloud_adooledb_mssql", "googlecloud_odbc_mssql", "googlecloud_mssqlnative", "googlecloud_pdo_sqlsrv", "googlecloud_pdo_dblib", "amazonrds_mssql", "amazonrds_ado_mssql", "amazonrds_adooledb_mssql", "amazonrds_odbc_mssql", "amazonrds_mssqlnative", "amazonrds_pdo_sqlsrv", "amazonrds_pdo_dblib");
$this->nm_bases_mysql     = array("mysql", "mysqlt", "mysqli", "maxsql", "pdo_mysql", "azure_mysql", "azure_mysqlt", "azure_mysqli", "azure_maxsql", "azure_pdo_mysql", "googlecloud_mysql", "googlecloud_mysqlt", "googlecloud_mysqli", "googlecloud_maxsql", "googlecloud_pdo_mysql", "amazonrds_mysql", "amazonrds_mysqlt", "amazonrds_mysqli", "amazonrds_maxsql", "amazonrds_pdo_mysql");
$this->nm_bases_postgres  = array("postgres", "postgres64", "postgres7", "pdo_pgsql", "azure_postgres", "azure_postgres64", "azure_postgres7", "azure_pdo_pgsql", "googlecloud_postgres", "googlecloud_postgres64", "googlecloud_postgres7", "googlecloud_pdo_pgsql", "amazonrds_postgres", "amazonrds_postgres64", "amazonrds_postgres7", "amazonrds_pdo_pgsql");
$this->nm_bases_oracle    = array("oci8", "oci805", "oci8po", "odbc_oracle", "oracle", "pdo_oracle", "oraclecloud_oci8", "oraclecloud_oci805", "oraclecloud_oci8po", "oraclecloud_odbc_oracle", "oraclecloud_oracle", "oraclecloud_pdo_oracle", "amazonrds_oci8", "amazonrds_oci805", "amazonrds_oci8po", "amazonrds_odbc_oracle", "amazonrds_oracle", "amazonrds_pdo_oracle");
$this->nm_bases_sqlite    = array("sqlite", "sqlite3", "pdosqlite");
$this->nm_bases_sybase    = array("sybase", "pdo_sybase_odbc", "pdo_sybase_dblib");
$this->nm_bases_vfp       = array("vfp");
$this->nm_bases_odbc      = array("odbc");
$this->nm_bases_progress  = array("pdo_progress_odbc", "progress");
$_SESSION['scriptcase']['sc_num_page'] = 1;
$_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1DcJeDuBOZ1BYHuF7DMvOVcBUHEFYHMJeHQNmZ1BiHIveV5JwHgrKVkJqH5FYZuXGHQNwZSBiHAveD5NUHgNKDkBOV5FYHMBiHQNmZSBOD1zGD5BOHgveHArsDWX7HIB/HQBiDuBqHAvOV5XGDMBYVcBUDWXKVoF7HQNwZ1BOHABYHuFUHgBeZSJqDWr/HIJsD9XsZ9JeD1BeD5F7DMvmVcXKH5XCHMX7HQJmVIJsD1rwD5F7HgrKHArCDWXCHIFUHQBiH9FGD1veHuBODMvmVcFKV5BmVoBqD9BsZkFGHArKD5JeDMBYVkJqV5FaDorqD9NwH9X7Z1rwD5NUHuBOVIBODWFYHMBiD9BsVIraD1rwV5X7HgBeHEFKV5FaDoraD9NwDQJwHAveV5raHuNOVcBODWFYDoJsD9BiZ1BOZ1BeV5BqDEBOZSJGDWr/VoFGDcXOZSFGHAveD5BOHuzGVcFiV5F/VorqD9JmZ1rqHArKHQJwDEBODkFeH5FYVoFGHQJKDQJsHABYVWBqDMrYDkFCDurGVEFGHQXOZ1FGDSrYHQXGHgBeZSJqDWXCHMJsD9JKZ9F7HIrwHuFaHuNOZSrCH5FqDoXGHQJmZ1FGZ1vOZMJwHgNOHENiHEXCHIX7HQNmH9FUHIvsD5F7DMvOVIB/DWFaHMX7DcNmZ1X7HIBOV5X7HgvsHArCDuJeHIrqHQFYDQFaD1vOD5F7DMBOVIBsH5XCHIrqDcNmZ1BOD1zGD5rqDEBOHEFiHEFqDoF7DcJUZSBiHIvsVWFaDMzGDkB/DWXKVENUHQBqZ1FGHINKV5X7HgrKZSJ3V5FqHIBqHQNmDuBqD1BOD5F7HgrwVcXKHEFYHMF7HQXGZkBiD1NaV5X7HgrKDkB/DuJeHIXGDcBiH9FUD1vOV5FGHuNOVcFKHEFYVoBqDcBwH9BqDSvOZMJwHgNOHENiH5FYHMFaDcXGZSBiHAvOD5F7DMrYVIB/H5XKVEF7HQXGZkBiHAvmV5X7HgNKVkJ3V5XCHMFaDcBiDQFaZ1vCD5F7DMBOV9FeDur/HIJsHQBsZ1BiD1vsD5rqDEBOHEFiHEFqDoF7DcJUZSFGD1BeV5FGHgrYDkFCDWXCVoB/D9BiZ1F7HIveD5BiHgBeDkB/HEB3DoB/HQFYDQJwHANOV5JwHgrKDkFCDWJeVoB/D9BsZkFUHArKHQraDEBeHEXeDuFYVoB/D9NwZ9rqZ1rwHQBOHgrKVcFCH5XCHIF7DcBqZ1B/DSBeV5FaHgvCZSJGDWB3ZuXGHQXGDQFGHAveD5BOHuzGVcBUDuFGVoFGHQFYH9FaHIBeZMBODEvsZSJGDWr/DoB/D9XsZSFGD1NKV5JwHuzGDkBOH5FqVoX7D9JmZ1FaHArKZMB/DMBYZSXeDWX7DoXGDcBwDuBOZ1NaV5FGHuNOVcFKHEFYVoBqDcBwH9FaD1rwD5rqDMNKZSXeDuJeDoB/D9NwZSFGD1veV5raDMBODkBOH5FqVoX7D9JmZ1FaHArKZMB/HgBeZSXeDWX7DoXGDcBwDuBOZ1BYHQF7HgrKVcFCDWJeVErqHQJmZ1F7Z1vmD5rqDEBOHArCDWBmDoJeHQBiDQBqHAvmV5BODMvOVcBUDWrmVoF7HQNmZkFGHArKV5FUDMrYZSXeV5FqHIJsD9XsDuFaHIrKHuFGDMNOVIBODur/HMFaHQBiH9BqDSNOHuFGHgBOVkJ3DuJeHMBqD9NmH9BiHIBeHuFaHuNOZSrCH5FqDoXGHQJmZ1FGD1rKHuX7HgNODkFeV5FqHIFGHQNmZSBiZ1N7HQF7HgrwV9FeDuFqHIJsHQBiH9BOHAN7HQrqHgBeHAFKDWBmVoBODcJUDQFaHArYHQF7DMBODkBsDWFYHIXGHQXGH9BqZ1BeHuFGHgrKHArCDWFGDoNUHQXsDuFaZ1zGV5BiDMBODkBsV5X7HIrqDcFYZkFGD1rwHuJeHgBOHEJqH5X/DoNUHQNwDuFaZ1N7HuBiDMBYDkB/DWJeHIF7HQJmZ1BOD1rKHQrqDMveVkJ3DWX7HIBiHQJKDQFUD1BeHuFaHuNOZSrCH5FqDoXGHQJmZ1BiDSvOV5FUHgveHEBOV5JeZura";
 $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['app_menu']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['app_menu']['glo_nm_conexao']))
{ 
   $this->Db = db_conect_devel($_SESSION['scriptcase']['app_menu']['glo_nm_conexao'], $str_root . $_SESSION['scriptcase']['app_menu']['glo_nm_path_prod'], 'Controller'); 
} 
else 
{ 
   $this->Db = db_conect($nm_tpbanco, $nm_servidor, $nm_usuario, $nm_senha, $nm_banco, $glo_senha_protect, "S", $nm_con_persistente, $nm_con_db2, $nm_database_encoding, $nm_arr_db_extra_args); 
} 
$this->nm_tpbanco = $nm_tpbanco; 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_ibase) && function_exists('ibase_timefmt'))
{
    ibase_timefmt('%Y-%m-%d %H:%M:%S');
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_sybase))
{
   $this->Db->fetchMode = ADODB_FETCH_BOTH;
   $this->Db->Execute("set dateformat ymd");
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_db2))
{
   $this->Db->fetchMode = ADODB_FETCH_NUM;
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_mssql))
{
   $this->Db->Execute("set dateformat ymd");
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_oracle))
{
   $this->Db->Execute("alter session set nls_date_format         = 'yyyy-mm-dd hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_timestamp_format    = 'yyyy-mm-dd hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_timestamp_tz_format = 'yyyy-mm-dd hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_time_format         = 'hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_time_tz_format      = 'hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_numeric_characters  = '.,'");
   $_SESSION['sc_session'][$this->Ini->sc_page]['app_menu']['decimal_db'] = ".";
} 
//
      $this->tab_grupo[0] = "Controller/";
      if ($_SESSION['scriptcase']['sc_usa_grupo'] != "S")
      {
          $this->tab_grupo[0] = "";
      }
      $_SESSION['scriptcase']['app_menu']['contr_erro'] = 'on';
  if($this->sc_script_name == 'sec_Login'){
    if(isset($_COOKIE['usr_data'])){
        unset($_COOKIE['usr_data']);
    }
}
if($this->sc_script_name == 'sec_Login'){
    if(isset($_COOKIE['usr_data'])){
        unset($_COOKIE['usr_data']);
    }
}
if($this->sc_script_name == 'app_Login'){
    
    if(isset($_COOKIE['usr_data'])){
        unset($_COOKIE['usr_data']);
        setcookie("usr_data", '',time()+60*60*24*30,'/');
    }
}
$_SESSION['scriptcase']['app_menu']['contr_erro'] = 'off';
      $_SESSION['scriptcase']['sc_ult_apl_menu'] = array();
      unset($_SESSION['scriptcase']['sc_usa_grupo']);
if ($this->Db)
{
    $this->Db->Close(); 
}
      $link_url = false;
      $parms_session = "";

      if ($_SESSION['scriptcase']['sc_item_menu'] == "app_menu")
      {
              $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("dashboard_pag_principal") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=1";
      }
      elseif (isset($_SESSION['scriptcase']['sc_def_menu']['app_menu']))
      {
         foreach($_SESSION['scriptcase']['sc_def_menu']['app_menu'] as $id_item => $arr_item)
         {
             if ($_SESSION['scriptcase']['sc_item_menu'] == $id_item)
             { 
                 if ($arr_item['lnk_url'])
                 { 
                    $apl_run = $arr_item['url'];
                    $link_url = true;
                 } 
                 else 
                 { 
                    $this->menu_sc_init = (isset($arr_item['sc_init'])) ? $arr_item['sc_init'] : 1;
                    $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . $arr_item['url']; 
                    $parms_session = $arr_item['parm']; 
                 } 
                break; 
             } 
         }
      }
      {
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_13")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_dbo_filial") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_22")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_dbo_impostos") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_14")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_dbo_empresas") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_17")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_dbo_variaveis") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_18")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_dbo_pessoa_juridica_fisica") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_19")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_dbo_contratos") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_20")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_dbo_servicos") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_26")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_dbo_observacao_status") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_31")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_dbo_especialidade_servicos") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_32")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_dbo_conselho_de_classe") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_68")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_form_dbo_usuario_externo") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_21")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("filtro_lancamento_guias") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_35")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("calendar_dbo_pre_lancamento_servicos") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_36")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_dbo_pre_lancamento_servicos") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_24")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("filtro_recibos") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_33")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("filtro_declaracoes") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_25")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("filtro_dbo_view_conferencia_guia") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_27")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_dbo_view_contratos") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_61")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("filtro_rel_geral_lancamentos") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_67")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("filtro_dbo_view_resumo_servico") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_16")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("grid_dbo_mensagem") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_29")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("selecionaExportacao") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_66")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_dbo_param_unidades") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_64")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_dbo_param_impostos") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_65")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("form_dbo_param_especialidadesXNucleoCusto") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_51")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("sec_grid_sec_users") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_52")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("sec_grid_sec_apps") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_53")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("sec_grid_sec_groups") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_60")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("sec_grid_sec_users_groups") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_54")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("sec_search_sec_groups") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_55")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("sec_sync_apps") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_56")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("sec_change_pswd") . "/?nm_run_menu=1&nm_apl_menu=app_menu&script_case_init=" . $this->Gera_sc_init($this->sc_menu_item) . "";
      }
      if ($_SESSION['scriptcase']['sc_item_menu'] == "item_57")
      {
          $apl_run = $_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . SC_dir_app_name("sec_Login") . "/?script_case_init=" . $_SESSION['sc_session'][1]['app_menu']['init'] . "";
      }
      }
      if (!$link_url)
      {
          $pos = strpos($apl_run, "?");
          if ($pos !== false)
          {
              $parms = "";
              $temp = explode("&", substr($apl_run, $pos + 1));
              foreach ($temp as $cada_parm)
              {
                  $parte_parm = explode("=", $cada_parm);
                  $parms .= (!empty($parms)) ? "?@?" . $parte_parm[0] . "?#?" : $parte_parm[0] . "?#?";
                  $parms .= (isset($parte_parm[1])) ? $parte_parm[1] : "";
              }
              $apl_run =  substr($apl_run, 0, $pos);
          }
      }
      if ($parms_session != "")
      {
          $parms  = isset($parms) ? $parms : '';
          $parms  = $parms_session . (substr($parms_session, -3, 3) != '?@?' ? '?@?' : '') . $parms;
      }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

      <html><body>
        <form name="fmenu" method="post" action="<?php echo NM_encode_input($apl_run); ?>">
          <input type=hidden name="nmgp_parms" value="<?php  echo NM_encode_input($parms); ?>"> 
          <input type=hidden name="script_case_init" value="<?php echo $this->menu_sc_init ?>"> 
          <input type=hidden name="nm_apl_menu" value="app_menu"> 
<?php
      if (isset($_SESSION['scriptcase']['menu_mobile']) && $_SESSION['scriptcase']['menu_mobile'] == "app_menu")
      {
?>
          <input type=hidden name="nmgp_url_saida" value="<?php echo $this->nm_location ?>"> 
<?php
      }
?>
        </form>
      <script type="text/javascript">
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
<?php
      if (isset($_SESSION['scriptcase']['menu_mobile']) && $_SESSION['scriptcase']['menu_mobile'] == "app_menu")
      {
?>
          window.history.pushState('Object', 'app_menu', '<?php echo $this->nm_location ?>');
<?php
      }
      if ($link_url)
      {
?>
          window.location='<?php echo $apl_run; ?>'; 
<?php
      }
      else
      {
?>
          (function() { document.fmenu.submit(); })();
<?php
      }
?>
      </script>
      </body></html>
<?php
   }
   function Gera_sc_init($apl_menu)
   {
       $this->menu_sc_init = 1;
        return  1;
   }
function infor()
{
$_SESSION['scriptcase']['app_menu']['contr_erro'] = 'on';
if (!isset($_SESSION['glo_group_id'])) {$_SESSION['glo_group_id'] = "";}
if (!isset($this->sc_temp_glo_group_id)) {$this->sc_temp_glo_group_id = (isset($_SESSION['glo_group_id'])) ? $_SESSION['glo_group_id'] : "";}
  
$this->sc_temp_glo_group_id = 1;

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	
	function getDatabaseMessage(){
		groupId = {
			code: <?php echo $this->sc_temp_glo_group_id; ?>
		}
		var request = $.ajax({
			  url: "../buscaMensagens/buscaMensagens.php",
			  data: groupId,
			  type: "POST",
			  dataType: "JSON"
		});
		request.done(function(response){
			var total = Object.keys(response).length;
			var content = "";
			console.log(response);
			if(total>0){
				$("#round-badge").text(total);
				$(".show-on-hover").css("pointer-events","");
				$.each(response, function( index, value ) {
					display_local = "Inicio: "+value.start_date+"<br>"+value.message+"<br> Fin: "+value.end_date;
					cont_local = '<a href="#" class="list-group-item list-group-item-action">'+display_local+'</a>';
					content = content + cont_local+"\n";
				});
				$("#dropdow-main").html(content);
			}else{
				$("#round-badge").text("0");
				$(".show-on-hover").css("pointer-events","none");
			}
		})
		request.fail(function(request, status, error){
			console.log(request.responseText);
		});
	}
	getDatabaseMessage();
		setInterval(getDatabaseMessage, 3000);
});
</script>
<?php

if (isset($this->sc_temp_glo_group_id)) {$_SESSION['glo_group_id'] = $this->sc_temp_glo_group_id;}
$_SESSION['scriptcase']['app_menu']['contr_erro'] = 'off';
}
function logomarca()
{
$_SESSION['scriptcase']['app_menu']['contr_erro'] = 'on';
if (!isset($_SESSION['usr_company'])) {$_SESSION['usr_company'] = "";}
if (!isset($this->sc_temp_usr_company)) {$this->sc_temp_usr_company = (isset($_SESSION['usr_company'])) ? $_SESSION['usr_company'] : "";}
  


$sql = "SELECT logomarca FROM filial where idfilial = ".$this->sc_temp_usr_company;
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;
if($this->rs  !== false) {
	$caminho = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"];
	$caminho .= "/scriptcase9/file/img/".$this->sc_temp_usr_company."/".$this->rs->fields[0];
	echo "<img src='".$caminho."' style='height: 40px;' />";
}
if (isset($this->sc_temp_usr_company)) {$_SESSION['usr_company'] = $this->sc_temp_usr_company;}
$_SESSION['scriptcase']['app_menu']['contr_erro'] = 'off';
}
function mudar_empresa()
{
$_SESSION['scriptcase']['app_menu']['contr_erro'] = 'on';
if (!isset($_SESSION['usr_company'])) {$_SESSION['usr_company'] = "";}
if (!isset($this->sc_temp_usr_company)) {$this->sc_temp_usr_company = (isset($_SESSION['usr_company'])) ? $_SESSION['usr_company'] : "";}
if (!isset($_SESSION['usr_companys'])) {$_SESSION['usr_companys'] = "";}
if (!isset($this->sc_temp_usr_companys)) {$this->sc_temp_usr_companys = (isset($_SESSION['usr_companys'])) ? $_SESSION['usr_companys'] : "";}
  
$sql = "SELECT idFilial, comercial FROM filial WHERE idFilial IN (".$this->sc_temp_usr_companys.")";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;
if($this->rs  !== false) {
	$str = '';
	while(!$this->rs->EOF) {
		if($this->rs->fields[0] === $this->sc_temp_usr_company) {
			$str .= '<option value="'.$this->rs->fields[0].'" selected>'.$this->rs->fields[1].'</option>';
		} else {
			$str .= '<option value="'.$this->rs->fields[0].'">'.$this->rs->fields[1].'</option>';
		}
		
		$this->rs->MoveNext();
	}
	$this->rs->Close();
}

echo <<<HTML

	<style>
		.loader {
			position: fixed;
			left: 0px;
			top: 0px;
			width: 100%;
			height: 100%;
			z-index: 9999;
			background: url('https://advirtual.com.br/tickets/carregando-1.gif') 50% 50% no-repeat white;
		}
		div#div_lang_theme {
			background-color: white;
		}
	</style>
	<div id="loader" class="loader"></div>
	<script>
		function Cm_change_company() {
			varCompany = document.getElementById('id_cmgp_company');
			var xhttp = new XMLHttpRequest();
			xhttp.open("GET", "../app_change_company/index.php?usr_company="+varCompany.value, true);
  			xhttp.send();
			location.reload();
		}
		window.onload = function(){		
			$("#div_lang_theme").prepend(`Selecionar Empresa: <select class="css_toolbar_obj" style="vertical-align: middle;" id="id_cmgp_company" onchange="Cm_change_company()">
			   $str
	  </select>`);
			var barra = $("#div_lang_theme").detach();
			$("tr#idMenuLine").after(barra);
			$(".loader").fadeOut("slow");
		};
	</script>
	
HTML;
if (isset($this->sc_temp_usr_companys)) {$_SESSION['usr_companys'] = $this->sc_temp_usr_companys;}
if (isset($this->sc_temp_usr_company)) {$_SESSION['usr_company'] = $this->sc_temp_usr_company;}
$_SESSION['scriptcase']['app_menu']['contr_erro'] = 'off';
}
function search_company()
{
$_SESSION['scriptcase']['app_menu']['contr_erro'] = 'on';
if (!isset($_SESSION['usr_cab'])) {$_SESSION['usr_cab'] = "";}
if (!isset($this->sc_temp_usr_cab)) {$this->sc_temp_usr_cab = (isset($_SESSION['usr_cab'])) ? $_SESSION['usr_cab'] : "";}
if (!isset($_SESSION['usr_name'])) {$_SESSION['usr_name'] = "";}
if (!isset($this->sc_temp_usr_name)) {$this->sc_temp_usr_name = (isset($_SESSION['usr_name'])) ? $_SESSION['usr_name'] : "";}
if (!isset($_SESSION['usr_company'])) {$_SESSION['usr_company'] = "";}
if (!isset($this->sc_temp_usr_company)) {$this->sc_temp_usr_company = (isset($_SESSION['usr_company'])) ? $_SESSION['usr_company'] : "";}
  
$sql = "SELECT filial.comercial, sc_users.name, Empresas.DescricaoEmpresa FROM filial INNER JOIN EMPRESAS ON Empresas.idEmpresa = filial.idEmpresa INNER JOIN sc_users ON filial.idFilial =  (".$this->sc_temp_usr_company.")";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;
if($this->rs  !== false) {
	echo "<span style='color: white;'>Empresa: ".$this->rs->fields[2]."<br>Filial: ".$this->rs->fields[0]."<br>Usuário: ".$this->sc_temp_usr_name."</span>";
	
	$this->sc_temp_usr_cab = "Empresa: ".$this->rs->fields[2]." - | - Filial: ".$this->rs->fields[0].".";
}
if (isset($this->sc_temp_usr_company)) {$_SESSION['usr_company'] = $this->sc_temp_usr_company;}
if (isset($this->sc_temp_usr_name)) {$_SESSION['usr_name'] = $this->sc_temp_usr_name;}
if (isset($this->sc_temp_usr_cab)) {$_SESSION['usr_cab'] = $this->sc_temp_usr_cab;}
$_SESSION['scriptcase']['app_menu']['contr_erro'] = 'off';
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
       $_SESSION['scriptcase']['reg_conf']['monet_simb']    = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo'] : "R$";
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
if (!function_exists("SC_dir_app_ini"))
{
    include_once("../_lib/lib/php/nm_ctrl_app_name.php");
}
SC_dir_app_ini('Controller');
$Sem_Session = (!isset($_SESSION['sc_session'])) ? true : false;
$_SESSION['scriptcase']['sem_session'] = false;
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
    if (isset($_COOKIE['sc_apl_default_Controller'])) {
        $apl_def = explode(",", $_COOKIE['sc_apl_default_Controller']);
    }
    elseif (is_file($root . $_SESSION['scriptcase']['app_menu']['glo_nm_path_imag_temp'] . "/sc_apl_default_Controller.txt")) {
        $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['app_menu']['glo_nm_path_imag_temp'] . "/sc_apl_default_Controller.txt"));
    }
    if (isset($apl_def)) {
        if ($apl_def[0] != "app_menu") {
            $_SESSION['scriptcase']['sem_session'] = true;
            if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                $_SESSION['scriptcase']['app_menu']['session_timeout']['redir'] = $apl_def[0];
            }
            else {
                $_SESSION['scriptcase']['app_menu']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
            }
            $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
            $_SESSION['scriptcase']['app_menu']['session_timeout']['redir_tp'] = $Redir_tp;
        }
        if (isset($_COOKIE['sc_actual_lang_Controller'])) {
            $_SESSION['scriptcase']['app_menu']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_Controller'];
        }
    }
}
$controle = new app_menu_form_php();
$controle->init();
?>
