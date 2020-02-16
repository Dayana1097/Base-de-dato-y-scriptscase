
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
  scEventControl_data["codigo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["lugar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["capacidad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["codigo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lugar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lugar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["capacidad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["capacidad" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
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
  $('#id_sc_field_codigo' + iSeqRow).bind('blur', function() { sc_form_almacenes_codigo_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_almacenes_codigo_onfocus(this, iSeqRow) });
  $('#id_sc_field_lugar' + iSeqRow).bind('blur', function() { sc_form_almacenes_lugar_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_almacenes_lugar_onfocus(this, iSeqRow) });
  $('#id_sc_field_capacidad' + iSeqRow).bind('blur', function() { sc_form_almacenes_capacidad_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_almacenes_capacidad_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_almacenes_codigo_onblur(oThis, iSeqRow) {
  do_ajax_form_almacenes_validate_codigo();
  scCssBlur(oThis);
}

function sc_form_almacenes_codigo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_almacenes_lugar_onblur(oThis, iSeqRow) {
  do_ajax_form_almacenes_validate_lugar();
  scCssBlur(oThis);
}

function sc_form_almacenes_lugar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_almacenes_capacidad_onblur(oThis, iSeqRow) {
  do_ajax_form_almacenes_validate_capacidad();
  scCssBlur(oThis);
}

function sc_form_almacenes_capacidad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("codigo", "", status);
	displayChange_field("lugar", "", status);
	displayChange_field("capacidad", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_codigo(row, status);
	displayChange_field_lugar(row, status);
	displayChange_field_capacidad(row, status);
}

function displayChange_field(field, row, status) {
	if ("codigo" == field) {
		displayChange_field_codigo(row, status);
	}
	if ("lugar" == field) {
		displayChange_field_lugar(row, status);
	}
	if ("capacidad" == field) {
		displayChange_field_capacidad(row, status);
	}
}

function displayChange_field_codigo(row, status) {
}

function displayChange_field_lugar(row, status) {
}

function displayChange_field_capacidad(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_almacenes_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(22);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd
