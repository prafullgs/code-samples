$(document).ready(function(){
  
  // Form Reset
  $.fn.clearForm = function() {
    return this.each(function() {
      var type = this.type, tag = this.tagName.toLowerCase();
      if (tag == 'form')
      return $(':input',this).clearForm();
      if (type == 'text' || tag == 'textarea')
      this.value = '';
      else if (type == 'checkbox')
      this.checked = false;
    });
  };
  
  $("#reset").click(function() {
    $('.target').css('display','none');
    $('#slider').slider( "value" , [300] );
    $("#form1,#form2,#form3,#form4").clearForm(showPreview());
  });

  // Width Slider
  // $( "#slider" ).slider({
  //   min: 300,
  //   max: 700,
  //   slide: function( event, ui ) {
  //     $( "#wwidth" ).val( ui.value );
  //     $('#view_iframe iframe').css('width',ui.value+"px");
  //   }
  // });
  // $( "#wwidth" ).val( $( "#slider" ).slider( "value" ) );
  
  // Add dynamic height to iframe
  $('iframe').contents().find('body').css({"min-height": "100", "overflow" : "hidden"});
  setInterval( "$('iframe').height($('iframe').contents().find('body').height())", 1 );
  
  // Form Validation
  $.validator.addMethod("text_form", function(value, element) {
    return this.optional(element) || value.match(/^[A-Z,a-z,0-9,\., ]+$/);
   }, "Please enter valid text");

    $.validator.addMethod("question_field", function(value, element) {
    return this.optional(element) || value.match(/^[A-Z,a-z,0-9,\!\@\#\$\%\^\&\*\(\)\?\"\'\,\:\;\~\`\., ]+$/);
   }, "Please enter valid text");
   
   jQuery.validator.addMethod("complete_url", function(val, elem) {
    // if no url, don't do anything
    if (val.length == 0) { return true; }
 
    // if user has not entered http:// https:// or ftp:// assume they mean http://
    if(!/^(https?|ftp):\/\//i.test(val)) {
        val = 'http://'+val; // set both the value
        $(elem).val(val); // also update the form element
    }
    // now check if valid url
    // http://docs.jquery.com/Plugins/Validation/Methods/url
       return /^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&amp;'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&amp;'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&amp;'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&amp;'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&amp;'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(val);
}, "Please enter valid URL");
   
   $("#form1,#form2,#form3,#form4").validate({		
    submitHandler: function(form) {
       // $(form).ajaxSubmit();
       },
    highlight: function(element, errorClass) {
      // $(element).fadeOut(function() {
      //   $(element).fadeIn();
    //   });
    },
    rules: {
      title: {
        required: true,
		text_form: true,
        maxlength: 37
	  },
      question: {
        required: true,
		question_field: true,
        maxlength: 75
      },
      actual: {
        required: true,
        maxlength: 4,
        number: true
      },
      target: {
        maxlength: 4,
        number: true
      },
	  units:{
	    maxlength: 15
	  },
      channel_one_type: {
        required: true,
		text_form: true,
        maxlength: 15
      },
      channel_two_type: {
        required: true,
		text_form: true,
        maxlength: 15
      },
      channel_three_type: {
        required: true,
		text_form: true,
        maxlength: 15
      },
      
      measure_one_type: {
		required: true,
	    text_form: true,
        required: true,
        maxlength: 15
      },
      measure_two_type: {
		required: true,
	    text_form: true,
        required: true,
        maxlength: 15
      },
      channel_one_value: {
        required: true,
        maxlength: 5,
        number: true
      },
      channel_two_value: {
        required: true,
        maxlength: 5,
        number: true 
      },
      channel_three_value: {
        required: true,
        maxlength: 5,
        number: true
      },
     
      measure_one_value: {
	    required: true,
        maxlength: 5,
        number: true
      },
      measure_two_value: {
        required: true,
        maxlength: 5,
        number: true
      },
      channel_one_unit: {
        text_form: true,
        maxlength: 15
      },
      channel_two_unit: {
        text_form: true,
        maxlength: 15
      },
      channel_three_unit: {
        text_form: true,
        maxlength: 15
      },
	  button_text: {
	    text_form: true,
        maxlength: 32
      },
	  button_url: {
	    complete_url: true,
		maxlength: 1024
	  },
      link_text: {
	    text_form: true,
        maxlength: 44
      },
	  link_url: {
	    complete_url: true,
		maxlength: 1024
	  },
	  target_one_type: {
	    required: "#include-target:checked",
        maxlength: 15,
		text_form: true
      },
      target_two_type: {
		required: "#include-target:checked",
	    text_form: true,
        maxlength: 15
      },
      target_three_type: {
		required: "#include-target:checked",
	    text_form: true,
        maxlength: 15
      },
	   target_one_value: {
		required: "#include-target:checked",
        maxlength: 5,
        number: true
      },
      target_two_value: {
		required: "#include-target:checked",
        maxlength: 5,
        number: true
      },
      target_three_value: {
		required: "#include-target:checked",
        maxlength: 5,
        number: true
      },
	    target_one_unit: {
		text_form: true,
        maxlength: 15
      },
      target_two_unit: {
		text_form: true,
        maxlength: 15
      },
      target_three_unit: {
		text_form: true,
        maxlength: 15
      }
    }
  });
   // Show/Hide Target Fields 
  $('.include-target').removeAttr('checked');
  $('.target').css('display','none');
  $('.include-target').click(function(){
    if($('.include-target').is(':checked'))
    {
      $('.target').css('display','block');
	}
    else
    {
	  $('.target input:text').val("");
      $('.target').css('display','none');
    }
  });
  showPreview();
});