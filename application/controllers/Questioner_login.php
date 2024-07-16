<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Questioner_login extends CI_Controller {

    /**  This is default constructor of the class */
    public function __construct() {
        parent::__construct();
        $this->load->helper('password_helper');
        $this->load->library('session');
        
        $this->load->model('Questioner_login_model');

        $this->result['full_logo'] = $this->db->where('type', 'full_logo')->get('tbl_settings')->row_array();
        $this->result['half_logo'] = $this->db->where('type', 'half_logo')->get('tbl_settings')->row_array();
        $this->result['app_name'] = $this->db->where('type', 'app_name')->get('tbl_settings')->row_array();
        $this->result['background_file'] = $this->db->where('type', 'background_file')->get('tbl_settings')->row_array();

        $this->result['system_key'] = $this->db->where('type', 'system_key')->get('tbl_settings')->row_array();
        $this->result['configuration_key'] = $this->db->where('type', 'configuration_key')->get('tbl_settings')->row_array();
    }

    /**  Index Page for this controller. */
    public function index() {
        $this->isLoggedIn();
    }
    
    public function register(){
        if ($this->input->post('btnadd')) {
            $type_name = $this->input->post('type');
            $password = $this->input->post('password');
            $c_password = $this->input->post('confirm_password');
            
            if($password != $c_password){
                $this->session->set_flashdata('error', 'Password not match !');
                redirect('questioner-register', 'refresh');
            }
            
            $data = $this->Questioner_login_model->register();
            if($data == "2"){
                $this->session->set_flashdata('error', 'Phone number Already Exist !');
                redirect('questioner-register', 'refresh');
            }else if($data == "3"){
                $this->session->set_flashdata('error', 'Email Already Exist !');
                redirect('questioner-register', 'refresh');
            }else if($data == "4"){
                $this->session->set_flashdata('error', 'Username Already Exist !');
                redirect('questioner-register', 'refresh');
            }else{
                $this->session->set_flashdata('success', 'Registration Successfully..');
                redirect('questioner-login', 'refresh');
            }
        }
        $this->result['category'] = $this->Questioner_login_model->get_category_data();
        $this->load->view('questioner_register', $this->result);
    }

    /*     * This function used to check the user is logged in or not */

    function isLoggedIn() {
        $isLoggedIn = $this->session->userdata('isqLoggedIn');
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            $this->load->view('questioner_login', $this->result);
        } else {
            $json_file = 'assets/firebase_config.json';
            if (!file_exists($json_file)) {
                redirect('firebase-configurations');
            } else {
                redirect('Questioner_dashboard');
            }
        }
    }

    /*     * * This function used to logged in user */

    public function loginQuestioner() {
        $result = $this->Questioner_login_model->get_user();
        if ($result) {
            
            if($result->status == "0" || $result->stand == "0"){
                $this->session->set_flashdata('error', 'Within 24 Hrs Your Profile will be Review & Approve');
                redirect('questioner-login', 'refresh');
            }
            
            $sessionArray = array(
                'qName' => $result->auth_username,
                'qId' => $result->id,
                'qRole' => $result->role,
                'qStatus' => $result->status,
                'qImage' => $result->questioner_image,
                'qEmail' => $result->email,
                'isqLoggedIn' => TRUE
            );
            $this->session->set_userdata($sessionArray);
            $this->isLoggedIn();
        } else {
            $this->session->set_flashdata('error', 'Invalid Username or Password');
            redirect('questioner-login', 'refresh');
        }
        $this->load->view('login', $this->result);
    }
    
    public function registerQuestioner(){
        
    }

    public function checkOldPass() {
        $oldpass = $this->input->post('oldpass');

        //fetch old password from database
        $aname = $this->session->userdata('qName');
        $row = $this->db->where('auth_username', $aname)->get('tbl_questioner_list')->row();
        if (verifyHashedPassword($oldpass, $row->auth_pass)) {
            echo json_encode("True");
        } else {
            echo json_encode("False");
        }
    }

    public function resetpassword() {
        if (!$this->session->userdata('isqLoggedIn')) {
            redirect('login');
        } else {
            if ($this->input->post('btnchange')) {
                if (!has_permissions('create', 'resetpassword')) {
                    $this->session->set_flashdata('error', PERMISSION_ERROR_MSG);
                } else {
                    $newpass = $this->input->post('newpassword');
                    $confirmpass = $this->input->post('confirmpassword');
                    if ($newpass == $confirmpass) {

                        $adminId = $this->session->userdata('qId');

                        $adminpass = getHashedPassword($confirmpass);
                        //change password
                        $this->Questioner_login_model->change_password($adminId, $adminpass);
                        $this->session->set_flashdata('success', 'Password Change Successfully..');
                    } else {
                        $this->session->set_flashdata('error', 'New and Confirm Password not Match..');
                    }
                }
                redirect('questioner-reset-password', 'refresh');
            }
            $this->load->view('QuestionerChangePassword', $this->result);
        }
    }

    public function logout() {
        $this->session->unset_userdata('isqLoggedIn');
        $this->session->sess_destroy();
        redirect('questioner-login');
    }
    
    public function add(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('contact', 'Contact', 'required|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('identity_type', 'Identity type', 'required');
        $this->form_validation->set_rules('identity_no', 'Identity no', 'required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if (empty($_FILES['identity_image']['name']))
        {
            $this->form_validation->set_rules('identity_image', 'Identity image', 'required');
        }
        if (empty($_FILES['questioner_image']['name']))
        {
            $this->form_validation->set_rules('questioner_image', 'Questioner image', 'required');
        }

        if ($this->form_validation->run() == FALSE)
        {
            $errors = $this->form_validation->error_array();
            echo json_encode([
                "status" => "false",
                "msg" => $errors,
            ]);
        }
        else{
            
            $data = $this->Questioner_login_model->register();
            if($data == "2"){
                $errors = ['contact'=>'Phone number Already Exist !'];
                echo json_encode([
                    "status" => "false",
                    "msg" => $errors,
                ]);
            }else if($data == "3"){
                $errors = ['email'=>'Email Already Exist !'];
                echo json_encode([
                    "status" => "false",
                    "msg" => $errors,
                ]);
            }else if($data == "4"){
                $errors = ['username'=>'Username Already Exist !'];
                echo json_encode([
                    "status" => "false",
                    "msg" => $errors,
                ]);
            }else{
                echo json_encode([
                    "status" => "true",
                    "msg" => 'Within 24 Hrs Your Profile will be Review & Approve !',
                    "return_url" => base_url().'questioner-login',
                ]);
            }
        }
    }
    
    public function user_profile(){
        if (!$this->session->userdata('isqLoggedIn')) {
            redirect('login');
        } else {
            if ($this->input->post('btnadd')) {
                $adminId = $this->session->userdata('qId');
                $data = $this->Questioner_login_model->user_update($adminId);
                $this->session->set_flashdata('success', 'Update Succesfully..!');
                redirect('questioner-profile', 'refresh');
            }
            $id = $aname = $this->session->userdata('qId');
            $this->result['userdata'] = $this->Questioner_login_model->get_user_data($id);
            $this->result['category'] = $this->Questioner_login_model->get_category_data();
            $this->load->view('questioner-profile', $this->result);
        }
    }

}
