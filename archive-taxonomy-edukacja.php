<?php get_header(); ?>

<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">	
		<section class="container">

			<div class="row">
				<main class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
					<div class="author__list">
						<div class="row">

							<?php
							 $writers = new WP_Query(array(
	              
					              'post_type'       =>  'writer' 

	          				));


							if($writers->have_posts()) { ?>
							    <?php while($writers->have_posts()) {?>
							        <?php $writers->the_post(); 
							         get_template_part( 'template-parts/content', 'writer');
							  } ?>
							    <?php the_posts_pagination();?>
							<?php } else { ?>
			   			 		<p><?php _e('Sorry, no posts', 'mws'); ?></p>
							<?php } ?>	

						</div>
					</div>				
				</main>

				<aside class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">
					<h3 class="sidebar__title bg--main">Autorzy</h3>
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
							   		<li class="category__item">
							        <a href="<?php echo esc_url( get_term_link( $term ) ) ?>" class="category__link">
							            <?php echo $term->name; ?>
							        </a></li>
							    <?php } ?>
							    <li class="category__item">
							    	<a href="<?php echo get_post_type_archive_link('writer'); ?>" class="category__link">Wszystkie</a>
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