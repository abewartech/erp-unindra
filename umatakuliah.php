<?php
include('koneksi.php');
 
$id = $_POST['id'];
$kode_matkul = $_POST['kode_matkul'];
$nama = $_POST['nama'];
$sks = $_POST['sks'];
$semester = $_POST['semester'];
$jurusan = $_POST['jurusan'];

$sql = "UPDATE matakuliah SET kode_matkul='$kode_matkul' , nama='$nama' , sks='$sks' , semester='$semester', jurusan='$jurusan' WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header('location:matakuliah.php?message=success');
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>