<?php
  INI_SET("display_errors",0);
?>
<?php
@session_start();
if(empty($_SESSION['status_login']))
{
  header('Location:login.php');

}

  if($_GET['id']=="logout")
  {
     unset($_SESSION['status_login']);
    unset($_SESSION['nama_user']);
    unset($_SESSION['lvl']);
    header('Location:login.php');
  }
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Pemilihan Sapi Berkualitas</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="asset/apple-icon.png">
    <link rel="shortcut icon" href="asset/favicon.ico">

    <link rel="stylesheet" href="asset/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="asset/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="asset/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="asset/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="asset/vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="asset/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="chartjs/Chart.js"></script>
</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php">
                    <h4>Sapi Berkualitas</h4>
                    <!-- <img src="asset/images/logo.png" alt="Logo"> -->
                </a>
                <a class="navbar-brand hidden" href="index.php">
                    <h4>S</h4>
                    <!-- <img src="asset/images/logo2.png" alt="Logo"> -->
                </a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Beranda </a>
                    </li>

                    <h3 class="menu-title"></h3><!-- /.menu-title -->
                    <?php
                    if($_SESSION['lvl']=='1')
                    {
                    ?>
                    <li>
                        <a href="index.php?id=1"> <i class="menu-icon fa fa-tasks"></i>Data Sapi </a>
                    </li>
                    <!-- <li>
                        <a href="index.php?id=2"> <i class="menu-icon fa fa-tasks"></i>Input Data Sapi </a>
                    </li> -->

                    <!-- <li>
                        <a href="index.php?id=4"> <i class="menu-icon fa fa-laptop"></i>SAW </a>
                    </li> -->

                    <li class="menu-item-has-children dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>SAW</a>
                        <ul class="sub-menu children dropdown-menu">
                            <!-- <li><i class="fa fa-id-badge"></i><a href="index.php?id=5">Bobot</a></li> -->
                            <li><i class="fa fa-puzzle-piece"></i><a href="index.php?id=4">Normalisasi</a></li>
                            <li><i class="fa fa-share-square-o"></i><a href="index.php?id=6">Ranking</a></li>
                            <li><i class="fa fa-bar-chart"></i><a href="index.php?id=8">Grafik</a></li>
                        </ul>
                    </li>
                    <?php
                    }
                    elseif($_SESSION['lvl']=='2')
                    {
                    ?>
                    <li>
                        <a href="index.php?id=1"> <i class="menu-icon fa fa-tasks"></i>Data Sapi </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>SAW</a>
                        <ul class="sub-menu children dropdown-menu">
                            <!-- <li><i class="fa fa-id-badge"></i><a href="index.php?id=5">Bobot</a></li> -->
                            <li><i class="fa fa-puzzle-piece"></i><a href="index.php?id=4">Normalisasi</a></li>
                            <li><i class="fa fa-share-square-o"></i><a href="index.php?id=6">Ranking</a></li>
                            
                        </ul>
                    </li>
                    <?php
                    }
                    elseif($_SESSION['lvl']=='3')
                    {
                    ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>SAW</a>
                        <ul class="sub-menu children dropdown-menu">
                            <!-- <li><i class="fa fa-id-badge"></i><a href="index.php?id=5">Bobot</a></li> -->
                            <!-- <li><i class="fa fa-puzzle-piece"></i><a href="index.php?id=4">Normalisasi</a></li> -->
                            <li><i class="fa fa-share-square-o"></i><a href="index.php?id=6">Ranking</a></li>
                            <li><i class="fa fa-bar-chart"></i><a href="index.php?id=8">Grafik</a></li>
                        </ul>
                    </li>

                    <?php
                    }
                    ?>


                    <h3 class="menu-title"></h3><!-- /.menu-title -->
                    <li>
                        <a href="index.php?id=logout"> <i class="menu-icon fa fa-power-off"></i>Logout </a>
                    </li>

                
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <!-- Button Search -->
                    </div>
                </div>

                
            </div>

        </header><!-- /header -->
        <!-- Header-->



        <div class="content mt-3">

                    <?php
                        if($_GET['id']=="")
                        {
                            include('blank.php');
                        } 
                        if($_GET['id']=="1")
                        {
                            include('data_sapi.php');
                        }
                        if($_GET['id']=="2")
                        {
                            include('form_input_sapi.php');
                        }
                        if($_GET['id']=="3")
                        {
                            include('form_edit_sapi.php');
                        }
                        if($_GET['id']=="4")
                        {
                            include('normalisasi.php');
                        }
                        if($_GET['id']=="5")
                        {
                            include('normalisasi_bobot.php');
                        }
                        if($_GET['id']=="6")
                        {
                            include('rank.php');
                        }
                        if($_GET['id']=="7")
                        {
                            include('grafik.php');
                        }
                        if($_GET['id']=="8")
                        {
                            include('grafik2.php');
                        }
                    ?>  
           

           


        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="asset/vendors/jquery/dist/jquery.min.js"></script>
    <script src="asset/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="asset/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="asset/assets/js/main.js"></script>

    <script src="asset/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="asset/assets/js/dashboard.js"></script>
    <script src="asset/assets/js/widgets.js"></script>
    <script src="asset/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="asset/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="asset/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>





