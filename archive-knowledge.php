 <?php 

 /*
 Template Name: Baza wiedzy
 */

 ?>
<?php get_header(); ?>
<div id="main-content" class="main-content">
	<div id="primary" class="content-area">
		<section class="container">
			<main class="row">	

				<?php 
				// Get the taxonomy's terms
					$terms = get_terms(

			    		array(
			        		'taxonomy'   => 'basecategory',
			        		'hide_empty' => false,
			    			)
						);

						// Check if any term exists
						if ( !empty( $terms ) && is_array( $terms ) ) { ?>

							<?php  foreach ( $terms as $term ) { ?>							
							
								<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
									<article id="post-<?php the_ID(); ?>" <?php post_class("tools__item"); ?>> 	
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<!-- <?php the_post_thumbnail('post-thumbnail',['class' => 'tools__item-image']);?> -->	
												<?php echo $term->description; ?>
											</div>

											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<div class="post__content">			
													<h2 class="post__title mt-3"><a href="<?php the_permalink(); ?>"><?php echo $term->name; ?></a></h2>					
												
													<a href="<?php echo esc_url( get_term_link( $term ) ) ?>" class="btn">sprawdź</a>
												</div>
											</div>
										</div>
									
									</article>
								</div>
								   	
							 <?php } ?>		
						<?php } ?>			
				
				</main>	
	</section>

</div>
</div>
<?php get_footer(); ?>


