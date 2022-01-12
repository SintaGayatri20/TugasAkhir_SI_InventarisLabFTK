<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->helper('url');
    }

	 public function index()
    {
		 $data['title'] = 'Role User';
		 $data['user'] = $this->db->query("SELECT * FROM user, tb_personel_ftk, user_role
								WHERE user.username=tb_personel_ftk.no_induk 
								AND user_role.id=user.role_id AND tb_personel_ftk.no_induk='198708042015041001'")->row_array();
		 $this->load->view('templates/header',$data);
		 $this->load->view('content/role');
		 $this->load->view('templates/js');
		
	}
	
	
}