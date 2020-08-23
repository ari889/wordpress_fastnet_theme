<?php

  function fastnet_blog($one, $two, $three){

    $fastnet = shortcode_atts([
      'blog-heading-title' => '',
      'blog-heading-subtitle' => '',
      'custom-post-id' => 'post',
    ], $one);
    ob_start();
    ?>
    <section class="home-blog-area section-padding30">
       <div class="container">
           <!-- Section Tittle -->
           <div class="row justify-content-center">
               <div class="col-xl-6 col-lg-8 col-md-10 col-sm-10">
                   <div class="section-tittle text-center mb-90">
                       <span><?php echo $fastnet['blog-heading-title']; ?></span>
                       <h2><?php echo $fastnet['blog-heading-subtitle']; ?></h2>
                   </div>
               </div>
           </div>
           <div class="row">
             <?php

             $custom_post = new WP_Query([
               'post_type' => $fastnet['custom-post-id'],
               'posts_per_page' => 3
             ]);

             while($custom_post -> have_posts()):$custom_post -> the_post();
              ?>
               <div class="col-lg-4 col-md-6">
                   <div class="home-blog-single mb-30">
                       <div class="blog-img-cap">
                           <div class="blog-img">
                               <?php the_post_thumbnail('medium_large', ['class' => 'custom-post-image']); ?>
                           </div>
                           <div class="blog-cap">
                               <h3><a href="blog_details.html"><?php the_title(); ?></a></h3>
                               <p><?php the_time('F d, Y'); ?></p>
                           </div>
                       </div>
                   </div>
               </div>
             <?php endwhile; ?>
           </div>
       </div>
   </section>
    <?php
    return ob_get_clean();
  }

  add_shortcode('fastnet_blog', 'fastnet_blog');

  if(function_exists('vc_map')){
    vc_map([
      'name' => 'FastNet blog',
      'base' => 'fastnet_blog',
      'category' => 'Fastnet Widgets',
      'icon' => get_template_directory_uri().'/images/fastnet_blog.png',
      'params' => [
        [
          'param_name' => 'blog-heading-title',
          'type'      => 'textfield',
          'heading' => 'Blog heading title',
          'description' => 'Add blog heading title here',
        ],
        [
          'param_name' => 'blog-heading-subtitle',
          'type'      => 'textfield',
          'heading' => 'Blog heading subtitle',
          'description' => 'Add blog heading subtitle here',
        ],
        [
          'param_name' => 'custom-post-id',
          'type'      => 'textfield',
          'heading' => 'Blog custom post id',
          'description' => 'Add blog custom post id here',
        ],
      ]
    ]);
  }

 ?>
