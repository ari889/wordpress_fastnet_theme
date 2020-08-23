<?php global $fastnet_data; ?>
<!doctype html>
<html class="no-js" lang="zxx" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        <?php echo $fastnet_data['css']; ?>
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <div class="layout" style="width: <?php echo $fastnet_data['layout']; ?>;margin:auto;">
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparent">
            <div class="main-header ">

                <?php if($fastnet_data['tbv'] == 1){ ?>
                <div class="header-top d-none d-lg-block">
                    <div class="container-fluid">
                        <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left d-flex">
                                    <ul>
                                        <li><?php echo $fastnet_data['top-cell']; ?></li>
                                        <li><?php echo $fastnet_data['top-email']; ?></li>
                                    </ul>
                                    <div class="header-social">
                                        <ul>
                                            <?php if($fastnet_data['tw']): ?>
                                            <li><a href="<?php echo esc_url($fastnet_data['tw']); ?>"><i class="fab fa-twitter"></i></a></li>
                                            <?php endif; ?>
                                            <?php if($fastnet_data['fb']): ?>
                                            <li><a  href="<?php echo esc_url($fastnet_data['fb']); ?>"><i class="fab fa-facebook-f"></i></a></li>
                                            <?php endif; ?>
                                            <?php if($fastnet_data['lin']): ?>
                                            <li><a href="<?php echo esc_url($fastnet_data['lin']); ?>"><i class="fab fa-linkedin-in"></i></a></li>
                                            <?php endif; ?>
                                            <?php if($fastnet_data['gp']): ?>
                                            <li> <a href="<?php echo esc_url($fastnet_data['gp']); ?>"><i class="fab fa-google-plus-g"></i></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="<?php bloginfo('home'); ?>"><img src="<?php echo $fastnet_data['up-logo']['url']; ?>" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper  d-flex align-items-center justify-content-end">
                                    <!-- Main-menu -->
                                    <div class="main-menu d-none d-lg-block">
                                      <?php
                                        wp_nav_menu([
                                          'theme_location' => 'main-menu',
                                          'menu' => '',
                                          'container' => 'nav',
                                          'container_class' => ' ',
                                          'container_id'    => ' ',
                                          'menu_class' => ' ',
                                          'menu_id' => 'navigation',
                                          'fallback_cb' => 'header_menu',
                                          'walker' => new fastnet_walker()
                                        ]);
                                       ?>
                                    </div>
                                    <!-- Header-btn -->
                                    <?php if($fastnet_data['hbv'] == true){
                                        ?>
                                        <div class="header-right-btn d-none d-lg-block ml-30">
                                        <a href="<?php echo esc_url($fastnet_data['hbl']); ?>" class="btn header-btn"><?php echo $fastnet_data['hbn']; ?></a>
                                    </div>
                                    <?php
                                    } ?>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
