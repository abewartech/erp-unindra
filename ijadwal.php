<?php
ob_start();
session_start();
require 'koneksi.php';

if(isset($_POST['id_matkul']) && isset($_POST['id_dosen'])) {
    $id_matkul = $_POST['id_matkul'];
    $id_dosen = $_POST['id_dosen'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $ruangan = $_POST['ruangan'];
    $semester = $_POST['semester'];
    $tahun_akademik = $_POST['tahun_akademik'];
    
    // Check for schedule conflicts
    $conflict_check = mysql_query("
        SELECT * FROM jadwal 
        WHERE hari = '$hari' 
        AND ruangan = '$ruangan' 
        AND tahun_akademik = '$tahun_akademik'
        AND (
            (jam_mulai <= '$jam_mulai' AND jam_selesai > '$jam_mulai') OR
            (jam_mulai < '$jam_selesai' AND jam_selesai >= '$jam_selesai') OR
            (jam_mulai >= '$jam_mulai' AND jam_selesai <= '$jam_selesai')
        )
    ");
    
    if(mysql_num_rows($conflict_check) > 0) {
        echo "<script>
            alert('Jadwal bentrok! Ruangan sudah digunakan pada waktu tersebut.');
            window.location.href='jadwal.php';
        </script>";
        exit;
    }
    
    // Check for lecturer conflicts
    $lecturer_conflict = mysql_query("
        SELECT * FROM jadwal 
        WHERE hari = '$hari' 
        AND id_dosen = '$id_dosen' 
        AND tahun_akademik = '$tahun_akademik'
        AND (
            (jam_mulai <= '$jam_mulai' AND jam_selesai > '$jam_mulai') OR
            (jam_mulai < '$jam_selesai' AND jam_selesai >= '$jam_selesai') OR
            (jam_mulai >= '$jam_mulai' AND jam_selesai <= '$jam_selesai')
        )
    ");
    
    if(mysql_num_rows($lecturer_conflict) > 0) {
        echo "<script>
            alert('Jadwal bentrok! Dosen sudah mengajar pada waktu tersebut.');
            window.location.href='jadwal.php';
        </script>";
        exit;
    }
    
    // Insert schedule
    $query = mysql_query("
        INSERT INTO jadwal (id_matkul, id_dosen, hari, jam_mulai, jam_selesai, ruangan, semester, tahun_akademik) 
        VALUES ('$id_matkul', '$id_dosen', '$hari', '$jam_mulai', '$jam_selesai', '$ruangan', '$semester', '$tahun_akademik')
    ");
    
    if($query) {
        echo "<script>
            alert('Jadwal berhasil ditambahkan!');
            window.location.href='jadwal.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menambahkan jadwal!');
            window.location.href='jadwal.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Data tidak lengkap!');
        window.location.href='jadwal.php';
    </script>";
}
?>
