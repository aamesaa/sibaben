<?php
    $row = $db->get_row("SELECT id_berita, nama_lengkap, total, email, no_hp, metode_pembayaran, jml_donasi FROM donatur WHERE id_berita='$_GET[ID]'"); 
?>

<div class="page-header">
    <h1>Donasi</h1>
</div>
<p>Anda akan berdonasi untuk bencana <!--judul berita yang dapet dari get[ID] -->
<div class="row">
<div class="col-sm-6">
        <form method="post" action="?m=donasi_tambah&ID=<?=$row->id_berita?>">
            <div class="form-group">
                <label>Judul Berita <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="judul" readonly value="<?=$_GET[judul]?>"/>
            </div>
        </form>
        </div>
        </div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?m=donasi_tambah&ID=<?=$row->id_berita?>">
            <h2> Identitas </h2>
            <div class="form-group">
                <label>Nama Lengkap <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_lengkap" value="<?=$_POST[nama_lengkap]?>"/>
            </div>
            <div class="form-group">
                <label>Email <span class="text-danger">*</span></label>
                <input class="form-control" type="email" name="email" value="<?=$_POST[email]?>"/>
            </div>
            <div class="form-group">
                <label>No Hp/Tlp <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="no_hp" value="<?=$_POST[no_hp]?>"/>
            </div>
            <div class="form-group">
                <label>Jumlah donasi (min Rp 50.000) <span class="text-danger">*</span></label>
                <input class="form-control" type="number" name="total" value="<?=$_POST[total]?>"/>
            </div>
            <div class="form-group">
                <label>Metode Pembayaran <span class="text-danger">*</span></label>
                <input type="radio" name="metode_pembayaran" value="BCA" checked> BCA
                <input type="radio" name="metode_pembayaran" value="BRI"> BRI
                <input type="radio" name="metode_pembayaran" value="BNI"> BNI
            </div>
            <div class="form-group">
                <p><span class="text-danger">*</span>penting bagi anda untuk mengirimkan bukti</p>
                <p>pembayaran ke CP : 081166991212 (veven)</p>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=pengawas"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>