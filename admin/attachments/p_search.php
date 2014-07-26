
<?php 
    require('class.php');
$call = new globalm;
     if( $search != null ) {
	    $isSearchFound = false;
	    $search = $_GET['search'];
		//$search = preg_replace( "/[^a-z0-9 ]/si","",$search );
		$search = mysql_real_escape_string( $search );
		$query = mysql_query("select * from client_details where firstnames like '%".$search."%'  or surname like '%".$search."%' ") or die(mysql_error());	

while( $row = mysql_fetch_array( $query ) ) {
             $isSearchFound = true;
 ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Tittle</td>
    <td>First names </td>
    <td>Surname</td>
    <td>file number </td>
    <td>in care of </td>
    <td>business unit </td>
  </tr>
  <tr>
    <td><? echo $row['title'];?></td>
    <td><? echo $row['firstnames'];?></td>
    <td><? echo $row['surname'];?></td>
    <td><? echo $row['file_no'];?></td>
    <td><? echo $row['in_care_of'];?></td>
    <td><? echo $row['business_unit'];?></td>
  </tr>
</table>
<?php }
      if( !$isSearchFound ) echo "<h1>No results found.</h1>";
   } else {
 ?>
     <h1><?php echo "No results found."; ?></h1>
 <?php } ?>
