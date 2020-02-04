<?php
    include "models/m_kereta.php";
    include "models/m_stasiun.php";

    $stasiun = new Stasiun($connection);
    $tmbh = new Kereta($connection);
    session_start();
    if($_SESSION['status'] == "login"){
?>

<!DOCTYPE html>
<html>
<body>
	<br/>
 
	<h4>Selamat datang, <?php echo $_SESSION['username']; ?>! anda telah login.</h4>

	<br/>
	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#tambah_kereta">Tambah Data Kereta</button>
	<!-- Modal -->
	<div id="tambah_kereta" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Tambah Data Kereta</h4>
				</div>
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label" for="ID">UID</label>
                            <input type="text" name="ID" class="form-control" maxlength="8" style="text-transform:uppercase" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="nama_kereta">Nama Kereta</label>
                            <input type="text" name="nama_kereta" class="form-control" maxlength="50" required>
                        </div>
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
                    </div>            
                </form>
                <?php
                    $UID = @$_POST['ID'];
                    $nama = @$_POST['nama_kereta'];
                    if (@$_POST['tambah']){
                        $result = $tmbh->tambah($UID, $nama);
                        if ($result > 0){
                                header("location:?page=login");
                            }else{
                                header("location:?page=login");
                            }
                                
                    }
                ?>
			</div>
		</div>
	</div>

    <button type="button" class="btn btn-secondary btn-lg" data-toggle="modal" data-target="#edit_kereta">Update Data Kereta</button>
    <div id="edit_kereta" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Update Data Kereta</h4>
				</div>
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label" for="ID_old">UID Lama</label>
                            <input type="text" name="ID_old" class="form-control" maxlength="8" style="text-transform:uppercase" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="ID_new">UID Baru</label>
                            <input type="text" name="ID_new" class="form-control" maxlength="8" style="text-transform:uppercase" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="nama_kereta_baru">Nama Kereta Baru</label>
                            <input type="text" name="nama_kereta_baru" class="form-control" maxlength="50" required>
                        </div>
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <input type="submit" class="btn btn-success" name="edit" value="Edit">
                    </div>            
                </form>
                <?php
                    $ID_old = @$_POST['ID_old'];
                    $ID_new = @$_POST['ID_new'];
                    $nama = @$_POST['nama_kereta_baru'];
                    if (@$_POST['edit']){
                        $result = $tmbh->edit($ID_old,$ID_new,$nama);
                        if ($result > 0){
                                header("location:?page=login");
                            }else{
                                header("location:?page=login");
                            }
                                
                    }
                ?>
			</div>
		</div>
	</div>

    <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#hps_kereta">Hapus Data Kereta</button>
    <div id="hps_kereta" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Hapus Data Kereta</h4>
				</div>
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label" for="ID_old">UID</label>
                            <input type="text" name="ID_del" class="form-control" maxlength="8" style="text-transform:uppercase" required>
                        </div>
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <input type="submit" class="btn btn-success" name="edit" value="Hapus">
                    </div>            
                </form>
                <?php
                    $ID_del = @$_POST['ID_del'];
                    if (@$_POST['edit']){
                        $result = $tmbh->hapus($ID_del);
                        if ($result > 0){
                            header("location:?page=login");
                        }else{
                            header("location:?page=login");
                        }
                                
                    }
                ?>
			</div>
		</div>
	</div>
    </br>
    </br>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#tambah_stasiun">Tambah Data Stasiun</button>
	<!-- Modal -->
	<div id="tambah_stasiun" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Tambah Data Stasiun</h4>
				</div>
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label" for="ID">ID</label>
                            <input type="text" name="ID" class="form-control" maxlength="5" style="text-transform:uppercase" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="nama_stasiun">Nama Stasiun</label>
                            <input type="text" name="nama_stasiun" class="form-control" maxlength="50" required>
                        </div>
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
                    </div>            
                </form>
                <?php
                    $UID = @$_POST['ID'];
                    $nama = @$_POST['nama_stasiun'];
                    if (@$_POST['tambah']){
                        $result = $stasiun->tambah($UID, $nama);
                        if ($result > 0){
                                header("location:?page=login");
                            }else{
                                header("location:?page=login");
                            }
                                
                    }
                ?>
			</div>
		</div>
	</div>

    <button type="button" class="btn btn-secondary btn-lg" data-toggle="modal" data-target="#edit_stasiun">Update Data Stasiun</button>
    <div id="edit_stasiun" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Update Data Stasiun</h4>
				</div>
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label" for="ID_old">ID Lama</label>
                            <input type="text" name="ID_old" class="form-control" maxlength="5" style="text-transform:uppercase" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="ID_new">ID Baru</label>
                            <input type="text" name="ID_new" class="form-control" maxlength="5" style="text-transform:uppercase" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="nama_stasiun_baru">Nama Stasiun Baru</label>
                            <input type="text" name="nama_stasiun_baru" class="form-control" maxlength="50" required>
                        </div>
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <input type="submit" class="btn btn-success" name="edit" value="Edit">
                    </div>            
                </form>
                <?php
                    $ID_old = @$_POST['ID_old'];
                    $ID_new = @$_POST['ID_new'];
                    $nama = @$_POST['nama_stasiun_baru'];
                    if (@$_POST['edit']){
                        $result = $stasiun->edit($ID_old,$ID_new,$nama);
                        if ($result > 0){
                                header("location:?page=login");
                            }else{
                                header("location:?page=login");
                            }
                                
                    }
                ?>
			</div>
		</div>
	</div>

    <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#hps_stasiun">Hapus Data Stasiun</button>
    <div id="hps_stasiun" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Hapus Data Stasiun</h4>
				</div>
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label" for="ID_old">ID</label>
                            <input type="text" name="ID_del" class="form-control" maxlength="5" style="text-transform:uppercase" required>
                        </div>
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <input type="submit" class="btn btn-success" name="edit" value="Hapus">
                    </div>            
                </form>
                <?php
                    $ID_del = @$_POST['ID_del'];
                    if (@$_POST['edit']){
                        $result = $stasiun->hapus($ID_del);
                        if ($result > 0){
                            header("location:?page=login");
                        }else{
                            header("location:?page=login");
                        }
                                
                    }
                ?>
			</div>
		</div>
	</div>
    </br>
    </br>


    <a href="?page=logout"><input type="button"  name="logout" id="logout" value="Logout" class="btn btn-primary"/></a>

 	
</body>
</html>

<?php
    }else{
        header("location: ?page=dashboard");
	}
?>