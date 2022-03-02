<?php
class grid_dbo_view_resumo_servico_por_profissional_especialidade_grid
{
   var $Ini;
   var $Erro;
   var $Db;
   var $Tot;
   var $Lin_impressas;
   var $Lin_final;
   var $Rows_span;
   var $NM_colspan;
   var $rs_grid;
   var $nm_grid_ini;
   var $nm_grid_sem_reg;
   var $nm_prim_linha;
   var $Rec_ini;
   var $Rec_fim;
   var $nmgp_reg_start;
   var $nmgp_reg_inicial;
   var $nmgp_reg_final;
   var $SC_seq_register;
   var $SC_seq_page;
   var $nm_location;
   var $nm_data;
   var $nm_cod_barra;
   var $sc_proc_grid; 
   var $NM_raiz_img; 
   var $NM_opcao; 
   var $NM_flag_antigo; 
   var $nm_campos_cab = array();
   var $NM_cmp_hidden   = array();
   var $nmgp_botoes     = array();
   var $nm_btn_exist    = array();
   var $nm_btn_label    = array(); 
   var $nm_btn_disabled = array();
   var $Cmps_ord_def    = array();
   var $nmgp_label_quebras = array();
   var $nmgp_prim_pag_pdf;
   var $Campos_Mens_erro;
   var $Print_All;
   var $NM_field_over;
   var $NM_field_click;
   var $NM_cont_body; 
   var $NM_emb_tree_no; 
   var $progress_fp;
   var $progress_tot;
   var $progress_now;
   var $progress_lim_tot;
   var $progress_lim_now;
   var $progress_lim_qtd;
   var $progress_grid;
   var $progress_pdf;
   var $progress_res;
   var $progress_graf;
   var $count_ger;
   var $sum_quantidade;
   var $sum_total_servico;
   var $descricao_especialidade_Old;
   var $arg_sum_descricao_especialidade;
   var $Label_descricao_especialidade;
   var $sc_proc_quebra_descricao_especialidade;
   var $count_descricao_especialidade;
   var $sum_descricao_especialidade_quantidade;
   var $sum_descricao_especialidade_total_servico;
   var $profissional_Old;
   var $arg_sum_profissional;
   var $Label_profissional;
   var $sc_proc_quebra_profissional;
   var $count_profissional;
   var $sum_profissional_quantidade;
   var $sum_profissional_total_servico;
   var $mes_ano;
   var $nome_razao_social;
   var $contratos;
   var $profissional;
   var $atividade;
   var $descricao_especialidade;
   var $descricao_servico;
   var $quantidade;
   var $total_servico;
//--- 
 function monta_grid($linhas = 0)
 {
   global $nm_saida;

   clearstatcache();
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Ind_Groupby'] == "sc_free_group_by")
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'])
       { 
          include_once($this->Ini->path_embutida . "grid_dbo_view_resumo_servico_por_profissional_especialidade/" . $this->Ini->Apl_resumo); 
       } 
       else 
       { 
          include_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
       } 
       $this->Res         = new grid_dbo_view_resumo_servico_por_profissional_especialidade_resumo();
       $this->Res->Db     = $this->Db;
       $this->Res->Erro   = $this->Erro;
       $this->Res->Ini    = $this->Ini;
       $this->Res->Lookup = $this->Lookup;
   } 
   $this->NM_cor_embutida();
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_dbo_view_resumo_servico_por_profissional_especialidade']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_dbo_view_resumo_servico_por_profissional_especialidade']['field_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_dbo_view_resumo_servico_por_profissional_especialidade']['field_display'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['usr_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['php_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_init'])
   { 
        return; 
   } 
   $this->inicializa();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['charts_html'] = '';
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'])
   { 
       $this->Lin_impressas = 0;
       $this->Lin_final     = FALSE;
       $this->grid($linhas);
       $this->nm_fim_grid();
   } 
   else 
   { 
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf_vert'])
            {
            } 
            else
            {
                $this->cabecalho();
            } 
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf_vert'])
            {
            } 
            else
            {
       $nm_saida->saida("                  <TR>\r\n");
       $nm_saida->saida("                  <TD id='sc_grid_content' style='padding: 0px;' colspan=1>\r\n");
            } 
       $nm_saida->saida("    <table width='100%' cellspacing=0 cellpadding=0>\r\n");
       $nmgrp_apl_opcao= (isset($_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['grid_dbo_view_resumo_servico_por_profissional_especialidade'])) ? "pdf" : $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'];
       if ($nmgrp_apl_opcao != "pdf")
       { 
           $this->nmgp_barra_top();
       } 
       unset ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['save_grid']);
       $this->grid();
       if ($nmgrp_apl_opcao != "pdf")
       { 
           $this->nmgp_barra_bot();
       } 
       $nm_saida->saida("   </table>\r\n");
       $nm_saida->saida("  </TD>\r\n");
       $nm_saida->saida(" </TR>\r\n");
       if (strpos(" " . $this->Ini->SC_module_export, "resume") !== false)
       { 
           $Gera_res = true;
       } 
       else 
       { 
           $Gera_res = false;
       } 
       if (strpos(" " . $this->Ini->SC_module_export, "chart") !== false)
       { 
           $Gera_graf = true;
       } 
       else 
       { 
           $Gera_graf = false;
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['print_all'] && empty($this->nm_grid_sem_reg) && ($Gera_res || $Gera_graf))
       { 
           $this->Res->monta_html_ini_pdf();
           $this->Res->monta_resumo();
           $this->Res->monta_html_fim_pdf();
           if ($Gera_graf)
           {
               $this->grafico_pdf();
           }
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] == "pdf")
       { 
           if (isset($_GET['flash_graf']) && 'chart' == $_GET['flash_graf'])
           {
               $this->Res->monta_resumo(true);
               require_once($this->Ini->path_aplicacao . $this->Ini->Apl_grafico); 
               $this->Graf  = new grid_dbo_view_resumo_servico_por_profissional_especialidade_grafico();
               $this->Graf->Db     = $this->Db;
               $this->Graf->Erro   = $this->Erro;
               $this->Graf->Ini    = $this->Ini;
               $this->Graf->Lookup = $this->Lookup;
               $this->Graf->monta_grafico();
               exit;
           }
           elseif ($Gera_res || $Gera_graf)
           {
               $this->Res->monta_html_ini_pdf();
               $this->Res->monta_resumo();
               $this->Res->monta_html_fim_pdf();
           }
       } 
       $flag_apaga_pdf_log = TRUE;
       if (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] == "pdf")
       { 
           $flag_apaga_pdf_log = FALSE;
       } 
       $this->nm_fim_grid($flag_apaga_pdf_log);
       if (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] == "pdf")
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] = "igual";
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao_print'] == "print")
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao_ant'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao_print'] = "";
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'];
 }
 function resume($linhas = 0)
 {
    $this->Lin_impressas = 0;
    $this->Lin_final     = FALSE;
    $this->grid($linhas);
 }
//--- 
 function inicializa()
 {
   global $nm_saida, $NM_run_iframe,
   $rec, $nmgp_chave, $nmgp_opcao, $nmgp_ordem, $nmgp_chave_det,
   $nmgp_quant_linhas, $nmgp_quant_colunas, $nmgp_url_saida, $nmgp_parms;
//
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['Ind_lig_mult'])) {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['Ind_lig_mult'] = 0;
   }
   $this->Img_embbed      = false;
   $this->nm_data         = new nm_data("pt_br");
   $this->pdf_label_group = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_pdf']['label_group'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_pdf']['label_group'] : "N";
   $this->pdf_all_cab     = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_pdf']['all_cab']))     ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_pdf']['all_cab'] : "S";
   $this->pdf_all_label   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_pdf']['all_label']))   ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_pdf']['all_label'] : "S";
   $this->Grid_body = 'id="sc_grid_body"';
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'])
   {
       $this->Grid_body = "";
   }
   $this->Css_Cmp = array();
   $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
   foreach ($NM_css as $cada_css)
   {
       $Pos1 = strpos($cada_css, "{");
       $Pos2 = strpos($cada_css, "}");
       $Tag  = trim(substr($cada_css, 1, $Pos1 - 1));
       $Css  = substr($cada_css, $Pos1 + 1, $Pos2 - $Pos1 - 1);
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['doc_word'])
       { 
           $this->Css_Cmp[$Tag] = $Css;
       }
       else
       { 
           $this->Css_Cmp[$Tag] = "";
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'])
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['Lig_Md5']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['Lig_Md5'] = array();
       }
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != 'print')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['Lig_Md5'] = array();
   }
       $this->Tem_tab_vert = false;
   if (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_cmp']) > 1)
   {
       $this->width_tabula_quebra  = (((count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_cmp']) - 1) * 13) + 3) . "px";
       $this->width_tabula_display = "''";
       $this->Tem_tab_vert = true;
   }
   else
   {
       $this->width_tabula_quebra  = "0px";
       $this->width_tabula_display = "none";
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_dbo_view_resumo_servico_por_profissional_especialidade']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_dbo_view_resumo_servico_por_profissional_especialidade']['lig_edit'] != '')
   {
       if ($_SESSION['scriptcase']['sc_apl_conf']['grid_dbo_view_resumo_servico_por_profissional_especialidade']['lig_edit'] == "on")  {$_SESSION['scriptcase']['sc_apl_conf']['grid_dbo_view_resumo_servico_por_profissional_especialidade']['lig_edit'] = "S";}
       if ($_SESSION['scriptcase']['sc_apl_conf']['grid_dbo_view_resumo_servico_por_profissional_especialidade']['lig_edit'] == "off") {$_SESSION['scriptcase']['sc_apl_conf']['grid_dbo_view_resumo_servico_por_profissional_especialidade']['lig_edit'] = "N";}
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_dbo_view_resumo_servico_por_profissional_especialidade']['lig_edit'];
   }
   $this->grid_emb_form      = false;
   $this->grid_emb_form_full = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_form']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_form'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_form_full']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_form_full'])
       {
          $this->grid_emb_form_full = true;
       }
       else
       {
           $this->grid_emb_form = true;
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['mostra_edit'] = "N";
       }
   }
   if ($this->Ini->SC_Link_View || ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_psq'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['psq_edit'] == 'N'))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['mostra_edit'] = "N";
   }
   $this->sc_proc_quebra_descricao_especialidade = false;
   $this->sc_proc_quebra_profissional = false;
   $this->NM_cont_body   = 0; 
   $this->NM_emb_tree_no = false; 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'])
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] = array();
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ind_tree'] = 0;
   }
   elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['emb_tree_no']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['emb_tree_no'])
   { 
       $this->NM_emb_tree_no = true; 
   }
   $this->aba_iframe = false;
   $this->Print_All = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['print_all'];
   if ($this->Print_All)
   {
       $this->Ini->nm_limite_lin = $this->Ini->nm_limite_lin_prt; 
   }
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("grid_dbo_view_resumo_servico_por_profissional_especialidade", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['group_2'] = "on";
   $this->nmgp_botoes['group_1'] = "on";
   $this->nmgp_botoes['group_4'] = "on";
   $this->nmgp_botoes['group_3'] = "on";
   $this->nmgp_botoes['exit'] = "on";
   $this->nmgp_botoes['first'] = "on";
   $this->nmgp_botoes['back'] = "on";
   $this->nmgp_botoes['forward'] = "on";
   $this->nmgp_botoes['last'] = "on";
   $this->nmgp_botoes['export'] = "on";
   $this->nmgp_botoes['print'] = "on";
   $this->nmgp_botoes['html'] = "on";
   $this->nmgp_botoes['goto'] = "on";
   $this->nmgp_botoes['qtline'] = "on";
   $this->nmgp_botoes['navpage'] = "on";
   $this->nmgp_botoes['rows'] = "on";
   $this->nmgp_botoes['summary'] = "on";
   $this->nmgp_botoes['sel_col'] = "on";
   $this->nmgp_botoes['sort_col'] = "on";
   $this->nmgp_botoes['qsearch'] = "on";
   $this->nmgp_botoes['groupby'] = "on";
   $this->nmgp_botoes['gridsave'] = "on";
   $this->nmgp_botoes['gridsavesession'] = "on";
   $this->nmgp_botoes['reload'] = "on";
   $this->Cmps_ord_def['nome_razao_social'] = " asc";
   $this->Cmps_ord_def['Contratos'] = " asc";
   $this->Cmps_ord_def['Profissional'] = " asc";
   $this->Cmps_ord_def['Atividade'] = " asc";
   $this->Cmps_ord_def['descricao_especialidade'] = " asc";
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_dbo_view_resumo_servico_por_profissional_especialidade']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_dbo_view_resumo_servico_por_profissional_especialidade']['btn_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_dbo_view_resumo_servico_por_profissional_especialidade']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
       {
           $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
       }
   }
   $this->Proc_link_res = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_resumo'])) 
   { 
       $this->Proc_link_res            = true;
       $this->nmgp_botoes['filter']    = 'off';
       $this->nmgp_botoes['groupby']   = 'off';
       $this->nmgp_botoes['dynsearch'] = 'off';
       $this->nmgp_botoes['qsearch']   = 'off';
       $this->nmgp_botoes['gridsave']  = 'off';
       $this->nmgp_botoes['exit']      = 'off';
   } 
   $this->sc_proc_grid = false; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['doc_word'] || $this->Ini->sc_export_ajax_img)
   { 
       $this->NM_raiz_img = $this->Ini->root; 
   } 
   else 
   { 
       $this->NM_raiz_img = ""; 
   } 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_pesq'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_pesq_ant'];  
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->nome_razao_social = $Busca_temp['nome_razao_social']; 
       $tmp_pos = strpos($this->nome_razao_social, "##@@");
       if ($tmp_pos !== false && !is_array($this->nome_razao_social))
       {
           $this->nome_razao_social = substr($this->nome_razao_social, 0, $tmp_pos);
       }
       $this->contratos = $Busca_temp['contratos']; 
       $tmp_pos = strpos($this->contratos, "##@@");
       if ($tmp_pos !== false && !is_array($this->contratos))
       {
           $this->contratos = substr($this->contratos, 0, $tmp_pos);
       }
       $this->profissional = $Busca_temp['profissional']; 
       $tmp_pos = strpos($this->profissional, "##@@");
       if ($tmp_pos !== false && !is_array($this->profissional))
       {
           $this->profissional = substr($this->profissional, 0, $tmp_pos);
       }
       $this->atividade = $Busca_temp['atividade']; 
       $tmp_pos = strpos($this->atividade, "##@@");
       if ($tmp_pos !== false && !is_array($this->atividade))
       {
           $this->atividade = substr($this->atividade, 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_pesq_filtro'];
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] == "muda_qt_linhas")
   { 
       unset($rec);
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] == "muda_rec_linhas")
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] = "muda_qt_linhas";
   } 

   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['dashboard_info']['maximized']) {
       $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['dashboard_info']['dashboard_app'];
       if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['grid_dbo_view_resumo_servico_por_profissional_especialidade'])) {
           $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['grid_dbo_view_resumo_servico_por_profissional_especialidade'];

           $this->nmgp_botoes['first']     = $tmpDashboardButtons['grid_navigate']  ? 'on' : 'off';
           $this->nmgp_botoes['back']      = $tmpDashboardButtons['grid_navigate']  ? 'on' : 'off';
           $this->nmgp_botoes['last']      = $tmpDashboardButtons['grid_navigate']  ? 'on' : 'off';
           $this->nmgp_botoes['forward']   = $tmpDashboardButtons['grid_navigate']  ? 'on' : 'off';
           $this->nmgp_botoes['summary']   = $tmpDashboardButtons['grid_summary']   ? 'on' : 'off';
           $this->nmgp_botoes['qsearch']   = $tmpDashboardButtons['grid_qsearch']   ? 'on' : 'off';
           $this->nmgp_botoes['dynsearch'] = $tmpDashboardButtons['grid_dynsearch'] ? 'on' : 'off';
           $this->nmgp_botoes['filter']    = $tmpDashboardButtons['grid_filter']    ? 'on' : 'off';
           $this->nmgp_botoes['sel_col']   = $tmpDashboardButtons['grid_sel_col']   ? 'on' : 'off';
           $this->nmgp_botoes['sort_col']  = $tmpDashboardButtons['grid_sort_col']  ? 'on' : 'off';
           $this->nmgp_botoes['goto']      = $tmpDashboardButtons['grid_goto']      ? 'on' : 'off';
           $this->nmgp_botoes['qtline']    = $tmpDashboardButtons['grid_lineqty']   ? 'on' : 'off';
           $this->nmgp_botoes['navpage']   = $tmpDashboardButtons['grid_navpage']   ? 'on' : 'off';
           $this->nmgp_botoes['pdf']       = $tmpDashboardButtons['grid_pdf']       ? 'on' : 'off';
           $this->nmgp_botoes['xls']       = $tmpDashboardButtons['grid_xls']       ? 'on' : 'off';
           $this->nmgp_botoes['xml']       = $tmpDashboardButtons['grid_xml']       ? 'on' : 'off';
           $this->nmgp_botoes['json']      = $tmpDashboardButtons['grid_json']      ? 'on' : 'off';
           $this->nmgp_botoes['csv']       = $tmpDashboardButtons['grid_csv']       ? 'on' : 'off';
           $this->nmgp_botoes['rtf']       = $tmpDashboardButtons['grid_rtf']       ? 'on' : 'off';
           $this->nmgp_botoes['word']      = $tmpDashboardButtons['grid_word']      ? 'on' : 'off';
           $this->nmgp_botoes['doc']       = $tmpDashboardButtons['grid_doc']       ? 'on' : 'off';
           $this->nmgp_botoes['print']     = $tmpDashboardButtons['grid_print']     ? 'on' : 'off';
           $this->nmgp_botoes['new']       = $tmpDashboardButtons['grid_new']       ? 'on' : 'off';
           $this->nmgp_botoes['img']       = $tmpDashboardButtons['img']            ? 'on' : 'off';
           $this->nmgp_botoes['html']      = $tmpDashboardButtons['html']           ? 'on' : 'off';
           $this->nmgp_botoes['reload']    = $tmpDashboardButtons['grid_reload']    ? 'on' : 'off';
       }
   }

   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'])
   {
       $nmgp_ordem = ""; 
       $rec = "ini"; 
   } 
//
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'])
   { 
       include_once($this->Ini->path_embutida . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_total.class.php"); 
   } 
   else 
   { 
       include_once($this->Ini->path_aplicacao . "grid_dbo_view_resumo_servico_por_profissional_especialidade_total.class.php"); 
   } 
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'])
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_pdf'] != "pdf")  
       { 
           $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
       } 
       else 
       { 
           $_SESSION['scriptcase']['contr_link_emb'] = "pdf";
       } 
   } 
   else 
   { 
       $this->nm_location = $_SESSION['scriptcase']['contr_link_emb'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_pdf'] = $_SESSION['scriptcase']['contr_link_emb'];
   } 
   $this->Tot         = new grid_dbo_view_resumo_servico_por_profissional_especialidade_total($this->Ini->sc_page);
   $this->Tot->Db     = $this->Db;
   $this->Tot->Erro   = $this->Erro;
   $this->Tot->Ini    = $this->Ini;
   $this->Tot->Lookup = $this->Lookup;
   if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_lin_grid']))
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_lin_grid'] = 10;
   }   
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_dbo_view_resumo_servico_por_profissional_especialidade']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_dbo_view_resumo_servico_por_profissional_especialidade']['rows']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_lin_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_dbo_view_resumo_servico_por_profissional_especialidade']['rows'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['grid_dbo_view_resumo_servico_por_profissional_especialidade']['rows']);
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_dbo_view_resumo_servico_por_profissional_especialidade']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_dbo_view_resumo_servico_por_profissional_especialidade']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_dbo_view_resumo_servico_por_profissional_especialidade']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['grid_dbo_view_resumo_servico_por_profissional_especialidade']['cols']);
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_liga']['rows']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_lin_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_liga']['rows'];  
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_liga']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_col_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_liga']['cols'];  
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] == "muda_qt_linhas") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao']  = "igual" ;  
       if (!empty($nmgp_quant_linhas) && !is_array($nmgp_quant_linhas)) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_lin_grid'] = $nmgp_quant_linhas ;  
       } 
   }   
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_reg_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_lin_grid']; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Ind_Groupby'] == "sc_free_group_by") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_select'] = array(); 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Ind_Groupby'] == "sc_free_group_by") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_quebra'] = array(); 
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_sql'] as $cmp_var => $resto)
           {
               foreach ($resto as $SC_Sql_col => $SC_Sql_order)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_quebra'][$cmp_var][$SC_Sql_col] = $SC_Sql_order;
               }
           }
       } 
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_grid']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_desc'] = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_cmp']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_label'] = "";  
   }   
   if (!empty($nmgp_ordem))  
   { 
       $nmgp_ordem = str_replace('\"', '"', $nmgp_ordem); 
       if (!isset($this->Cmps_ord_def[$nmgp_ordem])) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] = "igual" ;  
       }
       else
       { 
           $Ordem_tem_quebra = false;
           foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_quebra'] as $campo => $resto) 
           {
               foreach($resto as $sqldef => $ordem) 
               {
                   if ($sqldef == $nmgp_ordem) 
                   { 
                       $Ordem_tem_quebra = true;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] = "inicio" ;  
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_grid'] = ""; 
                       $ordem = ($ordem == "asc") ? "desc" : "asc";
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_quebra'][$campo][$nmgp_ordem] = $ordem;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_cmp'] = $nmgp_ordem;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_label'] = trim($ordem);
                   }   
               }   
           }   
           if (!$Ordem_tem_quebra)
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_grid'] = $nmgp_ordem  ; 
           }
       }
   }   
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] == "ordem")  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] = "inicio" ;  
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_ant'] == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_grid'])  
       { 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_desc'] != " desc")  
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_desc'] = " desc" ; 
           } 
           else   
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_desc'] = " asc" ;  
           } 
       } 
       else 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_desc'] = $this->Cmps_ord_def[$nmgp_ordem];  
       } 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_label'] = trim($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_desc']);  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_grid'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_cmp'] = $nmgp_ordem;  
   }  
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['inicio']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['inicio'] = 0 ;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['final']  = 0 ;  
   }   
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_edit'])  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_edit'] = false;  
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "inicio") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] = "edit" ; 
       } 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_orig'] = " where idFilial = " . $_SESSION['usr_company'] . " AND idPessoas = " . $_SESSION['usr_idPessoas'] . " AND (CONVERT(VARCHAR(MAX),data_do_servico,112)  BETWEEN " . $_SESSION['usr_dt_inicial'] . " AND " . $_SESSION['usr_dt_final'] . ")";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_pesq_filtro'];
   $this->sc_where_atual_f = (!empty($this->sc_where_atual)) ? "(" . trim(substr($this->sc_where_atual, 6)) . ")" : "";
   $this->sc_where_atual_f = str_replace("%", "@percent@", $this->sc_where_atual_f);
   $this->sc_where_atual_f = "NM_where_filter*scin" . str_replace("'", "@aspass@", $this->sc_where_atual_f) . "*scout";
//
//--------- 
//
   $nmgp_opc_orig = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao']; 
   if (isset($rec)) 
   { 
       if ($rec == "ini") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] = "inicio" ; 
       } 
       elseif ($rec == "fim") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] = "final" ; 
       } 
       else 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] = "avanca" ; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['final'] = $rec; 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['final'] > 0) 
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['final']-- ; 
           } 
       } 
   } 
   $this->NM_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao']; 
   if ($this->NM_opcao == "print") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao_print'] = "print" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao']       = "igual" ; 
       if ($this->Ini->sc_export_ajax) 
       { 
           $this->Img_embbed = true;
       } 
   } 
// 
   $this->count_ger = 0;
   $this->sum_quantidade = 0;
   $this->sum_total_servico = 0;
   $this->arg_sum_descricao_especialidade = "";
   $this->count_descricao_especialidade = 0;
   $this->sum_descricao_especialidade_quantidade = 0;
   $this->sum_descricao_especialidade_total_servico = 0;
   $this->arg_sum_profissional = "";
   $this->count_profissional = 0;
   $this->sum_profissional_quantidade = 0;
   $this->sum_profissional_total_servico = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['tot_geral'][1] ;  
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Ind_Groupby'] != "sc_free_group_by") 
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] == "final" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_reg_grid'] == "all") 
       { 
           $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Ind_Groupby'];
           $this->Tot->$Gb_geral();
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['tot_geral'][1] ;  
           $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['tot_geral'][1];
       } 
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_dinamic']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_dinamic'] != $this->nm_where_dinamico)  
   { 
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['tot_geral']);
   } 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_dinamic'] = $this->nm_where_dinamico;  
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['tot_geral']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_pesq'] != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_pesq_ant'] || $nmgp_opc_orig == "edit") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['contr_total_geral'] = "NAO";
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['sc_total']);
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Ind_Groupby'] == "sc_free_group_by")
       { 
           $this->totaliza_php_sc_free_group_by() ; 
       } 
       else 
       { 
           $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Ind_Groupby'];
           $this->Tot->$Gb_geral();
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Ind_Groupby'] != "sc_free_group_by") 
       { 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['contr_array_resumo']))  
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['contr_array_resumo'] = "NAO";
           } 
       }
   } 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['tot_geral'][1] ;  
   $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['tot_geral'][1];
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_resumo'])) 
   { 
       $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
       $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_pesq']; 
       if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_pesq'])) 
       { 
           $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_resumo']; 
       } 
       else
       { 
           $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_resumo'] . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
       $rt_grid = $this->Db->Execute($nmgp_select) ; 
       if ($rt_grid === false && !$rt_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit ; 
       }  
       $this->count_ger = $rt_grid->fields[0];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['sc_total'] = $rt_grid->fields[0];  
       
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_reg_grid'] == "all") 
   { 
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_reg_grid'] = $this->count_ger;
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao']       = "inicio";
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] == "inicio" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] == "pesq") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['inicio'] = 0 ; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] == "final") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['sc_total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_reg_grid']; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['inicio'] < 0) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['inicio'] = 0 ; 
       } 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] == "retorna") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_reg_grid']; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['inicio'] < 0) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['inicio'] = 0 ; 
       } 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] == "avanca" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['sc_total'] >  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['final']) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['final']; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao_print'] != "print" && substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'], 0, 7) != "detalhe" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] = "igual"; 
   } 
   $this->Rec_ini = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_reg_grid']; 
   if ($this->Rec_ini < 0) 
   { 
       $this->Rec_ini = 0; 
   } 
   $this->Rec_fim = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_reg_grid'] + 1; 
   if ($this->Rec_fim > $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['sc_total']) 
   { 
       $this->Rec_fim = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['sc_total']; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['inicio'] > 0) 
   { 
       $this->Rec_ini++ ; 
   } 
   $this->nmgp_reg_start = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['inicio']; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['inicio'] > 0) 
   { 
       $this->nmgp_reg_start--; 
   } 
   $this->nm_grid_ini = $this->nmgp_reg_start + 1; 
   if ($this->nmgp_reg_start != 0) 
   { 
       $this->nm_grid_ini++;
   }  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT mes_ano, nome_razao_social, Contratos, Profissional, Atividade, descricao_especialidade, descricao_servico, sum(quantidade) as quantidade, sum(total_servico) as total_servico from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT mes_ano, nome_razao_social, Contratos, Profissional, Atividade, descricao_especialidade, descricao_servico, sum(quantidade) as quantidade, sum(total_servico) as total_servico from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT mes_ano, nome_razao_social, Contratos, Profissional, Atividade, descricao_especialidade, descricao_servico, sum(quantidade) as quantidade, sum(total_servico) as total_servico from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT mes_ano, nome_razao_social, Contratos, Profissional, Atividade, descricao_especialidade, descricao_servico, sum(quantidade) as quantidade, sum(total_servico) as total_servico from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT mes_ano, nome_razao_social, Contratos, Profissional, Atividade, descricao_especialidade, descricao_servico, sum(quantidade) as quantidade, sum(total_servico) as total_servico from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT mes_ano, nome_razao_social, Contratos, Profissional, Atividade, descricao_especialidade, descricao_servico, sum(quantidade) as quantidade, sum(total_servico) as total_servico from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_pesq']; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_resumo'])) 
   { 
       if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_pesq'])) 
       { 
           $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_resumo']; 
       } 
       else
       { 
           $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_resumo'] . ")"; 
       } 
   } 
   $nmgp_select .= " group by mes_ano ,nome_razao_social 		,Contratos 		,Profissional 		,Atividade 		,descricao_especialidade 		,descricao_servico"; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_desc']; 
   } 
   elseif (!empty($campos_order_select)) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $campos_order_select; 
   } 
   elseif (!empty($campos_order)) 
   { 
       $nmgp_order_by = " order by " . $campos_order; 
   } 
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['order_grid'] = $nmgp_order_by;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] == "pdf" || $this->Ini->Apl_paginacao == "FULL")
   {
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
       $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
   }
   else  
   {
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, " . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_reg_grid'] + 2) . ", $this->nmgp_reg_start)" ; 
       $this->rs_grid = $this->Db->SelectLimit($nmgp_select, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_reg_grid'] + 2, $this->nmgp_reg_start) ; 
   }  
   if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
   { 
       $this->force_toolbar = true;
       $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
   }  
   else 
   { 
       $this->mes_ano = $this->rs_grid->fields[0] ;  
       $this->nome_razao_social = $this->rs_grid->fields[1] ;  
       $this->contratos = $this->rs_grid->fields[2] ;  
       $this->profissional = $this->rs_grid->fields[3] ;  
       $this->atividade = $this->rs_grid->fields[4] ;  
       $this->descricao_especialidade = $this->rs_grid->fields[5] ;  
       $this->descricao_servico = $this->rs_grid->fields[6] ;  
       $this->quantidade = $this->rs_grid->fields[7] ;  
       $this->quantidade = (string)$this->quantidade;
       $this->total_servico = $this->rs_grid->fields[8] ;  
       $this->total_servico =  str_replace(",", ".", $this->total_servico);
       $this->total_servico = (string)$this->total_servico;
       if (!isset($this->descricao_especialidade)) { $this->descricao_especialidade = ""; }
       if (!isset($this->profissional)) { $this->profissional = ""; }
       $this->arg_sum_profissional = " = " . $this->Db->qstr($this->profissional);
       $this->arg_sum_descricao_especialidade = " = " . $this->Db->qstr($this->descricao_especialidade);
       $this->SC_seq_register = $this->nmgp_reg_start ; 
       $this->SC_seq_page = 0;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Ind_Groupby'] == "sc_free_group_by") 
       {
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_cmp'] as $cmp => $sql)
           {
               $Cmp_orig   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_orig'][$cmp] : $cmp;
               $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
               $Cmp_Old    = $cmp . '_Old';
               $TP_Time = (in_array($Cmp_orig, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
               $this->$Cmp_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->$Cmp_orig, $Format_tst); 
           }
           $sql_where = "";
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_cmp'] as $cmp => $sql)
           {
               $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
               if (!empty($Format_tst))
               {
                   $tmp = $this->$cmp;
                   if (!empty($tmp))
                   {
                       $sql = $this->Ini->Get_sql_date_groupby($sql, $Format_tst);
                   }
               }
               $cmp_qb     = $this->$cmp;
               $tmp        = "arg_sum_" . $cmp;
               $sql_where .= (!empty($sql_where)) ? " and " : "";
               $sql_where .= $sql . $this->$tmp;
               $tmp        = "quebra_" . $cmp . "_sc_free_group_by";
               $this->$tmp($cmp_qb, $sql_where, $cmp);
           }
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['final'] = $this->nmgp_reg_start ; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['inicio'] != 0 && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['final']++ ; 
           $this->SC_seq_register = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['final']; 
           $this->rs_grid->MoveNext(); 
           $this->mes_ano = $this->rs_grid->fields[0] ;  
           $this->nome_razao_social = $this->rs_grid->fields[1] ;  
           $this->contratos = $this->rs_grid->fields[2] ;  
           $this->profissional = $this->rs_grid->fields[3] ;  
           $this->atividade = $this->rs_grid->fields[4] ;  
           $this->descricao_especialidade = $this->rs_grid->fields[5] ;  
           $this->descricao_servico = $this->rs_grid->fields[6] ;  
           $this->quantidade = $this->rs_grid->fields[7] ;  
           $this->total_servico = $this->rs_grid->fields[8] ;  
           if (!isset($this->descricao_especialidade)) { $this->descricao_especialidade = ""; }
           if (!isset($this->profissional)) { $this->profissional = ""; }
       } 
   } 
   $this->nmgp_reg_inicial = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['final'] + 1;
   $this->nmgp_reg_final   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['final'] + $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_reg_grid'];
   $this->nmgp_reg_final   = ($this->nmgp_reg_final > $this->count_ger) ? $this->count_ger : $this->nmgp_reg_final;
// 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'])
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['doc_word'] && !$this->Ini->sc_export_ajax)
       {
           require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
           $this->pb = new scProgressBar();
           $this->pb->setRoot($this->Ini->root);
           $this->pb->setDir($_SESSION['scriptcase']['grid_dbo_view_resumo_servico_por_profissional_especialidade']['glo_nm_path_imag_temp'] . "/");
           $this->pb->setProgressbarMd5($_GET['pbmd5']);
           $this->pb->initialize();
           $this->pb->setReturnUrl("./");
           $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['word_return']);
           $this->pb->setTotalSteps($this->count_ger);
       }
       if ($this->Ini->Proc_print && $this->Ini->Export_html_zip  && !$this->Ini->sc_export_ajax)
       {
           require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
           $this->pb = new scProgressBar();
           $this->pb->setRoot($this->Ini->root);
           $this->pb->setDir($_SESSION['scriptcase']['grid_dbo_view_resumo_servico_por_profissional_especialidade']['glo_nm_path_imag_temp'] . "/");
           $this->pb->setProgressbarMd5($_GET['pbmd5']);
           $this->pb->initialize();
           $this->pb->setReturnUrl($nm_url_saida);
           $this->pb->setReturnOption('busca');
           $this->pb->setTotalSteps($this->count_ger);
       }
       if (!$this->Ini->sc_export_ajax && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] == "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['pdf_res'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_pdf'] != "pdf")
       {
           //---------- Gauge ----------
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Resumo :: PDF</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
           if ($_SESSION['scriptcase']['proc_mobile'])
           {
?>
                    <meta name="viewport" content="minimal-ui, width=300, initial-scale=1, maximum-scale=1, user-scalable=no">
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
                    <meta name="msapplication-TileColor" content="#247159">
                    <meta name="msapplication-TileImage" content="">
                    <meta name="theme-color" content="#247159">
                    <meta name="apple-mobile-web-app-status-bar-style" content="#247159">
                    <link rel="shortcut icon" href=""><?php
           }
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?>" GMT">
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0">
 <META http-equiv="Pragma" content="no-cache">
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__img__NM__ct_other_gauge.png">
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <?php 
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
 { 
 ?> 
 <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
 <?php 
 } 
 ?> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
 <SCRIPT LANGUAGE="Javascript" SRC="<?php echo $this->Ini->path_js; ?>/nm_gauge.js"></SCRIPT>
</HEAD>
<BODY scrolling="no">
<table class="scGridTabela" style="padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;"><tr class="scGridFieldOddVert"><td>
<?php echo $this->Ini->Nm_lang['lang_pdff_gnrt']; ?>...<br>
<?php
           $this->progress_grid    = $this->rs_grid->RecordCount();
           $this->progress_pdf     = 0;
           $this->progress_res     = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['pivot_charts']) ? sizeof($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['pivot_charts']) : 0;
           $this->progress_graf    = 0;
           $this->progress_tot     = 0;
           $this->progress_now     = 0;
           $this->progress_lim_tot = 0;
           $this->progress_lim_now = 0;
           if (-1 < $this->progress_grid)
           {
               $this->progress_lim_qtd = (250 < $this->progress_grid) ? 250 : $this->progress_grid;
               $this->progress_lim_tot = floor($this->progress_grid / $this->progress_lim_qtd);
               $this->progress_pdf     = floor($this->progress_grid * 0.25) + 1;
               $this->progress_tot     = $this->progress_grid + $this->progress_pdf + $this->progress_res + $this->progress_graf;
               $str_pbfile             = $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
               $this->progress_fp      = fopen($str_pbfile, 'w');
               grid_dbo_view_resumo_servico_por_profissional_especialidade_pdf_progress_call("PDF\n", $this->Ini->Nm_lang);
               grid_dbo_view_resumo_servico_por_profissional_especialidade_pdf_progress_call($this->Ini->path_js   . "\n", $this->Ini->Nm_lang);
               grid_dbo_view_resumo_servico_por_profissional_especialidade_pdf_progress_call($this->Ini->path_prod . "/img/\n", $this->Ini->Nm_lang);
               grid_dbo_view_resumo_servico_por_profissional_especialidade_pdf_progress_call($this->progress_tot   . "\n", $this->Ini->Nm_lang);
               fwrite($this->progress_fp, "PDF\n");
               fwrite($this->progress_fp, $this->Ini->path_js   . "\n");
               fwrite($this->progress_fp, $this->Ini->path_prod . "/img/\n");
               fwrite($this->progress_fp, $this->progress_tot   . "\n");
               $lang_protect = $this->Ini->Nm_lang['lang_pdff_strt'];
               if (!NM_is_utf8($lang_protect))
               {
                   $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               grid_dbo_view_resumo_servico_por_profissional_especialidade_pdf_progress_call($this->progress_tot . "_#NM#_" . "1_#NM#_" . $lang_protect . "...\n", $this->Ini->Nm_lang);
               fwrite($this->progress_fp, "1_#NM#_" . $lang_protect . "...\n");
               flush();
           }
       }
       $nm_fundo_pagina = ""; 
       header("X-XSS-Protection: 1; mode=block");
       header("X-Frame-Options: SAMEORIGIN");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['doc_word'])
       {
           $nm_saida->saida("  <html xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:w=\"urn:schemas-microsoft-com:office:word\" xmlns:m=\"http://schemas.microsoft.com/office/2004/12/omml\" xmlns=\"http://www.w3.org/TR/REC-html40\">\r\n");
       }
       $nm_saida->saida("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\r\n");
       $nm_saida->saida("            \"http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd\">\r\n");
       $nm_saida->saida("  <HTML" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\r\n");
       $nm_saida->saida("  <HEAD>\r\n");
       $nm_saida->saida("   <TITLE>Resumo</TITLE>\r\n");
       $nm_saida->saida("   <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\" />\r\n");
       if ($_SESSION['scriptcase']['proc_mobile'])
       {
$nm_saida->saida("                        <meta name=\"viewport\" content=\"minimal-ui, width=300, initial-scale=1, maximum-scale=1, user-scalable=no\">\r\n");
$nm_saida->saida("                        <meta name=\"mobile-web-app-capable\" content=\"yes\">\r\n");
$nm_saida->saida("                        <meta name=\"apple-mobile-web-app-capable\" content=\"yes\">\r\n");
$nm_saida->saida("                        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"57x57\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"60x60\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"72x72\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"76x76\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"114x114\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"120x120\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"144x144\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"152x152\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"icon\" type=\"image/png\" sizes=\"192x192\"  href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"icon\" type=\"image/png\" sizes=\"96x96\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"\">\r\n");
$nm_saida->saida("                        <meta name=\"msapplication-TileColor\" content=\"#247159\" >\r\n");
$nm_saida->saida("                        <meta name=\"msapplication-TileImage\" content=\"\">\r\n");
$nm_saida->saida("                        <meta name=\"theme-color\" content=\"#247159\">\r\n");
$nm_saida->saida("                        <meta name=\"apple-mobile-web-app-status-bar-style\" content=\"#247159\">\r\n");
$nm_saida->saida("                        <link rel=\"shortcut icon\" href=\"\">\r\n");
       }
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['doc_word'])
       {
           $nm_saida->saida("   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Last-Modified\" content=\"" . gmdate('D, d M Y H:i:s') . " GMT\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"no-store, no-cache, must-revalidate\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"post-check=0, pre-check=0\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n");
       }
       $nm_saida->saida("   <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__img__NM__ct_other_gauge.png\">\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'])
       { 
           $css_body = "";
       } 
       else 
       { 
           $css_body = "margin-left:0px;margin-right:0px;margin-top:0px;margin-bottom:0px;";
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] && !$this->Ini->sc_export_ajax)
       { 
           $nm_saida->saida("   <form name=\"form_ajax_redir_1\" method=\"post\" style=\"display: none\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parms\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_outra_jan\">\r\n");
           $nm_saida->saida("   </form>\r\n");
           $nm_saida->saida("   <form name=\"form_ajax_redir_2\" method=\"post\" style=\"display: none\"> \r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parms\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_url_saida\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\">\r\n");
           $nm_saida->saida("   </form>\r\n");
           $confirmButtonClass = '';
           $cancelButtonClass  = '';
           $confirmButtonText  = $this->Ini->Nm_lang['lang_btns_cfrm'];
           $cancelButtonText   = $this->Ini->Nm_lang['lang_btns_cncl'];
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
           $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("     var scSweetAlertConfirmButton = \"" . $confirmButtonClass . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertCancelButton = \"" . $cancelButtonClass . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertConfirmButtonText = \"" . $confirmButtonText . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertCancelButtonText = \"" . $cancelButtonText . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertConfirmButtonFA = \"" . $confirmButtonFA . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertCancelButtonFA = \"" . $cancelButtonFA . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertConfirmButtonFAPos = \"" . $confirmButtonFAPos . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertCancelButtonFAPos = \"" . $cancelButtonFAPos . "\";\r\n");
           $nm_saida->saida("   </script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_dbo_view_resumo_servico_por_profissional_especialidade_jquery-3.6.0.min.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_dbo_view_resumo_servico_por_profissional_especialidade_ajax.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_dbo_view_resumo_servico_por_profissional_especialidade_message.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery-3.6.0.min.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_sweetalert.css\" />\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/sweetalert/sweetalert2.all.min.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/sweetalert/polyfill.min.js\"></script>\r\n");
           $nm_saida->saida("<script type=\"text/javascript\" src=\"../_lib/lib/js/frameControl.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/viewerjs/viewer.css\" />\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/viewerjs/viewer.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("      if (!window.Promise)\r\n");
           $nm_saida->saida("      {\r\n");
           $nm_saida->saida("          var head = document.getElementsByTagName('head')[0];\r\n");
           $nm_saida->saida("          var js = document.createElement(\"script\");\r\n");
           $nm_saida->saida("          js.src = \"../_lib/lib/js/bluebird.min.js\";\r\n");
           $nm_saida->saida("          head.appendChild(js);\r\n");
           $nm_saida->saida("      }\r\n");
           $nm_saida->saida("      $(\"#TB_iframeContent\").ready(function(){\r\n");
           $nm_saida->saida("         jQuery(document).bind('keydown.thickbox', function(e) {\r\n");
           $nm_saida->saida("            var keyPressed = e.charCode || e.keyCode || e.which;\r\n");
           $nm_saida->saida("            if (keyPressed == 27) { \r\n");
           $nm_saida->saida("                tb_remove();\r\n");
           $nm_saida->saida("            }\r\n");
           $nm_saida->saida("         })\r\n");
           $nm_saida->saida("      })\r\n");
           $nm_saida->saida("   </script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("     var applicationKeys = '';\r\n");
           $nm_saida->saida("     applicationKeys += 'ctrl+shift+right';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'ctrl+shift+left';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'ctrl+right';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'ctrl+left';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+q';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'ctrl+f';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'ctrl+s';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+enter';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'f1';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'ctrl+p';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+p';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+w';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+x';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+m';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+c';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+r';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+shift+p';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+shift+w';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+shift+x';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+shift+m';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+shift+c';\r\n");
           $nm_saida->saida("     applicationKeys += ',';\r\n");
           $nm_saida->saida("     applicationKeys += 'alt+shift+r';\r\n");
           $nm_saida->saida("     var hotkeyList = '';\r\n");
           $nm_saida->saida("     function execHotKey(e, h) {\r\n");
           $nm_saida->saida("         var hotkey_fired = false\r\n");
           $nm_saida->saida("         switch (true) {\r\n");
           $nm_saida->saida("             case (['ctrl+shift+right'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_fim');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['ctrl+shift+left'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_ini');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['ctrl+right'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_ava');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['ctrl+left'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_ret');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+q'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_sai');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['ctrl+f'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_fil');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['ctrl+s'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_savegrid');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+enter'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_res');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['f1'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_webh');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['ctrl+p'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_imp');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+p'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_pdf');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+w'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_word');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+x'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_xls');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+m'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_xml');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+c'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_csv');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+r'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_rtf');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+shift+p'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_email_pdf');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+shift+w'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_email_word');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+shift+x'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_email_xls');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+shift+m'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_email_xml');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+shift+c'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_email_csv');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("             case (['alt+shift+r'].indexOf(h.key) > -1):\r\n");
           $nm_saida->saida("                 hotkey_fired = process_hotkeys('sys_format_email_rtf');\r\n");
           $nm_saida->saida("                 break;\r\n");
           $nm_saida->saida("         }\r\n");
           $nm_saida->saida("         if (hotkey_fired) {\r\n");
           $nm_saida->saida("             e.preventDefault();\r\n");
           $nm_saida->saida("             return false;\r\n");
           $nm_saida->saida("         } else {\r\n");
           $nm_saida->saida("             return true;\r\n");
           $nm_saida->saida("         }\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("   </script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/hotkeys.inc.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/hotkeys_setup.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery/js/jquery-ui.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery/css/smoothness/jquery-ui.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/font-awesome/css/all.min.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/touch_punch/jquery.ui.touch-punch.min.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/malsup-blockui/jquery.blockUI.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/dropdown_check_list/css/ui.dropdownchecklist.standalone.css\" type=\"text/css\" />\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/dropdown_check_list/js/ui.dropdownchecklist.js\"></script>\r\n");
           $nm_saida->saida("        <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("          var sc_pathToTB = '" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/';\r\n");
           $nm_saida->saida("          var sc_tbLangClose = \"" . html_entity_decode($this->Ini->Nm_lang['lang_tb_close'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\";\r\n");
           $nm_saida->saida("          var sc_tbLangEsc = \"" . html_entity_decode($this->Ini->Nm_lang['lang_tb_esc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\";\r\n");
           $nm_saida->saida("        </script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox-compressed.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/scInput.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery.scInput.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery.scInput2.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/bluebird.min.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_form.css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_appdiv.css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_appdiv" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
           $nm_saida->saida("   <style type=\"text/css\"> \r\n");
           $nm_saida->saida("     .scGridLabelFont a img[src\$='" . $this->Ini->Label_sort_desc . "'], \r\n");
           $nm_saida->saida("     .scGridLabelFont a img[src\$='" . $this->Ini->Label_sort_asc . "'], \r\n");
           $nm_saida->saida("     .scGridLabelFont a img[src\$='" . $this->arr_buttons['bgraf']['image'] . "'], \r\n");
           $nm_saida->saida("     .scGridLabelFont a img[src\$='" . $this->arr_buttons['bconf_graf']['image'] . "']{opacity:1!important;} \r\n");
           $nm_saida->saida("     .scGridLabelFont a img{opacity:0;transition:all .2s;} \r\n");
           $nm_saida->saida("     .scGridLabelFont:HOVER a img{opacity:1;transition:all .2s;} \r\n");
           $nm_saida->saida("   </style> \r\n");
           $nm_saida->saida("   <script type=\"text/javascript\"> \r\n");
           if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'])
           { 
               $nm_saida->saida("   function sc_session_redir(url_redir)\r\n");
               $nm_saida->saida("   {\r\n");
           $nm_saida->saida("       if (typeof(sc_session_redir_mobile) === typeof(function(){})) { sc_session_redir_mobile(url_redir); }\r\n");
               $nm_saida->saida("       if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')\r\n");
               $nm_saida->saida("       {\r\n");
               $nm_saida->saida("           window.parent.sc_session_redir(url_redir);\r\n");
               $nm_saida->saida("       }\r\n");
               $nm_saida->saida("       else\r\n");
               $nm_saida->saida("       {\r\n");
               $nm_saida->saida("           if (window.opener && typeof window.opener.sc_session_redir === 'function')\r\n");
               $nm_saida->saida("           {\r\n");
               $nm_saida->saida("               window.close();\r\n");
               $nm_saida->saida("               window.opener.sc_session_redir(url_redir);\r\n");
               $nm_saida->saida("           }\r\n");
               $nm_saida->saida("           else\r\n");
               $nm_saida->saida("           {\r\n");
               $nm_saida->saida("               window.location = url_redir;\r\n");
               $nm_saida->saida("           }\r\n");
               $nm_saida->saida("       }\r\n");
               $nm_saida->saida("   }\r\n");
           }
           $nm_saida->saida("   var scBtnGrpStatus = {};\r\n");
           $nm_saida->saida("   var SC_Link_View = false;\r\n");
           if ($this->Ini->SC_Link_View)
           {
               $nm_saida->saida("   SC_Link_View = true;\r\n");
           }
           $nm_saida->saida("   var Qsearch_ok = true;\r\n");
           if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] != "on")
           {
               $nm_saida->saida("   Qsearch_ok = false;\r\n");
           }
           $nm_saida->saida("   var scQSInit = true;\r\n");
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] || $this->Ini->Apl_paginacao == "FULL")
           {
               $nm_saida->saida("   var scQtReg  = " . NM_encode_input($this->count_ger) . ";\r\n");
           }
           else
           {
               $nm_saida->saida("   var scQtReg  = " . NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_reg_grid']) . ";\r\n");
           }
           $nm_saida->saida("   \$(function(){ \r\n");
           $nm_saida->saida("     NM_btn_disable();\r\n");
           if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
           {
               $nm_saida->saida("     \$('#SC_fast_search_top').keyup(function(e) {\r\n");
               $nm_saida->saida("       scQuickSearchKeyUp('top', e);\r\n");
               $nm_saida->saida("     });\r\n");
           }
           $nm_saida->saida("     $('#id_F0_top').keyup(function(e) {\r\n");
           $nm_saida->saida("       var keyPressed = e.charCode || e.keyCode || e.which;\r\n");
           $nm_saida->saida("       if (13 == keyPressed) {\r\n");
           $nm_saida->saida("          return false; \r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     $('#id_F0_bot').keyup(function(e) {\r\n");
           $nm_saida->saida("       var keyPressed = e.charCode || e.keyCode || e.which;\r\n");
           $nm_saida->saida("       if (13 == keyPressed) {\r\n");
           $nm_saida->saida("          return false; \r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     $(\".scBtnGrpText\").mouseover(function() { $(this).addClass(\"scBtnGrpTextOver\"); }).mouseout(function() { $(this).removeClass(\"scBtnGrpTextOver\"); });\r\n");
           $nm_saida->saida("     $(\".scBtnGrpClick\").mouseup(function(event){\r\n");
           $nm_saida->saida("          event.preventDefault();\r\n");
           $nm_saida->saida("          if(event.target !== event.currentTarget) return;\r\n");
           $nm_saida->saida("          if($(this).find(\"a\").prop('href') != '')\r\n");
           $nm_saida->saida("          {\r\n");
           $nm_saida->saida("              $(this).find(\"a\").click();\r\n");
           $nm_saida->saida("          }\r\n");
           $nm_saida->saida("          else\r\n");
           $nm_saida->saida("          {\r\n");
           $nm_saida->saida("              eval($(this).find(\"a\").prop('onclick'));\r\n");
           $nm_saida->saida("          }\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }); \r\n");
           $nm_saida->saida("   \$(window).on('load', function() {\r\n");
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ancor_save']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ancor_save']))
           {
               $nm_saida->saida("       var catTopPosition = jQuery('#SC_ancor" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ancor_save'] . "').offset().top;\r\n");
               $nm_saida->saida("       jQuery('html, body').animate({scrollTop:catTopPosition}, 'fast');\r\n");
               $nm_saida->saida("       $('#SC_ancor" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ancor_save'] . "').addClass('" . $this->css_scGridFieldOver . "');\r\n");
               unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ancor_save']);
           }
           if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
           {
               $nm_saida->saida("     scQuickSearchKeyUp('top', null);\r\n");
           }
           $nm_saida->saida("   });\r\n");
           $nm_saida->saida("   function scQuickSearchSubmit_top() {\r\n");
           $nm_saida->saida("     document.F0_top.nmgp_opcao.value = 'fast_search';\r\n");
           $nm_saida->saida("     document.F0_top.submit();\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scQuickSearchKeyUp(sPos, e) {\r\n");
           $nm_saida->saida("     if (null != e) {\r\n");
           $nm_saida->saida("       var keyPressed = e.charCode || e.keyCode || e.which;\r\n");
           $nm_saida->saida("       if (13 == keyPressed) {\r\n");
           $nm_saida->saida("         if ('top' == sPos) nm_gp_submit_qsearch('top');\r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("       else\r\n");
           $nm_saida->saida("       {\r\n");
           $nm_saida->saida("           $('#SC_fast_search_submit_top').show();\r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnGroupByShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("     if ($(\"#sc_id_groupby_placeholder_\" + sPos).css('display') != 'none') {\r\n");
           if ($_SESSION['scriptcase']['proc_mobile']) { 
               $nm_saida->saida("         //return;\r\n");
           }
           else {
               $nm_saida->saida("         scBtnGroupByHide(sPos);\r\n");
               $nm_saida->saida("         $(\"#sel_groupby_\" + sPos).removeClass(\"selected\");\r\n");
               $nm_saida->saida("         return;\r\n");
           }
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"GET\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: sUrl\r\n");
           $nm_saida->saida("     }).done(function(data) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_groupby_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("       $(\"#sc_id_groupby_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("       $(\"#sc_id_groupby_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnGroupByHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_groupby_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_groupby_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnSelCamposShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("     if ($(\"#sc_id_sel_campos_placeholder_\" + sPos).css('display') != 'none') {\r\n");
           if ($_SESSION['scriptcase']['proc_mobile']) { 
               $nm_saida->saida("         //return;\r\n");
           }
           else {
               $nm_saida->saida("         scBtnSelCamposHide(sPos);\r\n");
               $nm_saida->saida("         $(\"#selcmp_\" + sPos).removeClass(\"selected\");\r\n");
               $nm_saida->saida("         return;\r\n");
           }
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"GET\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: sUrl\r\n");
           $nm_saida->saida("     }).done(function(data) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_sel_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("       $(\"#sc_id_sel_campos_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("       $(\"#sc_id_sel_campos_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnSelCamposHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_sel_campos_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_sel_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
$nm_saida->saida("function ajax_check_file(img_name, field , i , p, p_cache){\r\n");
$nm_saida->saida("    $(document).ready(function(){\r\n");
$nm_saida->saida("        $('#id_sc_field_'+ field +'_'+i+'> img').attr('src', '" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif');\r\n");
$nm_saida->saida("        $('#id_sc_field_'+ field +'_'+i+' > a > img').attr('src', '" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif');\r\n");
$nm_saida->saida("        $('#id_sc_field_'+ field +'_'+i+' > span > a > img').attr('src', '" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif');\r\n");
$nm_saida->saida("    var rs =$.ajax({\r\n");
$nm_saida->saida("                type: \"POST\",\r\n");
$nm_saida->saida("                url: 'index.php?script_case_init=" . $this->Ini->sc_page . "',\r\n");
$nm_saida->saida("                async: true,\r\n");
$nm_saida->saida("                data: 'nmgp_opcao=ajax_check_file&AjaxCheckImg=' + img_name +'&rsargs='+ field + '&p='+ p + '&p_cache='+ p_cache,\r\n");
$nm_saida->saida("            }).done(function (rs) {\r\n");
$nm_saida->saida("                    if(rs.indexOf('</span>') != -1){\r\n");
$nm_saida->saida("                        rs = rs.substr(rs.indexOf('</span>')  + 7);\r\n");
$nm_saida->saida("                    }\r\n");
$nm_saida->saida("                    if (rs != 0) {\r\n");
$nm_saida->saida("                        rs = rs.trim();\r\n");
$nm_saida->saida("                        rs_split = rs.split('_@@NM@@_');\r\n");
$nm_saida->saida("                        rs_orig = rs_split[0];\r\n");
$nm_saida->saida("                        rs = rs_split[1];\r\n");
$nm_saida->saida("                        if($('#id_sc_field_'+ field +'_'+i+'  > a > img').length != 0){\r\n");
$nm_saida->saida("                            $('#id_sc_field_'+ field +'_'+i+'  > a > img').attr('src', rs);\r\n");
$nm_saida->saida("                            $('#id_sc_field_'+ field +'_'+i+'> img').attr('src', rs);\r\n");
$nm_saida->saida("                            var __tmp = $('#id_sc_field_'+ field +'_'+i+'  > a').attr('href').split(\"',\")\r\n");
$nm_saida->saida("                            __tmp[0] = \"javascript:nm_mostra_img('\" + rs_orig;\r\n");
$nm_saida->saida("                            $('#id_sc_field_'+ field +'_'+i+'  > a').attr('href',__tmp.join(\"',\"));\r\n");
$nm_saida->saida("                        }else{\r\n");
$nm_saida->saida("                            if($('#id_sc_field_'+ field +'_'+i+' > a').length > 0 && ($('#id_sc_field_'+ field +'_'+i+' > a').attr('href')).indexOf('@SC_par@') != -1){\r\n");
$nm_saida->saida("                                var __file_doc = $('#id_sc_field_'+ field +'_'+i+' > a').attr('href').split('@SC_par@');\r\n");
$nm_saida->saida("                                var ___file_doc = __file_doc[3].split(\"'\");\r\n");
$nm_saida->saida("                                ___file_doc[0] = rs;\r\n");
$nm_saida->saida("                                __file_doc[3] = ___file_doc.join(\"'\");\r\n");
$nm_saida->saida("                                $('#id_sc_field_'+ field +'_'+i+'  > a').attr('href', __file_doc.join('@SC_par@') );\r\n");
$nm_saida->saida("                            }\r\n");
$nm_saida->saida("                            else{\r\n");
$nm_saida->saida("                                if($('#id_sc_field_'+field+'_'+i+' > span > a').length > 0){\r\n");
$nm_saida->saida("                                    var __tmp = $('#id_sc_field_'+field+'_'+i+' > span > a').attr('href').split(\"',\");\r\n");
$nm_saida->saida("                                    if(__tmp[0].indexOf('nm_mostra_img') != -1){\r\n");
$nm_saida->saida("                                        __tmp[0] = \"javascript:nm_mostra_img('\" + rs_orig;\r\n");
$nm_saida->saida("                                    } else{\r\n");
$nm_saida->saida("                                        var __file_doc = __tmp[0].split('@SC_par@');\r\n");
$nm_saida->saida("                                        var ___file_doc = __file_doc[3].split(\"'\");\r\n");
$nm_saida->saida("                                        ___file_doc[0] = rs;\r\n");
$nm_saida->saida("                                        __file_doc[3] = ___file_doc.join(\"'\");\r\n");
$nm_saida->saida("                                        __tmp[0] = __file_doc.join('@SC_par@');\r\n");
$nm_saida->saida("                                        $('#id_sc_field_'+field+'_'+i+' > span > a').attr('href', __tmp.join(\"',\"));\r\n");
$nm_saida->saida("                                        //__tmp[1] = \"'\"+rs_orig+\"')\";\r\n");
$nm_saida->saida("                                    }\r\n");
$nm_saida->saida("                                    $('#id_sc_field_'+field+'_'+i+' > span > a').attr('href',__tmp.join(\"',\"));\r\n");
$nm_saida->saida("                                }\r\n");
$nm_saida->saida("                                $('#id_sc_field_'+ field +'_'+i+' > img').attr('src', rs);\r\n");
$nm_saida->saida("                                $('#id_sc_field_'+ field +'_'+i+' > a > img').attr('src', rs);\r\n");
$nm_saida->saida("                                $('#id_sc_field_'+ field +'_'+i+' > span > a > img').attr('src', rs);\r\n");
$nm_saida->saida("                            }\r\n");
$nm_saida->saida("                        }\r\n");
$nm_saida->saida("                    }\r\n");
$nm_saida->saida("                });\r\n");
$nm_saida->saida("    });\r\n");
$nm_saida->saida("}\r\n");
           $nm_saida->saida("   function scBtnOrderCamposShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("     if ($(\"#sc_id_order_campos_placeholder_\" + sPos).css('display') != 'none') {\r\n");
           if ($_SESSION['scriptcase']['proc_mobile']) { 
               $nm_saida->saida("         //return;\r\n");
           }
           else {
               $nm_saida->saida("         scBtnOrderCamposHide(sPos);\r\n");
               $nm_saida->saida("         $(\"#ordcmp_\" + sPos).removeClass(\"selected\");\r\n");
               $nm_saida->saida("         return;\r\n");
           }
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"GET\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: sUrl\r\n");
           $nm_saida->saida("     }).done(function(data) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_order_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("       $(\"#sc_id_order_campos_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("       $(\"#sc_id_order_campos_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnOrderCamposHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_order_campos_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_order_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnGrpShow(sGroup) {\r\n");
           $nm_saida->saida("     if (typeof(scBtnGrpShowMobile) === typeof(function(){})) { return scBtnGrpShowMobile(sGroup); };\r\n");
           $nm_saida->saida("     $('#sc_btgp_btn_' + sGroup).addClass('selected');\r\n");
           $nm_saida->saida("     var btnPos = $('#sc_btgp_btn_' + sGroup).offset();\r\n");
           $nm_saida->saida("     scBtnGrpStatus[sGroup] = 'open';\r\n");
           $nm_saida->saida("     $('#sc_btgp_btn_' + sGroup).mouseout(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = '';\r\n");
           $nm_saida->saida("       setTimeout(function() {\r\n");
           $nm_saida->saida("         scBtnGrpHide(sGroup, false);\r\n");
           $nm_saida->saida("       }, 1000);\r\n");
           $nm_saida->saida("     }).mouseover(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = 'over';\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     $('#sc_btgp_div_' + sGroup + ' span a').click(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = 'out';\r\n");
           $nm_saida->saida("       scBtnGrpHide(sGroup, false);\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     $('#sc_btgp_div_' + sGroup).css({\r\n");
           $nm_saida->saida("       'left': btnPos.left\r\n");
           $nm_saida->saida("     })\r\n");
           $nm_saida->saida("     .mouseover(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = 'over';\r\n");
           $nm_saida->saida("     })\r\n");
           $nm_saida->saida("     .mouseleave(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = 'out';\r\n");
           $nm_saida->saida("       setTimeout(function() {\r\n");
           $nm_saida->saida("         scBtnGrpHide(sGroup, false);\r\n");
           $nm_saida->saida("       }, 1000);\r\n");
           $nm_saida->saida("     })\r\n");
           $nm_saida->saida("     .show('fast');\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnGrpHide(sGroup, bForce) {\r\n");
           $nm_saida->saida("     if (bForce || 'over' != scBtnGrpStatus[sGroup]) {\r\n");
           $nm_saida->saida("       $('#sc_btgp_div_' + sGroup).hide('fast');\r\n");
           $nm_saida->saida("       $('#sc_btgp_btn_' + sGroup).removeClass('selected');\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   </script> \r\n");
       } 
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['num_css']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['num_css'] = rand(0, 1000);
       }
       $write_css = true;
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] && !$this->Print_All && $this->NM_opcao != "print" && $this->NM_opcao != "pdf")
       {
           $write_css = false;
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_pdf']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_pdf'])
       {
           $write_css = true;
       }
       if ($write_css) {$NM_css = @fopen($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_grid_dbo_view_resumo_servico_por_profissional_especialidade_grid_' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['num_css'] . '.css', 'w');}
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'])
       {
           $this->NM_field_over  = 0;
           $this->NM_field_click = 0;
           $Css_sub_cons = array();
           if (($this->NM_opcao == "print" && $GLOBALS['nmgp_cor_print'] == "PB") || ($this->NM_opcao == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb") || ($_SESSION['scriptcase']['contr_link_emb'] == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb")) 
           { 
               $NM_css_file = $this->Ini->str_schema_all . "_grid_bw.css";
               $NM_css_dir  = $this->Ini->str_schema_all . "_grid_bw" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
               if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw'])) 
               { 
                   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw'] as $Apl => $Css_apl)
                   {
                       $Css_sub_cons[] = $Css_apl;
                       $Css_sub_cons[] = str_replace(".css", $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css", $Css_apl);
                   }
               } 
           } 
           else 
           { 
               $NM_css_file = $this->Ini->str_schema_all . "_grid.css";
               $NM_css_dir  = $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
               if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css'])) 
               { 
                   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css'] as $Apl => $Css_apl)
                   {
                       $Css_sub_cons[] = $Css_apl;
                       $Css_sub_cons[] = str_replace(".css", $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css", $Css_apl);
                   }
               } 
           } 
           if (is_file($this->Ini->path_css . $NM_css_file))
           {
               $NM_css_attr = file($this->Ini->path_css . $NM_css_file);
               foreach ($NM_css_attr as $NM_line_css)
               {
                   if (substr(trim($NM_line_css), 0, 16) == ".scGridFieldOver" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_over = 1;
                   }
                   if (substr(trim($NM_line_css), 0, 17) == ".scGridFieldClick" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_click = 1;
                   }
                   $NM_line_css = str_replace("../../img", $this->Ini->path_imag_cab  , $NM_line_css);
                   if ($write_css) {@fwrite($NM_css, "    " .  $NM_line_css . "\r\n");}
               }
           }
           if (is_file($this->Ini->path_css . $NM_css_dir))
           {
               $NM_css_attr = file($this->Ini->path_css . $NM_css_dir);
               foreach ($NM_css_attr as $NM_line_css)
               {
                   if (substr(trim($NM_line_css), 0, 16) == ".scGridFieldOver" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_over = 1;
                   }
                   if (substr(trim($NM_line_css), 0, 17) == ".scGridFieldClick" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_click = 1;
                   }
                   $NM_line_css = str_replace("../../img", $this->Ini->path_imag_cab  , $NM_line_css);
                   if ($write_css) {@fwrite($NM_css, "    " .  $NM_line_css . "\r\n");}
               }
           }
           if (!empty($Css_sub_cons))
           {
               $Css_sub_cons = array_unique($Css_sub_cons);
               foreach ($Css_sub_cons as $Cada_css_sub)
               {
                   if (is_file($this->Ini->path_css . $Cada_css_sub))
                   {
                       $compl_css = str_replace(".", "_", $Cada_css_sub);
                       $temp_css  = explode("/", $compl_css);
                       if (isset($temp_css[1])) { $compl_css = $temp_css[1];}
                       $NM_css_attr = file($this->Ini->path_css . $Cada_css_sub);
                       foreach ($NM_css_attr as $NM_line_css)
                       {
                           $NM_line_css = str_replace("../../img", $this->Ini->path_imag_cab  , $NM_line_css);
                           if ($write_css) {@fwrite($NM_css, "    ." .  $compl_css . "_" . substr(trim($NM_line_css), 1) . "\r\n");}
                       }
                   }
               }
           }
       }
       if ($write_css) {@fclose($NM_css);}
           $this->NM_css_val_embed .= "win";
           $this->NM_css_ajx_embed .= "ult_set";
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
 { 
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->str_google_fonts . "\" />\r\n");
 } 
       if (!$write_css)
       {
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_grid.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_tab.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_tab" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
       }
       elseif ($this->NM_opcao == "print" || $this->Print_All)
       {
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
           $NM_css = file($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_grid_dbo_view_resumo_servico_por_profissional_especialidade_grid_' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['num_css'] . '.css');
           foreach ($NM_css as $cada_css)
           {
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
           }
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("  </style>\r\n");
       }
       else
       {
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_imag_temp . "/sc_css_grid_dbo_view_resumo_servico_por_profissional_especialidade_grid_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['num_css'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
       }
       $str_iframe_body = ($this->aba_iframe) ? 'marginwidth="0px" marginheight="0px" topmargin="0px" leftmargin="0px"' : '';
       $nm_saida->saida("  <style type=\"text/css\">\r\n");
       $nm_saida->saida("  </style>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_btngrp.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_btngrp" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
       if (!$write_css)
       {
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_grid_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css\" />\r\n");
       }
       else
       {
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
           $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
           foreach ($NM_css as $cada_css)
           {
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
           }
  if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf_vert'])
  {
   $nm_saida->saida("      thead { display: table-header-group !important; }\r\n");
   $nm_saida->saida("      tfoot { display: table-row-group !important; }\r\n");
   $nm_saida->saida("      table td, table tr, td, tr, table { page-break-inside: avoid !important; }\r\n");
   $nm_saida->saida("      #summary_body > td { padding: 0px !important; }\r\n");
  }
           $nm_saida->saida("  </style>\r\n");
       }
       $nm_saida->saida("  </HEAD>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] && $this->Ini->nm_ger_css_emb)
   {
       $this->Ini->nm_ger_css_emb = false;
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
       $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
       foreach ($NM_css as $cada_css)
       {
           $cada_css = ".grid_dbo_view_resumo_servico_por_profissional_especialidade_" . substr($cada_css, 1);
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
       }
           $nm_saida->saida("  </style>\r\n");
   }
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'])
   { 
       if (!$this->Ini->Export_html_zip && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['doc_word'] && ($this->Print_All || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao_print'] == "print")) 
       {
           if ($this->Print_All) 
           {
               $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" /> \r\n");
           }
           $nm_saida->saida("  <body id=\"grid_horizontal\" class=\"" . $this->css_scGridPage . "\" " . $str_iframe_body . " style=\"-webkit-print-color-adjust: exact;" . $css_body . "\">\r\n");
           $nm_saida->saida("   <TABLE id=\"sc_table_print\" cellspacing=0 cellpadding=0 align=\"center\" valign=\"top\" " . $this->Tab_width . ">\r\n");
           $nm_saida->saida("     <TR>\r\n");
           $nm_saida->saida("       <TD>\r\n");
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "prit_web_page()", "prit_web_page()", "Bprint_print", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $nm_saida->saida("           $Cod_Btn \r\n");
           $nm_saida->saida("       </TD>\r\n");
           $nm_saida->saida("     </TR>\r\n");
           $nm_saida->saida("   </TABLE>\r\n");
           $nm_saida->saida("  <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery-3.6.0.min.js\"></script>\r\n");
           $nm_saida->saida("  <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("     $(\"#Bprint_print\").addClass(\"disabled\").prop(\"disabled\", true);\r\n");
           $nm_saida->saida("     $(function() {\r\n");
           $nm_saida->saida("         $(\"#Bprint_print\").removeClass(\"disabled\").prop(\"disabled\", false);\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     function prit_web_page()\r\n");
           $nm_saida->saida("     {\r\n");
           $nm_saida->saida("        if ($(\"#Bprint_print\").prop(\"disabled\")) {\r\n");
           $nm_saida->saida("            return;\r\n");
           $nm_saida->saida("        }\r\n");
           $nm_saida->saida("        document.getElementById('sc_table_print').style.display = 'none';\r\n");
           $nm_saida->saida("        var is_safari = navigator.userAgent.indexOf(\"Safari\") > -1;\r\n");
           $nm_saida->saida("        var is_chrome = navigator.userAgent.indexOf('Chrome') > -1\r\n");
           $nm_saida->saida("        if ((is_chrome) && (is_safari)) {is_safari=false;}\r\n");
           $nm_saida->saida("        window.print();\r\n");
           $nm_saida->saida("        if (is_safari) {setTimeout(\"window.close()\", 1000);} else {window.close();}\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("  </script>\r\n");
       }
       else
       {
          $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
          $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
          $vertical_center = '';
           $nm_saida->saida("  <body id=\"grid_horizontal\" class=\"" . $this->css_scGridPage . "\" " . $str_iframe_body . " style=\"" . $remove_margin . $vertical_center . $css_body . "\">\r\n");
       }
       $nm_saida->saida("  " . $this->Ini->Ajax_result_set . "\r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf" && !$this->Print_All)
       { 
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "berrm_clse", "nmAjaxHideDebug()", "nmAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $nm_saida->saida("<div id=\"id_debug_window\" style=\"display: none;\" class='scDebugWindow'><table class=\"scFormMessageTable\">\r\n");
           $nm_saida->saida("<tr><td class=\"scFormMessageTitle\">" . $Cod_Btn . "&nbsp;&nbsp;Output</td></tr>\r\n");
           $nm_saida->saida("<tr><td class=\"scFormMessageMessage\" style=\"padding: 0px; vertical-align: top\"><div style=\"padding: 2px; height: 200px; width: 350px; overflow: auto\" id=\"id_debug_text\"></div></td></tr>\r\n");
           $nm_saida->saida("</table></div>\r\n");
       } 
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] == "pdf" && !$this->Print_All)
       { 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Ind_Groupby'] == "sc_free_group_by")
           {
                   $groupByLabel = sprintf("Especialidade", "descricao_especialidade");
               $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">{$groupByLabel}</H1></div>\r\n");
           }
       } 
       $this->Tab_align  = "center";
       $this->Tab_valign = "top";
       $this->Tab_width = "";
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'])
       { 
           $this->form_navegacao();
           if ($NM_run_iframe != 1) {$this->check_btns();}
       } 
       $nm_saida->saida("   <TABLE id=\"main_table_grid\" cellspacing=0 cellpadding=0 align=\"" . $this->Tab_align . "\" valign=\"" . $this->Tab_valign . "\" " . $this->Tab_width . ">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf_vert'])
   {
   }
   else
   {
       $nm_saida->saida("     <TR>\r\n");
       $nm_saida->saida("       <TD>\r\n");
       $nm_saida->saida("       <div class=\"scGridBorder\" style=\"" . (isset($remove_border) ? $remove_border : '') . "\">\r\n");
       $nm_saida->saida("       <TABLE width='100%' cellspacing=0 cellpadding=0>\r\n");
   }
   }  
 }  
 function NM_cor_embutida()
 {  
   $compl_css = "";
   include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'])
   {
       $this->NM_css_val_embed = "sznmxizkjnvl";
       $this->NM_css_ajx_embed = "Ajax_res";
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_herda_css'] == "N")
   {
       if (($this->NM_opcao == "print" && $GLOBALS['nmgp_cor_print'] == "PB") || ($this->NM_opcao == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb") || ($_SESSION['scriptcase']['contr_link_emb'] == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb")) 
       { 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']['grid_dbo_view_resumo_servico_por_profissional_especialidade']))
           {
               $compl_css = str_replace(".", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']['grid_dbo_view_resumo_servico_por_profissional_especialidade']) . "_";
           } 
       } 
       else 
       { 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']['grid_dbo_view_resumo_servico_por_profissional_especialidade']))
           {
               $compl_css = str_replace(".", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']['grid_dbo_view_resumo_servico_por_profissional_especialidade']) . "_";
           } 
       }
   }
   $temp_css  = explode("/", $compl_css);
   if (isset($temp_css[1])) { $compl_css = $temp_css[1];}
   $this->css_scGridPage           = $compl_css . "scGridPage";
   $this->css_scGridPageLink       = $compl_css . "scGridPageLink";
   $this->css_scGridToolbar        = $compl_css . "scGridToolbar";
   $this->css_scGridToolbarPadd    = $compl_css . "scGridToolbarPadding";
   $this->css_css_toolbar_obj      = $compl_css . "css_toolbar_obj";
   $this->css_scGridHeader         = $compl_css . "scGridHeader";
   $this->css_scGridHeaderFont     = $compl_css . "scGridHeaderFont";
   $this->css_scGridFooter         = $compl_css . "scGridFooter";
   $this->css_scGridFooterFont     = $compl_css . "scGridFooterFont";
   $this->css_scGridBlock          = $compl_css . "scGridBlock";
   $this->css_scGridBlockFont      = $compl_css . "scGridBlockFont";
   $this->css_scGridBlockAlign     = $compl_css . "scGridBlockAlign";
   $this->css_scGridTotal          = $compl_css . "scGridTotal";
   $this->css_scGridTotalFont      = $compl_css . "scGridTotalFont";
   $this->css_scGridSubtotal       = $compl_css . "scGridSubtotal";
   $this->css_scGridSubtotalFont   = $compl_css . "scGridSubtotalFont";
   $this->css_scGridFieldEven      = $compl_css . "scGridFieldEven";
   $this->css_scGridFieldEvenFont  = $compl_css . "scGridFieldEvenFont";
   $this->css_scGridFieldEvenVert  = $compl_css . "scGridFieldEvenVert";
   $this->css_scGridFieldEvenLink  = $compl_css . "scGridFieldEvenLink";
   $this->css_scGridFieldOdd       = $compl_css . "scGridFieldOdd";
   $this->css_scGridFieldOddFont   = $compl_css . "scGridFieldOddFont";
   $this->css_scGridFieldOddVert   = $compl_css . "scGridFieldOddVert";
   $this->css_scGridFieldOddLink   = $compl_css . "scGridFieldOddLink";
   $this->css_scGridFieldClick     = $compl_css . "scGridFieldClick";
   $this->css_scGridFieldOver      = $compl_css . "scGridFieldOver";
   $this->css_scGridLabel          = $compl_css . "scGridLabel";
   $this->css_scGridLabelVert      = $compl_css . "scGridLabelVert";
   $this->css_scGridLabelFont      = $compl_css . "scGridLabelFont";
   $this->css_scGridLabelLink      = $compl_css . "scGridLabelLink";
   $this->css_scGridTabela         = $compl_css . "scGridTabela";
   $this->css_scGridTabelaTd       = $compl_css . "scGridTabelaTd";
   $this->css_scGridBlockBg        = $compl_css . "scGridBlockBg";
   $this->css_scGridBlockLineBg    = $compl_css . "scGridBlockLineBg";
   $this->css_scGridBlockSpaceBg   = $compl_css . "scGridBlockSpaceBg";
   $this->css_scGridLabelNowrap    = "";
   $this->css_scAppDivMoldura      = $compl_css . "scAppDivMoldura";
   $this->css_scAppDivHeader       = $compl_css . "scAppDivHeader";
   $this->css_scAppDivHeaderText   = $compl_css . "scAppDivHeaderText";
   $this->css_scAppDivContent      = $compl_css . "scAppDivContent";
   $this->css_scAppDivContentText  = $compl_css . "scAppDivContentText";
   $this->css_scAppDivToolbar      = $compl_css . "scAppDivToolbar";
   $this->css_scAppDivToolbarInput = $compl_css . "scAppDivToolbarInput";
   $this->css_inherit_bg           = "scInheritBg";

   $compl_css_emb = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida']) ? "grid_dbo_view_resumo_servico_por_profissional_especialidade_" : "";
   $this->css_sep = " ";
   $this->css_mes_ano_label = $compl_css_emb . "css_mes_ano_label";
   $this->css_mes_ano_grid_line = $compl_css_emb . "css_mes_ano_grid_line";
   $this->css_nome_razao_social_label = $compl_css_emb . "css_nome_razao_social_label";
   $this->css_nome_razao_social_grid_line = $compl_css_emb . "css_nome_razao_social_grid_line";
   $this->css_contratos_label = $compl_css_emb . "css_contratos_label";
   $this->css_contratos_grid_line = $compl_css_emb . "css_contratos_grid_line";
   $this->css_profissional_label = $compl_css_emb . "css_profissional_label";
   $this->css_profissional_grid_line = $compl_css_emb . "css_profissional_grid_line";
   $this->css_atividade_label = $compl_css_emb . "css_atividade_label";
   $this->css_atividade_grid_line = $compl_css_emb . "css_atividade_grid_line";
   $this->css_descricao_especialidade_label = $compl_css_emb . "css_descricao_especialidade_label";
   $this->css_descricao_especialidade_grid_line = $compl_css_emb . "css_descricao_especialidade_grid_line";
   $this->css_descricao_servico_label = $compl_css_emb . "css_descricao_servico_label";
   $this->css_descricao_servico_grid_line = $compl_css_emb . "css_descricao_servico_grid_line";
   $this->css_quantidade_label = $compl_css_emb . "css_quantidade_label";
   $this->css_quantidade_grid_line = $compl_css_emb . "css_quantidade_grid_line";
   $this->css_total_servico_label = $compl_css_emb . "css_total_servico_label";
   $this->css_total_servico_grid_line = $compl_css_emb . "css_total_servico_grid_line";
 }  
 function cabecalho()
 {
     if($_SESSION['scriptcase']['proc_mobile'] && method_exists($this, 'cabecalho_mobile'))
     {
         $this->cabecalho_mobile();
     }
     else if(method_exists($this, 'cabecalho_normal'))
     {
         $this->cabecalho_normal();
     }
 }
// 
//----- 
 function cabecalho_normal()
 {
   global
          $nm_saida;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['dashboard_info']['maximized'])
   {
       return; 
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_liga']['cab']))
   {
       return; 
   }
   $nm_cab_filtro   = ""; 
   $nm_cab_filtrobr = ""; 
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
   $this->sc_proc_grid = false; 
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_pesq_filtro'];
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['cond_pesq']))
   {  
       $pos       = 0;
       $trab_pos  = false;
       $pos_tmp   = true; 
       $tmp       = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['cond_pesq'];
       while ($pos_tmp)
       {
          $pos = strpos($tmp, "##*@@", $pos);
          if ($pos !== false)
          {
              $trab_pos = $pos;
              $pos += 4;
          }
          else
          {
              $pos_tmp = false;
          }
       }
       $nm_cond_filtro_or  = (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['cond_pesq'], $trab_pos + 5) == "or")  ? " " . trim($this->Ini->Nm_lang['lang_srch_orr_cond']) . " " : "";
       $nm_cond_filtro_and = (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['cond_pesq'], $trab_pos + 5) == "and") ? " " . trim($this->Ini->Nm_lang['lang_srch_and_cond']) . " " : "";
       $nm_cab_filtro   = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['cond_pesq'], 0, $trab_pos);
       $nm_cab_filtrobr = str_replace("##*@@", ", " . $nm_cond_filtro_or . $nm_cond_filtro_and . "<br />", $nm_cab_filtro);
       $pos       = 0;
       $trab_pos  = false;
       $pos_tmp   = true; 
       $tmp       = $nm_cab_filtro;
       while ($pos_tmp)
       {
          $pos = strpos($tmp, "##*@@", $pos);
          if ($pos !== false)
          {
              $trab_pos = $pos;
              $pos += 4;
          }
          else
          {
              $pos_tmp = false;
          }
       }
       if ($trab_pos === false)
       {
       }
       else  
       {  
          $nm_cab_filtro = substr($nm_cab_filtro, 0, $trab_pos) . " " .  $nm_cond_filtro_or . $nm_cond_filtro_and . substr($nm_cab_filtro, $trab_pos + 5);
          $nm_cab_filtro = str_replace("##*@@", ", " . $nm_cond_filtro_or . $nm_cond_filtro_and, $nm_cab_filtro);
       }   
   }   
   $this->nm_data->SetaData(date("Y/m/d H:i:s"), "YYYY/MM/DD HH:II:SS"); 
   $nm_saida->saida(" <TR id=\"sc_grid_head\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf")
   { 
       $nm_saida->saida("  <TD class=\"" . $this->css_scGridTabelaTd . " " . $this->css_scGridPage . "\" style=\"vertical-align: top\">\r\n");
   } 
   else 
   { 
     if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf']) 
     { 
         $this->NM_calc_span();
           $nm_saida->saida("   <TD colspan=\"" . $this->NM_colspan . "\" class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\">\r\n");
     } 
     else if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf_vert']) 
     {
         if($this->Tem_tab_vert)
         {
           $nm_saida->saida("   <TD colspan=\"2\" class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\">\r\n");
         }
         else{
           $nm_saida->saida("   <TD class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\">\r\n");
         }
     }
     else{
           $nm_saida->saida("  <TD class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\">\r\n");
     }
   } 
   $nm_saida->saida("<style>\r\n");
   $nm_saida->saida("    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}\r\n");
   $nm_saida->saida("</style>\r\n");
   $nm_saida->saida("<div class=\"" . $this->css_scGridHeader . "\" style=\"height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;\">\r\n");
   $nm_saida->saida("    <div class=\"" . $this->css_scGridHeaderFont . "\" style=\"float: left; text-transform: uppercase;\">Resumo</div>\r\n");
   $nm_saida->saida("    <div class=\"" . $this->css_scGridHeaderFont . "\" style=\"float: right;\">" . "" . $_SESSION['usr_cab'] . "" . "</div>\r\n");
   $nm_saida->saida("</div>\r\n");
   $nm_saida->saida("  </TD>\r\n");
   $nm_saida->saida(" </TR>\r\n");
 }
// 
 function label_grid($linhas = 0)
 {
   global 
           $nm_saida;
   static $nm_seq_titulos   = 0; 
   $contr_embutida = false;
   $salva_htm_emb  = "";
   if (1 < $linhas)
   {
      $this->Lin_impressas++;
   }
   $nm_seq_titulos++; 
   $tmp_header_row = $nm_seq_titulos;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['exibe_titulos'] != "S")
   { 
   } 
   else 
   { 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_label'])
      { 
          if (!isset($_SESSION['scriptcase']['saida_var']) || !$_SESSION['scriptcase']['saida_var']) 
          { 
              $_SESSION['scriptcase']['saida_var']  = true;
              $_SESSION['scriptcase']['saida_html'] = "";
              $contr_embutida = true;
          } 
          else 
          { 
              $salva_htm_emb = $_SESSION['scriptcase']['saida_html'];
              $_SESSION['scriptcase']['saida_html'] = "";
          } 
      } 
   $nm_saida->saida("    <TR id=\"tit_grid_dbo_view_resumo_servico_por_profissional_especialidade__SCCS__" . $nm_seq_titulos . "\" align=\"center\" class=\"" . $this->css_scGridLabel . " sc-ui-grid-header-row sc-ui-grid-header-row-grid_dbo_view_resumo_servico_por_profissional_especialidade-" . $tmp_header_row . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_label']) { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_total_servico_label'] . "\" >&nbsp;</TD>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_psq']) { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_total_servico_label'] . "\" >&nbsp;</TD>\r\n");
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['field_order'] as $Cada_label)
   { 
       $NM_func_lab = "NM_label_" . $Cada_label;
       $this->$NM_func_lab();
   } 
   $nm_saida->saida("</TR>\r\n");
     if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_label'])
     { 
         if (isset($_SESSION['scriptcase']['saida_var']) && $_SESSION['scriptcase']['saida_var'])
         { 
             $Cod_Html = $_SESSION['scriptcase']['saida_html'];
             $pos_tag = strpos($Cod_Html, "<TD ");
             $Cod_Html = substr($Cod_Html, $pos_tag);
             $pos      = 0;
             $pos_tag  = false;
             $pos_tmp  = true; 
             $tmp      = $Cod_Html;
             while ($pos_tmp)
             {
                $pos = strpos($tmp, "</TR>", $pos);
                if ($pos !== false)
                {
                    $pos_tag = $pos;
                    $pos += 4;
                }
                else
                {
                    $pos_tmp = false;
                }
             }
             $Cod_Html = substr($Cod_Html, 0, $pos_tag);
             $Nm_temp = explode("</TD>", $Cod_Html);
             $css_emb = "<style type=\"text/css\">";
             $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
             foreach ($NM_css as $cada_css)
             {
                 $css_emb .= ".grid_dbo_view_resumo_servico_por_profissional_especialidade_" . substr($cada_css, 1);
             }
             $css_emb .= "</style>";
             $Cod_Html = $css_emb . $Cod_Html;
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['cols_emb'] = count($Nm_temp) - 1;
             if ($contr_embutida) 
             { 
                 $_SESSION['scriptcase']['saida_var']  = false;
                 $nm_saida->saida($Cod_Html);
             } 
             else 
             { 
                 $_SESSION['scriptcase']['saida_html'] = $salva_htm_emb . $Cod_Html;
             } 
         } 
     } 
     $NM_seq_lab = 1;
     foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['labels'] as $NM_cmp => $NM_lab)
     {
         if (empty($NM_lab) || $NM_lab == "&nbsp;")
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['labels'][$NM_cmp] = "No_Label" . $NM_seq_lab;
             $NM_seq_lab++;
         }
     } 
   } 
 }
 function NM_label_mes_ano()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['mes_ano'])) ? $this->New_label['mes_ano'] : "Mes Ano"; 
   if (!isset($this->NM_cmp_hidden['mes_ano']) || $this->NM_cmp_hidden['mes_ano'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_mes_ano_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_mes_ano_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_nome_razao_social()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['nome_razao_social'])) ? $this->New_label['nome_razao_social'] : "Raz�o Social"; 
   if (!isset($this->NM_cmp_hidden['nome_razao_social']) || $this->NM_cmp_hidden['nome_razao_social'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_nome_razao_social_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_nome_razao_social_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_cmp'] == 'nome_razao_social')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('nome_razao_social')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_contratos()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['contratos'])) ? $this->New_label['contratos'] : "Contratos"; 
   if (!isset($this->NM_cmp_hidden['contratos']) || $this->NM_cmp_hidden['contratos'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_contratos_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_contratos_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_cmp'] == 'Contratos')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('Contratos')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_profissional()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['profissional'])) ? $this->New_label['profissional'] : "Profissional"; 
   if (!isset($this->NM_cmp_hidden['profissional']) || $this->NM_cmp_hidden['profissional'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_profissional_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_profissional_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_cmp'] == 'Profissional')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('Profissional')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_atividade()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['atividade'])) ? $this->New_label['atividade'] : "Atividade"; 
   if (!isset($this->NM_cmp_hidden['atividade']) || $this->NM_cmp_hidden['atividade'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_atividade_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_atividade_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_cmp'] == 'Atividade')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('Atividade')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_descricao_especialidade()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['descricao_especialidade'])) ? $this->New_label['descricao_especialidade'] : "Especialidade"; 
   if (!isset($this->NM_cmp_hidden['descricao_especialidade']) || $this->NM_cmp_hidden['descricao_especialidade'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_descricao_especialidade_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_descricao_especialidade_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_cmp'] == 'descricao_especialidade')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('descricao_especialidade')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_descricao_servico()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['descricao_servico'])) ? $this->New_label['descricao_servico'] : "Servi�o"; 
   if (!isset($this->NM_cmp_hidden['descricao_servico']) || $this->NM_cmp_hidden['descricao_servico'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_descricao_servico_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_descricao_servico_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_quantidade()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['quantidade'])) ? $this->New_label['quantidade'] : "Quantidade"; 
   if (!isset($this->NM_cmp_hidden['quantidade']) || $this->NM_cmp_hidden['quantidade'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_quantidade_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_quantidade_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_total_servico()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['total_servico'])) ? $this->New_label['total_servico'] : "Total Servi�o"; 
   if (!isset($this->NM_cmp_hidden['total_servico']) || $this->NM_cmp_hidden['total_servico'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_total_servico_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_total_servico_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida;
   $fecha_tr               = "</tr>";
   $this->Ini->qual_linha  = "par";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['rows_emb'] = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ini_cor_grid']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ini_cor_grid'] == "impar")
       {
           $this->Ini->qual_linha = "impar";
           unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ini_cor_grid']);
       }
   }
   static $nm_seq_execucoes = 0; 
   static $nm_seq_titulos   = 0; 
   $this->SC_ancora = "";
   $this->Rows_span = 1;
   $nm_seq_execucoes++; 
   $nm_seq_titulos++; 
   $this->nm_prim_linha  = true; 
   $this->Ini->nm_cont_lin = 0; 
   $this->sc_where_orig    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_orig'];
   $this->sc_where_atual   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_pesq'];
   $this->sc_where_filtro  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_pesq_filtro'];
// 
   $SC_Label = (isset($this->New_label['mes_ano'])) ? $this->New_label['mes_ano'] : "Mes Ano"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['labels']['mes_ano'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['nome_razao_social'])) ? $this->New_label['nome_razao_social'] : "Raz�o Social"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['labels']['nome_razao_social'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['contratos'])) ? $this->New_label['contratos'] : "Contratos"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['labels']['contratos'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['profissional'])) ? $this->New_label['profissional'] : "Profissional"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['labels']['profissional'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['atividade'])) ? $this->New_label['atividade'] : "Atividade"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['labels']['atividade'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['descricao_especialidade'])) ? $this->New_label['descricao_especialidade'] : "Especialidade"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['labels']['descricao_especialidade'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['descricao_servico'])) ? $this->New_label['descricao_servico'] : "Servi�o"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['labels']['descricao_servico'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['quantidade'])) ? $this->New_label['quantidade'] : "Quantidade"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['labels']['quantidade'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['total_servico'])) ? $this->New_label['total_servico'] : "Total Servi�o"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['labels']['total_servico'] = $SC_Label; 
   if (!$this->grid_emb_form && isset($_SESSION['scriptcase']['sc_apl_conf']['grid_dbo_view_resumo_servico_por_profissional_especialidade']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_dbo_view_resumo_servico_por_profissional_especialidade']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_dbo_view_resumo_servico_por_profissional_especialidade']['lig_edit'];
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'])
       {
           $this->Lin_impressas++;
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_grid'])
           {
               if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['cols_emb']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['cols_emb']))
               {
                   $cont_col = 0;
                   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['field_order'] as $cada_field)
                   {
                       $cont_col++;
                   }
                   $NM_span_sem_reg = $cont_col - 1;
               }
               else
               {
                   $NM_span_sem_reg  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['cols_emb'];
               }
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['rows_emb']++;
               $nm_saida->saida("  <TR> <TD class=\"" . $this->css_scGridTabelaTd . " " . "\" colspan = \"$NM_span_sem_reg\" align=\"center\" style=\"vertical-align: top;font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;\">\r\n");
               $nm_saida->saida("     " . $this->nm_grid_sem_reg . "</TD> </TR>\r\n");
               $nm_saida->saida("##NM@@\r\n");
               $this->rs_grid->Close();
           }
           else
           {
               $nm_saida->saida("<table id=\"apl_grid_dbo_view_resumo_servico_por_profissional_especialidade#?#$nm_seq_execucoes\" width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\">\r\n");
               $nm_saida->saida("  <tr><td class=\"" . $this->css_scGridTabelaTd . " " . "\" style=\"font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\">\r\n");
               $nm_id_aplicacao = "";
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['cab_embutida'] != "S")
               {
                   $this->label_grid($linhas);
               }
               $this->NM_calc_span();
               $nm_saida->saida("  <tr><td class=\"" . $this->css_scGridFieldOdd . "\"  style=\"padding: 0px; font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;\" colspan = \"" . $this->NM_colspan . "\" align=\"center\">\r\n");
               $nm_saida->saida("     " . $this->nm_grid_sem_reg . "\r\n");
               $nm_saida->saida("  </td></tr>\r\n");
               $nm_saida->saida("  </table></td></tr></table>\r\n");
               $this->Lin_final = $this->rs_grid->EOF;
               if ($this->Lin_final)
               {
                   $this->rs_grid->Close();
               }
           }
       }
       else
       {
           $nm_saida->saida("  <td " . $this->Grid_body . " class=\"" . $this->css_scGridTabelaTd . " " . $this->css_scGridFieldOdd . "\" align=\"center\" style=\"vertical-align: top;font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;\">\r\n");
           $nm_saida->saida("  " . $this->nm_grid_sem_reg . "\r\n");
           $nm_saida->saida("  </td></tr>\r\n");
       }
       return;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'])
   { 
       $nm_saida->saida("<table id=\"apl_grid_dbo_view_resumo_servico_por_profissional_especialidade#?#$nm_seq_execucoes\" width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\">\r\n");
       $nm_saida->saida(" <TR> \r\n");
       $nm_id_aplicacao = "";
   } 
   else 
   { 
if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'])
{
}
else
{
       $nm_saida->saida("    <TR> \r\n");
}
       $nm_id_aplicacao = " id=\"apl_grid_dbo_view_resumo_servico_por_profissional_especialidade#?#1\"";
   } 
   $TD_padding = (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] == "pdf") ? "padding: 0px !important;" : "";
if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf_vert'])
{
}
else
{
   $nm_saida->saida("  <TD " . $this->Grid_body . " class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top;text-align: center;" . $TD_padding . "\">\r\n");
}
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_psq'])
   { 
       $nm_saida->saida("        <div id=\"div_FBtn_Run\" style=\"display: none\"> \r\n");
       $nm_saida->saida("        <form name=\"Fpesq\" method=post>\r\n");
       $nm_saida->saida("         <input type=hidden name=\"nm_ret_psq\"> \r\n");
       $nm_saida->saida("        </div> \r\n");
   } 
if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf']) { 
    if ($this->pdf_all_cab != "S") {
        $this->cabecalho();
    }
    $nm_saida->saida("              <thead>\r\n");
    if ($this->pdf_all_cab == "S") {
        $this->cabecalho();
    }
    if ($this->pdf_all_label == "S") {
        $this->label_grid();
    }
}
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf']) { 
 }else { 
   $nm_saida->saida("   <TABLE class=\"" . $this->css_scGridTabela . "\" id=\"sc-ui-grid-body-7bf137f1\" align=\"center\" " . $nm_id_aplicacao . " width=\"100%\">\r\n");
 }
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf_vert']) { 
    $nm_saida->saida("</thead>\r\n");
 }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'] && $this->pdf_all_label != "S" && $this->pdf_label_group != "S") 
   { 
      $this->label_grid($linhas);
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_grid'])
   { 
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
// 
   $nm_quant_linhas = 0 ;
   $this->nm_inicio_pag = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] == "pdf")
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['final'] = 0;
   } 
   $this->nmgp_prim_pag_pdf = true;
   $this->Break_pag_pdf = array();
   $this->Break_pag_prt = array();
   $this->Break_pag_pdf['sc_free_group_by']['descricao_especialidade'] = "N";
   $this->Break_pag_prt['sc_free_group_by']['descricao_especialidade'] = "N";
   $this->Break_pag_pdf['sc_free_group_by']['profissional'] = "N";
   $this->Break_pag_prt['sc_free_group_by']['profissional'] = "N";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['Config_Page_break_PDF'] = "S";
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['Page_break_PDF']))
   {
       if (isset($this->Break_pag_pdf[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Ind_Groupby']]))
       {
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Ind_Groupby'] == "sc_free_group_by")
           {
               foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_cmp'] as $Cmp_gb => $resto)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['Page_break_PDF'][$Cmp_gb] = $this->Break_pag_pdf['sc_free_group_by'][$Cmp_gb];
               }
           }
           else
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['Page_break_PDF'] = $this->Break_pag_pdf[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Ind_Groupby']];
           }
       }
       else
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['Page_break_PDF'] = array();
       }
   }
   $this->SC_top       = array();
   $this->SC_bot       = array();
   $this->SC_bot[]     = "descricao_especialidade"; 
   $this->SC_top[]     = "descricao_especialidade"; 
   $this->SC_bot[]     = "profissional"; 
   $this->SC_top[]     = "profissional"; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Ind_Groupby'] == "sc_free_group_by") 
   {
       $Nivel_gb = 1;
       $this->Tab_Nv_tree = array();
       $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_cmp']);
       $this->Ult_qb_free = $this->Nivel_gbBot;
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_cmp'] as $cmp => $sql)
       {
           if (!isset($this->Prim_cmp_gb))
           {
               $this->Prim_cmp_gb = $cmp;
           }
           $this->Tab_Nv_tree[$cmp] = $Nivel_gb;
           $Nivel_gb++;
           if (in_array($cmp, $this->SC_top))
           {
               $tmp = "quebra_" . $cmp . "_sc_free_group_by_top";
               $this->$tmp($cmp);
           }
       }
       $this->nmgp_prim_pag_pdf = false;
   }
   $this->Ini->cor_link_dados = $this->css_scGridFieldEvenLink;
   $this->NM_flag_antigo = FALSE;
   $nm_prog_barr = 0;
   $PB_tot       = "/" . $this->count_ger;;
   while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_reg_grid'] && ($linhas == 0 || $linhas > $this->Lin_impressas)) 
   {  
          $this->Rows_span = 1;
          $this->NM_field_style = array();
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['doc_word'] && !$this->Ini->sc_export_ajax)
          {
              $nm_prog_barr++;
              $Mens_bar = $this->Ini->Nm_lang['lang_othr_prcs'];
              if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                  $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->pb->setProgressbarMessage($Mens_bar . ": " . $nm_prog_barr . $PB_tot);
              $this->pb->addSteps(1);
          }
          if ($this->Ini->Proc_print && $this->Ini->Export_html_zip  && !$this->Ini->sc_export_ajax)
          {
              $nm_prog_barr++;
              $Mens_bar = $this->Ini->Nm_lang['lang_othr_prcs'];
              if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                  $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->pb->setProgressbarMessage($Mens_bar . ": " . $nm_prog_barr . $PB_tot);
              $this->pb->addSteps(1);
          }
          //---------- Gauge ----------
          if (!$this->Ini->sc_export_ajax && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] == "pdf" && -1 < $this->progress_grid)
          {
              $this->progress_now++;
              if (0 == $this->progress_lim_now)
              {
               $lang_protect = $this->Ini->Nm_lang['lang_pdff_rows'];
               if (!NM_is_utf8($lang_protect))
               {
                   $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
                  grid_dbo_view_resumo_servico_por_profissional_especialidade_pdf_progress_call($this->progress_tot . "_#NM#_" . $this->progress_now . "_#NM#_" . $lang_protect . " " . $this->progress_now . "...\n", $this->Ini->Nm_lang);
                  fwrite($this->progress_fp, $this->progress_now . "_#NM#_" . $lang_protect . " " . $this->progress_now . "...\n");
              }
              $this->progress_lim_now++;
              if ($this->progress_lim_tot == $this->progress_lim_now)
              {
                  $this->progress_lim_now = 0;
              }
          }
          $this->Lin_impressas++;
          $this->mes_ano = $this->rs_grid->fields[0] ;  
          $this->nome_razao_social = $this->rs_grid->fields[1] ;  
          $this->contratos = $this->rs_grid->fields[2] ;  
          $this->profissional = $this->rs_grid->fields[3] ;  
          $this->atividade = $this->rs_grid->fields[4] ;  
          $this->descricao_especialidade = $this->rs_grid->fields[5] ;  
          $this->descricao_servico = $this->rs_grid->fields[6] ;  
          $this->quantidade = $this->rs_grid->fields[7] ;  
          $this->quantidade = (string)$this->quantidade;
          $this->total_servico = $this->rs_grid->fields[8] ;  
          $this->total_servico =  str_replace(",", ".", $this->total_servico);
          $this->total_servico = (string)$this->total_servico;
          if (!isset($this->descricao_especialidade)) { $this->descricao_especialidade = ""; }
          if (!isset($this->profissional)) { $this->profissional = ""; }
          $this->arg_sum_profissional = " = " . $this->Db->qstr($this->profissional);
          $this->arg_sum_descricao_especialidade = " = " . $this->Db->qstr($this->descricao_especialidade);
          $this->SC_seq_page++; 
          $this->SC_seq_register = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['final'] + 1; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['rows_emb']++;
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Ind_Groupby'] == "sc_free_group_by") 
          {  
              $SC_arg_Gby = array();
              $SC_arg_Sql = array();
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_cmp'] as $cmp => $sql)
              {
                  $Cmp_orig   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_orig'][$cmp] : $cmp;
                  $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                  $TP_Time = (in_array($Cmp_orig, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                  $SC_arg_Gby[$cmp] = $this->Ini->Get_arg_groupby($TP_Time . $this->$Cmp_orig, $Format_tst); 
              }
              $SC_lst_Gby = array();
              $gb_ok      = false;
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_cmp'] as $cmp => $sql)
              {
                  $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                  $SC_arg_Sql[$cmp] = $sql;
                  $Fun_GB  = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_orig'][$cmp] : $cmp;
                  if (!empty($Format_tst))
                  {
                      $temp = $this->$cmp;
                      if (!empty($temp))
                      {
                          $SC_arg_Sql[$cmp] = $this->Ini->Get_sql_date_groupby($sql, $Format_tst);
                      }
                  }
                  $temp = $cmp . "_Old";
                  if ($SC_arg_Gby[$cmp] != $this->$temp || $gb_ok)
                  {
                      $SC_lst_Gby[] = $cmp;
                      $gb_ok = true;
                  }
              }
              $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_cmp']);
              krsort ($SC_lst_Gby);
              foreach ($SC_lst_Gby as $Ind => $cmp)
              {
                  if (in_array($cmp, $this->SC_bot))
                  {
                      $tmp = "quebra_" . $cmp . "_sc_free_group_by_bot";
                      $this->$tmp($cmp);
                      $this->Nivel_gbBot--;
                  }
                  $sql_where = "";
                  $cmp_qb     = $this->$cmp;
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_cmp'] as $Col_Gb => $Sql)
                  {
                      $tmp        = "arg_sum_" . $Col_Gb;
                      $sql_where .= (!empty($sql_where)) ? " and " : "";
                      $sql_where .= $SC_arg_Sql[$Col_Gb] . $this->$tmp;
                      if ($Col_Gb == $cmp)
                      {
                          break;
                      }
                  }
                  $tmp  = "quebra_" . $cmp . "_sc_free_group_by";
                  $this->$tmp($cmp_qb, $sql_where, $cmp);
              }
              if (!empty($SC_lst_Gby))
              {
                  $cmp = $SC_lst_Gby[0];
                  if ($this->Print_All && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['doc_word'] && $this->Break_pag_prt[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Ind_Groupby']][$cmp] == "S")
                  {
                      $this->nm_quebra_pagina("pagina"); 
                  }
                  elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['Page_break_PDF'][$cmp] == "S")
                  {
                      $this->nm_quebra_pagina("pagina"); 
                  }
              }
              $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_cmp']);
              ksort ($SC_lst_Gby);
              foreach ($SC_lst_Gby as $Ind => $cmp)
              {
                  if (in_array($cmp, $this->SC_top))
                  {
                      $tmp = "quebra_" . $cmp . "_sc_free_group_by_top";
                      $this->$tmp($cmp);
                  }
              }
              if (!empty($SC_lst_Gby))
              {
                  $nm_houve_quebra = "S";
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_cmp'] as $cmp => $sql)
                  {
                      $Cmp_orig   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_orig'][$cmp] : $cmp;
                      $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                      $Cmp_Old   = $cmp . '_Old';
                      $TP_Time = (in_array($Cmp_orig, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                      $this->$Cmp_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->$Cmp_orig, $Format_tst); 
                  }
              }
          }  
          $this->sc_proc_grid = true;
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'])
          {
              if ($nm_houve_quebra == "S" || $this->nm_inicio_pag == 0)
              { 
                  if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_grid']) {
                      $this->label_grid($linhas);
                  } 
                  $nm_houve_quebra = "N";
              } 
          } 
          else
          {
              if ($this->pdf_label_group != "S" && $this->pdf_all_label != "S")
              {
                  if ($this->nm_inicio_pag == 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_grid'])
                  {
                      $nm_houve_quebra = "N";
                  } 
              } 
              elseif (($nm_houve_quebra == "S" || ($this->nm_inicio_pag == 0)) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_grid'])
              { 
                 if ($this->pdf_label_group == "S") 
                 {
                     if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_grid']) {
                         $this->label_grid($linhas);
                     } 
                 } 
                  $nm_houve_quebra = "N";
              } 
          } 
          $this->nm_inicio_pag++;
          if (!$this->NM_flag_antigo)
          {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['final']++ ; 
          }
          $seq_det =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['final']; 
          $this->Ini->cor_link_dados = ($this->Ini->cor_link_dados == $this->css_scGridFieldOddLink) ? $this->css_scGridFieldEvenLink : $this->css_scGridFieldOddLink; 
          $this->Ini->qual_linha   = ($this->Ini->qual_linha == "par") ? "impar" : "par";
          if ("impar" == $this->Ini->qual_linha)
          {
              $this->css_line_back = $this->css_scGridFieldOdd;
              $this->css_line_fonf = $this->css_scGridFieldOddFont;
          }
          else
          {
              $this->css_line_back = $this->css_scGridFieldEven;
              $this->css_line_fonf = $this->css_scGridFieldEvenFont;
          }
          $NM_destaque = " onmouseover=\"over_tr(this, '" . $this->css_line_back . "');\" onmouseout=\"out_tr(this, '" . $this->css_line_back . "');\" onclick=\"click_tr(this, '" . $this->css_line_back . "');\"";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] == "pdf" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_grid'])
          {
             $NM_destaque ="";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_psq'])
          {
              $temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['dado_psq_ret'];
              eval("\$teste = \$this->$temp;");
          }
          $this->SC_ancora = $this->SC_seq_page;
          $nm_saida->saida("    <TR  class=\"" . $this->css_line_back . "\"  style=\"page-break-inside: avoid;\"" . $NM_destaque . " id=\"SC_ancor" . $this->SC_ancora . "\">\r\n");
 if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_grid']){ 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\"  style=\"" . $this->Css_Cmp['css_total_servico_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\">&nbsp;</TD>\r\n");
 }
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_psq']){ 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  style=\"" . $this->Css_Cmp['css_total_servico_grid_line'] . "\" NOWRAP align=\"left\" valign=\"top\" WIDTH=\"1px\"  HEIGHT=\"0px\">\r\n");
 $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcapture", "document.Fpesq.nm_ret_psq.value='" . str_replace(array("'", '"'), array("\'", '\"'), $teste) . "'; nm_escreve_window();", "document.Fpesq.nm_ret_psq.value='" . str_replace(array("'", '"'), array("\'", '\"'), $teste) . "'; nm_escreve_window();", "", "Rad_psq", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida(" $Cod_Btn</TD>\r\n");
 } 
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['field_order'] as $Cada_col)
          { 
              $NM_func_grid = "NM_grid_" . $Cada_col;
              $this->$NM_func_grid();
          } 
          $nm_saida->saida("</TR>\r\n");
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_grid'] && $this->nm_prim_linha)
          { 
              $nm_saida->saida("##NM@@"); 
              $this->nm_prim_linha = false; 
          } 
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] == "pdf" || $this->Ini->Apl_paginacao == "FULL")
          { 
              $nm_quant_linhas = 0; 
          } 
   }  
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'])
   { 
      $this->Lin_final = $this->rs_grid->EOF;
      if ($this->Lin_final)
      {
         $this->rs_grid->Close();
      }
   } 
   else
   {
      $this->rs_grid->Close();
   }
   if (!$this->rs_grid->EOF) 
   { 
       if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
       {
           $nm_saida->saida("    </TBODY>");
       }
   } 
   if ($this->rs_grid->EOF) 
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Ind_Groupby'] == "sc_free_group_by")
       {
           $SC_lst_Gby = array();
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_cmp'] as $cmp => $sql)
           {
               $SC_lst_Gby[] = $cmp;
           }
           $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_cmp']);
           krsort ($SC_lst_Gby);
           foreach ($SC_lst_Gby as $Ind => $cmp)
           {
               if (in_array($cmp, $this->SC_bot))
               {
                   $tmp = "quebra_" . $cmp . "_sc_free_group_by_bot";
                   $this->$tmp($cmp);
                   $this->Nivel_gbBot--;
               }
           }
       }
  
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['exibe_total'] == "S")
       { 
           $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Ind_Groupby'] . "_top";
           $this->$Gb_geral() ;
           $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Ind_Groupby'] . "_bot";
           $this->$Gb_geral() ;
       } 
   }  
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_grid'])
   {
       $nm_saida->saida("X##NM@@X");
   }
   $nm_saida->saida("</TABLE>");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_psq'])
   { 
          $nm_saida->saida("       </form>\r\n");
   } 
   $nm_saida->saida("</TD>");
   $nm_saida->saida($fecha_tr);
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_grid'])
   { 
       return; 
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'])
   { 
       $_SESSION['scriptcase']['contr_link_emb'] = "";   
   } 
           $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'])
   {
       $nm_saida->saida("</TABLE>\r\n");
   }
   if ($this->Print_All) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao']       = "igual" ; 
   } 
 }
 function NM_grid_mes_ano()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['mes_ano']) || $this->NM_cmp_hidden['mes_ano'] != "off") { 
          $conteudo = sc_strip_script($this->mes_ano); 
          $conteudo_original = sc_strip_script($this->mes_ano); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          if ($conteudo !== "&nbsp;")    
          { 
              $this->nm_gera_mask($conteudo, "xx/xxxx"); 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'mes_ano', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_mes_ano_grid_line . "\"  style=\"" . $this->Css_Cmp['css_mes_ano_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_mes_ano_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_nome_razao_social()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['nome_razao_social']) || $this->NM_cmp_hidden['nome_razao_social'] != "off") { 
          $conteudo = sc_strip_script($this->nome_razao_social); 
          $conteudo_original = sc_strip_script($this->nome_razao_social); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'nome_razao_social', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_nome_razao_social_grid_line . "\"  style=\"" . $this->Css_Cmp['css_nome_razao_social_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_nome_razao_social_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_contratos()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['contratos']) || $this->NM_cmp_hidden['contratos'] != "off") { 
          $conteudo = sc_strip_script($this->contratos); 
          $conteudo_original = sc_strip_script($this->contratos); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'contratos', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_contratos_grid_line . "\"  style=\"" . $this->Css_Cmp['css_contratos_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_contratos_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_profissional()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['profissional']) || $this->NM_cmp_hidden['profissional'] != "off") { 
          $conteudo = sc_strip_script($this->profissional); 
          $conteudo_original = sc_strip_script($this->profissional); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'profissional', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_profissional_grid_line . "\"  style=\"" . $this->Css_Cmp['css_profissional_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_profissional_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_atividade()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['atividade']) || $this->NM_cmp_hidden['atividade'] != "off") { 
          $conteudo = sc_strip_script($this->atividade); 
          $conteudo_original = sc_strip_script($this->atividade); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'atividade', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_atividade_grid_line . "\"  style=\"" . $this->Css_Cmp['css_atividade_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_atividade_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_descricao_especialidade()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['descricao_especialidade']) || $this->NM_cmp_hidden['descricao_especialidade'] != "off") { 
          $conteudo = sc_strip_script($this->descricao_especialidade); 
          $conteudo_original = sc_strip_script($this->descricao_especialidade); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'descricao_especialidade', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_descricao_especialidade_grid_line . "\"  style=\"" . $this->Css_Cmp['css_descricao_especialidade_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_descricao_especialidade_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_descricao_servico()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['descricao_servico']) || $this->NM_cmp_hidden['descricao_servico'] != "off") { 
          $conteudo = sc_strip_script($this->descricao_servico); 
          $conteudo_original = sc_strip_script($this->descricao_servico); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'descricao_servico', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_descricao_servico_grid_line . "\"  style=\"" . $this->Css_Cmp['css_descricao_servico_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_descricao_servico_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_quantidade()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['quantidade']) || $this->NM_cmp_hidden['quantidade'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->quantidade)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->quantidade)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'quantidade', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_quantidade_grid_line . "\"  style=\"" . $this->Css_Cmp['css_quantidade_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_quantidade_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_total_servico()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['total_servico']) || $this->NM_cmp_hidden['total_servico'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->total_servico)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->total_servico)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'total_servico', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_total_servico_grid_line . "\"  style=\"" . $this->Css_Cmp['css_total_servico_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_total_servico_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_calc_span()
 {
   $this->NM_colspan  = 10;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_psq'])
   {
       $this->NM_colspan++;
   }
   foreach ($this->NM_cmp_hidden as $Cmp => $Hidden)
   {
       if ($Hidden == "off")
       {
           $this->NM_colspan--;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_grid'])
   {
       $this->NM_colspan--;
   }
 }
 function nm_quebra_pagina($nm_parms)
 {
    global $nm_saida;
    if ($this->nmgp_prim_pag_pdf && $nm_parms == "pagina")
    {
        $this->nmgp_prim_pag_pdf = false;
        return;
    }
    $this->Ini->nm_cont_lin++;
    if (($this->Ini->nm_limite_lin > 0 && $this->Ini->nm_cont_lin > $this->Ini->nm_limite_lin) || $nm_parms == "pagina" || $nm_parms == "resumo" || $nm_parms == "total")
    {
        $nm_saida->saida("</TABLE></TD></TR>\r\n");
        $this->Ini->nm_cont_lin = ($nm_parms == "pagina") ? 0 : 1;
        if ($this->Print_All)
        {
            if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['print_navigator']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['print_navigator'] == "Netscape")
            {
                $nm_saida->saida("</TABLE><TABLE id=\"main_table_grid\" style=\"page-break-before:always;\" align=\"" . $this->Tab_align . "\" valign=\"" . $this->Tab_valign . "\" " . $this->Tab_width . ">\r\n");
            }
            else
            {
                $nm_saida->saida("</TABLE><TABLE id=\"main_table_grid\" class=\"scGridBorder\" style=\"page-break-before:always;\" align=\"" . $this->Tab_align . "\" valign=\"" . $this->Tab_valign . "\" " . $this->Tab_width . ">\r\n");
            }
        }
        else
        {
            $nm_saida->saida("</table><div style=\"page-break-after: always;\"><span style=\"display: none;\">&nbsp;</span></div><table width='100%' cellspacing=0 cellpadding=0>\r\n");
        }
        if ($nm_parms != "resumo" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'])
        {
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf']) { 
           }
           else
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf_vert']) { 
                $nm_saida->saida("     <thead>\r\n");
               }
               $this->cabecalho();
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf_vert']) { 
                $nm_saida->saida("     </thead>\r\n");
               }
           }
        }
        $nm_saida->saida(" <TR> \r\n");
        $nm_saida->saida("  <TD style=\"padding: 0px; vertical-align: top;\"> \r\n");
        $nm_saida->saida("   <TABLE class=\"" . $this->css_scGridTabela . "\" align=\"center\" " . $nm_id_aplicacao . " width=\"100%\">\r\n");
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'] && ($this->pdf_all_cab == "S" || $this->pdf_all_label == "S")) { 
            $nm_saida->saida(" <thead> \r\n");
            if ($this->pdf_all_cab == "S")
            {
                $this->cabecalho();
            }
            if ($this->pdf_all_label == "S" && $nm_parms != "resumo" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_grid'])
            {
                $this->label_grid();
            }
            $nm_saida->saida(" </thead> \r\n");
        }
        if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'] && $nm_parms != "resumo" && $nm_parms != "pagina" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_grid'])
        {
            $this->label_grid();
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['proc_pdf'] && $this->pdf_label_group != "S" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_grid'])
        {
            $this->nm_inicio_pag = 0;
        }
    }
 }
 function quebra_descricao_especialidade_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_profissional = false;
   $this->sc_proc_quebra_descricao_especialidade = true; 
   $tot_descricao_especialidade[0] = $this->descricao_especialidade;
   $contr_arr = "";
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
   {
       $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp_gb);
       $TP_Time = (in_array($cmp_gb, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
       $temp_cmp = $this->Ini->Get_arg_groupby($TP_Time . $this->$cmp_gb, $Format_tst); 
       $contr_arr .= '["' . $temp_cmp . '"]';
       if ($cmp_gb == $Cmp_Name)
       {
           break;
       }
   }
   eval('$tot_descricao_especialidade[1]  = $_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_dbo_view_resumo_servico_por_profissional_especialidade"]["arr_total"]["' . $Cmp_Name . '"]' . $contr_arr . '[0];');
   eval('$tot_descricao_especialidade[2]  = $_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_dbo_view_resumo_servico_por_profissional_especialidade"]["arr_total"]["' . $Cmp_Name . '"]' . $contr_arr . '[1];');
   eval('$tot_descricao_especialidade[3]  = $_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_dbo_view_resumo_servico_por_profissional_especialidade"]["arr_total"]["' . $Cmp_Name . '"]' . $contr_arr . '[2];');
   $$Var_name_gb = $tot_descricao_especialidade;
   $conteudo = $tot_descricao_especialidade[0] ;  
   $this->count_descricao_especialidade = $tot_descricao_especialidade[1];
   $this->sum_descricao_especialidade_quantidade = $tot_descricao_especialidade[2];
   $this->sum_descricao_especialidade_total_servico = $tot_descricao_especialidade[3];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->descricao_especialidade); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['descricao_especialidade']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['descricao_especialidade']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Especialidade"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_descricao_especialidade = false; 
 } 
 function quebra_profissional_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_descricao_especialidade = false;
   $this->sc_proc_quebra_profissional = true; 
   $tot_profissional[0] = $this->profissional;
   $contr_arr = "";
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
   {
       $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp_gb);
       $TP_Time = (in_array($cmp_gb, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
       $temp_cmp = $this->Ini->Get_arg_groupby($TP_Time . $this->$cmp_gb, $Format_tst); 
       $contr_arr .= '["' . $temp_cmp . '"]';
       if ($cmp_gb == $Cmp_Name)
       {
           break;
       }
   }
   eval('$tot_profissional[1]  = $_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_dbo_view_resumo_servico_por_profissional_especialidade"]["arr_total"]["' . $Cmp_Name . '"]' . $contr_arr . '[0];');
   eval('$tot_profissional[2]  = $_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_dbo_view_resumo_servico_por_profissional_especialidade"]["arr_total"]["' . $Cmp_Name . '"]' . $contr_arr . '[1];');
   eval('$tot_profissional[3]  = $_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_dbo_view_resumo_servico_por_profissional_especialidade"]["arr_total"]["' . $Cmp_Name . '"]' . $contr_arr . '[2];');
   $$Var_name_gb = $tot_profissional;
   $conteudo = $tot_profissional[0] ;  
   $this->count_profissional = $tot_profissional[1];
   $this->sum_profissional_quantidade = $tot_profissional[2];
   $this->sum_profissional_total_servico = $tot_profissional[3];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->profissional); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['profissional']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['profissional']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Profissional"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_profissional = false; 
 } 
 function quebra_descricao_especialidade_sc_free_group_by_top($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_descricao_especialidade = $$Var_name_gb;
   $this->SC_tab_quebra = (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_cmp']) > 1) ? 10 * $this->Tab_Nv_tree['descricao_especialidade'] : 0;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
   static $cont_quebra_descricao_especialidade = 0; 
   $cont_quebra_descricao_especialidade++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['rows_emb']++;
   $link_div   = "";
   $link_div_2 = "";
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ind_tree'];
       $link_div  = "<table style=\"border-collapse: collapse\"><tr>";
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_grid']) {
          $link_div .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $link_div .= "<td style=\"padding: 0px\"><span align=\"left\">";
       $link_div .= "<img id=\"b_open_grid_dbo_view_resumo_servico_por_profissional_especialidade_" . $this->NM_cont_body . "\" style=\"display:none\" onclick=\"document.getElementById('b_open_grid_dbo_view_resumo_servico_por_profissional_especialidade_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_close_grid_dbo_view_resumo_servico_por_profissional_especialidade_" . $this->NM_cont_body . "').style.display = ''; NM_liga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_dbo_view_resumo_servico_por_profissional_especialidade, 'grid_dbo_view_resumo_servico_por_profissional_especialidade'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_exp . "\">";
       $link_div .= "<img id=\"b_close_grid_dbo_view_resumo_servico_por_profissional_especialidade_" . $this->NM_cont_body . "\" style=\"display:''\" onclick=\"document.getElementById('b_close_grid_dbo_view_resumo_servico_por_profissional_especialidade_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_open_grid_dbo_view_resumo_servico_por_profissional_especialidade_" . $this->NM_cont_body . "').style.display = ''; NM_apaga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_dbo_view_resumo_servico_por_profissional_especialidade, 'grid_dbo_view_resumo_servico_por_profissional_especialidade'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_col . "\">";
       $link_div .= "</span></td><td  class=\"scGridBlockFont\">";
       $link_div_2 = "</td></tr></table>";
       if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
       {
           $this->NM_tbody_open = false;
           $nm_saida->saida("    </TBODY>");
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_dbo_view_resumo_servico_por_profissional_especialidade'][$this->NM_cont_body][$this->Tab_Nv_tree['descricao_especialidade']] = 'top';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_dbo_view_resumo_servico_por_profissional_especialidade_" . $this->NM_cont_body . "_top\" style=\"display:''\">");
   }
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H2 style=\"font-size:0;padding:1px\">" .  $this->$Cmps_Gb_Free[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H2></div>";
   }
   $conteudo = $tot_descricao_especialidade[0] ;  
   $colspan = $this->NM_colspan;
   $this->Label_descricao_especialidade = "<table>"; 
   $Cmps_gb = $this->$Cmps_Gb_Free;
   foreach ($Cmps_gb as $cada_campo) 
   { 
       $this->Label_descricao_especialidade .= "<tr>"; 
       $this->Label_descricao_especialidade .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_descricao_especialidade .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_descricao_especialidade .= "</tr>"; 
   } 
   $this->Label_descricao_especialidade .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . " align=\"\">\r\n");
   $nm_saida->saida("       " . $link_div . "\r\n");
   $nm_saida->saida("        " . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_descricao_especialidade . $nm_fecha_pdf_old . "\r\n");
   $nm_saida->saida("       " . $link_div_2 . "\r\n");
   $nm_saida->saida("     </TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $nm_saida->saida("    </TBODY>");
       if ($this->Ult_qb_free == $this->Tab_Nv_tree['descricao_especialidade'])
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ind_tree']++;
           $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ind_tree'];
           $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_dbo_view_resumo_servico_por_profissional_especialidade'][$this->NM_cont_body][$this->Tab_Nv_tree['descricao_especialidade']] = 'bot';
           $nm_saida->saida("    <TBODY id=\"tbody_grid_dbo_view_resumo_servico_por_profissional_especialidade_" . $this->NM_cont_body . "_bot\" style=\"display:''\">");
           $this->NM_tbody_open = true;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_descricao_especialidade_sc_free_group_by_bot($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global 
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_descricao_especialidade = $$Var_name_gb;
   if ($this->Ult_qb_free != $this->Tab_Nv_tree['descricao_especialidade'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $this->NM_tbody_open = true;
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ind_tree'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_dbo_view_resumo_servico_por_profissional_especialidade'][$this->NM_cont_body][$this->Tab_Nv_tree['descricao_especialidade']] = 'bot';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_dbo_view_resumo_servico_por_profissional_especialidade_" . $this->NM_cont_body . "_bot\" style=\"display:''\">");
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['rows_emb']++;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_psq'])
   {
       $colspan++;
   }
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "mes_ano" && (!isset($this->NM_cmp_hidden['mes_ano']) || $this->NM_cmp_hidden['mes_ano'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "nome_razao_social" && (!isset($this->NM_cmp_hidden['nome_razao_social']) || $this->NM_cmp_hidden['nome_razao_social'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "contratos" && (!isset($this->NM_cmp_hidden['contratos']) || $this->NM_cmp_hidden['contratos'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "profissional" && (!isset($this->NM_cmp_hidden['profissional']) || $this->NM_cmp_hidden['profissional'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "atividade" && (!isset($this->NM_cmp_hidden['atividade']) || $this->NM_cmp_hidden['atividade'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "descricao_especialidade" && (!isset($this->NM_cmp_hidden['descricao_especialidade']) || $this->NM_cmp_hidden['descricao_especialidade'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "descricao_servico" && (!isset($this->NM_cmp_hidden['descricao_servico']) || $this->NM_cmp_hidden['descricao_servico'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "quantidade" && (!isset($this->NM_cmp_hidden['quantidade']) || $this->NM_cmp_hidden['quantidade'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_descricao_especialidade[2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_quantidade_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "total_servico" && (!isset($this->NM_cmp_hidden['total_servico']) || $this->NM_cmp_hidden['total_servico'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_descricao_especialidade[3] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_total_servico_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_total_servico_sub_tot\" style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $this->NM_tbody_open = false;
       $nm_saida->saida("    </TBODY>");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_profissional_sc_free_group_by_top($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_profissional = $$Var_name_gb;
   $this->SC_tab_quebra = (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_cmp']) > 1) ? 10 * $this->Tab_Nv_tree['profissional'] : 0;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
   static $cont_quebra_profissional = 0; 
   $cont_quebra_profissional++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['rows_emb']++;
   $link_div   = "";
   $link_div_2 = "";
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ind_tree'];
       $link_div  = "<table style=\"border-collapse: collapse\"><tr>";
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_grid']) {
          $link_div .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $link_div .= "<td style=\"padding: 0px\"><span align=\"left\">";
       $link_div .= "<img id=\"b_open_grid_dbo_view_resumo_servico_por_profissional_especialidade_" . $this->NM_cont_body . "\" style=\"display:none\" onclick=\"document.getElementById('b_open_grid_dbo_view_resumo_servico_por_profissional_especialidade_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_close_grid_dbo_view_resumo_servico_por_profissional_especialidade_" . $this->NM_cont_body . "').style.display = ''; NM_liga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_dbo_view_resumo_servico_por_profissional_especialidade, 'grid_dbo_view_resumo_servico_por_profissional_especialidade'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_exp . "\">";
       $link_div .= "<img id=\"b_close_grid_dbo_view_resumo_servico_por_profissional_especialidade_" . $this->NM_cont_body . "\" style=\"display:''\" onclick=\"document.getElementById('b_close_grid_dbo_view_resumo_servico_por_profissional_especialidade_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_open_grid_dbo_view_resumo_servico_por_profissional_especialidade_" . $this->NM_cont_body . "').style.display = ''; NM_apaga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_dbo_view_resumo_servico_por_profissional_especialidade, 'grid_dbo_view_resumo_servico_por_profissional_especialidade'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_col . "\">";
       $link_div .= "</span></td><td  class=\"scGridBlockFont\">";
       $link_div_2 = "</td></tr></table>";
       if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
       {
           $this->NM_tbody_open = false;
           $nm_saida->saida("    </TBODY>");
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_dbo_view_resumo_servico_por_profissional_especialidade'][$this->NM_cont_body][$this->Tab_Nv_tree['profissional']] = 'top';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_dbo_view_resumo_servico_por_profissional_especialidade_" . $this->NM_cont_body . "_top\" style=\"display:''\">");
   }
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H3 style=\"font-size:0;padding:1px\">" .  $this->$Cmps_Gb_Free[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H3></div>";
   }
   $conteudo = $tot_profissional[0] ;  
   $colspan = $this->NM_colspan;
   $this->Label_profissional = "<table>"; 
   $Cmps_gb = $this->$Cmps_Gb_Free;
   foreach ($Cmps_gb as $cada_campo) 
   { 
       $this->Label_profissional .= "<tr>"; 
       $this->Label_profissional .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_profissional .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_profissional .= "</tr>"; 
   } 
   $this->Label_profissional .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . " align=\"\">\r\n");
   $nm_saida->saida("       " . $link_div . "\r\n");
   $nm_saida->saida("        " . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_profissional . $nm_fecha_pdf_old . "\r\n");
   $nm_saida->saida("       " . $link_div_2 . "\r\n");
   $nm_saida->saida("     </TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $nm_saida->saida("    </TBODY>");
       if ($this->Ult_qb_free == $this->Tab_Nv_tree['profissional'])
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ind_tree']++;
           $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ind_tree'];
           $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_dbo_view_resumo_servico_por_profissional_especialidade'][$this->NM_cont_body][$this->Tab_Nv_tree['profissional']] = 'bot';
           $nm_saida->saida("    <TBODY id=\"tbody_grid_dbo_view_resumo_servico_por_profissional_especialidade_" . $this->NM_cont_body . "_bot\" style=\"display:''\">");
           $this->NM_tbody_open = true;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_profissional_sc_free_group_by_bot($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global 
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_profissional = $$Var_name_gb;
   if ($this->Ult_qb_free != $this->Tab_Nv_tree['profissional'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $this->NM_tbody_open = true;
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ind_tree'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_dbo_view_resumo_servico_por_profissional_especialidade'][$this->NM_cont_body][$this->Tab_Nv_tree['profissional']] = 'bot';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_dbo_view_resumo_servico_por_profissional_especialidade_" . $this->NM_cont_body . "_bot\" style=\"display:''\">");
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['rows_emb']++;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_psq'])
   {
       $colspan++;
   }
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "mes_ano" && (!isset($this->NM_cmp_hidden['mes_ano']) || $this->NM_cmp_hidden['mes_ano'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "nome_razao_social" && (!isset($this->NM_cmp_hidden['nome_razao_social']) || $this->NM_cmp_hidden['nome_razao_social'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "contratos" && (!isset($this->NM_cmp_hidden['contratos']) || $this->NM_cmp_hidden['contratos'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "profissional" && (!isset($this->NM_cmp_hidden['profissional']) || $this->NM_cmp_hidden['profissional'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "atividade" && (!isset($this->NM_cmp_hidden['atividade']) || $this->NM_cmp_hidden['atividade'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "descricao_especialidade" && (!isset($this->NM_cmp_hidden['descricao_especialidade']) || $this->NM_cmp_hidden['descricao_especialidade'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "descricao_servico" && (!isset($this->NM_cmp_hidden['descricao_servico']) || $this->NM_cmp_hidden['descricao_servico'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "quantidade" && (!isset($this->NM_cmp_hidden['quantidade']) || $this->NM_cmp_hidden['quantidade'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_profissional[2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_quantidade_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "total_servico" && (!isset($this->NM_cmp_hidden['total_servico']) || $this->NM_cmp_hidden['total_servico'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_profissional[3] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_total_servico_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_total_servico_sub_tot\" style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $this->NM_tbody_open = false;
       $nm_saida->saida("    </TBODY>");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_geral_sc_free_group_by_top() 
 {
   global $nm_saida; 
   if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
   {
       $nm_saida->saida("    </TBODY>");
   }
 }
 function quebra_geral_sc_free_group_by_bot() 
 {
   global 
          $nm_saida, $nm_data; 
   $this->totaliza_php_sc_free_group_by(); 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] == "pdf" && !$this->Print_All)
   {
      $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" .  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['tot_geral'][0] . "</H1></div>";
   }
   $tit_lin_sumariza      =  $nm_nivel_book_pdf . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['tot_geral'][1] . ")";
   $tit_lin_sumariza_orig =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['tot_geral'][1] . ")";
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridTotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra  . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = $tit_lin_sumariza;
   $colspan  = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_psq'])
   {
       $colspan++;
   }
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "mes_ano" && (!isset($this->NM_cmp_hidden['mes_ano']) || $this->NM_cmp_hidden['mes_ano'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "nome_razao_social" && (!isset($this->NM_cmp_hidden['nome_razao_social']) || $this->NM_cmp_hidden['nome_razao_social'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "contratos" && (!isset($this->NM_cmp_hidden['contratos']) || $this->NM_cmp_hidden['contratos'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "profissional" && (!isset($this->NM_cmp_hidden['profissional']) || $this->NM_cmp_hidden['profissional'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "atividade" && (!isset($this->NM_cmp_hidden['atividade']) || $this->NM_cmp_hidden['atividade'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "descricao_especialidade" && (!isset($this->NM_cmp_hidden['descricao_especialidade']) || $this->NM_cmp_hidden['descricao_especialidade'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "descricao_servico" && (!isset($this->NM_cmp_hidden['descricao_servico']) || $this->NM_cmp_hidden['descricao_servico'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "quantidade" && (!isset($this->NM_cmp_hidden['quantidade']) || $this->NM_cmp_hidden['quantidade'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\" style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
          $tit_lin_sumariza_atu = "&nbsp;";
          $colspan = 0;
      }
      $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['tot_geral'][2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . " css_quantidade_tot_ger\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "total_servico" && (!isset($this->NM_cmp_hidden['total_servico']) || $this->NM_cmp_hidden['total_servico'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\" style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
          $tit_lin_sumariza_atu = "&nbsp;";
          $colspan = 0;
      }
      $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['tot_geral'][3] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . " css_total_servico_tot_ger\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\"   " . "colspan=\"" . $colspan . "\"" . ">&nbsp;</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
 } 

   function totaliza_php_sc_free_group_by()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT mes_ano, nome_razao_social, Contratos, Profissional, Atividade, descricao_especialidade, descricao_servico, sum(quantidade) as quantidade, sum(total_servico) as total_servico from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT mes_ano, nome_razao_social, Contratos, Profissional, Atividade, descricao_especialidade, descricao_servico, sum(quantidade) as quantidade, sum(total_servico) as total_servico from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT mes_ano, nome_razao_social, Contratos, Profissional, Atividade, descricao_especialidade, descricao_servico, sum(quantidade) as quantidade, sum(total_servico) as total_servico from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT mes_ano, nome_razao_social, Contratos, Profissional, Atividade, descricao_especialidade, descricao_servico, sum(quantidade) as quantidade, sum(total_servico) as total_servico from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
         $nmgp_select = "SELECT mes_ano, nome_razao_social, Contratos, Profissional, Atividade, descricao_especialidade, descricao_servico, sum(quantidade) as quantidade, sum(total_servico) as total_servico from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_pesq'] ; 
      $nmgp_select .= " group by mes_ano ,nome_razao_social 		,Contratos 		,Profissional 		,Atividade 		,descricao_especialidade 		,descricao_servico"; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ordem_desc']; 
   } 
   elseif (!empty($campos_order_select)) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $campos_order_select; 
   } 
   elseif (!empty($campos_order)) 
   { 
       $nmgp_order_by = " order by " . $campos_order; 
   } 
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['order_grid'] = $nmgp_order_by;
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
      if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
      { 
         $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
         return;
      }  
      $this->Res->inicializa_arrays();
      $this->nm_grid_colunas = 0;
      while (!$this->rs_grid->EOF) 
      {
         $this->mes_ano = $this->rs_grid->fields[0] ;  
         $this->nome_razao_social = $this->rs_grid->fields[1] ;  
         $this->contratos = $this->rs_grid->fields[2] ;  
         $this->profissional = $this->rs_grid->fields[3] ;  
         $this->atividade = $this->rs_grid->fields[4] ;  
         $this->descricao_especialidade = $this->rs_grid->fields[5] ;  
         $this->descricao_servico = $this->rs_grid->fields[6] ;  
         $this->quantidade = $this->rs_grid->fields[7] ;  
         $this->quantidade = (string)$this->quantidade;  
         $this->rs_grid->fields[8] =  str_replace(",", ".", $this->rs_grid->fields[8]);  
         $this->total_servico = $this->rs_grid->fields[8] ;  
         $this->total_servico = (string)$this->total_servico;  
         $descricao_especialidade_orig = $this->descricao_especialidade;
         $profissional_orig = $this->profissional;
         $this->arg_sum_profissional = " = " . $this->Db->qstr($this->profissional);
         $this->arg_sum_descricao_especialidade = " = " . $this->Db->qstr($this->descricao_especialidade);
         $this->Res->adiciona_registro(NM_encode_input(sc_strip_script($this->quantidade)), NM_encode_input(sc_strip_script($this->total_servico)), sc_strip_script($this->descricao_especialidade), sc_strip_script($this->profissional), sc_strip_script($descricao_especialidade_orig), sc_strip_script($profissional_orig));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['tot_geral'][2] = $this->Res->array_total_geral[1];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['tot_geral'][3] = $this->Res->array_total_geral[2];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . "";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['contr_total_geral'] = "OK";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Ind_Groupby'] == "sc_free_group_by")
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_cmp'] as $cmp_gb => $resto)
          {
              eval ('$_SESSION["sc_session"][' . $this->Ini->sc_page . ']["grid_dbo_view_resumo_servico_por_profissional_especialidade"]["arr_total"]["' . $cmp_gb . '"] = $this->Res->array_total_' .  $cmp_gb . ';');
          }
      }
   }

   function nm_conv_data_db($dt_in, $form_in, $form_out)
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
           nm_conv_form_data($dt_out, $form_in, $form_out);
           return $dt_out;
       }
   }
   function nmgp_barra_top_normal()
   {
      global 
             $nm_saida, $nm_url_saida, $nm_apl_dependente;
      $NM_btn  = false;
      $NM_Gbtn = false;
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      <form id=\"id_F0_top\" name=\"F0_top\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
      $nm_saida->saida("      <input type=\"text\" id=\"id_sc_truta_f0_top\" name=\"sc_truta_f0_top\" value=\"\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"script_init_f0_top\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"opcao_f0_top\" name=\"nmgp_opcao\" value=\"muda_qt_linhas\"/> \r\n");
      $nm_saida->saida("      </td></tr><tr id=\"sc_grid_toobar_top_tr\">\r\n");
      $nm_saida->saida("       <td id=\"sc_grid_toobar_top\"  class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      $nm_saida->saida("        <table id=\"sc_grid_toobar_top_table\" class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr class=\"" . $this->css_scGridToolbarPadd . "_tr\"> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao_print'] != "print") 
      {
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var change_fast_top = \"\";</script>\r\n");
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['fast_search'][2] : "";
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_cmp))
          {
              $OPC_cmp = NM_conv_charset($OPC_cmp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_arg))
          {
              $OPC_arg = NM_conv_charset($OPC_arg, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_dat))
          {
              $OPC_dat = NM_conv_charset($OPC_dat, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $stateSearchIconClose  = 'none';
          $stateSearchIconSearch = '';
          if(!empty($OPC_dat))
          {
              $stateSearchIconClose  = '';
              $stateSearchIconSearch = 'none';
          }
          $nm_saida->saida("          <input type=\"hidden\"  id=\"fast_search_f0_top\" name=\"nmgp_fast_search\" value=\"SC_all_Cmp\">\r\n");
          $nm_saida->saida("          <select id=\"cond_fast_search_f0_top\" class=\"" . $this->css_css_toolbar_obj . "\" style=\"vertical-align: middle;display:none;\" name=\"nmgp_cond_fast_search\" onChange=\"change_fast_top = 'CH';\">\r\n");
          $OPC_sel = " selected='selected'";
          $nm_saida->saida("           <option value=\"qp\"$OPC_sel>" . $this->Ini->Nm_lang['lang_srch_like'] . "</option>\r\n");
          $nm_saida->saida("          </select>\r\n");
          $nm_saida->saida("          <span id=\"quicksearchph_top\" class=\"" . $this->css_css_toolbar_obj . "\" style='display: inline-block; vertical-align: inherit;'>\r\n");
          $nm_saida->saida("           <span>\r\n");
          $nm_saida->saida("             <input type=\"text\" id=\"SC_fast_search_top\" class=\"" . $this->css_css_toolbar_obj . "_text\" style=\"border-width: 0px;\" name=\"nmgp_arg_fast_search\" value=\"" . NM_encode_input($OPC_dat) . "\" size=\"10\" onChange=\"change_fast_top = 'CH';\" alt=\"{maxLength: 255}\" placeholder=\"" . $this->Ini->Nm_lang['lang_othr_qk_watermark'] . "\">&nbsp;\r\n");
          $nm_saida->saida("             <img style=\"display: " . $stateSearchIconSearch . "\" id=\"SC_fast_search_submit_top\" class='css_toolbar_obj_qs_search_img' src=\"" . $this->Ini->path_botoes . "/" . $this->Ini->Img_qs_search . "\" onclick=\"scQuickSearchSubmit_top();\">\r\n");
          $nm_saida->saida("             <img style=\"display: " . $stateSearchIconClose . "\" class='css_toolbar_obj_qs_search_img' id=\"SC_fast_search_close_top\" src=\"" . $this->Ini->path_botoes . "/" . $this->Ini->Img_qs_clean . "\" onclick=\"document.getElementById('SC_fast_search_top').value = '';document.F0_top.nmgp_opcao.value='fast_search';document.F0_top.submit();\">\r\n");
          $nm_saida->saida("            </span>\r\n");
          $nm_saida->saida("          </span>");
          $NM_btn = true;
      }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
      if ($this->nmgp_botoes['sel_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
      $pos_path = strrpos($this->Ini->path_prod, "/");
      $path_fields = $this->Ini->root . substr($this->Ini->path_prod, 0, $pos_path) . "/conf/fields/";
              $this->nm_btn_exist['sel_col'][] = "selcmp_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcolumns", "scBtnSelCamposShow('" . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnSelCamposShow('" . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "selcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
      }
      if ($this->nmgp_botoes['sort_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $UseAlias =  "N";
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          {
              $UseAlias =  "N";
          }
          else
          {
              $UseAlias =  "S";
          }
              $this->nm_btn_exist['sort_col'][] = "ordcmp_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsort", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&use_alias=" . $UseAlias . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&use_alias=" . $UseAlias . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "ordcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
      }
      if ($this->nmgp_botoes['groupby'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $Q_free  = false;
          $Q_count = 0;
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_All_Groupby'] as $QB => $Tp)
          {
              if (!in_array($QB, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Groupby_hide']))
              {
                  $Q_count++;
                  if ($QB == "sc_free_group_by")
                  {
                      $Q_free = true;
                  }
              }
          }
          if ($Q_count > 1 || $Q_free)
          {
              $this->nm_btn_exist['groupby'][] = "sel_groupby_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bgroupby", "scBtnGroupByShow('" . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_sel_groupby.php?opc_ret=igual&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnGroupByShow('" . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_sel_groupby.php?opc_ret=igual&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "sel_groupby_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
      }
      if ($this->nmgp_botoes['group_2'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_2_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_2", "scBtnGrpShow('group_2_top')", "scBtnGrpShow('group_2_top')", "sc_btgp_btn_group_2_top", "", "" . $this->Ini->Nm_lang['lang_btns_expt_email_title'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_expt_email'] . "", "", "", "__sc_grp__", "text_fontawesomeicon", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn  = true;
          $NM_Gbtn = false;
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_2", 'group_2', 'top', 'list', 'ini');
          $nm_saida->saida("           $Cod_Btn\r\n");
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_2", 'group_2', 'top', 'list', 'fim');
          $nm_saida->saida("           $Cod_Btn\r\n");
          $nm_saida->saida("           <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("             if (!sc_itens_btgp_group_2_top) {\r\n");
          $nm_saida->saida("                 document.getElementById('sc_btgp_btn_group_2_top').style.display='none'; }\r\n");
          $nm_saida->saida("           </script>\r\n");
      }
      if ($this->nmgp_botoes['group_1'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_1_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_1", "scBtnGrpShow('group_1_top')", "scBtnGrpShow('group_1_top')", "sc_btgp_btn_group_1_top", "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "", "__sc_grp__", "text_fontawesomeicon", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn  = true;
          $NM_Gbtn = false;
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_1", 'group_1', 'top', 'list', 'ini');
          $nm_saida->saida("           $Cod_Btn\r\n");
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['print'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $Tem_pdf_res = "n";
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_print_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['print'][] = "print_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "print_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_config_print.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=S&nm_opc=RC&nm_cor=PB&password=n&language=pt_br&nm_page=" . NM_encode_input($this->Ini->sc_page) . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_prt_res=grid&nm_all_modules=grid&origem=cons&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_1", 'group_1', 'top', 'list', 'fim');
          $nm_saida->saida("           $Cod_Btn\r\n");
          $nm_saida->saida("           <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("             if (!sc_itens_btgp_group_1_top) {\r\n");
          $nm_saida->saida("                 document.getElementById('sc_btgp_btn_group_1_top').style.display='none'; }\r\n");
          $nm_saida->saida("           </script>\r\n");
      }
      if (is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Img_sep_grid))
      {
          if ($NM_btn)
          {
              $NM_btn = false;
              $NM_ult_sep = "NM_sep_1";
              $nm_saida->saida("          <img id=\"NM_sep_1\" class=\"NM_toolbar_sep\" src=\"" . $this->Ini->path_img_global . $this->Ini->Img_sep_grid . "\" align=\"absmiddle\" style=\"vertical-align: middle;\">\r\n");
          }
      }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
          if ($this->nmgp_botoes['summary'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
          {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_cmp']))
            { }
            else {
              $this->nm_btn_exist['summary'][] = "res_top";
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_resumo'])) {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "nm_gp_move('resumo', '0');", "nm_gp_move('resumo', '0');", "res_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              } 
              else { 
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bresumo", "nm_gp_move('resumo', '0');", "nm_gp_move('resumo', '0');", "res_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              } 
              $nm_saida->saida("           $Cod_Btn \r\n");
                  $NM_btn = true;
            }
          }
          if ($this->nmgp_botoes['reload'] == "on")
          {
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "breload", "nm_gp_submit_ajax ('igual', 'breload');", "nm_gp_submit_ajax ('igual', 'breload');", "reload_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          if (is_file("grid_dbo_view_resumo_servico_por_profissional_especialidade_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_dbo_view_resumo_servico_por_profissional_especialidade_help.txt"); 
             if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
             {
                 $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
                 $Tmp = explode(";", $Arq_WebHelp[0]); 
                 foreach ($Tmp as $Cada_help)
                 {
                     $Tmp1 = explode(":", $Cada_help); 
                     if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "cons" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
                     {
                        $Cod_Btn = nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "help_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                        $nm_saida->saida("           $Cod_Btn \r\n");
                        $NM_btn = true;
                     }
                 }
             }
          }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['b_sair'] || $this->grid_emb_form || $this->grid_emb_form_full || (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['dashboard_info']['under_dashboard']))
      {
         $this->nmgp_botoes['exit'] = "off"; 
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_psq'])
      {
          $this->nm_btn_exist['exit'][] = "sai_top";
         if ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") 
         { 
            $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='$nm_url_saida'; document.F5.submit();", "document.F5.action='$nm_url_saida'; document.F5.submit();", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
            $nm_saida->saida("           $Cod_Btn \r\n");
            $NM_btn = true;
         } 
         elseif (!$this->Ini->SC_Link_View && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") 
         { 
            $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsair", "document.F5.action='$nm_url_saida'; document.F5.submit();", "document.F5.action='$nm_url_saida'; document.F5.submit();", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
            $nm_saida->saida("           $Cod_Btn \r\n");
            $NM_btn = true;
         } 
      }
      elseif ($this->nmgp_botoes['exit'] == "on")
      {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['sc_modal'])
        {
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "self.parent.tb_remove()", "self.parent.tb_remove()", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
        }
        else
        {
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "window.close();", "window.close();", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
        }
         $nm_saida->saida("           $Cod_Btn \r\n");
         $NM_btn = true;
      }
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td> \r\n");
      $nm_saida->saida("     </form> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      if (!$NM_btn && isset($NM_ult_sep))
      {
          $nm_saida->saida("     <script language=\"javascript\">\r\n");
          $nm_saida->saida("        document.getElementById('" . $NM_ult_sep . "').style.display='none';\r\n");
          $nm_saida->saida("     </script>\r\n");
      }
   }
   function nmgp_barra_bot_normal()
   {
      global 
             $nm_saida, $nm_url_saida, $nm_apl_dependente;
      $NM_btn  = false;
      $NM_Gbtn = false;
      $this->NM_calc_span();
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      <form id=\"id_F0_bot\" name=\"F0_bot\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
      $nm_saida->saida("      <input type=\"text\" id=\"id_sc_truta_f0_bot\" name=\"sc_truta_f0_bot\" value=\"\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"script_init_f0_bot\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"opcao_f0_bot\" name=\"nmgp_opcao\" value=\"muda_qt_linhas\"/> \r\n");
      $nm_saida->saida("      </td></tr><tr id=\"sc_grid_toobar_bot_tr\">\r\n");
      $nm_saida->saida("       <td id=\"sc_grid_toobar_bot\"  class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      $nm_saida->saida("        <table id=\"sc_grid_toobar_bot_table\" class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr class=\"" . $this->css_scGridToolbarPadd . "_tr\"> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao_print'] != "print") 
      {
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['goto'] == "on" && $this->Ini->Apl_paginacao != "FULL" )
          {
              $Reg_Page  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_lin_grid'];
              $this->nm_btn_exist['goto'][] = "brec_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "birpara", "document.F0_bot.nmgp_opcao.value='muda_rec_linhas';document.F0_bot.rec.value = ((document.F0_bot.rec.value - 1) * " . NM_encode_input($Reg_Page) . ") + 1; document.F0_bot.submit();", "document.F0_bot.nmgp_opcao.value='muda_rec_linhas';document.F0_bot.rec.value = ((document.F0_bot.rec.value - 1) * " . NM_encode_input($Reg_Page) . ") + 1; document.F0_bot.submit();", "brec_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $Page_Atu   = ceil($this->nmgp_reg_inicial / $Reg_Page);
              $nm_saida->saida("          <input id=\"rec_f0_bot\" type=\"text\" class=\"" . $this->css_css_toolbar_obj . "\" name=\"rec\" value=\"" . NM_encode_input($Page_Atu) . "\" style=\"width:25px;vertical-align: middle;\"/> \r\n");
              $NM_btn = true;
          }
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['qtline'] == "on" && $this->Ini->Apl_paginacao != "FULL")
          {
              $nm_saida->saida("          <span class=\"" . $this->css_css_toolbar_obj . "\" style=\"border: 0px;vertical-align: middle;\">" . $this->Ini->Nm_lang['lang_btns_rows'] . "</span>\r\n");
              $nm_saida->saida("          <select class=\"" . $this->css_css_toolbar_obj . "\" style=\"vertical-align: middle;\" id=\"quant_linhas_f0_bot\" name=\"nmgp_quant_linhas\" onchange=\"document.F0_bot.nmgp_opcao.value='muda_qt_linhas';document.F0_bot.submit();\"> \r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_lin_grid'] == 10) ? " selected" : "";
              $nm_saida->saida("           <option value=\"10\" " . $obj_sel . ">10</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_lin_grid'] == 20) ? " selected" : "";
              $nm_saida->saida("           <option value=\"20\" " . $obj_sel . ">20</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_lin_grid'] == 50) ? " selected" : "";
              $nm_saida->saida("           <option value=\"50\" " . $obj_sel . ">50</option>\r\n");
              $nm_saida->saida("          </select>\r\n");
              $NM_btn = true;
          }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
          if ($this->nmgp_botoes['first'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['first'][] = "first_bot";
              if ($this->Rec_ini == 0)
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_inicio", "nm_gp_submit_rec('ini');", "nm_gp_submit_rec('ini');", "first_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "disabled", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
              else
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_inicio", "nm_gp_submit_rec('ini');", "nm_gp_submit_rec('ini');", "first_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
                  $NM_btn = true;
          }
          if ($this->nmgp_botoes['back'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['back'][] = "back_bot";
              if ($this->Rec_ini == 0)
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_retorna", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "back_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "disabled", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
              else
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_retorna", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "back_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
                  $NM_btn = true;
          }
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['navpage'] == "on" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_liga']['nav']) && $this->Ini->Apl_paginacao != "FULL" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_lin_grid'] != "all")
          {
              $Reg_Page  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_lin_grid'];
              $Max_link   = 5;
              $Mid_link   = ceil($Max_link / 2);
              $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
              $Qtd_Pages  = ceil($this->count_ger / $Reg_Page);
              $Page_Atu   = ceil($this->nmgp_reg_final / $Reg_Page);
              $Link_ini   = 1;
              if ($Page_Atu > $Max_link)
              {
                  $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
              }
              elseif ($Page_Atu > $Mid_link)
              {
                  $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
              }
              if (($Qtd_Pages - $Link_ini) < $Max_link)
              {
                  $Link_ini = ($Qtd_Pages - $Max_link) + 1;
              }
              if ($Link_ini < 1)
              {
                  $Link_ini = 1;
              }
              for ($x = 0; $x < $Max_link && $Link_ini <= $Qtd_Pages; $x++)
              {
                  $rec = (($Link_ini - 1) * $Reg_Page) + 1;
                  if ($Link_ini == $Page_Atu)
                  {
                      $nm_saida->saida("            <span class=\"scGridToolbarNavOpen\" style=\"vertical-align: middle;\">" . $Link_ini . "</span>\r\n");
                  }
                  else
                  {
                      $nm_saida->saida("            <a class=\"scGridToolbarNav\" style=\"vertical-align: middle;\" href=\"javascript: nm_gp_submit_rec(" . $rec . ");\">" . $Link_ini . "</a>\r\n");
                  }
                  $Link_ini++;
                  if (($x + 1) < $Max_link && $Link_ini <= $Qtd_Pages && '' != $this->Ini->Str_toolbarnav_separator && @is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator))
                  {
                      $nm_saida->saida("            <img src=\"" . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator . "\" align=\"absmiddle\" style=\"vertical-align: middle;\">\r\n");
                  }
              }
              $NM_btn = true;
          }
          if ($this->nmgp_botoes['forward'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['forward'][] = "forward_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_avanca", "nm_gp_submit_rec('" . $this->Rec_fim . "');", "nm_gp_submit_rec('" . $this->Rec_fim . "');", "forward_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          if ($this->nmgp_botoes['last'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['last'][] = "last_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_final", "nm_gp_submit_rec('fim');", "nm_gp_submit_rec('fim');", "last_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
          if ($this->nmgp_botoes['rows'] == "on" && empty($this->nm_grid_sem_reg))
          {
              $nm_sumario = "[" . $this->Ini->Nm_lang['lang_othr_smry_info'] . "]";
              $nm_sumario = str_replace("?start?", $this->nmgp_reg_inicial, $nm_sumario);
              if ($this->Ini->Apl_paginacao == "FULL")
              {
                  $nm_sumario = str_replace("?final?", "<span class='sm_counter_final'>".$this->count_ger."</span>", $nm_sumario);
              }
              else
              {
                  $nm_sumario = str_replace("?final?", "<span class='sm_counter_final'>".$this->nmgp_reg_final."</span>", $nm_sumario);
              }
              $nm_sumario = str_replace("?total?", "<span class='sm_counter_total'>".$this->count_ger."</span>", $nm_sumario);
              $nm_saida->saida("           <span class=\"summary_indicator " . $this->css_css_toolbar_obj . "\" style=\"border:0px;\"><span class='sm_counter'>" . $nm_sumario . "</span></span>\r\n");
              $NM_btn = true;
          }
          if (is_file("grid_dbo_view_resumo_servico_por_profissional_especialidade_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_dbo_view_resumo_servico_por_profissional_especialidade_help.txt"); 
             if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
             {
                 $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
                 $Tmp = explode(";", $Arq_WebHelp[0]); 
                 foreach ($Tmp as $Cada_help)
                 {
                     $Tmp1 = explode(":", $Cada_help); 
                     if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "cons" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
                     {
                        $Cod_Btn = nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "help_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                        $nm_saida->saida("           $Cod_Btn \r\n");
                        $NM_btn = true;
                     }
                 }
             }
          }
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td> \r\n");
      $nm_saida->saida("     </form> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      if (!$NM_btn && isset($NM_ult_sep))
      {
          $nm_saida->saida("     <script language=\"javascript\">\r\n");
          $nm_saida->saida("        document.getElementById('" . $NM_ult_sep . "').style.display='none';\r\n");
          $nm_saida->saida("     </script>\r\n");
      }
   }
   function nmgp_barra_top_mobile()
   {
      global 
             $nm_saida, $nm_url_saida, $nm_apl_dependente;
      $NM_btn  = false;
      $NM_Gbtn = false;
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      <form id=\"id_F0_top\" name=\"F0_top\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
      $nm_saida->saida("      <input type=\"text\" id=\"id_sc_truta_f0_top\" name=\"sc_truta_f0_top\" value=\"\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"script_init_f0_top\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"opcao_f0_top\" name=\"nmgp_opcao\" value=\"muda_qt_linhas\"/> \r\n");
      $nm_saida->saida("      </td></tr><tr id=\"sc_grid_toobar_top_tr\">\r\n");
      $nm_saida->saida("       <td id=\"sc_grid_toobar_top\"  class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      $nm_saida->saida("        <table id=\"sc_grid_toobar_top_table\" class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr class=\"" . $this->css_scGridToolbarPadd . "_tr\"> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao_print'] != "print") 
      {
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var change_fast_top = \"\";</script>\r\n");
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['fast_search'][2] : "";
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_cmp))
          {
              $OPC_cmp = NM_conv_charset($OPC_cmp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_arg))
          {
              $OPC_arg = NM_conv_charset($OPC_arg, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_dat))
          {
              $OPC_dat = NM_conv_charset($OPC_dat, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $stateSearchIconClose  = 'none';
          $stateSearchIconSearch = '';
          if(!empty($OPC_dat))
          {
              $stateSearchIconClose  = '';
              $stateSearchIconSearch = 'none';
          }
          $nm_saida->saida("          <input type=\"hidden\"  id=\"fast_search_f0_top\" name=\"nmgp_fast_search\" value=\"SC_all_Cmp\">\r\n");
          $nm_saida->saida("          <select id=\"cond_fast_search_f0_top\" class=\"" . $this->css_css_toolbar_obj . "\" style=\"vertical-align: middle;display:none;\" name=\"nmgp_cond_fast_search\" onChange=\"change_fast_top = 'CH';\">\r\n");
          $OPC_sel = " selected='selected'";
          $nm_saida->saida("           <option value=\"qp\"$OPC_sel>" . $this->Ini->Nm_lang['lang_srch_like'] . "</option>\r\n");
          $nm_saida->saida("          </select>\r\n");
          $nm_saida->saida("          <span id=\"quicksearchph_top\" class=\"" . $this->css_css_toolbar_obj . "\" style='display: inline-block; vertical-align: inherit;'>\r\n");
          $nm_saida->saida("           <span>\r\n");
          $nm_saida->saida("             <input type=\"text\" id=\"SC_fast_search_top\" class=\"" . $this->css_css_toolbar_obj . "_text\" style=\"border-width: 0px;\" name=\"nmgp_arg_fast_search\" value=\"" . NM_encode_input($OPC_dat) . "\" size=\"10\" onChange=\"change_fast_top = 'CH';\" alt=\"{maxLength: 255}\" placeholder=\"" . $this->Ini->Nm_lang['lang_othr_qk_watermark'] . "\">&nbsp;\r\n");
          $nm_saida->saida("             <img style=\"display: " . $stateSearchIconSearch . "\" id=\"SC_fast_search_submit_top\" class='css_toolbar_obj_qs_search_img' src=\"" . $this->Ini->path_botoes . "/" . $this->Ini->Img_qs_search . "\" onclick=\"scQuickSearchSubmit_top();\">\r\n");
          $nm_saida->saida("             <img style=\"display: " . $stateSearchIconClose . "\" class='css_toolbar_obj_qs_search_img' id=\"SC_fast_search_close_top\" src=\"" . $this->Ini->path_botoes . "/" . $this->Ini->Img_qs_clean . "\" onclick=\"document.getElementById('SC_fast_search_top').value = '';document.F0_top.nmgp_opcao.value='fast_search';document.F0_top.submit();\">\r\n");
          $nm_saida->saida("            </span>\r\n");
          $nm_saida->saida("          </span>");
          $NM_btn = true;
      }
      if ($this->nmgp_botoes['sel_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
      $pos_path = strrpos($this->Ini->path_prod, "/");
      $path_fields = $this->Ini->root . substr($this->Ini->path_prod, 0, $pos_path) . "/conf/fields/";
              $this->nm_btn_exist['sel_col'][] = "selcmp_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcolumns", "scBtnSelCamposShow('" . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnSelCamposShow('" . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "selcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
      }
      if ($this->nmgp_botoes['sort_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $UseAlias =  "N";
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          {
              $UseAlias =  "N";
          }
          else
          {
              $UseAlias =  "S";
          }
              $this->nm_btn_exist['sort_col'][] = "ordcmp_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsort", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&use_alias=" . $UseAlias . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&use_alias=" . $UseAlias . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "ordcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
      }
      if ($this->nmgp_botoes['groupby'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $Q_free  = false;
          $Q_count = 0;
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_All_Groupby'] as $QB => $Tp)
          {
              if (!in_array($QB, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Groupby_hide']))
              {
                  $Q_count++;
                  if ($QB == "sc_free_group_by")
                  {
                      $Q_free = true;
                  }
              }
          }
          if ($Q_count > 1 || $Q_free)
          {
              $this->nm_btn_exist['groupby'][] = "sel_groupby_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bgroupby", "scBtnGroupByShow('" . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_sel_groupby.php?opc_ret=igual&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnGroupByShow('" . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_sel_groupby.php?opc_ret=igual&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "sel_groupby_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
      }
      if ($this->nmgp_botoes['group_4'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_4_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_4", "scBtnGrpShow('group_4_top')", "scBtnGrpShow('group_4_top')", "sc_btgp_btn_group_4_top", "", "" . $this->Ini->Nm_lang['lang_btns_expt_email_title'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_expt_email'] . "", "", "", "__sc_grp__", "text_fontawesomeicon", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn  = true;
          $NM_Gbtn = false;
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_4", 'group_4', 'top', 'list', 'ini');
          $nm_saida->saida("           $Cod_Btn\r\n");
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_4", 'group_4', 'top', 'list', 'fim');
          $nm_saida->saida("           $Cod_Btn\r\n");
          $nm_saida->saida("           <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("             if (!sc_itens_btgp_group_4_top) {\r\n");
          $nm_saida->saida("                 document.getElementById('sc_btgp_btn_group_4_top').style.display='none'; }\r\n");
          $nm_saida->saida("           </script>\r\n");
      }
      if ($this->nmgp_botoes['group_3'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_3_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_3", "scBtnGrpShow('group_3_top')", "scBtnGrpShow('group_3_top')", "sc_btgp_btn_group_3_top", "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "", "__sc_grp__", "text_fontawesomeicon", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn  = true;
          $NM_Gbtn = false;
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_3", 'group_3', 'top', 'list', 'ini');
          $nm_saida->saida("           $Cod_Btn\r\n");
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['print'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $Tem_pdf_res = "n";
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_3_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_print_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['print'][] = "print_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "print_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_config_print.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=S&nm_opc=RC&nm_cor=PB&password=n&language=pt_br&nm_page=" . NM_encode_input($this->Ini->sc_page) . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_prt_res=grid&nm_all_modules=grid&origem=cons&KeepThis=true&TB_iframe=true&modal=true", "group_3", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_3", 'group_3', 'top', 'list', 'fim');
          $nm_saida->saida("           $Cod_Btn\r\n");
          $nm_saida->saida("           <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("             if (!sc_itens_btgp_group_3_top) {\r\n");
          $nm_saida->saida("                 document.getElementById('sc_btgp_btn_group_3_top').style.display='none'; }\r\n");
          $nm_saida->saida("           </script>\r\n");
      }
      if (is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Img_sep_grid))
      {
          if ($NM_btn)
          {
              $NM_btn = false;
              $NM_ult_sep = "NM_sep_2";
              $nm_saida->saida("          <img id=\"NM_sep_2\" class=\"NM_toolbar_sep\" src=\"" . $this->Ini->path_img_global . $this->Ini->Img_sep_grid . "\" align=\"absmiddle\" style=\"vertical-align: middle;\">\r\n");
          }
      }
          if ($this->nmgp_botoes['summary'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
          {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['SC_Gb_Free_cmp']))
            { }
            else {
              $this->nm_btn_exist['summary'][] = "res_top";
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['where_resumo'])) {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "nm_gp_move('resumo', '0');", "nm_gp_move('resumo', '0');", "res_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              } 
              else { 
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bresumo", "nm_gp_move('resumo', '0');", "nm_gp_move('resumo', '0');", "res_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              } 
              $nm_saida->saida("           $Cod_Btn \r\n");
                  $NM_btn = true;
            }
          }
          if ($this->nmgp_botoes['reload'] == "on")
          {
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "breload", "nm_gp_submit_ajax ('igual', 'breload');", "nm_gp_submit_ajax ('igual', 'breload');", "reload_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          if (is_file("grid_dbo_view_resumo_servico_por_profissional_especialidade_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_dbo_view_resumo_servico_por_profissional_especialidade_help.txt"); 
             if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
             {
                 $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
                 $Tmp = explode(";", $Arq_WebHelp[0]); 
                 foreach ($Tmp as $Cada_help)
                 {
                     $Tmp1 = explode(":", $Cada_help); 
                     if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "cons" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
                     {
                        $Cod_Btn = nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "help_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                        $nm_saida->saida("           $Cod_Btn \r\n");
                        $NM_btn = true;
                     }
                 }
             }
          }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['b_sair'] || $this->grid_emb_form || $this->grid_emb_form_full || (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['dashboard_info']['under_dashboard']))
      {
         $this->nmgp_botoes['exit'] = "off"; 
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_psq'])
      {
          $this->nm_btn_exist['exit'][] = "sai_top";
         if ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") 
         { 
            $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='$nm_url_saida'; document.F5.submit();", "document.F5.action='$nm_url_saida'; document.F5.submit();", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
            $nm_saida->saida("           $Cod_Btn \r\n");
            $NM_btn = true;
         } 
         elseif (!$this->Ini->SC_Link_View && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") 
         { 
            $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsair", "document.F5.action='$nm_url_saida'; document.F5.submit();", "document.F5.action='$nm_url_saida'; document.F5.submit();", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
            $nm_saida->saida("           $Cod_Btn \r\n");
            $NM_btn = true;
         } 
      }
      elseif ($this->nmgp_botoes['exit'] == "on")
      {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['sc_modal'])
        {
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "self.parent.tb_remove()", "self.parent.tb_remove()", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
        }
        else
        {
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "window.close();", "window.close();", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
        }
         $nm_saida->saida("           $Cod_Btn \r\n");
         $NM_btn = true;
      }
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td> \r\n");
      $nm_saida->saida("     </form> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      if (!$NM_btn && isset($NM_ult_sep))
      {
          $nm_saida->saida("     <script language=\"javascript\">\r\n");
          $nm_saida->saida("        document.getElementById('" . $NM_ult_sep . "').style.display='none';\r\n");
          $nm_saida->saida("     </script>\r\n");
      }
   }
   function nmgp_barra_bot_mobile()
   {
      global 
             $nm_saida, $nm_url_saida, $nm_apl_dependente;
      $NM_btn  = false;
      $NM_Gbtn = false;
      $this->NM_calc_span();
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      <form id=\"id_F0_bot\" name=\"F0_bot\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
      $nm_saida->saida("      <input type=\"text\" id=\"id_sc_truta_f0_bot\" name=\"sc_truta_f0_bot\" value=\"\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"script_init_f0_bot\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"opcao_f0_bot\" name=\"nmgp_opcao\" value=\"muda_qt_linhas\"/> \r\n");
      $nm_saida->saida("      </td></tr><tr id=\"sc_grid_toobar_bot_tr\">\r\n");
      $nm_saida->saida("       <td id=\"sc_grid_toobar_bot\"  class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      $nm_saida->saida("        <table id=\"sc_grid_toobar_bot_table\" class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr class=\"" . $this->css_scGridToolbarPadd . "_tr\"> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao_print'] != "print") 
      {
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['goto'] == "on" && $this->Ini->Apl_paginacao != "FULL" )
          {
              $Reg_Page  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_lin_grid'];
              $this->nm_btn_exist['goto'][] = "brec_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "birpara", "document.F0_bot.nmgp_opcao.value='muda_rec_linhas';document.F0_bot.rec.value = ((document.F0_bot.rec.value - 1) * " . NM_encode_input($Reg_Page) . ") + 1; document.F0_bot.submit();", "document.F0_bot.nmgp_opcao.value='muda_rec_linhas';document.F0_bot.rec.value = ((document.F0_bot.rec.value - 1) * " . NM_encode_input($Reg_Page) . ") + 1; document.F0_bot.submit();", "brec_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $Page_Atu   = ceil($this->nmgp_reg_inicial / $Reg_Page);
              $nm_saida->saida("          <input id=\"rec_f0_bot\" type=\"text\" class=\"" . $this->css_css_toolbar_obj . "\" name=\"rec\" value=\"" . NM_encode_input($Page_Atu) . "\" style=\"width:25px;vertical-align: middle;\"/> \r\n");
              $NM_btn = true;
          }
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['qtline'] == "on" && $this->Ini->Apl_paginacao != "FULL")
          {
              $nm_saida->saida("          <span class=\"" . $this->css_css_toolbar_obj . "\" style=\"border: 0px;vertical-align: middle;\">" . $this->Ini->Nm_lang['lang_btns_rows'] . "</span>\r\n");
              $nm_saida->saida("          <select class=\"" . $this->css_css_toolbar_obj . "\" style=\"vertical-align: middle;\" id=\"quant_linhas_f0_bot\" name=\"nmgp_quant_linhas\" onchange=\"document.F0_bot.nmgp_opcao.value='muda_qt_linhas';document.F0_bot.submit();\"> \r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_lin_grid'] == 10) ? " selected" : "";
              $nm_saida->saida("           <option value=\"10\" " . $obj_sel . ">10</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_lin_grid'] == 20) ? " selected" : "";
              $nm_saida->saida("           <option value=\"20\" " . $obj_sel . ">20</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_lin_grid'] == 50) ? " selected" : "";
              $nm_saida->saida("           <option value=\"50\" " . $obj_sel . ">50</option>\r\n");
              $nm_saida->saida("          </select>\r\n");
              $NM_btn = true;
          }
          if ($this->nmgp_botoes['first'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['first'][] = "first_bot";
              if ($this->Rec_ini == 0)
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_inicio", "nm_gp_submit_rec('ini');", "nm_gp_submit_rec('ini');", "first_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "disabled", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
              else
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_inicio", "nm_gp_submit_rec('ini');", "nm_gp_submit_rec('ini');", "first_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
                  $NM_btn = true;
          }
          if ($this->nmgp_botoes['back'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['back'][] = "back_bot";
              if ($this->Rec_ini == 0)
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_retorna", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "back_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "disabled", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
              else
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_retorna", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "back_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
                  $NM_btn = true;
          }
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['navpage'] == "on" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_liga']['nav']) && $this->Ini->Apl_paginacao != "FULL" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_lin_grid'] != "all")
          {
              $Reg_Page  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['qt_lin_grid'];
              $Max_link   = 5;
              $Mid_link   = ceil($Max_link / 2);
              $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
              $Qtd_Pages  = ceil($this->count_ger / $Reg_Page);
              $Page_Atu   = ceil($this->nmgp_reg_final / $Reg_Page);
              $Link_ini   = 1;
              if ($Page_Atu > $Max_link)
              {
                  $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
              }
              elseif ($Page_Atu > $Mid_link)
              {
                  $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
              }
              if (($Qtd_Pages - $Link_ini) < $Max_link)
              {
                  $Link_ini = ($Qtd_Pages - $Max_link) + 1;
              }
              if ($Link_ini < 1)
              {
                  $Link_ini = 1;
              }
              for ($x = 0; $x < $Max_link && $Link_ini <= $Qtd_Pages; $x++)
              {
                  $rec = (($Link_ini - 1) * $Reg_Page) + 1;
                  if ($Link_ini == $Page_Atu)
                  {
                      $nm_saida->saida("            <span class=\"scGridToolbarNavOpen\" style=\"vertical-align: middle;\">" . $Link_ini . "</span>\r\n");
                  }
                  else
                  {
                      $nm_saida->saida("            <a class=\"scGridToolbarNav\" style=\"vertical-align: middle;\" href=\"javascript: nm_gp_submit_rec(" . $rec . ");\">" . $Link_ini . "</a>\r\n");
                  }
                  $Link_ini++;
                  if (($x + 1) < $Max_link && $Link_ini <= $Qtd_Pages && '' != $this->Ini->Str_toolbarnav_separator && @is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator))
                  {
                      $nm_saida->saida("            <img src=\"" . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator . "\" align=\"absmiddle\" style=\"vertical-align: middle;\">\r\n");
                  }
              }
              $NM_btn = true;
          }
          if ($this->nmgp_botoes['forward'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['forward'][] = "forward_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_avanca", "nm_gp_submit_rec('" . $this->Rec_fim . "');", "nm_gp_submit_rec('" . $this->Rec_fim . "');", "forward_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          if ($this->nmgp_botoes['last'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['last'][] = "last_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_final", "nm_gp_submit_rec('fim');", "nm_gp_submit_rec('fim');", "last_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          if ($this->nmgp_botoes['rows'] == "on" && empty($this->nm_grid_sem_reg))
          {
              $nm_sumario = "[" . $this->Ini->Nm_lang['lang_othr_smry_info'] . "]";
              $nm_sumario = str_replace("?start?", $this->nmgp_reg_inicial, $nm_sumario);
              if ($this->Ini->Apl_paginacao == "FULL")
              {
                  $nm_sumario = str_replace("?final?", "<span class='sm_counter_final'>".$this->count_ger."</span>", $nm_sumario);
              }
              else
              {
                  $nm_sumario = str_replace("?final?", "<span class='sm_counter_final'>".$this->nmgp_reg_final."</span>", $nm_sumario);
              }
              $nm_sumario = str_replace("?total?", "<span class='sm_counter_total'>".$this->count_ger."</span>", $nm_sumario);
              $nm_saida->saida("           <span class=\"summary_indicator " . $this->css_css_toolbar_obj . "\" style=\"border:0px;\"><span class='sm_counter'>" . $nm_sumario . "</span></span>\r\n");
              $NM_btn = true;
          }
          if (is_file("grid_dbo_view_resumo_servico_por_profissional_especialidade_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_dbo_view_resumo_servico_por_profissional_especialidade_help.txt"); 
             if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
             {
                 $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
                 $Tmp = explode(";", $Arq_WebHelp[0]); 
                 foreach ($Tmp as $Cada_help)
                 {
                     $Tmp1 = explode(":", $Cada_help); 
                     if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "cons" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
                     {
                        $Cod_Btn = nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "help_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                        $nm_saida->saida("           $Cod_Btn \r\n");
                        $NM_btn = true;
                     }
                 }
             }
          }
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td> \r\n");
      $nm_saida->saida("     </form> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      if (!$NM_btn && isset($NM_ult_sep))
      {
          $nm_saida->saida("     <script language=\"javascript\">\r\n");
          $nm_saida->saida("        document.getElementById('" . $NM_ult_sep . "').style.display='none';\r\n");
          $nm_saida->saida("     </script>\r\n");
      }
   }
   function nmgp_barra_top()
   {
       if (isset($_SESSION['scriptcase']['proc_mobile']) && $_SESSION['scriptcase']['proc_mobile'])
       {
           $this->nmgp_barra_top_mobile();
           $this->nmgp_embbed_placeholder_top();
       }
       if (!isset($_SESSION['scriptcase']['proc_mobile']) || !$_SESSION['scriptcase']['proc_mobile'])
       {
           $this->nmgp_barra_top_normal();
           $this->nmgp_embbed_placeholder_top();
       }
   }
   function nmgp_barra_bot()
   {
       if (isset($_SESSION['scriptcase']['proc_mobile']) && $_SESSION['scriptcase']['proc_mobile'])
       {
           $this->nmgp_embbed_placeholder_bot();
           $this->nmgp_barra_bot_mobile();
       }
       if (!isset($_SESSION['scriptcase']['proc_mobile']) || !$_SESSION['scriptcase']['proc_mobile'])
       {
           $this->nmgp_embbed_placeholder_bot();
           $this->nmgp_barra_bot_normal();
       }
   }
   function nmgp_embbed_placeholder_top()
   {
      global $nm_saida;
      $nm_saida->saida("     <tr id=\"sc_id_save_grid_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_groupby_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_sel_campos_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_export_email_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_order_campos_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
   }
   function nmgp_embbed_placeholder_bot()
   {
      global $nm_saida;
      $nm_saida->saida("     <tr id=\"sc_id_save_grid_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_groupby_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_sel_campos_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_export_email_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_order_campos_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
   }
    function getFieldHighlight($filter_type, $field, $str_value, $str_value_original='')
    {
        $str_html_ini = '<div class="highlight">';
        $str_html_fim = '</div>';

        if($filter_type == 'advanced_search')
        {
            if (
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campos_busca'][ $field ]) &&
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campos_busca'][ $field . "_cond" ]) &&
                !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campos_busca'][ $field ]) &&
                (
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campos_busca'][ $field . "_cond"] == 'qp' ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campos_busca'][ $field . "_cond"] == 'eq' ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campos_busca'][ $field . "_cond"] == 'ii'
                )
            )
            {
                if($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campos_busca'][ $field . "_cond"] == 'qp')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campos_busca'][ $field ], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campos_busca'][ $field ], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    else
                    {
                        $keywords = preg_quote($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campos_busca'][ $field ], '/');
                        $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campos_busca'][ $field . "_cond"] == 'eq')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campos_busca'][ $field ], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campos_busca'][ $field ], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campos_busca'][ $field . "_cond"] == 'ii')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campos_busca'][ $field ], substr($str_value, 0, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campos_busca'][ $field ]))) == 0)
                    {
                        $str_value = $str_html_ini. substr($str_value, 0, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campos_busca'][ $field ])) .$str_html_fim . substr($str_value, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campos_busca'][ $field ]));
                    }
                }
            }
        }
        elseif($filter_type == 'quicksearch')
        {
            if(
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['fast_search'][0]) &&
                (
                    (
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['fast_search'][0] == 'SC_all_Cmp' &&
                    in_array($field, array('nome_razao_social', 'contratos', 'profissional', 'atividade', 'descricao_especialidade', 'descricao_servico'))
                    ) ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['fast_search'][0] == $field ||
                    strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['fast_search'][0], $field . '_VLS_') !== false ||
                    strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['fast_search'][0], '_VLS_' . $field) !== false
                )
            )
            {
                if($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['fast_search'][1] == 'qp')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['fast_search'][2], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(!empty($str_value_original) && $str_value_original != '&nbsp;' && strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['fast_search'][2], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    else
                    {
                        $keywords = preg_quote($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['fast_search'][2], '/');
                        $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['fast_search'][1] == 'eq')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['fast_search'][2], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(!empty($str_value_original) && $str_value_original != '&nbsp;' && strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['fast_search'][2], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                }
            }
        }
        return $str_value;
    }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $str_highlight_ini = "";
      $str_highlight_fim = "";
      if(substr($nm_campo, 0, 23) == '<div class="highlight">' && substr($nm_campo, -6) == '</div>')
      {
           $str_highlight_ini = substr($nm_campo, 0, 23);
           $str_highlight_fim = substr($nm_campo, -6);

           $trab_campo = substr($nm_campo, 23, -6);
           $tam_campo  = strlen($trab_campo);
      }      $mask_num = false;
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
              if ($cont2 >= $tam_campo)
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
          $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
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
      $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
   } 
 function check_btns()
 {
 }
 function nm_fim_grid($flag_apaga_pdf_log = TRUE)
 {
   global
   $nm_saida, $nm_url_saida, $NMSC_modal;
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']))
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']);
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']);
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'])
   { 
        return;
   } 
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("   </div>\r\n");
   $nm_saida->saida("   </TR>\r\n");
   $nm_saida->saida("   </TD>\r\n");
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("   </body>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] == "pdf" || $this->Print_All)
   { 
   $nm_saida->saida("   </HTML>\r\n");
        return;
   } 
   $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
   $nm_saida->saida("   NM_ancor_ult_lig = '';\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['embutida'])
   { 
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']))
       {
           $temp = array();
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] as $NM_aplic => $resto)
           {
               $temp[] = $NM_aplic;
           }
           $temp = array_unique($temp);
           foreach ($temp as $NM_aplic)
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ajax_nav'])
               { 
                   $this->Ini->Arr_result['setArr'][] = array('var' => ' NM_tab_' . $NM_aplic, 'value' => '');
               } 
               $nm_saida->saida("   NM_tab_" . $NM_aplic . " = new Array();\r\n");
           }
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] as $NM_aplic => $resto)
           {
               foreach ($resto as $NM_ind => $NM_quebra)
               {
                   foreach ($NM_quebra as $NM_nivel => $NM_tipo)
                   {
                       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['ajax_nav'])
                       { 
                           $this->Ini->Arr_result['setVar'][] = array('var' => ' NM_tab_' . $NM_aplic . '[' . $NM_ind . ']', 'value' => $NM_tipo . $NM_nivel);
                       } 
                       $nm_saida->saida("   NM_tab_" . $NM_aplic . "[" . $NM_ind . "] = '" . $NM_tipo . $NM_nivel . "';\r\n");
                   }
               }
           }
       }
   }
   $nm_saida->saida("   function NM_liga_tbody(tbody, Obj, Apl)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      Nivel = parseInt (Obj[tbody].substr(3));\r\n");
   $nm_saida->saida("      for (ind = tbody + 1; ind < Obj.length; ind++)\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("           Nv = parseInt (Obj[ind].substr(3));\r\n");
   $nm_saida->saida("           Tp = Obj[ind].substr(0, 3);\r\n");
   $nm_saida->saida("           if (Nivel == Nv && Tp == 'top')\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               break;\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           if (((Nivel + 1) == Nv && Tp == 'top') || (Nivel == Nv && Tp == 'bot'))\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               document.getElementById('tbody_' + Apl + '_' + ind + '_' + Tp).style.display='';\r\n");
   $nm_saida->saida("           } \r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function NM_apaga_tbody(tbody, Obj, Apl)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      Nivel = Obj[tbody].substr(3);\r\n");
   $nm_saida->saida("      for (ind = tbody + 1; ind < Obj.length; ind++)\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("           Nv = Obj[ind].substr(3);\r\n");
   $nm_saida->saida("           Tp = Obj[ind].substr(0, 3);\r\n");
   $nm_saida->saida("           if ((Nivel == Nv && Tp == 'top') || Nv < Nivel)\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               break;\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           if ((Nivel != Nv) || (Nivel == Nv && Tp == 'bot'))\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               document.getElementById('tbody_' + Apl + '_' + ind + '_' + Tp).style.display='none';\r\n");
   $nm_saida->saida("               if (Tp == 'top')\r\n");
   $nm_saida->saida("               {\r\n");
   $nm_saida->saida("                   document.getElementById('b_open_' + Apl + '_' + ind).style.display='';\r\n");
   $nm_saida->saida("                   document.getElementById('b_close_' + Apl + '_' + ind).style.display='none';\r\n");
   $nm_saida->saida("               } \r\n");
   $nm_saida->saida("           } \r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   NM_obj_ant = '';\r\n");
   $nm_saida->saida("   function NM_apaga_div_lig(obj_nome)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      if (NM_obj_ant != '')\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          NM_obj_ant.style.display='none';\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      obj = document.getElementById(obj_nome);\r\n");
   $nm_saida->saida("      NM_obj_ant = obj;\r\n");
   $nm_saida->saida("      ind_time = setTimeout(\"obj.style.display='none'\", 300);\r\n");
   $nm_saida->saida("      return ind_time;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function NM_btn_disable()\r\n");
   $nm_saida->saida("   {\r\n");
   foreach ($this->nm_btn_disabled as $cod_btn => $st_btn) {
      if (isset($this->nm_btn_exist[$cod_btn]) && $st_btn == 'on') {
         foreach ($this->nm_btn_exist[$cod_btn] as $cada_id) {
       $nm_saida->saida("     $('#" . $cada_id . "').prop('onclick', null).off('click').addClass('disabled').removeAttr('href');\r\n");
       $nm_saida->saida("     $('#div_" . $cada_id . "').addClass('disabled');\r\n");
         }
      }
   }
   $nm_saida->saida("   }\r\n");
   $str_pbfile = $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
   if (@is_file($str_pbfile) && $flag_apaga_pdf_log)
   {
      @unlink($str_pbfile);
   }
   if ($this->Rec_ini == 0 && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf" && !$_SESSION['scriptcase']['proc_mobile'])
   { 
       $nm_saida->saida("   document.getElementById('first_bot').disabled = true;\r\n");
       $nm_saida->saida("   document.getElementById('back_bot').disabled = true;\r\n");
   } 
   elseif ($this->Rec_ini == 0 && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf" && $_SESSION['scriptcase']['proc_mobile'])
   { 
       $nm_saida->saida("   document.getElementById('first_bot').disabled = true;\r\n");
       $nm_saida->saida("   document.getElementById('back_bot').disabled = true;\r\n");
   } 
   if ($this->rs_grid->EOF && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf")
   {
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_liga']['nav']) && !$_SESSION['scriptcase']['proc_mobile'])
       { 
           { 
               $nm_saida->saida("   document.getElementById('forward_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('forward_bot').className = \"scButton_" . $this->arr_buttons['bcons_avanca']['style'] . " disabled\";\r\n");
               if ($this->arr_buttons['bcons_avanca']['display'] == 'only_img' || $this->arr_buttons['bcons_avanca']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_forward_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca']['image'] . "\";\r\n");
               } 
           } 
           { 
               $nm_saida->saida("   document.getElementById('last_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('last_bot').className = \"scButton_" . $this->arr_buttons['bcons_final']['style'] . " disabled\";\r\n");
               if ($this->arr_buttons['bcons_final']['display'] == 'only_img' || $this->arr_buttons['bcons_final']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_last_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final']['image'] . "\";\r\n");
               } 
           } 
       } 
       elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opcao'] != "pdf" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['opc_liga']['nav']) && $_SESSION['scriptcase']['proc_mobile'])
       { 
           { 
               $nm_saida->saida("   document.getElementById('forward_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('forward_bot').className = \"scButton_" . $this->arr_buttons['bcons_avanca']['style'] . " disabled\";\r\n");
               if ($this->arr_buttons['bcons_avanca']['display'] == 'only_img' || $this->arr_buttons['bcons_avanca']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_forward_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca']['image'] . "\";\r\n");
               } 
           } 
           { 
               $nm_saida->saida("   document.getElementById('last_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('last_bot').className = \"scButton_" . $this->arr_buttons['bcons_final']['style'] . " disabled\";\r\n");
               if ($this->arr_buttons['bcons_final']['display'] == 'only_img' || $this->arr_buttons['bcons_final']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_last_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final']['image'] . "\";\r\n");
               } 
           } 
       } 
       $nm_saida->saida("   nm_gp_fim = \"fim\";\r\n");
   }
   else
   {
       $nm_saida->saida("   nm_gp_fim = \"\";\r\n");
   }
   if (isset($this->redir_modal) && !empty($this->redir_modal))
   {
       echo $this->redir_modal;
   }
   $nm_saida->saida("   </script>\r\n");
   if ($this->grid_emb_form || $this->grid_emb_form_full)
   {
       $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
       $nm_saida->saida("      window.onload = function() {\r\n");
       $nm_saida->saida("         setTimeout(\"parent.scAjaxDetailHeight('grid_dbo_view_resumo_servico_por_profissional_especialidade', $(document).innerHeight())\",50);\r\n");
       $nm_saida->saida("      }\r\n");
       $nm_saida->saida("   </script>\r\n");
   }
   $nm_saida->saida("   </HTML>\r\n");
 }
//--- 
//--- 
 function form_navegacao()
 {
   global
   $nm_saida, $nm_url_saida;
   $str_pbfile = $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
   $nm_saida->saida("   <form name=\"F3\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_chave\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_ordem\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_lig_apl_orig\" value=\"grid_dbo_view_resumo_servico_por_profissional_especialidade\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parm_acum\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_quant_linhas\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_url_saida\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parms\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_tipo_pdf\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_outra_jan\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_orig_pesq\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_module_export\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F4\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"rec\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"rec\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_call_php\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F5\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"grid_dbo_view_resumo_servico_por_profissional_especialidade_pesq.class.php\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F6\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"Fprint\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"grid_dbo_view_resumo_servico_por_profissional_especialidade_iframe_prt.php\" \r\n");
   $nm_saida->saida("                     target=\"jan_print\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"path_botoes\" value=\"" . $this->Ini->path_botoes . "\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"opcao\" value=\"print\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"print\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"tp_print\" value=\"RC\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"cor_print\" value=\"PB\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"print\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_tipo_print\" value=\"RC\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_cor_print\" value=\"PB\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_module_export\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_password\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"Fexport\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_tp_xls\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_tot_xls\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_module_export\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_delim_line\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_delim_col\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_delim_dados\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_label_csv\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_xml_tag\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_xml_label\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_json_format\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_json_label\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_password\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("  <form name=\"Fdoc_word\" method=\"post\" \r\n");
   $nm_saida->saida("        action=\"./\" \r\n");
   $nm_saida->saida("        target=\"_self\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"doc_word\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_cor_word\" value=\"CO\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_module_export\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_password\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_navegator_print\" value=\"\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("  </form> \r\n");
   $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
   $nm_saida->saida("    document.Fdoc_word.nmgp_navegator_print.value = navigator.appName;\r\n");
   $nm_saida->saida("   function nm_gp_word_conf(cor, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\"+ str_type +\"&sAdd=__E__nmgp_cor_word=\" + cor + \"__E__SC_module_export=\" + SC_module_export + \"__E__nmgp_password=\" + password + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fdoc_word.nmgp_cor_word.value = cor;\r\n");
   $nm_saida->saida("           document.Fdoc_word.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fdoc_word.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fdoc_word.action = \"grid_dbo_view_resumo_servico_por_profissional_especialidade_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fdoc_word.submit();\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   var obj_tr      = \"\";\r\n");
   $nm_saida->saida("   var css_tr      = \"\";\r\n");
   $nm_saida->saida("   var field_over  = " . $this->NM_field_over . ";\r\n");
   $nm_saida->saida("   var field_click = " . $this->NM_field_click . ";\r\n");
   $nm_saida->saida("   function over_tr(obj, class_obj)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (field_over != 1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (obj_tr == obj)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       obj.className = '" . $this->css_scGridFieldOver . "';\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function out_tr(obj, class_obj)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (field_over != 1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (obj_tr == obj)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       obj.className = class_obj;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function click_tr(obj, class_obj)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (field_click != 1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (obj_tr != \"\")\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           obj_tr.className = css_tr;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       css_tr        = class_obj;\r\n");
   $nm_saida->saida("       if (obj_tr == obj)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           obj_tr     = '';\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       obj_tr        = obj;\r\n");
   $nm_saida->saida("       css_tr        = class_obj;\r\n");
   $nm_saida->saida("       obj.className = '" . $this->css_scGridFieldClick . "';\r\n");
   $nm_saida->saida("   }\r\n");
   if ($this->Rec_ini == 0)
   {
       $nm_saida->saida("   nm_gp_ini = \"ini\";\r\n");
   }
   else
   {
       $nm_saida->saida("   nm_gp_ini = \"\";\r\n");
   }
   $nm_saida->saida("   nm_gp_rec_ini = \"" . $this->Rec_ini . "\";\r\n");
   $nm_saida->saida("   nm_gp_rec_fim = \"" . $this->Rec_fim . "\";\r\n");
   $nm_saida->saida("   function nm_gp_submit_rec(campo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      if (nm_gp_ini == \"ini\" && (campo == \"ini\" || campo == nm_gp_rec_ini)) \r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("          return; \r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      if (nm_gp_fim == \"fim\" && (campo == \"fim\" || campo == nm_gp_rec_fim)) \r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("          return; \r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      document.F4.target = \"_self\"; \r\n");
   $nm_saida->saida("      document.F4.rec.value = campo ;\r\n");
   $nm_saida->saida("      document.F4.nmgp_opcao.value = \"rec\" ;\r\n");
   $nm_saida->saida("      document.F4.submit() ;\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit2(campo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      document.F3.target           = \"_self\"; \r\n");
   $nm_saida->saida("      document.F3.nmgp_ordem.value = campo ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_opcao.value = \"ordem\" ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_parms.value = \"SC_null\";\r\n");
   $nm_saida->saida("      document.F3.nmgp_url_saida.value = \"\";\r\n");
   $nm_saida->saida("      document.F3.action           = \"./\"  ;\r\n");
   $nm_saida->saida("      document.F3.submit() ;\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit3(parms, parm_acum, opc, ancor) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      document.F3.target               = \"_self\"; \r\n");
   $nm_saida->saida("      document.F3.nmgp_parms.value     = parms ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_parm_acum.value = parm_acum ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_opcao.value     = opc ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_url_saida.value = \"\";\r\n");
   $nm_saida->saida("      document.F3.action               = \"./\"  ;\r\n");
   $nm_saida->saida("      if (ancor != null) {\r\n");
   $nm_saida->saida("         ajax_save_ancor(\"F3\", ancor);\r\n");
   $nm_saida->saida("      } else {\r\n");
   $nm_saida->saida("          document.F3.submit() ;\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_open_export(arq_export) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      window.location = arq_export;\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_submit_modal(parms, t_parent) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      if (t_parent == 'S' && typeof parent.tb_show == 'function')\r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("           parent.tb_show('', parms, '');\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      else\r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("         tb_show('', parms, '');\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_move(tipo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      document.F6.target = \"_self\"; \r\n");
   $nm_saida->saida("      document.F6.submit() ;\r\n");
   $nm_saida->saida("      return;\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_move(x, y, z, p, g, crt, ajax, chart_level, page_break_pdf, SC_module_export, use_pass_pdf, pdf_all_cab, pdf_all_label, pdf_label_group, pdf_zip) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("       document.F3.action           = \"./\"  ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_parms.value = \"SC_null\" ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_orig_pesq.value = \"\" ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_url_saida.value = \"\" ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_opcao.value = x; \r\n");
   $nm_saida->saida("       document.F3.nmgp_outra_jan.value = \"\" ;\r\n");
   $nm_saida->saida("       document.F3.target = \"_self\"; \r\n");
   $nm_saida->saida("       if (y == 1) \r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.F3.target = \"_blank\"; \r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (\"busca\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.F3.nmgp_orig_pesq.value = z; \r\n");
   $nm_saida->saida("           z = '';\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (z != null && z != '') \r\n");
   $nm_saida->saida("       { \r\n");
   $nm_saida->saida("           document.F3.nmgp_tipo_pdf.value = z; \r\n");
   $nm_saida->saida("       } \r\n");
   $nm_saida->saida("       if (\"xls\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.F3.SC_module_export.value = z;\r\n");
   if (!extension_loaded("zip"))
   {
       $nm_saida->saida("           alert (\"" . html_entity_decode($this->Ini->Nm_lang['lang_othr_prod_xtzp'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\");\r\n");
       $nm_saida->saida("           return false;\r\n");
   } 
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (\"xml\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.F3.SC_module_export.value = z;\r\n");
   $nm_saida->saida("       }\r\n");
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['grid_dbo_view_resumo_servico_por_profissional_especialidade_iframe_params'] = array(
       'str_tmp'          => $this->Ini->path_imag_temp,
       'str_prod'         => $this->Ini->path_prod,
       'str_btn'          => $this->Ini->Str_btn_css,
       'str_lang'         => $this->Ini->str_lang,
       'str_schema'       => $this->Ini->str_schema_all,
       'str_google_fonts' => $this->Ini->str_google_fonts,
   );
   $prep_parm_pdf = "scsess?#?" . session_id() . "?@?str_tmp?#?" . $this->Ini->path_imag_temp . "?@?str_prod?#?" . $this->Ini->path_prod . "?@?str_btn?#?" . $this->Ini->Str_btn_css . "?@?str_lang?#?" . $this->Ini->str_lang . "?@?str_schema?#?"  . $this->Ini->str_schema_all . "?@?script_case_init?#?" . $this->Ini->sc_page . "?@?jspath?#?" . $this->Ini->path_js . "?#?";
   $Md5_pdf    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_dbo_view_resumo_servico_por_profissional_especialidade@SC_par@" . md5($prep_parm_pdf);
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['Md5_pdf'][md5($prep_parm_pdf)] = $prep_parm_pdf;
   $nm_saida->saida("       if (\"pdf\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           if (\"S\" == ajax)\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               $('#TB_window').remove();\r\n");
   $nm_saida->saida("               $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=pdf&sAdd=__E__nmgp_tipo_pdf=\" + z + \"__E__sc_parms_pdf=\" + p + \"__E__sc_create_charts=\" + crt + \"__E__sc_graf_pdf=\" + g + \"__E__chart_level=\" + chart_level + \"__E__page_break_pdf=\" + page_break_pdf + \"__E__SC_module_export=\" + SC_module_export + \"__E__use_pass_pdf=\" + use_pass_pdf + \"__E__pdf_all_cab=\" + pdf_all_cab + \"__E__pdf_all_label=\" +  pdf_all_label + \"__E__pdf_label_group=\" +  pdf_label_group + \"__E__pdf_zip=\" +  pdf_zip + \"&nm_opc=pdf&KeepThis=true&TB_iframe=true&modal=true\", '');\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           else\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               window.location = \"" . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_iframe.php?nmgp_parms=" . $Md5_pdf . "&sc_tp_pdf=\" + z + \"&sc_parms_pdf=\" + p + \"&sc_create_charts=\" + crt + \"&sc_graf_pdf=\" + g + '&chart_level=' + chart_level + '&page_break_pdf=' + page_break_pdf + '&SC_module_export=' + SC_module_export + '&use_pass_pdf=' + use_pass_pdf + '&pdf_all_cab=' + pdf_all_cab + '&pdf_all_label=' +  pdf_all_label + '&pdf_label_group=' +  pdf_label_group + '&pdf_zip=' +  pdf_zip ;\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           if ((x == 'igual' || x == 'edit') && NM_ancor_ult_lig != \"\")\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("                ajax_save_ancor(\"F3\", NM_ancor_ult_lig);\r\n");
   $nm_saida->saida("                NM_ancor_ult_lig = \"\";\r\n");
   $nm_saida->saida("            } else {\r\n");
   $nm_saida->saida("                document.F3.submit() ;\r\n");
   $nm_saida->saida("            } \r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_print_conf(tp, cor, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\"+ str_type +\"&sAdd=__E__nmgp_tipo_print=\" + tp + \"__E__cor_print=\" + cor + \"__E__SC_module_export=\" + SC_module_export + \"__E__nmgp_password=\" + password + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fprint.tp_print.value = tp;\r\n");
   $nm_saida->saida("           document.Fprint.cor_print.value = cor;\r\n");
   $nm_saida->saida("           document.Fprint.nmgp_tipo_print.value = tp;\r\n");
   $nm_saida->saida("           document.Fprint.nmgp_cor_print.value = cor;\r\n");
   $nm_saida->saida("           document.Fprint.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fprint.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           if (password != \"\")\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               document.Fprint.target = '_self';\r\n");
   $nm_saida->saida("               document.Fprint.action = \"grid_dbo_view_resumo_servico_por_profissional_especialidade_export_ctrl.php\";\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           else\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               window.open('','jan_print','location=no,menubar=no,resizable,scrollbars,status=no,toolbar=no');\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           document.Fprint.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_xls_conf(tp_xls, SC_module_export, password, tot_xls, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__SC_module_export=\" + SC_module_export + \"__E__nmgp_tp_xls=\" + tp_xls + \"__E__nmgp_tot_xls=\" + tot_xls + \"__E__nmgp_password=\" + password + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value = \"xls\";\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_tp_xls.value = tp_xls;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_tot_xls.value = tot_xls;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_dbo_view_resumo_servico_por_profissional_especialidade_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_csv_conf(delim_line, delim_col, delim_dados, label_csv, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_delim_line=\" + delim_line + \"__E__nm_delim_col=\" + delim_col + \"__E__nm_delim_dados=\" + delim_dados + \"__E__nm_label_csv=\" + label_csv + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value = \"csv\";\r\n");
   $nm_saida->saida("           document.Fexport.nm_delim_line.value = delim_line;\r\n");
   $nm_saida->saida("           document.Fexport.nm_delim_col.value = delim_col;\r\n");
   $nm_saida->saida("           document.Fexport.nm_delim_dados.value = delim_dados;\r\n");
   $nm_saida->saida("           document.Fexport.nm_label_csv.value = label_csv;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_dbo_view_resumo_servico_por_profissional_especialidade_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_xml_conf(xml_tag, xml_label, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_xml_tag=\" + xml_tag + \"__E__nm_xml_label=\" + xml_label + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value   = \"xml\";\r\n");
   $nm_saida->saida("           document.Fexport.nm_xml_tag.value   = xml_tag;\r\n");
   $nm_saida->saida("           document.Fexport.nm_xml_label.value = xml_label;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_dbo_view_resumo_servico_por_profissional_especialidade_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_json_conf(json_format, json_label, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_dbo_view_resumo_servico_por_profissional_especialidade/grid_dbo_view_resumo_servico_por_profissional_especialidade_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_json_format=\" + json_format + \"__E__nm_json_label=\" + json_label + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value       = \"json\";\r\n");
   $nm_saida->saida("           document.Fexport.nm_json_format.value   = json_format;\r\n");
   $nm_saida->saida("           document.Fexport.nm_json_label.value    = json_label;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value    = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_dbo_view_resumo_servico_por_profissional_especialidade_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_rtf_conf()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       document.Fexport.nmgp_opcao.value   = \"rtf\";\r\n");
   $nm_saida->saida("       document.Fexport.action = \"grid_dbo_view_resumo_servico_por_profissional_especialidade_export_ctrl.php\";\r\n");
   $nm_saida->saida("       document.Fexport.submit() ;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   nm_img = new Image();\r\n");
   $nm_saida->saida("   function nm_mostra_img(imagem, altura, largura)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       var image = new Image();\r\n");
   $nm_saida->saida("       image.src = imagem;\r\n");
   $nm_saida->saida("       var viewer = new Viewer(image, {\r\n");
   $nm_saida->saida("           navbar: false,\r\n");
   $nm_saida->saida("           hidden: function () {\r\n");
   $nm_saida->saida("               viewer.destroy();\r\n");
   $nm_saida->saida("           },\r\n");
   $nm_saida->saida("       });\r\n");
   $nm_saida->saida("       viewer.show();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_mostra_doc(campo1, campo2)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       NovaJanela = window.open (campo2 + \"?nmgp_parms=\" + campo1, \"ScriptCase\", \"resizable\");\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_escreve_window()\r\n");
   $nm_saida->saida("   {\r\n");
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['form_psq_ret']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campo_psq_ret']) )
   {
      $nm_saida->saida("      if (document.Fpesq.nm_ret_psq.value != \"\")\r\n");
      $nm_saida->saida("      {\r\n");
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['sc_modal'])
      {
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['iframe_ret_cap']))
         {
             $Iframe_cap = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['iframe_ret_cap'];
             unset($_SESSION['sc_session'][$script_case_init]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['iframe_ret_cap']);
             $nm_saida->saida("           var Obj_Form  = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campo_psq_ret'] . ";\r\n");
             $nm_saida->saida("           var Obj_Form1 = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['form_psq_ret'] . "." . str_replace("_autocomp", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campo_psq_ret']) . ";\r\n");
             $nm_saida->saida("           var Obj_Doc   = parent.document.getElementById('" . $Iframe_cap . "').contentWindow;\r\n");
             $nm_saida->saida("           if (parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campo_psq_ret'] . "\"))\r\n");
             $nm_saida->saida("           {\r\n");
             $nm_saida->saida("               var Obj_Readonly = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campo_psq_ret'] . "\");\r\n");
             $nm_saida->saida("           }\r\n");
         }
         else
         {
             $nm_saida->saida("          var Obj_Form  = parent.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campo_psq_ret'] . ";\r\n");
             $nm_saida->saida("          var Obj_Form1 = parent.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['form_psq_ret'] . "." . str_replace("_autocomp", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campo_psq_ret']) . ";\r\n");
             $nm_saida->saida("          var Obj_Doc   = parent;\r\n");
             $nm_saida->saida("          if (parent.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campo_psq_ret'] . "\"))\r\n");
             $nm_saida->saida("          {\r\n");
             $nm_saida->saida("              var Obj_Readonly = parent.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campo_psq_ret'] . "\");\r\n");
             $nm_saida->saida("          }\r\n");
         }
      }
      else
      {
          $nm_saida->saida("          var Obj_Form  = opener.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campo_psq_ret'] . ";\r\n");
          $nm_saida->saida("          var Obj_Form1 = opener.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['form_psq_ret'] . "." . str_replace("_autocomp", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campo_psq_ret']) . ";\r\n");
          $nm_saida->saida("          var Obj_Doc   = opener;\r\n");
          $nm_saida->saida("          if (opener.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campo_psq_ret'] . "\"))\r\n");
          $nm_saida->saida("          {\r\n");
          $nm_saida->saida("              var Obj_Readonly = opener.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['campo_psq_ret'] . "\");\r\n");
          $nm_saida->saida("          }\r\n");
      }
          $nm_saida->saida("          else\r\n");
          $nm_saida->saida("          {\r\n");
          $nm_saida->saida("              var Obj_Readonly = null;\r\n");
          $nm_saida->saida("          }\r\n");
      $nm_saida->saida("          if (Obj_Form.value != document.Fpesq.nm_ret_psq.value)\r\n");
      $nm_saida->saida("          {\r\n");
      $nm_saida->saida("              Obj_Form.value = document.Fpesq.nm_ret_psq.value;\r\n");
      $nm_saida->saida("              if (Obj_Form != Obj_Form1 && Obj_Form1)\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Form1.value = document.Fpesq.nm_ret_psq.value;\r\n");
      $nm_saida->saida("              }\r\n");
      $nm_saida->saida("              if (null != Obj_Readonly)\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Readonly.innerHTML = document.Fpesq.nm_ret_psq.value;\r\n");
      $nm_saida->saida("              }\r\n");
     if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['js_apos_busca']))
     {
      $nm_saida->saida("              if (Obj_Doc." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['js_apos_busca'] . ")\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Doc." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['js_apos_busca'] . "();\r\n");
      $nm_saida->saida("              }\r\n");
      $nm_saida->saida("              else if (Obj_Form.onchange && Obj_Form.onchange != '')\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Form.onchange();\r\n");
      $nm_saida->saida("              }\r\n");
     }
     else
     {
      $nm_saida->saida("              if (Obj_Form.onchange && Obj_Form.onchange != '')\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Form.onchange();\r\n");
      $nm_saida->saida("              }\r\n");
     }
      $nm_saida->saida("          }\r\n");
      $nm_saida->saida("      }\r\n");
   }
   $nm_saida->saida("      document.F5.action = \"grid_dbo_view_resumo_servico_por_profissional_especialidade_fim.php\";\r\n");
   $nm_saida->saida("      document.F5.submit();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_open_popup(parms)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       NovaJanela = window.open (parms, '', 'resizable, scrollbars');\r\n");
   $nm_saida->saida("   }\r\n");
   if (($this->grid_emb_form || $this->grid_emb_form_full) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_dbo_view_resumo_servico_por_profissional_especialidade']['reg_start']))
   {
       $nm_saida->saida("      $(document).ready(function(){\r\n");
       $nm_saida->saida("         setTimeout(\"parent.scAjaxDetailStatus('grid_dbo_view_resumo_servico_por_profissional_especialidade')\",50);\r\n");
       $nm_saida->saida("         setTimeout(\"parent.scAjaxDetailHeight('grid_dbo_view_resumo_servico_por_profissional_especialidade', $(document).innerHeight())\",50);\r\n");
       $nm_saida->saida("      })\r\n");
   }
   $nm_saida->saida("   function process_hotkeys(hotkey)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      if (hotkey == 'sys_format_imp') { \r\n");
   $nm_saida->saida("         var output =  $('#print_top').click();\r\n");
   $nm_saida->saida("         return (0 < output.length);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (hotkey == 'sys_format_res') { \r\n");
   $nm_saida->saida("         var output =  $('#res_top').click();\r\n");
   $nm_saida->saida("         return (0 < output.length);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (hotkey == 'sys_format_webh') { \r\n");
   $nm_saida->saida("         var output =  $('#help_bot').click();\r\n");
   $nm_saida->saida("         return (0 < output.length);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (hotkey == 'sys_format_sai') { \r\n");
   $nm_saida->saida("         var output =  $('#sai_top').click();\r\n");
   $nm_saida->saida("         return (0 < output.length);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (hotkey == 'sys_format_ini') { \r\n");
   $nm_saida->saida("         var output =  $('#first_bot').click();\r\n");
   $nm_saida->saida("         return (0 < output.length);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (hotkey == 'sys_format_ret') { \r\n");
   $nm_saida->saida("         var output =  $('#back_bot').click();\r\n");
   $nm_saida->saida("         return (0 < output.length);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (hotkey == 'sys_format_ava') { \r\n");
   $nm_saida->saida("         var output =  $('#forward_bot').click();\r\n");
   $nm_saida->saida("         return (0 < output.length);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (hotkey == 'sys_format_fim') { \r\n");
   $nm_saida->saida("         var output =  $('#last_bot').click();\r\n");
   $nm_saida->saida("         return (0 < output.length);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("   return false;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   </script>\r\n");
 }
}
?>
