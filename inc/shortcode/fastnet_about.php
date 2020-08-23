<?php

  function fastnet_about($one, $two, $three){

    $fastnet = shortcode_atts([
      'about-thumbnail' => '',
      'about-title' => '',
      'about-description' => '',
      'about-btn' => '',
    ], $one);
    ob_start();
    ?>
    <section class="about-low-area section-padding2">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-5 col-lg-6 col-md-9">
                    <!-- about-img -->
                    <div class="about-img">
                      <?php echo wp_get_attachment_image($fastnet['about-thumbnail'], 'full'); ?>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-10">
                    <div class="about-caption mb-50">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-35">
                            <span></span>
                            <h2><?php echo $fastnet['about-title']; ?></h2>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,mod tempor incididunt ut labore et dolore magna aliqua. Utnixm, quis nostrud exercitation ullamc.</p> -->
                        </div>
                        <p><?php echo $fastnet['about-description']; ?></p>
                    </div>
                    <?php
                    $url = vc_build_link($fastnet['about-btn']);
                     ?>
                    <a href="<?php echo $url['url']; ?>" class="btn"><?php echo $url['title']; ?></a>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
  }

  add_shortcode('fastnet_about', 'fastnet_about');

  if(function_exists('vc_map')){
    vc_map([
      'name' => 'FastNet About',
      'base' => 'fastnet_about',
      'category' => 'Fastnet Widgets',
      'icon' => get_template_directory_uri().'/images/about-icon.png',
      'params' => [
        [
          'param_name' => 'about-thumbnail',
          'type'      => 'attach_image',
          'heading' => 'About thumbnail',
          'description' => 'Add about thumbnail here',
        ],
        [
          'param_name' => 'about-title',
          'type'      => 'textfield',
          'heading' => 'About title',
          'description' => 'Add about title here',
        ],
        [
          'param_name' => 'about-description',
          'type'      => 'textarea',
          'heading' => 'About description',
          'description' => 'Add about description here',
        ],
        [
          'param_name' => 'about-btn',
          'type'      => 'vc_link',
          'heading' => 'About button',
          'description' => 'Add about button here',
        ],
      ]
    ]);
  }

 ?>
