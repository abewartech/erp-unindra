<?php
ob_start();
session_start();
error_reporting(0);
require 'koneksi.php';

$id = $_GET['id'];
$query = mysql_query("
    SELECT j.*, m.nama as nama_matkul, d.nama as nama_dosen 
    FROM jadwal j 
    JOIN matakuliah m ON j.id_matkul = m.id 
    JOIN dosen d ON j.id_dosen = d.id 
    WHERE j.id = '$id'
");
$data = mysql_fetch_array($query);

if(!$data) {
    echo "<script>
        alert('Data jadwal tidak ditemukan!');
        window.location.href='jadwal.php';
    </script>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <?php require 'head.php'; ?>
</head>
<body class="bg">
<div class="wrapper">
    <?php
    if (empty($_SESSION[Username])) {
        require 'sidebar.php';
    } else {
        require 'menubar.php';
    }
    ?>
    <div class="main">
        <div class="container" style="color:white;">
            <div class="col-md-12 col-sm-12">
                <div class="panel">
                    <div class="panel-body">
                        <h4><b>Edit Jadwal Kuliah</b></h4>
                        <br />
                        
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form method="POST" action="ujadwal.php">
                                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                    
                                    <div class="form-group">
                                        <label>Mata Kuliah:</label>
                                        <select name="id_matkul" class="form-control" required>
                                            <option value="">-- Pilih Mata Kuliah --</option>
                                            <?php
                                            $query_matkul = mysql_query("SELECT * FROM matakuliah ORDER BY nama");
                                            while($matkul = mysql_fetch_array($query_matkul)){
                                                $selected = ($matkul['id'] == $data['id_matkul']) ? 'selected' : '';
                                                echo "<option value='".$matkul['id']."' $selected>".$matkul['kode_matkul']." - ".$matkul['nama']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Dosen:</label>
                                        <select name="id_dosen" class="form-control" required>
                                            <option value="">-- Pilih Dosen --</option>
                                            <?php
                                            $query_dosen = mysql_query("SELECT * FROM dosen ORDER BY nama");
                                            while($dosen = mysql_fetch_array($query_dosen)){
                                                $selected = ($dosen['id'] == $data['id_dosen']) ? 'selected' : '';
                                                echo "<option value='".$dosen['id']."' $selected>".$dosen['nama']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Hari:</label>
                                        <select name="hari" class="form-control" required>
                                            <option value="">-- Pilih Hari --</option>
                                            <?php
                                            $hari_options = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                            foreach($hari_options as $hari_opt) {
                                                $selected = ($hari_opt == $data['hari']) ? 'selected' : '';
                                                echo "<option value='$hari_opt' $selected>$hari_opt</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Jam Mulai:</label>
                                        <input type="time" name="jam_mulai" class="form-control" value="<?php echo $data['jam_mulai']; ?>" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Jam Selesai:</label>
                                        <input type="time" name="jam_selesai" class="form-control" value="<?php echo $data['jam_selesai']; ?>" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Ruangan:</label>
                                        <input type="text" name="ruangan" class="form-control" value="<?php echo $data['ruangan']; ?>" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Semester:</label>
                                        <select name="semester" class="form-control" required>
                                            <option value="">-- Pilih Semester --</option>
                                            <?php
                                            for($i = 1; $i <= 8; $i++) {
                                                $selected = ($i == $data['semester']) ? 'selected' : '';
                                                echo "<option value='$i' $selected>$i</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Tahun Akademik:</label>
                                        <input type="text" name="tahun_akademik" class="form-control" value="<?php echo $data['tahun_akademik']; ?>" required>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="jadwal.php" class="btn btn-default">Batal</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
