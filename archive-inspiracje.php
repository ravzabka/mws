<?php 
/*
 Template Name: Inspiracje
 */

 ?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

		<section class="container">
			<div class="row">

				<main class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">

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

			                <?php $desc = get_field('page_banner_subtitle');?>

			               <div class="banner__title-desc"><?php echo $desc;?></div>

			               
			            </div>
			        </div>          

					<!-- /Page Banner  -->		

					<div class="post">
						<div class="row">			

				
								<?php
								global $wp_query, $wpdb, $paged; 

								$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
								$inspire = new WP_Query(array(	

						            'post_type'       =>  'inspiracja',
						            'posts_per_page' =>	10,
						            'paged'		=>	$paged		
		          				));

								if($inspire->have_posts()) { ?>
								    <?php while($inspire->have_posts()) {?>
								        <?php $inspire->the_post();
											 get_template_part( 'template-parts/content', 'inspiracja');
							  } ?>

							  	<nav class="pagination">
		     						<?php
		     							$big = 999999999;
									     echo paginate_links( array(
									          'base' => str_replace( $big, '%#%', esc_url(get_pagenum_link( $big ))),
									          'format' => '?paged=%#%',
									          'current' => max( 1, get_query_var('paged') ),
									          'total' => $inspire->max_num_pages,									         
									          'prev_text' => '&laquo;',
									          'next_text' => '&raquo;'
									     ) ); 

									     ?>
								</nav>  
								  
								<?php } ?>
						</div>
					</div>
					
						
				</main>
				<aside class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">	
					<div class="category effect4">
						<h3 class="sidebar__title bg--green">Kategorie</h3>
						<nav class="category--green category__uppertext">

							<?php // Get the taxonomy's terms
							$terms = get_terms(
			    				array(
			        				'taxonomy'   => 'inspiracje_kategorie',
			        				'hide_empty' => true,
			    					)
								); ?>
							

							
							<?php 	

							if ( !empty( $terms ) && is_array( $terms ) ) { 
								// Run a loop and print them all ?>

								<ul class="category__list">
								   <?php  foreach ( $terms as $term ) { ?>
								   		<li class="category__item">
								        <a href="<?php echo esc_url( get_term_link( $term ) ) ?>" class="category--green__link">
								            <?php echo $term->name; ?>
								        </a></li>

								    <?php } ?>								   

								</ul>
								
								<?php } ?>
						</nav>
					</div>
					
					<?php mws_news(3); ?>
					<?php mws_popular_articles(4); ?>
					<?php mws_training_events(3); ?>					
			
				</aside>
			</div>
		</section>
	</div>
</div>

<?php get_footer(); ?>