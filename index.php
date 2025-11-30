<?php
include 'Obat.php';
session_start();
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="style.css">

<div class="container">
    <h2><span class="material-icons" style="font-size:32px;vertical-align:-6px;">healing</span> Aplikasi Pemantau Jadwal Minum Obat Harian</h2>
    <p class="lead">Bantu ingat jadwal minum obat harian supaya tidak lupa.</p>

    <div class="controls">
        <a href="add_obat.php" class="button">
    <span class="material-icons">add_circle</span> Tambah Jadwal Obat
</a>
       <a href="list_obat.php" class="button">
    <span class="material-icons">list</span> Lihat Jadwal Harian
</a>
    </div>

    <hr>

    <?php
    $today = date('Y-m-d');
    $total = 0;
    $belum = 0;

    if (isset($_SESSION['obats']) && count($_SESSION['obats'])>0) {
        foreach ($_SESSION['obats'] as $ob) {
            if ($ob->isActiveOn($today)) {
                $total++;
                if ($ob->getStatus($today) !== 'Sudah') $belum++;
            }
        }
    }

    echo "<p><strong>Obat yang jadwalnya hari ini:</strong> $total</p>";
    echo "<p><strong>Belum diminum:</strong> $belum</p>";
    ?>
</div>
