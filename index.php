<?php
    include'functions.php';
?>
<!DOCTYPE html>
<html lang="id">
  
    
    <title>Sistem Informasi Bantuan Bencana</title>
    <link href="assets/css/journal-bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/general.css" rel="stylesheet"/>       
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>               
  </head>  
<body>
    <div class="container">  
        <header style="background: url(header.png); height: 194px;"> 
            <div class="row" >
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-3"></div>
            </div>
        </header>
        <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="?">SIBABEN</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
              <?php if($_SESSION['level']!=='admin'): ?>
              <li><a href="?m=tanda_terima"><span class="glyphicon glyphicon-glyphicon glyphicon-cloud"></span> Login</a></li>
              <li><a href="?m=daftar_berita"><span class="glyphicon glyphicon-glyphicon glyphicon-user"></span> Daftar Berita</a></li>
              <li><a href="?m=lap_donasi"><span class="glyphicon glyphicon-glyphicon glyphicon-user"></span> Laporan Donasi</a></li>
              <?php endif?>
                         
              <?php if($_SESSION['level']=='admin'):?>
                <li><a href="?m=pengawas"><span class="glyphicon glyphicon-th-large"></span> User</a></li>   
                <li><a href="?m=berita"><span class="glyphicon glyphicon-th-large"></span> Berita</a></li>
                <li><a href="?m=lap_donasi"><span class="glyphicon glyphicon-th-large"></span> Laporan Donasi</a></li>
              <?php endif ?>                          
                                 
              </ul>          
              <ul class="nav navbar-nav navbar-right">
              <?php if($_SESSION['login']):?>
                <!-- <li><a href="?m=password"><span class="glyphicon glyphicon-lock"></span> Password</a></li> -->
                <li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
              <?php endif ?> 
              </ul>
            </div><!--/.nav-collapse -->
        </div>
        </nav>          
        <div class="">
            <?php
                if(file_exists($mod.'.php')){
                    if($mod=='tanda_terima' && $_SESSION['level']!='pengawas'){
                        redirect_js('?m=login');
                    } else {
                        include $mod.'.php';
                    }                               
                }else
                    include 'pengantar.php';
            ?>
        </div>                          
    </div>
    <footer class="footer">
      <div class="container">
        <em align="right"><p>Copyright &copy; SIBABEN</p></em>
      </div>
    </footer>
    </body>
</html>