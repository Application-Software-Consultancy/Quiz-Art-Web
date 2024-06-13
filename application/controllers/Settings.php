<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set(get_system_timezone());
        
        $this->load->model('Language_model');

        $this->result['full_logo'] = $this->db->where('type', 'full_logo')->get('tbl_settings')->row_array();
        $this->result['half_logo'] = $this->db->where('type', 'half_logo')->get('tbl_settings')->row_array();
        $this->result['app_name'] = $this->db->where('type', 'app_name')->get('tbl_settings')->row_array();
        $this->result['background_file'] = $this->db->where('type', 'background_file')->get('tbl_settings')->row_array() ?? base_url() . LOGO_IMG_PATH . 'background-image-stock.jpg';
        $this->result['bot_image'] = $this->db->where('type', 'bot_image')->get('tbl_settings')->row_array() ?? base_url() . LOGO_IMG_PATH . 'bot-stock.png';

        $this->result['system_key'] = $this->db->where('type', 'system_key')->get('tbl_settings')->row_array();
        $this->result['configuration_key'] = $this->db->where('type', 'configuration_key')->get('tbl_settings')->row_array();
    }

    public function firebase_configurations()
    {
        if (!$this->session->userdata('isLoggedIn')) {
            redirect('/');
        } else {

                if ($this->input->post('btnadd')) {
                    if (!has_permissions('update', 'firebase_configurations')) {
                        $this->session->set_flashdata('error', PERMISSION_ERROR_MSG);
                    } else {
                        $data = $this->Setting_model->firebase_configurations();
                        if ($data == false) {
                            $this->session->set_flashdata('error', 'Only json file allow..!');
                        } else {
                            $this->session->set_flashdata('success', 'Configurations Update successfully.!');
                        }
                    }
                    redirect('firebase-configurations', 'refresh');
                }

                $this->load->view('firebase_configurations', $this->result);
        }
    }

    public function system_utilities()
    {

        if ($this->input->post('btnadd')) {


            if (!has_permissions('update', 'system_configuration')) {
                $this->session->set_flashdata('error', PERMISSION_ERROR_MSG);
            } else {

                $this->Setting_model->update_system_utility();
                $this->session->set_flashdata('success', 'Settings Update successfully.! ');

                redirect('system-utilities', 'refresh');
            }
        }

        $settings = [
            'maximum_winning_coins', 'minimum_coins_winning_percentage', 'quiz_winning_percentage', 'score','answer_mode', 'welcome_bonus_coin', 'review_answers_deduct_coin', 'question_shuffle_mode', 'option_shuffle_mode',
            'quiz_zone_mode', 'quiz_zone_fix_level_question', 'quiz_zone_total_level_question', 'quiz_zone_duration', 'quiz_zone_lifeline_deduct_coin', 'quiz_zone_wrong_answer_deduct_score', 'quiz_zone_correct_answer_credit_score',
            'guess_the_word_question', 'guess_the_word_fix_question', 'guess_the_word_total_question', 'guess_the_word_seconds', 'guess_the_word_max_hints', 'guess_the_word_max_winning_coin', 'guess_the_word_wrong_answer_deduct_score', 'guess_the_word_correct_answer_credit_score',
            'audio_mode_question', 'audio_quiz_fix_question', 'audio_quiz_total_question', 'total_audio_time', 'audio_quiz_seconds', 'audio_quiz_wrong_answer_deduct_score', 'audio_quiz_correct_answer_credit_score',
            'maths_quiz_mode', 'maths_quiz_fix_question', 'maths_quiz_total_question', 'maths_quiz_seconds', 'maths_quiz_wrong_answer_deduct_score', 'maths_quiz_correct_answer_credit_score',
            'fun_n_learn_question', 'fun_n_learn_quiz_fix_question', 'fun_n_learn_quiz_total_question', 'fun_and_learn_time_in_seconds', 'fun_n_learn_quiz_wrong_answer_deduct_score', 'fun_n_learn_quiz_correct_answer_credit_score',
            'true_false_mode', 'true_false_quiz_fix_question', 'true_false_quiz_total_question', 'true_false_quiz_in_seconds', 'true_false_quiz_wrong_answer_deduct_score', 'true_false_quiz_correct_answer_credit_score',
            'battle_mode_one','battle_mode_one_category','battle_mode_one_fix_question','battle_mode_one_total_question','battle_mode_one_in_seconds','battle_mode_one_wrong_answer_deduct_score','battle_mode_one_correct_answer_credit_score','battle_mode_one_quickest_correct_answer_extra_score','battle_mode_one_second_quickest_correct_answer_extra_score','battle_mode_one_code_char','battle_mode_one_entry_coin',
            'battle_mode_group','battle_mode_group_category','battle_mode_group_fix_question','battle_mode_group_total_question','battle_mode_group_in_seconds','battle_mode_group_wrong_answer_deduct_score','battle_mode_group_correct_answer_credit_score','battle_mode_group_quickest_correct_answer_extra_score','battle_mode_group_second_quickest_correct_answer_extra_score','battle_mode_group_code_char','battle_mode_group_entry_coin',
            'battle_mode_random','battle_mode_random_category','battle_mode_random_fix_question','battle_mode_random_total_question','battle_mode_random_in_seconds','battle_mode_random_wrong_answer_deduct_score','battle_mode_random_correct_answer_credit_score','battle_mode_random_quickest_correct_answer_extra_score','battle_mode_random_second_quickest_correct_answer_extra_score','battle_mode_random_search_duration','battle_mode_random_entry_coin',
            'self_challenge_mode','self_challenge_max_minutes','self_challenge_max_questions',
            'exam_module','exam_module_resume_exam_timeout',
            'contest_mode','contest_mode_wrong_deduct_score','contest_mode_correct_credit_score', 'option_visible_mode', 'fix_question_in_lavel', 'total_max_lavel', 'max_question_per_lavel',
            'max_duration_each_question', 'review_answers_deduct'
        ];
        foreach ($settings as $row) {
            $data = $this->db->where('type', $row)->get('tbl_settings')->row_array();
            $this->result[$row] = $data;
        }

        $this->load->view('system_utilities', $this->result);
    }
    
    public function payment_gateway(){
        if (!$this->session->userdata('isLoggedIn')) {
            redirect('/');
        } else {
            if (!has_permissions('read', 'system_configuration')) {
                redirect('/', 'refresh');
            } else {
                if ($this->input->post('btnadd')) {
                    $this->Setting_model->update_payment_settings();
                    $this->session->set_flashdata('success', 'Payment Gateway updated successfully.!');
                    redirect('payment-gateway', 'refresh');
                }
                $this->result['payment_mode'] = $this->db->where('type', 'payment_mode')->get('tbl_settings')->row();
                $this->result['api_secret'] = $this->db->where('type', 'api_secret')->get('tbl_settings')->row();
                $this->result['payment_gateway_title'] = $this->db->where('type', 'payment_gateway_title')->get('tbl_settings')->row();
                $this->result['api_key'] = $this->db->where('type', 'api_key')->get('tbl_settings')->row();
                $logo_image = $this->db->where('type', 'payment_logo')->get('tbl_settings')->row();
                
                $this->result['payment_logo'] = (!empty($logo_image->message)) ? CATEGORY_IMG_PATH . $logo_image->message : '';
                $this->load->view('payment_gateway', $this->result);
            }
        }
        
    }

    public function system_configurations()
    {

        if (!$this->session->userdata('isLoggedIn')) {
            redirect('/');
        } else {
            if (!has_permissions('read', 'system_configuration')) {
                redirect('/', 'refresh');
            } else {
                if ($this->input->post('btnadd')) {
                    if (!has_permissions('update', 'system_configuration')) {
                        $this->session->set_flashdata('error', PERMISSION_ERROR_MSG);
                    } else {
                        $this->Setting_model->update_settings();
                        $this->session->set_flashdata('success', 'Settings Update successfully.! ');
                    }
                    redirect('system-configurations', 'refresh');
                }

                $settings = [
                    'system_timezone', 'system_timezone_gmt',
                    'app_link', 'more_apps',
                    'ios_app_link', 'ios_more_apps',
                    'refer_coin', 'earn_coin', 'app_version', 'app_version_ios', 'force_update',
                    'true_value', 'false_value', 'shareapp_text', 'app_maintenance',
                    'language_mode', 'option_e_mode', 'daily_quiz_mode', 'in_app_purchase_mode'
                ];
                foreach ($settings as $row) {
                    $data = $this->db->where('type', $row)->get('tbl_settings')->row_array();
                    $this->result[$row] = $data;
                }

                $this->load->view('system_configurations', $this->result);
            }
        }
    }

    public function ads_settings()
    {
        if (!$this->session->userdata('isLoggedIn')) {


            redirect('/');
        } else {

            if (!has_permissions('read', 'ads_settings')) {

                redirect('/', 'refresh');
            } else {

                if ($this->input->post('btnadd')) {

                    if (!has_permissions('update', 'ads_settings')) {
                        $this->session->set_flashdata('error', PERMISSION_ERROR_MSG);
                    } else {
                        $this->Setting_model->update_ads();
                        $this->session->set_flashdata('success', 'Settings Update successfully.!');
                    }
                    redirect('ads-settings', 'refresh');
                }

                $settings = [
                    'in_app_ads_mode', 'ads_type',
                    'android_banner_id', 'android_interstitial_id', 'android_rewarded_id',
                    'ios_banner_id', 'ios_interstitial_id', 'ios_rewarded_id',
                    'android_game_id', 'ios_game_id', 'daily_ads_visibility', 'daily_ads_coins', 'daily_ads_counter', 'reward_coin'
                ];
                foreach ($settings as $row) {
                    $data = $this->db->where('type', $row)->get('tbl_settings')->row_array();
                    $this->result[$row] = $data;
                }

                $this->load->view('ads_settings', $this->result);
            }
        }
    }


    public function profile()
    {
        if (!$this->session->userdata('isLoggedIn')) {
            redirect('login');
        } else {
            if (!$this->session->userdata('authStatus')) {
                redirect('/');
            } else {
                if ($this->input->post('btnadd')) {
                    if (!has_permissions('create', 'profile')) {
                        $this->session->set_flashdata('error', PERMISSION_ERROR_MSG);
                    } else {
                        $data = $this->Setting_model->update_profile();
                        if ($data == false) {
                            $this->session->set_flashdata('error', IMAGE_ALLOW_PNG_JPG_SVG_MSG);
                        } else {
                            $this->session->set_flashdata('success', 'Profile update successfully.! ');
                        }
                    }
                    redirect('profile', 'refresh');
                }
                $this->result['jwt_key'] = $this->db->where('type', 'jwt_key')->get('tbl_settings')->row_array();
                $this->result['app_validity'] = $this->db->where('type', 'app_validity')->get('tbl_settings')->row_array();
                $this->result['footer_copyrights_text'] = $this->db->where('type', 'footer_copyrights_text')->get('tbl_settings')->row_array();
                // echo "<pre>";
                // print_r($this->result);
                // die;
                $this->load->view('profile', $this->result);
            }
        }
    }

    public function send_notifications()
    {
        if (!$this->session->userdata('isLoggedIn')) {
            redirect('/');
        } else {
            if (!has_permissions('read', 'send_notification')) {
                redirect('/', 'refresh');
            } else {
                if ($this->input->post('btnadd')) {
                    if (!has_permissions('create', 'send_notification')) {
                        $this->session->set_flashdata('error', PERMISSION_ERROR_MSG);
                    } else {
                        $users = $this->input->post('users');
                        if ($users === 'selected') {
                            if ($this->input->post('selected_list') == '') {
                                $this->session->set_flashdata('error', 'Please Select the users from the table..');
                            } else {
                                $this->Notification_model->add_notification();
                                $this->session->set_flashdata('success', 'Notification Sent Successfully..');
                            }
                        } else {
                            $this->Notification_model->add_notification();
                            $this->session->set_flashdata('success', 'Notification Sent Successfully..');
                        }
                    }
                    redirect('send-notifications', 'refresh');
                }
                $this->result['category'] = $this->Category_model->get_data(1);
                $this->load->view('notifications', $this->result);
            }
        }
    }

    public function delete_notification()
    {
        if (!$this->session->userdata('isLoggedIn')) {
            redirect('/');
        } else {
            if (!has_permissions('delete', 'send_notification')) {
                echo false;
            } else {
                $id = $this->input->post('id');
                $image_url = $this->input->post('image_url');
                $this->Notification_model->delete_notification($id, $image_url);
                echo "Notification deleted successfully..";
            }
        }
    }

    public function play_store_contact_us()
    {
        $result['setting'] = $this->db->where('type', 'contact_us')->get('tbl_settings')->row_array();
        $this->load->view('play_store_contact_us', $result);
    }

    public function contact_us()
    {
        if (!$this->session->userdata('isLoggedIn')) {
            redirect('/');
        } else {

                if ($this->input->post('btnadd')) {
                    if (!has_permissions('create', 'contact_us')) {
                        $this->session->set_flashdata('error', PERMISSION_ERROR_MSG);
                    } else {
                        $this->Setting_model->update_contact_us();
                        $this->session->set_flashdata('success', 'Contact Us updated successfully.!');
                    }
                    redirect('contact-us', 'refresh');
                }
                $this->result['setting'] = $this->db->where('type', 'contact_us')->get('tbl_settings')->row_array();
                $this->load->view('contact_us', $this->result);
            
        }
    }

    public function play_store_terms_conditions()
    {
        $result['setting'] = $this->db->where('type', 'terms_conditions')->get('tbl_settings')->row_array();
        $this->load->view('play_store_terms_conditions', $result);
    }

    public function terms_conditions()
    {
        if (!$this->session->userdata('isLoggedIn')) {
            redirect('/');
        } else {

                if ($this->input->post('btnadd')) {
                    if (!has_permissions('create', 'terms_conditions')) {
                        $this->session->set_flashdata('error', PERMISSION_ERROR_MSG);
                    } else {
                        $this->Setting_model->update_terms_conditions();
                        $this->session->set_flashdata('success', 'Terms Conditions updated successfully.!');
                    }
                    redirect('terms-conditions', 'refresh');
                }
                $this->result['setting'] = $this->db->where('type', 'terms_conditions')->get('tbl_settings')->row_array();
                $this->load->view('terms_conditions', $this->result);
            
        }
    }

    public function play_store_privacy_policy()
    {
        $result['setting'] = $this->db->where('type', 'privacy_policy')->get('tbl_settings')->row_array();
        $this->load->view('play_store_privacy_policy', $result);
    }

    public function privacy_policy()
    {
        if (!$this->session->userdata('isLoggedIn')) {
            redirect('/');
        } else {
 
                if ($this->input->post('btnadd')) {
                    if (!has_permissions('create', 'privacy_policy')) {
                        $this->session->set_flashdata('error', PERMISSION_ERROR_MSG);
                    } else {
                        $this->Setting_model->update_privacy_policy();
                        $this->session->set_flashdata('success', 'Privacy Policy updated successfully.!');
                    }
                    redirect('privacy-policy', 'refresh');
                }
                $this->result['setting'] = $this->db->where('type', 'privacy_policy')->get('tbl_settings')->row_array();
                $this->load->view('privacy_policy', $this->result);
            
        }
    }

    public function instructions()
    {
        if (!$this->session->userdata('isLoggedIn')) {
            redirect('/');
        } else {

                if ($this->input->post('btnadd')) {
                    if (!has_permissions('create', 'instructions')) {
                        $this->session->set_flashdata('error', PERMISSION_ERROR_MSG);
                    } else {
                        $this->Setting_model->update_instructions();
                        $this->session->set_flashdata('success', 'Instructions updated successfully.!');
                    }
                    redirect('instructions', 'refresh');
                }
                $this->result['setting'] = $this->db->where('type', 'instructions')->get('tbl_settings')->row_array();
                $this->load->view('instructions', $this->result);
            
        }
    }

    public function about_us()
    {
        if (!$this->session->userdata('isLoggedIn')) {
            redirect('/');
        } else {
                if ($this->input->post('btnadd')) {
                    if (!has_permissions('create', 'about_us')) {
                        $this->session->set_flashdata('error', PERMISSION_ERROR_MSG);
                    } else {
                        $this->Setting_model->update_about_us();
                        $this->session->set_flashdata('success', 'About Us updated successfully.!');
                    }
                    redirect('about-us', 'refresh');
                }
                $this->result['setting'] = $this->db->where('type', 'about_us')->get('tbl_settings')->row_array();
                $this->load->view('about_us', $this->result);
        }
    }

    public function notification_settings()
    {
        if (!$this->session->userdata('isLoggedIn')) {
            redirect('/');
        } else {

                if ($this->input->post('btnadd')) {
                    if (!has_permissions('create', 'notification_settings')) {
                        $this->session->set_flashdata('error', PERMISSION_ERROR_MSG);
                    } else {
                        $this->Setting_model->update_fcm_key();
                        $this->session->set_flashdata('success', 'Updated successfully.!');
                    }
                    redirect('notification-settings', 'refresh');
                }
                $this->result['setting'] = $this->db->where('type', 'fcm_server_key')->get('tbl_settings')->row_array();
                $this->load->view('notification_settings', $this->result);
            
        }
    }

    public function upload_img()
    {
        $accepted_origins = array("http://" . $_SERVER['HTTP_HOST']);

        if (!is_dir('images/instruction')) {
            mkdir('images/instruction', 0777, true);
        }
        $imageFolder = "images/instruction/";

        reset($_FILES);
        $temp = current($_FILES);
        if (is_uploaded_file($temp['tmp_name'])) {
            if (isset($_SERVER['HTTP_ORIGIN'])) {
                // Same-origin requests won't set an origin. If the origin is set, it must be valid.
                if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) {
                    header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
                } else {
                    header("HTTP/1.1 403 Origin Denied");
                    return;
                }
            }

            // Sanitize input
            if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
                header("HTTP/1.1 400 Invalid file name.");
                return;
            }

            // Accept upload if there was no origin, or if it is an accepted origin
            $filename = $temp['name'];

            $filetype = $temp['type']; // file type
            // Valid extension
            if ($filetype == 'image/jpg' || $filetype == 'image/jpeg' || $filetype == 'image/png') {
                $valid_ext = array('png', 'jpeg', 'jpg');
            } else if ($filetype == 'media/mp3' || $filetype == 'media/mp4') {
                $valid_ext = array('mp4', 'mp3');
            }

            $location = $imageFolder . $temp['name']; // Location

            $file_extension = pathinfo($location, PATHINFO_EXTENSION); // file extension
            $file_extension = strtolower($file_extension);

            $return_filename = "";

            // Check extension
            if (in_array($file_extension, $valid_ext)) {
                // Upload file
                if (move_uploaded_file($temp['tmp_name'], $location)) {
                    $return_filename = $filename;
                }
            }

            echo $return_filename;
        } else {
            header("HTTP/1.1 500 Server Error"); // Notify editor that the upload failed
        }
    }

    public function web_settings()
    {
        if (!$this->session->userdata('isLoggedIn')) {
            redirect('/');
        } else {
            if (!$this->session->userdata('authStatus')) {
                redirect('/');
            } else {
                if ($this->input->post('btnadd')) {
                    if (!has_permissions('create', 'system_configuration')) {
                        $this->session->set_flashdata('error', PERMISSION_ERROR_MSG);
                    } else {
                        $this->Setting_model->update_web_settings();
                        $this->session->set_flashdata('success', 'Updated successfully.!');
                    }
                    redirect('web-settings', 'refresh');
                }

                $settings = [
                    // 'data_ad_client','data_ad_slot',
                    'firebase_api_key', 'firebase_auth_domain', 'firebase_database_url', 'firebase_project_id', 'firebase_storage_bucket', 'firebase_messager_sender_id', 'firebase_app_id', 'firebase_measurement_id',
                    // 'meta_description', 'meta_keywords',
                    'rtl_support',
                    'company_name_footer', 'email_footer', 'phone_number_footer', 'web_link_footer', 'company_text', 'address_text',
                    // 'favicon', 
                    'header_logo', 'footer_logo', 'sticky_header_logo',
                    'quiz_zone_icon', 'daily_quiz_icon', 'true_false_icon', 'fun_learn_icon', 'self_challange_icon', 'contest_play_icon', 'one_one_battle_icon', 'group_battle_icon', 'audio_question_icon', 'math_mania_icon', 'exam_icon', 'guess_the_word_icon',
                    'primary_color','footer_color','social_media'
                ];

                foreach ($settings as $row) {
                    $data = $this->db->where('type', $row)->get('tbl_web_settings')->row_array();
                    $this->result[$row] = $data;
                }
                $this->load->view('web_settings', $this->result);
            }
        }
    }

    public function web_home_settings()
    {
        if (!$this->session->userdata('isLoggedIn')) {
            redirect('/');
        } else {
            if (!$this->session->userdata('authStatus')) {
                redirect('/');
            } else {
                if ($this->input->post('btnadd')) {
                    if (!has_permissions('create', 'system_configuration')) {
                        $this->session->set_flashdata('error', PERMISSION_ERROR_MSG);
                    } else {
                        $this->Setting_model->update_web_home_settings();
                        $this->session->set_flashdata('success', 'Updated successfully.!');
                    }
                    redirect('web-home-settings', 'refresh');
                }
                $this->result['language'] = $this->Language_model->get_data();
                $this->load->view('web_home_settings', $this->result);
            }
        }
    }
    public function edit_web_home_settings($id)
    {
        if (!has_permissions('read', 'system_configuration')) {
            redirect('/', 'refresh');
        } else {
            if ($this->input->post('btnadd')) {
                if (!has_permissions('update', 'system_configuration')) {
                    $this->session->set_flashdata('error', PERMISSION_ERROR_MSG);
                } else {
                    $this->Setting_model->update_web_home_settings();
                    $this->session->set_flashdata('success', 'Settings updated successfully.!');
                    redirect('web-home-settings/'.$id, 'refresh');
                }
            }
            $settings = [
                'section_1_mode','section1_heading', 'section1_title1', 'section1_title2', 'section1_title3', 'section1_image1', 'section1_image2', 'section1_image3', 'section1_desc1', 'section1_desc2', 'section1_desc3',
                'section_2_mode','section2_heading', 'section2_title1', 'section2_title2', 'section2_title3', 'section2_title4', 'section2_desc1', 'section2_desc2', 'section2_desc3', 'section2_desc4', 'section2_image1', 'section2_image2', 'section2_image3', 'section2_image4',
                'section_3_mode','section3_heading', 'section3_title1', 'section3_title2', 'section3_title3', 'section3_title4', 'section3_image1', 'section3_image2', 'section3_image3', 'section3_image4', 'section3_desc1', 'section3_desc2', 'section3_desc3', 'section3_desc4'
            ];

            foreach ($settings as $row) {
                $data = $this->db->where('type', $row)->where('language_id',$id)->get('tbl_web_settings')->row_array();
                $this->result[$row] = $data;
            }
            $this->result['language'] = $this->Language_model->get_data();
            $this->result['edit_data'] = 1;
            $this->load->view('web_home_settings', $this->result);
        }
    }
    
    public function smtp_settings(){
        if ($this->input->post('btnadd')) {
            $this->Setting_model->update_smtp_settings();
            $this->session->set_flashdata('success', 'SMTP Settings updated successfully.!');
            redirect('smtp_settings', 'refresh');
        }
        $this->result['protocol'] = $this->db->where('type', 'protocol')->get('tbl_settings')->row();
        $this->result['smtp_host'] = $this->db->where('type', 'smtp_host')->get('tbl_settings')->row();
        $this->result['smtp_port'] = $this->db->where('type', 'smtp_port')->get('tbl_settings')->row();
        $this->result['smtp_user'] = $this->db->where('type', 'smtp_user')->get('tbl_settings')->row();
        $this->result['smtp_pass'] = $this->db->where('type', 'smtp_pass')->get('tbl_settings')->row();
        
        $this->load->view('smtp_settings', $this->result);
    }
    
    public function admin_revenue() {
        $this->result['language'] = $this->Language_model->get_data();
        $this->load->view('admin_revenue', $this->result);
    }
    
    public function enroll_list() {
        $this->result['language'] = $this->Language_model->get_data();
        $this->load->view('enroll_list', $this->result);
    }
    
    public function attempted_list() {
        $this->result['language'] = $this->Language_model->get_data();
        $this->load->view('attempted_list', $this->result);
    }
    
    public function total_question() {
        $this->result['language'] = $this->Language_model->get_data();
        $this->load->view('total_question', $this->result);
    }
    
    public function new_report() {
        $this->result['language'] = $this->Language_model->get_data();
        $this->load->view('new_report', $this->result);
    }
    
    public function contributor_report() {
        $this->result['language'] = $this->Language_model->get_data();
        $this->load->view('contributor_report', $this->result);
    }
    
    public function coupon(){
        if ($this->input->post('btnadd')) {
            $type_name = $this->input->post('type');
            $data = $this->Setting_model->add_coupon_data();
            $this->session->set_flashdata('success', 'coupon created successfully.! ');
            redirect($type_name, 'refresh');
        }
        if ($this->input->post('btnupdate')) {
            $type_name = $this->input->post('type');
            $data1 = $this->Setting_model->update_coupon_data();
            $this->session->set_flashdata('success', 'Coupon updated successfully.!');
            redirect($type_name, 'refresh');
        }
        $this->result['language'] = $this->Language_model->get_data();
        $this->load->view('coupon', $this->result);
    }
}

