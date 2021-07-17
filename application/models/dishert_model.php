<?php

class Dishert_model extends CI_Model
{
    private $_table = "master_dish";

    public $dish_id;
    public $dish_name;
    public $price;
    public $img = "default.jpg";
    public $category;

    public function rules()
    {
        return [
            ['field' => 'dish_name',
            'label' => 'dish_name',
            'rules' => 'required'],

            ['field' => 'price',
            'label' => 'price',
            'rules' => 'required'],
            
            ['field' => 'category',
            'label' => 'category',
            'rules' => 'required']
        ];
    }

    public function countDishert(){
        $sql = "SELECT count(dish_id) dish from master_dish where active=1";
        $user = $this->db->query($sql)->row();
        return $user->dish;
    }

    public function bestSeller(){
        $sql = "SELECT sum(a.qty) jml, b.dish_id, b.dish_name, b.price, b.img FROM order_transaction_detail a, master_dish b where a.dish_id = b.dish_id group by dish_id order by 1 desc limit 3";
        $bestseller = $this->db->query($sql)->result();
        return $bestseller;
    }

    public function showFoods(){
        $sql = "SELECT * from master_dish where category=1 and active=1";
        $foods = $this->db->query($sql)->result();
        return $foods;
    }

    public function showDrinks(){
        $sql = "SELECT * from master_dish where category=2 and active=1";
        $drinks = $this->db->query($sql)->result();
        return $drinks;
    }

    public function showSnacks(){
        $sql = "SELECT * from master_dish where category=3 and active=1";
        $snacks = $this->db->query($sql)->result();
        return $snacks;
    }

    public function getDishert($id){
        $sql = "SELECT * from master_dish where dish_id='$id' and active=1";
        $dishert = $this->db->query($sql)->result();
        return $dishert;
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["dish_id" => $id])->row();
    }

    public function getData(){
        return $this->db->get($this->_table)->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->dish_name = $post["dish_name"];
        $this->price = $post["price"];
        $this->img = $this->_uploadImage();
        $this->category = $post["category"];
        
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->dish_id = $post["dish_id"];
        $this->dish_name = $post["dish_name"];
        $this->price = $post["price"];
        $this->category = $post["category"];
        if (!empty($_FILES["img"]["name"])) {
            $this->img = $this->_uploadImage();
        } else {
            $this->img = $post["old_img"];
        }
        return $this->db->update($this->_table, $this, array('dish_id' => $post['dish_id']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("dish_id" => $id));
    }

    private function _uploadImage() {
        $config['upload_path'] = './assets/product_img/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['overwrite'] = true;
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('img')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }

    private function _deleteImage($id)
    {
    $product = $this->getById($id);
    if ($product->img != "default.jpg") {
	    $filename = explode(".", $product->img)[0];
		return array_map('unlink', glob(FCPATH."assets/product_img/$filename.*"));
    }
}
}
