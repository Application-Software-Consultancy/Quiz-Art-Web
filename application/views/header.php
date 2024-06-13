<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="javascript:void(0)" data-toggle="sidebar" class="nav-link nav-link-lg"><em class="fas fa-bars"></em></a></li>
            <li class="nav-item d-none d-sm-inline-block center">

                    <?php

if (!ALLOW_MODIFICATION) {
  

                    ?>
        	    <span class="right badge badge-danger">Modification in demo version is not allowed</span>

                <?php }?>
            </li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown">
            <a href="<?= base_url(); ?>" data-toggle="dropdown" class="nav-link dropdown-toggle  nav-link-lg nav-link-user">
                <span class="user_profile_icon"><i class="fa fa-user-circle" aria-hidden="true"></i> </span>
                <div class="d-sm-none d-lg-inline-block">Hi, <?= ucwords($this->session->userdata('authName')); ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <?php if ($this->session->userdata('authStatus')) { ?>
                    <a href="<?php echo base_url(); ?>profile" class="dropdown-item has-icon">
                        <em class="fas fa-user"></em> Profile
                    </a>
                <?php } ?>
                <a href="<?php echo base_url(); ?>resetpassword" class="dropdown-item has-icon">
                    <em class="fas fa-key"></em> Reset Password
                </a>
                <a href="<?php echo base_url(); ?>logout" class="dropdown-item has-icon">
                    <em class="fas fa-sign-out-alt"></em> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <ul class="sidebar-menu">
            <div class="sidebar-brand my-1">
                <a href="<?= base_url(); ?>dashboard">
                    <?php if (!empty($full_logo)) { ?>
                        <img src="<?= base_url() . LOGO_IMG_PATH ; ?>admin_logo.png" alt="logo" width="150" id="full_logo">
                    <?php } ?>
                </a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="<?= base_url(); ?>dashboard">
                    <?php if (!empty($half_logo)) { ?>
                        <img src="<?= base_url() . LOGO_IMG_PATH ; ?>favicon.png" alt="logo" width="50">
                    <?php } ?>
                </a>
            </div>
            <li>
                <a class="nav-link" href="<?= base_url(); ?>dashboard"><em class="fas fa-home"></em> <span>DASHBOARD</span></a>
            </li>

            <li class="nav-item dropdown" style="background-color:#071251 !important">
                <a href="javascript:void(0)" class="nav-link has-dropdown"><em class="fas fa-gift"></em><span>MASTER</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link ml-3" href="<?= base_url(); ?>student-category">Student Category</a></li>
                    <li><a class="nav-link ml-3" href="<?= base_url(); ?>student-subcategory">Student Sub Category</a></li>
                    <li><a class="nav-link ml-3" href="<?= base_url(); ?>questioner">Questioner Category</a></li>
                    <li><a class="nav-link ml-3" href="<?= base_url(); ?>subject-category">Category</a></li>
                    <li><a class="nav-link ml-3" href="<?= base_url(); ?>subject-sub-category">Sub Category</a></li>
                    <li><a class="nav-link ml-3" href="<?= base_url(); ?>Allclass">Class</a></li>
                    <li><a class="nav-link ml-3" href="<?= base_url(); ?>subject">Subject</a></li>
                    <li><a class="nav-link ml-3" href="<?= base_url(); ?>chapters">Chapters</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown" style="background-color:#071251 !important">
                <a href="javascript:void(0)" class="nav-link has-dropdown"><em class="fas fa-cog"></em><span>POINTS REDEEM</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link ml-3" href="<?= base_url(); ?>Pointsredeem/questioner">Questioner</a></li>
                    <li><a class="nav-link ml-3" href="<?= base_url(); ?>Pointsredeem/subscriber">Subscriber</a></li>
                </ul>
            </li>
            
            <li>
                <a class="nav-link" href="<?= base_url(); ?>questioner-list"><em class="fas fa-question"></em> <span>QUESTIONER</span></a>
            </li>
            <li class="nav-item dropdown" style="background-color:#071251 !important">
                <a href="javascript:void(0)" class="nav-link has-dropdown"><em class="fas fa-cog"></em><span>QUESTIONS</span></a>
                <ul class="dropdown-menu">
                    <!--<li><a class="nav-link ml-3" href="<?= base_url(); ?>Pointsredeem/questioner">Exam Matriz</a></li>-->
                    <li><a class="nav-link ml-3" href="<?= base_url(); ?>get-all-questions">All Question</a></li>
                    <li><a class="nav-link ml-3" href="<?= base_url(); ?>get-approved-questions">Approverd Question</a></li>
                </ul>
            </li>
            
            <?php if (has_permissions('read', 'categories') || has_permissions('read', 'subcategories') || has_permissions('read', 'category_order') || has_permissions('create', 'questions') || has_permissions('read', 'questions') || has_permissions('read', 'question_report')) { ?>
                <li class="nav-item dropdown" style="background-color:#071251 !important">
                    <a href="javascript:void(0)" class="nav-link has-dropdown"><em class="fas fa-gift"></em><span>QUIZ ZONE</span></a>
                    <ul class="dropdown-menu">
                        <?php if (has_permissions('read', 'categories')) { ?>
                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>main-category">Main Category</a></li>
                        <?php } ?>
                        <?php if (has_permissions('read', 'subcategories')) { ?>
                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>sub-category">Sub Category</a></li>
                        <?php } ?>
                        <?php if (has_permissions('read', 'category_order')) { ?>
                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>category-order">Category Order</a></li>
                        <?php } ?>
                        <?php if (has_permissions('read', 'questions')) { ?>
                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>create-questions">Create Questions</a></li>
                        <?php } ?>
                        <?php if (has_permissions('read', 'questions')) { ?>
                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>manage-questions">View Questions</a></li>
                        <?php } ?>
                        <?php if (has_permissions('read', 'questions')) { ?>
                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>import-questions"> Import Questions</a></li>
                        <?php } ?>
                        <?php if (has_permissions('read', 'question_report')) { ?>
                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>question-reports"> Question Reports</a></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
            <?php if (has_permissions('read', 'daily_quiz')) { ?>
                <li>
                    <a class="nav-link" href="<?= base_url(); ?>daily-quiz"><em class="fas fa-question"></em> <span>DAILY QUIZ</span></a>
                </li>
            <?php } ?>
            
            <?php if (has_permissions('read', 'manage_contest') || has_permissions('read', 'manage_contest_question') || has_permissions('read', 'import_contest_question')) { ?>
                <li class="nav-item dropdown" style="background-color:#071251 !important">
                    <a href="javascript:void(0)" class="nav-link has-dropdown"><em class="fas fa-gift"></em> <span>CONTESTS</span></a>
                    <ul class="dropdown-menu">
                        <?php if (has_permissions('read', 'manage_contest')) { ?>
                            <li><a href="<?= base_url(); ?>contest"> Manage Contest</a></li>
                        <?php } ?>
                        <?php if (has_permissions('read', 'manage_contest_question')) { ?>
                            <li><a href="<?= base_url(); ?>contest-questions"> Manage Questions</a></li>
                        <?php } ?>
                        <?php if (has_permissions('read', 'manage_contest_question')) { ?>
                            <li><a href="<?= base_url(); ?>contest-questions-import"> Import Questions</a></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
            <?php if (has_permissions('read', 'categories') || has_permissions('read', 'subcategories') || has_permissions('read', 'category_order') || has_permissions('read', 'fun_n_learn')) { ?>
                <li class="nav-item dropdown" style="background-color:#071251 !important">
                    <a href="javascript:void(0)" class="nav-link has-dropdown"><em class="fas fa-book-open"></em><span>FUN 'N' LEARN</span></a>
                    <ul class="dropdown-menu">
                        <?php if (has_permissions('read', 'categories')) { ?>
                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>fun-n-learn-category">Main Category</a></li>
                        <?php } ?>
                        <?php if (has_permissions('read', 'subcategories')) { ?>
                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>fun-n-learn-subcategory">Sub Category</a></li>
                        <?php } ?>
                        <?php if (has_permissions('read', 'category_order')) { ?>
                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>fun-n-learn-category-order">Category Order</a></li>
                        <?php } ?>
                        <?php if (has_permissions('read', 'fun_n_learn')) { ?>
                            <li><a class="nav-link ml-3" href="<?= base_url() ?>fun-n-learn">Manage Fun 'N' Learn</a></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
            <?php if (has_permissions('read', 'categories') || has_permissions('read', 'subcategories') || has_permissions('read', 'category_order') || has_permissions('read', 'guess_the_word')) { ?>
                <li class="nav-item dropdown" style="background-color:#071251 !important">
                    <a href="javascript:void(0)" class="nav-link has-dropdown"><em class="fas fa-atom"></em><span>GUESS THE WORD</span></a>
                    <ul class="dropdown-menu">
                        <?php if (has_permissions('read', 'categories')) { ?>
                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>guess-the-word-category">Main Category</a></li>
                        <?php } ?>
                        <?php if (has_permissions('read', 'subcategories')) { ?>
                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>guess-the-word-subcategory">Sub Category</a></li>
                        <?php } ?>
                        <?php if (has_permissions('read', 'category_order')) { ?>
                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>guess-the-word-category-order">Category Order</a></li>
                        <?php } ?>
                        <?php if (has_permissions('read', 'guess_the_word')) { ?>
                            <li><a class="nav-link ml-3" href="<?= base_url() ?>guess-the-word">Manage Guess The Word</a></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
            <?php if (has_permissions('read', 'categories') || has_permissions('read', 'subcategories') || has_permissions('read', 'category_order') || has_permissions('read', 'audio_question')) { ?>
                <!--<li class="nav-item dropdown" style="background-color:#071251 !important">-->
                <!--    <a href="javascript:void(0)" class="nav-link has-dropdown"><em class="fas fa-microphone-alt"></em><span>AUDIO QUESTIONS</span></a>-->
                <!--    <ul class="dropdown-menu">-->
                <!--        <?php if (has_permissions('read', 'categories')) { ?>-->
                <!--            <li><a class="nav-link ml-3" href="<?= base_url(); ?>audio-question-category">Main Category</a></li>-->
                <!--        <?php } ?>-->
                <!--        <?php if (has_permissions('read', 'subcategories')) { ?>-->
                <!--            <li><a class="nav-link ml-3" href="<?= base_url(); ?>audio-question-subcategory">Sub Category</a></li>-->
                <!--        <?php } ?>-->
                <!--        <?php if (has_permissions('read', 'category_order')) { ?>-->
                <!--            <li><a class="nav-link ml-3" href="<?= base_url(); ?>audio-question-category-order">Category Order</a></li>-->
                <!--        <?php } ?>-->
                <!--        <?php if (has_permissions('read', 'audio_question')) { ?>-->
                <!--            <li><a class="nav-link ml-3" href="<?= base_url() ?>audio-question">Manage Audio Questions</a></li>-->
                <!--        <?php } ?>-->
                <!--    </ul>-->
                <!--</li>-->
            <?php } ?>
            <?php if (has_permissions('read', 'categories') || has_permissions('read', 'subcategories') || has_permissions('read', 'category_order') || has_permissions('create', 'maths_questions') || has_permissions('read', 'maths_questions')) { ?>
                <li class="nav-item dropdown" style="background-color:#071251 !important">
                    <a href="javascript:void(0)" class="nav-link has-dropdown"><em class="fas fa-book-open"></em><span>MATHS QUIZ</span></a>
                    <ul class="dropdown-menu">
                        <?php if (has_permissions('read', 'categories')) { ?>
                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>maths-question-category">Main Category</a></li>
                        <?php } ?>
                        <?php if (has_permissions('read', 'subcategories')) { ?>
                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>maths-question-subcategory">Sub Category</a></li>
                        <?php } ?>
                        <?php if (has_permissions('read', 'category_order')) { ?>
                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>maths-question-category-order">Category Order</a></li>
                        <?php } ?>
                        <?php if (has_permissions('read', 'maths_questions')) { ?>
                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>create-maths-questions">Create Questions</a></li>
                        <?php } ?>
                        <?php if (has_permissions('read', 'maths_questions')) { ?>
                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>manage-maths-questions">View Questions</a></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
            <?php if (has_permissions('read', 'exam_module')) { ?>
                <!--<li class="nav-item dropdown" style="background-color:#071251 !important">-->
                <!--    <a href="javascript:void(0)" class="nav-link has-dropdown"><em class="fas fa-book"></em><span>EXAM MODULE</span></a>-->
                <!--    <ul class="dropdown-menu">-->
                <!--        <li><a class="nav-link ml-3" href="<?= base_url(); ?>exam-module">Exam Module</a></li>-->
                <!--        <li><a class="nav-link ml-3" href="<?= base_url(); ?>exam-module-questions-import">Import Exam Question</a></li>-->
                <!--    </ul>-->
                <!--</li>-->
            <?php } ?>
            
            <?php if (has_permissions('read', 'users')) { ?>
                <li>
                    <a class="nav-link" href="<?= base_url() ?>users"><em class="fas fa-users"></em> <span>STUDENTS</span></a>
                </li>
            <?php } ?>
            <?php if ($this->session->userdata('authStatus')) { ?>
                <!--<li>-->
                <!--    <a class="nav-link ml-3" href="<?= base_url() ?>activity-tracker"><em class="fas fa-chart-bar"></em> <span>Activity Tracker</span></a>-->
                <!--</li>-->
            <?php } ?>
            <?php if ($this->session->userdata('authStatus')) { ?>
                <!--<li>-->
                <!--    <a class="nav-link ml-3" href="<?= base_url() ?>payment-requests"><em class="fas fa-rupee-sign"></em> <span>Payment Requests</span></a>-->
                <!--</li>-->
            <?php } ?>

                <li class="nav-item dropdown" style="background-color:#071251 !important">
                    <a href="javascript:void(0)" class="nav-link has-dropdown"><em class="fas fa-th"></em><span>LEADERBOARD</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link ml-3" href="<?= base_url(); ?>global-leaderboard">All</a></li>
                        <li><a class="nav-link ml-3" href="<?= base_url(); ?>monthly-leaderboard">Monthly</a></li>
                        <li><a class="nav-link ml-3" href="<?= base_url(); ?>daily-leaderboard">Daily</a></li>
                    </ul>
                </li>

            <?php if (is_language_mode_enabled()) { ?>
                <?php if (has_permissions('read', 'languages')) { ?>
                    
                <?php } ?>
            <?php } ?>
            <li>
                <a class="nav-link" href="<?= base_url() ?>videos"><em class="fas fa-users"></em> <span>VIDEO</span></a>
            </li>
            <li>
                <a class="nav-link" href="<?= base_url() ?>study_metarial"><em class="fas fa-users"></em> <span>STUDY METERIAL</span></a>
            </li>
            <li>
                <a class="nav-link" href="<?= base_url() ?>coupon"><em class="fas fa-users"></em> <span>COUPON</span></a>
            </li>
            
            <li class="nav-item dropdown" style="background-color:#071251 !important">
                <a href="javascript:void(0)" class="nav-link has-dropdown"><em class="fas fa-th"></em><span>REPORTS</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link ml-3" href="<?= base_url(); ?>admin_revenue">Admin Revenue</a></li>
                    <li><a class="nav-link ml-3" href="<?= base_url(); ?>enroll_list">Enroll List</a></li>
                    <li><a class="nav-link ml-3" href="<?= base_url(); ?>attempted_list">Attemped List</a></li>
                    <li><a class="nav-link ml-3" href="<?= base_url(); ?>total_question">Total Question</a></li>
                    <li><a class="nav-link ml-3" href="<?= base_url(); ?>new_report">Detail Report</a></li>
                    <li><a class="nav-link ml-3" href="<?= base_url(); ?>contributor_report">Contributor Report</a></li>
                </ul>
            </li>

                <li class="nav-item dropdown" style="background-color:#071251 !important">
                    <a href="javascript:void(0)" class="nav-link has-dropdown"><em class="fas fa-cog"></em><span>SETTINGS</span></a>
                    <ul class="dropdown-menu">

                        <li><a class="nav-link ml-3" href="<?= base_url(); ?>system-configurations">System Configurations</a></li>

                        <li><a class="nav-link ml-3" href="<?= base_url(); ?>smtp_settings">SMTP Settings</a></li>

                        <li><a class="nav-link ml-3" href="<?= base_url(); ?>system-utilities">System Utilities</a></li>
                        <li><a class="nav-link ml-3" href="<?= base_url(); ?>payment-gateway">Payment Gateway</a></li>
                        <li>
                            <a class="nav-link ml-3" href="<?= base_url() ?>languages"> <span>Languages</span></a>
                        </li>

                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>firebase-configurations">Firebase Configurations</a></li>
                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>payment-settings">Payment Settings</a></li>
                            <!--<li><a class="nav-link ml-3" href="<?= base_url(); ?>ads-settings">Ads. Settings</a></li>-->
                            <!--<li><a class="nav-link ml-3" href="<?= base_url(); ?>badges-settings">Badges Settings</a></li>-->
                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>notification-settings">Notification Settings</a></li>
                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>coin-store-settings">Coin Store Settings</a></li>
                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>about-us">About Us</a></li>
                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>contact-us">Contact Us</a></li>
                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>instructions">How to Play</a></li>
                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>privacy-policy">Privacy Policy</a></li>
                            <li><a class="nav-link ml-3" href="<?= base_url(); ?>terms-conditions">Terms Conditions</a></li>

                    </ul>
                </li>
            
            <?php if (has_permissions('read', 'send_notification')) { ?>
                <li>
                    <a class="nav-link" href="<?= base_url(); ?>send-notifications"><em class="fas fa-bullhorn"></em> <span>SEND NOTIFICATIONS</span></a>
                </li>
            <?php } ?>            

                <li class="mb-4">
                    <a class="nav-link" href="<?= base_url(); ?>user-accounts-rights"><em class="fas fa-user"></em> <span>USER RIGHTS</span></a>
                </li>

            <?php if ($this->session->userdata('authStatus')) { ?>
            <!--<li class="nav-item dropdown" style="background-color:#071251 !important">-->
            <!--        <a href="javascript:void(0)" class="nav-link has-dropdown"><em class="fas fa-cog"></em><span>WEB SETTINGS</span></a>-->
            <!--        <ul class="dropdown-menu">-->
            <!--            <li><a class="nav-link ml-3" href="<?= base_url('web-settings'); ?>">Settings</a></li>-->
            <!--            <li><a class="nav-link ml-3" href="<?= base_url('web-home-settings'); ?>">Home Settings</a></li>-->
                        <!-- <li><a class="nav-link" href="<?= base_url('upload-languages'); ?>">Upload Languages</a></li> -->
            <!--            <li><a class="nav-link ml-3" href="<?= base_url('sliders'); ?>">Sliders</a></li>-->
            <!--        </ul>-->
            <!--</li>-->
            <?php } ?>
            <?php if ($this->session->userdata('authStatus')) { ?>
                <!--<li>-->
                <!--    <a class="nav-link ml-3" href="<?= base_url(); ?>system-updates"><em class="fas fa-cloud-download-alt"></em> <span>System Update</span></a>-->
                <!--</li>-->
            <?php } ?>
        </ul>
    </aside>
</div>
