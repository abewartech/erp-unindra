<?php
include('koneksi.php');

$id = $_POST['id'];
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$gelar = $_POST['gelar'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];

$sql = "UPDATE dosen SET nip='$nip' , nama='$nama' , jenis_kelamin='$jenis_kelamin' , gelar='$gelar', alamat='$alamat', email='$email', no_hp='$no_hp' WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header('location:dosen.php?message=success');
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>