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
<!--Mike comment-->
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

<script type="text/javascript">

    function mailchimpSignup(){
    
      var $form = $jQ("#mktForm_1392");
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
          document.mktForm_1392.submit();
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
<script type="text/javascript"> function mktoGetForm() {return document.getElementById('mktForm_1392'); }</script>
<style>
.wpcf7-form-control-wrap {
  width: 68%;
}
</style>

<div class="wpcf7">

  <form class="lpeRegForm formNotEmpty" method="post" enctype="application/x-www-form-urlencoded" action="http://fuel.brafton.com/index.php/leadCapture/save" id="mktForm_1392" name="mktForm_1392">
  <div class='mktLblLeft left-col'>
    <div class='mktFormReq mktField f-row'>
      <label class="cell-left">First Name:</label>
      <span class='mktInput wpcf7-form-control-wrap'>
        <input class='mktFormText mktFormString mktFReq' name="FirstName" id="FirstName" type='text' value="<?php echo $_COOKIE['FirstName']; ?>"  maxlength='255' tabIndex='1' />
        <span class='mktFormMsg'>
        </span>
      </span>
    </div>
    <div class='mktFormReq mktField f-row'>
      <label class="cell-left">Last Name:</label>
      <span class='mktInput wpcf7-form-control-wrap'>
        <input class='mktFormText mktFormString mktFReq' name="LastName" id="LastName" type='text' value="<?php echo $_COOKIE['LastName']; ?>"  maxlength='255' tabIndex='2' />
        <span class='mktFormMsg'>
        </span>
      </span>
    </div>
    <div class='mktFormReq mktField f-row'>
      <label class="cell-left">Email:</label>
      <span class='mktInput wpcf7-form-control-wrap'>
        <input class='mktFormText mktFormEmail mktFReq' name="Email" id="Email" type='text' value="<?php echo $_COOKIE['Email']; ?>"  maxlength='255' tabIndex='3' />
        <span class='mktFormMsg'>
        </span>
      </span>
    </div>
    <div class='mktField f-row'>
      <label class="cell-left">Phone:</label>
      <span class='mktInput wpcf7-form-control-wrap'>
        <input class='mktFormText mktFormString' name="MainPhone" id="MainPhone" type='text' value="<?php echo $_COOKIE['Phone']; ?>"  maxlength='255' tabIndex='4' />
        <span class='mktFormMsg'>
        </span>
      </span>
    </div>
    <div class='mktFormReq mktField f-row'>
      <label class="cell-left">Company:</label>
      <span class='mktInput wpcf7-form-control-wrap'>
        <input class='mktFormText mktFormString mktFReq' name="Company" id="Company" type='text' value="<?php echo $_COOKIE['Company']; ?>"  maxlength='255' tabIndex='5' />
        <span class='mktFormMsg'>
        </span>
      </span>
    </div>
  <div class='mktField f-row'>
    <label class="cell-left">Website:</label>
    <span class='mktInput wpcf7-form-control-wrap'>
      <input class='mktFormText mktFormString' name="Corporate_Website__c" id="Corporate_Website__c" type='text' value="<?php echo $_COOKIE['Website']; ?>"  maxlength='1300' tabIndex='6' />
      <span class='mktFormMsg'>
      </span>
    </span>
  </div>
</div>
  <div class="right-col">
    <div class='mktField f-row'>
      <div class="f-row message">
          <label for="message-contact">Include a Message? (Optional)</label>
          <span class='mktInput wpcf7-form-control-wrap message'>
            <textarea class='mktFormTextarea mktFormTextarea' name="requestademomessage" id="requestademomessage" placeholder="A one-liner about your company and/or industry would be helpful, as well as availability." cols='40' rows='4'  tabIndex='7'></textarea>
            <span class='mktFormMsg'></span>
          </span>
        </div>
    </div>
  <div class='mktField' style="display: none;">
    <label class="cell-left">Lead Source:</label>
    <span class='mktInput wpcf7-form-control-wrap'>
      <input class='mktFormHidden' name="LeadSource" id="LeadSource" type='hidden' value="Web (Brafton.com Web Referral)" />
      <span class='mktFormMsg'>
      </span>
    </span>
  </div>
  <div class='mktField' style="display: none;">
    <label class="cell-left">MKTO Source:</label>
    <span class='mktInput wpcf7-form-control-wrap'>
      <input class='mktFormHidden' name="MKTO_Source__c" id="MKTO_Source__c" type='hidden' value="Web (Brafton.com Web Referral)" />
      <span class='mktFormMsg'></span>
    </span>
  </div>
  <div id='mktFrmButtons f-row' onclick="ga('send', 'event', 'Request a Demo', 'Form Submission', 'Request_A_Demo');">
    <!--<input id='mktFrmSubmit' type='submit' style="width: auto; overflow: visible; padding-left: .25em; padding-right: .25em;" value='Request a Demo' name='submitButton' onclick='formSubmit(document.getElementById("mktForm_1392")); return false;' />&nbsp;-->
     <input id='mktFrmSubmit' type='submit' class="wpcf7-submit button" value='Request a Demo' name='submitButton' onclick='formSubmit(document.getElementById("mktForm_1392")); return false;' />
            <input style='display: none;' id='mktFrmReset' type='reset'
              value='Clear' name='resetButton' onclick='formReset(document.getElementById("mktForm_1392")); return false;' /> 
          </div>
  </div>
  <span style="display:none;"><input type="text" name="_marketo_comments" value="" /></span>
  <input type="hidden" name="lpId" value="1911" />
  <input type="hidden" name="subId" value="25" />
  <input type="hidden" name="munchkinId" value="447-XFF-352" />
  <input type="hidden" name="kw" value="" />
  <input type="hidden" name="cr" value="" />
  <input type="hidden" name="searchstr" value="" />
  <input type="hidden" name="lpurl" value="http://fuel.brafton.com/RequestademoBridge.html?cr={creative}&kw={keyword}" />
  <input type="hidden" name="formid" value="1392" />
  <input type="hidden" name="returnURL" value="http://fuel.brafton.com/ThankYou1.html" />
  <input type="hidden" name="retURL" value="http://fuel.brafton.com/ThankYou1.html" />
  <input type="hidden" name="returnLPId" value="-1" />
  <input type="hidden" name="_mkt_disp" value="return" />
      <input type="hidden" name="_mkt_trk" value="id:447-XFF-352&token:_mch-brafton.com-1411494634117-92296" />
  </form>
<div id="message"></div>
</div>

<script type="text/javascript">

//function to submit Mailchimp application
jQuery(document).ready(function() {
  jQuery('#mktForm_1392').submit(function() {
    if ( document.getElementById('newsletterSignup').checked ) {
      jQuery("#message").html("<span class='error'>Adding your email address...</span>");
      jQuery.ajax({
        url: 'inc/store-address.php',
        data: jQuery('#mktForm_1392').serialize(),
        success: function(msg) {
          jQuery('#message').html(msg);
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
  //document.cookie = "JobTitle=" + document.getElementById('Title').value + expires;
  document.cookie = "Email=" + document.getElementById('Email').value + expires;
  document.cookie = "Website=" + document.getElementById('Website').value + expires;

  //add non-required field cookies (if they've been filled in)
  var phone, industry;
  phone = document.getElementById('Phone').value;
  //industry = document.getElementById('Industry').value;
  /*if (industry)
    document.cookie = "Industry=" + industry + expires;*/
  if (phone)
    document.cookie = "Phone=" + phone + expires;

  //check if person filling out form would like to subscribe to newsletter
  if ( document.getElementById('Newsletter_Frequency__c').checked ) {
    document.cookie = "Newsletter=Weekly" + expires;
  }

  //finally, add a cookie indicating the user has registered
  //document.cookie = document.URL + "=true" + expires;
  document.cookie = "Registered=true" + expires;

  //add a cookie with user's name, to allow referencing the database for whether they're registered or not
  document.cookie = "Name=" + document.getElementById('FirstName').value + document.getElementById('LastName').value + expires;
}

function formSubmit(elt) {
  setCookies();
  var theURL = document.URL;
  
  ga('send', 'event', 'Request a Demo', 'Form Submission', 'Request_A_Demo');
  
  return Mkto.formSubmit(elt);
  
}

function formReset(elt) {
  return Mkto.formReset(elt);
}
</script>

<script type="text/javascript" src="https://ssl-munchkin.marketo.net/js/munchkin.js"></script>
<script>mktoMunchkin('447-XFF-352', {customName: 'BRWebinar', wsInfo: 'j1RR'});</script>
<!-- <script>Munchkin.init('447-XFF-352');</script> -->