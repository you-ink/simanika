<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

    if ( ! function_exists('tgl_indo'))
    {
        function date_indo($tgl)
        {
            $ubah = gmdate($tgl, time()+60*60*8);
            $pecah = explode("-",$ubah);
            $tanggal = $pecah[2];
            $bulan = bulan($pecah[1]);
            $tahun = $pecah[0];
            return $tanggal.' '.$bulan.' '.$tahun;
        }
    }
      
    if ( ! function_exists('bulan'))
    {
        function bulan($bln)
        {
            switch ($bln)
            {
                case 1:
                    return "Januari";
                    break;
                case 2:
                    return "Februari";
                    break;
                case 3:
                    return "Maret";
                    break;
                case 4:
                    return "April";
                    break;
                case 5:
                    return "Mei";
                    break;
                case 6:
                    return "Juni";
                    break;
                case 7:
                    return "Juli";
                    break;
                case 8:
                    return "Agustus";
                    break;
                case 9:
                    return "September";
                    break;
                case 10:
                    return "Oktober";
                    break;
                case 11:
                    return "November";
                    break;
                case 12:
                    return "Desember";
                    break;
            }
        }
    }