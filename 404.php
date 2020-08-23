<?php get_header(); ?>

<div class="page-404">
	<div class="container">
		<div class="content-404">
			<div class="custom-position">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/logo.png" alt="">
				<h2>Page Not Found</h2>
				<p>The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place.</p>
				<a href="<?php bloginfo('home'); ?>" class="btn btn-success">Back to home</a>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>