<?php get_header(); ?>


<section class="container">
	<div id="primary" class="content-area">

		<div id="content" class="site-content" role="main">	
			<div class="row">
				<main class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					
							<div class="author__container">
								<?php
							// Start the Loop.
							while ( have_posts() ) :
								the_post(); ?>

								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
										<div class="author__image-box">									
											<?php the_post_thumbnail('post-thumbnail',['class' => 'author__image']);?>
											<p class="author__name"><?php the_title(); ?></p>
											
											<!-- <p class="category-tag category-tag--black">
												<?php get_terms_name($post->ID,'specialization'); ?>
											</p>		 -->							
										</div>
									</div>

									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
										
										<div class="author__content">
											<?php the_content(); ?>
										</div>
									</div>
								</div>	
								<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>		
					
							</div>
							


							<div class="author__publications">
								<h2 class="author__title">Publikacje: </h2>
								<hr>

								<?php 

									$relatedArticles = new WP_Query(array(

										'posts_per_page' 	=> 2,
										'post_type'		=>	['article','inspiration'],
										'meta_query'	=> array(
											array(
												'key' => 'related_writer',
												'compare'	=>	'LIKE',
												'value'		=>	'"'.get_the_ID().'"'
											)								
										)
									));							

									while($relatedArticles->have_posts()){
										$relatedArticles->the_post(); ?>

										<div class="author__publications-item">
									<h3 class="author__publications-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									
									

								</div>
									 	
										


								<?php 	}

								?>
						
								
							</div>
						
				</main>
		<!-- <aside class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
					<h3 class="sidebar__title bg--main">Specjalizacja</h3>
					<nav class="category">
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
							   		<li>
							        <a href="<?php echo esc_url( get_term_link( $term ) ) ?>" class="category__link">
							            <?php echo $term->name; ?>
							        </a></li>
							    <?php } ?>

							    <?php } ?>
							    <li class="category__item">
							    	<a href="<?php echo get_post_type_archive_link('writer'); ?>" class="category__link">Wszyscy</a>
							    </li>

							</ul>
							
					</nav>		
					
		</aside>	 -->
	
			</div>
		</div>
	</div>

</section>


<?php get_footer(); ?>