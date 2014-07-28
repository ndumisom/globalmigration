// JavaScript Document

/* This script and many more are available free online at
The JavaScript Source!! http://javascript.internet.com
Created by: Steve Chipman | http://slayeroffice.com/ */
var ALERT_TITLE = ".........Globlal notification..........";
var ALERT_BUTTON_TEXT = "[ OK ]";

// over-ride the alert method only if this a newer browser.
// Older browser will see standard alerts
if(document.getElementById) {
  window.alert = function(txt) {
    createCustomAlert(txt);
  }
}

function createCustomAlert(txt) {
  // shortcut reference to the document object
  d = document;

  // if the modalContainer object already exists in the DOM, bail out.
  if(d.getElementById("modalContainer")) return;

  // create the modalContainer div as a child of the BODY element
  mObj = d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
  mObj.id = "modalContainer";
   // make sure its as tall as it needs to be to overlay all the content on the page
  mObj.style.height = document.documentElement.scrollHeight + "px";

  // create the DIV that will be the alert 
  alertObj = mObj.appendChild(d.createElement("div"));
  alertObj.id = "alertBox";
  // MSIE doesnt treat position:fixed correctly, so this compensates for positioning the alert
  if(d.all && !window.opera) alertObj.style.top = document.documentElement.scrollTop + "px";
  // center the alert box
  alertObj.style.left = (d.documentElement.scrollWidth - alertObj.offsetWidth)/2 + "px";

  // create an H1 element as the title bar
  h1 = alertObj.appendChild(d.createElement("h1"));
  h1.appendChild(d.createTextNode(ALERT_TITLE));

  // create a paragraph element to contain the txt argument
  msg = alertObj.appendChild(d.createElement("p"));
  msg.innerHTML = txt;
  
  // create an anchor element to use as the confirmation button.
  btn = alertObj.appendChild(d.createElement("a"));
  btn.id = "closeBtn";
  btn.appendChild(d.createTextNode(ALERT_BUTTON_TEXT));
  btn.href = "#";
  // set up the onclick event to remove the alert when the anchor is clicked
  btn.onclick = function() { removeCustomAlert();return false; }
}

// removes the custom alert from the DOM
function removeCustomAlert() {
  document.getElementsByTagName("body")[0].removeChild(document.getElementById("modalContainer"));
}

function validateLogin()
{
var x=document.forms["login"]["username"].value
if (x==null || x=="")
  {
  alert("Please enter your username");
  return false;
  }
  
var x=document.forms["login"]["password"].value
if (x==null || x=="Password"|| x == "")
  {
  alert("Please enter your password");
  return false;
  }
}

function validateTask()
{
var x=document.forms["task"]["consultant"].value
if (x==null || x=="")
  {
  alert("Please enter consultant name");
  return false;
  }
  
var y=document.forms["task"]["allocated_task"].value
if (y==null || y=="")
  {
  alert("Please enter the task you are allocating");
  return false;
  }
  
  var z=document.forms["taskr"]["allocated_by"].value
if (z==null || z=="")
  {
  alert("Please enter allocated_by");
  return false;
  }
  
  var a=document.forms["task"]["allocated_to"].value
if (a==null || a=="")
  {
  alert("Please enter allocated person");
  return false;
  }
  
  var b=document.forms["task"]["due_date"].value
if (b==null || b=="")
  {
  alert("Please enter the due date");
  return false;
  }
  var c=document.forms["add_user"]["level"].value
if (c==null || c=="")
  {
  alert("Please select a level");
  return false;
  }
  
}

//Permits

function validatePermit()
{
var x=document.forms["permit"]["service"].value
if (x==null || x=="")
  {
  alert("Please enter service");
  return false;
  }
  
var x=document.forms["permit"]["permit"].value
if (x==null || x=="")
  {
  alert("Please enter permit");
  return false;
  }
  
  var x=document.forms["permit"]["permit_status"].value
if (x==null || x=="")
  {
  alert("Please enterv permit status");
  return false;
  }
  
  var x=document.forms["permit"]["permit_no"].value
if (x==null || x=="")
  {
  alert("Please enter permit number");
  return false;
  }
  
  var x=document.forms["permit"]["submission_office"].value
if (x==null || x=="")
  {
  alert("Please enter subbmission office");
  return false;
  }
  var x=document.forms["permit"]["submission_date"].value
if (x==null || x=="")
  {
  alert("Please enter submision date");
  return false;
  }
   var x=document.forms["permit"]["expiry_date"].value
if (x==null || x=="")
  {
  alert("Please expiry_date");
  return false;
  }
   var x=document.forms["permit"]["dha_reference_no"].value
if (x==null || x=="")
  {
  alert("Please enter DHA reference number");
  return false;
  }
  
   var x=document.forms["permit"]["dha_case_number"].value
if (x==null || x=="")
  {
  alert("Please enter DHA case nimber");
  return false;
  }
   var x=document.forms["permit"]["fee"].value
if (x==null || x=="")
  {
  alert("Please enter fee");
  return false;
  }
  
   var x=document.forms["permit"]["invoice_no"].value
if (x==null || x=="")
  {
  alert("Please enter invoice number");
  return false;
  }
  
   var x=document.forms["permit"]["j_invoice_no"].value
if (x==null || x=="")
  {
  alert("Please enter  j invoice number");
  return false;
  }
  
  
  
}

//Client
function validateClient()
{
var x=document.forms["client"]["file_no"].value
if (x==null || x=="")
  {
  alert("Please enter file number");
  return false;
  }
  
var x=document.forms["client"]["title"].value
if (x=="" || x=="select")
  {
  alert("Please select a title");
  return false;
  }
  
  var x=document.forms["client"]["surname"].value
if (x==null || x=="")
  {
  alert("Please enter surname");
  return false;
  }
  
  var x=document.forms["client"]["firstname"].value
if (x==null || x=="")
  {
  alert("Please enter first name");
  return false;
  }
  
  var x=document.forms["client"]["application_type"].value
if (x==null || x=="")
  {
  alert("Please enter application type");
  return false;
  }
  var x=document.forms["client"]["dob"].value
if (x==null || x=="")
  {
  alert("Please enter date of birth");
  return false;
  }
  
    var x=document.forms["client"]["passport_no"].value
if (x==null || x=="")
  {
  alert("Please enter passport number");
  return false;
  }
  
    var x=document.forms["client"]["passport_expiry_date"].value
if (x==null || x=="")
  {
  alert("Please enter date of birth");
  return false;
  }
  

  var x=document.forms["client"]["country_of_origin"].value
if (x==null || x=="")
  {
  alert("Please select a country");
  return false;
  }
  
    var x=document.forms["client"]["dob"].value
if (x==null || x=="")
  {
  alert("Please enter date of birth");
  return false;
  }
  
}
  
function validateAdd()
{
var x=document.forms["add_user"]["username"].value
if (x==null || x=="")
  {
  alert("Please enter your username");
  return false;
  }
  
var x=document.forms["add_user"]["password"].value
if (x==null || x=="")
  {
  alert("Please enter your password");
  return false;
  }
  
  var x=document.forms["add_user"]["firstname"].value
if (x==null || x=="")
  {
  alert("Please enter your first name");
  return false;
  }
  
  var x=document.forms["add_user"]["surname"].value
if (x==null || x=="")
  {
  alert("Please enter your surname");
  return false;
  }
  
  var x=document.forms["add_user"]["email"].value
if (x==null || x=="")
  {
  alert("Please enter your email");
  return false;
  }
  var x=document.forms["add_user"]["level"].value
if (x==null || x=="")
  {
  alert("Please select a level");
  return false;
  }
  
}

