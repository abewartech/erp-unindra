<?php
ob_start();
session_start();
require 'koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Check if schedule exists
    $check = mysql_query("SELECT * FROM jadwal WHERE id = '$id'");
    if(mysql_num_rows($check) == 0) {
        echo "<script>
            alert('Data jadwal tidak ditemukan!');
            window.location.href='jadwal.php';
        </script>";
        exit;
    }
    
    // Delete schedule
    $query = mysql_query("DELETE FROM jadwal WHERE id = '$id'");
    
    if($query) {
        echo "<script>
            alert('Jadwal berhasil dihapus!');
            window.location.href='jadwal.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus jadwal!');
            window.location.href='jadwal.php';
        </script>";
    }
} else {
    echo "<script>
        alert('ID jadwal tidak valid!');
        window.location.href='jadwal.php';
    </script>";
}
?>
