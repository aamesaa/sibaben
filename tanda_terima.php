<?php
if($act=='pilih'){
    if(sudah_memilih($_SESSION['id_pengawas']))
        include 'pilih_sudah.php';
    else    
        include 'pilih.php';
} else {
    include 'identitas.php';
}
?>