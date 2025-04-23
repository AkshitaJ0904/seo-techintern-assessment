<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryModel extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_all_categories() {
        $query = $this->db->get('categories');
        return $query->result();
    }
    
    public function get_category($id) {
        $query = $this->db->get_where('categories', array('id' => $id));
        return $query->row();
    }
    
    public function get_category_by_slug($slug) {
        $query = $this->db->get_where('categories', array('slug' => $slug));
        return $query->row();
    }
    
    public function create_category($data) {
        $this->db->insert('categories', $data);
        return $this->db->insert_id();
    }
    
    public function update_category($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('categories', $data);
    }
    
    public function delete_category($id) {
        $this->db->where('id', $id);
        return $this->db->delete('categories');
    }
    
    public function create_slug($name) {
        $slug = url_title($name, 'dash', TRUE);
        $count = 0;
        $original_slug = $slug;
        
        while (true) {
            $this->db->where('slug', $slug);
            $query = $this->db->get('categories');
            
            if ($query->num_rows() == 0) {
                break;
            }
            
            $count++;
            $slug = $original_slug . '-' . $count;
        }
        
        return $slug;
    }
}