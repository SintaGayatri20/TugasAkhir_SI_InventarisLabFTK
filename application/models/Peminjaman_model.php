<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman_model extends CI_Model
{
    public $prodi               = "tb_prodi";
    public $tableDataAset       = "tb_aset";
    public $tableDataLokasi     = "tb_lokasi";
    public $user                = "user";
    public $role                = "user_role";
    public $tablePeminjaman     = "tb_peminjaman";

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function newUpdate($where, $data, $table)
    {

        $this->db->where($where);
        $this->db->update($table, $data);
    }
    ////////////// DATA PEMINJAMAN /////////////
    public function getDataPeminjaman()
    {
        $query = "SELECT tb_peminjaman.*, 
        user.id, user.name, tb_aset.nama_barang, tb_aset.spesifikasi, tb_aset.jumlah, tb_aset.satuan, tb_aset.foto
        FROM tb_peminjaman 
        JOIN user ON tb_peminjaman.id_user = user.id
        JOIN tb_aset ON tb_peminjaman.kode_aset = tb_aset.kode_aset
        ";

        return $this->db->query($query)->result();
    }
    public function getDataDikembalikan()
    {
        $query = "SELECT tb_pengembalian.*, 
        user.id, user.name, tb_aset.nama_barang, tb_aset.spesifikasi, tb_aset.jumlah, tb_aset.satuan, tb_aset.foto
        FROM tb_pengembalian 
        JOIN user ON tb_pengembalian.id_user = user.id
        JOIN tb_aset ON tb_pengembalian.kode_aset = tb_aset.kode_aset
        WHERE user.id = 6
        ";

        return $this->db->query($query)->result();
    }

    public function insert_approve($data, $table, $id_peminjam)
    {
        $this->db->insert($table, $data);
        $hasil = $this->db->query("UPDATE tb_peminjaman_aset SET status=1 WHERE id_peminjaman=$id_peminjam");
    }

    public function approveKaprodi($id_peminjam)
    {
        $hasil = $this->db->query("UPDATE tb_approval_koorprodi SET approval_status=1 WHERE id_approval=$id_peminjam");
        //return $hasil->result();
    }

    public function revLaboran($id_peminjam, $alasan_revisi)
    {
        $hasil = $this->db->query("UPDATE tb_peminjaman_aset SET keterangan_laboran='$alasan_revisi',status=3 WHERE id_peminjaman=$id_peminjam");
    }


    public function revKaprodi($id_peminjam, $alasan_revisi)
    {
        $hasil = $this->db->query("UPDATE tb_approval_koorprodi SET keterangan_koorprodi='$alasan_revisi',revisi=1 WHERE id_approval=$id_peminjam");
    }

    public function kmbLaboran($id_peminjam, $catatan)
    {
        $hasil = $this->db->query("UPDATE tb_peminjaman_aset SET catatan_kembali='$catatan',kembali_status=1 WHERE id_peminjaman=$id_peminjam");
    }

    public function approveKaprodiKembali($id_approve, $id_peminjam, $jumlah_pinjam, $kode_aset, $jumlah_aset, $status_kembali)
    {
        $this->db->query("UPDATE tb_approval_koorprodi SET kembali_status=2 WHERE id_approval=$id_approve");
        $this->db->query("UPDATE tb_peminjaman_aset SET kembali_status=2 WHERE id_peminjaman=$id_peminjam");

        $sk = $status_kembali;
        if ($sk == 1) {
            $this->db->query("UPDATE tb_aset SET jumlah=$jumlah_aset+$jumlah_pinjam WHERE kode_aset=$kode_aset");
        } else {
        }
        //$this->db->query("UPDATE tb_approval_koorprodi SET kembali_status=2 WHERE kode_aset=$kode_aset");

        //return $hasil->result();
    }

    public function approveAsetKembali($id_peminjam, $jumlah_pinjam, $kode_aset, $jumlah_aset)
    {

        //$this->db->query("UPDATE tb_peminjaman_aset SET kembali_status=2 WHERE id_peminjaman=$id_peminjam");
        //$this->db->query("UPDATE tb_aset SET jumlah=$jumlah_aset+$jumlah_pinjam WHERE kode_aset=$kode_aset");

        //return $hasil->result();
    }
}
