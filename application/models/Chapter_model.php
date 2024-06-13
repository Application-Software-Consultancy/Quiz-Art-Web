<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Chapter_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->toDate = date('Y-m-d');
        $this->toDateTime = date('Y-m-d H:i:s');
        $this->load->database();
    }
    
    public function add_chapter_data(){
        $data['name'] = $this->input->post('name');
        $data['category'] = $this->input->post('category');
        $data['sub_category'] = $this->input->post('sub_category');
        $data['class'] = $this->input->post('class');
        $data['subject'] = $this->input->post('subject');
        $data['status'] = $this->input->post('status');
        $this->db->insert('chapters', $data);
        return true;
    }
    
    public function update_chapter_data(){
        $id = $this->input->post('edit_id');
        $name = $this->input->post('name');
        $category = $this->input->post('category');
        $sub_category = $this->input->post('sub_category');
        $class = $this->input->post('class');
        $subject = $this->input->post('subject');
        $status = $this->input->post('status');
        $frm_data = array(
            'name' => $name,
            'status' => $status,
            'category' => $category,
            'sub_category' => $sub_category,
            'class' => $class,
            'subject' => $subject,
        );
        $this->db->where('id', $id)->update('chapters', $frm_data);
        return TRUE;
    }

    
    public function get_category_data(){
         return $this->db->where('status', 1)->order_by('id', 'DESC')->get('subject_category')->result();
    }
    
    public function get_option_data(){
         return $this->db->where('type', 'total_max_lavel')->get('tbl_settings')->row();
    }
    
    public function get_subcategory_data(){
         return $this->db->where('status', 1)->order_by('id', 'DESC')->get('subject_category')->result();
    }
    
    public function get_subject_data(){
        return $this->db->where('status', 1)->order_by('id', 'DESC')->get('tbl_subject')->result();
    }

}

?>