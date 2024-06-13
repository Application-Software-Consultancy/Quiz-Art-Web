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
                <?php $image = CATEGORY_IMG_PATH . $this->session->userdata('qImage') ;?>
                <span class="user_profile_icon"><img src="<?= $image; ?>"/></span>
                <div class="d-sm-none d-lg-inline-block">Hi, <?= ucwords($this->session->userdata('qName')); ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="<?php echo base_url(); ?>questioner-reset-password" class="dropdown-item has-icon">
                    <em class="fas fa-key"></em> Reset Password
                </a>
                <a href="<?php echo base_url(); ?>questioner_logout" class="dropdown-item has-icon">
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
                <a class="nav-link" href="<?= base_url(); ?>Questioner_dashboard"><em class="fas fa-home"></em> <span>DASHBOARD</span></a>
            </li>
            
            <li class="nav-item dropdown" style="background-color:#071251 !important">
                <a href="javascript:void(0)" class="nav-link has-dropdown"><em class="fas fa-gift"></em><span>MANAGE QUESTION</span></a>
                <ul class="dropdown-menu">
                    <!--<li><a class="nav-link ml-3" href="<?= base_url(); ?>Questioner_dashboard">Module</a></li>-->
                    <li><a class="nav-link ml-3" href="<?= base_url(); ?>create-question">Create Question</a></li>
                    <li><a class="nav-link ml-3" href="<?= base_url(); ?>list-question">Question List</a></li>
                </ul>
            </li>
            
            <li>
                <a class="nav-link" href="<?= base_url(); ?>Questioner_dashboard"><em class="fas fa-cog"></em> <span>POINTS DETAILS LIST</span></a>
            </li>
            
            <li>
                <a class="nav-link" href="<?= base_url(); ?>questioner-profile"><em class="fas fa-atom"></em> <span>PROFILE</span></a>
            </li>

        </ul>
    </aside>
</div>
