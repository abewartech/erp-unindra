<?php
include "koneksi.php";
	$id=$_GET['id'];
	$del=mysqli_query($conn,"DELETE FROM matakuliah WHERE id='$id'");
	
	if($del){
		echo "<script> alert ('Data Sukses Dihapus');
		location='matakuliah.php';
		</script>";
		}
		else{
			echo "<script> alert ('Data Gagal Dihapus');
		location='matakuliah.php';
		</script>";
		}
?>
