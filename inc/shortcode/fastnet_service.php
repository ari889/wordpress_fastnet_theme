<?php

  function fastnet_services($one, $two, $three){

    $fastnet = shortcode_atts([
      'service-heading' => '',
      'service-description' => '',
      'service-btn' => '',
      'all-services' => '',
      'service-title' => '',
      'service-icon' => '',
    ], $one);
    ob_start();
    ?>
    <section class="service-area pb-bottom">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6 col-md-9">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle2 mb-50">
                        <h2 class="mb-35"><?php echo $fastnet['service-heading']; ?></h2>
                        <p><?php echo $fastnet['service-description']; ?></p>
                        <?php
                        if(!empty($fastnet['service-btn'])){
                          $url = vc_build_link($fastnet['service-btn']);
                          ?>
                          <a href="<?php echo $url['url']; ?>" class="btn  mt-30"><?php echo $url['title']; ?></a>
                          <?php
                        }
                         ?>
                    </div>
                </div>
                <div class="col-lg-5">
                   <div class="row">
                     <?php
                     if(!empty($fastnet['all-services'])){
                       $all_services = vc_param_group_parse_atts($fastnet['all-services']);
                       foreach($all_services as $service){
                         ?>
                         <div class="col-lg-6 col-md-4 col-sm-6">
                              <div class="single-services mb-30 text-center">
                                  <i class="<?php echo $service['service-icon']; ?>"></i>
                                  <p><?php echo $service['service-title']; ?></p>
                              </div>
                         </div>
                         <?php
                       }
                     }
                      ?>
                   </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
  }

  add_shortcode('fastnet_services', 'fastnet_services');

  if(function_exists('vc_map')){
    vc_map([
      'name' => 'FastNet service',
      'base' => 'fastnet_services',
      'category' => 'Fastnet Widgets',
      'icon' => get_template_directory_uri().'/images/fastnet-service.png',
      'params' => [
        [
          'param_name' => 'service-heading',
          'type'      => 'textfield',
          'heading' => 'Service title',
          'description' => 'Add service title here',
        ],
        [
          'param_name' => 'service-description',
          'type'      => 'textarea',
          'heading' => 'Service description',
          'description' => 'Add service description here',
        ],
        [
          'param_name' => 'service-btn',
          'type'      => 'vc_link',
          'heading' => 'Service button',
          'description' => 'Add service button here',
        ],
        [
          'param_name' => 'all-services',
          'type'      => 'param_group',
          'heading' => 'Add services',
          'description' => 'Add service icon and title here',
          'params' => [
            [
              'param_name' => 'service-title',
              'type' => 'textfield',
              'heading' => 'Service title',
              'description' => 'Add service title here'
            ],
            [
              'param_name' => 'service-icon',
              'type' => 'textfield',
              'heading' => 'Service icon',
              'description' => 'Put icon name from flat icon'
            ],
          ]
        ],
      ]
    ]);
  }

 ?>
