<?php

$u = mysqli_query($connect, "SELECT * FROM tb_user WHERE id_user = '$_SESSION[id_user]'");
$user = mysqli_fetch_assoc($u);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SMP N 148</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="icon" type="image/x-icon" href="../../images/148.png" />

        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../../assets/css/bootstrap-datetimepicker.min.css" />
        <link rel="stylesheet" href="../../assets/fonts/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" href="../../assets/fonts/ionicons/css/ionicons.min.css" />

        <link rel="stylesheet" href="../../assets/js/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" href="../../assets/js/daterangepicker/daterangepicker.css">

        <link rel="stylesheet" href="../../assets/css/AdminLTE.min.css">
        <link rel="stylesheet" href="../../assets/css/_all-skins.min.css">
        <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <link rel="stylesheet" href="../../plugins/bs4/form.css">
        
        <!-- EasyUI Style -->
        <link rel="stylesheet" href="../../assets/css/metro/easyui.css" />
        <link rel="stylesheet" href="../../assets/css/style.css" />

        <link rel="stylesheet" href="../../plugins/select2/select2.min.css">

        <script src="../../assets/js/jQuery/jQuery-2.1.4.min.js"></script>
        <script src="../../plugins/jQuery.validate.js"></script>
        <script src="../../assets/js/bootstrap/bootstrap.min.js"></script>
        <script src="../../assets/js/datatables/jquery.dataTables.min.js"></script>
        <script src="../../assets/js/datatables/dataTables.bootstrap.min.js"></script>
    
    <style type="text/css">
        /*.content-wrapper, 
        .right-side, 
        .main-footer,
        .main-header>.navbar{
          margin-left: 200px;
        }

        .main-sidebar, 
        .left-side,
        .main-header .logo{
          width: 200px;
        }*/

        .text h1{
          text-shadow: 2px 2px 2px black;
          color: yellow ;
        }
    </style>
        
    </head>
    <body class="hold-transition skin-blue sidebar-mini fixed">
        <div class="wrapper">
            <header class="main-header">
                <a href="" class="logo">
                    <span class="logo-mini" ><img src="../../images/diknas.gif" style="border: none;" width="32" alt="" /></span>
                    <span class="logo-lg">SMP N 148<font size="1pt"></font></span>
                </a>

                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li>
                                <?php
                                if ($user['level'] == 0 ) {?>
                                    <a href="#" title="Profil">
                                    <i class="glyphicon glyphicon-user"></i> &nbsp;
                                    <span class="hidden-xs"><?= $user['nama_user']; ?></span> 
                                </a>
                                <?php
                                }
                                elseif ($user['level'] == 1 ) {?>
                                   <a href="home.php?page=profile" title="Profil">
                                    <i class="glyphicon glyphicon-user"></i> &nbsp;
                                    <span class="hidden-xs"><?= $user['nama_user']; ?></span> 
                                </a>
                                <?php
                                }
                                elseif ($user['level'] == 2 ) {?>
                                  <a href="#" title="Profil">
                                    <i class="glyphicon glyphicon-user"></i> &nbsp;
                                    <span class="hidden-xs"><?= $user['nama_user']; ?></span> 
                                </a>
                                <?php
                                }
                                ?>
                                                            
                            </li>

                              <?php 
                                 if ($user['level'] == 1) { ?>
                                <li>
                                    <a href="#" title="Profil">
                                    Wali Kelas :  &nbsp;
                                   <span class="hidden-xs"><?= $user['kelas']; ?></span>
                                   </a>                          
                                </li>
                              <?php
                               }
                               elseif ($user['level'] == 2) { ?>
                                <li>
                                    <a href="#" title="Profil">
                                    Kelas :  &nbsp;
                                   <span class="hidden-xs"><?= $user['kelas']; ?></span>
                                   </a>                          
                                </li>
                              <?php
                               }
                               ?>                                     
                                
                            <li>
                                <a href="logout.php" title="Logout">
                                    <i class="glyphicon glyphicon-log-out"></i> &nbsp;
                                    <span class="hidden-xs">Logout</span> 
                                </a>                            
                            </li>
                        </ul>
                    </div><!-- /.navbar-custom-menu -->
                </nav>
            </header>
<aside class="main-sidebar">
    <section class="sidebar">
    <ul class="sidebar-menu" data-widget='tree'>
        
        <?php if ($_SESSION['level'] == 1) { ?>

        <li class="header" style="text-align: center;">MENU NAVIGATION GURU</li>

        <li class="treeview">
          <a href="home.php">
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
        </li>

        <li class="treeview">
          <a href="home.php?page=data_siswa2">
            <i class="fa fa-users"></i> <span>Data Siswa</span>
          </a>
        </li>

        <li class="treeview">
          <a href="home.php?page=kriteria">
            <i class="fa fa-plug"></i> <span>Kriteria</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="#">
             <i class="fa fa-file"></i> <span> Quesioner Siswa </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="home.php?page=quesioner"><i class="fa fa-edit"></i> Input Quesioner </a></li>
            <li><a href="home.php?page=hasil_quesioner"><i class="fa fa-check-square-o"></i> Hasil Quesioner</a></li>
            <li><a href="home.php?page=hasil_prilaku_siswa"><i class="fa fa-sort-numeric-asc"></i> Ranking </a></li>
            <li><a href="home.php?page=grafikk"><i class="fa fa-signal"></i> Grafik </a></li>
          </ul>
        </li>

        

      <?php } elseif ($_SESSION['level'] == 2) { ?>

        <li class="header" style="text-align: center;">MENU NAVIGATION ORTU</li>

        <li class="treeview">
          <a href="home.php">
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
        </li>

        <li class="treeview">
          <a href="home.php?page=perilaku">
            <i class="fa fa-sticky-note"></i> <span>Perilaku Siswa</span>
          </a>
        </li>

        <li class="treeview">
          <a href="home.php?page=grafik">
            <i class="fa fa-signal"></i> <span>Grafik</span>
          </a>
        </li>
        
      <?php } else { ?>

        <li class="header" style="text-align: center; ">MENU NAVIGATION ADMIN</li>

        <li class="treeview">
          <a href="home.php">
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
        </li>

        <li class="treeview">
          <a href="home.php?page=user">
            <i class="fa fa-users"></i> <span>Data User</span>
          </a>
        </li>

        <li class="treeview">
          <a href="home.php?page=kelas">
            <i class="fa fa-university"></i> <span>Kelas</span>
          </a>
        </li>

        <li class="treeview">
          <a href="home.php?page=kriteria">
            <i class="fa fa-plug"></i> <span>Kriteria</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="home.php?page=data_siswa"><i class="fa fa-user"></i> Data Siswa</a></li>
            <li><a href="home.php?page=data_guru"><i class="fa fa-user"></i> Data Wali Kelas</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="home.php?page=hasil_prilaku_siswa2">
            <i class="fa fa-list-alt"></i> <span>Perilaku Siswa</span>
          </a>
        </li>

      <?php } ?>
    </ul>
    </section>
</aside>