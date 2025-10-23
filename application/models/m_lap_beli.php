<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_lap_beli extends CI_Model
{
    function gettahun()
    {
        $query = $this->db->query("SELECT YEAR(tb_tanggal) AS tahun from trpembelian GROUP BY YEAR(tb_tanggal) ORDER BY YEAR(tb_tanggal) ASC");

        return $query->result();
    }

    function filterbytanggal($tanggalawal, $tanggalakhir)
    {
        $query = $this->db->query("SELECT * FROM  trpembelian JOIN mssupplier WHERE trpembelian.id_supp = mssupplier.id_supp AND 
        trpembelian.tb_tanggal between '$tanggalawal' and '$tanggalakhir' ORDER BY trpembelian.tb_tanggal ASC");

        return $query->result();
    }

    function filterbybulan($tahun1, $bulanawal, $bulanakhir)
    {
        $query = $this->db->query("SELECT * from  trpembelian JOIN mssupplier WHERE trpembelian.id_supp = mssupplier.id_supp AND 
        YEAR(trpembelian.tb_tanggal) = '$tahun1' and MONTH(trpembelian.tb_tanggal) between '$bulanawal' and '$bulanakhir' ORDER BY tb_tanggal ASC");

        return $query->result();
    }

    function filterbytahun($tahun2)
    {
        $query = $this->db->query("SELECT * from trpembelian JOIN mssupplier WHERE trpembelian.id_supp = mssupplier.id_supp and 
        YEAR(trpembelian.tb_tanggal) = '$tahun2'  ORDER BY tb_tanggal ASC");

        return $query->result();
    }
}





