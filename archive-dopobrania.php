<?php 
/*  Template Name: Do ściągnięcia  */
?>
<?php get_header(); ?>

<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

		<section class="container">
			<div class="row">
				<main class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
					<div class="row">			

						<?php 
				
							$terms = get_terms(

					    		array(
					        		'taxonomy'   => 'dopobrania',
					        		'hide_empty' => true
					    			)
							);

							// Check if any term exists
							if ( !empty( $terms ) && is_array( $terms ) ) { ?>

								<?php  foreach ( $terms as $term ) { ?>								
							
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<article id="post-<?php the_ID(); ?>" class="mb-5"> 	
											<div class="row">
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
													<a href="<?php echo get_term_link($term->term_id, 'dopobrania'); ?>"><img class="articles__image" src="<?php echo z_taxonomy_image_url($term->term_id); ?>" /></a>
													<h2 class="post__title mt-3"><a href="<?php echo get_term_link($term->term_id, 'dopobrania'); ?>"><?php echo $term->name; ?></a></h2>		
												</div>											
											</div>										
										</article>
									</div>							
									   	
							<?php } ?>		
						<?php } ?>
					</div>

				</main>

				<aside class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">					

					<?php mws_news(3); ?>
					<?php mws_popular_articles(4); ?>
					<?php mws_training_events(3); ?>		
			
				</aside>
			</div>	
		</section>
	</div>
</div>

<?php get_footer(); ?>
