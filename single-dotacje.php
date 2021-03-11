<?php get_header(); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">
		<section class="container">
			<div class="row">
				<main class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
					<div class="post">				
					
					<?php
							// Start the Loop.
					while ( have_posts() ) :
								the_post(); ?>

								<h2 class="post__single-title"><?php the_title(); ?></h2>

								<div class="post__image">
									<?php the_post_thumbnail();?>
								</div>
								<div class="post__content">
									<?php the_content(); ?>
									<div class="post-nav-links__container">
										<?php wp_link_pages(); ?>
									</div>

									<div class="tags__container">
     									<?php the_tags( '<span class="tags">', '</span><span class="tags">', '</span>' ); ?>
									</div>
								</div>
								
							<?php endwhile; wp_reset_postdata();?>

					
					</div>
						
				</main>
				<aside class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">
					

					<?php mws_news(3); ?>
					<?php mws_popular_articles(3); ?>
					<?php mws_training_events(3); ?>
					<?php mws_inspirations(3);?>
					
				</aside>
			</div>
		</section>
	</div><!-- #content -->
</div><!-- #primary -->
<?php get_footer(); ?>