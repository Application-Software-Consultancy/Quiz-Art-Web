<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->toDate = date('Y-m-d');
        $this->toDateTime = date('Y-m-d H:i:s');
        $this->load->database();
    }

    public function add_data() {

        if (!is_dir(CATEGORY_IMG_PATH)) {
            mkdir(CATEGORY_IMG_PATH, 0777, TRUE);
        }
        $img = "";
        if ($_FILES['image']['name'] != '') {
            $config['upload_path'] = CATEGORY_IMG_PATH;
            $config['allowed_types'] = IMG_ALLOWED_TYPES;
            $config['file_name'] = time();
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('image')) {
                $file_data = $this->upload->data();
                $img = $file_data['file_name'];
            }
        }

        $data['name'] = $this->input->post('name');
        $data['description'] = $this->input->post('description');
        $data['validity'] = $this->input->post('validity');
        $data['image'] = $img;
        $data['status'] = $this->input->post('status');
        $this->db->insert('tbl_student_category', $data);
        return true;
    }
    
    public function delete_data($id, $image_url) {
        if (file_exists($image_url)) {
            unlink($image_url);
        }
        $this->db->where('id', $id)->delete('tbl_student_category');
    }
    
    public function get_category_data(){
         return $this->db->where('status', 1)->order_by('id', 'DESC')->get('tbl_student_category')->result();
    }
    
    public function update_data() {
        if (!is_dir(CATEGORY_IMG_PATH)) {
            mkdir(CATEGORY_IMG_PATH, 0777, TRUE);
        }
        $id = $this->input->post('edit_id');
        $name = $this->input->post('name');
        $status = $this->input->post('status');
        $description = $this->input->post('description');
        $validity = $this->input->post('validity');
        
        if ($_FILES['image']['name'] == '') {
            $frm_data = array(
                'name' => $name,
                'status' => $status,
                'description' => $description,
                'validity' => $validity,
            );
            $this->db->where('id', $id)->update('tbl_student_category', $frm_data);
            return TRUE;
        } else {
            $config['upload_path'] = CATEGORY_IMG_PATH;
            $config['allowed_types'] = IMG_ALLOWED_TYPES;
            $config['file_name'] = time();
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')) {
                return FALSE;
            } else {
                $image_url = $this->input->post('image_url');
                if (file_exists($image_url)) {
                    unlink($image_url);
                }

                $data = $this->upload->data();
                $img = $data['file_name'];
                $frm_data = array(
                    'name' => $name,
                    'image' => $img,
                    'status' => $status,
                    'description' => $description,
                    'validity' => $validity,
                );
                $this->db->where('id', $id)->update('tbl_student_category', $frm_data);
                return TRUE;
            }
        }
    }
    
    public function add_subcategory(){
        if (!is_dir(CATEGORY_IMG_PATH)) {
            mkdir(CATEGORY_IMG_PATH, 0777, TRUE);
        }
        $img = "";
        if ($_FILES['image']['name'] != '') {
            $config['upload_path'] = CATEGORY_IMG_PATH;
            $config['allowed_types'] = IMG_ALLOWED_TYPES;
            $config['file_name'] = time();
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('image')) {
                $file_data = $this->upload->data();
                $img = $file_data['file_name'];
            }
        }

        $data['cat_id'] = $this->input->post('category');
        $data['name'] = $this->input->post('name');
        $data['fees'] = $this->input->post('fees');
        $data['prize'] = $this->input->post('prize');
        $data['description'] = $this->input->post('description');
        $data['image'] = $img;
        $data['status'] = $this->input->post('status');
        $this->db->insert('tbl_student_subcategory', $data);
        return true;
    }
    
    public function delete_sub_data($id, $image_url) {
        if (file_exists($image_url)) {
            unlink($image_url);
        }
        $this->db->where('id', $id)->delete('tbl_student_subcategory');
    }
    
    public function update_subcategory(){
        if (!is_dir(CATEGORY_IMG_PATH)) {
            mkdir(CATEGORY_IMG_PATH, 0777, TRUE);
        }
        $id = $this->input->post('edit_id');
        $name = $this->input->post('name');
        $status = $this->input->post('status');
        $description = $this->input->post('description');
        $category = $this->input->post('category');
        $prize = $this->input->post('prize');
        $fees = $this->input->post('fees');
        
        if ($_FILES['image']['name'] == '') {
            $frm_data = array(
                'name' => $name,
                'status' => $status,
                'description' => $description,
                'cat_id' => $category,
                'fees' => $fees,
                'prize' => $prize,
            );
            $this->db->where('id', $id)->update('tbl_student_subcategory', $frm_data);
            return TRUE;
        } else {
            $config['upload_path'] = CATEGORY_IMG_PATH;
            $config['allowed_types'] = IMG_ALLOWED_TYPES;
            $config['file_name'] = time();
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')) {
                return FALSE;
            } else {
                $image_url = $this->input->post('image_url');
                if (file_exists($image_url)) {
                    unlink($image_url);
                }

                $data = $this->upload->data();
                $img = $data['file_name'];
                $frm_data = array(
                    'name' => $name,
                    'image' => $img,
                    'status' => $status,
                    'description' => $description,
                    'cat_id' => $category,
                    'fees' => $fees,
                    'prize' => $prize,
                );
                $this->db->where('id', $id)->update('tbl_student_subcategory', $frm_data);
                return TRUE;
            }
        }
    }

}

?>