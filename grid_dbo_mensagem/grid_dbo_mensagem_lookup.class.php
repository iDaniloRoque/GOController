<?php
class grid_dbo_mensagem_lookup
{
//  
   function lookup_cod_group(&$conteudo , $group_id, $description, $dbo, $sc_groups) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $group_id . $description . $dbo . $sc_groups; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($conteudo) === "" || trim($conteudo) == "&nbsp;")
      { 
          $conteudo = "Selecione"; 
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select " . $_SESSION['group_id'] . "
      ," . $_SESSION['description'] . " from " . $_SESSION['dbo'] . "." . $_SESSION['sc_groups'] . " where " . $_SESSION['group_id'] . " = $conteudo" ; 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Ini->nm_db_conn_mssql->Execute($nm_comando)) 
      { 
          if (isset($rx->fields[1]))  
          { 
              $conteudo = trim($rx->fields[1]); 
          } 
          $save_conteudo1 = $conteudo ; 
          $rx->Close(); 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_mssql->ErrorMsg()); 
          exit; 
      } 
      if ($conteudo == "")  
      { 
          $conteudo = "Selecione"; 
          $save_conteudo1 = $conteudo ; 
      } 
   }  
}
?>
