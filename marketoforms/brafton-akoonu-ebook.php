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
<script type="text/javascript"> function mktoGetForm() {return document.getElementById('mktForm_1532'); }</script>
<style>
.wpcf7-form-control-wrap {
  width: 68%;
}
</style>
<div class="down">Download the eBook</div>
<div class="wpcf7">
<form class="lpeRegForm formNotEmpty" method="post" enctype="application/x-www-form-urlencoded" action="http://fuel.brafton.com/index.php/leadCapture/save" id="mktForm_1532" name="mktForm_1532">
  <div class='mktLblLeft left-col'>

      <span class='mktInput wpcf7-form-control-wrap'>
        <input class='mktFormText mktFormEmail mktFReq cell-right req' name="Email" id="Email" type='text' placeholder="Email Address" maxlength='255' tabIndex='4' size="40" value="<?php echo $_COOKIE['Email']; ?>" /><span class='mktFormMsg'></span>
        <input id='mktFrmSubmit' type='submit' class="wpcf7-submit button" value='Download Now' name='submitButton' onclick='formSubmit(document.getElementById("mktForm_1532")); return false;' />
        <input style='display: none;' id='mktFrmReset' type='reset' value='Clear' name='resetButton' onclick='formReset(document.getElementById("mktForm_1532")); return false;' />
      </span>
  </div>

  <span style="display:none;"><input type="text" name="_marketo_comments" value="" /></span>
	<input type="hidden" name="lpId" value="1466" />
	<input type="hidden" name="subId" value="25" />
	<input type="hidden" name="munchkinId" value="447-XFF-352" />
	<input type="hidden" name="kw" value="" />
	<input type="hidden" name="cr" value="" />
	<input type="hidden" name="searchstr" value="" />
	<input type="hidden" name="lpurl" value="http://fuel.brafton.com/Bridge-Download-Resource-Fueling-FB--Twitter-with-Custom-News.html" />
	<input type="hidden" name="formid" value="1532" />
  <input type="hidden" name="returnURL" value= "http://fuel.brafton.com/rs/447-XFF-352/images/Brafton%20-%20Buyer%20Persona%20Conversation%20Starters.pdf" />
  <input type="hidden" name="retURL" value="http://fuel.brafton.com/rs/447-XFF-352/images/Brafton%20-%20Buyer%20Persona%20Conversation%20Starters.pdf" />
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
  document.cookie = "Email=" + document.getElementById('Email').value + expires;
   
}

function formSubmit(elt) {
  setCookies();
  var theURL = document.URL;
 
  ga('send', 'event', 'Brafton Akoonu Ebook', 'Download', '<?php echo curPageURL(); ?>');
  return Mkto.formSubmit(elt);
}

function formReset(elt) {
  return Mkto.formReset(elt);
}
</script>

<script type="text/javascript" src="https://ssl-munchkin.marketo.net/js/munchkin.js"></script>
<script>mktoMunchkin('447-XFF-352', {customName: 'BraftonAkoonuEbook', wsInfo: 'j1RR'});</script>
<!-- <script>Munchkin.init('447-XFF-352');</script> -->