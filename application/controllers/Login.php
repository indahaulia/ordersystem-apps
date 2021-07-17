<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        // jika form login disubmit
		// print_r($this->input->post());
        if($this->input->post()){
            if($this->user_model->doLogin()) redirect(site_url('dashboard'));
        }
        	$this->load->view("login.php");

        // tampilkan halaman login
    }

    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('/login'));
    }

}
