<div class="page-header">
    <h1>User</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">        
        <form class="form-inline">
            <input type="hidden" name="m" value="pengawas" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
            </div>
            <div class="form-group  <?=($_SESSION['akses']=='admin') ? '' : 'hidden'?>">
                <a class="btn btn-primary" href="?m=pengawas_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
        </form>
    </div>
    <table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Level</th>
            <th class=" <?=($_SESSION['akses']=='admin') ? '' : 'hidden'?>">Aksi</th>
        </tr>
    </thead>
    <?php
    $q = esc_field($_GET['q']);
    $rows = $db->get_results("SELECT id_user, user, nama, level FROM user WHERE user LIKE '%$q%' ORDER BY nama");
    $no=0;
    foreach($rows as $row):?>
    <tr>
        <td><?=++$no ?></td>
        <td><?=$row->nama?></td>
        <td><?=$row->level?></td>
        <td><?=($row->id_user) ? '<span class="glyphicon glyphicon-check"></span>' : ''?></td>
        <td class=" <?=($_SESSION['akses']=='admin') ? '' : 'hidden'?>">
            <a class="btn btn-xs btn-warning" href="?m=pengawas_ubah&ID=<?=$row->id_user?>"><span class="glyphicon glyphicon-edit"></span></a>
            <a class="btn btn-xs btn-danger" href="aksi.php?act=pengawas_hapus&ID=<?=$row->id_user?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
        </td>
    </tr>
    <?php endforeach;
    ?>
    </table>
</div>