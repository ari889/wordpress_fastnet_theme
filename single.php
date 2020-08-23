<?php get_header(); ?>
   <main>
      <!--? Hero Start -->
      <div class="slider-area2">
         <div class="slider-height2 d-flex align-items-center">
            <div class="container">
               <div class="row">
                  <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 pt-50 text-center">
                           <h2>Blog Details</h2>
                        </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Hero End -->
      <!--? Blog Area Start -->
      <?php while(have_posts()):the_post(); ?>
      <section class="blog_area single-post-area section-padding">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 posts-list">
                  <div class="single-post">
                     <div class="feature-img">
                        <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'title' => 'Feature Image']); ?>
                     </div>
                     <div class="blog_details">
                        <h2 style="color: #2d2d2d;"><?php the_title(); ?></h2>
                        <ul class="blog-info-link mt-3 mb-4">
                           <li><a href="#"><i class="fa fa-user"></i> <?php the_category(','); ?></a></li>
                           <li><a href="#"><i class="fa fa-comments"></i> <?php comments_popup_link('No Comment', 'One Comment', '% Comment'); ?></a></li>
                        </ul>
                        <p><?php the_content(); ?></p>
                     </div>
                  </div>
                  <div class="navigation-top">
                     <div class="d-sm-flex justify-content-between text-center">
                        <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4
                           people like this</p>
                        <div class="col-sm-4 text-center my-2 my-sm-0">
                        </div>
                        <ul class="social-icons">
                           <li><a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a></li>
                           <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                           <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                           <li><a href="#"><i class="fab fa-behance"></i></a></li>
                        </ul>
                     </div>
                     <div class="navigation-area">
                        <div class="row">
                           <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                             <?php
                             $prevPost = get_previous_post();
                             if(!empty($prevPost)):
                              ?>
                              <div class="thumb">
                                <?php
                                  $prevThumbnail = get_the_post_thumbnail( $prevPost->ID, 'thumbnail', ['class' => 'img-fluid' ]);
                                  previous_post_link( '%link', $prevThumbnail );
                                 ?>
                              </div>
                              <div class="arrow">
                                 <a href="#">
                                    <span class="lnr text-white ti-arrow-left"></span>
                                 </a>
                              </div>
                              <div class="detials">
                                 <p>Prev Post</p>
                                 <a href="<?php echo get_permalink( $prevPost->ID ); ?>">
                                   <h4 style="color: #2d2d2d;">
                                   <?php
                                      if(str_word_count(apply_filters( 'the_title', $prevPost->post_title )) > 4){
                                        echo wp_trim_words(apply_filters( 'the_title', $prevPost->post_title ), 4, false).'...';
                                      }else{
                                        echo apply_filters( 'the_title', $prevPost->post_title );
                                      }
                                   ?>
                                   </h4>
                                 </a>
                              </div>
                            <?php endif; ?>
                           </div>
                           <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                             <?php
                             $nextPost = get_next_post();
                             if(!empty($nextPost)):
                              ?>
                              <div class="detials">
                                 <p>Next Post</p>
                                 <a href="<?php echo get_permalink( $nextPost->ID ); ?>">
                                   <h4 style="color: #2d2d2d;">
                                   <?php
                                      if(str_word_count(apply_filters( 'the_title', $nextPost->post_title )) > 4){
                                        echo wp_trim_words(apply_filters( 'the_title', $nextPost->post_title ), 4, false).'...';
                                      }else{
                                        echo apply_filters( 'the_title', $nextPost->post_title );
                                      }
                                   ?>
                                   </h4>
                                 </a>
                              </div>
                              <div class="arrow">
                                 <a href="#">
                                    <span class="lnr text-white ti-arrow-right"></span>
                                 </a>
                              </div>
                              <div class="thumb">
                                <?php
                                  $nextThumbnail = get_the_post_thumbnail( $nextPost->ID, 'thumbnail', ['class' => 'img-fluid' ]);
                                  next_post_link( '%link', $nextThumbnail );
                                 ?>
                              </div>
                            <?php endif; ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="blog-author">
                     <div class="media align-items-center">
                      <?php echo get_avatar(get_the_author_meta('ID'), 32); ?>
                        <div class="media-body">
                           <a href="#">
                              <h4><?php the_author(); ?></h4>
                           </a>
                           <p><?php the_author_description(); ?></p>
                        </div>
                     </div>
                  </div>
                  <div class="comments-area">
                     <h4><?php comments_popup_link('No Comments', 'One Comment', '% Comments'); ?></h4>
                     <?php comments_template(); ?>
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
    <?php endwhile; ?>
   </main>
<?php get_footer(); ?>
