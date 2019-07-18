<!DOCTYPE html>
<?php
ob_start();
session_start();
error_reporting(0);

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
                <form action="cdosen.php" method="POST" name="input">
                    <center>
                        <table>
                            <p>Input Data Dosen</p>
                            <tr>
                                <td>NIP</td>
                                <td>:</td>
                                <td><input type="text" name="nip" placeholder="NIP"></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><input type="text" name="nama" placeholder="Nama"></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td>
                                    <input type="radio" name="jenis_kelamin" value="Laki-laki">Laki-laki</input>
                                    <input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan</input>
                            </tr>
                            <tr>
                                <td>Gelar</td>
                                <td>:</td>
                                <td><input type="text" name="gelar" placeholder="Gelar"></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><textarea name="alamat" placeholder="Alamat" cols="21" rows="3"
                                        style="resize:none"></textarea></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><input type="text" name="email" placeholder="Email"></td>
                            </tr>
                            <tr>
                                <td>No HP</td>
                                <td>:</td>
                                <td><input type="text" name="no_hp" placeholder="No HP"></td>
                            </tr>
                        </table>
                    </center>
                    <input type="submit" name="input" value="input" class="submit">
                </form>
            </div>
        </div>

        <div id="footer">
            <center>
                <p>Copyright &copy; UNINDRA 2019</p>
            </center>
        </div>
    </body>

</html>