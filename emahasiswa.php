<!DOCTYPE html>
<?php
ob_start();
session_start();
error_reporting(0);
include "koneksi.php";
$id = $_GET['id'];
$query = "select * from mahasiswa where id='$id'";
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
            <form action="umahasiswa.php" method="POST" name="input">
               <center>
                  <p>Update Data Mahasiswa</p>
                  <table>
                     <input type="hidden" name="id" value="<?php echo $buff['id']; ?>">
                     <tr>
                        <td>NPM</td>
                        <td>:</td>
                        <td><input type="text" name="npm" placeholder="NPM" value="<?php echo $buff['npm']; ?>"
                              class="box">
                        </td>
                     </tr>
                     <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><input type="text" name="nama" placeholder="Nama" value="<?php echo $buff['nama']; ?>"
                              class="box"></td>
                     </tr>
                     <tr>
                        <td>Jurusan</td>
                        <td>:</td>
                        <td><input type="text" name="jurusan" placeholder="Jurusan"
                              value="<?php echo $buff['jurusan']; ?>" class="box"></td>
                     </tr>
                     <tr>
                        <td>Semester</td>
                        <td>:</td>
                        <td><input type="text" name="semester" placeholder="Semester"
                              value="<?php echo $buff['semester']; ?>" class="box"></td>
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