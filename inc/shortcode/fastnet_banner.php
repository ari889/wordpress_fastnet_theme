<?php

  function fastnet_banner($one, $two, $three){

    $fastnet = shortcode_atts([
      'add-slide' => '',
      'slide-title' => '',
      'slide-subtitle' => '',
      'btn-link' => '',
    ], $one);
    ob_start();
    ?>
    <div class="slider-area">
        <div class="slider-active">
            <!-- Single Slider -->

            <?php
            $all_slides = vc_param_group_parse_atts($fastnet['add-slide']);
            foreach($all_slides as $slide){
              ?>
              <div class="single-slider slider-height d-flex align-items-center">
                  <div class="container">
                      <div class="row">
                          <div class="col-xl-7 col-lg-6 col-md-8 col-sm-10">
                              <div class="hero__caption">
                                  <h1 data-animation="fadeInUp" data-delay=".4s"><?php echo $slide['slide-title']; ?></h1>
                                  <P data-animation="fadeInUp" data-delay=".6s" ><?php echo $slide['slide-subtitle']; ?></P>
                                  <!-- Hero-btn -->
                                  <div class="hero__btn">
                                    <?php
                                    $url = vc_build_link($slide['btn-link']);
                                    if(!empty($url)){
                                      ?>
                                      <a href="<?php echo $url['url']; ?>" class="btn hero-btn mb-10"  data-animation="fadeInUp" data-delay=".8s"><?php echo $url['title']; ?></a>
                                      <?php
                                    }
                                     ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <?php
            }
             ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
  }

  add_shortcode('fastnet_banner', 'fastnet_banner');
  if(function_exists('vc_map')){
    vc_map([
      'name' => 'FastNet Banner',
      'base' => 'fastnet_banner',
      'category' => 'Fastnet Widgets',
      'icon' => get_template_directory_uri().'/images/banner-icon.png',
      'params' => [
        [
          'param_name' => 'add-slide',
          'type'      => 'param_group',
          'heading' => 'Add slide here',
          'description' => 'Add slide title, description and button link here',
          'params' => [
            [
              'param_name' => 'slide-title',
              'type' => 'textfield',
              'heading' => 'Slide Title',
              'description' => 'Add slide title here'
            ],
            [
              'param_name' => 'slide-subtitle',
              'type' => 'textfield',
              'heading' => 'Slide Subtitle',
              'description' => 'Add slide subtitle here'
            ],
            [
              'param_name' => 'btn-link',
              'type' => 'vc_link',
              'heading' => 'Slide button link',
              'description' => 'Add slide button-link here',
            ],
          ],
        ]
      ]
    ]);
  }

 ?>
