<?php
include('koneksi.php');
 
$id = $_POST['id'];
$nama = $_POST['nama'];
$ketua_prodi = $_POST['ketua_prodi'];
$fakultas = $_POST['fakultas'];

$sql = "UPDATE prodi SET nama='$nama' , ketua_prodi='$ketua_prodi' , fakultas='$fakultas' WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header('location:prodi.php?message=success');
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>