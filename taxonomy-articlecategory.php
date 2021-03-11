<?php get_header(); ?>

<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

		<section class="container">
			<div class="row">
				<main class="col-xs-12 col-sm-12 col-md-12 col-lg-9">

					<!-- Page Banner  -->
					<div class="banner__main-image-container">

						<?php 
							$post_id = 8;
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

							        get_template_part( 'template-parts/content','artykuly');

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
				<aside class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

					<div class="categories">
						<h3 class="sidebar__title bg--main">Kategorie</h3>
						<nav class="category">

							<?php   

	    				$al_cat_slug = get_queried_object()->slug;
	    				$al_cat_name = get_queried_object()->name;
							?>

							<?php // Get the taxonomy's terms
							$terms = get_terms(
			    				array(
			        				'taxonomy'   => 'articlecategory',
			        				'hide_empty' => false,
			    					)
								); ?>
							

							
							<?php 	if ( !empty( $terms ) && is_array( $terms ) ) { 
								    // Run a loop and print them all ?>

								    <ul class="category__list">
								   <?php  foreach ( $terms as $term ) { ?>
								   		<li <?php if($al_cat_name == $term->name) echo 'class="current-cat"'?>>
								        <a href="<?php echo esc_url( get_term_link( $term ) ) ?>" class="category__link">
								            <?php echo $term->name; ?>
								        </a></li>
								    <?php } ?>
								    <li class="category__item">
								    	<a href="<?php echo site_url('/artykuly');?>" class="category__link">Wszystkie</a>
								    </li>

								</ul>
								<?php } ?>
						</nav>
					</div>

					<div class="news">
						<h3 class="sidebar__title bg--red">Najnowsze wiadomości</h3>
						<ul class="news__list">
							<?php 
							   // the query
							   $the_query = new WP_Query( array(
							      'post_type'       =>  'post',
							      'posts_per_page' => 3,
							   )); 
							?>
							<?php if ( $the_query->have_posts() ) : ?>
		  					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

							<li class="news__item"><a href="<?php the_permalink(); ?>" class="news__link"><?php the_title(); ?></a></li>
							
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>						
							<?php endif; ?>	
						</ul>
					</div>		
					
					<div class="events">
						<h3 class="sidebar__title bg--blue">Nadchodzące wydarzenia</h3>
						<ul class="events__list">

							<?php 
							   // the query
							 

							   $the_query = new WP_Query( array(
							      'post_type'       =>  'event',
							      'posts_per_page' => 3,
							   )); 
							?>

							<?php if ( $the_query->have_posts() ) : ?>
		  					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					
							<li class="events__item">			
								<a href="#" class="events__link">			
									<h4 class="events__title"><?php the_title(); ?></h4>
									<?php 
									// Load field value.
									$unixtimestamp = strtotime(get_field('event_date')); ?>			
									<p class="events__place"><?php the_field('event_city'); ?></p>			
									<p class="events__date"><?php echo date_i18n("d F Y", $unixtimestamp ); ?></p>			
								</a>			
							</li>
							 <?php endwhile; ?>
								<?php wp_reset_postdata(); ?>						
							<?php endif; ?>	
						</ul>							
					</div>
			
				</aside>
			</div>	
		</section>
	</div>
</div>

<?php get_footer(); ?>
