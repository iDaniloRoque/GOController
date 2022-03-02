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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " dbo.pessoa_juridica_fisica"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " dbo.pessoa_juridica_fisica"); } ?></TITLE>
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
.css_read_off_momento button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_dbo_pessoa_juridica_fisica/form_dbo_pessoa_juridica_fisica_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_dbo_pessoa_juridica_fisica_mob_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['last'] : 'off'); ?>";
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
    nm_sumario = "[<?php echo substr($this->Ini->Nm_lang['lang_othr_smry_info'], strpos($this->Ini->Nm_lang['lang_othr_smry_info'], "?final?")) ?>]";
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

include_once('form_dbo_pessoa_juridica_fisica_mob_jquery.php');

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

  scJQElementsAdd('');

  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
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
    if ("hidden_bloco_1" == block_id) {
      scAjaxDetailHeight("form_dbo_pessoa_juridica_fisica_socios", $($("#nmsc_iframe_liga_form_dbo_pessoa_juridica_fisica_socios")[0].contentWindow.document).innerHeight());
    }
    if ("hidden_bloco_2" == block_id) {
      scAjaxDetailHeight("form_dbo_pessoa_juridica_fisica_impostos", $($("#nmsc_iframe_liga_form_dbo_pessoa_juridica_fisica_impostos")[0].contentWindow.document).innerHeight());
    }
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    $vertical_center = '';
?>
<body class="scFormPage sc-app-form" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_dbo_pessoa_juridica_fisica']['error_buffer']) && '' != $_SESSION['scriptcase']['form_dbo_pessoa_juridica_fisica']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_dbo_pessoa_juridica_fisica']['error_buffer'];
}
elseif (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
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
 include_once("form_dbo_pessoa_juridica_fisica_mob_js0.php");
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
<form  name="F1" method="post" 
               action="form_dbo_pessoa_juridica_fisica_mob.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['insert_validation']; ?>">
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
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_dbo_pessoa_juridica_fisica_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_dbo_pessoa_juridica_fisica_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['fast_search'][2] : "";
          $stateSearchIconClose  = 'none';
          $stateSearchIconSearch = '';
          if(!empty($OPC_dat))
          {
              $stateSearchIconClose  = '';
              $stateSearchIconSearch = 'none';
          }
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <input id='fast_search_f0_t' type="hidden" name="nmgp_fast_search_t" value="SC_all_Cmp">
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
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-16';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['new'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-17';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['insert'];
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
        $buttonMacroDisabled = 'sc-unique-btn-18';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['bcancelar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-19';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['update'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-20';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['delete'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = ($this->nmgp_botoes['reload'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-21';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['breload']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['breload']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['breload']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['breload']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['breload'];
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
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-22';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-23';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-24';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-25';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-26';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] != "R")
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
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['idpessoas']))
   {
       $this->nmgp_cmp_hidden['idpessoas'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['telefone']))
   {
       $this->nmgp_cmp_hidden['telefone'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['idempresa']))
   {
       $this->nmgp_cmp_hidden['idempresa'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['momento']))
   {
       $this->nmgp_cmp_hidden['momento'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['usuario']))
   {
       $this->nmgp_cmp_hidden['usuario'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idpessoas']))
           {
               $this->nmgp_cmp_readonly['idpessoas'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idpessoas']))
    {
        $this->nm_new_label['idpessoas'] = "Id Pessoas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idpessoas = $this->idpessoas;
   if (!isset($this->nmgp_cmp_hidden['idpessoas']))
   {
       $this->nmgp_cmp_hidden['idpessoas'] = 'off';
   }
   $sStyleHidden_idpessoas = '';
   if (isset($this->nmgp_cmp_hidden['idpessoas']) && $this->nmgp_cmp_hidden['idpessoas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idpessoas']);
       $sStyleHidden_idpessoas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idpessoas = 'display: none;';
   $sStyleReadInp_idpessoas = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idpessoas"]) &&  $this->nmgp_cmp_readonly["idpessoas"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idpessoas']);
       $sStyleReadLab_idpessoas = '';
       $sStyleReadInp_idpessoas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idpessoas']) && $this->nmgp_cmp_hidden['idpessoas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idpessoas" value="<?php echo $this->form_encode_input($idpessoas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOdd css_idpessoas_line" id="hidden_field_data_idpessoas" style="<?php echo $sStyleHidden_idpessoas; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idpessoas_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idpessoas_label" style=""><span id="id_label_idpessoas"><?php echo $this->nm_new_label['idpessoas']; ?></span></span><br><span id="id_read_on_idpessoas" class="css_idpessoas_line" style="<?php echo $sStyleReadLab_idpessoas; ?>"><?php echo $this->form_format_readonly("idpessoas", $this->form_encode_input($this->idpessoas)); ?></span><span id="id_read_off_idpessoas" class="css_read_off_idpessoas" style="<?php echo $sStyleReadInp_idpessoas; ?>"><input type="hidden" name="idpessoas" value="<?php echo $this->form_encode_input($idpessoas) . "\">"?><span id="id_ajax_label_idpessoas"><?php echo nl2br($idpessoas); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idpessoas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idpessoas_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }
      else
      {
         $sc_hidden_no--;
      }
?>
<?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['idempresa']))
    {
        $this->nm_new_label['idempresa'] = "Id Empresa";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idempresa = $this->idempresa;
   if (!isset($this->nmgp_cmp_hidden['idempresa']))
   {
       $this->nmgp_cmp_hidden['idempresa'] = 'off';
   }
   $sStyleHidden_idempresa = '';
   if (isset($this->nmgp_cmp_hidden['idempresa']) && $this->nmgp_cmp_hidden['idempresa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idempresa']);
       $sStyleHidden_idempresa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idempresa = 'display: none;';
   $sStyleReadInp_idempresa = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idempresa']) && $this->nmgp_cmp_readonly['idempresa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idempresa']);
       $sStyleReadLab_idempresa = '';
       $sStyleReadInp_idempresa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idempresa']) && $this->nmgp_cmp_hidden['idempresa'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idempresa" value="<?php echo $this->form_encode_input($idempresa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idempresa_line" id="hidden_field_data_idempresa" style="<?php echo $sStyleHidden_idempresa; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idempresa_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idempresa_label" style=""><span id="id_label_idempresa"><?php echo $this->nm_new_label['idempresa']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idempresa"]) &&  $this->nmgp_cmp_readonly["idempresa"] == "on") { 

 ?>
<input type="hidden" name="idempresa" value="<?php echo $this->form_encode_input($idempresa) . "\">" . $idempresa . ""; ?>
<?php } else { ?>
<span id="id_read_on_idempresa" class="sc-ui-readonly-idempresa css_idempresa_line" style="<?php echo $sStyleReadLab_idempresa; ?>"><?php echo $this->form_format_readonly("idempresa", $this->form_encode_input($this->idempresa)); ?></span><span id="id_read_off_idempresa" class="css_read_off_idempresa<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_idempresa; ?>">
 <input class="sc-js-input scFormObjectOdd css_idempresa_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_idempresa" type=text name="idempresa" value="<?php echo $this->form_encode_input($idempresa) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=19"; } ?> alt="{datatype: 'integer', maxLength: 19, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['idempresa']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['idempresa']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['idempresa']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idempresa_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idempresa_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tipo_pessoa']))
   {
       $this->nm_new_label['tipo_pessoa'] = "Tipo Pessoa";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tipo_pessoa = $this->tipo_pessoa;
   $sStyleHidden_tipo_pessoa = '';
   if (isset($this->nmgp_cmp_hidden['tipo_pessoa']) && $this->nmgp_cmp_hidden['tipo_pessoa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tipo_pessoa']);
       $sStyleHidden_tipo_pessoa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tipo_pessoa = 'display: none;';
   $sStyleReadInp_tipo_pessoa = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tipo_pessoa']) && $this->nmgp_cmp_readonly['tipo_pessoa'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tipo_pessoa']);
       $sStyleReadLab_tipo_pessoa = '';
       $sStyleReadInp_tipo_pessoa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tipo_pessoa']) && $this->nmgp_cmp_hidden['tipo_pessoa'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tipo_pessoa" value="<?php echo $this->form_encode_input($this->tipo_pessoa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tipo_pessoa_line" id="hidden_field_data_tipo_pessoa" style="<?php echo $sStyleHidden_tipo_pessoa; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tipo_pessoa_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_tipo_pessoa_label" style=""><span id="id_label_tipo_pessoa"><?php echo $this->nm_new_label['tipo_pessoa']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['php_cmp_required']['tipo_pessoa']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['php_cmp_required']['tipo_pessoa'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tipo_pessoa"]) &&  $this->nmgp_cmp_readonly["tipo_pessoa"] == "on") { 

$tipo_pessoa_look = "";
 if ($this->tipo_pessoa == "PJ") { $tipo_pessoa_look .= "Pessoa Juridica" ;} 
 if ($this->tipo_pessoa == "PF") { $tipo_pessoa_look .= "Pessoa Fisica" ;} 
 if (empty($tipo_pessoa_look)) { $tipo_pessoa_look = $this->tipo_pessoa; }
?>
<input type="hidden" name="tipo_pessoa" value="<?php echo $this->form_encode_input($tipo_pessoa) . "\">" . $tipo_pessoa_look . ""; ?>
<?php } else { ?>
<?php

$tipo_pessoa_look = "";
 if ($this->tipo_pessoa == "PJ") { $tipo_pessoa_look .= "Pessoa Juridica" ;} 
 if ($this->tipo_pessoa == "PF") { $tipo_pessoa_look .= "Pessoa Fisica" ;} 
 if (empty($tipo_pessoa_look)) { $tipo_pessoa_look = $this->tipo_pessoa; }
?>
<span id="id_read_on_tipo_pessoa" class="css_tipo_pessoa_line"  style="<?php echo $sStyleReadLab_tipo_pessoa; ?>"><?php echo $this->form_format_readonly("tipo_pessoa", $this->form_encode_input($tipo_pessoa_look)); ?></span><span id="id_read_off_tipo_pessoa" class="css_read_off_tipo_pessoa<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_tipo_pessoa; ?>">
 <span id="idAjaxSelect_tipo_pessoa" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_tipo_pessoa_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_tipo_pessoa" name="tipo_pessoa" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['Lookup_tipo_pessoa'][] = ''; ?>
 <option value="">Selecionar</option>
 <option  value="PJ" <?php  if ($this->tipo_pessoa == "PJ") { echo " selected" ;} ?>>Pessoa Juridica</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['Lookup_tipo_pessoa'][] = 'PJ'; ?>
 <option  value="PF" <?php  if ($this->tipo_pessoa == "PF") { echo " selected" ;} ?>>Pessoa Fisica</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['Lookup_tipo_pessoa'][] = 'PF'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tipo_pessoa_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tipo_pessoa_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cpf_cnpj']))
    {
        $this->nm_new_label['cpf_cnpj'] = "Cpf Cnpj";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cpf_cnpj = $this->cpf_cnpj;
   $sStyleHidden_cpf_cnpj = '';
   if (isset($this->nmgp_cmp_hidden['cpf_cnpj']) && $this->nmgp_cmp_hidden['cpf_cnpj'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cpf_cnpj']);
       $sStyleHidden_cpf_cnpj = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cpf_cnpj = 'display: none;';
   $sStyleReadInp_cpf_cnpj = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cpf_cnpj']) && $this->nmgp_cmp_readonly['cpf_cnpj'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cpf_cnpj']);
       $sStyleReadLab_cpf_cnpj = '';
       $sStyleReadInp_cpf_cnpj = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cpf_cnpj']) && $this->nmgp_cmp_hidden['cpf_cnpj'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cpf_cnpj" value="<?php echo $this->form_encode_input($cpf_cnpj) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cpf_cnpj_line" id="hidden_field_data_cpf_cnpj" style="<?php echo $sStyleHidden_cpf_cnpj; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cpf_cnpj_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cpf_cnpj_label" style=""><span id="id_label_cpf_cnpj"><?php echo $this->nm_new_label['cpf_cnpj']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['php_cmp_required']['cpf_cnpj']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['php_cmp_required']['cpf_cnpj'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cpf_cnpj"]) &&  $this->nmgp_cmp_readonly["cpf_cnpj"] == "on") { 

 ?>
<input type="hidden" name="cpf_cnpj" value="<?php echo $this->form_encode_input($cpf_cnpj) . "\">" . $cpf_cnpj . ""; ?>
<?php } else { ?>
<span id="id_read_on_cpf_cnpj" class="sc-ui-readonly-cpf_cnpj css_cpf_cnpj_line" style="<?php echo $sStyleReadLab_cpf_cnpj; ?>"><?php echo $this->form_format_readonly("cpf_cnpj", $this->form_encode_input($this->cpf_cnpj)); ?></span><span id="id_read_off_cpf_cnpj" class="css_read_off_cpf_cnpj<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cpf_cnpj; ?>">
 <input class="sc-js-input scFormObjectOdd css_cpf_cnpj_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cpf_cnpj" type=text name="cpf_cnpj" value="<?php echo $this->form_encode_input($cpf_cnpj) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=16"; } ?> alt="{datatype: 'mask', maskList: '999.999.999-99;99.999.999/9999-99', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cpf_cnpj_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cpf_cnpj_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rg_inscricao_est']))
    {
        $this->nm_new_label['rg_inscricao_est'] = "Rg Inscricao Est";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rg_inscricao_est = $this->rg_inscricao_est;
   $sStyleHidden_rg_inscricao_est = '';
   if (isset($this->nmgp_cmp_hidden['rg_inscricao_est']) && $this->nmgp_cmp_hidden['rg_inscricao_est'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rg_inscricao_est']);
       $sStyleHidden_rg_inscricao_est = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rg_inscricao_est = 'display: none;';
   $sStyleReadInp_rg_inscricao_est = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rg_inscricao_est']) && $this->nmgp_cmp_readonly['rg_inscricao_est'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rg_inscricao_est']);
       $sStyleReadLab_rg_inscricao_est = '';
       $sStyleReadInp_rg_inscricao_est = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rg_inscricao_est']) && $this->nmgp_cmp_hidden['rg_inscricao_est'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rg_inscricao_est" value="<?php echo $this->form_encode_input($rg_inscricao_est) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_rg_inscricao_est_line" id="hidden_field_data_rg_inscricao_est" style="<?php echo $sStyleHidden_rg_inscricao_est; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rg_inscricao_est_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_rg_inscricao_est_label" style=""><span id="id_label_rg_inscricao_est"><?php echo $this->nm_new_label['rg_inscricao_est']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rg_inscricao_est"]) &&  $this->nmgp_cmp_readonly["rg_inscricao_est"] == "on") { 

 ?>
<input type="hidden" name="rg_inscricao_est" value="<?php echo $this->form_encode_input($rg_inscricao_est) . "\">" . $rg_inscricao_est . ""; ?>
<?php } else { ?>
<span id="id_read_on_rg_inscricao_est" class="sc-ui-readonly-rg_inscricao_est css_rg_inscricao_est_line" style="<?php echo $sStyleReadLab_rg_inscricao_est; ?>"><?php echo $this->form_format_readonly("rg_inscricao_est", $this->form_encode_input($this->rg_inscricao_est)); ?></span><span id="id_read_off_rg_inscricao_est" class="css_read_off_rg_inscricao_est<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_rg_inscricao_est; ?>">
 <input class="sc-js-input scFormObjectOdd css_rg_inscricao_est_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_rg_inscricao_est" type=text name="rg_inscricao_est" value="<?php echo $this->form_encode_input($rg_inscricao_est) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rg_inscricao_est_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rg_inscricao_est_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nome_razao_social']))
    {
        $this->nm_new_label['nome_razao_social'] = "Nome Razao Social";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nome_razao_social = $this->nome_razao_social;
   $sStyleHidden_nome_razao_social = '';
   if (isset($this->nmgp_cmp_hidden['nome_razao_social']) && $this->nmgp_cmp_hidden['nome_razao_social'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nome_razao_social']);
       $sStyleHidden_nome_razao_social = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nome_razao_social = 'display: none;';
   $sStyleReadInp_nome_razao_social = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nome_razao_social']) && $this->nmgp_cmp_readonly['nome_razao_social'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nome_razao_social']);
       $sStyleReadLab_nome_razao_social = '';
       $sStyleReadInp_nome_razao_social = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nome_razao_social']) && $this->nmgp_cmp_hidden['nome_razao_social'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nome_razao_social" value="<?php echo $this->form_encode_input($nome_razao_social) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nome_razao_social_line" id="hidden_field_data_nome_razao_social" style="<?php echo $sStyleHidden_nome_razao_social; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_nome_razao_social_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_nome_razao_social_label" style=""><span id="id_label_nome_razao_social"><?php echo $this->nm_new_label['nome_razao_social']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['php_cmp_required']['nome_razao_social']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['php_cmp_required']['nome_razao_social'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nome_razao_social"]) &&  $this->nmgp_cmp_readonly["nome_razao_social"] == "on") { 

 ?>
<input type="hidden" name="nome_razao_social" value="<?php echo $this->form_encode_input($nome_razao_social) . "\">" . $nome_razao_social . ""; ?>
<?php } else { ?>
<span id="id_read_on_nome_razao_social" class="sc-ui-readonly-nome_razao_social css_nome_razao_social_line" style="<?php echo $sStyleReadLab_nome_razao_social; ?>"><?php echo $this->form_format_readonly("nome_razao_social", $this->form_encode_input($this->nome_razao_social)); ?></span><span id="id_read_off_nome_razao_social" class="css_read_off_nome_razao_social<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_nome_razao_social; ?>">
 <input class="sc-js-input scFormObjectOdd css_nome_razao_social_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_nome_razao_social" type=text name="nome_razao_social" value="<?php echo $this->form_encode_input($nome_razao_social) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=250 alt="{datatype: 'text', maxLength: 250, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nome_razao_social_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nome_razao_social_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['inscricao_municipal']))
    {
        $this->nm_new_label['inscricao_municipal'] = "Inscricao Municipal";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $inscricao_municipal = $this->inscricao_municipal;
   $sStyleHidden_inscricao_municipal = '';
   if (isset($this->nmgp_cmp_hidden['inscricao_municipal']) && $this->nmgp_cmp_hidden['inscricao_municipal'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['inscricao_municipal']);
       $sStyleHidden_inscricao_municipal = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_inscricao_municipal = 'display: none;';
   $sStyleReadInp_inscricao_municipal = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['inscricao_municipal']) && $this->nmgp_cmp_readonly['inscricao_municipal'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['inscricao_municipal']);
       $sStyleReadLab_inscricao_municipal = '';
       $sStyleReadInp_inscricao_municipal = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['inscricao_municipal']) && $this->nmgp_cmp_hidden['inscricao_municipal'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="inscricao_municipal" value="<?php echo $this->form_encode_input($inscricao_municipal) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_inscricao_municipal_line" id="hidden_field_data_inscricao_municipal" style="<?php echo $sStyleHidden_inscricao_municipal; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_inscricao_municipal_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_inscricao_municipal_label" style=""><span id="id_label_inscricao_municipal"><?php echo $this->nm_new_label['inscricao_municipal']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["inscricao_municipal"]) &&  $this->nmgp_cmp_readonly["inscricao_municipal"] == "on") { 

 ?>
<input type="hidden" name="inscricao_municipal" value="<?php echo $this->form_encode_input($inscricao_municipal) . "\">" . $inscricao_municipal . ""; ?>
<?php } else { ?>
<span id="id_read_on_inscricao_municipal" class="sc-ui-readonly-inscricao_municipal css_inscricao_municipal_line" style="<?php echo $sStyleReadLab_inscricao_municipal; ?>"><?php echo $this->form_format_readonly("inscricao_municipal", $this->form_encode_input($this->inscricao_municipal)); ?></span><span id="id_read_off_inscricao_municipal" class="css_read_off_inscricao_municipal<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_inscricao_municipal; ?>">
 <input class="sc-js-input scFormObjectOdd css_inscricao_municipal_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_inscricao_municipal" type=text name="inscricao_municipal" value="<?php echo $this->form_encode_input($inscricao_municipal) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_inscricao_municipal_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_inscricao_municipal_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['email']))
    {
        $this->nm_new_label['email'] = "Email";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $email = $this->email;
   $sStyleHidden_email = '';
   if (isset($this->nmgp_cmp_hidden['email']) && $this->nmgp_cmp_hidden['email'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['email']);
       $sStyleHidden_email = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_email = 'display: none;';
   $sStyleReadInp_email = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['email']) && $this->nmgp_cmp_readonly['email'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['email']);
       $sStyleReadLab_email = '';
       $sStyleReadInp_email = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['email']) && $this->nmgp_cmp_hidden['email'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="email" value="<?php echo $this->form_encode_input($email) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_email_line" id="hidden_field_data_email" style="<?php echo $sStyleHidden_email; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_email_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_email_label" style=""><span id="id_label_email"><?php echo $this->nm_new_label['email']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["email"]) &&  $this->nmgp_cmp_readonly["email"] == "on") { 

 ?>
<input type="hidden" name="email" value="<?php echo $this->form_encode_input($email) . "\">" . $email . ""; ?>
<?php } else { ?>
<span id="id_read_on_email" class="sc-ui-readonly-email css_email_line" style="<?php echo $sStyleReadLab_email; ?>"><?php echo $this->form_format_readonly("email", $this->form_encode_input($this->email)); ?></span><span id="id_read_off_email" class="css_read_off_email<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_email; ?>">
 <input class="sc-js-input scFormObjectOdd css_email_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_email" type=text name="email" value="<?php echo $this->form_encode_input($email) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=250 alt="{datatype: 'text', maxLength: 250, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_email_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_email_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['telefone']))
    {
        $this->nm_new_label['telefone'] = "Telefone";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $telefone = $this->telefone;
   if (!isset($this->nmgp_cmp_hidden['telefone']))
   {
       $this->nmgp_cmp_hidden['telefone'] = 'off';
   }
   $sStyleHidden_telefone = '';
   if (isset($this->nmgp_cmp_hidden['telefone']) && $this->nmgp_cmp_hidden['telefone'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['telefone']);
       $sStyleHidden_telefone = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_telefone = 'display: none;';
   $sStyleReadInp_telefone = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['telefone']) && $this->nmgp_cmp_readonly['telefone'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['telefone']);
       $sStyleReadLab_telefone = '';
       $sStyleReadInp_telefone = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['telefone']) && $this->nmgp_cmp_hidden['telefone'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="telefone" value="<?php echo $this->form_encode_input($telefone) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_telefone_line" id="hidden_field_data_telefone" style="<?php echo $sStyleHidden_telefone; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_telefone_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_telefone_label" style=""><span id="id_label_telefone"><?php echo $this->nm_new_label['telefone']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["telefone"]) &&  $this->nmgp_cmp_readonly["telefone"] == "on") { 

 ?>
<input type="hidden" name="telefone" value="<?php echo $this->form_encode_input($telefone) . "\">" . $telefone . ""; ?>
<?php } else { ?>
<span id="id_read_on_telefone" class="sc-ui-readonly-telefone css_telefone_line" style="<?php echo $sStyleReadLab_telefone; ?>"><?php echo $this->form_format_readonly("telefone", $this->form_encode_input($this->telefone)); ?></span><span id="id_read_off_telefone" class="css_read_off_telefone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_telefone; ?>">
 <input class="sc-js-input scFormObjectOdd css_telefone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_telefone" type=text name="telefone" value="<?php echo $this->form_encode_input($telefone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_telefone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_telefone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['contato']))
    {
        $this->nm_new_label['contato'] = "Contato";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $contato = $this->contato;
   $sStyleHidden_contato = '';
   if (isset($this->nmgp_cmp_hidden['contato']) && $this->nmgp_cmp_hidden['contato'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['contato']);
       $sStyleHidden_contato = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_contato = 'display: none;';
   $sStyleReadInp_contato = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['contato']) && $this->nmgp_cmp_readonly['contato'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['contato']);
       $sStyleReadLab_contato = '';
       $sStyleReadInp_contato = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['contato']) && $this->nmgp_cmp_hidden['contato'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="contato" value="<?php echo $this->form_encode_input($contato) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_contato_line" id="hidden_field_data_contato" style="<?php echo $sStyleHidden_contato; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_contato_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_contato_label" style=""><span id="id_label_contato"><?php echo $this->nm_new_label['contato']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["contato"]) &&  $this->nmgp_cmp_readonly["contato"] == "on") { 

 ?>
<input type="hidden" name="contato" value="<?php echo $this->form_encode_input($contato) . "\">" . $contato . ""; ?>
<?php } else { ?>
<span id="id_read_on_contato" class="sc-ui-readonly-contato css_contato_line" style="<?php echo $sStyleReadLab_contato; ?>"><?php echo $this->form_format_readonly("contato", $this->form_encode_input($this->contato)); ?></span><span id="id_read_off_contato" class="css_read_off_contato<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_contato; ?>">
 <input class="sc-js-input scFormObjectOdd css_contato_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_contato" type=text name="contato" value="<?php echo $this->form_encode_input($contato) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_contato_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_contato_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['usuario']))
    {
        $this->nm_new_label['usuario'] = "Usuario";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $usuario = $this->usuario;
   if (!isset($this->nmgp_cmp_hidden['usuario']))
   {
       $this->nmgp_cmp_hidden['usuario'] = 'off';
   }
   $sStyleHidden_usuario = '';
   if (isset($this->nmgp_cmp_hidden['usuario']) && $this->nmgp_cmp_hidden['usuario'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['usuario']);
       $sStyleHidden_usuario = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_usuario = 'display: none;';
   $sStyleReadInp_usuario = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['usuario']) && $this->nmgp_cmp_readonly['usuario'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['usuario']);
       $sStyleReadLab_usuario = '';
       $sStyleReadInp_usuario = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['usuario']) && $this->nmgp_cmp_hidden['usuario'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="usuario" value="<?php echo $this->form_encode_input($usuario) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_usuario_line" id="hidden_field_data_usuario" style="<?php echo $sStyleHidden_usuario; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_usuario_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_usuario_label" style=""><span id="id_label_usuario"><?php echo $this->nm_new_label['usuario']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["usuario"]) &&  $this->nmgp_cmp_readonly["usuario"] == "on") { 

 ?>
<input type="hidden" name="usuario" value="<?php echo $this->form_encode_input($usuario) . "\">" . $usuario . ""; ?>
<?php } else { ?>
<span id="id_read_on_usuario" class="sc-ui-readonly-usuario css_usuario_line" style="<?php echo $sStyleReadLab_usuario; ?>"><?php echo $this->form_format_readonly("usuario", $this->form_encode_input($this->usuario)); ?></span><span id="id_read_off_usuario" class="css_read_off_usuario<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_usuario; ?>">
 <input class="sc-js-input scFormObjectOdd css_usuario_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_usuario" type=text name="usuario" value="<?php echo $this->form_encode_input($usuario) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_usuario_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_usuario_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['momento']))
    {
        $this->nm_new_label['momento'] = "Momento";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_momento = $this->momento;
   if (strlen($this->momento_hora) > 8 ) {$this->momento_hora = substr($this->momento_hora, 0, 8);}
   $this->momento .= ' ' . $this->momento_hora;
   $this->momento  = trim($this->momento);
   $momento = $this->momento;
   if (!isset($this->nmgp_cmp_hidden['momento']))
   {
       $this->nmgp_cmp_hidden['momento'] = 'off';
   }
   $sStyleHidden_momento = '';
   if (isset($this->nmgp_cmp_hidden['momento']) && $this->nmgp_cmp_hidden['momento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['momento']);
       $sStyleHidden_momento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_momento = 'display: none;';
   $sStyleReadInp_momento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['momento']) && $this->nmgp_cmp_readonly['momento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['momento']);
       $sStyleReadLab_momento = '';
       $sStyleReadInp_momento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['momento']) && $this->nmgp_cmp_hidden['momento'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="momento" value="<?php echo $this->form_encode_input($momento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_momento_line" id="hidden_field_data_momento" style="<?php echo $sStyleHidden_momento; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_momento_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_momento_label" style=""><span id="id_label_momento"><?php echo $this->nm_new_label['momento']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["momento"]) &&  $this->nmgp_cmp_readonly["momento"] == "on") { 

 ?>
<input type="hidden" name="momento" value="<?php echo $this->form_encode_input($momento) . "\">" . $momento . ""; ?>
<?php } else { ?>
<span id="id_read_on_momento" class="sc-ui-readonly-momento css_momento_line" style="<?php echo $sStyleReadLab_momento; ?>"><?php echo $this->form_format_readonly("momento", $this->form_encode_input($momento)); ?></span><span id="id_read_off_momento" class="css_read_off_momento<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_momento; ?>"><?php
$tmp_form_data = $this->field_config['momento']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_momento_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_momento" type=text name="momento" value="<?php echo $this->form_encode_input($momento) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=18"; } ?> alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['momento']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['momento']['date_format']; ?>', timeSep: '<?php echo $this->field_config['momento']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_momento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_momento_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->momento = $old_dt_momento;
?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['logradouro']))
    {
        $this->nm_new_label['logradouro'] = "Logradouro";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $logradouro = $this->logradouro;
   $sStyleHidden_logradouro = '';
   if (isset($this->nmgp_cmp_hidden['logradouro']) && $this->nmgp_cmp_hidden['logradouro'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['logradouro']);
       $sStyleHidden_logradouro = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_logradouro = 'display: none;';
   $sStyleReadInp_logradouro = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['logradouro']) && $this->nmgp_cmp_readonly['logradouro'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['logradouro']);
       $sStyleReadLab_logradouro = '';
       $sStyleReadInp_logradouro = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['logradouro']) && $this->nmgp_cmp_hidden['logradouro'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="logradouro" value="<?php echo $this->form_encode_input($logradouro) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_logradouro_line" id="hidden_field_data_logradouro" style="<?php echo $sStyleHidden_logradouro; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_logradouro_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_logradouro_label" style=""><span id="id_label_logradouro"><?php echo $this->nm_new_label['logradouro']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["logradouro"]) &&  $this->nmgp_cmp_readonly["logradouro"] == "on") { 

 ?>
<input type="hidden" name="logradouro" value="<?php echo $this->form_encode_input($logradouro) . "\">" . $logradouro . ""; ?>
<?php } else { ?>
<span id="id_read_on_logradouro" class="sc-ui-readonly-logradouro css_logradouro_line" style="<?php echo $sStyleReadLab_logradouro; ?>"><?php echo $this->form_format_readonly("logradouro", $this->form_encode_input($this->logradouro)); ?></span><span id="id_read_off_logradouro" class="css_read_off_logradouro<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_logradouro; ?>">
 <input class="sc-js-input scFormObjectOdd css_logradouro_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_logradouro" type=text name="logradouro" value="<?php echo $this->form_encode_input($logradouro) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_logradouro_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_logradouro_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numero']))
    {
        $this->nm_new_label['numero'] = "Numero";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numero = $this->numero;
   $sStyleHidden_numero = '';
   if (isset($this->nmgp_cmp_hidden['numero']) && $this->nmgp_cmp_hidden['numero'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numero']);
       $sStyleHidden_numero = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numero = 'display: none;';
   $sStyleReadInp_numero = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numero']) && $this->nmgp_cmp_readonly['numero'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numero']);
       $sStyleReadLab_numero = '';
       $sStyleReadInp_numero = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numero']) && $this->nmgp_cmp_hidden['numero'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numero" value="<?php echo $this->form_encode_input($numero) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_numero_line" id="hidden_field_data_numero" style="<?php echo $sStyleHidden_numero; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numero_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_numero_label" style=""><span id="id_label_numero"><?php echo $this->nm_new_label['numero']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numero"]) &&  $this->nmgp_cmp_readonly["numero"] == "on") { 

 ?>
<input type="hidden" name="numero" value="<?php echo $this->form_encode_input($numero) . "\">" . $numero . ""; ?>
<?php } else { ?>
<span id="id_read_on_numero" class="sc-ui-readonly-numero css_numero_line" style="<?php echo $sStyleReadLab_numero; ?>"><?php echo $this->form_format_readonly("numero", $this->form_encode_input($this->numero)); ?></span><span id="id_read_off_numero" class="css_read_off_numero<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numero; ?>">
 <input class="sc-js-input scFormObjectOdd css_numero_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numero" type=text name="numero" value="<?php echo $this->form_encode_input($numero) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numero_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numero_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['complemento']))
    {
        $this->nm_new_label['complemento'] = "Complemento";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $complemento = $this->complemento;
   $sStyleHidden_complemento = '';
   if (isset($this->nmgp_cmp_hidden['complemento']) && $this->nmgp_cmp_hidden['complemento'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['complemento']);
       $sStyleHidden_complemento = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_complemento = 'display: none;';
   $sStyleReadInp_complemento = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['complemento']) && $this->nmgp_cmp_readonly['complemento'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['complemento']);
       $sStyleReadLab_complemento = '';
       $sStyleReadInp_complemento = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['complemento']) && $this->nmgp_cmp_hidden['complemento'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="complemento" value="<?php echo $this->form_encode_input($complemento) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_complemento_line" id="hidden_field_data_complemento" style="<?php echo $sStyleHidden_complemento; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_complemento_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_complemento_label" style=""><span id="id_label_complemento"><?php echo $this->nm_new_label['complemento']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["complemento"]) &&  $this->nmgp_cmp_readonly["complemento"] == "on") { 

 ?>
<input type="hidden" name="complemento" value="<?php echo $this->form_encode_input($complemento) . "\">" . $complemento . ""; ?>
<?php } else { ?>
<span id="id_read_on_complemento" class="sc-ui-readonly-complemento css_complemento_line" style="<?php echo $sStyleReadLab_complemento; ?>"><?php echo $this->form_format_readonly("complemento", $this->form_encode_input($this->complemento)); ?></span><span id="id_read_off_complemento" class="css_read_off_complemento<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_complemento; ?>">
 <input class="sc-js-input scFormObjectOdd css_complemento_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_complemento" type=text name="complemento" value="<?php echo $this->form_encode_input($complemento) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_complemento_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_complemento_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['cep']))
    {
        $this->nm_new_label['cep'] = "Cep";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $cep = $this->cep;
   $sStyleHidden_cep = '';
   if (isset($this->nmgp_cmp_hidden['cep']) && $this->nmgp_cmp_hidden['cep'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['cep']);
       $sStyleHidden_cep = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_cep = 'display: none;';
   $sStyleReadInp_cep = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['cep']) && $this->nmgp_cmp_readonly['cep'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['cep']);
       $sStyleReadLab_cep = '';
       $sStyleReadInp_cep = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['cep']) && $this->nmgp_cmp_hidden['cep'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="cep" value="<?php echo $this->form_encode_input($cep) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_cep_line" id="hidden_field_data_cep" style="<?php echo $sStyleHidden_cep; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_cep_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_cep_label" style=""><span id="id_label_cep"><?php echo $this->nm_new_label['cep']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["cep"]) &&  $this->nmgp_cmp_readonly["cep"] == "on") { 

 ?>
<input type="hidden" name="cep" value="<?php echo $this->form_encode_input($cep) . "\">" . $cep . ""; ?>
<?php } else { ?>
<span id="id_read_on_cep" class="sc-ui-readonly-cep css_cep_line" style="<?php echo $sStyleReadLab_cep; ?>"><?php echo $this->form_format_readonly("cep", $this->form_encode_input($this->cep)); ?></span><span id="id_read_off_cep" class="css_read_off_cep<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_cep; ?>">
 <input class="sc-js-input scFormObjectOdd css_cep_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_cep" type=text name="cep" value="<?php echo $this->form_encode_input($cep) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=250 alt="{datatype: 'text', maxLength: 250, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_cep_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_cep_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['bairro']))
    {
        $this->nm_new_label['bairro'] = "Bairro";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $bairro = $this->bairro;
   $sStyleHidden_bairro = '';
   if (isset($this->nmgp_cmp_hidden['bairro']) && $this->nmgp_cmp_hidden['bairro'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['bairro']);
       $sStyleHidden_bairro = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_bairro = 'display: none;';
   $sStyleReadInp_bairro = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['bairro']) && $this->nmgp_cmp_readonly['bairro'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['bairro']);
       $sStyleReadLab_bairro = '';
       $sStyleReadInp_bairro = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['bairro']) && $this->nmgp_cmp_hidden['bairro'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="bairro" value="<?php echo $this->form_encode_input($bairro) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_bairro_line" id="hidden_field_data_bairro" style="<?php echo $sStyleHidden_bairro; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_bairro_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_bairro_label" style=""><span id="id_label_bairro"><?php echo $this->nm_new_label['bairro']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bairro"]) &&  $this->nmgp_cmp_readonly["bairro"] == "on") { 

 ?>
<input type="hidden" name="bairro" value="<?php echo $this->form_encode_input($bairro) . "\">" . $bairro . ""; ?>
<?php } else { ?>
<span id="id_read_on_bairro" class="sc-ui-readonly-bairro css_bairro_line" style="<?php echo $sStyleReadLab_bairro; ?>"><?php echo $this->form_format_readonly("bairro", $this->form_encode_input($this->bairro)); ?></span><span id="id_read_off_bairro" class="css_read_off_bairro<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_bairro; ?>">
 <input class="sc-js-input scFormObjectOdd css_bairro_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_bairro" type=text name="bairro" value="<?php echo $this->form_encode_input($bairro) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bairro_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bairro_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['municipio']))
    {
        $this->nm_new_label['municipio'] = "Municipio";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $municipio = $this->municipio;
   $sStyleHidden_municipio = '';
   if (isset($this->nmgp_cmp_hidden['municipio']) && $this->nmgp_cmp_hidden['municipio'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['municipio']);
       $sStyleHidden_municipio = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_municipio = 'display: none;';
   $sStyleReadInp_municipio = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['municipio']) && $this->nmgp_cmp_readonly['municipio'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['municipio']);
       $sStyleReadLab_municipio = '';
       $sStyleReadInp_municipio = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['municipio']) && $this->nmgp_cmp_hidden['municipio'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="municipio" value="<?php echo $this->form_encode_input($municipio) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_municipio_line" id="hidden_field_data_municipio" style="<?php echo $sStyleHidden_municipio; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_municipio_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_municipio_label" style=""><span id="id_label_municipio"><?php echo $this->nm_new_label['municipio']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["municipio"]) &&  $this->nmgp_cmp_readonly["municipio"] == "on") { 

 ?>
<input type="hidden" name="municipio" value="<?php echo $this->form_encode_input($municipio) . "\">" . $municipio . ""; ?>
<?php } else { ?>
<span id="id_read_on_municipio" class="sc-ui-readonly-municipio css_municipio_line" style="<?php echo $sStyleReadLab_municipio; ?>"><?php echo $this->form_format_readonly("municipio", $this->form_encode_input($this->municipio)); ?></span><span id="id_read_off_municipio" class="css_read_off_municipio<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_municipio; ?>">
 <input class="sc-js-input scFormObjectOdd css_municipio_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_municipio" type=text name="municipio" value="<?php echo $this->form_encode_input($municipio) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_municipio_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_municipio_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['uf']))
    {
        $this->nm_new_label['uf'] = "Uf";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $uf = $this->uf;
   $sStyleHidden_uf = '';
   if (isset($this->nmgp_cmp_hidden['uf']) && $this->nmgp_cmp_hidden['uf'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['uf']);
       $sStyleHidden_uf = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_uf = 'display: none;';
   $sStyleReadInp_uf = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['uf']) && $this->nmgp_cmp_readonly['uf'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['uf']);
       $sStyleReadLab_uf = '';
       $sStyleReadInp_uf = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['uf']) && $this->nmgp_cmp_hidden['uf'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="uf" value="<?php echo $this->form_encode_input($uf) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_uf_line" id="hidden_field_data_uf" style="<?php echo $sStyleHidden_uf; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_uf_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_uf_label" style=""><span id="id_label_uf"><?php echo $this->nm_new_label['uf']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["uf"]) &&  $this->nmgp_cmp_readonly["uf"] == "on") { 

 ?>
<input type="hidden" name="uf" value="<?php echo $this->form_encode_input($uf) . "\">" . $uf . ""; ?>
<?php } else { ?>
<span id="id_read_on_uf" class="sc-ui-readonly-uf css_uf_line" style="<?php echo $sStyleReadLab_uf; ?>"><?php echo $this->form_format_readonly("uf", $this->form_encode_input($this->uf)); ?></span><span id="id_read_off_uf" class="css_read_off_uf<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_uf; ?>">
 <input class="sc-js-input scFormObjectOdd css_uf_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_uf" type=text name="uf" value="<?php echo $this->form_encode_input($uf) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_uf_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_uf_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['data_abertura_pessoas']))
    {
        $this->nm_new_label['data_abertura_pessoas'] = "Data Abertura Pessoas";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $data_abertura_pessoas = $this->data_abertura_pessoas;
   $sStyleHidden_data_abertura_pessoas = '';
   if (isset($this->nmgp_cmp_hidden['data_abertura_pessoas']) && $this->nmgp_cmp_hidden['data_abertura_pessoas'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['data_abertura_pessoas']);
       $sStyleHidden_data_abertura_pessoas = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_data_abertura_pessoas = 'display: none;';
   $sStyleReadInp_data_abertura_pessoas = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['data_abertura_pessoas']) && $this->nmgp_cmp_readonly['data_abertura_pessoas'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['data_abertura_pessoas']);
       $sStyleReadLab_data_abertura_pessoas = '';
       $sStyleReadInp_data_abertura_pessoas = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['data_abertura_pessoas']) && $this->nmgp_cmp_hidden['data_abertura_pessoas'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="data_abertura_pessoas" value="<?php echo $this->form_encode_input($data_abertura_pessoas) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_data_abertura_pessoas_line" id="hidden_field_data_data_abertura_pessoas" style="<?php echo $sStyleHidden_data_abertura_pessoas; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_data_abertura_pessoas_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_data_abertura_pessoas_label" style=""><span id="id_label_data_abertura_pessoas"><?php echo $this->nm_new_label['data_abertura_pessoas']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["data_abertura_pessoas"]) &&  $this->nmgp_cmp_readonly["data_abertura_pessoas"] == "on") { 

 ?>
<input type="hidden" name="data_abertura_pessoas" value="<?php echo $this->form_encode_input($data_abertura_pessoas) . "\">" . $data_abertura_pessoas . ""; ?>
<?php } else { ?>
<span id="id_read_on_data_abertura_pessoas" class="sc-ui-readonly-data_abertura_pessoas css_data_abertura_pessoas_line" style="<?php echo $sStyleReadLab_data_abertura_pessoas; ?>"><?php echo $this->form_format_readonly("data_abertura_pessoas", $this->form_encode_input($data_abertura_pessoas)); ?></span><span id="id_read_off_data_abertura_pessoas" class="css_read_off_data_abertura_pessoas<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_data_abertura_pessoas; ?>"><?php
$tmp_form_data = $this->field_config['data_abertura_pessoas']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_data_abertura_pessoas_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_data_abertura_pessoas" type=text name="data_abertura_pessoas" value="<?php echo $this->form_encode_input($data_abertura_pessoas) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['data_abertura_pessoas']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['data_abertura_pessoas']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_data_abertura_pessoas_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_data_abertura_pessoas_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['conselhosimounao']))
   {
       $this->nm_new_label['conselhosimounao'] = "Tem conselho ?";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $conselhosimounao = $this->conselhosimounao;
   $sStyleHidden_conselhosimounao = '';
   if (isset($this->nmgp_cmp_hidden['conselhosimounao']) && $this->nmgp_cmp_hidden['conselhosimounao'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['conselhosimounao']);
       $sStyleHidden_conselhosimounao = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_conselhosimounao = 'display: none;';
   $sStyleReadInp_conselhosimounao = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['conselhosimounao']) && $this->nmgp_cmp_readonly['conselhosimounao'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['conselhosimounao']);
       $sStyleReadLab_conselhosimounao = '';
       $sStyleReadInp_conselhosimounao = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['conselhosimounao']) && $this->nmgp_cmp_hidden['conselhosimounao'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="conselhosimounao" value="<?php echo $this->form_encode_input($this->conselhosimounao) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_conselhosimounao_line" id="hidden_field_data_conselhosimounao" style="<?php echo $sStyleHidden_conselhosimounao; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_conselhosimounao_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_conselhosimounao_label" style=""><span id="id_label_conselhosimounao"><?php echo $this->nm_new_label['conselhosimounao']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["conselhosimounao"]) &&  $this->nmgp_cmp_readonly["conselhosimounao"] == "on") { 

$conselhosimounao_look = "";
 if ($this->conselhosimounao == "S") { $conselhosimounao_look .= "Sim" ;} 
 if ($this->conselhosimounao == "N") { $conselhosimounao_look .= "Não" ;} 
 if (empty($conselhosimounao_look)) { $conselhosimounao_look = $this->conselhosimounao; }
?>
<input type="hidden" name="conselhosimounao" value="<?php echo $this->form_encode_input($conselhosimounao) . "\">" . $conselhosimounao_look . ""; ?>
<?php } else { ?>
<?php

$conselhosimounao_look = "";
 if ($this->conselhosimounao == "S") { $conselhosimounao_look .= "Sim" ;} 
 if ($this->conselhosimounao == "N") { $conselhosimounao_look .= "Não" ;} 
 if (empty($conselhosimounao_look)) { $conselhosimounao_look = $this->conselhosimounao; }
?>
<span id="id_read_on_conselhosimounao" class="css_conselhosimounao_line"  style="<?php echo $sStyleReadLab_conselhosimounao; ?>"><?php echo $this->form_format_readonly("conselhosimounao", $this->form_encode_input($conselhosimounao_look)); ?></span><span id="id_read_off_conselhosimounao" class="css_read_off_conselhosimounao<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap; <?php echo $sStyleReadInp_conselhosimounao; ?>">
 <span id="idAjaxSelect_conselhosimounao" class="<?php echo $this->classes_100perc_fields['span_select'] ?>"><select class="sc-js-input scFormObjectOdd css_conselhosimounao_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_conselhosimounao" name="conselhosimounao" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['Lookup_conselhosimounao'][] = ''; ?>
 <option value="">Selecione</option>
 <option  value="S" <?php  if ($this->conselhosimounao == "S") { echo " selected" ;} ?>>Sim</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['Lookup_conselhosimounao'][] = 'S'; ?>
 <option  value="N" <?php  if ($this->conselhosimounao == "N") { echo " selected" ;} ?>>Não</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['Lookup_conselhosimounao'][] = 'N'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_conselhosimounao_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_conselhosimounao_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['idconselho_classe']))
   {
       $this->nm_new_label['idconselho_classe'] = "Conselho";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idconselho_classe = $this->idconselho_classe;
   $sStyleHidden_idconselho_classe = '';
   if (isset($this->nmgp_cmp_hidden['idconselho_classe']) && $this->nmgp_cmp_hidden['idconselho_classe'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idconselho_classe']);
       $sStyleHidden_idconselho_classe = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idconselho_classe = 'display: none;';
   $sStyleReadInp_idconselho_classe = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['idconselho_classe']) && $this->nmgp_cmp_readonly['idconselho_classe'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idconselho_classe']);
       $sStyleReadLab_idconselho_classe = '';
       $sStyleReadInp_idconselho_classe = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idconselho_classe']) && $this->nmgp_cmp_hidden['idconselho_classe'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idconselho_classe" value="<?php echo $this->form_encode_input($this->idconselho_classe) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idconselho_classe_line" id="hidden_field_data_idconselho_classe" style="<?php echo $sStyleHidden_idconselho_classe; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idconselho_classe_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idconselho_classe_label" style=""><span id="id_label_idconselho_classe"><?php echo $this->nm_new_label['idconselho_classe']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["idconselho_classe"]) &&  $this->nmgp_cmp_readonly["idconselho_classe"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['Lookup_idconselho_classe']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['Lookup_idconselho_classe'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['Lookup_idconselho_classe']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['Lookup_idconselho_classe'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['Lookup_idconselho_classe']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['Lookup_idconselho_classe'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['Lookup_idconselho_classe']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['Lookup_idconselho_classe'] = array(); 
    }

   $old_value_idpessoas = $this->idpessoas;
   $old_value_idempresa = $this->idempresa;
   $old_value_cpf_cnpj = $this->cpf_cnpj;
   $old_value_momento = $this->momento;
   $old_value_momento_hora = $this->momento_hora;
   $old_value_data_abertura_pessoas = $this->data_abertura_pessoas;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idpessoas = $this->idpessoas;
   $unformatted_value_idempresa = $this->idempresa;
   $unformatted_value_cpf_cnpj = $this->cpf_cnpj;
   $unformatted_value_momento = $this->momento;
   $unformatted_value_momento_hora = $this->momento_hora;
   $unformatted_value_data_abertura_pessoas = $this->data_abertura_pessoas;

   $nm_comando = "SELECT idConselho_classe, sigla_conselho  FROM dbo.conselho_de_classe  ORDER BY sigla_conselho";

   $this->idpessoas = $old_value_idpessoas;
   $this->idempresa = $old_value_idempresa;
   $this->cpf_cnpj = $old_value_cpf_cnpj;
   $this->momento = $old_value_momento;
   $this->momento_hora = $old_value_momento_hora;
   $this->data_abertura_pessoas = $old_value_data_abertura_pessoas;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['Lookup_idconselho_classe'][] = $rs->fields[0];
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
   $idconselho_classe_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idconselho_classe_1))
          {
              foreach ($this->idconselho_classe_1 as $tmp_idconselho_classe)
              {
                  if (trim($tmp_idconselho_classe) === trim($cadaselect[1])) { $idconselho_classe_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idconselho_classe) === trim($cadaselect[1])) { $idconselho_classe_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idconselho_classe" value="<?php echo $this->form_encode_input($idconselho_classe) . "\">" . $idconselho_classe_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idconselho_classe();
   $x = 0 ; 
   $idconselho_classe_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idconselho_classe_1))
          {
              foreach ($this->idconselho_classe_1 as $tmp_idconselho_classe)
              {
                  if (trim($tmp_idconselho_classe) === trim($cadaselect[1])) { $idconselho_classe_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idconselho_classe) === trim($cadaselect[1])) { $idconselho_classe_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idconselho_classe_look))
          {
              $idconselho_classe_look = $this->idconselho_classe;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idconselho_classe\" class=\"css_idconselho_classe_line\" style=\"" .  $sStyleReadLab_idconselho_classe . "\">" . $this->form_format_readonly("idconselho_classe", $this->form_encode_input($idconselho_classe_look)) . "</span><span id=\"id_read_off_idconselho_classe\" class=\"css_read_off_idconselho_classe" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_idconselho_classe . "\">";
   echo " <span id=\"idAjaxSelect_idconselho_classe\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_idconselho_classe_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_idconselho_classe\" name=\"idconselho_classe\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['Lookup_idconselho_classe'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","Selecione") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idconselho_classe) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idconselho_classe)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idconselho_classe_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idconselho_classe_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['numero_conselho']))
    {
        $this->nm_new_label['numero_conselho'] = "Nº Conselho";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $numero_conselho = $this->numero_conselho;
   $sStyleHidden_numero_conselho = '';
   if (isset($this->nmgp_cmp_hidden['numero_conselho']) && $this->nmgp_cmp_hidden['numero_conselho'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['numero_conselho']);
       $sStyleHidden_numero_conselho = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_numero_conselho = 'display: none;';
   $sStyleReadInp_numero_conselho = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['numero_conselho']) && $this->nmgp_cmp_readonly['numero_conselho'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['numero_conselho']);
       $sStyleReadLab_numero_conselho = '';
       $sStyleReadInp_numero_conselho = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['numero_conselho']) && $this->nmgp_cmp_hidden['numero_conselho'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="numero_conselho" value="<?php echo $this->form_encode_input($numero_conselho) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_numero_conselho_line" id="hidden_field_data_numero_conselho" style="<?php echo $sStyleHidden_numero_conselho; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_numero_conselho_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_numero_conselho_label" style=""><span id="id_label_numero_conselho"><?php echo $this->nm_new_label['numero_conselho']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["numero_conselho"]) &&  $this->nmgp_cmp_readonly["numero_conselho"] == "on") { 

 ?>
<input type="hidden" name="numero_conselho" value="<?php echo $this->form_encode_input($numero_conselho) . "\">" . $numero_conselho . ""; ?>
<?php } else { ?>
<span id="id_read_on_numero_conselho" class="sc-ui-readonly-numero_conselho css_numero_conselho_line" style="<?php echo $sStyleReadLab_numero_conselho; ?>"><?php echo $this->form_format_readonly("numero_conselho", $this->form_encode_input($this->numero_conselho)); ?></span><span id="id_read_off_numero_conselho" class="css_read_off_numero_conselho<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_numero_conselho; ?>">
 <input class="sc-js-input scFormObjectOdd css_numero_conselho_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_numero_conselho" type=text name="numero_conselho" value="<?php echo $this->form_encode_input($numero_conselho) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=50"; } ?> maxlength=150 alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_numero_conselho_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_numero_conselho_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_numero_conselho_dumb = ('' == $sStyleHidden_numero_conselho) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_numero_conselho_dumb" style="<?php echo $sStyleHidden_numero_conselho_dumb; ?>"></TD>
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
    if (!isset($this->nm_new_label['socios']))
    {
        $this->nm_new_label['socios'] = "Sócios";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $socios = $this->socios;
   $sStyleHidden_socios = '';
   if (isset($this->nmgp_cmp_hidden['socios']) && $this->nmgp_cmp_hidden['socios'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['socios']);
       $sStyleHidden_socios = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_socios = 'display: none;';
   $sStyleReadInp_socios = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['socios']) && $this->nmgp_cmp_readonly['socios'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['socios']);
       $sStyleReadLab_socios = '';
       $sStyleReadInp_socios = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['socios']) && $this->nmgp_cmp_hidden['socios'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="socios" value="<?php echo $this->form_encode_input($socios) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_socios_line" id="hidden_field_data_socios" style="<?php echo $sStyleHidden_socios; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_socios_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Socios'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Socios'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_socios_mob_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Socios'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_socios_mob_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_socios_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_socios_mob']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_socios_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_socios_mob']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_socios_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_socios_mob']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_socios_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_socios_mob']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_socios_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_socios_mob']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_socios_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_socios_mob']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_socios_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_socios_mob']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_socios_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_socios_mob']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_socios_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_socios_mob']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_socios_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_socios_mob']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_socios_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_socios_mob']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_socios_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_socios_mob']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_socios_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_socios_mob']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_socios_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_socios_mob']['foreign_key']['idpessoas'] = $this->nmgp_dados_form['idpessoas'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_socios_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_socios_mob']['where_filter'] = "idPessoas = " . $this->nmgp_dados_form['idpessoas'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_socios_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_socios_mob']['where_detal']  = "idPessoas = " . $this->nmgp_dados_form['idpessoas'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_socios_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_mob']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_socios_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_socios_mob']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_dbo_pessoa_juridica_fisica_mob_empty.htm' : $this->Ini->link_form_dbo_pessoa_juridica_fisica_socios_mob_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y';
 foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_socios_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_socios_mob'] as $i => $v)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_socios_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_socios'][$i] = $v;
 }
if (isset($this->Ini->sc_lig_target['C_@scinf_Socios']) && 'nmsc_iframe_liga_form_dbo_pessoa_juridica_fisica_socios_mob' != $this->Ini->sc_lig_target['C_@scinf_Socios'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_Socios'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_socios_mob_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_Socios'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_dbo_pessoa_juridica_fisica_socios_mob"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_dbo_pessoa_juridica_fisica_socios_mob"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_socios_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_socios_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_socios_dumb = ('' == $sStyleHidden_socios) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_socios_dumb" style="<?php echo $sStyleHidden_socios_dumb; ?>"></TD>
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
    if (!isset($this->nm_new_label['impostos']))
    {
        $this->nm_new_label['impostos'] = "impostos";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $impostos = $this->impostos;
   $sStyleHidden_impostos = '';
   if (isset($this->nmgp_cmp_hidden['impostos']) && $this->nmgp_cmp_hidden['impostos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['impostos']);
       $sStyleHidden_impostos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_impostos = 'display: none;';
   $sStyleReadInp_impostos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['impostos']) && $this->nmgp_cmp_readonly['impostos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['impostos']);
       $sStyleReadLab_impostos = '';
       $sStyleReadInp_impostos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['impostos']) && $this->nmgp_cmp_hidden['impostos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="impostos" value="<?php echo $this->form_encode_input($impostos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_impostos_line" id="hidden_field_data_impostos" style="<?php echo $sStyleHidden_impostos; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_impostos_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_impostos'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_impostos'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_impostos_mob_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_impostos'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_impostos_mob_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_impostos_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_impostos_mob']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_impostos_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_impostos_mob']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_impostos_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_impostos_mob']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_impostos_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_impostos_mob']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_impostos_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_impostos_mob']['embutida_liga_form_insert'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_impostos_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_impostos_mob']['embutida_liga_form_update'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_impostos_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_impostos_mob']['embutida_liga_form_delete'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_impostos_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_impostos_mob']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_impostos_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_impostos_mob']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_impostos_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_impostos_mob']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_impostos_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_impostos_mob']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_impostos_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_impostos_mob']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_impostos_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_impostos_mob']['embutida_parms'] = "usr_idpessoas*scin" . $this->nmgp_dados_form['idpessoas'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_impostos_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_impostos_mob']['foreign_key']['idpessoas'] = $this->nmgp_dados_form['idpessoas'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_impostos_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_impostos_mob']['where_filter'] = "idPessoas = " . $this->nmgp_dados_form['idpessoas'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_impostos_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_impostos_mob']['where_detal']  = "idPessoas = " . $this->nmgp_dados_form['idpessoas'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_impostos_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_mob']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_impostos_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_impostos_mob']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_dbo_pessoa_juridica_fisica_mob_empty.htm' : $this->Ini->link_form_dbo_pessoa_juridica_fisica_impostos_mob_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y';
 foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_impostos_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_impostos_mob'] as $i => $v)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_impostos_mob_script_case_init'] ]['form_dbo_pessoa_juridica_fisica_impostos'][$i] = $v;
 }
if (isset($this->Ini->sc_lig_target['C_@scinf_impostos']) && 'nmsc_iframe_liga_form_dbo_pessoa_juridica_fisica_impostos_mob' != $this->Ini->sc_lig_target['C_@scinf_impostos'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_impostos'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['form_dbo_pessoa_juridica_fisica_impostos_mob_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_impostos'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_dbo_pessoa_juridica_fisica_impostos_mob"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_dbo_pessoa_juridica_fisica_impostos_mob"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_impostos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_impostos_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColor">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-bottom" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['birpara']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['birpara']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['birpara']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['birpara']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['birpara'];
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
              $obj_sel = ($this->sc_max_reg == '1') ? " selected" : "";
?> 
           <option value="1" <?php echo $obj_sel ?>>1</option>
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
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-27';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['first']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['first']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['first']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['first']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['first'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-28';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['back']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['back']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['back']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['back']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['back'];
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
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-29';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['forward']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['forward']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['forward']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['forward']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['forward'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-30';
        $buttonMacroLabel = "";
        
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['last']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_disabled']['last']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['last']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['last']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['btn_label']['last'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = 'hidden';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
$(window).bind("load", function() {
<?php
  $nm_sc_blocos_da_pag = array(0,1,2);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = '';";
      }
  }
?>
});
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_dbo_pessoa_juridica_fisica_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_dbo_pessoa_juridica_fisica_mob");
 parent.scAjaxDetailHeight("form_dbo_pessoa_juridica_fisica_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_dbo_pessoa_juridica_fisica_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_dbo_pessoa_juridica_fisica_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['sc_modal'])
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
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-2").length && $("#sc_b_ins_t.sc-unique-btn-2").is(":visible")) {
		    if ($("#sc_b_ins_t.sc-unique-btn-2").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('incluir');
			 return;
		}
		if ($("#sc_b_new_t.sc-unique-btn-16").length && $("#sc_b_new_t.sc-unique-btn-16").is(":visible")) {
		    if ($("#sc_b_new_t.sc-unique-btn-16").hasClass("disabled")) {
		        return;
		    }
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-17").length && $("#sc_b_ins_t.sc-unique-btn-17").is(":visible")) {
		    if ($("#sc_b_ins_t.sc-unique-btn-17").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-3").hasClass("disabled")) {
		        return;
		    }
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-18").length && $("#sc_b_sai_t.sc-unique-btn-18").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-18").hasClass("disabled")) {
		        return;
		    }
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-4").length && $("#sc_b_upd_t.sc-unique-btn-4").is(":visible")) {
		    if ($("#sc_b_upd_t.sc-unique-btn-4").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('alterar');
			 return;
		}
		if ($("#sc_b_upd_t.sc-unique-btn-19").length && $("#sc_b_upd_t.sc-unique-btn-19").is(":visible")) {
		    if ($("#sc_b_upd_t.sc-unique-btn-19").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_exc() {
		if ($("#sc_b_del_t.sc-unique-btn-5").length && $("#sc_b_del_t.sc-unique-btn-5").is(":visible")) {
		    if ($("#sc_b_del_t.sc-unique-btn-5").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('excluir');
			 return;
		}
		if ($("#sc_b_del_t.sc-unique-btn-20").length && $("#sc_b_del_t.sc-unique-btn-20").is(":visible")) {
		    if ($("#sc_b_del_t.sc-unique-btn-20").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('excluir');
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
		if ($("#sc_b_reload_t.sc-unique-btn-21").length && $("#sc_b_reload_t.sc-unique-btn-21").is(":visible")) {
		    if ($("#sc_b_reload_t.sc-unique-btn-21").hasClass("disabled")) {
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
		if ($("#sc_b_sai_t.sc-unique-btn-22").length && $("#sc_b_sai_t.sc-unique-btn-22").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-22").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-23").length && $("#sc_b_sai_t.sc-unique-btn-23").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-23").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-24").length && $("#sc_b_sai_t.sc-unique-btn-24").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-24").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-25").length && $("#sc_b_sai_t.sc-unique-btn-25").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-25").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-26").length && $("#sc_b_sai_t.sc-unique-btn-26").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-26").hasClass("disabled")) {
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
		if ($("#sc_b_ini_b.sc-unique-btn-27").length && $("#sc_b_ini_b.sc-unique-btn-27").is(":visible")) {
		    if ($("#sc_b_ini_b.sc-unique-btn-27").hasClass("disabled")) {
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
		if ($("#sc_b_ret_b.sc-unique-btn-28").length && $("#sc_b_ret_b.sc-unique-btn-28").is(":visible")) {
		    if ($("#sc_b_ret_b.sc-unique-btn-28").hasClass("disabled")) {
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
		if ($("#sc_b_avc_b.sc-unique-btn-29").length && $("#sc_b_avc_b.sc-unique-btn-29").is(":visible")) {
		    if ($("#sc_b_avc_b.sc-unique-btn-29").hasClass("disabled")) {
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
		if ($("#sc_b_fim_b.sc-unique-btn-30").length && $("#sc_b_fim_b.sc-unique-btn-30").is(":visible")) {
		    if ($("#sc_b_fim_b.sc-unique-btn-30").hasClass("disabled")) {
		        return;
		    }
			nm_move ('final');
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
<span id="sc-id-mobile-out"><?php echo $this->Ini->Nm_lang['lang_version_web']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_dbo_pessoa_juridica_fisica_mob']['buttonStatus'] = $this->nmgp_botoes;
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
