<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('isLoggedIn')) {
            redirect('/');
        }
        
        $this->load->model("Student_model");
        
        $this->load->config('quiz');
        date_default_timezone_set(get_system_timezone());

        $this->category_type = $this->config->item('category_type');

        $this->result['full_logo'] = $this->db->where('type', 'full_logo')->get('tbl_settings')->row_array();
        $this->result['half_logo'] = $this->db->where('type', 'half_logo')->get('tbl_settings')->row_array();
        $this->result['app_name'] = $this->db->where('type', 'app_name')->get('tbl_settings')->row_array();

        $this->result['system_key'] = $this->db->where('type', 'system_key')->get('tbl_settings')->row_array();
        $this->result['configuration_key'] = $this->db->where('type', 'configuration_key')->get('tbl_settings')->row_array();
    }

    public function category() {

        if ($this->input->post('btnadd')) {
            $type_name = $this->input->post('type');
            $data = $this->Student_model->add_data();
            $this->session->set_flashdata('success', 'Category created successfully.! ');
            redirect($type_name, 'refresh');
        }
        if ($this->input->post('btnupdate')) {
            $type_name = $this->input->post('type');
            $data1 = $this->Student_model->update_data();
            $this->session->set_flashdata('success', 'Category updated successfully.!');
            redirect($type_name, 'refresh');
        }
        $this->result['language'] = $this->Language_model->get_data();
        $this->load->view('student_category', $this->result);
    }
    
    public function category_delete(){
        $id = $this->input->get('id');
        $image_url = $this->input->get('image_url');
        $this->Student_model->delete_data($id, $image_url);
        echo TRUE;
    }
    
    public function subcategory() {

        if ($this->input->post('btnadd')) {
            $type_name = $this->input->post('type');
            $this->Student_model->add_subcategory();
            $this->session->set_flashdata('success', 'Sub category created successfully.! ');
            redirect($type_name, 'refresh');
        }
        if ($this->input->post('btnupdate')) {
            $type_name = $this->input->post('type');
            $data1 = $this->Student_model->update_subcategory();
            $this->session->set_flashdata('success', 'Sub category updated successfully.!');
            redirect($type_name, 'refresh');
        }
        $this->result['language'] = $this->Language_model->get_data();
        $this->result['category'] = $this->Student_model->get_category_data();
        $this->load->view('student_subcategory', $this->result);
    }
    
    public function subcategory_delete(){
        $id = $this->input->get('id');
        $image_url = $this->input->get('image_url');
        $this->Student_model->delete_sub_data($id, $image_url);
        echo TRUE;
    }

}
