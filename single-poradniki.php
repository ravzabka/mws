
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

		<section class="page container">

			<div class="row">
			<?php   // Get terms for post
			$terms = get_the_terms( $post->ID , 'bazawiedzy' );
				// Loop over each item since it's an array
				if ( $terms != null ){
					foreach( $terms as $term ) {
						$current_cat = $term->name;
				// Get rid of the other data stored in the object, since it's not needed
						unset($term); } } ?>

				<main class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">			
					<?php
					// Start the Loop.
					while ( have_posts() ) :
						the_post(); ?>
						<div class="metabox">
							<span class="category-tag category-tag--black"><?php get_terms_name($post->ID,'bazawiedzy'); ?></span>
											
						</div>

						<h2 class="post__single-title"><?php the_title(); ?></h2>
						<div class="post__content">
							<?php the_content(); ?>

							<div class="post-nav-links__container">
								<?php wp_link_pages(); ?>
							</div>
							<div class="tags__container">
     							<?php the_tags( '<span class="tags">', '</span><span class="tags">', '</span>' ); ?>
							</div>
						</div>
						
						
					<?php endwhile; ?>			
				</main>	

				<aside class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">
					<h3 class="sidebar__title bg--main">Kategorie</h3>
					<nav class="category">


						<?php 
						// Get the taxonomy's terms
						$terms = get_terms(
		    				array(
		        				'taxonomy'   => 'bazawiedzy',
		        				'hide_empty' => true,
		    					)
							);


							// Check if any term exists
							if ( !empty( $terms ) && is_array( $terms ) ) { 
							    // Run a loop and print them all ?>

							    <ul class="category__list">
							    <?php  foreach ( $terms as $term ) { ?>

							   		<li <?php if($current_cat == $term->name) echo 'class="current-cat"'?>>
							        <a href="<?php echo esc_url( get_term_link( $term ) ) ?>" class="category__link">
							            <?php echo $term->name; ?>
							        </a></li>
							    <?php } ?>
							    <li class="category__item">
							    	<a href="<?php echo site_url().'/poradniki'?>" class="category__link">Pokaż wszystkie</a>
							    </li>

							</ul>
							<?php } ?>					
					</nav>	
				</aside>	
			</div>
		</section>
	</div><!-- #content -->
</div><!-- #primary -->	
	

<?php get_footer(); ?>