# ERP UNINDRA

ERP UNINDRA adalah Solusi end-to-end terintegrasi yang mencakup semua aspek akademik universitas.

## Fitur Utama

### Master Data
- **Data Mahasiswa** - Pengelolaan data mahasiswa
- **Data Dosen** - Pengelolaan data dosen/pengajar
- **Data Mata Kuliah** - Pengelolaan mata kuliah dan kurikulum
- **Data Program Studi** - Pengelolaan program studi dan fakultas
- **Data Jadwal Kuliah** - ⭐ *NEW* Pengelolaan jadwal perkuliahan

### Input Data
- **Data KHS** - Kartu Hasil Studi mahasiswa
- **Data KRS** - Kartu Rencana Studi (coming soon)

## Fitur Terbaru: Manajemen Jadwal Kuliah

### Fitur Jadwal Kuliah:
- ✅ Tambah jadwal baru dengan validasi bentrok
- ✅ Edit jadwal yang sudah ada
- ✅ Hapus jadwal
- ✅ Tampilan tabel dengan DataTables
- ✅ Deteksi konflik jadwal ruangan
- ✅ Deteksi konflik jadwal dosen
- ✅ Integrasi dengan data mata kuliah dan dosen

### Database Schema:
```sql
CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_matkul` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `ruangan` varchar(50) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `tahun_akademik` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
);
```

## Instalasi

1. Import file `erpunindra.sql` ke database MySQL
2. Konfigurasi koneksi database di `koneksi.php`
3. Akses sistem melalui web browser

## Login Default

- **Admin**: Username: `admin@admin.com`, Password: `admin`
- **Student**: Username: `201643501391`, Password: `unindra`

---

**Update Terbaru**: Menambahkan fitur manajemen jadwal kuliah dengan deteksi konflik otomatis (2024)
