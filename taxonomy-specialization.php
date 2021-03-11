<?php get_header(); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">	
		<section class="container">

			<div class="row">
				<main class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">	
				<!-- Page Banner  -->
					<div class="banner__main-image-container">

						<?php 
							$post_id = 118;
							$image = get_field('page_banner_background_image', $post_id);
							if( !empty( $image ) ): ?>
							    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="banner__main-image" />
							<?php endif; ?>
						<!-- 	<img src="<?php echo get_template_directory_uri(); ?>/img/pics/tools-image.jpg" alt="" class="banner__main-image"> -->

							<div class="banner__container">
								<div class="banner__title-container">
							<?php 
							$icon = get_field('page_banner_icon',$post_id);
							if( !empty( $icon ) ): ?>
							    <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" class="banner__icon" />
							<?php endif; ?>									
									<h3 class="banner__title"><?php echo get_the_title($post_id); ?></h3>
								</div>

								<?php 

								$post = get_post( $post_id );
								$output =  apply_filters( 'the_content', $post->post_content );

								?>
								<div class="banner__title-desc"><?php echo $output; ?></div>
							</div>
					</div>	
					<!-- .Page Banner  -->			

					<?php						 


						if(have_posts()) { ?>
						    <?php while(have_posts()) {?>
						        <?php the_post(); 
						         get_template_part( 'template-parts/content', 'writer');
						  } ?>
						    <?php the_posts_pagination();?>
						<?php } else { ?>
		   			 		<p><?php _e('Sorry, no posts', 'mws'); ?></p>
						<?php } ?>				
								
				</main>
				
				<aside class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">
					<h3 class="sidebar__title bg--main">Specjalizacje</h3>
					<nav class="category effect4">

							<?php   

	    				$al_cat_slug = get_queried_object()->slug;
	    				$al_cat_name = get_queried_object()->name;
					?> 
						<?php 
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
							   		<li <?php if($al_cat_name == $term->name) echo 'class="current-cat"'?>>
							        <a href="<?php echo esc_url( get_term_link( $term ) ) ?>" class="category__link">
							            <?php echo $term->name; ?>
							        </a></li>
							    <?php } ?>
							    <li class="category__item">
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