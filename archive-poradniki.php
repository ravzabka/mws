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
			        		'taxonomy'   => 'bazawiedzy',
			        		'hide_empty' => true,
			    			)
						);
						
					if ( !empty( $terms ) && is_array( $terms ) ) { ?>								
						<?php foreach ($terms as $cat) : ?>							
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
								<article id="post-<?php the_ID(); ?>" <?php post_class("tools__item"); ?>> 	
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<a href="<?php echo get_term_link($cat->term_id, 'bazawiedzy'); ?>"><img src="<?php echo z_taxonomy_image_url($cat->term_id); ?>" /></a>
										</div>

										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<h2 class="post__title mt-3"><a href="<?php echo get_term_link($cat->term_id, 'bazawiedzy'); ?>"><?php echo $cat->name; ?></a></h2>
										</div>
									</div>									
								</article>
							</div>
						<?php endforeach; ?>
					<?php } ?>
			</main>
		</section>
	</div>
</div>
<?php get_footer(); ?>


