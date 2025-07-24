<?php
ob_start();
session_start();
require 'koneksi.php';

if(isset($_POST['id']) && isset($_POST['id_matkul']) && isset($_POST['id_dosen'])) {
    $id = $_POST['id'];
    $id_matkul = $_POST['id_matkul'];
    $id_dosen = $_POST['id_dosen'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $ruangan = $_POST['ruangan'];
    $semester = $_POST['semester'];
    $tahun_akademik = $_POST['tahun_akademik'];
    
    // Check for schedule conflicts (exclude current record)
    $conflict_check = mysql_query("
        SELECT * FROM jadwal 
        WHERE hari = '$hari' 
        AND ruangan = '$ruangan' 
        AND tahun_akademik = '$tahun_akademik'
        AND id != '$id'
        AND (
            (jam_mulai <= '$jam_mulai' AND jam_selesai > '$jam_mulai') OR
            (jam_mulai < '$jam_selesai' AND jam_selesai >= '$jam_selesai') OR
            (jam_mulai >= '$jam_mulai' AND jam_selesai <= '$jam_selesai')
        )
    ");
    
    if(mysql_num_rows($conflict_check) > 0) {
        echo "<script>
            alert('Jadwal bentrok! Ruangan sudah digunakan pada waktu tersebut.');
            window.location.href='ejadwal.php?id=$id';
        </script>";
        exit;
    }
    
    // Check for lecturer conflicts (exclude current record)
    $lecturer_conflict = mysql_query("
        SELECT * FROM jadwal 
        WHERE hari = '$hari' 
        AND id_dosen = '$id_dosen' 
        AND tahun_akademik = '$tahun_akademik'
        AND id != '$id'
        AND (
            (jam_mulai <= '$jam_mulai' AND jam_selesai > '$jam_mulai') OR
            (jam_mulai < '$jam_selesai' AND jam_selesai >= '$jam_selesai') OR
            (jam_mulai >= '$jam_mulai' AND jam_selesai <= '$jam_selesai')
        )
    ");
    
    if(mysql_num_rows($lecturer_conflict) > 0) {
        echo "<script>
            alert('Jadwal bentrok! Dosen sudah mengajar pada waktu tersebut.');
            window.location.href='ejadwal.php?id=$id';
        </script>";
        exit;
    }
    
    // Update schedule
    $query = mysql_query("
        UPDATE jadwal SET 
        id_matkul = '$id_matkul',
        id_dosen = '$id_dosen',
        hari = '$hari',
        jam_mulai = '$jam_mulai',
        jam_selesai = '$jam_selesai',
        ruangan = '$ruangan',
        semester = '$semester',
        tahun_akademik = '$tahun_akademik'
        WHERE id = '$id'
    ");
    
    if($query) {
        echo "<script>
            alert('Jadwal berhasil diupdate!');
            window.location.href='jadwal.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal mengupdate jadwal!');
            window.location.href='ejadwal.php?id=$id';
        </script>";
    }
} else {
    echo "<script>
        alert('Data tidak lengkap!');
        window.location.href='jadwal.php';
    </script>";
}
?>
