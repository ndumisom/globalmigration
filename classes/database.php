<?php
require_once 'config.php';
class Database {

    public static $conn;
    //public static $obj_myrow;
    public static $obj_myrows;
    public static $int_num_rows;
    public static $str_mysql_error;
    //public static $int_num_affected_rows;
    public static $int_mysql_insert_id;
    public static $obj_result;

    function __construct($host = DB_HOST, $db = DB_NAME, $user = DB_USER, $password = DB_PASS) {
        self::GetConnection($host, $db, $user, $password);
    }

    public static function GetConnection($host = DB_HOST, $db = DB_NAME, $user = DB_USER, $password = DB_PASS) {
        try {
            if (self::$conn == null) {
                self::$conn = new PDO("mysql:host=" . $host . ";dbname=" . $db, $user, $password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //self::$conn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF-8'");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return self::$conn;
    }

    public static function StartTransactions() {
        try {
            self::GetConnection();
            self::$conn->beginTransaction();
        } catch (PDOException $e) {
            echo "Cannot start SQL transactions";
            die();
        }
    }

    public static function Query($str_sql, $arr_parameters, $bln_die_on_error) {
        global $arr_errors;

        try {
            self::$str_mysql_error = self::$int_num_rows = self::$int_mysql_insert_id = self::$obj_myrows = '';

            $str_sql = trim($str_sql);

            self::GetConnection();

            if ($arr_parameters == '') { // just in case empty string is passed for second parameter
                $arr_parameters = array();
            }
            //FW20130626 French chars should work - fix to set euro charset
            //$obj_result1 = self::$conn->prepare("SET NAMES latin1");
            //$obj_result1->execute();
            //FW20130626
            //$this->conn->query($str_sql); - need to move away from this as execute is more secure - IF you use the $arr_parameters !!
            //If you have a LIKE operator in you statement, then sql should be : '... LIKE ?...' and $arr_parameters = array('test%')
            self::$obj_result = self::$conn->prepare($str_sql);
            self::$obj_result->setFetchMode(PDO::FETCH_ASSOC);
            self::$obj_result->execute($arr_parameters);
            // $int_num_rows represents num rows when select / delete / update etc
            // Please note : http://php.net/manual/en/pdostatement.rowcount.php
            // Here is says rowCount() does not work for select, but i have tested it and it does. - Shaakir 22082013
            // Only pitfall i see is common (My)SQL problem of returning 0 if the data being updated is same as in DB already.
            self::$int_num_rows = self::$obj_result->rowCount();

            if (preg_match("/^(select|describe|pragma|show)/i", $str_sql)) {
                self::$obj_myrows = self::$obj_result->fetchAll(); //if you going to use foreach
                return self::$obj_myrows;
            } else if (preg_match("/^(delete|insert|update)/i", $str_sql)) {
                if (preg_match("/^(insert)/i", $str_sql)) {
                    self::$int_mysql_insert_id = self::$conn->lastInsertId(); //incase it was insert command
                }
                return self::$int_num_rows;
            }
        } catch (PDOException $e) {


            if ($bln_die_on_error) {
                print "<br />" . $e->getMessage();


                die();
            } else {
                self::$str_mysql_error = $e->getMessage() . $str_sql;
                return false;
            }
        }
    }

    public static function CommitSql() {
        try {
            self::GetConnection();
            self::$conn->commit();
        } catch (PDOException $e) {
            echo "Cannot commit SQL transactions";
            die();
        }
    }

    public static function RollbackSql() {
        try {
            self::GetConnection();
            self::$conn->rollBack();
        } catch (PDOException $e) {
            echo "Cannot rollBack SQL transactions";
            die();
        }
    }

























    

    function login($username, $password, $email) {

        $str_sql_select = "select username, email, password from users where (binary username = ? or binary email = ?) and binary password = ? ";
        $arr_data = array($username, $email, $password,);
        self::Query($str_sql_select, $arr_data, true);
        $count = self::$int_num_rows;

        if ($count == 1) {
            if ($level == 1) {
                $user_online = mysql_query("INSERT INTO $tbl_name(user_online, userID, session, time)VALUES(NULL, 6, '$session', '$time')");
                $inserto = mysql_query(" insert into logs  values( 0,'$user_browser', '$user_ip','$user_http', '$username','$login_time', '$logout_time')");
                $_SESSION['level'] = $level;
                $_SESSION['log'] = $username;
                header('location:admin/admin_index.php');
                exit;
            }


            if ($count == 1 && $level == 2) {
                $user_online = mysql_query("INSERT INTO $tbl_name(user_online, userID, session, time)VALUES(NULL, 6, '$session', '$time')");
                $inserto = mysql_query(" insert into logs  values( 0, '$user_browser', '$user_ip', '$user_http', '$username', '$login_time', '$logout_time')");
                $_SESSION['level'] = $level;
                $_SESSION['log'] = $username;
                header('location:consultant/index.php');
                exit;
            }

            if ($count == 1 && $level == 3) {
                $user_online = mysql_query("INSERT INTO $tbl_name(user_online, userID, session, time)VALUES(NULL,  $'staff'), '$session', '$time')");
                $inserto = mysql_query(" insert into logs  values( 0, '$user_browser', '$user_ip', '$user_http', '$username', '$login_time' ,'$logout_time')");
                $_SESSION['level'] = $level;
                $_SESSION['log'] = $username;
                //header('location:staff/index.php');
                exit;
            }
            //Insert login funtion for supervisor

            if ($count == 1 && $level == 4) {
                if ($status == 1) {
                    $user_online = mysql_query("INSERT INTO $tbl_name(user_online, userID, session, time)VALUES(NULL, 6, '$session', '$time')");
                    $inserto = mysql_query(" insert into logs  values( 0, '$user_browser', '$user_ip', '$user_http', '$username', '$login_time', '$logout_time')");
                    $update = mysql_query("UPDATE online SET username='$username' WHERE status=1");

                    $_SESSION['level'] = $level;
                    $_SESSION['log'] = $username;
                    header('location:supervisor/index.php');
                    exit;
                } else {
                    $user_online = mysql_query("INSERT INTO $tbl_name(user_online, userID, session, time)VALUES(NULL, 6, '$session', '$time')");
                    $insert = mysql_query("insert into online values(0,'$username','$level',1)");


                    $_SESSION['level'] = $level;
                    $_SESSION['log'] = $username;
                    header('location:supervisor/index.php');
                    exit;
                }
            }


            if ($count == 1 && $level == 5) {
                $user_online = mysql_query("INSERT INTO $tbl_name(user_online, userID, session, time)VALUES(NULL, 6, '$session', '$time')");
                $insert = mysql_query(" insert into logs  values( 0, '$user_browser', '$user_ip', '$user_http', '$username', '$login_time', '$logout_time')");
                $_SESSION['level'] = $level;
                $_SESSION['log'] = $name;
                $_SESSION['id'] = $userID;
                header('location:client/index.php');
                exit;
            }
            if ($count == 1 && $level == 6) {
                $user_online = mysql_query("INSERT INTO $tbl_name(user_onlineID, userID, session, time)VALUES(NULL, 6, '$session', '$time')");
                $inserto = mysql_query(" insert into logs  values( 0, '$user_browser', '$user_ip', '$user_http', '$username', '$login_time' ,'$logout_time')");
                $_SESSION['level'] = $level;
                $_SESSION['log'] = $name;
                $_SESSION['id'] = $userID;
                header('location:hr/index.php');
                exit;
            }
        } else {
            $_SESSION['er'] = "Username and password do not match.";
            header('location:index.php');
            exit;
        }
    }

}

