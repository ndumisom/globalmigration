 mysql_connect('localhost', 'root', 'mapapa1531') or die("Error Connecting to mysql" . mysql_error());
    mysql_select_db('globalmigration_db') or die("Error Connecting to database" . mysql_error()); 

$sql = "select * from online where level= '$level' ";
    $query = mysql_query($sql); //for onilne
    $row = mysql_fetch_assoc($query); //for online

    $level = $row1['level']; //for online
    $key = $row['key']; 




 if ($level==4 && $query == 0) {
              $insert = mysql_query("insert into online values(0,'$username','$level',1)");


              $_SESSION['level'] = $level;
              $_SESSION['log'] = $username;
              header('location:supervisor/index.php');
              exit;

              } else if ($level == 4 && $key == 1) {
                $update = mysql_query("UPDATE online SET username='$username' WHERE key=1");

                $_SESSION['level'] = $level;
                $_SESSION['log'] = $username;
                header('location:supervisor/index.php');
                exit;
            }