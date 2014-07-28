<?
include_once("class.php");
$id = $_GET["id"];
$SQL = "SELECT *FROM african_permit WHERE clientID = '$id' ";
$Query = mysql_query($SQL);
?>

<table class="tb" border="0" cellspacing="0" cellpadding="0" bordercolor="#0000FF">

    <tr class="header">
        <th>Services</th> <th>Permit </th><th>Permit status </th><th>Fee </th><th>Contact at Dept </th><th>Parter and Contact No</th><th>Embassy Contact No</th><th>Expiry&nbsp;Date</th><th>Comments</th><th>Edit</th>

    </tr>
    <?
    while ($row = mysql_fetch_array($Query)) {
        echo "<tr class='row'>
      
      
      <td>" . $row['service'] . "</td>
      <td>" . $row['permit'] . "</td>
      <td>" . $row['permit_status'] . "</td>
      <td>" . $row['fees'] . "</td>
      <td> " . $row['contact_dept'] . "</td>
      <td> " . $row['contact_partner'] . "</td>
      <td> " . $row['contact_embassy'] . "</td>
      <td> " . $row['expiry_date'] . "</td>
      <td> " . $row['comments'] . "</td>
      <td><a href='admin_index.php?m=e_a_permit&id=" . $row['a_permitId'] . "'> <b> Edit </b></a></td>
    </tr>";
    }

    ?>
</table>

    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <input type="button" value="< Back" onclick="goBack()" class="login"/><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>

