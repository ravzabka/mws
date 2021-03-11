<?php get_header(); ?>

<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

		<section class="container">
			<div class="row">
				<main class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">

					<!-- Page Banner  -->
					<div class="banner__main-image-container">

						<?php 
							$post_id = 10;
							$image = get_field('page_banner_background_image', $post_id);
							if( !empty( $image ) ): ?>
							    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="banner__main-image" />
							<?php endif; ?>					

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

							        get_template_part( 'template-parts/content','inspiracje');

							  } ?>

							    <?php the_posts_pagination( array(
											'mid_size'  => 2,
											'prev_text' => __( 'Wcześniejsze', 'mws' ),
											'next_text' => __( 'Następne', 'mws' ),
										) );?>

							<?php } else { ?>

			   			 		<p><?php _e('Sorry, no posts', 'mws'); ?></p>
			   			 		<?php wp_reset_postdata();  ?>
							<?php } ?>				

			
					
				</main>	
				<aside class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">

					<div class="category effect4">
						<h3 class="sidebar__title bg--green">Kategorie</h3>
						<nav class="category--green category__uppertext">

						<?php  $queried_object = get_queried_object(); ?>

							<?php // Get the taxonomy's terms
							$terms = get_terms(
			    				array(
			        				'taxonomy'   => 'inspiracje_kategorie',
			        				'hide_empty' => true,
			    					)); 
			    				?>	
							
							<?php if ( !empty( $terms ) && is_array( $terms ) ) { 
								    // Run a loop and print them all ?>
								<ul class="category__list">
								   <?php  foreach ( $terms as $term ) { ?>
								   		<li  <?php if($queried_object->slug == $term->slug ) echo 'class="category--green__item"';?>>
								        <a href="<?php echo esc_url( get_term_link( $term ) ) ?>" class="category--green__link">
								            <?php echo $term->name; ?>
								        </a></li>
								      

								    <?php } ?>
								     <li class="">
								    	<a href="<?php echo site_url('/inspiracje');?>" class="category--green__link">Wszystkie</a>
								    </li>
								</ul>
								<?php } ?>
						</nav>
					</div>

					<?php mws_news(3); ?>
					<?php mws_training_events(3); ?>
				
					
					
			
				</aside>
			</div>	
		</section>
	</div>
</div>

<?php get_footer(); ?>
