<div class="page-header">
    <h1>Laporan Donasi</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">        
        <form class="form-inline">
            <input type="hidden" name="m" value="lap_donasi" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
            </div>
        </form>
    </div>
    <table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Berita</th>
            <th>Jumlah Donasi</th>
        </tr>
    </thead>

    <!-- menginputkan data pada kolom-kolomnya -->
    <?php
    $q = esc_field($_GET['q']);
    $rows = $db->get_results("SELECT b.id_berita, judul, total FROM berita b LEFT JOIN donatur d ON b.id_berita=d.id_berita WHERE judul LIKE '%$q%' ORDER BY judul");
    $no=0;
    foreach($rows as $row):?>

    <tr>
        <td><?=++$no ?></td>
        <td><?=$row->judul?></td>
        <td><?= "Rp ".number_format($row->total,2,',','.')?></td>
    </tr>
    <?php endforeach;
    ?>
    </table>
</div>