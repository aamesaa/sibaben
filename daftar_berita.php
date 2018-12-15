<?php
$rows = $db->get_results("SELECT * FROM berita ORDER BY judul"); 
?>
<div class="page-header">
    <h1>Daftar Berita</h1>
</div>

</div>
    <table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Korban</th>
            <th>Lokasi</th>
            <th>Tanggal</th>
            <th class=" <?=($_SESSION['akses']=='admin') ? '' : 'hidden'?>">Aksi</th>
        </tr>
    </thead>
    <?php
    $q = esc_field($_GET['q']);
    $rows = $db->get_results("SELECT judul, isi, korban, lokasi, tanggal FROM berita WHERE id_berita LIKE '%$q%' ORDER BY judul");
    $no=0;
    foreach($rows as $row):?>
    <tr>
        <td><?=++$no ?></td>
        <td><?=$row->judul?></td>
        <td><?=$row->isi?></td>
        <td><?=$row->korban?></td>
        <td><?=$row->lokasi?></td>
        <td><?=$row->tanggal?></td>
        <td><?=($row->id_berita) ? '<span class="glyphicon glyphicon-check"></span>' : ''?></td>
        <td class=" <?=($_SESSION['akses']=='admin') ? '' : 'hidden'?>">
            <a class="btn btn-xs btn-warning" href="?m=berita_ubah&ID=<?=$row->id_berita?>"><span class="glyphicon glyphicon-edit"></span></a>
            <a class="btn btn-xs btn-danger" href="aksi.php?act=berita_hapus&ID=<?=$row->id_berita?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
        </td>
    </tr>
    <?php endforeach;
    ?>
    </table>
</div>