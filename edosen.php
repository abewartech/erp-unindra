<!DOCTYPE html>
<?php
ob_start();
session_start();
error_reporting(0);
include "koneksi.php";
$id = $_GET['id'];
$query = "select * from dosen where id='$id'";
$result =  mysqli_query($conn,$query) or die("gagal melakukan query");
     $buff = mysqli_fetch_array($result);
                 mysqli_close();
?>
<html>

<head>
    <title>Rental Mobil
    </title>
    <link rel="stylesheet" href="style/css/style.css" type="text/css">
</head>

<body>

    <body background="style/img/back01.png">
        <div id="header">
            <img src="style/img/banner_rahmad.jpg" class="banner" href="index.php">
        </div>
        <div id='cssmenu'>
            <?php require('menubar.php'); ?>
        </div>
        <div id="isi">
            <div id="forminput">
                <form action="udosen.php" method="POST" name="input">
                    <center>
                        <p>Update Data Mahasiswa</p>
                        <table>
                            <input type="hidden" name="id" value="<?php echo $buff['id']; ?>">
                            <tr>
                                <td>NIP</td>
                                <td>:</td>
                                <td><input type="text" name="nip" placeholder="NIP" value="<?php echo $buff['nip']; ?>"
                                        class="box"></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><input type="text" name="nama" placeholder="Nama"
                                        value="<?php echo $buff['nama']; ?>" class="box"></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td><input type="text" name="jenis_kelamin" placeholder="Jenis Kelamin"
                                        value="<?php echo $buff['jenis_kelamin']; ?>" class="box"></td>
                            </tr>
                            <tr>
                                <td>Gelar</td>
                                <td>:</td>
                                <td><input type="text" name="gelar" placeholder="Gelar"
                                        value="<?php echo $buff['gelar']; ?>" class="box"></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><input type="text" name="alamat" placeholder="Alamat"
                                        value="<?php echo $buff['alamat']; ?>" class="box"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><input type="text" name="email" placeholder="Email"
                                        value="<?php echo $buff['email']; ?>" class="box"></td>
                            </tr>
                            <tr>
                                <td>No HP</td>
                                <td>:</td>
                                <td><input type="text" name="no_hp" placeholder="No HP"
                                        value="<?php echo $buff['no_hp']; ?>" class="box"></td>
                            </tr>
                        </table>
                    </center>
                    <input type="submit" name="input" value="Update" class="submit">
            </div>
        </div>
        <div id="footer">
            <center>
                <p>Copyright &copy; UNINDRA 2019</p>
            </center>
        </div>
    </body>

</html>