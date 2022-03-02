<?php
class form_dbo_lancamento_guias_form extends form_dbo_lancamento_guias_apl
{
function Form_Init()
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
?>
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

header("X-XSS-Protection: 1; mode=block");
header("X-Frame-Options: SAMEORIGIN");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " dbo.lancamento_servicos"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " dbo.lancamento_servicos"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__img__NM__ct_other_gauge.png">
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_userSweetAlertDisplayed = false;
 </SCRIPT>
 <SCRIPT type="text/javascript">
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
  var sc_css_status_pwd_box = '<?php echo $this->Ini->Css_status_pwd_box; ?>';
  var sc_css_status_pwd_text = '<?php echo $this->Ini->Css_status_pwd_text; ?>';
<?php
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['sc_redir_atualiz'] == 'ok')
{
?>
  var sc_closeChange = true;
<?php
}
else
{
?>
  var sc_closeChange = false;
<?php
}
?>
 </SCRIPT>
        <SCRIPT type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>frameControl.js"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/viewerjs/viewer.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/viewerjs/viewer.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <style type="text/css">
   .scFormLabelOddMult a img[src$='<?php echo $this->Ini->Label_sort_desc ?>'], 
   .scFormLabelOddMult a img[src$='<?php echo $this->Ini->Label_sort_asc ?>']{opacity:1!important;} 
   .scFormLabelOddMult a img{opacity:0;transition:all .2s;} 
   .scFormLabelOddMult:HOVER a img{opacity:1;transition:all .2s;} 
 </style>
<style type="text/css">
.sc-button-image.disabled {
	opacity: 0.25
}
.sc-button-image.disabled img {
	cursor: default !important
}
</style>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
<?php
$miniCalendarFA = $this->jqueryFAFile('calendar');
if ('' != $miniCalendarFA) {
?>
<style type="text/css">
.css_read_off_data_do_servico_ button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_momento_ button {
	background-color: transparent;
	border: 0;
	padding: 0
}
</style>
<?php
}
?>
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_dbo_lancamento_guias/form_dbo_lancamento_guias_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_dbo_lancamento_guias_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['last'] : 'off'); ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       if ("off" == Nav_binicio_macro_disabled) { $("#sc_b_ini_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       if ("off" == Nav_bretorna_macro_disabled) { $("#sc_b_ret_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       if ("off" == Nav_bfinal_macro_disabled) { $("#sc_b_fim_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       if ("off" == Nav_bavanca_macro_disabled) { $("#sc_b_avc_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
function summary_atualiza(reg_ini, reg_qtd, reg_tot)
{
    nm_sumario = "[<?php echo $this->Ini->Nm_lang['lang_othr_smry_info']?>]";
    nm_sumario = nm_sumario.replace("?start?", reg_ini);
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
function navpage_atualiza(str_navpage)
{
    if (document.getElementById("sc_b_navpage_b")) document.getElementById("sc_b_navpage_b").innerHTML = str_navpage;
}
<?php

include_once('form_dbo_lancamento_guias_jquery.php');

?>
var applicationKeys = "";
applicationKeys += "ctrl+shift+right";
applicationKeys += ",";
applicationKeys += "ctrl+shift+left";
applicationKeys += ",";
applicationKeys += "ctrl+right";
applicationKeys += ",";
applicationKeys += "ctrl+left";
applicationKeys += ",";
applicationKeys += "alt+q";
applicationKeys += ",";
applicationKeys += "escape";
applicationKeys += ",";
applicationKeys += "ctrl+enter";
applicationKeys += ",";
applicationKeys += "ctrl+s";
applicationKeys += ",";
applicationKeys += "ctrl+delete";
applicationKeys += ",";
applicationKeys += "f1";
applicationKeys += ",";
applicationKeys += "ctrl+shift+c";

var hotkeyList = "";

function execHotKey(e, h) {
    var hotkey_fired = false;
  switch (true) {
    case (["ctrl+shift+right"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_fim");
      break;
    case (["ctrl+shift+left"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ini");
      break;
    case (["ctrl+right"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ava");
      break;
    case (["ctrl+left"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ret");
      break;
    case (["alt+q"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_sai");
      break;
    case (["escape"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_cnl");
      break;
    case (["ctrl+enter"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_inc");
      break;
    case (["ctrl+s"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_alt");
      break;
    case (["ctrl+delete"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_exc");
      break;
    case (["f1"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_webh");
      break;
    case (["ctrl+shift+c"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_copy");
      break;
    default:
      return true;
  }
  if (hotkey_fired) {
        e.preventDefault();
        return false;
    } else {
        return true;
    }
}
</script>

<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>hotkeys.inc.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>hotkeys_setup.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>frameControl.js"></script>
<script type="text/javascript">

function process_hotkeys(hotkey)
{
  if (hotkey == "sys_format_fim") {
    if (typeof scBtnFn_sys_format_fim !== "undefined" && typeof scBtnFn_sys_format_fim === "function") {
      scBtnFn_sys_format_fim();
        return true;
    }
  }
  if (hotkey == "sys_format_ini") {
    if (typeof scBtnFn_sys_format_ini !== "undefined" && typeof scBtnFn_sys_format_ini === "function") {
      scBtnFn_sys_format_ini();
        return true;
    }
  }
  if (hotkey == "sys_format_ava") {
    if (typeof scBtnFn_sys_format_ava !== "undefined" && typeof scBtnFn_sys_format_ava === "function") {
      scBtnFn_sys_format_ava();
        return true;
    }
  }
  if (hotkey == "sys_format_ret") {
    if (typeof scBtnFn_sys_format_ret !== "undefined" && typeof scBtnFn_sys_format_ret === "function") {
      scBtnFn_sys_format_ret();
        return true;
    }
  }
  if (hotkey == "sys_format_sai") {
    if (typeof scBtnFn_sys_format_sai !== "undefined" && typeof scBtnFn_sys_format_sai === "function") {
      scBtnFn_sys_format_sai();
        return true;
    }
  }
  if (hotkey == "sys_format_cnl") {
    if (typeof scBtnFn_sys_format_cnl !== "undefined" && typeof scBtnFn_sys_format_cnl === "function") {
      scBtnFn_sys_format_cnl();
        return true;
    }
  }
  if (hotkey == "sys_format_inc") {
    if (typeof scBtnFn_sys_format_inc !== "undefined" && typeof scBtnFn_sys_format_inc === "function") {
      scBtnFn_sys_format_inc();
        return true;
    }
  }
  if (hotkey == "sys_format_alt") {
    if (typeof scBtnFn_sys_format_alt !== "undefined" && typeof scBtnFn_sys_format_alt === "function") {
      scBtnFn_sys_format_alt();
        return true;
    }
  }
  if (hotkey == "sys_format_exc") {
    if (typeof scBtnFn_sys_format_exc !== "undefined" && typeof scBtnFn_sys_format_exc === "function") {
      scBtnFn_sys_format_exc();
        return true;
    }
  }
  if (hotkey == "sys_format_webh") {
    if (typeof scBtnFn_sys_format_webh !== "undefined" && typeof scBtnFn_sys_format_webh === "function") {
      scBtnFn_sys_format_webh();
        return true;
    }
  }
  if (hotkey == "sys_format_copy") {
    if (typeof scBtnFn_sys_format_copy !== "undefined" && typeof scBtnFn_sys_format_copy === "function") {
      scBtnFn_sys_format_copy();
        return true;
    }
  }
    return false;
}

 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).on('load', function() {
     if ($('#t').length>0) {
         scQuickSearchKeyUp('t', null);
     }
   });
   function scQuickSearchSubmit_t() {
     nm_move('fast_search', 't');
   }

   function scQuickSearchKeyUp(sPos, e) {
     if (null != e) {
       var keyPressed = e.charCode || e.keyCode || e.which;
       if (13 == keyPressed) {
         if ('t' == sPos) scQuickSearchSubmit_t();
       }
       else
       {
           $('#SC_fast_search_submit_'+sPos).show();
       }
     }
   }
   function nm_gp_submit_qsearch(pos)
   {
        nm_move('fast_search', pos);
   }
   function nm_gp_open_qsearch_div(pos)
   {
        if (typeof nm_gp_open_qsearch_div_mobile == 'function') {
            return nm_gp_open_qsearch_div_mobile(pos);
        }
        if($('#SC_fast_search_dropdown_' + pos).hasClass('fa-caret-down'))
        {
            if(($('#quicksearchph_' + pos).offset().top+$('#id_qs_div_' + pos).height()+10) >= $(document).height())
            {
                $('#id_qs_div_' + pos).offset({top:($('#quicksearchph_' + pos).offset().top-($('#quicksearchph_' + pos).height()/2)-$('#id_qs_div_' + pos).height()-4)});
            }

            nm_gp_open_qsearch_div_store_temp(pos);
            $('#SC_fast_search_dropdown_' + pos).removeClass('fa-caret-down').addClass('fa-caret-up');
        }
        else
        {
            $('#SC_fast_search_dropdown_' + pos).removeClass('fa-caret-up').addClass('fa-caret-down');
        }
        $('#id_qs_div_' + pos).toggle();
   }

   var tmp_qs_arr_fields = [], tmp_qs_arr_cond = "";
   function nm_gp_open_qsearch_div_store_temp(pos)
   {
        tmp_qs_arr_fields = [], tmp_qs_str_cond = "";

        if($('#fast_search_f0_' + pos).prop('type') == 'select-multiple')
        {
            tmp_qs_arr_fields = $('#fast_search_f0_' + pos).val();
        }
        else
        {
            tmp_qs_arr_fields.push($('#fast_search_f0_' + pos).val());
        }

        tmp_qs_str_cond = $('#cond_fast_search_f0_' + pos).val();
   }

   function nm_gp_cancel_qsearch_div_store_temp(pos)
   {
        $('#fast_search_f0_' + pos).val('');
        $("#fast_search_f0_" + pos + " option").prop('selected', false);
        for(it=0; it<tmp_qs_arr_fields.length; it++)
        {
            $("#fast_search_f0_" + pos + " option[value='"+ tmp_qs_arr_fields[it] +"']").prop('selected', true);
        }
        $("#fast_search_f0_" + pos).change();
        tmp_qs_arr_fields = [];

        $('#cond_fast_search_f0_' + pos).val(tmp_qs_str_cond);
        $('#cond_fast_search_f0_' + pos).change();
        tmp_qs_str_cond = "";

        nm_gp_open_qsearch_div(pos);
   } if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    $vertical_center = '';
?>
<body class="scFormPage sc-app-form" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_dbo_lancamento_guias_js0.php");
?>
<script type="text/javascript"> 
  sc_quant_excl = <?php if (!isset($sc_check_excl)) {$sc_check_excl = array();} echo count($sc_check_excl); ?>; 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
var scInsertFieldWithErrors = new Array();
<?php
foreach ($this->NM_ajax_info['fieldsWithErrors'] as $insertFieldName) {
?>
scInsertFieldWithErrors.push("<?php echo $insertFieldName; ?>");
<?php
}
?>
$(function() {
	scAjaxError_markFieldList(scInsertFieldWithErrors);
});
 </script>
<form  name="F1" method="post" 
               action="./" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_dbo_lancamento_guias'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_dbo_lancamento_guias'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable scFormToastTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle scFormToastTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage scFormToastMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<?php
$msgDefClose = isset($this->arr_buttons['bmessageclose']) ? $this->arr_buttons['bmessageclose']['value'] : 'Ok';
?>
<script type="text/javascript">
var scMsgDefTitle = "<?php if (isset($this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl'])) {echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl'];} ?>";
var scMsgDefButton = "Ok";
var scMsgDefClose = "<?php echo $msgDefClose; ?>";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<?php
if ($this->record_insert_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmi']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
if ($this->record_delete_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmd']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
?>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="60%">
 <tr>
  <td>
  <div class="scFormBorder" style="<?php echo (isset($remove_border) ? $remove_border : ''); ?>">
   <table width='100%' cellspacing=0 cellpadding=0>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['fast_search'][2] : "";
          $stateSearchIconClose  = 'none';
          $stateSearchIconSearch = '';
          if(!empty($OPC_dat))
          {
              $stateSearchIconClose  = '';
              $stateSearchIconSearch = 'none';
          }
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <select id='fast_search_f0_t'   class="scFormToolbarInput" style="vertical-align: middle;" name="nmgp_fast_search_t" onChange="change_fast_t = 'CH';">
<?php 
          $SC_Label_atu['SC_all_Cmp'] = $this->Ini->Nm_lang['lang_srch_all_fields']; 
          $SC_Label_atu['numero_da_guia_'] = (isset($this->nm_new_label['numero_da_guia_'])) ? $this->nm_new_label['numero_da_guia_'] : 'Nº da Guia'; 
          foreach ($SC_Label_atu as $CMP => $LABEL)
          {
              $OPC_sel = ($CMP == $OPC_cmp) ? " selected" : "";
              echo "           <option value='" . $CMP . "'" . $OPC_sel . ">" . $LABEL . "</option>";
          }
?> 
          </select>
          <select id='cond_fast_search_f0_t' class="scFormToolbarInput" style="vertical-align: middle;display:none;" name="nmgp_cond_fast_search_t" onChange="change_fast_t = 'CH';">
<?php 
          $OPC_sel = ("qp" == $OPC_arg) ? " selected" : "";
           echo "           <option value='qp'" . $OPC_sel . ">" . $this->Ini->Nm_lang['lang_srch_like'] . "</option>";
?> 
          </select>
          <span id="quicksearchph_t" class="scFormToolbarInput" style='display: inline-block; vertical-align: inherit'>
              <span>
                  <input type="text" id="SC_fast_search_t" class="scFormToolbarInputText" style="border-width: 0px;;" name="nmgp_arg_fast_search_t" value="<?php echo $this->form_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{maxLength: 255}" placeholder="<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>">&nbsp;
                  <img style="display: <?php echo $stateSearchIconSearch ?>; "  id="SC_fast_search_submit_t" class='css_toolbar_obj_qs_search_img' src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search; ?>" onclick="scQuickSearchSubmit_t();">
                  <img style="display: <?php echo $stateSearchIconClose ?>; " id="SC_fast_search_close_t" class='css_toolbar_obj_qs_search_img' src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean; ?>" onclick="document.getElementById('SC_fast_search_t').value = '__Clear_Fast__'; nm_move('fast_search', 't');">
              </span>
          </span>  </div>
  <?php
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($this->Embutida_form) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['new'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['new'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-3';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['insert'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-4';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['bcancelar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-5';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['update'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
        $sCondStyle = ($this->nmgp_botoes['reload'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['breload']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['breload']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['breload']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['breload']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['breload'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "breload", "scBtnFn_sys_format_reload()", "scBtnFn_sys_format_reload()", "sc_b_reload_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-9';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-10';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-11';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['empty_filter'] = true;
       }
       echo "<tr><td>";
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
     <div id="SC_tab_mult_reg">
<?php
}

function Form_Table($Table_refresh = false)
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
   if ($Table_refresh) 
   { 
       ob_start();
   }
?>
<?php
   if (!isset($this->nmgp_cmp_hidden['idlancamento_']))
   {
       $this->nmgp_cmp_hidden['idlancamento_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['idcontratos_']))
   {
       $this->nmgp_cmp_hidden['idcontratos_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['mes_ano_']))
   {
       $this->nmgp_cmp_hidden['mes_ano_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['momento_']))
   {
       $this->nmgp_cmp_hidden['momento_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['usuario_']))
   {
       $this->nmgp_cmp_hidden['usuario_'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
$labelRowCount = 0;
?>
   <tr class="sc-ui-header-row" id="sc-id-fixed-headers-row-<?php echo $labelRowCount++ ?>">
<?php
$orderColName = '';
$orderColOrient = '';
?>
    <script type="text/javascript">
     var orderImgAsc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_asc ?>";
     var orderImgDesc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_desc ?>";
     var orderImgNone = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort ?>";
     var orderColName = "";
     function scSetOrderColumn(clickedColumn) {
      $(".sc-ui-img-order-column").attr("src", orderImgNone);
      if (clickedColumn != orderColName) {
       orderColName = clickedColumn;
       orderColOrient = orderImgAsc;
      }
      else if ("" != orderColName) {
       orderColOrient = orderColOrient == orderImgAsc ? orderImgDesc : orderImgAsc;
      }
      else {
       orderColName = "";
       orderColOrient = "";
      }
      $("#sc-id-img-order-" + orderColName).attr("src", orderColOrient);
     }
    </script>
<?php
     $Col_span = "";


       if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") { $Col_span = " colspan=2"; }
    if (!$this->Embutida_form && $this->nmgp_opcao == "novo") { $Col_span = " colspan=2"; }
 ?>

    <TD class="scFormLabelOddMult" style="display: none;" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOddMult"  width="10">  </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOddMult"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if ((!isset($this->nmgp_cmp_hidden['idlancamento_']) || $this->nmgp_cmp_hidden['idlancamento_'] == 'on') && ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir"))) { 
      if (!isset($this->nm_new_label['idlancamento_'])) {
          $this->nm_new_label['idlancamento_'] = "Id Lancamento"; } ?>

    <TD class="scFormLabelOddMult css_idlancamento__label" id="hidden_field_label_idlancamento_" style="<?php echo $sStyleHidden_idlancamento_; ?>" > <?php echo $this->nm_new_label['idlancamento_'] ?> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['mes_ano_']) && $this->nmgp_cmp_hidden['mes_ano_'] == 'off') { $sStyleHidden_mes_ano_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['mes_ano_']) || $this->nmgp_cmp_hidden['mes_ano_'] == 'on') {
      if (!isset($this->nm_new_label['mes_ano_'])) {
          $this->nm_new_label['mes_ano_'] = "Mes Ano"; } ?>

    <TD class="scFormLabelOddMult css_mes_ano__label" id="hidden_field_label_mes_ano_" style="<?php echo $sStyleHidden_mes_ano_; ?>" > <?php echo $this->nm_new_label['mes_ano_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['data_do_servico_']) && $this->nmgp_cmp_hidden['data_do_servico_'] == 'off') { $sStyleHidden_data_do_servico_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['data_do_servico_']) || $this->nmgp_cmp_hidden['data_do_servico_'] == 'on') {
      if (!isset($this->nm_new_label['data_do_servico_'])) {
          $this->nm_new_label['data_do_servico_'] = "Data"; } ?>

    <TD class="scFormLabelOddMult css_data_do_servico__label" id="hidden_field_label_data_do_servico_" style="<?php echo $sStyleHidden_data_do_servico_; ?>" > <?php echo $this->nm_new_label['data_do_servico_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['idpessoas_profissinais_']) && $this->nmgp_cmp_hidden['idpessoas_profissinais_'] == 'off') { $sStyleHidden_idpessoas_profissinais_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['idpessoas_profissinais_']) || $this->nmgp_cmp_hidden['idpessoas_profissinais_'] == 'on') {
      if (!isset($this->nm_new_label['idpessoas_profissinais_'])) {
          $this->nm_new_label['idpessoas_profissinais_'] = "Profissional"; } ?>

    <TD class="scFormLabelOddMult css_idpessoas_profissinais__label" id="hidden_field_label_idpessoas_profissinais_" style="<?php echo $sStyleHidden_idpessoas_profissinais_; ?>" > <?php echo $this->nm_new_label['idpessoas_profissinais_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['numero_da_guia_']) && $this->nmgp_cmp_hidden['numero_da_guia_'] == 'off') { $sStyleHidden_numero_da_guia_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['numero_da_guia_']) || $this->nmgp_cmp_hidden['numero_da_guia_'] == 'on') {
      if (!isset($this->nm_new_label['numero_da_guia_'])) {
          $this->nm_new_label['numero_da_guia_'] = "Nº da Guia"; } ?>

    <TD class="scFormLabelOddMult css_numero_da_guia__label" id="hidden_field_label_numero_da_guia_" style="<?php echo $sStyleHidden_numero_da_guia_; ?>" > <?php echo $this->nm_new_label['numero_da_guia_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['idservico_']) && $this->nmgp_cmp_hidden['idservico_'] == 'off') { $sStyleHidden_idservico_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['idservico_']) || $this->nmgp_cmp_hidden['idservico_'] == 'on') {
      if (!isset($this->nm_new_label['idservico_'])) {
          $this->nm_new_label['idservico_'] = "Serviço"; } ?>

    <TD class="scFormLabelOddMult css_idservico__label" id="hidden_field_label_idservico_" style="<?php echo $sStyleHidden_idservico_; ?>" > <?php echo $this->nm_new_label['idservico_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['vlr_servico_']) && $this->nmgp_cmp_hidden['vlr_servico_'] == 'off') { $sStyleHidden_vlr_servico_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['vlr_servico_']) || $this->nmgp_cmp_hidden['vlr_servico_'] == 'on') {
      if (!isset($this->nm_new_label['vlr_servico_'])) {
          $this->nm_new_label['vlr_servico_'] = "Valor Unitário"; } ?>

    <TD class="scFormLabelOddMult css_vlr_servico__label" id="hidden_field_label_vlr_servico_" style="<?php echo $sStyleHidden_vlr_servico_; ?>" > <?php echo $this->nm_new_label['vlr_servico_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['quantidade_']) && $this->nmgp_cmp_hidden['quantidade_'] == 'off') { $sStyleHidden_quantidade_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['quantidade_']) || $this->nmgp_cmp_hidden['quantidade_'] == 'on') {
      if (!isset($this->nm_new_label['quantidade_'])) {
          $this->nm_new_label['quantidade_'] = "Qtd"; } ?>

    <TD class="scFormLabelOddMult css_quantidade__label" id="hidden_field_label_quantidade_" style="<?php echo $sStyleHidden_quantidade_; ?>" > <?php echo $this->nm_new_label['quantidade_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['momento_']) && $this->nmgp_cmp_hidden['momento_'] == 'off') { $sStyleHidden_momento_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['momento_']) || $this->nmgp_cmp_hidden['momento_'] == 'on') {
      if (!isset($this->nm_new_label['momento_'])) {
          $this->nm_new_label['momento_'] = "Momento"; } ?>

    <TD class="scFormLabelOddMult css_momento__label" id="hidden_field_label_momento_" style="<?php echo $sStyleHidden_momento_; ?>" > <?php echo $this->nm_new_label['momento_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['usuario_']) && $this->nmgp_cmp_hidden['usuario_'] == 'off') { $sStyleHidden_usuario_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['usuario_']) || $this->nmgp_cmp_hidden['usuario_'] == 'on') {
      if (!isset($this->nm_new_label['usuario_'])) {
          $this->nm_new_label['usuario_'] = "Usuario"; } ?>

    <TD class="scFormLabelOddMult css_usuario__label" id="hidden_field_label_usuario_" style="<?php echo $sStyleHidden_usuario_; ?>" > <?php echo $this->nm_new_label['usuario_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['idcontratos_']) && $this->nmgp_cmp_hidden['idcontratos_'] == 'off') { $sStyleHidden_idcontratos_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['idcontratos_']) || $this->nmgp_cmp_hidden['idcontratos_'] == 'on') {
      if (!isset($this->nm_new_label['idcontratos_'])) {
          $this->nm_new_label['idcontratos_'] = "Id Contratos"; } ?>

    <TD class="scFormLabelOddMult css_idcontratos__label" id="hidden_field_label_idcontratos_" style="<?php echo $sStyleHidden_idcontratos_; ?>" > <?php echo $this->nm_new_label['idcontratos_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['total_servico_']) && $this->nmgp_cmp_hidden['total_servico_'] == 'off') { $sStyleHidden_total_servico_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['total_servico_']) || $this->nmgp_cmp_hidden['total_servico_'] == 'on') {
      if (!isset($this->nm_new_label['total_servico_'])) {
          $this->nm_new_label['total_servico_'] = "Total"; } ?>

    <TD class="scFormLabelOddMult css_total_servico__label" id="hidden_field_label_total_servico_" style="<?php echo $sStyleHidden_total_servico_; ?>" > <?php echo $this->nm_new_label['total_servico_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['idespecialidade_servicos_']) && $this->nmgp_cmp_hidden['idespecialidade_servicos_'] == 'off') { $sStyleHidden_idespecialidade_servicos_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['idespecialidade_servicos_']) || $this->nmgp_cmp_hidden['idespecialidade_servicos_'] == 'on') {
      if (!isset($this->nm_new_label['idespecialidade_servicos_'])) {
          $this->nm_new_label['idespecialidade_servicos_'] = "Especialidade"; } ?>

    <TD class="scFormLabelOddMult css_idespecialidade_servicos__label" id="hidden_field_label_idespecialidade_servicos_" style="<?php echo $sStyleHidden_idespecialidade_servicos_; ?>" > <?php echo $this->nm_new_label['idespecialidade_servicos_'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>





    <script type="text/javascript">
     var orderColOrient = "<?php echo $orderColOrient ?>";
     scSetOrderColumn("<?php echo $orderColName ?>");
    </script>
   </tr>
<?php   
} 
function Form_Corpo($Line_Add = false, $Table_refresh = false) 
{ 
   global $sc_seq_vert; 
   $sc_hidden_no = 1; $sc_hidden_yes = 0;
   if ($Line_Add) 
   { 
       ob_start();
       $iStart = sizeof($this->form_vert_form_dbo_lancamento_guias);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_dbo_lancamento_guias = $this->form_vert_form_dbo_lancamento_guias;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_dbo_lancamento_guias))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idlancamento_']))
           {
               $this->nmgp_cmp_readonly['idlancamento_'] = 'on';
           }
   foreach ($this->form_vert_form_dbo_lancamento_guias as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['idlancamento_'] = true;
           $this->nmgp_cmp_readonly['mes_ano_'] = true;
           $this->nmgp_cmp_readonly['data_do_servico_'] = true;
           $this->nmgp_cmp_readonly['idpessoas_profissinais_'] = true;
           $this->nmgp_cmp_readonly['numero_da_guia_'] = true;
           $this->nmgp_cmp_readonly['idservico_'] = true;
           $this->nmgp_cmp_readonly['vlr_servico_'] = true;
           $this->nmgp_cmp_readonly['quantidade_'] = true;
           $this->nmgp_cmp_readonly['momento_'] = true;
           $this->nmgp_cmp_readonly['usuario_'] = true;
           $this->nmgp_cmp_readonly['idcontratos_'] = true;
           $this->nmgp_cmp_readonly['total_servico_'] = true;
           $this->nmgp_cmp_readonly['idespecialidade_servicos_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['idlancamento_']) || $this->nmgp_cmp_readonly['idlancamento_'] != "on") {$this->nmgp_cmp_readonly['idlancamento_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['mes_ano_']) || $this->nmgp_cmp_readonly['mes_ano_'] != "on") {$this->nmgp_cmp_readonly['mes_ano_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['data_do_servico_']) || $this->nmgp_cmp_readonly['data_do_servico_'] != "on") {$this->nmgp_cmp_readonly['data_do_servico_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['idpessoas_profissinais_']) || $this->nmgp_cmp_readonly['idpessoas_profissinais_'] != "on") {$this->nmgp_cmp_readonly['idpessoas_profissinais_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['numero_da_guia_']) || $this->nmgp_cmp_readonly['numero_da_guia_'] != "on") {$this->nmgp_cmp_readonly['numero_da_guia_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['idservico_']) || $this->nmgp_cmp_readonly['idservico_'] != "on") {$this->nmgp_cmp_readonly['idservico_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['vlr_servico_']) || $this->nmgp_cmp_readonly['vlr_servico_'] != "on") {$this->nmgp_cmp_readonly['vlr_servico_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['quantidade_']) || $this->nmgp_cmp_readonly['quantidade_'] != "on") {$this->nmgp_cmp_readonly['quantidade_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['momento_']) || $this->nmgp_cmp_readonly['momento_'] != "on") {$this->nmgp_cmp_readonly['momento_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['usuario_']) || $this->nmgp_cmp_readonly['usuario_'] != "on") {$this->nmgp_cmp_readonly['usuario_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['idcontratos_']) || $this->nmgp_cmp_readonly['idcontratos_'] != "on") {$this->nmgp_cmp_readonly['idcontratos_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['total_servico_']) || $this->nmgp_cmp_readonly['total_servico_'] != "on") {$this->nmgp_cmp_readonly['total_servico_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['idespecialidade_servicos_']) || $this->nmgp_cmp_readonly['idespecialidade_servicos_'] != "on") {$this->nmgp_cmp_readonly['idespecialidade_servicos_'] = false;}
       }
            if (isset($this->form_vert_form_preenchimento[$sc_seq_vert])) {
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
            }
        $this->idlancamento_ = $this->form_vert_form_dbo_lancamento_guias[$sc_seq_vert]['idlancamento_']; 
       $idlancamento_ = $this->idlancamento_; 
       if (!isset($this->nmgp_cmp_hidden['idlancamento_']))
       {
           $this->nmgp_cmp_hidden['idlancamento_'] = 'off';
       }
       $sStyleHidden_idlancamento_ = '';
       if (isset($sCheckRead_idlancamento_))
       {
           unset($sCheckRead_idlancamento_);
       }
       if (isset($this->nmgp_cmp_readonly['idlancamento_']))
       {
           $sCheckRead_idlancamento_ = $this->nmgp_cmp_readonly['idlancamento_'];
       }
       if (isset($this->nmgp_cmp_hidden['idlancamento_']) && $this->nmgp_cmp_hidden['idlancamento_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['idlancamento_']);
           $sStyleHidden_idlancamento_ = 'display: none;';
       }
       $bTestReadOnly_idlancamento_ = true;
       $sStyleReadLab_idlancamento_ = 'display: none;';
       $sStyleReadInp_idlancamento_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idlancamento_"]) &&  $this->nmgp_cmp_readonly["idlancamento_"] == "on"))
       {
           $bTestReadOnly_idlancamento_ = false;
           unset($this->nmgp_cmp_readonly['idlancamento_']);
           $sStyleReadLab_idlancamento_ = '';
           $sStyleReadInp_idlancamento_ = 'display: none;';
       }
       $this->mes_ano_ = $this->form_vert_form_dbo_lancamento_guias[$sc_seq_vert]['mes_ano_']; 
       $mes_ano_ = $this->mes_ano_; 
       if (!isset($this->nmgp_cmp_hidden['mes_ano_']))
       {
           $this->nmgp_cmp_hidden['mes_ano_'] = 'off';
       }
       $sStyleHidden_mes_ano_ = '';
       if (isset($sCheckRead_mes_ano_))
       {
           unset($sCheckRead_mes_ano_);
       }
       if (isset($this->nmgp_cmp_readonly['mes_ano_']))
       {
           $sCheckRead_mes_ano_ = $this->nmgp_cmp_readonly['mes_ano_'];
       }
       if (isset($this->nmgp_cmp_hidden['mes_ano_']) && $this->nmgp_cmp_hidden['mes_ano_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['mes_ano_']);
           $sStyleHidden_mes_ano_ = 'display: none;';
       }
       $bTestReadOnly_mes_ano_ = true;
       $sStyleReadLab_mes_ano_ = 'display: none;';
       $sStyleReadInp_mes_ano_ = '';
       if (isset($this->nmgp_cmp_readonly['mes_ano_']) && $this->nmgp_cmp_readonly['mes_ano_'] == 'on')
       {
           $bTestReadOnly_mes_ano_ = false;
           unset($this->nmgp_cmp_readonly['mes_ano_']);
           $sStyleReadLab_mes_ano_ = '';
           $sStyleReadInp_mes_ano_ = 'display: none;';
       }
       $this->data_do_servico_ = $this->form_vert_form_dbo_lancamento_guias[$sc_seq_vert]['data_do_servico_']; 
       $data_do_servico_ = $this->data_do_servico_; 
       $sStyleHidden_data_do_servico_ = '';
       if (isset($sCheckRead_data_do_servico_))
       {
           unset($sCheckRead_data_do_servico_);
       }
       if (isset($this->nmgp_cmp_readonly['data_do_servico_']))
       {
           $sCheckRead_data_do_servico_ = $this->nmgp_cmp_readonly['data_do_servico_'];
       }
       if (isset($this->nmgp_cmp_hidden['data_do_servico_']) && $this->nmgp_cmp_hidden['data_do_servico_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['data_do_servico_']);
           $sStyleHidden_data_do_servico_ = 'display: none;';
       }
       $bTestReadOnly_data_do_servico_ = true;
       $sStyleReadLab_data_do_servico_ = 'display: none;';
       $sStyleReadInp_data_do_servico_ = '';
       if (isset($this->nmgp_cmp_readonly['data_do_servico_']) && $this->nmgp_cmp_readonly['data_do_servico_'] == 'on')
       {
           $bTestReadOnly_data_do_servico_ = false;
           unset($this->nmgp_cmp_readonly['data_do_servico_']);
           $sStyleReadLab_data_do_servico_ = '';
           $sStyleReadInp_data_do_servico_ = 'display: none;';
       }
       $this->idpessoas_profissinais_ = $this->form_vert_form_dbo_lancamento_guias[$sc_seq_vert]['idpessoas_profissinais_']; 
       $idpessoas_profissinais_ = $this->idpessoas_profissinais_; 
       $sStyleHidden_idpessoas_profissinais_ = '';
       if (isset($sCheckRead_idpessoas_profissinais_))
       {
           unset($sCheckRead_idpessoas_profissinais_);
       }
       if (isset($this->nmgp_cmp_readonly['idpessoas_profissinais_']))
       {
           $sCheckRead_idpessoas_profissinais_ = $this->nmgp_cmp_readonly['idpessoas_profissinais_'];
       }
       if (isset($this->nmgp_cmp_hidden['idpessoas_profissinais_']) && $this->nmgp_cmp_hidden['idpessoas_profissinais_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['idpessoas_profissinais_']);
           $sStyleHidden_idpessoas_profissinais_ = 'display: none;';
       }
       $bTestReadOnly_idpessoas_profissinais_ = true;
       $sStyleReadLab_idpessoas_profissinais_ = 'display: none;';
       $sStyleReadInp_idpessoas_profissinais_ = '';
       if (isset($this->nmgp_cmp_readonly['idpessoas_profissinais_']) && $this->nmgp_cmp_readonly['idpessoas_profissinais_'] == 'on')
       {
           $bTestReadOnly_idpessoas_profissinais_ = false;
           unset($this->nmgp_cmp_readonly['idpessoas_profissinais_']);
           $sStyleReadLab_idpessoas_profissinais_ = '';
           $sStyleReadInp_idpessoas_profissinais_ = 'display: none;';
       }
       $this->numero_da_guia_ = $this->form_vert_form_dbo_lancamento_guias[$sc_seq_vert]['numero_da_guia_']; 
       $numero_da_guia_ = $this->numero_da_guia_; 
       $sStyleHidden_numero_da_guia_ = '';
       if (isset($sCheckRead_numero_da_guia_))
       {
           unset($sCheckRead_numero_da_guia_);
       }
       if (isset($this->nmgp_cmp_readonly['numero_da_guia_']))
       {
           $sCheckRead_numero_da_guia_ = $this->nmgp_cmp_readonly['numero_da_guia_'];
       }
       if (isset($this->nmgp_cmp_hidden['numero_da_guia_']) && $this->nmgp_cmp_hidden['numero_da_guia_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['numero_da_guia_']);
           $sStyleHidden_numero_da_guia_ = 'display: none;';
       }
       $bTestReadOnly_numero_da_guia_ = true;
       $sStyleReadLab_numero_da_guia_ = 'display: none;';
       $sStyleReadInp_numero_da_guia_ = '';
       if (isset($this->nmgp_cmp_readonly['numero_da_guia_']) && $this->nmgp_cmp_readonly['numero_da_guia_'] == 'on')
       {
           $bTestReadOnly_numero_da_guia_ = false;
           unset($this->nmgp_cmp_readonly['numero_da_guia_']);
           $sStyleReadLab_numero_da_guia_ = '';
           $sStyleReadInp_numero_da_guia_ = 'display: none;';
       }
       $this->idservico_ = $this->form_vert_form_dbo_lancamento_guias[$sc_seq_vert]['idservico_']; 
       $idservico_ = $this->idservico_; 
       $sStyleHidden_idservico_ = '';
       if (isset($sCheckRead_idservico_))
       {
           unset($sCheckRead_idservico_);
       }
       if (isset($this->nmgp_cmp_readonly['idservico_']))
       {
           $sCheckRead_idservico_ = $this->nmgp_cmp_readonly['idservico_'];
       }
       if (isset($this->nmgp_cmp_hidden['idservico_']) && $this->nmgp_cmp_hidden['idservico_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['idservico_']);
           $sStyleHidden_idservico_ = 'display: none;';
       }
       $bTestReadOnly_idservico_ = true;
       $sStyleReadLab_idservico_ = 'display: none;';
       $sStyleReadInp_idservico_ = '';
       if (isset($this->nmgp_cmp_readonly['idservico_']) && $this->nmgp_cmp_readonly['idservico_'] == 'on')
       {
           $bTestReadOnly_idservico_ = false;
           unset($this->nmgp_cmp_readonly['idservico_']);
           $sStyleReadLab_idservico_ = '';
           $sStyleReadInp_idservico_ = 'display: none;';
       }
       $this->vlr_servico_ = $this->form_vert_form_dbo_lancamento_guias[$sc_seq_vert]['vlr_servico_']; 
       $vlr_servico_ = $this->vlr_servico_; 
       $sStyleHidden_vlr_servico_ = '';
       if (isset($sCheckRead_vlr_servico_))
       {
           unset($sCheckRead_vlr_servico_);
       }
       if (isset($this->nmgp_cmp_readonly['vlr_servico_']))
       {
           $sCheckRead_vlr_servico_ = $this->nmgp_cmp_readonly['vlr_servico_'];
       }
       if (isset($this->nmgp_cmp_hidden['vlr_servico_']) && $this->nmgp_cmp_hidden['vlr_servico_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['vlr_servico_']);
           $sStyleHidden_vlr_servico_ = 'display: none;';
       }
       $bTestReadOnly_vlr_servico_ = true;
       $sStyleReadLab_vlr_servico_ = 'display: none;';
       $sStyleReadInp_vlr_servico_ = '';
       if (isset($this->nmgp_cmp_readonly['vlr_servico_']) && $this->nmgp_cmp_readonly['vlr_servico_'] == 'on')
       {
           $bTestReadOnly_vlr_servico_ = false;
           unset($this->nmgp_cmp_readonly['vlr_servico_']);
           $sStyleReadLab_vlr_servico_ = '';
           $sStyleReadInp_vlr_servico_ = 'display: none;';
       }
       $this->quantidade_ = $this->form_vert_form_dbo_lancamento_guias[$sc_seq_vert]['quantidade_']; 
       $quantidade_ = $this->quantidade_; 
       $sStyleHidden_quantidade_ = '';
       if (isset($sCheckRead_quantidade_))
       {
           unset($sCheckRead_quantidade_);
       }
       if (isset($this->nmgp_cmp_readonly['quantidade_']))
       {
           $sCheckRead_quantidade_ = $this->nmgp_cmp_readonly['quantidade_'];
       }
       if (isset($this->nmgp_cmp_hidden['quantidade_']) && $this->nmgp_cmp_hidden['quantidade_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['quantidade_']);
           $sStyleHidden_quantidade_ = 'display: none;';
       }
       $bTestReadOnly_quantidade_ = true;
       $sStyleReadLab_quantidade_ = 'display: none;';
       $sStyleReadInp_quantidade_ = '';
       if (isset($this->nmgp_cmp_readonly['quantidade_']) && $this->nmgp_cmp_readonly['quantidade_'] == 'on')
       {
           $bTestReadOnly_quantidade_ = false;
           unset($this->nmgp_cmp_readonly['quantidade_']);
           $sStyleReadLab_quantidade_ = '';
           $sStyleReadInp_quantidade_ = 'display: none;';
       }
       $this->momento_ = $this->form_vert_form_dbo_lancamento_guias[$sc_seq_vert]['momento_'] . ' ' . $this->form_vert_form_dbo_lancamento_guias[$sc_seq_vert]['momento__hora']; 
       $momento_ = $this->momento_; 
       if (!isset($this->nmgp_cmp_hidden['momento_']))
       {
           $this->nmgp_cmp_hidden['momento_'] = 'off';
       }
       $sStyleHidden_momento_ = '';
       if (isset($sCheckRead_momento_))
       {
           unset($sCheckRead_momento_);
       }
       if (isset($this->nmgp_cmp_readonly['momento_']))
       {
           $sCheckRead_momento_ = $this->nmgp_cmp_readonly['momento_'];
       }
       if (isset($this->nmgp_cmp_hidden['momento_']) && $this->nmgp_cmp_hidden['momento_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['momento_']);
           $sStyleHidden_momento_ = 'display: none;';
       }
       $bTestReadOnly_momento_ = true;
       $sStyleReadLab_momento_ = 'display: none;';
       $sStyleReadInp_momento_ = '';
       if (isset($this->nmgp_cmp_readonly['momento_']) && $this->nmgp_cmp_readonly['momento_'] == 'on')
       {
           $bTestReadOnly_momento_ = false;
           unset($this->nmgp_cmp_readonly['momento_']);
           $sStyleReadLab_momento_ = '';
           $sStyleReadInp_momento_ = 'display: none;';
       }
       $this->usuario_ = $this->form_vert_form_dbo_lancamento_guias[$sc_seq_vert]['usuario_']; 
       $usuario_ = $this->usuario_; 
       if (!isset($this->nmgp_cmp_hidden['usuario_']))
       {
           $this->nmgp_cmp_hidden['usuario_'] = 'off';
       }
       $sStyleHidden_usuario_ = '';
       if (isset($sCheckRead_usuario_))
       {
           unset($sCheckRead_usuario_);
       }
       if (isset($this->nmgp_cmp_readonly['usuario_']))
       {
           $sCheckRead_usuario_ = $this->nmgp_cmp_readonly['usuario_'];
       }
       if (isset($this->nmgp_cmp_hidden['usuario_']) && $this->nmgp_cmp_hidden['usuario_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['usuario_']);
           $sStyleHidden_usuario_ = 'display: none;';
       }
       $bTestReadOnly_usuario_ = true;
       $sStyleReadLab_usuario_ = 'display: none;';
       $sStyleReadInp_usuario_ = '';
       if (isset($this->nmgp_cmp_readonly['usuario_']) && $this->nmgp_cmp_readonly['usuario_'] == 'on')
       {
           $bTestReadOnly_usuario_ = false;
           unset($this->nmgp_cmp_readonly['usuario_']);
           $sStyleReadLab_usuario_ = '';
           $sStyleReadInp_usuario_ = 'display: none;';
       }
       $this->idcontratos_ = $this->form_vert_form_dbo_lancamento_guias[$sc_seq_vert]['idcontratos_']; 
       $idcontratos_ = $this->idcontratos_; 
       if (!isset($this->nmgp_cmp_hidden['idcontratos_']))
       {
           $this->nmgp_cmp_hidden['idcontratos_'] = 'off';
       }
       $sStyleHidden_idcontratos_ = '';
       if (isset($sCheckRead_idcontratos_))
       {
           unset($sCheckRead_idcontratos_);
       }
       if (isset($this->nmgp_cmp_readonly['idcontratos_']))
       {
           $sCheckRead_idcontratos_ = $this->nmgp_cmp_readonly['idcontratos_'];
       }
       if (isset($this->nmgp_cmp_hidden['idcontratos_']) && $this->nmgp_cmp_hidden['idcontratos_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['idcontratos_']);
           $sStyleHidden_idcontratos_ = 'display: none;';
       }
       $bTestReadOnly_idcontratos_ = true;
       $sStyleReadLab_idcontratos_ = 'display: none;';
       $sStyleReadInp_idcontratos_ = '';
       if (isset($this->nmgp_cmp_readonly['idcontratos_']) && $this->nmgp_cmp_readonly['idcontratos_'] == 'on')
       {
           $bTestReadOnly_idcontratos_ = false;
           unset($this->nmgp_cmp_readonly['idcontratos_']);
           $sStyleReadLab_idcontratos_ = '';
           $sStyleReadInp_idcontratos_ = 'display: none;';
       }
       $this->total_servico_ = $this->form_vert_form_dbo_lancamento_guias[$sc_seq_vert]['total_servico_']; 
       $total_servico_ = $this->total_servico_; 
       $sStyleHidden_total_servico_ = '';
       if (isset($sCheckRead_total_servico_))
       {
           unset($sCheckRead_total_servico_);
       }
       if (isset($this->nmgp_cmp_readonly['total_servico_']))
       {
           $sCheckRead_total_servico_ = $this->nmgp_cmp_readonly['total_servico_'];
       }
       if (isset($this->nmgp_cmp_hidden['total_servico_']) && $this->nmgp_cmp_hidden['total_servico_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['total_servico_']);
           $sStyleHidden_total_servico_ = 'display: none;';
       }
       $bTestReadOnly_total_servico_ = true;
       $sStyleReadLab_total_servico_ = 'display: none;';
       $sStyleReadInp_total_servico_ = '';
       if (isset($this->nmgp_cmp_readonly['total_servico_']) && $this->nmgp_cmp_readonly['total_servico_'] == 'on')
       {
           $bTestReadOnly_total_servico_ = false;
           unset($this->nmgp_cmp_readonly['total_servico_']);
           $sStyleReadLab_total_servico_ = '';
           $sStyleReadInp_total_servico_ = 'display: none;';
       }
       $this->idespecialidade_servicos_ = $this->form_vert_form_dbo_lancamento_guias[$sc_seq_vert]['idespecialidade_servicos_']; 
       $idespecialidade_servicos_ = $this->idespecialidade_servicos_; 
       $sStyleHidden_idespecialidade_servicos_ = '';
       if (isset($sCheckRead_idespecialidade_servicos_))
       {
           unset($sCheckRead_idespecialidade_servicos_);
       }
       if (isset($this->nmgp_cmp_readonly['idespecialidade_servicos_']))
       {
           $sCheckRead_idespecialidade_servicos_ = $this->nmgp_cmp_readonly['idespecialidade_servicos_'];
       }
       if (isset($this->nmgp_cmp_hidden['idespecialidade_servicos_']) && $this->nmgp_cmp_hidden['idespecialidade_servicos_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['idespecialidade_servicos_']);
           $sStyleHidden_idespecialidade_servicos_ = 'display: none;';
       }
       $bTestReadOnly_idespecialidade_servicos_ = true;
       $sStyleReadLab_idespecialidade_servicos_ = 'display: none;';
       $sStyleReadInp_idespecialidade_servicos_ = '';
       if (isset($this->nmgp_cmp_readonly['idespecialidade_servicos_']) && $this->nmgp_cmp_readonly['idespecialidade_servicos_'] == 'on')
       {
           $bTestReadOnly_idespecialidade_servicos_ = false;
           unset($this->nmgp_cmp_readonly['idespecialidade_servicos_']);
           $sStyleReadLab_idespecialidade_servicos_ = '';
           $sStyleReadInp_idespecialidade_servicos_ = 'display: none;';
       }

       $nm_cor_fun_vert = (isset($nm_cor_fun_vert) && $nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = (isset($nm_img_fun_cel)  && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>"  style="display: none;"> <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\""; if (in_array($sc_seq_vert, $sc_check_excl)) { echo " checked";} ?> onclick="if (this.checked) {sc_quant_excl++; } else {sc_quant_excl--; }" class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php }?>
   <?php if (!$this->Embutida_form && $this->nmgp_opcao == "novo") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\"" ; if (in_array($sc_seq_vert, $sc_check_incl) || !empty($this->nm_todas_criticas)) { echo " checked ";} ?> class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php }?>
   <?php if ($this->Embutida_form) {?>
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_actions<?php echo $sc_seq_vert; ?>" NOWRAP> <?php if ($this->nmgp_opcao != "novo") {
    if ($this->nmgp_botoes['delete'] == "off") {
        $sDisplayDelete = 'display: none';
    }
    else {
        $sDisplayDelete = '';
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "" . $sDisplayDelete. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php
if ($this->nmgp_opcao != "novo") {
    if ($this->nmgp_botoes['update'] == "off") {
        $sDisplayUpdate = 'display: none';
    }
    else {
        $sDisplayUpdate = '';
    }
    if ($this->Embutida_ronly) {
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "" . $sDisplayUpdate. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
        $sButDisp = 'display: none';
    }
    else
    {
        $sButDisp = $sDisplayUpdate;
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "" . $sButDisp. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
}
?>

<?php if ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_opcao == "novo") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_incluir", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "sc_ins_line_" . $sc_seq_vert . "", "", "", "display: ''", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php if ($this->nmgp_botoes['delete'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($Line_Add && $this->Embutida_ronly) {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($this->nmgp_botoes['update'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php }?>
<?php if ($this->nmgp_botoes['insert'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_dbo_lancamento_guias_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_dbo_lancamento_guias_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_dbo_lancamento_guias_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_dbo_lancamento_guias_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_dbo_lancamento_guias_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_dbo_lancamento_guias_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['idlancamento_']) && $this->nmgp_cmp_hidden['idlancamento_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idlancamento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idlancamento_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOddMult css_idlancamento__line" id="hidden_field_data_idlancamento_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_idlancamento_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_idlancamento__line" style="vertical-align: top;padding: 0px"><span id="id_read_on_idlancamento_<?php echo $sc_seq_vert ?>" class="css_idlancamento__line" style="<?php echo $sStyleReadLab_idlancamento_; ?>"><?php echo $this->form_format_readonly("idlancamento_", $this->form_encode_input($this->idlancamento_)); ?></span><span id="id_read_off_idlancamento_<?php echo $sc_seq_vert ?>" class="css_read_off_idlancamento_" style="<?php echo $sStyleReadInp_idlancamento_; ?>"><input type="hidden" id="id_sc_field_idlancamento_<?php echo $sc_seq_vert ?>" name="idlancamento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idlancamento_) . "\">"?>
<span id="id_ajax_label_idlancamento_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($idlancamento_); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idlancamento_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idlancamento_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['mes_ano_']) && $this->nmgp_cmp_hidden['mes_ano_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="mes_ano_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($mes_ano_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_mes_ano__line" id="hidden_field_data_mes_ano_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_mes_ano_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_mes_ano__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_mes_ano_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["mes_ano_"]) &&  $this->nmgp_cmp_readonly["mes_ano_"] == "on") { 

 ?>
<input type="hidden" name="mes_ano_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($mes_ano_) . "\">" . $mes_ano_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_mes_ano_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-mes_ano_<?php echo $sc_seq_vert ?> css_mes_ano__line" style="<?php echo $sStyleReadLab_mes_ano_; ?>"><?php echo $this->form_format_readonly("mes_ano_", $this->form_encode_input($this->mes_ano_)); ?></span><span id="id_read_off_mes_ano_<?php echo $sc_seq_vert ?>" class="css_read_off_mes_ano_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_mes_ano_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_mes_ano__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_mes_ano_<?php echo $sc_seq_vert ?>" type=text name="mes_ano_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($mes_ano_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_mes_ano_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_mes_ano_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['data_do_servico_']) && $this->nmgp_cmp_hidden['data_do_servico_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="data_do_servico_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($data_do_servico_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_data_do_servico__line" id="hidden_field_data_data_do_servico_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_data_do_servico_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_data_do_servico__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_data_do_servico_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["data_do_servico_"]) &&  $this->nmgp_cmp_readonly["data_do_servico_"] == "on") { 

 ?>
<input type="hidden" name="data_do_servico_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($data_do_servico_) . "\">" . $data_do_servico_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_data_do_servico_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-data_do_servico_<?php echo $sc_seq_vert ?> css_data_do_servico__line" style="<?php echo $sStyleReadLab_data_do_servico_; ?>"><?php echo $this->form_format_readonly("data_do_servico_", $this->form_encode_input($data_do_servico_)); ?></span><span id="id_read_off_data_do_servico_<?php echo $sc_seq_vert ?>" class="css_read_off_data_do_servico_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_data_do_servico_; ?>"><?php
$tmp_form_data = $this->field_config['data_do_servico_']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOddMult css_data_do_servico__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_data_do_servico_<?php echo $sc_seq_vert ?>" type=text name="data_do_servico_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($data_do_servico_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['data_do_servico_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['data_do_servico_']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_data_do_servico_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_data_do_servico_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['idpessoas_profissinais_']) && $this->nmgp_cmp_hidden['idpessoas_profissinais_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idpessoas_profissinais_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->idpessoas_profissinais_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_idpessoas_profissinais__line" id="hidden_field_data_idpessoas_profissinais_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_idpessoas_profissinais_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_idpessoas_profissinais__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_idpessoas_profissinais_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idpessoas_profissinais_"]) &&  $this->nmgp_cmp_readonly["idpessoas_profissinais_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idpessoas_profissinais_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idpessoas_profissinais_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idpessoas_profissinais_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idpessoas_profissinais_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idpessoas_profissinais_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idpessoas_profissinais_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idpessoas_profissinais_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idpessoas_profissinais_'] = array(); 
    }

   $old_value_idlancamento_ = $this->idlancamento_;
   $old_value_data_do_servico_ = $this->data_do_servico_;
   $old_value_numero_da_guia_ = $this->numero_da_guia_;
   $old_value_vlr_servico_ = $this->vlr_servico_;
   $old_value_quantidade_ = $this->quantidade_;
   $old_value_momento_ = $this->momento_;
   $old_value_momento__hora = $this->momento__hora;
   $old_value_idcontratos_ = $this->idcontratos_;
   $old_value_total_servico_ = $this->total_servico_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idlancamento_ = $this->idlancamento_;
   $unformatted_value_data_do_servico_ = $this->data_do_servico_;
   $unformatted_value_numero_da_guia_ = $this->numero_da_guia_;
   $unformatted_value_vlr_servico_ = $this->vlr_servico_;
   $unformatted_value_quantidade_ = $this->quantidade_;
   $unformatted_value_momento_ = $this->momento_;
   $unformatted_value_momento__hora = $this->momento__hora;
   $unformatted_value_idcontratos_ = $this->idcontratos_;
   $unformatted_value_total_servico_ = $this->total_servico_;

   $nm_comando = "SELECT pessoa_juridica_fisica.idPessoas, pessoa_juridica_fisica.nome_razao_social FROM     contratos_funcionarios INNER JOIN                   pessoa_juridica_fisica_socios ON contratos_funcionarios.idSocios = pessoa_juridica_fisica_socios.idSocios INNER JOIN                   pessoa_juridica_fisica ON pessoa_juridica_fisica_socios.idPessoas_socios = pessoa_juridica_fisica.idPessoas WHERE  (contratos_funcionarios.idContratos = " . $_SESSION['usr_idContratos'] . ")";

   $this->idlancamento_ = $old_value_idlancamento_;
   $this->data_do_servico_ = $old_value_data_do_servico_;
   $this->numero_da_guia_ = $old_value_numero_da_guia_;
   $this->vlr_servico_ = $old_value_vlr_servico_;
   $this->quantidade_ = $old_value_quantidade_;
   $this->momento_ = $old_value_momento_;
   $this->momento__hora = $old_value_momento__hora;
   $this->idcontratos_ = $old_value_idcontratos_;
   $this->total_servico_ = $old_value_total_servico_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idpessoas_profissinais_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $idpessoas_profissinais__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idpessoas_profissinais__1))
          {
              foreach ($this->idpessoas_profissinais__1 as $tmp_idpessoas_profissinais_)
              {
                  if (trim($tmp_idpessoas_profissinais_) === trim($cadaselect[1])) { $idpessoas_profissinais__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idpessoas_profissinais_) === trim($cadaselect[1])) { $idpessoas_profissinais__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idpessoas_profissinais_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idpessoas_profissinais_) . "\">" . $idpessoas_profissinais__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idpessoas_profissinais_();
   $x = 0 ; 
   $idpessoas_profissinais__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idpessoas_profissinais__1))
          {
              foreach ($this->idpessoas_profissinais__1 as $tmp_idpessoas_profissinais_)
              {
                  if (trim($tmp_idpessoas_profissinais_) === trim($cadaselect[1])) { $idpessoas_profissinais__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idpessoas_profissinais_) === trim($cadaselect[1])) { $idpessoas_profissinais__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idpessoas_profissinais__look))
          {
              $idpessoas_profissinais__look = $this->idpessoas_profissinais_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idpessoas_profissinais_" . $sc_seq_vert . "\" class=\"css_idpessoas_profissinais__line\" style=\"" .  $sStyleReadLab_idpessoas_profissinais_ . "\">" . $this->form_format_readonly("idpessoas_profissinais_", $this->form_encode_input($idpessoas_profissinais__look)) . "</span><span id=\"id_read_off_idpessoas_profissinais_" . $sc_seq_vert . "\" class=\"css_read_off_idpessoas_profissinais_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_idpessoas_profissinais_ . "\">";
   echo " <span id=\"idAjaxSelect_idpessoas_profissinais_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_idpessoas_profissinais__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idpessoas_profissinais_" . $sc_seq_vert . "\" name=\"idpessoas_profissinais_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idpessoas_profissinais_'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Selecione") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idpessoas_profissinais_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idpessoas_profissinais_)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idpessoas_profissinais_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idpessoas_profissinais_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['numero_da_guia_']) && $this->nmgp_cmp_hidden['numero_da_guia_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numero_da_guia_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($numero_da_guia_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_numero_da_guia__line" id="hidden_field_data_numero_da_guia_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_numero_da_guia_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_numero_da_guia__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_numero_da_guia_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numero_da_guia_"]) &&  $this->nmgp_cmp_readonly["numero_da_guia_"] == "on") { 

 ?>
<input type="hidden" name="numero_da_guia_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($numero_da_guia_) . "\">" . $numero_da_guia_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_numero_da_guia_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-numero_da_guia_<?php echo $sc_seq_vert ?> css_numero_da_guia__line" style="<?php echo $sStyleReadLab_numero_da_guia_; ?>"><?php echo $this->form_format_readonly("numero_da_guia_", $this->form_encode_input($this->numero_da_guia_)); ?></span><span id="id_read_off_numero_da_guia_<?php echo $sc_seq_vert ?>" class="css_read_off_numero_da_guia_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numero_da_guia_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_numero_da_guia__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numero_da_guia_<?php echo $sc_seq_vert ?>" type=text name="numero_da_guia_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($numero_da_guia_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=5"; } ?> alt="{datatype: 'integer', maxLength: 5, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['numero_da_guia_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['numero_da_guia_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['numero_da_guia_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numero_da_guia_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numero_da_guia_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['idservico_']) && $this->nmgp_cmp_hidden['idservico_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idservico_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->idservico_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_idservico__line" id="hidden_field_data_idservico_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_idservico_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_idservico__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_idservico_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idservico_"]) &&  $this->nmgp_cmp_readonly["idservico_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idservico_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idservico_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idservico_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idservico_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idservico_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idservico_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idservico_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idservico_'] = array(); 
    }

   $old_value_idlancamento_ = $this->idlancamento_;
   $old_value_data_do_servico_ = $this->data_do_servico_;
   $old_value_numero_da_guia_ = $this->numero_da_guia_;
   $old_value_vlr_servico_ = $this->vlr_servico_;
   $old_value_quantidade_ = $this->quantidade_;
   $old_value_momento_ = $this->momento_;
   $old_value_momento__hora = $this->momento__hora;
   $old_value_idcontratos_ = $this->idcontratos_;
   $old_value_total_servico_ = $this->total_servico_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idlancamento_ = $this->idlancamento_;
   $unformatted_value_data_do_servico_ = $this->data_do_servico_;
   $unformatted_value_numero_da_guia_ = $this->numero_da_guia_;
   $unformatted_value_vlr_servico_ = $this->vlr_servico_;
   $unformatted_value_quantidade_ = $this->quantidade_;
   $unformatted_value_momento_ = $this->momento_;
   $unformatted_value_momento__hora = $this->momento__hora;
   $unformatted_value_idcontratos_ = $this->idcontratos_;
   $unformatted_value_total_servico_ = $this->total_servico_;

   $nm_comando = "SELECT   	servicos.idServico,  	servicos.descricao_servico  FROM 	contratos_servicos  INNER JOIN  servicos on 	servicos.idServico = contratos_servicos.idServico WHERE   contratos_servicos.idContratos = " . $_SESSION['usr_idContratos'] . "";

   $this->idlancamento_ = $old_value_idlancamento_;
   $this->data_do_servico_ = $old_value_data_do_servico_;
   $this->numero_da_guia_ = $old_value_numero_da_guia_;
   $this->vlr_servico_ = $old_value_vlr_servico_;
   $this->quantidade_ = $old_value_quantidade_;
   $this->momento_ = $old_value_momento_;
   $this->momento__hora = $old_value_momento__hora;
   $this->idcontratos_ = $old_value_idcontratos_;
   $this->total_servico_ = $old_value_total_servico_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idservico_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $idservico__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idservico__1))
          {
              foreach ($this->idservico__1 as $tmp_idservico_)
              {
                  if (trim($tmp_idservico_) === trim($cadaselect[1])) { $idservico__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idservico_) === trim($cadaselect[1])) { $idservico__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idservico_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idservico_) . "\">" . $idservico__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idservico_();
   $x = 0 ; 
   $idservico__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idservico__1))
          {
              foreach ($this->idservico__1 as $tmp_idservico_)
              {
                  if (trim($tmp_idservico_) === trim($cadaselect[1])) { $idservico__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idservico_) === trim($cadaselect[1])) { $idservico__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idservico__look))
          {
              $idservico__look = $this->idservico_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idservico_" . $sc_seq_vert . "\" class=\"css_idservico__line\" style=\"" .  $sStyleReadLab_idservico_ . "\">" . $this->form_format_readonly("idservico_", $this->form_encode_input($idservico__look)) . "</span><span id=\"id_read_off_idservico_" . $sc_seq_vert . "\" class=\"css_read_off_idservico_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_idservico_ . "\">";
   echo " <span id=\"idAjaxSelect_idservico_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_idservico__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idservico_" . $sc_seq_vert . "\" name=\"idservico_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idservico_'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Selecione") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idservico_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idservico_)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idservico_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idservico_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['vlr_servico_']) && $this->nmgp_cmp_hidden['vlr_servico_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vlr_servico_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($vlr_servico_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_vlr_servico__line" id="hidden_field_data_vlr_servico_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_vlr_servico_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_vlr_servico__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_vlr_servico_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["vlr_servico_"]) &&  $this->nmgp_cmp_readonly["vlr_servico_"] == "on") { 

 ?>
<input type="hidden" name="vlr_servico_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($vlr_servico_) . "\">" . $vlr_servico_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_vlr_servico_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-vlr_servico_<?php echo $sc_seq_vert ?> css_vlr_servico__line" style="<?php echo $sStyleReadLab_vlr_servico_; ?>"><?php echo $this->form_format_readonly("vlr_servico_", $this->form_encode_input($this->vlr_servico_)); ?></span><span id="id_read_off_vlr_servico_<?php echo $sc_seq_vert ?>" class="css_read_off_vlr_servico_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_vlr_servico_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_vlr_servico__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_vlr_servico_<?php echo $sc_seq_vert ?>" type=text name="vlr_servico_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($vlr_servico_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['vlr_servico_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['vlr_servico_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['vlr_servico_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['vlr_servico_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vlr_servico_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vlr_servico_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['quantidade_']) && $this->nmgp_cmp_hidden['quantidade_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="quantidade_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($quantidade_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_quantidade__line" id="hidden_field_data_quantidade_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_quantidade_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_quantidade__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_quantidade_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["quantidade_"]) &&  $this->nmgp_cmp_readonly["quantidade_"] == "on") { 

 ?>
<input type="hidden" name="quantidade_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($quantidade_) . "\">" . $quantidade_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_quantidade_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-quantidade_<?php echo $sc_seq_vert ?> css_quantidade__line" style="<?php echo $sStyleReadLab_quantidade_; ?>"><?php echo $this->form_format_readonly("quantidade_", $this->form_encode_input($this->quantidade_)); ?></span><span id="id_read_off_quantidade_<?php echo $sc_seq_vert ?>" class="css_read_off_quantidade_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_quantidade_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_quantidade__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_quantidade_<?php echo $sc_seq_vert ?>" type=text name="quantidade_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($quantidade_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'decimal', maxLength: 18, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['quantidade_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['quantidade_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['quantidade_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['quantidade_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_quantidade_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_quantidade_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['momento_']) && $this->nmgp_cmp_hidden['momento_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="momento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($momento_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_momento__line" id="hidden_field_data_momento_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_momento_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_momento__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_momento_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["momento_"]) &&  $this->nmgp_cmp_readonly["momento_"] == "on") { 

 ?>
<input type="hidden" name="momento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($momento_) . "\">" . $momento_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_momento_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-momento_<?php echo $sc_seq_vert ?> css_momento__line" style="<?php echo $sStyleReadLab_momento_; ?>"><?php echo $this->form_format_readonly("momento_", $this->form_encode_input($momento_)); ?></span><span id="id_read_off_momento_<?php echo $sc_seq_vert ?>" class="css_read_off_momento_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_momento_; ?>"><?php
$tmp_form_data = $this->field_config['momento_']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOddMult css_momento__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_momento_<?php echo $sc_seq_vert ?>" type=text name="momento_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($momento_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['momento_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['momento_']['date_format']; ?>', timeSep: '<?php echo $this->field_config['momento_']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_momento_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_momento_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->momento_ = $old_dt_momento_;
?>

   <?php if (isset($this->nmgp_cmp_hidden['usuario_']) && $this->nmgp_cmp_hidden['usuario_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="usuario_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($usuario_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_usuario__line" id="hidden_field_data_usuario_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_usuario_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_usuario__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_usuario_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["usuario_"]) &&  $this->nmgp_cmp_readonly["usuario_"] == "on") { 

 ?>
<input type="hidden" name="usuario_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($usuario_) . "\">" . $usuario_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_usuario_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-usuario_<?php echo $sc_seq_vert ?> css_usuario__line" style="<?php echo $sStyleReadLab_usuario_; ?>"><?php echo $this->form_format_readonly("usuario_", $this->form_encode_input($this->usuario_)); ?></span><span id="id_read_off_usuario_<?php echo $sc_seq_vert ?>" class="css_read_off_usuario_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_usuario_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_usuario__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_usuario_<?php echo $sc_seq_vert ?>" type=text name="usuario_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($usuario_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_usuario_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_usuario_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['idcontratos_']) && $this->nmgp_cmp_hidden['idcontratos_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idcontratos_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idcontratos_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_idcontratos__line" id="hidden_field_data_idcontratos_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_idcontratos_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_idcontratos__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_idcontratos_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idcontratos_"]) &&  $this->nmgp_cmp_readonly["idcontratos_"] == "on") { 

 ?>
<input type="hidden" name="idcontratos_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idcontratos_) . "\">" . $idcontratos_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_idcontratos_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-idcontratos_<?php echo $sc_seq_vert ?> css_idcontratos__line" style="<?php echo $sStyleReadLab_idcontratos_; ?>"><?php echo $this->form_format_readonly("idcontratos_", $this->form_encode_input($this->idcontratos_)); ?></span><span id="id_read_off_idcontratos_<?php echo $sc_seq_vert ?>" class="css_read_off_idcontratos_<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_idcontratos_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_idcontratos__obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_idcontratos_<?php echo $sc_seq_vert ?>" type=text name="idcontratos_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idcontratos_) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=19"; } ?> alt="{datatype: 'integer', maxLength: 19, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['idcontratos_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['idcontratos_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['idcontratos_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idcontratos_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idcontratos_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['total_servico_']) && $this->nmgp_cmp_hidden['total_servico_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="total_servico_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($total_servico_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_total_servico__line" id="hidden_field_data_total_servico_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_total_servico_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_total_servico__line" style="vertical-align: top;padding: 0px"><input type="hidden" name="total_servico_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($total_servico_); ?>"><span id="id_ajax_label_total_servico_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($total_servico_); ?></span>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_total_servico_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_total_servico_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['idespecialidade_servicos_']) && $this->nmgp_cmp_hidden['idespecialidade_servicos_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idespecialidade_servicos_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->idespecialidade_servicos_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_idespecialidade_servicos__line" id="hidden_field_data_idespecialidade_servicos_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_idespecialidade_servicos_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_idespecialidade_servicos__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_idespecialidade_servicos_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idespecialidade_servicos_"]) &&  $this->nmgp_cmp_readonly["idespecialidade_servicos_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idespecialidade_servicos_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idespecialidade_servicos_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idespecialidade_servicos_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idespecialidade_servicos_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idespecialidade_servicos_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idespecialidade_servicos_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idespecialidade_servicos_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idespecialidade_servicos_'] = array(); 
    }

   $old_value_idlancamento_ = $this->idlancamento_;
   $old_value_data_do_servico_ = $this->data_do_servico_;
   $old_value_numero_da_guia_ = $this->numero_da_guia_;
   $old_value_vlr_servico_ = $this->vlr_servico_;
   $old_value_quantidade_ = $this->quantidade_;
   $old_value_momento_ = $this->momento_;
   $old_value_momento__hora = $this->momento__hora;
   $old_value_idcontratos_ = $this->idcontratos_;
   $old_value_total_servico_ = $this->total_servico_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idlancamento_ = $this->idlancamento_;
   $unformatted_value_data_do_servico_ = $this->data_do_servico_;
   $unformatted_value_numero_da_guia_ = $this->numero_da_guia_;
   $unformatted_value_vlr_servico_ = $this->vlr_servico_;
   $unformatted_value_quantidade_ = $this->quantidade_;
   $unformatted_value_momento_ = $this->momento_;
   $unformatted_value_momento__hora = $this->momento__hora;
   $unformatted_value_idcontratos_ = $this->idcontratos_;
   $unformatted_value_total_servico_ = $this->total_servico_;

   $nm_comando = "select especialidade_servicos.idEspecialidade_servicos, especialidade_servicos.descricao_especialidade   from contratos_especialidades inner join especialidade_servicos on especialidade_servicos.idEspecialidade_servicos = contratos_especialidades.idEspecialidade_servicos where contratos_especialidades.idContratos = " . $_SESSION['usr_idContratos'] . "";

   $this->idlancamento_ = $old_value_idlancamento_;
   $this->data_do_servico_ = $old_value_data_do_servico_;
   $this->numero_da_guia_ = $old_value_numero_da_guia_;
   $this->vlr_servico_ = $old_value_vlr_servico_;
   $this->quantidade_ = $old_value_quantidade_;
   $this->momento_ = $old_value_momento_;
   $this->momento__hora = $old_value_momento__hora;
   $this->idcontratos_ = $old_value_idcontratos_;
   $this->total_servico_ = $old_value_total_servico_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['Lookup_idespecialidade_servicos_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $idespecialidade_servicos__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idespecialidade_servicos__1))
          {
              foreach ($this->idespecialidade_servicos__1 as $tmp_idespecialidade_servicos_)
              {
                  if (trim($tmp_idespecialidade_servicos_) === trim($cadaselect[1])) { $idespecialidade_servicos__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idespecialidade_servicos_) === trim($cadaselect[1])) { $idespecialidade_servicos__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idespecialidade_servicos_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($idespecialidade_servicos_) . "\">" . $idespecialidade_servicos__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idespecialidade_servicos_();
   $x = 0 ; 
   $idespecialidade_servicos__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idespecialidade_servicos__1))
          {
              foreach ($this->idespecialidade_servicos__1 as $tmp_idespecialidade_servicos_)
              {
                  if (trim($tmp_idespecialidade_servicos_) === trim($cadaselect[1])) { $idespecialidade_servicos__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idespecialidade_servicos_) === trim($cadaselect[1])) { $idespecialidade_servicos__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idespecialidade_servicos__look))
          {
              $idespecialidade_servicos__look = $this->idespecialidade_servicos_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idespecialidade_servicos_" . $sc_seq_vert . "\" class=\"css_idespecialidade_servicos__line\" style=\"" .  $sStyleReadLab_idespecialidade_servicos_ . "\">" . $this->form_format_readonly("idespecialidade_servicos_", $this->form_encode_input($idespecialidade_servicos__look)) . "</span><span id=\"id_read_off_idespecialidade_servicos_" . $sc_seq_vert . "\" class=\"css_read_off_idespecialidade_servicos_" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_idespecialidade_servicos_ . "\">";
   echo " <span id=\"idAjaxSelect_idespecialidade_servicos_" .  $sc_seq_vert . "\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOddMult css_idespecialidade_servicos__obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idespecialidade_servicos_" . $sc_seq_vert . "\" name=\"idespecialidade_servicos_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idespecialidade_servicos_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idespecialidade_servicos_)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idespecialidade_servicos_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idespecialidade_servicos_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_idlancamento_))
       {
           $this->nmgp_cmp_readonly['idlancamento_'] = $sCheckRead_idlancamento_;
       }
       if ('display: none;' == $sStyleHidden_idlancamento_)
       {
           $this->nmgp_cmp_hidden['idlancamento_'] = 'off';
       }
       if (isset($sCheckRead_mes_ano_))
       {
           $this->nmgp_cmp_readonly['mes_ano_'] = $sCheckRead_mes_ano_;
       }
       if ('display: none;' == $sStyleHidden_mes_ano_)
       {
           $this->nmgp_cmp_hidden['mes_ano_'] = 'off';
       }
       if (isset($sCheckRead_data_do_servico_))
       {
           $this->nmgp_cmp_readonly['data_do_servico_'] = $sCheckRead_data_do_servico_;
       }
       if ('display: none;' == $sStyleHidden_data_do_servico_)
       {
           $this->nmgp_cmp_hidden['data_do_servico_'] = 'off';
       }
       if (isset($sCheckRead_idpessoas_profissinais_))
       {
           $this->nmgp_cmp_readonly['idpessoas_profissinais_'] = $sCheckRead_idpessoas_profissinais_;
       }
       if ('display: none;' == $sStyleHidden_idpessoas_profissinais_)
       {
           $this->nmgp_cmp_hidden['idpessoas_profissinais_'] = 'off';
       }
       if (isset($sCheckRead_numero_da_guia_))
       {
           $this->nmgp_cmp_readonly['numero_da_guia_'] = $sCheckRead_numero_da_guia_;
       }
       if ('display: none;' == $sStyleHidden_numero_da_guia_)
       {
           $this->nmgp_cmp_hidden['numero_da_guia_'] = 'off';
       }
       if (isset($sCheckRead_idservico_))
       {
           $this->nmgp_cmp_readonly['idservico_'] = $sCheckRead_idservico_;
       }
       if ('display: none;' == $sStyleHidden_idservico_)
       {
           $this->nmgp_cmp_hidden['idservico_'] = 'off';
       }
       if (isset($sCheckRead_vlr_servico_))
       {
           $this->nmgp_cmp_readonly['vlr_servico_'] = $sCheckRead_vlr_servico_;
       }
       if ('display: none;' == $sStyleHidden_vlr_servico_)
       {
           $this->nmgp_cmp_hidden['vlr_servico_'] = 'off';
       }
       if (isset($sCheckRead_quantidade_))
       {
           $this->nmgp_cmp_readonly['quantidade_'] = $sCheckRead_quantidade_;
       }
       if ('display: none;' == $sStyleHidden_quantidade_)
       {
           $this->nmgp_cmp_hidden['quantidade_'] = 'off';
       }
       if (isset($sCheckRead_momento_))
       {
           $this->nmgp_cmp_readonly['momento_'] = $sCheckRead_momento_;
       }
       if ('display: none;' == $sStyleHidden_momento_)
       {
           $this->nmgp_cmp_hidden['momento_'] = 'off';
       }
       if (isset($sCheckRead_usuario_))
       {
           $this->nmgp_cmp_readonly['usuario_'] = $sCheckRead_usuario_;
       }
       if ('display: none;' == $sStyleHidden_usuario_)
       {
           $this->nmgp_cmp_hidden['usuario_'] = 'off';
       }
       if (isset($sCheckRead_idcontratos_))
       {
           $this->nmgp_cmp_readonly['idcontratos_'] = $sCheckRead_idcontratos_;
       }
       if ('display: none;' == $sStyleHidden_idcontratos_)
       {
           $this->nmgp_cmp_hidden['idcontratos_'] = 'off';
       }
       if (isset($sCheckRead_total_servico_))
       {
           $this->nmgp_cmp_readonly['total_servico_'] = $sCheckRead_total_servico_;
       }
       if ('display: none;' == $sStyleHidden_total_servico_)
       {
           $this->nmgp_cmp_hidden['total_servico_'] = 'off';
       }
       if (isset($sCheckRead_idespecialidade_servicos_))
       {
           $this->nmgp_cmp_readonly['idespecialidade_servicos_'] = $sCheckRead_idespecialidade_servicos_;
       }
       if ('display: none;' == $sStyleHidden_idespecialidade_servicos_)
       {
           $this->nmgp_cmp_hidden['idespecialidade_servicos_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_dbo_lancamento_guias = $guarda_form_vert_form_dbo_lancamento_guias;
   } 
   if ($Table_refresh) 
   { 
       $this->Table_refresh = ob_get_contents();
       ob_end_clean();
   } 
}

function Form_Fim() 
{
   global $sc_seq_vert, $opcao_botoes, $nm_url_saida; 
?>   
</TABLE></div><!-- bloco_f -->
 </div>
 <div id="sc-id-fixedheaders-placeholder" style="display: none; position: fixed; top: 0; z-index: 500"></div>
<?php
$iContrVert = $this->Embutida_form ? $sc_seq_vert + 1 : $sc_seq_vert + 1;
if ($sc_seq_vert < $this->sc_max_reg)
{
    echo " <script type=\"text/javascript\">";
    echo "    bRefreshTable = true;";
    echo "</script>";
}
?>
<input type="hidden" name="sc_contr_vert" value="<?php echo $this->form_encode_input($iContrVert); ?>">
<?php
    $sEmptyStyle = 0 == $sc_seq_vert ? '' : 'display: none;';
?>
</td></tr>
<tr id="sc-ui-empty-form" style="<?php echo $sEmptyStyle; ?>"><td class="scFormPageText" style="padding: 10px; font-weight: bold">
<?php echo $this->Ini->Nm_lang['lang_errm_empt'];
?>
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColorMult">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['birpara'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "birpara", "scBtnFn_sys_GridPermiteSeq()", "scBtnFn_sys_GridPermiteSeq()", "brec_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['qtline'] == "on")
      {
?> 
          <span class="<?php echo $this->css_css_toolbar_obj ?>" style="border: 0px;"><?php echo $this->Ini->Nm_lang['lang_btns_rows'] ?></span>
          <select class="scFormToolbarInput" name="nmgp_quant_linhas_b" onchange="document.F7.nmgp_max_line.value = this.value; document.F7.submit();"> 
<?php 
              $obj_sel = ($this->sc_max_reg == '10') ? " selected" : "";
?> 
           <option value="10" <?php echo $obj_sel ?>>10</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '20') ? " selected" : "";
?> 
           <option value="20" <?php echo $obj_sel ?>>20</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '50') ? " selected" : "";
?> 
           <option value="50" <?php echo $obj_sel ?>>50</option>
          </select>
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-12';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['first'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-13';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['back'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-14';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['forward'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-15';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['btn_label']['last'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none;" class='scDebugWindow'><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>
<script>
 var iAjaxNewLine = <?php echo $sc_seq_vert; ?>;
<?php
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['run_modal'])
{
?>
 for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) {
  scJQElementsAdd(iLine);
 }
<?php
}
else
{
?>
 $(function() {
  setTimeout(function() { for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) { scJQElementsAdd(iLine); } }, 250);
 });
<?php
}
?>
</script>
<div id="new_line_dummy" style="display: none">
</div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
   </td></tr></table>
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['masterValue']);
?>
}
<?php
    }
}
?>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_dbo_lancamento_guias");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_dbo_lancamento_guias");
 parent.scAjaxDetailHeight("form_dbo_lancamento_guias", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_dbo_lancamento_guias", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_dbo_lancamento_guias", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
    }
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
    $isToast   = isset($this->NM_ajax_info['displayMsgToast']) && $this->NM_ajax_info['displayMsgToast'] ? 'true' : 'false';
    $toastType = $isToast && isset($this->NM_ajax_info['displayMsgToastType']) ? $this->NM_ajax_info['displayMsgToastType'] : '';
?>
<script type="text/javascript">
_scAjaxShowMessage({title: scMsgDefTitle, message: "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: <?php echo $isToast ?>, toastPos: "", type: "<?php echo $toastType ?>"});
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script type='text/javascript'>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['sc_modal'])
{
?>
  parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
elseif ($this->lig_edit_lookup)
{
?>
  opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
?>
}
if (bLigEditLookupCall)
{
  scLigEditLookupCall();
}
<?php
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<?php
if ($this->nmgp_form_empty) {
?>
<script type="text/javascript">
scAjax_displayEmptyForm();
</script>
<?php
}
?>
<script type="text/javascript">
	function scBtnFn_sys_format_inc() {
		if ($("#sc_b_new_t.sc-unique-btn-1").length && $("#sc_b_new_t.sc-unique-btn-1").is(":visible")) {
		    if ($("#sc_b_new_t.sc-unique-btn-1").hasClass("disabled")) {
		        return;
		    }
			do_ajax_form_dbo_lancamento_guias_add_new_line(); return false;
			 return;
		}
		if ($("#sc_b_new_t.sc-unique-btn-2").length && $("#sc_b_new_t.sc-unique-btn-2").is(":visible")) {
		    if ($("#sc_b_new_t.sc-unique-btn-2").hasClass("disabled")) {
		        return;
		    }
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-3").length && $("#sc_b_ins_t.sc-unique-btn-3").is(":visible")) {
		    if ($("#sc_b_ins_t.sc-unique-btn-3").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-4").length && $("#sc_b_sai_t.sc-unique-btn-4").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-4").hasClass("disabled")) {
		        return;
		    }
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-5").length && $("#sc_b_upd_t.sc-unique-btn-5").is(":visible")) {
		    if ($("#sc_b_upd_t.sc-unique-btn-5").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_reload() {
		if ($("#sc_b_reload_t.sc-unique-btn-6").length && $("#sc_b_reload_t.sc-unique-btn-6").is(":visible")) {
		    if ($("#sc_b_reload_t.sc-unique-btn-6").hasClass("disabled")) {
		        return;
		    }
			scAjax_formReload();
			 return;
		}
	}
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_t").length && $("#sc_b_hlp_t").is(":visible")) {
		    if ($("#sc_b_hlp_t").hasClass("disabled")) {
		        return;
		    }
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#sc_b_sai_t.sc-unique-btn-7").length && $("#sc_b_sai_t.sc-unique-btn-7").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-7").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-8").length && $("#sc_b_sai_t.sc-unique-btn-8").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-8").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-9").length && $("#sc_b_sai_t.sc-unique-btn-9").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-9").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-10").length && $("#sc_b_sai_t.sc-unique-btn-10").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-10").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-11").length && $("#sc_b_sai_t.sc-unique-btn-11").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-11").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
	}
	function scBtnFn_sys_GridPermiteSeq() {
		if ($("#brec_b").length && $("#brec_b").is(":visible")) {
		    if ($("#brec_b").hasClass("disabled")) {
		        return;
		    }
			nm_navpage(document.F1.nmgp_rec_b.value, 'P'); document.F1.nmgp_rec_b.value = '';
			 return;
		}
	}
	function scBtnFn_sys_format_ini() {
		if ($("#sc_b_ini_b.sc-unique-btn-12").length && $("#sc_b_ini_b.sc-unique-btn-12").is(":visible")) {
		    if ($("#sc_b_ini_b.sc-unique-btn-12").hasClass("disabled")) {
		        return;
		    }
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-13").length && $("#sc_b_ret_b.sc-unique-btn-13").is(":visible")) {
		    if ($("#sc_b_ret_b.sc-unique-btn-13").hasClass("disabled")) {
		        return;
		    }
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-14").length && $("#sc_b_avc_b.sc-unique-btn-14").is(":visible")) {
		    if ($("#sc_b_avc_b.sc-unique-btn-14").hasClass("disabled")) {
		        return;
		    }
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-15").length && $("#sc_b_fim_b.sc-unique-btn-15").is(":visible")) {
		    if ($("#sc_b_fim_b.sc-unique-btn-15").hasClass("disabled")) {
		        return;
		    }
			nm_move ('final');
			 return;
		}
	}
</script>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_lancamento_guias']['buttonStatus'] = $this->nmgp_botoes;
?>
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
</script>
</body> 
</html> 
<?php 
 } 
} 
?> 
