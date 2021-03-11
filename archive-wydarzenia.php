<?php 
/*
 Template Name: Wydarzenia
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

								<div class="banner__title-desc"><?php the_content(); ?></div>
							</div>

						</div>	

						<!-- .Page Banner  -->	


							<?php

								$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
								$events = new WP_Query(array(
		              
						            'post_type'       =>  'wydarzenia' ,
						            'posts_per_page' =>	5,
						            'paged'		=>	$paged		     

		          				));


								if($events->have_posts()) { ?>
								    <?php while($events->have_posts()) {?>
								        <?php $events->the_post(); 

											 get_template_part( 'template-parts/content', 'wydarzenia');

							  } ?>

								    <nav class="pagination">
		     						<?php
		     							$big = 999999999;
									     echo paginate_links( array(
									          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
									          'format' => '?paged=%#%',
									          'current' => max( 1, get_query_var('paged') ),
									          'total' => $events->max_num_pages,
									          'prev_text' => '&laquo;',
									          'next_text' => '&raquo;'
									     ) ); ?>
								</nav>  

								<?php }  ?>
					
				</main>
				<aside class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">							
			
					<?php mws_popular_articles(3); ?>					
					<?php mws_inspirations(3);?>
						
				</aside>
				
			</div>
		</section>
	</div>
</div>

<?php get_footer(); ?>