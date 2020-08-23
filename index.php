<?php 
global $fastnet_data;
get_header(); ?>
    <main>
        <!--? Hero Start -->
        <div class="slider-area2" style="background-image: url('<?php echo $fastnet_data['bbi']['url']; ?>');">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 pt-50 text-center">
                                <h2><?php echo $fastnet_data['bt']; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        <!--? Blog Area Start-->
        <section class="blog_area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="blog_left_sidebar">
                            <?php if(have_posts()): ?>
                              <?php  while(have_posts()):the_post(); ?>
                            <article class="blog_item">
                                <div class="blog_item_img">
                                  <?php the_post_thumbnail('post-thumbnail', ['class' => 'card-img rounded-0', 'title' => 'Feature Image']); ?>
                                    <a href="<?php the_permalink(); ?>" class="blog_item_date">
                                        <h3><?php the_time('d'); ?></h3>
                                        <p><?php the_time('F'); ?></p>
                                    </a>
                                </div>
                                <div class="blog_details">
                                    <a class="d-inline-block" href="<?php the_permalink(); ?>">
                                        <h2 class="blog-head" style="color: #2d2d2d;"><?php the_title(); ?></h2>
                                    </a>
                                    <p><?php echo wp_trim_words(get_the_content(), 25, false); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="see-more">See More</a>
                                    <ul class="blog-info-link">
                                        <li><a href="#"><i class="fa fa-user"></i> <?php echo the_category(', '); ?></a></li>
                                        <li><a href="#"><i class="fa fa-comments"></i> <?php comments_popup_link('No Comments', 'One Comment', '% Comments'); ?></a></li>
                                    </ul>
                                </div>
                            </article>
                            <?php endwhile; ?>
                          <?php endif; ?>
                          <?php

                            the_posts_pagination([
                            'screen_reader_text'			=> ' ',
                              'prev_text' => '<i class="ti-angle-left"></i>',
                              'next_text' => '<i class="ti-angle-right"></i>',
                              'type'							=> 'list'
                            ]);

                            ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <?php get_sidebar(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Area End -->
    </main>
  <?php get_footer(); ?>
