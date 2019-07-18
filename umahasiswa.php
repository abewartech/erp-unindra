<?php
include('koneksi.php');
 
$id = $_POST['id'];
$npm = $_POST['npm'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$semester = $_POST['semester'];

$sql = "UPDATE mahasiswa SET npm='$npm' , nama='$nama' , jurusan='$jurusan' , semester='$semester' WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header('location:mahasiswa.php?message=success');
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>