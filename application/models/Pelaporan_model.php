<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelaporan_model extends CI_Model
{
    public $laporan               = "tb_pelaporan";
    public $laporanbhp               = "tb_detail_bhp";
    public $tableLokasi               = "tb_lokasi";
    public $tableProdi               = "tb_prodi";
    public $tableaset               = "tb_aset";


    public function getDataPelaporan()
    {
        $id_prodi = $this->session->userdata('id_prodi');

        $query = "SELECT * FROM tb_pelaporan a, tb_aset b, tb_personel_ftk d, tb_lokasi e, tb_prodi f
                    WHERE a.id_user = d.no_induk AND a.kode_aset = b.kode_aset AND b.id_lokasi=e.id_lokasi AND b.id_prodi=f.id_prodi AND b.id_prodi='$id_prodi'
                ";

        return $this->db->query($query)->result_array();
    }
    public function getDataPelaporanAdmin()
    {


        $query = "SELECT * FROM tb_pelaporan a, tb_aset b, tb_personel_ftk d, tb_lokasi e, tb_prodi f
                    WHERE a.id_user = d.no_induk AND a.kode_aset = b.kode_aset AND b.id_lokasi=e.id_lokasi AND b.id_prodi=f.id_prodi 
                ";

        return $this->db->query($query)->result_array();
    }

    public function getByLokasi()
    {
        return $this->db->get($this->tableLokasi)->result();
    }
    public function getByProdi()
    {
        return $this->db->get($this->tableProdi)->result();
    }
    public function getByIdaset()
    {
        return $this->db->get($this->tableaset)->result();
    }


    public function getByIdDataPelaporan($id)
    {
        return $this->db->get_where($this->laporan, ["id_laporan" => $id])->row();
    }
    public function getByIdPelaporanBhp($id)
    {
        return $this->db->get_where($this->laporanbhp, ["id_detail_bhp" => $id])->row();
    }

    public function newUpdate($where, $data, $table)
    {

        $this->db->where($where);
        $this->db->update($table, $data);
    }


    function prodi()
    {

        $this->db->order_by('id_prodi', 'ASC');
        return $this->db->from('tb_prodi')
            ->get()
            ->result();
        // $id_prodi = $this->session->userdata('id_prodi');
        // $hasil = $this->db->query("SELECT * FROM tb_prodi WHERE id_prodi='$id_prodi'");
        // return $hasil->result();
    }

    function lokasibrs()
    {
        $id_prodi = $this->session->userdata('id_prodi');

        $hasil = $this->db->query("SELECT * FROM tb_lokasi WHERE id_prodi = '$id_prodi' ORDER BY id_lokasi");
        return $hasil->result();
    }




    function lokasi()
    {
        $id_prod1 = $this->session->userdata('id_prodi');

        $hasil = $this->db->query("SELECT * FROM tb_lokasi WHERE id_prodi = '$id_prod1' ORDER BY id_lokasi");
        return $hasil->result();
    }

    function aset($id_lokasi)
    {


        $hasil = $this->db->query("SELECT * FROM tb_aset WHERE id_lokasi='$id_lokasi'");
        return $hasil->result();
    }

    function asets($id_lokasi)
    {
        $hasil = $this->db->query("SELECT * FROM tb_aset WHERE id_lokasi='$id_lokasi' ORDER BY kode_aset");
        return $hasil->result();
    }

    public function getByIdPelaporan($id)
    {
        return $this->db->get_where($this->laporan, ["id_laporan" => $id])->row();
    }


    //====================================KOORPRODI =================================================================//

    function lokasiKoorprodi()
    {

        $id_prod1 = $this->session->userdata('id_prodi');

        $hasil = $this->db->query("SELECT * FROM tb_lokasi WHERE id_prodi = '$id_prod1' ORDER BY id_lokasi");
        return $hasil->result();

        // $this->db->order_by('id_lokasi', 'ASC');
        // return $this->db->from('tb_lokasi')
        //     ->get()
        //     ->result();
    }

    function asetKoorprodi($id_lokasi)
    {

        $hasil = $this->db->query("SELECT * FROM tb_aset WHERE id_lokasi='$id_lokasi' ORDER BY kode_aset");
        return $hasil->result();
        // $this->db->where('id_lokasi', $id_lokasi);
        // $this->db->order_by('kode_aset', 'ASC');
        // return $this->db->from('tb_aset')
        //     ->get()
        //     ->result();
    }
}
