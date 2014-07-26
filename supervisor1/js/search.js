/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    function validateForm()
{
var x=document.forms["search"]["name"].value;
if (x==null || x=="")
  {
  alert("Please enter a search string");
  return false;
  }
}

$().ready(function() {
	$("#course").autocomplete("get_course_list.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
});

