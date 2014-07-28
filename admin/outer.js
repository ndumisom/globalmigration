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
if (x==null || x=="Username")
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
var x=document.forms["task"]["consultant"].value;
if (x==null || x=="")
  {
  alert("Please select the consultant name");
  return false;
  }
  
var y=document.forms["task"]["allocated_task"].value;
if (y==null || y=="")
  {
  alert("Please select the task ");
  return false;
  }
  

  
  var a=document.forms["task"]["allocated_to"].value;
if (a==null || a=="")
  {
  alert("Please select allocated person");
  return false;
  }
  
  var b=document.forms["task"]["due_date"].value;
if (b==null || b=="")
  {
  alert("Please enter the due date");
  return false;
  }
  var c=document.forms["taskr"]["allocated_to"].value;
if (c==null || c=="")
  {
  alert("Please select a staff");
  return false;
  }
  
    var d=document.forms["task"]["allocated_task"].value;
if (d==null || d=="")
  {
  alert("Please select a task");
  return false;
  }
  
  var d=document.forms["task"]["details"].value;
if (d==null || d=="")
  {
  alert("Please search for the client");
  return false;
  }
  
}

//Permits
/*
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
*/
//Client
function validateClient()
{
var x=document.forms["client"]["file_no"].value;
if (x==null || x=="")
  {
  alert("Please enter a file number");
  return false;
  }
  
var x=document.forms["client"]["title"].value;
if (x=="" || x=="select")
  {
  alert("Please select a title");
  return false;
  }
  
  var x=document.forms["client"]["surname"].value;
if (x==null || x=="")
  {
  alert("Please enter surname");
  return false;
  }
  
  var x=document.forms["client"]["firstnames"].value;
if (x==null || x=="")
  {
  alert("Please enter first name");
  return false;
  }
   var x=document.forms["client"]["email"].value;
   var atpos=x.indexOf("@");
if (atpos<1 ||x==null || x=="")
  {
  alert("Not a valid e-mail address");
  return false;
  }
   var x=document.forms["client"]["captured_by"].value;
if (x==null || x=="")
  {
  alert("Please enter Captured By");
  return false;
  }
  
 
  }
  
  function validateMsg()
{
  
  var x=document.forms["compose"]["to"].value;
if (x==null || x=="")
  {
  alert("Please enter a name of a recipient");
  return false;
  }
  
  var y=document.forms["compose"]["msg"].value;
if (y==null || y=="")
  {
  alert("Please enter a message");
  return false;
  }
}
  
function validateAdd()
{
  
  var x=document.forms["add_user"]["fname"].value;
if (x==null || x=="")
  {
  alert("Please enter first name");
  return false;
  }
  
  var y=document.forms["add_user"]["surname"].value;
if (y==null || y=="")
  {
  alert("Please enter  surname");
  return false;
  }
 
  
   var z=document.forms["add_user"]["email"].value;
   var atpos=z.indexOf("@");
if (atpos<1 ||z==null || z=="")
  {
  alert("Not a valid e-mail address");
  return false;
  }
    var a=document.forms["add_user"]["cell_no"].value;
if (sNaN(a)||a.indexOf(" ")!=-1)
  {
  alert("Enter numeric value");
  return false;
  }
  
  if (a.length<8 || a.length>13)
           {
                alert("Please enter a valid number");
                return false;
           }
  
  var c=document.forms["add_user"]["level"].value;
if (c==null || c=="")
  {
  alert("Please select a level");
  return false;
  }
  
}


function checkdate(input){
var validformat=/^\d{2}\/\d{2}\/\d{4}$/ //Basic check for format validity
var returnval=false
if (!validformat.test(input.value))
alert("Invalid Date Format. Please correct and submit again.")
else{ //Detailed check for valid date ranges
var monthfield=input.value.split("-")[0]
var dayfield=input.value.split("-")[1]
var yearfield=input.value.split("-")[2]
var dayobj = new Date(yearfield, monthfield-1, dayfield)
if ((dayobj.getFullYear()!=yearfield)||(dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield))
alert("Invalid Day, Month, or Year range detected. Please correct and submit again.")
else
returnval=true
}
if (returnval==false) input.select()
return returnval
}
