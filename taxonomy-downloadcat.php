<?php get_header(); ?>
<div id="main-content" class="main-content">
	<div id="primary" class="content-area">
		<section class="container">
			<!-- Jimu -->
			<div class="row mb-5">
				<aside class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
				

				<?php   // Get terms for post

			

				if(has_term('','downloadcat')){

					$terms = get_the_terms( $post->ID , 'downloadcat' );			
					
					// Loop over each item since it's an array
					if ( $terms != null ){
						foreach( $terms as $term ) {
						$term_link = get_term_link( $term, 'downloadcat' ); ?>




							<article id="post-<?php the_ID(); ?>" <?php post_class("tools__item"); ?>> 	
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<!-- <?php the_post_thumbnail('post-thumbnail',['class' => 'tools__item-image']);?> -->	
										<?php echo $term->description; ?>
									</div>

									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="">			
											<h2 class="post__title mt-3"><?php echo $term->name; ?></h2>					
												
													
										</div>
									</div>
								</div>									
							</article>
									<?php 
							// Get rid of the other data stored in the object, since it's not needed
								unset($term); } } 	}?>
 						<!-- <ul class="category__list">
						
						    <li class="category__item mb-3">
						    	<a href="<?php echo site_url().'/do-pobrania'?>" class="category__link">Pokaż wszystkie</a>
						    </li>

						</ul> -->
					</aside>
					<main class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
						<div class="row ">
							<?php   

			    				$al_cat_slug = get_queried_object()->slug;
			    				$al_cat_name = get_queried_object()->name;
							?>				
							
						
							<?php
								$al_tax_post_args = array(
								   'posts_per_page'	=> -1,
								   'post_type' => 'download', // Your Post type Name that You Registered
								   'orderby'	=>	'title',								 
								   'order' => 'ASC',
								   'tax_query' => array(
								        array(
								           'taxonomy' => 'downloadcat',
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

			<!--/ Koniec Jimu  -->
			

			<?php $post_id = get_the_ID();?>	

			<?php if($post_id === 464 ) :?>


			<div class="row">
				<aside class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
				

					<?php   // Get terms for post
					

					$term = get_term( 40, 'downloadcat' );?>			




							<article id="post-<?php the_ID(); ?>" <?php post_class("tools__item"); ?>> 	
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<!-- <?php the_post_thumbnail('post-thumbnail',['class' => 'tools__item-image']);?> -->	
										<?php echo $term->description; ?>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="">			
											<h2 class="post__title mt-3"><a href="<?php the_permalink(); ?>"><?php echo $term->name; ?></a>
											</h2>
										</div>
									</div>
								</div>									
							</article>
					<?php 	unset($term);  ?>
 					
					</aside>
					<main class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
						<div class="row ">
							<?php 
								$pages = array(
								  'post_type' => 'download',
								  'posts_per_page' => -1,
								  'orderby'		=>	'title',
								  'order'		=> 'ASC',
								  'tax_query' => array(
								    array(
								      'taxonomy' => 'downloadcat',
								      'field' => 'term_id', 
								      'terms' => 40, 
								      'include_children' => false
								    )
								  )
								);

							add_filter('posts_orderby', 'orderby_post_title_int' );

							$al_tax_post_qry = new WP_Query($pages);
							add_filter('posts_orderby', 'orderby_post_title_int' );

								if($al_tax_post_qry->have_posts()) :
								while($al_tax_post_qry->have_posts()) :
								$al_tax_post_qry->the_post();

								    get_template_part( 'template-parts/content', 'download');	
								endwhile;								       							
								endif;
								remove_filter('posts_orderby', 'orderby_post_title_int' );
							?>
					</div>	
				</main>	
			</div>	
		<?php endif;?>

		</section>


	</div>
</div>
<?php get_footer(); ?>


