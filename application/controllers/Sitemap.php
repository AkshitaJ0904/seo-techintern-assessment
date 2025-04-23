<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function sitemap() {
        $data['categories'] = $this->CategoryModel->get_all_categories();
        $data['products'] = $this->ProductModel->get_all_products();
        
        $this->output->set_content_type('application/xml');
        $this->load->view('sitemap', $data);
    }
}
