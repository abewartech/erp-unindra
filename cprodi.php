<?php
include('koneksi.php');
 
$nama = $_POST['nama'];
$ketua_prodi = $_POST['ketua_prodi'];
$fakultas = $_POST['fakultas'];

$sql = "INSERT INTO prodi (nama, ketua_prodi, fakultas)
VALUES ('$nama', '$ketua_prodi', '$fakultas')";

if ($conn->query($sql) === TRUE) {
    header('location:prodi.php?message=success');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
