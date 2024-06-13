<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Questioner extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('isLoggedIn')) {
            redirect('/');
        }
        $this->load->config('quiz');
        date_default_timezone_set(get_system_timezone());

        $this->category_type = $this->config->item('category_type');
        
        $this->load->model('Questioner_model');
        $this->load->model('Chapter_model');

        $this->result['full_logo'] = $this->db->where('type', 'full_logo')->get('tbl_settings')->row_array();
        $this->result['half_logo'] = $this->db->where('type', 'half_logo')->get('tbl_settings')->row_array();
        $this->result['app_name'] = $this->db->where('type', 'app_name')->get('tbl_settings')->row_array();

        $this->result['system_key'] = $this->db->where('type', 'system_key')->get('tbl_settings')->row_array();
        $this->result['configuration_key'] = $this->db->where('type', 'configuration_key')->get('tbl_settings')->row_array();
    }

    public function index() {
        if ($this->input->post('btnadd')) {
            $type_name = $this->input->post('type');
            $data = $this->Questioner_model->add_data();
            $this->session->set_flashdata('success', 'Category created successfully.! ');
            redirect($type_name, 'refresh');
        }
        if ($this->input->post('btnupdate')) {
            $type_name = $this->input->post('type');
            $data1 = $this->Questioner_model->update_data();
            $this->session->set_flashdata('success', 'Category updated successfully.!');
            redirect($type_name, 'refresh');
        }
        $this->result['language'] = $this->Language_model->get_data();
        $this->load->view('questionar_category', $this->result);
    }
    
    public function list(){
        if ($this->input->post('btnupdate')) {
            $type_name = $this->input->post('type');
            $data1 = $this->Questioner_model->update_questioner_data();
            $this->session->set_flashdata('success', 'Questioner updated successfully.!');
            redirect($type_name, 'refresh');
        }
        $this->result['language'] = $this->Language_model->get_data();
        $this->result['category'] = $this->Questioner_model->get_questioner_category();
        $this->load->view('questionar_list', $this->result);
    }
    
    public function get_all_questions(){
        if ($this->input->post('btnupdate')) {
            $type_name = $this->input->post('type');
            $data1 = $this->Questioner_model->update_question_data();
            $this->session->set_flashdata('success', 'Question updated successfully.!');
            redirect($type_name, 'refresh');
        }
        $this->result['category'] = $this->Chapter_model->get_category_data();
        $this->result['setting_data'] = $this->Chapter_model->get_option_data();
        $this->load->view('admin_question_list', $this->result);
    }
    
    public function get_approved_questions(){
        if ($this->input->post('btnupdate')) {
            $type_name = $this->input->post('type');
            $data1 = $this->Questioner_model->update_question_data();
            $this->session->set_flashdata('success', 'Question updated successfully.!');
            redirect($type_name, 'refresh');
        }
        $this->result['category'] = $this->Chapter_model->get_category_data();
        $this->load->view('approved_question_list', $this->result);
    }
    
    public function videos() {
        
        if ($this->input->post('btnadd')) {
            $type_name = $this->input->post('type');
            $data = $this->Questioner_model->add_video();
            $this->session->set_flashdata('success', 'Video created successfully.! ');
            redirect($type_name, 'refresh');
        }
        if ($this->input->post('btnupdate')) {
            $type_name = $this->input->post('type');
            $data1 = $this->Questioner_model->update_video();
            $this->session->set_flashdata('success', 'Video updated successfully.!');
            redirect($type_name, 'refresh');
        }
        $this->result['language'] = $this->Language_model->get_data();
        $this->result['category'] = $this->Chapter_model->get_category_data();
        $this->result['subcategory'] = $this->Chapter_model->get_subcategory_data();
        $this->result['subject'] = $this->Chapter_model->get_subject_data();
        $this->load->view('videos', $this->result);
    }
    
    public function study_metarial() {
        
        if ($this->input->post('btnadd')) {
            $type_name = $this->input->post('type');
            $data = $this->Questioner_model->add_study_metrial();
            $this->session->set_flashdata('success', 'Created successfully.! ');
            redirect($type_name, 'refresh');
        }
        if ($this->input->post('btnupdate')) {
            $type_name = $this->input->post('type');
            $data1 = $this->Questioner_model->update_study_metrial();
            $this->session->set_flashdata('success', 'Updated successfully.!');
            redirect($type_name, 'refresh');
        }
        $this->result['language'] = $this->Language_model->get_data();
        $this->result['category'] = $this->Chapter_model->get_category_data();
        $this->result['subcategory'] = $this->Chapter_model->get_subcategory_data();
        $this->result['subject'] = $this->Chapter_model->get_subject_data();
        $this->load->view('study_metrial', $this->result);
    }

}
