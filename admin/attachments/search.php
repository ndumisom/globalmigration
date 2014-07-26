<script type="text/javascript" src="jquery.js"></script>
<script type='text/javascript' src='jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />

<script type="text/javascript">
function validateSearch()
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
</script>
<form name="search" action="admin_index.php?name" method="get" autocomplete="off" onsubmit="return validateSearch()" >
  <table width="20%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><input type="text" name="name" id="course" /></td>
    <td><input  type="submit" name="submit" id="search-submit" value="Search" class="login"/></td>
  </tr>
</table>

</form>