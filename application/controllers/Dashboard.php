<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("dishert_model");
        $this->load->model("order_model");
        $this->load->model("customer_model");
        $this->load->library('form_validation');

        if($this->user_model->isNotLogin()) redirect(site_url('login'));

    }

    public function index()
    {

        // tampilkan halaman login
        $user = $this->user_model->countUser();
        $dishert2 = $this->dishert_model->countDishert();
        $order = $this->order_model->countOrder();
        $customer = $this->customer_model->countCustomer();
        $data  = array(
            'user' => $user,
            'dishert2' => $dishert2,
            'order' => $order,
            'customer' => $customer,
        );

        $data1 = array(
            'active' => "Dashboard",
        );

        $this->load->view("admin/header.php");
        $this->load->view("admin/sidebar.php",$data1);
        $this->load->view("admin/index.php", $data);
        $this->load->view("admin/footer.php");
        
    }

    public function formshowdata(){
        $dishert = $this->dishert_model->getData();
        $data  = array(
            'dishert' => $dishert,

        );

        $data1 = array(
            'active' => "Menu",
        );

        $this->load->view("admin/header.php");
        $this->load->view("admin/sidebar.php",$data1);
        $this->load->view("admin/menudish.php",$data);
        $this->load->view("admin/footer.php");
    }

    public function forminput(){
        $dishert = $this->dishert_model->getData();
        $data  = array(
            'dishert' => $dishert,
        );
        $this->load->view("admin/header.php");
        $this->load->view("admin/sidebar.php");
        $this->load->view("admin/inputmenu.php",$data);
        $this->load->view("admin/footer.php");
    }


    public function add()
    {
        $product = $this->dishert_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());
        
        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }   
        
        $this->load->view("admin/header.php");
        $this->load->view("admin/sidebar.php");
        $this->load->view("admin/inputmenu.php");
        $this->load->view("admin/footer.php");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('Dashboard');
        $dishert = $this->dishert_model;
        $validation = $this->form_validation;
        $validation->set_rules($dishert->rules());

        if ($validation->run()) {
            $dishert->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        
        $data["dishert"] = $dishert->getById($id);
        if (!$data["dishert"]) show_404();

        $this->load->view("admin/header.php");
        $this->load->view("admin/sidebar.php");
        $this->load->view("admin/editmenu.php",$data);
        $this->load->view("admin/footer.php");
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->dishert_model->delete($id)) {
            redirect(site_url('Dashboard/formshowdata'));
        }
    }

}

