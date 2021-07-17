<?php

class Order_model extends CI_Model
{
    private $_table = "order_transaction";


    public function countOrder(){
        $sql = "SELECT count(order_id) ordercount from order_transaction where deleted_at is null";
        $order = $this->db->query($sql)->row();
        return $order->ordercount;
    }

    public function addToCart(){
        $post = $this->input->post();
        $customer_id = $_SESSION['customer_id'];
        $sql = "INSERT into cart(customer_id,dish_id,qty,price,note) values('".$customer_id."','".$post['id']."','".$post['qty']."','".$post['price']."','".$post['note']."')";
        $cart = $this->db->query($sql);
        return $cart;
    }

    public function countCart(){
        $customer_id = $_SESSION['customer_id'];
        $sql = "SELECT count(cart_id) cartcount from cart where customer_id='$customer_id'";
        $cart = $this->db->query($sql)->row();
        return $cart->cartcount;
    }

    public function emptyCart(){
        $customer_id = $_SESSION['customer_id'];
        $sql = "DELETE from cart where customer_id='$customer_id'";
        $cart = $this->db->query($sql);
        return $cart;
    }

    public function showCart(){
        $customer_id = $_SESSION['customer_id'];
        $sql = "SELECT a.cart_id, b.dish_name, a.dish_id, a.qty, a.price, a.note, b.img from cart a, master_dish b where a.dish_id=b.dish_id and a.customer_id='$customer_id'";
        $cart = $this->db->query($sql)->result();
        return $cart;
    }

    public function delFromCart(){
        $customer_id = $_SESSION['customer_id'];
        $post = $this->input->post();
        $id = $post['id'];

        $sql = "DELETE from cart where customer_id='$customer_id' and cart_id='$id'";
        $cart = $this->db->query($sql);
        return $cart;
    }

    public function checkout(){
        $customer_id = $_SESSION['customer_id'];
        $customer_name = $_SESSION['customer_logged'];
        $post = $this->input->post();
        $dine_in = $post['dine_in'];

        //get no queue
        $sql = "SELECT max(no_queue) no_queue from order_transaction where date(trx_date) = date(sysdate())";
        $query = $this->db->query($sql)->row();
        $no_queue = $query->no_queue + 1;

        //grand total
        $sql = "SELECT sum(qty * price) total from cart where customer_id='$customer_id'";
        $query = $this->db->query($sql)->row();
        $grand_total = $query->total;
        $tax = $grand_total * 0.1;

        //insert header
        $insert = "INSERT into order_transaction (no_queue,customer_id,customer_name,dine_in,grand_total,tax,user_id) values ('$no_queue','$customer_id','$customer_name','$dine_in',$grand_total,$tax,1)";
        $query_insert = $this->db->query($insert);
        $order_id = $this->db->insert_id();

        //insert detail
        $insert_detail = "INSERT into order_transaction_detail(order_id,dish_id,qty,note,price,disc) (SELECT $order_id, dish_id,qty,note,price,0 from cart where customer_id='$customer_id')";
        $query_insert_detail = $this->db->query($insert_detail);

        if ($query_insert && $query_insert_detail) {
            return $no_queue;
        }else{
            return 0;
        }


    }

    public function getOrderKitchen(){
        $sql = "SELECT a.order_id, a.no_queue, a.customer_name,a.trx_date,IF(a.dine_in=1,'Dine in','Take away') dine_in, a.kitchen_progress from order_transaction a where kitchen_progress !=2 and a.deleted_at is null";
        $header = $this->db->query($sql)->result();
        return $header;
    }

    public function nextProgress($id){
        $sql = "UPDATE order_transaction set kitchen_progress = kitchen_progress+1 where order_id=$id";
        $nextProgress = $this->db->query($sql);
        return $nextProgress;  
    }

    public function getProgress($id){
        $sql = "SELECT kitchen_progress as progress from order_transaction where order_id=$id";
        $progress = $this->db->query($sql)->row();
        return $progress->progress;  
    }

    public function getCashierList(){
        $sql = "SELECT order_id, customer_name, trx_date, grand_total as total, tax from order_transaction where deleted_at is null and paid_off=0";
        $header = $this->db->query($sql)->result();
        return $header;
    }

    public function payOrder($id){
        $sql = "UPDATE order_transaction set paid_off = 1 where order_id=$id";
        $pay = $this->db->query($sql);
        return $pay;  
    }

    public function getHeaderTransaction($id){
        $sql = "SELECT * from order_transaction where order_id=$id";
        $order = $this->db->query($sql)->row();
        return $order;
    }

    public function getOrderDetail($id){
        $sql = "SELECT a.order_id, a.dish_id, b.dish_name, a.qty, a.note, a.price from order_transaction_detail a, master_dish b where a.dish_id=b.dish_id and a.order_id=$id";
        $order = $this->db->query($sql)->result();
        return $order;
    }

}
