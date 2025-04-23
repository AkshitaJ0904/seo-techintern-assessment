<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_all_products() {
        $this->db->select('products.*, categories.name as category_name');
        $this->db->from('products');
        $this->db->join('categories', 'products.category_id = categories.id');
        $this->db->order_by('products.created_at', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_products_by_category($category_id) {
        $this->db->where('category_id', $category_id);
        $query = $this->db->get('products');
        return $query->result();
    }
    
    public function get_products_by_category_slug($slug) {
        $this->db->select('products.*');
        $this->db->from('products');
        $this->db->join('categories', 'products.category_id = categories.id');
        $this->db->where('categories.slug', $slug);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_product($id) {
        $this->db->select('products.*, categories.name as category_name, categories.slug as category_slug');
        $this->db->from('products');
        $this->db->join('categories', 'products.category_id = categories.id');
        $this->db->where('products.id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function get_product_by_slug($slug) {
        $this->db->select('products.*, categories.name as category_name, categories.slug as category_slug');
        $this->db->from('products');
        $this->db->join('categories', 'products.category_id = categories.id');
        $this->db->where('products.slug', $slug);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function create_product($data) {
        $this->db->insert('products', $data);
        return $this->db->insert_id();
    }
    
    public function update_product($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('products', $data);
    }
    
    public function delete_product($id) {
        $this->db->where('id', $id);
        return $this->db->delete('products');
    }
    
    public function create_slug($title) {
        $slug = url_title($title, 'dash', TRUE);
        $count = 0;
        $original_slug = $slug;
        
        while (true) {
            $this->db->where('slug', $slug);
            $query = $this->db->get('products');
            
            if ($query->num_rows() == 0) {
                break;
            }
            
            $count++;
            $slug = $original_slug . '-' . $count;
        }
        
        return $slug;
    }
}