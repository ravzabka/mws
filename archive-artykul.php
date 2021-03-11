<?php 
/*  Template Name: Artykuł  */
?>
<?php get_header(); ?>

<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

		<section class="container">
			<div class="row">
				<main class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
						
					<div class="banner__main-image-container">

						<?php 	
							
							$obj = get_post_type_object( $post_type );	
							$page = get_page_by_path( $obj->name );
							$title = get_the_title( $page );
							$page_id = get_page_by_title( $title ); 	


							$post_id  = $page_id->ID;
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
					<div class="post">
						<div class="row">

							<?php   

								$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
								$articles = new WP_Query(array(

									'post_type'       =>  'artykul',
									'posts_per_page' => 10,
									'paged' => $paged   

								));	?>

								<?php while($articles->have_posts()) {?>
								<?php $articles->the_post(); 

									get_template_part( 'template-parts/content', 'artykul');	
								} ?>

							<nav class="pagination">
								<!-- Funkcja zdefiniowana w functions.php  -->
				     			<?php mws_custom_pagination($articles); ?>
							</nav>

							<?php wp_reset_postdata(); ?>
						</div>
					</div>		

				</main>

				<aside class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">
					<div class="category effect4 ">
						<h3 class="sidebar__title bg--blue">Kategorie</h3>
						<nav class="category--blue category__uppertext">

							<?php // Get the taxonomy's terms

							$terms = get_terms(
			    				array(
			        				'taxonomy'   => 'artykuly_kategorie',
			        				'hide_empty' => true,
			    					)); 
			    				?>	

							
							<?php if ( !empty( $terms ) && is_array( $terms ) ) { 
								    // Run a loop and print them all ?>
								<ul class="category__list">
								   <?php  foreach ( $terms as $term ) { ?>
								   		<li class="category__item">
								        <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="category--blue__link">
								            <?php echo $term->name; ?>
								        </a></li>
								    <?php } ?>
								</ul>
								<?php } ?>
						</nav>
					</div>

					<?php mws_news(3); ?>
					<?php mws_inspirations(3);?>		
					<?php mws_training_events(3); ?>
			
				</aside>
			</div>	
		</section>
	</div>
</div>

<?php get_footer(); ?>
