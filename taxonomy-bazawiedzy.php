<?php get_header(); ?>
<div id="main-content" class="main-content">
	<div id="primary" class="content-area">
		<section class="container">
			<div class="row">
				<aside class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">
				

					<?php   // Get terms for post
					$terms = get_the_terms( $post->ID , 'bazawiedzy' );
					// Loop over each item since it's an array
					if ( $terms != null ){
					foreach( $terms as $term ) {
					$term_link = get_term_link( $term, 'bazawiedzy' ); ?>


					<article id="post-<?php the_ID(); ?>" <?php post_class("tools__item"); ?>> 	
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<img src="<?php echo z_taxonomy_image_url($term->term_id); ?>" />
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
													
								<h2 class="post__title mt-3"><?php echo $term->name; ?></h2>					
												
													
												
							</div>
						</div>
									
					</article>
					<?php 
					// Get rid of the other data stored in the object, since it's not needed
					unset($term); } } ?>
					 <ul class="category__list">						
						<li class="category__item">
							<a href="<?php echo site_url().'/poradniki'?>" class="category__link">Wszystkie poradniki</a>
						</li>
					</ul>
				</aside>
				<main class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">

					<?php  

	    				$al_cat_slug = get_queried_object()->slug;
	    				$al_cat_name = get_queried_object()->name;
					?>
					<?php
						$al_tax_post_args = array(
							'post_type' => 'poradniki', // Your Post type Name that You Registered
								        
							'order' => 'ASC',
							'tax_query' => array(
								array(
								    'taxonomy' => 'bazawiedzy',
								    'field' => 'slug',
								    'terms' => $al_cat_slug
								    )
								)
							);
						$al_tax_post_qry = new WP_Query($al_tax_post_args);

	    					if($al_tax_post_qry->have_posts()) :
		       					while($al_tax_post_qry->have_posts()) :
		            				$al_tax_post_qry->the_post();
		             				get_template_part( 'template-parts/content', 'poradniki');	
		       					endwhile;
	    					endif;?>
				</main>	
			</div>	

		</section>


	</div>
</div>
<?php get_footer(); ?>


