<?php
session_start();
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;
$_SESSION['token_time'] = time();

if(isset($_GET['id']))
{
  $widget = htmlspecialchars($_GET['id']);
}
else
{
  $widget = "<h2>Widget ID is missing, Please <a href='index.html'>Click here</a></h2>";
  echo $widget;
  die;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>.::Widget Configuration::.</title>
<script type="text/javascript" src="/js/jquery-1.5.1.js"></script>
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript" src="/js/jquery.validate.js"></script>
<script type="text/javascript" src="/js/global.js"></script>
<script type="text/javascript" src="js/iframe.js"></script>
<script type="text/javascript" src="/js/jpicker-1.1.6.min.js" ></script>
<script type="text/javascript">

function showPreview()
{
  var dataString = jQuery('input').serialize();
  dataString = encodeURI(dataString);
  var linkurl = "templates/"+"<?php echo $widget; ?>"+".php?"+dataString;
  if($('#form1,#form2,#form3,#form4').validate().form()){
  var iframe_src = "<iframe src="+ linkurl + " frameBorder='0' scrolling='no'></iframe>";
  $('#view_iframe').html(iframe_src);
  }
   else{
      alert("Please correct errors on this form.");
      return false;
    }
  
}

 $(function() {
  //when update widget button is clicked
  $('#update_widget').click(function() {
    
	if($('#form1,#form2,#form3,#form4').validate().form()){
	var dataString = jQuery('input').serialize();
	dataString = encodeURI(dataString);
    $.ajax({
      type: "POST",
      url: "php/update_widget.php",
      data: dataString,
    success: function(data) {
    $('#widget_code').val(data);
    var filename = "/templates/"+"<?php echo $widget; ?>"+".php?widget_id="+data;
    var linkurl = filename;
    var wheight = $('#wheight').val();
    var wwidth = $('#wwidth').val();
    var widgetid = "<?php echo $widget; ?>";
    var formid;
    switch(widgetid)
    {
      case 'widget1':
        formid = '#form1';
      break;
      
      case 'widget2':
        formid = '#form1';
      break;
      
      case 'widget3':
        formid = '#form1';
      break;
      
      case 'widget4':
        formid = '#form2';
      break;
      
      case 'widget5':
        formid = '#form3';
      break;
      
      case 'widget6':
        formid = '#form4';
      break;
      
      default:
        alert("Please refresh the page, application encountered a problem");
      break;
    }
    var wheight=$('#view_iframe').contents().height();
	var widget_code = $('#widget_code').val();
	var filename = "/templates/"+"<?php echo $widget; ?>"+".php?widget_id="+widget_code;
	msg = filename;
	var url_redirect = "http://"+window.location.hostname + msg
	
	
	var wwidth = $('#wwidth').val();
	var wheight=$('#view_iframe').contents().height();
	
	// get code
	var iframe_src = "<iframe src='"+ url_redirect +"' width='"+ wwidth +"' height='"+ wheight + "' frameBorder='0' scrolling='no'></iframe>";
    $('#codesource').val(iframe_src);
	
	//preview widget
	var iframe_src = "<iframe id='iframe1' name='iframe1' src="+ linkurl + " width="+ wwidth +" height="+ wheight +" frameBorder='0' scrolling='no'></iframe>";
    $('#view_iframe').html(iframe_src);
    
  }
  });
  return false;
  }
   else{
      alert("Please correct errors on this form.");
      return false;
    }
  });

   
  $.fn.jPicker.defaults.images.clientPath='images/';
});
</script>
<link rel="stylesheet" href="/css/style.css" type="text/css">
<link rel="stylesheet" href="/css/jquery-ui-1.8.13.custom.css" type="text/css">
<link rel="Stylesheet" type="text/css" href="css/jPicker-1.1.6.min.css" />
<link rel="Stylesheet" type="text/css" href="css/jPicker.css" />
<!--[if lt IE 7]>
  <link rel="stylesheet" type="text/css" href="/css/ie6.css" />
<![endif]-->
</head>
<body class="formpage">
<div id="wrapper">
  <h1>Widget Builder</h1>
  <div id="content">
    <div id="content-inner">
      <div id="content-header">
        <div id="content-header-inner"> <a href="/index.html">« Go Back to the Widgets List</a> </div>
      </div>
      <div id="content-body">
        <h2>Step 2: Customize Your Widget</h2>
        <?php
          if(isset($_GET['id'])){
            $widget = $_GET['id'];
            if(($widget == 'widget1') || ($widget == 'widget2') || ($widget == 'widget3')){
        ?>
        <form action=""name="form1" id="form1">
		<input type="hidden" name="token" value="<?php echo $token; ?>" />
          <div class="form-area">
            <div class="col1">
              <div id="edit-title-wrapper">
                <label for="title"><span class="required">*&nbsp;</span>Service:</label>
                <input onfocus="if (this.value=='Service Name') this.value = ''" onblur="this.value=!this.value?'Service Name':this.value;"  type="text" name="title" id="title" class="form-text" value="Service Name">
              </div>
              <div id="edit-question-wrapper">
                <label for="question"><span class="required">*&nbsp;</span>Question:</label>
                <input  onfocus="if (this.value=='How long will it take?') this.value = ''" onblur="this.value=!this.value?'How long will it take?':this.value;" type="text" name="question" id="question" class="form-text" value="How long will it take?">
              </div>
              <div id="edit-actual-value-wrapper">
                <label for="actual"><span class="required">*&nbsp;</span>Actual Value:</label>
                <input onfocus="if (this.value=='35') this.value = ''" onblur="this.value=!this.value?'35':this.value;" type="text" name="actual" id="actual" value="35">
              </div>
              <div id="edit-target-value-wrapper">
                <label for="target">Target Value:</label>
                <input onfocus="if (this.value=='20') this.value = ''" onblur="this.value=!this.value?'20':this.value;" type="text" name="target" id="target" value="20">
              </div>
              <div id="edit-value-units-wrapper" class="clear">
                <label for="units">Unit:</label>
                <input onfocus="if (this.value=='days') this.value = ''" onblur="this.value=!this.value?'days':this.value;" type="text" name="units" id="units" class="form-text" value="days">
              </div>
            </div><!-- End Column 1 -->
            <div class="col2">
              <div id="edit-button-text-wrapper" class="clear">
                <label for="button_text">Button Text (optional):</label>
                <input onfocus="if (this.value=='Button Text') this.value = ''" onblur="this.value=!this.value?'Button Text':this.value;" type="text" name="button_text" class="form-text" id="button_text" value="Button Text">
              </div>
              <div id="edit-button-url-wrapper">
                <label for="button_url">Button URL:</label>
                <input onfocus="if (this.value=='http://url.com') this.value = ''" onblur="this.value=!this.value?'http://url.com':this.value;" type="text" name="button_url" id="button_url" class="form-text" value="http://url.com">
              </div>
              <div id="edit-buttoncolor-wrapper">
                <div class="bcolor">
                  <label for="bcolor">Button Color:</label>
                    <script type="text/javascript">        
                    $(document).ready(
                      function(){
                        $('#bcolor').jPicker();
                    });
                    </script> 
                    <input type="hidden" name="bcolor" id="bcolor" size="6" value="#cccccc" />
                </div>
                <div class="btcolor">
                  <label for="btcolor">Button Text Color:</label>
                  <script type="text/javascript">        
                    $(document).ready(
                      function(){
                        $('#btcolor').jPicker();
                    });
                  </script>
                  <input type="hidden" name="btcolor" id="btcolor" value="#000000" />
                </div>
              </div>
              <div id="edit-link-text-wrapper">
                <label for="link_text">Link Text (optional):</label>
                <input onfocus="if (this.value=='Link Text') this.value = ''" onblur="this.value=!this.value?'Link Text':this.value;" type="text" name="link_text" class="form-text" id="link_text" value="Link Text">
              </div>
              <div id="edit-link-url-wrapper">
                <label for="link_url">Link URL:</label>
                <input onfocus="if (this.value=='http://url.com') this.value = ''" onblur="this.value=!this.value?'http://url.com':this.value;" type="text" name="link_url" id="link_url" class="form-text" value="http://url.com">
              </div>
              <div id="edit-width-wrapper">
                <label for="wwidth">Pixel Width of Widget:</label>
                <input onfocus="if (this.value=='300') this.value = ''" onblur="this.value=!this.value?'300':this.value;"  type="text" id="wwidth" value="300" />
                <div id="slider"></div>
              </div>
            </div><!-- End Column 2 -->
            <div id="submit-buttons" class="clear">
              <input type="button" name="preview" value="Preview" onClick="javascript: showPreview();"/>
              <input type="button" name="update_widget" id="update_widget" value="Generate Widget">
              <input type="hidden" name="widget_code" id="widget_code" value="">
            </div>
            <div class="codesource">
              <label for="codesource">Copy this HTML code snippet into your web page:</label>
              <textarea id="codesource" rows=3 class="clear"></textarea>
            </div>
            <input type="reset" name="reset history.go(0)" id="reset" value="Reset " onClick="window.location.href=window.location.href">
		  </div><!-- End Form Area -->
          <div class="col3">
            <div id="view_iframe"> </div>
          </div>
        </form>
        <?php
        }
          else if($widget == 'widget4'){
        ?>
        <form action=""name="form2" id="form2">
		<input type="hidden" name="token" value="<?php echo $token; ?>" />
          <div class="form-area">
            <div class="col1">
              <div id="edit-title-wrapper">
                <label for="title"><span class="required">*&nbsp;</span>Service</label>
                <input onfocus="if (this.value=='Service Name') this.value = ''" onblur="this.value=!this.value?'Service Name':this.value;"  type="text" name="title" id="title" class="form-text" value="Service Name">
              </div>
              <div id="edit-question-wrapper">
                <label for="question"><span class="required">*&nbsp;</span>Question:</label>
                <input onfocus="if (this.value=='How long will it take?') this.value = ''" onblur="this.value=!this.value?'How long will it take?':this.value;"  type="text" name="question" id="question" class="form-text" value="How long will it take?">
              </div>
              <div class="channel"> <span class="channel-num">Column 1:</span>
                <div class="edit-channel-type-wrapper">
                  <label for="channel-type"><span class="required">*&nbsp;</span>Title:</label>
                  <input onfocus="if (this.value=='Web') this.value = ''" onblur="this.value=!this.value?'Web':this.value;"  type="text" name="channel_one_type" id="channel-type" class="form-text" value="Web">
                </div>
                <div class="edit-channel-value-wrapper">
                  <label for="channel-value"><span class="required">*&nbsp;</span>Value:</label>
                  <input onfocus="if (this.value=='5') this.value = ''" onblur="this.value=!this.value?'5':this.value;"  type="text" name="channel_one_value" id="channel-value" class="form-text" value="5">
                </div>
                <div class="edit-channel-unit-wrapper">
                  <label for="channel-unit">Unit:</label>
                  <input onfocus="if (this.value=='minutes') this.value = ''" onblur="this.value=!this.value?'minutes':this.value;"  type="text" name="channel_one_unit" id="channel-unit" class="form-text" value="minutes">
                </div>
              </div>
              <div class="channel"> <span class="channel-num">Column 2:</span>
                <div class="edit-channel-type-wrapper">
                  <label for="channel-two-type"><span class="required">*&nbsp;</span>Title:</label>
                  <input onfocus="if (this.value=='Office') this.value = ''" onblur="this.value=!this.value?'Office':this.value;"  type="text" name="channel_two_type" id="channel-two-type" class="form-text" value="Office">
                </div>
                <div class="edit-channel-value-wrapper">
                  <label for="channel-two-value"><span class="required">*&nbsp;</span>Value:</label>
                  <input onfocus="if (this.value=='15') this.value = ''" onblur="this.value=!this.value?'15':this.value;"  type="text" name="channel_two_value" id="channel-two-value" class="form-text" value="15">
                </div>
                <div class="edit-channel-unit-wrapper">
                  <label for="channel-two-unit">Unit:</label>
                  <input onfocus="if (this.value=='minutes') this.value = ''" onblur="this.value=!this.value?'minutes':this.value;"  type="text" name="channel_two_unit" id="channel-two-unit" class="form-text" value="minutes">
                </div>
              </div>
              <div class="channel"> <span class="channel-num">Column 3:</span>
                <div class="edit-channel-type-wrapper">
                  <label for="channel-three-type"><span class="required">*&nbsp;</span>Title:</label>
                  <input onfocus="if (this.value=='Phone') this.value = ''" onblur="this.value=!this.value?'Phone':this.value;"  type="text" name="channel_three_type" id="channel-three-type" class="form-text" value="Phone">
                </div>
                <div class="edit-channel-value-wrapper">
                  <label for="channel-three-value"><span class="required">*&nbsp;</span>Value:</label>
                  <input onfocus="if (this.value=='9') this.value = ''" onblur="this.value=!this.value?'9':this.value;"  type="text" name="channel_three_value" id="channel-three-value" class="form-text" value="9">
                </div>
                <div class="edit-channel-unit-wrapper">
                  <label for="channel-three-unit">Unit:</label>
                  <input onfocus="if (this.value=='minutes') this.value = ''" onblur="this.value=!this.value?'minutes':this.value;"  type="text" name="channel_three_unit" id="channel-three-unit" class="form-text" value="minutes">
                </div>
              </div>
              <label for="include-target"><span class="include-target-label">Include Target?&nbsp;</span></label>
              <input type="checkbox" id="include-target" class="include-target">
              <div class="target"> <span class="target-num">Target 1:</span>
                <div class="edit-target-type-wrapper">
                  <label for="target-one-type"><span class="required">*&nbsp;</span>Title:</label>
                  <input onfocus="if (this.value=='') this.value = ''" onblur="this.value=!this.value?'':this.value;"  type="text" name="target_one_type" id="target-one-type" class="form-text" value="">
                </div>
                <div class="edit-target-value-wrapper">
                  <label for="target-one-value"><span class="required">*&nbsp;</span>Value:</label>
                  <input onfocus="if (this.value=='') this.value = ''" onblur="this.value=!this.value?'':this.value;"  type="text" name="target_one_value" id="target-one-value" class="form-text" value="">
                </div>
                <div class="edit-target-unit-wrapper">
                  <label for="target-one-unit">Unit:</label>
                  <input onfocus="if (this.value=='') this.value = ''" onblur="this.value=!this.value?'':this.value;"  type="text" name="target_one_unit" id="target-one-unit" class="form-text" value="">
                </div>
              </div>
              <div class="target"> <span class="target-num">Target 2:</span>
                <div class="edit-target-type-wrapper">
                  <label for="target-two-type"><span class="required">*&nbsp;</span>Title:</label>
                  <input onfocus="if (this.value=='') this.value = ''" onblur="this.value=!this.value?'':this.value;"  type="text" name="target_two_type" id="target-two-type" class="form-text" value="">
                </div>
                <div class="edit-target-value-wrapper">
                  <label for="target-two-value"><span class="required">*&nbsp;</span>Value:</label>
                  <input onfocus="if (this.value=='') this.value = ''" onblur="this.value=!this.value?'':this.value;"  type="text" name="target_two_value" id="target-two-value" class="form-text" value="">
                </div>
                <div class="edit-target-unit-wrapper">
                  <label for="target-two-unit">Unit:</label>
                  <input onfocus="if (this.value=='') this.value = ''" onblur="this.value=!this.value?'':this.value;"  type="text" name="target_two_unit" id="target-two-unit" class="form-text" value="">
                </div>
              </div>
              <div class="target"> <span class="target-num">Target 3:</span>
                <div class="edit-target-type-wrapper">
                  <label for="target-three-type"><span class="required">*&nbsp;</span>Title:</label>
                  <input onfocus="if (this.value=='') this.value = ''" onblur="this.value=!this.value?'':this.value;"  type="text" name="target_three_type" id="target-three-type" class="form-text" value="">
                </div>
                <div class="edit-target-value-wrapper">
                  <label for="target-three-value"><span class="required">*&nbsp;</span>Value:</label>
                  <input onfocus="if (this.value=='') this.value = ''" onblur="this.value=!this.value?'':this.value;"  type="text" name="target_three_value" id="target-three-value" class="form-text" value="">
                </div>
                <div class="edit-target-unit-wrapper">
                  <label for="target-three-unit">Unit:</label>
                  <input onfocus="if (this.value=='') this.value = ''" onblur="this.value=!this.value?'':this.value;"  type="text" name="target_three_unit" id="target-three-unit" class="form-text" value="">
                </div>
              </div>
            </div><!--End Col 1 -->
            <div class="col2">
              <div id="edit-button-text-wrapper" class="clear">
                <label for="button_text">Button Text (optional):</label>
                <input onfocus="if (this.value=='Button Text') this.value = ''" onblur="this.value=!this.value?'Button Text':this.value;"  type="text" name="button_text" class="form-text" id="button_text" value="Button Text">
              </div>
              <div id="edit-button-url-wrapper">
                <label for="button_url">Button URL:</label>
                <input onfocus="if (this.value=='http://url.com') this.value = ''" onblur="this.value=!this.value?'http://url.com':this.value;"  type="text" name="button_url" id="button_url" class="form-text" value="http://url.com">
              </div>
              <div id="edit-buttoncolor-wrapper">
                <div class="bcolor">
                  <label for="bcolor">Button Color:</label>
                    <script type="text/javascript">        
                    $(document).ready(
                      function(){
                        $('#bcolor').jPicker();
                    });
                    </script> 
                    <input type="hidden" name="bcolor" id="bcolor" size="6" value="#cccccc" />
                </div>
                <div class="btcolor">
                  <label for="btcolor">Button Text Color:</label>
                  <script type="text/javascript">        
                    $(document).ready(
                      function(){
                        $('#btcolor').jPicker();
                    });
                  </script>
                  <input type="hidden" name="btcolor" id="btcolor" value="#000000" />
                </div>
              </div>
              <div id="edit-link-text-wrapper">
                <label for="link_text">Link Text (optional):</label>
                <input onfocus="if (this.value=='Link Text') this.value = ''" onblur="this.value=!this.value?'Link Text':this.value;"  type="text" name="link_text" class="form-text" id="link_text" value="Link Text">
              </div>
              <div id="edit-link-url-wrapper">
                <label for="link_url">Link URL:</label>
                <input onfocus="if (this.value=='http://url.com') this.value = ''" onblur="this.value=!this.value?'http://url.com':this.value;"  type="text" name="link_url" id="link_url" class="form-text" value="http://url.com">
              </div>
              <div id="edit-width-wrapper">
                <label for="wwidth">Pixel Width of Widget:</label>
                <input onfocus="if (this.value=='300') this.value = ''" onblur="this.value=!this.value?'300':this.value;"  type="text" id="wwidth"  value="300" />
                <div id="slider"></div>
              </div>
            </div><!--End Col 2 -->
            <div id="submit-buttons" class="clear">
              <input type="button" name="preview" value="Preview" onClick="javascript: showPreview();"/>
              <input type="button" name="update_widget" id="update_widget" value="Generate Widget">
              <input type="hidden" name="widget_code" id="widget_code" value="">
            </div>
            <div class="codesource">
              <label for="codesource">Copy this HTML code snippet into your web page:</label>
              <textarea id="codesource" rows=3 class="clear"></textarea>
            </div>
            <input type="reset" name="reset history.go(0)" id="reset" value="Reset " onClick="window.location.href=window.location.href">
          </div><!-- End Form Area -->
          <div class="col3">
            <div id="view_iframe"> </div>
          </div>
        </form>
        <?php
        }
        else if($widget == 'widget5') {
        ?>
        <form action=""name="form3" id="form3">
		<input type="hidden" name="token" value="<?php echo $token; ?>" />
          <div class="form-area">
            <div class="col1">
              <div id="edit-title-wrapper">
                <label for="title"><span class="required">*&nbsp;</span>Service</label>
                <input onfocus="if (this.value=='Service Name') this.value = ''" onblur="this.value=!this.value?'Service Name':this.value;"  type="text" name="title" id="title" class="form-text" value="Service Name">
              </div>
              <div id="edit-question-wrapper">
                <label for="question"><span class="required">*&nbsp;</span>Question:</label>
                <input onfocus="if (this.value=='How long will it take?') this.value = ''" onblur="this.value=!this.value?'How long will it take?':this.value;"  type="text" name="question" id="question" class="form-text" value="How long will it take?">
              </div>
              <div class="channel"> <span class="channel-num">Column 1:</span>
                <div class="edit-channel-type-wrapper">
                  <label for="channel-one-type"><span class="required">*&nbsp;</span>Title:</label>
                  <input onfocus="if (this.value=='Web') this.value = ''" onblur="this.value=!this.value?'Web':this.value;"  type="text" name="channel_one_type" id="channel-one-type" class="form-text" value="Web">
                </div>
                <div class="edit-channel-value-wrapper">
                  <label for="channel-one-value"><span class="required">*&nbsp;</span>Value:</label>
                  <input onfocus="if (this.value=='5') this.value = ''" onblur="this.value=!this.value?'5':this.value;"  type="text" name="channel_one_value" id="channel-one-value" class="form-text" value="5">
                </div>
                <div class="edit-channel-unit-wrapper">
                  <label for="channel-one-unit">Unit:</label>
                  <input onfocus="if (this.value=='minutes') this.value = ''" onblur="this.value=!this.value?'minutes':this.value;"  type="text" name="channel_one_unit" id="channel-one-unit" class="form-text" value="minutes">
                </div>
              </div>
              <div class="channel"> <span class="channel-num">Column 2:</span>
                <div class="edit-channel-type-wrapper">
                  <label for="channel-two-type"><span class="required">*&nbsp;</span>Title:</label>
                  <input onfocus="if (this.value=='Office') this.value = ''" onblur="this.value=!this.value?'Office':this.value;"  type="text" name="channel_two_type" id="channel-two-type" class="form-text" value="Office">
                </div>
                <div class="edit-channel-value-wrapper">
                  <label for="channel-two-value"><span class="required">*&nbsp;</span>Value:</label>
                  <input onfocus="if (this.value=='15') this.value = ''" onblur="this.value=!this.value?'15':this.value;"  type="text" name="channel_two_value" id="channel-two-value" class="form-text" value="15">
                </div>
                <div class="edit-channel-unit-wrapper">
                  <label for="channel-two-unit">Unit:</label>
                  <input onfocus="if (this.value=='minutes') this.value = ''" onblur="this.value=!this.value?'minutes':this.value;"  type="text" name="channel_two_unit" id="channel-two-unit" class="form-text" value="minutes">
                </div>
              </div>
              <label for="include-target"><span class="include-target-label">Include Target?&nbsp;</span></label>
              <input type="checkbox" id="include-target" class="include-target">
              <div class="target"> <span class="target-num">Target 1:</span>
                <div class="edit-target-type-wrapper">
                  <label for="target-one-type"><span class="required">*&nbsp;</span>Title:</label>
                  <input onfocus="if (this.value=='') this.value = ''" onblur="this.value=!this.value?'':this.value;"  type="text" name="target_one_type" id="target-one-type" class="form-text" value="">
                </div>
                <div class="edit-target-value-wrapper">
                  <label for="target-one-value"><span class="required">*&nbsp;</span>Value:</label>
                  <input onfocus="if (this.value=='') this.value = ''" onblur="this.value=!this.value?'':this.value;"  type="text" name="target_one_value" id="target-one-value" class="form-text" value="">
                </div>
                <div class="edit-target-unit-wrapper">
                  <label for="target-one-unit">Unit:</label>
                  <input onfocus="if (this.value=='') this.value = ''" onblur="this.value=!this.value?'':this.value;"  type="text" name="target_one_unit" id="target-one-unit" class="form-text" value="">
                </div>
              </div>
              <div class="target"> <span class="target-num">Target 2:</span>
                <div class="edit-target-type-wrapper">
                  <label for="target-two-type"><span class="required">*&nbsp;</span>Title:</label>
                  <input onfocus="if (this.value=='') this.value = ''" onblur="this.value=!this.value?'':this.value;"  type="text" name="target_two_type" id="target-two-type" class="form-text" value="">
                </div>
                <div class="edit-target-value-wrapper">
                  <label for="target-two-value"><span class="required">*&nbsp;</span>Value:</label>
                  <input onfocus="if (this.value=='') this.value = ''" onblur="this.value=!this.value?'':this.value;"  type="text" name="target_two_value" id="target-two-value" class="form-text" value="">
                </div>
                <div class="edit-target-unit-wrapper">
                  <label for="target-two-unit">Unit:</label>
                  <input onfocus="if (this.value=='') this.value = ''" onblur="this.value=!this.value?'':this.value;"  type="text" name="target_two_unit" id="target-two-unit" class="form-text" value="">
                </div>
              </div>
            </div>
            <div class="col2">  
              <div id="edit-button-text-wrapper" class="clear">
                <label for="button_text">Button Text (optional):</label>
                <input onfocus="if (this.value=='Button Text') this.value = ''" onblur="this.value=!this.value?'Button Text':this.value;"  type="text" name="button_text" class="form-text" id="button_text" value="Button Text">
              </div>
              <div id="edit-button-url-wrapper">
                <label for="button_url">Button URL:</label>
                <input onfocus="if (this.value=='http://url.com') this.value = ''" onblur="this.value=!this.value?'http://url.com':this.value;"  type="text" name="button_url" id="button_url" class="form-text" value="http://url.com">
              </div>
              <div id="edit-buttoncolor-wrapper">
                <div class="bcolor">
                  <label for="bcolor">Button Color:</label>
                    <script type="text/javascript">        
                    $(document).ready(
                      function(){
                        $('#bcolor').jPicker();
                    });
                    </script> 
                    <input type="hidden" name="bcolor" id="bcolor" size="6" value="#cccccc" />
                </div>
                <div class="btcolor">
                  <label for="btcolor">Button Text Color:</label>
                  <script type="text/javascript">        
                    $(document).ready(
                      function(){
                        $('#btcolor').jPicker();
                    });
                  </script>
                  <input type="hidden" name="btcolor" id="btcolor" value="#000000" />
                </div>
              </div>
              <div id="edit-link-text-wrapper">
                <label for="link_text">Link Text (optional):</label>
                <input onfocus="if (this.value=='Link Text') this.value = ''" onblur="this.value=!this.value?'Link Text':this.value;"  type="text" name="link_text" class="form-text" id="link_text" value="Link Text">
              </div>
              <div id="edit-link-url-wrapper">
                <label for="link_url">Link URL:</label>
                <input onfocus="if (this.value=='http://url.com') this.value = ''" onblur="this.value=!this.value?'http://url.com':this.value;"  type="text" name="link_url" id="link_url" class="form-text" value="http://url.com">
              </div>
              <div id="edit-width-wrapper">
                <label for="wwidth">Pixel Width of Widget:</label>
                <input onfocus="if (this.value=='300') this.value = ''" onblur="this.value=!this.value?'300':this.value;"  type="text" id="wwidth"  value="300" />
                <div id="slider"></div>
              </div>
            </div>
            <div id="submit-buttons" class="clear">
              <input type="button" name="preview" value="Preview" onClick="javascript: showPreview();"/>
              <input type="button" name="update_widget" id="update_widget" value="Generate Widget">
              <input type="hidden" name="widget_code" id="widget_code" value="">
            </div>
            <div class="codesource">
              <label for="codesource">Copy this HTML code snippet into your web page:</label>
              <textarea id="codesource" rows=3 class="clear"></textarea>
            </div>
            <input type="reset" name="reset history.go(0)" id="reset" value="Reset " onClick="window.location.href=window.location.href">
          </div>
          <div class="col3">
            <div id="view_iframe"> </div>
          </div>
        </form>
        <?php
        }
        else if($widget == 'widget6') {
        ?>
        <form action=""name="form4" id="form4">
		<input type="hidden" name="token" value="<?php echo $token; ?>" />
          <div class="form-area">
            <div class="col1">
              <div id="edit-title-wrapper">
                <label for="title"><span class="required">*&nbsp;</span>Service</label>
                <input onfocus="if (this.value=='Service Name') this.value = ''" onblur="this.value=!this.value?'Service Name':this.value;"  type="text" name="title" id="title" class="form-text" value="Service Name">
              </div>
              <div id="edit-question-wrapper">
                <label for="question"><span class="required">*&nbsp;</span>Question:</label>
                <input onfocus="if (this.value=='How long will it take?') this.value = ''" onblur="this.value=!this.value?'How long will it take?':this.value;" type="text" name="question" id="question" class="form-text" value="How long will it take?">
              </div>
              <div class="channel"> <span class="channel-num">Column 1:</span>
                <div class="edit-channel-type-wrapper">
                  <label for="channel-one-type"><span class="required">*&nbsp;</span>Title:</label>
                  <input onfocus="if (this.value=='Web') this.value = ''" onblur="this.value=!this.value?'Web':this.value;" type="text" name="channel_one_type" id="channel-one-type" class="form-text" value="Web">
                </div>
                <div class="edit-channel-value-wrapper">
                  <label for="channel-one-value"><span class="required">*&nbsp;</span>Value:</label>
                  <input onfocus="if (this.value=='10') this.value = ''" onblur="this.value=!this.value?'10':this.value;" type="text" name="channel_one_value" id="channel-one-value" class="form-text" value="10">
                </div>
                <div class="edit-channel-unit-wrapper">
                  <label for="channel-one-unit">Unit:</label>
                  <input onfocus="if (this.value=='minutes') this.value = ''" onblur="this.value=!this.value?'minutes':this.value;" type="text" name="channel_one_unit" id="channel-one-unit" class="form-text" value="minutes">
                </div>
              </div>
              <div class="channel"> <span class="channel-num">Column 2:</span>
                <div class="edit-channel-type-wrapper">
                  <label for="channel-two-type"><span class="required">*&nbsp;</span>Title:</label>
                  <input onfocus="if (this.value=='Mail') this.value = ''" onblur="this.value=!this.value?'Mail':this.value;" type="text" name="channel_two_type" id="channel-two-type" class="form-text" value="Mail">
                </div>
                <div class="edit-channel-value-wrapper">
                  <label for="channel-two-value"><span class="required">*&nbsp;</span>Value:</label>
                  <input onfocus="if (this.value=='20') this.value = ''" onblur="this.value=!this.value?'20':this.value;" type="text" name="channel_two_value" id="channel-two-value" class="form-text" value="20">
                </div>
                <div class="edit-channel-unit-wrapper">
                  <label for="channel-two-unit">Unit:</label>
                  <input onfocus="if (this.value=='days') this.value = ''" onblur="this.value=!this.value?'days':this.value;" type="text" name="channel_two_unit" id="channel-two-unit" class="form-text" value="days">
                </div>
              </div>
              <label for="include-target"><span class="include-target-label">Include Target?&nbsp;</span></label>
              <input type="checkbox" id="include-target" class="include-target">
              <div class="target"> <span class="target-num">Target 1:</span>
                <div class="edit-target-type-wrapper">
                  <label for="target-one-type"><span class="required">*&nbsp;</span>Title:</label>
                  <input onfocus="if (this.value=='') this.value = ''" onblur="this.value=!this.value?'':this.value;" type="text" name="target_one_type" id="target-one-type" class="form-text" value="">
                </div>
                <div class="edit-target-value-wrapper">
                  <label for="target-one-value"><span class="required">*&nbsp;</span>Value:</label>
                  <input onfocus="if (this.value=='') this.value = ''" onblur="this.value=!this.value?'':this.value;" type="text" name="target_one_value" id="target-one-value" class="form-text" value="">
                </div>
                <div class="edit-target-unit-wrapper">
                  <label for="target-one-unit">Unit:</label>
                  <input onfocus="if (this.value=='') this.value = ''" onblur="this.value=!this.value?'':this.value;" type="text" name="target_one_unit" id="target-one-unit" class="form-text" value="">
                </div>
              </div>
              <div class="target"> <span class="target-num">Target 2:</span>
                <div class="edit-target-type-wrapper">
                  <label for="target-two-type"><span class="required">*&nbsp;</span>Title:</label>
                  <input onfocus="if (this.value=='') this.value = ''" onblur="this.value=!this.value?'':this.value;" type="text" name="target_two_type" id="target-two-type" class="form-text" value="">
                </div>
                <div class="edit-target-value-wrapper">
                  <label for="target-two-value"><span class="required">*&nbsp;</span>Value:</label>
                  <input onfocus="if (this.value=='') this.value = ''" onblur="this.value=!this.value?'':this.value;" type="text" name="target_two_value" id="target-two-value" class="form-text" value="">
                </div>
                <div class="edit-target-unit-wrapper">
                  <label for="target-two-unit">Unit:</label>
                  <input onfocus="if (this.value=='') this.value = ''" onblur="this.value=!this.value?'':this.value;" type="text" name="target_two_unit" id="target-two-unit" class="form-text" value="">
                </div>
              </div>
            </div>
            <div class="col2"> 
              <div id="edit-button-text-wrapper" class="clear">
                <label for="button_text">Button Text (optional):</label>
                <input onfocus="if (this.value=='Button Text') this.value = ''" onblur="this.value=!this.value?'Button Text':this.value;" type="text" name="button_text" class="form-text" id="button_text" value="Button Text">
              </div>
              <div id="edit-button-url-wrapper">
                <label for="button_url">Button URL:</label>
                <input onfocus="if (this.value=='http://url.com') this.value = ''" onblur="this.value=!this.value?'http://url.com':this.value;" type="text" name="button_url" id="button_url" class="form-text" value="http://url.com">
              </div>
              <div id="edit-buttoncolor-wrapper">
                <div class="bcolor">
                  <label for="bcolor">Button Color:</label>
                    <script type="text/javascript">        
                    $(document).ready(
                      function(){
                        $('#bcolor').jPicker();
                    });
                    </script> 
                    <input type="hidden" name="bcolor" id="bcolor" size="6" value="#cccccc" />
                </div>
                <div class="btcolor">
                  <label for="btcolor">Button Text Color:</label>
                  <script type="text/javascript">        
                    $(document).ready(
                      function(){
                        $('#btcolor').jPicker();
                    });
                  </script>
                  <input type="hidden" name="btcolor" id="btcolor" value="#000000" />
                </div>
              </div>
              <div id="edit-link-text-wrapper">
                <label for="link_text">Link Text (optional):</label>
                <input onfocus="if (this.value=='Link Text') this.value = ''" onblur="this.value=!this.value?'Link Text':this.value;" type="text" name="link_text" class="form-text" id="link_text" value="Link Text">
              </div>
              <div id="edit-link-url-wrapper">
                <label for="link_url">Link URL:</label>
                <input onfocus="if (this.value=='http://url.com') this.value = ''" onblur="this.value=!this.value?'http://url.com':this.value;" type="text" name="link_url" id="link_url" class="form-text" value="http://url.com">
              </div>
              <div id="edit-width-wrapper">
                <label for="wwidth">Pixel Width of Widget:</label>
                <input onfocus="if (this.value=='300') this.value = ''" onblur="this.value=!this.value?'300':this.value;" type="text" id="wwidth"  value="300" />
                <div id="slider"></div>
              </div>
            </div>
            <div id="submit-buttons" class="clear">
              <input type="button" name="preview" value="Preview" onClick="javascript: showPreview();"/>
              <input type="button" name="update_widget" id="update_widget" value="Generate Widget">
              <input type="hidden" name="widget_code" id="widget_code" value="">
            </div>
            <div class="codesource">
              <label for="codesource">Copy this HTML code snippet into your web page:</label>
              <textarea id="codesource" rows=3 class="clear"></textarea>
            </div>
           <input type="reset" name="reset history.go(0)" id="reset" value="Reset " onClick="window.location.href=window.location.href">
          </div>
          <div class="col3">
            <div id="view_iframe"> </div>
          </div>
        </form>
        <?php
        }
          else{
        ?>
        <h1>Widget Id Not Available, Please go back and select the right widget</h1>
        <?php
        }
      }
      else
      {
        echo "Widget Information Missing, Please go back";
      }
      ?>
      </div>
    </div>
  </div>
</div>
</body>
</html>