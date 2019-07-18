<?php
include('koneksi.php');
 
$id = $_POST['id'];
$id_matkul = $_POST['id_matkul'];
$grade = $_POST['grade'];
$jumlah = $_POST['jumlah'];

$querya = mysqli_query($conn, "select * from matakuliah WHERE id = '$id_matkul' ");
$buff = mysqli_fetch_array($querya);

$kode_mk = $buff['kode_matkul'];
$nama_matkul = $buff['nama'];
$sks =  $buff['sks'];

$sql = "INSERT INTO khs (id_mahasiswa, id_matkul, kode_mk, nama_matkul, sks, grade, jumlah)
VALUES ('$id', '$id_matkul','$kode_mk', '$nama_matkul', '$sks', '$grade', '$jumlah')";

if ($conn->query($sql) === TRUE) {
    header('location:khs.php?message=success');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
