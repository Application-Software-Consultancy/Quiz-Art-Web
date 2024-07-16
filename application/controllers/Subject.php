<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('isLoggedIn')) {
            redirect('/');
        }
        
        $this->load->model("Subject_model");
        $this->load->model("Class_model");
        
        $this->load->config('quiz');
        date_default_timezone_set(get_system_timezone());

        $this->category_type = $this->config->item('category_type');

        $this->result['full_logo'] = $this->db->where('type', 'full_logo')->get('tbl_settings')->row_array();
        $this->result['half_logo'] = $this->db->where('type', 'half_logo')->get('tbl_settings')->row_array();
        $this->result['app_name'] = $this->db->where('type', 'app_name')->get('tbl_settings')->row_array();

        $this->result['system_key'] = $this->db->where('type', 'system_key')->get('tbl_settings')->row_array();
        $this->result['configuration_key'] = $this->db->where('type', 'configuration_key')->get('tbl_settings')->row_array();
    }
    
    public function index(){
        if ($this->input->post('btnadd')) {
            $type_name = $this->input->post('type');
            $data = $this->Subject_model->add_subject_data();
            $this->session->set_flashdata('success', 'Subject created successfully.! ');
            redirect($type_name, 'refresh');
        }
        if ($this->input->post('btnupdate')) {
            $type_name = $this->input->post('type');
            $data1 = $this->Subject_model->update_subject_data();
            $this->session->set_flashdata('success', 'Subject updated successfully.!');
            redirect($type_name, 'refresh');
        }
        $this->result['category'] = $this->Class_model->get_category_data();
        $this->result['subcategory'] = $this->Class_model->get_subcategory_data();
        $this->result['class'] = $this->Class_model->get_class_data();
        $this->result['language'] = $this->Language_model->get_data();
        $this->load->view('subject', $this->result);
    }

    public function category() {

        if ($this->input->post('btnadd')) {
            // $this->delete_cache();
            $type_name = $this->input->post('type');
            $data = $this->Subject_model->add_data();
            $this->session->set_flashdata('success', 'Category created successfully.! ');
            redirect($type_name, 'refresh');
        }
        if ($this->input->post('btnupdate')) {
            $type_name = $this->input->post('type');
            $data1 = $this->Subject_model->update_data();
            $this->session->set_flashdata('success', 'Category updated successfully.!');
            redirect($type_name, 'refresh');
        }
        $this->result['language'] = $this->Language_model->get_data();
        $this->load->view('subject_category', $this->result);
    }
    
    public function category_delete(){
        $id = $this->input->get('id');
        $image_url = $this->input->get('image_url');
        $this->Subject_model->delete_data($id, $image_url);
        echo TRUE;
    }
    
    public function subcategory() {

        if ($this->input->post('btnadd')) {
            $type_name = $this->input->post('type');
            $this->Subject_model->add_subcategory();
            $this->session->set_flashdata('success', 'Sub category created successfully.! ');
            redirect($type_name, 'refresh');
        }
        if ($this->input->post('btnupdate')) {
            $type_name = $this->input->post('type');
            $data1 = $this->Subject_model->update_subcategory();
            $this->session->set_flashdata('success', 'Sub category updated successfully.!');
            redirect($type_name, 'refresh');
        }
        $this->result['language'] = $this->Language_model->get_data();
        $this->result['category'] = $this->Subject_model->get_category_data();
        $this->load->view('subject_sub_category', $this->result);
    }
    
    public function subcategory_delete(){
        $id = $this->input->get('id');
        $image_url = $this->input->get('image_url');
        $this->Subject_model->delete_sub_data($id, $image_url);
        echo TRUE;
    }
    
    function delete_cache() {
        preg_match("/(\/index.php)(?<endpoint>\/[\w.-\/]*)/", 
        $_SERVER["HTTP_REFERER"], $result);
        $this->output->delete_cache($result["endpoint"]);
        redirect($result["endpoint"]);
    }

}
