<?php
include 'Obat.php';
session_start();
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="style.css">

<div class="container">
    <h2>Jadwal Obat Hari Ini</h2>
    <a href="add_obat.php" class="button">
    <span class="material-icons">add_circle</span> Tambah Jadwal Obat
</a>
    <a href="index.php" class="button">Dashboard</a>

    <br><br>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Obat</th>
            <th>Dosis</th>
            <th>Jam</th>
            <th>Status</th>
            <th>Hari Selesai</th>
            <th>Aksi</th>
        </tr>

    <?php
    $today = date('Y-m-d');
    $no = 1;
    $any = false;
    $allDone = true;

    if (isset($_SESSION['obats']) && count($_SESSION['obats'])>0) {
        foreach ($_SESSION['obats'] as $id => $ob) {
            if ($ob->isActiveOn($today)) {
                $any = true;
                $status = $ob->getStatus($today);
                if ($status !== 'Sudah') $allDone = false;

        
                $cls = ($status == 'Sudah') ? 'status-Sudah' : 'status-Belum';

                

                echo "<tr>
                        <td>$no</td>
                        <td>{$ob->nama}</td>
                        <td>{$ob->dosis}</td>
                        <td>{$ob->jam}</td>
                        <td class='$cls'>{$status}</td>
                        <td>$endDate</td>
                        <td>
                            <a href='update_status.php?id=$id&action=mark' class='button small'>Sudah</a>
                            <a href='delete.php?id=$id' class='button small delete'>Hapus</a>
                        </td>
                      </tr>";
                $no++;
            }
        }
    }

    if (!$any) {
        echo "<tr><td colspan='6' style='text-align:center'>Tidak ada jadwal obat untuk hari ini.</td></tr>";
    }
    ?>
    </table>

    <br>

    <?php
    
    if ($any && $allDone) {
        echo "<p class='motivation success'>Hebat! Semua obat sudah diminum hari ini! 🎉💪</p>";
    } else {
        echo "<p class='motivation'>✨ Semoga Lekas Sembuh… Tetap disiplin minum obat ya 💖</p>";
    }
    ?>

</div>
