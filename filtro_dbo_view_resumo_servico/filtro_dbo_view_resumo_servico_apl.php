<?php
//
class filtro_dbo_view_resumo_servico_apl
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
   var $idpessoas;
   var $idpessoas_1;
   var $data_inicial;
   var $data_final;
   var $especialidade;
   var $especialidade_1;
   var $reltipo;
   var $reltipo_1;
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
   var $is_calendar_app = false;
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
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['data_final']))
          {
              $this->data_final = $this->NM_ajax_info['param']['data_final'];
          }
          if (isset($this->NM_ajax_info['param']['data_inicial']))
          {
              $this->data_inicial = $this->NM_ajax_info['param']['data_inicial'];
          }
          if (isset($this->NM_ajax_info['param']['especialidade']))
          {
              $this->especialidade = $this->NM_ajax_info['param']['especialidade'];
          }
          if (isset($this->NM_ajax_info['param']['idpessoas']))
          {
              $this->idpessoas = $this->NM_ajax_info['param']['idpessoas'];
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
          if (isset($this->NM_ajax_info['param']['reltipo']))
          {
              $this->reltipo = $this->NM_ajax_info['param']['reltipo'];
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
      if (isset($this->usr_company) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['usr_company'] = $this->usr_company;
      }
      if (isset($this->usr_idEmpresa) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['usr_idEmpresa'] = $this->usr_idEmpresa;
      }
      if (isset($this->usr_idPessoas) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['usr_idPessoas'] = $this->usr_idPessoas;
      }
      if (isset($this->usr_dt_inicial) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['usr_dt_inicial'] = $this->usr_dt_inicial;
      }
      if (isset($this->usr_dt_final) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['usr_dt_final'] = $this->usr_dt_final;
      }
      if (isset($this->usr_desricao_especialidade) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['usr_desricao_especialidade'] = $this->usr_desricao_especialidade;
      }
      if (isset($_POST["usr_company"]) && isset($this->usr_company)) 
      {
          $_SESSION['usr_company'] = $this->usr_company;
      }
      if (isset($_POST["usr_idEmpresa"]) && isset($this->usr_idEmpresa)) 
      {
          $_SESSION['usr_idEmpresa'] = $this->usr_idEmpresa;
      }
      if (!isset($_POST["usr_idEmpresa"]) && isset($_POST["usr_idempresa"])) 
      {
          $_SESSION['usr_idEmpresa'] = $_POST["usr_idempresa"];
      }
      if (isset($_POST["usr_idPessoas"]) && isset($this->usr_idPessoas)) 
      {
          $_SESSION['usr_idPessoas'] = $this->usr_idPessoas;
      }
      if (!isset($_POST["usr_idPessoas"]) && isset($_POST["usr_idpessoas"])) 
      {
          $_SESSION['usr_idPessoas'] = $_POST["usr_idpessoas"];
      }
      if (isset($_POST["usr_dt_inicial"]) && isset($this->usr_dt_inicial)) 
      {
          $_SESSION['usr_dt_inicial'] = $this->usr_dt_inicial;
      }
      if (isset($_POST["usr_dt_final"]) && isset($this->usr_dt_final)) 
      {
          $_SESSION['usr_dt_final'] = $this->usr_dt_final;
      }
      if (isset($_POST["usr_desricao_especialidade"]) && isset($this->usr_desricao_especialidade)) 
      {
          $_SESSION['usr_desricao_especialidade'] = $this->usr_desricao_especialidade;
      }
      if (isset($_GET["usr_company"]) && isset($this->usr_company)) 
      {
          $_SESSION['usr_company'] = $this->usr_company;
      }
      if (isset($_GET["usr_idEmpresa"]) && isset($this->usr_idEmpresa)) 
      {
          $_SESSION['usr_idEmpresa'] = $this->usr_idEmpresa;
      }
      if (!isset($_GET["usr_idEmpresa"]) && isset($_GET["usr_idempresa"])) 
      {
          $_SESSION['usr_idEmpresa'] = $_GET["usr_idempresa"];
      }
      if (isset($_GET["usr_idPessoas"]) && isset($this->usr_idPessoas)) 
      {
          $_SESSION['usr_idPessoas'] = $this->usr_idPessoas;
      }
      if (!isset($_GET["usr_idPessoas"]) && isset($_GET["usr_idpessoas"])) 
      {
          $_SESSION['usr_idPessoas'] = $_GET["usr_idpessoas"];
      }
      if (isset($_GET["usr_dt_inicial"]) && isset($this->usr_dt_inicial)) 
      {
          $_SESSION['usr_dt_inicial'] = $this->usr_dt_inicial;
      }
      if (isset($_GET["usr_dt_final"]) && isset($this->usr_dt_final)) 
      {
          $_SESSION['usr_dt_final'] = $this->usr_dt_final;
      }
      if (isset($_GET["usr_desricao_especialidade"]) && isset($this->usr_desricao_especialidade)) 
      {
          $_SESSION['usr_desricao_especialidade'] = $this->usr_desricao_especialidade;
      }
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['filtro_dbo_view_resumo_servico']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['filtro_dbo_view_resumo_servico']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['filtro_dbo_view_resumo_servico']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['filtro_dbo_view_resumo_servico']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['filtro_dbo_view_resumo_servico']['embutida_parms']);
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
                 nm_limpa_str_filtro_dbo_view_resumo_servico($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->usr_company)) 
          {
              $_SESSION['usr_company'] = $this->usr_company;
          }
          if (!isset($this->usr_idEmpresa) && isset($this->usr_idempresa)) 
          {
              $this->usr_idEmpresa = $this->usr_idempresa;
          }
          if (isset($this->usr_idEmpresa)) 
          {
              $_SESSION['usr_idEmpresa'] = $this->usr_idEmpresa;
          }
          if (!isset($this->usr_idPessoas) && isset($this->usr_idpessoas)) 
          {
              $this->usr_idPessoas = $this->usr_idpessoas;
          }
          if (isset($this->usr_idPessoas)) 
          {
              $_SESSION['usr_idPessoas'] = $this->usr_idPessoas;
          }
          if (isset($this->usr_dt_inicial)) 
          {
              $_SESSION['usr_dt_inicial'] = $this->usr_dt_inicial;
          }
          if (isset($this->usr_dt_final)) 
          {
              $_SESSION['usr_dt_final'] = $this->usr_dt_final;
          }
          if (isset($this->usr_desricao_especialidade)) 
          {
              $_SESSION['usr_desricao_especialidade'] = $this->usr_desricao_especialidade;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['filtro_dbo_view_resumo_servico']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['filtro_dbo_view_resumo_servico']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['filtro_dbo_view_resumo_servico']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['filtro_dbo_view_resumo_servico']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->usr_company)) 
          {
              $_SESSION['usr_company'] = $this->usr_company;
          }
          if (!isset($this->usr_idEmpresa) && isset($this->usr_idempresa)) 
          {
              $this->usr_idEmpresa = $this->usr_idempresa;
          }
          if (isset($this->usr_idEmpresa)) 
          {
              $_SESSION['usr_idEmpresa'] = $this->usr_idEmpresa;
          }
          if (!isset($this->usr_idPessoas) && isset($this->usr_idpessoas)) 
          {
              $this->usr_idPessoas = $this->usr_idpessoas;
          }
          if (isset($this->usr_idPessoas)) 
          {
              $_SESSION['usr_idPessoas'] = $this->usr_idPessoas;
          }
          if (isset($this->usr_dt_inicial)) 
          {
              $_SESSION['usr_dt_inicial'] = $this->usr_dt_inicial;
          }
          if (isset($this->usr_dt_final)) 
          {
              $_SESSION['usr_dt_final'] = $this->usr_dt_final;
          }
          if (isset($this->usr_desricao_especialidade)) 
          {
              $_SESSION['usr_desricao_especialidade'] = $this->usr_desricao_especialidade;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['filtro_dbo_view_resumo_servico']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['filtro_dbo_view_resumo_servico']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['filtro_dbo_view_resumo_servico']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['filtro_dbo_view_resumo_servico']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['filtro_dbo_view_resumo_servico']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['filtro_dbo_view_resumo_servico']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['filtro_dbo_view_resumo_servico']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['filtro_dbo_view_resumo_servico']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['filtro_dbo_view_resumo_servico']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['filtro_dbo_view_resumo_servico']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new filtro_dbo_view_resumo_servico_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("pt_br");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['initialize'];
          $this->Db = $this->Ini->Db; 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['initialize']) && $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['initialize'])
          {
              $_SESSION['scriptcase']['filtro_dbo_view_resumo_servico']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_data_final = $this->data_final;
    $original_data_inicial = $this->data_inicial;
    $original_especialidade = $this->especialidade;
}
  $this->nmgp_cmp_hidden["idpessoas"] = "off"; $this->NM_ajax_info['fieldDisplay']['idpessoas'] = 'off';
$this->nmgp_cmp_hidden["especialidade"] = "off"; $this->NM_ajax_info['fieldDisplay']['especialidade'] = 'off';
$this->nmgp_cmp_hidden["data_inicial"] = "off"; $this->NM_ajax_info['fieldDisplay']['data_inicial'] = 'off';
$this->nmgp_cmp_hidden["data_final"] = "off"; $this->NM_ajax_info['fieldDisplay']['data_final'] = 'off';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_data_final != $this->data_final || (isset($bFlagRead_data_final) && $bFlagRead_data_final)))
    {
        $this->ajax_return_values_data_final(true);
    }
    if (($original_data_inicial != $this->data_inicial || (isset($bFlagRead_data_inicial) && $bFlagRead_data_inicial)))
    {
        $this->ajax_return_values_data_inicial(true);
    }
    if (($original_especialidade != $this->especialidade || (isset($bFlagRead_especialidade) && $bFlagRead_especialidade)))
    {
        $this->ajax_return_values_especialidade(true);
    }
}
$_SESSION['scriptcase']['filtro_dbo_view_resumo_servico']['contr_erro'] = 'off';
          }
          $this->Ini->init2();
      } 
      else 
      { 
         $this->nm_data = new nm_data("pt_br");
      } 
      $_SESSION['sc_session'][$script_case_init]['filtro_dbo_view_resumo_servico']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['filtro_dbo_view_resumo_servico']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['filtro_dbo_view_resumo_servico'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['filtro_dbo_view_resumo_servico']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['filtro_dbo_view_resumo_servico']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('filtro_dbo_view_resumo_servico') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['filtro_dbo_view_resumo_servico']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "filtro_dbo_view_resumo_servico")
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



      $_SESSION['scriptcase']['error_icon']['filtro_dbo_view_resumo_servico']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Lemon__NM__nm_scriptcase9_Lemon_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['filtro_dbo_view_resumo_servico'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['ok'] = "on";
      $this->nmgp_botoes['facebook'] = "off";
      $this->nmgp_botoes['google'] = "off";
      $this->nmgp_botoes['twitter'] = "off";
      $this->nmgp_botoes['paypal'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['filtro_dbo_view_resumo_servico']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['filtro_dbo_view_resumo_servico'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['filtro_dbo_view_resumo_servico'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("filtro_dbo_view_resumo_servico", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'filtro_dbo_view_resumo_servico/filtro_dbo_view_resumo_servico_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'filtro_dbo_view_resumo_servico_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'filtro_dbo_view_resumo_servico_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'filtro_dbo_view_resumo_servico_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('contr:' == substr($str_link_webhelp, 0, 6))
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
          require_once($this->Ini->path_embutida . 'filtro_dbo_view_resumo_servico/filtro_dbo_view_resumo_servico_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "filtro_dbo_view_resumo_servico_erro.class.php"); 
      }
      $this->Erro      = new filtro_dbo_view_resumo_servico_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['filtro_dbo_view_resumo_servico']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['dados_form'];
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

            $out1_img_cache = $_SESSION['scriptcase']['filtro_dbo_view_resumo_servico']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['filtro_dbo_view_resumo_servico']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
            }            $sc_obj_img->createImg($_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            echo $out1_img_cache;
               exit;
            }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- data_inicial
      $this->field_config['data_inicial']                 = array();
      $this->field_config['data_inicial']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['data_inicial']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['data_inicial']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'data_inicial');
      //-- data_final
      $this->field_config['data_final']                 = array();
      $this->field_config['data_final']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['data_final']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['data_final']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'data_final');
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


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
      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_reltipo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'reltipo');
          }
          if ('validate_idpessoas' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idpessoas');
          }
          if ('validate_especialidade' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'especialidade');
          }
          if ('validate_data_inicial' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'data_inicial');
          }
          if ('validate_data_final' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'data_final');
          }
          filtro_dbo_view_resumo_servico_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_reltipo_onchange' == $this->NM_ajax_opcao)
          {
              $this->relTipo_onChange();
          }
          filtro_dbo_view_resumo_servico_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              filtro_dbo_view_resumo_servico_pack_ajax_response();
              exit;
          }
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['filtro_dbo_view_resumo_servico']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  filtro_dbo_view_resumo_servico_pack_ajax_response();
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
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['filtro_dbo_view_resumo_servico']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  filtro_dbo_view_resumo_servico_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
//
      if (!isset($nm_form_submit) && $this->nmgp_opcao != "nada")
      {
          $this->idpessoas = "" ;  
          $this->data_inicial = "" ;  
          $this->data_final = "" ;  
          $this->especialidade = "" ;  
          $this->reltipo = "" ;  
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['dados_form']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['dados_form']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['dados_form'] as $NM_campo => $NM_valor)
              {
                  $$NM_campo = $NM_valor;
              }
          }
      }
      else
      {
           if ($this->nmgp_opcao != "nada")
           {
           }
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['recarga'] = $this->nmgp_opcao;
      }
      if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "" || $campos_erro != "" || !isset($this->bok) || $this->bok != "OK" || $this->nmgp_opcao == "recarga")
      {
          if ($Campos_Crit == "" && empty($Campos_Falta) && $this->Campos_Mens_erro == "" && !isset($this->bok) && $this->nmgp_opcao != "recarga")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['campos']))
              { 
                  $reltipo = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['campos'][0]; 
                  $idpessoas = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['campos'][1]; 
                  $especialidade = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['campos'][2]; 
                  $data_inicial = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['campos'][3]; 
                  $data_final = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['campos'][4]; 
              } 
          }
          $this->nm_gera_html();
          $this->NM_close_db(); 
      }
      elseif (isset($this->bok) && $this->bok == "OK")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['campos'] = array(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['campos'][0] = $this->reltipo; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['campos'][1] = $this->idpessoas; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['campos'][2] = $this->especialidade; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['campos'][3] = $this->data_inicial; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['campos'][4] = $this->data_final; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['redir'] == "redir")
          {
              $this->nmgp_redireciona(); 
          }
          else
          {
              $contr_menu = "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['iframe_menu'])
              {
                  $contr_menu = "glo_menu";
              }
              if (isset($_SESSION['scriptcase']['sc_ult_apl_menu']) && in_array("filtro_dbo_view_resumo_servico", $_SESSION['scriptcase']['sc_ult_apl_menu']))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona_form("filtro_dbo_view_resumo_servico_fim.php", $this->nm_location, $contr_menu); 
              }
              else
              {
                  $this->nm_gera_html();
                  if (!$_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['embutida_proc'])
                  { 
                      $this->NM_close_db(); 
                  } 
              }
          }
          $this->NM_close_db(); 
          if ($this->NM_ajax_flag)
          {
              filtro_dbo_view_resumo_servico_pack_ajax_response();
              exit;
          }
      }
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "filtro_dbo_view_resumo_servico.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . "") ?></TITLE>
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
<form name="Fdown" method="get" action="filtro_dbo_view_resumo_servico_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="filtro_dbo_view_resumo_servico"> 
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
           case 'reltipo':
               return "Relatório";
               break;
           case 'idpessoas':
               return "Pessoa Juridica";
               break;
           case 'especialidade':
               return "Especialidade";
               break;
           case 'data_inicial':
               return "Data Inicial";
               break;
           case 'data_final':
               return "Data Final";
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
     $this->sc_force_zero = array();

     if (!is_array($filtro) && '' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_filtro_dbo_view_resumo_servico']) || !is_array($this->NM_ajax_info['errList']['geral_filtro_dbo_view_resumo_servico']))
              {
                  $this->NM_ajax_info['errList']['geral_filtro_dbo_view_resumo_servico'] = array();
              }
              $this->NM_ajax_info['errList']['geral_filtro_dbo_view_resumo_servico'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'reltipo' == $filtro)) || (is_array($filtro) && in_array('reltipo', $filtro)))
        $this->ValidateField_reltipo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'idpessoas' == $filtro)) || (is_array($filtro) && in_array('idpessoas', $filtro)))
        $this->ValidateField_idpessoas($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'especialidade' == $filtro)) || (is_array($filtro) && in_array('especialidade', $filtro)))
        $this->ValidateField_especialidade($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'data_inicial' == $filtro)) || (is_array($filtro) && in_array('data_inicial', $filtro)))
        $this->ValidateField_data_inicial($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'data_final' == $filtro)) || (is_array($filtro) && in_array('data_final', $filtro)))
        $this->ValidateField_data_final($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

      if (empty($Campos_Crit) && empty($Campos_Falta) && empty($this->Campos_Mens_erro))
      {
          if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
          {
              $_SESSION['scriptcase']['filtro_dbo_view_resumo_servico']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_data_final = $this->data_final;
    $original_data_inicial = $this->data_inicial;
    $original_especialidade = $this->especialidade;
}
  $this->abri_relatorio();

if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_data_final != $this->data_final || (isset($bFlagRead_data_final) && $bFlagRead_data_final)))
    {
        $this->ajax_return_values_data_final(true);
    }
    if (($original_data_inicial != $this->data_inicial || (isset($bFlagRead_data_inicial) && $bFlagRead_data_inicial)))
    {
        $this->ajax_return_values_data_inicial(true);
    }
    if (($original_especialidade != $this->especialidade || (isset($bFlagRead_especialidade) && $bFlagRead_especialidade)))
    {
        $this->ajax_return_values_especialidade(true);
    }
}
$_SESSION['scriptcase']['filtro_dbo_view_resumo_servico']['contr_erro'] = 'off'; 
          }
      }
   }

    function ValidateField_reltipo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->reltipo == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'reltipo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_reltipo

    function ValidateField_idpessoas(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->idpessoas) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_idpessoas']) && !in_array($this->idpessoas, $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_idpessoas']))
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

    function ValidateField_especialidade(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->especialidade) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_especialidade']) && !in_array($this->especialidade, $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_especialidade']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['especialidade']))
                   {
                       $Campos_Erros['especialidade'] = array();
                   }
                   $Campos_Erros['especialidade'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['especialidade']) || !is_array($this->NM_ajax_info['errList']['especialidade']))
                   {
                       $this->NM_ajax_info['errList']['especialidade'] = array();
                   }
                   $this->NM_ajax_info['errList']['especialidade'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'especialidade';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_especialidade

    function ValidateField_data_inicial(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->data_inicial, $this->field_config['data_inicial']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['data_inicial']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['data_inicial']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['data_inicial']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['data_inicial']['date_sep']) ; 
          if (trim($this->data_inicial) != "")  
          { 
              if ($teste_validade->Data($this->data_inicial, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Data Inicial; " ; 
                  if (!isset($Campos_Erros['data_inicial']))
                  {
                      $Campos_Erros['data_inicial'] = array();
                  }
                  $Campos_Erros['data_inicial'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['data_inicial']) || !is_array($this->NM_ajax_info['errList']['data_inicial']))
                  {
                      $this->NM_ajax_info['errList']['data_inicial'] = array();
                  }
                  $this->NM_ajax_info['errList']['data_inicial'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['data_inicial']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'data_inicial';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_data_inicial

    function ValidateField_data_final(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->data_final, $this->field_config['data_final']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['data_final']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['data_final']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['data_final']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['data_final']['date_sep']) ; 
          if (trim($this->data_final) != "")  
          { 
              if ($teste_validade->Data($this->data_final, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Data Final; " ; 
                  if (!isset($Campos_Erros['data_final']))
                  {
                      $Campos_Erros['data_final'] = array();
                  }
                  $Campos_Erros['data_final'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['data_final']) || !is_array($this->NM_ajax_info['errList']['data_final']))
                  {
                      $this->NM_ajax_info['errList']['data_final'] = array();
                  }
                  $this->NM_ajax_info['errList']['data_final'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['data_final']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'data_final';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_data_final

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
    $this->nmgp_dados_form['reltipo'] = $this->reltipo;
    $this->nmgp_dados_form['idpessoas'] = $this->idpessoas;
    $this->nmgp_dados_form['especialidade'] = $this->especialidade;
    $this->nmgp_dados_form['data_inicial'] = (strlen(trim($this->data_inicial)) > 19) ? str_replace(".", ":", $this->data_inicial) : trim($this->data_inicial);
    $this->nmgp_dados_form['data_final'] = (strlen(trim($this->data_final)) > 19) ? str_replace(".", ":", $this->data_final) : trim($this->data_final);
    $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['data_inicial'] = $this->data_inicial;
      nm_limpa_data($this->data_inicial, $this->field_config['data_inicial']['date_sep']) ; 
      $this->Before_unformat['data_final'] = $this->data_final;
      nm_limpa_data($this->data_final, $this->field_config['data_final']['date_sep']) ; 
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
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if ((!empty($this->data_inicial) && 'null' != $this->data_inicial) || (!empty($format_fields) && isset($format_fields['data_inicial'])))
      {
          nm_volta_data($this->data_inicial, $this->field_config['data_inicial']['date_format']) ; 
          nmgp_Form_Datas($this->data_inicial, $this->field_config['data_inicial']['date_format'], $this->field_config['data_inicial']['date_sep']) ;  
      }
      elseif ('null' == $this->data_inicial || '' == $this->data_inicial)
      {
          $this->data_inicial = '';
      }
      if ((!empty($this->data_final) && 'null' != $this->data_final) || (!empty($format_fields) && isset($format_fields['data_final'])))
      {
          nm_volta_data($this->data_final, $this->field_config['data_final']['date_format']) ; 
          nmgp_Form_Datas($this->data_final, $this->field_config['data_final']['date_format'], $this->field_config['data_final']['date_sep']) ;  
      }
      elseif ('null' == $this->data_final || '' == $this->data_final)
      {
          $this->data_final = '';
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
      if ($this->data_inicial != "")  
      {
     nm_conv_form_data($this->data_inicial, $this->field_config['data_inicial']['date_format'], "AAAAMMDD", array($this->field_config['data_inicial']['date_sep'])) ;  
      }
      if ($this->data_final != "")  
      {
     nm_conv_form_data($this->data_final, $this->field_config['data_final']['date_format'], "AAAAMMDD", array($this->field_config['data_final']['date_sep'])) ;  
      }
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

   function ajax_return_values()
   {
          $this->ajax_return_values_reltipo();
          $this->ajax_return_values_idpessoas();
          $this->ajax_return_values_especialidade();
          $this->ajax_return_values_data_inicial();
          $this->ajax_return_values_data_final();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          }
   } // ajax_return_values

          //----- reltipo
   function ajax_return_values_reltipo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("reltipo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->reltipo);
              $aLookup = array();
              $this->_tmp_lookup_reltipo = $this->reltipo;

$aLookup[] = array(filtro_dbo_view_resumo_servico_pack_protect_string('1') => str_replace('<', '&lt;',filtro_dbo_view_resumo_servico_pack_protect_string("Por Profissional")));
$aLookup[] = array(filtro_dbo_view_resumo_servico_pack_protect_string('2') => str_replace('<', '&lt;',filtro_dbo_view_resumo_servico_pack_protect_string("Por Especialidade")));
$aLookup[] = array(filtro_dbo_view_resumo_servico_pack_protect_string('3') => str_replace('<', '&lt;',filtro_dbo_view_resumo_servico_pack_protect_string("Por Profissional e Especialidade")));
$_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_reltipo'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_reltipo'][] = '2';
$_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_reltipo'][] = '3';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"reltipo\"";
          if (isset($this->NM_ajax_info['select_html']['reltipo']) && !empty($this->NM_ajax_info['select_html']['reltipo']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['reltipo']);
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

                  if ($this->reltipo == $sValue)
                  {
                      $this->_tmp_lookup_reltipo = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['reltipo'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['reltipo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['reltipo']['valList'][$i] = filtro_dbo_view_resumo_servico_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['reltipo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['reltipo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['reltipo']['labList'] = $aLabel;
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_idpessoas']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_idpessoas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_idpessoas']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_idpessoas'] = array(); 
}
$aLookup[] = array(filtro_dbo_view_resumo_servico_pack_protect_string('') => str_replace('<', '&lt;',filtro_dbo_view_resumo_servico_pack_protect_string('Selecione')));
$_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_idpessoas'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_data_inicial = $this->data_inicial;
   $old_value_data_final = $this->data_final;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_inicial = $this->data_inicial;
   $unformatted_value_data_final = $this->data_final;

   $nm_comando = "SELECT  pessoa_juridica_fisica.idPessoas,  pessoa_juridica_fisica.nome_razao_social FROM dbo.pessoa_juridica_fisica  INNER JOIN contratos  ON contratos.idPessoas = pessoa_juridica_fisica.idPessoas and contratos.situacao = 'A' and contratos.idFilial = " . $_SESSION['usr_company'] . " WHERE tipo_pessoa = 'PJ' AND idEmpresa= " . $_SESSION['usr_idEmpresa'] . " group by pessoa_juridica_fisica.idPessoas,  pessoa_juridica_fisica.nome_razao_social";

   $this->data_inicial = $old_value_data_inicial;
   $this->data_final = $old_value_data_final;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(filtro_dbo_view_resumo_servico_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', filtro_dbo_view_resumo_servico_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_idpessoas'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['idpessoas']['valList'][$i] = filtro_dbo_view_resumo_servico_pack_protect_string($v);
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

          //----- especialidade
   function ajax_return_values_especialidade($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("especialidade", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->especialidade);
              $aLookup = array();
              $this->_tmp_lookup_especialidade = $this->especialidade;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_especialidade']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_especialidade'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_especialidade']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_especialidade'] = array(); 
}
$aLookup[] = array(filtro_dbo_view_resumo_servico_pack_protect_string('-1') => str_replace('<', '&lt;',filtro_dbo_view_resumo_servico_pack_protect_string('Selecione')));
$_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_especialidade'][] = '-1';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_data_inicial = $this->data_inicial;
   $old_value_data_final = $this->data_final;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_inicial = $this->data_inicial;
   $unformatted_value_data_final = $this->data_final;

   $nm_comando = "SELECT descricao_especialidade  FROM dbo.especialidade_servicos  ORDER BY descricao_especialidade";

   $this->data_inicial = $old_value_data_inicial;
   $this->data_final = $old_value_data_final;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(filtro_dbo_view_resumo_servico_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', filtro_dbo_view_resumo_servico_pack_protect_string(NM_charset_to_utf8($rs->fields[0]))));
              $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_especialidade'][] = $rs->fields[0];
              $nmgp_def_dados .= $rs->fields[0] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
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
          $sSelComp = "name=\"especialidade\"";
          if (isset($this->NM_ajax_info['select_html']['especialidade']) && !empty($this->NM_ajax_info['select_html']['especialidade']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['especialidade']);
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

                  if ($this->especialidade == $sValue)
                  {
                      $this->_tmp_lookup_especialidade = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['especialidade'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['especialidade']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['especialidade']['valList'][$i] = filtro_dbo_view_resumo_servico_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['especialidade']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['especialidade']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['especialidade']['labList'] = $aLabel;
          }
   }

          //----- data_inicial
   function ajax_return_values_data_inicial($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("data_inicial", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->data_inicial);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['data_inicial'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- data_final
   function ajax_return_values_data_final($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("data_final", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->data_final);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['data_final'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['upload_dir'][$fieldName][] = $newName;
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
//
function abri_relatorio()
{
$_SESSION['scriptcase']['filtro_dbo_view_resumo_servico']['contr_erro'] = 'on';
if (!isset($this->sc_temp_usr_desricao_especialidade)) {$this->sc_temp_usr_desricao_especialidade = (isset($_SESSION['usr_desricao_especialidade'])) ? $_SESSION['usr_desricao_especialidade'] : "";}
if (!isset($this->sc_temp_usr_dt_final)) {$this->sc_temp_usr_dt_final = (isset($_SESSION['usr_dt_final'])) ? $_SESSION['usr_dt_final'] : "";}
if (!isset($this->sc_temp_usr_dt_inicial)) {$this->sc_temp_usr_dt_inicial = (isset($_SESSION['usr_dt_inicial'])) ? $_SESSION['usr_dt_inicial'] : "";}
if (!isset($this->sc_temp_usr_idPessoas)) {$this->sc_temp_usr_idPessoas = (isset($_SESSION['usr_idPessoas'])) ? $_SESSION['usr_idPessoas'] : "";}
  
$this->sc_temp_usr_idPessoas = $this->idpessoas ;
$this->sc_temp_usr_dt_inicial = $this->data_inicial ;
$this->sc_temp_usr_dt_final = $this->data_final ;
$this->sc_temp_usr_desricao_especialidade = $this->especialidade ;

if ($this->reltipo  == 1)
{
 if (isset($this->sc_temp_usr_idPessoas)) { $_SESSION['usr_idPessoas'] = $this->sc_temp_usr_idPessoas;}
 if (isset($this->sc_temp_usr_dt_inicial)) { $_SESSION['usr_dt_inicial'] = $this->sc_temp_usr_dt_inicial;}
 if (isset($this->sc_temp_usr_dt_final)) { $_SESSION['usr_dt_final'] = $this->sc_temp_usr_dt_final;}
 if (isset($this->sc_temp_usr_desricao_especialidade)) { $_SESSION['usr_desricao_especialidade'] = $this->sc_temp_usr_desricao_especialidade;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_dbo_view_resumo_servico_por_profissional') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
}
else if ($this->reltipo  == 2)
{
	 if (isset($this->sc_temp_usr_idPessoas)) { $_SESSION['usr_idPessoas'] = $this->sc_temp_usr_idPessoas;}
 if (isset($this->sc_temp_usr_dt_inicial)) { $_SESSION['usr_dt_inicial'] = $this->sc_temp_usr_dt_inicial;}
 if (isset($this->sc_temp_usr_dt_final)) { $_SESSION['usr_dt_final'] = $this->sc_temp_usr_dt_final;}
 if (isset($this->sc_temp_usr_desricao_especialidade)) { $_SESSION['usr_desricao_especialidade'] = $this->sc_temp_usr_desricao_especialidade;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_dbo_view_resumo_servico_por_especialidade') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
	}
else if ($this->reltipo  == 3)
	{
	 if (isset($this->sc_temp_usr_idPessoas)) { $_SESSION['usr_idPessoas'] = $this->sc_temp_usr_idPessoas;}
 if (isset($this->sc_temp_usr_dt_inicial)) { $_SESSION['usr_dt_inicial'] = $this->sc_temp_usr_dt_inicial;}
 if (isset($this->sc_temp_usr_dt_final)) { $_SESSION['usr_dt_final'] = $this->sc_temp_usr_dt_final;}
 if (isset($this->sc_temp_usr_desricao_especialidade)) { $_SESSION['usr_desricao_especialidade'] = $this->sc_temp_usr_desricao_especialidade;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_dbo_view_resumo_servico_por_profissional_especialidade') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
}
if (isset($this->sc_temp_usr_idPessoas)) { $_SESSION['usr_idPessoas'] = $this->sc_temp_usr_idPessoas;}
if (isset($this->sc_temp_usr_dt_inicial)) { $_SESSION['usr_dt_inicial'] = $this->sc_temp_usr_dt_inicial;}
if (isset($this->sc_temp_usr_dt_final)) { $_SESSION['usr_dt_final'] = $this->sc_temp_usr_dt_final;}
if (isset($this->sc_temp_usr_desricao_especialidade)) { $_SESSION['usr_desricao_especialidade'] = $this->sc_temp_usr_desricao_especialidade;}
$_SESSION['scriptcase']['filtro_dbo_view_resumo_servico']['contr_erro'] = 'off';
}
function relTipo_onChange()
{
$_SESSION['scriptcase']['filtro_dbo_view_resumo_servico']['contr_erro'] = 'on';
  
$original_reltipo = $this->reltipo;
$original_idpessoas = $this->idpessoas;
$original_especialidade = $this->especialidade;
$original_data_inicial = $this->data_inicial;
$original_data_final = $this->data_final;

if (($this->reltipo  == 1)  or ($this->reltipo   == 3))
{
	$this->nmgp_cmp_hidden["idpessoas"] = "on"; $this->NM_ajax_info['fieldDisplay']['idpessoas'] = 'on';
	$this->nmgp_cmp_hidden["especialidade"] = "off"; $this->NM_ajax_info['fieldDisplay']['especialidade'] = 'off';
	$this->nmgp_cmp_hidden["data_inicial"] = "on"; $this->NM_ajax_info['fieldDisplay']['data_inicial'] = 'on';
	$this->nmgp_cmp_hidden["data_final"] = "on"; $this->NM_ajax_info['fieldDisplay']['data_final'] = 'on';
}
else if ($this->reltipo   == 2)
{
$this->nmgp_cmp_hidden["idpessoas"] = "off"; $this->NM_ajax_info['fieldDisplay']['idpessoas'] = 'off';
		$this->nmgp_cmp_hidden["especialidade"] = "on"; $this->NM_ajax_info['fieldDisplay']['especialidade'] = 'on';
	$this->nmgp_cmp_hidden["data_inicial"] = "on"; $this->NM_ajax_info['fieldDisplay']['data_inicial'] = 'on';
	$this->nmgp_cmp_hidden["data_final"] = "on"; $this->NM_ajax_info['fieldDisplay']['data_final'] = 'on';
	}


else
	{

$this->nmgp_cmp_hidden["idpessoas"] = "off"; $this->NM_ajax_info['fieldDisplay']['idpessoas'] = 'off';
$this->nmgp_cmp_hidden["especialidade"] = "off"; $this->NM_ajax_info['fieldDisplay']['especialidade'] = 'off';
$this->nmgp_cmp_hidden["data_inicial"] = "off"; $this->NM_ajax_info['fieldDisplay']['data_inicial'] = 'off';
$this->nmgp_cmp_hidden["data_final"] = "off"; $this->NM_ajax_info['fieldDisplay']['data_final'] = 'off';


}

$modificado_reltipo = $this->reltipo;
$modificado_idpessoas = $this->idpessoas;
$modificado_especialidade = $this->especialidade;
$modificado_data_inicial = $this->data_inicial;
$modificado_data_final = $this->data_final;
$this->nm_formatar_campos('reltipo', 'idpessoas', 'especialidade', 'data_inicial', 'data_final');
if ($original_reltipo !== $modificado_reltipo || isset($this->nmgp_cmp_readonly['reltipo']) || (isset($bFlagRead_reltipo) && $bFlagRead_reltipo))
{
    $this->ajax_return_values_reltipo(true);
}
if ($original_idpessoas !== $modificado_idpessoas || isset($this->nmgp_cmp_readonly['idpessoas']) || (isset($bFlagRead_idpessoas) && $bFlagRead_idpessoas))
{
    $this->ajax_return_values_idpessoas(true);
}
if ($original_especialidade !== $modificado_especialidade || isset($this->nmgp_cmp_readonly['especialidade']) || (isset($bFlagRead_especialidade) && $bFlagRead_especialidade))
{
    $this->ajax_return_values_especialidade(true);
}
if ($original_data_inicial !== $modificado_data_inicial || isset($this->nmgp_cmp_readonly['data_inicial']) || (isset($bFlagRead_data_inicial) && $bFlagRead_data_inicial))
{
    $this->ajax_return_values_data_inicial(true);
}
if ($original_data_final !== $modificado_data_final || isset($this->nmgp_cmp_readonly['data_final']) || (isset($bFlagRead_data_final) && $bFlagRead_data_final))
{
    $this->ajax_return_values_data_final(true);
}
$this->NM_ajax_info['event_field'] = 'relTipo';
filtro_dbo_view_resumo_servico_pack_ajax_response();
exit;
$_SESSION['scriptcase']['filtro_dbo_view_resumo_servico']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              filtro_dbo_view_resumo_servico_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1) 
      { 
          $nm_saida_global = $_SESSION['scriptcase']['nm_sc_retorno']; 
      } 
    $this->nm_formatar_campos();
        $this->initFormPages();
    include_once("filtro_dbo_view_resumo_servico_form0.php");
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['csrf_token'];
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

   function Form_lookup_reltipo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Por Profissional?#?1?#?N?@?";
       $nmgp_def_dados .= "Por Especialidade?#?2?#?N?@?";
       $nmgp_def_dados .= "Por Profissional e Especialidade?#?3?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_idpessoas()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_idpessoas']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_idpessoas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_idpessoas']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_idpessoas'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_idpessoas']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_idpessoas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_idpessoas']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_idpessoas'] = array(); 
    }

   $old_value_data_inicial = $this->data_inicial;
   $old_value_data_final = $this->data_final;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_inicial = $this->data_inicial;
   $unformatted_value_data_final = $this->data_final;

   $nm_comando = "SELECT  pessoa_juridica_fisica.idPessoas,  pessoa_juridica_fisica.nome_razao_social FROM dbo.pessoa_juridica_fisica  INNER JOIN contratos  ON contratos.idPessoas = pessoa_juridica_fisica.idPessoas and contratos.situacao = 'A' and contratos.idFilial = " . $_SESSION['usr_company'] . " WHERE tipo_pessoa = 'PJ' AND idEmpresa= " . $_SESSION['usr_idEmpresa'] . " group by pessoa_juridica_fisica.idPessoas,  pessoa_juridica_fisica.nome_razao_social";

   $this->data_inicial = $old_value_data_inicial;
   $this->data_final = $old_value_data_final;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_idpessoas'][] = $rs->fields[0];
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
   function Form_lookup_especialidade()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_especialidade']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_especialidade'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_especialidade']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_especialidade'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_especialidade']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_especialidade'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_especialidade']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_especialidade'] = array(); 
    }

   $old_value_data_inicial = $this->data_inicial;
   $old_value_data_final = $this->data_final;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_inicial = $this->data_inicial;
   $unformatted_value_data_final = $this->data_final;

   $nm_comando = "SELECT descricao_especialidade  FROM dbo.especialidade_servicos  ORDER BY descricao_especialidade";

   $this->data_inicial = $old_value_data_inicial;
   $this->data_final = $old_value_data_final;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['Lookup_especialidade'][] = $rs->fields[0];
              $nmgp_def_dados .= $rs->fields[0] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
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
       $nmgp_saida_form = "filtro_dbo_view_resumo_servico_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['nm_run_menu'] = 2;
       $nmgp_saida_form = "filtro_dbo_view_resumo_servico_fim.php";
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
       filtro_dbo_view_resumo_servico_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['masterValue']);
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
function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $opc="", $alt_modal=430, $larg_modal=630)
{
   if (isset($this->NM_is_redirected) && $this->NM_is_redirected)
   {
       return;
   }
   if (is_array($nm_apl_parms))
   {
       $tmp_parms = "";
       foreach ($nm_apl_parms as $par => $val)
       {
           $par = trim($par);
           $val = trim($val);
           $tmp_parms .= str_replace(".", "_", $par) . "?#?";
           if (substr($val, 0, 1) == "$")
           {
               $tmp_parms .= $$val;
           }
           elseif (substr($val, 0, 1) == "{")
           {
               $val        = substr($val, 1, -1);
               $tmp_parms .= $this->$val;
           }
           elseif (substr($val, 0, 1) == "[")
           {
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico'][substr($val, 1, -1)];
           }
           else
           {
               $tmp_parms .= $val;
           }
           $tmp_parms .= "?@?";
       }
       $nm_apl_parms = $tmp_parms;
   }
   if (empty($opc))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['opc_ant'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['filtro_dbo_view_resumo_servico']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           filtro_dbo_view_resumo_servico_pack_ajax_response();
           exit;
       }
       echo "<SCRIPT language=\"javascript\">";
       if (strtolower($nm_target) == "_blank")
       {
           echo "window.open ('" . $nm_apl_dest . "');";
           echo "</SCRIPT>";
           return;
       }
       else
       {
           echo "window.location='" . $nm_apl_dest . "';";
           echo "</SCRIPT>";
           $this->NM_close_db();
           exit;
       }
   }
   $dir = explode("/", $nm_apl_dest);
   if (count($dir) == 1)
   {
       $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
       $nm_apl_dest = $this->Ini->path_link . SC_dir_app_name($nm_apl_dest) . "/" . $nm_apl_dest . ".php";
   }
   if ($this->NM_ajax_flag)
   {
       $nm_apl_parms = str_replace("?#?", "*scin", NM_charset_to_utf8($nm_apl_parms));
       $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
       $this->NM_ajax_info['redir']['metodo']     = 'post';
       $this->NM_ajax_info['redir']['action']     = $nm_apl_dest;
       $this->NM_ajax_info['redir']['nmgp_parms'] = $nm_apl_parms;
       $this->NM_ajax_info['redir']['target']     = $nm_target_form;
       $this->NM_ajax_info['redir']['h_modal']    = $alt_modal;
       $this->NM_ajax_info['redir']['w_modal']    = $larg_modal;
       if ($nm_target_form == "_blank")
       {
           $this->NM_ajax_info['redir']['nmgp_outra_jan'] = 'true';
       }
       else
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida']      = $nm_apl_retorno;
           $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       }
       filtro_dbo_view_resumo_servico_pack_ajax_response();
       exit;
   }
   if ($nm_target == "modal")
   {
       if (!empty($nm_apl_parms))
       {
           $nm_apl_parms = str_replace("?#?", "*scin", $nm_apl_parms);
           $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
           $nm_apl_parms = "nmgp_parms=" . $nm_apl_parms . "&";
       }
       $par_modal = "?script_case_init=" . $this->Ini->sc_page . "&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&";
       $this->redir_modal = "$(function() { tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
       $this->NM_is_redirected = true;
       return;
   }
   if ($nm_target == "_blank")
   {
?>
<form name="Fredir" method="post" target="_blank" action="<?php echo $nm_apl_dest; ?>">
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
</form>
<script type="text/javascript">
setTimeout(function() { document.Fredir.submit(); }, 250);
</script>
<?php
    return;
   }
?>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
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
    <SCRIPT type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></SCRIPT>
   </HEAD>
   <BODY>
<?php
   }
?>
<form name="Fredir" method="post" 
                  target="_self"> 
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
<?php
   if ($nm_target_form == "_blank")
   {
?>
  <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
  <input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nm_apl_retorno) ?>">
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
<?php
   }
?>
</form> 
   <SCRIPT type="text/javascript">
<?php
   if ($nm_target_form == "modal")
   {
?>
       $(document).ready(function(){
           tb_show('', '<?php echo $nm_apl_dest ?>?script_case_init=<?php echo $this->Ini->sc_page; ?>&nmgp_url_saida=modal&nmgp_parms=<?php echo $this->form_encode_input($nm_apl_parms); ?>&nmgp_outra_jan=true&TB_iframe=true&height=<?php echo $alt_modal; ?>&width=<?php echo $larg_modal; ?>&modal=true', '');
       });
<?php
   }
   else
   {
?>
    $(function() {
       document.Fredir.target = "<?php echo $nm_target_form ?>"; 
       document.Fredir.action = "<?php echo $nm_apl_dest ?>";
       document.Fredir.submit();
    });
<?php
   }
?>
   </SCRIPT>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
?>
   </BODY>
   </HTML>
<?php
   }
?>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
       $this->NM_close_db();
       exit;
   }
}
    function getButtonIds($buttonName) {
        switch ($buttonName) {
            case "ok":
                return array("sub_form_b.sc-unique-btn-1");
                break;
            case "help":
                return array("sc_b_hlp_b");
                break;
            case "exit":
                return array("Bsair_b.sc-unique-btn-2", "Bsair_b.sc-unique-btn-3");
                break;
        }

        return array($buttonName);
    } // getButtonIds

}
?>
