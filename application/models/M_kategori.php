<?php
class M_kategori extends CI_Model
{

    function get_prodi_admin()
    {

        $hasil = $this->db->query("SELECT * FROM tb_prodi");
        return $hasil;
    }
    function get_prodi()
    {
        $id_prodi = $this->session->userdata('id_prodi');
        $hasil = $this->db->query("SELECT * FROM tb_prodi WHERE tb_prodi.id_prodi='$id_prodi'");
        return $hasil;
    }
    function get_masterbhp()
    {
        $hasil = $this->db->query("SELECT * FROM tb_master_bhp");
        return $hasil;
    }

    function get_lokasi_bhp()
    {
        $id_prodi = $this->session->userdata('id_prodi');
        $hasil = $this->db->query("SELECT * FROM tb_lokasi WHERE id_prodi='$id_prodi'");
        return $hasil->result();
    }
    function get_lokasi($id)
    {
        $hasil = $this->db->query("SELECT * FROM tb_lokasi WHERE id_prodi='$id'");
        return $hasil->result();
    }


    function get_aset($id)
    {
        $hasil = $this->db->query("SELECT * FROM tb_aset a,tb_lokasi b WHERE a.id_lokasi=b.id_lokasi AND a.id_lokasi='$id'");
        return $hasil->result();
    }
    function get_asets($id)
    {
        $hasil = $this->db->query("SELECT * FROM tb_aset a,tb_lokasi b, tb_prodi c WHERE a.id_lokasi=b.id_lokasi AND b.id_prodi=c.id_prodi AND a.id_lokasi='$id'");
        return $hasil->result();
    }
    function get_bhp($id)
    {
        $hasil = $this->db->query("SELECT * FROM tb_bhp a,tb_lokasi b WHERE a.id_lokasi=b.id_lokasi AND a.id_lokasi='$id'");
        return $hasil->result();
    }

    public function tanggapanKoorlab()
    {
        $hasil = $this->db->query("SELECT * FROM tb_detail_bhp");
        return $hasil->result();
    }

    public function get_bhp_koorlab_data()
    {

        $id_koorlab = $this->session->userdata('id_koorlab');
        $hasil = $this->db->query(
            "SELECT*FROM tb_master_bhp a, tb_detail_bhp b, tb_lokasi c, tb_prodi d, tb_personel_ftk e
                    WHERE a.id_master_bhp=b.id_master_bhp AND b.id_lokasi=c.id_lokasi AND b.id_prodi=d.id_prodi AND e.no_induk=b.id_user AND id_koorlab='$id_koorlab'"
        );
        return $hasil->result();
    }

    function get_bhp_koorlab()
    {
        $status = $this->uri->segment(3);
        $id_lokasi_seg = $this->uri->segment(5);

        $id_prodi = $this->session->userdata('id_prodi');
        $id_koorlab = $this->session->userdata('id_koorlab');

        if ($status == '') {
            $hasil = $this->db->query(
                "SELECT * FROM tb_detail_bhp a, tb_master_bhp b, tb_personel_ftk c, tb_prodi d, tb_lokasi e
                WHERE a.id_master_bhp=b.id_master_bhp
                AND a.id_user=c.no_induk
                AND a.id_prodi= d.id_prodi
                AND a.id_lokasi = e.id_lokasi
                AND a.id_prodi = '$id_prodi' AND d.id_koorlab='$id_koorlab'"
            );
        } else {
            $hasil = $this->db->query(
                "SELECT * FROM tb_detail_bhp a, tb_master_bhp b, tb_personel_ftk c, tb_prodi d, tb_lokasi e
                WHERE a.id_master_bhp=b.id_master_bhp
                AND a.id_user=c.no_induk
                AND a.id_prodi= d.id_prodi
                AND a.id_lokasi = e.id_lokasi
                AND a.id_lokasi = '$id_lokasi_seg'"
            );
        }
        return $hasil->result();
    }

    function get_approval()
    {

        $id_approval = $this->session->userdata('id_approval');
        $id_prodi = $this->session->userdata('id_prodi');
        $role = $this->session->userdata('role_id');

        $hasil = $this->db->query("SELECT * FROM user a,tb_personel_ftk b WHERE a.username=b.no_induk AND a.role_id='$id_approval' AND b.id_prodi='$id_prodi'");
        return $hasil->result();
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }


    function get_peminjaman()
    {
        $username = $this->session->userdata('username');
        $role = $this->session->userdata('role_id');
        if ($role == 5) {
            //$hasil=$this->db->query("SELECT *,a.jumlah AS jumlah_pinjam,a.status AS status_approve FROM tb_peminjaman_aset a,tb_personel_ftk b,tb_aset c,tb_approval_koorprodi d WHERE a.id_user=b.no_induk AND a.kode_aset=c.kode_aset AND a.id_peminjaman=d.id_peminjaman AND a.id_user='$username'");
            $hasil = $this->db->query("SELECT *,a.jumlah AS jumlah_pinjam, a.status AS status_approve FROM  tb_peminjaman_aset a,tb_personel_ftk b,tb_aset c WHERE a.id_user=b.no_induk AND a.kode_aset=c.kode_aset AND a.tanggal_kembali='0000-00-00 00:00:00' AND a.id_user='$username'");
        } else {
            //$hasil=$this->db->query("SELECT *,a.jumlah AS jumlah_pinjam,a.status AS status_approve FROM tb_peminjaman_aset a,tb_personel_ftk b,tb_aset c,tb_approval_koorprodi d WHERE a.id_user=b.no_induk AND a.kode_aset=c.kode_aset AND a.id_peminjaman=d.id_peminjaman AND a.laboran='$username'");
            $hasil = $this->db->query("SELECT *,a.jumlah AS jumlah_pinjam, a.status AS status_approve FROM  tb_peminjaman_aset a,tb_personel_ftk b,tb_aset c WHERE a.id_user=b.no_induk AND a.kode_aset=c.kode_aset AND a.tanggal_kembali='0000-00-00 00:00:00' AND a.laboran='$username'");
        }
        return $hasil->result();
    }


    function get_peminjaman_admin()
    {
        $username = $this->session->userdata('username');
        $role = $this->session->userdata('role_id');
        $hasil = $this->db->query("SELECT *,a.jumlah AS jumlah_pinjam, a.status AS status_approve FROM  tb_peminjaman_aset a,tb_personel_ftk b,tb_aset c WHERE a.id_user=b.no_induk AND a.kode_aset=c.kode_aset");
        //if ($role == 5) {
        //$hasil=$this->db->query("SELECT *,a.jumlah AS jumlah_pinjam,a.status AS status_approve FROM tb_peminjaman_aset a,tb_personel_ftk b,tb_aset c,tb_approval_koorprodi d WHERE a.id_user=b.no_induk AND a.kode_aset=c.kode_aset AND a.id_peminjaman=d.id_peminjaman AND a.id_user='$username'");
        //$hasil = $this->db->query("SELECT *,a.jumlah AS jumlah_pinjam, a.status AS status_approve FROM  tb_peminjaman_aset a,tb_personel_ftk b,tb_aset c WHERE a.id_user=b.no_induk AND a.kode_aset=c.kode_aset AND a.tanggal_kembali='0000-00-00 00:00:00' AND a.id_user='$username'");
        //  } else {
        //$hasil=$this->db->query("SELECT *,a.jumlah AS jumlah_pinjam,a.status AS status_approve FROM tb_peminjaman_aset a,tb_personel_ftk b,tb_aset c,tb_approval_koorprodi d WHERE a.id_user=b.no_induk AND a.kode_aset=c.kode_aset AND a.id_peminjaman=d.id_peminjaman AND a.laboran='$username'");
        //$hasil = $this->db->query("SELECT *,a.jumlah AS jumlah_pinjam, a.status AS status_approve FROM  tb_peminjaman_aset a,tb_personel_ftk b,tb_aset c WHERE a.id_user=b.no_induk AND a.kode_aset=c.kode_aset AND a.tanggal_kembali='0000-00-00 00:00:00' AND a.laboran='$username'");
        //}
        return $hasil->result();
    }

    function get_history_peminjaman()
    {
        $username = $this->session->userdata('username');
        $role = $this->session->userdata('role_id');
        if ($role == 5) {
            //$hasil=$this->db->query("SELECT *,a.jumlah AS jumlah_pinjam,a.status AS status_approve FROM tb_peminjaman_aset a,tb_personel_ftk b,tb_aset c,tb_approval_koorprodi d WHERE a.id_user=b.no_induk AND a.kode_aset=c.kode_aset AND a.id_peminjaman=d.id_peminjaman AND a.id_user='$username'");
            $hasil = $this->db->query("SELECT *,a.jumlah AS jumlah_pinjam, a.status AS status_approve FROM  tb_peminjaman_aset a,tb_personel_ftk b,tb_aset c WHERE a.id_user=b.no_induk AND a.kode_aset=c.kode_aset AND a.status=2 AND a.id_user='$username'");
        } else {
            //$hasil=$this->db->query("SELECT *,a.jumlah AS jumlah_pinjam,a.status AS status_approve FROM tb_peminjaman_aset a,tb_personel_ftk b,tb_aset c,tb_approval_koorprodi d WHERE a.id_user=b.no_induk AND a.kode_aset=c.kode_aset AND a.id_peminjaman=d.id_peminjaman AND a.laboran='$username'");
            $hasil = $this->db->query("SELECT *,a.jumlah AS jumlah_pinjam, a.status AS status_approve FROM  tb_peminjaman_aset a,tb_personel_ftk b,tb_aset c WHERE a.id_user=b.no_induk AND a.kode_aset=c.kode_aset AND a.status=2 AND a.laboran='$username'");
        }
        return $hasil->result();
    }

    function get_pengembalian()
    {
        $username = $this->session->userdata('username');
        $role = $this->session->userdata('role_id');
        if ($role == 5) {
            $hasil = $this->db->query("SELECT *,a.jumlah AS jumlah_pinjam, a.status AS status_approve FROM  tb_peminjaman_aset a,tb_personel_ftk b,tb_aset c WHERE a.id_user=b.no_induk AND a.kode_aset=c.kode_aset AND a.tanggal_kembali!='0000-00-00 00:00:00' AND a.kembali_status!=2 AND a.id_user='$username'");
        } else {
            $hasil = $this->db->query("SELECT *,a.jumlah AS jumlah_pinjam, a.status AS status_approve FROM  tb_peminjaman_aset a,tb_personel_ftk b,tb_aset c WHERE a.id_user=b.no_induk AND a.kode_aset=c.kode_aset AND a.tanggal_kembali!='0000-00-00 00:00:00' AND a.kembali_status!=2 AND a.laboran='$username'");
        }
        return $hasil->result();
    }

    function get_history_pengembalian()
    {
        $username = $this->session->userdata('username');
        $role = $this->session->userdata('role_id');
        if ($role == 5) {
            $hasil = $this->db->query("SELECT *,a.jumlah AS jumlah_pinjam, a.status AS status_approve FROM  tb_peminjaman_aset a,tb_personel_ftk b,tb_aset c WHERE a.id_user=b.no_induk AND a.kode_aset=c.kode_aset AND a.kembali_status=2 AND a.id_user='$username'");
        } else {
            $hasil = $this->db->query("SELECT *,a.jumlah AS jumlah_pinjam, a.status AS status_approve FROM  tb_peminjaman_aset a,tb_personel_ftk b,tb_aset c WHERE a.id_user=b.no_induk AND a.kode_aset=c.kode_aset AND a.kembali_status=2 AND a.laboran='$username'");
        }
        return $hasil->result();
    }



    function get_pengembalian_laboran()
    {
        $username = $this->session->userdata('username');
        $hasil_lab = $this->db->query("SELECT *,a.jumlah AS jumlah_pinjam, a.status AS status_approve FROM  tb_peminjaman_aset a,tb_personel_ftk b,tb_aset c WHERE a.id_user=b.no_induk AND a.kode_aset=c.kode_aset AND a.tanggal_kembali!='0000-00-00 00:00:00' AND a.kembali_status=1 AND a.laboran='$username'");
        return $hasil_lab->result();
    }



    function get_kaprodi_approve()
    {

        $username = $this->session->userdata('username');
        $role = $this->session->userdata('role_id');

        $hasil = $this->db->query("SELECT *,a.jumlah AS jumlah_pinjam,a.status AS status_approve FROM tb_peminjaman_aset a,tb_personel_ftk b,tb_aset c,tb_approval_koorprodi d WHERE a.id_user=b.no_induk AND a.kode_aset=c.kode_aset AND a.id_peminjaman=d.id_peminjaman AND a.status!=2 AND d.approval='$username' AND d.approval_status = 0");

        return $hasil->result();
    }

    function get_history_peminjaman_kaprodi()
    {

        $username = $this->session->userdata('username');
        $role = $this->session->userdata('role_id');

        $hasil = $this->db->query("SELECT *,a.jumlah AS jumlah_pinjam,a.status AS status_approve FROM tb_peminjaman_aset a,tb_personel_ftk b,tb_aset c,tb_approval_koorprodi d WHERE a.id_user=b.no_induk AND a.kode_aset=c.kode_aset AND a.id_peminjaman=d.id_peminjaman AND a.status=2 AND d.approval='$username'");

        return $hasil->result();
    }

    function get_history_pengembalian_kaprodi()
    {

        $username = $this->session->userdata('username');
        $role = $this->session->userdata('role_id');

        $hasil = $this->db->query("SELECT *,a.jumlah AS jumlah_pinjam,a.status AS status_approve FROM tb_peminjaman_aset a,tb_personel_ftk b,tb_aset c,tb_approval_koorprodi d WHERE a.id_user=b.no_induk AND a.kode_aset=c.kode_aset AND a.id_peminjaman=d.id_peminjaman AND d.kembali_status=2 AND d.approval='$username'");

        return $hasil->result();
    }

    function get_kaprodi_kembali()
    {

        $username = $this->session->userdata('username');
        $role = $this->session->userdata('role_id');


        $hasil = $this->db->query("SELECT *,a.jumlah AS jumlah_pinjam,a.status AS status_approve 
        FROM tb_peminjaman_aset a,tb_personel_ftk b,tb_aset c,tb_approval_koorprodi d 
        WHERE a.id_user=b.no_induk 
        AND a.kode_aset=c.kode_aset 
        AND a.id_peminjaman=d.id_peminjaman 
        AND d.kembali_status=1 AND d.approval='$username' GROUP BY d.id_peminjaman");

        return $hasil->result();
    }
    function get_asr()
    {
        $status = $this->uri->segment(3);
        $id_lokasi_seg = $this->uri->segment(5);

        $id_prodi = $this->session->userdata('id_prodi');
        $id_koorlab = $this->session->userdata('id_koorlab');

        $hasil = $this->db->query(
            "SELECT * FROM tb_prodi a, tb_aset b, tb_brg_rusak c, tb_lokasi d, tb_personel_ftk f 
                                    WHERE a.id_prodi = b.id_prodi AND b.kode_aset = c.kode_aset
                                    AND d.id_lokasi=b.id_lokasi AND f.no_induk=c.id_user AND a.id_koorlab='$id_koorlab'"
        );
        return $hasil->result();

        /*$hasil = $this->db->query("SELECT * FROM tb_prodi a, tb_aset b, tb_brg_rusak c, tb_lokasi d, tb_personel_ftk f 
                                    WHERE a.id_prodi = b.id_prodi AND b.kode_aset = c.kode_aset
                                    AND d.id_lokasi=b.id_lokasi AND f.no_induk=c.id_user");

        return $hasil->result();*/
    }




    function get_peminjaman_cetak($ba)
    {

        $hasil = $this->db->query("SELECT * FROM tb_peminjaman_aset a,tb_personel_ftk b,tb_aset c WHERE a.id_user=b.no_induk AND a.kode_aset=c.kode_aset AND a.id_peminjaman='$ba'");
        return $hasil->result();
    }
    function get_BHP_cetak()
    {
        $id_lks = $this->uri->segment(4);

        $hasil = $this->db->query("SELECT * FROM tb_detail_bhp a, tb_master_bhp b, tb_personel_ftk c, tb_prodi d, tb_lokasi e
                WHERE a.id_master_bhp=b.id_master_bhp
                AND a.id_user=c.no_induk
                AND a.id_prodi= d.id_prodi
                AND a.id_lokasi = e.id_lokasi AND a.id_lokasi='$id_lks' 
            ");
        return $hasil->result();
    }

    function getKalab()
    {
        $hasil = $this->db->query("SELECT * from user a,tb_personel_ftk b WHERE a.username=b.no_induk AND a.role_id=2");
        return $hasil->result();
    }
    function getDataBebasLab()
    {
        $hasil = $this->db->query("SELECT tb_bebas_lab.*, tb_prodi.nama_prodi, tb_prodi.jurusan, tb_prodi.id_prodi 
                                    FROM tb_bebas_lab JOIN tb_prodi ON tb_bebas_lab.id_prodi = tb_prodi.id_prodi ");
        return $hasil->result_array();
    }


    function get_surket_bebasLab($ba)
    {

        $username = $this->session->userdata('username');
        $hasil = $this->db->query("SELECT tb_bebas_lab.*, tb_prodi.nama_prodi, tb_prodi.jurusan, tb_prodi.id_prodi 
                                    FROM tb_bebas_lab 
                                    JOIN tb_prodi ON tb_bebas_lab.id_prodi = tb_prodi.id_prodi 
                                    WHERE tb_bebas_lab.id_bebas_lab='$ba'");
        return $hasil->result();
    }


    function get_surket_asetrusak($ba)
    {

        $hasil = $this->db->query("SELECT * FROM tb_prodi a, tb_aset b, tb_brg_rusak c, tb_lokasi d, tb_personel_ftk f 
                                    WHERE a.id_prodi = b.id_prodi AND b.kode_aset = c.kode_aset
                                    AND d.id_lokasi=b.id_lokasi AND f.no_induk=c.id_user AND c.id_brg_rusak='$ba'");
        return $hasil->result();
    }

    function get_pengembalian_cetak($ba)
    {

        $username = $this->session->userdata('username');
        $hasil = $this->db->query("SELECT * FROM tb_peminjaman_aset a,tb_personel_ftk b,tb_aset c WHERE a.id_user=b.no_induk AND a.kode_aset=c.kode_aset AND a.id_peminjaman='$ba'");
        return $hasil->result();
    }

    function get_laboran()
    {

        $username = $this->session->userdata('username');
        $hasil = $this->db->query("SELECT * FROM tb_peminjaman_aset WHERE id_user='$username'");
        $hsl = $hasil->row_array();

        $laboran = $hsl['laboran'];

        $cek_laboran = $this->db->query("SELECT * FROM tb_personel_ftk WHERE no_induk='$laboran'");
        return $cek_laboran->result();
    }

    function get_jumlah_pinjam()
    {

        $hasil = $this->db->query("SELECT COUNT(*) AS ca FROM tb_peminjaman_aset");
        return $hasil->result();
    }
    function get_jumlah_bhp()
    {

        $hasil = $this->db->query("SELECT COUNT(*) AS ca FROM tb_detail_bhp");
        return $hasil->result();
    }

    function get_jumlah_asetrusak()
    {

        $hasil = $this->db->query("SELECT COUNT(*) AS ca FROM tb_brg_rusak");
        return $hasil->result();
    }

    function get_kaprod()
    {
        $role_id = $this->session->userdata('role_id');
        $hasil = $this->db->query("SELECT * FROM user_role WHERE id='$role_id'");
        return $hasil->result();
    }

    /*function get_kaprod_test()
    {
        $role_id = $this->session->userdata('role_id');
        $hasil = $this->db->query("SELECT * FROM user_role WHERE id='$role_id'");
        $hsl = $hasil->row_array();

        $hasil2 = $this->db->query("SELECT * FROM user_role a,user b,tb_personel_ftk c WHERE a.id=b.role_id AND b.username=c.no_induk AND c.id_prodi='$hsl' AND b.role_id='$role_id'");
        return $hasil2->result();
    }*/



    function get_no_ba()
    {

        $hasil = $this->db->query("SELECT * FROM tb_no_ba WHERE status=1");
        return $hasil->result();
    }

    function get_kopsurat()
    {

        $hasil = $this->db->query("SELECT * FROM tb_kopsurat");
        return $hasil->result();
    }

    public function getByIdKopSurat($id)
    {
        return $this->db->get_where('tb_kopsurat', ["id_kopsurat" => $id])->row();
    }
}
