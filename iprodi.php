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
                <form action="cprodi.php" method="POST" name="input">
                    <center>
                        <table>
                            <p>Input Data Program Studi</p>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><input type="text" name="nama" placeholder="Nama" size="33"></td>
                            </tr>
                            <tr>
                                <td>Ketua Prodi</td>
                                <td>:</td>
                                <td><input type="text" name="ketua_prodi" placeholder="Ketua Prodi" size="33"></td>
                            </tr>
                            <tr>
                                <td>Fakultas</td>
                                <td>:</td>
                                <td>
                                    <select name="fakultas">
                                        <option>Teknik dan Ilmu Komputer</option>
                                        <option>Ilmu Pendidikan dan Pengetahuan Sosial</option>
                                        <option>Matematika dan IPA</option>
                                        <option>Bahasa dan Seni</option>
                                    </select>
                                </td>
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