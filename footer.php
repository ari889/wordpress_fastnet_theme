<?php global $fastnet_data; ?>
<footer>
    <!--? Footer Start-->
    <div class="footer-area section-bg" data-background="<?php echo get_template_directory_uri(); ?>/assets/img/gallery/footer_bg.png">
        <div class="container">
             <!-- Brand Area Start -->
            <div class="brand-area pt-25 pb-30">
                <div class="container">
                    <div class="brand-active brand-border pt-50 pb-40">
                      <?php
                      $client = new WP_Query([
                        'post_type' => 'client',
                        'posts_per_page' => -1
                      ]);

                      while($client -> have_posts()):$client -> the_post();
                       ?>
                        <div class="single-brand">
                            <?php the_post_thumbnail(); ?>
                        </div>
                      <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <!-- Brand Area End -->
            <div class="footer-top footer-padding">
                <div class="row d-flex justify-content-between">
                  <?php dynamic_sidebar('footer-bar'); ?>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-xl-9 col-lg-8">
                        <div class="footer-copy-right">
                            <p><?php echo $fastnet_data['copy-text']; ?></p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <!-- Footer Social -->
                        <div class="footer-social f-right">
                            <?php if($fastnet_data['tw']): ?>
                            <a href="<?php echo esc_url($fastnet_data['tw']); ?>"><i class="fab fa-twitter"></i></a>
                            <?php endif; ?>
                            <?php if($fastnet_data['fb']): ?>
                            <a href="<?php echo esc_url($fastnet_data['fb']); ?>"><i class="fab fa-facebook-f"></i></a>
                            <?php endif; ?>
                            <?php if($fastnet_data['lin']): ?>
                            <a href="<?php echo esc_url($fastnet_data['lin']); ?>"><i class="fab fa-linkedin-in"></i></a>
                            <?php endif; ?>
                            <?php if($fastnet_data['gp']): ?>
                            <a href="<?php echo esc_url($fastnet_data['gp']); ?>"><i class="fab fa-google-plus-g"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
</div>
<!-- Scroll Up -->
<div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>
  <?php wp_footer(); ?>
</body>
</html>
