<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainmenu extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("dishert_model");
        $this->load->model("order_model");
        $this->load->model("customer_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view("mainmenu/lockscreen.php");        
    }

    public function bestSeller(){
        if (empty($_SESSION['customer_logged'])) {
            $this->customer_model->save();
        }

        $data['bestseller'] = $this->dishert_model->bestSeller();
        $data['foods'] = $this->dishert_model->showFoods();
        $data['drinks'] = $this->dishert_model->showDrinks();
        $data['snacks'] = $this->dishert_model->showSnacks();

        $this->load->view("mainmenu/header.php");
        $this->load->view("mainmenu/sidebar.php");
        $this->load->view("mainmenu/menu.php",$data);
        $this->load->view("mainmenu/footer.php");
    }

    public function logout(){
        $this->order_model->emptyCart();
        $this->session->sess_destroy();
        redirect(site_url('/'));
    }

    public function getDishert(){
        $id = $this->input->get('id');
        $data = $this->dishert_model->getDishert($id);
        echo json_encode($data);
    }

    public function addToCart(){
       
        $cart =  $this->order_model->addToCart();
        echo $cart;

    }

    public function countCart(){
        $cart = $this->order_model->countCart();
        echo $cart;
    }

    public function showCart(){
        $data = $this->order_model->showCart();
        $html = "";
        $no = 0;
        $total = 0;
        $html = "<thead><tr>
                    <th>No.</th>
                    <th colspan='2'>Order</th>
                    <th>Qty</th>
                    <th>Note</th>
                    <th>Price</th>
                    <th>#</th>
                </tr></thead><tbody>";
        foreach ($data as $cart) {
            $html .= "<tr>
                        <td>".++$no."</td>
                        <td><img src='".site_url()."/assets/product_img/".$cart->img."' style='width:100px'/></td>
                        <td>".$cart->dish_name."</td>
                        <td>".$cart->qty." x</td>
                        <td>".$cart->note."</td>
                        <td style='text-align:right'>Rp. ".$cart->price*$cart->qty."</td>
                        <td><a class='btn btn-danger' onclick='delFromCart(this,".$cart->cart_id.")'>X</a></td>
                    </tr>";
            $total += $cart->qty*$cart->price;
        }

        if (empty($data)) {
            $html .= "<tr>
                        <td colspan='7' style='text-align:center;color:#999'> No data in your cart</td>
                      </tr>";
        }
        
        $html .= "</tbody><tfoot><tr>
                    <td colspan='5' style='text-align:right;font-weight:bold'>Total :</td>
                    <td style='text-align:right;font-weight:bold'>Rp. $total</td>
                    <td ></td>
                  </tr></tfoot>";
        $data1['html'] = $html;
        echo json_encode($data1);
    }

    public function delFromCart(){
        $result = $this->order_model->delFromCart();
        echo $result;
    }

    public function checkout(){
        $result = $this->order_model->checkout();
        echo $result;
    }

    // public function foods(){
        
    //     // $this->customer_model->save();

    //     $this->load->view("mainmenu/header.php");
    //     $this->load->view("mainmenu/sidebar.php");
    //     $this->load->view("mainmenu/foods.php");
    //     $this->load->view("mainmenu/footer.php");
    // }

    // public function drinks(){
        
    //     // $this->customer_model->save();

    //     $this->load->view("mainmenu/header.php");
    //     $this->load->view("mainmenu/sidebar.php");
    //     $this->load->view("mainmenu/drinks.php");
    //     $this->load->view("mainmenu/footer.php");
    // }

    // public function snacks(){
        
    //     // $this->customer_model->save();

    //     $this->load->view("mainmenu/header.php");
    //     $this->load->view("mainmenu/sidebar.php");
    //     $this->load->view("mainmenu/snacks.php");
    //     $this->load->view("mainmenu/footer.php");
    // }

}
