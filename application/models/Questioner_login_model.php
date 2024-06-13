<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Questioner_login_model extends CI_Model {

    public function get_user() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->db->from('tbl_questioner_list')->where('email', $username);
        $query = $this->db->get();
        $user = $query->row();

        if (!empty($user)) {
            if (verifyHashedPassword($password, $user->auth_pass) && strcmp($user->email, $username) == 0) {
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }

    public function change_password($aid, $apass) {
        $data = [
            'auth_pass' => $apass,
        ];
        $this->db->where('id', $aid);

        if ($this->db->update('tbl_questioner_list', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function get_category_data(){
         return $this->db->where('status', 1)->order_by('name', 'ASC')->get('tbl_questioner_category')->result();
    }
    
    public function register(){
        $identity_imege = $questioner_image = "";
        
        $contact = $this->input->post('contact');
        $contact_exist = $this->db->where('contact', $contact)->get('tbl_questioner_list')->row();
        if(!empty($contact_exist)){
            return 2;
        }
        
        $email = $this->input->post('email');
        $email_exist = $this->db->where('email', $email)->get('tbl_questioner_list')->row();
        if(!empty($email_exist)){
            return 3;
        }
        
        $username = $this->input->post('username');
        $username_exist = $this->db->where('auth_username', $username)->get('tbl_questioner_list')->row();
        if(!empty($username_exist)){
            return 4;
        }
        
        if (!is_dir(CATEGORY_IMG_PATH)) {
            mkdir(CATEGORY_IMG_PATH, 0777, TRUE);
        }
        if ($_FILES['identity_image']['name'] != '') {
            $config['upload_path'] = CATEGORY_IMG_PATH;
            $config['allowed_types'] = IMG_ALLOWED_TYPES;
            $config['file_name'] = time();
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('identity_image')) {
                $file_data = $this->upload->data();
                $identity_imege = $file_data['file_name'];
            }
        }

        
        if ($_FILES['questioner_image']['name'] != '') {
            $config['upload_path'] = CATEGORY_IMG_PATH;
            $config['allowed_types'] = IMG_ALLOWED_TYPES;
            $config['file_name'] = time();
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('questioner_image')) {
                $file_data = $this->upload->data();
                $questioner_image = $file_data['file_name'];
            }
        }
        
        $frm_data = array(
            'name' => $this->input->post('name'),
            'category' => $this->input->post('category'),
            'degenation' => $this->input->post('degination'),
            'contact' => $this->input->post('contact'),
            'email' => $this->input->post('email'),
            'identity_type' => $this->input->post('identity_type'),
            'identity_number' => $this->input->post('identity_no'),
            'identity_image' => $identity_imege,
            'questioner_image' => $questioner_image,
            'auth_username' => $this->input->post('username'),
            'auth_pass' => getHashedPassword($this->input->post('password')),
            'regestration' => date('Y-m-d h:i:s'),
        );
        $this->db->insert('tbl_questioner_list', $frm_data);
        return 1;
    }
    
    public function user_update($id){
        $data = $this->db->where('id', $id)->get('tbl_questioner_list')->row();
        $identity_imege = $data->identity_image;
        $questioner_image = $data->questioner_image;
        
        if (!is_dir(CATEGORY_IMG_PATH)) {
            mkdir(CATEGORY_IMG_PATH, 0777, TRUE);
        }
        if ($_FILES['identity_image']['name'] != '') {
            $config['upload_path'] = CATEGORY_IMG_PATH;
            $config['allowed_types'] = IMG_ALLOWED_TYPES;
            $config['file_name'] = time();
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('identity_image')) {
                $file_data = $this->upload->data();
                $identity_imege = $file_data['file_name'];
            }
        }

        
        if ($_FILES['questioner_image']['name'] != '') {
            $config['upload_path'] = CATEGORY_IMG_PATH;
            $config['allowed_types'] = IMG_ALLOWED_TYPES;
            $config['file_name'] = time();
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('questioner_image')) {
                $file_data = $this->upload->data();
                $questioner_image = $file_data['file_name'];
            }
        }
        
        $frm_data = array(
            'name' => $this->input->post('name'),
            'degenation' => $this->input->post('designation'),
            'identity_type' => $this->input->post('identity_type'),
            'identity_number' => $this->input->post('identity_no'),
            'identity_image' => $identity_imege,
            'questioner_image' => $questioner_image,
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_questioner_list', $frm_data);
        return 1;
    }
    
    public function get_user_data($id){
        return $this->db->where('id', $id)->get('tbl_questioner_list')->row();
    }

}
