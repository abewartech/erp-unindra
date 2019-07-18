<?php
include('koneksi.php');
 
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$gelar = $_POST['gelar'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];

$sql = "INSERT INTO dosen (nip, nama, jenis_kelamin, gelar,alamat,email,no_hp)
VALUES ('$nip', '$nama', '$jenis_kelamin', '$gelar', '$alamat', '$email', '$no_hp')";

if ($conn->query($sql) === TRUE) {
    header('location:dosen.php?message=success');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
