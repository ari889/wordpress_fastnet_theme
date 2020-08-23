<?php

  function fastnet_check($one, $two, $three){

    $fastnet = shortcode_atts([
      'check-heading' => '',
      'check-bgi' => '',
    ], $one);
    ob_start();
    ?>
    <div class="latest-wrapper">
        <div class="container">
            <div class="latest-area latest-height  section-bg2" data-background="<?php echo wp_get_attachment_image_url($fastnet['check-bgi'], 'full'); ?>">
                <div class="row  align-items-center justify-content-between">
                    <div class="col-xl-5 col-lg-7">
                        <div class="latest-caption">
                            <h2><?php echo $fastnet['check-heading']; ?></h2>
                        </div>
                    </div>
                     <div class="col-xl-5 col-lg-5 col-md-10 ">
                        <div class="latest-subscribe">
                            <form action="#">
                                <input type="email" placeholder="Enter Zipcode">
                                <button>Check Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
  }

  add_shortcode('fastnet_check', 'fastnet_check');

  if(function_exists('vc_map')){
    vc_map([
      'name' => 'FastNet check',
      'base' => 'fastnet_check',
      'category' => 'Fastnet Widgets',
      'icon' => get_template_directory_uri().'/images/fastnet_check.png',
      'params' => [
        [
          'param_name' => 'check-heading',
          'type'      => 'textfield',
          'heading' => 'Check heading',
          'description' => 'Add check heading here',
        ],
        [
          'param_name' => 'check-bgi',
          'type'      => 'attach_image',
          'heading' => 'Check background image',
          'description' => 'Add background image here',
        ],
      ]
    ]);
  }

 ?>
