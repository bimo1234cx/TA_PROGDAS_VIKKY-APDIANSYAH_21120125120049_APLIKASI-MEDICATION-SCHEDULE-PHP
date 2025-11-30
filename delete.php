<?php
include 'Obat.php';
session_start();

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    if (isset($_SESSION['obats'][$id])) {
        unset($_SESSION['obats'][$id]);
        // rapikan indeks
        $_SESSION['obats'] = array_values($_SESSION['obats']);
    }
}

header("Location: list_obat.php");
exit();
