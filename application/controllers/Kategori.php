<?php
class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_kategori');
    }

    function get_lokasi()
    {
        $id = $this->input->post('id');
        $data = $this->m_kategori->get_lokasi($id);
        echo json_encode($data);
    }

    function get_jumlah()
    {
        $id = $this->input->post('id');
        $data = $this->m_kategori->get_lokasi($id);
        echo json_encode($data);
    }
}
