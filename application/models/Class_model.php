<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Class_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->toDate = date('Y-m-d');
        $this->toDateTime = date('Y-m-d H:i:s');
        $this->load->database();
    }

    public function add_data() {

        $data['category'] = $this->input->post('category');
        $data['sub_category'] = $this->input->post('sub_category');
        $data['name'] = $this->input->post('name');
        $data['status'] = $this->input->post('status');
        $this->db->insert('tbl_class', $data);
        return true;
    }
    
    public function delete_data($id, $image_url) {
        $this->db->where('id', $id)->delete('tbl_class');
    }
    
    public function get_category_data(){
         return $this->db->where('status', 1)->order_by('id', 'DESC')->get('subject_category')->result();
    }
    
    public function get_subcategory_data(){
         return $this->db->where('status', 1)->order_by('id', 'DESC')->get('tbl_subject_subcategory')->result();
    }
    
    public function get_class_data(){
        return $this->db->where('status', 1)->order_by('id', 'DESC')->get('tbl_class')->result();
    }
    
    public function get_selected_subcategory(){
        $id = $this->input->get('ids');
        return $this->db->where('status', 1)->where('cat_id', $id)->order_by('id', 'DESC')->get('tbl_subject_subcategory')->result();
    }
    
    public function get_selected_class(){
        $id = $this->input->get('ids');
        return $this->db->where('status', 1)->where('sub_category', $id)->order_by('id', 'DESC')->get('tbl_class')->result();
    }
    
    public function get_selected_subject(){
        $id = $this->input->get('ids');
        return $this->db->where('status', 1)->where('class', $id)->order_by('id', 'DESC')->get('tbl_subject')->result();
    }
    
    public function update_data() {
        $id = $this->input->post('edit_id');
        $name = $this->input->post('name');
        $status = $this->input->post('status');
        $category = $this->input->post('category');
        $sub_category = $this->input->post('sub_category');

        $frm_data = array(
            'name' => $name,
            'status' => $status,
            'category' => $category,
            'sub_category' => $sub_category,
        );
        $this->db->where('id', $id)->update('tbl_class', $frm_data);
        return TRUE;
    }
    
    public function get_selected_chapter(){
        $id = $this->input->get('ids');
        return $this->db->where('status', 1)->where('subject', $id)->order_by('id', 'DESC')->get('chapters')->result();
    }

}

?>