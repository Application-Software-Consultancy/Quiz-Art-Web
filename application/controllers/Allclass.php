<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Allclass extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // if (!$this->session->userdata('isLoggedIn')) {
        //     redirect('/');
        // }
        $this->load->config('quiz');
        date_default_timezone_set(get_system_timezone());
        
        $this->load->model("Class_model");

        $this->category_type = $this->config->item('category_type');

        $this->result['full_logo'] = $this->db->where('type', 'full_logo')->get('tbl_settings')->row_array();
        $this->result['half_logo'] = $this->db->where('type', 'half_logo')->get('tbl_settings')->row_array();
        $this->result['app_name'] = $this->db->where('type', 'app_name')->get('tbl_settings')->row_array();

        $this->result['system_key'] = $this->db->where('type', 'system_key')->get('tbl_settings')->row_array();
        $this->result['configuration_key'] = $this->db->where('type', 'configuration_key')->get('tbl_settings')->row_array();
    }

    public function index() {
        
        if ($this->input->post('btnadd')) {
            $type_name = $this->input->post('type');
            $data = $this->Class_model->add_data();
            $this->session->set_flashdata('success', 'Class created successfully.! ');
            redirect($type_name, 'refresh');
        }
        if ($this->input->post('btnupdate')) {
            $type_name = $this->input->post('type');
            $data1 = $this->Class_model->update_data();
            $this->session->set_flashdata('success', 'Class updated successfully.!');
            redirect($type_name, 'refresh');
        }
        $this->result['language'] = $this->Language_model->get_data();
        $this->result['category'] = $this->Class_model->get_category_data();
        $this->result['subcategory'] = $this->Class_model->get_subcategory_data();
        $this->load->view('all-class', $this->result);
    }

    
    public function get_subcategory(){
        $subcategory = $this->Class_model->get_selected_subcategory();
        $option = '<select name="sub_category" class="form-control sub_category" required><option value="">Select Category</option>';
        foreach($subcategory as $res){
            $option .= '<option value="'.$res->id.'">'.$res->name.'</option>';
        }
        $option.='</select>';
        echo $option;
    }
    
    public function get_class(){
        $class = $this->Class_model->get_selected_class();
        $option = '<select name="class" class="form-control class_select" required><option value="">Select Category</option>';
        foreach($class as $res){
            $option .= '<option value="'.$res->id.'">'.$res->name.'</option>';
        }
        $option.='</select>';
        echo $option;
    }
    
    public function get_subject(){
        $class = $this->Class_model->get_selected_subject();
        $option = '<select name="subject" class="form-control subject_select" required><option value="">Select Category</option>';
        foreach($class as $res){
            $option .= '<option value="'.$res->id.'">'.$res->name.'</option>';
        }
        $option.='</select>';
        echo $option;
    }
    
    public function get_chapter(){
        $class = $this->Class_model->get_selected_chapter();
        $option = '<select name="chapter" class="form-control" required><option value="">Select Chapter</option>';
        foreach($class as $res){
            $option .= '<option value="'.$res->id.'">'.$res->name.'</option>';
        }
        $option.='</select>';
        echo $option;
    }

}