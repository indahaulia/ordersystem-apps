<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kitchen_c extends CI_Controller {

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

        // tampilkan halaman kitchen

        $order = $this->order_model->getOrderKitchen();
        $data  = array(
            'order' => $order,
        );

        $data1 = array(
            'active' => "Kitchen",
        );

        $this->load->view("admin/header.php");
        $this->load->view("admin/sidebar.php",$data1);
        $this->load->view("admin/kitchen.php", $data);
        $this->load->view("admin/footer.php");
        
    }

    public function nextProgress(){
        $id = $this->input->get('id');
        $next = $this->order_model->nextProgress($id);
        $cekprogress = $this->order_model->getProgress($id);
        if ($cekprogress == 0) {
            $keterangan = "Order is on waiting list";
        }elseif ($cekprogress == 1) {
            $keterangan = "Order is in process";
        }else{
            $keterangan = "Order is finished";
        }

        $data['status'] = $next;
        $data['keterangan'] = $keterangan;
        echo json_encode($data);
    }

}

