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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . ""); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . ""); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__img__NM__ct_other_gauge.png">
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
            <meta name="viewport" content="minimal-ui, width=300, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
            <meta name="mobile-web-app-capable" content="yes">
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <link rel="apple-touch-icon"   sizes="57x57" href="">
            <link rel="apple-touch-icon"   sizes="60x60" href="">
            <link rel="apple-touch-icon"   sizes="72x72" href="">
            <link rel="apple-touch-icon"   sizes="76x76" href="">
            <link rel="apple-touch-icon" sizes="114x114" href="">
            <link rel="apple-touch-icon" sizes="120x120" href="">
            <link rel="apple-touch-icon" sizes="144x144" href="">
            <link rel="apple-touch-icon" sizes="152x152" href="">
            <link rel="apple-touch-icon" sizes="180x180" href="">
            <link rel="icon" type="image/png" sizes="192x192" href="">
            <link rel="icon" type="image/png"   sizes="32x32" href="">
            <link rel="icon" type="image/png"   sizes="96x96" href="">
            <link rel="icon" type="image/png"   sizes="16x16" href="">
            <meta name="msapplication-TileColor" content="___">
            <meta name="msapplication-TileImage" content="">
            <meta name="theme-color" content="___">
            <meta name="apple-mobile-web-app-status-bar-style" content="___">
            <link rel="shortcut icon" href=""> <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
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
 </SCRIPT>
        <SCRIPT type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></SCRIPT>
            <?php
               if ($_SESSION['scriptcase']['display_mobile'] && $_SESSION['scriptcase']['device_mobile']) {
                   $sc_app_data = json_encode([
                       'appType' => 'form',
                       'improvements' => true,
                       'displayOptionsButton' => false,
                       'displayScrollUp' => true,
                       'scrollUpPosition' => 'A',
                       'toolbarOrientation' => 'H',
                       'mobilePanes' => 'true',
                       'navigationBarButtons' => unserialize('a:0:{}'),
                       'mobileSimpleToolbar' => true,
                       'bottomToolbarFixed' => true
                   ]); ?>
            <input type="hidden" id="sc-mobile-app-data" value='<?php echo $sc_app_data; ?>' />
            <script type="text/javascript" src="../_lib/lib/js/nm_modal_panes.jquery.js"></script>
            <script type="text/javascript" src="../_lib/lib/js/nm_form_mobile.js"></script>
            <link rel='stylesheet' href='../_lib/lib/css/nm_form_mobile.css' type='text/css'/>
            <script>
                $(document).ready(function(){

                    bootstrapMobile();

                });
            </script>
            <?php } ?> <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
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
.css_read_off_data_do_servico button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_momento button {
	background-color: transparent;
	border: 0;
	padding: 0
}
</style>
<?php
}
?>
 <style type="text/css">
   .select2-container {
     width: auto !important;
     flex-grow: 1;
   }
   .select2-selection {
     width: 100% !important;
   }
 </style>
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>calendar_dbo_pre_lancamento_servicos/calendar_dbo_pre_lancamento_servicos_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = true;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("calendar_dbo_pre_lancamento_servicos_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_disabled']['last'] : 'off'); ?>";
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

 function sc_calendar_all_day_click() {
  
 } // sc_calendar_all_day_click

 function sc_calendar_recurrence_change() {
  
 } // sc_calendar_recurrence_change
<?php

include_once('calendar_dbo_pre_lancamento_servicos_jquery.php');

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
function setLabelCellMaxWidth()
{
    var $labelList = $(".scUiLabelWidthFix"), $spanList, i, testWidth, maxLabelWidth = 0;
    for (i = 0; i < $labelList.length; i++) {
        $spanList = $($labelList[i]).find("span");

        if ($spanList.length) {
            testWidth  = $($spanList[0]).width();

            maxLabelWidth = Math.max(maxLabelWidth, testWidth);
        }
    }

    if (0 < maxLabelWidth) {
        maxLabelWidth += 20;
        $labelList.css("width", maxLabelWidth + "px");
    }
}

 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  mainForm = document.getElementById('main_table_form');
  formResize();

  sc_calendar_all_day_click();
  sc_calendar_recurrence_change();

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

        setLabelCellMaxWidth();

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
   });
 function formResize()
 {
    var formWidth = mainForm.clientWidth,
        formHeight = mainForm.clientHeight,
        windowHeight = $(window.parent).height();
    if (0 == formWidth || 0 == formHeight)
    {
        setTimeout("formResize()", 50);
    }
    else
    {
        if (formHeight > windowHeight - 100)
        {
            formHeight = windowHeight - 100;
        }
        self.parent.tb_resize(formHeight + 50, formWidth + 50);
    }
 }

 if($(".sc-ui-block-control").length) {
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

  for (var i = 2; i < block.rows.length; i++) {
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    $vertical_center = '';
?>
<body class="scFormPage sc-app-calendar" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
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
 include_once("calendar_dbo_pre_lancamento_servicos_js0.php");
?>
<script type="text/javascript"> 
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
<form  name="F1" method="post" enctype="multipart/form-data" 
               action="./" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['insert_validation']; ?>">
<?php
}
?>
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
<input type="hidden" name="upload_file_flag" value="">
<input type="hidden" name="upload_file_check" value="">
<input type="hidden" name="upload_file_name" value="">
<input type="hidden" name="upload_file_temp" value="">
<input type="hidden" name="upload_file_libs" value="">
<input type="hidden" name="upload_file_height" value="">
<input type="hidden" name="upload_file_width" value="">
<input type="hidden" name="upload_file_aspect" value="">
<input type="hidden" name="upload_file_type" value="">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['calendar_dbo_pre_lancamento_servicos'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['calendar_dbo_pre_lancamento_servicos'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="100%">
 <tr>
  <td>
  <div class="scFormBorder" style="<?php echo (isset($remove_border) ? $remove_border : ''); ?>">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . ""; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . ""; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><span id="head_mark_idespecialidade_servicos_0"><?php echo $this->idespecialidade_servicos ?></span></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><input type="hidden" name="anexo_guia_ul_name" id="id_sc_field_anexo_guia_ul_name" value="<?php echo $this->form_encode_input($this->anexo_guia_ul_name);?>">
<input type="hidden" name="anexo_guia_ul_type" id="id_sc_field_anexo_guia_ul_type" value="<?php echo $this->form_encode_input($this->anexo_guia_ul_type);?>">
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idpessoas']))
   {
       $this->nm_new_label['idpessoas'] = "Pessoa Juridica";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idpessoas = $this->idpessoas;
   $sStyleHidden_idpessoas = '';
   if (isset($this->nmgp_cmp_hidden['idpessoas']) && $this->nmgp_cmp_hidden['idpessoas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idpessoas']);
       $sStyleHidden_idpessoas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idpessoas = 'display: none;';
   $sStyleReadInp_idpessoas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idpessoas']) && $this->nmgp_cmp_readonly['idpessoas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idpessoas']);
       $sStyleReadLab_idpessoas = '';
       $sStyleReadInp_idpessoas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idpessoas']) && $this->nmgp_cmp_hidden['idpessoas'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idpessoas" value="<?php echo $this->form_encode_input($this->idpessoas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idpessoas_line" id="hidden_field_data_idpessoas" style="<?php echo $sStyleHidden_idpessoas; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idpessoas_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idpessoas_label" style=""><span id="id_label_idpessoas"><?php echo $this->nm_new_label['idpessoas']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['php_cmp_required']['idpessoas']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['php_cmp_required']['idpessoas'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idpessoas"]) &&  $this->nmgp_cmp_readonly["idpessoas"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idpessoas']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idpessoas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idpessoas']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idpessoas'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idpessoas']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idpessoas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idpessoas']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idpessoas'] = array(); 
    }

   $old_value_data_do_servico = $this->data_do_servico;
   $old_value_numero_da_guia = $this->numero_da_guia;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_do_servico = $this->data_do_servico;
   $unformatted_value_numero_da_guia = $this->numero_da_guia;

   $nm_comando = "SELECT  pessoa_juridica_fisica.idPessoas,  pessoa_juridica_fisica.nome_razao_social FROM dbo.pessoa_juridica_fisica  INNER JOIN contratos  ON contratos.idPessoas = pessoa_juridica_fisica.idPessoas and contratos.situacao = 'A' and contratos.idFilial = " . $_SESSION['usr_idFilial'] . " inner join contratos_especialidades  on contratos_especialidades.idContratos = contratos.idContratos and contratos_especialidades.idEspecialidade_servicos = " . $_SESSION['usr_especialidade'] . " WHERE tipo_pessoa = 'PJ' group by pessoa_juridica_fisica.idPessoas,  pessoa_juridica_fisica.nome_razao_social";

   $this->data_do_servico = $old_value_data_do_servico;
   $this->numero_da_guia = $old_value_numero_da_guia;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idpessoas'][] = $rs->fields[0];
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
   $idpessoas_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idpessoas_1))
          {
              foreach ($this->idpessoas_1 as $tmp_idpessoas)
              {
                  if (trim($tmp_idpessoas) === trim($cadaselect[1])) { $idpessoas_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idpessoas) === trim($cadaselect[1])) { $idpessoas_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idpessoas" value="<?php echo $this->form_encode_input($idpessoas) . "\">" . $idpessoas_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idpessoas();
   $x = 0 ; 
   $idpessoas_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idpessoas_1))
          {
              foreach ($this->idpessoas_1 as $tmp_idpessoas)
              {
                  if (trim($tmp_idpessoas) === trim($cadaselect[1])) { $idpessoas_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idpessoas) === trim($cadaselect[1])) { $idpessoas_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idpessoas_look))
          {
              $idpessoas_look = $this->idpessoas;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idpessoas\" class=\"css_idpessoas_line\" style=\"" .  $sStyleReadLab_idpessoas . "\">" . $this->form_format_readonly("idpessoas", $this->form_encode_input($idpessoas_look)) . "</span><span id=\"id_read_off_idpessoas\" class=\"css_read_off_idpessoas" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_idpessoas . "\">";
   echo " <span id=\"idAjaxSelect_idpessoas\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_idpessoas_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idpessoas\" name=\"idpessoas\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idpessoas) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idpessoas)) 
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
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_idpessoas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idpessoas_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idcontratos']))
   {
       $this->nm_new_label['idcontratos'] = "Contrato";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idcontratos = $this->idcontratos;
   $sStyleHidden_idcontratos = '';
   if (isset($this->nmgp_cmp_hidden['idcontratos']) && $this->nmgp_cmp_hidden['idcontratos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idcontratos']);
       $sStyleHidden_idcontratos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idcontratos = 'display: none;';
   $sStyleReadInp_idcontratos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idcontratos']) && $this->nmgp_cmp_readonly['idcontratos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idcontratos']);
       $sStyleReadLab_idcontratos = '';
       $sStyleReadInp_idcontratos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idcontratos']) && $this->nmgp_cmp_hidden['idcontratos'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idcontratos" value="<?php echo $this->form_encode_input($this->idcontratos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idcontratos_line" id="hidden_field_data_idcontratos" style="<?php echo $sStyleHidden_idcontratos; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idcontratos_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idcontratos_label" style=""><span id="id_label_idcontratos"><?php echo $this->nm_new_label['idcontratos']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idcontratos"]) &&  $this->nmgp_cmp_readonly["idcontratos"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idcontratos']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idcontratos'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idcontratos']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idcontratos'] = array(); 
}
if ($this->idpessoas != "")
{ 
   $this->nm_clear_val("idpessoas");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idcontratos']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idcontratos'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idcontratos']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idcontratos'] = array(); 
    }

   $old_value_data_do_servico = $this->data_do_servico;
   $old_value_numero_da_guia = $this->numero_da_guia;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_do_servico = $this->data_do_servico;
   $unformatted_value_numero_da_guia = $this->numero_da_guia;

   $nm_comando = "SELECT contratos.idContratos , 'Nº contrato : ' + convert(varchar(max),contratos.numero_do_contrato) + ' - '  + pessoa_juridica_fisica.nome_razao_social as Descricao  FROM dbo.contratos  INNER JOIN pessoa_juridica_fisica ON pessoa_juridica_fisica.idPessoas = contratos.idPessoas and contratos.situacao = 'A' and contratos.idFilial = " . $_SESSION['usr_idFilial'] . " WHERE pessoa_juridica_fisica.idPessoas = '$this->idpessoas'";

   $this->data_do_servico = $old_value_data_do_servico;
   $this->numero_da_guia = $old_value_numero_da_guia;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idcontratos'][] = $rs->fields[0];
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
} 
   $x = 0; 
   $idcontratos_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idcontratos_1))
          {
              foreach ($this->idcontratos_1 as $tmp_idcontratos)
              {
                  if (trim($tmp_idcontratos) === trim($cadaselect[1])) { $idcontratos_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idcontratos) === trim($cadaselect[1])) { $idcontratos_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idcontratos" value="<?php echo $this->form_encode_input($idcontratos) . "\">" . $idcontratos_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idcontratos();
   $x = 0 ; 
   $idcontratos_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idcontratos_1))
          {
              foreach ($this->idcontratos_1 as $tmp_idcontratos)
              {
                  if (trim($tmp_idcontratos) === trim($cadaselect[1])) { $idcontratos_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idcontratos) === trim($cadaselect[1])) { $idcontratos_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idcontratos_look))
          {
              $idcontratos_look = $this->idcontratos;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idcontratos\" class=\"css_idcontratos_line\" style=\"" .  $sStyleReadLab_idcontratos . "\">" . $this->form_format_readonly("idcontratos", $this->form_encode_input($idcontratos_look)) . "</span><span id=\"id_read_off_idcontratos\" class=\"css_read_off_idcontratos" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_idcontratos . "\">";
   echo " <span id=\"idAjaxSelect_idcontratos\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_idcontratos_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idcontratos\" name=\"idcontratos\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idcontratos) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idcontratos)) 
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
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_idcontratos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idcontratos_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idpessoas_profissionais']))
   {
       $this->nm_new_label['idpessoas_profissionais'] = "Profissional";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idpessoas_profissionais = $this->idpessoas_profissionais;
   $sStyleHidden_idpessoas_profissionais = '';
   if (isset($this->nmgp_cmp_hidden['idpessoas_profissionais']) && $this->nmgp_cmp_hidden['idpessoas_profissionais'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idpessoas_profissionais']);
       $sStyleHidden_idpessoas_profissionais = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idpessoas_profissionais = 'display: none;';
   $sStyleReadInp_idpessoas_profissionais = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idpessoas_profissionais']) && $this->nmgp_cmp_readonly['idpessoas_profissionais'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idpessoas_profissionais']);
       $sStyleReadLab_idpessoas_profissionais = '';
       $sStyleReadInp_idpessoas_profissionais = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idpessoas_profissionais']) && $this->nmgp_cmp_hidden['idpessoas_profissionais'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idpessoas_profissionais" value="<?php echo $this->form_encode_input($this->idpessoas_profissionais) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idpessoas_profissionais_line" id="hidden_field_data_idpessoas_profissionais" style="<?php echo $sStyleHidden_idpessoas_profissionais; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idpessoas_profissionais_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idpessoas_profissionais_label" style=""><span id="id_label_idpessoas_profissionais"><?php echo $this->nm_new_label['idpessoas_profissionais']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idpessoas_profissionais"]) &&  $this->nmgp_cmp_readonly["idpessoas_profissionais"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idpessoas_profissionais']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idpessoas_profissionais'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idpessoas_profissionais']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idpessoas_profissionais'] = array(); 
}
if ($this->idcontratos != "")
{ 
   $this->nm_clear_val("idcontratos");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idpessoas_profissionais']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idpessoas_profissionais'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idpessoas_profissionais']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idpessoas_profissionais'] = array(); 
    }

   $old_value_data_do_servico = $this->data_do_servico;
   $old_value_numero_da_guia = $this->numero_da_guia;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_do_servico = $this->data_do_servico;
   $unformatted_value_numero_da_guia = $this->numero_da_guia;

   $nm_comando = "SELECT pessoa_juridica_fisica.idPessoas, pessoa_juridica_fisica.nome_razao_social FROM     contratos_funcionarios INNER JOIN                   pessoa_juridica_fisica_socios ON contratos_funcionarios.idSocios = pessoa_juridica_fisica_socios.idSocios INNER JOIN                   pessoa_juridica_fisica ON pessoa_juridica_fisica_socios.idPessoas_socios = pessoa_juridica_fisica.idPessoas WHERE  (contratos_funcionarios.idContratos = $this->idcontratos)";

   $this->data_do_servico = $old_value_data_do_servico;
   $this->numero_da_guia = $old_value_numero_da_guia;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_idpessoas_profissionais'][] = $rs->fields[0];
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
} 
   $x = 0; 
   $idpessoas_profissionais_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idpessoas_profissionais_1))
          {
              foreach ($this->idpessoas_profissionais_1 as $tmp_idpessoas_profissionais)
              {
                  if (trim($tmp_idpessoas_profissionais) === trim($cadaselect[1])) { $idpessoas_profissionais_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idpessoas_profissionais) === trim($cadaselect[1])) { $idpessoas_profissionais_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idpessoas_profissionais" value="<?php echo $this->form_encode_input($idpessoas_profissionais) . "\">" . $idpessoas_profissionais_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idpessoas_profissionais();
   $x = 0 ; 
   $idpessoas_profissionais_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idpessoas_profissionais_1))
          {
              foreach ($this->idpessoas_profissionais_1 as $tmp_idpessoas_profissionais)
              {
                  if (trim($tmp_idpessoas_profissionais) === trim($cadaselect[1])) { $idpessoas_profissionais_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idpessoas_profissionais) === trim($cadaselect[1])) { $idpessoas_profissionais_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idpessoas_profissionais_look))
          {
              $idpessoas_profissionais_look = $this->idpessoas_profissionais;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idpessoas_profissionais\" class=\"css_idpessoas_profissionais_line\" style=\"" .  $sStyleReadLab_idpessoas_profissionais . "\">" . $this->form_format_readonly("idpessoas_profissionais", $this->form_encode_input($idpessoas_profissionais_look)) . "</span><span id=\"id_read_off_idpessoas_profissionais\" class=\"css_read_off_idpessoas_profissionais" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_idpessoas_profissionais . "\">";
   echo " <span id=\"idAjaxSelect_idpessoas_profissionais\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_idpessoas_profissionais_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idpessoas_profissionais\" name=\"idpessoas_profissionais\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idpessoas_profissionais) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idpessoas_profissionais)) 
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
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_idpessoas_profissionais_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idpessoas_profissionais_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_idpessoas_profissionais_dumb = ('' == $sStyleHidden_idpessoas_profissionais) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_idpessoas_profissionais_dumb" style="<?php echo $sStyleHidden_idpessoas_profissionais_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['data_do_servico']))
    {
        $this->nm_new_label['data_do_servico'] = "Data do Serviço";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $data_do_servico = $this->data_do_servico;
   $sStyleHidden_data_do_servico = '';
   if (isset($this->nmgp_cmp_hidden['data_do_servico']) && $this->nmgp_cmp_hidden['data_do_servico'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['data_do_servico']);
       $sStyleHidden_data_do_servico = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_data_do_servico = 'display: none;';
   $sStyleReadInp_data_do_servico = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['data_do_servico']) && $this->nmgp_cmp_readonly['data_do_servico'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['data_do_servico']);
       $sStyleReadLab_data_do_servico = '';
       $sStyleReadInp_data_do_servico = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['data_do_servico']) && $this->nmgp_cmp_hidden['data_do_servico'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="data_do_servico" value="<?php echo $this->form_encode_input($data_do_servico) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_data_do_servico_line" id="hidden_field_data_data_do_servico" style="<?php echo $sStyleHidden_data_do_servico; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_data_do_servico_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_data_do_servico_label" style=""><span id="id_label_data_do_servico"><?php echo $this->nm_new_label['data_do_servico']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['php_cmp_required']['data_do_servico']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['php_cmp_required']['data_do_servico'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["data_do_servico"]) &&  $this->nmgp_cmp_readonly["data_do_servico"] == "on") { 

 ?>
<input type="hidden" name="data_do_servico" value="<?php echo $this->form_encode_input($data_do_servico) . "\">" . $data_do_servico . ""; ?>
<?php } else { ?>
<span id="id_read_on_data_do_servico" class="sc-ui-readonly-data_do_servico css_data_do_servico_line" style="<?php echo $sStyleReadLab_data_do_servico; ?>"><?php echo $this->form_format_readonly("data_do_servico", $this->form_encode_input($data_do_servico)); ?></span><span id="id_read_off_data_do_servico" class="css_read_off_data_do_servico<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_data_do_servico; ?>"><?php
$tmp_form_data = $this->field_config['data_do_servico']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_data_do_servico_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_data_do_servico" type=text name="data_do_servico" value="<?php echo $this->form_encode_input($data_do_servico) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['data_do_servico']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['data_do_servico']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '<?php echo $tmp_form_data; ?>', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_data_do_servico_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_data_do_servico_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['numero_da_guia']))
    {
        $this->nm_new_label['numero_da_guia'] = "Nº da Guia";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numero_da_guia = $this->numero_da_guia;
   $sStyleHidden_numero_da_guia = '';
   if (isset($this->nmgp_cmp_hidden['numero_da_guia']) && $this->nmgp_cmp_hidden['numero_da_guia'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numero_da_guia']);
       $sStyleHidden_numero_da_guia = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numero_da_guia = 'display: none;';
   $sStyleReadInp_numero_da_guia = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numero_da_guia']) && $this->nmgp_cmp_readonly['numero_da_guia'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numero_da_guia']);
       $sStyleReadLab_numero_da_guia = '';
       $sStyleReadInp_numero_da_guia = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numero_da_guia']) && $this->nmgp_cmp_hidden['numero_da_guia'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numero_da_guia" value="<?php echo $this->form_encode_input($numero_da_guia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_numero_da_guia_line" id="hidden_field_data_numero_da_guia" style="<?php echo $sStyleHidden_numero_da_guia; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numero_da_guia_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_numero_da_guia_label" style=""><span id="id_label_numero_da_guia"><?php echo $this->nm_new_label['numero_da_guia']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numero_da_guia"]) &&  $this->nmgp_cmp_readonly["numero_da_guia"] == "on") { 

 ?>
<input type="hidden" name="numero_da_guia" value="<?php echo $this->form_encode_input($numero_da_guia) . "\">" . $numero_da_guia . ""; ?>
<?php } else { ?>
<span id="id_read_on_numero_da_guia" class="sc-ui-readonly-numero_da_guia css_numero_da_guia_line" style="<?php echo $sStyleReadLab_numero_da_guia; ?>"><?php echo $this->form_format_readonly("numero_da_guia", $this->form_encode_input($this->numero_da_guia)); ?></span><span id="id_read_off_numero_da_guia" class="css_read_off_numero_da_guia<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numero_da_guia; ?>">
 <input class="sc-js-input scFormObjectOdd css_numero_da_guia_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numero_da_guia" type=text name="numero_da_guia" value="<?php echo $this->form_encode_input($numero_da_guia) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=19"; } ?> alt="{datatype: 'integer', maxLength: 19, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['numero_da_guia']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['numero_da_guia']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['numero_da_guia']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_numero_da_guia_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numero_da_guia_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['quantidade']))
   {
       $this->nm_new_label['quantidade'] = "Quantidade";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $quantidade = $this->quantidade;
   $sStyleHidden_quantidade = '';
   if (isset($this->nmgp_cmp_hidden['quantidade']) && $this->nmgp_cmp_hidden['quantidade'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['quantidade']);
       $sStyleHidden_quantidade = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_quantidade = 'display: none;';
   $sStyleReadInp_quantidade = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['quantidade']) && $this->nmgp_cmp_readonly['quantidade'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['quantidade']);
       $sStyleReadLab_quantidade = '';
       $sStyleReadInp_quantidade = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['quantidade']) && $this->nmgp_cmp_hidden['quantidade'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="quantidade" value="<?php echo $this->form_encode_input($this->quantidade) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_quantidade_line" id="hidden_field_data_quantidade" style="<?php echo $sStyleHidden_quantidade; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_quantidade_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_quantidade_label" style=""><span id="id_label_quantidade"><?php echo $this->nm_new_label['quantidade']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["quantidade"]) &&  $this->nmgp_cmp_readonly["quantidade"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_quantidade']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_quantidade'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_quantidade']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_quantidade'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_quantidade']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_quantidade'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_quantidade']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_quantidade'] = array(); 
    }

   $old_value_data_do_servico = $this->data_do_servico;
   $old_value_numero_da_guia = $this->numero_da_guia;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_do_servico = $this->data_do_servico;
   $unformatted_value_numero_da_guia = $this->numero_da_guia;

   $nm_comando = "SELECT valor_variavel, descricao_variaveis FROM     variaveis WHERE  (tipo_variaveis = 'horario_servicos')";

   $this->data_do_servico = $old_value_data_do_servico;
   $this->numero_da_guia = $old_value_numero_da_guia;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['Lookup_quantidade'][] = $rs->fields[0];
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
   $quantidade_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->quantidade_1))
          {
              foreach ($this->quantidade_1 as $tmp_quantidade)
              {
                  if (trim($tmp_quantidade) === trim($cadaselect[1])) { $quantidade_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->quantidade) === trim($cadaselect[1])) { $quantidade_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="quantidade" value="<?php echo $this->form_encode_input($quantidade) . "\">" . $quantidade_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_quantidade();
   $x = 0 ; 
   $quantidade_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->quantidade_1))
          {
              foreach ($this->quantidade_1 as $tmp_quantidade)
              {
                  if (trim($tmp_quantidade) === trim($cadaselect[1])) { $quantidade_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->quantidade) === trim($cadaselect[1])) { $quantidade_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($quantidade_look))
          {
              $quantidade_look = $this->quantidade;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_quantidade\" class=\"css_quantidade_line\" style=\"" .  $sStyleReadLab_quantidade . "\">" . $this->form_format_readonly("quantidade", $this->form_encode_input($quantidade_look)) . "</span><span id=\"id_read_off_quantidade\" class=\"css_read_off_quantidade" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_quantidade . "\">";
   echo " <span id=\"idAjaxSelect_quantidade\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_quantidade_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_quantidade\" name=\"quantidade\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->quantidade) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->quantidade)) 
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
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_quantidade_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_quantidade_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_data_do_servico_dumb = ('' == $sStyleHidden_data_do_servico) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_data_do_servico_dumb" style="<?php echo $sStyleHidden_data_do_servico_dumb; ?>"></TD>
<?php $sStyleHidden_numero_da_guia_dumb = ('' == $sStyleHidden_numero_da_guia) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_numero_da_guia_dumb" style="<?php echo $sStyleHidden_numero_da_guia_dumb; ?>"></TD>
<?php $sStyleHidden_quantidade_dumb = ('' == $sStyleHidden_quantidade) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_quantidade_dumb" style="<?php echo $sStyleHidden_quantidade_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['anexo_guia']))
    {
        $this->nm_new_label['anexo_guia'] = "Anexo Guia";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $anexo_guia = $this->anexo_guia;
   $sStyleHidden_anexo_guia = '';
   if (isset($this->nmgp_cmp_hidden['anexo_guia']) && $this->nmgp_cmp_hidden['anexo_guia'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['anexo_guia']);
       $sStyleHidden_anexo_guia = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_anexo_guia = 'display: none;';
   $sStyleReadInp_anexo_guia = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['anexo_guia']) && $this->nmgp_cmp_readonly['anexo_guia'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['anexo_guia']);
       $sStyleReadLab_anexo_guia = '';
       $sStyleReadInp_anexo_guia = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['anexo_guia']) && $this->nmgp_cmp_hidden['anexo_guia'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="anexo_guia" value="<?php echo $this->form_encode_input($anexo_guia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_anexo_guia_line" id="hidden_field_data_anexo_guia" style="<?php echo $sStyleHidden_anexo_guia; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_anexo_guia_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_anexo_guia_label" style=""><span id="id_label_anexo_guia"><?php echo $this->nm_new_label['anexo_guia']; ?></span></span><br>
 <?php $this->NM_ajax_info['varList'][] = array("var_ajax_img_anexo_guia" => $out_anexo_guia); ?><script>var var_ajax_img_anexo_guia = '<?php echo $out_anexo_guia; ?>';</script><input type="hidden" name="temp_out_anexo_guia" value="<?php echo $this->form_encode_input($out_anexo_guia); ?>" /><?php if (!empty($out_anexo_guia)) {  echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_anexo_guia, '" . $this->nmgp_return_img['anexo_guia'][0] . "', '" . $this->nmgp_return_img['anexo_guia'][1] . "')\"><img id=\"id_ajax_img_anexo_guia\"  border=\"0\" src=\"$out_anexo_guia\"></a>"; } else {  echo "<img id=\"id_ajax_img_anexo_guia\" border=\"0\" style=\"display: none\">"; } ?><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["anexo_guia"]) &&  $this->nmgp_cmp_readonly["anexo_guia"] == "on") { 

 ?>
<img id=\"anexo_guia_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="anexo_guia" value="<?php echo $this->form_encode_input($anexo_guia) . "\">" . $anexo_guia . ""; ?>
<?php } else { ?>
<span id="id_read_off_anexo_guia" class="css_read_off_anexo_guia<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_anexo_guia; ?>"><span style="display:inline-block"><span id="sc-id-upload-select-anexo_guia" class="fileinput-button fileinput-button-padding scButton_default">
 <span><?php echo $this->Ini->Nm_lang['lang_select_file'] ?></span>

 <input class="sc-js-input scFormObjectOdd css_anexo_guia_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" title="<?php echo $this->Ini->Nm_lang['lang_select_file'] ?>" type="file" name="anexo_guia[]" id="id_sc_field_anexo_guia" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>"></span></span>
<?php
   $sCheckInsert = "";
?>
<span id="chk_ajax_img_anexo_guia"<?php if ($this->nmgp_opcao == "novo" || empty($anexo_guia)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="anexo_guia_limpa" value="<?php echo $anexo_guia_limpa . '" '; if ($anexo_guia_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};<?php echo $sCheckInsert ?>"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="anexo_guia_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_img_loader_anexo_guia" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_anexo_guia" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
<div id="id_sc_dragdrop_anexo_guia" class="scFormDataDragNDrop"  style="<?php echo $sStyleReadInp_anexo_guia ?>"><i class='fas fa-cloud-upload-alt'></i><br/>
<?php echo $this->Ini->Nm_lang['lang_errm_mu_dragimg'] ?></div>
</td><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_anexo_guia_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_anexo_guia_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="1" >&nbsp;</TD>




<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['run_iframe'] != "R")
{
    $NM_btn = false;
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-1';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label']['new'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-2';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label']['insert'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-3';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label']['update'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + S)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-4';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label']['delete'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Delete)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-5';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_disabled']['']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_disabled']['']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label']['']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label']['']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label'][''];
        }
?>
<?php
if (is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Img_sep_form))
{
    if ($NM_btn)
    {
        $NM_btn = false;
        $NM_ult_sep = "NM_sep_1";
        echo "<img id=\"NM_sep_1\" class=\"NM_toolbar_sep\" style=\"vertical-align: middle\" src=\"" . $this->Ini->path_botoes . $this->Ini->Img_sep_form . "\" />";
    }
}
?>
 
<?php
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (F1)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-6';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-7';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-8';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['run_iframe'] != "R")
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

</form> 
<?php
      $Tzone = ini_get('date.timezone');
      if (empty($Tzone))
      {
?>
<script> 
  _scAjaxShowMessage({title: '', message: "<?php echo $this->Ini->Nm_lang['lang_errm_tz']; ?>", isModal: false, timeout: 0, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: true, showBodyIcon: false, isToast: false, toastPos: ""});
</script> 
<?php
      }
?>
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2);

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
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['masterValue']);
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
  if ("idespecialidade_servicos" == sFldName)
  {
    document.getElementById("head_mark_idespecialidade_servicos_0").innerHTML = sFldValue;
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("calendar_dbo_pre_lancamento_servicos");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("calendar_dbo_pre_lancamento_servicos");
 parent.scAjaxDetailHeight("calendar_dbo_pre_lancamento_servicos", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("calendar_dbo_pre_lancamento_servicos", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("calendar_dbo_pre_lancamento_servicos", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['sc_modal'])
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
		if ($("#sc_b_new_b.sc-unique-btn-1").length && $("#sc_b_new_b.sc-unique-btn-1").is(":visible")) {
		    if ($("#sc_b_new_b.sc-unique-btn-1").hasClass("disabled")) {
		        return;
		    }
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_b.sc-unique-btn-2").length && $("#sc_b_ins_b.sc-unique-btn-2").is(":visible")) {
		    if ($("#sc_b_ins_b.sc-unique-btn-2").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_b.sc-unique-btn-3").length && $("#sc_b_upd_b.sc-unique-btn-3").is(":visible")) {
		    if ($("#sc_b_upd_b.sc-unique-btn-3").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_exc() {
		if ($("#sc_b_del_b.sc-unique-btn-4").length && $("#sc_b_del_b.sc-unique-btn-4").is(":visible")) {
		    if ($("#sc_b_del_b.sc-unique-btn-4").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('excluir');
			 return;
		}
	}
	function scBtnFn_sys_separator() {
		if ($("#sys_separator.sc-unique-btn-5").length && $("#sys_separator.sc-unique-btn-5").is(":visible")) {
		    if ($("#sys_separator.sc-unique-btn-5").hasClass("disabled")) {
		        return;
		    }
			return false;
			 return;
		}
	}
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_b").length && $("#sc_b_hlp_b").is(":visible")) {
		    if ($("#sc_b_hlp_b").hasClass("disabled")) {
		        return;
		    }
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#sc_b_sai_b.sc-unique-btn-6").length && $("#sc_b_sai_b.sc-unique-btn-6").is(":visible")) {
		    if ($("#sc_b_sai_b.sc-unique-btn-6").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_b.sc-unique-btn-7").length && $("#sc_b_sai_b.sc-unique-btn-7").is(":visible")) {
		    if ($("#sc_b_sai_b.sc-unique-btn-7").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_b.sc-unique-btn-8").length && $("#sc_b_sai_b.sc-unique-btn-8").is(":visible")) {
		    if ($("#sc_b_sai_b.sc-unique-btn-8").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
	}
</script>
<script type="text/javascript">
$(function() {
 $("#sc-id-mobile-in").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("in");
 });
 $("#sc-id-mobile-out").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("out");
 });
});
function scMobileDisplayControl(sOption) {
 $("#sc-id-mobile-control").val(sOption);
 nm_atualiza("recarga_mobile");
}
</script>
<?php
       if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'])
       {
?>
<span id="sc-id-mobile-in"><?php echo $this->Ini->Nm_lang['lang_version_mobile']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['calendar_dbo_pre_lancamento_servicos']['buttonStatus'] = $this->nmgp_botoes;
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
