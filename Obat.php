<?php
class Obat {
    public $nama;
    public $dosis;
    public $jam;         
    public $start_date; 
    public $days;        
    public $status;    
    public function __construct($nama, $dosis, $jam, $start_date, $days) {
        $this->nama = $nama;
        $this->dosis = $dosis;
        $this->jam = $jam;
        $this->start_date = $start_date;
        $this->days = (int)$days;
        $this->status = []; 
    }

   
    public function isActiveOn($date) {
        $start = strtotime($this->start_date);
        $end = strtotime("+".($this->days - 1)." days", $start);
        $d = strtotime($date);
        return ($d >= $start && $d <= $end);
    }


    public function getStatus($date) {
        return isset($this->status[$date]) ? $this->status[$date] : 'Belum';
    }


    public function setStatus($date, $val) {
        $this->status[$date] = $val;
    }
}
