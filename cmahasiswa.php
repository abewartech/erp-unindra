<?php
include('koneksi.php');
 
$npm = $_POST['npm'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$semester = $_POST['semester'];

$sql = "INSERT INTO mahasiswa (npm, nama, jurusan, semester)
VALUES ('$npm', '$nama', '$jurusan', '$semester')";

$sql2 = "INSERT INTO login (Username, Password, TypeUser)
VALUES ('$npm', 'unindra', 'Mahasiswa')";

if ($conn->query($sql) && $conn->query($sql2)  === TRUE) {
    header('location:mahasiswa.php?message=success');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
