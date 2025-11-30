<?php
include 'Obat.php';
session_start();

if (!isset($_SESSION['obats'])) $_SESSION['obats'] = [];

if (isset($_POST['submit'])) {
    $nama = trim($_POST['nama']);
    $dosis = trim($_POST['dosis']);
    $jam = $_POST['jam'];
    $start = $_POST['start_date'];
    $days = intval($_POST['days']);

    $ob = new Obat($nama, $dosis, $jam, $start, $days);
    $_SESSION['obats'][] = $ob;

    header("Location: list_obat.php");
    exit();
}
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="style.css">
<div class="container form-card">
    <h2>
        <span class="material-icons" style="vertical-align:-6px;">medical_services</span>
        Tambah Jadwal Obat
    </h2>

    <form method="POST" class="input-form">

        <label><span class="material-icons icon">medication</span> Nama Obat</label>
        <input type="text" name="nama" required>

        <label><span class="material-icons icon">science</span> Dosis</label>
        <input type="text" name="dosis" required>

        <label><span class="material-icons icon">alarm</span> Jam Minum</label>
        <input type="time" name="jam" required>

        <label><span class="material-icons icon">event</span> Tanggal Mulai</label>
        <input type="date" name="start_date" value="<?php echo date('Y-m-d'); ?>" required>

        <label><span class="material-icons icon">calendar_today</span> Durasi (Hari)</label>
        <input type="number" name="days" value="1" min="1" required>

        <button type="submit" name="submit" class="button submit-btn">
            <span class="material-icons">check_circle</span>
            Simpan Jadwal
        </button>

    </form>

    <a href="index.php" class="button back-btn">
        <span class="material-icons">arrow_back</span> Kembali
    </a>
</div>
