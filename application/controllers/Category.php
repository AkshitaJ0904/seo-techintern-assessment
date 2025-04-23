<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function view($slug) {
        $category = $this->CategoryModel->get_category_by_slug($slug);
        
        if (empty($category)) {
            show_404();
        }
        
        $data['title'] = $category->name . ' - Browse Products';
        $data['meta_description'] = 'Explore our range of ' . $category->name . ' products. Find the best ' . $category->name . ' at competitive prices.';
        $data['category'] = $category;
        $data['products'] = $this->ProductModel->get_products_by_category($category->id);
        
        $this->load->view('templates/header', $data);
        $this->load->view('category/index', $data);
        $this->load->view('templates/footer');
    }
}