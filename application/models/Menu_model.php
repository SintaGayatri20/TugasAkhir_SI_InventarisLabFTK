<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public $prodi               = "tb_prodi";
    public $tableDataAset       = "tb_aset";
    public $tableDataLokasi     = "tb_lokasi";
    public $user                = "user";
    public $role                = "user_role";
    public $tablePeminjaman     = "tb_peminjaman";
    public $detailUser          = "tb_personel_ftk";
    public $tb_bebas_lab        = "tb_bebas_lab";
    public $tableBhp            = "tb_master_bhp";
    public $tableBhpDetail      = "tb_detail_bhp";
    public $tableBaruPinjam     = "tb_peminjaman_aset";

    public function getDaftarBaruPinjam($id)
    {
        $query = $this->db->query("SELECT * FROM tb_peminjaman_aset WHERE id_peminjaman ='$id'");

        $query->row_array();
    }

    public function getByIdDataAset($id)
    {
        return $this->db->get_where($this->tableDataAset, ["kode_aset" => $id])->row();
    }


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

    public function newInsert($where, $data, $table)
    {

        $this->db->where($where);
        $this->db->insert($table, $data);
    }

    public function inputData($data)
    {
        $this->db->insert('tb_peminjaman', $data);
    }

    public function inputDataPeminjamanBrg($data)
    {
        $this->db->insert('tb_bebas_lab', $data);
    }
    public function inputdataBebasLab($data)
    {
        $this->db->insert('tb_berita_acara', $data);
    }

    public function inputDataPengembalian($data)
    {
        $this->db->insert('tb_pengembalian', $data);
    }


    ///////////////////////////////// DATA ASET ////////////////////////////////////////////

    public function getDataAset($id_prodi)
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi WHERE tb_aset.id_prodi ='$id_prodi'
                ";

        return $this->db->query($query)->result_array();
    }
    public function getDataAsetexcel()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi 
                ";

        return $this->db->query($query)->result_array();
    }
    public function getDataAsetexcelProdi()
    {
        $id_prodi = $this->session->userdata('id_prodi');
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi 
                    WHERE tb_aset.id_prodi = '$id_prodi'
                ";

        return $this->db->query($query)->result_array();
    }
    public function getDataAsetMaster()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                ";

        return $this->db->query($query)->result_array();
    }


    public function getDataAsetExport()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                ";

        return $this->db->query($query)->result();
    }


    public function getDataAsetMI()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_prodi = '1'
                ";

        return $this->db->query($query)->result_array();
    }

    public function getDataAsetMi2()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_prodi = '1'
                ";

        return $this->db->query($query)->result();
    }


    public function getDataAsetILKOM()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_prodi = '2'
                ";

        return $this->db->query($query)->result_array();
    }

    public function getDataAsetlilkom()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_prodi = '2'
                ";

        return $this->db->query($query)->result();
    }


    public function getDataAsetPTI()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_prodi = '3'
                ";

        return $this->db->query($query)->result_array();
    }

    public function getDataAsetPTI2()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_prodi = '3'
                ";

        return $this->db->query($query)->result();
    }


    public function getDataAsetSI()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_prodi = '4'
                ";

        return $this->db->query($query)->result_array();
    }

    public function getDataAsetSI2()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_prodi = '4'
                ";

        return $this->db->query($query)->result();
    }


    public function getDataAsetPTM()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_prodi = '5'
                ";

        return $this->db->query($query)->result_array();
    }
    public function getDataAsetPTM2()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_prodi = '5'
                ";

        return $this->db->query($query)->result();
    }


    public function getDataAsetPKK()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_prodi = '6'
                ";

        return $this->db->query($query)->result_array();
    }
    public function getDataAsetPKK2()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_prodi = '6'
                ";

        return $this->db->query($query)->result();
    }


    public function getDataAsetTE()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_prodi = '7'
                ";

        return $this->db->query($query)->result_array();
    }
    public function getDataAsetTE2()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_prodi = '7'
                ";

        return $this->db->query($query)->result();
    }


    public function getDataAsetPTE()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_prodi = '8'
                ";

        return $this->db->query($query)->result_array();
    }
    public function getDataAsetPTE2()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_prodi = '8'
                ";

        return $this->db->query($query)->result();
    }


    public function getDataAsetPVSK()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_prodi = '9'
                ";

        return $this->db->query($query)->result_array();
    }
    public function getDataAsetPVSK2()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_prodi = '9'
                ";

        return $this->db->query($query)->result();
    }





    public function getByLokasi()
    {
        $id_prodi = $this->session->userdata('id_prodi');
        return $this->db->get_where($this->tableDataLokasi, ["id_prodi" => $id_prodi])->result();
    }
    public function getByLokasiRusakLaboran()
    {
        $id_prodi = $this->session->userdata('id_prodi');
        return $this->db->get_where($this->tableDataLokasi, ["id_prodi" => $id_prodi])->result();
    }
    public function getByProdiRusakLaboran()
    {
        $id_prodi = $this->session->userdata('id_prodi');
        return $this->db->get_where($this->prodi, ["id_prodi" => $id_prodi])->result();
    }
    public function getByProdi()
    {
        return $this->db->get($this->prodi)->result();
    }
    public function getByIdMasterbhp()
    {
        return $this->db->get($this->tableBhp)->result();
    }
    public function getByUser()
    {
        return $this->db->get($this->user)->result();
    }


    ///////////////////////////////// DATA PRODI ////////////////////////////////////////////

    public function getByIdDataProdi($id)
    {
        return $this->db->get_where($this->prodi, ["id_prodi" => $id])->row();
    }

    ///////////////////////////////// END DATA PRODI ////////////////////////////////////////////

    ///////////////////////////////// DATA LOKASI ////////////////////////////////////////////
    public function getDataLokasi()
    {
        $id_prodi = $this->session->userdata('id_prodi');
        $query = "SELECT tb_lokasi.*, tb_prodi.nama_prodi
                    FROM tb_lokasi JOIN  tb_prodi
                    ON tb_lokasi.id_prodi = tb_prodi.id_prodi
                ";

        return $this->db->query($query)->result_array();
    }
    public function getByIdDataLokasi($id)
    {
        return $this->db->get_where($this->tableDataLokasi, ["id_lokasi" => $id])->row();
    }
    ///////////////////////////////// END DATA LOKASI ////////////////////////////////////////////

    ///////////////////////////////// DATA USER /////////////////////////////////////////////////

    public function getDataUser()
    {
        $query = "SELECT * FROM user, tb_personel_ftk, user_role, tb_prodi
								WHERE user.username=tb_personel_ftk.no_induk 
								AND user_role.id=user.role_id 
                                AND tb_personel_ftk.no_induk=user.username 
                                AND tb_personel_ftk.id_prodi = tb_prodi.id_prodi
                 ";

        return $this->db->query($query)->result_array();
    }

    public function getDataUserLogin()
    {
        $query = "SELECT user.*, user_role.role
                    FROM user JOIN  user_role
                    ON user.role_id = user_role.id";

        return $this->db->query($query)->result_array();
    }

    public function getDataUserMahasiswa()
    {
        $query = "SELECT * FROM user, tb_personel_ftk, user_role
								WHERE user.username=tb_personel_ftk.no_induk 
								AND user_role.id=user.role_id AND tb_personel_ftk.no_induk=user.username AND user.role_id=5
                 ";

        return $this->db->query($query)->result_array();
    }

    public function getDataUserLaboran()
    {
        $query = "SELECT * FROM user, tb_personel_ftk, user_role
								WHERE user.username=tb_personel_ftk.no_induk 
								AND user_role.id=user.role_id AND tb_personel_ftk.no_induk=user.username AND user.role_id=4
                 ";

        return $this->db->query($query)->result_array();
    }

    public function getDataUserKalab()
    {
        $query = "SELECT * FROM user, tb_personel_ftk, user_role
								WHERE user.username=tb_personel_ftk.no_induk 
								AND user_role.id=user.role_id AND tb_personel_ftk.no_induk=user.username AND user.role_id=6
                 ";

        return $this->db->query($query)->result_array();
    }

    public function getDataUserKaprodi()
    {
        $query = "SELECT * FROM user, tb_personel_ftk, user_role
								WHERE user.username=tb_personel_ftk.no_induk 
								AND user_role.id=user.role_id AND tb_personel_ftk.no_induk=user.username AND user.role_id=3
                 ";

        return $this->db->query($query)->result_array();
    }

    public function getByIdDataUser($id)
    {
        return $this->db->get_where($this->detailUser, ["no_induk" => $id])->row();
    }
    public function getByIdDataUserLogin($id)
    {
        return $this->db->get_where($this->user, ["id_user" => $id])->row();
    }

    public function getByUserRole()
    {
        return $this->db->get($this->role)->result();
    }

    ///////////////////////////////// END DATA USER /////////////////////////////////////////////////


    ///////////////////////////////// BARANG RUANGAN LAB SESUAI PRODI /////////////////////////////////////////////////
    public function getBarangRuanganMi()
    {
        $query = "SELECT * FROM `tb_lokasi` WHERE id_prodi = 1 
                 ";

        return $this->db->query($query)->result_array();
    }

    public function getBarangRuanganIlkom()
    {
        $query = "SELECT * FROM `tb_lokasi` WHERE id_prodi = 2 
                 ";

        return $this->db->query($query)->result_array();
    }
    public function getBarangRuanganPTI()
    {
        $query = "SELECT * FROM `tb_lokasi` WHERE id_prodi = 3
                 ";

        return $this->db->query($query)->result_array();
    }
    public function getBarangRuanganSI()
    {
        $query = "SELECT * FROM `tb_lokasi` WHERE id_prodi = 4
                 ";

        return $this->db->query($query)->result_array();
    }
    public function getBarangRuanganPTM()
    {
        $query = "SELECT * FROM `tb_lokasi` WHERE id_prodi = 5
                 ";

        return $this->db->query($query)->result_array();
    }
    public function getBarangRuanganPKK()
    {
        $query = "SELECT * FROM `tb_lokasi` WHERE id_prodi = 6
                 ";

        return $this->db->query($query)->result_array();
    }
    public function getBarangRuanganTE()
    {
        $query = "SELECT * FROM `tb_lokasi` WHERE id_prodi = 7 
                 ";

        return $this->db->query($query)->result_array();
    }
    public function getBarangRuanganPTE()
    {
        $query = "SELECT * FROM `tb_lokasi` WHERE id_prodi = 8 
                 ";

        return $this->db->query($query)->result_array();
    }
    public function getBarangRuanganPVSK()
    {
        $query = "SELECT * FROM `tb_lokasi` WHERE id_prodi = 9 
                 ";

        return $this->db->query($query)->result_array();
    }

    ///////////////////////////////// END BARANG RUANGAN LAB SESUAI PRODI /////////////////////////////////////////////////
    //=============================== BARANG HABIS PAKAI ====================================
    public function getDataBHP()
    {
        $id_prodi = $this->session->userdata('id_prodi');
        $query = "SELECT*FROM tb_master_bhp a, tb_detail_bhp b, tb_lokasi c, tb_prodi d 
                    WHERE a.id_master_bhp=b.id_master_bhp AND b.id_lokasi=c.id_lokasi AND b.id_prodi=d.id_prodi
                ";

        return $this->db->query($query)->result();
    }

    ///////////////////////////////// BARANG RUANGAN SESUAI RUANGAN LAB /////////////////////////////////////////////////

    public function getDataAsetLabPKK()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 1
                ";

        return $this->db->query($query)->result();
    }

    public function getDataAsetLabBogaPKK()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 2
                ";

        return $this->db->query($query)->result();
    }
    public function getDataAsetLabKecantikanaPKK()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 3
                ";

        return $this->db->query($query)->result();
    }
    public function getDataAsetLabInstalasiPTE()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 4
                ";

        return $this->db->query($query)->result();
    }
    public function getDataAsetLabPengukuranPTE()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 5
                ";

        return $this->db->query($query)->result();
    }
    public function getDataAsetLabElda()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 6
                ";

        return $this->db->query($query)->result();
    }
    public function getDataAsetLabRL()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 7
                ";

        return $this->db->query($query)->result();
    }
    public function getDataAsetLabPTI()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 8
                ";

        return $this->db->query($query)->result();
    }
    public function getDataAsetLabMIilkom()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 9
                ";

        return $this->db->query($query)->result();
    }
    public function getDataAsetLabManufakturPTM()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 10
                ";

        return $this->db->query($query)->result();
    }
    public function getDataAsetPendinginPTM()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 11
                ";

        return $this->db->query($query)->result();
    }
    public function getDataAsetLabOtomotifPTM()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 12
                ";

        return $this->db->query($query)->result();
    }

    public function getDataAsetLabElektonikaPTE()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 13
                ";

        return $this->db->query($query)->result();
    }
    public function getDataAsetLabMesinPTE()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 14
                ";

        return $this->db->query($query)->result();
    }
    public function getDataAsetLabWorkshopPTE()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 15
                ";

        return $this->db->query($query)->result();
    }
    public function getDataAsetLabPendinginPTE()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 16
                ";

        return $this->db->query($query)->result();
    }
    public function getDataAsetLabRobotika()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 17
                ";

        return $this->db->query($query)->result();
    }
    public function getDataAsetLabKomputer()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 18
                ";

        return $this->db->query($query)->result();
    }
    public function getDataAsetLabTenagaListrik()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 19
                ";

        return $this->db->query($query)->result();
    }
    public function getDataAsetLabBengkel()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 20
                ";

        return $this->db->query($query)->result();
    }
    public function getDataAsetLabLaboran()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 21
                ";

        return $this->db->query($query)->result();
    }
    public function getDataAsetLabTataCahaya()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 22
                ";

        return $this->db->query($query)->result();
    }
    public function getDataAsetLabMultimedia()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 23
                ";

        return $this->db->query($query)->result();
    }
    public function getDataAsetLabRuangProdiPTE()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 24
                ";

        return $this->db->query($query)->result();
    }
    public function getDataAsetLabWorkshop1()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 25
                ";

        return $this->db->query($query)->result();
    }
    public function getDataAsetLabWorkshop2()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 26
                ";

        return $this->db->query($query)->result();
    }
    public function getDataAsetLabLab1()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 27
                ";

        return $this->db->query($query)->result();
    }
    public function getDataAsetLabIlkom()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 28
                ";

        return $this->db->query($query)->result();
    }
    public function getDataAsetLabSI()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.id_lokasi = 29
                ";

        return $this->db->query($query)->result();
    }
    //============================== END BARANG RUANGAN SESUAI RUANGAN LAB ======================================

    //============================== DATA PEMINJAMAN ===========================================================
    public function getByIdDataKembali($id)
    {
        return $this->db->get_where($this->tablePeminjaman, ["id_peminjaman" => $id])->row();
    }
    public function getByIdDataBl($id)
    {
        return $this->db->get_where($this->tb_bebas_lab, ["id_bebas_lab" => $id])->row();
    }
    public function getByAsetPeminjaman()
    {
        return $this->db->get($this->tableDataAset)->result();
    }

    // ============================== END DATA PEMINJAMAN ===============================

    // ============================== BARANG RUSAK RUANGAN ==============================

    public function getBrgRusakRuangan()
    {
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.keterangan = 'Rusak Berat'
                ";

        return $this->db->query($query)->result();
    }
    public function getBrgRusakRuanganLaboran()
    {
        $id_prodi = $this->session->userdata('id_prodi');
        $query = "SELECT tb_aset.*, tb_lokasi.nama_lab, tb_prodi.nama_prodi
                    FROM tb_aset 
                    JOIN tb_lokasi ON tb_aset.id_lokasi = tb_lokasi.id_lokasi
                    JOIN tb_prodi ON tb_aset.id_prodi = tb_prodi.id_prodi
                   WHERE tb_aset.keterangan = 'Rusak Berat' AND tb_aset.id_prodi='$id_prodi'
                ";

        return $this->db->query($query)->result();
    }



    // ============================== END BARANG RUSAK RUANGAN ===========================

    function fetch_data($query)
    {
        $this->db->like('nama_barang', $query);
        $query = $this->db->get('tb_aset');

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $output[] = array(
                    'nama_barang'  => $row["nama_barang"]
                );
            }
            echo json_encode($output);
        }
    }

    function fetch_dataR($query)
    {
        $this->db->like('nama_lab', $query);
        $query = $this->db->get('tb_lokasi');

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $output[] = array(
                    'nama_lab'  => $row["nama_lab"]
                );
            }
            echo json_encode($output);
        }
    }

    public function getByIdBebasLab($id)
    {
        return $this->db->get_where($this->tb_bebas_lab, ["id_bebas_lab" => $id])->row();
    }


    public function getByIdDatabhp($id)
    {
        return $this->db->get_where($this->tableBhp, ["id_master_bhp" => $id])->row();
    }



    public function getByIdDetailBhp($id)
    {
        return $this->db->get_where($this->tableBhpDetail, ["id_detail_bhp" => $id])->row();
    }

    public function prodi()
    {
        # code...
        $this->db->order_by('jurusan', 'ASC');
        return $this->db->from('tb_prodi')
            ->get()
            ->result();
    }

    public function masterUserMahasiswa()
    {

        $query = "SELECT * FROM `user` WHERE role_id = 5";

        return $this->db->query($query)->result_array();
    }
    public function masterUserKoorprodi()
    {

        $query = "SELECT * FROM `user` WHERE role_id = 3";

        return $this->db->query($query)->result_array();
    }
    public function masterUserLaboran()
    {

        $query = "SELECT * FROM `user` WHERE role_id = 4";

        return $this->db->query($query)->result_array();
    }
    public function masterUserKoorlab()
    {

        $query = "SELECT * FROM `user` WHERE role_id = 6";

        return $this->db->query($query)->result_array();
    }

    public function getByUserLaboran()
    {
        $id = 4;
        return $this->db->get_where($this->user, ["role_id" => $id])->result();
    }
    public function getByUserMahasiswa()
    {
        $id = 5;
        return $this->db->get_where($this->user, ["role_id" => $id])->result();
    }
    public function getByUserKoorlab()
    {
        $id = 6;
        return $this->db->get_where($this->user, ["role_id" => $id])->result();
    }
    public function getByUserKoorprodi()
    {
        $id = 3;
        return $this->db->get_where($this->user, ["role_id" => $id])->result();
    }
    //===============================================================================\\

    // function getDaftarBaruPinjam($id)
    // {

    //     // $this->db->order_by('id_prodi', 'ASC');
    //     // return $this->db->from('tb_prodi')
    //     //     ->get()
    //     //     ->result();
    //     $hasil = $this->db->query("SELECT a.catatan_kembali, a.keterangan_laboran, b.keterangan_koorprodi 
    //                                 FROM tb_peminjaman_aset as a, tb_approval_koorprodi b 
    //                                 WHERE a.id_peminjaman = b.id_peminjaman AND a.id_peminjaman ='$id'
    //                               ");
    //     return $hasil->result();
    // }
    function prodii()
    {

        // $this->db->order_by('id_prodi', 'ASC');
        // return $this->db->from('tb_prodi')
        //     ->get()
        //     ->result();
        $id_prodi = $this->session->userdata('id_prodi');
        $hasil = $this->db->query("SELECT * FROM tb_prodi WHERE id_prodi='$id_prodi'");
        return $hasil->result();
    }


    function lokasi($id_prodi)
    {


        $hasil = $this->db->query("SELECT * FROM tb_lokasi WHERE id_prodi='$id_prodi' ORDER BY id_lokasi");
        return $hasil->result();
    }

    function aset($id_lokasi)
    {


        $hasil = $this->db->query("SELECT * FROM tb_aset WHERE id_lokasi='$id_lokasi' ORDER BY kode_aset");
        return $hasil->result();
    }


    function tampilProdiAset()
    {
        $this->db->order_by('id_prodi', 'ASC');
        return $this->db->from('tb_prodi')
            ->get()
            ->result();
    }

    function get_lokasi_aset($id_prodi)
    {
        $this->db->where('id_prodi', $id_prodi);
        $this->db->order_by('id_lokasi', 'ASC');
        return $this->db->from('tb_lokasi')
            ->get()
            ->result();
    }
}
