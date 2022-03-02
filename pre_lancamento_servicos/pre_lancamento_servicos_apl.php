<?php
//
class pre_lancamento_servicos_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $formatado = false;
   var $use_100perc_fields = false;
   var $classes_100perc_fields = array();
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'            => '',
                                'param'             => array(),
                                'autoComp'          => '',
                                'rsSize'            => '',
                                'msgDisplay'        => '',
                                'errList'           => array(),
                                'fldList'           => array(),
                                'varList'           => array(),
                                'focus'             => '',
                                'navStatus'         => array(),
                                'redir'             => array(),
                                'blockDisplay'      => array(),
                                'fieldDisplay'      => array(),
                                'fieldLabel'        => array(),
                                'readOnly'          => array(),
                                'btnVars'           => array(),
                                'ajaxAlert'         => array(),
                                'ajaxMessage'       => array(),
                                'ajaxJavascript'    => array(),
                                'buttonDisplay'     => array(),
                                'buttonDisplayVert' => array(),
                                'calendarReload'    => false,
                                'quickSearchRes'    => false,
                                'displayMsg'        => false,
                                'displayMsgTxt'     => '',
                                'dyn_search'        => array(),
                                'empty_filter'      => '',
                                'event_field'       => '',
                                'fieldsWithErrors'  => array(),
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $idpre_lancamento;
   var $data_do_servico;
   var $idespecialidade_servicos;
   var $idespecialidade_servicos_1;
   var $momento;
   var $momento_hora;
   var $usuario;
   var $idpessoas;
   var $idpessoas_1;
   var $idprofissional;
   var $idprofissional_1;
   var $num_guia;
   var $anexo_guia;
   var $anexo_guia_scfile_name;
   var $anexo_guia_ul_name;
   var $anexo_guia_scfile_type;
   var $anexo_guia_ul_type;
   var $anexo_guia_limpa;
   var $anexo_guia_salva;
   var $out_anexo_guia;
   var $__calend_all_day__;
   var $__calend_all_day___1;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = true;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
   var $record_insert_ok = false;
   var $record_delete_ok = false;
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['__calend_all_day__']))
          {
              $this->__calend_all_day__ = $this->NM_ajax_info['param']['__calend_all_day__'];
          }
          if (isset($this->NM_ajax_info['param']['anexo_guia']))
          {
              $this->anexo_guia = $this->NM_ajax_info['param']['anexo_guia'];
          }
          if (isset($this->NM_ajax_info['param']['anexo_guia_limpa']))
          {
              $this->anexo_guia_limpa = $this->NM_ajax_info['param']['anexo_guia_limpa'];
          }
          if (isset($this->NM_ajax_info['param']['anexo_guia_ul_name']))
          {
              $this->anexo_guia_ul_name = $this->NM_ajax_info['param']['anexo_guia_ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['anexo_guia_ul_type']))
          {
              $this->anexo_guia_ul_type = $this->NM_ajax_info['param']['anexo_guia_ul_type'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['data_do_servico']))
          {
              $this->data_do_servico = $this->NM_ajax_info['param']['data_do_servico'];
          }
          if (isset($this->NM_ajax_info['param']['idespecialidade_servicos']))
          {
              $this->idespecialidade_servicos = $this->NM_ajax_info['param']['idespecialidade_servicos'];
          }
          if (isset($this->NM_ajax_info['param']['idpessoas']))
          {
              $this->idpessoas = $this->NM_ajax_info['param']['idpessoas'];
          }
          if (isset($this->NM_ajax_info['param']['idpre_lancamento']))
          {
              $this->idpre_lancamento = $this->NM_ajax_info['param']['idpre_lancamento'];
          }
          if (isset($this->NM_ajax_info['param']['idprofissional']))
          {
              $this->idprofissional = $this->NM_ajax_info['param']['idprofissional'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['num_guia']))
          {
              $this->num_guia = $this->NM_ajax_info['param']['num_guia'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->sc_conv_var = array();
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (isset($this->sc_conv_var[$nmgp_campo]))
               {
                   $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
               {
                   $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
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
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
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
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['pre_lancamento_servicos']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['pre_lancamento_servicos']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['pre_lancamento_servicos']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['pre_lancamento_servicos']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['pre_lancamento_servicos']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $nmgp_parms = NM_decode_input($nmgp_parms);
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_pre_lancamento_servicos($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['pre_lancamento_servicos']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['pre_lancamento_servicos']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['pre_lancamento_servicos']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['pre_lancamento_servicos']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['pre_lancamento_servicos']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['pre_lancamento_servicos']['parms']);
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
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['pre_lancamento_servicos']['nm_run_menu'] = 1;
      } 
      if (isset($this->nmgp_opcao) && 'igual_calendar' == $this->nmgp_opcao) {
          $this->nmgp_opcao = 'igual';
          $this->idpre_lancamento = $this->__orig_idpre_lancamento;
      }

      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      if ('' == $this->nmgp_opcao && !$this->NM_ajax_flag)
      {
          $this->nmgp_opcao = 'calendar';
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['pre_lancamento_servicos']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['pre_lancamento_servicos']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['pre_lancamento_servicos']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['pre_lancamento_servicos']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['pre_lancamento_servicos']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['pre_lancamento_servicos']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['pre_lancamento_servicos']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new pre_lancamento_servicos_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("pt_br");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("pt_br");
      } 
      $_SESSION['sc_session'][$script_case_init]['pre_lancamento_servicos']['upload_field_info'] = array();

      $_SESSION['sc_session'][$script_case_init]['pre_lancamento_servicos']['upload_field_info']['anexo_guia'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'pre_lancamento_servicos',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_max_size'  => null,
          'upload_file_height' => '0',
          'upload_file_width'  => '0',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['pre_lancamento_servicos']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['pre_lancamento_servicos'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['pre_lancamento_servicos']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['pre_lancamento_servicos']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('pre_lancamento_servicos') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['pre_lancamento_servicos']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " dbo.pre_lancamento_servicos";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "pre_lancamento_servicos")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form    = trim($str_button);
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $_SESSION['scriptcase']['css_form_help'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form.css";
      $_SESSION['scriptcase']['css_form_help_dir'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      $this->Db = $this->Ini->Db; 
      $this->nm_new_label['__calend_all_day__'] = '' . $this->Ini->Nm_lang['lang_per_allday'] . '';

      $this->Ini->str_google_fonts = isset($str_google_fonts)?$str_google_fonts:'';
      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok       = "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err      = "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status          = "scFormInputError";
      $this->Ini->Css_status_pwd_box  = "scFormInputErrorPwdBox";
      $this->Ini->Css_status_pwd_text = "scFormInputErrorPwdText";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);
      $this->Ini->form_table_width     = isset($str_form_table_width) && '' != trim($str_form_table_width) ? $str_form_table_width : '';

        $this->classes_100perc_fields['table'] = '';
        $this->classes_100perc_fields['input'] = '';
        $this->classes_100perc_fields['span_input'] = '';
        $this->classes_100perc_fields['span_select'] = '';
        $this->classes_100perc_fields['style_category'] = '';
        $this->classes_100perc_fields['keep_field_size'] = true;



      $_SESSION['scriptcase']['error_icon']['pre_lancamento_servicos']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Lemon__NM__nm_scriptcase9_Lemon_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['pre_lancamento_servicos'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      if (isset($this->NM_ajax_info['param']['anexo_guia_ul_name']) && '' != $this->NM_ajax_info['param']['anexo_guia_ul_name'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['upload_field_ul_name'][$this->anexo_guia_ul_name]))
          {
              $this->NM_ajax_info['param']['anexo_guia_ul_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['upload_field_ul_name'][$this->anexo_guia_ul_name];
          }
          $this->anexo_guia = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['anexo_guia_ul_name'];
          $this->anexo_guia_scfile_name = substr($this->NM_ajax_info['param']['anexo_guia_ul_name'], 12);
          $this->anexo_guia_scfile_type = $this->NM_ajax_info['param']['anexo_guia_ul_type'];
          $this->anexo_guia_ul_name = $this->NM_ajax_info['param']['anexo_guia_ul_name'];
          $this->anexo_guia_ul_type = $this->NM_ajax_info['param']['anexo_guia_ul_type'];
      }
      elseif (isset($this->anexo_guia_ul_name) && '' != $this->anexo_guia_ul_name)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['upload_field_ul_name'][$this->anexo_guia_ul_name]))
          {
              $this->anexo_guia_ul_name = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['upload_field_ul_name'][$this->anexo_guia_ul_name];
          }
          $this->anexo_guia = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->anexo_guia_ul_name;
          $this->anexo_guia_scfile_name = substr($this->anexo_guia_ul_name, 12);
          $this->anexo_guia_scfile_type = $this->anexo_guia_ul_type;
      }

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "off";
      $this->nmgp_botoes['back'] = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last'] = "off";
      $this->nmgp_botoes['summary'] = "off";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['reload'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['pre_lancamento_servicos']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['pre_lancamento_servicos'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['pre_lancamento_servicos'];

              $this->nmgp_botoes['update']     = $tmpDashboardButtons['form_update']    ? 'on' : 'off';
              $this->nmgp_botoes['new']        = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['insert']     = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['delete']     = $tmpDashboardButtons['form_delete']    ? 'on' : 'off';
              $this->nmgp_botoes['copy']       = $tmpDashboardButtons['form_copy']      ? 'on' : 'off';
              $this->nmgp_botoes['first']      = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['back']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['last']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['forward']    = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['navpage']    = $tmpDashboardButtons['form_navpage']   ? 'on' : 'off';
              $this->nmgp_botoes['goto']       = $tmpDashboardButtons['form_goto']      ? 'on' : 'off';
              $this->nmgp_botoes['qtline']     = $tmpDashboardButtons['form_lineqty']   ? 'on' : 'off';
              $this->nmgp_botoes['summary']    = $tmpDashboardButtons['form_summary']   ? 'on' : 'off';
              $this->nmgp_botoes['qsearch']    = $tmpDashboardButtons['form_qsearch']   ? 'on' : 'off';
              $this->nmgp_botoes['dynsearch']  = $tmpDashboardButtons['form_dynsearch'] ? 'on' : 'off';
              $this->nmgp_botoes['reload']     = $tmpDashboardButtons['form_reload']    ? 'on' : 'off';
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }

      $this->nmgp_botoes['first']   = "off";
      $this->nmgp_botoes['back']    = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last']    = "off";

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['dados_form'];
          if (!isset($this->momento)){$this->momento = $this->nmgp_dados_form['momento'];} 
          if (!isset($this->usuario)){$this->usuario = $this->nmgp_dados_form['usuario'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("pre_lancamento_servicos", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
      if (isset($_GET['nm_cal_display']))
      {
          if ($this->Embutida_proc)
          { 
              include_once($this->Ini->path_embutida . 'pre_lancamento_servicos/pre_lancamento_servicos_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'pre_lancamento_servicos_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'pre_lancamento_servicos_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'pre_lancamento_servicos_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'pre_lancamento_servicos/pre_lancamento_servicos_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "pre_lancamento_servicos_erro.class.php"); 
      }
      $this->Erro      = new pre_lancamento_servicos_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['pre_lancamento_servicos']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['pre_lancamento_servicos']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['pre_lancamento_servicos']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$orig_img);
            echo $orig_img . '_@@NM@@_';

            if(file_exists($out1_img_cache)){
                echo $out1_img_cache;
                exit;
            }
            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            $sc_obj_img = new nm_trata_img($_SERVER['DOCUMENT_ROOT'].$out1_img_cache, true);

            if(!empty($img_width) && !empty($img_height)){
                $sc_obj_img->setWidth($img_width);
                $sc_obj_img->setHeight($img_height);
            }
                $sc_obj_img->setManterAspecto(true);
            $sc_obj_img->createImg($_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            echo $out1_img_cache;
               exit;
            }
      if (isset($this->idpre_lancamento)) { $this->nm_limpa_alfa($this->idpre_lancamento); }
      if (isset($this->idespecialidade_servicos)) { $this->nm_limpa_alfa($this->idespecialidade_servicos); }
      if (isset($this->idpessoas)) { $this->nm_limpa_alfa($this->idpessoas); }
      if (isset($this->idprofissional)) { $this->nm_limpa_alfa($this->idprofissional); }
      if (isset($this->num_guia)) { $this->nm_limpa_alfa($this->num_guia); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- idpre_lancamento
      $this->field_config['idpre_lancamento']               = array();
      $this->field_config['idpre_lancamento']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idpre_lancamento']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idpre_lancamento']['symbol_dec'] = '';
      $this->field_config['idpre_lancamento']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idpre_lancamento']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- num_guia
      $this->field_config['num_guia']               = array();
      $this->field_config['num_guia']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['num_guia']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['num_guia']['symbol_dec'] = '';
      $this->field_config['num_guia']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['num_guia']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- data_do_servico
      $this->field_config['data_do_servico']                 = array();
      $this->field_config['data_do_servico']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['data_do_servico']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['data_do_servico']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'data_do_servico');
      //-- momento
      $this->field_config['momento']                 = array();
      $this->field_config['momento']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['momento']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['momento']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['momento']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'momento');
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();

      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      if ($nm_form_submit == 1 && ($this->nmgp_opcao == 'inicio' || $this->nmgp_opcao == 'igual'))
      {
          $this->nm_tira_formatacao();
      }
      $this->calendarConfigValues = array(
          'insert'           => 'on' == $this->nmgp_botoes['insert'],
          'update'           => 'on' == $this->nmgp_botoes['update'],
          'delete'           => 'on' == $this->nmgp_botoes['delete'],
          'eventColorPast'   => 'scCalendarEventPast',
          'eventColorToday'  => 'scCalendarEventOnDay',
          'eventColorFuture' => 'scCalendarEventFuture',
      );
      if ('calendar' == $this->nmgp_opcao)
      {
          $this->calendarOutputDisplay();
          exit;
      }
      elseif ('importGoogleCalendarEvents' == $this->nmgp_opcao)
      {
         $this->calendarOutputImportGoogleCalendarEvents();
         exit;
      }
      elseif ('importGoogle' == $this->nmgp_opcao)
      {
         $this->calendarOutputImportGoogleDisplay();
         exit;
      }
      elseif ('exportGoogleCalendarEvents' == $this->nmgp_opcao)
      {
         $this->calendarExportEventsToGoogle();
         exit;
      }
      elseif ('exportGoogle' == $this->nmgp_opcao)
      {
         $this->calendarOutputExportEventsToGoogle();
         exit;
      }
      elseif ('calendar_fetch' == $this->nmgp_opcao)
      {
          $aEvents = $this->calendarFetchEvents();
          $this->calendarOutputJson($this->calendarNormalizeEvents($aEvents), true);
          exit;
      }
      elseif ('calendar_drop' == $this->nmgp_opcao)
      {
          $this->calendarOutputJson($this->calendarDragDrop());
          exit;
      }
      elseif ('calendar_resize' == $this->nmgp_opcao)
      {
          $this->calendarOutputJson($this->calendarResize());
          exit;
      }
      elseif ('calendar_print' == $this->nmgp_opcao)
      {
          $aEvents = $this->calendarFetchEvents('', true);
          $this->calendarOutputJson($this->calendarPrintEvents($this->calendarNormalizeEvents($aEvents)));
          exit;
      }

      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_idpre_lancamento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idpre_lancamento');
          }
          if ('validate_idespecialidade_servicos' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idespecialidade_servicos');
          }
          if ('validate_idpessoas' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idpessoas');
          }
          if ('validate_idprofissional' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idprofissional');
          }
          if ('validate_num_guia' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_guia');
          }
          if ('validate_anexo_guia' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'anexo_guia');
          }
          if ('validate_data_do_servico' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'data_do_servico');
          }
          if ('validate___calend_all_day__' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, '__calend_all_day__');
          }
          pre_lancamento_servicos_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->__calend_all_day__))
          {
              $x = 0; 
              $this->__calend_all_day___1 = $this->__calend_all_day__;
              $this->__calend_all_day__ = ""; 
              if ($this->__calend_all_day___1 != "") 
              { 
                  foreach ($this->__calend_all_day___1 as $dados___calend_all_day___1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->__calend_all_day__ .= ";";
                      } 
                      $this->__calend_all_day__ .= $dados___calend_all_day___1;
                      $x++ ; 
                  } 
              } 
          } 
          $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              pre_lancamento_servicos_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          if ($this->nmgp_opcao != "incluir")
          {
              $this->scFormFocusErrorName = '';
          }
          $_SESSION['scriptcase']['pre_lancamento_servicos']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  pre_lancamento_servicos_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, 4);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_evento == "update")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_evento == "delete")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          pre_lancamento_servicos_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          pre_lancamento_servicos_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
      $this->nmgp_opcao = ""; 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
   }
  function html_export_print($nm_arquivo_html, $nmgp_password)
  {
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "pre_lancamento_servicos.zip";
          $Arq_htm = $this->Ini->path_imag_temp . "/" . $Zip_name;
          $Arq_zip = $this->Ini->root . $Arq_htm;
          $Zip_f     = (FALSE !== strpos($Arq_zip, ' ')) ? " \"" . $Arq_zip . "\"" :  $Arq_zip;
          $Arq_input = (FALSE !== strpos($Arq_base, ' ')) ? " \"" . $Arq_base . "\"" :  $Arq_base;
           if (is_file($Arq_zip)) {
               unlink($Arq_zip);
           }
           $str_zip = "";
           if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
           {
               chdir($this->Ini->path_third . "/zip/windows");
               $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $Html_password . " " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
           {
                if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                {
                    chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                }
                else
                {
                    chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                }
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
           {
               chdir($this->Ini->path_third . "/zip/mac/bin");
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           if (!empty($str_zip)) {
               exec($str_zip);
           }
           // ----- ZIP log
           $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'w');
           if ($fp)
           {
               @fwrite($fp, $str_zip . "\r\n\r\n");
               @fclose($fp);
           }
           foreach ($this->Ini->Img_export_zip as $cada_img_zip)
           {
               $str_zip      = "";
              $cada_img_zip = '"' . $cada_img_zip . '"';
               if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
               {
                   $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $Html_password . " " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               if (!empty($str_zip)) {
                   exec($str_zip);
               }
               // ----- ZIP log
               $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
               if ($fp)
               {
                   @fwrite($fp, $str_zip . "\r\n\r\n");
                   @fclose($fp);
               }
           }
           if (is_file($Arq_zip)) {
               unlink($Arq_base);
           } 
          $path_doc_md5 = md5($Arq_htm);
          $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " dbo.pre_lancamento_servicos") ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" /> 
  <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__img__NM__ct_other_gauge.png">
</HEAD>
<BODY class="scExportPage">
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: top">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">PRINT</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
   <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo  $this->form_encode_input($Arq_htm) ?>" target="_self" style="display: none"> 
</form>
<form name="Fdown" method="get" action="pre_lancamento_servicos_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pre_lancamento_servicos"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="./" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nmgp_opcao" value="<?php echo $this->nmgp_opcao ?>"> 
</form> 
         </BODY>
         </HTML>
<?php
          exit;
  }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;

           case 4:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros_SweetAlert($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros_SweetAlert($Campos_Erros) 
   {
       $sError  = '';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= $this->Recupera_Nome_Campo($campo) . ': ' . implode('<br />', array_unique($erros)) . '<br />';
       }

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'idpre_lancamento':
               return "ID";
               break;
           case 'idespecialidade_servicos':
               return "Especialidade";
               break;
           case 'idpessoas':
               return "Pessoas Jurídica";
               break;
           case 'idprofissional':
               return "Profissional";
               break;
           case 'num_guia':
               return "Nº Guia";
               break;
           case 'anexo_guia':
               return "Anexo";
               break;
           case 'data_do_servico':
               return "Data";
               break;
           case '__calend_all_day__':
               return "" . $this->Ini->Nm_lang['lang_per_allday'] . "";
               break;
           case 'momento':
               return "Momento";
               break;
           case 'usuario':
               return "Usuario";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
     if (is_array($filtro) && empty($filtro)) {
         $filtro = '';
     }
//---------------------------------------------------------
     $this->scFormFocusErrorName = '';
     $this->sc_force_zero = array();

     if (!is_array($filtro) && '' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_pre_lancamento_servicos']) || !is_array($this->NM_ajax_info['errList']['geral_pre_lancamento_servicos']))
              {
                  $this->NM_ajax_info['errList']['geral_pre_lancamento_servicos'] = array();
              }
              $this->NM_ajax_info['errList']['geral_pre_lancamento_servicos'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if (isset($this->__calend_all_day__) && 'Y' == $this->__calend_all_day__)
      {
      }
      if ((!is_array($filtro) && ('' == $filtro || 'idpre_lancamento' == $filtro)) || (is_array($filtro) && in_array('idpre_lancamento', $filtro)))
        $this->ValidateField_idpre_lancamento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "idpre_lancamento";

      if ((!is_array($filtro) && ('' == $filtro || 'idespecialidade_servicos' == $filtro)) || (is_array($filtro) && in_array('idespecialidade_servicos', $filtro)))
        $this->ValidateField_idespecialidade_servicos($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "idespecialidade_servicos";

      if ((!is_array($filtro) && ('' == $filtro || 'idpessoas' == $filtro)) || (is_array($filtro) && in_array('idpessoas', $filtro)))
        $this->ValidateField_idpessoas($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "idpessoas";

      if ((!is_array($filtro) && ('' == $filtro || 'idprofissional' == $filtro)) || (is_array($filtro) && in_array('idprofissional', $filtro)))
        $this->ValidateField_idprofissional($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "idprofissional";

      if ((!is_array($filtro) && ('' == $filtro || 'num_guia' == $filtro)) || (is_array($filtro) && in_array('num_guia', $filtro)))
        $this->ValidateField_num_guia($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "num_guia";

      if ((!is_array($filtro) && ('' == $filtro || 'anexo_guia' == $filtro)) || (is_array($filtro) && in_array('anexo_guia', $filtro)))
        $this->ValidateField_anexo_guia($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "anexo_guia";

      if ((!is_array($filtro) && ('' == $filtro || 'data_do_servico' == $filtro)) || (is_array($filtro) && in_array('data_do_servico', $filtro)))
        $this->ValidateField_data_do_servico($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "data_do_servico";

      if ((!is_array($filtro) && ('' == $filtro || '__calend_all_day__' == $filtro)) || (is_array($filtro) && in_array('__calend_all_day__', $filtro)))
        $this->ValidateField___calend_all_day__($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "__calend_all_day__";

      $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_idpre_lancamento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->idpre_lancamento === "" || is_null($this->idpre_lancamento))  
      { 
          $this->idpre_lancamento = 0;
      } 
      nm_limpa_numero($this->idpre_lancamento, $this->field_config['idpre_lancamento']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->idpre_lancamento != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->idpre_lancamento) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "ID: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['idpre_lancamento']))
                  {
                      $Campos_Erros['idpre_lancamento'] = array();
                  }
                  $Campos_Erros['idpre_lancamento'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['idpre_lancamento']) || !is_array($this->NM_ajax_info['errList']['idpre_lancamento']))
                  {
                      $this->NM_ajax_info['errList']['idpre_lancamento'] = array();
                  }
                  $this->NM_ajax_info['errList']['idpre_lancamento'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->idpre_lancamento, 19, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "ID; " ; 
                  if (!isset($Campos_Erros['idpre_lancamento']))
                  {
                      $Campos_Erros['idpre_lancamento'] = array();
                  }
                  $Campos_Erros['idpre_lancamento'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['idpre_lancamento']) || !is_array($this->NM_ajax_info['errList']['idpre_lancamento']))
                  {
                      $this->NM_ajax_info['errList']['idpre_lancamento'] = array();
                  }
                  $this->NM_ajax_info['errList']['idpre_lancamento'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idpre_lancamento';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idpre_lancamento

    function ValidateField_idespecialidade_servicos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->idespecialidade_servicos) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idespecialidade_servicos']) && !in_array($this->idespecialidade_servicos, $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idespecialidade_servicos']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['idespecialidade_servicos']))
                   {
                       $Campos_Erros['idespecialidade_servicos'] = array();
                   }
                   $Campos_Erros['idespecialidade_servicos'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['idespecialidade_servicos']) || !is_array($this->NM_ajax_info['errList']['idespecialidade_servicos']))
                   {
                       $this->NM_ajax_info['errList']['idespecialidade_servicos'] = array();
                   }
                   $this->NM_ajax_info['errList']['idespecialidade_servicos'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idespecialidade_servicos';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idespecialidade_servicos

    function ValidateField_idpessoas(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->idpessoas) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idpessoas']) && !in_array($this->idpessoas, $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idpessoas']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['idpessoas']))
                   {
                       $Campos_Erros['idpessoas'] = array();
                   }
                   $Campos_Erros['idpessoas'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['idpessoas']) || !is_array($this->NM_ajax_info['errList']['idpessoas']))
                   {
                       $this->NM_ajax_info['errList']['idpessoas'] = array();
                   }
                   $this->NM_ajax_info['errList']['idpessoas'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idpessoas';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idpessoas

    function ValidateField_idprofissional(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->idprofissional) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idprofissional']) && !in_array($this->idprofissional, $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idprofissional']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['idprofissional']))
                   {
                       $Campos_Erros['idprofissional'] = array();
                   }
                   $Campos_Erros['idprofissional'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['idprofissional']) || !is_array($this->NM_ajax_info['errList']['idprofissional']))
                   {
                       $this->NM_ajax_info['errList']['idprofissional'] = array();
                   }
                   $this->NM_ajax_info['errList']['idprofissional'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idprofissional';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idprofissional

    function ValidateField_num_guia(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->num_guia === "" || is_null($this->num_guia))  
      { 
          $this->num_guia = 0;
          $this->sc_force_zero[] = 'num_guia';
      } 
      nm_limpa_numero($this->num_guia, $this->field_config['num_guia']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->num_guia != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->num_guia) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Nº Guia: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['num_guia']))
                  {
                      $Campos_Erros['num_guia'] = array();
                  }
                  $Campos_Erros['num_guia'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['num_guia']) || !is_array($this->NM_ajax_info['errList']['num_guia']))
                  {
                      $this->NM_ajax_info['errList']['num_guia'] = array();
                  }
                  $this->NM_ajax_info['errList']['num_guia'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->num_guia, 19, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Nº Guia; " ; 
                  if (!isset($Campos_Erros['num_guia']))
                  {
                      $Campos_Erros['num_guia'] = array();
                  }
                  $Campos_Erros['num_guia'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['num_guia']) || !is_array($this->NM_ajax_info['errList']['num_guia']))
                  {
                      $this->NM_ajax_info['errList']['num_guia'] = array();
                  }
                  $this->NM_ajax_info['errList']['num_guia'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'num_guia';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_num_guia

    function ValidateField_anexo_guia(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
        if ($this->nmgp_opcao != "excluir")
        {
            $sTestFile = $this->anexo_guia;
            if ("" != $this->anexo_guia && "S" != $this->anexo_guia_limpa && !$teste_validade->ArqExtensao($this->anexo_guia, array()))
            {
                $hasError = true;
                $Campos_Crit .= "Anexo: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['anexo_guia']))
                {
                    $Campos_Erros['anexo_guia'] = array();
                }
                $Campos_Erros['anexo_guia'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['anexo_guia']) || !is_array($this->NM_ajax_info['errList']['anexo_guia']))
                {
                    $this->NM_ajax_info['errList']['anexo_guia'] = array();
                }
                $this->NM_ajax_info['errList']['anexo_guia'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
        }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'anexo_guia';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_anexo_guia

    function ValidateField_data_do_servico(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->data_do_servico, $this->field_config['data_do_servico']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['data_do_servico']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['data_do_servico']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['data_do_servico']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['data_do_servico']['date_sep']) ; 
          if (trim($this->data_do_servico) != "")  
          { 
              if ($teste_validade->Data($this->data_do_servico, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Data; " ; 
                  if (!isset($Campos_Erros['data_do_servico']))
                  {
                      $Campos_Erros['data_do_servico'] = array();
                  }
                  $Campos_Erros['data_do_servico'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['data_do_servico']) || !is_array($this->NM_ajax_info['errList']['data_do_servico']))
                  {
                      $this->NM_ajax_info['errList']['data_do_servico'] = array();
                  }
                  $this->NM_ajax_info['errList']['data_do_servico'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['php_cmp_required']['data_do_servico']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['php_cmp_required']['data_do_servico'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Data" ; 
              if (!isset($Campos_Erros['data_do_servico']))
              {
                  $Campos_Erros['data_do_servico'] = array();
              }
              $Campos_Erros['data_do_servico'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['data_do_servico']) || !is_array($this->NM_ajax_info['errList']['data_do_servico']))
                  {
                      $this->NM_ajax_info['errList']['data_do_servico'] = array();
                  }
                  $this->NM_ajax_info['errList']['data_do_servico'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
          $this->field_config['data_do_servico']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'data_do_servico';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_data_do_servico

    function ValidateField___calend_all_day__(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->__calend_all_day__ == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->__calend_all_day__))
          {
              $x = 0; 
              $this->__calend_all_day___1 = array(); 
              foreach ($this->__calend_all_day__ as $ind => $dados___calend_all_day___1 ) 
              {
                  if ($dados___calend_all_day___1 != "") 
                  {
                      $this->__calend_all_day___1[] = $dados___calend_all_day___1;
                  } 
              } 
              $this->__calend_all_day__ = ""; 
              foreach ($this->__calend_all_day___1 as $dados___calend_all_day___1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->__calend_all_day__ .= ";";
                   } 
                   $this->__calend_all_day__ .= $dados___calend_all_day___1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = '__calend_all_day__';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField___calend_all_day__
//
//--------------------------------------------------------------------------------------
   function upload_img_doc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser;
     if (!empty($Campos_Crit) || !empty($Campos_Falta))
     {
          return;
     }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->anexo_guia == "none") 
          { 
              $this->anexo_guia = ""; 
          } 
          if ($this->anexo_guia != "") 
          { 
              if (!function_exists('sc_upload_unprotect_chars'))
              {
                  include_once 'pre_lancamento_servicos_doc_name.php';
              }
              $this->anexo_guia = sc_upload_unprotect_chars($this->anexo_guia);
              $this->anexo_guia_scfile_name = sc_upload_unprotect_chars($this->anexo_guia_scfile_name);
              if ($nm_browser == "Opera")  
              { 
                  $this->anexo_guia_scfile_type = substr($this->anexo_guia_scfile_type, 0, strpos($this->anexo_guia_scfile_type, ";")) ; 
              } 
              if ($this->anexo_guia_scfile_type == "image/pjpeg" || $this->anexo_guia_scfile_type == "image/jpeg" || $this->anexo_guia_scfile_type == "image/gif" ||  
                  $this->anexo_guia_scfile_type == "image/png" || $this->anexo_guia_scfile_type == "image/x-png" || $this->anexo_guia_scfile_type == "image/bmp")  
              { 
                  if (is_file($this->anexo_guia))  
                  { 
                      $this->NM_size_docs[$this->anexo_guia_scfile_name] = $this->sc_file_size($this->anexo_guia);
                      $reg_anexo_guia = file_get_contents($this->anexo_guia); 
                      $this->anexo_guia = $reg_anexo_guia; 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "Anexo " . $this->Ini->Nm_lang['lang_errm_upld']; 
                      $this->anexo_guia = "";
                      if (!isset($Campos_Erros['anexo_guia']))
                      {
                          $Campos_Erros['anexo_guia'] = array();
                      }
                      $Campos_Erros['anexo_guia'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                      if (!isset($this->NM_ajax_info['errList']['anexo_guia']) || !is_array($this->NM_ajax_info['errList']['anexo_guia']))
                      {
                          $this->NM_ajax_info['errList']['anexo_guia'] = array();
                      }
                      $this->NM_ajax_info['errList']['anexo_guia'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  } 
              } 
              else 
              { 
                  if ($nm_browser == "Konqueror")  
                  { 
                      $this->anexo_guia = "" ; 
                  } 
                  else 
                  { 
                     $Campos_Crit .= "Anexo " . $this->Ini->Nm_lang['lang_errm_ivtp'];  
                      if (!isset($Campos_Erros['anexo_guia']))
                      {
                          $Campos_Erros['anexo_guia'] = array();
                      }
                      $Campos_Erros['anexo_guia'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                      if (!isset($this->NM_ajax_info['errList']['anexo_guia']) || !is_array($this->NM_ajax_info['errList']['anexo_guia']))
                      {
                          $this->NM_ajax_info['errList']['anexo_guia'] = array();
                      }
                      $this->NM_ajax_info['errList']['anexo_guia'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                  } 
              } 
          } 
          elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['dados_form']['anexo_guia']) && $this->anexo_guia_limpa != "S")
          {
              $this->anexo_guia = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['dados_form']['anexo_guia'];
          }
      } 
   }

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['idpre_lancamento'] = $this->idpre_lancamento;
    $this->nmgp_dados_form['idespecialidade_servicos'] = $this->idespecialidade_servicos;
    $this->nmgp_dados_form['idpessoas'] = $this->idpessoas;
    $this->nmgp_dados_form['idprofissional'] = $this->idprofissional;
    $this->nmgp_dados_form['num_guia'] = $this->num_guia;
    if (empty($this->anexo_guia))
    {
        $this->anexo_guia = $this->nmgp_dados_form['anexo_guia'];
    }
    $this->nmgp_dados_form['anexo_guia'] = $this->anexo_guia;
    $this->nmgp_dados_form['anexo_guia_limpa'] = $this->anexo_guia_limpa;
    $this->nmgp_dados_form['data_do_servico'] = (strlen(trim($this->data_do_servico)) > 19) ? str_replace(".", ":", $this->data_do_servico) : trim($this->data_do_servico);
    $this->nmgp_dados_form['__calend_all_day__'] = $this->__calend_all_day__;
    $this->nmgp_dados_form['momento'] = $this->momento;
    $this->nmgp_dados_form['usuario'] = $this->usuario;
    $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['idpre_lancamento'] = $this->idpre_lancamento;
      nm_limpa_numero($this->idpre_lancamento, $this->field_config['idpre_lancamento']['symbol_grp']) ; 
      $this->Before_unformat['num_guia'] = $this->num_guia;
      nm_limpa_numero($this->num_guia, $this->field_config['num_guia']['symbol_grp']) ; 
      $this->Before_unformat['data_do_servico'] = $this->data_do_servico;
      nm_limpa_data($this->data_do_servico, $this->field_config['data_do_servico']['date_sep']) ; 
      $this->Before_unformat['momento'] = $this->momento;
      $this->Before_unformat['momento_hora'] = $this->momento_hora;
      nm_limpa_data($this->momento, $this->field_config['momento']['date_sep']) ; 
      nm_limpa_hora($this->momento_hora, $this->field_config['momento']['time_sep']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~i', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "idpre_lancamento")
      {
          nm_limpa_numero($this->idpre_lancamento, $this->field_config['idpre_lancamento']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "num_guia")
      {
          nm_limpa_numero($this->num_guia, $this->field_config['num_guia']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if ('' !== $this->idpre_lancamento || (!empty($format_fields) && isset($format_fields['idpre_lancamento'])))
      {
          nmgp_Form_Num_Val($this->idpre_lancamento, $this->field_config['idpre_lancamento']['symbol_grp'], $this->field_config['idpre_lancamento']['symbol_dec'], "0", "S", $this->field_config['idpre_lancamento']['format_neg'], "", "", "-", $this->field_config['idpre_lancamento']['symbol_fmt']) ; 
      }
      if ('' !== $this->num_guia || (!empty($format_fields) && isset($format_fields['num_guia'])))
      {
          nmgp_Form_Num_Val($this->num_guia, $this->field_config['num_guia']['symbol_grp'], $this->field_config['num_guia']['symbol_dec'], "0", "S", $this->field_config['num_guia']['format_neg'], "", "", "-", $this->field_config['num_guia']['symbol_fmt']) ; 
      }
      if ((!empty($this->data_do_servico) && 'null' != $this->data_do_servico) || (!empty($format_fields) && isset($format_fields['data_do_servico'])))
      {
          nm_volta_data($this->data_do_servico, $this->field_config['data_do_servico']['date_format']) ; 
          nmgp_Form_Datas($this->data_do_servico, $this->field_config['data_do_servico']['date_format'], $this->field_config['data_do_servico']['date_sep']) ;  
      }
      elseif ('null' == $this->data_do_servico || '' == $this->data_do_servico)
      {
          $this->data_do_servico = '';
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               $x = 0;
               foreach ($str as $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
                   $x++;
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
//
//-- 
   function nm_converte_datas($use_null = true, $bForce = false)
   {
      $guarda_format_hora = $this->field_config['data_do_servico']['date_format'];
      if ($this->data_do_servico != "")  
      { 
          nm_conv_data($this->data_do_servico, $this->field_config['data_do_servico']['date_format']) ; 
          $this->data_do_servico_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->data_do_servico_hora = substr($this->data_do_servico_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->data_do_servico_hora = substr($this->data_do_servico_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->data_do_servico_hora = substr($this->data_do_servico_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->data_do_servico_hora = substr($this->data_do_servico_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->data_do_servico_hora = substr($this->data_do_servico_hora, 0, -4);
          }
      } 
      if ($this->data_do_servico == "" && $use_null)  
      { 
          $this->data_do_servico = "null" ; 
      } 
      $this->field_config['data_do_servico']['date_format'] = $guarda_format_hora;
   }
//
   function nm_prep_date_change($cmp_date, $format_dt)
   {
       $vl_return  = "";
       if ($cmp_date != 'null') {
           $vl_return .= (strpos($format_dt, "yy") !== false) ? substr($cmp_date,  0, 4) : "";
           $vl_return .= (strpos($format_dt, "mm") !== false) ? substr($cmp_date,  5, 2) : "";
           $vl_return .= (strpos($format_dt, "dd") !== false) ? substr($cmp_date,  8, 2) : "";
           $vl_return .= (strpos($format_dt, "hh") !== false) ? substr($cmp_date, 11, 2) : "";
           $vl_return .= (strpos($format_dt, "ii") !== false) ? substr($cmp_date, 14, 2) : "";
           $vl_return .= (strpos($format_dt, "ss") !== false) ? substr($cmp_date, 17, 2) : "";
       }
       return $vl_return;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT") {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT") {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "SC_FORMAT_REGION") {
           $this->nm_data->SetaData($dt_in, strtoupper($form_in));
           $prep_out  = (strpos(strtolower($form_in), "dd") !== false) ? "dd" : "";
           $prep_out .= (strpos(strtolower($form_in), "mm") !== false) ? "mm" : "";
           $prep_out .= (strpos(strtolower($form_in), "aa") !== false) ? "aaaa" : "";
           $prep_out .= (strpos(strtolower($form_in), "yy") !== false) ? "aaaa" : "";
           return $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", $prep_out));
       }
       else {
           nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
           return $dt_out;
       }
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_idpre_lancamento();
          $this->ajax_return_values_idespecialidade_servicos();
          $this->ajax_return_values_idpessoas();
          $this->ajax_return_values_idprofissional();
          $this->ajax_return_values_num_guia();
          $this->ajax_return_values_anexo_guia();
          $this->ajax_return_values_data_do_servico();
          $this->ajax_return_values___calend_all_day__();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['idpre_lancamento']['keyVal'] = pre_lancamento_servicos_pack_protect_string($this->nmgp_dados_form['idpre_lancamento']);
          }
   } // ajax_return_values

          //----- idpre_lancamento
   function ajax_return_values_idpre_lancamento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idpre_lancamento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idpre_lancamento);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['idpre_lancamento'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("idpre_lancamento", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- idespecialidade_servicos
   function ajax_return_values_idespecialidade_servicos($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idespecialidade_servicos", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idespecialidade_servicos);
              $aLookup = array();
              $this->_tmp_lookup_idespecialidade_servicos = $this->idespecialidade_servicos;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idespecialidade_servicos']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idespecialidade_servicos'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idespecialidade_servicos']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idespecialidade_servicos'] = array(); 
}
$aLookup[] = array(pre_lancamento_servicos_pack_protect_string('') => str_replace('<', '&lt;',pre_lancamento_servicos_pack_protect_string('Selecione')));
$_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idespecialidade_servicos'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_idpre_lancamento = $this->idpre_lancamento;
   $old_value_num_guia = $this->num_guia;
   $old_value_data_do_servico = $this->data_do_servico;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idpre_lancamento = $this->idpre_lancamento;
   $unformatted_value_num_guia = $this->num_guia;
   $unformatted_value_data_do_servico = $this->data_do_servico;

   $__calend_all_day___val_str = "''";
   if (!empty($this->__calend_all_day__))
   {
       if (is_array($this->__calend_all_day__))
       {
           $Tmp_array = $this->__calend_all_day__;
       }
       else
       {
           $Tmp_array = explode(";", $this->__calend_all_day__);
       }
       $__calend_all_day___val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $__calend_all_day___val_str)
          {
             $__calend_all_day___val_str .= ", ";
          }
          $__calend_all_day___val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT TOP (200) idEspecialidade_servicos, descricao_especialidade FROM     especialidade_servicos ORDER BY descricao_especialidade";

   $this->idpre_lancamento = $old_value_idpre_lancamento;
   $this->num_guia = $old_value_num_guia;
   $this->data_do_servico = $old_value_data_do_servico;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(pre_lancamento_servicos_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', pre_lancamento_servicos_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idespecialidade_servicos'][] = $rs->fields[0];
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
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"idespecialidade_servicos\"";
          if (isset($this->NM_ajax_info['select_html']['idespecialidade_servicos']) && !empty($this->NM_ajax_info['select_html']['idespecialidade_servicos']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['idespecialidade_servicos']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->idespecialidade_servicos == $sValue)
                  {
                      $this->_tmp_lookup_idespecialidade_servicos = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['idespecialidade_servicos'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['idespecialidade_servicos']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['idespecialidade_servicos']['valList'][$i] = pre_lancamento_servicos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idespecialidade_servicos']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idespecialidade_servicos']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idespecialidade_servicos']['labList'] = $aLabel;
          }
   }

          //----- idpessoas
   function ajax_return_values_idpessoas($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idpessoas", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idpessoas);
              $aLookup = array();
              $this->_tmp_lookup_idpessoas = $this->idpessoas;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idpessoas']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idpessoas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idpessoas']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idpessoas'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_idpre_lancamento = $this->idpre_lancamento;
   $old_value_num_guia = $this->num_guia;
   $old_value_data_do_servico = $this->data_do_servico;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idpre_lancamento = $this->idpre_lancamento;
   $unformatted_value_num_guia = $this->num_guia;
   $unformatted_value_data_do_servico = $this->data_do_servico;

   $__calend_all_day___val_str = "''";
   if (!empty($this->__calend_all_day__))
   {
       if (is_array($this->__calend_all_day__))
       {
           $Tmp_array = $this->__calend_all_day__;
       }
       else
       {
           $Tmp_array = explode(";", $this->__calend_all_day__);
       }
       $__calend_all_day___val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $__calend_all_day___val_str)
          {
             $__calend_all_day___val_str .= ", ";
          }
          $__calend_all_day___val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idPessoas, nome_razao_social  FROM dbo.pessoa_juridica_fisica  ORDER BY nome_razao_social";

   $this->idpre_lancamento = $old_value_idpre_lancamento;
   $this->num_guia = $old_value_num_guia;
   $this->data_do_servico = $old_value_data_do_servico;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(pre_lancamento_servicos_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', pre_lancamento_servicos_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idpessoas'][] = $rs->fields[0];
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
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"idpessoas\"";
          if (isset($this->NM_ajax_info['select_html']['idpessoas']) && !empty($this->NM_ajax_info['select_html']['idpessoas']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['idpessoas']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->idpessoas == $sValue)
                  {
                      $this->_tmp_lookup_idpessoas = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['idpessoas'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['idpessoas']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['idpessoas']['valList'][$i] = pre_lancamento_servicos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idpessoas']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idpessoas']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idpessoas']['labList'] = $aLabel;
          }
   }

          //----- idprofissional
   function ajax_return_values_idprofissional($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idprofissional", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idprofissional);
              $aLookup = array();
              $this->_tmp_lookup_idprofissional = $this->idprofissional;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idprofissional']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idprofissional'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idprofissional']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idprofissional'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_idpre_lancamento = $this->idpre_lancamento;
   $old_value_num_guia = $this->num_guia;
   $old_value_data_do_servico = $this->data_do_servico;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idpre_lancamento = $this->idpre_lancamento;
   $unformatted_value_num_guia = $this->num_guia;
   $unformatted_value_data_do_servico = $this->data_do_servico;

   $__calend_all_day___val_str = "''";
   if (!empty($this->__calend_all_day__))
   {
       if (is_array($this->__calend_all_day__))
       {
           $Tmp_array = $this->__calend_all_day__;
       }
       else
       {
           $Tmp_array = explode(";", $this->__calend_all_day__);
       }
       $__calend_all_day___val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $__calend_all_day___val_str)
          {
             $__calend_all_day___val_str .= ", ";
          }
          $__calend_all_day___val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idPessoas, nome_razao_social  FROM dbo.pessoa_juridica_fisica  ORDER BY nome_razao_social";

   $this->idpre_lancamento = $old_value_idpre_lancamento;
   $this->num_guia = $old_value_num_guia;
   $this->data_do_servico = $old_value_data_do_servico;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(pre_lancamento_servicos_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', pre_lancamento_servicos_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idprofissional'][] = $rs->fields[0];
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
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"idprofissional\"";
          if (isset($this->NM_ajax_info['select_html']['idprofissional']) && !empty($this->NM_ajax_info['select_html']['idprofissional']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['idprofissional']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->idprofissional == $sValue)
                  {
                      $this->_tmp_lookup_idprofissional = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['idprofissional'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['idprofissional']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['idprofissional']['valList'][$i] = pre_lancamento_servicos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idprofissional']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idprofissional']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idprofissional']['labList'] = $aLabel;
          }
   }

          //----- num_guia
   function ajax_return_values_num_guia($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("num_guia", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->num_guia);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['num_guia'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- anexo_guia
   function ajax_return_values_anexo_guia($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("anexo_guia", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->anexo_guia);
              $aLookup = array();
   $out_anexo_guia = '';
   $out1_anexo_guia = '';
   if ($this->anexo_guia != "" && $this->anexo_guia != "none")   
   { 
       $out_anexo_guia = $this->Ini->path_imag_temp . "/sc_anexo_guia_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ;  
       $out1_anexo_guia = $out_anexo_guia; 
       $arq_anexo_guia = fopen($this->Ini->root . $out_anexo_guia, "w") ;  
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
       { 
           $nm_tmp = nm_conv_img_access(substr($this->anexo_guia, 0, 12));
           if (substr($this->anexo_guia, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
           { 
               $this->anexo_guia = nm_conv_img_access($this->anexo_guia);
           } 
       } 
       if (substr($this->anexo_guia, 0, 4) == "*nm*") 
       { 
           $this->anexo_guia = substr($this->anexo_guia, 4) ; 
           $this->anexo_guia = base64_decode($this->anexo_guia) ; 
       } 
       $img_pos_bm = strpos($this->anexo_guia, "BM") ; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->anexo_guia = substr($this->anexo_guia, $img_pos_bm) ; 
       } 
       fwrite($arq_anexo_guia, $this->anexo_guia) ;  
       fclose($arq_anexo_guia) ;  
       $sc_obj_img = new nm_trata_img($this->Ini->root . $out_anexo_guia, true);
       $this->nmgp_return_img['anexo_guia'][0] = $sc_obj_img->getHeight();
       $this->nmgp_return_img['anexo_guia'][1] = $sc_obj_img->getWidth();
       $_SESSION['scriptcase']['sc_num_img']++ ; 
   } 
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['anexo_guia'] = array(
                       'row'    => '',
               'type'    => 'imagem',
               'valList' => array($this->Ini->Nm_lang['lang_othr_show_imgg']),
               'imgFile' => $out_anexo_guia,
               'imgOrig' => $out1_anexo_guia,
               'keepImg' => $sKeepImage,
              );
          }
   }

          //----- data_do_servico
   function ajax_return_values_data_do_servico($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("data_do_servico", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->data_do_servico);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['data_do_servico'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- __calend_all_day__
   function ajax_return_values___calend_all_day__($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("__calend_all_day__", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->__calend_all_day__);
              $aLookup = array();
              $this->_tmp_lookup___calend_all_day__ = $this->__calend_all_day__;

$aLookup[] = array(pre_lancamento_servicos_pack_protect_string('Y') => str_replace('<', '&lt;',pre_lancamento_servicos_pack_protect_string("" . $this->Ini->Nm_lang['lang_per_allday'] . "")));
$_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup___calend_all_day__'][] = 'Y';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['__calend_all_day__']) && !empty($this->NM_ajax_info['select_html']['__calend_all_day__']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['__calend_all_day__']);
          }
          $this->NM_ajax_info['fldList']['__calend_all_day__'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-__calend_all_day__',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['__calend_all_day__']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['__calend_all_day__']['valList'][$i] = pre_lancamento_servicos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['__calend_all_day__']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['__calend_all_day__']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['__calend_all_day__']['labList'] = $aLabel;
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//----------- 

   function controle_navegacao()
   {
      global $sc_where;

          if (false && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['total']))
          {
               $sc_where_pos = " WHERE ((idPre_lancamento < $this->idpre_lancamento))";
               if ('' != $sc_where)
               {
                   if ('where ' == strtolower(substr(trim($sc_where), 0, 6)))
                   {
                       $sc_where = substr(trim($sc_where), 6);
                   }
                   if ('and ' == strtolower(substr(trim($sc_where), 0, 4)))
                   {
                       $sc_where = substr(trim($sc_where), 4);
                   }
                   $sc_where_pos .= ' AND (' . $sc_where . ')';
                   $sc_where = ' WHERE ' . $sc_where;
               }
               $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['total'] = $rsc->fields[0];
               $rsc->Close(); 
               if ('' != $this->idpre_lancamento)
               {
               $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['inicio'] = $rsc->fields[0];
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['inicio'] < 0)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['inicio'] = 0;
               }
               $rsc->Close(); 
               }
               else
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['inicio'] = 0;
               }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['qt_reg_grid'] = 1;
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['inicio']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['inicio'] = 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['final']  = 0;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['opcao'] = $this->NM_ajax_info['param']['nmgp_opcao'];
          if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['opcao'], array('incluir', 'alterar', 'excluir')))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['opcao'] = '';
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['opcao'] == 'inicio')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['inicio'] = 0;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['opcao'] == 'retorna')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['inicio'] = 0 ;
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['opcao'] == 'avanca' && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['total']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['total'] > $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['final']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['final'];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['opcao'] == 'final')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['inicio'] = 0;
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['final'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['qt_reg_grid'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['final'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['opcao'] = '';

   }

   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros
    function handleDbErrorMessage(&$dbErrorMessage, $dbErrorCode)
    {
        if (1267 == $dbErrorCode) {
            $dbErrorMessage = $this->Ini->Nm_lang['lang_errm_db_invalid_collation'];
        }
    }


   function nm_acessa_banco() 
   { 
      global  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Ini->sc_tem_trans_banco = $this->Db->BeginTrans(); 
      } 
      $NM_val_form['idpre_lancamento'] = $this->idpre_lancamento;
      $NM_val_form['idespecialidade_servicos'] = $this->idespecialidade_servicos;
      $NM_val_form['idpessoas'] = $this->idpessoas;
      $NM_val_form['idprofissional'] = $this->idprofissional;
      $NM_val_form['num_guia'] = $this->num_guia;
      $NM_val_form['anexo_guia'] = $this->anexo_guia;
      $NM_val_form['data_do_servico'] = $this->data_do_servico;
      $NM_val_form['__calend_all_day__'] = $this->__calend_all_day__;
      $NM_val_form['momento'] = $this->momento;
      $NM_val_form['usuario'] = $this->usuario;
      if ($this->idpre_lancamento === "" || is_null($this->idpre_lancamento))  
      { 
          $this->idpre_lancamento = 0;
      } 
      if ($this->idespecialidade_servicos === "" || is_null($this->idespecialidade_servicos))  
      { 
          $this->idespecialidade_servicos = 0;
          $this->sc_force_zero[] = 'idespecialidade_servicos';
      } 
      if ($this->idpessoas === "" || is_null($this->idpessoas))  
      { 
          $this->idpessoas = 0;
          $this->sc_force_zero[] = 'idpessoas';
      } 
      if ($this->idprofissional === "" || is_null($this->idprofissional))  
      { 
          $this->idprofissional = 0;
          $this->sc_force_zero[] = 'idprofissional';
      } 
      if ($this->num_guia === "" || is_null($this->num_guia))  
      { 
          $this->num_guia = 0;
          $this->sc_force_zero[] = 'num_guia';
      } 
      if ($this->anexo_guia === "" || is_null($this->anexo_guia))  
      { 
          $this->anexo_guia = 0;
          $this->sc_force_zero[] = 'anexo_guia';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          if ($this->data_do_servico == "")  
          { 
              $this->data_do_servico = "null"; 
              $NM_val_null[] = "data_do_servico";
          } 
          if ($this->momento == "")  
          { 
              $this->momento = "null"; 
              $NM_val_null[] = "momento";
          } 
          $this->usuario_before_qstr = $this->usuario;
          $this->usuario = substr($this->Db->qstr($this->usuario), 1, -1); 
          if ($this->usuario == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->usuario = "null"; 
              $NM_val_null[] = "usuario";
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          { 
              $nm_tmp = nm_conv_img_access(substr($this->anexo_guia, 0, 12));
              if (substr($this->anexo_guia, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
              { 
                  $this->anexo_guia = nm_conv_img_access($this->anexo_guia);
              } 
              if (!empty($this->anexo_guia) && $this->anexo_guia != 'null' && substr($this->anexo_guia, 0, 4) != "*nm*") 
              { 
                  $this->anexo_guia = "*nm*" . base64_encode($this->anexo_guia) ; 
              } 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              if ($this->Ini->nm_tpbanco != "pdo_sqlsrv" && !empty($this->anexo_guia) && $this->anexo_guia != 'null' && substr($this->anexo_guia, 0, 4) != "*nm*") 
              { 
                  $this->anexo_guia = "*nm*" . base64_encode($this->anexo_guia) ; 
              } 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              if ($this->Ini->nm_tpbanco != 'pdo_ibm' && !empty($this->anexo_guia) && $this->anexo_guia != 'null' && substr($this->anexo_guia, 0, 4) != "*nm*") 
              { 
                  $this->anexo_guia = "*nm*" . base64_encode($this->anexo_guia) ; 
              } 
          } 
          else
          { 
              $this->anexo_guia =  substr($this->Db->qstr($this->anexo_guia), 1, -1);
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 pre_lancamento_servicos_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              $aDoNotUpdate = array();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "data_do_servico = #$this->data_do_servico#, idEspecialidade_servicos = $this->idespecialidade_servicos, idPessoas = $this->idpessoas, idProfissional = $this->idprofissional, Num_Guia = $this->num_guia"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "data_do_servico = " . $this->Ini->date_delim . $this->data_do_servico . $this->Ini->date_delim1 . ", idEspecialidade_servicos = $this->idespecialidade_servicos, idPessoas = $this->idpessoas, idProfissional = $this->idprofissional, Num_Guia = $this->num_guia"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "data_do_servico = " . $this->Ini->date_delim . $this->data_do_servico . $this->Ini->date_delim1 . ", idEspecialidade_servicos = $this->idespecialidade_servicos, idPessoas = $this->idpessoas, idProfissional = $this->idprofissional, Num_Guia = $this->num_guia"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "data_do_servico = EXTEND('$this->data_do_servico', YEAR TO DAY), idEspecialidade_servicos = $this->idespecialidade_servicos, idPessoas = $this->idpessoas, idProfissional = $this->idprofissional, Num_Guia = $this->num_guia"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "data_do_servico = " . $this->Ini->date_delim . $this->data_do_servico . $this->Ini->date_delim1 . ", idEspecialidade_servicos = $this->idespecialidade_servicos, idPessoas = $this->idpessoas, idProfissional = $this->idprofissional, Num_Guia = $this->num_guia"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "data_do_servico = " . $this->Ini->date_delim . $this->data_do_servico . $this->Ini->date_delim1 . ", idEspecialidade_servicos = $this->idespecialidade_servicos, idPessoas = $this->idpessoas, idProfissional = $this->idprofissional, Num_Guia = $this->num_guia"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "data_do_servico = " . $this->Ini->date_delim . $this->data_do_servico . $this->Ini->date_delim1 . ", idEspecialidade_servicos = $this->idespecialidade_servicos, idPessoas = $this->idpessoas, idProfissional = $this->idprofissional, Num_Guia = $this->num_guia"; 
              } 
              if (isset($NM_val_form['momento']) && $NM_val_form['momento'] != $this->nmgp_dados_select['momento']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "momento = #$this->momento#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "momento = EXTEND('" . $this->momento . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "momento = " . $this->Ini->date_delim . $this->momento . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['usuario']) && $NM_val_form['usuario'] != $this->nmgp_dados_select['usuario']) 
              { 
                  $SC_fields_update[] = "usuario = '$this->usuario'"; 
              } 
              $temp_cmd_sql = "";
              if ($this->anexo_guia_limpa == "S")
              {
                  if ($this->anexo_guia != "null")
                  {
                      $this->anexo_guia = '';
                  }
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
                  {
                      $temp_cmd_sql = "Anexo_guia = '" . $this->anexo_guia . "'";
                  }
                  else
                  {
                      $temp_cmd_sql = "Anexo_guia = '" . $this->anexo_guia . "'";
                  }
                  $this->anexo_guia = "";
              }
              else
              {
                  if ($this->anexo_guia != "none" && $this->anexo_guia != "")
                  {
                      $NM_conteudo =  $this->anexo_guia;
                      if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
                      {
                      $temp_cmd_sql .= " Anexo_guia = '$NM_conteudo'";
                      }
                      else
                      {
                          $temp_cmd_sql .= " Anexo_guia = '$NM_conteudo'";
                      }
                  }
                  else
                  {
                      $aDoNotUpdate[] = "anexo_guia";
                  }
              }
              if (!empty($temp_cmd_sql))
              {
                  $SC_fields_update[] = $temp_cmd_sql;
              }
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE idPre_lancamento = $this->idpre_lancamento ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE idPre_lancamento = $this->idpre_lancamento ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE idPre_lancamento = $this->idpre_lancamento ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE idPre_lancamento = $this->idpre_lancamento ";  
              }  
              else  
              {
                  $comando .= " WHERE idPre_lancamento = $this->idpre_lancamento ";  
              }  
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $useUpdateProcedure = false;
              if (!empty($SC_fields_update) || $useUpdateProcedure)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $dbErrorMessage = $this->Db->ErrorMsg();
                          $dbErrorCode = $this->Db->ErrorNo();
                          $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $dbErrorMessage, true);
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $dbErrorMessage;
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  pre_lancamento_servicos_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
              { 
              }   
              $this->usuario = $this->usuario_before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              if ($this->anexo_guia_limpa == "S")
              {
                  $this->NM_ajax_info['fldList']['anexo_guia_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
                  $this->NM_ajax_info['fldList']['anexo_guia_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }

              $this->NM_ajax_info['calendarReload'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['idpre_lancamento'])) { $this->idpre_lancamento = $NM_val_form['idpre_lancamento']; }
              elseif (isset($this->idpre_lancamento)) { $this->nm_limpa_alfa($this->idpre_lancamento); }
              if     (isset($NM_val_form) && isset($NM_val_form['idespecialidade_servicos'])) { $this->idespecialidade_servicos = $NM_val_form['idespecialidade_servicos']; }
              elseif (isset($this->idespecialidade_servicos)) { $this->nm_limpa_alfa($this->idespecialidade_servicos); }
              if     (isset($NM_val_form) && isset($NM_val_form['idpessoas'])) { $this->idpessoas = $NM_val_form['idpessoas']; }
              elseif (isset($this->idpessoas)) { $this->nm_limpa_alfa($this->idpessoas); }
              if     (isset($NM_val_form) && isset($NM_val_form['idprofissional'])) { $this->idprofissional = $NM_val_form['idprofissional']; }
              elseif (isset($this->idprofissional)) { $this->nm_limpa_alfa($this->idprofissional); }
              if     (isset($NM_val_form) && isset($NM_val_form['num_guia'])) { $this->num_guia = $NM_val_form['num_guia']; }
              elseif (isset($this->num_guia)) { $this->nm_limpa_alfa($this->num_guia); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('idpre_lancamento', 'idespecialidade_servicos', 'idpessoas', 'idprofissional', 'num_guia', 'data_do_servico', '__calend_all_day__'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "idPre_lancamento, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($this->google_calendar_insert) || !$this->google_calendar_insert)
          {
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      pre_lancamento_servicos_pack_ajax_response();
                      exit;
                  }
              }
          }
          }
          if ($bInsertOk)
          { 
              $_test_file = $this->fetchUniqueUploadName($this->anexo_guia_scfile_name, $dir_file, "anexo_guia");
              if (trim($this->anexo_guia_scfile_name) != $_test_file)
              {
                  $this->anexo_guia_scfile_name = $_test_file;
                  $this->anexo_guia = $_test_file;
              }
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (data_do_servico, idEspecialidade_servicos, momento, usuario, idPessoas, idProfissional, Num_Guia, Anexo_guia) VALUES (#$this->data_do_servico#, $this->idespecialidade_servicos, #$this->momento#, '$this->usuario', $this->idpessoas, $this->idprofissional, $this->num_guia, $this->anexo_guia)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "data_do_servico, idEspecialidade_servicos, momento, usuario, idPessoas, idProfissional, Num_Guia, Anexo_guia) VALUES (" . $NM_seq_auto . "" . $this->Ini->date_delim . $this->data_do_servico . $this->Ini->date_delim1 . ", $this->idespecialidade_servicos, " . $this->Ini->date_delim . $this->momento . $this->Ini->date_delim1 . ", '$this->usuario', $this->idpessoas, $this->idprofissional, $this->num_guia, $this->anexo_guia)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "data_do_servico, idEspecialidade_servicos, momento, usuario, idPessoas, idProfissional, Num_Guia, Anexo_guia) VALUES (" . $NM_seq_auto . "" . $this->Ini->date_delim . $this->data_do_servico . $this->Ini->date_delim1 . ", $this->idespecialidade_servicos, " . $this->Ini->date_delim . $this->momento . $this->Ini->date_delim1 . ", '$this->usuario', $this->idpessoas, $this->idprofissional, $this->num_guia, $this->anexo_guia)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "data_do_servico, idEspecialidade_servicos, momento, usuario, idPessoas, idProfissional, Num_Guia, Anexo_guia) VALUES (" . $NM_seq_auto . "" . $this->Ini->date_delim . $this->data_do_servico . $this->Ini->date_delim1 . ", $this->idespecialidade_servicos, " . $this->Ini->date_delim . $this->momento . $this->Ini->date_delim1 . ", '$this->usuario', $this->idpessoas, $this->idprofissional, $this->num_guia, $this->anexo_guia)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "data_do_servico, idEspecialidade_servicos, momento, usuario, idPessoas, idProfissional, Num_Guia, Anexo_guia) VALUES (" . $NM_seq_auto . "EXTEND('$this->data_do_servico', YEAR TO DAY), $this->idespecialidade_servicos, EXTEND('$this->momento', YEAR TO FRACTION), '$this->usuario', $this->idpessoas, $this->idprofissional, $this->num_guia, $this->anexo_guia)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "data_do_servico, idEspecialidade_servicos, momento, usuario, idPessoas, idProfissional, Num_Guia, Anexo_guia) VALUES (" . $NM_seq_auto . "" . $this->Ini->date_delim . $this->data_do_servico . $this->Ini->date_delim1 . ", $this->idespecialidade_servicos, " . $this->Ini->date_delim . $this->momento . $this->Ini->date_delim1 . ", '$this->usuario', $this->idpessoas, $this->idprofissional, $this->num_guia, $this->anexo_guia)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "data_do_servico, idEspecialidade_servicos, momento, usuario, idPessoas, idProfissional, Num_Guia, Anexo_guia) VALUES (" . $NM_seq_auto . "" . $this->Ini->date_delim . $this->data_do_servico . $this->Ini->date_delim1 . ", $this->idespecialidade_servicos, " . $this->Ini->date_delim . $this->momento . $this->Ini->date_delim1 . ", '$this->usuario', $this->idpessoas, $this->idprofissional, $this->num_guia, $this->anexo_guia)"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "data_do_servico, idEspecialidade_servicos, momento, usuario, idPessoas, idProfissional, Num_Guia, Anexo_guia) VALUES (" . $NM_seq_auto . "" . $this->Ini->date_delim . $this->data_do_servico . $this->Ini->date_delim1 . ", $this->idespecialidade_servicos, " . $this->Ini->date_delim . $this->momento . $this->Ini->date_delim1 . ", '$this->usuario', $this->idpessoas, $this->idprofissional, $this->num_guia, $this->anexo_guia)"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "data_do_servico, idEspecialidade_servicos, momento, usuario, idPessoas, idProfissional, Num_Guia, Anexo_guia) VALUES (" . $NM_seq_auto . "" . $this->Ini->date_delim . $this->data_do_servico . $this->Ini->date_delim1 . ", $this->idespecialidade_servicos, " . $this->Ini->date_delim . $this->momento . $this->Ini->date_delim1 . ", '$this->usuario', $this->idpessoas, $this->idprofissional, $this->num_guia, $this->anexo_guia)"; 
              }
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $dbErrorMessage = $this->Db->ErrorMsg();
                      $dbErrorCode = $this->Db->ErrorNo();
                      $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $dbErrorMessage, true);
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
                      { 
                          $this->sc_erro_insert = $dbErrorMessage;
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              pre_lancamento_servicos_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select @@identity"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          pre_lancamento_servicos_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->idpre_lancamento =  $rsy->fields[0];
                 $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idpre_lancamento = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT dbinfo('sqlca.sqlerrd1') FROM " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idpre_lancamento = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select .currval from dual"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idpre_lancamento = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $str_tabela = "SYSIBM.SYSDUMMY1"; 
                  if($this->Ini->nm_con_use_schema == "N") 
                  { 
                          $str_tabela = "SYSDUMMY1"; 
                  } 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT IDENTITY_VAL_LOCAL() FROM " . $str_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idpre_lancamento = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select CURRVAL('')"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idpre_lancamento = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select gen_id(, 0) from " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idpre_lancamento = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idpre_lancamento = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->usuario = $this->usuario_before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
              { 
              }   
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['total']);
              }

              $this->NM_ajax_info['calendarReload'] = true;

              $this->sc_evento = "insert"; 
              $this->usuario = $this->usuario_before_qstr;
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->idpre_lancamento = substr($this->Db->qstr($this->idpre_lancamento), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_dele_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idPre_lancamento = $this->idpre_lancamento "); 
              }  
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          pre_lancamento_servicos_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              if (empty($this->sc_erro_delete)) {
                  $this->record_delete_ok = true;
              }
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;

              $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['total']);
              }

              $this->NM_ajax_info['calendarReload'] = true;

              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['parms'] = "idpre_lancamento?#?$this->idpre_lancamento?@?"; 
      }
      $this->nmgp_dados_form['anexo_guia'] = ""; 
      $this->anexo_guia_limpa = ""; 
      $this->anexo_guia_salva = ""; 
      $this->NM_commit_db(); 
      if (isset($this->google_calendar_insert) && $this->google_calendar_insert)
      {
          return;
      }
      if (('insert' == $this->sc_evento && 1 != $GLOBALS["erro_incl"]) || 'delete' == $this->sc_evento)
      {
          $this->calendarOutputReload();
          exit;
      }
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->idpre_lancamento = null === $this->idpre_lancamento ? null : substr($this->Db->qstr($this->idpre_lancamento), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['where_filter'] . ")";
          }
      }
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "inicio")
      { 
          $this->nmgp_opcao = "igual"; 
      } 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT idPre_lancamento, str_replace (convert(char(10),data_do_servico,102), '.', '-') + ' ' + convert(char(8),data_do_servico,20), idEspecialidade_servicos, str_replace (convert(char(10),momento,102), '.', '-') + ' ' + convert(char(8),momento,20), usuario, idPessoas, idProfissional, Num_Guia, Anexo_guia from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT idPre_lancamento, convert(char(23),data_do_servico,121), idEspecialidade_servicos, convert(char(23),momento,121), usuario, idPessoas, idProfissional, Num_Guia, Anexo_guia from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT idPre_lancamento, data_do_servico, idEspecialidade_servicos, momento, usuario, idPessoas, idProfissional, Num_Guia, Anexo_guia from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT idPre_lancamento, EXTEND(data_do_servico, YEAR TO DAY), idEspecialidade_servicos, EXTEND(momento, YEAR TO FRACTION), usuario, idPessoas, idProfissional, Num_Guia, Anexo_guia from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT idPre_lancamento, data_do_servico, idEspecialidade_servicos, momento, usuario, idPessoas, idProfissional, Num_Guia, Anexo_guia from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "idPre_lancamento = $this->idpre_lancamento"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "idPre_lancamento = $this->idpre_lancamento"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "idPre_lancamento = $this->idpre_lancamento"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "idPre_lancamento = $this->idpre_lancamento"; 
              }  
              else  
              {
                  $aWhere[] = "idPre_lancamento = $this->idpre_lancamento"; 
              }  
              if (!empty($sc_where_filter))  
              {
                  $teste_select = $nmgp_select . $this->returnWhere($aWhere);
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $teste_select; 
                  $rs = $this->Db->Execute($teste_select); 
                  if ($rs->EOF)
                  {
                     $aWhere = array($sc_where_filter);
                  }  
                  $rs->Close(); 
              }  
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "idPre_lancamento";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['select'] = ""; 
              } 
          } 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = $this->Db->Execute($nmgp_select) ; 
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['empty_filter'] = true;
                  return; 
              }
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
              }
              $this->nmgp_opcao = "novo"; 
              $this->nm_flag_saida_novo = "S"; 
              $rs->Close(); 
              if ($this->aba_iframe)
              {
                  $this->NM_ajax_info['buttonDisplay']['exit'] = $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd_extr']); 
              $this->nmgp_opcao = "novo"; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->idpre_lancamento = $rs->fields[0] ; 
              $this->nmgp_dados_select['idpre_lancamento'] = $this->idpre_lancamento;
              $this->data_do_servico = $rs->fields[1] ; 
              $this->nmgp_dados_select['data_do_servico'] = $this->data_do_servico;
              $this->idespecialidade_servicos = $rs->fields[2] ; 
              $this->nmgp_dados_select['idespecialidade_servicos'] = $this->idespecialidade_servicos;
              $this->momento = $rs->fields[3] ; 
              if (substr($this->momento, 10, 1) == "-") 
              { 
                 $this->momento = substr($this->momento, 0, 10) . " " . substr($this->momento, 11);
              } 
              if (substr($this->momento, 13, 1) == ".") 
              { 
                 $this->momento = substr($this->momento, 0, 13) . ":" . substr($this->momento, 14, 2) . ":" . substr($this->momento, 17);
              } 
              $this->nmgp_dados_select['momento'] = $this->momento;
              $this->usuario = $rs->fields[4] ; 
              $this->nmgp_dados_select['usuario'] = $this->usuario;
              $this->idpessoas = $rs->fields[5] ; 
              $this->nmgp_dados_select['idpessoas'] = $this->idpessoas;
              $this->idprofissional = $rs->fields[6] ; 
              $this->nmgp_dados_select['idprofissional'] = $this->idprofissional;
              $this->num_guia = $rs->fields[7] ; 
              $this->nmgp_dados_select['num_guia'] = $this->num_guia;
              $this->anexo_guia = $rs->fields[8] ; 
              $this->nmgp_dados_select['anexo_guia'] = $this->anexo_guia;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->idpre_lancamento = (string)$this->idpre_lancamento; 
              $this->idespecialidade_servicos = (string)$this->idespecialidade_servicos; 
              $this->idpessoas = (string)$this->idpessoas; 
              $this->idprofissional = (string)$this->idprofissional; 
              $this->num_guia = (string)$this->num_guia; 
              $this->anexo_guia = (string)$this->anexo_guia; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['parms'] = "idpre_lancamento?#?$this->idpre_lancamento?@?";
              $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['sub_dir'][0]  = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->controle_navegacao();
          }
      } 
      if ($this->nmgp_opcao == "novo" || $this->nmgp_opcao == "refresh_insert") 
      { 
          $this->sc_evento_old = $this->sc_evento;
          $this->sc_evento = "novo";
          if ('refresh_insert' == $this->nmgp_opcao)
          {
              $this->nmgp_opcao = 'novo';
          }
          else
          {
              $this->nm_formatar_campos();
              $this->idpre_lancamento = "";  
              $this->nmgp_dados_form["idpre_lancamento"] = $this->idpre_lancamento;
              $this->data_do_servico = "";  
              $this->data_do_servico_hora = "" ;  
              $this->nmgp_dados_form["data_do_servico"] = $this->data_do_servico;
              $this->idespecialidade_servicos = "";  
              $this->nmgp_dados_form["idespecialidade_servicos"] = $this->idespecialidade_servicos;
              $this->momento = "";  
              $this->momento_hora = "" ;  
              $this->nmgp_dados_form["momento"] = $this->momento;
              $this->usuario = "";  
              $this->nmgp_dados_form["usuario"] = $this->usuario;
              $this->idpessoas = "";  
              $this->nmgp_dados_form["idpessoas"] = $this->idpessoas;
              $this->idprofissional = "";  
              $this->nmgp_dados_form["idprofissional"] = $this->idprofissional;
              $this->num_guia = "";  
              $this->nmgp_dados_form["num_guia"] = $this->num_guia;
              $this->anexo_guia = "";  
              $this->anexo_guia_ul_name = "" ;  
              $this->anexo_guia_ul_type = "" ;  
              $this->nmgp_dados_form["anexo_guia"] = $this->anexo_guia;
              $this->__calend_all_day__ = "";  
              $this->nmgp_dados_form["__calend_all_day__"] = $this->__calend_all_day__;
              $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }

          if (isset($this->sc_cal_click_date) && isset($this->sc_cal_click_time))
          {
              list($iTimestampIni, $iTimestampEnd) = $this->calendarInitTimestamp();

              $sTimeFormat1 = 'true' == $this->sc_cal_click_allday ? ''          : 'H:i:s';
              $sTimeFormat2 = 'true' == $this->sc_cal_click_allday ? ' 00:00:00' : ' H:i:s';

              $this->data_do_servico = date('Y-m-d', $iTimestampIni);
          }

          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
      }  
//
//
//-- 
      if ($this->nmgp_opcao != "novo") 
      {
      }
      if (!isset($this->nmgp_refresh_fields)) 
      { 
          $this->nm_proc_onload();
      }
  }
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              pre_lancamento_servicos_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
//-- 
   if ($this->nmgp_opcao == "novo")
   { 
       $out_anexo_guia = "";  
   } 
   else 
   { 
       $out_anexo_guia = $this->anexo_guia;  
   } 
   if ($this->anexo_guia != "" && $this->anexo_guia != "none")   
   { 
       $out_anexo_guia = $this->Ini->path_imag_temp . "/sc_anexo_guia_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ;  
       $arq_anexo_guia = fopen($this->Ini->root . $out_anexo_guia, "w") ;  
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
       { 
           $nm_tmp = nm_conv_img_access(substr($this->anexo_guia, 0, 12));
           if (substr($this->anexo_guia, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
           { 
               $this->anexo_guia = nm_conv_img_access($this->anexo_guia);
           } 
       } 
       if (substr($this->anexo_guia, 0, 4) == "*nm*") 
       { 
           $this->anexo_guia = substr($this->anexo_guia, 4) ; 
           $this->anexo_guia = base64_decode($this->anexo_guia) ; 
       } 
       $img_pos_bm = strpos($this->anexo_guia, "BM") ; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->anexo_guia = substr($this->anexo_guia, $img_pos_bm) ; 
       } 
       fwrite($arq_anexo_guia, $this->anexo_guia) ;  
       fclose($arq_anexo_guia) ;  
       $sc_obj_img = new nm_trata_img($this->Ini->root . $out_anexo_guia, true);
       $this->nmgp_return_img['anexo_guia'][0] = $sc_obj_img->getHeight();
       $this->nmgp_return_img['anexo_guia'][1] = $sc_obj_img->getWidth();
       if ($this->Ini->Export_img_zip) {
           $this->Ini->Img_export_zip[] = $this->Ini->root . $out_anexo_guia;
           $out_anexo_guia = str_replace($this->Ini->path_imag_temp . "/", "", $out_anexo_guia);
       } 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
   } 
   if (isset($_POST['nmgp_opcao']) && 'excluir' == $_POST['nmgp_opcao'] && $this->sc_evento != "delete" && (!isset($this->sc_evento_old) || 'delete' != $this->sc_evento_old))
   {
       global $temp_out_anexo_guia;
       if (isset($temp_out_anexo_guia))
       {
           $out_anexo_guia = $temp_out_anexo_guia;
       }
   }
        $this->initFormPages();
    include_once("pre_lancamento_servicos_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_format_readonly($field, $value)
    {
        $result = $value;

        $this->form_highlight_search($result, $field, $value);

        return $result;
    }

    function form_highlight_search(&$result, $field, $value)
    {
        if ($this->proc_fast_search) {
            $this->form_highlight_search_quicksearch($result, $field, $value);
        }
    }

    function form_highlight_search_quicksearch(&$result, $field, $value)
    {
        $searchOk = false;
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array(""))) {
            $searchOk = true;
        }
        elseif ($field == $this->nmgp_fast_search && in_array($field, array(""))) {
            $searchOk = true;
        }

        if (!$searchOk || '' == $this->nmgp_arg_fast_search) {
            return;
        }

        $htmlIni = '<div class="highlight" style="background-color: #fafaca; display: inline-block">';
        $htmlFim = '</div>';

        if ('qp' == $this->nmgp_cond_fast_search) {
            $keywords = preg_quote($this->nmgp_arg_fast_search, '/');
            $result = preg_replace('/'. $keywords .'/i', $htmlIni . '$0' . $htmlFim, $result);
        } elseif ('eq' == $this->nmgp_cond_fast_search) {
            if (strcasecmp($this->nmgp_arg_fast_search, $value) == 0) {
                $result = $htmlIni. $result .$htmlFim;
            }
        }
    }


    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

   function calendarOutputDisplay()
   {
       if (isset($_SESSION['scriptcase']['reg_conf']['date_format']) && '' != $_SESSION['scriptcase']['reg_conf']['date_format'])
       {
           $iPosDay     = strpos($_SESSION['scriptcase']['reg_conf']['date_format'], 'd');
           $iPosMonth   = strpos($_SESSION['scriptcase']['reg_conf']['date_format'], 'm');
           $sCalDateCol = (false !== $iPosDay && false !== $iPosMonth && $iPosDay > $iPosMonth) ? 'M/D' : 'D/M';
       }
       else
       {
           $sCalDateCol = 'M/D';
       }

       $appReturn = '';
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['iframe_menu'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['sc_outra_jan']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['sc_outra_jan'] != 'pre_lancamento_servicos')) {
           global $nm_url_saida, $nm_apl_dependente;
           if ((!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['run_iframe'] == "R" || $this->aba_iframe) && ($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['run_iframe'] != "F") && ($nm_apl_dependente == 1)) {
               $appReturn = $nm_url_saida;
           }
           else {
           }
       }

       $iFirstDay = isset($_SESSION['scriptcase']['reg_conf']['date_week_ini']) && '' != $_SESSION['scriptcase']['reg_conf']['date_week_ini'] ? array_search($_SESSION['scriptcase']['reg_conf']['date_week_ini'], array('SU', 'MO', 'TU', 'WE', 'TH', 'FR', 'SA')) : false;
       $iFirstDay = false === $iFirstDay ? 0 : $iFirstDay;
       header("X-XSS-Protection: 1; mode=block");
       header("X-Frame-Options: SAMEORIGIN");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?> xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <title></title>
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__img__NM__ct_other_gauge.png">
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/fullcalendar-3.4.0/fullcalendar.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox.css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appcalendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appcalendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" />
 <script type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_userSweetAlertDisplayed = false;
 </script>
 <script type="text/javascript" src="../_lib/lib/js/jquery-3.1.1.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/fullcalendar-3.4.0/lib/moment.min.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/fullcalendar-3.4.0/fullcalendar.min.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/fullcalendar-3.4.0/gcal.min.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
<?php
    $javascriptParams = array(
        'app_return' => $appReturn,
        'date_col' => $sCalDateCol,
        'first_day' => $iFirstDay,
        'url_google_import' => $url_importGoogle,
        'url_google_export' => $url_exportGoogle,
    );
    $this->calendarOutput_css();
    $this->calendarOutput_javascript($javascriptParams);
?>
</head>
<body class="scAppCalendarPage" style="">
<?php
    $this->calendarOutput_calendar();
    $this->calendarOutput_form();
?>
</body>
</html>
<?php
   } // calendarOutputDisplay

    function calendarOutput_css()
    {
?>
<style type="text/css">
@media (max-width: 1200px) {
    .fc-toolbar .fc-center{
        display:none;
    }
}
@media (max-width: 1150px) {
    .fc-toolbar .fc-center{
        display:inline-block !important;
    }
    button.fc-today-button,
    button.fc-print-button,
    button.fc-importGoogle-button,
    button.fc-exportGoogle-button,
    button.fc-month-button,
    button.fc-agendaWeek-button,
    button.fc-agendaDay-button,
    button.fc-listMonth-button {
        background-repeat: no-repeat;
        background-size: 24px;
        background-position: center;
        text-indent: -9999px;
    }
    button.fc-today-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_today.png)!important;
    }
    button.fc-print-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_print.png)!important;
    }
    button.fc-importGoogle-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_down.png)!important;
    }
    button.fc-exportGoogle-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_up.png)!important;
    }
    button.fc-month-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_month.png)!important;
    }
    button.fc-agendaWeek-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_week.png)!important;
    }
    button.fc-agendaDay-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_day.png)!important;
    }
    button.fc-listMonth-button {
        background-image: url(../_lib/img/scriptcase__NM__ico__NM__sc_cal_list.png)!important;
    }
}
@media (max-width: 670px) {
    button.fc-print-button{
        display:none !important;
    }
}
@media (max-width: 853px) {
    .fc-toolbar .fc-center{
        display:none !important;
    }
    button.fc-prev-button,
    button.fc-next-button{
        padding: 2px 5px!important;
    }
}
.sc-cal-page-container {
    display: flex;
    flex-direction: row;
}
.sc-cal-side-container {
    display: flex;
    flex-direction: column;
    min-width: 250px;
    max-width: 300px;
}
.sc-cal-calendar-container {
    display: flex;
}
.sc-cal-button-container {
    display: flex;
    margin: 0 0 5px 0;
}
.sc-cal-categories-container {
    overflow: hidden;
    white-space: nowrap;
}
a#id_bcalendargoogleimport {
    white-space: nowrap;
}
a#id_bcalendargoogleexport {
    white-space: nowrap;
}
.sc-month-picker-nav {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    margin: 10px;
}
.sc-month-picker-row {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    margin: 10px;
}
.sc-month-picker-cell {
    display: inline-grid;
    flex-grow: 1;
    width: 30%;
}
.sc-month-picker-button {
    display: grid;
    border-radius: 25px;
    justify-items: center;
    padding: 10px;
    width: 75%;
}
.sc-month-picker-nav-button {
    font-size: 125%;
}
</style>
<?php
    } // calendarOutput_css

    function calendarOutput_javascript($javascriptParams)
    {
?>
<script type="text/javascript">
<?php
        $this->calendarOutput_javascriptGeneral($javascriptParams);
        $this->calendarOutput_javascriptDesktop();
        $this->calendarOutput_javascriptMobile();
?>
$(function() {
<?php
        $this->calendarOutput_javascriptOnReady($javascriptParams);
?>
});
</script>
<?php
    } // calendarOutput_javascript

    function calendarOutput_javascriptGeneral($javascriptParams)
    {
?>
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

function calendarGoBack()
{
    document.F6.action = "<?php echo $javascriptParams['app_return']; ?>";
    document.F6.submit();
}
function calendar_reload()
{
    $("#calendar").fullCalendar("refetchEvents");
}
function calendar_print()
{
    $.ajax({
        url: "pre_lancamento_servicos.php",
        type: "GET",
        dataType: "json",
        data: {
            nmgp_opcao: "calendar_print",
            start: $("#calendar").fullCalendar("getView").start.format(),
            end: $("#calendar").fullCalendar("getView").end.format()
        }
    }).done(function(data) {
        if ("html" == data.outputFormat) {
            var newWindow = window.open("");
            newWindow.document.write(data.printHtml);
            newWindow.document.close();
            newWindow.focus();
        } else {
            var newWindow = window.open(data.fileHtml);
        }
        //newWindow.print();
    });
}
function filterCategory(category)
{
    if ($("#id_calendar_category_" + category).hasClass('scCalendarCategoryItemActive')) {
        $("#id_calendar_category_" + category).removeClass('scCalendarCategoryItemActive');
    } else {
        $("#id_calendar_category_" + category).addClass('scCalendarCategoryItemActive');
    }
    refreshFilterCategories();
}
function refreshFilterCategories()
{
    $('#calendar').fullCalendar('removeEventSource', 'pre_lancamento_servicos.php?script_case_init=<?php echo $this->Ini->sc_page ?>&nmgp_opcao=calendar_fetch' + getCategory(false));
    setCategory();
    $('#calendar').fullCalendar('addEventSource', 'pre_lancamento_servicos.php?script_case_init=<?php echo $this->Ini->sc_page ?>&nmgp_opcao=calendar_fetch' + getCategory(false));
}
function setCategory()
{
    var selectedCategories = $(".scCalendarCategoryItemActive"), categoryList = new Array(), i;
    for (i = 0; i < selectedCategories.length; i++) {
        categoryList.push($(selectedCategories[i]).attr("id").substr(21));
    }
    $("#category_filter").val(categoryList.join(")SCCL)"))
}
function getCategory(isPrint)
{
    var categoryFilter = $("#category_filter");
    if (!categoryFilter.length) {
        return "";
    } else if (isPrint) {
        return categoryFilter.val();
    } else {
        return "&category=" + categoryFilter.val();
    }
}
function addNewEvent(sDate, sTime, allDay)
{
<?php
        if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']) {
?>
    addNewEvent_mobile(sDate, sTime, allDay);
<?php
        } else {
?>
    addNewEvent_desktop(sDate, sTime, allDay);
<?php
        }
?>
}
function editEvent(sEventId)
{
<?php
        if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']) {
?>
    editEvent_mobile(sEventId);
<?php
        } else {
?>
    editEvent_desktop(sEventId);
<?php
        }
?>
}
<?php
    } // calendarOutput_javascriptGeneral

    function calendarOutput_javascriptDesktop()
    {
?>
function addNewEvent_desktop(sDate, sTime, allDay)
{
    tb_show('', 'pre_lancamento_servicos.php?nmgp_opcao=edit_novo&sc_cal_click_date=' + sDate + '&sc_cal_click_time=' + sTime + '&sc_cal_click_allday=' + allDay + '&script_case_init=<?php echo $this->Ini->sc_page ?>&nmgp_outra_jan=true&nmgp_url_saida=modal&TB_iframe=true&modal=true&height=500&width=700', '');
}
function editEvent_desktop(sEventId)
{
    tb_show('', 'pre_lancamento_servicos.php?nmgp_opcao=igual_calendar&idpre_lancamento=' + sEventId + '&__orig_idpre_lancamento=' + sEventId + '&script_case_init=<?php echo $this->Ini->sc_page ?>&nmgp_outra_jan=true&nmgp_url_saida=modal&TB_iframe=true&modal=true&height=500&width=700', '');
}
<?php
    } // calendarOutput_javascriptDesktop

    function calendarOutput_javascriptMobile()
    {
        if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']) {
            $sc_mobile_app_data = json_encode([
                'appType' => 'calendar',
                'improvements' => 1,
                'toolbarOrientation' => 'H',
                'mobilePanes' => 'true',
                'langs' => [],
            ]); 
?>
</script>
    <input type="hidden" id="sc-mobile-app-data" value='<?php echo $sc_mobile_app_data; ?>' />
    <script type="text/javascript" src="../_lib/lib/js/nm_modal_panes.jquery.js"></script>
    <script type="text/javascript" src="../_lib/lib/js/nm_calendar_mobile.js"></script>
    <link rel='stylesheet' href='../_lib/lib/css/nm_calendar_mobile.css' type='text/css'/>
<script>
var calendarMonth, calendarYear, currentYear = new Date().getFullYear(), yearThreshold = 100;
function addNewEvent_mobile(sDate, sTime, allDay)
{
    tb_show('', 'pre_lancamento_servicos.php?nmgp_opcao=edit_novo&sc_cal_click_date=' + sDate + '&sc_cal_click_time=' + sTime + '&sc_cal_click_allday=' + allDay + '&script_case_init=<?php echo $this->Ini->sc_page ?>&nmgp_outra_jan=true&nmgp_url_saida=modal&TB_iframe=true&modal=true&height=500&width=700', '');
}
function editEvent_mobile(sEventId)
{
    tb_show('', 'pre_lancamento_servicos.php?nmgp_opcao=igual_calendar&idpre_lancamento=' + sEventId + '&__orig_idpre_lancamento=' + sEventId + '&script_case_init=<?php echo $this->Ini->sc_page ?>&nmgp_outra_jan=true&nmgp_url_saida=modal&TB_iframe=true&modal=true&height=500&width=700', '');
}
function mobileMenuMonthClick()
{
    $("#calendar").fullCalendar("changeView", "month");
}
function mobileMenuWeekClick()
{
    $("#calendar").fullCalendar("changeView", "agendaWeek");
}
function mobileMenuDayClick()
{
    $("#calendar").fullCalendar("changeView", "agendaDay");
}
function mobileMenuAgendaClick()
{
    $("#calendar").fullCalendar("changeView", "listMonth");
}
function mobileMenuCategoriesClick()
{
}
function mobileMenuPrintClick()
{
    calendar_print();
}
function mobileMenuImportClick()
{
    tb_show('', 'pre_lancamento_servicos.php?nmgp_opcao=importGoogle&nmgp_outra_jan=true&script_case_init=". $this->form_encode_input($this->Ini->sc_page) ."&nmgp_url_saida=modal&TB_iframe=true&modal=true&height=150&width=400', '');
}
function mobileMenuExportClick()
{
    tb_show('', 'pre_lancamento_servicos.php?nmgp_opcao=exportGoogle&nmgp_outra_jan=true&script_case_init=". $this->form_encode_input($this->Ini->sc_page) ."&nmgp_url_saida=modal&TB_iframe=true&modal=true&height=280&width=450', '');
}
function monthPicker_show()
{
    monthPicker_getActualDate();
    monthPicker_hideMonthInterval();
    $("#sc-id-month-picker").show();
}
function monthPicker_getActualDate()
{
    let calendarDate = $("#calendar").fullCalendar("getDate").format();
    calendarMonth = calendarDate.substr(5, 2);
    calendarYear = calendarDate.substr(0, 4);
    $(".sc-nav-month").html(calendarYear);
}
function monthPicker_goToPrevious()
{
    if ($(".sc-nav-month").hasClass("sc-is-hidden")) {
        monthPicker_gotoPreviousYearBlock();
    } else {
        monthPicker_goToPreviousYear();
    }
}
function monthPicker_goToNext()
{
    if ($(".sc-nav-month").hasClass("sc-is-hidden")) {
        monthPicker_goToNextYearBlock();
    } else {
        monthPicker_goToNextYear();
    }
}
function monthPicker_goToPreviousYear()
{
    let thisYear = parseInt($(".sc-nav-month").html());
    $(".sc-nav-month").html(thisYear - 1);
    monthPicker_highlightMonth();
}
function monthPicker_goToNextYear()
{
    let thisYear = parseInt($(".sc-nav-month").html());
    $(".sc-nav-month").html(thisYear + 1);
    monthPicker_highlightMonth();
}
function monthPicker_gotoPreviousYearBlock()
{
    let middleYear = parseInt($("#sc-id-year-7").html()) - 12;
    if (middleYear + 6 > currentYear - yearThreshold) {
        monthPicker_populateYearList(middleYear);
    }
}
function monthPicker_goToNextYearBlock()
{
    let middleYear = parseInt($("#sc-id-year-7").html()) + 12;
    if (middleYear - 6 < currentYear + yearThreshold) {
        monthPicker_populateYearList(middleYear);
    }
}
function monthPicker_showMonthInterval()
{
    let thisYear = parseInt($(".sc-nav-month").html());
    monthPicker_populateYearList(thisYear);
    $(".sc-nav-month").addClass("sc-is-hidden").hide();
    $(".sc-nav-month-interval").show();
    $("#sc-id-month-list").hide();
    $("#sc-id-year-list").show();
}
function monthPicker_hideMonthInterval()
{
    monthPicker_highlightMonth();
    $(".sc-nav-month").removeClass("sc-is-hidden").show();
    $(".sc-nav-month-interval").hide();
    $("#sc-id-month-list").show();
    $("#sc-id-year-list").hide();
}
function monthPicker_goToDate(thisMonth)
{
    let thisYear = parseInt($(".sc-nav-month").html()), thisMoment;
    thisMoment = $.fullCalendar.moment(thisYear + "-" + thisMonth + "-01");
    $("#calendar").fullCalendar("gotoDate", thisMoment);
    history.back();
}
function monthPicker_goToYear(thisYear)
{
    $(".sc-nav-month").html(thisYear);
    monthPicker_hideMonthInterval();
}
function monthPicker_populateYearList(baseYear)
{
    let firstYear = baseYear - 6, i, lastYear, thisYear = parseInt(calendarYear);
    let selectedYear = $(".sc-month-picker-year").filter(".scButton_ok");
    if (selectedYear.length) {
        selectedYear.removeClass("scButton_ok").addClass("scButton_default");
    }
    for (i = 1; i <= 12; i++) {
        lastYear = firstYear + i - 1;
        $("#sc-id-year-" + i).html(lastYear);
        if (lastYear == thisYear) {
            $("#sc-id-year-" + i).removeClass("scButton_default").addClass("scButton_ok");
        }
    }
    $(".sc-nav-month-interval").html(firstYear + " - " + lastYear);
}
function monthPicker_highlightMonth()
{
    let selectedMonth = $(".sc-month-picker-month").filter(".scButton_ok");
    if (selectedMonth.length) {
        selectedMonth.removeClass("scButton_ok").addClass("scButton_default");
    }
    if ($(".sc-nav-month").html() == calendarYear) {
        $("#sc-id-month-" + calendarMonth).removeClass("scButton_default").addClass("scButton_ok");
    }
}
<?php
        }
    } // calendarOutput_javascriptMobile

    function calendarOutput_javascriptOnReady($javascriptParams)
    {
        $this->calendarOutput_javascriptOnReady_miniCalendar($javascriptParams);
        $this->calendarOutput_javascriptOnReady_mainCalendar($javascriptParams);
        if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']) {
            $this->calendarOutput_javascriptOnReady_mobile();
        }
    } // calendarOutput_javascriptOnReady

    function calendarOutput_javascriptOnReady_miniCalendar($javascriptParams)
    {
    } // calendarOutput_javascriptOnReady_miniCalendar

    function calendarOutput_javascriptOnReady_mainCalendar($javascriptParams)
    {
?>
    $('#calendar').fullCalendar({
        monthNames: [
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>"
        ],
        monthNamesShort: [
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>"
        ],
        dayNames: [
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>"
        ],
        dayNamesShort: [
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>"
        ],
        allDayText: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_per_allday"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
        allDayHtml: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_per_allday"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
        buttonText: {
            today: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            month: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_per_month"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            week: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_per_week"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            day: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_per_day"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            agenda: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_agenda"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            print: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_print"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
            listMonth: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_agenda"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
        },
        views: {
            month: {
                titleFormat: 'MMMM YYYY',
                columnFormat: 'ddd',
                timeFormat: 'H:mm',
                slotLabelFormat: [
                    'ddd', 
                    'H:mm'
                ],
            },
            week: {
                titleFormat: 'MMM D YYYY',
                columnFormat: 'ddd <?php echo $javascriptParams['date_col']; ?>',
                timeFormat: 'H:mm',
                slotLabelFormat: [
                    'ddd <?php echo $javascriptParams['date_col']; ?>',
                    'H:mm'
                ],
            },
            day: {
                titleFormat: 'dddd[,] MMM D[,] YYYY',
                columnFormat: 'dddd <?php echo $javascriptParams['date_col']; ?>',
                timeFormat: 'H:mm',
                slotLabelFormat: [
                    'dddd <?php echo $javascriptParams['date_col']; ?>',
                    'H:mm'
                ],
            },
        },
        firstDay: <?php echo $javascriptParams['first_day']; ?>,
        header: {
            left: 'prev,next today print',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listMonth<?php if ('' != $javascriptParams['app_return']) { echo ' goBack'; } ?>'
        },
        customButtons: {
            print: {
                text: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_print"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
                click: function() {
                    calendar_print();
                }
            },
            goBack: {
                text: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_back"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
                click: function() {
                    calendarGoBack();
                }
            }
        },
        editable: <?php echo ($this->calendarConfigValues['update'] ? 'true' : 'false'); ?>,
        slotDuration: "00:30:00",
        snapDuration: "00:05:00",
        nextDayThreshold: "00:00:00",
        eventStartEditable: true,
        allDaySlot: true,
<?php
        if (isset($this->Ini->Nm_lang["lang_calendar_no_events"]) && '' != $this->Ini->Nm_lang["lang_calendar_no_events"]) {
?>
        noEventsMessage: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_no_events"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
<?php
        } else {
?>
        noEventsMessage: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_per_nevent"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>",
<?php
        }
?>
        events: 'pre_lancamento_servicos.php?script_case_init=<?php echo $this->Ini->sc_page ?>&nmgp_opcao=calendar_fetch' + getCategory(false),
        eventRender: function (event, element, view) {
            if (event.hasOwnProperty('description') && event.description != '') {
                element.find('.fc-title').append('<div class="hr-line-solid-no-margin"></div><span style="font-size: 80%;">' + event.description + '</span></div>');
            }
        },
        dayClick: function(date, jsEvent, view) {
<?php
        if ($this->calendarConfigValues['insert']) {
?>
            var sDate = date.format(), sTime = '00:00:00', allDay = false;
            if (sDate.indexOf('T') > 0) {
                dateParts = date.format().split('T');
                sDate = dateParts[0], sTime = dateParts[1];
            } else if ('month' == view.type) {
                sTime = '06:00:00';
            } else {
                allDay = true;
            }
            addNewEvent(sDate, sTime, allDay);
<?php
        }
?>
        },
        eventClick: function(calEvent, jsEvent, view) {
            editEvent(calEvent.id);
        },
        eventDrop: function(event, delta, revertFunc) {
            $.ajax({
                url: 'pre_lancamento_servicos.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    'script_case_init': '<?php echo $this->Ini->sc_page ?>',
                    'nmgp_opcao': 'calendar_drop',
                    'sc_event_id': event.id,
                    'sc_day_delta': delta._data.days,
                    'sc_time_delta': (delta._data.hours * 60) + delta._data.minutes,
                    'sc_all_day': event.allDay,
                    'sc_fullcal_start': (event._start && event._start._d ? event._start._d.toISOString() : ''),
                    'sc_fullcal_end': (event._end && event._end._d ? event._end._d.toISOString() : '')
                },
                originalEvent: event,
                success: function(data) {
                    var bChanged = false;
                    if (typeof data['status'] !== "undefined" && false == data['status']) {
                        revertFunc();
                    } else {
                        if (typeof data['backgroundColor'] !== "undefined" && '' != data['backgroundColor']) {
                            if (this.originalEvent.backgroundColor != data['backgroundColor']) {
                                bChanged = true;
                            }
                            this.originalEvent.backgroundColor = data['backgroundColor'];
                        }
                        if (typeof data['borderColor'] !== "undefined" && '' != data['borderColor']) {
                            if (this.originalEvent.borderColor != data['borderColor']) {
                                bChanged = true;
                            }
                            this.originalEvent.borderColor = data['borderColor'];
                        }
                        if (this.originalEvent.allDay || this.originalEvent.originalAllDay || bChanged) {
                            $('#calendar').fullCalendar('refetchEvents');
                        } else {
                            $('#calendar').fullCalendar('updateEvent', this.originalEvent);
                        }
                    }
                    if (typeof data['message'] !== "undefined" && '' != data['message']) {
                        alert(data['message']);
                    }
                }
            });
        },
        eventResize: function(event, delta, revertFunc) {
            $.post(
                'pre_lancamento_servicos.php',
                {
                    'script_case_init': '<?php echo $this->Ini->sc_page ?>',
                    'nmgp_opcao': 'calendar_resize',
                    'sc_event_id': event.id,
                    'sc_day_delta': delta._data.days,
                    'sc_time_delta': (delta._data.hours * 60) + delta._data.minutes,
                    'sc_fullcal_start': (event._start && event._start._d ? event._start._d.toISOString() : ''),
                    'sc_fullcal_end': (event._end && event._end._d ? event._end._d.toISOString() : '')
                },
                function(data) {
                    if (false == data['status']) {
                        revertFunc();
                    }
                    if (typeof data['message'] !== "undefined" && '' != data['message']) {
                        alert(data['message']);
                    }
                },
                'json'
            );
        },
        defaultView: 'month',
    });
<?php
    } // calendarOutput_javascriptOnReady_mainCalendar

    function calendarOutput_javascriptOnReady_mobile()
    {
?>
    bootstrapMobile();
    $("#sc-mobile-menu-month").on("click", function() {
        mobileMenuMonthClick();
    });
    $("#sc-mobile-menu-week").on("click", function() {
        mobileMenuWeekClick();
    });
    $("#sc-mobile-menu-day").on("click", function() {
        mobileMenuDayClick();
    });
    $("#sc-mobile-menu-agenda").on("click", function() {
        mobileMenuAgendaClick();
    });
    $("#sc-mobile-menu-categories").on("click", function() {
        mobileMenuCategoriesClick();
    });
    $("#sc-mobile-menu-print").on("click", function() {
        mobileMenuPrintClick();
    });
    $("#sc-mobile-menu-import").on("click", function() {
        mobileMenuImportClick();
    });
    $("#sc-mobile-menu-export").on("click", function() {
        mobileMenuExportClick();
    });
    $(".sc-nav-prev").on("click", function() {
        monthPicker_goToPrevious();
    });
    $(".sc-nav-next").on("click", function() {
        monthPicker_goToNext();
    });
    $(".sc-nav-month").on("click", function() {
        monthPicker_showMonthInterval();
    });
    $(".sc-month-picker-month").on("click", function() {
        monthPicker_goToDate($(this).attr("id").substr(12));
    });
    $(".sc-month-picker-year").on("click", function() {
        monthPicker_goToYear($(this).html());
    });
<?php
    } // calendarOutput_javascriptOnReady_mobile

    function calendarOutput_calendar()
    {
        if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']) {
            $this->calendarOutput_calendarMobile();
        } else {
            $this->calendarOutput_calendarDesktop();
        }
    } // calendarOutput_calendar

    function calendarOutput_calendarDesktop()
    {
?>
<div class="scCalendarBorder sc-cal-page-container">
<?php
        $this->calendarOutput_sideBar();
        $this->calendarOutput_mainCalendar();
?>
</div>
<?php
    } // calendarOutput_calendarDesktop

    function calendarOutput_calendarMobile()
    {
?>
<div class="scCalendarBorder sc-cal-page-container">
<?php
        $this->calendarOutput_mainCalendar();
?>
</div>
<?php
        $this->calendarOutput_categoriesFilter();
        $this->calendarOutput_monthPicker();
        $this->calendarOutput_mobileMenu();
    } // calendarOutput_calendarMobile

    function calendarOutput_mainCalendar()
    {
?>
<div class="sc-cal-calendar-container">
    <div id="calendar" style=""></div>
</div>
<?php
    } // calendarOutput_mainCalendar

    function calendarOutput_sideBar()
    {
    } // calendarOutput_sideBar

    function calendarOutput_googleCalendarButtons()
    {
    } // calendarOutput_googleCalendarButtons

    function calendarOutput_miniCalendar()
    {
    } // calendarOutput_miniCalendar

    function calendarOutput_categoriesFilter()
    {
    } // calendarOutput_categoriesFilter

    function calendarOutput_monthPicker()
    {
?>
<div id="sc-id-month-picker" style="display: none">
    <div class="sc-month-picker-nav">
        <div>
            <span class="sc-nav-prev sc-month-picker-nav-button fas fa-arrow-left"></span>
        </div>
        <div>
            <span class="sc-nav-month"></span>
            <span class="sc-nav-month-interval" style="display: none"></span>
        </div>
        <div>
            <span class="sc-nav-next sc-month-picker-nav-button fas fa-arrow-right"></span>
        </div>
    </div>
    <div id="sc-id-month-list">
        <div class="sc-month-picker-row">
            <div class="sc-month-picker-cell">
                <span id="sc-id-month-01" class="scButton_default sc-month-picker-month sc-month-picker-button"><?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-month-02" class="scButton_default sc-month-picker-month sc-month-picker-button"><?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-month-03" class="scButton_default sc-month-picker-month sc-month-picker-button"><?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?></span>
            </div>
        </div>
        <div class="sc-month-picker-row">
            <div class="sc-month-picker-cell">
                <span id="sc-id-month-04" class="scButton_default sc-month-picker-month sc-month-picker-button"><?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-month-05" class="scButton_default sc-month-picker-month sc-month-picker-button"><?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-month-06" class="scButton_default sc-month-picker-month sc-month-picker-button"><?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?></span>
            </div>
        </div>
        <div class="sc-month-picker-row">
            <div class="sc-month-picker-cell">
                <span id="sc-id-month-07" class="scButton_default sc-month-picker-month sc-month-picker-button"><?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-month-08" class="scButton_default sc-month-picker-month sc-month-picker-button"><?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-month-09" class="scButton_default sc-month-picker-month sc-month-picker-button"><?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?></span>
            </div>
        </div>
        <div class="sc-month-picker-row">
            <div class="sc-month-picker-cell">
                <span id="sc-id-month-10" class="scButton_default sc-month-picker-month sc-month-picker-button"><?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-month-11" class="scButton_default sc-month-picker-month sc-month-picker-button"><?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-month-12" class="scButton_default sc-month-picker-month sc-month-picker-button"><?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?></span>
            </div>
        </div>
    </div>
    <div id="sc-id-year-list" style="display: none">
        <div class="sc-month-picker-row">
            <div class="sc-month-picker-cell">
                <span id="sc-id-year-1" class="scButton_default sc-month-picker-year sc-month-picker-button"></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-year-2" class="scButton_default sc-month-picker-year sc-month-picker-button"></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-year-3" class="scButton_default sc-month-picker-year sc-month-picker-button"></span>
            </div>
        </div>
        <div class="sc-month-picker-row">
            <div class="sc-month-picker-cell">
                <span id="sc-id-year-4" class="scButton_default sc-month-picker-year sc-month-picker-button"></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-year-5" class="scButton_default sc-month-picker-year sc-month-picker-button"></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-year-6" class="scButton_default sc-month-picker-year sc-month-picker-button"></span>
            </div>
        </div>
        <div class="sc-month-picker-row">
            <div class="sc-month-picker-cell">
                <span id="sc-id-year-7" class="scButton_default sc-month-picker-year sc-month-picker-button"></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-year-8" class="scButton_default sc-month-picker-year sc-month-picker-button"></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-year-9" class="scButton_default sc-month-picker-year sc-month-picker-button"></span>
            </div>
        </div>
        <div class="sc-month-picker-row">
            <div class="sc-month-picker-cell">
                <span id="sc-id-year-10" class="scButton_default sc-month-picker-year sc-month-picker-button"></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-year-11" class="scButton_default sc-month-picker-year sc-month-picker-button"></span>
            </div>
            <div class="sc-month-picker-cell">
                <span id="sc-id-year-12" class="scButton_default sc-month-picker-year sc-month-picker-button"></span>
            </div>
        </div>
    </div>
</div>
<?php
    } // calendarOutput_monthPicker

    function calendarOutput_mobileMenu()
    {
?>
<div class="calendar-mobile-menu-overlay"></div>
<div class="calendar-mobile-menu">
    <div class="calendar-mobile-menu-toolbar"></div>
    <div class="calendar-mobile-menu-items">
        <div><span id="sc-mobile-menu-month" style="align-items: center">
            <span class="far fa-calendar-alt"></span>
            &nbsp;
            <?php echo html_entity_decode($this->Ini->Nm_lang["lang_per_month"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>
        </span></div>
        <div><span id="sc-mobile-menu-week" style="align-items: center">
            <span class="fas fa-columns"></span>
            &nbsp;
            <?php echo html_entity_decode($this->Ini->Nm_lang["lang_per_week"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>
        </span></div>
        <div><span id="sc-mobile-menu-day" style="align-items: center">
            <span class="far fa-calendar-times""></span>
            &nbsp;
            <?php echo html_entity_decode($this->Ini->Nm_lang["lang_per_day"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>
        </span></div>
        <div><span id="sc-mobile-menu-agenda" style="align-items: center">
            <span class="fas fa-list"></span>
            &nbsp;
            <?php echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_agenda"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>
        </span></div>
        <hr />
        <div><span id="sc-mobile-menu-print" style="align-items: center">
            <span class="fas fa-print"></span>
            &nbsp;
            <?php echo html_entity_decode($this->Ini->Nm_lang["lang_calendar_print"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]); ?>
        </span></div>
    </div>
</div>
<?php
    } // calendarOutput_mobileMenu

    function calendarOutput_form()
    {
        $this->calendarOutput_formGeneral();
        $this->calendarOutput_formMobile();
    } // calendarOutput_form

    function calendarOutput_formGeneral()
    {
?>
<form name="F6" method="post" action="./" target="_self">
    <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>" />
</form>
<?php
    } // calendarOutput_formGeneral

    function calendarOutput_formMobile()
    {
        if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']) {
?>
<form name="F1" id="sc-ui-form" method="post" action="./" target="_self">
    <input type="hidden" name="nm_form_submit" value="1" />
    <input type="hidden" name="nmgp_url_saida" value="" />
    <input type="hidden" name="nmgp_opcao" id="sc-ui-nmgp_opcao" value="" />
    <input type="hidden" name="nmgp_parms" value="" />
    <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>" />
    <input type="hidden" name="sc_cal_click_date" id="sc-ui-click-date" value="" />
    <input type="hidden" name="sc_cal_click_time" id="sc-ui-click-time" value="" />
    <input type="hidden" name="sc_cal_click_allday" id="sc-ui-click-allday" value="" />
    <input type="hidden" name="idpre_lancamento" id="sc-ui-event-id" value="" />
</form>
<?php
        }
    } // calendarOutput_formMobile

   function calendarOutputJson($returnArray, $integerIndexes = false)
   {
       if (!isset($_GET['nmgp_opcao']) || ($_GET['nmgp_opcao'] != 'igual' && $_GET['nmgp_opcao'] != 'edit_novo'))
       {
            $Temp = ob_get_clean();
       }
       $returnFinal = array();
       foreach ($returnArray as $arrayKey => $arrayValue) {
           if ($integerIndexes) {
               $returnFinal[] = $arrayValue;
           } else {
               $returnFinal[$arrayKey] = $arrayValue;
           }
       }
       $oJson = new Services_JSON();
       echo $oJson->encode($returnFinal);
   } // calendarOutputJson

   function calendarOutputReload()
   {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html']; ?>" />
 <title></title>
 <script type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></script>
 <script type="text/javascript">
  $(document).ready(function() {
    self.parent.calendar_reload();
    self.parent.tb_remove();
  });
 </script>
</head>
<body>
</body>
</html>
<?php
   } // calendarOutputReload

   function calendarFetchEvents($sId = '', $bPrintCalendar = false)
   {
       $aEvents = $this->calendarFetchNormalEvents($sId, $bPrintCalendar);

       foreach ($aEvents as $iEvent => $aEventData)
       {
           if (isset($aEventData['event_color']))
           {
               $aEvents[$iEvent]['backgroundColor'] = $aEventData['event_color'];
               $aEvents[$iEvent]['borderColor']     = $aEventData['event_color'];
           }
           if ($aEventData['start'] < date('Y-m-d'))
           {
               $aEvents[$iEvent]['className'] = $this->calendarConfigValues['eventColorPast'];
           }
           elseif ($aEventData['start'] > date('Y-m-d'))
           {
               $aEvents[$iEvent]['className'] = $this->calendarConfigValues['eventColorFuture'];
           }
           else
           {
               $aEvents[$iEvent]['className'] = $this->calendarConfigValues['eventColorToday'];
           }
       }

       return $aEvents;
   } // calendarFetchEvents

   function calendarFetchNormalEvents($sId, $bPrintCalendar = false, $filter = null)
   {
       $aSelect = $this->calendarFetchSelect(null !== $filter);

       $whereClause = $this->calendarWhere($sId, false, $bPrintCalendar, $filter);
       if (false === $whereClause) {
           return array();
       }

       $sSql = 'SELECT ' . implode(', ', $aSelect)
             . ' FROM '  . $this->Ini->nm_tabela
             . $whereClause;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $sSql; 
       $oRs = $this->Db->Execute($sSql);

       $aEvents = array();

       while ($oRs && !$oRs->EOF)
       {
           $aEvent = array();

           $iSql = 0;
           foreach ($aSelect as $sFldName => $sFldSql)
           {
               if ('title' == $sFldName || 'description' == $sFldName)
               {
                   $aEvent[$sFldName] = NM_charset_to_utf8($oRs->fields[$iSql]);
                   $this->idpessoas = $aEvent['title'];
                   $this->ajax_return_values_idpessoas(true);
                   $aEvent['title'] = $this->_tmp_lookup_idpessoas;
               }
               else
               {
                   $aEvent[$sFldName] = $oRs->fields[$iSql];
               }
               $iSql++;
           }

           $aEvents[] = $aEvent;

           $oRs->MoveNext();
       }

       return $aEvents;
   } // calendarFetchNormalEvents

   function calendarFetchRecurrentEvents($sId, $bPrintCalendar = false)
   {
       if ('' != $sId)
       {
           return array();
       }

       $aSelect = $this->calendarFetchSelect();

       $whereClause = $this->calendarWhere($sId, true, $bPrintCalendar);
       if (false === $whereClause) {
           return array();
       }

       $sSql = 'SELECT ' . implode(', ', $aSelect)
             . ' FROM '  . $this->Ini->nm_tabela
             . $whereClause;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $sSql; 
       $oRs = $this->Db->Execute($sSql);

           $calendarDisplayStart = isset($_GET['start']) && '' != $_GET['start'] ? str_replace('-', '', $_GET['start']) : '';
           $calendarDisplayEnd   = isset($_GET['end'])   && '' != $_GET['end']   ? str_replace('-', '', $_GET['end'])   : '';

       $aEvents = array();

       while ($oRs && !$oRs->EOF)
       {
           $aEvent = array('recur_info' => null);

           $iSql = 0;
           foreach ($aSelect as $sFldName => $sFldSql)
           {
               if ('title' == $sFldName)
               {
                   $aEvent[$sFldName] = NM_charset_to_utf8($oRs->fields[$iSql]);
                   $this->idpessoas = $aEvent['title'];
                   $this->ajax_return_values_idpessoas(true);
                   $aEvent['title'] = $this->_tmp_lookup_idpessoas;
               }
               else
               {
                   $aEvent[$sFldName] = $oRs->fields[$iSql];
               }
               $iSql++;
           }

           switch ($aEvent['period'])
           {
               case '':
                   $this->calendarRecurrentDay($aEvents, $aEvent, $calendarDisplayStart, $calendarDisplayEnd);
                   break;

               case '':
                   $this->calendarRecurrentWeek($aEvents, $aEvent, $calendarDisplayStart, $calendarDisplayEnd);
                   break;

               case '':
                   $this->calendarRecurrentMonth($aEvents, $aEvent, $calendarDisplayStart, $calendarDisplayEnd);
                   break;

               case '':
                   $this->calendarRecurrentYear($aEvents, $aEvent, $calendarDisplayStart, $calendarDisplayEnd);
                   break;
           }

           $oRs->MoveNext();
       }

       return $aEvents;
   } // calendarFetchRecurrentEvents

   function calendarFetchSelect($googleInfo = false)
   {
       $aSelect = array();

       $aSelect['id'] = "idPre_lancamento";

       $aSelect['title'] = "idPessoas";

       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
       {
           $aSelect['start'] = "convert(char(23),data_do_servico,121)";
       }
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
       {
           $aSelect['start'] = "str_replace(convert(char(10),data_do_servico,102), '.', '-') + ' ' + convert(char(8),data_do_servico,20)";
       }
       else
       {
           $aSelect['start'] = "data_do_servico";
       }


       if ($googleInfo) {
       }

       return $aSelect;
   } // calendarFetchSelect

   function calendarWhere($sId, $bRecur = false, $bPrintCalendar = false, $filter = null)
   {
       if ('' != $sId)
       {
           return " WHERE idPre_lancamento = '" . $sId . "'";
       }

       $aWhere = array();

       if (null === $filter) {
           $sStart      = isset($_GET['start'])    && '' != $_GET['start']    ? $_GET['start']    : '';
           $sEnd        = isset($_GET['end'])      && '' != $_GET['end']      ? $_GET['end']      : '';
           $sCategory   = isset($_GET['category']) && '' != $_GET['category'] ? $_GET['category'] : '';

           if ('' != $sStart && '' != $sEnd)
           {
               $s_Ini_StartFormat = $sStart;
               $s_Ini_EndFormat   = $sEnd;
               if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
               {
                   $aWhere[] = "convert(char(23),data_do_servico,121) >= '" . $s_Ini_StartFormat . "' AND convert(char(23),data_do_servico,121) <= '" . $s_Ini_EndFormat . "'";
               }
               elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
               {
                   $aWhere[] = "str_replace(convert(char(10),data_do_servico,102), '.', '-') + ' ' + convert(char(8),data_do_servico,20) >= '" . $s_Ini_StartFormat . "' AND str_replace(convert(char(10),data_do_servico,102), '.', '-') + ' ' + convert(char(8),data_do_servico,20) <= '" . $s_Ini_EndFormat . "'";
               }
               elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
               {
                   $aWhere[] = "data_do_servico >= #" . $s_Ini_StartFormat . "# AND data_do_servico <= #" . $s_Ini_EndFormat . "#";
               }
               else
               {
                   $aWhere[] = "data_do_servico >= '" . $s_Ini_StartFormat . "' AND data_do_servico <= '" . $s_Ini_EndFormat . "'";
               }
           }

           $aFinal = array('(' . implode(') OR (', $aWhere) . ')');
       }
       else {
           $aRules = array();
           if (!$filter['_sc_evt_all'] && $filter['_sc_evt_empty']) {
               $aRules[] = " = ''";
           }
           if (!$filter['_sc_evt_all'] && $filter['_sc_evt_google']) {
               $aRules[] = " = '" . $_POST['sc_calendar_id'] . "'";
           }

           $aFinal = !empty($aRules) ? array('(' . implode(') OR (', $aRules) . ')') : array();
       }

       $cWhere = array();
       $sc_where_filter = '';
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['where_filter_form'])
       {
           $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['where_filter_form'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['where_filter'])
       {
           if (empty($sc_where_filter))
           {
               $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['where_filter'];
           }
           else
           {
               $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['where_filter'] . ")";
           }
       }
       $cWhere[] = $sc_where_filter;
       $wUsr     = $this->returnWhere($cWhere);
       if (!empty($wUsr))
       {
           $aFinal[] = substr(trim($wUsr), 5);
       }

       return empty($aFinal) ? '' : ' WHERE (' . implode(') AND (', $aFinal) . ')';
   } // calendarWhere

    function calendarRecurrentDay(&$eventsToDisplay, $thisEvent, $calendarDisplayStart, $calendarDisplayEnd) {
        $this->calendarRecurrence(
            $eventsToDisplay,
            $thisEvent,
            $this->calendarRecurrenceParams($thisEvent, $calendarDisplayStart, $calendarDisplayEnd, 'daily')
        );
    } // calendarRecurrentDay

    function calendarRecurrentWeek(&$eventsToDisplay, $thisEvent, $calendarDisplayStart, $calendarDisplayEnd) {
        $this->calendarRecurrence(
            $eventsToDisplay,
            $thisEvent,
            $this->calendarRecurrenceParams($thisEvent, $calendarDisplayStart, $calendarDisplayEnd, 'weekly')
        );
    } // calendarRecurrentWeek

    function calendarRecurrentMonth(&$eventsToDisplay, $thisEvent, $calendarDisplayStart, $calendarDisplayEnd) {
        $this->calendarRecurrence(
            $eventsToDisplay,
            $thisEvent,
            $this->calendarRecurrenceParams($thisEvent, $calendarDisplayStart, $calendarDisplayEnd, 'monthly')
        );
    } // calendarRecurrentMonth

    function calendarRecurrentYear(&$eventsToDisplay, $thisEvent, $calendarDisplayStart, $calendarDisplayEnd) {
        $this->calendarRecurrence(
            $eventsToDisplay,
            $thisEvent,
            $this->calendarRecurrenceParams($thisEvent, $calendarDisplayStart, $calendarDisplayEnd, 'yearly')
        );
    } // calendarRecurrentYear

    function calendarRecurrence(&$eventsToDisplay, $thisEvent, $params) {
        if (isset($thisEvent['recur_info'])) {
            switch ($thisEvent['recur_info']->endon) {
                case 'N': // never
                    $this->calendarRecurrenceNever($eventsToDisplay, $thisEvent, $params);
                    return;

                case 'A': // after X occurrences
                    $this->calendarRecurrenceAfterOccurrences($eventsToDisplay, $thisEvent, $params);
                    return;

                case 'I': // in X date
                    $this->calendarRecurrenceInDate($eventsToDisplay, $thisEvent, $params);
                    return;
            }
        }

        $this->calendarRecurrenceOnEvent($eventsToDisplay, $thisEvent, $params);
    } // calendarRecurrence

    function calendarRecurrenceParams($thisEvent, $calendarDisplayStart, $calendarDisplayEnd, $period) {
        $startTimestamp = $this->calendarStartToTimestamp($thisEvent);
        $startDate      = date('Ymd', $startTimestamp);
        $startTime      = date('His', $startTimestamp);

        $endTimestamp = $this->calendarEndToTimestamp($thisEvent);
        if (false === $endTimestamp) {
            $endTimestamp = $startTimestamp;
        }
        $endDate = date('Ymd', $endTimestamp);
        $endTime = date('His', $endTimestamp);

        $params = array(
            'displayStartDate' => $calendarDisplayStart,
            'displayEndDate'   => $calendarDisplayEnd,
            'startDate'        => $startDate,
            'startTime'        => $startTime,
            'endDate'          => $endDate,
            'testEndDate'      => $endDate,
            'endTime'          => $endTime,
            'period'           => $period,
            'repeat'           => !isset($thisEvent['recur_info']) ? 1  : $thisEvent['recur_info']->repeat,
            'endafter'         => !isset($thisEvent['recur_info']) ? '' : $thisEvent['recur_info']->endafter,
            'endin'            => !isset($thisEvent['recur_info']) ? '' : str_replace('-', '', $thisEvent['recur_info']->endin),
            'daysToAdd'        => array(),
            'forceEndToStart'  => false
        );

        if (isset($thisEvent['recur_info']) && 'weekly' == $period && '' != $thisEvent['recur_info']->repeatin) {
            $params['daysToAdd'] = explode(';', $thisEvent['recur_info']->repeatin);
        }

        return $params;
    } // calendarRecurrenceParams

    function calendarRecurrenceOnEvent(&$eventsToDisplay, $thisEvent, $params) {
        $params['endafter']        = 0;
        $params['forceEndToStart'] = true;

        $this->calendarRecurrenceGetEvents($eventsToDisplay, $thisEvent, $params);
    } // calendarRecurrenceOnEvent

    function calendarRecurrenceNever(&$eventsToDisplay, $thisEvent, $params) {
        $params['endDate']  = $params['displayEndDate'];
        $params['endafter'] = 0;

        $this->calendarRecurrenceGetEvents($eventsToDisplay, $thisEvent, $params);
    } // calendarRecurrenceNever

    function calendarRecurrenceAfterOccurrences(&$eventsToDisplay, $thisEvent, $params) {
        $params['endDate'] = $params['displayEndDate'];

        $this->calendarRecurrenceGetEvents($eventsToDisplay, $thisEvent, $params);
    } // calendarRecurrenceAfterOccurrences

    function calendarRecurrenceInDate(&$eventsToDisplay, $thisEvent, $params) {
        $params['endDate']  = $params['endin'];
        $params['endafter'] = 0;

        $this->calendarRecurrenceGetEvents($eventsToDisplay, $thisEvent, $params);
    } // calendarRecurrenceInDate

    function calendarRecurrenceGetEvents(&$eventsToDisplay, $thisEvent, $params) {
    $params['displayStartDate'] = $this->calendarGetDateOnly($params['displayStartDate']);
    $params['displayEndDate']   = $this->calendarGetDateOnly($params['displayEndDate']);
    $params['startDate']        = $this->calendarGetDateOnly($params['startDate']);
    $params['endDate']          = $this->calendarGetDateOnly($params['endDate']);

        $thisStartDate  = $params['startDate'];
        $thisEndDate    = $params['testEndDate'];
        $periodCount    = 1;
        $skip           = 0;
        $occurences     = 0;
        $daysCorrection = array('SU' => 0, 'MO' => 1, 'TU' => 2, 'WE' => 3, 'TH' => 4, 'FR' => 5, 'SA' => 6);

        while ($thisStartDate < $params['displayEndDate']) {
            if ($thisStartDate <= $params['endDate']) {
                $addEvent = true;

                if (1 < $params['repeat']) {
                    $skip++;

                    if (1 < $skip) {
                        if ($skip == $params['repeat']) {
                            $skip  = 0;
                        }

                        $addEvent = false;
                    }
                }

                if ($addEvent) {
                    // add date only
                    if (empty($params['daysToAdd'])) {
                        if ($params['displayStartDate'] <= $thisStartDate) {
                            $newEvent = $thisEvent;
                            $this->calendarTimestampToStart($newEvent, $this->calendarGetMktime($thisStartDate, $params['startTime']), $newEvent['allDay']);
                            if ($params['forceEndToStart']) {
                                $this->calendarTimestampToEnd($newEvent, $this->calendarGetMktime($thisStartDate, $params['endTime']), $newEvent['allDay']);
                            }
                            else {
                                $this->calendarTimestampToEnd($newEvent, $this->calendarGetMktime($thisEndDate, $params['endTime']), $newEvent['allDay']);
                            }

                            $eventsToDisplay[] = $newEvent;
                        }

                        $occurences++;

                        if (0 < $params['endafter'] && $occurences >= $params['endafter']) {
                            break;
                        }
                    }
                    // add specific week days based on date
                    else {
                        $diffToSunday = date('w', strtotime($thisStartDate));
                        $sundayDate   = $this->calendarRecurrentAddDay($thisStartDate, $diffToSunday * -1);

                        foreach ($params['daysToAdd'] as $newDay) {
                            $newDate = $this->calendarRecurrentAddDay($sundayDate, $daysCorrection[$newDay]);

                            if ($params['displayEndDate'] > $newDate && $newDate <= $params['endDate']) {
                                if ($params['displayStartDate'] <= $newDate) {
                                    $newEvent = $thisEvent;
                                    $this->calendarTimestampToStart($newEvent, $this->calendarGetMktime($newDate, $params['startTime']), $newEvent['allDay']);
                                    $this->calendarTimestampToEnd($newEvent, $this->calendarGetMktime($newDate, $params['endTime']), $newEvent['allDay']);

                                    $eventsToDisplay[] = $newEvent;
                                }

                                $occurences++;

                                if (0 < $params['endafter'] && $occurences >= $params['endafter']) {
                                    break 2;
                                }
                            }
                        }
                    }
                }
            }

            $this->calendarRecurrenceAddPeriod($params['period'], $periodCount, $thisStartDate, $thisEndDate, $params['startDate'], $params['testEndDate']);

            $periodCount++;
        }
    } // calendarRecurrenceGetEvents

    function calendarGetDateOnly($date) {
    if (false !== strpos($date, 'T')) {
      $parts = explode('T', $date);
      return $parts[0];
    }

    return $date;
    } // calendarGetDateOnly

    function calendarRecurrenceAddPeriod($period, $periodCount, &$thisStart, &$thisEnd, $start, $end) {
        switch ($period) {
            case 'daily':
                $thisStart = $this->calendarRecurrentAddDay($start, $periodCount);
                $thisEnd   = $this->calendarRecurrentAddDay($end, $periodCount);
                break;

            case 'weekly':
                $thisStart = $this->calendarRecurrentAddDay($start, $periodCount * 7);
                $thisEnd   = $this->calendarRecurrentAddDay($end, $periodCount * 7);
                break;

            case 'monthly':
                $thisStart = $this->calendarRecurrentAddMonth($start, $periodCount);
                $thisEnd   = $this->calendarRecurrentAddMonth($end, $periodCount);
                break;

            case 'yearly':
                $thisStart = $this->calendarRecurrentAddYear($start, $periodCount);
                $thisEnd   = $this->calendarRecurrentAddYear($end, $periodCount);
                break;
        }
    } // calendarRecurrenceAddPeriod

   function calendarRecurrentAddDay($sDate, $iAdd)
   {
       $iDate = $this->calendarGetMktime($sDate, '000000', $iAdd);

       return date('Ymd', $iDate);
   } // calendarRecurrentAddDay

   function calendarRecurrentAddMonth($sDate, $iAdd)
   {
       $iYear  = (integer) substr($sDate, 0, 4);
       $iMonth = (integer) substr($sDate, 4, 2) + $iAdd;
       $iDay   = (integer) substr($sDate, 6, 2);

       while (12 < $iMonth)
       {
           $iMonth -= 12;
           $iYear++;
       }

       if (2 == $iMonth && !$this->calendarIsLeapYear($iYear) && 28 < $iDay)
       {
           $sDate = $iYear . '0228';
       }
       elseif (2 == $iMonth && $this->calendarIsLeapYear($iYear) && 29 < $iDay)
       {
           $sDate = $iYear . '0228';
       }
       elseif (in_array($iMonth, array(4, 6, 9, 11)) && 31 == $iDay)
       {
           $sDate = $iYear . (10 > $iMonth ? '0' . $iMonth : $iMonth) . '30';
       }
       else
       {
           $sDate = $iYear . (10 > $iMonth ? '0' . $iMonth : $iMonth) . substr($sDate, 6);
       }

       return $sDate;
   } // calendarRecurrentAddMonth

   function calendarRecurrentAddYear($sDate, $iAdd)
   {
       $iYear  = substr($sDate, 0, 4) + $iAdd;
       $iMonth = (integer) substr($sDate, 4, 2);
       $iDay   = (integer) substr($sDate, 6, 2);

       if (2 == $iMonth && !$this->calendarIsLeapYear($iYear) && 29 == $iDay)
       {
           $sDate = $iYear . '0228';
       }
       else
       {
           $sDate = $iYear . substr($sDate, 4);
       }

       return $sDate;
   } // calendarRecurrentAddYear

   function calendarIsLeapYear(&$iYear)
   {
       if ($iYear % 4 != 0)
       {
           return false;
       }
       else
       {
           if ($iYear % 100 != 0)
           {
               return true;
           }
           else
           {
               if ($iYear % 400 != 0)
               {
                   return false;
               }
               else
               {
                   return true;
               }
           }
       }
   } // calendarIsLeapYear

   function calendarHandleEvents($aEvents)
   {
       foreach ($aEvents as $i => $aEventData)
       {
           if (false !== strpos($aEventData['start'], ' '))
           {
               $aTemp               = explode(' ', $aEventData['start']);
               $aEventData['start'] = $aTemp[0];
           }

           $aEvents[$i] = $aEventData;
       }

       return $aEvents;
   } // calendarHandleEvents

   function calendarNormalizeEvents($aEvents)
   {
       $aEvents = $this->calendarHandleEvents($aEvents);

       foreach ($aEvents as $i => $aEventData)
       {
           if ((isset($aEventData['id']) && '' == $aEventData['id']) || (isset($aEventData['title']) && '' == $aEventData['title']) || (isset($aEventData['start']) && '' == $aEventData['start']))
           {
               unset($aEvents[$i]);
           }
           else
           {

               $bStartTime = false;
               $bEndTime   = false;

               if (isset($aEventData['start_time']) && '' == $aEventData['start_time'])
               {
                   unset($aEventData['start_time']);
               }

               if (isset($aEventData['end']) && '' == $aEventData['end'])
               {
                   unset($aEventData['end']);
                   unset($aEventData['end_time']);
               }
               elseif (isset($aEventData['end_time']) && '' == $aEventData['end_time'])
               {
                   unset($aEventData['end_time']);
               }

               if ((isset($aEventData['start_time']) && ('' == $aEventData['start_time'] || '00:00:00' == $aEventData['start_time'])) && (isset($aEventData['end_time']) && ('' == $aEventData['end_time'] || '00:00:00' == $aEventData['end_time'])))
               {
                   unset($aEventData['start_time']);
                   unset($aEventData['end_time']);
               }


               if (isset($aEventData['start']) && isset($aEventData['start_time']))
               {
                   $aEventData['start'] .= ' ' . $aEventData['start_time'];
                   unset($aEventData['start_time']);
                   $bStartTime = true;
               }
               if (isset($aEventData['end']) && isset($aEventData['end_time']))
               {
                   $aEventData['end'] .= ' ' . $aEventData['end_time'];
                   unset($aEventData['end_time']);
                   $bEndTime = true;
               }

               if ($bStartTime)
               {
                   $aEventData['allDay'] = false;
               }
               else
               {
                   $aEventData['allDay'] = true;
               }

               if ($aEventData['allDay'] && isset($aEventData['end']) && '' != $aEventData['end'] && $aEventData['start'] < $aEventData['end'])
               {
                   $mktime = mktime(0, 0, 0,
                       (integer) substr($aEventData['end'], 5, 2),
                       ((integer) substr($aEventData['end'], 8, 2)) + 1,
                       (integer) substr($aEventData['end'], 0, 4));
                   $aEventData['end'] = date('Y-m-d', $mktime);
               }

               $aEvents[$i] = $aEventData;
           }
       }

       return $aEvents;
   } // calendarNormalizeEvents

   function calendarPrintEvents($aEvents)
   {
       $aEventHtml = array();
       $sPrintHtml = '';
       $sLastDay   = '';

       $sPrintHtml .= "<html" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\n";
       $sPrintHtml .= "<head>\n";
       $sPrintHtml .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
       $sPrintHtml .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_appcalendar.css\" />\n";
       $sPrintHtml .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_appcalendar" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" />\n";
       $sPrintHtml .= "<style type=\"text/css\">\n";
       $sPrintHtml .= ".sc-ui-cal-time { padding-left: 20px }\n";
       $sPrintHtml .= ".sc-ui-cal-event { padding-left: 35px }\n";
       $sPrintHtml .= "</style>\n";
       $sPrintHtml .= "</head>\n";
       $sPrintHtml .= "<body>\n";

       $sPrintHtml .= "" . $this->Ini->Nm_lang['lang_events_order'] . "<hr style=\"border-style: solid; border-width: 1px 0 0 0\"/><br />\n";
       foreach ($this->calendarPrintSort($aEvents) as $aEventData)
       {
           $aStartInfo = explode(' ', $aEventData['start']);
           $aEndInfo   = explode(' ', $aEventData['end']);
           if (!isset($aStartInfo[1]))
           {
               $aStartInfo[1] = '';
           }
           if (!isset($aEndInfo[1]))
           {
               $aEndInfo[1] = '';
           }

           $sEventHtml = '';

           if ('' == $sLastDay || $aStartInfo[0] != $sLastDay)
           {
               $sEventHtml .= '<div class="scCalendarPrintDate">' . sc_convert_encoding($this->calendarPrintFormatDate($aStartInfo[0]), 'UTF-8', $_SESSION['scriptcase']['charset']) . "</div>\n";
               $sLastDay = $aStartInfo[0];
           }
           $sEventHtml .= '<div class="scCalendarPrintTime sc-ui-cal-time">';
           if ('' == $aStartInfo[1])
           {
               $sEventHtml .= sc_convert_encoding($this->Ini->Nm_lang['lang_per_allday'], 'UTF-8', $_SESSION['scriptcase']['charset']);
           }
           elseif ($aEventData['start'] == $aEventData['end'])
           {
               $sEventHtml .= $aStartInfo[1];
           }
           else
           {
               $sEventHtml .= $aStartInfo[1] . ' ' . sc_convert_encoding($this->Ini->Nm_lang['lang_othr_txto'], 'UTF-8', $_SESSION['scriptcase']['charset']) . ' ' . $aEndInfo[1];
           }
           $sEventHtml .= "</div>\n";
           $sEventHtml .= '<div class="scCalendarPrintEvent sc-ui-cal-event">';
           $sEventHtml .= $aEventData['title'];
           $sEventHtml .= "</div>\n";

           $aEventHtml[] = $sEventHtml;
       }

       $sPrintHtml .= implode('<br />', $aEventHtml);

       $sPrintHtml .= "</body>\n";
       $sPrintHtml .= "</html>\n";

       $sTmpFile  = $this->Ini->path_imag_temp . '/sc_cal_print' . md5(session_id() . microtime()) . '.html';
       $rHtmlFile = @fopen($this->Ini->root . $sTmpFile, 'w');
       if ($rHtmlFile)
       {
           @fwrite($rHtmlFile, $sPrintHtml);
           @fclose($rHtmlFile);
           return array('outputFormat' => 'file', 'fileHtml' => $sTmpFile);
       }
       else
       {
           return array('outputFormat' => 'html', 'printHtml' => $sPrintHtml);
       }
   } // calendarPrintEvents

   function calendarPrintSort($aEvents)
   {
       $aUnsortedEvents = array();
       $aSortedEvents   = array();

       foreach ($aEvents as $aEventData)
       {
           if (!isset($aUnsortedEvents[ $aEventData['start'] ]))
           {
               $aUnsortedEvents[ $aEventData['start'] ] = array();
           }
           if (!isset($aUnsortedEvents[ $aEventData['start'] ][ $aEventData['end'] ]))
           {
               $aUnsortedEvents[ $aEventData['start'] ][ $aEventData['end'] ] = array();
           }
           $aUnsortedEvents[ $aEventData['start'] ][ $aEventData['end'] ][] = $aEventData;
       }

       ksort($aUnsortedEvents);
       foreach ($aUnsortedEvents as $aEventsEnd)
       {
           ksort($aEventsEnd);
           foreach ($aEventsEnd as $aEventList)
           {
               foreach ($aEventList as $aEventData)
               {
                   $aSortedEvents[] = $aEventData;
               }
           }
       }

       return $aSortedEvents;
   } // calendarPrintSort

   function calendarPrintFormatDate($sDate)
   {
       $aDateTime     = explode(' ', $sDate);
       $aDateParts    = explode('-', $aDateTime[0]);
       $iMktime       = mktime(0, 0, 0, $aDateParts[1], $aDateParts[2], $aDateParts[0]);
       $sFormatString = "l, F j";
       $sFormatted    = '';
       $bSlash        = false;

       for ($i = 0; $i < strlen($sFormatString); $i++)
       {
           $sFormatChar = $sFormatString[$i];
           if (!$bSlash && "\\" == $sFormatChar)
           {
               $bSlash = true;
           }
           elseif ($bSlash)
           {
               $bSlash      = false;
               $sFormatChar = "\\" . $sFormatString[$i];
           }
           if ($bSlash)
           {
               continue;
           }
           elseif ('D' == $sFormatChar || 'l' == $sFormatChar)
           {
               $sWeekDay = date('w', $iMktime);
               $sShort   = 'D' == $sFormatChar ? 'shrt_' : '';
               switch ($sWeekDay)
               {
                   case '0':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '1':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '2':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '3':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '4':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '5':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '6':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
               }
           }
           elseif ('F' == $sFormatChar || 'M' == $sFormatChar)
           {
               $sShort = 'M' == $sFormatChar ? 'shrt_' : '';
               switch ($aDateParts[1])
               {
                   case '1':
                   case '01':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '2':
                   case '02':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '3':
                   case '03':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '4':
                   case '04':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '5':
                   case '05':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '6':
                   case '06':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '7':
                   case '07':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '8':
                   case '08':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '9':
                   case '09':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '10':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '11':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
                   case '12':
                       $sFormatted .= html_entity_decode($this->Ini->Nm_lang['lang_' . $sShort . 'mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                       break;
               }
           }
           else
           {
               $sFormatted .= date($sFormatChar, $iMktime);
           }
       }

       return $sFormatted;
   } // calendarPrintFormatDate

   function calendarUpdateEvent($sOp, $sId, $iDays, $iMinutes, $bAllDay, $fullcalendarStart, $fullcalendarEnd)
   {
       $aEvents = $this->calendarFetchEvents($sId);
       if (1 != sizeof($aEvents))
       {
           return array('status' => false, 'message' => 'Erro ao recuperar informacoes do evento');
       }
       $aEvent = $aEvents[0];

       $iStart = $this->calendarStartToTimestamp($aEvent);

       if (false === $iStart)
       {
           return array('status' => false, 'message' => 'Erro na manipulacao da data inicial');
       }

       if ('move' == $sOp) {
           $iStart += ($iDays * 86400) + ($iMinutes * 60);
       }

       $this->calendarTimestampToStart($aEvent, $iStart, $bAllDay);

       if ('' == $aEvent['start'])
       {
           $aEvent['start'] = 'null';
       }

       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
       {
           $sSql = 'UPDATE ' . $this->Ini->nm_tabela . " SET data_do_servico = #" . $aEvent['start'] . "#" . $this->calendarWhere($sId);
       }
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
       {
           $sSql = 'UPDATE ' . $this->Ini->nm_tabela . " SET data_do_servico = EXTEND(data_do_servico, YEAR TO DAY)" . $this->calendarWhere($sId);
       }
       else
       {
           $sSql = 'UPDATE ' . $this->Ini->nm_tabela . " SET data_do_servico = '" . $aEvent['start'] . "'" . $this->calendarWhere($sId);
       }

       $sSql = str_replace(array('#null#', "'null'"), array('null', 'null'), $sSql);

       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $sSql; 
       $oRs = $this->Db->Execute($sSql);

       if (false === $iStart)
       {
           return array('status' => false, 'message' => 'Erro na atualizacao do evento');
       }

       $aReturn = array('status' => true, 'message' => '');

       if ($aEvent['start_only'] < date('Y-m-d'))
       {
           $aReturn['backgroundColor'] = $aReturn['borderColor'] = $this->calendarConfigValues['eventColorPast'];
       }
       elseif ($aEvent['start_only'] > date('Y-m-d'))
       {
           $aReturn['backgroundColor'] = $aReturn['borderColor'] = $this->calendarConfigValues['eventColorFuture'];
       }
       else
       {
           $aReturn['backgroundColor'] = $aReturn['borderColor'] = $this->calendarConfigValues['eventColorToday'];
       }

       return $aReturn;
   } // calendarUpdateEvent

   function calendarStartToTimestamp($aEvent)
   {
       if (!isset($aEvent['start']) || '' == $aEvent['start'])
       {
           return false;
       }

       $iYear  = (integer) substr($aEvent['start'], 0, 4);
       $iMonth = (integer) substr($aEvent['start'], 5, 2);
       $iDay   = (integer) substr($aEvent['start'], 8, 2);

       $iHour   = 0;
       $iMinute = 0;
       $iSecond = 0;

       return mktime($iHour, $iMinute, $iSecond, $iMonth, $iDay, $iYear);
   } // calendarStartToTimestamp

   function calendarEndToTimestamp($aEvent)
   {
       if (!isset($aEvent['end']) || '' == $aEvent['end'])
       {
           return false;
       }

       $iYear  = (integer) substr($aEvent['end'], 0, 4);
       $iMonth = (integer) substr($aEvent['end'], 5, 2);
       $iDay   = (integer) substr($aEvent['end'], 8, 2);

       $iHour   = 0;
       $iMinute = 0;
       $iSecond = 0;

       return mktime($iHour, $iMinute, $iSecond, $iMonth, $iDay, $iYear);
   } // calendarEndToTimestamp

   function calendarFullcalendarToTimestamp($dateTime)
   {
       $iYear   = (integer) substr($dateTime, 0, 4);
       $iMonth  = (integer) substr($dateTime, 5, 2);
       $iDay    = (integer) substr($dateTime, 8, 2);
       $iHour   = (integer) substr($dateTime, 11, 2);
       $iMinute = (integer) substr($dateTime, 14, 2);
       $iSecond = (integer) substr($dateTime, 17, 2);

       return mktime($iHour, $iMinute, $iSecond, $iMonth, $iDay, $iYear);
   } // calendarStartToTimestamp

   function calendarTimestampToStart(&$aEvent, $iTimestamp, $bAllDay)
   {
       if ($bAllDay)
       {
           $this->calendarRemoveTime($iTimestamp);
       }

       $aEvent['start_only'] = date('Y-m-d', $iTimestamp);
       $aEvent['start'] = date('Y-m-d', $iTimestamp);
   } // calendarTimestampToStart

   function calendarTimestampToEnd(&$aEvent, $iTimestamp, $bAllDay)
   {
       if ($bAllDay)
       {
           $this->calendarRemoveTime($iTimestamp);
       }

       $aEvent['end'] = date('Y-m-d', $iTimestamp);
   } // calendarTimestampToEnd

   function calendarGetMktime($sDate, $sTime, $iAddDay = 0)
   {
       return mktime( (integer) substr($sTime, 0, 2),
                      (integer) substr($sTime, 2, 2),
                      (integer) substr($sTime, 4, 2),
                      (integer) substr($sDate, 4, 2),
                     ((integer) substr($sDate, 6, 2)) + $iAddDay,
                      (integer) substr($sDate, 0, 4));
   } // calendarGetMktime

   function calendarDragDrop()
   {
       return $this->calendarUpdateEvent('move', $this->sc_event_id, $this->sc_day_delta, $this->sc_time_delta, 'true' == $this->sc_all_day, $this->sc_fullcal_start, $this->sc_fullcal_end);
   } // calendarDragDrop

   function calendarResize()
   {
       return $this->calendarUpdateEvent('resize', $this->sc_event_id, $this->sc_day_delta, $this->sc_time_delta, false, $this->sc_fullcal_start, $this->sc_fullcal_end);
   } // calendarDragDrop

   function calendarRemoveTime(&$iTimestamp)
   {
       $iTimestamp = mktime(0, 0, 0, date('m', $iTimestamp), date('d', $iTimestamp), date('Y', $iTimestamp));
   } // calendarRemoveTime

   function calendarInitTimestamp()
   {
       $aDate = explode('-', $this->sc_cal_click_date);
       $aTime = 'true' == $this->sc_cal_click_allday ? array(0, 0, 0) : explode(':', $this->sc_cal_click_time);

       $iInit = mktime($aTime[0], $aTime[1], $aTime[2], $aDate[1], $aDate[2], $aDate[0]);
       $iEnd  = 'true' == $this->sc_cal_click_allday ? $iInit : $iInit + 7200;

       return array($iInit, $iEnd);
   } // calendarInitTimestamp

   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarTimeStart($sFormat)
   {
       $aDateParts = explode(';', $sFormat);

       if (2 == sizeof($aDateParts))
       {
           $sTime = $aDateParts[1];
       }
       else
       {
           $sTime = 'hh:mm:ss';
       }

       return str_replace(array('h', 'm', 'i', 's'), array('0', '0', '0', '0'), $sTime);
   } // jqueryCalendarTimeStart

   function jqueryCalendarWeekInit($sDay)
   {
       switch ($sDay) {
           case 'MO': return 1; break;
           case 'TU': return 2; break;
           case 'WE': return 3; break;
           case 'TH': return 4; break;
           case 'FR': return 5; break;
           case 'SA': return 6; break;
           default  : return 7; break;
       }
   } // jqueryCalendarWeekInit

   function jqueryIconFile($sModule)
   {
       $sImage = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && 'image' == $this->arr_buttons['bcalendario']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalendario']['display'])
           {
               $sImage = $this->arr_buttons['bcalendario']['image'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && 'image' == $this->arr_buttons['bcalculadora']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalculadora']['display'])
           {
               $sImage = $this->arr_buttons['bcalculadora']['image'];
           }
       }

       return '' == $sImage ? '' : $this->Ini->path_icones . '/' . $sImage;
   } // jqueryIconFile

   function jqueryFAFile($sModule)
   {
       $sFA = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
           {
               $sFA = $this->arr_buttons['bcalendario']['fontawesomeicon'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
           {
               $sFA = $this->arr_buttons['bcalculadora']['fontawesomeicon'];
           }
       }

       return '' == $sFA ? '' : "<span class='scButton_fontawesome " . $sFA . "'></span>";
   } // jqueryFAFile

   function jqueryButtonText($sModule)
   {
       $sClass = '';
       $sText  = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalendario']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalendario']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalendario']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i>";
                   }
               }
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalculadora']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalculadora']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalculadora']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> ";
                   }
               }
           }
       }

       return '' == $sText ? array('', '') : array($sText, $sClass);
   } // jqueryButtonText


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

        function addUrlParam($url, $param, $value) {
                $urlParts  = explode('?', $url);
                $urlParams = isset($urlParts[1]) ? explode('&', $urlParts[1]) : array();
                $objParams = array();
                foreach ($urlParams as $paramInfo) {
                        $paramParts = explode('=', $paramInfo);
                        $objParams[ $paramParts[0] ] = isset($paramParts[1]) ? $paramParts[1] : '';
                }
                $objParams[$param] = $value;
                $urlParams = array();
                foreach ($objParams as $paramName => $paramValue) {
                        $urlParams[] = $paramName . '=' . $paramValue;
                }
                return $urlParts[0] . '?' . implode('&', $urlParams);
        }
 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

function sc_file_size($file, $format = false)
{
    if ('' == $file) {
        return '';
    }
    if (!@is_file($file)) {
        return '';
    }
    $fileSize = @filesize($file);
    if ($format) {
        $suffix = '';
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' KB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' MB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' GB';
        }
        $fileSize = $fileSize . $suffix;
    }
    return $fileSize;
}


 function new_date_format($type, $field)
 {
     $new_date_format_out = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format_out .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format_out .= $time_sep;
         }
         else
         {
             $new_date_format_out .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format_out;
     if ('DH' == $type)
     {
         $new_date_format_out                                  = explode(';', $new_date_format_out);
         $this->field_config[$field]['date_format_js']        = $new_date_format_out[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format_out[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function Form_lookup_idespecialidade_servicos()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idespecialidade_servicos']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idespecialidade_servicos'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idespecialidade_servicos']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idespecialidade_servicos'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idespecialidade_servicos']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idespecialidade_servicos'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idespecialidade_servicos']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idespecialidade_servicos'] = array(); 
    }

   $old_value_idpre_lancamento = $this->idpre_lancamento;
   $old_value_num_guia = $this->num_guia;
   $old_value_data_do_servico = $this->data_do_servico;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idpre_lancamento = $this->idpre_lancamento;
   $unformatted_value_num_guia = $this->num_guia;
   $unformatted_value_data_do_servico = $this->data_do_servico;

   $__calend_all_day___val_str = "''";
   if (!empty($this->__calend_all_day__))
   {
       if (is_array($this->__calend_all_day__))
       {
           $Tmp_array = $this->__calend_all_day__;
       }
       else
       {
           $Tmp_array = explode(";", $this->__calend_all_day__);
       }
       $__calend_all_day___val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $__calend_all_day___val_str)
          {
             $__calend_all_day___val_str .= ", ";
          }
          $__calend_all_day___val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT TOP (200) idEspecialidade_servicos, descricao_especialidade FROM     especialidade_servicos ORDER BY descricao_especialidade";

   $this->idpre_lancamento = $old_value_idpre_lancamento;
   $this->num_guia = $old_value_num_guia;
   $this->data_do_servico = $old_value_data_do_servico;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idespecialidade_servicos'][] = $rs->fields[0];
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
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_idpessoas()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idpessoas']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idpessoas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idpessoas']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idpessoas'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idpessoas']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idpessoas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idpessoas']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idpessoas'] = array(); 
    }

   $old_value_idpre_lancamento = $this->idpre_lancamento;
   $old_value_num_guia = $this->num_guia;
   $old_value_data_do_servico = $this->data_do_servico;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idpre_lancamento = $this->idpre_lancamento;
   $unformatted_value_num_guia = $this->num_guia;
   $unformatted_value_data_do_servico = $this->data_do_servico;

   $__calend_all_day___val_str = "''";
   if (!empty($this->__calend_all_day__))
   {
       if (is_array($this->__calend_all_day__))
       {
           $Tmp_array = $this->__calend_all_day__;
       }
       else
       {
           $Tmp_array = explode(";", $this->__calend_all_day__);
       }
       $__calend_all_day___val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $__calend_all_day___val_str)
          {
             $__calend_all_day___val_str .= ", ";
          }
          $__calend_all_day___val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idPessoas, nome_razao_social  FROM dbo.pessoa_juridica_fisica  ORDER BY nome_razao_social";

   $this->idpre_lancamento = $old_value_idpre_lancamento;
   $this->num_guia = $old_value_num_guia;
   $this->data_do_servico = $old_value_data_do_servico;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idpessoas'][] = $rs->fields[0];
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
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_idprofissional()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idprofissional']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idprofissional'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idprofissional']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idprofissional'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idprofissional']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idprofissional'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idprofissional']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idprofissional'] = array(); 
    }

   $old_value_idpre_lancamento = $this->idpre_lancamento;
   $old_value_num_guia = $this->num_guia;
   $old_value_data_do_servico = $this->data_do_servico;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idpre_lancamento = $this->idpre_lancamento;
   $unformatted_value_num_guia = $this->num_guia;
   $unformatted_value_data_do_servico = $this->data_do_servico;

   $__calend_all_day___val_str = "''";
   if (!empty($this->__calend_all_day__))
   {
       if (is_array($this->__calend_all_day__))
       {
           $Tmp_array = $this->__calend_all_day__;
       }
       else
       {
           $Tmp_array = explode(";", $this->__calend_all_day__);
       }
       $__calend_all_day___val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $__calend_all_day___val_str)
          {
             $__calend_all_day___val_str .= ", ";
          }
          $__calend_all_day___val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idPessoas, nome_razao_social  FROM dbo.pessoa_juridica_fisica  ORDER BY nome_razao_social";

   $this->idpre_lancamento = $old_value_idpre_lancamento;
   $this->num_guia = $old_value_num_guia;
   $this->data_do_servico = $old_value_data_do_servico;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['Lookup_idprofissional'][] = $rs->fields[0];
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
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup___calend_all_day__()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "" . $this->Ini->Nm_lang['lang_per_allday'] . "?#?Y?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2)
   {
       $nmgp_saida_form = "pre_lancamento_servicos_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['nm_run_menu'] = 2;
       $nmgp_saida_form = "pre_lancamento_servicos_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $sTarget = '_self';
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = $sTarget;
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       pre_lancamento_servicos_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
   {
?>
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
   }

?>
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
    <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__img__NM__ct_other_gauge.png">
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['pre_lancamento_servicos']['masterValue']);
?>
}
<?php
    }
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
    function getButtonIds($buttonName) {
        switch ($buttonName) {
            case "new":
                return array("sc_b_new_b.sc-unique-btn-1");
                break;
            case "insert":
                return array("sc_b_ins_b.sc-unique-btn-2");
                break;
            case "update":
                return array("sc_b_upd_b.sc-unique-btn-3");
                break;
            case "delete":
                return array("sc_b_del_b.sc-unique-btn-4");
                break;
            case "0":
                return array("sys_separator.sc-unique-btn-5");
                break;
            case "help":
                return array("sc_b_hlp_b");
                break;
            case "exit":
                return array("sc_b_sai_b.sc-unique-btn-6", "sc_b_sai_b.sc-unique-btn-8", "sc_b_sai_b.sc-unique-btn-7");
                break;
        }

        return array($buttonName);
    } // getButtonIds

}
?>
