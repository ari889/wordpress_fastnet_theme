<?php

  function fastnet_contact_info($one, $two, $three){

    $fastnet = shortcode_atts([
      'contact-icon' => '',
      'contact-heading' => '',
      'contact-info' => '',
    ], $one);
    ob_start();
    ?>
    <div class="media contact-info">
        <span class="contact-info__icon"><i class="<?php echo $fastnet['contact-icon']; ?>"></i></span>
        <div class="media-body">
            <h3><?php echo $fastnet['contact-heading']; ?></h3>
            <p><?php echo $fastnet['contact-info']; ?></p>
        </div>
    </div>
    <?php
    return ob_get_clean();
  }

  add_shortcode('fastnet_contact_info', 'fastnet_contact_info');

  if(function_exists('vc_map')){
    vc_map([
      'name' => 'FastNet contact info',
      'base' => 'fastnet_contact_info',
      'category' => 'Fastnet Widgets',
      'icon' => get_template_directory_uri().'/images/fastnet_contact.png',
      'params' => [
        [
          'param_name' => 'contact-icon',
          'type'      => 'iconpicker',
          'heading' => 'Contact icon',
          'description' => 'Add contact icon here',
        ],
        [
          'param_name' => 'contact-heading',
          'type'      => 'textfield',
          'heading' => 'Contact heading',
          'description' => 'Add contact heading here',
        ],
        [
          'param_name' => 'contact-info',
          'type'      => 'textfield',
          'heading' => 'Contact info',
          'description' => 'Add contact info here',
        ],
      ]
    ]);
  }

 ?>
