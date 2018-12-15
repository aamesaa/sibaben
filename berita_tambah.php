<?php
    $row = $db->get_row("SELECT * FROM berita WHERE id_berita='$_GET[ID]'"); 
?>
<div class="page-header">
    <h1>Tambah Berita</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?m=berita_tambah&ID=<?=$row->id_berita?>">
            <div class="form-group">
                <label>id_user <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="id_user" value="<?=$row->id_user?>"/>
            </div>
            <div class="form-group">
                <label>judul <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="judul" value="<?=$row->judul?>"/>
            </div>
            <div class="form-group">
                <label>Isi <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="isi" value="<?=$row->isi?>"/>
            </div>
            <div class="form-group">
                <label>Korban <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="korban" value="<?=$row->korban?>"/>
            </div>
            <div class="form-group">
                <label>Lokasi <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="lokasi" value="<?=$row->lokasi?>"/>
            </div>
            <div class="form-group">
                <label>Tanggal <span class="text-danger">*</span></label>
                <input class="form-control" type="date" name="tanggal" value="<?=$row->tanggal?>"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=pengawas"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>