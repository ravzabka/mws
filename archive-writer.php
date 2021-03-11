<?php 
	/*
 Template Name: Autorzy
 */
 ?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">	
		<section class="container">
			<div class="row">				
				<main class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
					<!-- Page Banner  -->
					<div class="banner__main-image-container">

						<?php 
							$image = get_field('page_banner_background_image');
							if( !empty( $image ) ): ?>
							    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="banner__main-image" />
							<?php endif; ?>

						

							<div class="banner__container">
								<div class="banner__title-container">

								<?php 

									$image = get_field('page_banner_icon');
									if( !empty( $image ) ): ?>
								    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="banner__icon" />
								<?php endif; ?>									
									<h3 class="banner__title"><?php the_title(); ?></h3>
								</div>
								<div class="banner__title-desc"><?php the_content(); ?></div>
							</div>
					</div>	
					<!-- .Page Banner  -->	

						<?php

							$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;							
							$writers = new WP_Query(array(		              
						        'post_type'       =>  'writer',
						        'posts_per_page' =>	10,
						        'paged'		=>	$paged					           

		          			));

							if($writers->have_posts()) { ?>
								<?php while($writers->have_posts()) { ?>
								<?php $writers->the_post(); 
								get_template_part( 'template-parts/content', 'writer');
							}  ?>	

							<nav class="pagination">
		     					<?php
		     						$big = 999999999;
									echo paginate_links( array(
									    'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
									    'format' => '?paged=%#%',
									    'current' => max( 1, get_query_var('paged') ),
									    'total' => $writers->max_num_pages,
									    'prev_text' => '&laquo;',
									    'next_text' => '&raquo;'
									    ) ); ?>
							</nav>  
								<?php wp_reset_postdata();

							} ?>				
					
							
				</main>

				<aside class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
					<h3 class="sidebar__title bg--main">Specjalizacja</h3>
					<nav class="category">
						<?php 

						$al_cat_slug = get_queried_object()->slug;
	    				$al_cat_name = get_queried_object()->name;
						

						// Get the taxonomy's terms
						$terms = get_terms(
		    				array(
		        				'taxonomy'   => 'specialization',
		        				'hide_empty' => false,
		    					)
							);


							// Check if any term exists
							if ( !empty( $terms ) && is_array( $terms ) ) { 
							    // Run a loop and print them all ?>

							    <ul class="category__list">
							   <?php  foreach ( $terms as $term ) { ?>
							   		<li class="category__item">
							        <a href="<?php echo esc_url( get_term_link( $term ) ) ?>" class="category__link">
							            <?php echo $term->name; ?>
							        </a></li>
							    <?php } ?>
							     <li class="current-cat">
							    	<a href="<?php echo site_url('/autorzy');?>" class="category__link">Wszystkie</a>
							    </li>
							   

							</ul>
							<?php } ?>
					</nav>		
					
				</aside>		
			</div>	
		</section>
	</div>
</div>

<?php get_footer(); ?>