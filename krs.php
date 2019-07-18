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
    <script type="text/javascript" src="style/jquery/datatables/media/js/jquery.js"></script>
    <script type="text/javascript" src="style/jquery/datatables/media/js/jquery.dataTables.min.js"></script>
    <link href="style/jquery/datatables/media/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        $(document).ready(function () {
            $('#belajar').dataTable({
                oLanguage: {
                    sLengthMenu: "Show <select>" + "<option value='5'>5</option>" + "</select> entries"
                },
                "iDisplayLength": 5
            });
        });
    </script>
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
            <div class="button-add" style="margin-bottom: 18px;">
                <a href="imahasiswa.php" class="submit">Tambah Mahasiswa</a>
            </div>
            <div id="dataTables">
                <table border="1" align="center" id="belajar" width="1015px">
                    <caption>Data Mahasiswa</caption>
                    <thead>
                        <tr>
                            <th>NPM</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>Semester</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require('koneksi.php');
    $query = mysqli_query($conn, "select * from mahasiswa");
 
    $no = 0;
    while ($r = mysqli_fetch_array($query)){	
    echo"<tr>
            <td>$r[npm]</td>
            <td>$r[nama]</td>
			<td>$r[jurusan]</td>
            <td>$r[semester]</td>
            <td><a href='dmahasiswa.php?id=".$r['id']."' class='delete'>Hapus |<a/>
                <a href='emahasiswa.php?id=".$r['id']."' class='delete'>Edit<a/>
                </td>
        </tr>";
		$no++;	
	}
    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="footer">
            <center>
                <p>Copyright &copy; UNINDRA 2019</p>
            </center>
        </div>
    </body>

</html>