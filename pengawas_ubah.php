<?php
    $row = $db->get_row("SELECT * FROM user WHERE id_user='$_GET[ID]'"); 
?>
<div class="page-header">
    <h1>Ubah User</h1>
</div>
<div class="row">
    <div class="col-sm-6">

        <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?m=pengawas_ubah&ID=<?=$row->id_user?>" enctype="multipart/form-data">
        <div class="form-group">
                <label>User <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="user" value="<?=$row->user?>"/>
            </div>
            <div class="form-group">
                <label>Nama pengawas <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?=$row->nama?>"/>
            </div>
            <div class="form-group">
                <label>Level <span class="text-danger">*</span></label><br>
                <input type="radio" name="level" value="admin"> Admin
                <input type="radio" name="level" value="pengawas"> Pengawas
                <input type="radio" name="level" value="donatur"> Donatur
            </div>
            <div class="form-group">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="pass">
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=pengawas"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>