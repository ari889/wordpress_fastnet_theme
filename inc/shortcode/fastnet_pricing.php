<?php

  function fastnet_pricing($one, $two, $three){

    $fastnet = shortcode_atts([
      'pricing-title' => '',
      'pricing-subtitle' => '',
      'pricing-price' => '',
      'pricing-btn' => '',
      'pricing-services' => '',
      'pricing-service-title' => '',
    ], $one);
    ob_start();
    ?>
    <div class="pricing-card-area">
      <div class="single-card text-center mb-30">
        <div class="card-top">
            <p><?php echo $fastnet['pricing-title']; ?></p>
            <h4><?php echo $fastnet['pricing-subtitle']; ?></h4>
        </div>
        <div class="card-mid">
            <h4>$<?php echo $fastnet['pricing-price']; ?> <span>/ mo</span></h4>
        </div>
        <div class="card-bottom">
            <ul>
              <?php
              $allservices = vc_param_group_parse_atts($fastnet['pricing-services']);
              foreach($allservices as $service){
                ?>
                <li><?php echo $service['pricing-service-title']; ?></li>
                <?php
              }
              ?>
                <!-- <li>Line Rental Included</li>
                <li>12 Month Contract</li>
                <li>No Activation Charges</li>
                <li>Up to 12Mbps average Speed</li>
                <li>Enjoy family on weekends</li> -->
            </ul>
            <?php
            $url = vc_build_link($fastnet['pricing-btn']);
             ?>
            <a href="<?php echo $url['url']; ?>" class="borders-btn"><?php echo $url['title']; ?></a>
        </div>
    </div>
    </div>
    <?php
    return ob_get_clean();
  }

  add_shortcode('fastnet_pricing', 'fastnet_pricing');

  if(function_exists('vc_map')){
    vc_map([
      'name' => 'FastNet pricing',
      'base' => 'fastnet_pricing',
      'category' => 'Fastnet Widgets',
      'icon' => get_template_directory_uri().'/images/fastnet_pricing.png',
      'params' => [
        [
          'param_name' => 'pricing-title',
          'type'      => 'textfield',
          'heading' => 'Pricing title',
          'description' => 'Add service prcing title here',
        ],
        [
          'param_name' => 'pricing-subtitle',
          'type'      => 'textfield',
          'heading' => 'Pricing subtitle',
          'description' => 'Add service prcing subtitle here',
        ],
        [
          'param_name' => 'pricing-price',
          'type'      => 'textfield',
          'heading' => 'Pricing price',
          'description' => 'Add service prcing price here',
        ],
        [
          'param_name' => 'pricing-btn',
          'type'      => 'vc_link',
          'heading' => 'Pricing button',
          'description' => 'Add service prcing button here',
        ],
        [
          'param_name' => 'pricing-services',
          'type'      => 'param_group',
          'heading' => 'Pricing services',
          'description' => 'Add service prcing services here',
          'params' => [
            [
              'param_name' => 'pricing-service-title',
              'type' => 'textfield',
              'heading' => 'Pricing service title',
              'description' => 'Pricing service title add here'
            ],
          ]
        ],
      ]
    ]);
  }

 ?>
