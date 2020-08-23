<?php

  function fastnet_heading($one, $two, $three){

    $fastnet = shortcode_atts([
      'heading-title' => '',
      'heading-subtitle' => ''
    ], $one);
    ob_start();
    ?>
    <div class="section-tittle text-center mb-100">
        <p><?php echo $fastnet['heading-title']; ?></p>
        <h2><?php echo $fastnet['heading-subtitle']; ?></h2>
    </div>
    <?php
    return ob_get_clean();
  }

  add_shortcode('fastnet_heading', 'fastnet_heading');

  if(function_exists('vc_map')){
    vc_map([
      'name' => 'FastNet heading',
      'base' => 'fastnet_heading',
      'category' => 'Fastnet Widgets',
      'icon' => get_template_directory_uri().'/images/fastnet_heading.png',
      'params' => [
        [
          'param_name' => 'heading-title',
          'type'      => 'textfield',
          'heading' => 'Heading title',
          'description' => 'Add heading title here',
        ],
        [
          'param_name' => 'heading-subtitle',
          'type'      => 'textfield',
          'heading' => 'Heading sub title',
          'description' => 'Add heading sub title here',
        ],
      ]
    ]);
  }

 ?>
