<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        // Simple admin authentication
        if ($this->uri->segment(2) != 'login' && $this->uri->segment(1) == 'admin') {
            if (!$this->session->userdata('admin_logged_in')) {
                redirect('admin/login');
            }
        }
    }
    
    public function index() {
        redirect('admin/login');
    }
    
    public function login() {
        $data['title'] = 'Admin Login';
        
        if ($this->input->post()) {
            // Simplified login (in a real app, you'd validate against database)
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            // Hardcoded admin credentials for demonstration
            if ($username == 'admin' && $password == 'password') {
                $this->session->set_userdata('admin_logged_in', true);
                redirect('admin/dashboard');
            } else {
                $data['error'] = 'Invalid username or password';
            }
        }
        
        $this->load->view('admin/login', $data);
    }
    
    public function logout() {
        $this->session->unset_userdata('admin_logged_in');
        redirect('admin/login');
    }
    
    public function dashboard() {
        $data['title'] = 'Admin Dashboard';
        $data['categories_count'] = count($this->CategoryModel->get_all_categories());
        $data['products_count'] = count($this->ProductModel->get_all_products());
        
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/admin_footer');
    }
    
    // Category management
    public function categories() {
        $data['title'] = 'Manage Categories';
        $data['categories'] = $this->CategoryModel->get_all_categories();
        
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/categories/index', $data);
        $this->load->view('templates/admin_footer');
    }
    
    public function create_category() {
        $data['title'] = 'Create Category';
        
        $this->form_validation->set_rules('name', 'Category Name', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('admin/categories/create', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $category_data = array(
                'name' => $this->input->post('name'),
                'slug' => $this->CategoryModel->create_slug($this->input->post('name'))
            );
            
            $this->CategoryModel->create_category($category_data);
            $this->session->set_flashdata('success', 'Category created successfully');
            redirect('admin/categories');
        }
    }
    
    public function edit_category($id) {
        $data['title'] = 'Edit Category';
        $data['category'] = $this->CategoryModel->get_category($id);
        
        if (empty($data['category'])) {
            show_404();
        }
        
        $this->form_validation->set_rules('name', 'Category Name', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('admin/categories/edit', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $category_data = array(
                'name' => $this->input->post('name'),
                'slug' => $this->CategoryModel->create_slug($this->input->post('name'))
            );
            
            $this->CategoryModel->update_category($id, $category_data);
            $this->session->set_flashdata('success', 'Category updated successfully');
            redirect('admin/categories');
        }
    }
    
    public function delete_category($id) {
        $category = $this->CategoryModel->get_category($id);
        
        if (empty($category)) {
            show_404();
        }
        
        $this->CategoryModel->delete_category($id);
        $this->session->set_flashdata('success', 'Category deleted successfully');
        redirect('admin/categories');
    }
    
    // Product management
    public function products() {
        $data['title'] = 'Manage Products';
        $data['products'] = $this->ProductModel->get_all_products();
        
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/products/index', $data);
        $this->load->view('templates/admin_footer');
    }
    
    public function create_product() {
        $data['title'] = 'Create Product';
        $data['categories'] = $this->CategoryModel->get_all_categories();
        
        $this->form_validation->set_rules('title', 'Product Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');
        $this->form_validation->set_rules('features', 'Features', 'required');
        $this->form_validation->set_rules('category_id', 'Category', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('admin/products/create', $data);
            $this->load->view('templates/admin_footer');
        } else {
            // Convert features to JSON format
            $features = explode("\n", $this->input->post('features'));
            $features = array_map('trim', $features);
            $features = array_filter($features);
            
            $product_data = array(
                'title' => $this->input->post('title'),
                'slug' => $this->ProductModel->create_slug($this->input->post('title')),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                'features' => json_encode($features),
                'category_id' => $this->input->post('category_id')
            );
            
            $this->ProductModel->create_product($product_data);
            $this->session->set_flashdata('success', 'Product created successfully');
            redirect('admin/products');
        }
    }
    
    public function edit_product($id) {
        $data['title'] = 'Edit Product';
        $data['product'] = $this->ProductModel->get_product($id);
        $data['categories'] = $this->CategoryModel->get_all_categories();
        
        if (empty($data['product'])) {
            show_404();
        }
        
        // Convert JSON features to newline-separated text for form
        $features = json_decode($data['product']->features);

        if (!is_array($features)) {
            $features = [$features]; // Wrap the single string into an array
        }
        $data['features_text'] = implode("\n", $features);
        
        $this->form_validation->set_rules('title', 'Product Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');
        $this->form_validation->set_rules('features', 'Features', 'required');
        $this->form_validation->set_rules('category_id', 'Category', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('admin/products/edit', $data);
            $this->load->view('templates/admin_footer');
        } else {
            // Convert features to JSON format
            $features = explode("\n", $this->input->post('features'));
            $features = array_map('trim', $features);
            $features = array_filter($features);
            
            $product_data = array(
                'title' => $this->input->post('title'),
                'slug' => $this->ProductModel->create_slug($this->input->post('title')),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                'features' => json_encode($features),
                'category_id' => $this->input->post('category_id')
            );
            
            $this->ProductModel->update_product($id, $product_data);
            $this->session->set_flashdata('success', 'Product updated successfully');
            redirect('admin/products');
        }
    }
    
    public function delete_product($id) {
        $product = $this->ProductModel->get_product($id);
        
        if (empty($product)) {
            show_404();
        }
        
        $this->ProductModel->delete_product($id);
        $this->session->set_flashdata('success', 'Product deleted successfully');
        redirect('admin/products');
    }
}