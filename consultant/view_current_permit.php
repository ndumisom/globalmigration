<?
include_once("class.php");

$id = $_GET["id"];
$Connect = mysql_connect("localhost", "root", "mapapa1531") or die(mysql_error());
$Connect = mysql_select_db("globalmigration_db");
$SQL = "SELECT *FROM current_permit WHERE clientID = '$id' ";
$Query = mysql_query($SQL);
?>

<table class="tb" border="0" cellspacing="0" cellpadding="0" bordercolor="#0000FF">

    <tr class="header">
        <th>Current Permit</th> <th>Current Permit Status </th><th>Current Permit No </th><th>Current Permit Expiry Date </th><th>Current Comments</th>

    </tr>
    <?
    while ($row = mysql_fetch_array($Query)) {
        echo "<tr class='row'>
      
      
      <td>" . $row['c_permit'] . "</td>
      <td>" . $row['c_permit_status'] . "</td>
      <td>" . $row['c_permit_no'] . "</td>
      <td>" . $row['c_permit_expiry'] . "</td>
      <td> " . $row['c_permit_comment'] . "</td>
    </tr>";
    }
    ?>
</table>
<p>&nbsp;</p>

