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

<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js?ver=1.8.2'></script>
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
<script type="text/javascript"> function mktoGetForm() {return document.getElementById('mktForm_1348'); }</script>
<style>
.wpcf7-form-control-wrap {
  width: 68%;
}
</style>
<div class="down">Download the Guide</div>
<div class="wpcf7">
<form class="lpeRegForm formNotEmpty" method="post" enctype="application/x-www-form-urlencoded" action="http://fuel.brafton.com/index.php/leadCapture/save" id="mktForm_1348" name="mktForm_1348">
	<div class='mktLblLeft left-col'>
		<div class='mktFormReq mktField f-row'>
      <label class="cell-left">First Name:</label>
      <span class='mktInput wpcf7-form-control-wrap'><input class='mktFormText mktFormString mktFReq cell-right req' name="FirstName" id="FirstName" type='text' value="<?php echo $_COOKIE['FirstName']; ?>"  maxlength='255' tabIndex='1' size="40" /><span class='mktFormMsg'></span></span>
    </div>
		<div class='mktFormReq mktField f-row'>
      <label class="cell-left">Last Name:</label>
      <span class='mktInput wpcf7-form-control-wrap'><input class='mktFormText mktFormString mktFReq cell-right req' name="LastName" id="LastName" type='text' value="<?php echo $_COOKIE['LastName']; ?>"  maxlength='255' tabIndex='2' size="40" /><span class='mktFormMsg'></span></span>
    </div>
		<div class='mktFormReq mktField f-row'>
      <label class="cell-left">Job Title:</label>
      <span class='mktInput wpcf7-form-control-wrap'><input class='mktFormText mktFormString mktFReq cell-right req' name="Title" id="Title" type='text' value="<?php echo $_COOKIE['JobTitle']; ?>"  maxlength='255' tabIndex='3' size="40" /><span class='mktFormMsg'></span></span>
    </div>
    <div class='mktFormReq mktField f-row'>
      <label class="cell-left">Email Address:</label>
      <span class='mktInput wpcf7-form-control-wrap'><input class='mktFormText mktFormEmail mktFReq cell-right req' name="Email" id="Email" type='text' value="<?php echo $_COOKIE['Email']; ?>"  maxlength='255' tabIndex='4' size="40" /><span class='mktFormMsg'></span></span>
    </div>
    <div class='mktFormReq mktField f-row'>
      <label class="cell-left">Company Name:</label>
      <span class='mktInput wpcf7-form-control-wrap'><input class='mktFormText mktFormString mktFReq cell-right req' name="Company" id="Company" type='text' value="<?php echo $_COOKIE['Company']; ?>"  maxlength='255' tabIndex='5' size="40" /><span class='mktFormMsg'></span></span>
    </div>
		<div class='mktField' style="display: none;">
      <label class="cell-left">Lead Source:</label>
      <span class='mktInput wpcf7-form-control-wrap'><input class='mktFormHidden' name="LeadSource" id="LeadSource" type='hidden' value="<?php echo get_post_meta( get_the_ID(), 'lead_source', true ); ?>" /><span class='mktFormMsg'></span></span>
    </div>
  </div>

  <div class="right-col">
    <div class="f-row">
      <div class="feature">
        <span class="signup">
          <span class="wpcf7-list-item">
            <input type="checkbox" name="Newsletter_Frequency__c" id="Newsletter_Frequency__c" style="width:auto !important;margin-right:10px" value="Weekly" checked="">
          </span>
        </span>
        <label for="sign_up">Get Our Marketing News? (Weekly Email)</label>
      </div>
    </div>
		
		<div id='mktFrmButtons f-row'>
      <!--<button id='mktFrmSubmit' class="wpcf7-submit button" type="button"  onclick='formSubmit(document.getElementById("mktForm_1348")); return false;' >Submit</button>-->
      <!--<input id='mktFrmSubmit' type='submit' style="width: auto; overflow: visible; padding-left: .25em; padding-right: .25em;" value='Submit' name='submitButton' onclick='formSubmit(document.getElementById("mktForm_1348")); return false;' />-->
      <input id='mktFrmSubmit' type='submit' class="wpcf7-submit button" value='Download Now' name='submitButton' onclick='formSubmit(document.getElementById("mktForm_1348")); return false;' />
      <input style='display: none;' id='mktFrmReset' type='reset' value='Clear' name='resetButton' onclick='formReset(document.getElementById("mktForm_1348")); return false;' />
    </div>
  </div>
  <span style="display:none;"><input type="text" name="_marketo_comments" value="" /></span>
	<input type="hidden" name="lpId" value="1466" />
	<input type="hidden" name="subId" value="25" />
	<input type="hidden" name="munchkinId" value="447-XFF-352" />
	<input type="hidden" name="kw" value="" />
	<input type="hidden" name="cr" value="" />
	<input type="hidden" name="searchstr" value="" />
	<input type="hidden" name="lpurl" value="http://fuel.brafton.com/Bridge-Download-Resource-Fueling-FB--Twitter-with-Custom-News.html" />
	<input type="hidden" name="formid" value="1348" />
  <input type="hidden" name="returnURL" value= "http://fuel.brafton.com/rs/brafton/images/EmergencyChecklistHolidayMarketing_11.2014.pdf" />
  <input type="hidden" name="retURL" value="http://fuel.brafton.com/rs/brafton/images/EmergencyChecklistHolidayMarketing_11.2014.pdf" />
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
  document.cookie = "FirstName=" + document.getElementById('FirstName').value + expires;
  document.cookie = "LastName=" + document.getElementById('LastName').value + expires;
  document.cookie = "Company=" + document.getElementById('Company').value + expires;
  document.cookie = "JobTitle=" + document.getElementById('Title').value + expires;
  document.cookie = "Email=" + document.getElementById('Email').value + expires;
   

  //check if person filling out form would like to subscribe to newsletter
  if ( document.getElementById('Newsletter_Frequency__c').checked ) {
    document.cookie = "Newsletter=Weekly" + expires;
  }
}

function formSubmit(elt) {
  setCookies();
  var theURL = document.URL;
 
  ga('send', 'event', 'Resource', 'Download', '<?php echo curPageURL(); ?>');
  return Mkto.formSubmit(elt);
}

function formReset(elt) {
  return Mkto.formReset(elt);
}
</script>

<script type="text/javascript" src="https://ssl-munchkin.marketo.net/js/munchkin.js"></script>
<script>mktoMunchkin('447-XFF-352', {customName: 'ContentAuthorshipDownload', wsInfo: 'j1RR'});</script>
<!-- <script>Munchkin.init('447-XFF-352');</script> -->