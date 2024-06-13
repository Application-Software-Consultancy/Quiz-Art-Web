<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Questioner_model extends CI_Model {

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
        $data['fees'] = $this->input->post('fees');
        $data['prize'] = $this->input->post('prize');
        $data['validity'] = $this->input->post('validity');
        $data['description'] = $this->input->post('description');
        $data['image'] = $img;
        $data['status'] = $this->input->post('status');
        $this->db->insert('tbl_questioner_category', $data);
        return true;
    }
    
    public function delete_data($id, $image_url) {
        if (file_exists($image_url)) {
            unlink($image_url);
        }
        $this->db->where('id', $id)->delete('tbl_questioner_category');
    }
    
    public function get_category_data(){
         return $this->db->where('status', 1)->order_by('id', 'DESC')->get('tbl_student_category')->result();
    }
    
    public function get_questioner_category(){
         return $this->db->where('status', 1)->order_by('id', 'DESC')->get('tbl_questioner_category')->result();
    }
    
    public function update_data() {
        if (!is_dir(CATEGORY_IMG_PATH)) {
            mkdir(CATEGORY_IMG_PATH, 0777, TRUE);
        }
        $id = $this->input->post('edit_id');
        $name = $this->input->post('name');
        $status = $this->input->post('status');
        $description = $this->input->post('description');
        $fees = $this->input->post('fees');
        $prize = $this->input->post('prize');
        $validity = $this->input->post('validity');
        
        if ($_FILES['image']['name'] == '') {
            $frm_data = array(
                'name' => $name,
                'status' => $status,
                'description' => $description,
                'fees' => $fees,
                'prize' => $prize,
                'validity' => $validity,
            );
            $this->db->where('id', $id)->update('tbl_questioner_category', $frm_data);
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
                    'fees' => $fees,
                    'prize' => $prize,
                    'validity' => $validity,
                );
                $this->db->where('id', $id)->update('tbl_questioner_category', $frm_data);
                return TRUE;
            }
        }
    }
    
    public function update_questioner_data() {
        $id = $this->input->post('edit_id');
        $status = $this->input->post('status');
        $stand = $this->input->post('stand');

        $frm_data = array(
            'status' => $status,
            'stand' => $stand,
        );
        $this->db->where('id', $id)->update('tbl_questioner_list', $frm_data);
        return TRUE;
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
    
    public function add_question_data() {
        if (!is_dir(QUESTION_IMG_PATH)) {
            mkdir(QUESTION_IMG_PATH, 0777, TRUE);
        }
        $question = $this->input->post('question');
        $category = $this->input->post('category');
        $subcategory = $this->input->post('sub_category');
        $class = $this->input->post('class');
        $subject = $this->input->post('subject');
        $chapter = $this->input->post('chapter');
        $a = $this->input->post('a');
        $b = $this->input->post('b');
        $c = $this->input->post('c');
        $d = $this->input->post('d');
        $level = $this->input->post('level');
        $answer = $this->input->post('answer');
        $note = $this->input->post('note');

        $user_id = $this->session->userdata('qId');

        $frm_data = array(
            'user_id' => $user_id,
            'question' => $question,
            'category' => $category,
            'sub_category' => $subcategory,
            'class' => $class,
            'subject' => $subject,
            'chapter' => $chapter,
            'optiona' => $a,
            'optionb' => $b,
            'optionc' => $c,
            'optiond' => $d,
            'answer' => $answer,
            'level' => $level,
            'note' => $note
        );
        $this->db->insert('tbl_questioner_question', $frm_data);
        return TRUE;
    }
    
    public function add_question_all_data() {

        $question_id = $this->input->post('edit_id');
        $question = $this->input->post('question');
        $category = $this->input->post('category');
        $subcategory = $this->input->post('sub_category');
        $class = $this->input->post('class');
        $subject = $this->input->post('subject');
        $chapter = $this->input->post('chapter');
        $a = $this->input->post('a');
        $b = $this->input->post('b');
        $c = $this->input->post('c');
        $d = $this->input->post('d');
        $level = $this->input->post('level');
        $answer = $this->input->post('answer');
        $note = $this->input->post('note');

        $frm_data = array(
            'question' => $question,
            'category' => $category,
            'sub_category' => $subcategory,
            'class' => $class,
            'subject' => $subject,
            'chapter' => $chapter,
            'optiona' => $a,
            'optionb' => $b,
            'optionc' => $c,
            'optiond' => $d,
            'answer' => $answer,
            'level' => $level,
            'note' => $note,
            'status' => '0'
        );
        $this->db->where('id', $question_id)->update('tbl_questioner_question', $frm_data);
        return TRUE;
    }
    
    public function update_question_data(){
        $id = $this->input->post('edit_id');
        $status = $this->input->post('status');
        $lavel = $this->input->post('lavel');
        $points = $this->input->post('points');
        
        $frm_data = array(
            'status' => $status,
            'lavel' => $lavel,
            'points' => $points,
        );
        $this->db->where('id', $id)->update('tbl_questioner_question', $frm_data);
        return TRUE;
    }
    
    public function get_all_data($id){
        $this->db->select('tbl_questioner_question.*, tbl_subject_subcategory.name as sub_name, tbl_class.name as class_name, tbl_subject.name as subject_name, chapters.name as chapter_name');
        $this->db->from('tbl_questioner_question');
        $this->db->where('tbl_questioner_question.id', $id);
        $this->db->join('tbl_subject_subcategory', 'tbl_subject_subcategory.id = tbl_questioner_question.category', 'left');
        $this->db->join('tbl_class', 'tbl_class.id = tbl_questioner_question.class', 'left');
        $this->db->join('tbl_subject', 'tbl_subject.id = tbl_questioner_question.subject', 'left');
        $this->db->join('chapters', 'chapters.id = tbl_questioner_question.chapter', 'left');
        return $this->db->get()->row();
    }
    
    public function add_video(){
        if (!is_dir(CATEGORY_IMG_PATH)) {
            mkdir(CATEGORY_IMG_PATH, 0777, TRUE);
        }
        $category = $this->input->post('category');
        $subcategory = $this->input->post('sub_category');
        $class = $this->input->post('class');
        $subject = $this->input->post('subject');
        $title = $this->input->post('video_title');
        $description = $this->input->post('description');
        
        $config['upload_path'] = CATEGORY_IMG_PATH;
        $config['allowed_types'] = AUDIO_ALLOWED_TYPES;
        $config['file_name'] = time();
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $img = "";
        if ($this->upload->do_upload('video_link')) {
            $data = $this->upload->data();
            $img = $data['file_name'];
        }

        $frm_data = array(
            'title' => $title,
            'link' => $img,
            'category' => $category,
            'sub_category' => $subcategory,
            'class' => $class,
            'subject' => $subject,
            'description' => $description,
        );

        $this->db->insert('videos', $frm_data);
        return TRUE;
    }
    
    public function update_video(){
        if (!is_dir(CATEGORY_IMG_PATH)) {
            mkdir(CATEGORY_IMG_PATH, 0777, TRUE);
        }
        $id = $this->input->post('edit_id');
        $category = $this->input->post('category');
        $subcategory = $this->input->post('sub_category');
        $class = $this->input->post('class');
        $subject = $this->input->post('subject');
        $title = $this->input->post('video_title');
        $description = $this->input->post('description');
        $status = $this->input->post('status');
        
        $frm_data = array(
            'title' => $title,
            'category' => $category,
            'sub_category' => $subcategory,
            'class' => $class,
            'subject' => $subject,
            'description' => $description,
            'status' => $status
        );

        if ($_FILES['video_link']['name'] != '') {
            $config['upload_path'] = CATEGORY_IMG_PATH;
            $config['allowed_types'] = AUDIO_ALLOWED_TYPES;
            $config['file_name'] = time();
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('video_link')) {
                $data = $this->upload->data();
                $img = $data['file_name'];
                $frm_data['link'] = $img;
            }
        }

        $this->db->where('id', $id)->update('videos', $frm_data);
        return TRUE;
    }
    
    public function add_study_metrial(){
        if (!is_dir(CATEGORY_IMG_PATH)) {
            mkdir(CATEGORY_IMG_PATH, 0777, TRUE);
        }
        $category = $this->input->post('category');
        $subcategory = $this->input->post('sub_category');
        $class = $this->input->post('class');
        $subject = $this->input->post('subject');
        $title = $this->input->post('video_title');
        $description = $this->input->post('description');
        
        $config['upload_path'] = CATEGORY_IMG_PATH;
        $config['allowed_types'] = AUDIO_ALLOWED_TYPES;
        $config['file_name'] = time();
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $img = "";
        if ($this->upload->do_upload('video_link')) {
            $data = $this->upload->data();
            $img = $data['file_name'];
        }

        $frm_data = array(
            'title' => $title,
            'link' => $img,
            'category' => $category,
            'sub_category' => $subcategory,
            'class' => $class,
            'subject' => $subject,
            'description' => $description,
        );

        $this->db->insert('study_metrial', $frm_data);
        return TRUE;
    }
    
    public function update_study_metrial(){
        if (!is_dir(CATEGORY_IMG_PATH)) {
            mkdir(CATEGORY_IMG_PATH, 0777, TRUE);
        }
        $id = $this->input->post('edit_id');
        $category = $this->input->post('category');
        $subcategory = $this->input->post('sub_category');
        $class = $this->input->post('class');
        $subject = $this->input->post('subject');
        $title = $this->input->post('video_title');
        $description = $this->input->post('description');
        $status = $this->input->post('status');
        
        $frm_data = array(
            'title' => $title,
            'category' => $category,
            'sub_category' => $subcategory,
            'class' => $class,
            'subject' => $subject,
            'description' => $description,
            'status' => $status
        );

        if ($_FILES['video_link']['name'] != '') {
            $config['upload_path'] = CATEGORY_IMG_PATH;
            $config['allowed_types'] = AUDIO_ALLOWED_TYPES;
            $config['file_name'] = time();
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('video_link')) {
                $data = $this->upload->data();
                $img = $data['file_name'];
                $frm_data['link'] = $img;
            }
        }

        $this->db->where('id', $id)->update('study_metrial', $frm_data);
        return TRUE;
    }

}

?>