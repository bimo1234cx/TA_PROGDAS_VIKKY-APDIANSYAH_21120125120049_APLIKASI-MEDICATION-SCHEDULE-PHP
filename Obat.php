<?php
class Obat {
    public $nama;
    public $dosis;
    public $jam;         // format "HH:MM"
    public $start_date;  // format "YYYY-MM-DD"
    public $days;        // durasi (int)
    public $status;      // associative array: ['2025-11-30' => 'Sudah']

    public function __construct($nama, $dosis, $jam, $start_date, $days) {
        $this->nama = $nama;
        $this->dosis = $dosis;
        $this->jam = $jam;
        $this->start_date = $start_date;
        $this->days = (int)$days;
        $this->status = []; // inisialisasi
    }

    // apakah obat aktif pada tanggal $date (YYYY-MM-DD)?
    public function isActiveOn($date) {
        $start = strtotime($this->start_date);
        $end = strtotime("+".($this->days - 1)." days", $start);
        $d = strtotime($date);
        return ($d >= $start && $d <= $end);
    }

    // dapatkan status untuk tanggal tertentu
    public function getStatus($date) {
        return isset($this->status[$date]) ? $this->status[$date] : 'Belum';
    }

    // set status untuk tanggal tertentu
    public function setStatus($date, $val) {
        $this->status[$date] = $val;
    }
}
