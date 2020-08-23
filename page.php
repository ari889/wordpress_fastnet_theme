<?php get_header(); ?>
    <main>
        <?php 
        if(!is_front_page()){
            ?>
            <!--? Hero Start -->
            <div class="slider-area2" style="background-image: url('<?php echo get_post_meta( get_the_ID(), 'page-title-image', true); ?>');">
                <div class="slider-height2 d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="hero-cap hero-cap2 pt-50 text-center">
                                    <h2><?php echo get_post_meta(get_the_id(), 'page-title-name', true); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hero End -->
            <?php
         }
         ?>
        <?php
        while(have_posts()):the_post();
          ?>
                <?php the_content(); ?>
        <?php
        endwhile;
         ?>
    </main>
  <?php get_footer(); ?>
