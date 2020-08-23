<?php

  function fastnet_testimonial($one, $two, $three){

    $fastnet = shortcode_atts([
      'testimonial-title' => '',
      'testimonial-image' => '',
      'testimonial-slide' => '',
      'testimonial-name' => '',
      'testimonial-position' => '',
    ], $one);
    ob_start();
    ?>
    <section class="about-area2 testimonial-area section-padding30 fix">
       <div class="container">
           <div class="row align-items-center">
               <div class=" col-lg-6 col-md-9 col-sm-9">
                   <div class="about-caption">
                       <!-- Section Tittle -->
                       <div class="section-tittle mb-55">
                           <h2><?php echo $fastnet['testimonial-title'] ?></h2>
                       </div>
                       <!-- Testimonial Start -->
                       <div class="h1-testimonial-active">
                           <!-- Single Testimonial -->
                           <?php
                           $all_slide = vc_param_group_parse_atts($fastnet['testimonial-slide']);
                           foreach($all_slide as $slide){
                             ?>
                             <div class="single-testimonial">
                                 <div class="testimonial-caption">
                                     <p><?php echo $slide['testimonial-description']; ?></p>
                                     <div class="rattiong-caption">
                                         <span><?php echo $slide['testimonial-name']; ?><span><?php echo $slide['testimonial-position']; ?></span> </span>
                                     </div>
                                 </div>
                             </div>
                             <?php
                           }
                            ?>
                       </div>
                       <!-- Testimonial End -->
                   </div>
               </div>
               <div class="col-lg-5 col-md-11 col-sm-11">
                   <!-- about-img -->
                   <div class="about-img2">
                       <img src="<?php echo wp_get_attachment_image_url($fastnet['testimonial-image'], 'full'); ?>" alt="">
                   </div>
               </div>
           </div>
       </div>
   </section>
    <?php
    return ob_get_clean();
  }

  add_shortcode('fastnet_testimonial', 'fastnet_testimonial');

  if(function_exists('vc_map')){
    vc_map([
      'name' => 'FastNet Testiminial',
      'base' => 'fastnet_testimonial',
      'category' => 'Fastnet Widgets',
      'icon' => get_template_directory_uri().'/images/fastnet_testimonial.png',
      'params' => [
        [
          'param_name' => 'testimonial-title',
          'type'      => 'textfield',
          'heading' => 'Testiminial title',
          'description' => 'Add testiminial title here',
        ],
        [
          'param_name' => 'testimonial-image',
          'type'      => 'attach_image',
          'heading' => 'Testiminial image',
          'description' => 'Add testiminial image here',
        ],
        [
          'param_name' => 'testimonial-slide',
          'type'      => 'param_group',
          'heading' => 'Testiminial slide',
          'description' => 'Add testiminial slide here',
          'params' => [
            [
              'param_name' => 'testimonial-description',
              'type' => 'textarea',
              'heading' => 'Testimonial description',
              'description' => 'Add testimonial description here'
            ],
            [
              'param_name' => 'testimonial-name',
              'type' => 'textfield',
              'heading' => 'Testimonial name',
              'description' => 'Add testimonial name here'
            ],
            [
              'param_name' => 'testimonial-position',
              'type' => 'textfield',
              'heading' => 'Testimonial position',
              'description' => 'Add testimonial position here'
            ],
          ]
        ],
      ]
    ]);
  }

 ?>
