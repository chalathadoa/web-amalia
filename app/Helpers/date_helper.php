<?php
// defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('Rdate')) {
    function Rdate($date)
    {
        $bulan = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $Rformat = explode('-', $date);

        return $Rformat[2] . ' ' . $bulan[(int)$Rformat[1]] . ' ' . $Rformat[0];
    }
}
