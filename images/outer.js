// JavaScript Document
function validateTask()
{
var x=document.forms["task"]["consultant"].value
if (x==null || x=="")
  {
  alert("Please enterthe consultant name");
  return false;
  }
  
var x=document.forms["task"]["allocated_task"].value
if (x==null || x=="")
  {
  alert("Please enter the task you are allocating");
  return false;
  }
  
  var x=document.forms["taskr"]["allocated_by"].value
if (x==null || x=="")
  {
  alert("Please enter allocated_by");
  return false;
  }
  
  var x=document.forms["task"]["allocated_to"].value
if (x==null || x=="")
  {
  alert("Please enter allocated person");
  return false;
  }
  
  var x=document.forms["task"]["due_date"].value
if (x==null || x=="")
  {
  alert("Please enter the due date");
  return false;
  }
  var x=document.forms["add_user"]["level"].value
if (x==null || x=="")
  {
  alert("Please select a level");
  return false;
  }
  
}