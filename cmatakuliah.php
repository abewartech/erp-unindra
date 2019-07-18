<?php
include('koneksi.php');
 
$kode_matkul = $_POST['kode_matkul'];
$nama = $_POST['nama'];
$sks = $_POST['sks'];
$semester = $_POST['semester'];
$jurusan = $_POST['jurusan'];

$sql = "INSERT INTO matakuliah (kode_matkul, nama, sks, semester, jurusan)
VALUES ('$kode_matkul', '$nama', '$sks', '$semester', '$jurusan')";

if ($conn->query($sql) === TRUE) {
    header('location:matakuliah.php?message=success');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
