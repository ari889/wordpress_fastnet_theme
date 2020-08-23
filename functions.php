<?php

  function  fastNet(){

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('post-formats');
    add_theme_support('menus');
    add_theme_support('widgets');
    add_theme_support('custom-logo');
    add_theme_support('custom-background');
    add_theme_support('custom-header');
    add_theme_support( 'post-formats' , ['video','audio','gallery','quote']);

    register_nav_menus([
        'main-menu' => 'Main Menu',
        'footer-support-menu' => 'Footer support menu',
        'footer-quick-link' => 'Footer quick link',
    ]);

    register_post_type('client', [
      'public' => true,
      'labels' => [
        'name' => 'Clients',
        'all_items' => 'All clients',
        'add_new' => 'Add new',
        'add_new_item' => 'Add new client',
        'not_found' => 'No client data found'
      ],
      'supports' => ['thumbnail', 'title', ''],
      'menu_icon' => 'dashicons-groups'
    ]);

    register_taxonomy('team-tag', 'client', [
      'public' => true,
      'labels' => [
        'name' => 'Client tag',
        'all_items' => 'All tags',
        'add_new' => 'Add new',
      ]
    ]);

    register_taxonomy('team-cat', 'client', [
      'public' => true,
      'hierarchical' => true
    ]);

  }
  add_action('after_setup_theme', 'fastNet');

  class fastnet_search extends WP_Widget{
    public function __construct(){
      parent::__construct('fastnet_search', 'FastNet Search',[
        'description' => 'Add search option here'
      ]);
    }

    public function widget($one, $two){
      ?>
      <aside class="single_sidebar_widget search_widget">
      <?php get_search_form(); ?>
      <?php echo $one['after_widget']; ?>
      <?php
    }
  }

  class fastnet_post_category extends WP_Widget{
    public function __construct(){
      parent::__construct('fastnet_post_category', 'Custom Post Categories', [
        'description' => 'Add custom post category'
      ]);
    }

    public function widget($one, $two){
      $title = $two['title'];
      ?>
      <?php echo $one['before_widget']; ?>
        <?php echo $one['before_title']; ?><?php echo $title; ?><?php echo $one['after_title']; ?>
          <ul class="list cat-list">
            <?php
            $categories = get_the_category();

            foreach($categories as $category){
              ?>
              <li>
                  <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="d-flex" alt="<?php echo esc_attr(sprintf(__('View all post in %s', 'textdomain'), $category->name)); ?>">
                      <p><?php echo esc_html($category->name); ?></p>
                      <p>(<?php echo $category->category_count; ?>)</p>
                  </a>
              </li>
              <?php
            }
             ?>
          </ul>
      <?php echo $one['after_widget']; ?>
      <?php
    }

    public function form($two){
      $title = $two['title'];
      ?>
      <p>
        <label for="">Title</label>
        <input type="text" class="widefat" name="<?php echo $this -> get_field_name('title'); ?>" value="<?php echo $title; ?>">
      </p>
      <?php
    }
  }

  class fastnet_recent_posts extends WP_Widget{
    public function __construct(){
      parent::__construct('fastnet_recent_posts', 'Fastnet Recent Post', [
        'description' => 'All recent posts here',
      ]);
    }

    public function widget($one, $two){
      $title = $two['title'];
      ?>
      <aside class="single_sidebar_widget popular_post_widget">
          <?php echo $one['before_title']; ?><?php echo $title; ?><?php echo $one['after_title']; ?>
          <?php

          $recent_posts = new WP_Query([
            'post_type' => 'post',
            'posts_per_page' => 5,
          ]);
          while($recent_posts -> have_posts()):$recent_posts -> the_post();
            ?>
            <div class="media post_item">
              <?php the_post_thumbnail('post-thumbnail', ['class' => 'right-bar-image', 'title' => 'Right Bar Image']); ?>
                <div class="media-body">
                    <a href="<?php the_permalink(); ?>">
                        <h3 style="color: #2d2d2d;"><?php the_title(); ?></h3>
                    </a>
                    <p><?php the_time('F d, Y'); ?></p>
                </div>
            </div>
            <?php
          endwhile;
           ?>
      <?php echo $one['after_widget']; ?>
      <?php
    }

    public function form($two){
      $title = $two['title'];
      ?>
      <p>
        <label for="">Title</label>
        <input type="text" class="widefat" name="<?php echo $this -> get_field_name('title'); ?>" value="<?php echo $title; ?>">
      </p>
      <?php
    }
  }

  class fastnet_custom_tag extends WP_Widget{
    public function __construct(){
      parent::__construct('fastnet_custom_tag', 'Fastnet Custom Tags', [
        'description' => 'Custom tag widgets'
      ]);
    }

    public function widget($one, $two){
      $title = $two['title'];
      ?>
      <aside class="single_sidebar_widget tag_cloud_widget">
          <?php echo $one['before_title']; ?><?php echo $title; ?><?php echo $one['after_title']; ?>
          <ul class="list">
            <?php
            $tags = get_tags();

            if($tags){
              foreach($tags as $tag){
                ?>
                <li>
                    <a href="<?php echo esc_url(get_tag_link($tag -> term_id)); ?>"><?php echo $tag -> name; ?></a>
                </li>
                <?php
              }
            }
             ?>
          </ul>
      </aside>

      <?php
    }

    public function form($two){
      $title = $two['title'];
      ?>
      <p>
        <label for="">Title</label>
        <input type="text" class="widefat" name="<?php echo $this -> get_field_name('title'); ?>" value="<?php echo $title; ?>">
      </p>
      <?php
    }
  }


  class fastNet_about extends WP_Widget{
    public function __construct(){
      parent::__construct('fastNet_about', 'Fastnet About', [
        'description' => 'Fastnet about info start here'
      ]);
    }

    public function widget($one, $two){
      $description = $two['description'];
      $cell = $two['cell'];
      $email = $two['email'];
      ?>
      <div class="col-xl-3 col-lg-4 col-md-5 col-sm-8">
          <div class="single-footer-caption mb-50">
              <!-- logo -->
              <div class="footer-logo">
                  <?php
                  $custom_logo_id = get_theme_mod( 'custom_logo' );
                  $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                   ?>
                  <a href="<?php bloginfo('home'); ?>"><img src="<?php echo $image[0]; ?>" alt=""></a>
              </div>
              <div class="footer-tittle">
                  <div class="footer-pera">
                      <p class="info1"><?php echo $description; ?></p>
                  </div>
              </div>
              <div class="footer-number">
                  <h4><?php echo $cell; ?></h4>
                  <p><?php echo $email; ?></p>
              </div>
          </div>
      </div>
      <?php
    }

    public function form($two){
      $description = $two['description'];
      $cell = $two['cell'];
      $email = $two['email'];
      ?>
      <p>You need to add a site logo before add this widget.</p>
      <p>
        <label for="description">Description</label>
        <textarea name="<?php echo $this -> get_field_name('description'); ?>" cols="30" rows="10" class="widefat"><?php echo $description; ?></textarea>
      </p>
      <p>
        <label for="cell">Cell</label>
        <input type="text" class="widefat" name="<?php echo $this -> get_field_name('cell'); ?>" value="<?php echo $cell; ?>">
      </p>
      <p>
        <label for="email">Email</label>
        <input type="text" class="widefat" name="<?php echo $this -> get_field_name('email'); ?>" value="<?php echo $email; ?>">
      </p>
      <?php
    }
  }

  class fastNet_support_menu extends WP_Widget{
    public function __construct(){
      parent::__construct('fastNet_support_menu', 'Menu', [
        'description' => 'Fastnet support menu widget. Menu can be added from wordpress menus.'
      ]);
    }

    public function widget($one, $two){
      $title = $two['title'];
      $menu = $two['menu'];
      ?>
      <div class="col-xl-2 col-lg-2 col-md-3 col-sm-5">
          <div class="single-footer-caption mb-50">
              <div class="footer-tittle">
                  <?php echo $one['before_title']; ?> <?php echo $title; ?> <?php echo $one['after_title']; ?>
                  <?php
                    if(!empty($menu)){
                      wp_nav_menu([
                        'theme_location' => $menu,
                        'container' => '',
                        'container_class' => '',
                        'container_id' => '',
                        'menu_class' => '',
                        'menu_id' => ''
                      ]);
                    }
                   ?>
              </div>
          </div>
      </div>
      <?php

    }

    public function form($two){
      $title = $two['title'];
      $menu = $two['menu'];
      $menus = get_registered_nav_menus();
      ?>
        <p>
          <label for="title">Title</label>
          <input type="text" class="widefat" id="title" name="<?php echo $this -> get_field_name('title'); ?>" value="<?php echo $title; ?>">
        </p>
        <p>
          <label for="menu">Select menu</label>
            <select name="<?php echo $this -> get_field_name('menu'); ?>" id="menu" class="widefat">
            <?php
            foreach ( $menus as $location => $description ) {
                echo '<option value="'.$location.'">'.$description.'</option>';
            }
            ?>
            </select>
        </p>
      <?php
    }
  }

  class fastNet_Newslatter extends WP_Widget{
    public function __construct(){
      parent::__construct('fastNet_Newslatter', 'Newslatter', [
        'description' => 'Fastnet newslatter widget for collect mail'
      ]);
    }

    public function widget($one, $two){
      $title = $two['custom_title'];
      $description = $two['description'];
      ?>
      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8">
          <div class="single-footer-caption mb-50">
              <div class="footer-tittle">
                  <?php echo $one['before_title']; ?> <?php echo $title; ?> <?php echo $one['after_title']; ?>
                  <div class="footer-pera">
                      <p class="info1"><?php echo $description; ?></p>
                  </div>
              </div>
              <!-- Form -->
              <div class="footer-form">
                  <div id="mc_embed_signup">
                      <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative mail_part" novalidate="true">
                          <input type="email" name="EMAIL" id="newsletter-form-email" placeholder=" Email Address " class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email address'">
                          <div class="form-icon">
                              <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm">
                                  Send
                              </button>
                          </div>
                          <div class="mt-10 info"></div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
      <?php
    }

    public function form($two){
      $title = $two['custom_title'];
      $description = $two['description'];
      ?>
        <p>
          <label for="">Title</label>
          <input type="text" name="<?php echo $this -> get_field_name('custom_title'); ?>" class="widefat" value="<?php echo $title; ?>">
        </p>
        <p>
          <label for="">Description</label>
          <textarea name="<?php echo $this -> get_field_name('description'); ?>" cols="30" rows="10" class="widefat"><?php echo $description; ?></textarea>
        </p>
      <?php
    }
  }

  function fastnet_widget_init(){
    register_sidebar([
        'name' => 'Right Sidebar',
        'description' => 'Drag and drop all widget here',
        'id' => 'right-bar',
        'before_widget' => '<aside class="single_sidebar_widget post_category_widget">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget_title" style="color: #2d2d2d;">',
        'after_title' => '</h4>'
    ]);


    register_sidebar([
      'name' => 'Footer Sidebar',
      'description' => 'Add footer widget here',
      'id' => 'footer-bar',
      'before_title' => '<h4>',
      'after_title' => '</h4>'
    ]);

    register_widget('fastNet_about');
    register_widget('fastNet_support_menu');
    register_widget('fastNet_Newslatter');
    register_widget('fastnet_search');
    register_widget('fastnet_post_category');
    register_widget('fastnet_recent_posts');
    register_widget('fastnet_custom_tag');
  }

  add_action('widgets_init', 'fastnet_widget_init');

  function fastnet_comment_template($one, $two, $three){?>
    <div class="comment-list">
       <div class="single-comment justify-content-between d-flex">
          <div class="user justify-content-between d-flex">
             <div class="thumb">
                <?php echo get_avatar($one, '', '', '', [
                  'class' => 'custom-image'
                ]); ?>
             </div>
             <div class="desc">
                <p class="comment">
                  <?php comment_text(); ?>
                </p>
                <div class="d-flex justify-content-between">
                   <div class="d-flex align-items-center">
                      <h5>
                         <a href="#"><?php comment_author(); ?></a>
                      </h5>
                      <p class="date"><?php comment_date('F d, Y'); ?> at <?php comment_time('g:i a'); ?> </p>
                   </div>
                   <div class="reply-btn">
                      <?php
                          comment_reply_link(array_merge($two, [
                            'depth' => $three,
                            'max_depth' => $two['max_depth']
                          ]));
                       ?>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <?php
  }


  add_filter('comment_form_default_fields', function($fast_net){
    $fast_net['fastnet_mess'] = '<div class="row">
       <div class="col-12">
          <div class="form-group">
             <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                placeholder="Write Comment"></textarea>
          </div>
       </div>
       </div>';
    $fast_net['author'] = '<div class="row">
    <div class="col-sm-6">
       <div class="form-group">
          <input class="form-control" name="author" id="name" type="text" placeholder="Name">
       </div>
    </div>';
    $fast_net['email'] = '<div class="col-sm-6">
       <div class="form-group">
          <input class="form-control" name="email" id="email" type="email" placeholder="Email">
       </div>
    </div>';
    $fast_net['url'] = '<div class="col-12">
       <div class="form-group">
          <input class="form-control" name="url" id="website" type="text" placeholder="Website">
       </div>
    </div>
 </div>';
 $fast_net['cookies'] = '';
    return $fast_net;

  });


  add_filter('comment_form_defaults', function($fastNet){
    $fastNet['submit_button'] = '<button type="submit" class="button button-contactForm btn_1 boxed-btn">Post Comment</button>';
    $fastNet['submit_field'] = '<div class="form-group">%1$s %2$s</div>';
    if(is_user_logged_in()){
      $fastNet['comment_field'] = '<div class="row">
         <div class="col-12">
            <div class="form-group">
               <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                  placeholder="Write Comment"></textarea>
            </div>
         </div>
         </div>';
    }else{
      $fastNet['comment_field'] = '';
    }
    $fastNet['comment_notes_before'] = '';
    $fastNet['title_reply_before'] = '<h4>';
    $fastNet['title_reply_after'] = '</h4>';
    return $fastNet;
  });

  function header_menu(){
    echo 'Add menu';
  }

  function fastNet_css_js_links(){
    wp_enqueue_style('Bootstrap css', get_template_directory_uri().'/assets/css/bootstrap.min.css');
    wp_enqueue_style('Owl carousel css', get_template_directory_uri().'/assets/css/owl.carousel.min.css');
    wp_enqueue_style('Slicknav', get_template_directory_uri().'/assets/css/slicknav.css');
    wp_enqueue_style('Falticon', get_template_directory_uri().'/assets/css/flaticon.css');
    wp_enqueue_style('Progressbar barfiller', get_template_directory_uri().'/assets/css/progressbar_barfiller.css');
    wp_enqueue_style('Gijgo', get_template_directory_uri().'/assets/css/gijgo.css');
    wp_enqueue_style('Animate Css', get_template_directory_uri().'/assets/css/animate.min.css');
    wp_enqueue_style('Animated headline', get_template_directory_uri().'/assets/css/animated-headline.css');
    wp_enqueue_style('Magnific popup', get_template_directory_uri().'/assets/css/magnific-popup.css');
    wp_enqueue_style('Font awesome css', get_template_directory_uri().'/assets/css/fontawesome-all.min.css');
    wp_enqueue_style('Themify icons', get_template_directory_uri().'/assets/css/themify-icons.css');
    wp_enqueue_style('Slick', get_template_directory_uri().'/assets/css/slick.css');
    wp_enqueue_style('Nice select', get_template_directory_uri().'/assets/css/nice-select.css');
    wp_enqueue_style('Custom stylesheet', get_template_directory_uri().'/assets/css/style.css');
    wp_enqueue_style('style', get_stylesheet_uri());

    wp_enqueue_script('Modernizr', get_template_directory_uri().'/assets/js/vendor/modernizr-3.5.0.min.js', [], true, true);
    wp_enqueue_script('Jquery', get_template_directory_uri().'/assets/js/vendor/jquery-1.12.4.min.js', ['jquery'], true, true);
    wp_enqueue_script('Pooper', get_template_directory_uri().'/assets/js/popper.min.js', ['jquery'], true, true);
    wp_enqueue_script('Bootstrap Js', get_template_directory_uri().'/assets/js/bootstrap.min.js', ['jquery'], true, true);
    wp_enqueue_script('Slicknav', get_template_directory_uri().'/assets/js/jquery.slicknav.min.js', ['jquery'], true, true);
    wp_enqueue_script('Owl carousel js', get_template_directory_uri().'/assets/js/owl.carousel.min.js', ['jquery'], true, true);
    wp_enqueue_script('Slick', get_template_directory_uri().'/assets/js/slick.min.js', ['jquery'], true, true);
    wp_enqueue_script('Wow js', get_template_directory_uri().'/assets/js/wow.min.js', ['jquery'], true, true);
    wp_enqueue_script('Animated headline', get_template_directory_uri().'/assets/js/animated.headline.js', ['jquery'], true, true);
    wp_enqueue_script('Magnific popup', get_template_directory_uri().'/assets/js/jquery.magnific-popup.js', ['jquery'], true, true);
    wp_enqueue_script('gijgo', get_template_directory_uri().'/assets/js/gijgo.min.js', ['jquery'], true, true);
    wp_enqueue_script('Nice select', get_template_directory_uri().'/assets/js/jquery.nice-select.min.js', ['jquery'], true, true);
    wp_enqueue_script('Sticky', get_template_directory_uri().'/assets/js/jquery.sticky.js', ['jquery'], true, true);
    wp_enqueue_script('Barfiller', get_template_directory_uri().'/assets/js/jquery.barfiller.js', ['jquery'], true, true);
    wp_enqueue_script('Counterup', get_template_directory_uri().'/assets/js/jquery.counterup.min.js', ['jquery'], true, true);
    wp_enqueue_script('Waypoints', get_template_directory_uri().'/assets/js/waypoints.min.js', ['jquery'], true, true);
    wp_enqueue_script('Countdown', get_template_directory_uri().'/assets/js/jquery.countdown.min.js', ['jquery'], true, true);
    wp_enqueue_script('Hover direction snake', get_template_directory_uri().'/assets/js/hover-direction-snake.min.js', ['jquery'], true, true);
    wp_enqueue_script('Contact', get_template_directory_uri().'/assets/js/contact.js', ['jquery'], true, true);
    wp_enqueue_script('Form', get_template_directory_uri().'/assets/js/jquery.form.js', ['jquery'], true, true);
    wp_enqueue_script('Validate', get_template_directory_uri().'/assets/js/jquery.validate.min.js', ['jquery'], true, true);
    wp_enqueue_script('Mail Script', get_template_directory_uri().'/assets/js/mail-script.js', ['jquery'], true, true);
    wp_enqueue_script('Ajaxchimp', get_template_directory_uri().'/assets/js/jquery.ajaxchimp.min.js', ['jquery'], true, true);
    wp_enqueue_script('Plugins', get_template_directory_uri().'/assets/js/plugins.js', ['jquery'], true, true);
    wp_enqueue_script('Main', get_template_directory_uri().'/assets/js/main.js', ['jquery'], true, true);
  }

  add_action('wp_enqueue_scripts', 'fastNet_css_js_links');

  function special_nav_class($classes, $item){
    if( in_array('current-menu-item', $classes) ){
        $classes[] = 'active';
    }
    return $classes;
  }
  add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

  require_once 'fastnet_walker.php';

  // tgm include
  require_once 'inc/tgm/example.php';

  //include vc shortcode
  require_once 'inc/shortcode/fastnet_banner.php';
  require_once 'inc/shortcode/fastnet_about.php';
  require_once 'inc/shortcode/fastnet_service.php';
  require_once 'inc/shortcode/fastnet_heading.php';
  require_once 'inc/shortcode/fastnet_pricing.php';
  require_once 'inc/shortcode/fastnet_check.php';
  require_once 'inc/shortcode/fastnet_testimonial.php';
  require_once 'inc/shortcode/fastnet_blog.php';
  require_once 'inc/shortcode/fastnet_contact_info.php';

  //cmb2 include
  require_once 'inc/cmb2/init.php';
  require_once 'inc/cmb2/config.php';

  //redux framework include
  require_once 'inc/redux/ReduxCore/framework.php';
  require_once 'inc/redux/sample/config.php';

 ?>
