<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pointsredeem extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('isLoggedIn')) {
            redirect('/');
        }
        $this->load->config('quiz');
        date_default_timezone_set(get_system_timezone());

        $this->category_type = $this->config->item('category_type');

        $this->result['full_logo'] = $this->db->where('type', 'full_logo')->get('tbl_settings')->row_array();
        $this->result['half_logo'] = $this->db->where('type', 'half_logo')->get('tbl_settings')->row_array();
        $this->result['app_name'] = $this->db->where('type', 'app_name')->get('tbl_settings')->row_array();

        $this->result['system_key'] = $this->db->where('type', 'system_key')->get('tbl_settings')->row_array();
        $this->result['configuration_key'] = $this->db->where('type', 'configuration_key')->get('tbl_settings')->row_array();
    }

    public function questioner() {
        if ($this->input->post('btnadd')) {
            $type_name = $this->input->post('type');
            $type = $this->category_type[$type_name];
            if (!has_permissions('create', 'categories')) {
                $this->session->set_flashdata('error', PERMISSION_ERROR_MSG);
            } else {
                $data = $this->Category_model->add_data($type);
                if ($data == FALSE) {
                    $this->session->set_flashdata('error', IMAGE_ALLOW_MSG);
                } else if($data === 3){
                    $this->session->set_flashdata('error', 'Slug Already Exists');
                } else if($data === 4){
                    $this->session->set_flashdata('error', 'Slug is required');
                } else {
                    $this->session->set_flashdata('success', 'Category created successfully.! ');
                }
            }
            redirect($type_name, 'refresh');
        }
        if ($this->input->post('btnupdate')) {
            $type_name = $this->input->post('type');
            $type = $this->category_type[$type_name];
            if (!has_permissions('update', 'categories')) {
                $this->session->set_flashdata('error', PERMISSION_ERROR_MSG);
            } else {
                $data1 = $this->Category_model->update_data();
                if ($data1 == FALSE) {
                    $this->session->set_flashdata('error', IMAGE_ALLOW_MSG);
                } else if($data1 === 3){
                    $this->session->set_flashdata('error', 'Slug Already Exists');
                } else if($data1 === 4){
                    $this->session->set_flashdata('error', 'Slug is required');
                } else {
                    $this->session->set_flashdata('success', 'Category updated successfully.!');
                }
            }
            redirect($type_name, 'refresh');
        }
        $this->result['language'] = $this->Language_model->get_data();
        $this->load->view('points-questionr', $this->result);
    }
    
    public function subscriber() {
        if ($this->input->post('btnadd')) {
            $type_name = $this->input->post('type');
            $type = $this->category_type[$type_name];
            if (!has_permissions('create', 'categories')) {
                $this->session->set_flashdata('error', PERMISSION_ERROR_MSG);
            } else {
                $data = $this->Category_model->add_data($type);
                if ($data == FALSE) {
                    $this->session->set_flashdata('error', IMAGE_ALLOW_MSG);
                } else if($data === 3){
                    $this->session->set_flashdata('error', 'Slug Already Exists');
                } else if($data === 4){
                    $this->session->set_flashdata('error', 'Slug is required');
                } else {
                    $this->session->set_flashdata('success', 'Category created successfully.! ');
                }
            }
            redirect($type_name, 'refresh');
        }
        if ($this->input->post('btnupdate')) {
            $type_name = $this->input->post('type');
            $type = $this->category_type[$type_name];
            if (!has_permissions('update', 'categories')) {
                $this->session->set_flashdata('error', PERMISSION_ERROR_MSG);
            } else {
                $data1 = $this->Category_model->update_data();
                if ($data1 == FALSE) {
                    $this->session->set_flashdata('error', IMAGE_ALLOW_MSG);
                } else if($data1 === 3){
                    $this->session->set_flashdata('error', 'Slug Already Exists');
                } else if($data1 === 4){
                    $this->session->set_flashdata('error', 'Slug is required');
                } else {
                    $this->session->set_flashdata('success', 'Category updated successfully.!');
                }
            }
            redirect($type_name, 'refresh');
        }
        $this->result['language'] = $this->Language_model->get_data();
        $this->load->view('points-subscriber', $this->result);
    }

}
