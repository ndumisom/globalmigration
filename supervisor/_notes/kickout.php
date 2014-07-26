<?
 session_start(); 
 
mysql_connect('localhost', 'root', 'mapapa1531') or die("Error Connecting to mysql" . mysql_error());
mysql_select_db('globalmigration_db') or die("Error Connecting to database" . mysql_error());


 
 $sql =  "select * from online where level=4";
 $query = mysql_query($sql);
 $row = mysql_fetch_assoc($query);
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Global Migration - <? echo $_SESSION['log']; ?></title>

        <link rel="SHORTCUT ICON" href="../images/icon.png"> 
            <link rel="stylesheet" type="text/css" href="css/styles.css" />
            <link href="style.css" rel="stylesheet" type="text/css" />
            <link href="stylesheet.css" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" type="text/css" href="outer.css" />
            <script type="text/javascript" src="slider.js"></script>
            <script type="text/javascript" src="externalJS.js" language="javascript"></script>
            <script type="text/javascript" src="dynamicAjax.js" language="javascript"></script>
            <script type="text/javascript" src="js/bsn.AutoSuggest_2.1.3.js" charset="utf-8"></script>
            <script type="text/javascript" src="loadPageJS.js"></script>
            <script type="text/javascript" src="outer.js"></script>
            <style>
                .infobox {
	position:relative;
    border:1px solid #000; 
    background-color:#CCC;
    width:73px;
    padding:5px;
    }
.infobox img {
	position:relative;
	z-index:2;
    }
.infobox .more {
	display:none;
    }
.infobox:hover .more {
	display:block;
    position:absolute;
    z-index:1;
    left:-1px;
    top:-1px;
    width:73px;
    padding:78px 5px 5px;
    border:1px solid #900;
    background-color:#FFEFEF;
    }
            </style>
 <table border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td valign="top"><div class="header"><img src="../images/header.gif" width="1350" height="126" alt="a" /></div></td>
            </tr>
            <tr>
                <td height="329" align="center" valign="middle" id="content">
                    <table width="82%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                            <td colspan="3" class="menu"><span id="div_tes"><?php require("menu.php"); ?></span> <div align="center"><? include 'search.php' ?></div>
                                <p>&nbsp;</p></td>
                        </tr>
                        <tr>
                            <td align="left" valign="top" >
                                <p>&nbsp;</p>
                                <table border="1" width="150" height="400" bordercolor="#0000FF">
                                    <tr><td valign="top" >

                                            <p><?php if (isset($_SESSION['log'])) {
    echo '<b> <font color="blue">' . $_SESSION['log'] . '</b></font>';
} ?>
                                                <p>&nbsp;</p>



                                                <div align="left"> <? require 'c_menu.php'; ?></div>
                                        </td>
                                    </tr>
                                </table>
                                &nbsp;
                            </td>
                            <td width="0%" align="center" valign="middle" >&nbsp;</td>
                            <td width="86%" align="center" valign="top" >




                                <p>&nbsp;</p>
                                <div class="infobox">
   <table><tr class="header"><td> Notice </td></tr><tr class="row"><td> <? echo $_SESSION['log']; ?><div class="more"> has loggin and you are about to logout<br/><br/> Thank you!<form name="kickout" action="logout.php"> <input type="submit" value=" OK " /></form></div></td></tr></table>
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
            
