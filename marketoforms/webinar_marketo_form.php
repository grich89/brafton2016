<?php
require('./wp-blog-header.php');

error_reporting(-1);


function post_to_url($url, $data) {
   $fields = '';
   foreach($data as $key => $value) { 
    $fields .= $key . '=' . $value . '&'; 
  }
  rtrim($fields, '&');

  $post = curl_init();

  curl_setopt($post, CURLOPT_URL, $url);
  curl_setopt($post, CURLOPT_POST, count($data));
  curl_setopt($post, CURLOPT_POSTFIELDS, $fields);
  curl_setopt($post, CURLOPT_RETURNTRANSFER, 1);

  $result = curl_exec($post);

  curl_close($post);
}

if($_POST['newsletterSignup'] == "Yes" && isset($_POST['Email'])){

  //mail("steven.shwartz@brafton.com","Marketo Email",var_dump($_POST));
  //submit to mailchimp
  $nbody = array(
    "u" => 'bf512a3688df1ae9ecc90514a',
    "id" => 'f888470695',
    'FNAME' => $_POST['FirstName'],
    'LNAME' => $_POST['LastName'],
    'EMAIL' => $_POST['Email'],
    'ISLEAD' => 'Yes'
  );
  $url = 'http://brafton.us2.list-manage2.com/subscribe/post';
  post_to_url($url, $nbody);
}

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


<script type="text/javscript">
  function del_cookie(name) {
    document.cookie = name + '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
  }
</script>

<!-- SYSTEM JAVASCRIPT - DO NOT EDIT -->
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

<script type="text/javascript">

    function mailchimpSignup(){
    
      var $form = $jQ("#mktForm_1034");
      // let's select and cache all the fields
      var $inputs = $form.find("input, select, button, textarea");
      // serialize the data in the form
      var serializedData = $form.serialize();
      var request = $jQ.ajax({
        url: "http://tech.contentlead.com/marketo/webinar-marketo-form.php",
        type: "post",
          data: serializedData
      });

      // callback handler that will be called on success
      request.done(function (response, textStatus, jqXHR){
          // log a message to the console
          console.log("Hooray, it worked!"+serializedData);
          //submit form on page
          document.mktForm_1034.submit();
        });

    }

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
<script type="text/javascript"> function mktoGetForm() {return document.getElementById('mktForm_1034'); }</script>
<style>
.wpcf7-form-control-wrap {
  width: 68%;
}
</style>

<div class="wpcf7">
<form class="lpeRegForm formNotEmpty" method="post"  enctype="application/x-www-form-urlencoded" action="http://fuel.brafton.com/index.php/leadCapture/save" id="mktForm_1034" name="mktForm_1034">
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
      <label class="cell-left">Company Name:</label>
      <span class='mktInput wpcf7-form-control-wrap'><input class='mktFormText mktFormString mktFReq cell-right req' name="Company" id="Company" type='text' value="<?php echo $_COOKIE['Company']; ?>"  maxlength='255' tabIndex='3' size="40" /><span class='mktFormMsg'></span></span>
    </div>
		<div class='mktFormReq mktField f-row'>
      <label class="cell-left">Job Title:</label>
      <span class='mktInput wpcf7-form-control-wrap'><input class='mktFormText mktFormString mktFReq cell-right req' name="Title" id="Title" type='text' value="<?php echo $_COOKIE['JobTitle']; ?>"  maxlength='255' tabIndex='4' size="40" /><span class='mktFormMsg'></span></span>
    </div>
		<div class='mktField f-row'>
      <label class="cell-left">Industry:</label>
      <span class='mktInput wpcf7-form-control-wrap'><input class='mktFormText mktFormString cell-right' name="Industry" id="Industry" type='text' value="<?php echo $_COOKIE['Industry']; ?>"  maxlength='255' tabIndex='5' size="40" /><span class='mktFormMsg'></span></span>
    </div>
		<div class='mktField f-row'>
      <label class="cell-left">Phone Number:</label>
      <span class='mktInput wpcf7-form-control-wrap'><input class='mktFormText mktFormPhone cell-right' name="Phone" id="Phone" type='text' value="<?php echo $_COOKIE['Phone']; ?>"  maxlength='255' tabIndex='6' size="40" /><span class='mktFormMsg'></span></span>
    </div>
    <div class='mktFormReq mktField f-row'>
      <label class="cell-left">Email Address:</label>
      <span class='mktInput wpcf7-form-control-wrap'><input class='mktFormText mktFormEmail mktFReq cell-right req' name="Email" id="Email" type='text' value="<?php echo $_COOKIE['Email']; ?>"  maxlength='255' tabIndex='7' size="40" /><span class='mktFormMsg'></span></span>
    </div>
		<div class='mktFormReq mktField f-row'>
      <label class="cell-left">Website:</label>
      <span class='mktInput wpcf7-form-control-wrap'><input class='mktFormText mktFormUrl mktFReq cell-right req' name="Website" id="Website" type='text' value="<?php echo $_COOKIE['Website']; ?>"  maxlength='255' tabIndex='8' size="40" /><span class='mktFormMsg'></span></span>
    </div>
		<!--<div class='mktField' style="display: none;">
      <label class="cell-left">Lead Source:</label>
      <span class='mktInput wpcf7-form-control-wrap'><input class='mktFormHidden' name="LeadSource" id="LeadSource" type='hidden' value="Webinar" /><span class='mktFormMsg'></span></span>
    </div>-->
    <div class='mktField' style="display: none;">
      <label class="cell-left">MKTO Source:</label>
      <span class='mktInput wpcf7-form-control-wrap'><input class='mktFormHidden' name="MKTO_Source__c" id="MKTO_Source__c" type='hidden' value="Webinar - '<?php echo curPageURL(); ?>'" /><span class='mktFormMsg'></span></span>
    </div>
  </div>

  <div class="right-col">
    <div class="f-row">
      <div class="feature" style="display:none;">
        <span class="signup">
          <span class="wpcf7-list-item">
            <input type="checkbox" name="Newsletter_Frequency__c" id="Newsletter_Frequency__c" style="width:auto !important;margin-right:10px" value="Yes">
          </span>
        </span>
        <label for="sign_up">Get Our Marketing News? (Weekly Email)</label>
      </div>
    </div>
		
		<div id='mktFrmButtons f-row'>
      <!--<input id='mktFrmSubmit' type='submit' style="width: auto; overflow: visible; padding-left: .25em; padding-right: .25em;" value='Submit' name='submitButton' onclick='formSubmit(document.getElementById("mktForm_1034")); return false;' />-->
      <input id='mktFrmSubmit' type='submit' class="wpcf7-submit button" value='Submit' name='submitButton' onclick='formSubmit(document.getElementById("mktForm_1034")); return false;' />
      <input style='display: none;' id='mktFrmReset' type='reset' value='Clear' name='resetButton'  />
    </div>
  </div>
  <span style="display:none;"><input type="text" name="_marketo_comments" value="" /></span>
	<input type="hidden" name="lpId" value="1268" />
	<input type="hidden" name="subId" value="25" />
	<input type="hidden" name="munchkinId" value="447-XFF-352" />
	<input type="hidden" name="kw" value="" />
	<input type="hidden" name="cr" value="" />
	<input type="hidden" name="searchstr" value="" />
	<input type="hidden" name="lpurl" value="http://fuel.brafton.com/BRWebinar.html?cr={creative}&kw={keyword}" />
	<input type="hidden" name="formid" value="1034" />
  <input type="hidden" name="returnURL" value="<?php echo curPageURL() ?>" />
  <input type="hidden" name="retURL" value="<?php echo curPageURL() ?>" />
	<input type="hidden" name="returnLPId" value="-1" />
	<input type="hidden" name="_mkt_disp" value="return" />
  <input type="hidden" name="_mkt_trk" value="" />
</form>
<div id="message"></div>
</div>

<script type="text/javascript">

//function to submit Mailchimp application
$(document).ready(function() {
  $('#mktForm_1034').submit(function() {
    if ( document.getElementById('newsletterSignup').checked ) {
      $("#message").html("<span class='error'>Adding your email address...</span>");
      $.ajax({
        url: 'inc/store-address.php',
        data: $('#mktForm_1034').serialize(),
        success: function(msg) {
          $('#message').html(msg);
        }
      });
      return false;
    }
  });


});

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
  document.cookie = "Website=" + document.getElementById('Website').value + expires;

  //add non-required field cookies (if they've been filled in)
  var phone, industry;
  phone = document.getElementById('Phone').value;
  industry = document.getElementById('Industry').value;
  if (industry)
    document.cookie = "Industry=" + industry + expires;
  if (phone)
    document.cookie = "Phone=" + phone + expires;

  //check if person filling out form would like to subscribe to newsletter
  /*if ( document.getElementById('Newsletter_Frequency__c').checked ) {
    document.cookie = "Newsletter=Weekly" + expires;
  }*/

  //finally, add a unique cookie indicating the user has registered
  
  document.cookie = "Registered1=" + window.location.href.split('?')[0] + expires;

  //add a cookie with user's name, to allow referencing the database for whether they're registered or not
  document.cookie = "Name=" + document.getElementById('FirstName').value + document.getElementById('LastName').value + expires;
}

function formSubmit(elt) {
  setCookies();
  var theURL = document.URL;
 
  ga('send', 'event', 'Webinar', 'Access', '<?php echo curPageURL(); ?>');
  return Mkto.formSubmit(elt);
}
/*
function formSubmit(elt) {
  setCookies();
  var theURL = document.URL;
  _gaq.push(['_trackEvent', 'Webinar', 'Access', '<?php echo curPageURL(); ?>' ]);

   setTimeout(function(){
 return Mkto.formSubmit(elt)

   },1500)
 
}*/
function formReset(elt) {
  return Mkto.formReset(elt);
}
</script>


<script>mktoMunchkin('447-XFF-352', {customName: 'BRWebinar', wsInfo: 'j1RR'});</script>
<!-- <script>Munchkin.init('447-XFF-352');</script> -->