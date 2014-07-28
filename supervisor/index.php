<?php
session_start();
ob_start();
require_once'database.php';
if (!isset($_SESSION['log'])) {
    header("location:/supervisor/index.php");
}
if (!$_SESSION['log']) {
    header("location:logout.php");
}if ($_SESSION['level'] != 4) {
    header("location:logout.php");
}
  


$sql = "select * from online where level=4";
$query = mysql_query($sql);
$row = mysql_fetch_assoc($query);

if ($_SESSION['log'] != $row['username']) {
    $_SESSION['user'] = $row['username'];
    $_SESSION['er'] = "Another person has login ";
    header("location:logout.php?error=1");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Global Migration - <? echo $_SESSION['log']; ?></title>

        <link rel="SHORTCUT ICON" href="../images/icon.png"> 
            <link rel="stylesheet" type="text/css" href="css/styles.css" />
            <link href="style1.css" rel="stylesheet" type="text/css" />
            <link href="../inner.css" rel="stylesheet" type="text/css" />
            <link href="stylesheet.css" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" type="text/css" href="outer.css" />
            <link href="css/main.css" type="text/css" media="screen, projection" rel="stylesheet" />
            <link rel="stylesheet" type="text/css" href="date.css" />
            <script type="text/javascript" src="popup.js"></script>
            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
            <script type="text/javascript" src="date.js"></script>
            <script type="text/javascript" src="slider.js"></script>
            <script type="text/javascript" src="print.js" language="javascript"></script>
            <script type="text/javascript" src="externalJS.js" language="javascript"></script>
            <script type="text/javascript" src="dynamicAjax.js" language="javascript"></script>
            <script type="text/javascript" src="js/bsn.AutoSuggest_2.1.3.js" charset="utf-8"></script>
            <script type="text/javascript" src="loadPageJS.js"></script>
            <script type="text/javascript" src="../outer.js"></script>
            <script type="text/javascript">
                function goBack()
                {
                    window.history.back()
                }

   
   //Online users refresh
   var online = "c_menu.php";
                function refresh( url , target ) {
                    var http_request = false; 
                    if( window.XMLHttpRequest ) {
                        http_request = new XMLHttpRequest();
                        if (!http_request) {
                            alert('Giving up :( Cannot create an XMLHTTP instance');
                            return false;
                        }
                        http_request.onreadystatechange = function( ) { refreshpage( target, http_request ); };
                        http_request.open( "GET", url, true );
                        http_request.send(null);
                    } else if( window.ActiveXObject ) {    //ActiveX version
                        http_request = new ActiveXObject("Microsoft.XMLHTTP");
                        if( http_request ) {
                            http_request.onreadystatechange = function( ) { refreshpage( target, http_request ); };
                            http_request.open( "GET", url, true );
                            http_request.send( );
                        }
                    }
			   
                    setTimeout( "refresh(online, 'online_refresh' )", 3000 );   //10sec

                }

                function refreshpage( target, http_request ) {
                    if( http_request.readyState == 4 ) {
                        if( http_request.status == 200 || http_request.status == 304 ) {
                            results = http_request.responseText; 
                            document.getElementById(target).innerHTML = results;
                        }else{
                            document.getElementById(target).innerHTML =  http_request.statusText; //show error 
                        }
                    }

                }
                //maenu refresh
                var page2 = "menu.php";
                function ajax2( url , target ) {
                    var http_request = false; 
                    if( window.XMLHttpRequest ) {
                        http_request = new XMLHttpRequest();
                        if (!http_request) {
                            alert('Giving up :( Cannot create an XMLHTTP instance');
                            return false;
                        }
                        http_request.onreadystatechange = function( ) { ajaxDone2( target, http_request ); };
                        http_request.open( "GET", url, true );
                        http_request.send(null);
                    } else if( window.ActiveXObject ) {    //ActiveX version
                        http_request = new ActiveXObject("Microsoft.XMLHTTP");
                        if( http_request ) {
                            http_request.onreadystatechange = function( ) { ajaxDone2( target, http_request ); };
                            http_request.open( "GET", url, true );
                            http_request.send( );
                        }
                    }
			   
                    setTimeout( "ajax2(page2, 'refresh2' )", 3000 );   //10sec

                }

                function ajaxDone2( target, http_request ) {
                    if( http_request.readyState == 4 ) {
                        if( http_request.status == 200 || http_request.status == 304 ) {
                            results = http_request.responseText; 
                            document.getElementById(target).innerHTML = results;
                        }else{
                            document.getElementById(target).innerHTML =  http_request.statusText; //show error 
                        }
                    }

                }
           
           
                var page3 = "sent_task.php";
                function ajax3( url , target ) {
                    var http_request = false; 
                    if( window.XMLHttpRequest ) {
                        http_request = new XMLHttpRequest();
                        if (!http_request) {
                            alert('Giving up :( Cannot create an XMLHTTP instance');
                            return false;
                        }
                        http_request.onreadystatechange = function( ) { ajaxDone3( target, http_request ); };
                        http_request.open( "GET", url, true );
                        http_request.send(null);
                    } else if( window.ActiveXObject ) {    //ActiveX version
                        http_request = new ActiveXObject("Microsoft.XMLHTTP");
                        if( http_request ) {
                            http_request.onreadystatechange = function( ) { ajaxDone3( target, http_request ); };
                            http_request.open( "GET", url, true );
                            http_request.send( );
                        }
                    }
		
                    if( document.getElementById("reload_now").value == 'now' )  
                        setTimeout( "ajax3(page3, 'refresh3' )", 10000 );   //10sec

                }

                function ajaxDone3( target, http_request ) {
                    if( http_request.readyState == 4 ) {
                        if( http_request.status == 200 || http_request.status == 304 ) {
                            if( document.getElementById("reload_now").value == 'now' )  {
                                results = http_request.responseText; 
                                document.getElementById(target).innerHTML = results; }
                        }else{
                            document.getElementById(target).innerHTML =  http_request.statusText; //show error 
                        }
                    }

                }
               
                function resetAll( ) {
                    document.getElementById("reload_now").value='no';
			
                }
         

            </script>



    </head>


    <body onload="ajax2(page2, 'refresh2' ); ajax3( page3, 'refresh3' ); refresh(online, 'online_refresh'); openOffersDialog();">
        <input type="hidden" id=reload_now" value="now"/>

        <table border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td valign="top"><div class="header"><img src="../images/header.gif" width="1350" height="126" alt="a" /></div></td>
            </tr>
            <tr>
                <td height="329" align="center" valign="middle" id="content">
                    <table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                            <td colspan="3" class="menu"><span id="div_tes"><?php require("menu.php"); ?></span> <div align="center"><? include 'search.php' ?></div>
                                <p>&nbsp;</p></td>
                        </tr>
                        <tr>
                            <td align="left" valign="top" >
                                <p>&nbsp;</p>
                                <table border="1" width="160" height="400" bordercolor="#0000FF">
                                    <tr><td valign="top" >

                                            <p><?php
if (isset($_SESSION['log'])) {
    echo '<b> <font color="blue">' . ucfirst($_SESSION['log']) . '</b></font>';
}
?>
                                                <p>&nbsp;</p>



                                                <div align="left"><div id="online_refresh"> <? require 'c_menu.php'; ?></div></div>

                                        </td>
                                    </tr>
                                </table>
                                &nbsp;
                            </td>
                            <td width="0%" align="center" valign="middle" >&nbsp;</td>
                            <td width="86%" align="center" valign="top" >




                                <p>&nbsp;</p>
                                <div id="pages">
                                    <?php require("include_files.php"); ?>
                                    <?php require_once("reminder.php"); ?>                             

                                    <p>&nbsp;</p>

                                </div>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>

            <tr>
                <td valign="top" id="foot">
                    <p>&nbsp;</p>
                    <p>GLOBAL MIGRATION <b>&reg; </b> </p>    </td>
            </tr>
        </table>

    </body>
</html>
<?
ob_end_flush();
?>