<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_lap_jual extends CI_Model
{
    function gettahun()
    {
        $query = $this->db->query("SELECT YEAR(tj_tanggal) AS tahun from trpemesanan GROUP BY YEAR(tj_tanggal) ORDER BY YEAR(tj_tanggal) ASC");

        return $query->result();
    }

    function filterbytanggal($tanggalawal, $tanggalakhir)
    {
        $query = $this->db->query("SELECT * FROM  trpemesanan JOIN mspelanggan WHERE trpemesanan.id_pelanggan = mspelanggan.id_pelanggan AND 
        trpemesanan.tj_tanggal between '$tanggalawal' and '$tanggalakhir' ORDER BY trpemesanan.tj_tanggal ASC");

        return $query->result();
    }

    function filterbybulan($tahun1, $bulanawal, $bulanakhir)
    {
        $query = $this->db->query("SELECT * from  trpemesanan JOIN mspelanggan WHERE trpemesanan.id_pelanggan = trpemesanan.id_pelanggan AND 
        YEAR(trpemesanan.tj_tanggal) = '$tahun1' and MONTH(trpemesanan.tj_tanggal) between '$bulanawal' and '$bulanakhir' ORDER BY tj_tanggal ASC");

        return $query->result();
    }

    function filterbytahun($tahun2)
    {
        $query = $this->db->query("SELECT * from trpemesanan JOIN mspelanggan WHERE trpemesanan.id_pelanggan = trpemesanan.id_pelanggan and 
        YEAR(trpemesanan.tj_tanggal) = '$tahun2'  ORDER BY tj_tanggal ASC");

        return $query->result();
    }
}





