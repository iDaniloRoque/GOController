
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if ($("#id_ac_" + sField).length > 0) {
    if ($oField.hasClass("select2-hidden-accessible")) {
      if (false == scSetFocusOnField($oField)) {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
    else {
      if (false == scSetFocusOnField($oField)) {
        if (false == scSetFocusOnField($("#id_ac_" + sField))) {
          setTimeout(function() { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
        }
      }
      else {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["idpessoas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idempresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_pessoa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cpf_cnpj" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rg_inscricao_est" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nome_razao_social" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["inscricao_municipal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telefone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contato" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["usuario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["momento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["logradouro" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numero" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["complemento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cep" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["bairro" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["municipio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["uf" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["data_abertura_pessoas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["conselhosimounao" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idconselho_classe" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numero_conselho" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["socios" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["impostos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idpessoas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idpessoas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idempresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idempresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_pessoa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_pessoa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cpf_cnpj" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cpf_cnpj" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rg_inscricao_est" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rg_inscricao_est" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nome_razao_social" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nome_razao_social" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["inscricao_municipal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["inscricao_municipal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contato" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contato" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["usuario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["usuario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["momento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["momento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["logradouro" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["logradouro" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numero" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numero" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["complemento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["complemento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cep" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cep" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bairro" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bairro" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["municipio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["municipio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["uf" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["uf" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["data_abertura_pessoas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["data_abertura_pessoas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["conselhosimounao" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["conselhosimounao" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idconselho_classe" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idconselho_classe" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numero_conselho" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numero_conselho" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["socios" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["socios" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["impostos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["impostos" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("tipo_pessoa" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("conselhosimounao" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idconselho_classe" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("conselhosimounao" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("cpf_cnpj" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("tipo_pessoa" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val() || scEventControl_data[sFieldName]["calculated"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_idpessoas' + iSeqRow).bind('blur', function() { sc_form_dbo_pessoa_juridica_fisica_idpessoas_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_dbo_pessoa_juridica_fisica_idpessoas_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_dbo_pessoa_juridica_fisica_idpessoas_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_pessoa' + iSeqRow).bind('blur', function() { sc_form_dbo_pessoa_juridica_fisica_tipo_pessoa_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_dbo_pessoa_juridica_fisica_tipo_pessoa_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_dbo_pessoa_juridica_fisica_tipo_pessoa_onfocus(this, iSeqRow) });
  $('#id_sc_field_cpf_cnpj' + iSeqRow).bind('blur', function() { sc_form_dbo_pessoa_juridica_fisica_cpf_cnpj_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_dbo_pessoa_juridica_fisica_cpf_cnpj_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_dbo_pessoa_juridica_fisica_cpf_cnpj_onfocus(this, iSeqRow) });
  $('#id_sc_field_rg_inscricao_est' + iSeqRow).bind('blur', function() { sc_form_dbo_pessoa_juridica_fisica_rg_inscricao_est_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_dbo_pessoa_juridica_fisica_rg_inscricao_est_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_dbo_pessoa_juridica_fisica_rg_inscricao_est_onfocus(this, iSeqRow) });
  $('#id_sc_field_nome_razao_social' + iSeqRow).bind('blur', function() { sc_form_dbo_pessoa_juridica_fisica_nome_razao_social_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_dbo_pessoa_juridica_fisica_nome_razao_social_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_dbo_pessoa_juridica_fisica_nome_razao_social_onfocus(this, iSeqRow) });
  $('#id_sc_field_inscricao_municipal' + iSeqRow).bind('blur', function() { sc_form_dbo_pessoa_juridica_fisica_inscricao_municipal_onblur(this, iSeqRow) })
                                                 .bind('change', function() { sc_form_dbo_pessoa_juridica_fisica_inscricao_municipal_onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_dbo_pessoa_juridica_fisica_inscricao_municipal_onfocus(this, iSeqRow) });
  $('#id_sc_field_email' + iSeqRow).bind('blur', function() { sc_form_dbo_pessoa_juridica_fisica_email_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_dbo_pessoa_juridica_fisica_email_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_dbo_pessoa_juridica_fisica_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_telefone' + iSeqRow).bind('blur', function() { sc_form_dbo_pessoa_juridica_fisica_telefone_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_dbo_pessoa_juridica_fisica_telefone_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_dbo_pessoa_juridica_fisica_telefone_onfocus(this, iSeqRow) });
  $('#id_sc_field_data_abertura_pessoas' + iSeqRow).bind('blur', function() { sc_form_dbo_pessoa_juridica_fisica_data_abertura_pessoas_onblur(this, iSeqRow) })
                                                   .bind('change', function() { sc_form_dbo_pessoa_juridica_fisica_data_abertura_pessoas_onchange(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_dbo_pessoa_juridica_fisica_data_abertura_pessoas_onfocus(this, iSeqRow) });
  $('#id_sc_field_idempresa' + iSeqRow).bind('blur', function() { sc_form_dbo_pessoa_juridica_fisica_idempresa_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_dbo_pessoa_juridica_fisica_idempresa_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_dbo_pessoa_juridica_fisica_idempresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_logradouro' + iSeqRow).bind('blur', function() { sc_form_dbo_pessoa_juridica_fisica_logradouro_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_dbo_pessoa_juridica_fisica_logradouro_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_dbo_pessoa_juridica_fisica_logradouro_onfocus(this, iSeqRow) });
  $('#id_sc_field_numero' + iSeqRow).bind('blur', function() { sc_form_dbo_pessoa_juridica_fisica_numero_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_dbo_pessoa_juridica_fisica_numero_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_dbo_pessoa_juridica_fisica_numero_onfocus(this, iSeqRow) });
  $('#id_sc_field_complemento' + iSeqRow).bind('blur', function() { sc_form_dbo_pessoa_juridica_fisica_complemento_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_dbo_pessoa_juridica_fisica_complemento_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_dbo_pessoa_juridica_fisica_complemento_onfocus(this, iSeqRow) });
  $('#id_sc_field_cep' + iSeqRow).bind('blur', function() { sc_form_dbo_pessoa_juridica_fisica_cep_onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_dbo_pessoa_juridica_fisica_cep_onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_dbo_pessoa_juridica_fisica_cep_onfocus(this, iSeqRow) });
  $('#id_sc_field_bairro' + iSeqRow).bind('blur', function() { sc_form_dbo_pessoa_juridica_fisica_bairro_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_dbo_pessoa_juridica_fisica_bairro_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_dbo_pessoa_juridica_fisica_bairro_onfocus(this, iSeqRow) });
  $('#id_sc_field_municipio' + iSeqRow).bind('blur', function() { sc_form_dbo_pessoa_juridica_fisica_municipio_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_dbo_pessoa_juridica_fisica_municipio_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_dbo_pessoa_juridica_fisica_municipio_onfocus(this, iSeqRow) });
  $('#id_sc_field_uf' + iSeqRow).bind('blur', function() { sc_form_dbo_pessoa_juridica_fisica_uf_onblur(this, iSeqRow) })
                                .bind('change', function() { sc_form_dbo_pessoa_juridica_fisica_uf_onchange(this, iSeqRow) })
                                .bind('focus', function() { sc_form_dbo_pessoa_juridica_fisica_uf_onfocus(this, iSeqRow) });
  $('#id_sc_field_momento' + iSeqRow).bind('blur', function() { sc_form_dbo_pessoa_juridica_fisica_momento_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_dbo_pessoa_juridica_fisica_momento_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_dbo_pessoa_juridica_fisica_momento_onfocus(this, iSeqRow) });
  $('#id_sc_field_momento_hora' + iSeqRow).bind('blur', function() { sc_form_dbo_pessoa_juridica_fisica_momento_hora_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_dbo_pessoa_juridica_fisica_momento_hora_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_dbo_pessoa_juridica_fisica_momento_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_usuario' + iSeqRow).bind('blur', function() { sc_form_dbo_pessoa_juridica_fisica_usuario_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_dbo_pessoa_juridica_fisica_usuario_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_dbo_pessoa_juridica_fisica_usuario_onfocus(this, iSeqRow) });
  $('#id_sc_field_contato' + iSeqRow).bind('blur', function() { sc_form_dbo_pessoa_juridica_fisica_contato_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_dbo_pessoa_juridica_fisica_contato_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_dbo_pessoa_juridica_fisica_contato_onfocus(this, iSeqRow) });
  $('#id_sc_field_numero_conselho' + iSeqRow).bind('blur', function() { sc_form_dbo_pessoa_juridica_fisica_numero_conselho_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_dbo_pessoa_juridica_fisica_numero_conselho_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_dbo_pessoa_juridica_fisica_numero_conselho_onfocus(this, iSeqRow) });
  $('#id_sc_field_idconselho_classe' + iSeqRow).bind('blur', function() { sc_form_dbo_pessoa_juridica_fisica_idconselho_classe_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_dbo_pessoa_juridica_fisica_idconselho_classe_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_dbo_pessoa_juridica_fisica_idconselho_classe_onfocus(this, iSeqRow) });
  $('#id_sc_field_socios' + iSeqRow).bind('blur', function() { sc_form_dbo_pessoa_juridica_fisica_socios_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_dbo_pessoa_juridica_fisica_socios_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_dbo_pessoa_juridica_fisica_socios_onfocus(this, iSeqRow) });
  $('#id_sc_field_impostos' + iSeqRow).bind('blur', function() { sc_form_dbo_pessoa_juridica_fisica_impostos_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_dbo_pessoa_juridica_fisica_impostos_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_dbo_pessoa_juridica_fisica_impostos_onfocus(this, iSeqRow) });
  $('#id_sc_field_conselhosimounao' + iSeqRow).bind('blur', function() { sc_form_dbo_pessoa_juridica_fisica_conselhosimounao_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_dbo_pessoa_juridica_fisica_conselhosimounao_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_dbo_pessoa_juridica_fisica_conselhosimounao_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_dbo_pessoa_juridica_fisica_idpessoas_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_pessoa_juridica_fisica_validate_idpessoas();
  scCssBlur(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_idpessoas_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_dbo_pessoa_juridica_fisica_idpessoas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_tipo_pessoa_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_pessoa_juridica_fisica_validate_tipo_pessoa();
  scCssBlur(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_tipo_pessoa_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_dbo_pessoa_juridica_fisica_event_tipo_pessoa_onchange();
}

function sc_form_dbo_pessoa_juridica_fisica_tipo_pessoa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_cpf_cnpj_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_pessoa_juridica_fisica_validate_cpf_cnpj();
  scCssBlur(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_cpf_cnpj_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_dbo_pessoa_juridica_fisica_event_cpf_cnpj_onchange();
}

function sc_form_dbo_pessoa_juridica_fisica_cpf_cnpj_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_rg_inscricao_est_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_pessoa_juridica_fisica_validate_rg_inscricao_est();
  scCssBlur(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_rg_inscricao_est_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_dbo_pessoa_juridica_fisica_rg_inscricao_est_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_nome_razao_social_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_pessoa_juridica_fisica_validate_nome_razao_social();
  scCssBlur(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_nome_razao_social_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_dbo_pessoa_juridica_fisica_nome_razao_social_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_inscricao_municipal_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_pessoa_juridica_fisica_validate_inscricao_municipal();
  scCssBlur(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_inscricao_municipal_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_dbo_pessoa_juridica_fisica_inscricao_municipal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_email_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_pessoa_juridica_fisica_validate_email();
  scCssBlur(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_email_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_dbo_pessoa_juridica_fisica_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_telefone_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_pessoa_juridica_fisica_validate_telefone();
  scCssBlur(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_telefone_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_dbo_pessoa_juridica_fisica_telefone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_data_abertura_pessoas_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_pessoa_juridica_fisica_validate_data_abertura_pessoas();
  scCssBlur(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_data_abertura_pessoas_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_dbo_pessoa_juridica_fisica_data_abertura_pessoas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_idempresa_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_pessoa_juridica_fisica_validate_idempresa();
  scCssBlur(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_idempresa_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_dbo_pessoa_juridica_fisica_idempresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_logradouro_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_pessoa_juridica_fisica_validate_logradouro();
  scCssBlur(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_logradouro_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_dbo_pessoa_juridica_fisica_logradouro_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_numero_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_pessoa_juridica_fisica_validate_numero();
  scCssBlur(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_numero_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_dbo_pessoa_juridica_fisica_numero_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_complemento_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_pessoa_juridica_fisica_validate_complemento();
  scCssBlur(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_complemento_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_dbo_pessoa_juridica_fisica_complemento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_cep_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_pessoa_juridica_fisica_validate_cep();
  scCssBlur(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_cep_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_dbo_pessoa_juridica_fisica_cep_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_bairro_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_pessoa_juridica_fisica_validate_bairro();
  scCssBlur(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_bairro_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_dbo_pessoa_juridica_fisica_bairro_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_municipio_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_pessoa_juridica_fisica_validate_municipio();
  scCssBlur(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_municipio_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_dbo_pessoa_juridica_fisica_municipio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_uf_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_pessoa_juridica_fisica_validate_uf();
  scCssBlur(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_uf_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_dbo_pessoa_juridica_fisica_uf_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_momento_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_pessoa_juridica_fisica_validate_momento();
  scCssBlur(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_momento_hora_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_pessoa_juridica_fisica_validate_momento();
  scCssBlur(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_momento_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_dbo_pessoa_juridica_fisica_momento_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_dbo_pessoa_juridica_fisica_momento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_momento_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_usuario_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_pessoa_juridica_fisica_validate_usuario();
  scCssBlur(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_usuario_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_dbo_pessoa_juridica_fisica_usuario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_contato_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_pessoa_juridica_fisica_validate_contato();
  scCssBlur(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_contato_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_dbo_pessoa_juridica_fisica_contato_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_numero_conselho_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_pessoa_juridica_fisica_validate_numero_conselho();
  scCssBlur(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_numero_conselho_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_dbo_pessoa_juridica_fisica_numero_conselho_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_idconselho_classe_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_pessoa_juridica_fisica_validate_idconselho_classe();
  scCssBlur(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_idconselho_classe_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_dbo_pessoa_juridica_fisica_idconselho_classe_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_socios_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_pessoa_juridica_fisica_validate_socios();
  scCssBlur(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_socios_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_dbo_pessoa_juridica_fisica_socios_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_impostos_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_pessoa_juridica_fisica_validate_impostos();
  scCssBlur(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_impostos_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_dbo_pessoa_juridica_fisica_impostos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_conselhosimounao_onblur(oThis, iSeqRow) {
  do_ajax_form_dbo_pessoa_juridica_fisica_validate_conselhosimounao();
  scCssBlur(oThis);
}

function sc_form_dbo_pessoa_juridica_fisica_conselhosimounao_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_dbo_pessoa_juridica_fisica_event_conselhosimounao_onchange();
}

function sc_form_dbo_pessoa_juridica_fisica_conselhosimounao_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
	if ("1" == block) {
		displayChange_block_1(status);
	}
	if ("2" == block) {
		displayChange_block_2(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("idpessoas", "", status);
	displayChange_field("idempresa", "", status);
	displayChange_field("tipo_pessoa", "", status);
	displayChange_field("cpf_cnpj", "", status);
	displayChange_field("rg_inscricao_est", "", status);
	displayChange_field("nome_razao_social", "", status);
	displayChange_field("inscricao_municipal", "", status);
	displayChange_field("email", "", status);
	displayChange_field("telefone", "", status);
	displayChange_field("contato", "", status);
	displayChange_field("usuario", "", status);
	displayChange_field("momento", "", status);
	displayChange_field("logradouro", "", status);
	displayChange_field("numero", "", status);
	displayChange_field("complemento", "", status);
	displayChange_field("cep", "", status);
	displayChange_field("bairro", "", status);
	displayChange_field("municipio", "", status);
	displayChange_field("uf", "", status);
	displayChange_field("data_abertura_pessoas", "", status);
	displayChange_field("conselhosimounao", "", status);
	displayChange_field("idconselho_classe", "", status);
	displayChange_field("numero_conselho", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("socios", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("impostos", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_idpessoas(row, status);
	displayChange_field_idempresa(row, status);
	displayChange_field_tipo_pessoa(row, status);
	displayChange_field_cpf_cnpj(row, status);
	displayChange_field_rg_inscricao_est(row, status);
	displayChange_field_nome_razao_social(row, status);
	displayChange_field_inscricao_municipal(row, status);
	displayChange_field_email(row, status);
	displayChange_field_telefone(row, status);
	displayChange_field_contato(row, status);
	displayChange_field_usuario(row, status);
	displayChange_field_momento(row, status);
	displayChange_field_logradouro(row, status);
	displayChange_field_numero(row, status);
	displayChange_field_complemento(row, status);
	displayChange_field_cep(row, status);
	displayChange_field_bairro(row, status);
	displayChange_field_municipio(row, status);
	displayChange_field_uf(row, status);
	displayChange_field_data_abertura_pessoas(row, status);
	displayChange_field_conselhosimounao(row, status);
	displayChange_field_idconselho_classe(row, status);
	displayChange_field_numero_conselho(row, status);
	displayChange_field_socios(row, status);
	displayChange_field_impostos(row, status);
}

function displayChange_field(field, row, status) {
	if ("idpessoas" == field) {
		displayChange_field_idpessoas(row, status);
	}
	if ("idempresa" == field) {
		displayChange_field_idempresa(row, status);
	}
	if ("tipo_pessoa" == field) {
		displayChange_field_tipo_pessoa(row, status);
	}
	if ("cpf_cnpj" == field) {
		displayChange_field_cpf_cnpj(row, status);
	}
	if ("rg_inscricao_est" == field) {
		displayChange_field_rg_inscricao_est(row, status);
	}
	if ("nome_razao_social" == field) {
		displayChange_field_nome_razao_social(row, status);
	}
	if ("inscricao_municipal" == field) {
		displayChange_field_inscricao_municipal(row, status);
	}
	if ("email" == field) {
		displayChange_field_email(row, status);
	}
	if ("telefone" == field) {
		displayChange_field_telefone(row, status);
	}
	if ("contato" == field) {
		displayChange_field_contato(row, status);
	}
	if ("usuario" == field) {
		displayChange_field_usuario(row, status);
	}
	if ("momento" == field) {
		displayChange_field_momento(row, status);
	}
	if ("logradouro" == field) {
		displayChange_field_logradouro(row, status);
	}
	if ("numero" == field) {
		displayChange_field_numero(row, status);
	}
	if ("complemento" == field) {
		displayChange_field_complemento(row, status);
	}
	if ("cep" == field) {
		displayChange_field_cep(row, status);
	}
	if ("bairro" == field) {
		displayChange_field_bairro(row, status);
	}
	if ("municipio" == field) {
		displayChange_field_municipio(row, status);
	}
	if ("uf" == field) {
		displayChange_field_uf(row, status);
	}
	if ("data_abertura_pessoas" == field) {
		displayChange_field_data_abertura_pessoas(row, status);
	}
	if ("conselhosimounao" == field) {
		displayChange_field_conselhosimounao(row, status);
	}
	if ("idconselho_classe" == field) {
		displayChange_field_idconselho_classe(row, status);
	}
	if ("numero_conselho" == field) {
		displayChange_field_numero_conselho(row, status);
	}
	if ("socios" == field) {
		displayChange_field_socios(row, status);
	}
	if ("impostos" == field) {
		displayChange_field_impostos(row, status);
	}
}

function displayChange_field_idpessoas(row, status) {
}

function displayChange_field_idempresa(row, status) {
}

function displayChange_field_tipo_pessoa(row, status) {
}

function displayChange_field_cpf_cnpj(row, status) {
}

function displayChange_field_rg_inscricao_est(row, status) {
}

function displayChange_field_nome_razao_social(row, status) {
}

function displayChange_field_inscricao_municipal(row, status) {
}

function displayChange_field_email(row, status) {
}

function displayChange_field_telefone(row, status) {
}

function displayChange_field_contato(row, status) {
}

function displayChange_field_usuario(row, status) {
}

function displayChange_field_momento(row, status) {
}

function displayChange_field_logradouro(row, status) {
}

function displayChange_field_numero(row, status) {
}

function displayChange_field_complemento(row, status) {
}

function displayChange_field_cep(row, status) {
}

function displayChange_field_bairro(row, status) {
}

function displayChange_field_municipio(row, status) {
}

function displayChange_field_uf(row, status) {
}

function displayChange_field_data_abertura_pessoas(row, status) {
}

function displayChange_field_conselhosimounao(row, status) {
}

function displayChange_field_idconselho_classe(row, status) {
}

function displayChange_field_numero_conselho(row, status) {
}

function displayChange_field_socios(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_dbo_pessoa_juridica_fisica_socios")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_dbo_pessoa_juridica_fisica_socios")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_impostos(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_dbo_pessoa_juridica_fisica_impostos")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_dbo_pessoa_juridica_fisica_impostos")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_dbo_pessoa_juridica_fisica_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(39);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_momento" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_momento" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['momento']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['momento']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_dbo_pessoa_juridica_fisica_validate_momento(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['momento']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
} // scJQCalendarAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

var api_cache_requests = [];
function ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, hasRun, img_before){
    setTimeout(function(){
        if(img_name == '') return;
        iSeqRow= iSeqRow !== undefined && iSeqRow !== null ? iSeqRow : '';
        var hasVar = p.indexOf('_@NM@_') > -1 || p_cache.indexOf('_@NM@_') > -1 ? true : false;

        p = p.split('_@NM@_');
        $.each(p, function(i,v){
            try{
                p[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p[i] = v;
            }
        });
        p = p.join('');

        p_cache = p_cache.split('_@NM@_');
        $.each(p_cache, function(i,v){
            try{
                p_cache[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p_cache[i] = v;
            }
        });
        p_cache = p_cache.join('');

        img_before = img_before !== undefined ? img_before : $(t).attr('src');
        var str_key_cache = '<?php echo $this->Ini->sc_page; ?>' + img_name+field+p+p_cache;
        if(api_cache_requests[ str_key_cache ] !== undefined && api_cache_requests[ str_key_cache ] !== null){
            if(api_cache_requests[ str_key_cache ] != false){
                do_ajax_check_file(api_cache_requests[ str_key_cache ], field  ,t, iSeqRow);
            }
            return;
        }
        //scAjaxProcOn();
        $(t).attr('src', '<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif');
        api_cache_requests[ str_key_cache ] = false;
        var rs =$.ajax({
                    type: "POST",
                    url: 'index.php?script_case_init=<?php echo $this->Ini->sc_page; ?>',
                    async: true,
                    data:'nmgp_opcao=ajax_check_file&AjaxCheckImg=' + encodeURI(img_name) +'&rsargs='+ field + '&p=' + p + '&p_cache=' + p_cache,
                    success: function (rs) {
                        if(rs.indexOf('</span>') != -1){
                            rs = rs.substr(rs.indexOf('</span>') + 7);
                        }
                        if(rs.indexOf('/') != -1 && rs.indexOf('/') != 0){
                            rs = rs.substr(rs.indexOf('/'));
                        }
                        rs = sc_trim(rs);

                        // if(rs == 0 && hasVar && hasRun === undefined){
                        //     delete window.api_cache_requests[ str_key_cache ];
                        //     ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, 1, img_before);
                        //     return;
                        // }
                        window.api_cache_requests[ str_key_cache ] = rs;
                        do_ajax_check_file(rs, field  ,t, iSeqRow)
                        if(rs == 0){
                            delete window.api_cache_requests[ str_key_cache ];

                           // $(t).attr('src',img_before);
                            do_ajax_check_file(img_before+'_@@NM@@_' + img_before, field  ,t, iSeqRow)

                        }


                    }
        });
    },100);
}

function do_ajax_check_file(rs, field  ,t, iSeqRow){
    if (rs != 0) {
        rs_split = rs.split('_@@NM@@_');
        rs_orig = rs_split[0];
        rs2 = rs_split[1];
        try{
            if(!$(t).is('img')){

                if($('#id_read_on_'+field+iSeqRow).length > 0 ){
                                    var usa_read_only = false;

                switch(field){

                }
                     if(usa_read_only && $('a',$('#id_read_on_'+field+iSeqRow)).length == 0){
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_dbo_pessoa_juridica_fisica')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
                     }
                }
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href', target.join(','));
                }else{
                    var target = $(t).attr('href').split(',');
                     target[1] = "'"+rs2+"'";
                     $(t).attr('href', target.join(','));
                }
            }else{
                $(t).attr('src', rs2);
                $(t).css('display', '');
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $(t).attr('href', target.join(','));
                }else{
                     var t_link = $(t).parent('a');
                     var target = $(t_link).attr('href').split(',');
                     target[0] = "javascript:nm_mostra_img('"+rs_orig+"'";
                     $(t_link).attr('href', target.join(','));
                }

            }
            eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        } catch(err){
                        eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        }
    }
   /* hasFalseCacheRequest = false;
    $.each(api_cache_requests, function(i,v){
        if(v == false){
            hasFalseCacheRequest = true;
        }
    });
    if(hasFalseCacheRequest == false){
        scAjaxProcOff();
    }*/
}

$(document).ready(function(){
});function scJQPasswordToggleAdd(seqRow) {
  $(".sc-ui-pwd-toggle-icon" + seqRow).on("click", function() {
    var fieldName = $(this).attr("id").substr(17), fieldObj = $("#id_sc_field_" + fieldName), fieldFA = $("#id_pwd_fa_" + fieldName);
    if ("text" == fieldObj.attr("type")) {
      fieldObj.attr("type", "password");
      fieldFA.attr("class", "fa fa-eye sc-ui-pwd-eye");
    } else {
      fieldObj.attr("type", "text");
      fieldFA.attr("class", "fa fa-eye-slash sc-ui-pwd-eye");
    }
  });
} // scJQPasswordToggleAdd

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd

function scGetFileExtension(fileName)
{
    fileNameParts = fileName.split(".");

    if (1 === fileNameParts.length || (2 === fileNameParts.length && "" == fileNameParts[0])) {
        return "";
    }

    return fileNameParts.pop().toLowerCase();
}

function scFormatExtensionSizeErrorMsg(errorMsg)
{
    var msgInfo = errorMsg.split("||"), returnMsg = "";

    if ("err_size" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_size'] ?>. <?php echo $this->Ini->Nm_lang['lang_errm_file_size_extension'] ?>".replace("{SC_EXTENSION}", msgInfo[1]).replace("{SC_LIMIT}", msgInfo[2]);
    } else if ("err_extension" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_invl'] ?>";
    }

    return returnMsg;
}

