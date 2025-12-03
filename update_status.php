<?php
include 'Obat.php';
session_start();

if (!isset($_SESSION['obats'])) $_SESSION['obats'] = [];

if (isset($_GET['id']) && isset($_GET['action'])) {
    $id = intval($_GET['id']);
    $action = $_GET['action'];
    $today = date('Y-m-d');

    if (isset($_SESSION['obats'][$id])) {
        $ob = &$_SESSION['obats'][$id];
        if ($action === 'mark') {
            $ob->setStatus($today, 'Sudah');
        }
    }
}

header("Location: list_obat.php");
exit();
