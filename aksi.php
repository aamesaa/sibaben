<?php
require_once'functions.php';

 
    /** LOGIN */ 
    if ($mod=='login'){
        $user = esc_field($_POST[user]);
        $pass = esc_field($_POST[pass]);
                
        $row = $db->get_row("SELECT * FROM user WHERE user='$user' AND pass='$pass'");
        if($row){
            $_SESSION[login] = $row->user;
            $_SESSION[level] = 'admin';
            $_SESSION[akses] = $row->level; 
            
            redirect_js("index.php");
        } else{
            print_msg("Salah kombinasi username dan password."); 
        }          
    }else if ($mod=='password'){
        $pass1 = $_POST[pass1];
        $pass2 = $_POST[pass2];
        $pass3 = $_POST[pass3];
        
        if($_SESSION['level']=='pengawas')
            $row = $db->get_row("SELECT * FROM user WHERE user='$_SESSION[user]' AND pass='$pass1'");        
        
        if($pass1=='' || $pass2=='' || $pass3=='')
            print_msg('Field bertanda * harus diisi.');
        elseif(!$row)
            print_msg('Password lama salah.');
        elseif( $pass2 != $pass3 )
            print_msg('Password baru dan konfirmasi password baru tidak sama.');
        else{        
            if($_SESSION['level']=='pengawas')
                $db->query("UPDATE user SET pass='$pass2' WHERE user='$_SESSION[user]'");
                                                
            print_msg('Password berhasil diubah.', 'success');
        }
    } elseif($act=='logout'){
        session_destroy();
        header("location:index.php");
    }
    
    /** PENGAWAS */    
    if($mod=='pengawas_tambah'){
        $user = $_POST['user'];
        $nama = $_POST['nama'];
        $level = $_POST['level'];
        $pass = $_POST['pass'];
        
        
        if(!$user || !$nama || !$pass)
            print_msg("Field bertanda * tidak boleh kosong!");
        elseif($db->get_results("SELECT * FROM user WHERE user='$user'"))
            print_msg("User sudah ada!");
        elseif(strlen($pass)<4 || strlen($pass)>16)
            print_msg("Password 4-16 karakter!");
        else{
            $db->query("INSERT INTO user (user, nama, level, pass) VALUES ('$user', '$nama', '$level', '$pass')");
            redirect_js("index.php?m=pengawas");
        }    
    } else if($mod=='pengawas_ubah'){
        $user = $_POST['user'];
        $nama = $_POST['nama'];
        $level = $_POST['level'];
        $pass = $_POST['pass'];
        
        if(!$user || !$nama || !$level || !$pass)
            print_msg("Field bertanda * tidak boleh kosong!");
        elseif(strlen($pass)<4 || strlen($pass)>15)
            print_msg("Password 4-15 karakter!");
        else{
            $db->query("UPDATE user SET user='$user', nama='$nama', level='$level' pass='$pass' WHERE user='$_GET[id_user]'");
            redirect_js("index.php?m=pengawas");
        }   
           
    } else if ($act=='pengawas_hapus'){
        $db->query("DELETE FROM user WHERE user='$_GET[id_user]'");
        header("location:index.php?m=pengawas");
    }


    /** berita */    
    if($mod=='berita_tambah'){
        $id_user = $_POST['id_user'];
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $korban = $_POST['korban'];
        $lokasi = $_POST['lokasi'];
        $tanggal = $_POST['tanggal'];
        
        
        if(!$id_user || !$judul || !$isi || !$korban || !$lokasi || !$tanggal)
            print_msg("Field bertanda * tidak boleh kosong!");
        elseif($db->get_results("SELECT * FROM berita WHERE judul='$judul'"))
            print_msg("Judul sudah ada!");
        else{
            $db->query("INSERT INTO berita (id_user, judul, isi, korban, lokasi, tanggal) VALUES ('$id_user', '$judul', '$isi', '$korban', '$lokasi', '$tanggal')");
            redirect_js("index.php?m=berita");
        }    
    } else if($mod=='berita_ubah'){
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $korban = $_POST['korban'];
        $lokasi = $_POST['lokasi'];
        $tanggal = $_POST['tanggal'];
        
        
        if(!$judul || !$isi || !$korban || !$lokasi || !$tanggal)
            print_msg("Field bertanda * tidak boleh kosong!");
        else{
            $db->query("UPDATE berita SET judul='$judul', isi='$isi', korban='$korban', lokasi='$lokasi', tanggal='$tanggal' WHERE id_berita='$_GET[id_berita]'");
            redirect_js("index.php?m=berita");
        }   
           
    } else if ($act=='berita_hapus'){
        $db->query("DELETE FROM berita WHERE id_berita='$_GET[id_berita]'");
        header("location:index.php?m=berita");
    }


    /** Donasi */    
    if($mod=='donasi_tambah1'){
        $id_berita = $_POST['id_berita'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $total = $_POST['total'];
        $metode_pembayaran = $_POST['metode_pembayaran'];
        $jml_donasi = $_POST['jml_donasi'];
        
        
        if(!$nama_lengkap || !$email || !$no_hp || !$total ||  !$jml_donasi)
            print_msg("Field bertanda * tidak boleh kosong!");
        else{
            $total = $total + $jml_donasi;
            $db->query("INSERT INTO donatur (id_berita, nama_lengkap, email, no_hp, jml_donasi, total, metode_pembayaran) VALUES ('$nama_lengkap','$email', '$no_hp', '$jml_donasi', '$total', '$metode_pembayaran', $jadi')");

            redirect_js("index.php?m=lap_donasi");
        }
    }
    if($mod=='donasi_tambah'){
        $id_user = $_GET['id_user'];
        $judul = $_GET['judul'];
        $isi = $_GET['isi'];
        $korban = $_GET['korban'];
        $lokasi = $_GET['lokasi'];
        $tanggal = $_GET['tanggal'];
        
        
        if(!$id_user || !$judul || !$isi || !$korban || !$lokasi || !$tanggal)
            print_msg("Field bertanda * tidak boleh kosong!");
        elseif($db->get_results("SELECT * FROM berita WHERE judul='$judul'"))
            print_msg("Judul sudah ada!");
        else{
            $db->query("INSERT INTO berita (id_user, judul, isi, korban, lokasi, tanggal) VALUES ('$id_user', '$judul', '$isi', '$korban', '$lokasi', '$tanggal')");
            redirect_js("index.php?m=berita");
        }
    }   