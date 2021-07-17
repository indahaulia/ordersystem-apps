<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cashier_c extends CI_Controller {

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

        $order = $this->order_model->getCashierList();
        $data  = array(
            'order' => $order,
        );

        $data1 = array(
            'active' => "Cashier",
        );

        $this->load->view("admin/header.php");
        $this->load->view("admin/sidebar.php", $data1);
        $this->load->view("admin/cashier.php", $data);
        $this->load->view("admin/footer.php");
        
    }

    public function payOrder(){
        $id = $this->input->get('id');
        $pay = $this->order_model->payOrder($id);
        echo $pay;
    }

    public function getOrderTransaction(){
        $id = $this->input->get('id');
        $header = $this->order_model->getheaderTransaction($id);
        $html = "";
        $total = 0;
        $html .= '<div class="row">
                        <div class="col-12">
                          <h2 class="page-header">
                            <i class="fas fa-globe"></i> Ordersystem
                            <small class="float-right">'.$header->trx_date.'</small>
                          </h2>
                        </div>
                      </div>
                      <div class="row invoice-info">
                        <div class="col-sm-6 invoice-col">
                          To
                          <address>
                            <strong>'.$header->customer_name.'</strong><br>
                          </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6 invoice-col">
                          <b>Invoice #007612</b><br>
                          <br>
                          <b>Order ID:</b>'.$header->order_id.'<br>
                          <b>Payment Due:</b>'.$header->trx_date.'<br>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-12 table-responsive">
                          <table class="table table-striped">
                            <thead>
                            <tr>
                              <th>Qty</th>
                              <th>Product</th>
                              <th>Description</th>
                              <th>Subtotal</th>
                            </tr>
                            </thead>
                            <tbody>';
        $detail = $this->order_model->getOrderDetail($id);
        foreach ($detail as $key) {
            $html .= "<tr>
                        <td>".$key->qty."</td>
                        <td>".$key->dish_name."</td>
                        <td>".$key->note."</td>
                        <td>".$key->price."</td>
                    </tr>";
            $total += $key->price;
        }

        $tax = $total*0.1;
        $grandtotal = $total + $tax;

        $html .= '</tbody>
                          </table>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-6">
                          
                        </div>
                        <div class="col-6">

                          <div class="table-responsive">
                            <table class="table">
                              <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td>IDR '.$total.'</td>
                              </tr>
                              <tr>
                                <th>Tax (10%)</th>
                                <td>IDR '.$tax.'</td>
                              </tr>
                              <tr>
                                <th>Total:</th>
                                <td>IDR '.$grandtotal.'</td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>';

        
        $data['html'] = $html;

        echo json_encode($data);
    }
}

