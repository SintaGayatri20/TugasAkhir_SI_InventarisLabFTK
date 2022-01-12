<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {

        // $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');


        if ($this->form_validation->run() == false) {

            $this->load->view('login/headerUtama');
            $this->load->view('login/halamanUtama');
        } else {
            $captcha = $_POST['g-recaptcha-response'];
            if (!$captcha) {
                redirect('Login');
            } else {
                //$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lf2HP8aAAAAAPvwqY0E5z2v6F502XDflc36r52m&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
                $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lf2HP8aAAAAAPvwqY0E5z2v6F502XDflc36r52m&response=" . $captcha);

                if ($response == "success") {
                    echo "You are spammer ! Get the @$%K out!!";
                } else {
                    $this->_login();
                }
            }
        }
    }

    private function _login()
    {



        $username      = $this->input->post('username');
        $password   = $this->input->post('password');

        $user       = $this->db->get_where('user', ['username' => $username])->row_array();

        //if ini untuk jika user ada
        if ($user) {
            //di dalam if ter detec "jika user aktif"
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $cek_role = $this->db->query("SELECT * FROM user, tb_personel_ftk, user_role, tb_prodi
								WHERE user.username=tb_personel_ftk.no_induk 
								AND user_role.id=user.role_id AND tb_personel_ftk.id_prodi=tb_prodi.id_prodi AND tb_personel_ftk.no_induk='$username'")->row_array();
                    $data = [
                        'username'  => $user['username'],
                        'role_id'   => $user['role_id'],
                        'id'        => $user['id_user'],
                        'nama'      => $cek_role['nama'],
                        'status'    => $cek_role['status'],
                        'id_prodi'  => $cek_role['id_prodi'],
                        'is_admin'  => $user['is_admin'],
                        'id_approval' => $cek_role['id_approval'],
                        'id_koorlab'  => $cek_role['id_koorlab'],
                        'no_induk'  => $cek_role['no_induk'],
                        'jabatan'  => $cek_role['jabatan']

                    ];

                    $this->session->set_userdata($data, true);

                    $role_id = $user['role_id'];
                    $is_admin = $user['is_admin'];

                    if ($is_admin == 1) {

                        redirect('admin');
                    } else {
                        if ($user['role_id'] == 4) {
                            redirect('laboran');
                        } else if ($user['role_id'] == 3) {
                            redirect('kaprodi');
                        } else if ($user['role_id'] == 6) {
                            redirect('koorlab');
                        } else {
                            redirect('user');
                        }
                    }


                    /*if ($user['role_id'] == 1) {
                        redirect('admin');
                    } elseif ($user['role_id'] == 2) {
                        redirect('kalab');
                    } elseif ($user['role_id'] == 3) {
                        redirect('laboran');
                    } elseif ($user['role_id'] == 4) {
                        redirect('mahasiswa');
                    }*/
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password</div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This Username has not been activated!</div>');
                redirect('login');
            }
        } else {
            //user tidak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not registered!</div>');
            redirect('login');
        }
    }

    // public function registration()
    // {
    //     $this->form_validation->set_rules('name', 'Name', 'required|trim');
    //     $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
    //         'is_unique'     => 'This email has already registered!'
    //     ]);
    //     $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
    //         'matches'       => 'Password not match!',
    //         'min_length'    => 'Password too short!'
    //     ]);
    //     $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

    //     if ($this->form_validation->run() == false) {
    //         $data['title']     = 'User Registration';
    //         $this->load->view('templates/auth_header', $data);
    //         $this->load->view('admin/registration');
    //         $this->load->view('templates/auth_footer');
    //     } else {
    //         $data = [
    //             'name'          => htmlspecialchars($this->input->post('name', true)),
    //             'email'         => htmlspecialchars($this->input->post('email')),
    //             'image'         => 'default.png',
    //             'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
    //             'role_id'       => $this->input->post('role_id'),
    //             'is_active'     =>  $this->input->post('is_active'),
    //             'date_created'  => time()
    //         ];

    //         $this->db->insert('user', $data);
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your account has been created. Please login</div>');
    //         redirect('auth');
    //     }
    // }

    public function logout()
    {
        /*$this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('status');
        $this->session->unset_userdata('id_prodi');
        $this->session->unset_userdata('is_admin');
        $this->session->unset_userdata('id_koorlab');*/
        session_destroy();

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout</div>');
        redirect('login');
    }
}
