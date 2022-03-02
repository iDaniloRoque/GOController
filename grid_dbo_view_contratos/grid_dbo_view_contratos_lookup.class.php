<?php
class grid_dbo_view_contratos_lookup
{
//  
   function lookup_sc_free_group_by_situacao(&$situacao) 
   {
      $conteudo = "" ; 
      if ($situacao == "A")
      { 
          $conteudo = "Ativo";
      } 
      if ($situacao == "I")
      { 
          $conteudo = "Inativo";
      } 
      if ($situacao == "S")
      { 
          $conteudo = "Suspenso";
      } 
      if (!empty($conteudo)) 
      { 
          $situacao = $conteudo; 
      } 
   }  
}
?>
