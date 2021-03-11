<?php get_header(); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

		<section class="page container">

			<div class="row">
				<main class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">	

					<?php if ( is_tag() ) {$term_id = get_query_var('tag_id'); $taxonomy = 'post_tag'; $args ='include=' . $term_id; 
						$terms = get_terms( $taxonomy, $args );} ?>
			            <!-- This gets the tags slug  -->
			            <?php $current_tag = single_tag_title( "", false ); ?>
			            <h3>Wyniki wyszukiwania dla tagu: <?php echo $current_tag; ?></h3>		          

						<?php $query = new WP_Query(array( "post_type" => array('inspiracje', 'artykuly', 'post'), "tag" => $terms[0]->slug   ) ); while ($query->have_posts()) : $query->the_post(); ?>
								<?php get_template_part( 'template-parts/content', 'tag');	?>	
								<nav class="pagination">
										<!-- Funkcja zdefiniowana w functions.php  -->
						     			<?php mws_custom_pagination($query); ?>
									</nav>
	       					
						<?php endwhile; ?>						
						
				</main>	
				<aside class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">					

					<?php mws_news(3); ?>					
					<?php mws_training_events(3); ?>
					<?php mws_popular_articles(3); ?>	
					<?php mws_inspirations(3);?>		
			
				</aside>		
			</div>
		</section>	

	</div><!-- #content -->
</div><!-- #primary -->
		
	

<?php get_footer(); ?>