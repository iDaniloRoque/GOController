<?php  
  include_once('blank_session.php');
  session_start() ;
  class blank_form_teste
  {
  function blank_teste()
  {
    include("../_lib/lang/pt_br.lang.php");
    $_SESSION['scriptcase']['charset'] = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "ISO-8859-1";
    $sc_charset['UTF-8'] = 'utf-8';
    $sc_charset['ISO-2022-JP'] = 'iso-2022-jp';
    $sc_charset['ISO-2022-KR'] = 'iso-2022-kr';
    $sc_charset['ISO-8859-1'] = 'iso-8859-1';
    $sc_charset['ISO-8859-2'] = 'iso-8859-2';
    $sc_charset['ISO-8859-3'] = 'iso-8859-3';
    $sc_charset['ISO-8859-4'] = 'iso-8859-4';
    $sc_charset['ISO-8859-5'] = 'iso-8859-5';
    $sc_charset['ISO-8859-6'] = 'iso-8859-6';
    $sc_charset['ISO-8859-7'] = 'iso-8859-7';
    $sc_charset['ISO-8859-8'] = 'iso-8859-8';
    $sc_charset['ISO-8859-8-I'] = 'iso-8859-8-i';
    $sc_charset['ISO-8859-9'] = 'iso-8859-9';
    $sc_charset['ISO-8859-10'] = 'iso-8859-10';
    $sc_charset['ISO-8859-13'] = 'iso-8859-13';
    $sc_charset['ISO-8859-14'] = 'iso-8859-14';
    $sc_charset['ISO-8859-15'] = 'iso-8859-15';
    $sc_charset['WINDOWS-1250'] = 'windows-1250';
    $sc_charset['WINDOWS-1251'] = 'windows-1251';
    $sc_charset['WINDOWS-1252'] = 'windows-1252';
    $sc_charset['TIS-620'] = 'tis-620';
    $sc_charset['WINDOWS-1253'] = 'windows-1253';
    $sc_charset['WINDOWS-1254'] = 'windows-1254';
    $sc_charset['WINDOWS-1255'] = 'windows-1255';
    $sc_charset['WINDOWS-1256'] = 'windows-1256';
    $sc_charset['WINDOWS-1257'] = 'windows-1257';
    $sc_charset['KOI8-R'] = 'koi8-r';
    $sc_charset['BIG-5'] = 'big5';
    $sc_charset['EUC-CN'] = 'EUC-CN';
    $sc_charset['GB18030'] = 'GB18030';
    $sc_charset['GB2312'] = 'gb2312';
    $sc_charset['EUC-JP'] = 'euc-jp';
    $sc_charset['SJIS'] = 'shift-jis';
    $sc_charset['EUC-KR'] = 'euc-kr';
    ini_set('default_charset', $_SESSION['scriptcase']['charset']);
    $_SESSION['scriptcase']['charset_html']  = (isset($sc_charset[$_SESSION['scriptcase']['charset']])) ? $sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
    if (!function_exists("NM_is_utf8"))
    {
        include_once("../_lib/lib/php/nm_utf8.php");
    }
?> 
<html> 
<HEAD>
 <title>blank</title> 
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
</HEAD>
<body> 
<?php  
  $str_path_web = $_SERVER['PHP_SELF'];
  $str_path_web = str_replace("\\", '/', $str_path_web);
  $str_path_web = str_replace('//', '/', $str_path_web);
  $path_img     = substr($str_path_web, 0, strrpos($str_path_web, '/'));
  $path_img     = substr($path_img, 0, strrpos($path_img, '/')) . '/';
  $path_img     = $path_img . "_lib/img";
  if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'blank')
  {
      echo "<a href='" . $_SESSION['scriptcase']['nm_sc_retorno'] . "' target='_self' onclick='javascript:window.close();'>" . sc_convert_encoding($this->Nm_lang['lang_btns_rtrn_scrp_hint'], $_SESSION['scriptcase']['charset']) . "</a> \n" ; 
  }
  elseif (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) 
  {
      echo "<a href='" . $_SERVER['HTTP_REFERER'] . "' target='_self'>" . sc_convert_encoding($this->Nm_lang['lang_btns_exit_appl_hint'], $_SESSION['scriptcase']['charset']) . "</a> \n" ; 
  }
?> 
<br> 
<B><FONT SIZE="4">blank</FONT></B> 
<br> 
<br> 
<form name="FCons" method=post 
               action="./" 
               target="_self"> 
Codigo_do_fornecedor&nbsp;&nbsp;<input type=text name="Codigo_do_fornecedor" size=20><br> 
Serie_nota_fiscal&nbsp;&nbsp;<input type=text name="Serie_nota_fiscal" size=20><br> 
Id_nucleo_atendimento&nbsp;&nbsp;<input type=text name="Id_nucleo_atendimento" size=20><br> 
ID_Plano_de_contas_contabil&nbsp;&nbsp;<input type=text name="ID_Plano_de_contas_contabil" size=20><br> 
Valor&nbsp;&nbsp;<input type=text name="Valor" size=20><br> 
Operador&nbsp;&nbsp;<input type=text name="Operador" size=20><br> 
Codigo_unidade_operaciona&nbsp;&nbsp;<input type=text name="Codigo_unidade_operaciona" size=20><br> 
ExportacaoContrato&nbsp;&nbsp;<input type=text name="ExportacaoContrato" size=20><br> 
dbo&nbsp;&nbsp;<input type=text name="dbo" size=20><br> 
Recibo&nbsp;&nbsp;<input type=text name="Recibo" size=20><br> 
Contas a pagar&nbsp;&nbsp;<input type=text name="sc_glob_0" size=20><br> 
Codigo do documento&nbsp;&nbsp;<input type=text name="sc_glob_1" size=20><br> 
Numero nota fiscal&nbsp;&nbsp;<input type=text name="sc_glob_2" size=20><br> 
Data de entrada&nbsp;&nbsp;<input type=text name="sc_glob_3" size=20><br> 
Data de emissao&nbsp;&nbsp;<input type=text name="sc_glob_4" size=20><br> 
Data de vencimento&nbsp;&nbsp;<input type=text name="sc_glob_5" size=20><br> 
Codigo historico&nbsp;&nbsp;<input type=text name="sc_glob_6" size=20><br> 
Complemento historico&nbsp;&nbsp;<input type=text name="sc_glob_7" size=20><br> 
Ct recebe paga&nbsp;&nbsp;<input type=text name="sc_glob_8" size=20><br> 
Conta custo&nbsp;&nbsp;<input type=text name="sc_glob_9" size=20><br> 
<input type="hidden" name="nmgp_outra_jan" value="true"/>
<input type="hidden" name="nmgp_start" value="SC"/>
<input type=hidden name="NM_contr_var_session" value="Yes"> 
<input type=submit value="blank"> 
</form> 
<script language=javascript> 
 document.FCons.Codigo_do_fornecedor.focus(); 
</script> 
</body> 
</html> 
<?php
  }
 }
  $frm_teste = new blank_form_teste();
  $frm_teste->blank_teste();
?>
