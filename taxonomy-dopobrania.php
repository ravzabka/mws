<?php get_header(); ?>
<div id="main-content" class="main-content">
	<div id="primary" class="content-area">
		<section class="container">
			
			<!-- Jimu -->
			<div class="row mb-5">
				<aside class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">				

				<?php   // Get terms for post

			

				if(has_term('','dopobrania')){

					$terms = get_the_terms( $post->ID , 'dopobrania');

			
					
					
					if ( $terms != null ){
						foreach( $terms as $term ) {
						$term_link = get_term_link( $term, 'dopobrania' ); ?>




							<article id="post-<?php the_ID(); ?>"> 	
								<div class="row">
										
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<h2 class="post__single-title"><?php echo $term->name; ?></h2>
										<img class="articles__image" src="<?php echo z_taxonomy_image_url($term->term_id); ?>" />
									</div>

									
								</div>									
							</article>
									<?php 
							// Get rid of the other data stored in the object, since it's not needed
								unset($term); } } 	}?>
								<div class="btn__container">
									<a href="<?php echo site_url('/dopobrania'); ?>" class="btn">Zobacz wszystko</a>
								</div>
 					
					</aside>
					<main class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
						<div class="row ">
					<?php   

	    				$al_cat_slug = get_queried_object()->slug;
	    				$al_cat_name = get_queried_object()->name;
					?>				
							
						
								<?php
								    $al_tax_post_args = array(
								    	'posts_per_page'	=> -1,
								        'post_type' => 'download', // Your Post type Name that You Registered
								        'orderby'	=>	'title_number',								 
								        'order' => 'ASC',
								        'tax_query' => array(
								            array(
								                'taxonomy' => 'dopobrania',
								                'field' => 'slug',
								                'terms' => $al_cat_slug
								            )
								        )
								    );
								    $al_tax_post_qry = new WP_Query($al_tax_post_args);
								    
	    							if($al_tax_post_qry->have_posts()) :
	       							while($al_tax_post_qry->have_posts()) :
	            					$al_tax_post_qry->the_post();

	             					get_template_part( 'template-parts/content', 'download');	
	       							endwhile;
	    							endif;
	    							
	    						wp_reset_postdata();  



								?>	

					</div>
							
							
				</main>	
			</div>	

			

		

		</section>


	</div>
</div>
<?php get_footer(); ?>


