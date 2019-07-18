<?php
include "koneksi.php";

$qry = mysqli_query($conn, "SELECT * FROM login WHERE Username='$_POST[Username]' AND Password='$_POST[Password]'");
$jumpa = mysqli_num_rows($qry);
$r = mysqli_fetch_array($qry);

if ($jumpa > 0) {
    $data = mysqli_fetch_assoc($qry);
    if ($data['UserType'] == 'Admin') {
        session_start();
        $_SESSION['Username'] = $r['Username'];
        $_SESSION['Password'] = $r['Password'];
        $_SESSION['Type'] = $r['Type'];
        header('location:index1.php');
    } else {
        session_start();
        $_SESSION['Username'] = $r['Username'];
        $_SESSION['Password'] = $r['Password'];
        $_SESSION['Type'] = $r['Type'];
        header('location:index2.php');
    }

} else {
    echo '<script language="javascript">
	alert("Username atau Password Yang anda Masukkan Salah");
	window.location="index.php";
	</script>';
    exit();
}
