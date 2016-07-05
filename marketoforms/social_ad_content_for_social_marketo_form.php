<?php

$the_id = get_the_ID();
$the_title = get_the_title($the_id);


error_reporting(-1);

?>

<?php
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
?>


<style>



div.buttonSubmit:hover input {
	background: #8DC01D;
	}

</style>

<!-- SYSTEM JAVASCRIPT - DO NOT EDIT -->
<script type="text/javascript">
function fieldValidate(field) {
  /* call Mkto.setError(field, message) and return false to mark a field value invalid */
  /* return 'skip' to bypass the built-in validations */
  return true;
}
function getRequiredFieldMessage(domElement, label) {
  del_cookie("Registered"); //make sure user isn't considered "registered" if form validation failes
  return "This field is required";
}
function getTelephoneInvalidMessage(domElement, label) {
  del_cookie("Registered"); //make sure user isn't considered "registered" if form validation failes
  return "Please enter a valid telephone number";
}
function getEmailInvalidMessage(domElement, label) {
  del_cookie("Registered"); //make sure user isn't considered "registered" if form validation failes
  return "Please enter a valid email address";
}
</script>

<!-- Jquery for fancy things!-->

<script>
    // to make fancy buttons.  Uses noConflict just in case
     var $jQ = jQuery.noConflict();

     // Use jQuery via $j(...)
     $jQ(document).ready(function(){

       $jQ('input[id=mktFrmSubmit]').wrap("<div class='buttonSubmit'></div>");
       $jQ(".buttonSubmit").prepend("<span></span>");

     });
</script>

<script type="text/javascript" src="//b2c-mlm.marketo.com/jsloader/419dd01d-e934-4949-a94b-60b5f96af7ef/loader.php.js"></script>

<script type="text/javascript" src="http://fuel.brafton.com/js/mktFormSupport.js"></script>
  
<script type="text/javascript">
  var formEdit = false;

  var socialSignOn = {
    isEnabled: false,
    enabledNetworks: [''],
    cfId: '',
    codeSnippet: ''
  };
</script>

<script type="text/javascript">
var profiling = {
  isEnabled: false,
  numberOfProfilingFields: 3,
  alwaysShowFields: [ 'mktDummyEntry']
};
var mktFormLanguage = 'English'
</script>
<script type="text/javascript"> function mktoGetForm() {return document.getElementById('mktForm_1496'); }</script>
<div class="wpcf7">
<form class="lpeRegForm formNotEmpty" method="post" enctype="application/x-www-form-urlencoded" action="http://fuel.brafton.com/index.php/leadCapture/save" id="mktForm_1496" name="mktForm_1496">
	<div class='mktLblLeft left-col'>
		<div class='mktFormReq mktField f-row'>
      <span class='mktInput wpcf7-form-control-wrap'><input class='mktFormText mktFormString mktFReq cell-right req' name="FirstName" id="FirstName" type='text' placeholder="First Name" maxlength='255' tabIndex='1' size="40" /><span class='mktFormMsg'></span></span>
    </div>
    <div class='mktFormReq mktField f-row'>
      <span class='mktInput wpcf7-form-control-wrap'><input class='mktFormText mktFormString mktFReq cell-right req' name="LastName" id="LastName" type='text' placeholder="Last Name" maxlength='255' tabIndex='2' size="40" /><span class='mktFormMsg'></span></span>
    </div>
		<div class='mktFormReq mktField f-row'>
      <span class='mktInput wpcf7-form-control-wrap'><input class='mktFormText mktFormEmail mktFReq cell-right req' name="Email" id="Email" type='text' placeholder="Company Email" maxlength='255' tabIndex='2' size="40" /><span class='mktFormMsg'></span></span>
    </div>
    <div class='mktFormReq mktField f-row'>
      <span class='mktInput wpcf7-form-control-wrap'><input class='mktFormText mktFormString mktFReq cell-right req' name="Company" id="Company" type='text' placeholder="Company" maxlength='255' tabIndex='5' size="40" /><span class='mktFormMsg'></span></span>
    </div>
  </div>

  <div class="right-col">
		<div id='mktFrmButtons f-row'>
      <!--<button id='mktFrmSubmit' class="wpcf7-submit button" type="button"  onclick='formSubmit(document.getElementById("mktForm_1496")); return false;' >Submit</button>-->
      <!--<input id='mktFrmSubmit' type='submit' style="width: auto; overflow: visible; padding-left: .25em; padding-right: .25em;" value='Submit' name='submitButton' onclick='formSubmit(document.getElementById("mktForm_1496")); return false;' />-->
      <input id='mktFrmSubmit' type='submit' class="wpcf7-submit button" value='SEND ME THE GUIDE' name='submitButton' onclick='formSubmit(document.getElementById("mktForm_1496")); return false;' />
      <input style='display: none;' id='mktFrmReset' type='reset' value='Clear' name='resetButton' onclick='formReset(document.getElementById("mktForm_1496")); return false;' />
    </div>
  </div>
  <span style="display:none;"><input type="text" name="_marketo_comments" value="" /></span>
	<input type="hidden" name="lpId" value="2063" />
	<input type="hidden" name="subId" value="25" />
	<input type="hidden" name="munchkinId" value="447-XFF-352" />
	<input type="hidden" name="kw" value="" />
	<input type="hidden" name="cr" value="" />
	<input type="hidden" name="searchstr" value="" />
	<input type="hidden" name="lpurl" value="http://fuel.brafton.com/SocialTrackingBridge.html" />
	<input type="hidden" name="formid" value="1496" />
  <input type="hidden" name="returnURL" value= "http://fuel.brafton.com/rs/brafton/images/eBook_11.2014_ContentforSocial.pdf" />
  <input type="hidden" name="retURL" value="http://fuel.brafton.com/SocialEbook_SocialAd.html" />
	<input type="hidden" name="returnLPId" value="-1" />
	<input type="hidden" name="_mkt_disp" value="return" />
  <input type="hidden" name="_mkt_trk" value="" />
</form>
</div>

<script type="text/javascript">

function setCookies() {
  //declare variables to calculate expiration
  var dt, expires, days;
  days = 180; //cookies last 180 days
  dt = new Date();
  dt.setTime(dt.getTime()+(days*24*60*60*1000));
  expires = "; expires="+dt.toGMTString()+"; path=/"; //string to add to each cookie, setting expire time and cookie path to site root

  //set them cookies!
  //add required field cookies
  
}

function formSubmit(elt) {
  setCookies();
  var theURL = document.URL;
 
  ga('send', 'event', 'Content for Social Social Media Ad', 'Download', '<?php echo curPageURL(); ?>');
  return Mkto.formSubmit(elt);
}

function formReset(elt) {
  return Mkto.formReset(elt);
}
</script>

<script type="text/javascript" src="https://ssl-munchkin.marketo.net/js/munchkin.js"></script>
<script>mktoMunchkin('447-XFF-352', {customName: 'ContentForSocialMediaAdDownload', wsInfo: 'j1RR'});</script>
<!-- <script>Munchkin.init('447-XFF-352');</script> -->