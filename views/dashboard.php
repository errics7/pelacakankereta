<!DOCTYPE html>
<?php
include "models/login.php";
$lgn = new Login($connection);
?>
<html>
  <div class="row">
    <div class="col-lg-12">
      <h1>Dashboard <small> Khusus Admin</small></h1>
      <ol class="breadcrumb">
        <li><a href="?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a href="?page=data_kereta"><i class="fa fa-bar-chart-o"></i> Data Kereta Api </a></li>
        <li><a href="?page=data_stasiun"><i class="fa fa-table"></i> Data Stasiun </a></li>
        <li><a href="?page=data_riwayat"><i class="fa fa-edit"></i> Data Riwayat Perjalanan Stasiun</a></li>
      </ol>
    </div>
  </div>

  <div>
    <center>
      <div id="inputan">
        <form action="" method="post">		
            <div>
              <input type="text" name="user" placeholder="Username" class="lg" autofocus />
            </div>
            <div>
              <input type="password" name="pass" placeholder="Password" class="lg"/>
            </div>			
            <div style="margin-top:10px">
              <input type="submit" name="login" value="Login" class="btn btn-primary"/>
            </div>
        </form>
      </div>
    </center>
    <?php
      $user = @$_POST['user'];
      $pass = @$_POST['pass'];
      $login = @$_POST['login'];
      
      if ($login){
        if($user == "" || $pass == ""){
          ?> <script type="text/javascript">alert("Username/Password Tidak Boleh Kosong");</script> <?php
        }else{
          $tampil = $lgn->login($user, $pass);

          $cek = mysqli_num_rows($tampil);
          if($cek > 0 ){
              $_SESSION['username'] = $user;
              $_SESSION['status'] = "login";
              header("location:?page=login");
          }else{
            ?> <script type="text/javascript">alert("Username/Password Salah");</script> <?php
          }
        }
      }
    ?>
  </div>
</html>
