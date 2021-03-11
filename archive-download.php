<?php 
/*  Template Name: Do ściągnięcia  */
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

					<!-- /Page Banner  -->	

					<div class="row">			

						<?php 
						// Get the taxonomy's terms
						$terms = get_terms(

				    		array(
				        		'taxonomy'   => 'downloadcat',
				        		'hide_empty' => false,
				    			)
							);

						// Check if any term exists
						if ( !empty( $terms ) && is_array( $terms ) ) { ?>

							<?php  foreach ( $terms as $term ) { ?>

							
						
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
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
					</div>

				</main>

				<aside class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
					<div class="categories">
						<h3 class="sidebar__title bg--main">Kategorie</h3>
						<nav class="category">

							<?php // Get the taxonomy's terms
							$terms = get_terms(
			    				array(
			        				'taxonomy'   => 'downloadcat',
			        				'hide_empty' => false,
			    					)); 
			    				?>	
							
							<?php 

								if ( !empty( $terms ) && is_array( $terms ) ) { 
								// Run a loop and print them all ?>

								<ul class="category__list">

								   <?php  foreach ( $terms as $term ) { ?>
								   		<li class="category__item">
								        <a href="<?php echo esc_url( get_term_link( $term ) ) ?>" class="category__link">
								            <?php echo $term->name; ?>
								        </a></li>
								    <?php } ?>
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
