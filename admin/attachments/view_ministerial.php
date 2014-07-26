<?
include_once("class.php");

$id = $_GET["id"];
$SQL = "SELECT *FROM ministerial WHERE permit_appID = $id ";
$Query = mysql_query($SQL);
$num =mysql_num_rows($Query);
?>

<table class="tb" border="0" cellspacing="0" cellpadding="0" bordercolor="#0000FF">

    <tr class="header">
        <th>Representation</th> <th>Date Submitted</th><th>Ref No </th><th>Date Received</th><th>Comments</th><th>edit</th>

    </tr>
    <?
    while ($row = mysql_fetch_array($Query)) {
        echo "<tr class='row'>
      
      
      <td>" . $row['mini_representation'] . "</td>
      <td>" . $row['date_submitted'] . "</td>
      <td>" . $row['ref_no'] . "</td>
      <td>" . $row['date_received'] . "</td>
      <td> " . $row['comments'] . "</td>
	  <td> <a href='admin_index.php?m=edit_ministerial&id=$row[id] ' style='color: #0000FF; text-decoration: none; font: Helvetica, Arial, sans-serif;'> Edit</a></td>
    </tr><tr>";
    }
	if($num == 0){
		echo "<tr class='row'>
		<td>
		<a href='admin_index.php?m=ministerial&id=$_GET[id]' style='color: #0000FF; text-decoration: none; font: Helvetica, Arial, sans-serif;'> Add Ministerial</a>
		</td>
		</tr>";
	}
    ?>
</table>
<p>&nbsp;</p>

