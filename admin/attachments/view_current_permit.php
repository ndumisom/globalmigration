<?
include_once("class.php");

$id = $_GET["id"];
$SQL = "SELECT *FROM current_permit WHERE clientID = '$id' ";
$Query = mysql_query($SQL);
?>

<table class="tb" border="0" cellspacing="0" cellpadding="0" bordercolor="#0000FF">

    <tr class="header">
        <th>Current Permit</th> <th>Current Permit Status </th><th>Current Permit No </th><th>Current Permit Expiry Date </th><th>Current Comments</th><th>Edit</th>

    </tr>
    <?
    while ($row = mysql_fetch_array($Query)) {
        echo "<tr class='row'>
      
      
      <td>" . $row['c_permit'] . "</td>
      <td>" . $row['c_permit_status'] . "</td>
      <td>" . $row['c_permit_no'] . "</td>
      <td>" . $row['c_permit_expiry'] . "</td>
      <td> " . $row['c_permit_comment'] . "</td>
      <td><a href='admin_index.php?m=e_c_permit&id=" . $row['current_permitID'] . "'> <b> Edit </b></a></td>
    </tr>";
    }
    ?>
</table>
<p>&nbsp;</p>

