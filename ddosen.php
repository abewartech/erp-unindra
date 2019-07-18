<?php
include "koneksi.php";
	$id=$_GET['id'];
	$del=mysqli_query($conn,"DELETE FROM dosen WHERE id='$id'");
	
	if($del){
		echo "<script> alert ('Data Sukses Dihapus');
		location='dosen.php';
		</script>";
		}
		else{
			echo "<script> alert ('Data Gagal Dihapus');
		location='dosen.php';
		</script>";
		}
?>
