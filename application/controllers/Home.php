<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $data['title'] = 'Product Listing Platform - Browse Categories';
        $data['meta_description'] = 'Explore our wide range of product categories. Find the best products in various categories at competitive prices.';
        $data['categories'] = $this->CategoryModel->get_all_categories();
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }
}