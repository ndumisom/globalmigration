<?php
session_start();
ob_start(); 
if (!isset($_SESSION['log'])) {
    header("location:/client/index.php");
}
if (!$_SESSION['log']) {
    header("location:logout.php");
    if ($_SESSION['level'] != 5) {
        header("location:logout.php");
    }
}
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Global Migration | <?php echo ucfirst($_SESSION['log']); ?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <script src="assets/js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.autocomplete.js"></script>
        <script type="text/javascript" src="js/typeahead.js"></script> 
        <!-- Le styles -->
        <script>
//      function validateForm()
//            {
//                var x = document.forms["search"]["name"].value;
//                if (x == null || x == "")
//                {
//                    alert("Please enter a search string");
//                    return false;
//                }
//            }
//
//            $().ready(function() {
//                $("#search").autocomplete("pages/get_course_list.php", {
//                    width: 260,
//                    matchContains: true,
//                    //mustMatch: true,
//                    //minChars: 0,
//                    //multiple: true,
//                    //highlight: false,
//                    //multipleSeparator: ",",
//                    selectFirst: false
//                });
//            });
//
//
//            $(function() {
//                function stripTrailingSlash(str) {
//                    if (str.substr(-1) == '/') {
//                        return str.substr(0, str.length - 1);
//                    }
//                    return str;
//                }
//
//                var url = window.location.pathname;
//                var activePage = stripTrailingSlash(url);
//
//                $('.nav li a').each(function() {
//                    var currentPage = stripTrailingSlash($(this).attr('href'));
//
//                    if (activePage == currentPage) {
//                        $(this).parent().addClass('active');
//                    }
//                });
//            });
        </script>
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 20px;
                padding-bottom: 60px;
            }

            /* Custom container */
            .container {
                margin: 0 auto;
                max-width: 1000px;
            }
            .container > hr {
                margin: 60px 0;
            }

            /* Main marketing message and sign up button */
            .jumbotron {
                margin: 80px 0;
                text-align: center;
            }
            .jumbotron h1 {
                font-size: 100px;
                line-height: 1;
            }
            .jumbotron .lead {
                font-size: 24px;
                line-height: 1.25;
            }
            .jumbotron .btn {
                font-size: 21px;
                padding: 14px 24px;
            }

            /* Supporting marketing content */
            .marketing {
                margin: 60px 0;
            }
            .marketing p + h4 {
                margin-top: 28px;
            }


            /* Customize the navbar links to be fill the entire space of the .navbar */
            .navbar-inner {
                border: 1px solid #0088cc;
            }
            .navbar .navbar-inner {
                padding: 0;
            }
            .navbar .nav {
                margin: 0;
                display: table;
                width: 100%;
                color:#fff;
            }
            .navbar .nav li {
                display: table-cell;
                width: 1%;
                float: none;
                color:#fff;
            }
            .navbar .nav li a {
                font-weight: bold;
                text-align: center;
                border-left: 1px solid rgba(255,255,255,.75);
                border-right: 1px solid rgba(0,0,0,.1);
                color: #0088cc;
            }
            .navbar .nav li:first-child a {
                border-left: 0;
                border-radius: 3px 0 0 3px;
            }
            .navbar .nav li:last-child a {
                border-right: 0;
                border-radius: 0 3px 3px 0;
            }
            .navbar .nav > li > a {
                color: #0088cc;
            }
            .well {
                border: 1px solid #0088cc;
            }
            .user{
                float: right;

            }
            .navbar .nav > li > a {
                color: #0D26E2;
            }
            .table-bordered {
                border: 1px solid #0088cc;
                border-collapse: separate;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                border-radius: 4px;
            }
            .table-bordered th, .table-bordered td {
                border-left: 0px solid #dddddd;
            }

            .sidebar-nav{
                position: fixed;
                float: left;
                top: 195px;  
                left: 0px; 
                width: 12%;
            }
            .navbar-inner {
                border: 1px solid #0D26E2;
                color: #0D26E2;
            }
            .search
            {
                position: absolute;
                top: 80px;  
                left: 900px; 

            }
            hr {
                height: 1px;
                color: #0D26E2;
                background-color: #0D26E2;
                border: none;
                top: 0px;
            }
            .label-info[href], .badge-info[href] {
                background-color: #0088cc;
                color:#fff;
            }
            input.search-query {
                padding-right: 14px;
                padding-right: 4px \9;
                padding-left: 14px;
                padding-left: 4px \9;
                margin-bottom: 0;
                -webkit-border-radius: 15px;
                -moz-border-radius: 15px;
                border-radius: 8px;
            }
            ul.nice_paging{
                padding:10px 0 10px 0;
                text-align:center;
                font-weight:bold;
                color:#777;
            }

            ul.nice_paging li{
                padding:3px 7px 3px 7px;
                margin:3px;
                border:1px solid #aaa;
                background-color:#eee;
                display:inline;
                list-style:none;
            }

            ul.nice_paging li.current{
                background-color:#369;
                color:#fff
            }

            ul.nice_paging li a{
                font-weight:bold;
                color:#777;
            }
            .table{
                font-size: 12px;
            }
            .badge-important {
                background-color: #F31E1A;
            }
            
           
/*            input, textarea, uneditable-input {
             width:40%; 
            }*/
            

        </style>
        <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="assets/js/html5shiv.js"></script>
        <![endif]-->

        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="../images/icon.png">
    </head>

    <body>

        <div class="container">

            <div class="masthead">

                <img src="../images/globallogo.jpg"/>
                <span class="user muted">
                    Logged in as <?php echo ucfirst($_SESSION['log']); ?>

                </span>
                <div class="search">
                    <?php                   require_once 'bootstrap-autocomplete/search.php'; ?>
                </div>

                <div class="navbar">
                    <div class="navbar-inner">

                        <div class="container">
                            <?php
                            require_once 'menu.php';
                            ?>
                        </div>
                    </div>
                </div><!-- /.navbar -->
                <!--        <div class="span3" style="position: absolute; position: 10px;">
                          <div class=" sidebar-nav ">
                            <ul class="nav nav-list">              
                              <li class="active"><a href="#" class="active">View All Clients</a></li>
                              <li><a href="#">Permit Status</a></li>
                              <li><a href="#">Tasks Request</a></li>
                              
                            </ul>
                          </div>/.well 
                        </div>/span-->
            </div>
            <p><a href="index.php?page=allocate_task" class="label label-info"> Allocate task </a> <a href="index.php" class="label label-info">View All Clients</a> <a href="index.php?page=status" class="label label-info" >Permit Status</a> <a href="index.php?page=task_request" class="label label-info">Tasks Request</a> <a href="index.php?page=reports" class="label label-info" >Reports</a> <a href="index.php?page=status" class="label label-info" >Online users</a><p/>
            <!--        <hr style="background-color:#0D26E2;"/>-->
				<?php require("include_files.php"); ?>

           

            <div class="footer well well-small">
                <center><p>GLOBAL MIGRATION <b>&reg; </b> </p>  </center>
            </div>

        </div> <!-- /container -->





        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->

        
        <script src="assets/js/bootstrap-transition.js"></script>
        <script src="assets/js/bootstrap-alert.js"></script>
        <script src="assets/js/bootstrap-modal.js"></script>
        <script src="assets/js/bootstrap-dropdown.js"></script>
        <script src="assets/js/bootstrap-scrollspy.js"></script>
        <script src="assets/js/bootstrap-tab.js"></script>
        <script src="assets/js/bootstrap-tooltip.js"></script>
        <script src="assets/js/bootstrap-popover.js"></script>
        <script src="assets/js/bootstrap-button.js"></script>
        <script src="assets/js/bootstrap-collapse.js"></script>
        <script src="assets/js/bootstrap-carousel.js"></script>
        <script src="assets/js/bootstrap-typeahead.js"></script>
        <script src="assets/js/jquery.js"></script>
        <script>
        // $(document).ready(function(){
        //$("#search").typeahead({
        //    name: 'name',
        //    remote: 'search_pop_up.php' // you can change anything but %QUERY
        //});
        //});

//            $(document).ready(function() {
//                $('input.typeahead-devs').typeahead({
//                    name: 'accounts',
//                    remote: 'http://globalmigration/staff/country.php?query=%QUERY'
//                });
//            })

        $(document).ready(function(){
             $("#checkAll").click(function () {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });
        });
        </script>

    </body>
</html>
<?php ob_end_flush(); ?>