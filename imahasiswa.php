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
                <form action="cmahasiswa.php" method="POST" name="input">
                    <center>
                        <table>
                            <p>Input Data Mahasiswa</p>
                            <tr>
                                <td>NPM</td>
                                <td>:</td>
                                <td><input type="text" name="npm" placeholder="NPM" size="33"></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><input type="text" name="nama" placeholder="Nama" size="33"></td>
                            </tr>
                            <tr>
                                <td>Prodi</td>
                                <td>:</td>
                                <td>
                                    <select name="jurusan">
                                        <?php
                                        require('koneksi.php');
    $query = "SELECT * FROM prodi";
    $result = mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($result)){                                                 
       echo "<option value='".$row['nama']."'>".$row['nama']."</option>";
    }
?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Semester</td>
                                <td>:</td>
                                <td>
                                    <select name="semester">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
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