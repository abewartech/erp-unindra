<?php
ob_start();
session_start();
error_reporting(0);
require 'koneksi.php';
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
                        <h4><b>Data Jadwal Kuliah</b></h4>
                        <br />
                        <p>
                            <a class="btn btn-primary" href="#" id="tambah">
                                <i class="fa fa-plus"></i> Tambah Jadwal
                            </a>
                        </p>
                        <br />
                        
                        <!-- Form untuk menambah/edit jadwal (hidden by default) -->
                        <div id="form-jadwal" style="display:none;">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>Form Jadwal Kuliah</h4>
                                </div>
                                <div class="panel-body">
                                    <form id="jadwal-form" method="POST" action="ijadwal.php">
                                        <input type="hidden" name="action" value="add">
                                        <input type="hidden" name="id" value="">
                                        
                                        <div class="form-group">
                                            <label>Mata Kuliah:</label>
                                            <select name="id_matkul" class="form-control" required>
                                                <option value="">-- Pilih Mata Kuliah --</option>
                                                <?php
                                                $query_matkul = mysql_query("SELECT * FROM matakuliah ORDER BY nama");
                                                while($data_matkul = mysql_fetch_array($query_matkul)){
                                                    echo "<option value='".$data_matkul['id']."'>".$data_matkul['kode_matkul']." - ".$data_matkul['nama']."</option>";
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
                                                while($data_dosen = mysql_fetch_array($query_dosen)){
                                                    echo "<option value='".$data_dosen['id']."'>".$data_dosen['nama']."</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Hari:</label>
                                            <select name="hari" class="form-control" required>
                                                <option value="">-- Pilih Hari --</option>
                                                <option value="Senin">Senin</option>
                                                <option value="Selasa">Selasa</option>
                                                <option value="Rabu">Rabu</option>
                                                <option value="Kamis">Kamis</option>
                                                <option value="Jumat">Jumat</option>
                                                <option value="Sabtu">Sabtu</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Jam Mulai:</label>
                                            <input type="time" name="jam_mulai" class="form-control" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Jam Selesai:</label>
                                            <input type="time" name="jam_selesai" class="form-control" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Ruangan:</label>
                                            <input type="text" name="ruangan" class="form-control" placeholder="Ex: Lab Komputer 1" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Semester:</label>
                                            <select name="semester" class="form-control" required>
                                                <option value="">-- Pilih Semester --</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Tahun Akademik:</label>
                                            <input type="text" name="tahun_akademik" class="form-control" placeholder="Ex: 2024/2025" required>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                        <button type="button" class="btn btn-default" id="batal">Batal</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Tabel Jadwal -->
                        <table id="jadwal-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Mata Kuliah</th>
                                    <th>Dosen</th>
                                    <th>Hari</th>
                                    <th>Waktu</th>
                                    <th>Ruangan</th>
                                    <th>Semester</th>
                                    <th>Tahun Akademik</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $query = mysql_query("
                                    SELECT j.*, m.kode_matkul, m.nama as nama_matkul, d.nama as nama_dosen 
                                    FROM jadwal j 
                                    JOIN matakuliah m ON j.id_matkul = m.id 
                                    JOIN dosen d ON j.id_dosen = d.id 
                                    ORDER BY j.hari, j.jam_mulai
                                ");
                                while($data = mysql_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['kode_matkul']." - ".$data['nama_matkul']; ?></td>
                                    <td><?php echo $data['nama_dosen']; ?></td>
                                    <td><?php echo $data['hari']; ?></td>
                                    <td><?php echo $data['jam_mulai']." - ".$data['jam_selesai']; ?></td>
                                    <td><?php echo $data['ruangan']; ?></td>
                                    <td><?php echo $data['semester']; ?></td>
                                    <td><?php echo $data['tahun_akademik']; ?></td>
                                    <td>
                                        <a href="ejadwal.php?id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a href="djadwal.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm" 
                                           onclick="return confirm('Yakin ingin menghapus jadwal ini?')">
                                            <i class="fa fa-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#jadwal-table').DataTable();
    
    $('#tambah').click(function(e) {
        e.preventDefault();
        $('#form-jadwal').show();
        $('html, body').animate({
            scrollTop: $("#form-jadwal").offset().top
        }, 500);
    });
    
    $('#batal').click(function() {
        $('#form-jadwal').hide();
        $('#jadwal-form')[0].reset();
        $('input[name="action"]').val('add');
        $('input[name="id"]').val('');
    });
});
</script>

</body>
</html>
