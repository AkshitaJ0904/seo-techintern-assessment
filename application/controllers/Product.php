<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function view($slug) {
        $product = $this->ProductModel->get_product_by_slug($slug);
        
        if (empty($product)) {
            show_404();
        }
        
        $data['title'] = $product->title . ' | Product Details';
        $data['meta_description'] = character_limiter(strip_tags($product->description), 160);
        $data['product'] = $product;
        $data['features'] = json_decode($product->features);
        
        $this->load->view('templates/header', $data);
        $this->load->view('product/detail', $data);
        $this->load->view('templates/footer');
    }
}