<?php


// This is just an example of reading server side data and sending it to the client.
// It reads a json formatted text file and outputs it.

//$string = file_get_contents("jsondata.json");
//echo $string;

// Instead you can query your database and parse into JSON etc etc
mysql_connect ("localhost", "root", "mapapa1531") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("globalmigration_db");

//Previous date
$date1 = date( 'Y-m-d h:i:s',time( ) + (-1 * 24 * 60 * 60) );
//Current date
$date2 =date('Y-m-d h:i:s');

 $query = "select allocated_to, count(allocated_task) as num_task from  `process_task_allocation` where date_allocated >= '$date1' and date_allocated <= '$date2'  group by allocated_to  ";
$result = mysql_query($query);




$table = array();

$table['cols'] = array(

    array('label' => 'Allocated_to', 'type' => 'string'),	
    array('label' => 'Num_Task', 'type' => 'number')

);

$rows = array();
while($r = mysql_fetch_assoc($result)) {
    $temp = array();

$temp[] = array('v' => (string) $r['allocated_to']); 
$temp[] = array('v' => (int) $r['num_task']); 
$temp[] = array('v' => (int) $r['num_task1']); 


 
    $rows[] = array('c' => $temp);
}

$table['rows'] = $rows;

echo json_encode($table);


?>
