<?php
  session_start();
  require_once'koneksi.php';
  

  if(isset($_POST['login']))
  {

     $username = strip_tags($_POST['username']);
     $password = strip_tags($_POST['password']);
     
     $username = $connect->real_escape_string($username);
     $password = $connect->real_escape_string($password);
     
     $query = $connect->query("SELECT * FROM tbl_user WHERE username='$username' and password='$password' and st_user=1");
     $query2 = $connect->query("SELECT nama FROM tbl_user WHERE username='$username' and password='$password'");
     $row=$query->fetch_array();
     $row2 = mysqli_fetch_assoc($query2);
     

     $count = $query->num_rows;


      if ($count>=1) 
      {
         $_SESSION['status_login']="Aktif";
        $_SESSION['nama_user']=$row2['nama'];
        $_SESSION['lvl']=$row['lvl'];
       header('location: index.php');
       } else {
        
        echo '<script> alert("Username dan Password Salah");</script>';
        header('location: login.php');
       }
       $koneksi->close();
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
    <title>Sistem Ranking Sapi Terbaik</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="asset/apple-icon.png">
    <link rel="shortcut icon" href="asset/favicon.ico">


    <link rel="stylesheet" href="asset/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="asset/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="asset/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="asset/vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="asset/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                        <h2 style="color:white ;">Please Login</h2>
                        <!-- <img class="align-content" src="asset/images/logos.png" alt=""> -->
                   
                </div>
                <div class="login-form">
                    <form method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                              
                                <button type="submit" name="login" class="btn btn-success btn-flat m-b-30 m-t-30">Log in</button>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="asset/vendors/jquery/dist/jquery.min.js"></script>
    <script src="asset/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="asset/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="asset/assets/js/main.js"></script>


</body>

</html>
