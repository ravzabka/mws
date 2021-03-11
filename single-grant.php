<?php get_header(); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">
		<section class="container">
			<div class="row">
				<main class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
					<div class="post">				
					
					<?php
							// Start the Loop.
					while ( have_posts() ) :
								the_post(); ?>

								<h2 class="post__single-title"><?php the_title(); ?></h2>							
					
								<div class="metabox">
										<?php $relatedWriter = get_field('related_writer'); 
										if($relatedWriter){
											foreach ($relatedWriter as $writer) { ?>
						
											<div class="author__meta-image">
												<?php echo get_the_post_thumbnail($writer); ?>
											</div>	
											<div class="author__meta-profile">									
												<p class="author__meta-name"><a href="<?php echo get_the_permalink($writer)?>" class="popular-articles__link"><?php echo get_the_title($writer)?></a></p>
											</div>
											<?php } 
										} ?>
						
									
									<span class="metabox__date"><?php the_date( 'd F Y'); ?></span>					
								</div>								

								<div class="post__image">
									<?php the_post_thumbnail();?>
								</div>
								<div class="post__content">
									<?php the_content(); ?>
									<?php wp_link_pages(); ?>
								</div>
								
							<?php endwhile; wp_reset_postdata();?>

					
					</div>
						
				</main>
				<aside class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
					

					<?php mws_news(3); ?>
					
					<?php mws_training_events(3); ?>			
					
				
					
				</aside>
			</div>
		</section>
	</div><!-- #content -->
</div><!-- #primary -->
<?php get_footer(); ?>