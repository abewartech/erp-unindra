<!DOCTYPE html>
<?php
ob_start();
session_start();
error_reporting(0);
include "koneksi.php";
$id = $_SESSION['Username'];
$query = "select * from mahasiswa where npm='$id'";
$result =  mysqli_query($conn,$query) or die("gagal melakukan query");
     $buff = mysqli_fetch_array($result);
     $id_mahasiswa = $buff['id'];
                 mysqli_close();
?>
<html>

<head>
    <?php require('head.php'); ?>
</head>

<body>

    <body background="style/img/back01.png">
        <div id="header">
            <img src="style/img/banner_rahmad.jpg" class="banner">
        </div>
        <div id='cssmenu'>
            <?php require('menubar1.php'); ?>
        </div>
        <div id="isi">
            <center>
                <h2>Kartu Hasil Studi Semester</h2>
                <?php echo $buff['nama']; ?>
                <br>
                <table style="margin-top:3%; border-spacing:25px">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode MK</th>
                            <th>Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Grade</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require('koneksi.php');
        $query = mysqli_query($conn, "select * from khs WHERE id_mahasiswa = '$id_mahasiswa' ");
        $no = 0;
        $nomer = $no+1;
        while ($r = mysqli_fetch_array($query)){	
        echo"<tr>
                <td>$nomer</td>
                <td>$r[kode_mk]</td>
                <td>$r[nama_matkul]</td>
                <td>$r[sks]</td>
                <td>$r[grade]</td>
                <td>$r[jumlah]</td>
            </tr>";
            $no++;	
        }
        ?>
                    </tbody>
                </table>
            </center>
        </div>
        <div id="footer">
            <center>
                <p>Copyright &copy; UNINDRA 2019</p>
            </center>
        </div>
    </body>

</html>