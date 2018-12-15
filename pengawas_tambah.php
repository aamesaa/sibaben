<div class="page-header">
    <h1>Tambah pengawas</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?m=pengawas_tambah">
            <div class="form-group">
                <label>User <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="user" value="<?=$_POST[user]?>"/>
            </div>
            <div class="form-group">
                <label>Nama pengawas <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?=$_POST[nama]?>"/>
            </div>
            <div class="form-group">
                <label>Level <span class="text-danger">*</span></label><br>
                <input type="radio" name="level" value="admin"> Admin
                <input type="radio" name="level" value="pengawas"> Pengawas
                <input type="radio" name="level" value="donatur" checked> Donatur
            </div>
            <div class="form-group">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="pass" value="<?=$_POST[pass]?>"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=pengawas"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>