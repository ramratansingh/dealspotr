jQuery(document).ready(function(e){e("#wcfm_inquiry_reply_send_button").click(function(s){s.preventDefault();var n=getWCFMEditorContent("inquiry_reply");$is_valid=!0,e(".wcfm-message").html("").removeClass("wcfm-error").removeClass("wcfm-success").slideUp(),wcfmstripHtml(n).length<=1&&($is_valid=!1,e("#wcfm_inquiry_reply_form .wcfm-message").html('<span class="wcicon-status-cancelled"></span>'+wcfm_enquiry_manage_messages.no_reply).addClass("wcfm-error").slideDown(),wcfm_notification_sound.play()),$is_valid&&(e("#wcfm_inquiry_reply_form").block({message:null,overlayCSS:{background:"#fff",opacity:.6}}),$form_data=new FormData(document.getElementById("wcfm_inquiry_reply_form")),$form_data.append("inquiry_reply",n),$form_data.append("wcfm_inquiry_reply_form",e("#wcfm_inquiry_reply_form").serialize()),$form_data.append("action","wcfm_ajax_controller"),$form_data.append("controller","wcfm-enquiry-manage"),e.ajax({type:"POST",url:wcfm_params.ajax_url,data:$form_data,contentType:!1,cache:!1,processData:!1,success:function(s){s&&($response_json=e.parseJSON(s),e(".wcfm-message").html("").removeClass("wcfm-error").removeClass("wcfm-success").slideUp(),wcfm_notification_sound.play(),$response_json.status?e("#wcfm_inquiry_reply_form .wcfm-message").html('<span class="wcicon-status-completed"></span>'+$response_json.message).addClass("wcfm-success").slideDown("slow",function(){$response_json.redirect?window.location=$response_json.redirect:window.location=window.location.href}):e("#wcfm_inquiry_reply_form .wcfm-message").html('<span class="wcicon-status-cancelled"></span>'+$response_json.message).addClass("wcfm-error").slideDown(),e("#wcfm_inquiry_reply_form").unblock())}}))}),e(".wcfm_enquiry_response_delete").each(function(){e(this).click(function(s){return s.preventDefault(),confirm(wcfm_dashboard_messages.enquiry_delete_confirm)&&function(e){$enquiryresponseid=e.data("enquiryresponseid"),jQuery(".wcfm-collapse").block({message:null,overlayCSS:{background:"#fff",opacity:.6}});var s={action:"delete_wcfm_enquiry_response",responseid:$enquiryresponseid,wcfm_ajax_nonce:wcfm_params.wcfm_ajax_nonce};jQuery.ajax({type:"POST",url:wcfm_params.ajax_url,data:s,success:function(e){jQuery("#inquiry_reply_"+$enquiryresponseid).parent().remove(),jQuery(".wcfm-collapse").unblock()}})}(e(this)),!1})})});