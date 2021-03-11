<?php get_header(); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

		<section class="page container">

			<div class="row">
				<main class="col-xs-12 col-sm-12 col-md-9 col-lg-12">
					
					<?php
							// Start the Loop.
						while ( have_posts() ) :
							the_post(); ?>
							<div class="post__image">
								<?php the_post_thumbnail();?>
							</div>					

							<h2 class="post__single-title"><?php the_title(); ?></h2>
							<div class="post__content">
								<?php the_content(); ?>
							</div>
							
						<?php endwhile; ?>					
				</main>			
			</div>
		</section>	

	</div><!-- #content -->
</div><!-- #primary -->
		
	

<?php get_footer(); ?>