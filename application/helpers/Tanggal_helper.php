<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function bulan($bulan)
{
    Switch ($bulan){
        case 1 : $bulan="Januari"; break;
        case 2 : $bulan="Februari"; break;
        case 3 : $bulan="Maret"; break;
        case 4 : $bulan="April"; break;
        case 5 : $bulan="Mei"; break;
        case 6 : $bulan="Juni"; break;
        case 7 : $bulan="Juli"; break;
        case 8 : $bulan="Agustus"; break;
        case 9 : $bulan="September"; break;
        case 10 : $bulan="Oktober"; break;
        case 11 : $bulan="November"; break;
        case 12 : $bulan="Desember"; break;
    }
    return $bulan;
}

function tgl_indo ($tgl) {
    $tanggal = substr($tgl,8,2);
    $bulan = bulan(substr($tgl,5,2));
    $tahun = substr($tgl,0,4);
    return $tanggal.' '.$bulan.' '.$tahun;
}

function waktu_indo ($tgl) {
    $tanggal = substr($tgl,8,2);
    $bulan = bulan(substr($tgl,5,2));
    $tahun = substr($tgl,0,4);
    return $tanggal.' '.$bulan.' '.$tahun.' '.substr($tgl, 10);
}

function dd($var)
{
    var_dump($var);
    die;
}

function rp($duit)
{
    return number_format($duit, 0, ',', '.');
}

function edit_val($var, $field)
{
    return set_value($var) ? set_value($var) : $field;
}